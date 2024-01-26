<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:template match="/orders">
		<html>
			<body>
				<section id="xml_catalog">
					<table border="1" style="border: #ced4da; margin-top: 30px; width: 100%; text-align: center;">
						<tr bgcolor="#2BBBAD">
							<th style="color: #ffffff;">Σύνολο Παραγγελιών</th>
							<th style="color: #ffffff;">Συνολικά έσοδα (€)</th>
						</tr>
						<tr>
							<td><xsl:value-of select="count(//@order_id)" /></td>						
							<td><xsl:value-of select="sum(//total_cost)" /></td>
						</tr>
					</table>
					<h5 style="margin-top: 30px;">Παραγγελίες</h5>
					<table border="1" style="border: #ced4da; margin-top: 10px; width: 100%; text-align: center;">
						<tr bgcolor="#2BBBAD">
							<th style="color: #ffffff;">id Παραγγελίας</th>
							<th style="color: #ffffff;">Επώνυμο Πελάτη</th>
							<th style="color: #ffffff;">Όνομα Πελάτη</th>
							<th style="color: #ffffff;">Kόστος παραγγελίας (€)</th>
						</tr>
						<xsl:for-each select="order">
							<tr>
								<td><xsl:value-of select="@order_id"/></td>
								<td><xsl:value-of select="customer_lname"/></td>
								<td><xsl:value-of select="customer_fname"/></td>
								<td><xsl:value-of select="total_cost"/></td>
							</tr>
						</xsl:for-each>
					</table>
					<h5 style="margin-top: 30px;">Τα 5 δημοφιλέστερα προϊόντα</h5>					
					<table border="1" style="border: #ced4da; margin-bottom: 50px; width: 100%; text-align: center;">
						<tr bgcolor="#2BBBAD">
							<th style="color: #ffffff;">#</th>
							<th style="color: #ffffff;">Όνομα Προϊόντος</th>
						</tr>
						<xsl:for-each select="popular_product">
							<tr>
								<td><countNo><xsl:value-of select="position()" /></countNo></td>						
								<td><xsl:value-of select="product_name"/></td>
							</tr>
						</xsl:for-each>
					</table>
				</section>						
			</body>
		</html>		
	</xsl:template>
</xsl:stylesheet>


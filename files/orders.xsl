<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:template match="/orders">
		<html>
			<body>
				<section id="xml_catalog">
					<div class="row">
						<div class="col-md-12 mt-2 table-responsive text-center">	
							<table class="table table-hover table-fixed">
								<thead>
									<tr>
										<th scope="col">Σύνολο Παραγγελιών</th>
										<th scope="col">Σύνολο Εσόδων (€)</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><xsl:value-of select="count(//@order_id)" /></td>						
										<td><xsl:value-of select="sum(//total_cost)" /></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 mb-5 mt-3 table-responsive text-center">
							<h4 class="mb-3">Παραγγελίες</h4>
							<table class="table table-hover table-fixed">
								<thead>
									<tr>
										<th scope="col">id Παραγγελίας</th>
										<th scope="col">Επώνυμο Πελάτη</th>
										<th scope="col">Όνομα Πελάτη</th>
										<th scope="col">Kόστος Παραγγελίας(€)</th>
									</tr>
								</thead>
								<tbody>
									<xsl:for-each select="order">
										<tr>
											<td><xsl:value-of select="@order_id"/></td>
											<td><xsl:value-of select="customer_lname"/></td>
											<td><xsl:value-of select="customer_fname"/></td>
											<td><xsl:value-of select="total_cost"/></td>
										</tr>
									</xsl:for-each>
								</tbody>
							</table>
						</div>										
					</div>
					<div class="row">
						<div class="col-md-12 mb-5 table-responsive text-center">
							<h4 class="mb-3">Τα 5 δημοφιλέστερα προϊόντα</h4>					
							<table class="table table-hover table-fixed">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Όνομα Προϊόντος</th>
									</tr>
								</thead>
								<tbody>
									<xsl:for-each select="popular_product">
										<tr>
											<td><countNo><xsl:value-of select="position()" /></countNo></td>						
											<td><xsl:value-of select="product_name"/></td>
										</tr>
									</xsl:for-each>
								</tbody>
							</table>
						</div>		
					</div>	
				</section>						
			</body>
		</html>		
	</xsl:template>
</xsl:stylesheet>


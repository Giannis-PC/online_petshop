
function edit_user_val() {
    //Μεταβλητές για τον έλεγχο στοιχείων κατά την επεξεργασία στοιχείων του χρήστη.
    var firstName = document.forms['user_details_form']['fname'].value;
    var lastName = document.forms["user_details_form"]["lname"].value;
    var email = document.forms["user_details_form"]["email"].value;
    var password = document.forms["user_details_form"]["password"].value;
    
    //Έλεγχος ότι το πεδίο με τον όνομα δεν είναι κενό.
    if ( firstName == "" ) {
        alert("Το πεδίο Όνομα είναι κενό, απαιτείται η συμπλήρωσή του.");
        return false;
    }
    
    //Έλεγχος ότι το πεδίο με το επώνυμο δεν είναι κενό.
    if ( lastName == "" ) {
        alert("Το πεδίο Επώνυμο είναι κενό, απαιτείται η συμπλήρωσή του.");
        return false;
    }

    //Έλεγχος ότι το email δεν είναι κενό και έχει ορθή μορφή.
    if ( email == "" ) {
        alert("Το πεδίο email είναι κενό, απαιτείται η συμπλήρωσή του.");
        return false;
    }
    else if ( !(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) ) {
        alert("Το πεδίο Email έχει λανθασμένη μορφή.");
        return false;
    }
    
    //Έλεγχος ότι ο κωδικός δεν είναι κενός και αποτελείται από τουλάχιστον 8 ψηφία.
    if ( password == "" ) {
        alert("Το πεδίο Κωδικός είναι κενό, απαιτείται η συμπλήρωσή του.");
        return false;
    }

    else if ( password.length < 8 ) {
        alert("Ο Κωδικός θα πρέπει να αποτελείται απο τουλάχιστον 8 ψηφία");
        return false;
    }
}

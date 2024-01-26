
function reg_validation() {
    //Μεταβλητές για τον έλεγχο στοιχείων κατά την εγγραφή.
    var firstName = document.forms["regForm"]["fname"].value;
    var lastName = document.forms["regForm"]["lname"].value;
    var email = document.forms["regForm"]["email"].value;
    var password = document.forms["regForm"]["password"].value;
    var rePassword = document.forms["regForm"]["repeat_pass"].value;
    
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

    //Έλεγχος ότι το πεδίο επιβέβαιωσης κωδικού δεν είναι κενό και ότι συμπίπτει με τον κωδικό.
    if ( rePassword == "" ) {
        alert("Το πεδίο Επιβεβαίωση κωδικού είναι κενό, απαιτείται η συμπλήρωσή του.");
        return false;
    }

    else if ( !(rePassword == password) ) {
        alert("Τα πεδία Κωδικός και Επιβεβαίωση κωδικού δεν είναι τα ίδια.");
        return false;
    }

}

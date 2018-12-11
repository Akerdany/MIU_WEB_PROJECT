function validateParentFormRegister() {

    
        alert("JS File Openned");
      var x = document.forms["parentFormRegister"]["ChildFirstName"].value;
      // var y = document.forms["parentFormRegister"]["ChildLastName"].value;
      // var z = document.forms["parentFormRegister"]["ChildFamilyName"].value;
      // var a = document.forms["parentFormRegister"]["ChildAge"].value;
      // var b = document.forms["parentFormRegister"]["ChildDateOfBirth"].value;
      // var c = document.forms["parentFormRegister"]["ChildGender"].value;
      // var h = document.forms["parentFormRegister"]["ChildHobbies"].value;
      // var c = document.forms["parentFormRegister"]["ChildMedicalProblems"].value;
      // var i = document.forms["parentFormRegister"]["ChildDisability"].value;

      if (x == "" || x == null) {
          alert("First must be filled out");
          return false;
        }
        // else if (y == "" || y == null) {
        //   alert("Last must be filled out");
        //   return false;
        // }
        // else if (z == "" || z == null) {
        //   alert("Family must be filled out");
        //   return false;
        // }
        // else if (a == "" || a == null) {
        //   alert("Age must be filled out");
        //   return false;
        // }
        // else if (b == "" || b == null) {
        //   alert("Date Of Birth must be filled out");
        //   return false;
        // }
        // else if (c == "" || c == null) {
        //   alert("Gender must be Chosen");
        //   return false;
        // }
        // else if (h == "" || h == null) {
        //   alert("Hobbies must be filled out");
        //   return false;
        // }
        // else if (c == "" || c == null) {
        //   alert("MedicalProblems must be filled out");
        //   return false;
        // }
        // else if (i == "" || i == null) {
        //   alert("Disability must be filled out");
        //   return false;
        // }

        else{
            alert("Registration Done");
          return true;
        }
}

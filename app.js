var list = document.getElementById("list");
firebase.database().ref('contact').on('child_added' , function(data){
    console.log(data.val());
    var li = document.createElement('li');
    var litext = document.createTextNode(data.val().username);
    // li.appendChild(litext);
    list.appendChild(li).appendChild(litext);

});


function savedata(){
    var name = document.getElementById('name')
    var email = document.getElementById('email')
    var phone = document.getElementById('phoneno')

    var database = firebase.database().ref('contact');
    var key = database.push().key;

    var addata = {
        key : key,
        username : name.value,
        email : email.value,
        phoneno : phone.value
    }
    

    database.child(key).set(addata);
    name.value="";
    email.value="";
    phone.value="";

    
}
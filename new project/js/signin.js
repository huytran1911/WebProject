function getInfo() {
    var stored_accounts = JSON.parse(localStorage.getItem('user_info'));
    var user_name = document.getElementById("user_name").value;
    var password = document.getElementById("password").value;
    var flag = 0

    for (var i = 0; i < stored_accounts.length; i++) {
        if (user_name == stored_accounts[i].name && password == stored_accounts[i].password) {
            window.location.href = 'home.html'
            flag = 1
            stored_accounts[i].state = 1;
            alert('Chào mừng đến với Snake Boardgame ')

            localStorage.setItem('user_info', JSON.stringify(stored_accounts));
            document.getElementById("acc").innerHTML = '<a id="userName">' + user_name + '</a>';

            if (checkAdmin(user_name)) {
                document.getElementById("admin").style.display = "inline-block";
                document.getElementById("logOut").style.display = "inline-block";
                document.getElementById("log_out").innerHTML = '<i class="fas fa-sign-out-alt"></i>';
                document.getElementById("user_name").value = null;
                document.getElementById("password").value = null;
            }

        }



    }
    if (flag === 0) {
        alert('Wrong username or password')

    }


}

function forgotPW() {
    alert("Check your mail to get backup code");

}


function getInfo1() {

    var stored_accounts = JSON.parse(localStorage.getItem('user_info'));
    var password = document.getElementById("password1").value;
    var password1 = document.getElementById("password2").value;
    var flag = 1;
    for (var i = 0; i < stored_accounts.length; i++)
        if (document.getElementById("user_name1").value == stored_accounts[i].name) {
            alert("username has been used ");
            flag = 0;
        }
    if (password == password1 && flag != 0) {
        var userName = document.getElementById("user_name1").value;
        var phoneNumber = document.getElementById("phoneNumber").value;
        var address1 = document.getElementById("address").value;
        var email1 = document.getElementById("email").value;
        if (userName === "" || phoneNumber === "" || address1 === "" || email1 === "") {
            alert("You haven't entered enough information here!!!");
        } else {
            window.location.href = 'login.html'
            stored_accounts.push({ name: userName, password: password1.toString(), state: 1, phoneNumber: phoneNumber.toString(), address: address1, email: email1, isBlocked: 0, resetPW: 0 });
            localStorage.setItem('user_info', JSON.stringify(stored_accounts));
            alert('Register succesful')

            document.getElementById("acc").innerHTML = '<a id="userName">' + document.getElementById("user_name1").value + '</a>';
            document.getElementById("log_out").innerHTML = '<i class="fas fa-sign-out-alt"></i>';
            document.getElementById("logOut").style.display = "inline-block";

            document.getElementById("password1").value = null;
            document.getElementById("password2").value = null;
            document.getElementById("user_name1").value = null;
            document.getElementById("email").value = null;
            document.getElementById("phoneNumber").value = null;
            document.getElementById("address").value = null;

        }

    }

}

function logout() {
    menutoggle();
    var stored_accounts = JSON.parse(localStorage.getItem('user_info'));
    var userName = document.getElementById('userName').text;
    for (var i = 0; i < stored_accounts.length; i++)
        if (stored_accounts[i].name == userName) {
            stored_accounts[i].state = 0;
            break;
        }
    localStorage.setItem('user_info', JSON.stringify(stored_accounts));
    document.getElementById("acc").innerHTML = '<a href="#" title = "log in" ><i" class="fas fa-user"></i></a>';
    document.getElementById("log_out").innerHTML = " ";
    document.getElementById("admin").style.display = "none";
    document.getElementById("logOut").style.display = "none";
    window.location.reload("home.html");
}
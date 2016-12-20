// on attend la fin de chargement de la page
$(document).ready(function() {
  // variable global, utile pour stocker l'utilisateur en cours
  var user = null;

  // quand le formulaire est envoyé
  $("#login").on('submit', function(e) {
    e.preventDefault();// on stop l'envoi du formulaire
    var datas = $(this).serializeArray();
    // on récupère les données du formulaire et on les formate
    var formatDatas = {};
    for(var i=0; i < datas.length; i++) {
      formatDatas[datas[i]['name']] = datas[i]['value'];
    }

    // on passe les données à notre fonction de connection
    login(formatDatas);
  });

  var login = function(credentials) {
    // on créer une nouvelle requête AJAX, qui va essayer de nous connecter
    $.ajax({
      method: 'POST',
      url: "http://localhost/j1/chat/back/login.php",
      data: credentials,
      success: function(response) {
        // si l'utilisateur est connecté
        if (response.success) {
          // on sauvegarde en local l'utilisateur
          user = response.user;
          // on affiche le chat
          displayChat();
        } else {
          // on affiche le message d'erreur
          $('.alert')
          .append("<p>Pseudo ou mot de passe incorrect !</p>")
          .removeClass('hide');
        }
      }
    });
  };

  // cacher le formulaire et afficher le chat
  var displayChat = function() {
    // on cache le formulaire
    $('.login').addClass('hide');
    // on affiche le chat
    $(".chat").removeClass("hide");
    // on affiche la liste des utilisateur
    updateUserList();
    // on affiche la liste des msg
    updateMessages();
  };

  // reset de la liste d'utilisateur
  var updateUserList = function() {
    var $userList = $(".chat_user");
    // on retire les données actuelles
      $userList.empty();
    // on récupère la liste des utilisateurs
    $.ajax({
      method: "GET",
      url: "http://localhost/j1/chat/back/user.php",
      success: function(res) {
        // (res) contient la réponse du serveur
        var users = res.users;
        //on récup la liste des utilisateurs renvoyé par le serveur
        for (var i = 0; i < users.length; i++) {
          // on ajoute chaque utilisateur à notre liste HTML
          $userList.append('<li>' + users[i]['pseudo'] + '</li>');
        }
      }
    });
  };

  // reset la liste de message
  var updateMessages = function() {
    var $msgList = $(".chat_msg");
    // on récup la liste des msg
    $.ajax({
      method: "GET",
      url:"http://localhost/j1/chat/back/msg.php",
      success: function(res) {
        var msg = res.msg; //on récup les msg renvoyé par le serveur
        for (var i = 0; i < msg.length; i++) {
          // on ajout chaque message sur notre page html
          $msgList.append('<li>' + msg[i]['contenu'] + "</li>");
        }
      }
    });
  };

  // message form handler
  $(".chat_form").on('submit', function(event) {
    event.preventDefault(); // on stop l'envoi de formulaire
    var datas = $(this).serializeArray(); // on récup les données du formulaireon format correctement les données de sérializeArray e, objet JSON
    var formatDatas = {};
    for (var i = 0; i <datas.length; i++) {
      formatDatas[datas[i]['name']] = datas[i]['value'];
    }

    // on envoi le message au serveur
    $.ajax({
      method: "POST",
      url: "http://localhost/j1/chat/back/msg.php",
      data: {"contenu" : formatDatas['message'], "userId" : user.id},
      success: function(res) {
        if (res.success) {
          // reset la liste des messages
          updateMessages();
          // vider le formulaire
          $(".chat_form").val("");
        }
      }
    });
  });
  
  // mise à jour automatique des massages
  setInterval(function(){
    updateMessages();
  }, 10000);
});

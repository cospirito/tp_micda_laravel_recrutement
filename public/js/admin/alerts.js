(function($) {

  $.ajaxSetup({
      headers: { 'X-CSRF-TOKEN': $('#token').val()}
  });
  var url_supprimer_offre = $('#modifierOffre').attr('post_url_supprimer');

  showSwal = function(type, idobject) {
    'use strict';
    if (type === 'basic') {
      swal({
        text: 'Any fool can use a computer',
        button: {
          text: "OK",
          value: true,
          visible: true,
          className: "btn btn-primary"
        }
      })

    } else if (type === 'title-and-text') {
      swal({
        title: 'Read the alert!',
        text: 'Click OK to close this alert',
        button: {
          text: "OK",
          value: true,
          visible: true,
          className: "btn btn-primary"
        }
      })

    } else if (type === 'success-message') {
      swal({
        title: 'Congratulations!',
        text: 'You entered the correct answer',
        icon: 'success',
        button: {
          text: "Continue",
          value: true,
          visible: true,
          className: "btn btn-primary"
        }
      })

    } else if (type === 'auto-close') {
      swal({
        title: 'Auto close alert!',
        text: 'I will close in 2 seconds.',
        timer: 2000,
        button: false
      }).then(
        function() {},
        // handling the promise rejection
        function(dismiss) {
          if (dismiss === 'timer') {
            console.log('I was closed by the timer')
          }
        }
      )
    } else if (type === 'avertissement-suppresion-offre') {
      swal({
        title: 'Supprimer ?',
        text: "Cette offre sera supprimée défivitement de la base de données !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3f51b5',
        cancelButtonColor: '#ff4081',
        confirmButtonText: 'Great ',
        buttons: {
          cancel: {
            text: "Annuler",
            value: null,
            visible: true,
            className: "btn btn-danger",
            closeModal: true,
          },
          confirm: {
            text: "Supprimer",
            value: true,
            visible: true,
            className: "btn btn-primary",
            closeModal: true
          }
        }
      }).then(
        function(value) {
          if(value === true){
            supprimerOffre(idobject);
          }
          
        }
      )
      // avertissement-suppresion-employes
    } else if (type === 'avertissement-suppresion-employes') {
      swal({
        title: 'Supprimer ?',
        text: "Cette offre sera supprimée défivitement de la base de données !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3f51b5',
        cancelButtonColor: '#ff4081',
        confirmButtonText: 'Great ',
        buttons: {
          cancel: {
            text: "Annuler",
            value: null,
            visible: true,
            className: "btn btn-danger",
            closeModal: true,
          },
          confirm: {
            text: "Supprimer",
            value: true,
            visible: true,
            className: "btn btn-primary",
            closeModal: true
          }
        }
      }).then(
        function(value) {
          if(value === true){
            supprimerEmployes(idobject);
          }
          
        }
      )      
    } else if (type === 'custom-html') {
      swal({
        content: {
          element: "input",
          attributes: {
            placeholder: "Type your password",
            type: "password",
            class: 'form-control'
          },
        },
        button: {
          text: "OK",
          value: true,
          visible: true,
          className: "btn btn-primary"
        }
      })
    }
  }

  //Suppprimer  
  function supprimerOffre(id)
  {
      $.ajax({
          url : url_supprimer_offre,
          method : "POST",
          data: {
              id:id,
          }
      }).done( function(res){
          showSucceOffreModifier(res.messag);
          $('.ligneOffreID').each(function(){
            if($(this).attr('id') == id) {
              $(this).css('display', 'none');
            }
          })
      }).fail(function(res){
          showEchecOffreModifier(res.messag);
      });
  }

  //Suppprimer  
  function supprimerEmployes(id)
  {
    url_supprimer_employer = $('#employes').attr('post_url_supprimer');
      $.ajax({
          url : url_supprimer_employer,
          method : "POST",
          data: {
              id:id,
          }
      }).done( function(res){
          showSucceOffreModifier(res.messag);
          $('.ligneEmployeID').each(function(){
            if($(this).attr('id') == id) {
              $(this).css('display', 'none');
            }
          })
      }).fail(function(res){
          showEchecOffreModifier(res.messag);
      });
  }


  
})(jQuery);
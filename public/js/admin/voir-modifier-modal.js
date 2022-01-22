// Pour les offres en cous  : data-toggle="modal" data-target="#modifierOffre"
(function($) {
    //Configuration global de ajax
    var id = "";
    var titre = "";
    var description = "";
    var etat = "non_expiré"

    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('#token').val()}
    });
    url_modifier_offre = $('#modifierOffre').attr('post_url');
    console.log(url_modifier_offre);

    //On cliquer sur btnvoiroffre
    $('.btnvoiroffre').on('click', function(e) {
        
        id = $(this).parent().parent().attr('id');

        $(this).parent().parent().children().each(function(){
            if($(this).hasClass("titre"))
            {
                titre = $(this).text();
            }
            if($(this).hasClass("description"))
            {
                description = $(this).attr('descTot');
            }
            // etat
        })
        $('#modi-etat-offre-id').val(id);
        $('#modal-modi-offreTitre').val(titre);
        $('#modal-modi-offreDescription').text(description);


        $('#modifierOffre').modal('toggle');

    });

    //Ajax de modification 
    $('.btnModifierOffre').on('click', function(){
        // id = $('#modi-etat-offre-id').val();
        etat = $('#modi-etat-offreEncours').val();
        description = $('#modal-modi-offreDescription').text();
        titre = $('#modal-modi-offreTitre').val();
        
        modifierOffre(id, titre, description, etat);
    })

    //Ajouter 
    function modifierOffre(id, titre, desc, etat)
    {
        $.ajax({
            url : url_modifier_offre,
            method : "POST",
            data: {
                id:id,
                titreOffre: titre,
                descOffre:desc,
                etat: etat
            },
            beforeSend : function(){
                $('#modifierOffre').modal('toggle');
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

})(jQuery);
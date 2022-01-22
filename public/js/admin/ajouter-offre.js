//On récupère les du form d'ajout d'ecole
var inputnewOffreTitre = $('#newOffreTitre').val();
var inputnewnewOffreDesc = $('#newOffreDesc').val();

var url_addOffre = $("#formnewOffre").attr('post_url') ;


//Configuration global de ajax
$.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('#token').val()}
});

//Au click sur valider pour ajouter une novelle ecole
$("#btnAddOffre").on("click", function(e){
    e.preventDefault();
    
    //Update des valeurs saisis
    updateVal();

    //Si les champs sont valid
    if(champsValid())
    {
        ajouterOffre();
    }
});

//Au click sur annuler 
$("#btnAnnuler").on("click", function(e){
    e.preventDefault();

    // $(".todesabled").css("display", "inline-block");
    // $("#btnLoader").css("display", "none");
});

//Ajouter Admin
function ajouterOffre()
{
    $.ajax({
        url : url_addOffre,
        method : "POST",
        data: {
            titreOffre: inputnewOffreTitre,
            descOffre:inputnewnewOffreDesc,
        },
        beforeSend : function(){
            $(".todesabled").css("display", "none");
            $("#btnLoader").css("display", "inline-block");
        }
    }).done( function(res){
        $(".todesabled").css("display", "inline-block");
        $("#btnLoader").css("display", "none");
        $("#ajouterOffreinfo").addClass("text-success");
        $("#ajouterOffreinfo").text(res.message) ;
        $("#ajouterOffreinfo").css("display", "inline-block");
        
        setTimeout(function(){
            $("#ajouterOffreinfo").css("display", "none");    
        }, 7000);

        //On réinitialise tout le champs
        $('#formAddnewAdmin :input').each(function(){
            $(this).val("");
        });
    }).fail(function(res){
        //Erreur d'appel 
        
        $(".todesabled").css("display", "inline-block");
        $("#btnLoader").css("display", "none");

        $("#ajouterOffreinfo").addClass("text-danger");
        $("#ajouterOffreinfo").text(res.responseJSON.message);
        $("#ajouterOffreinfo").css("display", "inline-block");

        setTimeout(function(){
            $("#ajouterOffreinfo").css("display", "none");    
        }, 7000);

         //On réinitialise tout le champs
         $('#formAddnewAdmin :input').each(function(){
            $(this).val("");
        });
        

    });
}


//Pour les ajustement de bordure des champs erronée
function errocss(element, isadd=true)
{
    if(isadd)
    {
        //Ajustement de la bordure du champ
        $(element).parent().addClass("has-danger");
        $(element).addClass("form-control-danger");
        
    }
    else{
        //Ajustement de la bordure du champ
        $(element).parent().removeClass("has-danger");
        $(element).removeClass("form-control-danger");
    }
}


//Quand l'utisateur saisie ces info à nouveau on enlève les bordure rouge 
$('#formAddnewAdmin :input').on("keypress", function(){
    errocss(this, false);
});


//Maj des val de champ
function updateVal()
{
    //On récupère les du form d'ajout d'ecole
    inputnewOffreTitre = $('#newOffreTitre').val();
    nputnewnewOffreDesc = $('#newOffreDesc').val();
}

//Fonction de vérification des champs saisied
function champsValid()
{
    if(inputnewOffreTitre == "" || nputnewnewOffreDesc == "" )
    {
        $('#formnewOffre :input[required=required]').each( function(){
            if($(this).val() == ""){
                // labelError.insertAfter($(this));
                errocss(this);
            }
            
        });
        return false ;
    }
    else
    {
        return true ;
    }
        
        
}
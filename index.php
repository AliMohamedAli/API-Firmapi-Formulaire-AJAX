<script src="jquery.js"></script>
<style>
    .erreur {
        border: 2px solid red;
    }
</style>

<h1>480470152</h1>
<ul>
    <li><input type="text" name="siren" class="siren" maxlength="9" placeholder="Siren" /></li>
    <li><input type="text" name="nom" class="nom" maxlength="9" placeholder="Nom" disabled /></li>
    <li><input type="text" name="adressse" class="adresse" maxlength="9" placeholder="Adresse" disabled /></li>
</ul>

<script>
    $(document).ready(function() {
        
        $("input.siren").keyup(function() {
        
        if ($(this).val().length == 9 && $("div.wait").length == 0)
            $(this).after('<div class="wait">Patientez...</div>');
        
            if ($(this).val().length == 9) {

                jQuery.ajax({

                    type: 'GET',
                    url: 'api.php',
                    data: {
                        siren: $(this).val()
                    },

                    success: function(data) {
                        
                        $("div.wait").remove();
                        
                        if (data.length > 0) {
                            var obj = jQuery.parseJSON(data);
                            $("input.nom").val(obj.result.name);
                            $("input.adresse").val(obj.result.address);
                        } else {
                            $("input.siren").addClass('erreur');
                        }
                    },

                    error: function(jqXHR, textStatus, errorThrown)
                    {
                        console.log('Une erreur est survenue');
                    }

                })
            } else {
                $("input.nom").val('');
                $("input.adresse").val('');
                $("input.siren").removeClass('erreur');
            }
        });
        
    });
</script>
<?php
require_once("funcions.php");
?>
	<script type="text/javascript">
		var datesOcupades = <?php echo json_encode(obtenir_dates_res());?>;
		$(function(){
			$.datepicker.regional['ca'] = {
			    closeText: 'Tancar',
			    prevText: '&#x3c;Ant',
			    nextText: 'Seg&#x3e;',
			    currentText: 'Avui',
			    monthNames: ['Gener','Febrer','Mar&ccedil;','Abril','Maig','Juny',
			    'Juliol','Agost','Setembre','Octubre','Novembre','Desembre'],
			    monthNamesShort: ['Gen','Feb','Mar','Abr','Mai','Jun',
			    'Jul','Ago','Set','Oct','Nov','Des'],
			    dayNames: ['Diumenge','Dilluns','Dimarts','Dimecres','Dijous','Divendres','Dissabte'],
			    dayNamesShort: ['Dug','Dln','Dmt','Dmc','Djs','Dvn','Dsb'],
			    dayNamesMin: ['Dg','Dl','Dt','Dc','Dj','Dv','Ds'],
			    weekHeader: 'Sm',
			    dateFormat: 'dd/mm/yy',
			    firstDay: 1,
			    isRTL: false,
			    showMonthAfterYear: false,
			    yearSuffix: ''
	                };
			$.datepicker.setDefaults($.datepicker.regional[<?php echo '"'.getUserLanguage().'"' ?>]);
			$("#dataIni").datepicker({
			    minDate: 0,
			    maxDate: "2016-05-15",
			    dateFormat: 'yy-mm-dd',
			    changeMonth:true,
			    changeYear:true,
			    beforeShowDay: function(date){
			    var dayOfWeek = date.getDay ();
			    var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
			    
			    for(i=0;i<datesOcupades.length;i++)
			    {
				if ($.inArray(string, datesOcupades) != -1 ) {
				return [false];
				}
				else return [true];
			    }
			    },
			    onClose: function (selectedDate) {
				$("#dataFi").datepicker("option", "minDate", selectedDate);
			    }
			});
			$("#dataFi").datepicker({
			    minDate: 0,
			    maxDate: "2016-05-15",
			    dateFormat: 'yy-mm-dd',
			    changeMonth:true,
			    changeYear:true,
			    beforeShowDay: function(date){
			    var dayOfWeek = date.getDay ();
			    var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
			    
			    for(i=0;i<datesOcupades.length;i++)
			    {
				if ($.inArray(string, datesOcupades) != -1 ) {
				return [false];
				}
				else return [true];
			    }
			    },
			    onClose: function (selectedDate) {
				$("#dataFi").datepicker("option", "maxDate", selectedDate);
			    }
			});
		})
	</script>
    <form id="" style="width: 480px"  action='check.php'  method="post">
	<fieldset>
                <legend>Esculli el Paquet de Relleus</legend>
                <div class="row">
                    <div class="col-md-6">
                            <label>Producte:</label>
                                    <select name="producte" id="producte">
                                                    <option value="" disabled="disabled" selected="selected">- Seleccioni un Producte -</option>
                                    <?php 
                                    $productes = dameProducte();
                                    //echo $productes;
                                    foreach($productes as $indice => $registro){
                                            echo '<option value="'.$registro['id_producte'].'" data-id_producte="'.$registro['id_producte'].'" data-preu_base="'.$registro['preu_base'].'" data-persones="'.$registro['adults'].'">'.$registro['Nom'].'</option>
                                            ';
                                            
                                    }
                                    
                                    ?>
                                    </select><br><br>
                            <div name="persones" id="persones">
                            </div>
                    </div>
                    <div class="col-md-6">
                            <div name="servei" id="servei">
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                            <br><label> Data Inici:</label>
                                <input type="date" name="dataIni" id="dataIni" readonly="readonly" size="12" />
                    </div><br>
                    <div class="col-md-6">
                        <label> Data fi:</label>
                            <input type="date" name="dataFi" id="dataFi" readonly="readonly" size="12" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                            <br>
                            <b>Total: <span name="preu" id="preu"></span> €</b>
                    </div>
                </div>
                <br>
            <div class="row">
                <div name='dades' id="form_usuari" style="display:none;">
                    <label>Nom:</label><input type='text' class='Nom' name='Nom'/>
                    <label>Cognoms:</label><input type='text' class='Cognoms' name='Cognoms'/>
                    <label>DNI:</label><input type='text' class='DNI' name='DNI'/><br>
                    <label>Email:</label><input type='email' class='Email' name='Email'/>
                    <label>Telefon:</label><input type='tel' class='Telefon' name='Telefon'/>
                    <div class="row">
                    <button type='submit' value='Envia Mensaje' class='boton' id='buton'>Comprar</button>
                    </div>
                </div>	
            </div>
	</fieldset>
</form>
<button class="btn btn-small" type="button" id="mostrar_altaUsuari">Alta Usuari</button>
    <br>
    <div id="us" name="us"></div>
<hr>
<script>
$("#producte").on("change", buscarPersones);
$("#producte").on("change", buscarServeis);
$("#servei").on("change", calculPreu);
</script>

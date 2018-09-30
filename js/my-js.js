$(document).ready(function(){
	$('.sidenav').sidenav();
	// Date picker
	$('.datepicker').datepicker({
		format:'m-d-yyyy', 
		i18n:{
			cancel:'Cancelar',
			done:'Enviar',
			months:[
			'Janeiro',
			'Fevereiro',
			'Março',
			'Abril',
			'Maio',
			'Junho',
			'Julho',
			'Agosto',
			'Setembro',
			'Outubro',
			'Novembro',
			'Dezembro'],
			monthsShort:[
			'Jan',
			'Fev',
			'Mar',
			'Abr',
			'Mai',
			'Jun',
			'Jul',
			'Ago',
			'Set',
			'Out',
			'Nov',
			'Dez'],
			weekdays: [
			'Segunda',
			'Terça',
			'Quarta',
			'Quinta',
			'Sexta',
			'Sábado',
			'Domingo'
			],
			weekdaysShort:[
			'Seg',
			'Ter',
			'Qua',
			'Qui',
			'Sex',
			'Sáb',
			'Dom'
			],
			weekdaysAbbrev:[
			'S',
			'T',
			'Q',
			'Q',
			'S',
			'S',
			'D'
			]
		}
	});
	// End of datepicker
});

// No jQuery
ClassicEditor
.create( document.querySelector( '#editor' ) )
.catch( error => {
	console.error( error );
});

$(document).ready(function(){
	$('.navbar').on('click','.search-field',function(){$(this).css({'width':'270px'}).focus()}).on('blur','.search-field',function(){$(this).css({'width':0})})
})
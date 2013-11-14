var enterTimeout;
var fullImage = function(img){
	img.attr( "src", img.data("full-src"));
};
var thumbImage = function(img){
	img.attr( "src", img.data("thumb-src"));
};
$(function() {
  $( ".giffy-thumb" )
  .mouseenter(function() {
  	$this = $(this);
  	if(enterTimeout) {
  		clearTimeout(enterTimeout);
  	}
  	enterTimeout = setTimeout(fullImage, 500, $this);
  })
  .mouseleave(function() {
    $this = $(this);
    if(enterTimeout) {
  		clearTimeout(enterTimeout);
  	}
  	thumbImage($this);
  });
});
$(function(){
  var current = $("#current").html();
  var currentArray = (current).split(" ");
  var previous = $("#previous").html();
  var previousArray = (previous).split(" ");
  console.log(currentArray);
  console.log(previousArray);
  for (var i=0; i <currentArray.length; i++ ){
    if(currentArray[i] !== previousArray[i]){
      currentArray[i] = '<span class="red">' + currentArray[i] + '</span>';
    }
  }
  $(".results").html((currentArray).join(" "));
})

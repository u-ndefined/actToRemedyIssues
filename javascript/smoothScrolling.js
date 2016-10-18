var timer = null;
var smooth= null;
var lastScrollTop = 0;
var scrollMin = 50;
var boxSize = 300;


function stopScrolling(documentID){
  if(timer !== null) clearTimeout(timer);
  timer = setTimeout(function() {forceToScroll(documentID)}, 300);
}

function forceToScroll(documentID){
  var scrollValue = document.getElementById(documentID).scrollTop;
  var scrollValueMod = scrollValue % boxSize;
  if(scrollValueMod < scrollMin || scrollValueMod > boxSize - scrollMin) var scrollGoal = Math.round(scrollValue/300)*300;
  else{
    var sign = Math.sign(scrollValue - lastScrollTop);
    var scrollGoal = scrollValue - scrollValueMod + (boxSize * sign);
  }
  var d = Math.abs(scrollGoal - scrollValue);
  lastScrollTop  = scrollGoal;
  smoothScroll(documentID, scrollGoal, d);
}
  
  

function smoothScroll(documentID, scrollGoal, d){
  console.debug(d);
  var scrollValue = document.getElementById(documentID).scrollTop;
  if(scrollValue < scrollGoal){
    document.getElementById(documentID).scrollTop += 5;
    smooth = setTimeout(function() {smoothScroll(documentID,scrollGoal,d)}, 15);
  }
  else if(scrollValue > scrollGoal){
    document.getElementById(documentID).scrollTop -= 5; 
    smooth = setTimeout(function() {smoothScroll(documentID,scrollGoal,d)}, 15);
  }
  else clearTimeout(smooth);

}

function stop(){
  if(smooth != null) clearTimeout(smooth);
}
// JavaScript Document
if(document.all)
{
   obj.onselectstart = function(){return false;}; //for ie
}
else
{
   obj.onmousedown = function(){return false;};
obj.onmouseup = function(){return true;};

}
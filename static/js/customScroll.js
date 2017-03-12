$.fn.extend({
	scrolls:function(oDiv,oUl,options)
	{
		new scrollBar(oDiv,oUl,options);
	}

});
(function(){
	
	window.scrollBar=function(oDiv,oUl,options)
	{
		this.direction=options.direction;
		this.bgHeight=options.bgHeight;
		this.bgWidth=options.bgWidth;
		if(!this.bgHeight)this.bgHeight=10;
		if(!this.bgWidth)this.bgWidth=10;
		this.axle=options.axle;
		if(!this.axle)this.axle='top';
		
		if(!this.direction)this.direction='right';
		if(!this.distance)this.distance=10;
		this.dir=true;
		
		this.oDiv=oDiv;
		this.oUl=oUl;
		this.sBg=document.createElement('div');
		this.sTiao=document.createElement('div');
		this.sBg.className='scroll_bg';
		this.sTiao.className='scroll_tiao';
		this.sBg.appendChild(this.sTiao);
		this.oDiv.appendChild(this.sBg);
		
		
		
		var _this=this;
		
		this.sBg.onmousedown=function(ev)
		{
			_this.fnMusedown(ev);
		}
		
		this.dir=this.direction=='right'?true:this.direction=='bottom'?false:function(){ alert('"direction"参数不对,只能是:right或者bottom');};
		if(typeof this.dir=='function')
		{
			this.dir();
			return;
		};
		if(this.dir==false)
		{
			this.sBg.style.width='100%';
			this.sBg.style.height=this.bgHeight+'px';
			this.sBg.style.bottom='0';
		}
		else
		{
			this.sBg.style.width=this.bgWidth+'px';
			this.sBg.style.height='100%';
			this.sBg.style.top='0';
		}
		this.countHeight();
		addWheel(this.oDiv,function(down){
			
			if(down)//往上滚
			{
				if(_this.dir)
				{
					var t=_this.sTiao.offsetTop-_this.distance;
				}
				else
				{
					var t=_this.sTiao.offsetLeft-_this.distance;
				}
			}
			else
			{
				if(_this.dir)
				{	
					var t=_this.sTiao.offsetTop+_this.distance;
				}
				else
				{
					var t=_this.sTiao.offsetLeft+_this.distance;
				}
			}
			_this.setScroll(t);
		});
	}
	
	scrollBar.prototype.countHeight=function ()
	{
		if(getStyle(this.oDiv,'position')=='static')
		{
			this.oDiv.style.position='relative';
		}//visible
		if(getStyle(this.oDiv,'overflow')=='visible')
		{
			this.oDiv.style.overflow='hidden';
		}
		if(getStyle(this.oUl,'position')=='static')
		{
			this.oUl.style.position='absolute';
		}
		if(this.dir)
		{
			if(this.oUl.offsetHeight>=this.oDiv.offsetHeight)
			{
				this.sBg.style.display='block';
			}
			//this.sTiao.style.height=parseInt(this.sBg.offsetHeight*this.oDiv.offsetHeight/this.oUl.offsetHeight)+'px';
		}
		else
		{
			if(this.oUl.offsetWidth>=this.oDiv.offsetWidth)
			{
				this.sBg.style.display='block';
			}
			this.sTiao.style.width=parseInt(this.sBg.offsetWidth*this.oDiv.offsetWidth/this.oUl.offsetWidth)+'px';
		}
	}
	
	scrollBar.prototype.fnMusedown=function(ev)
	{
		var _this=this;
		var oEv=ev||event;
		if(this.dir)
		{
			var dis=oEv.clientY-this.sTiao.offsetTop;
		}
		else
		{
			var dis=oEv.clientX-this.sTiao.offsetLeft;
		}
		var _this=this;
		document.onmousemove=function(ev)
		{
			var oEv=ev||event;
			if(_this.dir)
			{	
				var t=oEv.clientY-dis;
			}
			else
			{
				var t=oEv.clientX-dis;
			}
			_this.setScroll(t);
		};
		document.onmouseup=function(ev)
		{
			document.onmousemove=null;
			document.onmouseup=null;
		};
		return false;
	}
	
	scrollBar.prototype.setScroll=function (t)
	{
		if(this.dir==false)
		{
			if(t<0)
			{
				t=0;
			}
			else if(t>this.sBg.offsetWidth-this.sTiao.offsetWidth)
			{
				t=this.sBg.offsetWidth-this.sTiao.offsetWidth;
			}
			this.sTiao.style.left=t+'px';
			var scale=t/(this.sBg.offsetWidth-this.sTiao.offsetWidth);
			if(this.axle=='left')
			{
				this.oUl.style.left=-(this.oUl.offsetWidth-this.oDiv.offsetWidth)*scale+'px';
			}
			else if(this.axle=='top')
			{
				this.oUl.style.top=-(this.oUl.offsetHeight-this.oDiv.offsetHeight)*scale+'px';
			}
		}
		else
		{
			if(t<0)
			{
				t=0;
			}
			else if(t>this.sBg.offsetHeight-this.sTiao.offsetHeight)
			{
				t=this.sBg.offsetHeight-this.sTiao.offsetHeight;
			}
			this.sTiao.style.top=t+'px';
			var scale=t/(this.sBg.offsetHeight-this.sTiao.offsetHeight);
			if(this.axle=='top')
			{
				this.oUl.style.top=-(this.oUl.offsetHeight-this.oDiv.offsetHeight)*scale+'px';
			}
			else if(this.axle=='left')
			{
				this.oUl.style.left=-(this.oUl.offsetWidth-this.oDiv.offsetWidth)*scale+'px';
			}
		}
	}
	
	function getStyle(obj,name)
	{
		return obj.currentStyle?obj.currentStyle[name]:getComputedStyle(obj,false)[name];
	}
	
	function getByClass(parent,sClass)
	{
		var aEl=parent.getElementsByTagName('*');
		var arr=[];
		var re=new RegExp('\\b'+sCLass+'\\b');
		for(var i=0;i<aEl.length;i++)
		{
			if(re.test(aEl[i].className))
			{
				arr.push(aEl[i]);
			}
		}
		return arr;
	}
	
	function addWheel(obj,fnBack)
	{
		obj.onmousewheel=fnWheel;
		if(obj.addEventListener)
		{
			obj.addEventListener('DOMMouseScroll',fnWheel,false);
		}
		
		function fnWheel(ev)
		{
			var oEv=ev||event;
			var bDown=true;
			if(oEv.wheelDelta)
			{
				if(oEv.wheelDelta>0)
				{
					bDown=true;
				}
				else
				{
					bDown=false;
				}
			}
			else
			{
				if(oEv.detail)
				{
					if(oEv.detail>0)
					{
						bDown=false;
					}
					else
					{
						bDown=true;
					}
				}
			}
			return fnBack(bDown);
		}
	}
})();
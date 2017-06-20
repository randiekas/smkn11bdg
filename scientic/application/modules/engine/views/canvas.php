<style>
/* Dragging components */

#dragbox{
	position:absolute;
	top:0;
	left:0;
	pointer-events:none;
	display: none;
	z-index: 10;
}

#ghost{
	background-color: rgba(77, 138, 208, 1);
	position:absolute;
	top:0;
	left:0;
	border-radius:1px;
	transition:0.15s all;
}

#canvas .sizer{
	position:relative;
	margin:0 auto;
	pointer-events: none;
	/*padding:50px;*/
	padding:25px;
}

#canvas .sizer.animated{
	transition: 0.4s;
}

#canvas .ui-offset{
	position:relative;
}

/* Grid rectangle */

#canvas .ui-offset .grid{

}

#canvas .ui-offset .grid-rect{
	position: absolute;
	border: 1px dotted #F7A3EC;
	z-index: 1;
	box-sizing: content-box;
	pointer-events: none;
	box-shadow: 1px 1px 0 rgba(255, 255, 255, 0.1), 1px 1px 0 rgba(255, 255, 255, 0.1) inset;
}

/*  Focus rectangle */

#canvas .ui-offset .focus-rect{
	position: absolute;
	border: 1px solid #5699E8;
	box-sizing: content-box;
	display: none;
	z-index: 5;
	box-shadow:1px 1px 0 rgba(255,255,255,0.2), 1px 1px 0 rgba(255,255,255,0.2) inset;
}

#canvas .ui-offset .focus-rect .move-handle{
	position: absolute;
	background-color: #5699E8;
	cursor: move !important;
	pointer-events: all;
	width: 10px;
	height: 10px;
	border-radius: 50%;
	top: -5px;
	left: -5px;
	display: none;
	border: 1px solid #FFF;
}

#canvas .ui-offset .focus-rect.inline-editing{
	border:1px solid transparent;
	outline:1px dashed #898989;
}

#canvas .ui-offset .focus-rect.inline-editing > div{
	display:none !important;
}
/* Toggling System UI */

#canvas.hide-sui .grid,
#canvas.hide-sui .focus-rect,
#canvas.hide-sui .dom-highlight,
#canvas.hide-sui .inline-caret{
	display:none !important;
}

/* DOM Highlight */

#canvas .ui-offset .dom-highlight{
	position: absolute;
	pointer-events:none;
	display: none;
}

#canvas .ui-offset .dom-highlight div{
	position: absolute;
	border: 0 solid;
}

#canvas .ui-offset .dom-highlight .main{
	background-color: #4492ED;
	opacity: 0.4;
	z-index: 1;
}

#canvas .ui-offset .dom-highlight .highlight-line{
	border: 1px dotted #5699E8;
	box-shadow:1px 1px 0 rgba(255,255,255,0.2), 1px 1px 0 rgba(255,255,255,0.2) inset;
	z-index: 1;
}

#canvas .ui-offset .dom-highlight .padding{
	border-color:#b8e0b8;
	z-index: 2;
}

#canvas .ui-offset .dom-highlight .margin{
	border-color:#f2d59f;
	z-index: 3;
}

#canvas .ui-offset .dom-highlight .border{
	border-color:#ffffb3;
	z-index: 4;
}

/* Line with decorations */

#canvas .ui-offset .line{
	width:1px;
	height:1px;
	background-color:#4492ED;
	position: absolute;
	box-shadow:0 0 1px #4492ED;
	margin:-1px 0 0 -1px;
	pointer-events:none;
}

#canvas .ui-offset .line:after,
#canvas .ui-offset .line:before{
	position: absolute;
	content: '';
	width:0;
	height:0;
	border:4px solid transparent;
}

#canvas .ui-offset .line.left:before{
	top:50%;
	margin-top:-4px;
	left:-10px;
	border-right-color:#4492ED;
}

#canvas .ui-offset .line.right:after{
	top:50%;
	margin-top:-4px;
	right:-10px;
	border-left-color:#4492ED;
}

#canvas .ui-offset .line.top:before{
	left:50%;
	margin-left:-4px;
	top:-10px;
	border-bottom-color:#4492ED;
}

#canvas .ui-offset .line.bottom:after{
	left:50%;
	margin-left:-4px;
	bottom:-10px;
	border-top-color:#4492ED;
}


#canvas iframe{
	pointer-events:all;
	position: absolute;
	transform-origin:top left;
	top:0;
	left:0;
	display: block;
	border:0;
	box-shadow: 0 2px 8px rgba(0, 0, 0, 0.16);
}

#canvas iframe.animated{
	transition:0.4s;
}

#canvas{
	position: relative;
	overflow: auto;
	flex-grow: 1;
	background-color: #31373A;
	box-shadow: 0 0 8px rgba(0, 0, 0, 0.15) inset;
	border: 1px solid #434D52;
	border-width: 0 1px 1px;
}


#frameUIDesigner{
	pointer-events:all;
	/*position: absolute;*/
	transform-origin:top left;
	top:0;
	left:0;
	display: block;
	border:0;
	/*box-shadow: 0 2px 8px rgba(0, 0, 0, 0.16);*/
}

#frameUIDesigner{
	transition:0.4s;
}


</style>

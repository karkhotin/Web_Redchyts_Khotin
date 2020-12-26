var commands = [{"cmd": "bold"},  
 {
	"cmd": "fontSize",
	"val": "1-7"
}, {
	"cmd": "foreColor",
	"val": "rgba(0,0,0)"
},  {"cmd": "italic"}, 
	{"cmd": "justifyCenter"}, 
	{"cmd": "justifyFull"}, 
	{"cmd": "justifyLeft"}, 
	{"cmd": "justifyRight"}, 
	{"cmd": "subscript"}, 
	{"cmd": "superscript"}, 
	{"cmd": "underline"}, 
	{"cmd": "undo"}];

var commandRelation = {};

function supported(cmd) {
	var css = !!document.queryCommandSupported(cmd.cmd) ? "btn-succes" : "btn-error"
	return css
};

function doCommand(cmdKey) {
	var cmd = commandRelation[cmdKey];
	val = (typeof cmd.val !== "undefined") ? prompt("Value for " + cmd.cmd + "?", cmd.val) : "";
	document.execCommand(cmd.cmd, false, (val || "")); 
}

function init() {
	var html = '',
		template = '<span><code class="btn btn-xs %btnClass%" onmousedown="event.preventDefault();" onclick="doCommand(\'%cmd%\')">%cmd%</code></span>';
	commands.map(function(command, i) {
		commandRelation[command.cmd] = command;
		var temp = template;
		temp = temp.replace(/%btnClass%/gi, supported(command));
		temp = temp.replace(/%cmd%/gi, command.cmd);
		html+=temp;
	});
	document.querySelector(".buttons").innerHTML = html;
}
init();
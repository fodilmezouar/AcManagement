console.log('main process working');
const {app,BrowserWindow} = require("electron");
const path = require("path");
const url = require("url");
 
let win;
function createWindow(){
	win = new BrowserWindow();
	win.loadURL(url.format({
         pathname:path.join(__dirname,'index.html'),
         protocol:'file',//protocole utilise non http mais file
         slashes:true
	}));
	win.webContents.openDevTools(); // ouvrir les outils de developpeurs
	//handle la fermeture de la fenetre
	win.on("close",()=>{
        win = null;//apprés garbage collector
	});
}
app.on("ready",createWindow);//when app finich initialisation
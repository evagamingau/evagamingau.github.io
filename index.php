<!DOCTYPE html>
<html>
<head>
	<?php
	error_reporting(0);
	@set_time_limit(3);
    $steamid = $_GET['steamid'];
	$plname  = 'User Not Found';
	$map     = $_GET['mapname'];
	$avatar  = 'nouser.jpg';



	if (isset($_GET['steamid'])) {
		$data = 'http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=FC9B9C932ABBEA822932A809CF069B42&steamids='.$_GET['steamid'];
		$f = file_get_contents($data);
		$arr = json_decode($f, true);
		if (isset($arr['response']['players'][0]['personaname']))
			$plname = $arr['response']['players'][0]['personaname'];
		if (isset($arr['response']['players'][0]['avatarfull']))
			$avatar = $arr['response']['players'][0]['avatarfull'];
	}

	?>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
 <link rel = "stylesheet"
   type = "text/css"
   href = "loadingScreen.css" />
 <style>
@import url(https://fonts.googleapis.com/css?family=Raleway:200);
body {
  text-align: center;
  font-family: 'Raleway', sans-serif;
  font-size: 1.75em;
  font-weight: 200;
  box-sizing: border-box;
  overflow: hidden;
  background: #4286f4 url("evalogo2.png");
  background-position: -5.75% 246%;
  background-size: 25%;
  background-repeat: no-repeat;
}
h1{
  margin-top:-20%;
  padding-bottom:5%;
  font-family: 'Raleway', sans-serif;
  font-size:2em;
}

#main {
  width: 1038.4px;
  height: 100%;
  padding-top: 250px;
  margin: 0 auto;
}

@media (max-height: 550px) {
  #main {
    padding-top: 0px;
  }
}
.module {
  height: 100px;
  display: block;
  background-color: #f1f1f1;
  box-shadow: inset 1px 0px 0px 1px ##262626;
  line-height: 100px;
  color: #818181;
}

.icon {
  float: left;
  width: 20%;
  min-width: 100px;
  height: 100%;
  display: inline-block;
  background-color: #dbdbdb;
  box-shadow: 1px 0 0 0px #b8b8b8;
}

#left {
  width: 48%;
  height: 500px;
  display: inline;
  float: left;
  background-color: #262626;
  box-shadow: 0px 0px 50px 0px #000;
}

#right {
  width: 48%;
  height: 500px;
  display: inline;
  float: right;
  background-color: #262626;
  box-shadow: 0px 0px 50px 0px #000;
}

#player-avatar-module {
  width: 180px;
  height: 180px;
  margin-top: 10px;
  margin-left: -165px;
  display: inline-block;
  background-color: #b8b8b8;
  border-radius: 100px;
}

#player-avatar {
  width: 180px;
  height: 180px;
  padding-top: 0px;
  border-radius: 100px;
}

#welcome {
  height: 200px;
  color: #fff;
}

#bio {
  height: 100px;
  line-height: 100px;
  font-size: 1.75em;
  font-weight: 200;
  color: #fff;
}

#desc-module {
  height: 200px;
}

#player-icon {
  background: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDBwdCIgaGVpZ2h0PSIxMDBwdCIgdmlld0JveD0iMCAwIDEwMCAxMDAiIHZlcnNpb249IjEuMSI+PGcgaWQ9IiM5YzljOWNmZiI+PHBhdGggZmlsbD0iIzljOWM5YyIgb3BhY2l0eT0iMS4wMCIgZD0iIE0gMCAwIEwgMTAwIDAgTCAxMDAgMS4xIEMgNjYuNyAwLjkgMzMuMyAxIDAgMSBMIDAgMCBaIi8+PHBhdGggZmlsbD0iIzljOWM5YyIgb3BhY2l0eT0iMS4wMCIgZD0iIE0gMzUuMiAyOC4xIEMgMzguNiAyMC41IDQ4LjQgMTcgNTYgMjAuMSBDIDYzLjUgMjIuOCA2OC4xIDMxLjQgNjUuOSAzOSBDIDY1LjMgNDIuOSA2Mi40IDQ1LjUgNjAuMiA0OC41IEMgNzAuMiA1NS45IDczLjkgNjkgNzQgODEgQyA1OCA4MSA0MiA4MSAyNiA4MSBDIDI2LjEgNjguOSAyOS45IDU1LjkgMzkuOSA0OC4zIEMgMzQuNCA0My40IDMxLjYgMzQuOSAzNS4yIDI4LjEgWiIvPjwvZz48ZyBpZD0iI2RiZGJkYmZmIj48L2c+PC9zdmc+) no-repeat center center;
}

#key-icon {
  background: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDBwdCIgaGVpZ2h0PSIxMDBwdCIgdmlld0JveD0iMCAwIDEwMCAxMDAiIHZlcnNpb249IjEuMSI+PGcgaWQ9IiNkYmRiZGJmZiI+PC9nPjxnIGlkPSIjOWM5YzljZmYiPjxwYXRoIGZpbGw9IiM5YzljOWMiIG9wYWNpdHk9IjEuMDAiIGQ9IiBNIDY2LjUgMjkuNCBDIDY5LjcgMjYuMyA3My4yIDIzLjQgNzcgMjAuOSBDIDc5LjQgMjIuOCA4MS41IDI1LjIgODIuNiAyOCBDIDgxLjggMjkgODAuOSAyOS45IDgwIDMwLjkgQyA4MS41IDMzLjEgODQuMiAzNSA4NC42IDM3LjcgQyA4My42IDM5LjkgODAuOSA0Mi42IDc4LjQgNDEuNiBDIDc2LjYgMzkuOSA3NS4yIDM4IDczLjcgMzYuMSBDIDcyLjUgMzcgNzEuMyAzNy45IDcwLjIgMzguOCBDIDcxLjggNDAuOSA3NC4yIDQyLjUgNzUuMSA0NS4xIEMgNzQuOCA0Ny40IDcyLjYgNDguOCA3MC44IDQ5LjggQyA2Ny41IDQ5LjkgNjYuMiA0NS45IDY0IDQ0IEMgNTguNSA0OC42IDUyLjkgNTMuMSA0Ny41IDU3LjkgQyA0OC4zIDYxLjQgNDkgNjUuMiA0Ny43IDY4LjggQyA0NS40IDc1LjEgMzguOSA4MC4xIDMyIDc5LjYgQyAyMi45IDc5LjQgMTUuMiA3MCAxNy4yIDYxIEMgMTguNCA1NCAyNC45IDQ4LjUgMzEuOSA0OC4xIEMgMzUuMSA0Ny43IDM4LjIgNDkuMSA0MS4xIDUwLjMgQyA0OS45IDQzLjcgNTcuOSAzNi4yIDY2LjUgMjkuNCBaIi8+PC9nPjwvc3ZnPg==) no-repeat center center;
}

#cloud-icon {
  background: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDBwdCIgaGVpZ2h0PSIxMDBwdCIgdmlld0JveD0iMCAwIDEwMCAxMDAiIHZlcnNpb249IjEuMSI+PGcgaWQ9IiNkYmRiZGJmZiI+PC9nPjxnIGlkPSIjOWM5YzljZmYiPjxwYXRoIGZpbGw9IiM5YzljOWMiIG9wYWNpdHk9IjEuMDAiIGQ9IiBNIDU3IDMxLjkgQyA2NS4yIDI5LjEgNzUuMiAzMi45IDc5LjIgNDAuOCBDIDgxLjIgNDQuMyA4MS4zIDQ4LjUgODEuNSA1Mi40IEMgODMuOSA1My45IDg2LjYgNTUuOCA4Ni44IDU5IEMgODcuOSA2My44IDg0LjEgNjkgNzkuMSA2OSBDIDYwLjcgNjkuMSA0Mi40IDY4LjkgMjQgNjkgQyAyMS45IDY4LjkgMTkuNyA2OS4xIDE3LjcgNjguMyBDIDEzLjQgNjYuMiAxMS42IDYwLjIgMTQuMiA1Ni4yIEMgMTUuNCA1My43IDE4LjMgNTIuOSAyMC41IDUxLjcgQyAyMS43IDQ5LjMgMjIuNiA0Ni41IDI1LjMgNDUuNCBDIDI3LjcgNDMuOSAzMC42IDQ0LjQgMzMuMiA0NC41IEMgMzQuOSA0Mi41IDM2LjcgNDAuMiAzOS4zIDM5LjMgQyA0MS45IDM4LjEgNDQuOCAzOC43IDQ3LjYgMzguOSBDIDUwLjEgMzUuOCA1My4xIDMzLjEgNTcgMzEuOSBaIi8+PC9nPjwvc3ZnPg==) no-repeat center center;
}

#map-icon {
  background: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjEwMHB4IiBoZWlnaHQ9IjEwMHB4IiB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgNTEyIDUxMiIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+PGc+PGcgaWQ9IlhNTElEXzFfIj48Zz48cGF0aCBmaWxsPSIjOUM5QzlDIiBkPSJNNDc5LjkwMSAxNTAuN3YyODFjMCA1Ljg5OS0yLjgwMSAxMS4zOTktNy40IDE0LjNjLTIuMiAxLjQtNC43IDIuMS03LjIgMi4xYy0yLjYgMC01LjItMC44OTktNy41LTIuMzk5IGwtOTcuMS02NS4ybC05Ny4yIDY1LjJjLTQuNyAzLjEtMTAuNCAzLjEtMTUuMSAwbC05Ny4xLTY1LjJsLTk3LjEgNjUuMmMtNC41IDMtMTAuMiAzLjEtMTQuOCAwLjJjLTQuNi0zLTcuNC04LjQtNy40LTE0LjMwMSB2LTI4MWMwLTUuNyAyLjctMTEuMSA3LjEtMTRsMTA0LjctNzAuM2M0LjYtMy4xIDEwLjUtMy4xIDE1LjEgMGw5Ny4xIDY1LjJsOTcuMS02NS4yYzQuNy0zLjEgMTAuNS0zLjEgMTUuMSAwbDEwNC43IDcwLjMgQzQ3Ny4zIDEzOS41IDQ4MCAxNDQuOSA0NzkuOSAxNTAuN3ogTTQ0Ny45MDEgNDAxLjdoMC4xbC0wLjEtMC4wN1YxNTkuOWwtNzEtNDguNXY4Ny41YzIuNjk5LTAuOCA1LjMtMS42IDgtMi4xbDMuMTk5IDE1LjcgYy0zLjY5OSAwLjgtNy41IDItMTEuMSAzLjZ2MTM3LjJsNzAuOSA0OC4zM1Y0MDEuN3ogTTM0NSAzNTIuN1YyNDMuNWMtMC43IDAuNy0xLjMgMS40LTEuOSAyLjFjLTEuOCAyLjEtMy42IDQuMi01LjM5OSA2LjIgbC0xMi0xMC42YzEuNy0yIDMuNS00IDUuMy02LjFjMi44LTMuMSA1LjYtNi40IDguNi05LjdsNS4zMDEgNC44VjExMWwtNzMgNDl2MTEyLjNjMi4zLTAuMSA0LjUtMC4zOTkgNi42LTAuN0wyODEgMjg3LjQgYy0yLjcgMC4zOTktNS42IDAuNjk5LTguNSAwLjg5OWMtMC4xIDAtMC4zIDAtMC41IDB2MTEzLjRMMzQ1IDM1Mi43eiBNMjQwIDQwMS43VjI3MS40di0yLjdWMTYwbC03My00OXYxMDAuOSBjNC4yIDIuMiA4LjQgNC44IDEyLjIgNy41bC05LjMgMTNjLTAuOS0wLjctMS45LTEuMy0yLjktMnYxMjIuNEwyNDAgNDAxLjd6IE0xMzUgMzUzLjJWMTExLjVsLTcxIDQ5LjR2MjQxLjdMMTM1IDM1My4yeiIvPjxwb2x5Z29uIGZpbGw9IiMyMzFGMjAiIHBvaW50cz0iNDQ4LDQwMS43IDQ0Ny45LDQwMS43IDQ0Ny45LDQwMS42Ii8+PHBvbHlnb24gZmlsbD0iIzlDOUM5QyIgcG9pbnRzPSI0MzkuNywyMTguMyA0MjguMywyMjkuNyA0MTgsMjE5LjMgNDA3LjcsMjI5LjcgMzk2LjMsMjE4LjMgNDA2LjcsMjA4IDM5Ni4zLDE5Ny43IDQwNy43LDE4Ni4zIDQxOCwxOTYuNyA0MjguMywxODYuMyA0MzkuNywxOTcuNyA0MjkuMywyMDgiLz48cGF0aCBmaWxsPSIjOUM5QzlDIiBkPSJNMzExLjggMjU1LjVsMTAuNjAxIDEyYy02LjMwMSA1LjYtMTIuNSA5LjgtMTkuMTAxIDEzbC03LTE0LjRDMzAxLjYgMjYzLjYgMzA2LjYgMjYwLjEgMzExLjggMjU1LjV6Ii8+PHBhdGggZmlsbD0iIzlDOUM5QyIgZD0iTTI0MCAyNjguN3YyLjdsLTQuMiAxMi44Yy03LjEtMi4zLTEzLjktNS41LTIwLjctOS44bDguNS0xMy42MDFDMjI5LjEgMjY0LjMgMjM0LjUgMjY2LjggMjQwIDI2OC43eiIvPjxwYXRoIGZpbGw9IiM5QzlDOUMiIGQ9Ik0yMDguMSAyNDkuM2wtMTEgMTEuNjAxYy00LjMtNC4xMDEtOC04LjUtMTEuNi0xMi44Yy0wLjktMS4yLTEuOS0yLjMtMi45LTMuNWwxMi4yLTEwLjQgYzEgMS4yIDIgMi40IDMgMy42QzIwMS4zIDI0MS45IDIwNC41IDI0NS44IDIwOC4xIDI0OS4zeiIvPjxwYXRoIGZpbGw9IiM5QzlDOUMiIGQ9Ik0xMjQuOSAyMDQuMWw0LjkgMTUuMmMtMi40IDAuNyAxLjIgMC42LTEgMS44Yy0yLjcgMS40LTExLjMgNC42LTEzLjkgNy4xTDEwNCAyMTYuNSBjMy42LTMuNCA3LjUtNi4yIDExLjMtOC4zQzExOC40IDIwNi41IDEyMS42IDIwNS4yIDEyNC45IDIwNC4xeiIvPjxwYXRoIGZpbGw9IiM5QzlDOUMiIGQ9Ik05Mi44IDIzMC43bDEzLjIgOWMtMy42IDUuMy01LjIgMTAuNC03LjEgMTYuM2wtMC4zIDAuOUw4My40IDI1MmwwLjItMC44IEM4NS43IDI0NC42IDg3LjkgMjM3LjkgOTIuOCAyMzAuN3oiLz48L2c+PGc+PC9nPjwvZz48L2c+PC9zdmc+) no-repeat center center;
}

#download-icon {
  background: url(data:image/svg+xml;base64,PHN2ZyB4bWxuczpjYz0iaHR0cDovL2NyZWF0aXZlY29tbW9ucy5vcmcvbnMjIiB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iIHhtbG5zOmlua3NjYXBlPSJodHRwOi8vd3d3Lmlua3NjYXBlLm9yZy9uYW1lc3BhY2VzL2lua3NjYXBlIiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiIHhtbG5zOnNvZGlwb2RpPSJodHRwOi8vc29kaXBvZGkuc291cmNlZm9yZ2UubmV0L0RURC9zb2RpcG9kaS0wLmR0ZCIgeG1sbnM6c3ZnPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0ic3ZnMiIgeD0iMHB4IiB5PSIwcHgiIHdpZHRoPSIxMDBweCIgaGVpZ2h0PSIxMDBweCIgdmlld0JveD0iMCAwIDMyIDMyIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAzMiAzMiIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+PGcgaWQ9ImJhY2tncm91bmQiPjxyZWN0IGZpbGw9Im5vbmUiIHdpZHRoPSIzMiIgaGVpZ2h0PSIzMiIvPjwvZz48ZyBpZD0iZG93bmxvYWQiPjxnIGlkPSJYTUxJRF8xXyI+PGc+PHBvbHlnb24gZmlsbD0iIzlDOUM5QyIgcG9pbnRzPSIyMiw4IDE2LDE0IDEwLDggMTQsOCAxNCwyIDE4LDIgMTgsOCIvPjxwYXRoIGZpbGw9IiM5QzlDOUMiIGQ9Ik0zMCAyNkgydi04aDI4VjI2eiBNNCAyNGg0di0ySDRWMjR6Ii8+PC9nPjxnPjwvZz48L2c+PC9nPjwvc3ZnPg==) no-repeat center center;
}
 </style>
</head>
<body onload="play()">
<div id="soundtrack"></div>
<div class="loader"></div>
<div id="main">
<h1>Welcome to EVA Gaming!</h1>
  <div id="left">
    <div id="welcome">
      <div id="player-avatar-module" style="margin-left:-60%; position:relative;">
       <img src="<?php echo $avatar?>" style ="width:180px; height:180px; border-radius:50%;">
      </div>
    </div>
    <div class="module" id="nickname-module">
      <div id="player-icon" class="icon">
      </div>
      <span><?php echo $plname ?></span>
    </div>
    <div class="module" id="id-module">
      <div id="key-icon" class="icon"></div>
      <span ><?php echo $steamid ?></span>
    </div>
    <div class="module" id="status-module">
      <div id="cloud-icon" class="icon"></div>
      <span id="status">Connecting</span>
    </div>
  </div>
  <div id="right">
    <div id="bio">EVA Gaming</div>
    <div class="module" id="desc-module">
		A DarkRP Server
    </div>
    <div class="module" id="map-module">
      <div id="map-icon" class="icon"></div>
      <span><?php echo $map ?></span>
    </div>
    <div class="module" id="download-module">
      <div id="download-icon" class="icon"></div>
      <span id="status"></span>
    </div>
  </div>
</div>
</div>
</body>
<script type="text/javascript">
	function play() {
    var a = Math.random()*2;
    a=Math.floor(a);

    if(a==1)
    {
        document.getElementById('soundtrack').innerHTML="<audio id='background_audio1' loop autoplay><source src='matches.ogg' type='audio/ogg'></audio>";
    }
    if(a==0)
    {
        document.getElementById('soundtrack').innerHTML="<audio id='background_audio1' loop autoplay><source src='youMakeMe.ogg' type='audio/ogg'></audio>";
    }
	}
 </script>
</html>
eval(function(p,a,c,k,e,r){e=function(c){return c.toString(a)};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('1("0 d");$(3(){1("0 9");$("8").7($("<b>").5("0 4"),$("<a>").6("c","2").5("e"));$("#2").f("g",3(){1("0 4")})});',17,17,'Hola|alert|btnHola|function|DOM|text|attr|append|body|JQuery|button|h1|id|JS|Saluda|on|click'.split('|'),0,{}))

/*alert("Hola JS");
	$(
		function(){
			alert("Hola JQuery");
				$("body").append(
					$("<h1>").text("Hola DOM"),
					$("<button>").attr("id","btnHola").text("Saluda")
				);
				$("#btnHola").on("click", function(){
					alert("Hola DOM");
				});
		}
	);
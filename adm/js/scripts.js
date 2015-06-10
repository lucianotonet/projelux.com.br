// AJAX ------------------------------------------------------------------------
function AJAX(Url,Div,Met){
    var req = null;
    var setDiv = Div;

    document.getElementById(setDiv).innerHTML = "Carregando...";
    if(window.XMLHttpRequest){
        req = new XMLHttpRequest();
        if (req.overrideMimeType)
        {
            req.overrideMimeType('text/xml');
        }
    }
    else if (window.ActiveXObject)
    {
        try {
            req = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e)
        {
            try {
                req = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {}
        }
    }

    req.onreadystatechange = function(){
        document.getElementById(setDiv).innerHTML = "Carregando...";

        if(req.readyState == 4){//Request foi aceito
            if(req.status == 200){//encontrou dados
                    document.getElementById(setDiv).innerHTML = req.responseText;
            }else{ //Não encotra os dados
                    document.getElementById(setDiv).innerHTML = "Error: returned status code " + req.status + " " + req.statusText;
            }
        }
    };
    req.open("GET", Url, true);
    req.send(null);

}
// FIM -------------------------------------------------------------------------

function muda_situacao(id,id_eventos){
    AJAX("eventos/pessoas_ativos.php?id="+id+"&id_eventos="+id_eventos,"pessoas_ativos");
    AJAX("eventos/pessoas_pendentes.php?id="+id+"&id_eventos="+id_eventos,"pessoas_pendentes");
}
function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function mdata(v){
    v=v.replace(/\D/g,"");                    //Remove tudo o que não é dígito
    v=v.replace(/(\d{2})(\d)/,"$1/$2");
    v=v.replace(/(\d{2})(\d)/,"$1/$2");

    v=v.replace(/(\d{2})(\d{2})$/,"$1$2");
    return v;
}
function mvalor(v){
    v=v.replace(/\D/g,"");//Remove tudo o que não é dígito
    return v;
}

function muda_ordem(id,contador){
    var ordem = document.getElementById("ordem_banner"+contador).value;
    window.location.href="index.php?sub=banner&acao=atualiza_ordem&id="+id+"&ordem="+ordem;
}

function muda_ordem_freepass(id,contador){
    var ativo = document.getElementById("ordem_freepass"+contador).value;
    window.location.href="index.php?sub=free_pass&acao=atualiza_ordem_freepass&id="+id+"&freepass="+ativo;
}
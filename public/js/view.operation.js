
email = 0;


function setEmailNUM()
{

    email =  parseInt($("#emailNUM").attr("value"));

}

function changeEmailNUM()
{

    var strHtml = '<input type="hidden" id="emailNUM" name="emailNUM" value="'+email+'">';
    document.getElementById("listNUM").innerHTML = strHtml;
}


function addEmail()
{
    setEmailNUM();
    if(email < 10)
    {
        email = email + 1;
        var strHtml = '<div id="emaildiv_'+email+'"><table><tr> <td> <input type="text" name="name'+email+'" class="form-control" required="required" > </td> <td> <input type="text" name="email'+email+'" class="form-control" required="required"></td><td><input type="button" value="删除" class="dm3-btn dm3-btn-medium"  onclick="delEmail('+email+')"/></td></tr></table></div>';
        $('#emailPlace').append(strHtml);
        changeEmailNUM();

    }
    else
    {
        alert("已经达到选项上限");
    }

}


function delEmail(o)
{
    setEmailNUM();
    if(email == o)
    {
        document.getElementById("emailPlace").removeChild(document.getElementById("emaildiv_"+o));
        email= email-1;
        changeEmailNUM();
    }
    else
    {
        alert("请从最后一项开始删除");
    }
}



function ifDelete(e)
{

    if(!confirm("确认要删除？")) {

        return false;
    }
  return true;
}


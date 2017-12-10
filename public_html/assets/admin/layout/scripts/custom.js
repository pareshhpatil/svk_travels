var type = '';
var controller = '';
function _(el) {
    return document.getElementById(el);
}
function saveform()
{
    var data = $("#customerForm").serialize();
    $.ajax({
        type: 'POST',
        url: '/admin/' + controller + '/' + type + 'saved',
        data: data,
        success: function(data)
        {
            _("status").innerHTML = type + ' Save success';
            if (type != 'logsheetbill')
            {
                $('#customerForm').trigger("reset");
            } else
            {

                _("suss").style.display = 'block';
                _("startkm").value = '';
                _("endkm").value = '';
                _("toll").value = '';
                _("remark").value = '';
                _("closebutton").click();
            }
            $('#savebutton').attr('disabled', false);

        }
    });

    return false;
}

function uploadfile(savetype) {
    type = savetype;
    if (savetype == 'fuel' || savetype == 'logsheet')
    {
        controller = 'transaction';
    } else
    {
        controller = 'master';
    }
    if (savetype == 'logsheetbill')
    {
        controller = 'logsheet';
    }
    $('#savebutton').attr('disabled', true);
    try {
        var file = _("fileupload").files[0];
    } catch (o) {
    }
    // alert(file.name+" | "+file.size+" | "+file.type);
    if (file)
    {
        filesize = file.size / 1024 / 1024;
        if (filesize > 3)
        {
            _("status").innerHTML = "Upload Failed. File should be less than 3mb.";
            return false;
        } else {
            var formdata = new FormData();
            formdata.append("fileupload", file);
            var ajax = new XMLHttpRequest();
            ajax.upload.addEventListener("progress", progressHandler, false);
            ajax.addEventListener("load", completeHandler, false);
            ajax.addEventListener("error", errorHandler, false);
            ajax.addEventListener("abort", abortHandler, false);
            ajax.open("POST", "/admin/master/savefilesession");
            ajax.send(formdata);
        }
    } else
    {

        saveform();
    }
    return false;

}

function confirmlogsheet()
{
    try {
        var data = $("#customerForm").serialize();
        $.ajax({
            type: 'POST',
            url: '/admin/logsheet/confirmlogsheetbill',
            data: data,
            success: function(data)
            {
                _("detail").innerHTML = data;
                _("conf").click();

            }
        });
    } catch (o)
    {
        alert(o.message);
    }
    return false;
}

function progressHandler(event) {
    // _("loaded_n_total").innerHTML = "Uploaded " + event.loaded / 1000 + " KB of " + event.total / 1000;
    var percent = (event.loaded / event.total) * 100;
    _("status").innerHTML = Math.round(percent) + "% uploaded... please wait";

}
function completeHandler(event) {
    saveform();
}
function errorHandler(event) {

}
function abortHandler(event) {

}

function getDetails(link, type, controller)
{
    if (type == 'fuel' || type == 'logsheet')
    {
        controller = 'transaction';
    } else
    {
        controller = 'master';
    }
    if (type == 'logsheetbill')
    {
        controller = 'logsheet';
    }
    _("detail").innerHTML = '<img src="/assets/admin/layout/img/speener.gif" style="margin-left: 46%;">';
    var data = '';
    $.ajax({
        type: 'POST',
        url: '/admin/' + controller + '/view' + type + '/' + link,
        data: data,
        success: function(data)
        {
            _("detail").innerHTML = data;
        }
    });

    return false;
}

function modechange(val)
{
    if (val == 'Credit card')
    {
        document.getElementById('card').style.display = 'block';
        document.getElementById('vendor').style.display = 'none';
    }
    if (val == 'Vendor')
    {
        document.getElementById('card').style.display = 'none';
        document.getElementById('vendor').style.display = 'block';
    }
    if (val == 'Cash')
    {
        document.getElementById('card').style.display = 'none';
        document.getElementById('vendor').style.display = 'none';
    }

}

function calculatetotal(id)
{
    if (id > 0)
    {
        qty = Number(document.getElementById('qty' + id).value);
        if (qty > 0)
        {

        } else
        {
            qty = 0;
        }

        rate = Number(document.getElementById('rate' + id).value);
        if (rate > 0)
        {

        } else
        {
            rate = 0;
        }
        amount = qty * rate;
        document.getElementById('amt' + id).value = parseFloat(amount).toFixed(2);
    }

    val1 = Number(document.getElementById('amt1').value);
    if (val1 > 0)
    {

    } else
    {
        val1 = 0;
    }
    val2 = Number(document.getElementById('amt2').value);
    if (val2 > 0)
    {

    } else
    {
        val2 = 0;
    }
    val3 = Number(document.getElementById('amt3').value);
    if (val3 > 0)
    {

    } else
    {
        val3 = 0;
    }
    val4 = Number(document.getElementById('amt4').value);
    if (val4 > 0)
    {

    } else
    {
        val4 = 0;
    }
    val5 = Number(document.getElementById('amt5').value);
    if (val5 > 0)
    {

    } else
    {
        val5 = 0;
    }

    val6 = Number(document.getElementById('amt6').value);
    if (val6 > 0)
    {

    } else
    {
        val6 = 0;
    }

    total = val1 + val2 + val3 + val4 + val5 - val6;
    document.getElementById('total_amount').innerHTML = parseFloat(total).toFixed(2);
    //Math.round(total * 100) / 100;
}


function AddParticular() {
    var mainDiv = document.getElementById('new_particular');
    var newDiv = document.createElement('tr');
    newDiv.innerHTML = '<td class="td-c"><input style="min-width: 150px;" type="text" required="" name="particular[]" class="form-control"></td><td class="td-c"><input style="min-width: 150px;" type="text" required="" name="date[]" class="form-control"></td><td class="td-c"><input style="min-width: 100px;" type="text" required="" name="qty[]" class="form-control"></td><td class="td-c"><input style="min-width: 100px;" type="text" required="" name="rate[]" class="form-control"></td><td class="td-c"><input style="min-width: 100px;" type="text" name="amount[]" required="" class="form-control"></td><td><a href="javascript:;" onclick="$(this).closest(' + "'tr'" + ').remove();" class="btn btn-sm red"> <i class="fa fa-times"> </i> Delete </a></td>';
    mainDiv.appendChild(newDiv);
}
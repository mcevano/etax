@extends('layouts.app')
@section('title', '| BIR Form No. 1702Q')

@section('content')
<!-- <div class="loader"></div> -->
<!-- Styles -->
<link href="{{ asset('css/forms.css') }}" rel="stylesheet">
<div class="modal fade" id="saveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Alert Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="alert alert-info message">
            Do you want to save the changes you've made in this form?
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-exit" id="1702Q" company='{{$company->id}}'>No</button>
        <button type="button" class="btn btn-primary" onclick="saveBeforeExit()" >Yes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="savedAlertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Success!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body message">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-exit" id="1702Q" company='{{$company->id}}'>Okay</button>
      </div>
    </div>
  </div>
</div>

 <div class="modal fade" id="fillingSuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Submit / Final Copy</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <div class="modal-body">
            <div class="alert alert-info message">
                Submit successful. Subject to validation by BIR.<br> 
                 A notification will be sent to your email address. Please print or save the email as an evidence of efiled return.
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-filing-success" form='1702Q' company='{{$company->id}}'>Okay</button>
        </div>
    </div>
  </div>
</div>
<form id="frmMain" name="frmMain">
     @csrf
        <input type="hidden" name="company" value="{{ $company->id}}">
        <input type="hidden" name="form_no" value="{{ $action == 'new' ? $form_no : $data->form_no }}">
        <input type="hidden" name="form_id" value="{{ $action == 'new' ? '' : $data->id }}">
        <input type="hidden" name="file_name" id="file_name" value="{{ $action == 'new' ? '' : '/savefile/'.$xml[0]->file_name }}">
        <div id="container">
            <div id="wrapper" style="margin: 0 auto; position: relative; width: 746px; ">
			
				<table border="0" width="746" cellspacing="0" cellpadding="0" align="center" style=" background-repeat: repeat-x;">
				<tr><td>
			
                <div id="formPaper">
                    <div id="Content" class="content-1702Q">
                        <table width="746" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                    <table width="746" border="0" cellspacing="0" cellpadding="0" style="height:0px;">
                                        <tr>
                                            <td width="82"  style='padding:0px;' valign="middle" align="center">										
												<p><img src="{{ asset('images/birflog.gif') }}" width="51" height="49" valign='3' halign='3' alt="birlogo" /></p>
											</td>
                                            <td width="158" valign="middle">
                                                <label face="Arial" size="1px">Republika ng Pilipinas
                                                <br/>Kagawaran ng Pananalapi
                                                <br/>Kawanihan ng Rentas Internas</label>
                                            </td>
                                            <td width="0" align="center">
                                                    <font size="5px" style="font-weight:bold;">Quarterly Income<br/>Tax Return</font>
                                            </td>
                                            <td width="145" valign="center">
                                                <label face="Arial" size="1px">BIR Form No.<br/></label>
                                                <font face="Arial" size="6px">1702Q<br/></font>
                                                <label face="Arial" size="1px">July 2008(ENCS)</label>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" height="0">
                                    <label size="1px" face="Arial, Helvetica, sans-serif">For Corporations, Partnerships and Other Non-Individual Taxpayers</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="740" border="0" cellpadding="0" cellspacing="0" bordercolor="#F0F0F0" class="tblForm">
                                        <tr>
                                            <td width="238" height="33" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="15"><font size="2" style="font-weight:bold">&nbsp;1&nbsp;</font></td>
                                                        <td width="176"><font size="1" style="font-size: 11px;">For the&nbsp;
                                                                <input checked id="frm1702q:itemFiscalStartMonth:_1" name="frm1702q:itemFiscalStartMonth" type="radio" value="C" onclick="dateyear()" />
                                                                Calendar
                                                                <input id="frm1702q:itemFiscalStartMonth:_2" name="frm1702q:itemFiscalStartMonth" type="radio" value="F" onclick="dateyear()" />
                                                                Fiscal
                                                            </font> <font size="2" face="Arial">&nbsp;                                  </font> </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="201" rowspan="2" valign="top" class="tblFormTd"><span class="normal">
                                                </span>
                                                <span class="normal"></span>
                                                <table width="100%" border="0" cellpadding="0"
                                                       cellspacing="0" height="100%">
                                                    <tbody>
                                                        <tr valign="middle">
                                                            <td  height="20"><b><font size="2">&nbsp;3 &nbsp;</font></b> <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Quarter</font></td>
                                                        </tr>
                                                        <tr valign="middle" >
                                                            <td height="20">
                                                                    <table  border="0" cellpadding="0" cellspacing="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td><input id="frm1702q:optQtr:_1" name="frm1702q:optQtr"
                                                                                           value="1" type="radio" onclick="disable23(true); clear23();" />
                                                                                    <label for="frm1702q:optQtr:_1">1st</label></td>
                                                                                <td><input id="frm1702q:optQtr:_2" name="frm1702q:optQtr" value="2" type="radio" onclick="disable23(false); clear23();" />
                                                                                    <label for="frm1702q:optQtr:_2">2nd</label></td>
                                                                                <td><input id="frm1702q:optQtr:_3" name="frm1702q:optQtr"
                                                                                           value="3" type="radio" checked onclick="disable23(false); clear23();" />
                                                                                    <label for="frm1702q:optQtr:_3">3rd</label></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                <!--</fieldset>-->
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <span class="normal">
                                                    <label class="fieldNumber1 iceOutLbl" id="frm1702Q:j_id149"></label>
                                                </span>
                                            </td>
                                            <td width="145" rowspan="2" valign="top" class="tblFormTd"><table height="29">
                                                    <tr>
                                                        <td width="155" height="23"><table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="15"><font size="2" style="font-weight:bold">&nbsp;4&nbsp;</font></td>
                                                                    <td width="176"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Amended Return?&nbsp; </font></td>
                                                                </tr>
                                                            </table></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="23"><table border="0" cellpadding="0" cellspacing="0" class="iceSelOneRb">
                                                                <tr>
                                                                    <td><input id="frm1702q:optRemenderRtn_1" name="frm1702q:optRemenderRtn" type="radio" value="Y" onclick="d.getElementById('frm1702q:txt31F').disabled = false;" />
                                                                        <label class="iceSelOneRb" for="frm1702_v2:optShortPd:_1">Yes</label></td>
                                                                    <td><input checked="checked" id="frm1702q:optRemenderRtn_2" name="frm1702q:optRemenderRtn" type="radio" value="N" onclick="d.getElementById('frm1702q:txt31F').disabled = true; d.getElementById('frm1702q:txt31F').value = '0.00'; compute31H();" />
                                                                        <label class="iceSelOneRb" for="frm1702_v2:optShortPd:_2">No</label></td>
                                                                </tr>
                                                            </table></td>
                                                    </tr>
                                                </table></td>
                                            <td width="155" rowspan="2" valign="top" class="tblFormTd"><span class="normal">
                                                    <label class="iceOutLbl fieldLabel1" id="frm1702Q:j_id150"></label>
                                                </span>
                                                <table>
                                                    <tr>
                                                        <td height="24"><table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="15"><font size="2" style="font-weight:bold">&nbsp;5&nbsp;</font></td>
                                                                    <td width="176"><font size="1" style="font-size: 11px;">No. of Sheets Attached </font></td>
                                                                </tr>
                                                            </table></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input id="frm1702q:txtSheets" maxlength="2" name="frm1702q:txtSheets"  size="4" style="text-align:right" type="text" value="0" onkeypress="return wholenumber(this, event)"/></td>
                                                    </tr>
                                                </table>
                                                <p class="normal">&nbsp;                                                             </p></td>
                                        </tr>
                                        <tr>
                                            <td height="32" valign="top" class="tblFormTd"><table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="15"><font size="2" style="font-weight:bold">&nbsp;2&nbsp;</font></td>
                                                        <td width="176"><font size="1" style="font-size: 11px;">Year Ended (MM/YYYY)
                                                            </font></td>
                                                    </tr>
                                                </table>
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold">&nbsp;&nbsp;</font></td>
                                                        <td width="180" nowrap><span class="top">
                                                                <select id="frm1702q:itemYearEndMonth" name="frm1702q:itemYearEndMonth" size="1" onblur="datemonth()" >
                                                                    <option value="00"> </option>
																	<option value="01">01 - January</option>
                                                                    <option value="02">02 - February</option>
                                                                    <option value="03">03 - March</option>
                                                                    <option value="04">04 - April</option>
                                                                    <option value="05">05 - May</option>
                                                                    <option value="06">06 - June</option>
                                                                    <option value="07">07 - July</option>
                                                                    <option value="08">08 - August</option>
                                                                    <option value="09">09 - September</option>
                                                                    <option value="10">10 - October</option>
                                                                    <option value="11">11 - November</option>
                                                                    <option selected="selected" value="12">12 - December</option>
                                                                </select>
                                                                <input id="frm1702q:txtYearEnded" maxlength="4" name="frm1702q:txtYearEnded" size="2" style="text-align: right" type="text" value="" onblur="blockletterWithout2Decimal(this)" onkeypress="return wholenumber(this, event)" />
                                                            </span></td>
                                                    </tr>
                                                </table>

                                            </td>
                                        </tr>
                                    </table></td>
                            </tr><tr>
                                <td>
                                    <table width="740" border="0" cellspacing="0" cellpadding="0" class="tblForm">

                                        <tr>
                                            <td width="740" colspan="2" class="tblFormTdPart">
                                                <table width="81%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="20%">&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;">Part I</font></td>
                                                        <td width="80%">
                                                            <div align="center"><font size="2" style="font-weight:bold;letter-spacing: 3px;">Background Information</font></div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="740">
                                        <tr>
                                            <td width="295" valign="top" class="tblFormTd"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="10%"><font size="2" style="font-weight:bold">&nbsp;6&nbsp;</font></td>
                                                        <td width="20%"><font size="1" style="font-size: 11px;">TIN</font></td>
                                                        <td width="70%"><font size="1">
                                                                <input type="text" id="frm1702q:txtTin1" name="frm1702q:txtTin1" value="{{$company->tin1}}" size="1" maxlength="3" onkeypress="return wholenumber(this, event)" disabled />
                                                                <input type="text" id="frm1702q:txtTin2" name="frm1702q:txtTin2" value="{{$company->tin2}}" size="1" maxlength="3" onkeypress="return wholenumber(this, event)" disabled/>
                                                                <input type="text" id="frm1702q:txtTin3" name="frm1702q:txtTin3" value="{{$company->tin3}}" size="1" maxlength="3" onkeypress="return wholenumber(this, event)" disabled/>
                                                                <input type="text" id="frm1702q:txtBranchCode" name="frm1702q:txtBranchCode" value="{{$company->tin4}}" size="1" maxlength="3" onkeypress="return letternumber(event)" disabled/>
                                                            </font></td>
                                                    </tr>
                                                </table></td>
                                            <td width="182" valign="top" class="tblFormTd"><table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="22"><font size="2" style="font-weight:bold">&nbsp;7&nbsp;</font></td>
                                                        <td width="64"><font size="1" style="font-size: 11px;">RDO Code

                                                            </font></td>
                                                        <td width="48" id="rdoSelect">
															<select class='iceSelOneMnu' id='frm1702q:txtRdoCode' name='frm1702q:txtRdoCode' size='1' disabled >
                                                                <option value='{{$company->rdo_code}}'>{{$company->rdo_code}}</option>
                                                            </select>
														</td>
                                                    </tr>
                                                </table></td>
                                            <td width="263" valign="top" class="tblFormTd"><table width="228" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="15"><font size="2" style="font-weight:bold">&nbsp;8&nbsp;</font></td>
                                                        <td width="88"><label size="1" style="font-size: 11px;">Line of Business/Occupation</label></td>
                                                        <td width="159"><span class="normal">
                                                                <input id="frm1702q:txtDescription" value="{{$company->line_business}}" name="frm1702q:txtDescription" size="18" type="text" onblur = "return capital(this, event)" disabled/>
                                                            </span></td>
                                                    </tr>
                                                </table></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="740" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr><td width="548" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;9&nbsp;</font></td>
                                                                    <td><font size="1" style="font-size: 11px;">Taxpayer's Name</font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="25">&nbsp;</td>
                                                                    <td><span class="normal">
                                                                            <input id="frm1702q:txtTaxpayerName" maxlength="75" name="frm1702q:txtTaxpayerName" size="63" type="text" value="{{$company->registered_name}}" onblur = "return capital(this, event)" disabled/>
                                                                        </span></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="192" valign="top" class="tblFormTd"><table width="130" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="149"><font size="2" style="font-weight:bold;">&nbsp;10&nbsp;</font><font face="Arial" size="1" style="font-size: 11px;">Telephone Number&nbsp;</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td><div align="center"><span class="normal"><font face="Arial" size="1">
                                                                        <input id="frm1702q:txtTelNum" maxlength="7" name="frm1702q:txtTelNum" size="15" value="{{$company->tel_number}}" type="text" onkeypress="return wholenumber(this, event)" disabled/>
                                                                    </font> </span> </div></td>
                                                    </tr>
                                                </table></td></tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="740" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="551" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;11&nbsp;</font></td>
                                                                    <td><font size="1" style="font-size: 11px;">Registered Address</font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="25">&nbsp;</td>
                                                                    <td>
                                                                        <input id="frm1702q:txtTaxPayerAdd" name="frm1702q:txtTaxPayerAdd"  size="85" type="text" value="{{$company->address}}" onblur = "return capital(this, event)" disabled/>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="740">
                                        <tr>
                                            <td height="47" valign="top" class="tblFormTd">
                                                <table width="100%" align="left" border="0" cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                        <tr valign="middle">
                                                            <td>
                                                                <table width="300" border="0" cellpadding="0" cellspacing="0">
                                                                    <tr>
                                                                        <td width="25"><font size="2" style="font-weight:bold;">&nbsp;12&nbsp;</font></td>
                                                                        <td><font size="1" style="font-size: 11px;">Zip Code</font></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="25">&nbsp;</td>
                                                                        <td>
                                                                            <div align="left">
                                                                                <input id="frm1702q:txtTaxPayerZip" maxlength="4" name="frm1702q:txtTaxPayerZip" type="text" value="{{$company->zip_code}}" onkeypress="return wholenumber(this, event)" style="text-align: right;" disabled/>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td> <table width="335" border="0" cellpadding="0" cellspacing="0">
                                                                    <tr>
                                                                        <td width="335"><font size="2" style="font-weight:bold;">&nbsp;13&nbsp;</font><font size="1" style="font-size: 11px;">Method of Deduction</font></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <!--<fieldset>-->
                                                                                <input type="radio" id="1702q:OptMethodDeduct_1" name="1702q:OptMethodDeduct" value="I" checked onclick="disable21C()" /> <label> Itemized Deduction</label>
                                                                                <input type="radio" id="1702q:OptMethodDeduct_2" name="1702q:OptMethodDeduct" value="O" onclick="disable21C()" /> <label> 40% Optional Standard Deduction</label>
                                                                            <!--</fieldset>-->
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td></td>
                                                        </tr>

                                                    </tbody>
                                                </table></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="740" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr><td width="548" valign="top" class="tblFormTd">
                                                <table width="100%" align="left" border="0" cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                        <tr valign="middle">
                                                            <td colspan="2" width="75%">&nbsp;<b><font face="Arial, Helvetica, sans-serif" size="2">14</font> <font size="-1"><font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></font></b>
                                                                <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Are you availing of tax relief under Special Law or International Tax Treaty?</font></td>
                                                            <td width="25%"><b><font face="Arial, Helvetica, sans-serif" size="2">15&nbsp;&nbsp;
																<a href="#" id="btnATC" onclick="showATClist()" >ATC</a>
																</font></b></td>
                                                        </tr>
                                                        <tr valign="middle">
                                                            <td width="20%" height="20"><!--<fieldset>-->
                                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td><input id="frm1702q:optTreaty:_1" name="frm1702q:optTreaty" value="Y" type="radio" onclick="enableSelTreaty()" />
                                                                                    <label for="frm1702q:optTreaty:_1">Yes</label></td>
                                                                                <td><input checked="checked" id="frm1702q:optTreaty:_2" name="frm1702q:optTreaty" value="N" type="radio" onclick="disableSelTreaty()" />
                                                                                    <label for="frm1702q:optTreaty:_2">No</label></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                <!--</fieldset>--></td>
                                                            <td width="55%"><font face="Arial, Helvetica, sans-serif" size="1"></font> <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">If yes, specify &nbsp;
                                                                    <select disabled="disabled" id="frm1702q:lstTaxTreaty" name="frm1702q:lstTaxTreaty" size="1">
                                                                        <option selected="selected" value="0"></option>
                                                                        <option value="1">Special Law</option>
                                                                        <option value="2">International Tax Treaty</option>
                                                                    </select>
                                                                </font></td>
                                                            <td height="20"><font size="1">
                                                                    <input disabled id="frm1702q:txtAtc" name="frm1702q:txtAtc"
                                                                           size="10" style="background-color: rgb(220, 220, 220);" type="text" />
                                                                </font> </td>
                                                        </tr>
                                                    </tbody>
                                                </table></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="740" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTdPart">
                                                <table width="613" height="17" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="124">&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;">Part
                                                                II</font></td>
                                                        <td width="489">
                                                            <div align="center"><font size="2" style="font-weight:bold;letter-spacing: 3px;">Computation
                                                	        of Tax</font></div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="740" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTd"><table width="98%"  border="0" cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="2" align="center" height="4"><div
                                                                    align="center"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Declaration This Quarter</font></div></td>
                                                            <td width="25%" align="center" height="4"><div
                                                                    align="center"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;"><b>EXEMPT</b></font> <b><font face="Arial, Helvetica, sans-serif" size="1"></font></b></div></td>
                                                            <td
                                                                colspan="4" align="center" height="4"><div align="center"><font
                                                                        face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;"><b>TAXABLE</b></font> <b><font face="Arial, Helvetica, sans-serif" size="1"></font></b></div></td>
                                                        </tr>
                                                        <tr valign="middle">
                                                            <td colspan="2" height="24"><div align="center"><b><font
                                                                            face="Arial, Helvetica, sans-serif" size="1"></font></b></div>
                                                                <font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                    face="Arial, Helvetica, sans-serif" size="1"></font></font></font></font></font></td>
                                                            <td
                                                                width="25%" height="24">&nbsp;</td>
                                                            <td width="3%" height="24">&nbsp;</td>
                                                            <td
                                                                width="24%" height="24"><div align="center"><font face="Arial,
                                                                                                              Helvetica, sans-serif" size="1" style="font-size: 11px;">Special Rate</font></div></td>
                                                            <td
                                                                width="3%" height="24">&nbsp;</td>
                                                            <td width="24%" height="24"><div
                                                                    align="center"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Regular Rate</font></div></td>
                                                        </tr>
                                                        <tr valign="middle">
                                                            <td colspan="2"><div align="left"><font face="Arial,
                                                                                                    Helvetica, sans-serif" size="2"><b>16</b></font><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Sales/Revenues/Receipts/Fees</font></div></td>
                                                            <td
                                                                width="25%"><font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                    face="Arial, Helvetica, sans-serif" size="1"></font> <font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                    face="Arial, Helvetica, sans-serif" size="1"><b><font face="Arial,
                                                                                                                                                      Helvetica, sans-serif" size="2">16A</font></b>
                                                                                                    <input id="frm1702q:txt16A" name="frm1702q:txt16A" maxlength="17" size="14" style="color: black; text-align: right;" value="0.00"
                                                                                                           type="text" onblur="round(this,2); compute18A()" onkeypress="return numbersonly(this, event)" />
                                                                                                </font></font></font></font></font></font></font></font></font></td>
                                                            <td
                                                                width="3%"><div align="left"><font face="Arial, Helvetica, sans-serif"
                                                                                               size="1"><b><font size="2">16B</font></b></font></div></td>
                                                            <td
                                                                width="24%"><div align="left"><font size="1"><font size="1"><font
                                                                                size="1"><font size="1"><font face="Arial, Helvetica, sans-serif"
                                                                                                          size="1"></font> <font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                        face="Arial, Helvetica, sans-serif" size="1">
                                                                                                        <input id="frm1702q:txt16B" maxlength="17" name="frm1702q:txt16B" size="19" style="color: black; text-align: right;" value="0.00"
                                                                                                               type="text" onblur="round(this,2); compute18B()" onkeypress="return numbersonly(this, event)" />
                                                                                                    </font></font></font></font></font> <font face="Arial, Helvetica, sans-serif" size="1"></font></font></font></font></font></div></td>
                                                            <td
                                                                width="3%"><div align="left"><font face="Arial, Helvetica, sans-serif"
                                                                                               size="2"><b>16C</b></font></div></td>
                                                            <td width="24%"><font size="1"><font
                                                                        size="1"><font size="1"><font size="1"><font face="Arial, Helvetica,
                                                                                                                 sans-serif" size="1"></font> <font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                    face="Arial, Helvetica, sans-serif" size="1">
                                                                                                    <input
                                                                                                        id="frm1702q:txt16C" maxlength="17" name="frm1702q:txt16C"
                                                                                                        size="19" style="color: black; text-align: right;" value="0.00"
                                                                                                        type="text" onblur="round(this,2); compute18C()" onkeypress="return numbersonly(this, event)" />
                                                                                                </font></font></font></font></font> <font face="Arial, Helvetica, sans-serif" size="1"></font></font></font></font></font></td>
                                                        </tr>
                                                        <tr valign="middle">
                                                            <td colspan="2"><div align="left"><font face="Arial,
                                                                                                    Helvetica, sans-serif" size="2"><b>17</b></font> <font face="Arial, Helvetica, sans-serif" size="1"></font>
                                                                    <font face="Arial, Helvetica, sans-serif" size="1"></font> <font face="Arial, Helvetica, sans-serif" size="1"></font>
                                                                    <font face="Arial, Helvetica, sans-serif" size="1"></font> <font face="Arial, Helvetica, sans-serif" size="2">
                                                                        <font size="1" style="font-size: 11px;">Less: Cost of Sales/Services</font></font></div></td>
                                                            <td width="25%"><font
                                                                    size="1"><font size="1"><font size="1"><font size="1"><font face="Arial,
                                                                                                                            Helvetica, sans-serif" size="1"></font> <font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                    face="Arial, Helvetica, sans-serif" size="1"><b><font face="Arial,
                                                                                                                                                      Helvetica, sans-serif" size="2">17A</font></b>
                                                                                                    <input id="frm1702q:txt17A" name="frm1702q:txt17A" maxlength="17" size="14" style="color: black; text-align: right;" value="0.00"
                                                                                                           type="text" onblur="round(this,2); compute18A()" onkeypress="return numbersonly(this, event)" />
                                                                                                </font></font></font></font></font> <font face="Arial, Helvetica, sans-serif" size="1"></font></font></font></font></font></td>
                                                            <td
                                                                width="3%"><div align="left"><font face="Arial, Helvetica, sans-serif"
                                                                                               size="1"><b><font size="2">17B</font></b></font></div></td>
                                                            <td  width="24%"><font face="Arial, Helvetica, sans-serif" size="1">
                                                                    <input id="frm1702q:txt17B" name="frm1702q:txt17B" maxlength="17"  size="19" style="color: black; text-align: right;" value="0.00"
                                                                           type="text" onblur="round(this,2); compute18B()" onkeypress="return numbersonly(this, event)" />
                                                                </font></td>
                                                            <td width="3%"><div
                                                                    align="left"><font face="Arial, Helvetica, sans-serif" size="2"><b>17C</b></font></div></td>
                                                            <td
                                                                width="24%"><font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                    face="Arial, Helvetica, sans-serif" size="1"></font> <font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                    face="Arial, Helvetica, sans-serif" size="1">
                                                                                                    <input id="frm1702q:txt17C" name="frm1702q:txt17C" maxlength="18"
                                                                                                           size="19" style="color: black; text-align: right;" value="0.00"
                                                                                                           type="text" onblur="round(this,2); compute18C()" onkeypress="return numbersonly(this, event)" />
                                                                                                </font></font></font></font></font> <font face="Arial, Helvetica, sans-serif" size="1"></font></font></font></font></font></td>
                                                        </tr>
                                                        <tr valign="middle">
                                                            <td colspan="2"><div align="left"><b><font
                                                                            face="Arial, Helvetica, sans-serif" size="2">18</font></b> <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Gross Income</font></div></td>
                                                            <td
                                                                width="25%"><font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                    face="Arial, Helvetica, sans-serif" size="1"></font> <font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                    face="Arial, Helvetica, sans-serif" size="1"><b><font face="Arial,
                                                                                                                                                      Helvetica, sans-serif" size="2">18A</font></b>
                                                                                                    <input
                                                                                                        disabled="true" id="frm1702q:txt18A" name="frm1702q:txt18A"
                                                                                                        maxlength="25"
                                                                                                        size="14" style="background-color: rgb(220, 220, 220);text-align: right;" value="0.00" type="text" />
                                                                                                </font></font></font></font></font> <font face="Arial, Helvetica, sans-serif" size="1"></font></font></font></font></font></td>
                                                            <td
                                                                width="3%"><div align="left"><font face="Arial, Helvetica, sans-serif"
                                                                                               size="2"><b>18B</b></font></div></td>
                                                            <td width="24%"><font size="1"><font
                                                                        size="1"><font size="1"><font size="1"><font face="Arial, Helvetica,
                                                                                                                 sans-serif" size="1">
                                                                                    <input class="iceInpTxt-dis" disabled="true"
                                                                                           id="frm1702q:txt18B" name="frm1702q:txt18B" maxlength="25"
                                                                                           size="19" style="background-color: rgb(220, 220, 220); text-align:right;" value="0.00" type="text" />
                                                                                </font></font></font></font></font></td>
                                                            <td
                                                                width="3%"><div align="left"><font face="Arial, Helvetica, sans-serif"
                                                                                               size="2"><b>18C</b></font></div></td>
                                                            <td width="24%"><font size="1"><font
                                                                        size="1"><font size="1"><font size="1"><font face="Arial, Helvetica,
                                                                                                                 sans-serif" size="1"></font> <font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                    face="Arial, Helvetica, sans-serif" size="1">
                                                                                                    <input disabled="true" id="frm1702q:txt18C" name="frm1702q:txt18C" 
                                                                                                           maxlength="25"
                                                                                                           size="19" style="background-color: rgb(220, 220, 220); text-align:right;" value="0.00" type="text" />
                                                                                                </font></font></font></font></font> <font face="Arial, Helvetica, sans-serif" size="1"></font></font></font></font></font></td>
                                                        </tr>
                                                        <tr valign="middle">
                                                            <td colspan="3"><div align="left"><font face="Arial,
                                                                                                    Helvetica, sans-serif" size="1" style="font-size: 11px;"><b><font size="2">19</font></b> &nbsp;&nbsp;&nbsp;Add : Other Non-Operating and Taxable Income</font></div></td>
                                                            <td
                                                                width="3%"><div align="left"><font face="Arial, Helvetica, sans-serif"
                                                                                               size="2"><b>19A</b></font></div></td>
                                                            <td width="24%"><font size="1"><font
                                                                        size="1"><font size="1"><font size="1"><font face="Arial, Helvetica,
                                                                                                                 sans-serif" size="1"></font> <font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                    face="Arial, Helvetica, sans-serif" size="1">
                                                                                                    <input id="frm1702q:txt19A" name="frm1702q:txt19A" maxlength="17"
                                                                                                           size="19" style="color: black; text-align: right;" value="0.00"
                                                                                                           type="text" onblur="round(this,2); compute20B()" onkeypress="return numbersonly(this, event)" />
                                                                                                </font></font></font></font></font> <font face="Arial, Helvetica, sans-serif" size="1"></font></font></font></font></font></td>
                                                            <td
                                                                width="3%"><div align="left"><font face="Arial, Helvetica, sans-serif"
                                                                                               size="2"><b>19B</b></font></div></td>
                                                            <td width="24%"><font size="1"><font
                                                                        size="1"><font size="1"><font size="1"><font face="Arial, Helvetica,
                                                                                                                 sans-serif" size="1">
                                                                                    <input id="frm1702q:txt19B" name="frm1702q:txt19B" 
                                                                                           maxlength="17"
                                                                                           size="19" style="color: black; text-align: right;" value="0.00"
                                                                                           type="text" onblur="round(this,2); compute20C()" onkeypress="return numbersonly(this, event)" />
                                                                                </font></font></font></font></font></td>
                                                        </tr>
                                                        <tr valign="middle">
                                                            <td colspan="2"><font face="Arial, Helvetica,
                                                                                  sans-serif" size="2"><b>20</b></font><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Total Gross Income</font></td>
                                                            <td
                                                                width="25%"><font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                    size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                    face="Arial, Helvetica, sans-serif" size="1"><b><font face="Arial,Helvetica, sans-serif" size="2">20A</font></b>
                                                                                                    <input disabled="true" id="frm1702q:txt20A" name="frm1702q:txt20A" 
                                                                                                           maxlength="25"
                                                                                                           size="14" style="background-color: rgb(220, 220, 220); text-align:right;" value="0.00" type="text" />
                                                                                                </font></font></font></font></font></font></font></font></font></td>
                                                            <td
                                                                width="3%"><div align="left"><font size="1"><font size="1"><font
                                                                                size="1"><font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                    size="1"><font face="Arial, Helvetica, sans-serif" size="1"><b><font size="2">20</font><font
                                                                                                                face="Arial, Helvetica, sans-serif" size="2">B</font></b></font></font></font></font></font></font></font></font></font></div></td>
                                                            <td
                                                                width="24%"><font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                    size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                    face="Arial, Helvetica, sans-serif" size="1">
                                                                                                    <input
                                                                                                        class="iceInpTxt-dis" disabled="true" id="frm1702q:txt20B" name="frm1702q:txt20B"
                                                                                                        maxlength="25"
                                                                                                        size="19" style="background-color: rgb(220, 220, 220); text-align:right;" value="0.00" type="text" />
                                                                                                </font></font></font></font></font></font></font></font></font></td>
                                                            <td
                                                                width="3%"><div align="left"><font size="1"><font size="1"><font
                                                                                size="1"><font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                    size="1"><font face="Arial, Helvetica, sans-serif" size="1"><b><font size="2">20</font><font
                                                                                                                face="Arial, Helvetica, sans-serif" size="2">C</font></b></font></font></font></font></font></font></font></font></font></div></td>
                                                            <td
                                                                width="24%"><font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                    size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                    face="Arial, Helvetica, sans-serif" size="1">
                                                                                                    <input
                                                                                                        disabled="true" id="frm1702q:txt20C" name="frm1702q:txt20C"
                                                                                                        maxlength="25"
                                                                                                        size="19" style="background-color: rgb(220, 220, 220); text-align:right;" value="0.00" type="text" />
                                                                                                </font></font></font></font></font></font></font></font></font></td>
                                                        </tr>
                                                        <tr valign="middle">
                                                            <td colspan="2"><font face="Arial, Helvetica,
                                                                                  sans-serif" size="2"><b>21</b></font> <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">&nbsp;&nbsp;Less : Deductions</font></td>
                                                            <td width="20%"><font face="Arial, Helvetica, sans-serif" size="1"><b><font face="Arial, Helvetica, sans-serif" size="2">21A</font></b>
                                                                    <input id="frm1702q:txt21A" name="frm1702q:txt21A" maxlength="17"  size="14" style="color: black; text-align: right;" value="0.00"
                                                                           type="text" onblur="round(this,2)" onkeypress="return numbersonly(this, event)" />
                                                                </font></td>
                                                            <td
                                                                width="3%"><div align="left"><font size="1"><font size="1"><font
                                                                                size="1"><font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                    size="1"><font face="Arial, Helvetica, sans-serif" size="2"><b>21B</b></font></font></font></font></font></font></font></font></font></div></td>
                                                            <td
                                                                width="24%"><font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                    size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                    face="Arial, Helvetica, sans-serif" size="1">
                                                                                                    <input id="frm1702q:txt21B" name="frm1702q:txt21B" maxlength="17" size="19" style="color: black; text-align: right;" value="0.00"
                                                                                                           type="text" onblur="round(this,2); compute22A()" onkeypress="return numbersonly(this, event)" />
                                                                                                </font></font></font></font></font></font></font></font></font></td>
                                                            <td
                                                                width="3%"><div align="left"><font size="1"><font size="1"><font
                                                                                size="1"><font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                    size="1"><font face="Arial, Helvetica, sans-serif" size="1"><b><font
                                                                                                                face="Arial, Helvetica, sans-serif" size="2">21C</font></b></font></font></font></font></font></font></font></font></font></div></td>
                                                            <td
                                                                width="24%"><font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                    size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                    face="Arial, Helvetica, sans-serif" size="1">
                                                                                                    <input
                                                                                                        id="frm1702q:txt21C" name="frm1702q:txt21C" maxlength="17"
                                                                                                        size="19" style="color: black; text-align: right;" value="0.00"
                                                                                                        type="text"  onblur="round(this,2); compute22B()" onkeypress="return numbersonly(this, event)" />
                                                                                                </font></font></font></font></font></font></font></font></font></td>
                                                        </tr>
                                                        <tr valign="middle">
                                                            <td colspan="3"><font face="Arial, Helvetica,
                                                                                  sans-serif" size="2"><b>22</b></font> <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Taxable Income This Quarter</font> <font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                    size="1"><font size="1"><font size="1"><font size="1"><font face="Arial,
                                                                                                                                            Helvetica, sans-serif" size="1"></font></font></font></font></font></font></font></font></font></td>
                                                            <td
                                                                width="3%"><div align="left"><font face="Arial, Helvetica, sans-serif"
                                                                                               size="2"><b>22A</b></font></div></td>
                                                            <td width="24%"><font size="1"><font
                                                                        size="1"><font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                            size="1"><font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                                size="1"><font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                                                    face="Arial, Helvetica, sans-serif" size="1">
                                                                                                                                    <input disabled="true" id="frm1702q:txt22A" name="frm1702q:txt22A"
                                                                                                                                           maxlength="25"
                                                                                                                                           size="19" style="background-color: rgb(220, 220, 220); text-align:right;" value="0.00" type="text" />
                                                                                                                                </font></font></font></font></font></font></font></font></font></font></font></font></font></font></font></font></font></td>
                                                            <td
                                                                width="3%"><div align="left"><font face="Arial, Helvetica, sans-serif"
                                                                                               size="2"><b>22B</b></font></div></td>
                                                            <td width="24%"><font size="1"><font
                                                                        size="1"><font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                            size="1"><font size="1"><font face="Arial, Helvetica, sans-serif"
                                                                                                                      size="1">
                                                                                                    <input disabled="true"
                                                                                                           id="frm1702q:txt22B" name="frm1702q:txt22B" maxlength="25"
                                                                                                           size="19" style="background-color: rgb(220, 220, 220); text-align:right;" value="0.00" type="text" />
                                                                                                </font></font></font></font></font></font></font></font></font></td>
                                                        </tr>
                                                        <tr valign="middle">
                                                            <td colspan="3"><font face="Arial, Helvetica,
                                                                                  sans-serif" size="2"><b>23</b></font> <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;Add : Taxable Income from Previous Quarter(s)</font></td>
                                                            <td width="3%"><div
                                                                    align="left"><font face="Arial, Helvetica, sans-serif" size="2"><b>23A</b></font></div></td>
                                                            <td
                                                                width="24%"><font face="Arial, Helvetica, sans-serif" size="1">
                                                                    <input id="frm1702q:txt23A" maxlength="17" name="frm1702q:txt23A"
                                                                           size="19" style="color: black; text-align:right;" value="0.00" type="text" onblur="round(this,2); compute24A()" onkeypress="return numbersWithNegative(this, event)" />
                                                                </font></td>
                                                            <td
                                                                width="3%"><div align="left"><font face="Arial, Helvetica, sans-serif"
                                                                                               size="2"><b>23B</b></font></div></td>
                                                            <td width="24%"><font face="Arial, Helvetica, sans-serif" size="1">
                                                                    <input id="frm1702q:txt23B" name="frm1702q:txt23B" maxlength="17" size="19" style="color: black; text-align:right;" value="0.00" type="text" onblur="round(this,2); compute24B()" onkeypress="return numbersWithNegative(this, event)" />
                                                                </font></td>
                                                        </tr>
                                                        <tr valign="middle">
                                                            <td colspan="3"><font face="Arial, Helvetica,
                                                                                  sans-serif" size="2"><b>24</b></font> <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Total Taxable Income to Date</font></td>
                                                            <td width="3%"><div align="left"><font face="Arial,
                                                                                                   Helvetica, sans-serif" size="2"><b>24A</b></font></div></td>
                                                            <td
                                                                width="24%"><font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                    size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                    face="Arial, Helvetica, sans-serif" size="1">
                                                                                                    <input disabled="true" id="frm1702q:txt24A"
                                                                                                           maxlength="25" name="frm1702q:txt24A"
                                                                                                           size="19" style="background-color: rgb(220, 220, 220); text-align:right;" value="0.00" type="text" />
                                                                                                </font></font></font></font></font></font></font></font></font></td>
                                                            <td
                                                                width="3%"><div align="left"><font face="Arial, Helvetica, sans-serif"
                                                                                               size="2"><b>24B</b></font></div></td>
                                                            <td width="24%"><font size="1"><font
                                                                        size="1"><font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                            size="1"><font size="1"><font face="Arial, Helvetica, sans-serif"
                                                                                                                      size="1">
                                                                                                    <input disabled="true"
                                                                                                           id="frm1702q:txt24B" name="frm1702q:txt24B" maxlength="25"
                                                                                                           size="19" style="background-color: rgb(220, 220, 220); text-align:right;" value="0.00" type="text" />
                                                                                                </font></font></font></font></font></font></font></font></font></td>
                                                        </tr>
                                                        <tr valign="middle">
                                                            <td colspan="3"><font face="Arial, Helvetica,
                                                                                  sans-serif" size="2"><b>25</b></font> <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Tax Rate (Except MCIT Rate)</font></td>
                                                            <td width="3%"><div align="left"><font face="Arial,
                                                                                                   Helvetica, sans-serif" size="2"><b>25A</b></font></div></td>
                                                            <td
                                                                width="24%"><font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                    size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                    face="Arial, Helvetica, sans-serif" size="1">
                                                                                                    <input id="frm1702q:txt25A" name="frm1702q:txt25A" maxlength="5" name="frm1702q:txt25A"
                                                                                                           size="5" style="color: black; text-align: right;" value="0.00"
                                                                                                           type="text" onblur="round(this,2); compute26A()" onkeypress="return numbersonly(this, event)" />
                                                                                                </font> <b>%</b></font></font></font></font></font></font></font></font></td>
                                                            <td
                                                                width="3%"><div align="left"><font face="Arial, Helvetica, sans-serif"
                                                                                               size="2"><b>25B</b></font></div></td>
                                                            <td width="24%"><font size="1"><font
                                                                        size="1"><font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                            size="1"><font size="1"><font face="Arial, Helvetica, sans-serif"
                                                                                                                      size="1">
                                                                                                    <input disabled="true"
                                                                                                           id="frm1702q:txt25B" name="frm1702q:txt25B" maxlength="5"
                                                                                                           size="7" style="background-color: rgb(220, 220, 220); text-align:right;" value="0.00" type="text" />
                                                                                                </font> <b>%</b></font></font></font></font></font></font></font></font></td>
                                                        </tr>
                                                        <tr valign="middle">
                                                            <td colspan="3" height="16"><font face="Arial,
                                                                                              Helvetica, sans-serif" size="2"><b>26</b></font> <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Income Tax (Other Than MCIT)</font></td>
                                                            <td width="3%" height="16"><div align="left"><font
                                                                        face="Arial, Helvetica, sans-serif" size="2"><b>26A</b></font></div></td>
                                                            <td
                                                                width="24%" height="16"><font size="1"><font size="1"><font size="1"><font
                                                                                size="1"><font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                    face="Arial, Helvetica, sans-serif" size="1">
                                                                                                    <input disabled="true" id="frm1702q:txt26A" name="frm1702q:txt26A" 
                                                                                                           maxlength="25"
                                                                                                           size="19" style="background-color: rgb(220, 220, 220); text-align:right;" value="0.00" type="text" />
                                                                                                </font></font></font></font></font></font></font></font></font></td>
                                                            <td
                                                                width="3%" height="16"><div align="left"><font face="Arial, Helvetica,
                                                                                                           sans-serif" size="2"><b>26B</b></font></div></td>
                                                            <td width="24%"
                                                                height="16"><font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                    size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                    face="Arial, Helvetica, sans-serif" size="1">
                                                                                                    <input
                                                                                                        id="frm1702q:txt26B" name="frm1702q:txt26B" maxlength="15"
                                                                                                        size="19" style="background-color: rgb(220, 220, 220); text-align: right;"
                                                                                                        value="0.00" type="text" />
                                                                                                </font></font></font></font></font></font></font></font></font></td>
                                                        </tr>
                                                        <tr valign="middle">
                                                            <td width="3%" colspan="2" height="22">
                                                            <font face="Arial, Helvetica, sans-serif" size="2"><b>27</b></font> 
                                                            <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">
                                                            	<b>Less: Share of Other Agencies (RA 7916 / 8748 etc.)</b></font>
                                                            </td>
                                                            <td height="22">
                                                            	
                                                            </td>
                                                            <td
                                                                width="3%" height="22"><div align="left"><font face="Arial, Helvetica,
                                                                                                           sans-serif" size="2"><b>27</b></font></div></td>
                                                            <td width="24%"
                                                                height="22"><font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                    size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                    face="Arial, Helvetica, sans-serif" size="1">
                                                                                                    <input 
                                                                                                        id="frm1702q:txt27" name="frm1702q:txt27" maxlength="17"
                                                                                                        size="19" style="color: black; text-align: right;" value="0.00"
                                                                                                        type="text" onblur="round(this,2); compute29D()" onkeypress="return numbersonly(this, event)" />
                                                                                                </font></font></font></font></font></font></font></font></font></td>
                                                            <td
                                                                width="3%" height="22"><div align="left"></div></td>
                                                            <td width="24%"
                                                                height="22">&nbsp;</td>
                                                        </tr>
                                                        <tr valign="middle">
                                                            <td width="3%" colspan="2" height="22"><div align="left"><font
                                                                            face="Arial, Helvetica, sans-serif" size="2"><b>28</b></font> 
                                                                            <font style="font-size: 11px;"><b>Minimum Corporate Income Tax (MCIT) (see
                                                                            <a href="#" id="btnSched1" onclick="showSched1Div()" >Schedule 1</a>)</font>
                                                                            </div></td>
                                                            <td  height="22"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">
                                                                	</b></font></td>
                                                            <td width="3%" height="22"><div align="left"><font
                                                                        face="Arial, Helvetica, sans-serif" size="2"><b></b></font></div></td>
                                                            <td
                                                                width="24%" height="22"><font size="1"><font size="1"><font size="1"><font
                                                                                size="1"><font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                    face="Arial, Helvetica, sans-serif" size="1"></font></font></font></font></font></font></font></font></font></td>
                                                            <td
                                                                width="3%" height="22"><div align="left"><font face="Arial, Helvetica,
                                                                                                           sans-serif" size="2"><b>28</b></font></div></td>
                                                            <td width="24%"
                                                                height="22"><font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                    size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                    face="Arial, Helvetica, sans-serif" size="1">
                                                                                                    <input id="frm1702q:txt28" name="frm1702q:txt28" maxlength="25"
                                                                                                           size="19" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" value="0.00"
                                                                                                           type="text" onblur="compute29A();" disabled />
                                                                                                </font></font></font></font></font></font></font></font></font></td>
                                                        </tr>
                                                    </tbody>
                                                </table></td>
                                        </tr>
                                        <tr>
                                            <td><table width="98%" border="0" bordercolor="#333333"
                                                       cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                        <tr valign="middle">
                                                            <td
                                                                colspan="5" height="26"><font face="Arial, Helvetica, sans-serif"
                                                                                          size="2"><b>29</b></font> <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;"><b>Tax Due</b></font></td>
                                                        </tr>
                                                        <tr valign="middle">
                                                            <td width="4%" height="13">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><font
                                                                        face="Arial, Helvetica, sans-serif" size="1"></font></b></td>
                                                            <td
                                                                width="3%" height="13"><div align="left"><font face="Arial, Helvetica,
                                                                                                           sans-serif" size="2"><b>29A&nbsp;</b></font>
                                                                                                           <font face="Arial, Helvetica, sans-serif" size="1"></font></div></td>
                                                            <td
                                                                width="66%" height="13"><b><label face="Arial, Helvetica, sans-serif"
                                                                                             size="1" style="font-size: 11px;">Tax on transactions under Regular Rate (Normal Income Tax or Minimum Corporate Income Tax whichever is higher)</label></b></td>
                                                            <td
                                                                width="3%" height="13"><div align="left"><font size="2"><b><font
                                                                                face="Arial, Helvetica, sans-serif">29A</font></b></font></div></td>
                                                            <td
                                                                width="24%" height="13"><div align="left"><font size="1"><font size="1"><font
                                                                                size="1"><font size="1"><font face="Arial, Helvetica, sans-serif"
                                                                                                          size="1"></font> <font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                        face="Arial, Helvetica, sans-serif" size="1">
                                                                                                        <input disabled="true" id="frm1702q:txt29A" name="frm1702q:txt29A" 
                                                                                                               maxlength="25"
                                                                                                               size="19" style="background-color: rgb(220, 220, 220); text-align:right;" value="0.00" type="text" />
                                                                                                    </font></font></font></font></font> <font face="Arial, Helvetica, sans-serif" size="1"></font></font></font></font></font></div></td>
                                                        </tr>
                                                        <tr valign="middle">
                                                            <td width="4%" height="13">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><font
                                                                        face="Arial, Helvetica, sans-serif" size="1"></font></b></td>
                                                            <td
                                                                width="3%" height="13"><div align="left"><font face="Arial, Helvetica,
                                                                                                           sans-serif" size="2"><b>29B</b></font> <b><font face="Arial, Helvetica, sans-serif" size="1"></font></b></div></td>
                                                            <td
                                                                colspan="3" width="66%" height="13"><b><label face="Arial, Helvetica,
                                                                                                         sans-serif" size="1" style="font-size: 11px;">Less: Unexpired Excess of Prior Year's MCIT over Normal Income Tax Rate</label></b></td>
                                                        </tr>
                                                        <tr valign="middle">
                                                            <td width="4%" height="13">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><font
                                                                        face="Arial, Helvetica, sans-serif" size="1"></font></b></td>
                                                            <td
                                                                width="3%" height="13"><div align="left"><font face="Arial, Helvetica,
                                                                                                           sans-serif" size="2"><b></b></font> <b><font face="Arial, Helvetica, sans-serif" size="1"></font></b></div></td>
                                                            <td
                                                                width="66%" height="13"><b><label face="Arial, Helvetica, sans-serif"
                                                                                             size="1" style="font-size: 11px;">(deductible only if the quarterly's tax due is the normal rate)</label></b></td>
                                                            <td width="3%" height="13"><div align="left"><font
                                                                        size="2"><b><font face="Arial, Helvetica, sans-serif">29B</font></b></font></div></td>
                                                            <td
                                                                width="24%" height="13"><div align="left"><font size="1"><font size="1"><font
                                                                                size="1"><font size="1"><font face="Arial, Helvetica, sans-serif"
                                                                                                          size="1"></font> <font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                        face="Arial, Helvetica, sans-serif" size="1">
                                                                                                        <input disabled="true" id="frm1702q:txt29B" name="frm1702q:txt29B"
                                                                                                               maxlength="17"
                                                                                                               size="19" style="color: black; text-align: right;" value="0.00"
                                                                                                               type="text" onblur="round(this,2); compute29C()" onkeypress="return numbersonly(this, event)" />
                                                                                                    </font></font></font></font></font> <font face="Arial, Helvetica, sans-serif" size="1"></font></font></font></font></font></div></td>
                                                        </tr>
                                                        <tr valign="middle">
                                                            <td width="4%" height="13">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><font
                                                                        face="Arial, Helvetica, sans-serif" size="1"></font></b></td>
                                                            <td
                                                                width="3%" height="13"><div align="left"><font face="Arial, Helvetica,
                                                                                                           sans-serif" size="2"><b>29C</b></font> <b><font face="Arial, Helvetica, sans-serif" size="1"></font></b></div></td>
                                                            <td
                                                                width="66%" height="13"><b><font face="Arial, Helvetica, sans-serif"
                                                                                             size="1" style="font-size: 11px;">Balance (Item 29A less Item 29B)</font></b></td>
                                                            <td
                                                                width="3%" height="13"><div align="left"><font size="2"><b><font
                                                                                face="Arial, Helvetica, sans-serif">29C</font></b></font></div></td>
                                                            <td
                                                                width="24%" height="13"><div align="left"><font size="1"><font size="1"><font
                                                                                size="1"><font size="1"><font face="Arial, Helvetica, sans-serif"
                                                                                                          size="1"></font> <font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                        face="Arial, Helvetica, sans-serif" size="1">
                                                                                                        <input disabled="true" id="frm1702q:txt29C"
                                                                                                               maxlength="25" name="frm1702q:txt29C"
                                                                                                               size="19" style="background-color: rgb(220, 220, 220); text-align:right;" value="0.00" type="text" />
                                                                                                    </font></font></font></font></font> <font face="Arial, Helvetica, sans-serif" size="1"></font></font></font></font></font></div></td>
                                                        </tr>
                                                    </tbody>
                                                </table></td>
                                        </tr>
                                        <tr>
                                            <td><table width="98%" border="0" bordercolor="#333333"
                                                       cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                        <tr valign="middle">
                                                            <td width="25%"><div align="left"><font face="Arial, Helvetica, sans-serif"
                                                                                                    size="1" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><font size="2">29D</font></b> Add: Tax Due to the BIR on transactions under <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Special Rate (26A less 27)</font></div></td>
                                                            <td width="1%"><div align="left"><font face="Arial, Helvetica, sans-serif"
                                                                                                   size="2"><b>29D</b></font></div></td>
                                                            <td width="28%"><font face="Arial, Helvetica, sans-serif" size="1">
                                                                    <input disabled="true" id="frm1702q:txt29D" name="frm1702q:txt29D" 
                                                                           maxlength="25"
                                                                           size="19" style="background-color: rgb(220, 220, 220); text-align:right;" value="0.00" type="text" />
                                                                </font></td>

                                                        </tr>
                                                    </tbody>
                                                </table></td>
                                        </tr>
                                        <tr>
                                            <td><table width="98%"  border="0" cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                        <tr valign="middle">
                                                            <td
                                                                colspan="3" height="26"><font face="Arial, Helvetica, sans-serif"
                                                                                          size="2"><b>30</b></font> <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;"><b>Aggregate Income Tax Due (Sum of Items 29C and 29D)</b></font></td>
                                                            <td width="3%"
                                                                height="26"><div align="left"><font face="Arial, Helvetica, sans-serif"
                                                                                                size="2"><strong>30</strong></font></div></td>
                                                            <td width="24%" height="26"><font face="Arial, Helvetica,sans-serif" size="1">
                                                                    <input disabled="true" id="frm1702q:txt30" maxlength="25" name="frm1702q:txt30" size="20" style="background-color: rgb(220, 220, 220); text-align: right;" value="0.00" type="text" />
                                                                </font></td>
                                                            <td
                                                                width="3%" height="26"><div align="left"><font face="Arial, Helvetica,
                                                                                                           sans-serif" size="2"><b></b></font></div></td>
                                                            <td width="25%"
                                                                height="26"><font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                    size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                    face="Arial, Helvetica, sans-serif" size="1"></font></font></font></font></font></font></font></font></font></td>
                                                        </tr>
                                                        <tr valign="middle">
                                                            <td width="4%" height="22"><div align="left"><b><font
                                                                            face="Arial, Helvetica, sans-serif" size="2">31</font> <font face="Arial, Helvetica, sans-serif" size="1"><b></b></font></b></div></td>
                                                            <td
                                                                colspan="2" height="22"><b><font face="Arial, Helvetica, sans-serif"
                                                                                             size="1" style="font-size: 11px;">Less: Tax Credits/Payments</font></b></td>
                                                        </tr>
                                                        <tr valign="middle">
                                                            <td width="3%" height="13">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><font
                                                                        face="Arial, Helvetica, sans-serif" size="1"></font></b></td>
                                                            <td
                                                                width="3%" height="13"><div align="left"><font face="Arial, Helvetica,
                                                                                                           sans-serif" size="2"><b>31A</b></font> <b><font face="Arial, Helvetica, sans-serif" size="1"></font></b></div></td>
                                                            <td
                                                                width="58%" height="13"><b><font face="Arial, Helvetica, sans-serif"
                                                                                             size="1" style="font-size: 11px;">Prior Year's Excess Credits - Taxes Withheld</font></b></td>
                                                            <td width="4%" height="13"><div
                                                                    align="left"><font size="2"><b><font face="Arial, Helvetica, sans-serif">31A</font></b></font></div></td>
                                                            <td
                                                                width="32%" height="13"><div align="left"><font
                                                                        face="Arial, Helvetica, sans-serif" size="1">
                                                                        <input id="frm1702q:txt31A" name="frm1702q:txt31A" maxlength="17"
                                                                               size="20" style="color: black; text-align: right;" value="0.00"
                                                                               type="text" onblur="round(this,2); compute31H()" onkeypress="return numbersonly(this, event)" />
                                                                    </font></div></td>
                                                        </tr>
                                                        <tr valign="middle">
                                                            <td width="3%" height="14"><b><font face="Arial,
                                                                                                Helvetica, sans-serif" size="1">&nbsp;&nbsp;&nbsp;&nbsp;</font></b></td>
                                                            <td
                                                                width="3%" height="14"><div align="left"><b><font face="Arial,
                                                                                                              Helvetica, sans-serif" size="2">31B</font> <b><font face="Arial, Helvetica, sans-serif" size="1"></font></b></b></div></td>
                                                            <td
                                                                width="58%" height="14"><b><label face="Arial, Helvetica, sans-serif"
                                                                                                size="1"  style="font-size: 11px;">Tax Payment(s) for the Previous Quarter(s) of the same taxable year other than MCIT</label><font face="Arial, Helvetica, sans-serif" size="1"><b></b></font></b></td>
                                                            <td
                                                                width="4%" height="14"><div align="left"><font size="2"><b><font
                                                                                face="Arial, Helvetica, sans-serif">31B</font></b></font></div></td>
                                                            <td
                                                                width="32%" height="14"><div align="left"><font size="1"><font size="1"><font
                                                                                size="1"><font size="1"><font face="Arial, Helvetica, sans-serif"
                                                                                                          size="1"></font> <font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                        face="Arial, Helvetica, sans-serif" size="1">
                                                                                                        <input id="frm1702q:txt31B" name="frm1702q:txt31B" maxlength="17"
                                                                                                               size="20" style="color: black; text-align:right;" value="0.00" type="text" onblur="round(this,2); compute31H()" onkeypress="return numbersonly(this, event)" />
                                                                                                    </font></font></font></font></font> <font face="Arial, Helvetica, sans-serif" size="1"></font></font></font></font></font></div></td>
                                                        </tr>
                                                        <tr valign="middle">
                                                            <td width="3%" height="14"><b><font face="Arial,
                                                                                                Helvetica, sans-serif" size="1">&nbsp;&nbsp;&nbsp;&nbsp;</font></b></td>
                                                            <td
                                                                width="3%" height="14"><div align="left"><b><font face="Arial,
                                                                                                              Helvetica, sans-serif" size="2">31C</font> <b><font face="Arial, Helvetica, sans-serif" size="1"></font></b></b></div></td>
                                                            <td
                                                                width="58%" height="14"><b><label face="Arial, Helvetica, sans-serif"
                                                                                                size="1" style="font-size: 11px;">MCIT Payment(s) for the Previous Quarter(s) of the same taxable year</label><font face="Arial, Helvetica, sans-serif" size="1"><b></b></font></b></td>
                                                            <td
                                                                width="4%" height="14"><div align="left"><font size="2"><b><font
                                                                                face="Arial, Helvetica, sans-serif">31C</font></b></font></div></td>
                                                            <td
                                                                width="32%" height="14"><div align="left"><font size="1"><font size="1"><font
                                                                                size="1"><font size="1"><font face="Arial, Helvetica, sans-serif"
                                                                                                          size="1"></font> <font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                        face="Arial, Helvetica, sans-serif" size="1">
                                                                                                        <input id="frm1702q:txt31C" name="frm1702q:txt31C" maxlength="17"
                                                                                                               size="20" style="color: black; text-align: right;" value="0.00"
                                                                                                               type="text" onblur="round(this,2); compute31H()" onkeypress="return numbersonly(this, event)" />
                                                                                                    </font></font></font></font></font> <font face="Arial, Helvetica, sans-serif" size="1"></font></font></font></font></font></div></td>
                                                        </tr>
                                                        <tr valign="middle">
                                                            <td width="3%" height="6"><div align="left"><b><font
                                                                            face="Arial, Helvetica, sans-serif" size="2"><b><font face="Arial,
                                                                                                                              Helvetica, sans-serif" size="1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></b></font></b></div></td>
                                                            <td
                                                                width="3%" height="6"><div align="left"><b><font face="Arial,
                                                                                                             Helvetica, sans-serif" size="2"><font face="Arial, Helvetica,
                                                                                                                 sans-serif" size="2">31D</font><font face="Arial, Helvetica, sans-serif" size="1"></font></b></b></font></b></div></td>
                                                            <td
                                                                width="58%" height="6"><b><font face="Arial, Helvetica, sans-serif"
                                                                                            size="2"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Creditable Tax Withheld for the Previous Quarter(s)</font> <font face="Arial, Helvetica, sans-serif" size="1"></b></font></b></font></b></td>
                                                            <td
                                                                width="4%" height="6"><div align="left"><font size="2"><b><font
                                                                                face="Arial, Helvetica, sans-serif">31D</font></b></font></div></td>
                                                            <td
                                                                width="32%" height="6"><div align="left"><font size="1"><font size="1"><font
                                                                                size="1"><font size="1"><font face="Arial, Helvetica, sans-serif"
                                                                                                          size="1"></font> <font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                        face="Arial, Helvetica, sans-serif" size="1"></font> <font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                                        size="1"><font size="1"><font size="1"><font size="1"><font face="Arial,
                                                                                                                                                                                Helvetica, sans-serif" size="1">
                                                                                                                                        <input id="frm1702q:txt31D" name="frm1702q:txt31D" maxlength="17"
                                                                                                                                               size="20" style="color: black; text-align: right;" value="0.00"
                                                                                                                                               type="text"  onblur="round(this,2); compute31H()" onkeypress="return numbersonly(this, event)" />
                                                                                                                                    </font></font></font></font></font></font></font></font></font></font></font></font></font> <font face="Arial, Helvetica, sans-serif" size="1"></font></font></font></font></font></div></td>
                                                        </tr>
                                                        <tr valign="middle">
                                                            <td width="3%" height="14"><div align="left"><b><font
                                                                            face="Arial, Helvetica, sans-serif" size="2"><b><font face="Arial,
                                                                                                                              Helvetica, sans-serif" size="2"><b><font face="Arial, Helvetica,
                                                                                                                         sans-serif" size="1">&nbsp;&nbsp;&nbsp;&nbsp;</font></b></font></b></font></b></div></td>
                                                            <td
                                                                width="3%" height="14"><div align="left"><b><font face="Arial,
                                                                                                              Helvetica, sans-serif" size="2"><font face="Arial, Helvetica,
                                                                                                                 sans-serif" size="2"><font face="Arial, Helvetica, sans-serif"
                                                                                                              size="2">31E</font> <font face="Arial, Helvetica, sans-serif" size="1"></font></b></font></b></font></b></div></td>
                                                            <td
                                                                width="58%" height="14"><b><font face="Arial, Helvetica, sans-serif"
                                                                                             size="2"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                                                <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Creditable Tax Withheld Per BIR Form No. 2307 for this Quarter</font>
                                                                                                <font face="Arial, Helvetica, sans-serif" size="1"></font></b></font>
                                                                            <font face="Arial, Helvetica, sans-serif" size="1"><b></b></font></b></font></b></td>
                                                            <td
                                                                width="4%" height="14"><div align="left"><font size="2"><b><font
                                                                                face="Arial, Helvetica, sans-serif">31E</font></b></font></div></td>
                                                            <td
                                                                width="32%" height="14"><div align="left"><font face="Arial, Helvetica, sans-serif" size="1">
                                                                        <input id="frm1702q:txt31E" name="frm1702q:txt31E" maxlength="17" size="20" style="color: black; text-align: right;" value="0.00" type="text" onblur="round(this,2); compute31H()" onkeypress="return numbersonly(this, event)" />
                                                                    </font></div></td>
                                                        </tr>
                                                        <tr valign="middle">
                                                            <td width="3%"><div align="left"><b><font
                                                                            face="Arial, Helvetica, sans-serif" size="2"><b><font face="Arial,
                                                                                                                              Helvetica, sans-serif" size="2"><b><font face="Arial, Helvetica,
                                                                                                                         sans-serif" size="1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font> <b><font face="Arial, Helvetica, sans-serif" size="1">

                                                                                            </font></b></b></font> <font face="Arial, Helvetica, sans-serif" size="1"><b></b></font></b></font></b></div></td>
                                                            <td
                                                                width="3%"><div align="left"><b><font face="Arial, Helvetica,
                                                                                                  sans-serif" size="2"><font face="Arial, Helvetica, sans-serif"
                                                                                                      size="2"><font face="Arial, Helvetica, sans-serif" size="2">31F</font></font></font></b></div></td>
                                                            <td
                                                                width="58%"><b><font face="Arial, Helvetica, sans-serif" size="2"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                                    <font face="Arial,Helvetica, sans-serif" size="1" style="font-size: 11px;">Tax Paid in Return Previously Filed, if this is an Amended Return</font></font></font></b></td>
                                                            <td
                                                                width="4%"><div align="left"><font size="2"><b><font face="Arial,
                                                                                                                 Helvetica, sans-serif">31F</font></b></font></div></td>
                                                            <td width="32%"><div
                                                                    align="left"><font size="1"><font size="1"><font size="1"><font
                                                                                    size="1"><font face="Arial, Helvetica, sans-serif" size="1"></font> <font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                        face="Arial, Helvetica, sans-serif" size="1">
                                                                                                        <input
                                                                                                            id="frm1702q:txt31F"
                                                                                                            maxlength="17" name="frm1702q:txt31F"

                                                                                                            size="20" style="color: black; text-align: right;" value="0.00"
                                                                                                            type="text" onblur="round(this,2); compute31H()" onkeypress="return numbersonly(this, event)" />
                                                                                                    </font></font></font></font></font> <font face="Arial, Helvetica, sans-serif" size="1"></font></font></font></font></font></div></td>
                                                        </tr>
                                                        <tr valign="middle">
                                                            <td width="3%" height="12"><div align="left"><b><font
                                                                            face="Arial, Helvetica, sans-serif" size="2"><b><font face="Arial,
                                                                                                                              Helvetica, sans-serif" size="2"><b><font face="Arial, Helvetica,
                                                                                                                         sans-serif" size="1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></b></font></b></font></b></div></td>
                                                            <td
                                                                width="3%" height="12"><div align="left"><b><font face="Arial,
                                                                                                              Helvetica, sans-serif" size="2"><font face="Arial, Helvetica,
                                                                                                                 sans-serif" size="2"><font face="Arial, Helvetica, sans-serif"
                                                                                                              size="2">31G</font> <b><font face="Arial, Helvetica, sans-serif" size="1"></font></b></font></font></b></div></td>
                                                            <td
                                                                width="58%" height="12"><b><font face="Arial, Helvetica, sans-serif"
                                                                                             size="2"><font face="Arial, Helvetica, sans-serif" size="2"><font size="1" style="font-size: 11px;">Others, please specify</font></font></font></b>
																							 <input id="frm1702q:txt31Gothers" name="frm1702q:txt31Gothers" maxlength="30" size="25" style="text-align:
																							   left;"  type="text"  /></td>
                                                            <td
                                                                width="4%" height="12"><div align="left"><font size="2"><b><font
                                                                                face="Arial, Helvetica, sans-serif">31G</font></b></font></div></td>
                                                            <td
                                                                width="32%" height="12"><div align="left"><font size="1"><font size="1"><font
                                                                                size="1"><font size="1"><font face="Arial, Helvetica, sans-serif"
                                                                                                          size="1"></font> <font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                        face="Arial, Helvetica, sans-serif" size="1">
                                                                                                        <input id="frm1702q:txt31G" name="frm1702q:txt31G" 
                                                                                                               maxlength="17"

                                                                                                               size="20" style="text-align:
                                                                                                               right;" value="0.00" type="text" onblur="round(this,2); compute31H()" onkeypress="return numbersonly(this, event)" />
                                                                                                    </font></font></font></font></font> <font face="Arial, Helvetica, sans-serif" size="1"></font></font></font></font></font></div></td>
                                                        </tr>
                                                        <tr valign="middle">
                                                            <td width="3%" height="12"><div align="left"><b><font
                                                                            face="Arial, Helvetica, sans-serif" size="2"><b><font face="Arial,
                                                                                                                              Helvetica, sans-serif" size="2"><b><font face="Arial, Helvetica,
                                                                                                                         sans-serif" size="1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></b></font></b></font></b></div></td>
                                                            <td
                                                                width="3%" height="12"><div align="left"><b><font face="Arial,
                                                                                                              Helvetica, sans-serif" size="2"><font face="Arial, Helvetica,
                                                                                                                 sans-serif" size="2"><font face="Arial, Helvetica, sans-serif"
                                                                                                              size="2">31H</font> <b><font face="Arial, Helvetica, sans-serif" size="1"></font></b></font></font></b></div></td>
                                                            <td
                                                                width="58%" height="12"><b><font face="Arial, Helvetica, sans-serif"
                                                                                             size="2"><font face="Arial, Helvetica, sans-serif" size="2">
                                                                                                <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Total Tax Credits/Payments (Sum of Items 31A to 31G)</font></font> <font face="Arial, Helvetica, sans-serif" size="1"><b></b></font></font></b></td>
                                                            <td
                                                                width="4%" height="12"><div align="left"><font size="2"><b><font
                                                                                face="Arial, Helvetica, sans-serif">31H</font></b></font></div></td>
                                                            <td
                                                                width="32%" height="12"><div align="left"><font size="1"><font size="1"><font
                                                                                size="1"><font size="1"><font face="Arial, Helvetica, sans-serif"
                                                                                                          size="1"></font> <font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                        face="Arial, Helvetica, sans-serif" size="1">
                                                                                                        <input disabled="true" id="frm1702q:txt31H" name="frm1702q:txt31H" 
                                                                                                               maxlength="25"

                                                                                                               size="20" style="background-color: rgb(220, 220, 220); text-align:
                                                                                                               right;" value="0.00" type="text"  />
                                                                                                    </font></font></font></font></font> <font face="Arial, Helvetica, sans-serif" size="1"></font></font></font></font></font></div></td>
                                                        </tr>
                                                        <tr valign="middle">
                                                            <td colspan="3" height="20"><div align="left"><b><font
                                                                            face="Arial, Helvetica, sans-serif" size="2">32</font></b> <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;"><b>&nbsp;Tax Payable/(Overpayment) (Item 30 less Item 31H)</b></font></div></td>
                                                            <td
                                                                width="4%" height="20"><div align="left"><b><font face="Arial,
                                                                                                              Helvetica, sans-serif" size="2">32</font></b></div></td>
                                                            <td width="32%"
                                                                height="20"><div align="left"><font size="1"><font size="1"><font
                                                                                size="1"><font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                    size="1"><font face="Arial, Helvetica, sans-serif" size="1">
                                                                                                        <input
                                                                                                            disabled="true" id="frm1702q:txt32"
                                                                                                            maxlength="25" name="frm1702q:txt32"
                                                                                                            size="20" style="background-color: rgb(220, 220, 220); text-align:
                                                                                                            right;" value="0.00" type="text" />
                                                                                                    </font></font></font></font></font></font></font></font></font></div></td>
                                                        </tr>
                                                    </tbody>
                                                </table></td>
                                        </tr>
                                        <tr>
                                            <td><table width="100%" border="0" bordercolor="#333333"
                                                       cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                        <tr valign="middle">
                                                            <td
                                                                width="3%" height="15"><div align="left"><b><font face="Arial,
                                                                                                              Helvetica, sans-serif" size="2">33</font></b></div></td>
                                                            <td colspan="4"
                                                                width="97%" align="left" height="15">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font
                                                                    face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;"><b>Add: Penalties</b></font> <font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></td>
                                                        </tr>
                                                    </tbody>
                                                </table></td>
                                        </tr>
                                        <tr>
                                            <td><table width="100%" border="0" bordercolor="#333333"
                                                       cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                        <tr valign="middle">
                                                            <td
                                                                width="4%"><div align="center"><b></b></div></td>
                                                            <td width="3%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font
                                                                    face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font></td>
                                                            <td
                                                                width="16%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;"><b>Surcharge</b></font></td>
                                                            <td
                                                                width="19%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;"><b>Interest</b></font></td>
                                                            <td
                                                                width="58%"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;"><b>Compromise</b></font></td>
                                                        </tr>
                                                    </tbody>
                                                </table></td>
                                        </tr>
                                        <tr>
                                            <td><table width="100%" border="0" bordercolor="#333333">
                                                    <tbody>
                                                        <tr
                                                            valign="middle">
                                                            <td width="4%" height="15"><div align="right"><b><font
                                                                            face="Arial, Helvetica, sans-serif" size="2">33A</font></b></div></td>
                                                            <td
                                                                width="13%" height="15"><font size="1"><font size="1"><font size="1"><font
                                                                                size="1"><font face="Arial, Helvetica, sans-serif" size="1"></font> <font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                    face="Arial, Helvetica, sans-serif" size="1">
                                                                                                    <input
                                                                                                        id="frm1702q:txt33A" name="frm1702q:txt33A" maxlength="17"
                                                                                                        size="16" style="color: black; text-align: right;" value="0.00"
                                                                                                        type="text" onblur="round(this,2); compute33D()" onkeypress="return numbersonly(this, event)"/>
                                                                                                </font></font></font></font></font> <font face="Arial, Helvetica, sans-serif" size="1"></font></font></font></font></font></td>
                                                            <td
                                                                width="4%" height="15"><div align="right"><b><font face="Arial,
                                                                                                               Helvetica, sans-serif" size="2">33B</font></b></div></td>
                                                            <td width="13%"
                                                                height="15"><font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                    face="Arial, Helvetica, sans-serif" size="1"></font> <font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                    face="Arial, Helvetica, sans-serif" size="1">
                                                                                                    <input 
                                                                                                        id="frm1702q:txt33B" name="frm1702q:txt33B" maxlength="17"

                                                                                                        size="16" style="color: black; text-align: right;" value="0.00"
                                                                                                        type="text" onblur="round(this,2); compute33D()" onkeypress="return numbersonly(this, event)" />
                                                                                                </font></font></font></font></font> <font face="Arial, Helvetica, sans-serif" size="1"></font></font></font></font></font></td>
                                                            <td
                                                                width="4%" height="15"><div align="right"><b><font face="Arial,
                                                                                                               Helvetica, sans-serif" size="2">33C</font></b></div></td>
                                                            <td width="25%"
                                                                height="15"><font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                    face="Arial, Helvetica, sans-serif" size="1"></font> <font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                    face="Arial, Helvetica, sans-serif" size="1">
                                                                                                    <input 
                                                                                                        id="frm1702q:txt33C" name="frm1702q:txt33C" maxlength="17"
                                                                                                        size="16" style="color: black; text-align: right;" value="0.00"
                                                                                                        type="text" onblur="round(this,2); compute33D()" onkeypress="return numbersonly(this, event)" />
                                                                                                </font></font></font></font></font> <font face="Arial, Helvetica, sans-serif" size="1"></font></font></font></font></font></td>
                                                            <td
                                                                width="5%" height="15"><div align="left"><b><font face="Arial,
                                                                                                              Helvetica, sans-serif" size="2">33D</font></b></div></td>
                                                            <td width="36%"
                                                                height="15"><div align="left"><font size="1"><font size="1"><font
                                                                                size="1"><font size="1"><font face="Arial, Helvetica, sans-serif"
                                                                                                          size="1"></font> <font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                        face="Arial, Helvetica, sans-serif" size="1"></font></font></font></font></font> <font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                        size="1"><font size="1"><font size="1"><font size="1"><font face="Arial,Helvetica, sans-serif" size="1">
                                                                                                                        <input disabled="true" id="frm1702q:txt33D" name="frm1702q:txt33D" maxlength="25"
                                                                                                                               size="20" style="background-color: rgb(220, 220, 220); text-align:
                                                                                                                               right;" value="0.00" type="text" />
                                                                                                                    </font></font></font></font></font></font></font></font></font></font></font></font></font></div></td>
                                                        </tr>
                                                    </tbody>
                                                </table></td>
                                        </tr>
                                        <tr>
                                            <td><table width="100%" border="0" bordercolor="#333333"
                                                       cellspacing="0" height="28">
                                                    <tbody>
                                                        <tr valign="middle">
                                                            <td width="2%"
                                                                height="20"><div align="center"><b><font face="Arial, Helvetica,
                                                                                                     sans-serif" size="2">34</font></b></div></td>
                                                            <td width="60%" height="20"><font
                                                                    face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;"><b>Total Amount Payable (Overpayment) (Sum of Items 32 and 33D)</b></font></td>
                                                            <td width="5%"
                                                                height="20"><div align="left"><b><font face="Arial, Helvetica,
                                                                                                   sans-serif" size="2">&nbsp;34</font></b></div></td>
                                                            <td width="33%"
                                                                height="20"><font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                    face="Arial, Helvetica, sans-serif" size="1"></font> <font size="1"><font size="1"><font size="1"><font size="1"><font
                                                                                                    face="Arial, Helvetica, sans-serif" size="1">
                                                                                                    <input
                                                                                                        disabled="true" id="frm1702q:txt34"
                                                                                                        maxlength="25" name="frm1702q:txt34"
                                                                                                        size="20" style="background-color: rgb(220, 220, 220); text-align:
                                                                                                        right;" value="0.00" type="text" />
                                                                                                </font></font></font></font></font></font></font></font></font></td>
                                                        </tr>
                                                    </tbody>
                                                </table></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="imgClass" align='center' style="display:none; width:740px !important;">
                                        <!-- <img id="frm1702Q:jurat" src="../img/jurat/1702Q.jpg" width="740"/> -->
                                        <table style="border-top: 3px solid black; font-family:arial; font-size:11px; text-align: center; table-layout: fixed;" >
                                          <tr>
                                            <td colspan="6">We declare, under the penalties of perjury, that this return has been made in good faith, verified by us, and to the best of our knowledge and belief,
                                            <br/>is true and correct, pursuant to the provisions of the National Internal Revenue Code, as amended, and the regulations issued under authority thereof.
                                            <br/>&nbsp;</td>
                                          </tr>
                                          <tr>
                                            <td colspan="4"><b>35A</b>________________________________________________________________________
                                                <br/>President/Vice President/Principal Officer/Accredited Tax Agent/
                                                <br/>(Signature Over Printed Name)</td>
                                            <td colspan="2"><b>35B</b>___________________________________
                                                <br/>Treasurer/Assistant Treasurer
                                                <br/>(Signature Over Printed Name)</td>
                                          </tr>
                                          <tr>
                                            <td colspan="2">______________________________________
                                                <br/>Title/Position of Signatory</td>
                                            <td colspan="2">______________________________________
                                                <br/>TIN of Signatory</td>
                                            <td colspan="2">______________________________________
                                                <br/>Title/Position of Signatory</td>
                                          </tr>
                                          <tr>
                                            <td colspan="2">______________________________________
                                                <br/>Tax Agent Acc. No./Atty's Roll No. (if applicable)</td>
                                            <td>________________
                                                <br/>Date of Issuance</td>
                                            <td>________________
                                                <br/>Date of Expiry</td>
                                            <td colspan="2">______________________________________
                                                <br/>TIN of Signatory</td>
                                          </tr>
                                        </table>
                                    </div>
                                    <div class="imgClass" align='center' style="display:none; width:740px !important;">
                                        <img id="frm1702Q:jurat" src="{{ asset('images/bottom_img/1702Q_new.jpg') }}" width="740"/>
                                    </div>
                                    <div class="imgClass" align='center' style="display:none; width:740px !important;">
                                        <table style="font-size:12px; text-align: left; vertical-align: top;">
                                          <tr>
                                            <td>Machine Validation/Revenue Official Receipt Details (If not filed with the bank)<br /><br /></td>
                                          </tr>
                                        </table>
                                    </div>
                                    <table width="741" border="0" cellspacing="0" cellpadding="0" class="tblForm printButtonClass">
                                        <tr>
                                            <td class="tblFormTdPart">
                                                <table width="735" cellspacing="0" cellpadding="0" border="0">
                                                    <tbody>
                                                        <tr valign="middle">
                                                            <td width="40"></td>
                                                            <td width="616">
                                                                <div>
                                                                    <div align="center">
                                                                    @if($action != 'view')
                                                                        <input class="printButtonClass" type="button" value="Validate" style="width: 100px;" name="frm1702q:cmdValidate" id="frm1702q:cmdValidate" onclick="validate()" />
                                                                        <input class="printButtonClass" type="button" value="Edit" style="width: 100px;" name="frm1702q:cmdEdit" id="frm1702q:cmdEdit" onclick="enableAllControl()"/>
                                                                        <input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />
																		<input class="printButtonClass" type="button" value="Save" style="width: 100px;" name="btnSave" id="btnSave" onclick="saveData();" />
																		<input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
																		<input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;" name="frm1702q:btnFinalCopy" id="frm1702q:btnFinalCopy" onclick="submitForm();" />
                                                                    @else
                                                                        <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                                        <input class="printButtonClass" type="button" value="Back" style="width: 100px;" onclick="gotoMain();" />
                                                                    @endif  
                                                                        <div id="msg" class="printButtonClass" style="display:none;"></div>																			
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <div id="DummyTxt" style='display:none;'>  </div>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="footer" style="padding:6px; text-align: center; font-size: 11px; background-color: white; width: 100%;">
                                        <font>Disclaimer : eTax is not connected with BIR or any government agency.</font>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
				</td>
				<td valign="top"><img id="frm1702Q:bcsImg" src="{{ asset('images/BCS.jpg') }}"/></td>
				</tr>
				</table>
				
            </div>
        </div>
		<div id="modalAtc" class="aBox1702qAtc" style="margin-top:15px;margin-left:135px; width:80%; display:none; min-height:500px; top:10%; left:10%; right:auto; overflow-y:auto; overflow-x:hidden; background:#fff;" align="center"> 
            <br/>
            <br/>
            <table border="0" cellspacing="3" cellpadding="3" style="position: static" width="80%">
                <tr>
                    <td class="modalColumnHeader" colspan="4"></td>
                </tr>
                <tr class="modalColumnHeader">
                    <td width="10%"></td>
                    <td width="20%"><b> ATC </b></td>

                    <td width="39%"> <b> Description </b> </td>
                    <td width="20%"> <b> Rate </b> </td>
                </tr>
                <tr>
                    <td colspan="4"> <hr/></td>
                </tr>

            </table>

            <div style="height:300px;overflow:auto;width: 80%">
                <table class="modalContent" id="tbllistAtcCode"  style="font-size: 11px;" cellspacing="0" cellpadding="0" width="100%">
                    <tr><td></td></tr>
                </table>
            </div>
			<br/>
			<div align="center">
            <input type="button" name="btnOkPop" id="btnOkPop" style="width:120px; height:30px;" value="OK" onclick="getATCCode()"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" name="btnCancelPop" id="btnCancelPop" style="width:120px; height:30px;" value="CANCEL"  onclick="cancelATC()" />
			</div>
            <br />
            <br />
        </div>

        <!-- modal Sched1 ATC  -->
        <div id="modalSched1" class="printSignFooterClass_1702Q aBox1702qSched1" style="margin-top:15px; margin-left: 135px; width:75%; display:none; min-height:500px; top:10%; left:3%; right:auto; overflow-y:auto; background:#fff;" align="center"> 
            <br/>
            <br/>
            <table border="1" cellspacing="3" cellpadding="3" width="90%">
                <tr class="modalHeader">
                    <td colspan="5">Schedule 1 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Computation of Minimum Corporate Income Tax (MCIT) for the Quarter(s)</td>
                </tr>
                <tr class="modalColumnHeader">
                    <td width="20%">&nbsp;</td>
                    <td width="20%" style="text-align:center;"><b>1st Quarter</b></td>
                    <td width="20%" style="text-align:center;"><b>2nd Quarter</b></td>
                    <td width="20%" style="text-align:center;"><b>3rd Quarter</b></td>
                    <td width="20%" style="text-align:center;"><b>Total</b></td>
                </tr>
                <tr>
                    <td width="20%" class="modalContent">Total Gross Income (except Gross Income Taxable under Special Rate) for MCIT</td>
                    <td width="20%"><input type="text" style="text-align:right" id="txt1stQtr" name="txt1stQtr" value="0.00" onblur="round(this,2); computeSched1CompTotal()" maxlength="17" size="15" onkeypress="return numbersonly(this, event)" /></td>
                    <td width="20%"><input type="text" style="text-align:right" id="txt2ndQtr" name="txt2ndQtr" value="0.00" onblur="round(this,2); computeSched1CompTotal()" maxlength="17" size="15" onkeypress="return numbersonly(this, event)" /> </td>
                    <td width="20%"><input type="text" style="text-align:right" id="txt3rdQtr" name="txt3rdQtr" value="0.00" onblur="round(this,2); computeSched1CompTotal()" maxlength="17" size="15" onkeypress="return numbersonly(this, event)" /> </td>
                    <td width="20%"><input type="text" style="text-align:right" id="txtTotal" name="txtTotal" value="0.00" style="background-color: rgb(220, 220, 220);" maxlength="25" size="15"/> </td>
                </tr>
                <tr>
                    <td width="20%" class="modalContent">Tax Rate </td>
                    <td width="20%">&nbsp;</td>
                    <td width="20%">&nbsp;</td>
                    <td width="20%">&nbsp;</td>
                    <td width="20%"><input type="text" style="text-align:right" id="txtTaxRate" value="2%" style="background-color: rgb(220, 220, 220);" maxlength="25" size="15"/> </td>
                </tr>
                <tr>
                    <td width="20%" class="modalContent">Minimum Corporate Income Tax (to Item 28) </td>
                    <td width="20%">&nbsp;</td>
                    <td width="20%">&nbsp;</td>
                    <td width="20%">&nbsp;</td>
                    <td width="20%"><input type="text" style="text-align:right" id="txtMinCorpIncomeTax" name="txtMinCorpIncomeTax" value="0.00" style="background-color: rgb(220, 220, 220);" maxlength="25" size="15"/> </td>
                </tr>
            </table>
			<br/>
			<div align="center">
            <input type="button" class="printButtonClass" name="btnOkPop" id="btnOkPop" style="width:120px; height:30px;" value="OK" onclick="getSched1ATCCode()"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" class="printButtonClass" name="btnCancelPop" id="btnCancelPop" style="width:120px; height:30px;" value="CANCEL"  onclick="cancelSched1ATC()" />
			</div>
            <br />
            <br />
        </div>
		
		<div id="hiddenEmail" style="display:none;"  > 
			<input id="txtEmail" class="emailClass" name="txtEmail" type="text" value="{{$company->email_address}}" onblur="" onkeypress="" maxlength="60"   />
		</div>
        <textarea id='responsetext' style="display:none;"></textarea>
        <!-- XML retrieval -->
        <div style="display:none;">
            <xmp id='xmlFormat'>    
            </xmp> <!--format the doc -->
            <span id='xmlClose'>All Rights Reserved BIR 2012.</span>
        </div>
        <div id="responseBG" style="display:none;"><!--loaded files render here--></div>
        <div id="response" style="display:none;"><!--loaded files render here--></div>
        <div id="responseATC" style="display:none;"><!--loaded ATC files render here--></div>               
        <div id="responseRdo" style="display:none;"><!--loaded files render here--></div>   
</form>	

@endsection

@section('scripts')
<script type="text/javascript">
    var isSubmitFinal = false;
    var isSubmit = false;

    var gIsReadOnly = false;
    var fileName = "";
    var existingXMLFileName = "";
    var fileNameToExport = "";

    var savedReturn = "";
    var p3Compromise = "";
    var p3Surcharge = "";
    var p3Interest = "";
    var p3IsAmended = "";
    var p3FilingDate = "";
    var p3ReturnPeriod = "";
    var p3ReturnPeriodEnd = "";
    var p3ReturnPeriodEndMonth = "";

    var p3BasicTax = "";
    var p3TotalPenalties = "";
    var p3TotalAmountPayable = "";

    var p3TPTIN1 = "";
    var p3TPTIN2 = "";
    var p3TPTIN3 = "";
    var p3TPTIN = "";
    var p3TPBranchCode = "";
    var p3TPRDOCode = "";
    var p3TPLineBus = "";
    var p3TPName = "";
    var p3TPTelNum = "";
    var p3TPAddress = "";
    var p3TPZip = "";

    var tempValue_txtMinCorpIncomeTax = "0.00";
    var tempValue_txt1stQtr = "0.00";
    var tempValue_txt2ndQtr = "0.00";
    var tempValue_txt3rdQtr = "0.00";
    var tempValue_txtTotal = "0.00";
    var tempValue_txtTaxRate = "0.00";
    var globalEmail = "";
    setTimeout("sleeptime()", 200);
    function sleeptime() {

        loadXMLATC('/xml/atcCodes.xml');
        init();

        var xmlFileName = document.getElementById('file_name').value;        
        fileName = xmlFileName;
        if (fileName != null && fileName.indexOf('.xml') > -1) {
            var tin = fileName.split("/")[1].split("-");
           
            loadXML(fileName);

            existingXMLFileName = fileName;
            if (gIsReadOnly) {
                window.setTimeout("disableAllElementIDs(); d.getElementById('btnUpload').disabled = false;", 1000);
            }
        } else {
            window.setTimeout("$('#loader').hide('blind');", 100);
        }

        if ($('#printMenu').css('display') != 'none') {
            $('#printMenu').hide('blind');
        }
        document.getElementById('frm1702q:txtTin1').disabled = true; document.getElementById('frm1702q:txtTin2').disabled = true; document.getElementById('frm1702q:txtTin3').disabled = true; document.getElementById('frm1702q:txtBranchCode').disabled = true;
      
    }

    function rdoPropertyJS(rdoCode, description) {
        this.rdoCode = rdoCode;
        this.description = description;
    }

    var rdoList = new Array();

    function init() {
        var year = new Date();
        var month = new Date();
        d.getElementById('frm1702q:txtYearEnded').value = year.getFullYear();

        if (month.getMonth() == 0 || month.getMonth() == 1 || month.getMonth() == 2) {
            d.getElementById('frm1702q:optQtr:_1').checked = true;
        }
        else if (month.getMonth() == 3 || month.getMonth() == 4 || month.getMonth() == 5) {
            d.getElementById('frm1702q:optQtr:_2').checked = true;
        }
        else if (month.getMonth() == 6 || month.getMonth() == 7 || month.getMonth() == 8) {
            d.getElementById('frm1702q:optQtr:_3').checked = true;
        }

        d.getElementById('frm1702q:itemYearEndMonth').disabled = true;
        d.getElementById('frm1702q:optRemenderRtn_1').disabled = false;
        d.getElementById('frm1702q:optRemenderRtn_2').disabled = false;
        d.getElementById('frm1702q:lstTaxTreaty').disabled = true;
        d.getElementById('frm1702q:txtAtc').disabled = true;
        d.getElementById('frm1702q:txt18A').disabled = true;
        d.getElementById('frm1702q:txt18B').disabled = true;
        d.getElementById('frm1702q:txt18C').disabled = true;
        d.getElementById('frm1702q:txt20A').disabled = true;
        d.getElementById('frm1702q:txt20B').disabled = true;
        d.getElementById('frm1702q:txt20C').disabled = true;
        d.getElementById('frm1702q:txt22A').disabled = true;
        d.getElementById('frm1702q:txt22B').disabled = true;
        d.getElementById('frm1702q:txt24A').disabled = true;
        d.getElementById('frm1702q:txt24B').disabled = true;
        d.getElementById('frm1702q:txt25B').disabled = true;
        d.getElementById('frm1702q:txt26A').disabled = true;
        d.getElementById('frm1702q:txt26B').disabled = true;
        d.getElementById('frm1702q:txt29A').disabled = true;
        d.getElementById('frm1702q:txt29C').disabled = true;
        d.getElementById('frm1702q:txt29D').disabled = true;
        d.getElementById('frm1702q:txt30').disabled = true;
        d.getElementById('frm1702q:txt31H').disabled = true;
        d.getElementById('frm1702q:txt32').disabled = true;
        d.getElementById('frm1702q:txt33D').disabled = true;
        d.getElementById('frm1702q:txt34').disabled = true;
        @if($action != 'view')
        d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm1702q:cmdEdit').disabled = true;
        d.getElementById('frm1702q:btnFinalCopy').disabled = true;
         d.getElementById('btnUpload').disabled = true;
        @endif
       
        d.getElementById('frm1702q:txt31F').disabled = true;

        if (d.getElementById('frm1702q:optQtr:_1').checked) {
            disable23(true);
        }

        ATCList();
    }

    function dateyear() {
        if (d.getElementById('frm1702q:itemFiscalStartMonth:_1').checked == true) {
            d.getElementById('frm1702q:itemYearEndMonth').selectedIndex = 12;
            d.getElementById('frm1702q:itemYearEndMonth').disabled = true;
        }
        else if (d.getElementById('frm1702q:itemFiscalStartMonth:_2').checked == true && d.getElementById('frm1702q:itemYearEndMonth').selectedIndex == 12) {
            alert('You have entered invalid month for Fiscal Year');
            d.getElementById('frm1702q:itemYearEndMonth').selectedIndex = 0;
            d.getElementById('frm1702q:itemYearEndMonth').disabled = false;
        }
    }
    function datemonth() {
        if (d.getElementById('frm1702q:itemFiscalStartMonth:_1').checked == true && d.getElementById('frm1702q:itemYearEndMonth').selectedIndex != 12) {
            alert('You have entered a filing year not ending in December. This filing will be considered as a Fiscal Year Filing.');
            d.getElementById('frm1702q:itemFiscalStartMonth:_2').checked = true;
        }
        else if (d.getElementById('frm1702q:itemFiscalStartMonth:_2').checked == true && d.getElementById('frm1702q:itemYearEndMonth').selectedIndex == 12) {
            alert('You have entered a filing year ending in December. This filing will be considered as a Calendar Year Filing.');
            d.getElementById('frm1702q:itemFiscalStartMonth:_1').checked = true;
        }
    }

    var atcList = new Array();

    function atcPropertyJS(formType, atcCode, description, rate, category, base, compType, constTaxDue, minimum, maximum) {
        this.formType = formType;
        this.atcCode = atcCode;
        this.description = description;
        this.rate = rate;
        this.category = category;
        this.base = base;
        this.compType = compType;
        this.constTaxDue = constTaxDue;
        this.minimum = minimum;
        this.maximum = maximum;
    }

    var d = document, XMLBGFile = '', data = '', XMLFile = '', XMLATCFile = '', msg = d.getElementById('msg');
    var loader = d.getElementById('loader');

    function loadXMLATC(fileLocation) {
        var url = document.getElementsByName('base_url')[0].getAttribute('content');

        var xmlHTTP = new XMLHttpRequest();
        try
        {
            xmlHTTP.open("GET", url + fileLocation, false);
            xmlHTTP.send(null);
        }
        catch (e) {
            window.alert("Unable to load the requested file.");
            return;
        }
        var responseATC = d.getElementById('responseATC'); //render file and write to hidden div
        responseATC.innerHTML = xmlHTTP.responseText; //remove XML tag
        loadATC();
        
    }

    var atcCount = 0;

    function loadATC() {
        /*This will load data onto an array*/
        var response = d.getElementById("responseATC");

        var atcCnt = String(response.innerHTML).split('atcCount=');
        atcCount = atcCnt[1];

        var j = 0;
        //loads atcList from xml
        for (var i = 1; i <= atcCount; i++) {

            var atc = String(response.innerHTML).split('atc' + i + ':');
            var atcStr = atc[1];

            //Ensure that before writing to atcPropertyJS the formType 1702Q is traceable in atcStr
            if (atcStr.indexOf('1702Q') >= 0) {
                var atcValues = atcStr.split('~');

                var formType = "1702Q";
                var atcCode = atcValues[0];
                var description = atcValues[1];
                var rate = atcValues[2];
                var category = atcValues[3];

                var base = '';
                var compType = '';
                var constTaxDue = '';
                var minimum = '';
                var maximum = '';

                var objATC = new atcPropertyJS(formType, atcCode, description, rate, category, base, compType, constTaxDue, minimum, maximum);
                atcList[j] = objATC;
                j++;

            } else {
                continue;
            }
        }
    }

    function loadXML(loadWhere) {
        var url = document.getElementsByName('base_url')[0].getAttribute('content');
    
        var xmlHTTP = new XMLHttpRequest();
        try
        {
            xmlHTTP.open("GET", url + loadWhere, false);
            xmlHTTP.send(null);
        }
        catch (e) {
            window.alert("Unable to load the requested file.");
            return;
        }
        document.getElementById("response").innerHTML=xmlHTTP.responseText;
        loadData(); /*This will load data onto fields*/                             
                
        if (response.innerHTML.indexOf("All Rights Reserved BIR 2012.0") >= 0) {
            gIsReadOnly = true;
        }

        if (gIsReadOnly) {
                d.getElementById('frm1702q:cmdValidate').disabled = true;
                d.getElementById('btnSave').disabled = true;
        }

    }

    function loadData() {
        /*This will load data onto fields*/
        var response = d.getElementById("response");
        var elem = document.getElementById('frmMain').elements;
        for (var i = 0; i < elem.length; i++) {

            if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {  //elem[i].type != 'button' &&           
                if (elem[i].type == 'text' || elem[i].type == 'select-one') {
                    var fieldVal = String($("#response").html()).split(elem[i].id + '=');
                    if (fieldVal != null && fieldVal.length > 1) {
                        if (elem[i].id == 'frm1702q:txtTaxpayerName' || elem[i].id == 'frm1702q:txtDescription' || elem[i].id == 'frm1702q:txtTaxPayerAdd') {
                            elem[i].value = unescape(fieldVal[1]);
                        }
                        else if (elem[i].className.indexOf("FinalFlag") > -1) {
                        elem[i].value = typeof (fieldVal[1]) === "undefined" ? "3" : fieldVal[1];
                    }
                        else {
                            elem[i].value = fieldVal[1]; //all select-one and text values               
                        }
                    }
                }
                if (elem[i].type == 'radio') {
                    var rdoVal = String($("#response").html()).split(elem[i].id + '=');
                    if (rdoVal[1] == 'true') {
                        elem[i].checked = rdoVal[1];
                        //elem[i].onclick();
                    }
                }
                if (elem[i].type == 'checkbox') {
                    var chkboxVal = String($("#response").html()).split(elem[i].id + '=');
                    if (chkboxVal[1] == 'true') {
                        elem[i].checked = chkboxVal[1];
                    }
                }

            }

        }
        document.getElementById('txtEmail').value = globalEmail;
    }
 
    function isItAnAmendedReturn(xmlFile) {
        if (d.getElementById('frm1702q:optRemenderRtn_1').checked) {
            return true;
        } else {
            return false;
        }
    }

  
    var XMLrdoFile = '';

    
    function setInputTextControl_HorizontalAlignment(id, align) {
        if (d.getElementById(id) != null) {
            d.getElementById(id).style.textAlign = "right";
        }
    }
    function setInputTextControl_NumberFormatter(id, limit, deci) {
        if (d.getElementById(id) != null) {
            d.getElementById(id).size = parseInt(limit);
            d.getElementById(id).value = parseFloat(d.getElementById(id).value).toFixed(parseInt(deci));
        }
    }

    function disable23(disable) {
        d.getElementById('frm1702q:txt23A').disabled = disable;
        d.getElementById('frm1702q:txt23B').disabled = disable;
        d.getElementById('frm1702q:txt31B').disabled = disable;
        d.getElementById('frm1702q:txt31C').disabled = disable;
        d.getElementById('frm1702q:txt31D').disabled = disable;
    }

    function clear23() {
        d.getElementById('frm1702q:txt31B').value = parseFloat(0).toFixed(2);
        d.getElementById('frm1702q:txt31C').value = parseFloat(0).toFixed(2);
        d.getElementById('frm1702q:txt31D').value = parseFloat(0).toFixed(2);
        compute31H();
    }

    function enableSelTreaty() {
        d.getElementById('frm1702q:lstTaxTreaty').disabled = false;
        d.getElementById('frm1702q:lstTaxTreaty').selectedIndex = 0;
    }

    function disableSelTreaty() {
        d.getElementById('frm1702q:lstTaxTreaty').disabled = true;
        d.getElementById('frm1702q:lstTaxTreaty').selectedIndex = 0;
    }

    function blockletter(e) {
        var number = parseFloat(e.value).toFixed(2);
        if (isNaN(number)) {
            var zero = 0;
            e.value = parseFloat(zero).toFixed(2);
            //e.value = "";
        } else {
            e.value = '' + number;
            if (e.value < 0) {
                var zero = 0;
                e.value = parseFloat(zero).toFixed(2);
            }

        }
    }

    function blockletterWithout2Decimal(e) {
        var number = parseFloat(e.value);
        if (isNaN(number)) {
            e.value = "";
        } else {
            e.value = '' + number.toFixed(0);
        }
    }

    function showATClist() {
        d.getElementById('Content').style.display = "none";
        $('#wrapper').css({ 'display': 'none' });
        $('#modalAtc').show('blind');
    }

    function showSched1Div() {
        d.getElementById('Content').style.display = "none";
            $('#modalSched1').show('blind');
            $('#wrapper').css({ 'display': 'none' });

            tempValue_txtMinCorpIncomeTax = d.getElementById('txtMinCorpIncomeTax').value;
            tempValue_txt1stQtr = d.getElementById('txt1stQtr').value;
            tempValue_txt2ndQtr = d.getElementById('txt2ndQtr').value;
            tempValue_txt3rdQtr = d.getElementById('txt3rdQtr').value;
            tempValue_txtTotal = d.getElementById('txtTotal').value;
            tempValue_txtTaxRate = d.getElementById('txtTaxRate').value;

            setTimeout("d.getElementById('txtTotal').disabled = true;" +
                "d.getElementById('txtTaxRate').disabled = true;" +
                "d.getElementById('txtMinCorpIncomeTax').disabled = true; " +
                "setInputTextControl_HorizontalAlignment('txt1stQtr', 4);" +
                "setInputTextControl_HorizontalAlignment('txt2ndQtr', 4);" +
                "setInputTextControl_HorizontalAlignment('txt3rdQtr', 4);" +
                "setInputTextControl_HorizontalAlignment('txtTotal', 4);" +
                "setInputTextControl_HorizontalAlignment('txtTaxRate', 4);" +
                "setInputTextControl_HorizontalAlignment('txtMinCorpIncomeTax', 4);"
            , 100);
    }

    function getPopulateATC() {

        nameCode = new Array();
        ATCnameCode = new Array();
        Description = new Array();
        atcRate = new Array();
        var atcSize = atcList.length;

        var i = 0;
        var j = 1;
        for (i = 0; i < atcSize; i++) {
            var atc = atcList[i];
            if (atc.formType == "1702Q") {

                ATCnameCode[j] = atc.atcCode;
                nameCode[j] = atc.category;
                Description[j] = atc.description;
                atcRate[j++] = atc.rate;
            }
        }
    }

    function ATCList() {

        var i;
        getPopulateATC();
        //d.getElementById('tbllistAtcCode').innerHTML = "";
        $('#tbllistAtcCode').html("");

        for (i = 1 ; i < ATCnameCode.length ; i++) {
            $('#tbllistAtcCode').html(d.getElementById('tbllistAtcCode').innerHTML +
                "<tr class='atc'><td width='10%' class='atc'><input id='Codename" + i + "' name='AtcCodename[]' type='radio' value='"+ATCnameCode[i]+"' /> "+nameCode[i]+"</td> <td width='20%' class='atc' id='AtcCode" + i + "'> "+ATCnameCode[i]+" </td> <td width='50%' class='atc atcNames' id='AtcDescription" + i + "' >" + Description[i] + " </td><td width='20%' class='atc' id='atcRate" + i + "'> " + atcRate[i] +
                "</td></tr>");


        }
    }

    function cancelATC() {
        d.getElementById('Content').style.display = 'block';
        if ($('#modalAtc').css('display') != 'none') {
            $('#modalAtc').hide('blind');
            $('#wrapper').css({ 'display': 'block' });
        }
        $('#DummyTxt').html("Creator");
        $('#DummyTxt').html("");
    }

    function getATCCode() {
        var listATCtable = d.getElementById('tbllistAtcCode');
        for (i = 1 ; i <= listATCtable.rows.length; i++) {
            if (d.getElementById('Codename' + i) != null) {
                if (d.getElementById('Codename' + i).checked == true) {
                    d.getElementById('frm1702q:txtAtc').value = d.getElementById('AtcCode' + i).innerHTML;
                    d.getElementById("frm1702q:txt25B").value = (d.getElementById('atcRate' + i).innerHTML * 1).toFixed(2);
                    break;
                }

            }
        }
        d.getElementById('Content').style.display = 'block';
        if ($('#modalAtc').css('display') != 'none') {
            $('#modalAtc').hide('blind');
            $('#wrapper').css({ 'display': 'block' });
        }
        $('#DummyTxt').html("Creator");
        $('#DummyTxt').html("");
    }

    function cancelSched1ATC() {
         $('#wrapper').css({ 'display': 'block' });
        d.getElementById('txtMinCorpIncomeTax').value = tempValue_txtMinCorpIncomeTax;
        d.getElementById('txt1stQtr').value = tempValue_txt1stQtr;
        d.getElementById('txt2ndQtr').value = tempValue_txt2ndQtr;
        d.getElementById('txt3rdQtr').value = tempValue_txt3rdQtr;
        d.getElementById('txtTotal').value = tempValue_txtTotal;
        d.getElementById('txtTaxRate').value = tempValue_txtTaxRate;

        d.getElementById('Content').style.display = 'block';
        $('#modalSched1').hide('blind');
        $('#DummyTxt').html("Creator");
        $('#DummyTxt').html("");
    }

    function getSched1ATCCode() {
        if (confirm("Values in this section will now be reflected to your \n1702Q form. Press OK now.")) {
            d.getElementById('Content').style.display = 'block';
            $('#modalSched1').hide('blind');
            $('#DummyTxt').html("Creator");
            $('#DummyTxt').html("");
             $('#wrapper').css({ 'display': 'block' });
            d.getElementById("frm1702q:txt28").value = d.getElementById("txtMinCorpIncomeTax").value;
            compute29A();
        }

    }
    function disable21C() {
        if (d.getElementById("1702q:OptMethodDeduct_1").checked == true) {
            d.getElementById("frm1702q:txt21C").disabled = false;
            d.getElementById("frm1702q:txt21C").value = 0;
            compute22B();
        }
        else {
            d.getElementById("frm1702q:txt21C").disabled = true;
            compute22B();
        }
    }
    function validate() {
        var dt = new Date();

        if (d.getElementById('frm1702q:itemYearEndMonth').value == "") {
            alert("Please choose a proper month in Item no 2."); return;
        }
        if (d.getElementById('frm1702q:txtYearEnded').value == "") {
            alert("Please input a proper year in Item no 2."); return;
        }
        if (d.getElementById('frm1702q:txtYearEnded').value * 1 < 1900) {
            alert("Invalid date entry on Item no.2. Entry should not be lower than 1900.")
            return;
        }
        if (d.getElementById("frm1702q:optQtr:_1").checked == false && d.getElementById("frm1702q:optQtr:_2").checked == false && d.getElementById("frm1702q:optQtr:_3").checked == false) {
            alert("Select a Quarter on Item no 3.")
        }
      
        if ((d.getElementById('frm1702q:txtDescription').value == "")) {
            alert("Please enter a valid Line of Business/Occupation on Item 8.");
            return;
        }

        if ((d.getElementById('frm1702q:txtTaxpayerName').value == "")) {
            alert("Please enter a valid Taxpayer Name on Item 9.");
            return;
        }

        if ((d.getElementById('frm1702q:txtTelNum').value == "")) {
            alert("Please enter Telephone Number on Item 10.");
            return;
        }

        if ((d.getElementById('frm1702q:txtTaxPayerAdd').value == "")) {
            alert("Please enter Taxpayer's Registered Address on Item 11.");
            return;
        }

        if ((d.getElementById('frm1702q:txtTaxPayerZip').value == "")) {
            alert("Please enter Zip Code on Item 12.");
            return;
        }

        if (d.getElementById("frm1702q:txtAtc").value == "") {
            alert("Select an ATC on Item no. 15"); return;
        }

        if (d.getElementById('frm1702q:txt28').value == 0) {
            var aa;
            var bb = confirm("Reminder: You didn't fill-up Schedule 1. Please go back to Schedule 1 if you need to add MCIT entries. Clicking OK will close the message prompt.");
            {
                if (bb == true) {
                    //alert(bb);
                }
                else {
                    return false;
                }
            }
        }

        if (d.getElementById("frm1702q:optTreaty:_1").checked && d.getElementById("frm1702q:lstTaxTreaty").selectedIndex == 0) {
            alert("Please select a Tax Treaty from the list."); return;
        }

        disabledAllControl();

        alert("Validation successful. Click on Edit if you wish to modify your entries.");
        return;
    }

    var disableElem = true;
    var enableElem = false;
    function disabledAllControl() {
        d.getElementById("frm1702q:cmdValidate").disabled = true;
        d.getElementById('btnPrint').disabled = false;
        d.getElementById("frm1702q:cmdEdit").disabled = false;
        d.getElementById('frm1702q:btnFinalCopy').disabled = false;
        d.getElementById("btnUpload").disabled = false;

        d.getElementById("frm1702q:itemFiscalStartMonth:_1").disabled = true;
        d.getElementById("frm1702q:itemFiscalStartMonth:_2").disabled = true;

        d.getElementById("frm1702q:itemYearEndMonth").disabled = true;
        d.getElementById("frm1702q:txtYearEnded").disabled = true;
        d.getElementById("frm1702q:optQtr:_1").disabled = true;
        d.getElementById("frm1702q:optQtr:_2").disabled = true;
        d.getElementById("frm1702q:optQtr:_3").disabled = true;
        d.getElementById("frm1702q:txtSheets").disabled = true;
        d.getElementById("frm1702q:txtTin1").disabled = true;
        d.getElementById("frm1702q:txtTin2").disabled = true;
        d.getElementById("frm1702q:txtTin3").disabled = true;
        d.getElementById("frm1702q:txtBranchCode").disabled = true;
        d.getElementById("frm1702q:txtRdoCode").disabled = true;
        d.getElementById("frm1702q:txtDescription").disabled = true;
        d.getElementById("frm1702q:txtTaxpayerName").disabled = true;
        d.getElementById("frm1702q:txtTelNum").disabled = true;
        d.getElementById("frm1702q:txtTaxPayerAdd").disabled = true;
        d.getElementById("frm1702q:txtTaxPayerZip").disabled = true;
        d.getElementById("btnATC").disabled = true;
        d.getElementById("frm1702q:optTreaty:_1").disabled = true;
        d.getElementById("frm1702q:optTreaty:_2").disabled = true;
        d.getElementById("frm1702q:lstTaxTreaty").disabled = true;
        d.getElementById("1702q:OptMethodDeduct_1").disabled = true;
        d.getElementById("1702q:OptMethodDeduct_2").disabled = true;
        d.getElementById("frm1702q:txt16A").disabled = true;
        d.getElementById("frm1702q:txt16B").disabled = true;
        d.getElementById("frm1702q:txt16C").disabled = true;
        d.getElementById("frm1702q:txt17A").disabled = true;
        d.getElementById("frm1702q:txt17B").disabled = true;
        d.getElementById("frm1702q:txt17C").disabled = true;
        d.getElementById("frm1702q:txt19A").disabled = true;
        d.getElementById("frm1702q:txt19B").disabled = true;
        d.getElementById("frm1702q:txt21A").disabled = true;
        d.getElementById("frm1702q:txt21B").disabled = true;
        d.getElementById("frm1702q:txt21C").disabled = true;
        d.getElementById("frm1702q:txt25A").disabled = true;
        d.getElementById("frm1702q:txt27").disabled = true;
        d.getElementById("btnSched1").disabled = true;
        d.getElementById("frm1702q:txt28").disabled = true;
        d.getElementById("frm1702q:txt29B").disabled = true;
        d.getElementById("frm1702q:txt31A").disabled = true;
        d.getElementById("frm1702q:txt31E").disabled = true;
        d.getElementById("frm1702q:txt31G").disabled = true;
        d.getElementById("frm1702q:txt31Gothers").disabled = true;

        d.getElementById("frm1702q:txt33A").disabled = true;
        d.getElementById("frm1702q:txt33B").disabled = true;
        d.getElementById("frm1702q:txt33C").disabled = true;

        if (d.getElementById("frm1702q:optRemenderRtn_1").checked) {
            d.getElementById('frm1702q:txt31F').disabled = true;
        }

        if (!d.getElementById("frm1702q:optQtr:_1").checked) {
            disable23(true);
        }

        d.getElementById("frm1702q:optRemenderRtn_1").disabled = true;
        d.getElementById("frm1702q:optRemenderRtn_2").disabled = true;

        disableElem;
        enableElem;
    }
    function enableAllControl() {

        d.getElementById("frm1702q:cmdValidate").disabled = false;
        d.getElementById('btnPrint').disabled = true;
        d.getElementById("frm1702q:cmdEdit").disabled = true;
        d.getElementById('frm1702q:btnFinalCopy').disabled = true;
        d.getElementById("btnUpload").disabled = true;

        d.getElementById("frm1702q:itemFiscalStartMonth:_1").disabled = false;
        d.getElementById("frm1702q:itemFiscalStartMonth:_2").disabled = false;
        if (d.getElementById('frm1702q:itemFiscalStartMonth:_1').checked) {
            d.getElementById('frm1702q:itemYearEndMonth').disabled = true;
        }
        else {
            d.getElementById('frm1702q:itemYearEndMonth').disabled = false;
        }
        d.getElementById("frm1702q:txtYearEnded").disabled = false;
        d.getElementById("frm1702q:optQtr:_1").disabled = false;
        d.getElementById("frm1702q:optQtr:_2").disabled = false;
        d.getElementById("frm1702q:optQtr:_3").disabled = false;
        d.getElementById("frm1702q:txtSheets").disabled = false;
        d.getElementById("frm1702q:txtTin1").disabled = false;
        d.getElementById("frm1702q:txtTin2").disabled = false;
        d.getElementById("frm1702q:txtTin3").disabled = false;
        d.getElementById("frm1702q:txtBranchCode").disabled = false;
        d.getElementById("frm1702q:txtRdoCode").disabled = false;
        d.getElementById("frm1702q:txtDescription").disabled = false;
        d.getElementById("frm1702q:txtTaxpayerName").disabled = false;
        d.getElementById("frm1702q:txtTelNum").disabled = false;
        d.getElementById("frm1702q:txtTaxPayerAdd").disabled = false;
        d.getElementById("frm1702q:txtTaxPayerZip").disabled = false;
        d.getElementById("btnATC").disabled = false;
        d.getElementById("frm1702q:optTreaty:_1").disabled = false;
        d.getElementById("frm1702q:optTreaty:_2").disabled = false;

        if (d.getElementById("frm1702q:optTreaty:_2").checked) {
            disableSelTreaty();
        } else {
            d.getElementById("frm1702q:lstTaxTreaty").disabled = false;
        }

        d.getElementById("1702q:OptMethodDeduct_1").disabled = false;
        d.getElementById("1702q:OptMethodDeduct_2").disabled = false;
        d.getElementById("frm1702q:txt16A").disabled = false;
        d.getElementById("frm1702q:txt16B").disabled = false;
        d.getElementById("frm1702q:txt16C").disabled = false;
        d.getElementById("frm1702q:txt17A").disabled = false;
        d.getElementById("frm1702q:txt17B").disabled = false;
        d.getElementById("frm1702q:txt17C").disabled = false;
        d.getElementById("frm1702q:txt19A").disabled = false;
        d.getElementById("frm1702q:txt19B").disabled = false;
        d.getElementById("frm1702q:txt21A").disabled = false;
        d.getElementById("frm1702q:txt21B").disabled = false;
        if (d.getElementById("1702q:OptMethodDeduct_1").checked) {
            d.getElementById("frm1702q:txt21C").disabled = false;
        }
        else {
            d.getElementById("frm1702q:txt21C").disabled = true;
        }
        d.getElementById("frm1702q:txt25A").disabled = false;
        d.getElementById("frm1702q:txt27").disabled = false;
        d.getElementById("btnSched1").disabled = false;
        if (NumWithComma(d.getElementById("frm1702q:txt26B").value) < NumWithComma(d.getElementById("frm1702q:txt28").value)) {
            d.getElementById("frm1702q:txt29B").disabled = true;
        }
        else {
            d.getElementById("frm1702q:txt29B").disabled = false;
        }
        d.getElementById("frm1702q:txt31A").disabled = false;
        d.getElementById("frm1702q:txt31E").disabled = false;
        d.getElementById("frm1702q:txt31G").disabled = false;
        d.getElementById("frm1702q:txt31Gothers").disabled = false;

        d.getElementById("frm1702q:txt33A").disabled = false;
        d.getElementById("frm1702q:txt33B").disabled = false;
        d.getElementById("frm1702q:txt33C").disabled = false;

        if (d.getElementById("frm1702q:optRemenderRtn_1").checked) {
            d.getElementById('frm1702q:txt31F').disabled = false;
        }

        if (!d.getElementById("frm1702q:optQtr:_1").checked) {
            disable23(false);
        }

        d.getElementById("frm1702q:optRemenderRtn_1").disabled = false;
        d.getElementById("frm1702q:optRemenderRtn_2").disabled = false;

        if (qs('xmlFileName') != null && qs('xmlFileName').indexOf('.xml') > -1) {
            d.getElementById('frm1702q:itemFiscalStartMonth:_1').disabled = true;
            d.getElementById('frm1702q:itemFiscalStartMonth:_2').disabled = true;
            d.getElementById('frm1702q:itemYearEndMonth').disabled = true;
            d.getElementById('frm1702q:txtYearEnded').disabled = true;
            d.getElementById('frm1702q:optQtr:_1').disabled = true;
            d.getElementById('frm1702q:optQtr:_2').disabled = true;
            d.getElementById('frm1702q:optQtr:_3').disabled = true;
        }

        disableElem;
        enableElem;
        document.getElementById('frm1702q:txtTIN1').disabled = true; document.getElementById('frm1702q:txtTIN2').disabled = true; document.getElementById('frm1702q:txtTIN3').disabled = true; document.getElementById('frm1702q:txtBranchCode').disabled = true;
    }

    function computeSched1CompTotal() {
        var txt1st = NumWithComma(d.getElementById("txt1stQtr").value);
        var txt2nd = NumWithComma(d.getElementById("txt2ndQtr").value);
        var txt3rd = NumWithComma(d.getElementById("txt3rdQtr").value);


        d.getElementById("txtTotal").value = formatCurrency((txt1st * 1 + txt2nd * 1 + txt3rd * 1).toFixed(2));
        d.getElementById("txtMinCorpIncomeTax").value = formatCurrency((NumWithComma(d.getElementById("txtTotal").value) * 0.02).toFixed(2));

    }
    function compute18A() {
        d.getElementById("frm1702q:txt18A").value = formatCurrency((NumWithComma(d.getElementById("frm1702q:txt16A").value) - NumWithComma(d.getElementById("frm1702q:txt17A").value)).toFixed(2));
        d.getElementById("frm1702q:txt20A").value = formatCurrency(NumWithComma(d.getElementById("frm1702q:txt18A").value));
    }

    function compute18B() {
        d.getElementById("frm1702q:txt18B").value = formatCurrency((NumWithComma(d.getElementById("frm1702q:txt16B").value) - NumWithComma(d.getElementById("frm1702q:txt17B").value)).toFixed(2));
        compute20B();
    }
    function compute18C() {
        if (d.getElementById("frm1702q:txtAtc").value == "") {
            alert("Select an ATC on Item no. 15"); return;
        }
        d.getElementById("frm1702q:txt18C").value = formatCurrency((NumWithComma(d.getElementById("frm1702q:txt16C").value) - NumWithComma(d.getElementById("frm1702q:txt17C").value)).toFixed(2));
        compute20C();
    }
    function compute20B() {
        d.getElementById("frm1702q:txt20B").value = formatCurrency((NumWithComma(d.getElementById("frm1702q:txt19A").value) * 1 + NumWithComma(d.getElementById("frm1702q:txt18B").value) * 1).toFixed(2));
        compute22A();
    }
    function compute20C() {
        d.getElementById("frm1702q:txt20C").value = formatCurrency((NumWithComma(d.getElementById("frm1702q:txt19B").value) * 1 + NumWithComma(d.getElementById("frm1702q:txt18C").value) * 1).toFixed(2));
        compute22B();
    }
    function compute22A() {
        d.getElementById("frm1702q:txt22A").value = formatCurrency((NumWithComma(d.getElementById("frm1702q:txt20B").value) * 1 - NumWithComma(d.getElementById("frm1702q:txt21B").value) * 1).toFixed(2));
        compute24A();
    }
    function compute22B() {
        if (d.getElementById("1702q:OptMethodDeduct_1").checked == true) {
            d.getElementById("frm1702q:txt22B").value = formatCurrency((NumWithComma(d.getElementById("frm1702q:txt20C").value) * 1 - NumWithComma(d.getElementById("frm1702q:txt21C").value) * 1).toFixed(2));
            compute24B();
        }
        else {
            d.getElementById("frm1702q:txt21C").value = formatCurrency((NumWithComma(d.getElementById("frm1702q:txt20C").value) * 1 * 0.4).toFixed(2));
            d.getElementById("frm1702q:txt22B").value = formatCurrency((NumWithComma(d.getElementById("frm1702q:txt20C").value) * 1 - NumWithComma(d.getElementById("frm1702q:txt21C").value) * 1).toFixed(2));
            compute24B();
        }
    }
    function compute24A() {
        d.getElementById("frm1702q:txt24A").value = formatCurrency((NumWithComma(d.getElementById("frm1702q:txt22A").value) * 1 + NumWithComma(d.getElementById("frm1702q:txt23A").value) * 1).toFixed(2));
        compute26A();
    }
    function compute24B() {
        d.getElementById("frm1702q:txt24B").value = formatCurrency((NumWithComma(d.getElementById("frm1702q:txt22B").value) * 1 + NumWithComma(d.getElementById("frm1702q:txt23B").value) * 1).toFixed(2));
        compute26B();
    }

    //
    function compute26A() {
        if (NumWithComma(d.getElementById("frm1702q:txt24A").value) > 0) {
            d.getElementById("frm1702q:txt26A").value = formatCurrency(((NumWithComma(d.getElementById("frm1702q:txt24A").value) * 1 * NumWithComma(d.getElementById("frm1702q:txt25A").value) * 1) / 100).toFixed(2));
            compute29D();
        }
        else
            d.getElementById("frm1702q:txt26A").value = 0;
        compute29D();
    }

    function compute26B() {
        if (NumWithComma(d.getElementById("frm1702q:txt24B").value) > 0) {
            d.getElementById("frm1702q:txt26B").value = formatCurrency(((NumWithComma(d.getElementById("frm1702q:txt24B").value) * 1 * NumWithComma(d.getElementById("frm1702q:txt25B").value) * 1) / 100).toFixed(2));
            compute29A();
        }
        else
            d.getElementById("frm1702q:txt26B").value = 0;
        compute29A();
    }

    function compute29A() {
        var txt26B = parseFloat(NumWithComma(d.getElementById("frm1702q:txt26B").value));
        var txt28 = parseFloat(NumWithComma(d.getElementById("frm1702q:txt28").value));

        if (txt26B < txt28) {
            d.getElementById("frm1702q:txt29A").value = formatCurrency((txt28).toFixed(2));
            d.getElementById("frm1702q:txt29B").disabled = true;
            d.getElementById("frm1702q:txt29B").value = 0;
        } else {
            d.getElementById("frm1702q:txt29A").value = formatCurrency((txt26B).toFixed(2));
            d.getElementById("frm1702q:txt29B").disabled = false;
        }
        compute29C();
    }
    function compute29C() {
        d.getElementById("frm1702q:txt29C").value = formatCurrency((NumWithComma(d.getElementById("frm1702q:txt29A").value) * 1 - NumWithComma(d.getElementById("frm1702q:txt29B").value) * 1).toFixed(2));
        compute30();
    }
    function compute29D() {
        d.getElementById("frm1702q:txt29D").value = formatCurrency((NumWithComma(d.getElementById("frm1702q:txt26A").value) * 1 - NumWithComma(d.getElementById("frm1702q:txt27").value) * 1).toFixed(2));
        compute30();
    }

    function compute30() {
        d.getElementById("frm1702q:txt30").value = formatCurrency((NumWithComma(d.getElementById("frm1702q:txt29C").value) * 1 + NumWithComma(d.getElementById("frm1702q:txt29D").value) * 1).toFixed(2));
        compute31H();
    }

    function compute31H() {
        d.getElementById("frm1702q:txt31H").value = formatCurrency((NumWithComma(d.getElementById("frm1702q:txt31A").value) * 1 + NumWithComma(d.getElementById("frm1702q:txt31B").value) * 1 + NumWithComma(d.getElementById("frm1702q:txt31C").value) * 1 +
            NumWithComma(d.getElementById("frm1702q:txt31D").value) * 1 + NumWithComma(d.getElementById("frm1702q:txt31E").value) * 1 + NumWithComma(d.getElementById("frm1702q:txt31F").value) * 1 + NumWithComma(d.getElementById("frm1702q:txt31G").value) * 1).toFixed(2));
        compute32();
    }

    function compute32() {
        d.getElementById("frm1702q:txt32").value = formatCurrency((NumWithComma(d.getElementById("frm1702q:txt30").value) * 1 - NumWithComma(d.getElementById("frm1702q:txt31H").value) * 1).toFixed(2));
        compute34();
    }
    function compute33D() {
        d.getElementById("frm1702q:txt33D").value = formatCurrency(NumWithComma(d.getElementById("frm1702q:txt33A").value) * 1 + NumWithComma(d.getElementById("frm1702q:txt33B").value) * 1 + NumWithComma(d.getElementById("frm1702q:txt33C").value) * 1);
        compute34();
    }
    function compute34() {
        d.getElementById("frm1702q:txt34").value = formatCurrency((NumWithComma(d.getElementById("frm1702q:txt32").value) * 1 + NumWithComma(d.getElementById("frm1702q:txt33D").value) * 1).toFixed(2));
        capital();
    }
    function initialValidateBeforeSave() {
        if ((d.getElementById('frm1702q:txtTin1').value == "" || d.getElementById('frm1702q:txtTin2').value == "" || d.getElementById('frm1702q:txtTin3').value == "" || d.getElementById('frm1702q:txtBranchCode').value == "")) {
            alert("Please enter a valid TIN number on Item 6.");
            return false;
        }
       
        if ((d.getElementById('frm1702q:txtTaxpayerName').value == "")) {
            alert("Please enter a valid Taxpayer Name on Item 9.");
            return false;
        }
        return true;
    }

    Array.prototype.contains = Array.prototype.indexOf ?
        function (val) {
            return this.indexOf(val) > -1;
        } :
        function (val) {
            var i = this.length;
            while (i--) {
                if (this[i] === val) {
                    return true;
                }
            }
            return false;
        };

    var disabledItems = new Array();
    function printme() {

        $('#bg').hide();
        $('.printSignFooterClass_1702Q').css({ 'width': '740px', 'margin': 'auto', 'margin-top': '15px', 'display': 'block', 'position': 'relative', 'overflow': 'visible', 'page-break-before': 'always', 'background': '#ffffff', 'border': 'white 100px solid !important' });
        $('.imgClass').css({ 'margin': 'auto', 'display': 'block', 'position': 'relative', 'overflow': 'visible' });
        
        $('#formPaper').css({ 'max-width': '8.3in !important', 'border': '#000 3px solid' });
        $('#wrapper').css({ 'max-width': '8.3in !important' });
        $('#container').css({ 'max-width': '8.3in !important' });

        var elem = document.getElementById('frmMain').elements;
        var x = 0;
        disabledItems = new Array();
        for (var i = 0; i < elem.length; i++) {
            if (elem[i].type != 'hidden') { // && elem[i].type != 'undefined' 
                if (elem[i].type == 'text') {
                    if (document.getElementById(elem[i].id).disabled) {
                        disabledItems[x] = elem[i].id;
                        x++;
                    }
                    document.getElementById(elem[i].id).style.height="15px";
                    document.getElementById(elem[i].id).style.fontSize="12px";
                    document.getElementById(elem[i].id).disabled = false;
                    document.getElementById(elem[i].id).style.color = '#000000';
                }
                if (elem[i].type == 'radio' || elem[i].type == 'checkbox') {
                    if (document.getElementById(elem[i].id).disabled) {
                        disabledItems[x] = elem[i].id;
                        x++;
                    }
                    document.getElementById(elem[i].id).disabled = true;
                }
                if (elem[i].type == 'select-one') {
                    $(elem[i]).hide();
                    var label = "<span class='labels'>".concat(elem[i].options[elem[i].selectedIndex].innerHTML).concat("&nbsp;</span>");
                    $(elem[i]).after(label);
                }
            }
        }

        $('.printButtonClass').hide();
		$('#formPaper').css({ 'margin-top': '-120px'});
        $("#formPaper").show();
        
        window.print();

        $('.printButtonClass').show();
        $('#formPaper').css({ 'border': '#a7a7a7 1px solid','margin-top': '0px' });
        $('#modalSched1').css({ 'display': 'none'});
        $('.imgClass').css({'display': 'none'});

        $('#printMenu').show('blind');
        if ($('#formMenu').css('display') != 'none') {
            $('#formMenu').hide('blind');
        }
    }
    function saveData()
    {
        var valid = initialValidateBeforeSave();
        if(valid == true){
                var form = $('#frmMain');
                var disabled = form.find(':input:disabled').removeAttr('disabled');
                console.log(form.serializeArray());
                var data = form.serialize();
                save('1702Q',data);
                
                disabled.attr('disabled','disabled');

                return false;
        }
    }
    /*Save Before Exit Function*/
    function saveBeforeExit()
    {
        $('#saveModal').modal('hide');
        var form = $('#frmMain');
        var disabled = form.find(':input:disabled').removeAttr('disabled');
        
        var data = form.serialize();
        saveAndExit('1702Q',data);
        disabled.attr('disabled','disabled');
        return false;
    }

    /*for Submit/ Final copy*/
    function submitForm()
    {
        $('#submitModal').modal('show');
    }

    function submitData()
    {
        var form = $('#frmMain');
        var disabled = form.find(':input:disabled').removeAttr('disabled');

        var data = form.serialize();
        var company_id = $('#frmMain').find('input[name="company"]').val();

        submitAndSave('1702Q', data, company_id);
        
        disabled.attr('disabled','disabled');
        return false;
    }

    function gotoMain(){
        var company_id = $('#frmMain').find('input[name="company"]').val();
        window.location = '/companies/'+ company_id +'/histories/1702Q';
    } 
</script>

@endsection
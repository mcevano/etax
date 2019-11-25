@extends('layouts.app')
@section('title', '| BIR Form No. 2553')

@section('content')
<!-- <div class="loader"></div> -->
<!-- Styles -->
<link href="{{ asset('css/forms.css') }}" rel="stylesheet">
<!-- Modals -->
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
        <button type="button" class="btn btn-danger btn-exit" id="2553" company='{{$company->id}}'>No</button>
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
      <div class="modal-body message"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-exit" id="2553" company='{{$company->id}}'>Okay</button>
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
            <button type="button" class="btn btn-danger btn-filing-success" form='2553' company='{{$company->id}}'>Okay</button>
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
            <div id="wrapper" style="margin: 0 auto; position: relative; width: 833px; ">
                <div id="formPaper">
                    <table width="826" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>
                                <table width="826" height="172" border="0" cellpadding="0" cellspacing="0" style="height:0px;">
                                    <tr>
                                        <td width="82"  style='padding:0px;' valign="middle" align="center">                    
                                          <p><img src="{{ asset('images/birflog.gif') }}" width="51" height="49" valign='3' halign='3' alt="birlogo" /></p>
                                        </td>
                                        <td width="160" valign="middle">
                                            <label face="Arial" size="1px">Republika ng Pilipinas
                                            <br/>Kagawaran ng Pananalapi
                                            <br/>Kawanihan ng Rentas Internas</label>
                                        </td>
                                        <td width="0" align="center">
                                            <font size="5px" style="font-weight:bold;">Return of Percentage Tax<br/>Payable Under Special Laws</font>
                                        </td>
                                        <td valign="top">
                                            <font face="Arial" size="1px">BIR Form No.<br/></font>
                                            <font face="Arial" size="6px">2553<br/></font>
                                            <font face="Arial" size="1px">July 1999 (ENCS)</font>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table width="820" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td height="65" valign="top" class="tblFormTd">
                                            <table width="202" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="15"><font size="2" style="font-weight:bold">&nbsp;1&nbsp;</font></td>
                                                    <td width="184">
                                                        <font size="1" style="font-size: 11px;">For the&nbsp;
                                                            <input id="frm2553:itemFiscalStartMonth:_1" name="frm2553:itemFiscalStartMonth" type="radio" value="C" onclick="dateyear()" />
                                                            Calendar
                                                            <input id="frm2553:itemFiscalStartMonth:_2" name="frm2553:itemFiscalStartMonth" type="radio" value="F" onclick="dateyear()" />
                                                            Fiscal 
                                                        </font> <font size="2" face="Arial">&nbsp; </font>
                                                    </td>
                                                </tr>
                                            </table>
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="15"><font size="2" style="font-weight:bold">&nbsp;2&nbsp;</font></td>
                                                    <td width="186"><font size="1" style="font-size: 11px;">Year Ended (MM/YYYY) </font></td>
                                                </tr>
                                            </table>
                                            <table width="201" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold">&nbsp;&nbsp;</font></td>
                                                    <td width="190" nowrap>
                                                        <span class="top">
                                                            <select id="frm2553:itemYearEndMonth" name="frm2553:itemYearEndMonth" size="1" onblur="datemonth()" onchange="changedMonth()">
                                                                <option value="00"></option>
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
                                                                <option value="12">12 - December</option>
                                                            </select>
                                                            <input id="frm2553:txtYearEnded" maxlength="4" name="frm2553:txtYearEnded" size="3" style="text-align: right" type="text" value="" onkeypress="return wholenumber(this, event)" onfocus="this.yearValue=this.value; return true;" onchange="changedYear(this.yearValue)"/>
                                                        </span>
                                                        <input type="hidden" id="hdStartMonth" value="" />
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td valign="top" class="tblFormTd">
                                            <table width="142" border="0" cellpadding="0" cellspacing="0">
                                                <tbody>
                                                    <tr valign="middle">
                                                        <td  height="20">
                                                            <b><font size="-1">&nbsp;3 &nbsp;</font></b> <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Quarter</font>
                                                        </td>
                                                    </tr>
                                                    <tr valign="middle" >
                                                        <td height="20">
                                                            <!-- fieldset id="frm2553:optQtr" style="font-family: Arial,Helvetica,sans-serif; font-size: 7pt;" -->
                                                                <table border="0" cellpadding="0" cellspacing="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td colspan="4">&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="35">
                                                                                <input id="frm2553:optQtr:_1" name="frm2553:optQtr" value="1" type="radio" />
                                                                                <label for="frm2553:optQtr:_1">1st</label>
                                                                            </td>
                                                                            <td width="37">
                                                                                <input id="frm2553:optQtr:_2" name="frm2553:optQtr" value="2" type="radio" />
                                                                                <label for="frm2553:optQtr_2">2nd</label>
                                                                            </td>
                                                                            <td width="35">
                                                                                <input id="frm2553:optQtr:_3" name="frm2553:optQtr" value="3" type="radio" />
                                                                                <label for="frm2553:optQtr_3">3rd</label>
                                                                            </td>
                                                                            <td width="37">
                                                                                <input checked id="frm2553:optQtr:_4" name="frm2553:optQtr" value="4" type="radio" />
                                                                                <label for="frm2553:optQtr_4">4th</label>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            <!-- /fieldset -->
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td valign="top" class="tblFormTd">
                                            <table width="146" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;4&nbsp;&nbsp;&nbsp;</font></td>
                                                    <td><font size="1" style="font-size: 11px;">Amended Return?</font></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <!-- fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm2553:j_id217" -->
                                                            <div align="center" style="padding: 5px 0 5px 0;">
                                                                <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb-dis fieldText1-dis">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><input type="radio" value="Y" name="frm2553:optAmended" id="frm2553:optAmended_1" onclick="d.getElementById('frm2553:txt20A').disabled = false;" />
                                                                                <label for="frm2553:j_id217:_1" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:12px;" >Yes</label>
                                                                                &nbsp;&nbsp;&nbsp;
                                                                            </td>
                                                                            <td>
                                                                                <input type="radio" value="N"  name="frm2553:optAmended" id="frm2553:optAmended_2" checked="checked" onclick="d.getElementById('frm2553:txt20A').disabled = true;d.getElementById('frm2553:txt20A').value = '0.00';computeTotalTaxCreditPayments();computeTaxPayable();" />
                                                                                <label for="frm2553:j_id217:_2" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:12px;" >No</label>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        <!-- /fieldset -->
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td valign="top" class="tblFormTd">                                  
                                            <table width="152" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;5&nbsp;&nbsp;&nbsp;</font></td>
                                                    <td><font size="1" style="font-size: 11px;">No. of Sheets Attached?</font></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td><input type="text" value="0" style="text-align: right;" size="4" name="frm2553:txtSheets" maxlength="2" id="frm2553:txtSheets" class="iceInpTxt-dis" onkeypress="return wholenumber(this, event)" /></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table width="820" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td class="tblFormTdPart">
                                            <table width="820" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td>&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;">Part I</font></td>
                                                    <td>
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
                                <table width="820" border="0" cellpadding="0" cellspacing="0" class="tblForm">
                                    <tr>
                                        <td valign="top" class="tblFormTd">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold"> &nbsp;6&nbsp;</font></td>
                                                    <td>
                                                        <font size="1" style="font-size: 11px;">TIN&nbsp;</font>
                                                        <font size="2" face="Arial">
                                                            <input type="text" value="{{$company->tin1}}" size="2" name="frm2553:txtTIN1" maxlength="3" id="frm2553:txtTIN1" onkeypress="return wholenumber(this, event)" />
                                                            <input type="text" value="{{$company->tin2}}" size="2" name="frm2553:txtTIN2" maxlength="3" id="frm2553:txtTIN2" onkeypress="return wholenumber(this, event)" />
                                                            <input type="text" value="{{$company->tin3}}" size="2" name="frm2553:txtTIN3" maxlength="3" id="frm2553:txtTIN3" onkeypress="return wholenumber(this, event)" />
                                                            <input type="text" value="{{$company->tin4}}" size="2" name="frm2553:txtBranchCode" maxlength="3" id="frm2553:txtBranchCode" onkeypress="return letternumber(event)" />
                                                        </font>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td valign="top" class="tblFormTd">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="100"><font size="2" style="font-weight:bold">&nbsp;7&nbsp;</font><font size="1" style="font-size: 11px;">RDO Code&nbsp;</font></td>
                                                    <td id="rdoSelect"> 
                                                        <select class='iceSelOneMnu' disabled="" id='frm2553:txtRDOCode' name='frm2553:txtRDOCode' size='1' >
                                                          <option value='{{$company->rdo_code}}'>{{$company->rdo_code}}</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td valign="top" class="tblFormTd">
                                            <table width="278" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="15"><font size="2" style="font-weight:bold">&nbsp;8&nbsp;</font></td>
                                                    <td width="120"><font size="1" style="font-size: 11px;">Line of Business/Occupation</font></td>
                                                    <td width="189">
                                                        <span class="normal">
                                                            <input id="frm2553:txtDescription" name="frm2553:txtDescription" disabled="" size="18" type="text" value="{{$company->line_business}}" onblur="return capital(this, event)" />
                                                        </span>
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
                                <table width="820"  border="0" cellpadding="0" cellspacing="0" class="tblForm">
                                    <tr>
                                        <td valign="top" class="tblFormTd">
                                            <table width="513" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td>
                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td width="11"><font size="2" style="font-weight:bold;">&nbsp;9&nbsp;</font></td>
                                                                <td><font size="1" style="font-size: 11px;">Taxpayer's Name (For Individual) Last Name, First Name, Middle Name/(For Non-Individual)Registered Name</font></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td width="25">&nbsp;</td>
                                                                <td><input type="text" disabled="" value="{{$company->registered_name}}" size="70" name="frm2553:txtTPName" maxlength="70" id="frm2553:txtTPName" onblur="return capital(this, event)" /></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td valign="top" class="tblFormTd">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="11"><font size="2" style="font-weight:bold">&nbsp;10&nbsp;</font></td>
                                                    <td>
                                                        <font size="1" style="font-size: 11px;">Telephone Number&nbsp;</font> <font size="2" face="Arial">
                                                            <input type="text" disabled value="{{$company->tel_number}}" size="15" name="frm2553:txtTelNum" maxlength="20" id="frm2553:txtTelNum" onkeypress="return wholenumber(this, event)" />
                                                        </font> 
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
                                <table width="820" border="0" cellpadding="0" cellspacing="0" class="tblForm">
                                    <tr>
                                        <td height="20" valign="top" class="tblFormTd">
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
                                                                <td><input type="text" disabled="" value="{{$company->address}}" size="70" name="frm2553:txtAddress" maxlength="70" id="frm2553:txtAddress" onblur="return capital(this, event)" /></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td valign="top" class="tblFormTd">
                                            <table width="154" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="149"><font size="2" style="font-weight:bold;">&nbsp;12&nbsp;</font><font size="1" style="font-size: 11px;">Zip
                                                            Code</font>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div align="center">
                                                            <input type="text" value="{{$company->zip_code}}" disabled="" size="12" name="frm2553:txtZipCode" maxlength="12" id="frm2553:txtZipCode" onkeypress="return wholenumber(this, event)" />
                                                        </div>
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
                                <table width="820" border="0" cellpadding="0" cellspacing="0" class="tblForm">
                                    <tr>
                                        <td height="30" valign="top" class="tblFormTd">                                      
                                            <table width="735" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="388"><font size="2" style="font-weight:bold;">&nbsp;13&nbsp;</font><font size="1" style="font-size: 11px;">Are there payees availing of tax relief under Special Law or International Tax Treaty?</font>
                                                    </td>
                                                    <td width="118">
                                                        <div align="center">
                                                            
                                                                <div align="center" style="padding: 5px 0 5px 0;">
                                                                    <div align="center">
                                                                        <table border="0" align="left" cellpadding="0" cellspacing="0" class="iceSelOneRb-dis fieldText1-dis">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div align="left"><font size="1" face="Arial">
                                                                                                <input type="radio" value="Y" name="frm2553:optTreaty" id="frm2553:optTreaty_1" onclick="selectTreaty()" />
                                                                                                <label for="frm2553:j_id398:_1" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >Yes</label>
                                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font> 
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div align="left">
                                                                                            <font size="1" face="Arial">
                                                                                                <input type="radio" value="N" name="frm2553:optTreaty" id="frm2553:optTreaty_2" checked onclick="selectTreaty()" />
                                                                                                <label for="frm2553:j_id398:_2" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:11px;" >No</label>
                                                                                            </font> 
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            
                                                        </div>
                                                        
                                                    </td>
                                                    <td width="229"><div align="left"></div>
                                                        <div align="center">
                                                            <label class="iceOutLbl" id="frm1603:j_id414" style="font-family: Arial, Helvetica, sans-serif; font-size : 11px;">If yes, specify</label>
                                                            <select id="frm2553:lstTaxTreaty" name="frm2553:lstTaxTreaty"  size="1" style="background-color: #fefefe; color: black">
                                                                <option value="0"></option>
                                                                <option value="1">Special Rate</option>
                                                                <option value="2">International Tax Treaty</option>
                                                                <!--option value="3">Both</option-->
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top" class="tblFormTd">
                                            <table width="718" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="100">&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;">Part II</font></td>
                                                    <td width="621"><div align="center"><font size="2" style="font-weight:bold;letter-spacing: 3px;">Computation of Tax</font></div></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table width="820" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td class="tblFormTd">
                                            <table width="820" border="0">
                                                <tr>
                                                    <td width="186"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Taxable Transaction/ Industry Classification</font></div></td>
                                                    <td width="70"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">ATC</font></div></td>
                                                    <td width="166"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Taxable Amount</font></div>                                                      </td>
                                                    <td width="110"><div align="center"></div>                                                      <div align="center"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Tax Rate</font></div>                                                      <div align="center"></div>                                                      <div align="center"></div></td>
                                                    <td width="176"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Tax Due</font></div>                                                      <div align="center"><font face="Arial, Helvetica, sans-serif" size="1"> </font></div></td>
                                                </tr>
                                            </table>
                                            <table width="820" border="0">
                                                <tr>
                                                    <td valign="top" width="31"><b><font face="Arial, Helvetica, sans-serif" size="2">&nbsp;14A</font></b></td>
                                                    <td width="153" height="29">
                                                        <input class="InpTxt-dis" id="frm2553:txt14A" name="frm2553:txt14A" size="18" type = "text" />
                                                    </td>
                                                    <td valign="top" width="39">
                                                        <div align="center">
                                                            <a href="#" id="frm2553:btn14B" onclick="showModalATC('14')">14B<!--<input type="button" class="printButtonClass" id="frm2553:btn14B" name="frm2553:btn14B" value="14B" onclick="showModalATC('14')" />--></a>
                                                        </div>
                                                    </td>
                                                    <td width="34">
                                                        <input id="frm2553:txt14B" maxlength="5" name="frm2553:txt14B" size="5" type="text"></input>
                                                    </td>
                                                    <td valign="top" width="32">
                                                        <div align="center">
                                                            <font face="Arial, Helvetica, sans-serif" size="1"><b><font face="Arial, Helvetica, sans-serif" size="2">14C&nbsp;</font></b>                             </font>
                                                        </div>
                                                    </td>

                                                    <td width="132">
                                                        <input id="frm2553:txt14C" maxlength="25" name="frm2553:txt14C" size="20" style="background-color: white; text-align: right;" value="0.00" onkeypress="return numbersonly(this, event)" type="text" onblur="round(this,2);computeTaxDue('frm2553:txt14C', 'frm2553:txt14D', 'frm2553:txt14E')" />
                                                    </td>
                                                    <td valign="top" width="32">
                                                        <div align="center">
                                                            <font face="Arial, Helvetica, sans-serif" size="1"><b><font face="Arial, Helvetica, sans-serif" size="2">14D&nbsp;</font></b>                             </font>
                                                        </div>
                                                    </td>
                                                    <td width="86">
                                                        <input id="frm2553:txt14D" maxlength="5" name="frm2553:txt14D" size="10" style="background-color: white; text-align: right;" value="0.00" type="text" onblur="computeTaxDue('frm2553:txt14C', 'frm2553:txt14D', 'frm2553:txt14E')" />
                                                    </td>
                                                    <td valign="top" width="30">
                                                        <div align="center">
                                                            <font face="Arial, Helvetica, sans-serif" size="1"><b><font face="Arial, Helvetica, sans-serif" size="2">14E&nbsp;</font></b>                             </font>
                                                        </div>
                                                    </td>
                                                    <td width="123">
                                                        <div align="left">
                                                            <input id="frm2553:txt14E" maxlength="25" name="frm2553:txt14E" size="20" style="text-align: right;" value="0.00" type="text" />
                                                        </div></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top"><b><font face="Arial, Helvetica, sans-serif" size="2">&nbsp;15A&nbsp;</font></b></td>
                                                    <td valign="top" height="28">
                                                        <input class="InpTxt-dis" id="frm2553:txt15A" name="frm2553:txt15A" size="18" type = "text" />
                                                    </td>
                                                    <td width = "39">
                                                        <div align="center">
                                                            <a href="#" id="frm2553:btn15B" onclick="showModalATC('15')">15B<!--<input type="button" class="printButtonClass" id="frm2553:btn15B" name="frm2553:btn15B" value="15B" onclick="showModalATC('15')" />--></a>
                                                        </div>
                                                    </td>
                                                    <td valign="top">
                                                        <input id="frm2553:txt15B" maxlength="5" name="frm2553:txt15B" size="5" type="text"></input>
                                                    </td>
                                                    <td valign="top">
                                                        <div align="center">
                                                            <font face="Arial, Helvetica, sans-serif" size="1"><b><font face="Arial, Helvetica, sans-serif" size="2">15C&nbsp;</font></b>                             </font>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input id="frm2553:txt15C" maxlength="25" name="frm2553:txt15C" size="20" style="background-color: white; text-align: right;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);computeTaxDue('frm2553:txt15C', 'frm2553:txt15D', 'frm2553:txt15E')" />
                                                    </td>
                                                    <td valign="top">
                                                        <div align="center">
                                                            <font face="Arial, Helvetica, sans-serif" size="1"><b><font face="Arial, Helvetica, sans-serif" size="2">15D&nbsp;</font></b>                             </font>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input id="frm2553:txt15D" maxlength="5" name="frm2553:txt15D" size="10" style="background-color: white; text-align: right;" value="0.00" type="text" onblur="computeTaxDue('frm2553:txt15C', 'frm2553:txt15D', 'frm2553:txt15E')" />
                                                    </td>
                                                    <td valign="top">
                                                        <div align="center">
                                                            <font face="Arial, Helvetica, sans-serif" size="1"><b><font face="Arial, Helvetica, sans-serif" size="2">15E&nbsp;</font></b>                             </font>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div align="left">
                                                            <input id="frm2553:txt15E" maxlength="25" name="frm2553:txt15E" size="20" style="text-align: right;" value="0.00" type="text" />
                                                        </div></td>
                                                </tr>
                                                <tr>
                                                    <td height="29" valign="top"><font face="Arial, Helvetica, sans-serif" size="1"><b><font face="Arial, Helvetica, sans-serif" size="2">&nbsp;16A</font></b></font></td>
                                                    <td>
                                                        <input class="InpTxt-dis" id="frm2553:txt16A" name="frm2553:txt16A" size="18" type = "text" />
                                                    </td>
                                                    <td valign="top">
                                                        <div align="center">
                                                            <a href="#" id="frm2553:btn16B" onclick="showModalATC('16')">16B<!--<input type="button" class="printButtonClass" id="frm2553:btn16B" name="frm2553:btn16B" value="16B" onclick="showModalATC('16')" />--></a>
                                                        </div>
                                                    </td>
                                                    <td valign="top">
                                                        <input id="frm2553:txt16B" maxlength="5" name="frm2553:txt16B" size="5" type="text"></input>
                                                    </td>
                                                    <td valign="top">
                                                        <div align="center">
                                                            <font face="Arial, Helvetica, sans-serif" size="1"><b><font face="Arial, Helvetica, sans-serif" size="2">16C&nbsp;</font></b>                             </font>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input id="frm2553:txt16C" maxlength="25" name="frm2553:txt16C" size="20" style="background-color: white; text-align: right;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);computeTaxDue('frm2553:txt16C', 'frm2553:txt16D', 'frm2553:txt16E')" />
                                                    </td>
                                                    <td valign="top">
                                                        <div align="center">
                                                            <font face="Arial, Helvetica, sans-serif" size="1"><b><font face="Arial, Helvetica, sans-serif" size="2">16D&nbsp;</font></b>                             </font>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input id="frm2553:txt16D" maxlength="5" name="frm2553:txt16D" size="10" style="background-color: white; text-align: right;" value="0.00" type="text" onblur="computeTaxDue('frm2553:txt16C', 'frm2553:txt16D', 'frm2553:txt16E')" />
                                                    </td>
                                                    <td valign="top">
                                                        <div align="center">
                                                            <font face="Arial, Helvetica, sans-serif" size="1"><b><font face="Arial, Helvetica, sans-serif" size="2">16E&nbsp;</font></b>                             </font>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div align="left">
                                                            <input id="frm2553:txt16E" maxlength="25" name="frm2553:txt16E" size="20" style="text-align: right;" value="0.00" type="text" />
                                                        </div></td>
                                                </tr>
                                                <tr>
                                                    <td height="29" valign="top"><font face="Arial, Helvetica, sans-serif" size="1"><b><font face="Arial, Helvetica, sans-serif" size="2">&nbsp;17A</font></b></font></td>
                                                    <td><input class="InpTxt-dis" id="frm2553:txt17A" name="frm2553:txt17A" size="18" type = "text" /></td>
                                                    <td valign="top">
                                                        <div align="center">
                                                           <a href="#" id="frm2553:btn17B" onclick="showModalATC('17')">17B <!--<input type="button" class="printButtonClass" id="frm2553:btn17B" name="frm2553:btn17B" value="17B" onclick="showModalATC('17')" />--></a>
                                                        </div>
                                                    </td>
                                                    <td valign="top">
                                                        <input id="frm2553:txt17B" maxlength="5" name="frm2553:txt17B" size="5" type="text"></input>
                                                    </td>
                                                    <td valign="top">
                                                        <div align="center">
                                                            <font face="Arial, Helvetica, sans-serif" size="1"><b><font face="Arial, Helvetica, sans-serif" size="2">17C&nbsp;</font></b></font>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input id="frm2553:txt17C" maxlength="25" name="frm2553:txt17C" size="20" style="background-color: white; text-align: right;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);computeTaxDue('frm2553:txt17C', 'frm2553:txt17D', 'frm2553:txt17E')" />
                                                    </td>
                                                    <td valign="top">
                                                        <div align="center">
                                                            <font face="Arial, Helvetica, sans-serif" size="1"><b><font face="Arial, Helvetica, sans-serif" size="2">17D&nbsp;</font></b></font>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input id="frm2553:txt17D" maxlength="5" name="frm2553:txt17D" size="10" style="background-color: white; text-align: right;" value="0.00" type="text" onblur="computeTaxDue('frm2553:txt17C', 'frm2553:txt17D', 'frm2553:txt17E')" />
                                                    </td>
                                                    <td valign="top">
                                                        <div align="center">
                                                            <font face="Arial, Helvetica, sans-serif" size="1"><b><font face="Arial, Helvetica, sans-serif" size="2">17E&nbsp;</font></b>                             
                                                            </font>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div align="left">
                                                            <input id="frm2553:txt17E" maxlength="25" name="frm2553:txt17E" size="20" style="text-align: right;" value="0.00" type="text" />
                                                        </div></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top"><font face="Arial, Helvetica, sans-serif" size="1"><b><font face="Arial, Helvetica, sans-serif" size="2">&nbsp;18A</font></b></font></td>
                                                    <td><input class="InpTxt-dis" id="frm2553:txt18A" name="frm2553:txt18A" size="18" type = "text" /></td>
                                                    <td valign="top">
                                                        <div align="center">
                                                            <a href="#" id="frm2553:btn18B" onclick="showModalATC('18')">18B<!--<input type="button" class="printButtonClass" id="frm2553:btn18B" name="frm2553:btn18B" value="18B" onclick="showModalATC('18')" />--></a>
                                                        </div>
                                                    </td>
                                                    <td valign="top">
                                                        <input id="frm2553:txt18B" maxlength="5" name="frm2553:txt18B" size="5" type="text"></input>
                                                    </td>
                                                    <td valign="top">
                                                        <div align="center">
                                                            <font face="Arial, Helvetica, sans-serif" size="1"><b><font face="Arial, Helvetica, sans-serif" size="2">18C&nbsp;</font></b>                             </font>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input id="frm2553:txt18C" maxlength="25" name="frm2553:txt18C" size="20" style="background-color: white; text-align: right;" onkeypress="return numbersonly(this, event)" value="0.00" type="text" onblur="round(this,2);computeTaxDue('frm2553:txt18C', 'frm2553:txt18D', 'frm2553:txt18E')" />
                                                    </td>
                                                    <td valign="top">
                                                        <div align="center">
                                                            <font face="Arial, Helvetica, sans-serif" size="1"><b><font face="Arial, Helvetica, sans-serif" size="2">18D&nbsp;</font></b>                             </font>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input id="frm2553:txt18D" maxlength="5" name="frm2553:txt18D" size="10" style="background-color: white; text-align: right;" value="0.00" type="text" onblur="computeTaxDue('frm2553:txt18C', 'frm2553:txt18D', 'frm2553:txt18E')" />
                                                    </td>
                                                    <td valign="top">
                                                        <div align="center">
                                                            <font face="Arial, Helvetica, sans-serif" size="1"><b><font face="Arial, Helvetica, sans-serif" size="2">18E&nbsp;</font></b>                             </font>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div align="left">
                                                            <input id="frm2553:txt18E" maxlength="25" name="frm2553:txt18E" size="20" style="text-align: right;" value="0.00" type="text" />
                                                        </div></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top"><b><font face="Arial, Helvetica, sans-serif" size="2">19</font></b></td>
                                                    <td valign="top"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Total Tax Due</font></td>
                                                    <td valign="top">&nbsp;</td>
                                                    <td valign="top">&nbsp;</td>
                                                    <td valign="top">&nbsp;</td>
                                                    <td valign="top">&nbsp;</td>
                                                    <td valign="top">&nbsp;</td>
                                                    <td valign="top">&nbsp;</td>
                                                    <td valign="top">
                                                        <div align="center">
                                                            <font face="Arial, Helvetica, sans-serif" size="1"><b><font face="Arial, Helvetica, sans-serif" size="2">19&nbsp;</font></b>                              </font>
                                                        </div>
                                                    </td>
                                                    <td valign="top">
                                                        <div align="left">
                                                            <input id="frm2553:txt19" maxlength="25" name="frm2553:txt19" size="20" style="text-align: right;" value="0.00" type="text" />
                                                        </div></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top"><b><font face="Arial, Helvetica, sans-serif" size="2">20</font></b></td>
                                                    <td colspan="7" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="534">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="right" width="33"><font size="1" face="Arial" style="font-size: 11px;">Less</font> :</td>
                                                                    <td width="257"><font size="1" face="Arial" style="font-size: 11px;">&nbsp;&nbsp; Tax Credits/Payments</font></td>
                                                                    <td width="244"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table></td>
                                                    <td valign="top">&nbsp;</td>
                                                    <td valign="top">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top">&nbsp;</td>
                                                    <td colspan="7" valign="top"><table width="534" height="28" border="0" cellpadding="0" cellspacing="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="right" width="33"> <b><font size="2" face="Arial">20A</font></b>:</td>
                                                                    <td width="390"><font size="1" face="Arial" style="font-size: 11px;">&nbsp;&nbsp; Tax Paid in Return Previously Filed, if this is an Amended Return</font></td>
                                                                    <td width="111"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table></td>
                                                    <td valign="top"><div align="center"><b><font size="2" face="Arial">20A</font></b></div></td>
                                                    <td valign="top"><input id="frm2553:txt20A" name="frm2553:txt20A" size="20" maxlength="25" style="text-align: right;" value="0.00" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeTotalTaxCreditPayments();computeTotalTaxDue()"  type="text" /></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top">&nbsp;</td>
                                                    <td colspan="7" valign="top"><table width="534" height="28" border="0" cellpadding="0" cellspacing="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="right" width="33"><b><font size="2" face="Arial">20B</font></b>:</td>
                                                                    <td width="390"><font size="1" face="Arial" style="font-size: 11px;">&nbsp;&nbsp; Creditable Tax Withheld Per BIR Form 2307</font></td>
                                                                    <td width="111"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table></td>
                                                    <td valign="top"><div align="center"><b><font size="2" face="Arial">20B</font></b></div></td>
                                                    <td valign="top"><input id="frm2553:txt20B" maxlength="25" name="frm2553:txt20B" size="20" style="text-align: right;" value="0.00" type="text" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeTotalTaxCreditPayments();computeTotalTaxDue()" /></td>
                                                </tr>
                                                <tr>
                                                    <td valign="top">&nbsp;</td>
                                                    <td colspan="7" valign="top"><table width="534" height="28" border="0" cellpadding="0" cellspacing="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="right" width="33"><b><font size="2" face="Arial">20C</font></b>:</td>
                                                                    <td width="390"><font size="1" face="Arial" style="font-size: 11px;">&nbsp;&nbsp; Total Tax Credits/Payments (Sum of Items 20A &amp; 20B)</font></td>
                                                                    <td width="111"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table></td>
                                                    <td valign="top"><div align="center"><b><font size="2" face="Arial">20C</font></b></div></td>
                                                    <td valign="top"><input id="frm2553:txt20C" name="frm2553:txt20C" size="20" maxlength="25" style="background-color: rgb(220, 220, 220); text-align: right;" value="0.00" type="text" /></td>
                                                </tr>
                                                <tr>
                                                    <td><b><font face="Arial, Helvetica, sans-serif" size="2">21</font></b></td>
                                                    <td colspan="7"><font size="1" face="Arial" style="font-size: 11px;">&nbsp;&nbsp;Tax Payable (Overpayment) (Item 19 less Item 20C)</font></td>
                                                    <td><div align="center"><b><font size="2" face="Arial">21</font></b></div></td>
                                                    <td>
                                                        <input id="frm2553:txt21" name="frm2553:txt21" size="20" maxlength="25" style="background-color: rgb(220, 220, 220); text-align: right;" value="0.00" type="text" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b><font face="Arial, Helvetica, sans-serif" size="2">22</font></b></td>
                                                    <td><font size="1" face="Arial" style="font-size: 11px;">Add: Penalties</font></td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td colspan="7">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="503">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="center" width="164"><font size="1" face="Arial" style="font-size: 11px;">Surcharge</font></td>
                                                                    <td align="center" width="165"><font size="1" face="Arial" style="font-size: 11px;">Interest</font></td>
                                                                    <td align="center" width="171"><font size="1" face="Arial" style="font-size: 11px;">Compromise</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b><font size="2" face="Arial">22A</font></b>
                                                                        <input id="frm2553:txt22A" maxlength="15" name="frm2553:txt22A" size="15" style="text-align: right;" value="0.00" type="text" onblur="round(this,2);computePenalties()" onkeypress="return numbersonly(this, event)" />
                                                                    </td>
                                                                    <td><b><font size="2" face="Arial">22B</font></b>
                                                                        <input id="frm2553:txt22B" maxlength="15" name="frm2553:txt22B" size="15" style="text-align: right;" value="0.00" type="text" onblur="round(this,2);computePenalties()" onkeypress="return numbersonly(this, event)" />
                                                                    </td>
                                                                    <td ><b><font size="2" face="Arial">22C</font></b>
                                                                        <input id="frm2553:txt22C" maxlength="15" name="frm2553:txt22C" size="15" style="text-align: right;" value="0.00" type="text" onblur="round(this,2);computePenalties()" onkeypress="return numbersonly(this, event)" />
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td valign="bottom"><div align="center"><b><font size="2" face="Arial">22D</font></b></div></td>
                                                    <td valign="bottom"><input id="frm2553:txt22D" name="frm2553:txt22D" size="20" maxlength="25" style="background-color: rgb(220, 220, 220); text-align: right;" value="0.00" type="text" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b><font face="Arial, Helvetica, sans-serif" size="2">23</font></b></td>
                                                    <td colspan="7"><font size="1" face="Arial" style="font-size: 11px;">Total Amount Payable / (Overpayment) (Sum of Items 21 and 22D)</font></td>
                                                    <td valign="bottom"><div align="center"><b><font size="2" face="Arial">23</font></b></div></td>
                                                    <td valign="bottom"><input id="frm2553:txt23" name="frm2553:txt23" size="20" maxlength="25" style="background-color: rgb(220, 220, 220); text-align: right;" value="0.00" type="text" /></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="10"><font size="1" face="Arial" style="font-size: 11px;">If Overpayment, mark one box only:&nbsp;</font> &nbsp;
                                                        
                                                            <table class="iceSelOneRb-dis" border="0" cellpadding="0" cellspacing="0" >
                                                                <tbody>
                                                                    <tr>
                                                                        <td><input id="frm2553:ifoverpay_1" name="frm2552:ifoverpay" value="R" type="radio" /><label class="iceSelOneRb-dis-dis" style="font-family: Arial,Helvetica,sans-serif; font-size: 11px;" for="frm2552:txt19ifoverpay:_1">To be Refunded</label></td>
                                                                        <td><input id="frm2553:ifoverpay_2" name="frm2552:ifoverpay"  value="I" type="radio" /><label class="iceSelOneRb-dis-dis" style="font-family: Arial,Helvetica,sans-serif; font-size: 11px;" for="frm2552:txt19ifoverpay:_2">To be issued a Tax Certificate</label></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                                <table width="820" border="0" cellpadding="0" cellspacing="0" class="tblForm">
                                    <tr>
                                        <td class="tblFormTd"></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                <div class="imgClass" align='center' style="display:none; width:820px !important;">
                  <!-- <img id="frm2553:jurat" src="../img/jurat/2553.jpg" width="820"/> -->
                  <table  style="border-top: 3px solid black; border-collapse: collapse; font-family:arial; font-size:12px; text-align: center; table-layout: fixed;">
                    <col width="50%" />
                      <col width="50%" />
                      <tr>
                        <td colspan="2">I declare, under the penalties of perjury, that this return has been made in good faith, verified by me, and to the best of my knowledge, and belief,
                            <br/>is true and correct, pursuant to the provisions of the National Internal Revenue Code, as amended, and the regulations issued under authority thereof.
                            <br/>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><b>24</b>____________________________________________________
                          <br/>Taxpayer/Authorized Agent Signature over Printed Name
                        <br/>&nbsp;</td>
                        <td><b>25</b>_______________________________
                          <br/>Title/Position of Signatory
                          <br/>&nbsp;</td>
                      </tr>
                  </table>
                </div>
                <div class="imgClass" align='center' style="display:none; width:820px !important;">
                  <img id="frm2553:jurat" src="{{ asset('images/bottom_img/2553_new.jpg') }}" width="820"/>
                </div>
                <div class="imgClass" align='center' style="display:none; width:820px !important;">
                  <table style="font-size:12px; text-align: left; vertical-align: top;">
                    <tr>
                      <td>&nbsp;Machine Validation/Revenue Official Receipt Details (If not filed with the bank)<br/><br/><br/><br/><br/></td>
                    </tr>
                  </table>
                </div>
                                <table width="820" border="0" cellspacing="0" cellpadding="0" class="tblForm printButtonClass">
                                    <tr>
                                        <td class="tblFormTdPart">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td>
                                                        <table width="820" cellspacing="0" cellpadding="0" border="0">
                                                            <tbody>
                                                                <tr valign="middle">
                                                                    <td>&nbsp;</td>
                                                                    <td>
                                                                        <div id="frm2553:j_id743" class="icePnlGrp">
                                                                            <div align="center">
                                                                              @if($action != 'view')
                                                                                <input class="printButtonClass" type="button" value="Validate" style="width: 100px;" name="frm2553:cmdValidate" id="frm2553:cmdValidate" onclick="validateForm()" />
                                                                                <input class="printButtonClass" type="button" value="Edit" style="width: 100px;" name="frm2553:cmdEdit" id="frm2553:cmdEdit" onclick="editForm()"/>
                                                                                <input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />
                                                                                <input class="printButtonClass" type="button" value="Save" style="width: 100px;" name="btnSave" id="btnSave" onclick="saveData();" />
                                                                                <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                                                <input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;" name="frm2553:btnFinalCopy" id="frm2553:btnFinalCopy" onclick="submitForm();" />
                                                                              @else
                                                                                 <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                                                 <input class="printButtonClass" type="button" value="Back" style="width: 100px;" onclick="gotoMain();" />
                                                                              @endif
                                                                                <div id="msg" class="printButtonClass" style="display:none;"></div>                                       
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                            </tbody>
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
                                    <div class="footer footer2552" style="padding:6px; text-align: center; font-size: 11px; background-color: white;">
                                        <font>Disclaimer : eTax is not connected with BIR or any government agency.</font>
                                    </div>
                                </td>
                            </tr>
                    </table>

                    <div id="DummyTxt" style='display:none;'>  </div>

                </div>
            </div>
        </div>

        <!--Start Modal for ATC-->
        <div id="modalAtc" class="aBox" style="width:94%; display:none; min-height:400px; position:relative; top:3%; left:3%; right:auto; overflow-y:auto; background:#fff;" align="left"> 
            <table width="100%">
                <tr>
                    <td class="modalHeader" style="text-align: left;background-color: gainsboro">
                        
                    </td>
                </tr>
                <tr>
                    <td><hr /></td>
                </tr>
                <tr>
                    <td>
                        <center>
                            <table width="80%">
                                <tr>
                                    <td class="modalColumnHeader" width="100%">
                                        
                                    </td>
                                </tr>
                            </table>
                            <table width="80%" border="1">
                                <thead>
                                    <tr class="modalColumnHeader">
                                        <td width="5%">&nbsp;

                                        </td>
                                        <td style="font-weight: bold;text-align: center" width="15%">
                                            ATC
                                        </td>
                                        <td style="font-weight: bold;text-align: center" width="55%">
                                            Description
                                        </td>
                                        <td style="font-weight: bold;text-align: center" width="15%">
                                            Rate
                                        </td>
                                    </tr>
                                </thead>
                                <tbody class="modalContent" id="tBodyOfATC">

                                </tbody>
                            </table>
                        </center>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>
                        <center>
                            <input type="button" style="height: 30px; width: 50px;" name="frm2553:modalOK" id="frm2553:modalOK" value="OK " onclick="getATCCode()" />&nbsp;&nbsp;&nbsp;
                            <input type="button" style="height: 30px; width: 70px;" name="frm2553:modalCancel" id="frm2553:modalCancel" value="CANCEL" onclick="hideModalATC()" />
                        </center>
                    </td>
                </tr>
            </table>
        </div>
        <!--End Modal for ATC-->          
  
  <div id="hiddenEmail" style="display:none;"  > 
          <input id="txtEmail" class="emailClass" value="{{$company->email_address}}" name="txtEmail" type="text" onblur="" onkeypress="" maxlength="60"   />
    </div>
  
  </form> 
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
@endsection

@section('scripts')
<script type="text/javascript">
  var isSubmitFinal = false;
  var isSubmit = false;
  
  var gIsReadOnly = false;
  var fileName = "";
  var existingXMLFileName = "";
  var fileNameToExport = "";
  
  var atcList = new Array();
  
  var savedReturn = "";
  var p3Compromise = "";
  var p3Surcharge = "";
  var p3Interest = "";
  var p3IsAmended = "";
  var p3FilingDate = "";
  var p3ReturnPeriod = "";
  
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
  var p3TPZip = "";   var globalEmail = "";

  function atcPropertyJS(formType, atcCode, description, rate, category, base, compType, constTaxDue, minimum, maximum)
  {
    this.formType=formType;
    this.atcCode=atcCode;
    this.description=description;
    this.rate=rate;
    this.category=category;
    this.base=base;
    this.compType=compType;
    this.constTaxDue=constTaxDue;
    this.minimum=minimum;
    this.maximum=maximum;
  }
  
  /*----------------------------------*/
    var d=document,XMLBGFile='',data='',XMLFile='', XMLATCFile='',msg = d.getElementById('msg');
  var loader=d.getElementById('loader');
  /*----------------------------------*/  
  
    var str;
    var codeATC;
    var descATC;
    var rateATC;
    var rowFlag;

    str = setInterval("sleeptime()", 300);
    function sleeptime()
    {
        clearInterval(str);
        loadXMLATC('/xml/atcCodes.xml');
        init(); 
    
        var xmlFileName = document.getElementById('file_name').value;        
        fileName = xmlFileName;
        if (fileName != null && fileName.indexOf('.xml') > -1) {
          loadXML(fileName); 

          d.getElementById('frm2553:itemFiscalStartMonth:_1').disabled = true;
          d.getElementById('frm2553:itemFiscalStartMonth:_2').disabled = true;
          d.getElementById('frm2553:itemYearEndMonth').disabled = true;
          d.getElementById('frm2553:txtYearEnded').disabled = true;
          
          existingXMLFileName = fileName;
          if (gIsReadOnly) { 
          window.setTimeout("disableAllElementIDs(); d.getElementById('btnUpload').disabled = false;",1000); 
          }
        } else {
          window.setTimeout("$('#loader').hide('blind');",100);
        }
        if ( $('#printMenu').css('display') != 'none' ) { 
          $('#printMenu').hide('blind');
        }   
        d.getElementById('frm2553:txtTIN1').disabled = true;
        d.getElementById('frm2553:txtTIN2').disabled = true;
        d.getElementById('frm2553:txtTIN3').disabled = true;
        d.getElementById('frm2553:txtBranchCode').disabled = true; 
    }
  
  function rdoPropertyJS(rdoCode, description) 
  {
   this.rdoCode=rdoCode;
   this.description=description;
  }
   
  var rdoList = new Array();

  /*--------------------------------------------------------------*/
  //Added By dgarfin
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
        d.getElementById('responseATC').innerHTML=xmlHTTP.responseText;
        loadATC();                       
                
        if (response.innerHTML.indexOf("All Rights Reserved BIR 2012.0") >= 0) {
            gIsReadOnly = true;
        }

  } 
  
  var atcCount=0;
  
  function loadATC() {
    /*This will load data onto an array*/
    var response = d.getElementById("responseATC");
    
    var atcCnt = String(response.innerHTML).split('atcCount=');
    atcCount = atcCnt[1]; 
    
    var j = 0;
    //loads atcList from xml
    for (var i = 1; i <= atcCount; i++) { 
      
      var atc = String(response.innerHTML).split('atc'+i+':');
      var atcStr = atc[1];
      
      //Ensure that before writing to atcPropertyJS the formType 2553 is traceable in atcStr
      if (atcStr.indexOf('2553') >= 0) {
          var atcValues = atcStr.split('~');        
        
        var formType = "2553";
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
        //alert('2553 successfully created array #'+i);
        
      } else {    
        //alert('2553 not found in array #'+i);
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
        loadData();

        if (response.innerHTML.indexOf("All Rights Reserved BIR 2012.0") >= 0) {
          gIsReadOnly = true;
        }
      
        if (gIsReadOnly) {
          d.getElementById('frm2553:cmdValidate').disabled = true;
          d.getElementById('btnSave').disabled = true;
        }
  }
  
  function loadData() {
    /*This will load data onto fields*/
    var response = d.getElementById("response");

        var elem = document.getElementById('frmMain').elements;
        for(var i = 0; i < elem.length; i++)
        {
      try{
        if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {  //elem[i].type != 'button' &&       
          if (elem[i].type == 'text' || elem[i].type == 'select-one') {
            var fieldVal = String( $("#response").html() ).split(elem[i].id+'='); 
            if(elem[i].id == 'frm2553:txtTPName' || elem[i].id == 'frm2553:txtDescription' || elem[i].id == 'frm2553:txtAddress'){
              elem[i].value = unescape(fieldVal[1]);
            }
            else if (elem[i].className.indexOf("FinalFlag") > -1) {
                        elem[i].value = typeof (fieldVal[1]) === "undefined" ? "3" : fieldVal[1];
                    }
            else{
              elem[i].value = fieldVal[1]; //all select-one and text values       
            }
          }
          if (elem[i].type == 'radio') {
            var rdoVal = String( $("#response").html() ).split(elem[i].id+'=');       
            if (rdoVal[1] == 'true') {
              elem[i].checked = rdoVal[1];
              elem[i].onclick();
            }         
          } 
          if (elem[i].type == 'checkbox') {
            var chkboxVal = String( $("#response").html() ).split(elem[i].id+'=');        
            if (chkboxVal[1] == 'true') {
              elem[i].checked = chkboxVal[1];
            }         
          }
         
        }
      } catch(e) {
       
      }

        }     

  }
  
    function init()
    {
         var date = new Date();
         var month = new Date();
         var year = new Date();
         
        d.getElementById('frm2553:txtYearEnded').value = date.getFullYear();
        d.getElementById('frm2553:itemYearEndMonth').selectedIndex = month.getMonth() + 1;
        d.getElementById('frm2553:itemFiscalStartMonth:_1').disabled = false;
            d.getElementById('frm2553:itemFiscalStartMonth:_2').disabled = false;
        if (month.getMonth() == 0 || month.getMonth() == 1 || month.getMonth == 2)
        {
          d.getElementById('frm2553:optQtr:_1').checked = true;
        }
        else if (month.getMonth() == 3 || month.getMonth() == 4 || month.getMonth == 5)
        {
          d.getElementById('frm2553:optQtr:_2').checked = true;
        }
        else if (month.getMonth() == 6 || month.getMonth() == 7 || month.getMonth == 8)
        {
          d.getElementById('frm2553:optQtr:_3').checked = true;
        }
        else if (month.getMonth() == 9 || month.getMonth() == 10 || month.getMonth == 11)
        {
          d.getElementById('frm2553:optQtr:_4').checked = true;
        }
      
        d.getElementById('frm2553:optAmended_1').disabled = false;
        d.getElementById('frm2553:optAmended_2').disabled = false;
        d.getElementById('frm2553:txtSheets').disabled = false;
       
        d.getElementById('frm2553:lstTaxTreaty').disabled = true;

        var x = 14;
        while(x < 19){
            d.getElementById('frm2553:txt' + x + 'A').disabled = true;
            d.getElementById('frm2553:txt' + x + 'B').disabled = true;
            d.getElementById('frm2553:txt' + x + 'D').disabled = true;
            d.getElementById('frm2553:txt' + x + 'E').disabled = true;
            x++;
        }

        d.getElementById('frm2553:txt19').disabled = true;
        d.getElementById('frm2553:txt20A').disabled = true;
        d.getElementById('frm2553:txt20C').disabled = true;
        d.getElementById('frm2553:txt21').disabled = true;
        d.getElementById('frm2553:txt22A').disabled = false;
        d.getElementById('frm2553:txt22B').disabled = false;
        d.getElementById('frm2553:txt22C').disabled = false;
        d.getElementById('frm2553:txt22D').disabled = true;
        d.getElementById('frm2553:txt23').disabled = true;
        d.getElementById('frm2553:ifoverpay_1').disabled = true;
        d.getElementById('frm2553:ifoverpay_2').disabled = true;

        @if($action != 'view')
        d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm2553:cmdEdit').disabled = true;
        d.getElementById('frm2553:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;
        @endif
    }

    function blockletter(e)
    {
        var number = parseFloat(e.value).toFixed(2);
        if(isNaN(number))
        {
            var zero = 0;
            e.value = parseFloat(zero).toFixed(2);
        }else {
            e.value = '' + number;
        }
    }

    function populateATC()
    {
        codeATC = new Array();
        descATC = new Array();
        rateATC = new Array();

        //var atcSize = atcList.getSize();
        var atcSize = atcList.length;
        var i = 0;
        var j = 1;
        codeATC[0] = "";
        descATC[0] = "";
        rateATC[0] = "0.0";
        for(i = 0; i < atcSize; i++) {
            //var atc = atcList.get(i);
            var atc = atcList[i];
            if(atc.formType == "2553") {
                codeATC[j] = atc.atcCode;
                descATC[j] = atc.description;
                if(atc.atcCode == "OT012"){
                    rateATC[j++] = "0.0";
                }else {
                    rateATC[j++] = atc.rate;
                }
            }
        }
    }

    function showModalATC(flag)
    {
        rowFlag = flag;

        d.getElementById('formPaper').style.display = "none";
        $('#modalAtc').show('blind');     

        populateATC();

        var x = 0;
        var innerText = "";
        while(x < codeATC.length){
          innerText = innerText +
            "<tr class='atc'><td width='5%' class='atc'><center><input type='radio' id='frm2553:optATC" + x + "' name='frm2553:optATC' value='" + codeATC[x] + "' /></center></td>" +
            "<td width='15%' class='atc' style='font-size: 11px;'><center>" + codeATC[x] + "</center></td>" +
            "<td width='55%' class='atc atcNames'  style='font-size: 11px;'><center>" + descATC[x] + "</center></td>" +
            "<td width='15%' class='atc'  style='font-size: 11px;'><center>" + rateATC[x] + "0%</center></td></tr>";

          x++;
        }
        $('#tBodyOfATC').html(innerText);
    }

    function getATCCode()
    {
        var isValid = true;
        var x = 0;
        var isOptChecked;
        while(x < codeATC.length){
            isOptChecked = d.getElementById('frm2553:optATC' + x).checked;
            if(isOptChecked){
                d.getElementById('frm2553:txt' + rowFlag + 'A').value = descATC[x];
                d.getElementById('frm2553:txt' + rowFlag + 'B').value = codeATC[x];

                if(codeATC[x] == "OT012"){
                    d.getElementById('frm2553:txt' + rowFlag + 'D').disabled = false;
                    d.getElementById('frm2553:txt' + rowFlag + 'D').value = (0).toFixed(2);
                }else {
                    d.getElementById('frm2553:txt' + rowFlag + 'D').disabled = true;
                    d.getElementById('frm2553:txt' + rowFlag + 'D').value = rateATC[x];
                }

                computeTaxDue('frm2553:txt' + rowFlag + 'C', 'frm2553:txt' + rowFlag + 'D', 'frm2553:txt' + rowFlag + 'E');
            }
            
            x++;
        }

        x = 14;
        while(x < 19){
            if(x != rowFlag){
                if(d.getElementById('frm2553:txt' + x + 'B').value != ""){
                    if(d.getElementById('frm2553:txt' + rowFlag + 'B').value == d.getElementById('frm2553:txt' + x + 'B').value &&
                        d.getElementById('frm2553:txt' + rowFlag + 'A').value == d.getElementById('frm2553:txt' + x + 'A').value){
            d.getElementById('frm2553:txt' + rowFlag + 'A').value = "";
                        d.getElementById('frm2553:txt' + rowFlag + 'B').value = "";
                        d.getElementById('frm2553:txt' + rowFlag + 'D').value = "0.00";
                        alert("Invalid input. Selected ATC already defined."); return;
                        isValid = false;
                    }
                }
            }
            x++;
        }

        if(isValid){
            hideModalATC();
        }
    }

    function hideModalATC()
    {
        d.getElementById('formPaper').style.display = 'block';
        if ( $('#modalAtc').css('display') != 'none' ) {
          $('#modalAtc').hide('blind');
        }
        $('#DummyTxt').html("Creator");
        $('#DummyTxt').html("");      
    }

    function computeTaxDue(taxAmount, taxRate, taxDue)
    {
        d.getElementById(taxDue).value = formatCurrency(((NumWithComma(d.getElementById(taxAmount).value)*1) / 100) * NumWithComma(d.getElementById(taxRate).value)*1);

        computeTotalTaxDue();
    }

    function computeTotalTaxDue()
    {
        var total = 0;
        var x = 14;
        while(x < 19){
            total = (total*1) + NumWithComma(d.getElementById('frm2553:txt' + x + 'E').value)*1;
            x++;
        }
        d.getElementById('frm2553:txt19').value = formatCurrency(total*1);

        computeTaxPayable();
    }

    function computeTaxPayable()
    {
        d.getElementById('frm2553:txt21').value = formatCurrency(NumWithComma(d.getElementById('frm2553:txt19').value)*1 - NumWithComma(d.getElementById('frm2553:txt20C').value)*1);
    computeTotalAmountPayable();
    }

  function computePenalties()
  {        
        d.getElementById("frm2553:txt22D").value = formatCurrency(NumWithComma(d.getElementById("frm2553:txt22A").value)*1 + NumWithComma(d.getElementById("frm2553:txt22B").value)*1 + NumWithComma(d.getElementById("frm2553:txt22C").value)*1);
    computeTotalAmountPayable();
  }
  
    function computeTotalAmountPayable()
    {
        d.getElementById('frm2553:txt23').value = formatCurrency(NumWithComma(d.getElementById('frm2553:txt21').value)*1 + NumWithComma(d.getElementById('frm2553:txt22D').value)*1);

        checkOverpayment();
    capital();
    }

    function checkOverpayment()
    {
        if(NumWithComma(d.getElementById('frm2553:txt23').value) < 0){
            d.getElementById('frm2553:ifoverpay_1').disabled = false;
            d.getElementById('frm2553:ifoverpay_2').disabled = false;
            d.getElementById('frm2553:ifoverpay_1').checked = false;
            d.getElementById('frm2553:ifoverpay_2').checked = false;      
    }else {
            d.getElementById('frm2553:ifoverpay_1').disabled = true;
            d.getElementById('frm2553:ifoverpay_2').disabled = true;
            d.getElementById('frm2553:ifoverpay_1').checked = false;
            d.getElementById('frm2553:ifoverpay_2').checked = false;      
        }
    }

    function computeTotalTaxCreditPayments()
    {
        
        d.getElementById('frm2553:txt20C').value = formatCurrency(NumWithComma(d.getElementById('frm2553:txt20A').value)*1 + NumWithComma(d.getElementById('frm2553:txt20B').value)*1);
    }

    function selectTreaty()
    {
        var treaty = d.getElementById('frm2553:optTreaty_1');
        if(treaty.checked){
            d.getElementById('frm2553:lstTaxTreaty').disabled = false;
        }else {
            d.getElementById('frm2553:lstTaxTreaty').disabled = true;
            d.getElementById('frm2553:lstTaxTreaty').selectedIndex = 0;
        }
    }

    function validateForm()
    {
        var dt = new Date();

    if(d.getElementById('frm2553:itemFiscalStartMonth:_1').checked == false && d.getElementById('frm2553:itemFiscalStartMonth:_2').checked == false)
        {
            alert("Please select an option for item 1.");
            return;
        }
    
    if(d.getElementById('frm2553:itemYearEndMonth').selectedIndex*1 == 0)
        {
            alert("Please select valid month on item 2.");
            return;
        }
        
    if(d.getElementById('frm2553:txtYearEnded').value == "")
        {
            alert("Please enter valid year on item 2.");
            return;
        }
       
        if(d.getElementById('frm2553:txtYearEnded').value*1 < 1900)
        {
            alert("Invalid date entry on Item no.2. Entry should not be lower than 1900.")
            return;
        }
        if(d.getElementById('frm2553:optQtr:_1').checked == false && d.getElementById('frm2553:optQtr:_2').checked == false && d.getElementById('frm2553:optQtr:_3').checked == false && d.getElementById('frm2553:optQtr:_4').checked == false)
        {
            alert("Select a Quarter on Item no. 3.")
            return;
        }
    
        if( (d.getElementById('frm2553:txtTIN1').value == "" || d.getElementById('frm2553:txtTIN2').value == "" || d.getElementById('frm2553:txtTIN3').value == "" || d.getElementById('frm2553:txtBranchCode').value == "")  )
        {
            alert("Please enter a valid TIN number on Item 6.");
            return;
        }   
        
        if( (d.getElementById('frm2553:txtDescription').value == "")  )
        {
            alert("Please enter a valid Line of Business/Occupation on Item 8.");
            return;
        } 
    if( (d.getElementById('frm2553:txtTPName').value == "")  )
        {
            alert("Please enter a valid Taxpayer Name on Item 9.");
            return;
        }
    if( (d.getElementById('frm2553:txtTelNum').value == "")  )
        {
            alert("Please enter a valid Telephone Number on Item 10.");
            return;
        }
    if( (d.getElementById('frm2553:txtAddress').value == "")  )
        {
            alert("Please enter Taxpayer's Registered Address on Item 11.");
            return;
        }   
    if( (d.getElementById('frm2553:txtZipCode').value == "")  )
        {
            alert("Please enter Taxpayer's Zip Code on Item 12.");
            return;
        }
        if(d.getElementById('frm2553:txt23').value*1 < 0)
        {
            if(d.getElementById('frm2553:ifoverpay_1').checked == false && d.getElementById('frm2553:ifoverpay_2').checked == false){
                alert("Please indicate refund type for overpayment in Item 23.")
                return;
            }
        }

        var x = 14;
        while(x < 19){
            if(d.getElementById('frm2553:txt' + x + 'B').value != ""){
                if(d.getElementById('frm2553:txt' + x + 'C').value == 0){
                    alert("Please enter a valid amount for Item " + x + "C.")
                    return;
                }
            }
            x++;
        }

        if(d.getElementById("frm2553:optTreaty_1").checked && d.getElementById("frm2553:lstTaxTreaty").value == 0) {
            alert("Please select a Tax Treaty from the list.");
            return;
        }

    d.getElementById("frm2553:lstTaxTreaty").disabled = true;
    
        d.getElementById('frm2553:cmdValidate').disabled = true;
    d.getElementById('btnPrint').disabled = false;
        d.getElementById('frm2553:cmdEdit').disabled = false;
        d.getElementById('btnUpload').disabled = false;

        enableDisabledFields(true);

        alert("Validation successful. Click on Edit if you wish to modify your entries.");
    return;
    }

    function editForm()
    {
        d.getElementById('frm2553:cmdValidate').disabled = false;
        d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm2553:cmdEdit').disabled = true;
        d.getElementById('btnUpload').disabled = true;

        enableDisabledFields(false);
        d.getElementById('frm2553:txtTIN1').disabled = true;
        d.getElementById('frm2553:txtTIN2').disabled = true;
        d.getElementById('frm2553:txtTIN3').disabled = true;
        d.getElementById('frm2553:txtBranchCode').disabled = true;  
    }

    var disableElem = true;
    var enableElem = false;
    function enableDisabledFields(param)
    {
        d.getElementById('frm2553:itemYearEndMonth').disabled = param;
        d.getElementById('frm2553:txtYearEnded').disabled = param;
        d.getElementById('frm2553:optQtr:_1').disabled = param;
        d.getElementById('frm2553:optQtr:_2').disabled = param;
        d.getElementById('frm2553:optQtr:_3').disabled = param;
        d.getElementById('frm2553:optQtr:_4').disabled = param;
        d.getElementById('frm2553:optTreaty_1').disabled = param;
        d.getElementById('frm2553:optTreaty_2').disabled = param;
        d.getElementById('frm2553:optAmended_1').disabled = param;
        d.getElementById('frm2553:optAmended_2').disabled = param;
        d.getElementById('frm2553:txtSheets').disabled = param;
        d.getElementById('frm2553:txtTIN1').disabled = param;
        d.getElementById('frm2553:txtTIN2').disabled = param;
        d.getElementById('frm2553:txtTIN3').disabled = param;
        d.getElementById('frm2553:txtBranchCode').disabled = param;
        d.getElementById('frm2553:txtRDOCode').disabled = param;
        d.getElementById('frm2553:txtDescription').disabled = param;
        d.getElementById('frm2553:txtTPName').disabled = param;
        d.getElementById('frm2553:txtTelNum').disabled = param;
        d.getElementById('frm2553:txtAddress').disabled = param;
        d.getElementById('frm2553:txtZipCode').disabled = param;
        d.getElementById('frm2553:btnFinalCopy').disabled = false;

        d.getElementById('frm2553:txt22A').disabled = param;
        d.getElementById('frm2553:txt22B').disabled = param;
        d.getElementById('frm2553:txt22C').disabled = param;
    
        if(NumWithComma(d.getElementById('frm2553:txt23').value) < 0){
          d.getElementById('frm2553:ifoverpay_1').disabled = param;
          d.getElementById('frm2553:ifoverpay_2').disabled = param;
        }
        else{
          d.getElementById('frm2553:ifoverpay_1').disabled = true;
          d.getElementById('frm2553:ifoverpay_2').disabled = true;
        }
    
        var x = 14;
        while(x < 19){
            d.getElementById('frm2553:btn' + x + 'B').disabled = param;
            d.getElementById('frm2553:txt' + x + 'C').disabled = param;
            x++;
        }

        d.getElementById('frm2553:txt20B').disabled = param;

        //checkOverpayment();

        if(d.getElementById('frm2553:optAmended_1').checked){
            d.getElementById('frm2553:txt20A').disabled = param;
        }

        var x = 14;
        while(x < 19){
            if(d.getElementById('frm2553:txt' + x + 'B').value == "OT012"){
                d.getElementById('frm2553:txt' + x + 'D').disabled = param;
            }
            x++;
        }
    
        if (qs('xmlFileName') != null && qs('xmlFileName').indexOf('.xml') > -1) {
          d.getElementById('frm2553:itemFiscalStartMonth:_1').disabled = true;
          d.getElementById('frm2553:itemFiscalStartMonth:_2').disabled = true;
          d.getElementById('frm2553:itemYearEndMonth').disabled = true;
          d.getElementById('frm2553:txtYearEnded').disabled = true;
        }
    
        disableElem;
    enableElem;
    }
  
  function dateyear()
  {
    if (d.getElementById('frm2553:itemFiscalStartMonth:_1').checked == true)
    {
      d.getElementById('frm2553:itemYearEndMonth').selectedIndex = 12;
      d.getElementById('frm2553:itemYearEndMonth').disabled = true;
    }
    else if (d.getElementById('frm2553:itemFiscalStartMonth:_2').checked == true && d.getElementById('frm2553:itemYearEndMonth').selectedIndex == 12)
    {
      alert('You have entered invalid month for Fiscal Year');
      d.getElementById('frm2553:itemYearEndMonth').selectedIndex = 0;
      d.getElementById('frm2553:itemYearEndMonth').disabled = false;
    }
  }
  function datemonth()
  {
    if (d.getElementById('frm2553:itemFiscalStartMonth:_1').checked == true && d.getElementById('frm2553:itemYearEndMonth').selectedIndex != 12)
    {
      alert('You have entered a filing year not ending in December. This filing will be considered as a Fiscal Year Filing.');
      d.getElementById('frm2553:itemFiscalStartMonth:_2').checked = true;
    }
    else if (d.getElementById('frm2553:itemFiscalStartMonth:_2').checked == true && d.getElementById('frm2553:itemYearEndMonth').selectedIndex == 12)
    {
      alert('You have entered a filing year ending in December. This filing will be considered as a Calendar Year Filing.');
      d.getElementById('frm2553:itemFiscalStartMonth:_1').checked = true;
    }
  }
  
  function initialValidateBeforeSave() {
      if( (d.getElementById('frm2553:txtTIN1').value == "" || d.getElementById('frm2553:txtTIN2').value == "" || d.getElementById('frm2553:txtTIN3').value == "" || d.getElementById('frm2553:txtBranchCode').value == "")  )
      {
        alert("Please enter a valid TIN number on Item 6.");
        return false;
      } 
      
      if( (d.getElementById('frm2553:txtTPName').value == "")  )
      {
        alert("Please enter a valid Taxpayer Name on Item 9.");
        return false;
      }   
      return true;
  } 
  
var prevMonth;
function changedMonth() {
  if (confirm('You are about to change the Return Period.\nDo you want to continue?')) {
      prevMonth = d.getElementById('frm2553:itemYearEndMonth').value;
    } else {
      if (prevMonth != null) {
        for (i = 0; i<d.getElementById('frm2553:itemYearEndMonth').options.length; i++)
        {    
          if (d.getElementById('frm2553:itemYearEndMonth').options[i].value == prevMonth)
          {
          d.getElementById('frm2553:itemYearEndMonth').options[i].selected = true;
          break;
          }
        }
      }
    }
}

function changedYear(yearValue) {
    if (confirm('You are about to change the Return Period.\nDo you want to continue?')) {
      
    } else {
      d.getElementById('frm2553:txtYearEnded').value = yearValue;
    }
  }
Array.prototype.contains = Array.prototype.indexOf ?
    function(val) {
        return this.indexOf(val) > -1;
    } :
    function(val) {
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

  $('#bg').hide(); //820
  $('.printSignFooterClass').css({ 'width':'94%','margin':'auto','margin-top':'15px','display':'block','position':'relative','overflow':'visible','page-break-before':'always' });  
  $('.imgClass').css({ 'margin':'auto','display':'block','position':'relative','overflow':'visible' });
  
  $('#formPaper').css({'max-width':'8.3in !important', 'border':'#000 3px solid' });
  $('#wrapper').css({'max-width':'8.3in !important'});
  $('#container').css({'max-width':'8.3in !important'});  
  
    var elem = document.getElementById('frmMain').elements;
  var x=0;
  disabledItems = new Array();
    for(var i = 0; i < elem.length; i++) {      
    if (elem[i].type != 'hidden') { // && elem[i].type != 'undefined' 
      if (elem[i].type == 'text') {
        if (document.getElementById(elem[i].id).disabled) {
          disabledItems[x] = elem[i].id;
          x++;
        }
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
      

    }
    } 
    
    $('.printButtonClass').hide();
    $("#formPaper").show();

    window.print();

    $('.printButtonClass').show();
    $("#formPaper").show();
    $('#formPaper').css({'border':'#a7a7a7 1px solid','margin-top':'0px' });
    $('.imgClass').css({ 'display':'none'});

  $('#printMenu').show('blind');
  if ( $('#formMenu').css('display') != 'none' ) {  
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
                save('2553',data);
                
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
        saveAndExit('2553',data);
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

        submitAndSave('2553', data, company_id);
        
        disabled.attr('disabled','disabled');
        return false;
    }

    function gotoMain(){
        var company_id = $('#frmMain').find('input[name="company"]').val();
        window.location = '/companies/'+ company_id +'/histories/2553';
    } 
</script>

@endsection
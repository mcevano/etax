@extends('layouts.app')
@section('title', '| BIR Form No. 1600WP')

@section('content')
<div class="loader"></div>
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
        <button type="button" class="btn btn-danger btn-exit" id="1600WP" company='{{$company->id}}'>No</button>
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
        <button type="button" class="btn btn-success btn-exit" id="1600WP" company='{{$company->id}}'>Okay</button>
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
            <button type="button" class="btn btn-danger btn-filing-success" form='1600WP' company='{{$company->id}}'>Okay</button>
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
  <div id="wrapper"
 style="margin: 0pt auto; position: relative; width: 991px;">
 
  <table border="0" width="990" cellspacing="0" cellpadding="0" align="center" style=" background-repeat: repeat-x;">
        <tr><td>
 
  <div id="formPaper">
  <table border="0" cellpadding="0" cellspacing="0"
 width="996">
    <tbody>
      <tr>
        <td>
        <table style="height: 0px;" border="0" cellpadding="0" cellspacing="0" width="990">
      <tr>
              <td width="82"  style='padding:0px;' valign="middle" align="center"><p><img src="{{ asset('images/birflog.gif') }}" width="51" height="49" valign='3' halign='3' alt="birlogo" /></p></td>
              <td valign="middle" width="158">
              <label face="Arial" size="1px">Republika ng Pilipinas
        <br/>Kagawaran ng Pananalapi
        <br/>Kawanihan ng Rentas Internas</label>
              </td>
              <td align="center" width="323">
              <font size="4.5px" style="font-weight:bold;">Remittance Return of Percentage<br/>Tax on Winnings and
Prizes<br/>Withheld by Race Track Operators</font>
              </td>
              <td valign="center" width="145">
              <font face="Arial" size="1px">BIR Form No.<br/></font>
              <font face="Arial" size="6px">1600-WP<br/></font>
              <font face="Arial" size="1px">January 2010 (ENCS)</font>
              </td>
            </tr>
        </table>
        </td>
      </tr>
      <tr>
        <td>
        <table class="tblForm" border="0"
 cellpadding="0" cellspacing="0" width="990">
          <tbody>
            <tr>
              <td class="tblFormTd" valign="top"
 width="238">
              <table style="width: 100%;"
 border="0" cellpadding="0" cellspacing="0">
                <tbody width="100%">
                  <tr>
                    <td><font
 style="font-weight: bold;" size="2">&nbsp;1&nbsp;&nbsp;&nbsp;</font></td>
                    <td colspan="2"><font size="1" style="font-size: 11px;">Date
of Withholding (MM/DD/YYYY)</font></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td nowrap  style="font-size: 11px;">
From <input value="" size="1" maxlength="2" id="frm1600WP:DateWithholdingMonth" name="frm1600WP:DateWithholdingMonth" onblur="document.getElementById('frm1600WP:DateWithholdingToMonth').value = this.value" type="text" onkeypress="return wholenumber(this, event)" onfocus="this.val=this.value; return true;" onchange="dateChanged(this.val, this.id)" />
<input value="" size="1" maxlength="2" id="frm1600WP:DateWithholdingDay" name="frm1600WP:DateWithholdingDay" onblur="document.getElementById('frm1600WP:DateWithholdingToDay').value = this.value" type="text" onkeypress="return wholenumber(this, event)" onfocus="this.val=this.value; return true;" onchange="dateChanged(this.val, this.id)" />
<input value="" size="2" maxlength="4" id="frm1600WP:DateWithholdingYear" name="frm1600WP:DateWithholdingYear" onblur="document.getElementById('frm1600WP:DateWithholdingToYear').value = this.value" type="text" onkeypress="return wholenumber(this, event)" onfocus="this.val=this.value; return true;" onchange="dateChanged(this.val, this.id)" /> </td>
                    <td nowrap style="font-size: 11px;">&nbsp;&nbsp;
                    To&nbsp;&nbsp;<input value="" size="1"
 maxlength="2" id="frm1600WP:DateWithholdingToMonth" name="frm1600WP:DateWithholdingToMonth" 
  type="text" disabled /> <input value=""
 size="1" maxlength="2"
 id="frm1600WP:DateWithholdingToDay" name="frm1600WP:DateWithholdingToDay" 
 type="text" disabled /> <input value="" size="2"
 maxlength="4" id="frm1600WP:DateWithholdingToYear" name="frm1600WP:DateWithholdingToYear" 
  type="text" disabled /> </td>
                  </tr>
                </tbody>
              </table>
              </td>
              <td class="tblFormTd" valign="top"
 width="168">
              <table border="0" cellpadding="0"
 cellspacing="0" width="146">
                <tbody>
                  <tr>
                    <td width="11"><font
 style="font-weight: bold;" size="2">&nbsp;2&nbsp;&nbsp;&nbsp;</font></td>
                    <td><font size="1" style="font-size: 11px;">Amended
Return?</font></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>
                    <fieldset
 style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;"
 id="frm1600WP:j_id217" class="iceSelOneRb-dis fieldText1-dis">
                    <div style="padding: 5px 0pt;"
 align="center">
                    <table class="iceSelOneRb-dis fieldText1-dis"
 border="0" cellpadding="0" cellspacing="0">
                      <tbody>
                        <tr>
                          <td><input value="Y"
 name="frm1600WP:AmendedReturn1" id="frm1600WP:AmendedReturn_1"
 onclick="d.getElementById('frm1600WP:txtTax13').disabled = false;"
 type="radio" /><label for="frm1600WP:AmendedReturn_1"
 style="font-size: 12px;">Yes</label>&nbsp;&nbsp;&nbsp;</td>
                          <td><input value="N"
 name="frm1600WP:AmendedReturn1" id="frm1600WP:AmendedReturn_2"
 onclick="d.getElementById('frm1600WP:txtTax13').disabled = true;d.getElementById('frm1600WP:txtTax13').value = '0.00';computeofTotalWithheldTax();"
 checked="checked" type="radio" /><label
 for="frm1600WP:AmendedReturn_2" style="font-size: 12px;">No</label></td>
                        </tr>
                      </tbody>
                    </table>
                    </div>
                    </fieldset>
                    </td>
                  </tr>
                </tbody>
              </table>
              </td>
              <td class="tblFormTd" valign="top"
 width="178">
              <table border="0" cellpadding="0"
 cellspacing="0" width="152">
                <tbody>
                  <tr>
                    <td width="11"><font
 style="font-weight: bold;" size="2">&nbsp;3&nbsp;&nbsp;&nbsp;</font></td>
                    <td><font size="1" style="font-size: 11px;">No. of Sheets
Attached?</font></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><input value="0"
 style="text-align: right;"
 size="4" name="frm1600WP:txtSheets" maxlength="2"
 id="frm1600WP:txtSheets" onkeypress="return wholenumber(this, event)" 
 class="iceInpTxt-dis" type="text" /></td>
                  </tr>
                </tbody>
              </table>
              </td>
              <td class="tblFormTd" valign="top"
 width="188">
              <table border="0" cellpadding="0"
 cellspacing="0" width="140">
                <tbody>
                  <tr>
                    <td width="11"><font
 style="font-weight: bold;" size="2">&nbsp;4&nbsp;&nbsp;&nbsp;</font></td>
                    <td><font size="1" style="font-size: 11px;">Any Taxes
Withheld?</font></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>
                    <fieldset
 style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;"
 id="frm1600WP:j_id252" class="iceSelOneRb fieldText1">
                    <div style="padding: 5px 0pt;"
 align="center">
                    <table border="0" cellpadding="0"
 cellspacing="0">
                      <tbody>
                        <tr>
                          <td><input value="Y"
 name="frm1600WP:AnyTaxHeld" id="frm1600WP:AnyTaxHeld_1"
 onclick="enableallShedIIATC()" type="radio" /><label
 for="frm1600WP:AnyTaxHeld_1" style="font-size: 11px;">Yes</label>&nbsp;&nbsp;&nbsp;</td>
                          <td><input value="N"
 name="frm1600WP:AnyTaxHeld" id="frm1600WP:AnyTaxHeld_2"
 onclick="cancelAllCompute()" type="radio" /><label
 for="frm1600WP:AnyTaxHeld_2" style="font-size: 11px;">No</label></td>
                        </tr>
                      </tbody>
                    </table>
                    </div>
                    </fieldset>
                    </td>
                  </tr>
                </tbody>
              </table>
              </td>
            </tr>
          </tbody>
        </table>
        </td>
      </tr>
      <tr>
        <td>
        <table class="tblForm" border="0"
 cellpadding="0" cellspacing="0" width="990">
          <tbody>
            <tr>
              <td class="tblFormTdPart">
              <table border="0" cellpadding="0"
 cellspacing="0" width="990">
                <tbody>
                  <tr>
                    <td width="12%">&nbsp;&nbsp;&nbsp;<font
 style="font-weight: bold;" size="2">Part I</font></td>
                    <td width="88%">
                    <div align="center"><font
 style="font-weight: bold; letter-spacing: 3px;" size="2">Background
Information</font></div>
                    </td>
                  </tr>
                </tbody>
              </table>
              </td>
            </tr>
          </tbody>
        </table>
        </td>
      </tr>
      <tr>
        <td>
        <table class="tblForm" border="0"
 cellpadding="0" cellspacing="0" width="990">
          <tbody>
            <tr>
              <td class="tblFormTd" valign="top"
 width="392">
              <table border="0" cellpadding="0"
 cellspacing="0">
                <tbody>
                  <tr>
                    <td width="11"><font
 style="font-weight: bold;" size="2">&nbsp;5&nbsp;</font></td>
                    <td> <font size="1" style="font-size: 11px;">TIN&nbsp;</font>
                    <font face="Arial" size="2"> <input
 value="{{$company->tin1}}" size="2" name="frm1600WP:txtTIN1"
 maxlength="3" id="frm1600WP:txtTIN1" type="text" onkeypress="return wholenumber(this, event)" />
                    <input value="{{$company->tin2}}" size="2"
 name="frm1600WP:txtTIN2" maxlength="3"
 id="frm1600WP:txtTIN2" type="text" onkeypress="return wholenumber(this, event)" /> <input
 value="{{$company->tin3}}" size="2" name="frm1600WP:txtTIN3"
 maxlength="3" id="frm1600WP:txtTIN3" type="text" onkeypress="return wholenumber(this, event)" />
                    <input value="{{$company->tin4}}" size="2"
 name="frm1600WP:txtBranchCode" maxlength="3"
 id="frm1600WP:txtBranchCode" type="text" onkeypress="return letternumber(event)" /> </font>
                    </td>
                  </tr>
                </tbody>
              </table>
              </td>
              <td class="tblFormTd" valign="top"
 width="290">
              <table border="0" cellpadding="0"
 cellspacing="0">
                <tbody>
                  <tr>
                    <td width="100"><font style="font-weight: bold;" size="2">&nbsp;6&nbsp;</font><font size="1" style="font-size: 11px;">RDO
Code&nbsp;</font></td>
                    <td id="rdoSelect">
                    <select class='iceSelOneMnu' disabled id='frm1600WP:txtRDOCode' name='frm1600WP:txtRDOCode' size='1' >
                    <option value='{{$company->rdo_code}}'>{{$company->rdo_code}}</option>
                    </select>
                    </td>
                  </tr>
                </tbody>
              </table>
              </td>
              <td class="tblFormTd" valign="top"
 width="308">
              <table border="0" cellpadding="0"
 cellspacing="0" width="220">
                <tbody>
                  <tr>
                    <td width="220"><font
 style="font-weight: bold;" size="2">&nbsp;7&nbsp;</font><font
 size="1" style="font-size: 11px;">Category of Withholding Agent</font></td>
                  </tr>
                  <tr>
                    <td>
                    <div align="center">
                    <fieldset
 style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; width: 160px;"
 id="frm1600WP:j_id392" class="iceSelOneRb fieldText1">
                    <div style="padding: 5px 0pt;"
 align="center">
                    <table class="iceSelOneRb fieldText1"
 border="0" cellpadding="0" cellspacing="0">
                      <tbody>
                        <tr>
                          <td><input value="P"
 name="frm1600WP:CategoryAgent" id="frm1600WP:CategoryAgent_P"
 onclick="changedrpATCList(this)" type="radio" /> <label
 for="frm1600WP:CategoryAgent_P" style="font-size: 11px;">Private</label>
                          </td>
                          <td><input value="G"
 name="frm1600WP:CategoryAgent" id="frm1600WP:CategoryAgent_G"
 onclick="changedrpATCList(this)" type="radio" /> <label
 for="frm1600WP:CategoryAgent_G" style="font-size: 11px;">Government</label></td>
                        </tr>
                      </tbody>
                    </table>
                    </div>
                    </fieldset>
                    </div>
                    </td>
                  </tr>
                </tbody>
              </table>
              </td>
            </tr>
          </tbody>
        </table>
        </td>
      </tr>
      <tr>
        <td>
        <table class="tblForm" border="0"
 cellpadding="0" cellspacing="0" width="990">
          <tbody>
            <tr>
              <td class="tblFormTd" valign="top"
 width="80%">
              <table border="0" cellpadding="0"
 cellspacing="0">
                <tbody>
                  <tr>
                    <td>
                    <table border="0" cellpadding="0"
 cellspacing="0">
                      <tbody>
                        <tr>
                          <td width="11"><font
 style="font-weight: bold;" size="2">&nbsp;8&nbsp;</font></td>
                          <td><font size="1" style="font-size: 11px;">Withholding
Agent's Name (Last Name, First Name, Middle Name for Individuals)
/(Registered Name for Non-Individuals)</font></td>
                        </tr>
                      </tbody>
                    </table>
                    </td>
                  </tr>
                  <tr>
                    <td>
                    <table border="0" cellpadding="0"
 cellspacing="0">
                      <tbody>
                        <tr>
                          <td width="25">&nbsp;</td>
                          <td><input value="{{$company->registered_name != '' ? $company->registered_name : $company->lastname.','. $company->firstname.' '.$company->middlename }}" size="70"
 name="frm1600WP:txtTaxpayerName" maxlength="50"
 id="frm1600WP:txtTaxpayerName" disabled type="text" onblur="return capital(this, event)" /></td>
                        </tr>
                      </tbody>
                    </table>
                    </td>
                  </tr>
                </tbody>
              </table>
              </td>
            </tr>
          </tbody>
        </table>
        </td>
      </tr>
      <tr>
        <td>
        <table class="tblForm" border="0"
 cellpadding="0" cellspacing="0" width="990">
          <tbody>
            <tr>
              <td class="tblFormTd" valign="top"
 width="69%">
              <table border="0" cellpadding="0"
 cellspacing="0">
                <tbody>
                  <tr>
                    <td>
                    <table border="0" cellpadding="0"
 cellspacing="0">
                      <tbody>
                        <tr>
                          <td width="11"><font
 style="font-weight: bold;" size="2">&nbsp;9&nbsp;</font></td>
                          <td><font size="1" style="font-size: 11px;">Registered
Address</font></td>
                        </tr>
                      </tbody>
                    </table>
                    </td>
                  </tr>
                  <tr>
                    <td>
                    <table border="0" cellpadding="0"
 cellspacing="0">
                      <tbody>
                        <tr>
                          <td width="25">&nbsp;</td>
                          <td><input value="{{$company->address}}" size="100"
 name="frm1600WP:txtAddress" maxlength="150"
 id="frm1600WP:txtAddress" disabled type="text" onblur="return capital(this, event)" /></td>
                        </tr>
                      </tbody>
                    </table>
                    </td>
                  </tr>
                </tbody>
              </table>
              </td>
              <td class="tblFormTd" valign="top"
 width="11%">
              <table border="0" cellpadding="0"
 cellspacing="0" width="149">
                <tbody>
                  <tr>
                    <td width="149"><font
 style="font-weight: bold;" size="2" style="font-size: 11px;">&nbsp;10&nbsp;</font><font
 size="1">Zip Code</font></td>
                  </tr>
                  <tr>
                    <td>
                    <div align="center"> <input
 value="{{$company->zip_code}}" size="12" name="frm1600WP:txtZipCode"
 maxlength="12" id="frm1600WP:txtZipCode" type="text" disabled onkeypress="return wholenumber(this, event)" />
                    </div>
                    </td>
                  </tr>
                </tbody>
              </table>
              </td>
            </tr>
          </tbody>
        </table>
        </td>
      </tr>
      <tr>
        <td>
        <table class="tblForm" border="0"
 cellpadding="0" cellspacing="0" width="990">
          <tbody>
            <tr>
              <td class="tblFormTd" valign="top"
 width="800">
              <table border="0" cellpadding="0"
 cellspacing="0" width="382">
                <tbody>
                  <tr>
                    <td width="382"><font
 style="font-weight: bold;" size="2">&nbsp;11&nbsp;</font><font
 size="1" style="font-size: 11px;">Are there payees availing of tax relief under Special Law or
International Tax Treaty?</font></td>
                  </tr>
                  <tr>
                    <td>
                    <div style="padding: 5px 0pt;"
 align="center">
                    <table class="iceSelOneRb-dis fieldText1-dis"
 border="0" cellpadding="0" cellspacing="0">
                      <tbody>
                        <tr>
                          <td style="width: 81px;"><input value="Y"
 name="frm1600WP:SpecialLaw" style="margin-left: 10px;" id="frm1600WP:SpecialLaw_1"
 disabled="disabled" type="radio" /><label
 for="frm1600WP:SpecialLaw_1" style="font-size: 11px;">Yes</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td><input value="N"
 name="frm1600WP:SpecialLaw" id="frm1600WP:SpecialLaw_2"
 disabled="disabled" checked="checked" type="radio" /><label
 for="frm1600WP:SpecialLaw_2" style="font-size: 11px;">No</label></td>
                        </tr>
                      </tbody>
                    </table>
                    </div>
                    <div style="width: 300px; padding-top: 8px;font-size: 11px;"
 align="center"> If yes, specify
                    <select
 style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; background-color: rgb(220, 220, 220);"
 size="1" name="frm1600WP:SpecialLawSelect"
 id="frm1600WP:SpecialLawSelect" disabled="disabled">
                    <option value="0" selected="selected">
                    </option>
                    <option value="1">Special Rate</option>
                    <option value="2">International Tax
Treaty</option>
                    </select>
                    </div>
                    </td>
                  </tr>
                </tbody>
              </table>
              </td>
            </tr>
          </tbody>
        </table>
        </td>
      </tr>
      <tr>
        <td>
        <table class="tblForm" border="0"
 cellpadding="0" cellspacing="0" width="990">
          <tbody>
            <tr>
              <td class="tblFormTdPart">
              <table border="0" cellpadding="0"
 cellspacing="0" width="990">
                <tbody>
                  <tr>
                    <td width="100">&nbsp;&nbsp;&nbsp;<font
 style="font-weight: bold;" size="2">Part II</font></td>
                    <td width="">
                    <div align="center"><font
 style="font-weight: bold; letter-spacing: 3px;" size="2">Computation
of Tax</font></div>
                    </td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
              </td>
            </tr>
          </tbody>
        </table>
        </td>
      </tr>
<!-- add - by lovell gawaran --> <tr>
        <td>
        <table class="tblForm" border="0"
 cellpadding="0" cellspacing="0" width="990">
          <tbody>
            <tr>
              <td class="tblFormTd" valign="top">
              <table id="tblPartIIComputeTax"
 style="margin-left: 10px;" border="0" cellpadding="0"
 cellspacing="0" width="100%">
                <thead  class="text-center"> <tr>
                  <td width="40%"><font
 style="font-weight: bold;font-size: 11px;" size="1">NATURE OF INCOME
PAYMENT </font></td>
                  <td width="11%" class="text-center"><a href="#" style="font-size: 11px;" onclick="showPartIIATC()" id="btnAddATCPartII">ATC  <!--<input
 class="printButtonClass" id="btnAddATCPartII" value="ATC"
 onclick="showPartIIATC()" type="button" />--></a> </td>
                  <td width="20%"><font
 style="font-weight: bold;font-size: 11px;"  class="text-center" size="1">TAX BASE</font></td>
                  <td width="9%"><font
 style="font-weight: bold;font-size: 11px;"  class="text-center" size="1">TAX RATE</font></td>
                  <td width="25%"><label
 style="font-weight: bold;font-size: 11px;"  class="text-center" size="1">TAX REQUIRED TO 
BE <br> WITHHELD</label></td>
                </tr>
                </thead> <tbody id="tbodyComputeTax">
                </tbody>
              </table>
              </td>
            </tr>
          </tbody>
        </table>
        </td>
      </tr>
      <tr>
        <td>
        <table class="tblForm" border="0"
 cellpadding="0" cellspacing="0" width="990">
          <tbody>
            <tr>
              <td class="tblFormTd">
              <table border="0" cellpadding="0"
 cellspacing="0" width="100%">
                <tbody>
                  <tr>
                    <td width="26"><font
 style="font-weight: bold;" size="2">&nbsp;12&nbsp;&nbsp;</font></td>
                    <td width="316"><font size="1">&nbsp;</font><font
 face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Tax
Required to be Withheld and Remitted</font></td>
                    <td width="207">
                    <div class="spacePadder"> </div>
                    </td>
                    <td width="190"><span
 class="spacePadder"><font style="font-weight: bold;"
 size="2">12</font>&nbsp;&nbsp;&nbsp; <input
 value="0.00"
 style="background-color: rgb(220, 220, 220); color: black; text-align: right;"
 size="20" maxlength="25" id="frm1600WP:txtTax12" name="frm1600WP:txtTax12"
 disabled="disabled" type="text" /> </span></td>
                  </tr>
                  <tr>
                    <td><font style="font-weight: bold;"
 size="2">&nbsp;13&nbsp;</font></td>
                    <td><font
 face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">&nbsp;Less:
Tax Remitted in Return Previously Filed, if this is an amended return</font></td>
                    <td>
                    <div class="spacePadder"> </div>
                    </td>
                    <td><span class="spacePadder"><font
 style="font-weight: bold;" size="2">13</font>&nbsp;&nbsp;&nbsp;
                    <input value="0.00"
 style="color: black; text-align: right;"
 size="20" name="frm1600WP:txtTax13" maxlength="25"
 id="frm1600WP:txtTax13" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeofTotalWithheldTax()" disabled="disabled" type="text" />
                    </span></td>
                  </tr>
                  <tr>
                    <td><font style="font-weight: bold;"
 size="2">&nbsp;14&nbsp;</font></td>
                    <td><font size="1">&nbsp;T</font><font
 face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">ax Still
Due / (Overremittance)</font></td>
                    <td>
                    <div class="spacePadder"> </div>
                    </td>
                    <td><span class="spacePadder"><font
 style="font-weight: bold;" size="2">14</font>&nbsp;&nbsp;&nbsp;
                    <input value="0.00"
 style="background-color: rgb(220, 220, 220); text-align: right;"
 size="20" maxlength="25" id="frm1600WP:txtTax14" name="frm1600WP:txtTax14" 
 disabled="true" type="text" /> </span></td>
                  </tr>
                  <tr>
                    <td><font style="font-weight: bold;"
 size="2"> &nbsp;15&nbsp;</font></td>
                    <td colspan="2"><font size="1" style="font-size: 11px;">&nbsp;Add:
Penalties</font></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td colspan="2">
                    <table width="511">
                      <tbody>
                        <tr>
                          <td align="center" width="161"><font
 face="Arial" size="1" style="font-size: 11px;">Surcharge</font></td>
                          <td align="center" width="160"><font
 face="Arial" size="1" style="font-size: 11px;">Interest</font></td>
                          <td align="center" width="174"><font
 face="Arial" size="1" style="font-size: 11px;">Compromise</font></td>
                        </tr>
                      </tbody>
                    </table>
                    </td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td colspan="2">
                    <table width="585">
                      <tbody>
                        <tr>
                          <td align="center" width="189">
                          <font face="Arial" size="2"><b>15A</b>&nbsp;
                          <input value="0.00"
 style="color: black; text-align: right;" size="20"
 name="frm1600WP:txtTax15A" maxlength="25"
 id="frm1600WP:txtTax15A" onkeypress="return numbersonly(this, event)"
 onblur="round(this,2);computePenalties()" type="text" /> </font>
                          </td>
                          <td align="center" width="190">
                          <font face="Arial" size="2"><b>15B</b>&nbsp;
                          <input value="0.00"
 style="text-align: right;" onkeypress="return numbersonly(this, event)"
 size="20" maxlength="25" id="frm1600WP:txtTax15B" name="frm1600WP:txtTax15B" onblur="round(this,2);computePenalties()"
 type="text" /> </font> </td>
                          <td align="center" width="190">
                          <font face="Arial" size="2"><b>15C</b>&nbsp;
                          <input value="0.00"
 style="text-align: right;" onkeypress="return numbersonly(this, event)"
 size="20" name="frm1600WP:txtTax15C" maxlength="25" onblur="round(this,2);computePenalties()"
 id="frm1600WP:txtTax15C"  type="text" />
                          </font> </td>
                        </tr>
                      </tbody>
                    </table>
                    </td>
                    <td>
                    <div class="spacePadder"> <font
 style="font-weight: bold;" size="2">15D</font>
                    <input value="0.00"
 style="background-color: rgb(220, 220, 220); text-align: right;"
 size="20" maxlength="25" id="frm1600WP:txtTax15D" name="frm1600WP:txtTax15D" 
 disabled="true" type="text" /> </div>
                    </td>
                  </tr>
                  <tr>
                    <td><font style="font-weight: bold;"
 size="2">&nbsp;16&nbsp;</font></td>
                    <td colspan="2"><font
 face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Total
Amount Still Due/(Overremittance) (Sum of items 14&amp; 15D)</font></td>
                    <td>
                    <div class="spacePadder"> <font
 style="font-weight: bold;margin-right: 10px;" size="2">16</font>
                    <input value="0.00"
 style="background-color: rgb(220, 220, 220); text-align: right;"
 size="20" maxlength="25" id="frm1600WP:txtTax16" name="frm1600WP:txtTax16" 
 disabled="true" class="iceInpTxt-dis" type="text" />
                    </div>
                    </td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td colspan="2"><font
 face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">For late
filers with overremittance, extend amount of Penalties (Item 15D to 16)</font></td>
                    <td>&nbsp;</td>
                  </tr>
                </tbody>
              </table>
              </td>
            </tr>
          </tbody>
        </table>
        </td>
      </tr>
      <tr>
        <td>
        <table class="tblForm" border="0"
 cellpadding="0" cellspacing="0" width="990">
          
            <tr>
              <td class="tblFormTd" valign="top">
              <table id="tblScheduleII" class="tblForm"
  border="0" cellpadding="0"
 cellspacing="0" width="100%">
                
                  <tr>
                    <td colspan="2" style="font-size: 11px;"> Schedule 1.1 </td>
                    <td colspan="6" align="center" style="font-size: 11px;">
ALPHABETICAL LIST OF PAYEES FROM WHOM TAXES WERE WITHHELD <br />
(Attach additional sheet/s if necessary) </td>
                  </tr>
                  <tr>
                    
                    <td colspan="3"
 style="text-align: center; font-weight: bold;"><font
 face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">PAYEE
DETAILS</font></td>
                    <td style="text-align: center;">&nbsp;</td>
                    <td colspan="4"
 style="text-align: center; font-weight: bold;"><font
 face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">INCOME
PAYMENT/TAX WITHHELD DETAILS</font></td>
                                      </tr>
                  <tr>
                    <td valign="top" style="text-align: center;"><label
 face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">(1) <br />
SEQ NO. </label> </td>
                    <td valign="top" style="text-align: center;"> <font
 face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">(2) TIN</font>
                    </td>
                    <td valign="top"><label
 face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">(3)
INDIVIDUAL/ CORPORATION (LAST NAME, FIRST NAME, MIDDLE NAME FOR
INDIVIDUALS OR REGISTERED NAME FOR NON-INDIVIDUALS)</label> </td>
                    <td> </td>
                    <td valign="top" style="text-align: center;"><font
 face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">(4) ATC</font></td>
                    <td valign="top" style="text-align: center;"><font
 face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">(5)
NATURE OF PAYMENT</font></td>
                    <td valign="top" style="text-align: center;"><font
 face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">(6)
AMOUNT</font> </td>
<td valign="top" style="text-align: center;"><label
 face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">(7) TAX
RATE(%) </label></td>
                    <td valign="top" style="text-align: center;"><label
 face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">(8) TAX
REQUIRED TO BE WITHHELD </label> </td>
                    
          <td></td>
                  </tr>
                  <tr>
                    <td width="4%">1</td>
                    <td width="17%"><input
 id="frm1600WP:dtSched:txtTin1" maxlength="12"
 name="frm1600WP:dtSched:txtTin1" style="width: 150px" value=""
 onblur="blockLetterInt(this)" type="text" onkeypress="return numbersonly(this, event)" /></td>
                    <td width="17%"><input
 id="frm1600WP:dtSched:txtFullname1" maxlength="50"
 name="frm1600WP:dtSched:txtFullname1" type="text" /></td>
                    <td width="6%"><a href="#" onclick="showSchedIIATC(1)" id="frm1600WP:dtSched:btnATCcode1" style="font-size: 11px;">ATC</a></td>
                    <td width="7%"><input
 id="frm1600WP:dtSched:drpAtcCode1" name="frm1600WP:dtSched:drpAtcCode1" style='width:67px' type="text" /></td>
                    <td width="14%"><input
 id="frm1600WP:dtSched:naturePayment1" name="frm1600WP:dtSched:naturePayment1" value=""
 type="text" /></td>
                    <td width="17%" class="text-center"><input
 id="frm1600WP:dtSched:amount1" name="frm1600WP:dtSched:amount1" maxlength="17" style="text-align: right;width: 150px;" value=""
 onblur="round(this,2);computeDtShedTaxWithheld()" type="text" onkeypress="return numbersonly(this, event)" /></td>
                    <td width="3%"><input
 id="frm1600WP:dtSched:txtRatePercent1" name="frm1600WP:dtSched:txtRatePercent1"
 style="width: 50px; text-align: right; background-color: rgb(220, 220, 220); color: black;"
 type="text" /></td>
                    <td width="15%" class="text-center"> <input disabled="disabled"
 id="frm1600WP:dtSched:taxWithheld1" name="frm1600WP:dtSched:taxWithheld1" 
 style="background-color: rgb(220, 220, 220); color: black; text-align: right; "
 value="0.00" size="15" maxlength="25" type="text" /></td>
          <td width="2%">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td><input id="frm1600WP:dtSched:txtTin2" name="frm1600WP:dtSched:txtTin2" 
 maxlength="12" value=""  style="width: 150px" onblur="blockLetterInt(this)"
 type="text" onkeypress="return numbersonly(this, event)" /></td>
                    <td><input
 id="frm1600WP:dtSched:txtFullname2" name="frm1600WP:dtSched:txtFullname2" maxlength="50"
 type="text" /></td>
                    <td><a href="#" onclick="showSchedIIATC(2)" id="frm1600WP:dtSched:btnATCcode2" style="font-size: 11px;">ATC<!-- <input
 id="frm1600WP:dtSched:btnATCcode2" class="printButtonClass"
 value="ATC" onclick="showSchedIIATC(2)" type="button" />--></a></td>
                    <td><input
 id="frm1600WP:dtSched:drpAtcCode2" name="frm1600WP:dtSched:drpAtcCode2" style='width:67px' type="text" /></td>
                    <td><input
 id="frm1600WP:dtSched:naturePayment2" name="frm1600WP:dtSched:naturePayment2" value=""
 type="text" /></td>
                    <td class="text-center"><input id="frm1600WP:dtSched:amount2" name="frm1600WP:dtSched:amount2" 
 maxlength="17" style="text-align: right;width: 150px;" value=""
 onblur="round(this,2);computeDtShedTaxWithheld()" type="text" onkeypress="return numbersonly(this, event)" /></td>
                    <td><input
 id="frm1600WP:dtSched:txtRatePercent2" name="frm1600WP:dtSched:txtRatePercent2"
 style="background-color: rgb(220, 220, 220); text-align: right; color: black; width: 50px;"
 type="text" /></td>
                    <td class="text-center"> <input  disabled="disabled"
 id="frm1600WP:dtSched:taxWithheld2" name="frm1600WP:dtSched:taxWithheld2" 
 style="background-color: rgb(220, 220, 220); color: black; text-align: right; "
 value="0.00" size="15" maxlength="25" type="text" /></td>
          <td width="2%">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td><input style="width: 150px"  id="frm1600WP:dtSched:txtTin3" name="frm1600WP:dtSched:txtTin3" 
 maxlength="12" value="" onblur="blockLetterInt(this)"
 type="text" onkeypress="return numbersonly(this, event)" /></td>
                    <td><input
 id="frm1600WP:dtSched:txtFullname3" name="frm1600WP:dtSched:txtFullname3" maxlength="50"
 type="text" /></td>
                    <td><a href="#" onclick="showSchedIIATC(3)" id="frm1600WP:dtSched:btnATCcode3" style="font-size: 11px;">ATC <!--<input
 id="frm1600WP:dtSched:btnATCcode3" class="printButtonClass"
 value="ATC" onclick="showSchedIIATC(3)" type="button" />--></a></td>
                    <td><input
 id="frm1600WP:dtSched:drpAtcCode3" name="frm1600WP:dtSched:drpAtcCode3" style='width:67px' type="text" /></td>
                    <td><input
 id="frm1600WP:dtSched:naturePayment3"  name="frm1600WP:dtSched:naturePayment3" value=""
 type="text" /></td>
                    <td class="text-center"><input id="frm1600WP:dtSched:amount3" name="frm1600WP:dtSched:amount3" 
 maxlength="17" style="text-align: right;width: 150px;" value=""
 onblur="round(this,2);computeDtShedTaxWithheld()" type="text" onkeypress="return numbersonly(this, event)" /></td>
                    <td><input
 id="frm1600WP:dtSched:txtRatePercent3" name="frm1600WP:dtSched:txtRatePercent3"
 style="background-color: rgb(220, 220, 220); text-align: right; color: black; width: 50px;"
 type="text" /></td>
                    <td class="text-center"> <input disabled="disabled"
 id="frm1600WP:dtSched:taxWithheld3" name="frm1600WP:dtSched:taxWithheld3" 
 style="background-color: rgb(220, 220, 220); color: black; text-align: right;"
 value="0.00" size="15" maxlength="25" type="text" /></td>
                    <td width="2%">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td><input  style="width: 150px" id="frm1600WP:dtSched:txtTin4" name="frm1600WP:dtSched:txtTin4" 
 maxlength="12" value="" onblur="blockLetterInt(this)"
 type="text" onkeypress="return numbersonly(this, event)" /></td>
                    <td><input
 id="frm1600WP:dtSched:txtFullname4" name="frm1600WP:dtSched:txtFullname4" maxlength="50"
 type="text" /></td>
                    <td><a href="#" onclick="showSchedIIATC(4)" id="frm1600WP:dtSched:btnATCcode4" name="frm1600WP:dtSched:btnATCcode4" style="font-size: 11px;">ATC <!--<input
 id="frm1600WP:dtSched:btnATCcode4" class="printButtonClass"
 value="ATC" onclick="showSchedIIATC(4)" type="button" />--></a></td>
                    <td><input
 id="frm1600WP:dtSched:drpAtcCode4" name="frm1600WP:dtSched:drpAtcCode4" style='width:67px' type="text" /></td>
                    <td><input
 id="frm1600WP:dtSched:naturePayment4" name="frm1600WP:dtSched:naturePayment4" value=""
 type="text" /></td>
                    <td class="text-center"><input id="frm1600WP:dtSched:amount4" name="frm1600WP:dtSched:amount4" 
 maxlength="17" style="text-align: right;width: 150px;" value=""
 onblur="round(this,2);computeDtShedTaxWithheld()" type="text" onkeypress="return numbersonly(this, event)" /></td>
                    <td><input
 id="frm1600WP:dtSched:txtRatePercent4" name="frm1600WP:dtSched:txtRatePercent4"
 style="background-color: rgb(220, 220, 220); text-align: right; color: black; width: 50px;"
 type="text" /></td>
                    <td class="text-center"> <input disabled="disabled"
 id="frm1600WP:dtSched:taxWithheld4" name="frm1600WP:dtSched:taxWithheld4" 
 style="background-color: rgb(220, 220, 220); color: black; text-align: right; "
 value="0.00" size="15" maxlength="25" type="text" /></td>
                    <td width="2%">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td><input style="width: 150px"  id="frm1600WP:dtSched:txtTin5" name="frm1600WP:dtSched:txtTin5" 
 maxlength="12" value="" onblur="blockLetterInt(this)"
 type="text" onkeypress="return numbersonly(this, event)" /></td>
                    <td><input
 id="frm1600WP:dtSched:txtFullname5" name="frm1600WP:dtSched:txtFullname5" maxlength="50"
 type="text" /></td>
                    <td><a href="#" onclick="showSchedIIATC(5)" id="frm1600WP:dtSched:btnATCcode5" style="font-size: 11px;">ATC <!--<input
 id="frm1600WP:dtSched:btnATCcode5" class="printButtonClass"
 value="ATC" onclick="showSchedIIATC(5)" type="button" />--></a></td>
                    <td><input
 id="frm1600WP:dtSched:drpAtcCode5" name="frm1600WP:dtSched:drpAtcCode5" style='width:67px' type="text" /></td>
                    <td><input
 id="frm1600WP:dtSched:naturePayment5" name="frm1600WP:dtSched:naturePayment5"  value=""
 type="text" /></td>
                    <td class="text-center"><input id="frm1600WP:dtSched:amount5"
 maxlength="17" name="frm1600WP:dtSched:amount5" style="text-align: right;width: 150px;" value=""
 onblur="round(this,2);computeDtShedTaxWithheld()" type="text" onkeypress="return numbersonly(this, event)" /></td>
                    <td><input
 id="frm1600WP:dtSched:txtRatePercent5" name="frm1600WP:dtSched:txtRatePercent5"
 style="background-color: rgb(220, 220, 220); text-align: right; color: black; width: 50px;"
 type="text" /></td>
                    <td class="text-center"> <input disabled="disabled"
 id="frm1600WP:dtSched:taxWithheld5" name="frm1600WP:dtSched:taxWithheld5" 
 style="background-color: rgb(220, 220, 220); color: black; text-align: right; "
 value="0.00" size="15" maxlength="25" type="text" /></td>
                    <td width="2%">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td><input style="width: 150px"  id="frm1600WP:dtSched:txtTin6" name="frm1600WP:dtSched:txtTin6" 
 maxlength="12" value="" onblur="blockLetterInt(this)"
 type="text" onkeypress="return numbersonly(this, event)" /></td>
                    <td><input
 id="frm1600WP:dtSched:txtFullname6" name="frm1600WP:dtSched:txtFullname6" maxlength="50"
 type="text" /></td>
                    <td><a href="#" onclick="showSchedIIATC(6)" id="frm1600WP:dtSched:btnATCcode6" style="font-size: 11px;">ATC</a></td>
                    <td><input
 id="frm1600WP:dtSched:drpAtcCode6" name="frm1600WP:dtSched:drpAtcCode6" style='width:67px' type="text" /></td>
                    <td><input
 id="frm1600WP:dtSched:naturePayment6" name="frm1600WP:dtSched:naturePayment6" value=""
 type="text" /></td>
                    <td class="text-center"><input id="frm1600WP:dtSched:amount6" name="frm1600WP:dtSched:amount6" 
 maxlength="17" style="text-align: right;width: 150px;" value=""
 onblur="round(this,2);computeDtShedTaxWithheld()" type="text" onkeypress="return numbersonly(this, event)" /></td>
                    <td><input
 id="frm1600WP:dtSched:txtRatePercent6" name="frm1600WP:dtSched:txtRatePercent6"
 style="background-color: rgb(220, 220, 220); text-align: right; color: black; width: 50px;"
 type="text" /></td>
                    <td class="text-center"> <input disabled="disabled"
 id="frm1600WP:dtSched:taxWithheld6" name="frm1600WP:dtSched:taxWithheld6" 
 style="background-color: rgb(220, 220, 220); color: black; text-align: right; "
 value="0.00" size="15" maxlength="25" type="text" /></td>
                    <td width="2%">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>7</td>
                    <td><input  style="width: 150px" id="frm1600WP:dtSched:txtTin7" name="frm1600WP:dtSched:txtTin7" 
 maxlength="12" value="" onblur="blockLetterInt(this)"
 type="text" onkeypress="return numbersonly(this, event)" /></td>
                    <td><input
 id="frm1600WP:dtSched:txtFullname7" name="frm1600WP:dtSched:txtFullname7" maxlength="50"
 type="text" /></td>
                    <td><a href="#" onclick="showSchedIIATC(7)" id="frm1600WP:dtSched:btnATCcode7" style="font-size: 11px;">ATC <!--<input
 id="frm1600WP:dtSched:btnATCcode7" class="printButtonClass"
 value="ATC" onclick="showSchedIIATC(7)" type="button" />--></a></td>
                    <td><input
 id="frm1600WP:dtSched:drpAtcCode7" name="frm1600WP:dtSched:drpAtcCode7" style='width:67px' type="text" /></td>
                    <td><input
 id="frm1600WP:dtSched:naturePayment7" name="frm1600WP:dtSched:naturePayment7" value=""
 type="text" /></td>
                    <td class="text-center"><input id="frm1600WP:dtSched:amount7" name="frm1600WP:dtSched:amount7" 
 maxlength="17" style="text-align: right;width: 150px;" value=""
 onblur="round(this,2);computeDtShedTaxWithheld()" type="text" onkeypress="return numbersonly(this, event)" /></td>
                    <td><input
 id="frm1600WP:dtSched:txtRatePercent7" name="frm1600WP:dtSched:txtRatePercent7"
 style="background-color: rgb(220, 220, 220); text-align: right; color: black; width: 50px;"
 type="text" /></td>
                    <td class="text-center"> <input disabled="disabled"
 id="frm1600WP:dtSched:taxWithheld7" name="frm1600WP:dtSched:taxWithheld7" 
 style="background-color: rgb(220, 220, 220); color: black; text-align: right; "
 value="0.00" size="15" maxlength="25" type="text" /></td>
                    <td width="2%">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>8</td>
                    <td><input style="width: 150px"  id="frm1600WP:dtSched:txtTin8" name="frm1600WP:dtSched:txtTin8" 
 maxlength="12" value="" onblur="blockLetterInt(this)"
 type="text" onkeypress="return numbersonly(this, event)" /></td>
                    <td><input
 id="frm1600WP:dtSched:txtFullname8" name="frm1600WP:dtSched:txtFullname8" maxlength="50"
 type="text" /></td>
                    <td><a href="#" onclick="showSchedIIATC(8)" id="frm1600WP:dtSched:btnATCcode8" style="font-size: 11px;">ATC <!--<input
 id="frm1600WP:dtSched:btnATCcode8" class="printButtonClass"
 value="ATC" onclick="showSchedIIATC(8)" type="button" />--></a></td>
                    <td><input
 id="frm1600WP:dtSched:drpAtcCode8" name="frm1600WP:dtSched:drpAtcCode8" style='width:67px' type="text" /></td>
                    <td><input
 id="frm1600WP:dtSched:naturePayment8" name="frm1600WP:dtSched:naturePayment8" value=""
 type="text" /></td>
                    <td class="text-center"><input id="frm1600WP:dtSched:amount8" name="frm1600WP:dtSched:amount8" 
 maxlength="17" style="text-align: right;width: 150px;" value=""
 onblur="round(this,2);computeDtShedTaxWithheld()" type="text" onkeypress="return numbersonly(this, event)" /></td>
                    <td><input
 id="frm1600WP:dtSched:txtRatePercent8" name="frm1600WP:dtSched:txtRatePercent8"
 style="background-color: rgb(220, 220, 220); text-align: right; color: black; width: 50px;"
 type="text" /></td>
                    <td class="text-center"> <input disabled="disabled"
 id="frm1600WP:dtSched:taxWithheld8" name="frm1600WP:dtSched:taxWithheld8" 
 style="background-color: rgb(220, 220, 220); color: black; text-align: right; "
 value="0.00" size="15" maxlength="25" type="text" /></td>
                    <td width="2%">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>9</td>
                    <td><input style="width: 150px"  id="frm1600WP:dtSched:txtTin9" name="frm1600WP:dtSched:txtTin9" 
 maxlength="12" value="" onblur="blockLetterInt(this)"
 type="text" onkeypress="return numbersonly(this, event)" /></td>
                    <td><input
 id="frm1600WP:dtSched:txtFullname9" name="frm1600WP:dtSched:txtFullname9" maxlength="50"
 type="text" /></td>
                    <td><a href="#" onclick="showSchedIIATC(9)" id="frm1600WP:dtSched:btnATCcode9" style="font-size: 11px;">ATC<!--<input
 id="frm1600WP:dtSched:btnATCcode9" class="printButtonClass"
 value="ATC" onclick="showSchedIIATC(9)" type="button" />--></a>
                    </td>
                    <td><input
 id="frm1600WP:dtSched:drpAtcCode9" name="frm1600WP:dtSched:drpAtcCode9" style='width:67px' type="text" /></td>
                    <td><input
 id="frm1600WP:dtSched:naturePayment9" name="frm1600WP:dtSched:naturePayment9" value=""
 type="text" /></td>
                    <td class="text-center"><input id="frm1600WP:dtSched:amount9" name="frm1600WP:dtSched:amount9" 
 maxlength="17" style="text-align: right;width: 150px;" value=""
 onblur="round(this,2);computeDtShedTaxWithheld()" type="text" onkeypress="return numbersonly(this, event)" /></td>
                    <td><input
 id="frm1600WP:dtSched:txtRatePercent9" name="frm1600WP:dtSched:txtRatePercent9"
 style="background-color: rgb(220, 220, 220); text-align: right; color: black; width: 50px;"
 type="text" /></td>
                    <td class="text-center"> <input disabled="disabled"
 id="frm1600WP:dtSched:taxWithheld9" name="frm1600WP:dtSched:taxWithheld9" 
 style="background-color: rgb(220, 220, 220); color: black; text-align: right; "
 value="0.00" size="15" maxlength="25" type="text" /></td>
                    <td width="2%">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>10</td>
                    <td><input style="width: 150px"  id="frm1600WP:dtSched:txtTin10" name="frm1600WP:dtSched:txtTin10" 
 maxlength="12" value="" onblur="blockLetterInt(this)"
 type="text" onkeypress="return numbersonly(this, event)" /></td>
                    <td><input
 id="frm1600WP:dtSched:txtFullname10" name="frm1600WP:dtSched:txtFullname10" maxlength="50"
 type="text" /></td>
                    <td><a href="#" onclick="showSchedIIATC(10)" id="frm1600WP:dtSched:btnATCcode10" style="font-size: 11px;">ATC<!--<input
 id="frm1600WP:dtSched:btnATCcode10" class="printButtonClass"
 value="ATC" onclick="showSchedIIATC(10)" type="button" />--></a>
                    </td>
                    <td><input
 id="frm1600WP:dtSched:drpAtcCode10" name="frm1600WP:dtSched:drpAtcCode10" style='width:67px' type="text" /></td>
                    <td><input
 id="frm1600WP:dtSched:naturePayment10" name="frm1600WP:dtSched:naturePayment10" value=""
 type="text" /></td>
                    <td class="text-center"><input id="frm1600WP:dtSched:amount10" name="frm1600WP:dtSched:amount10" 
 maxlength="17" style="text-align: right;width: 150px;" onblur="round(this,2);computeDtShedTaxWithheld()"
 type="text" onkeypress="return numbersonly(this, event)" /></td>
                    <td><input
 id="frm1600WP:dtSched:txtRatePercent10" name="frm1600WP:dtSched:txtRatePercent10"
 style="background-color: rgb(220, 220, 220); text-align: right; color: black; width: 50px;"
 type="text" /></td>
                    <td class="text-center"> <input disabled="disabled"
 id="frm1600WP:dtSched:taxWithheld10" name="frm1600WP:dtSched:taxWithheld10" 
 style="background-color: rgb(220, 220, 220); color: black; text-align: right; "
 value="0.00" size="15" maxlength="25" type="text" /></td>
                    <td width="2%">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="2">Total</td>
                    <td colspan="6"></td>
                    <td colspan="2"><input
 id="frm1600WP:dtSched:TotaltaxWithheld" name="frm1600WP:dtSched:TotaltaxWithheld"
 style="background-color: rgb(220, 220, 220); color: black; text-align: right; "
 value="0.00" size="15" maxlength="25" type="text" />
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
         <table  style="border-top: 3px solid black; font-family:arial; font-size:14px; text-align: center; table-layout: fixed;">
                      <tr>
                        <td colspan="7">I declare, under the penalties of perjury that this return has been made in good faith, verified by me, and to the best of my knowledge and belief,
                          <br/>is true and correct, pursuant to the provisions of the National Internal Revenue Code, as amended, and the regulations issued under authority thereof.
                        <br/>&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="3"><b>17</b>________________________________________________
                          <br/>Taxpayer/Authorized Representative/Accredited Tax Agent
                          <br/>&nbsp;</td>
                        <td colspan="2">________________________
                          <br/>Title/Position of Signatory
                          <br/>&nbsp;</td>
                        <td colspan="2">________________________
                          <br/>TIN of Signatory
                          <br/>&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="3">________________________________________________
                          <br/>Tax Agent Acc. No./Atty's Roll No. (if applicable)
                          <br/>&nbsp;</td>
                        <td colspan="2">________________________
                          <br/>Date of Issuance
                          <br/>&nbsp;</td>
                        <td colspan="2">________________________
                          <br/>Date of Expiry
                          <br/>&nbsp;</td>
                      </tr>
                    </table>
                  </div>
                  <div class="imgClass" align='center' style="display:none; width:990px !important;">
                    <img id="frm1600WP:jurat" src="{{ asset('images/bottom_img/1600WP_new.jpg') }}" width="990"/>
                  </div>
                  <div class="imgClass" align='left' style="display:none; width:990px !important;">
                    <table style="font-size:12px; text-align: left; vertical-align: top;">
                      <tr>
                        <td>Machine Validation/Revenue Official Receipt Details (If not filed with the bank)<br /><br /><br /><br /><br /></td>
                      </tr>
                    </table>
                  </div>
    
        <table class="tblForm printButtonClass" border="0"
 cellpadding="0" cellspacing="0" width="990">
          <tbody>
            <tr>
              <td class="tblFormTdPart">
              <table border="0" cellpadding="0"
 cellspacing="0" width="985">
                <tbody>
                  <tr>
                    <td>
                    <table border="0" cellpadding="0"
 cellspacing="0" width="983">
                      <tbody>
                        <tr valign="middle">
                          <td width="159"></td>
                          <td width="991">
                          <div id="frm1600WP:j_id743">
                          <div align="center">
                           @if($action != 'view')
                           <input
 class="printButtonClass" value="Validate"
 style="width: 100px;" name="frm1600WP:cmdValidate&quot;"
 id="frm1600WP:cmdValidate" onclick="validate()"
 type="button" /> <input class="printButtonClass"
 value="Edit" style="width: 100px;"
 name="frm1600WP:cmdEdit" id="frm1600WP:cmdEdit"
 onclick="enableAllControl()" type="button" /><!--<input class="printButtonClass" type="button" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />--> 
 <input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />
 <input
 class="printButtonClass" value="Save"
 style="width: 100px;" name="btnSave" id="btnSave"
 onclick="saveData()" type="button" /> <input
 class="printButtonClass" value="Print"
 style="width: 100px;" name="btnPrint" id="btnPrint"
 onclick="printme();"
 type="button" />
 <input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;" name="frm1600WP:btnFinalCopy" id="frm1600WP:btnFinalCopy" onclick="submitForm();" />
 @else
                                                     <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                     <input class="printButtonClass" type="button" value="Back" style="width: 100px;" onclick="gotoMain();" />
                                                 @endif
                          <div id="msg" class="printButtonClass" style="display:none;"></div>
                          </div>
                          </div>
                          </td>
                          <td width="59">
                          <div id="DummyTxt" style='display:none;'>  </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    </td>
                  </tr>
                </tbody>
              </table>
              </td>
            </tr>
          </tbody>
        </table>
        </td>
      </tr>
    </tbody>
  </table> 
  </div>
  
  </td>
        <td valign="top"><img id="frm1600WP:bcsImg" src="{{ asset('images/BCS.jpg') }}"/></td>
        </tr>
        <tr>
          <td>
                        <div class="footer" style="padding:6px; text-align: center; font-size: 11px; background-color: white;width: 991px">
                            <font>Disclaimer : eTax is not connected with BIR or any government agency.</font>
                        </div>
            </td>
        </tr>
        </table>
  
  </div>
  </div>

  <div id="modalAtc" class="aBox"
 style="background:#fff ; width: 94%; display: none; height: 30%; position: relative; top: 3%; left: 3%; right: auto; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial;"
 align="left"> <br />
  <br />
  <table style="position: static;margin: auto;" border="0"
 cellpadding="3" cellspacing="3" width="90%">
    <tbody class="modalHeader" class="text-center">
      <tr>
        <td class="modalContent" colspan="3">Please click a check box to select and deselect an ATC.</td>
      </tr>
      <tr>
        <td width="20%"><b> ATC </b></td>
        <td width="70%"> <b> Description </b>
        </td>
        <td width="10%"> <b> Rate % </b> </td>
      </tr>
      <tr>
        <td colspan="3">
        <hr /></td>
      </tr>
    </tbody>
  </table>
  <div class="modalColumnHeader" style="height: 300px; overflow: auto; width: 90%;margin: auto;">
  <table id="tbllistAtcCode" style="padding: 1%; width: 100%;"
 cellpadding="0" cellspacing="0">
    <tbody>
      <tr>
        <td></td>
      </tr>
    </tbody>
  </table>
  </div>
  <br />
  <div align="center"> <input name="btnOkPop"
 id="btnOkPop" style="width: 120px; height: 30px;"
 value="OK" onclick="getATCCode()" type="button" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  </div>
  <br />
  <br />
  </div>

  <div id="modalSchedIIAtc" class="aBox1600WPSchedII"
 style="background: #fff; width: 94%; display: none; height: 30%; position: relative; top: 3%; left: 3%; right: auto; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial;"
 align="left"> <br />
  <br />
  <table border="0" cellpadding="3" cellspacing="3"
 width="90%">
    <tbody class="modalHeader">
      <tr>
        <td class="modalContent" colspan="3"></td>
      </tr>
      <tr>
        <td width="20%"><b> ATC </b></td>
        <td width="70%"> <b> Description </b>
        </td>
        <td width="10%"> <b> Rate % </b> </td>
      </tr>
      <tr>
        <td colspan="3">
        <hr /></td>
      </tr>
    </tbody>
  </table>
  <div class="modalColumnHeader" style="height: 300px; overflow: auto; width: 90%;">
  <table id="tbllistSchedIIAtcCode" cellpadding="3"
 cellspacing="3" width="100%">
    <tbody>
      <tr>
        <td></td>
      </tr>
    </tbody>
  </table>
  </div>
  <br />
  <div align="center"> <input name="btnOkPop"
 id="btnOkPop" style="width: 120px; height: 30px;"
 value="OK" onclick="getSchedIIATCCode()" type="button" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  </div>
  <br />
  <br />
  </div>
  
  <div id="hiddenEnroll" style="display:none;"  > <input id="txtFinalFlag" class="FinalFlag" name="txtFinalFlag" type="text" onblur="" onkeypress="" value="0" maxlength="60"   />
          <input id="txtEnroll" name="txtEnroll" type="text" onblur="" onkeypress="" value="N" maxlength="60"   />
    </div>
   
   
  <div id="hiddenEmail" style="display:none;"  > 
          <input id="txtEmail" value="{{$company->email_address}}" class="emailClass" name="txtEmail" type="text" onblur="" onkeypress="" maxlength="60"   />
          <input type="text" id="hPartIITableSize" name="hPartIITableSize" value="" style="visibility: hidden; width: 0px;" type="text" />

    </div>
  
</form>
<textarea id='responsetext' style="display:none;"></textarea>
        <div style="display:none;">
            <xmp id='xmlFormat'>  
            </xmp> <!--format the doc -->
            <span id='xmlClose'>All Rights Reserved BIR 2012.</span>
        </div>
          <div id="responseBG" style="display:none;"><!--loaded files render here--></div>  
                  <div id="response" style="display: none;"><!--loaded files render here--></div>
                  <div id="responseATC" style="display: none;"><!--loaded ATC files render here--></div>
          <div id="responseRdo" style="display:none;"><!--loaded files render here--></div> 
@endsection

@section('scripts')
<script type="text/javascript">
  var isSubmitFinal = false;
  var isSubmit = false;
  
  var fileName = "";
  var existingXMLFileName = "";
  var gIsReadOnly = false;
  fileNameToExport = "";
  
  var savedReturn = "";
  var p3Compromise = "";
  var p3Surcharge = "";
  var p3Interest = "";
  var p3IsAmended = "";
  var p3FilingDate = "";
  var p3ReturnPeriod = "";
  var p3ReturnPeriodEnd = "";
  
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
          
    var str;
    str = setTimeout("sleeptime()", 300);
    function sleeptime()
    {
    loadXMLATC('/xml/atcCodes.xml'); 
    
    
    var xmlFileName = document.getElementById('file_name').value;        
    fileName = xmlFileName;
    if (fileName != null && fileName.indexOf('.xml') > -1) {
      loadXML(fileName);   

      d.getElementById('frm1600WP:DateWithholdingMonth').disabled = true;
      d.getElementById('frm1600WP:DateWithholdingDay').disabled = true;
      d.getElementById('frm1600WP:DateWithholdingYear').disabled = true;
      
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
    d.getElementById('frm1600WP:txtTIN1').disabled = true;
      d.getElementById('frm1600WP:txtTIN2').disabled = true;
    d.getElementById('frm1600WP:txtTIN3').disabled = true;
    d.getElementById('frm1600WP:txtBranchCode').disabled = true;  
     window.setTimeout("checkFinalCopyBtn('1600WP')", 2000);

     init();
    }
  
  function rdoPropertyJS(rdoCode, description) 
  {
    this.rdoCode=rdoCode;
    this.description=description;
  }
  
  var rdoList = new Array();
  
    function init()
    {   
    var year = new Date();
    mm = "" + (year.getMonth() + 1); 
    if (mm.length == 1) 
    {
      mm = "0" + mm; 
      d.getElementById('frm1600WP:DateWithholdingMonth').value = mm;
      d.getElementById('frm1600WP:DateWithholdingToMonth').value = mm
    }
    else
    {
      d.getElementById('frm1600WP:DateWithholdingMonth').value = year.getMonth() +1;
      d.getElementById('frm1600WP:DateWithholdingToMonth').value = year.getMonth() +1;
    }
    dd = "" + year.getDate();
    if (dd.length == 1) 
    { 
      dd = "0" + dd; 
      d.getElementById('frm1600WP:DateWithholdingDay').value = dd;
      d.getElementById('frm1600WP:DateWithholdingToDay').value = dd;
    }
    else
    {
      d.getElementById('frm1600WP:DateWithholdingDay').value = year.getDate();
      d.getElementById('frm1600WP:DateWithholdingToDay').value = year.getDate();
    }
    
        d.getElementById('frm1600WP:DateWithholdingYear').value = year.getFullYear();
        d.getElementById('frm1600WP:DateWithholdingToYear').value = year.getFullYear();
        d.getElementById('frm1600WP:AmendedReturn_1').disabled = false;
        d.getElementById('frm1600WP:AmendedReturn_2').disabled = false;
        d.getElementById('frm1600WP:txtSheets').disabled = false;
        @if($action != 'view')
        d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm1600WP:cmdEdit').disabled = true;
        d.getElementById('frm1600WP:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;

        d.getElementById('frm1600WP:txtTax15A').disabled = false;
        d.getElementById('frm1600WP:txtTax15B').disabled = false;
        d.getElementById('frm1600WP:txtTax15C').disabled = false;
        @else 

          d.getElementById('frm1600WP:txtTax15A').disabled = true;
          d.getElementById('frm1600WP:txtTax15B').disabled = true;
          d.getElementById('frm1600WP:txtTax15C').disabled = true;

          var taxBase = d.getElementById("hPartIITableSize").value;   
         
          for(var i = 1 ; i < parseInt(taxBase) + 1; i ++)
          {
              setTimeout("d.getElementById('frm1600WP:txtTaxBase" + i + "').disabled = true;", 100);
          } 

        disableAllControl();
        @endif
    
        d.getElementById('frm1600WP:SpecialLaw_1').disabled = true;
        d.getElementById('frm1600WP:SpecialLaw_2').disabled = true;
        d.getElementById('frm1600WP:SpecialLawSelect').disabled = true;
       
        d.getElementById('frm1600WP:txtTax12').disabled = true;
        d.getElementById('frm1600WP:txtTax13').disabled = true;
        d.getElementById('frm1600WP:txtTax14').disabled = true;
       
        d.getElementById('frm1600WP:txtTax15D').disabled = true;
        d.getElementById('frm1600WP:txtTax16').disabled = true;
        d.getElementById('frm1600WP:DateWithholdingToMonth').disabled = true;
        d.getElementById('frm1600WP:DateWithholdingToDay').disabled = true;
        d.getElementById('frm1600WP:DateWithholdingToYear').disabled = true;
        d.getElementById('frm1600WP:dtSched:TotaltaxWithheld').disabled = true;
        for(i=1 ; i <= 10; i ++)
        {
            d.getElementById('frm1600WP:dtSched:drpAtcCode'+i).disabled = true;
            d.getElementById('frm1600WP:dtSched:naturePayment'+i).disabled = true;
            d.getElementById('frm1600WP:dtSched:txtRatePercent'+i).disabled = true;
            d.getElementById('frm1600WP:dtSched:taxWithheld'+i).disabled = true;
        }
    }

  var atcList = new Array();

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
    var d=document,data='',XMLBGFile='',XMLFile='', XMLATCFile='',msg = d.getElementById('msg');
  var loader=d.getElementById('loader');
  /*----------------------------------*/      

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
        var responseATC = d.getElementById('responseATC'); //render file and write to hidden div
        responseATC.innerHTML = xmlHTTP.responseText; //remove XML tag
        loadATC();

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
      
      //Ensure that before writing to atcPropertyJS the formType 1600WP is traceable in atcStr
      if (atcStr.indexOf('1600WP') >= 0) {
          var atcValues = atcStr.split('~');        
        
        var formType = "1600WP";
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
        //alert('1600WP successfully created array #'+i);
        
      } else {    
        //alert('1600WP not found in array #'+i);
        continue;
      }
    }         
  } 

  /*--------------------------------------------------------------*/  
  
  

  /*--------------------------------------------------------------*/
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
          d.getElementById('frm1600WP:cmdValidate').disabled = true;
          d.getElementById('btnSave').disabled = true;
        }
        window.setTimeout("loadDataATCRow();",600);

  }
  
  function loadData() {
    /*This will load data onto fields*/
    
    window.setTimeout("getATCCode();",105);   
        
    var response = d.getElementById("response");
        var elem = document.getElementById('frmMain').elements;
        for(var i = 0; i < elem.length; i++)
        {
      
      if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {  //elem[i].type != 'button' &&       
        if (elem[i].type == 'text' || elem[i].type == 'select-one') {
          var fieldVal = String( $("#response").html() ).split(elem[i].id+'=');   
            if (fieldVal != null && fieldVal.length > 1) {
              if(elem[i].id == 'frm1600WP:txtTaxpayerName' || elem[i].id == 'frm1600WP:txtAddress'){
                elem[i].value = unescape(fieldVal[1]);
              }
              else if (elem[i].className.indexOf("FinalFlag") > -1) {
                        elem[i].value = typeof (fieldVal[1]) === "undefined" ? "3" : fieldVal[1];
                    }
              else{
                elem[i].value = fieldVal[1]; //all select-one and text values     
                document.getElementById(elem[i].id).setAttribute('value',fieldVal[1]);  
              }
            } 
        }
        if (elem[i].type == 'radio') {
          var rdoVal = String( $("#response").html() ).split(elem[i].id+'=');       
          if (rdoVal[1] == 'true') {
            elem[i].checked = rdoVal[1];
            if (elem[i].id == 'frm1600WP:CategoryAgent_P' || elem[i].id == 'frm1600WP:CategoryAgent_G') {           
              elem[i].onclick();
            } 
          }         
        } 
        if (elem[i].type == 'checkbox') {
          var chkboxVal = String( $("#response").html() ).split(elem[i].id+'=');        
          if (chkboxVal[1] == 'true') {
            elem[i].checked = chkboxVal[1];
          }         
        }
        //dgarfin: temporarily commented until modalAtc popup show/hide 
        //if (elem[i].type == 'button' && elem[i].id == 'btnOkPop') {
        //  elem[i].onclick();        
        //}         
      }

        }   
document.getElementById('txtEmail').value = globalEmail;    
  }
  
  function loadDataATCRow() {
    /*This will load data onto fields*/
    var response = d.getElementById("response");    
        var elem = document.getElementById('frmMain').elements;
        for(var i = 0; i < elem.length; i++) {
      
      if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {  //elem[i].type != 'button' &&       
        if (elem[i].type == 'text' || elem[i].type == 'select-one') {
          var fieldVal = String( $("#response").html() ).split(elem[i].id+'='); 
          if(elem[i].id == 'frm1600WP:txtTaxpayerName' || elem[i].id == 'frm1600WP:txtAddress'){
            elem[i].value = unescape(fieldVal[1]);
          }
          else{
            elem[i].value = fieldVal[1]; //all select-one and text values       
          }
        }       
      }
        }
  }   
  
  function isItAnAmendedReturn(xmlFile) { 
    if(d.getElementById('frm1600WP:AmendedReturn_1').checked) {
      return true;
    } else {
      return false;
    }   
  }
 
  function setInputTextControl_HorizontalAlignment(id,align) {
    if (d.getElementById(id) != null) {
      //d.getElementById(id).textIndent = parseInt(align);
      d.getElementById(id).style.textAlign = "right";
    }
  } 
  function setInputTextControl_NumberFormatter(id,limit,deci) {
    if (d.getElementById(id) != null) {
      d.getElementById(id).size = parseInt(limit);
      d.getElementById(id).value = parseFloat(d.getElementById(id).value).toFixed( parseInt(deci) );    
    }
  } 
  
  var disableElem = true;
  var enableElem = false;
    function disableAllControl()
    {
        d.getElementById('frm1600WP:txtTax13').disabled = true;
        d.getElementById('frm1600WP:AmendedReturn_1').disabled = true;
        d.getElementById('frm1600WP:AmendedReturn_2').disabled = true;
        d.getElementById('frm1600WP:DateWithholdingMonth').disabled = true;
        d.getElementById('frm1600WP:DateWithholdingDay').disabled = true;
        d.getElementById('frm1600WP:DateWithholdingYear').disabled = true;
        d.getElementById('frm1600WP:AnyTaxHeld_1').disabled = true;
        d.getElementById('frm1600WP:AnyTaxHeld_2').disabled = true;
        d.getElementById('frm1600WP:CategoryAgent_P').disabled = true;
        d.getElementById('frm1600WP:CategoryAgent_G').disabled = true;
        d.getElementById('btnAddATCPartII').disabled = true;
        d.getElementById('frm1600WP:txtSheets').disabled = true;
        d.getElementById('frm1600WP:txtTax15A').disabled = true;
        d.getElementById('frm1600WP:txtTax15B').disabled = true;
        d.getElementById('frm1600WP:txtTax15C').disabled = true;
        d.getElementById('frm1600WP:txtTIN1').disabled = true;
        d.getElementById('frm1600WP:txtTIN2').disabled = true;
        d.getElementById('frm1600WP:txtTIN3').disabled = true;
        d.getElementById('frm1600WP:txtBranchCode').disabled = true;
        d.getElementById('frm1600WP:txtRDOCode').disabled = true;
        d.getElementById('frm1600WP:txtTaxpayerName').disabled = true;
        d.getElementById('frm1600WP:txtAddress').disabled = true;
        d.getElementById('frm1600WP:txtZipCode').disabled = true;
        d.getElementById('btnPrint').disabled = false;

        @if($action != 'view')
        d.getElementById('frm1600WP:cmdEdit').disabled = false;
        d.getElementById('frm1600WP:btnFinalCopy').disabled = false;
         d.getElementById('frm1600WP:cmdValidate').disabled = true;
        d.getElementById('frm1600WP:cmdEdit').disabled = false;
        d.getElementById('btnUpload').disabled = false;
        @endif
        for(i = 1 ; i < ( d.getElementById('tblPartIIComputeTax').rows.length) ; i ++)
        {
            d.getElementById('frm1600WP:txtTaxBase'+i).disabled = true;
        }
        
        for(i = 1 ; i <= 10 ; i ++ )
        {
            d.getElementById('frm1600WP:dtSched:txtTin'+i).disabled = true;
            d.getElementById('frm1600WP:dtSched:txtFullname'+i).disabled = true;
            d.getElementById('frm1600WP:dtSched:btnATCcode'+i).disabled = true;
            d.getElementById('frm1600WP:dtSched:amount'+i).disabled = true;
        }
       
    disableElem;
    enableElem;
    }
    function enableAllControl()
    {
        d.getElementById('frm1600WP:AmendedReturn_1').disabled = false;
        d.getElementById('frm1600WP:AmendedReturn_2').disabled = false;
        d.getElementById('frm1600WP:DateWithholdingMonth').disabled = false;
        d.getElementById('frm1600WP:DateWithholdingDay').disabled = false;
        d.getElementById('frm1600WP:DateWithholdingYear').disabled = false;
        d.getElementById('frm1600WP:AnyTaxHeld_1').disabled = false;
        d.getElementById('frm1600WP:AnyTaxHeld_2').disabled = false;
        d.getElementById('frm1600WP:CategoryAgent_P').disabled = false;
        d.getElementById('frm1600WP:CategoryAgent_G').disabled = false;
        d.getElementById('btnAddATCPartII').disabled = false;
    
        d.getElementById('frm1600WP:txtTax15A').disabled = false;
        d.getElementById('frm1600WP:txtTax15B').disabled = false;
        d.getElementById('frm1600WP:txtTax15C').disabled = false;
    
        for(i = 1 ; i < ( d.getElementById('tblPartIIComputeTax').rows.length) ; i ++)
        {
            d.getElementById('frm1600WP:txtTaxBase'+i).disabled = false;
        }
        for(i = 1 ; i <= 10 ; i ++ )
        {
            d.getElementById('frm1600WP:dtSched:txtTin'+i).disabled = false;
            d.getElementById('frm1600WP:dtSched:txtFullname'+i).disabled = false;
            d.getElementById('frm1600WP:dtSched:btnATCcode'+i).disabled = false;
            d.getElementById('frm1600WP:dtSched:amount'+i).disabled = false;
        }
        //enableallShedIIATC()
        d.getElementById('frm1600WP:cmdValidate').disabled = false;
        d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm1600WP:cmdEdit').disabled = true;
        d.getElementById('frm1600WP:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;

        if(d.getElementById('frm1600WP:AmendedReturn_1').checked) {
            d.getElementById('frm1600WP:txtTax13').disabled = false;
        } else {
            d.getElementById('frm1600WP:txtTax13').disabled = true;
        }
    
      if (qs('xmlFileName') != null && qs('xmlFileName').indexOf('.xml') > -1) {
      d.getElementById('frm1600WP:DateWithholdingMonth').disabled = true;
      d.getElementById('frm1600WP:DateWithholdingDay').disabled = true;
      d.getElementById('frm1600WP:DateWithholdingYear').disabled = true;
      }
      
      disableElem;
      enableElem;
      d.getElementById('frm1600WP:txtTIN1').disabled = true;
      d.getElementById('frm1600WP:txtTIN2').disabled = true;
      d.getElementById('frm1600WP:txtTIN3').disabled = true;
      d.getElementById('frm1600WP:txtBranchCode').disabled = true;  
    }
  
    function disableallShedIIATC()
    {
        for(i = 1; i <= 10; i++)
        {   d.getElementById('frm1600WP:dtSched:txtTin'+i).value = "";
            d.getElementById('frm1600WP:dtSched:txtFullname'+i).value = "";
            d.getElementById('frm1600WP:dtSched:btnATCcode'+i).disabled = true;
            d.getElementById('frm1600WP:dtSched:drpAtcCode'+i).value = "";
            d.getElementById('frm1600WP:dtSched:naturePayment'+i).value = "";
            d.getElementById('frm1600WP:dtSched:amount'+i).value = "";
            d.getElementById('frm1600WP:dtSched:txtRatePercent'+i).value = "";
            d.getElementById('frm1600WP:dtSched:taxWithheld'+i).value = "0.00";

        }
    }
    function enableallShedIIATC()
    {
        for(i = 1; i <= 10; i++)
        {
            d.getElementById('frm1600WP:dtSched:btnATCcode'+i).disabled = false;
        }
    }

    function validate()
    {
        m1 = "" + d.getElementById('frm1600WP:DateWithholdingMonth').value;
    d1 = "" + d.getElementById('frm1600WP:DateWithholdingDay').value;
    var dt = new Date();
        if( d.getElementById('frm1600WP:DateWithholdingMonth').value == "")
        {
            alert("Please enter a valid month on Item 1.")
            return;
        }
    if( m1.length == 1 )
        {
            alert("Please enter a valid month on item 1. Format should be MM/DD/YYYY.")
            return;
        }
        if( d.getElementById('frm1600WP:DateWithholdingDay').value == "")
        {
            alert("Please enter a valid day on Item 1.");
            return;
        }
        if( d1.length == 1 )
        {
            alert("Please enter a valid day on item 1. Format should be MM/DD/YYYY.")
            return;
        }
    if( d.getElementById('frm1600WP:DateWithholdingYear').value == "")
        {
            alert("Please enter a valid year on Item 1.")
            return;
        }
    if(d.getElementById('frm1600WP:DateWithholdingDay').value < 1)
    {
      alert("Invalid date entry on item 1.");
      return;
    }
    var isLeap = new Date(document.getElementById('frm1600WP:DateWithholdingYear').value, 1, 29).getMonth() == 1;
    
    if (!isLeap && document.getElementById('frm1600WP:DateWithholdingMonth').value==2 && document.getElementById('frm1600WP:DateWithholdingDay').value==29) {
      alert("Filing year is not a leap year.");
      return;
    }
    if (!isLeap && document.getElementById('frm1600WP:DateWithholdingMonth').value==2 && document.getElementById('frm1600WP:DateWithholdingDay').value>29) {
      alert("Invalid date entry on item 1.");
      return;
    }
    if (isLeap && document.getElementById('frm1600WP:DateWithholdingMonth').value==2 && document.getElementById('frm1600WP:DateWithholdingDay').value>29) {
      alert("Invalid date entry on item 1.");
      return;
    }
    var month31 = (['01', '03', '05', '07', '08', '10', '12']);
    var month30 = (['04', '06', '09', '11']);
    var month = document.getElementById('frm1600WP:DateWithholdingMonth').value
    if (month31.contains(month) && document.getElementById('frm1600WP:DateWithholdingDay').value > 31)
    {
      alert("Invalid date entry on item 1.");
      return;
    }
    else if (month30.contains(month) && document.getElementById('frm1600WP:DateWithholdingDay').value > 30)
    {
      alert("Invalid date entry on item 1.");
      return;
    }
    
        if( d.getElementById('frm1600WP:DateWithholdingYear').value*1 < 1900   )
        {
            alert("Invalid date entry on Item no.1. Entry should not be lower than 1900.")
            return;
        }
        if(d.getElementById('frm1600WP:AmendedReturn_1').checked == false && d.getElementById('frm1600WP:AmendedReturn_2').checked == false )
        {
            alert("Please choose amended return on item 2.")
            return;
        }
        if(d.getElementById('frm1600WP:AnyTaxHeld_1').checked == false && d.getElementById('frm1600WP:AnyTaxHeld_2').checked == false )
        {
            alert("Please select an option for Item 4.")
            return;
        }

        if( (d.getElementById('frm1600WP:txtTIN1').value == "" || d.getElementById('frm1600WP:txtTIN2').value == "" || d.getElementById('frm1600WP:txtTIN3').value == "" || d.getElementById('frm1600WP:txtBranchCode').value == "")  )
        {
            alert("Please enter a valid TIN number on Item 5.");
            return;
        }   
       
    if(d.getElementById('frm1600WP:CategoryAgent_P').checked == false && d.getElementById('frm1600WP:CategoryAgent_G').checked == false )
        {
            alert("Please select an option for Item 7.")
            return;
        }   
    if( (d.getElementById('frm1600WP:txtTaxpayerName').value == "")  )
        {
            alert("Please enter a valid Withholding Agent's Name on Item 8.");
            return;
        } 
    if( (d.getElementById('frm1600WP:txtAddress').value == "")  )
        {
            alert("Please enter Taxpayer's Registered Address on Item 9.");
            return;
        }   
    
    if( (d.getElementById('frm1600WP:txtZipCode').value == "")  )
        {
            alert("Please enter Taxpayer's Zip Code on Item 10.");
            return;
        }   
    
        if( d.getElementById('frm1600WP:CategoryAgent_P').checked == false && d.getElementById('frm1600WP:CategoryAgent_G').checked == false  )
        {
            alert("Please select an option for Item 7.");
            return;
        }
        if ( d.getElementById('frm1600WP:AnyTaxHeld_1').checked == true  )
        {    // count of Compute Tax
            if ( 1 >= ( d.getElementById('tblPartIIComputeTax').rows.length)  )
            {
                alert("Please fill up Part II Computation of Tax if item 4 is set to Yes.")
                return;
            }
            var indexwithheld = 1;
            for (indexwithheld = 1 ; indexwithheld < ( d.getElementById('tblPartIIComputeTax').rows.length)  ; indexwithheld++)
            {
                if( d.getElementById('frm1600WP:txtAtcCode'+indexwithheld).value != "")
                {
                    //alert("with held tax " + d.getElementById('frm1600:txtTaxBase'+indexwithheld).value + ".")
                    if( d.getElementById('frm1600WP:txtTaxBase'+ indexwithheld).value == "" )
                    {
                        alert("Please enter a valid value for tax base for " + d.getElementById('frm1600WP:txtAtcCode'+indexwithheld).value + "." )
                        return;
                    }
                    if( d.getElementById('frm1600WP:txtTaxBase'+ indexwithheld).value <= 0 ) {
                        alert("Please enter Tax Base for ATC <" + d.getElementById('frm1600WP:txtAtcCode'+ indexwithheld).value + ">.")
                        return;
                    }
                }else {
                    alert("Please fill up Part II Computation of Tax if item 4 is set to Yes.")
                    return;
                }
            }
            for(i =1 ; i < 11; i++)
            {
                if(d.getElementById('frm1600WP:dtSched:txtTin'+ i).value != '' || d.getElementById('frm1600WP:dtSched:txtFullname'+ i).value != ''
                || d.getElementById('frm1600WP:dtSched:drpAtcCode'+ i).value != '' || d.getElementById('frm1600WP:dtSched:naturePayment'+ i).value != ''
                || d.getElementById('frm1600WP:dtSched:naturePayment'+ i).value != '' || d.getElementById('frm1600WP:dtSched:amount'+ i).value > 0) {
                if(d.getElementById('frm1600WP:dtSched:txtTin'+ i).value == '' ||  d.getElementById('frm1600WP:dtSched:txtTin'+ i).value.length < 12 ) {
                    alert("Please enter a valid TIN Number for Sequence " + i + ".");
                    return;
                } else if(d.getElementById('frm1600WP:dtSched:txtFullname'+ i).value == '') {
                    alert("Please enter a valid Name of Individual/Corporation for Sequence " + i + ".");
                    return;
                } else if(d.getElementById('frm1600WP:dtSched:drpAtcCode'+ i).value == '' || d.getElementById('frm1600WP:dtSched:naturePayment'+ i).value == '') {
                    alert("Please select an ATC from the list for Sequence " + i + ".");
                    return;
                } else if(d.getElementById('frm1600WP:dtSched:amount'+ i).value <= 0) {
                    alert("Please enter Tax Base for ATC " + d.getElementById('frm1600WP:dtSched:drpAtcCode'+ i).value + ". Value must be greater than 0.");
                    return;
                }
            }
             
            }
        }
        for(var i = 1 ; i <= 10 ; i++ ) {
            if(d.getElementById('frm1600WP:dtSched:txtTin'+ i).value != '' &&  d.getElementById('frm1600WP:dtSched:txtTin'+ i).value.length < 12 ) {
                alert("Please enter a valid TIN Number for Sequence " + i + "."); return;
            }
        }

        d.getElementById('hPartIITableSize').value = d.getElementById('tblPartIIComputeTax').rows.length - 1;

        disableAllControl();

        alert("Validation successful. Click on Edit if you wish to modify your entries.");
    return;
    }

    function blockletter(e)
    {
        var number = parseFloat(e.value).toFixed(2);
        if(isNaN(number))
        {
            //var zero = 0;
            //e.value = parseFloat(zero).toFixed(2);
            e.value = "";
        }else {
            e.value = '' + number;
        }
    }
    function blockletterWithout2Decimal(e)
    {
        var number = parseFloat(e.value);
        if(isNaN(number))
        {
            //var zero = 0;
            //e.value = parseFloat(zero).toFixed(2);
            e.value = "";
        }else {
            e.value = '' + number;
        }
    }

    var ATCnameCode = new Array() ;
    var NaturePayment = new Array() ;
    var taxRate = new Array();
    
    function getPrivateWithholdingAgentATC()
    {
        ATCnameCode = new Array() ;
        NaturePayment = new Array() ;
        taxRate = new Array();

        //var atcSize = atcList.getSize();
    var atcSize = atcList.length;
        var i = 0;
        var j = 1;
        NaturePayment[0] = "NO VALUE";
        for(i = 0; i < atcSize; i++) {
            //var atc = atcList.get(i);
      var atc = atcList[i];
            if(atc.formType == "1600WP" && atc.category == 'P') {
                
                ATCnameCode[j] = atc.atcCode;
                NaturePayment[j] = atc.description;
                taxRate[j++] = atc.rate;
            }
        }         
    }
    function getGovernmentWithholdingAgentATC()
    {
        ATCnameCode = new Array() ;
        NaturePayment = new Array() ;
        taxRate = new Array();

        //var atcSize = atcList.getSize(); 
    var atcSize = atcList.length;
    
        var i;
        var j=1;
        NaturePayment[0] = "NO VALUE";
        for(i = 0; i < atcSize; i++) {
            //var atc = atcList.get(i);
      var atc = atcList[i];
            if(atc.formType == "1600WP" && atc.category == 'G') {
                ATCnameCode[j] = atc.atcCode;
                NaturePayment[j] = atc.description;
                taxRate[j++] = atc.rate;
            }
        }

    }

    function getRequiredWithheld(numIndex)
    {   
        d.getElementById('frm1600WP:txtTaxbeWithHeld'+numIndex).value = formatCurrency((NumWithComma( d.getElementById('frm1600WP:txtTaxBase'+numIndex).value) * ( d.getElementById('frm1600WP:txtTaxRate'+numIndex).value / 100 ) ));
    }

    function cancelAllCompute()
    {    

        var answer = confirm("You are about to change the value to 'No'. Doing this will clear the entries in Part II and Schedule 1.1. ")
        if(answer)
        {
            //d.getElementById('tbodyComputeTax').innerHTML = "";
      $('#tbodyComputeTax').html("");
      
            disableallShedIIATC()
                
            computeDtShedTaxWithheld();
            computeofTotalWithheldTax();
      $('#modalAtc').find('input[type=checkbox]:checked').attr('checked', false);
        }else{
            d.getElementById('frm1600WP:AnyTaxHeld_1').checked = true;
        }
    }
  
  function dateChanged(val, id) {
    if (val != "") {
      var answer = confirm("You are about to change the date. Doing this will clear the entries in Part II and Schedule II. ")
      if(answer)
      {
        d.getElementById('frm1600WP:txtTax15A').value = formatCurrency(0.00);
        d.getElementById('frm1600WP:txtTax15B').value = formatCurrency(0.00);
        d.getElementById('frm1600WP:txtTax15C').value = formatCurrency(0.00);
        d.getElementById('frm1600WP:txtTax15D').value = formatCurrency(0.00);
        d.getElementById('frm1600WP:txtTax16').value = formatCurrency(0.00);
      }else{
        d.getElementById(id).value = val;
      }
    }
    }
  
    function computePenalties()
    {
    
        d.getElementById('frm1600WP:txtTax15D').value =   formatCurrency(NumWithComma(d.getElementById('frm1600WP:txtTax15A').value)*1  + NumWithComma(d.getElementById('frm1600WP:txtTax15B').value)*1 + NumWithComma(d.getElementById('frm1600WP:txtTax15C').value)*1);
    computeOfTotalAmtDue();
    }
    function computeOfTotalAmtDue()
    {
       d.getElementById('frm1600WP:txtTax16').value = formatCurrency(NumWithComma(d.getElementById('frm1600WP:txtTax15D').value)*1 + NumWithComma(d.getElementById('frm1600WP:txtTax14').value)*1);
   
  }

    function computeofTotalWithheldTax()
    {
        var i;
        var totalsum = 0;
        for(i = 1 ; i < ( d.getElementById('tblPartIIComputeTax').rows.length) ; i ++)
        {
            var taxwithheld = NumWithComma(d.getElementById('frm1600WP:txtTaxbeWithHeld'+i).value)*1 ;
            totalsum = totalsum + taxwithheld;
        }
        d.getElementById('frm1600WP:txtTax12').value = formatCurrency(totalsum);

        d.getElementById('frm1600WP:txtTax14').value = formatCurrency(NumWithComma(d.getElementById('frm1600WP:txtTax12').value)*1 - NumWithComma(d.getElementById('frm1600WP:txtTax13').value)*1);
        computeOfTotalAmtDue();
      
    }

    function computeDtShedTaxWithheld()
    {
        var totalsum = 0;
        for(i = 1 ; i < ( d.getElementById('tblScheduleII').rows.length - 3) ; i ++)
        {
            d.getElementById('frm1600WP:dtSched:taxWithheld'+i).value = formatCurrency((NumWithComma( d.getElementById('frm1600WP:dtSched:amount'+i).value) * ( d.getElementById('frm1600WP:dtSched:txtRatePercent'+i).value / 100 ).toFixed(2) ).toFixed(2));
            var taxwithheld = parseFloat(NumWithComma(d.getElementById('frm1600WP:dtSched:taxWithheld'+i).value)*1).toFixed(2) ;
            totalsum = (totalsum*1 + taxwithheld*1).toFixed(2);
        }
        d.getElementById('frm1600WP:dtSched:TotaltaxWithheld').value = formatCurrency(totalsum);
    }

    function changedrpATCList(e)
    {
        var i;
        if(e.value == "P")
        {   // change ATClist
            getPrivateWithholdingAgentATC();
        }else if(e.value == "G")
        {
            // change ATClist
            getGovernmentWithholdingAgentATC();
        }
      
      $('#tbllistAtcCode').html("");
      $('#tbllistSchedIIAtcCode').html("");
    
        for(i = 1 ; i < ATCnameCode.length ; i++  )
        {
             $('#tbllistAtcCode').html(  d.getElementById('tbllistAtcCode').innerHTML +  
                "<tr class='atc'><td class='atc' width='20%'> <input id='AtcCd"+i+"' name='AtcCd"+i+"' type='checkbox' value='"+ATCnameCode[i]+"' /> "+ATCnameCode[i]+ " </td> <td class='atc atcNames' width='70%' id='AtcNaturePayment"+i+"' >"+ NaturePayment[i]+ " </td> <td class='atc' width='10%' id='txtRate"+i+"'> "+taxRate[i]+ "</td> </tr>");

             $('#tbllistSchedIIAtcCode').html(  d.getElementById('tbllistSchedIIAtcCode').innerHTML +  
                "<tr class='atc'><td class='atc' width='20%'> <input id='SchedIIAtcCde"+i+"' name='SchedIIAtcCde"+i+"' type='radio' value='"+ATCnameCode[i]+ "' /> "+ATCnameCode[i]+ " </td> <td class='atc atcNames' width='70%' id='SchedIIAtcNaturePayment"+i+"' >"+ NaturePayment[i]+ " </td> <td class='atc' width='10%' id='txtRate"+i+"'> "+taxRate[i]+ "</td> </tr>");
        }

    }

    function checkiftaxwheldisYes()
    {
        if(d.getElementById('frm1600WP:AnyTaxHeld_1').checked == false && d.getElementById('frm1600WP:AnyTaxHeld_2').checked == false )
        {
            return "Please select an option for Item 4.";
        }
        else if( d.getElementById('frm1600WP:CategoryAgent_P').checked == false && d.getElementById('frm1600WP:CategoryAgent_G').checked == false  )
        {
            return "Please select an option for Item 7.";
        }
        else if( d.getElementById('frm1600WP:AnyTaxHeld_1').checked == true )
        {
            return true;
        }else
        {
            return "Selecting an ATC is not necessary when item no. 4 is set to ' NO '";
        }
    }

    function deletetableSchedII()
    {
        var table1 = d.getElementById("tblScheduleII");
        var tblrow =  table1.rows.length - 2;
        // delete last row
        if( tblrow > 3)  {
            table1.deleteRow(tblrow)
        }
        computeDtShedTaxWithheld();
    }

    var tempATC = new Array();
    var tempATCTaxbase = new Array();

    function showPartIIATC()
    {
      tempATC = new Array();
      tempATCTaxbase = new Array();
      for(var i = 0; i < d.getElementById('tblPartIIComputeTax').rows.length - 1; i++) {
        tempATC[i] = d.getElementById('frm1600WP:txtAtcCode'+ (i + 1)).value;
        tempATCTaxbase[i] = NumWithComma(d.getElementById('frm1600WP:txtTaxBase'+(i +1)).value);
        
      }

      if( checkiftaxwheldisYes() == true )
      {
       
        d.getElementById('formPaper').style.display = "none";
        $('#modalAtc').show('blind');     
        $('#wrapper').css({'display': 'none'});
        
      }else {
        alert(checkiftaxwheldisYes());
      }
    }
    var SchedIIATCIndex;
    function showSchedIIATC(index)
    {
      if( checkiftaxwheldisYes() == true )
      {
        
        d.getElementById('formPaper').style.display = "none";
        $('#modalSchedIIAtc').show('blind');      
        $('#wrapper').css({'display': 'none'});
        SchedIIATCIndex = index;
      }else {
        alert(checkiftaxwheldisYes());
      }
    }
    function cancelPartIIATC()
    {
       
        d.getElementById('formPaper').style.display = 'block';
        if ( $('#modalAtc').css('display') != 'none' ) {
      $('#modalAtc').hide('blind');
      $('#wrapper').css({'display': 'block'});
    }
        $('#DummyTxt').html("Creator");
        $('#DummyTxt').html("");      
    
        for(i =1 ; i < d.getElementById('tbllistAtcCode').rows.length; i++)
        {

            d.getElementById('AtcCd'+i).checked = ATCCodeList[i];

        }
    }
    function cancelSchedIIATC()
    {
        
        d.getElementById('formPaper').style.display = 'block';
        $('#modalSchedIIAtc').hide('blind');
        $('#wrapper').css({'display': 'block'});
        $('#DummyTxt').html("Creator");
        $('#DummyTxt').html("");  
    }
    function getSchedIIATCCode()
    {
        var listATCtable = d.getElementById('tbllistSchedIIAtcCode')

        for(i = 1 ; i <= listATCtable.rows.length; i++ )
        {
            if(d.getElementById('SchedIIAtcCde'+i) != null)
            {
                if(d.getElementById('SchedIIAtcCde'+i).checked == true)
                {
                    d.getElementById('frm1600WP:dtSched:drpAtcCode'+SchedIIATCIndex).value = d.getElementById('SchedIIAtcCde'+i).value;
                    d.getElementById('frm1600WP:dtSched:naturePayment'+SchedIIATCIndex).value = d.getElementById('SchedIIAtcNaturePayment'+i).innerHTML;
                    d.getElementById('frm1600WP:dtSched:txtRatePercent'+SchedIIATCIndex).value = d.getElementById('txtRate'+i).innerHTML;
                }
            }
        }
        //computeDtShedTaxWithheld();
        cancelSchedIIATC();
    }
    var ATCCodeList = new Array();
    function getATCCode()
    {
        var listATCtable =   d.getElementById('tbllistAtcCode');

        //d.getElementById('tbodyComputeTax').innerHTML = "";
        $('#tbodyComputeTax').html("");
    
        for(i = 1 ; i <= listATCtable.rows.length; i++ )
        {
            var table = d.getElementById("tblPartIIComputeTax");
            var iCtr = table.rows.length;   
            var rowCount = table.rows.length - 1;   
            if(d.getElementById('AtcCd'+i) != null)
            {   
                ATCCodeList[i] = d.getElementById('AtcCd'+i).checked;
                // check if checked id'ed ATC
                if (d.getElementById('AtcCd'+i).checked == true )
                {            
                var taxbasetemp = "0.00";
                    for(var tempCount = 0 ; tempCount < tempATC.length; tempCount++) {
                        if(tempATC[tempCount] == d.getElementById('AtcCd'+i).value){

                            taxbasetemp = formatCurrency(tempATCTaxbase[tempCount]);            
                            break;
                        }
                    }
          
                    //d.getElementById('tbodyComputeTax').innerHTML =  d.getElementById('tbodyComputeTax').innerHTML +
          $('#tbodyComputeTax').html(  d.getElementById('tbodyComputeTax').innerHTML +  
                        "<tr><td style='font-size: 10px;' id='txtNaturePayment"+iCtr+"'  > "+ d.getElementById('AtcNaturePayment'+i).innerHTML + "</td>" +
                        "<td class='text-center'> <input type='text' id='frm1600WP:txtAtcCode"+iCtr+"' name='frm1600WP:txtAtcCode[]' class='styletxtAtcCode' style='width: 170px;' value='"+ d.getElementById('AtcCd'+i).value + "' disabled />  </td>" +
                        "<td class='text-center'> <input type='text' id='frm1600WP:txtTaxBase"+iCtr+"' name='frm1600WP:txtTaxBase[]'  style='text-align: right;width: 170px;' size='20'  maxlength='17' onblur='round(this,2);getRequiredWithheld("+iCtr+"); computeofTotalWithheldTax()' value='" + taxbasetemp + "' onkeypress='return numbersonly(this, event)' /> </td>" +
                        "<td class='text-center'> <input type='text' id='frm1600WP:txtTaxRate"+iCtr+"' name='frm1600WP:txtTaxRate[]'  style='text-align: rightwidth: 170px;' class='styletxtTaxRate' value='"+ d.getElementById('txtRate'+i).innerHTML +"' disabled /> </td>" +
                        "<td class='text-center'> <input type='text' id='frm1600WP:txtTaxbeWithHeld"+iCtr+"' name='frm1600WP:txtTaxbeWithHeld[]'  class='styletxtTaxWithheld' size='25' maxlength='25' value='0.00' disabled /> </td>" +
                        "</tr>");
          
                    //waitstr = setTimeout("d.getElementById('frm1600WP:txtAtcCode"+iCtr+"').disabled = true; setInputTextControl_HorizontalAlignment('frm1600WP:txtTaxBase"+iCtr+"', 4); setInputTextControl_NumberFormatter('frm1600WP:txtTaxBase"+iCtr+"', 17, 2);" , 100);
                    waitstr = setTimeout("d.getElementById('frm1600WP:txtTaxbeWithHeld"+iCtr+"').disabled = true;setInputTextControl_HorizontalAlignment('frm1600WP:txtTaxbeWithHeld"+iCtr+"', 4); setInputTextControl_NumberFormatter('frm1600WP:txtTaxbeWithHeld"+iCtr+"', 17, 2);" , 100);                 
          //waitstr = setTimeout("d.getElementById('frm1600WP:txtTaxRate"+iCtr+"').disabled = true;setInputTextControl_HorizontalAlignment('frm1600WP:txtTaxRate"+iCtr+"', 4);" +
                    //    "getRequiredWithheld("+iCtr+")" , 100);   
                          
                  waitstr = setTimeout("getRequiredWithheld("+iCtr+");", 100);
        
                }
            }
        }

        setTimeout("computeofTotalWithheldTax();",100);
        cancelPartIIATC();
    }

    function blockLetterInt(e)
    {
        var number = e.value;
        if(isNaN(number))
        {
            e.value = "";
        } else {
            e.value = '' + number;
        }
    }
  
  function initialValidateBeforeSave() {
      if( (d.getElementById('frm1600WP:txtTIN1').value == "" || d.getElementById('frm1600WP:txtTIN2').value == "" || d.getElementById('frm1600WP:txtTIN3').value == "" || d.getElementById('frm1600WP:txtBranchCode').value == "")  )
      {
        alert("Please enter a valid TIN number on Item 5.");
        return false;
      } 
      
      if( (d.getElementById('frm1600WP:txtTaxpayerName').value == "")  )
      {
        alert("Please enter a valid Withholding Agent's Name on Item 8.");
        return false;
      }   
      return true;
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

  $('#bg').hide(); //990
  $('.printSignFooterClass').css({ 'width':'94%','margin':'auto','margin-top':'15px','display':'block','position':'relative','overflow':'visible','page-break-before':'always' });  
  $('.imgClass').css({ 'margin':'auto','display':'block','position':'relative','overflow':'visible' });
  
  $('#formPaper').css({'max-width':'8.3in !important', 'border':'#000 3px solid' });
  $('#wrapper').css({'max-width':'8.3in !important'});
  $('#container').css({'max-width':'8.3in !important'});  
  
    var elem = document.getElementById('frmMain').elements;
  var x=0;
  disabledItems = new Array();
    for(var i = 0; i < elem.length; i++) {      
    if (elem[i].type != 'hidden' && elem[i].className != "labels") { // && elem[i].type != 'undefined' 
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
  $('#formPaper').css({'margin-top':'-80px' });

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
        d.getElementById('hPartIITableSize').value = d.getElementById('tblPartIIComputeTax').rows.length - 1;
        var valid = initialValidateBeforeSave();
        if(valid == true){
                var form = $('#frmMain');
                var disabled = form.find(':input:disabled').removeAttr('disabled');
           
                var data = form.serialize();
                save('1600WP',data);
                
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
        saveAndExit('1600WP',data);
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

        submitAndSave('1600WP', data, company_id);
        
        disabled.attr('disabled','disabled');
        return false;
    }

    function gotoMain(){
        var company_id = $('#frmMain').find('input[name="company"]').val();
        window.location = '/companies/'+ company_id +'/histories/1600WP';
    } 
</script>
@endsection
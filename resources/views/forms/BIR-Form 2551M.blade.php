@extends('layouts.app')
@section('title', '| BIR Form No. 2551M')
@section('content')

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
        <button type="button" class="btn btn-danger btn-exit" id="2551M" company='{{$company->id}}'>No</button>
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
        <button type="button" class="btn btn-success btn-exit" id="2551M" company='{{$company->id}}'>Okay</button>
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
			<button type="button" class="btn btn-danger btn-filing-success" form='2551M' company='{{$company->id}}'>Okay</button>
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
            <div id="wrapper"  style="margin: 0 auto; position: relative; width: 906px; ">
                <div id="formPaper">
                    <div id="mainContent">
                        <table width="906" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                    <table width="906" border="0" cellspacing="0" cellpadding="0" style="height:0px;">
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
                                                <font size="5px" style="font-weight:bold;">Monthly Percentage<br/>Tax Return</font>
                                            </td>
                                            <td width="160" valign="center">
                                                <label face="Arial" size="1px">BIR Form No.<br/></label>
                                                <font face="Arial" size="6px">2551M<br/></font>
                                                <label face="Arial" size="1px">September 2005 (ENCS)</label>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="900" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>

                                            <td width="" valign="top" class="tblFormTd">
                                                <table width="279" border="0" cellspacing="0" cellpadding="0">

                                                    <tr>
                                                        <td width="23"><font size="2" style="font-weight:bold;">&nbsp;1&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td colspan="2"><font size="1" style="font-size: 11px;">For the</font></td>
                                                        <td>
                                                            <input id="frm2551M:optYrType:_1" name="frm2551M:optYrType" value="Y" type="radio" onclick="dateyear()" />
                                                            <label >Calendar&nbsp;&nbsp;</label>
                                                            <input id="frm2551M:optYrType:_2" name="frm2551M:optYrType" value="N" type="radio" onclick="dateyear()" />
                                                            <label>Fiscal</label>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td width="23"><font size="2" style="font-weight:bold;">&nbsp;2&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td colspan="2"><label size="1" style="font-size: 11px;">Year Ended <br/>(MM/YYYY)</label></td>
                                                        <td width="170" nowrap>
                                                            <select size="1" name="frm2551m:YearEndedMonth" id="frm2551m:YearEndedMonth"> <!-- onblur="datemonth()" -->
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
                                                            <input type="text" value="" size="2" name="frm2551m:txtYear" maxlength="4" id="frm2551m:txtYear" onkeypress="return wholenumber(this, event)" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>

                                            <td width="215" valign="top" class="tblFormTd">
                                                <table width="214" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="23"><font size="2" style="font-weight:bold;">&nbsp;&nbsp;3&nbsp;&nbsp;</font></td>
                                                        <td width="191"><font size="1" style="font-size: 11px;">For the month (MM /YYYY)</font></td>
                                                    </tr>
                                                    <tr>
                                                      <td width="10">&nbsp;</td>
                                                      <td width="204" nowrap><select size="1" name="frm2551m:ReturnMonth" id="frm2551m:ReturnMonth">
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
                                                      <input type="text" value="" size="2" maxlength="4" id="frm2551m:txtNo3Year" name="frm2551m:txtNo3Year" onblur="blockletterWithout2Decimal(this)" onkeypress="return wholenumber(this, event)" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="133" valign="top" class="tblFormTd">
                                                <table width="110" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="23"><font size="2" style="font-weight:bold;">&nbsp;&nbsp;4&nbsp;&nbsp;</font></td>
                                                        <td width="87"><font size="1" style="font-size: 11px;">Amended Return?</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm2551m:j_id217">
                                                                <div align="center" style="padding: 5px 0 5px 0;">
                                                                    <table cellspacing="0" cellpadding="0" border="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td><input type="radio" value="Y" name="frm2551m:ctypeCode" id="frm2551m:ctypeCode_1" onclick="updateAmended();" />
                                                                                    <label style="font-size:12px;" >Yes</label>&nbsp;&nbsp;</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><input  name="frm2551m:ctypeCode" type="radio" id="frm2551m:ctypeCode_2" value="N" onclick="updateAmended();" checked="checked"/>
                                                                                    <label style="font-size:12px;" >No</label>&nbsp;&nbsp;&nbsp; 
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </fieldset>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="113" valign="top" class="tblFormTd">
                                                <table width="" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="23"><font size="2" style="font-weight:bold;">&nbsp;5&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td width=""><label size="1" style="font-size: 11px;">No. of Sheets Attached</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td><input type="text" value="0" style="text-align: right;" size="4" name="frm2551m:txtSheets" maxlength="2" id="frm2551m:txtSheets" onkeypress="return wholenumber(this, event)" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="900" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTdPart">
                                                <table width="900" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="88">&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;">Part I</font></td>
                                                        <td width="565">
                                                            <div align="center"><font size="2" style="font-weight:bold;letter-spacing: 3px;">Background Information</font></div>
                                                        </td>
                                                        <td width="88">&nbsp;</td>
                                                    </tr>
                                                </table>
                                        </tr>
                                            </td>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="900" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="224" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="10"><font size="2" style="font-weight:bold">&nbsp;6&nbsp;</font></td>
                                                        <td width="214" nowrap>
                                                            <font size="1" style="font-size: 11px;">TIN&nbsp;</font>
                                                            <font size="2" face="Arial">
                                                                <input type="text" value="{{$company->tin1}}"  size="1" name="frm2551m:txtTIN1" maxlength="3" id="frm2551m:txtTIN1" onkeypress="return wholenumber(this, event)"/>
                                                                <input type="text" value="{{$company->tin2}}"  size="1" name="frm2551m:txtTIN2" maxlength="3" id="frm2551m:txtTIN2" onkeypress="return wholenumber(this, event)"/>
                                                                <input type="text" value="{{$company->tin3}}"  size="1" name="frm2551m:txtTIN3" maxlength="3" id="frm2551m:txtTIN3" onkeypress="return wholenumber(this, event)"/>
                                                                <input type="text" value="{{$company->tin4}}"  size="1" name="frm2551m:txtBranchCode" maxlength="3" id="frm2551m:txtBranchCode" onkeypress="return letternumber(event)"/>
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="150" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="50"><font size="2" style="font-weight:bold">&nbsp;7&nbsp;</font><font size="1" style="font-size: 11px;">RDO Code</font></td>
                                                        <td id="rdoSelect" width="5"> 
                                                            <select class='iceSelOneMnu' id='frm2551m:txtRDOCode' name='frm2551m:txtRDOCode' size='1' disabled>
                                                            	<option value='{{$company->rdo_code}}'>{{$company->rdo_code}}</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>

                                            <td width="" valign="top" class="tblFormTd">
                                                <table width="556" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="15"><font size="2" style="font-weight:bold">&nbsp;8&nbsp;</font></td>
                                                        <td width="345">
                                                            <font size="1" style="font-size: 11px;">Line of Business / Occupation&nbsp;&nbsp;</font>
                                                            <font size="2" face="Arial">
                                                                <input type="text" value="{{$company->line_business}}"  size="30" name="frm2551m:txtLineOfBusiness" maxlength="25" id="frm2551m:txtLineOfBusiness" onblur="return capital(this, event)" disabled />
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
                                    <table width="900" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="" valign="top" class="tblFormTd">                                      <table width="709" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="567"><table width="561" border="0" cellpadding="0" cellspacing="0">
                                                                <tr>
                                                                    <td width="23"><font size="2" style="font-weight:bold;">&nbsp;9&nbsp;</font></td>
                                                                    <td width="538"><font size="1" style="font-size: 11px;">Taxpayer's Name (For Individual) Last Name, First Name, Middle Name/ (For Non-individual) Registered Name</font></td>
                                                                </tr>
                                                            </table></td>
                                                    </tr>
                                                    <tr>
                                                        <td><table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="23">&nbsp;</td>
                                                                    <td><input type="text" value="{{$company->registered_name}}"  size="50" name="frm2551m:txtTaxPayerName" maxlength="50" id="frm2551m:txtTaxPayerName" onblur="return capital(this, event)" disabled /></td>
                                                                </tr>
                                                            </table></td>
                                                    </tr>
                                                </table></td>
                                            <td width="" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="">
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="23"><font size="2" style="font-weight:bold;">&nbsp;10&nbsp;</font></td>
                                                                    <td width=""><font size="1" style="font-size: 11px;">Telephone Number</font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="25">&nbsp;</td>
                                                                    <td><input type="text" value="{{$company->tel_number}}"  size="20" name="frm2551m:txtTelNum" maxlength="15" id="frm2551m:txtTelNum" onkeypress="return wholenumber(this, event)" disabled /></td>
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
                                    <table width="900" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="723" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="325">
                                                            <table width="303" border="0" cellpadding="0" cellspacing="0">
                                                                <tr>
                                                                    <td width="22"><font size="2" style="font-weight:bold;">&nbsp;11&nbsp;</font></td>
                                                                    <td width="281"><font size="1" style="font-size: 11px;">Registered Address</font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="25">&nbsp;</td>
                                                                    <td><input type="text" value="{{$company->address}}"  size="50" name="frm2551m:txtAddress" maxlength="50" id="frm2551m:txtAddress" onblur="return capital(this, event)" disabled /></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="177" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="135">
                                                            <table width="129" border="0" cellpadding="0" cellspacing="0">
                                                                <tr>
                                                                    <td width="23"><font size="2" style="font-weight:bold;">&nbsp;12</font></td>
                                                                    <td width="106"><font size="1" style="font-size: 11px;">Zip Code</font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="25">&nbsp;</td>
                                                                    <td><input type="text" value="{{$company->zip_code}}"  size="8" name="frm2551m:txtZipCode" maxlength="8" id="frm2551m:txtZipCode" onkeypress="return wholenumber(this, event)" disabled /></td>
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
                                    <table width="900" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTdPart">
                                                <table width="" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td colspan="2"><font size="2" style="font-weight:bold;">&nbsp;13&nbsp;</font></td>
                                                        <td colspan="2"><font size="1" style="font-size: 11px;">Are you availing of tax relief under Special Law / International Tax Treaty?</font></td>
                                                        <td width="19"></td>
                                                        <td width="56"><input type="radio" value="Y" name="frm2551m:j_id217" id="frm2551m:j_id217:_1" onclick="clickTreaty();"/>
                                                            <label  style="font-size:12px;" >Yes</label>&nbsp;
                                                        </td>
                                                        <td width="42"><input type="radio" value="N"  name="frm2551m:j_id217" id="frm2551m:j_id217:_2" checked="checked" onclick="clickTreaty();"/>
                                                            <label   style="font-size:12px;" >No</label>
                                                        </td>
                                                        <td width="10"></td>
                                                        <td width="250"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">If yes, specify&nbsp;
                                                                <select                      
                                                                    id="frm2551m:txtTaxRelief25" name="frm2551m:txtTaxRelief25" size="1" disabled="disabled" >
                                                                    <option selected="selected" value="0"> </option>
                                                                    <option value="1">Special Rate</option>
                                                                    <option value="2">International Tax Treaty</option>
                                                                </select>
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
                                    <table width="900" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTd" valign="top">
                                                <table border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="250">&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;">Part II</font></td>
                                                        <td width="250" > <font size="2" style="font-weight:bold;letter-spacing: 3px;text-align:center">Computation of Tax</font></td>
                                                        <td> <a href="#" id="btnAddATCPartII" onclick="showPartIIATC(1)" style="font-size: 11px;">ATC</a> </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table border="0" width="870">
                                        <tr class="text-center">
                                            <td  width="37%"><font size="1" style="font-size: 11px;" >Taxable Transaction / Industry Classification</font></td>
                                            <td  width="3%"><font size="1" style="font-size: 11px;">ATC</font></td>
                                            <td  width="8%"><font size="1" style="font-size: 11px;">Taxable Amount</font></td>
                                            <td width="6%"><font size="1" style="font-size: 11px;">Tax Rate</font></td>
                                            <td width="9%"><font size="1" style="font-size: 11px;">Tax Due</font></td>
                                        </tr>
                                        <tr>

                                            <div style="overflow:auto">
                                                <table class="modalContent" id="tblListSelectedATC" width="740" border="0">
                                                </table>
                                            </div>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="900" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTd">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td></td>
                                                        <td>&nbsp;</td>
                                                        <td width="309"></td>
                                                        <td width="210"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="31">
                                                            <font size="2" style="font-weight:bold;">&nbsp;19</font>
                                                        </td>
                                                        <td width="349">
                                                            <font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">	Total Tax Due</font>
                                                        </td>
                                                        <td width="309">
                                                        </td>
                                                        <td width="210">
                                                            <span class="spacePadder">
                                                                <font size="2" style="font-weight:bold;">19</font>&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="20" name="frm2551m:txtTotalTaxDue" maxlength="25" id="frm2551m:txtTotalTaxDue"/>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;20&nbsp;</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Less: Tax Credits/Payments</font></td>
                                                        <td width="309"><span class="spacePadder"></span></td>
                                                        <td width="210"><span class="spacePadder">                                              </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td colspan="2"><font size="2" style="font-weight:bold;">20</font><font size="2" style="font-weight:bold;">A&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Creditable Percentage Tax Withheld Per BIR Form No. 2307 (See Schedule 1)</font></td>
                                                        <td width="210"><span class="spacePadder"><font size="2" style="font-weight:bold;">20A</font>&nbsp;&nbsp;
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="20" name="frm2551m:txt20A" maxlength="25" id="frm2551m:txt20A"  />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <font size="2" style="font-weight:bold;">&nbsp;&nbsp;</font>
                                                        </td>
                                                        <td colspan="2"> 
                                                            <font size="2" style="font-weight:bold;">20</font><font size="2" style="font-weight:bold;">B&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Tax Paid in Return Previously Filed, if this is an amended return</font>
                                                        </td>
                                                        <td width="210">
                                                            <span class="spacePadder"><font size="2" style="font-weight:bold;">20B</font>&nbsp;&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm2551m:txt20B" maxlength="25" id="frm2551m:txt20B" onblur="round(this,2);getRowInTable();" onkeypress="return numbersonly(this, event)" />
                                                            </span>
                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;21&nbsp;</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif"  style="font-size: 11px;">Total Tax Credit/Payments (Sum of Items 20A & 20B)</font></td>
                                                        <td width="309"></td>
                                                        <td width="210"><span class="spacePadder"><font size="2" style="font-weight:bold;">21</font>&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="20" name="frm2551m:txt21" maxlength="25" id="frm2551m:txt21"  />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;22&nbsp;</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">	Tax Payable (Overpayment) (Item 19 less Item 21)</font></td>
                                                        <td width="309"></td>
                                                        <td width="210"><span class="spacePadder"><font size="2" style="font-weight:bold;">22</font>&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="20" name="frm2551m:txt22" maxlength="25" id="frm2551m:txt22"  />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">
                                                            <table width="900">
                                                                <tr>
                                                                    <td width="26"><font size="2" style="font-weight:bold;">&nbsp;23&nbsp;</font></td>
                                                                    <td width="92" align="center"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">&nbsp;Add Penalties </font></td>
                                                                    <td align="center"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Surcharge</font></td>
                                                                    <td align="center"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Interest</font></td>
                                                                    <td align="center"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Compromise</font></td>
                                                                    <td align="center"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="26"><font size="2" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                                    <td width="92" align="center">&nbsp;</td>
                                                                    <td width="179"><span class="spacePadder"><font size="2" style="font-weight:bold;">23A</font>&nbsp;
                                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="15" name="frm2551m:txtSurcharge" maxlength="15" id="frm2551m:txtSurcharge" onblur="round(this,2);computePenalty()" onkeypress="return numbersonly(this, event)" />
                                                                        </span></td>
                                                                    <td width="181"><span class="spacePadder"><font size="2" style="font-weight:bold;">23B</font>&nbsp;
                                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="15" name="frm2551m:txtInterest" maxlength="15" id="frm2551m:txtInterest" onblur="round(this,2);computePenalty()" onkeypress="return numbersonly(this, event)" />
                                                                        </span></td>
                                                                    <td width="191"><span class="spacePadder"><font size="2" style="font-weight:bold;">23C</font>&nbsp;
                                                                            <input type="text" value="0.00" style="color: black; text-align: right;" size="15" name="frm2551m:txtCompromise" maxlength="15" id="frm2551m:txtCompromise" onblur="round(this,2);computePenalty()" onkeypress="return numbersonly(this, event)" />
                                                                        </span></td>
                                                                    <td width="202"><span class="spacePadder"><font size="2" style="font-weight:bold;">23D</font>&nbsp;
                                                                            <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="20" name="frm2551m:txt23D" maxlength="25" id="frm2551m:txt23D"  />
                                                                        </span></td>
                                                                </tr>
                                                          </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>&nbsp;</td>
                                                        <td width="309"></td>
                                                        <td width="210"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;24&nbsp;&nbsp;</font></td>
                                                        <td colspan="2"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total Amount Payable (Overpayment) (Sum of Items 22 and 23D)</font></td>
                                                        <td width="210">
                                                            <span class="spacePadder"><font size="2" style="font-weight:bold;">24</font>&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="20" name="frm2551m:txtTotalAmountPayable_24" maxlength="25" id="frm2551m:txtTotalAmountPayable_24"  />
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="31">&nbsp;</td>
                                                        <td colspan="3">
                                                            <font size="1" face="Arial, Helvetica, sans-serif"  style="font-size: 11px;">If Overpayment, mark one box only&nbsp;&nbsp;&nbsp;</font>
                                                            <input 
                                                                id="frm2551m:optToBeRefunded:_1" name="frm2551m:overPayment"
                                                                value="I"
                                                                type="radio"/>
                                                            <font size="1">
                                                                <label for="frm2551m:opt43:_1"  style="font-size: 11px;">To be Refunded&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                            </font>
                                                            <input id="frm2551m:optToBeIssued:_2" name="frm2551m:overPayment"
                                                                   value="C"
                                                                   type="radio"/>
                                                            <font size="1">
                                                                <label  for="frm2551m:opt43:_2"  style="font-size: 11px;">To be issued a Tax Credit Certificate</label>
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
                                    <table width="900" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTdPart">
                                                <table width="900" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="88">&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;"  style="font-size: 11px;">Schedule 1</font></td>
                                                        <td width="565">
                                                            <div align="center"><font size="2" style="font-weight:bold;letter-spacing: 3px;"  style="font-size: 11px;">Tax Withheld Claimed as Tax Credit</font></div>
                                                        </td>
                                                        <td width="88">&nbsp;</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="900" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTd">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td colspan="4">
                                                            <table width="100%" border="0">
                                                                <tr>
                                                                    <td width="10%">&nbsp;</td>
                                                                    <td width="18%"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Period Covered</font></td>
                                                                    <td width="25%"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Name of Withholding Agent</font></td>
                                                                    <td width="13%"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Income Payments</font></td>
                                                                    <td width="18%"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Tax Withheld</font></td>
                                                                    <td width="16%"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Applied</font></td>
                                                                </tr>
                                                            </table>
                                                            <table id="tblTaxWithheldClaimedAsTaxCredit" width="100%" border="0">

                                                            </table>
                                                            <table width="900">
                                                                <tr>
                                                                    <td width="26"></td>
                                                                    <td width="26">&nbsp;</td>
                                                                    <td width="497"></td>
                                                                    <td colspan="3"></td>
                                                                </tr>
                                                                <tr style="padding-bottom: 5px;">
                                                                    <td colspan="3">&nbsp;</td>
                                                                    <td colspan="3"align="right">
                                                                        <input id="frm2551m:btnAdd1" class="printButtonClass" name="frm2551m:btnAdd1" style="z-index: 2; width: 100px;" value="Add" onclick="addTblTaxWithheldClaimedAsTaxCredit();" type="button"/>&nbsp;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td>&nbsp;</td>
                                                                    <td width="497"><font size="1" face="Arial, Helvetica, sans-serif"  style="font-size: 11px;">Total Amount(to item 20A).................</font></td>
                                                                    <td width="85">&nbsp;</td>
                                                                    <td width="83">&nbsp;</td>
                                                                    <td align="center" width="155"><span class="spacePadder">
                                                                            <input type="text"  style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="13" name="frm2551m:txtTax15" maxlength="15" id="frm2551m:txtTotalAmount"  />
                                                                        </span>
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
									<div class="imgClass" align='center' style="display:none; width:900px !important;">
										<table  style="border-top: 3px solid black; border-collapse: collapse; font-family:arial; font-size:11px; text-align: center; table-layout: fixed; background-color: white;">
											<col width="33%" />
									  		<col width="19%" />
											<col width="19%" />
									  		<col width="29%" />
									  		<tr>
									  			<td colspan="4">I declare, under the penalties of perjury, that this return has been made in good faith, verified by me, and to the best of my knowledge, and belief,
								  					<br/>is true and correct, pursuant to the provisions of the National Internal Revenue Code, as amended, and the regulations issued under authority thereof.
								  					</td>
									  		</tr>
									  		<tr>
									  			<td colspan="3"><b>25</b>___________________________________________________________________________________
									  				&nbsp;&nbsp;&nbsp;&nbsp;
									  				<br/>President/Vice President/Principal Officer/Accredited Tax Agent/
								    				<br/>Authorized Representative/Taxpayer
								    				<br/>(Signature Over Printed Name)</td>
									  			<td><b>26</b>_____________________________
								    				<br/>Treasurer/Assistant Treasurer
								    				<br/>(Signature Over Printed Name)
								    				<br/>&nbsp;</td>
									  		</tr>
									  		<tr>
									  			<td>___________________________________________
							    					<br/>Title/Position of Signatory</td>
									  			<td colspan="2">___________________________________________
								    				<br/>TIN of Signatory</td>
							    				<td>______________________________
									    			<br/>Title/Position of Signatory</td>
									  		</tr>
									  		<tr>
									  			<td>___________________________________________
								    				<br/>Tax Agent Acc. No./Atty's Roll No.(if applicable)</td>
								    			<td>_______________
								    				<br/>Date of Issuance</td>
								    			<td>_______________
								    				<br/>Date of Expiry</td>
							    				<td>______________________________
									    			<br/>TIN of Signatory</td>
									  		</tr>
										</table>
									</div>
									<div class="imgClass" align='center' style="display:none; width:900px !important;">
										<img id="frm2551M:jurat" src="{{ asset('images/bottom_img/2551M_new.jpg') }}" width="900"/>
									</div>
									<div class="imgClass" align='center' style="display:none; width:900px !important;">
										<table style="font-size:10px; text-align: left; vertical-align: top;background-color: white;">
										  <tr>
										    <td>&nbsp;Machine Validation/Revenue Official Receipt Details (If not filed with an Authorized Agent Bank)<br/><br/><br/><br/><br/></td>
										  </tr>
										</table>
									</div>
                                    <table width="900" border="0" cellspacing="0" cellpadding="0" class="tblForm printButtonClass">
                                        <tr>
                                            <td class="tblFormTdPart">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <div align="center">
                                                                @if($action != 'view')
                                                                <input class="printButtonClass" type="button" value="Validate" style="width: 100px;" name="frm2551m:cmdValidate" id="frm2551m:cmdValidate" onclick="validate()" />
                                                                <input class="printButtonClass" type="button" value="Edit" style="width: 100px;" name="frm2551m:cmdEdit" id="frm2551m:cmdEdit" onclick="enableAll();"/>
                                                                <input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />
																<input class="printButtonClass" type="button" value="Save" style="width: 100px;" name="btnSave" id="btnSave" onclick="saveData();" />
																<input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
																<input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;" name="frm2551m:btnFinalCopy" id="frm2551m:btnFinalCopy" onclick="submitForm();" />
																@else
                                                                <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                                <input class="printButtonClass" type="button" value="Back" style="width: 100px;" onclick="gotoMain();" />
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

				<!-- Modal  -->
				<div id="modalAtc" class="aBox" style="z-index: 1;display:none; min-height:400px; position:relative; top:3%; left:0%; right:auto; overflow-y:auto; overflow-x:hidden; background:#fff;padding:10px;" >
                    <br/>
                    <br/>
                    <table border="1" align="center" style ="width:740; border-color: #666666">
                        <thead><tr>
                            <td align="center" class="modalHeader" colspan="3" class="tblTD">ATC</td>
                        </tr>
						<thead></thead>
						<tr class="modalColumnHeader">
							<td align="center" class="tblTD">Code</td>
                            <td align="center" class="tblTD">Description</td>
                            <td align="center" class="tblTD">Rate</td>
						</tr></thead>	
						
						<tbody id="tbllistAtcCode"><tr><td></td></tr></tbody>
                    </table>
					<br/>
					<div align="center">
                    <input type="button" name="btnOkPop" id="btnOkPop" style="width:120px; height:30px;" value="OK" onclick="getSelectedATC();showPartIIATC(2)"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
					</div>
                    <br />
                    <br />
                </div>
            </div>
        </div>
	
	<div id="hiddenEmail" style="display:none;"  > 
		<input id="txtEmail" value="{{$company->email_address}}" class="emailClass" name="txtEmail" type="text" onblur="" onkeypress="" maxlength="60"   />
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
	<div id="responseATC" style="display:none;"><!--loaded files render here--></div>		
	<div id="responseRdo" style="display:none;"><!--loaded files render here--></div>      

@endsection

@section('scripts')
<script type="text/javascript" >
	var isSubmitFinal = false;
	var isSubmit = false;
	
	var fileName = "";
	var existingXMLFileName = "";
	var gIsReadOnly = false; 
	var fileNameToExport = "";
	
    var totalTaxDueTOTAL;
	
	var atcList = new Array();
	var atcCount=0;
	
	var savedReturn = "";
	var p3Compromise = "";
	var p3Surcharge = "";
	var p3Interest = "";
	var p3IsAmended = "";
	var p3FilingDate = "";
	var p3ReturnPeriod = "";
	var p3ReturnPeriodEnd = "";
	var p3ReturnPeriodEndMonth = "";
	var p3ReturnPeriodEndYear = "";
	
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

	/*----------------------------------*/
    var d=document,XMLBGFile='',data='',XMLFile='', XMLATCFile='',msg = d.getElementById('msg'),flag=true,flag2=true;
	var loader=d.getElementById('loader');
	/*----------------------------------*/	
	
    var schedIArray = new Array();
	var globalEmail = "";
    str = setTimeout("sleeptime()", 300);
    function sleeptime()
    {
		loadXMLATC('/xml/atcCodes.xml');
        init();
			
		var xmlFileName = document.getElementById('file_name').value; 
		fileName = xmlFileName;

		if (fileName != null && fileName.indexOf('.xml') > -1) {
			var tin = fileName.split("/")[1].split("-");
			loadXML(fileName);
			
			existingXMLFileName = fileName;
			if (gIsReadOnly) { 
				window.setTimeout("disableAllElementIDs(); d.getElementById('btnUpload').disabled = false;",1000); 
			}
		} else {
			
		}
		if ( $('#printMenu').css('display') != 'none' ) {	
			$('#printMenu').hide('blind');
		}
        getWithHoldingTax();
		document.getElementById('frm2551m:txtTIN1').disabled = true; document.getElementById('frm2551m:txtTIN2').disabled = true; document.getElementById('frm2551m:txtTIN3').disabled = true; document.getElementById('frm2551m:txtBranchCode').disabled = true;
	   
        @if($action == 'view')
            disableAllElementIDs();
        @endif
	}
	
	function rdoPropertyJS(rdoCode, description) 
	{
	 this.rdoCode=rdoCode;
	 this.description=description;
	}
	 
	var rdoList = new Array();

    function init() {
	
		var month = new Date();
		var year3 = new Date();
		d.getElementById('frm2551m:YearEndedMonth').selectedIndex = month.getMonth() + 1;
		d.getElementById('frm2551m:txtYear').value = year3.getFullYear();
		
		d.getElementById('frm2551m:ReturnMonth').selectedIndex = month.getMonth();
		d.getElementById('frm2551m:txtNo3Year').value = year3.getFullYear();
	
        d.getElementById('frm2551m:ctypeCode_1').disabled = false;
        d.getElementById('frm2551m:ctypeCode_2').disabled = false;
  
        //Part II
        d.getElementById("frm2551m:txtTotalTaxDue").disabled = true;
        d.getElementById("frm2551m:txt20A").disabled = true;
        d.getElementById("frm2551m:txt20B").disabled = true;
        d.getElementById("frm2551m:txt21").disabled = true;
        d.getElementById("frm2551m:txt22").disabled = true;
        d.getElementById("frm2551m:txt23D").disabled = true;
        d.getElementById("frm2551m:txtTotalAmountPayable_24").disabled = true;
        d.getElementById("frm2551m:txtTotalAmount").disabled = true;

        d.getElementById("frm2551m:optToBeRefunded:_1").disabled = true;
        d.getElementById("frm2551m:optToBeIssued:_2").disabled = true;

        @if($action != 'view')
		d.getElementById("btnPrint").disabled = true;
        d.getElementById("frm2551m:cmdEdit").disabled = true;
		d.getElementById('frm2551m:btnFinalCopy').disabled = true;
        d.getElementById("btnUpload").disabled = true;
        @endif

		
    }
	
		function dateyear()
		{ var year3 = new Date();
		if (d.getElementById('frm2551M:optYrType:_1').checked)
		{
			d.getElementById('frm2551m:YearEndedMonth').selectedIndex = 12;
			d.getElementById('frm2551m:YearEndedMonth').disabled = true;
			d.getElementById('frm2551m:txtYear').value = year3.getFullYear();
		}
		else 
		{
			d.getElementById('frm2551m:YearEndedMonth').selectedIndex = 0;
			d.getElementById('frm2551m:YearEndedMonth').disabled = false;
			d.getElementById('frm2551m:txtYear').value = year3.getFullYear();
		}
	}
	function datemonth()
	{
		if (d.getElementById('frm2551M:optYrType:_1').checked == true && d.getElementById('frm2551m:YearEndedMonth').selectedIndex != 12)
		{
			alert('You have entered a filing year not ending in December. This filing will be considered as a Fiscal Year Filing.');
			d.getElementById('frm2551M:optYrType:_2').checked = true;
		}
		else if (d.getElementById('frm2551M:optYrType:_2').checked == true && d.getElementById('frm2551m:YearEndedMonth').selectedIndex == 12)
		{
			alert('You have entered a filing year ending in December. This filing will be considered as a Calendar Year Filing.');
			d.getElementById('frm2551M:optYrType:_1').checked = true;
		}
	}
	
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

			//Ensure that before writing to atcPropertyJS the formType 2551M is traceable in atcStr
			if (atcStr.indexOf('2551M') >= 0) {
			    var atcValues = atcStr.split('~');				
				
				var formType = "2551M";
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
				//alert('2551M successfully created array #'+i);
				
			} else {		
				//alert('2551M not found in array #'+i);
				continue;
			}
		}					
	}	
	
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

        /*-------------Find Instances of Dynamic Rows within the XML and add to modal-----------*/
		flag=false; //added param for loading - false
		var count=0;
		var responses = d.getElementById('response').getElementsByTagName('div');
		var sPar = 'txtTaxableAmount';
			
		do {
			if (responses.item(count).innerHTML.indexOf(sPar) != -1) {
				var temp = String(responses.item(count).innerHTML);
				temp = temp.substring(0,sPar.length+1); //substring to length of search param for index - check files
				temp = temp.substring(sPar.length,sPar.length+1); //get the last character for checking
				if ( !isNaN(temp) ) showPartIIATC(1); //if last char is a number, add modal section
			} count++;
		} while (count!=responses.length);
		window.setTimeout("loadData();",100);
		window.setTimeout("getSelectedATC();showPartIIATC(2);loadDataATCRow();flag=true;",100);				
				
		flag=false; //added param for loading - false
		var count2=0;
		var responses2 = d.getElementById('response').getElementsByTagName('div');
		var sPar2 = 'frm2551m:txtPeriodCovered';
			            
		do {
			if (responses2.item(count2).innerHTML.indexOf(sPar2) != -1) {
				var temp = String(responses2.item(count2).innerHTML);				
				temp = temp.substring(0,sPar2.length+1); //substring to length of search param for index - check files
				temp = temp.substring(sPar2.length,sPar2.length+1); //get the last character for checking
				if ( !isNaN(temp) ) {						
					addTblTaxWithheldClaimedAsTaxCreditReload(temp); //if last char is a number
					window.setTimeout("loadData();",100);
					window.setTimeout("loadDataRow();",100);			
				}	
			} count2++;
		} while (count2!=responses2.length);                      
                
        if (response.innerHTML.indexOf("All Rights Reserved BIR 2012.0") >= 0) {
            gIsReadOnly = true;
        }
	}
	
	function loadDataRow() {
		/*This will load data onto fields*/
		var response = d.getElementById("response");		
        var elem = document.getElementById('frmMain').elements;
        for(var i = 0; i < elem.length; i++) {
			
			if (elem[i].type != 'hidden' && elem[i].type != 'undefined') { 
				if (elem[i].type == 'text' || elem[i].type == 'select-one') {
					var fieldVal = String( $("#response").html() ).split(elem[i].id+'=');
					elem[i].value = ''; 
					//elem[i].selectedIndex = 0;
					if(elem[i].id == 'frm2551m:txtTaxPayerName' || elem[i].id == 'frm2551m:txtLineOfBusiness' || elem[i].id == 'frm2551m:txtAddress'){
						elem[i].value = unescape(fieldVal[1]);
					}
					else{

						elem[i].value = fieldVal[1]; //all select-one and text values
						 		
					}
				}	
				if (elem[i].type == 'checkbox') {
					var chkboxVal = String( $("#response").html() ).split(elem[i].id+'=');				
					if (chkboxVal[1] == 'true') {
						elem[i].checked = chkboxVal[1];
					}					
				}				
			}
        }
		
	}		
	
	function loadDataATCRow() {
		/*This will load data onto fields*/
		var response = d.getElementById("response");		
        var elem = document.getElementById('frmMain').elements;
        for(var i = 0; i < elem.length; i++) {
			
			if (elem[i].type != 'hidden' && elem[i].type != 'undefined') { 
				if (elem[i].type == 'text' || elem[i].type == 'select-one') {
					var fieldVal = String( $("#response").html() ).split(elem[i].id+'=');
					elem[i].value = ''; elem[i].selectedIndex = 0;
					if(elem[i].id == 'frm2551m:txtTaxPayerName' || elem[i].id == 'frm2551m:txtLineOfBusiness' || elem[i].id == 'frm2551m:txtAddress'){
						elem[i].value = unescape(fieldVal[1]);
					}
					else{
						elem[i].value = fieldVal[1]; //all select-one and text values		 		
					}
				}				
			}
        }
		document.getElementById('txtEmail').value = globalEmail;
	}	
	
	function loadData() {
		/*This will load data onto fields*/
		var response = d.getElementById("response");

        var elem = document.getElementById('frmMain').elements;
        for(var i = 0; i < elem.length; i++)
        {
			try{
				if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {	//elem[i].type != 'button' &&  			
					if (elem[i].type == 'text' || elem[i].type == 'select-one') {
						var fieldVal = String( $("#response").html() ).split(elem[i].id+'='); 
						if(elem[i].id == 'frm2551m:txtTaxPayerName' || elem[i].id == 'frm2551m:txtLineOfBusiness' || elem[i].id == 'frm2551m:txtAddress'){
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
				//alert('exception thrown : e : '+e.description);
			}

        } 			
	}
	
	function isItAnAmendedReturn(xmlFile) {	
			if(d.getElementById('frm2551m:ctypeCode_1').checked) {
				return true;
			} else {
				return false;
			}		
	}
	
	function setInputTextControl_HorizontalAlignment(id,align) {
		if (d.getElementById(id) != null) {
			d.getElementById(id).textIndent = parseInt(align);
		}
	}
	function setInputTextControl_NumberFormatter(id,limit,deci) {
		if (d.getElementById(id) != null) {
			d.getElementById(id).size = parseInt(limit);
			d.getElementById(id).value = parseFloat(d.getElementById(id).value).toFixed( parseInt(deci) );		
		}
	}	

    var ATCnameCode = new Array() ;
    var NaturePayment = new Array() ;
    var taxRate = new Array();
    var atc;
    var i = 0;
    var j = 0;

    function getWithHoldingTax() {
        //var atcSize = atcList.getSize();
		var atcSize = atcList.length;
		
        for(i = 0; i < atcSize; i++) {
            //atc = atcList.get(i);
			atc = atcList[i];
			
            if(atc.formType == "2551M") {
                ATCnameCode[j] = atc.atcCode;
                NaturePayment[j] = atc.description;
                taxRate[j] = atc.rate;
                j++;
            }
        }
        var i;
        $('#tbllistAtcCode').html("");
		
        for(i = 0 ; i < ATCnameCode.length; i++) {
            $('#tbllistAtcCode').html(  d.getElementById('tbllistAtcCode').innerHTML +
                "<tr class='atc'><td class='tblTD2' class='atc' style='font-size:11px;' nowrap> <input id='AtcCode"+(i+1)+"' name='AtcCode"+(i+1)+"' type='checkbox'  value='"+ATCnameCode[i]+"' /> "+ATCnameCode[i]+ " </td><td class='tblTD2 atc atcNames' style='font-size:11px;' id='AtcNaturePayment"+(i+1)+"'>"+ NaturePayment[i]+ "</td><td class='tblTD2 atc' id='txtRate"+(i+1)+"'> "+taxRate[i]+ "</td> </tr>");
        }
    }

    function validate(){
		if(!d.getElementById('frm2551M:optYrType:_1').checked && !d.getElementById('frm2551M:optYrType:_2').checked)
		{
			alert("Please choose an option on Item 1.")
			return;
		}
        var dt = new Date();
        var year = parseInt(d.getElementById("frm2551m:txtYear").value);
        if(d.getElementById("frm2551m:txtYear").value.length ==0){
            alert("Please enter valid year ended.");
            return;
        }else if(year < 1900 || year > (dt.getYear() + 1901)){
            alert("Please enter valid year ended.");
            return;
        }
        if( d.getElementById("frm2551m:txtNo3Year").value == "" ){
            alert("Please enter valid year in item 3."); return;
        }
		
		if(d.getElementById('frm2551M:optYrType:_1').checked && d.getElementById('frm2551m:txtYear').value != d.getElementById('frm2551m:txtNo3Year').value)
		{
			alert("Please enter a valid date on Item 3.");
			return;
		}
		
		var dtTest = new Date((d.getElementById("frm2551m:txtYear").value), (d.getElementById("frm2551m:YearEndedMonth").value), 1, 0, 0, 0, 0);
		var comparator = new Date((d.getElementById("frm2551m:txtYear").value), (d.getElementById("frm2551m:YearEndedMonth").value), 1, 0, 0, 0, 0);
		comparator.setMonth(comparator.getMonth()-11)
		var dtTest2 = new Date((d.getElementById("frm2551m:txtNo3Year").value), (d.getElementById("frm2551m:ReturnMonth").value), 1, 0, 0, 0, 0);
		if(dtTest < dtTest2 || comparator > dtTest2)
		{
			alert("Please enter a valid date on Item 3.");
			return;
		}

        if( (d.getElementById('frm2551m:txtTIN1').value == "" || d.getElementById('frm2551m:txtTIN2').value == "" || d.getElementById('frm2551m:txtTIN3').value == "" || d.getElementById('frm2551m:txtBranchCode').value == "")  )
        {
            alert("Please enter a valid TIN number on Item 6.");
            return;
        }		
       		
        if( (d.getElementById('frm2551m:txtLineOfBusiness').value == "")  )
        {
            alert("Please enter a valid Line of Business on Item 8.");
            return;
        }			
		if( (d.getElementById('frm2551m:txtTaxPayerName').value == "")  )
        {
            alert("Please enter a valid Taxpayer Name on Item 9.");
            return;
        }	
		if( (d.getElementById('frm2551m:txtTelNum').value == "")  )
        {
            alert("Please enter Telephone Number on Item 10.");
            return;
        }
		if( (d.getElementById('frm2551m:txtAddress').value == "")  )
        {
            alert("Please enter Taxpayer's Registered Address on Item 11.");
            return;
        }	
		if( (d.getElementById('frm2551m:txtZipCode').value == "")  )
        {
            alert("Please enter Zip Code on Item 12.");
            return;
        }
		if(d.getElementById("tblListSelectedATC").rows.length == 0 || $('#tblListSelectedATC').html() == ""){
            alert("Please enter at least one row for Taxable Transaction/Industry Classification under Computation of Tax.");
            return;
        }
		if(checkIfBlank()!= -1){
            return;
        }
        if((d.getElementById("frm2551m:txtTotalAmountPayable_24").value * 1) < 0 && d.getElementById('frm2551m:optToBeRefunded:_1').checked == false && d.getElementById('frm2551m:optToBeIssued:_2').checked == false){
            alert("Please select To be Refunded or To be issued a Tax Credit Certificate, since item 24 Total Amount Payable is less than zero.");
            return;
        }

       
        disableAll();
        getArrayinSchedI();

        alert("Validation successful. Click on Edit if you wish to modify your entries.");
		return;
    }

    var tempATC = new Array();
    var tempATCTaxbase = new Array();
    function showPartIIATC(s)
    {
		if(s == 1) {
				tempATC = new Array();
				tempATCTaxbase = new Array();		
				for(var i = 0; i < d.getElementById('tblListSelectedATC').rows.length; i++) {
					tempATC[i] = d.getElementById('ATCnameCode'+ (i + 1)).innerHTML;
					tempATCTaxbase[i] = d.getElementById('txtTaxableAmount'+(i +1)).value;
				   
				}
				d.getElementById('formPaper').style.display = "none";
				$('#modalAtc').show('blind');
				
			} else {
				
					 d.getElementById('formPaper').style.display = 'block';
					 if ( $('#modalAtc').css('display') != 'none' ) {
						$('#modalAtc').hide('blind');		
					 }
			}
    }

    function getSelectedATC(){
        var len = d.getElementById("tbllistAtcCode");
        var i = 1;
		$('#tblListSelectedATC').html("");
		
        for(var x = 0; x < len.rows.length; x++){
            if(d.getElementById("AtcCode" + (x+1)).checked == true){

                var taxbasetemp = "";
                for(var tempCount = 0 ; tempCount < tempATC.length; tempCount++) {
                    if(tempATC[tempCount] == d.getElementById('AtcCode'+(x+1)).value){
                        taxbasetemp = tempATCTaxbase[tempCount];
                        break;
                    }
                }
				$('#tblListSelectedATC').html(  d.getElementById('tblListSelectedATC').innerHTML +	
                    "<tr>\n\<td width='53%' align='left' style='font-size:xx-small' id='atcSelectedNaturePayment"+i+"'>"+ NaturePayment[x]+ " <input type='hidden' name='atcSelectedNaturePayment[]' value='"+ NaturePayment[x]+ "'/> </td>\n\<td width='3%' align='left' style='font-size:xx-small' id='ATCnameCode"+i+"'>"+ATCnameCode[x]+ " <input type='hidden' name='ATCnameCode[]' value='"+ ATCnameCode[x]+ "'/> </td>\n\<td width='9%' align='left' style='font-size:xx-small' id='taxableAmount"+i+"'><input style='font-size:9px; text-align: right' size='20' type='text' id='txtTaxableAmount" + i + "' name='txtTaxableAmount[]' onkeypress='return numbersonly(this, event)' onblur='round(this,2);computeTaxDue(" + i + ");getRowInTable();' value='"+ taxbasetemp +"'></td>\n\<td width='6%' align='left' style='font-size:xx-small' id='selectedRate"+i+"'><input style='background-color: rgb(220, 220, 220); font-size:9px; text-align: right' size='5' type='text' value='" + taxRate[x] + "' id='txtTaxRate" + i + "' name='txtTaxRate[]' disabled ></td>\n\<td width='9%' align='left' style='font-size:xx-small' id='taxDue"+i+"'><input style='background-color: rgb(220, 220, 220); font-size:9px; text-align: right' size='20' type='text' id='txtTaxDue" + i + "' name='txtTaxDue[]' value='0.00' disabled ></td>\n\</tr>");
		
				computeTaxDue(i);
                i++;
            }
        }
    }
    
    function blockletter(e)
    {
        var number = parseFloat(e.value).toFixed(2);
        if(isNaN(number))
        {
            var zero = 0;
            e.value = parseFloat(zero).toFixed(2);
            //e.value = "";
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
	function computePenalty()
	{
		d.getElementById('frm2551m:txt23D').value = formatCurrency(NumWithComma(d.getElementById('frm2551m:txtSurcharge').value)*1 + NumWithComma(d.getElementById('frm2551m:txtInterest').value)*1 + NumWithComma(d.getElementById('frm2551m:txtCompromise').value)*1);
		d.getElementById('frm2551m:txtTotalAmountPayable_24').value = formatCurrency(NumWithComma(d.getElementById('frm2551m:txt23D').value)*1 + NumWithComma(d.getElementById('frm2551m:txt22').value)*1);
	}
    function computeTaxDue(a){
        var taxRate = d.getElementById('txtTaxRate'+a);
        var taxableAmount = d.getElementById('txtTaxableAmount'+a);
        var taxDue = d.getElementById('txtTaxDue' + a);
        taxDue.value = parseFloat(NumWithComma(taxableAmount.value == '' ? '0' : taxableAmount.value)).toFixed(2) * (parseFloat(taxRate.value).toFixed(2)/100);
      
        if(isNaN(taxDue.value)) {
            document.getElementById('txtTaxDue' + a).setAttribute('value',"0.00");
        } else {
            d.getElementById('txtTaxDue' + a).value = formatCurrency(taxDue.value);
        }
        
        var totalTaxDue = 0;
        for(var i = 1; i <= tblListSelectedATC.rows.length; i++) {
            totalTaxDue = (totalTaxDue*1 +  NumWithComma(d.getElementById('txtTaxDue' + i).value)*1);
        }
        d.getElementById('frm2551m:txtTotalTaxDue').value = formatCurrency(totalTaxDue);

        d.getElementById('frm2551m:txt22').value = (d.getElementById('frm2551m:txtTotalTaxDue').value *1);
        d.getElementById('frm2551m:txtTotalAmountPayable_24').value = formatCurrency(NumWithComma(d.getElementById('frm2551m:txt23D').value)*1 + NumWithComma(d.getElementById('frm2551m:txt22').value)*1);
		computePenalty();
    }

    var counter = 0;

    function addTblTaxWithheldClaimedAsTaxCreditReload(index){

        addRowReload(sched1Reload(index));
        getArrayinSchedI();
    }	
	
    function addTblTaxWithheldClaimedAsTaxCredit(){
        var sched1Table = d.getElementById('tblTaxWithheldClaimedAsTaxCredit');
        addRow(sched1Table, sched1());

        getArrayinSchedI();
    }
	
    function addRowReload(text) {	
	
		$('#tblTaxWithheldClaimedAsTaxCredit').append(text);			
    }	

    function addRow(tbody, text) {
		$('#tblTaxWithheldClaimedAsTaxCredit').append(text);			
    }
	
    function sched1Reload(index){
        var data = "";

        data =
            "<tr><td width='10%' id='tdchk2551M:" + index + "'><input style='font-size:11px' type='button' id='chk2551M:" + index + "' value='Delete' onclick='deleteRow(this);refresh();'/></td>" +
            "<td width='18%' id='tdtxtPeriodCovered:" + index + "'><input style='font-size:11px' type='text' name='frm2551m:txtPeriodCovered[]' id='frm2551m:txtPeriodCovered" + index + "' maxlength='10'/></td>" +
            "<td width='25%' id='tdtxtNameOfWithAgent:" + index + "'><input style='font-size:11px' size ='20' type='text' name='frm2551m:txtNameOfWithAgent[]' id='frm2551m:txtNameOfWithAgent" + index + "' maxlength='55'/></td> " +
            "<td width='13%' id='tdtxtIncomePayments:" + index + "'><input style='font-size:11px; text-align: right' type='text' size='9' value='0.00' name='frm2551m:txtIncomePayments[]' id='frm2551m:txtIncomePayments" + index + "' onblur = 'round(this,2)' onkeypress='return numbersonly(this, event)' /></td>" +
            "<td width='18%' id='tdtxtTaxWithheld:" + index + "'><input style='font-size:11px; text-align: right' type='text' size='14' value='0.00' name='frm2551m:txtTaxWithheld[]' id='frm2551m:txtTaxWithheld" + index + "' onblur = 'round(this,2)' onkeypress='return numbersonly(this, event)' /></td>" +
            "<td width='16%' id='tdtxtApplied:" + index + "'><input style='font-size:11px; text-align: right' type='text'  size='14' value='0.00' name='frm2551m:txtApplied[]' id='frm2551m:txtApplied" + index + "' onblur = 'getRowInTable(); round(this,2)' onkeypress='return numbersonly(this, event)' /></td></tr>";

        waitstr = setTimeout("TaxCreditAlignment()",100);
        return data;
    }	

    function sched1(){
        var data = "";

        data =
            "<tr><td width='10%' id='tdchk2551M:" + counter + "'><input style='font-size:11px' type='button' id='chk2551M:" + counter + "' value='Delete' onclick='deleteRow(this);refresh();'/></td>" +
            "<td width='18%' id='tdtxtPeriodCovered:" + counter + "'><input style='font-size:11px' type='text' id='frm2551m:txtPeriodCovered" + counter + "' name='frm2551m:txtPeriodCovered[]' maxlength='10'/></td>" +
            "<td width='25%' id='tdtxtNameOfWithAgent:" + counter + "'><input style='font-size:11px' size ='20' type='text' onblur='return capital(this, event)' name='frm2551m:txtNameOfWithAgent[]' id='frm2551m:txtNameOfWithAgent" + counter + "' maxlength='55'/></td> " +
            "<td width='13%' id='tdtxtIncomePayments:" + counter + "'><input style='font-size:11px; text-align: right' type='text' size='9' value='0.00' name='frm2551m:txtIncomePayments[]' id='frm2551m:txtIncomePayments" + counter + "' onblur = 'round(this,2)' onkeypress='return numbersonly(this, event)' /></td>" +
            "<td width='18%' id='tdtxtTaxWithheld:" + counter + "'><input style='font-size:11px; text-align: right' type='text' size='14' value='0.00' name='frm2551m:txtTaxWithheld[]' id='frm2551m:txtTaxWithheld" + counter + "' onblur = 'round(this,2)' onkeypress='return numbersonly(this, event)' /></td>" +
            "<td width='16%' id='tdtxtApplied:" + counter + "'><input style='font-size:11px; text-align: right' type='text'  size='14' value='0.00' name='frm2551m:txtApplied[]' id='frm2551m:txtApplied" + counter + "' onblur = 'getRowInTable(); round(this,2)' onkeypress='return numbersonly(this, event)' /></td></tr>";

        waitstr = setTimeout("TaxCreditAlignment()",100);
        counter++;
        return data;
    }

    function TaxCreditAlignment()
    {
        var len = d.getElementById("tblTaxWithheldClaimedAsTaxCredit");
        for(var x = 0; x < len.rows.length;x++){
            var myrow = len.rows[x].childNodes[1].getAttribute("id").split(":");
            setInputTextControl_HorizontalAlignment("frm2551m:txtIncomePayments"+myrow[1], 4);
            setInputTextControl_HorizontalAlignment("frm2551m:txtTaxWithheld"+myrow[1], 4);
            setInputTextControl_HorizontalAlignment("frm2551m:txtApplied"+myrow[1], 4);
        }
    }
    
    function refresh(){
        d.getElementById('frm2551m:txt22').value = (totalTaxDueTOTAL*1).toFixed(2);
        d.getElementById('frm2551m:txtTotalAmountPayable_24').value = (totalTaxDueTOTAL*1).toFixed(2);
        d.getElementById('frm2551m:txt20A').value = (0).toFixed(2);
        d.getElementById('frm2551m:txt21').value = (0).toFixed(2);
        d.getElementById('frm2551m:txtTotalAmount').value = (0).toFixed(2);
        getRowInTable();
    }

    function deleteRow(r)
    {
        var i=r.parentNode.parentNode.rowIndex;
        d.getElementById('tblTaxWithheldClaimedAsTaxCredit').deleteRow(i);

        getArrayinSchedI();
    }

    var  myrow;
    function getRowInTable(){
        var  total = 0;
        var len = d.getElementById("tblTaxWithheldClaimedAsTaxCredit");
        var ss;
        for(var x = 0;x<len.rows.length;x++){
            var myrow = len.rows[x].childNodes[1].getAttribute("id").split(":");

            var e = NumWithComma(d.getElementById("frm2551m:txtApplied" + myrow[1]).value);

            total = (total*1 + e*1);

        }
		d.getElementById('frm2551m:txt20A').value = formatCurrency(total*1);
		d.getElementById('frm2551m:txt21').value = formatCurrency(NumWithComma(d.getElementById('frm2551m:txt20A').value)*1 + NumWithComma(d.getElementById('frm2551m:txt20B').value)*1);
        ss =  (NumWithComma(d.getElementById('frm2551m:txtTotalTaxDue').value) * 1 - (NumWithComma(d.getElementById('frm2551m:txt21').value)*1));

        d.getElementById('frm2551m:txtTotalAmount').value = formatCurrency(total*1);

        d.getElementById('frm2551m:txtTotalAmountPayable_24').value = formatCurrency(ss * 1);
        d.getElementById('frm2551m:txt22').value = formatCurrency(ss * 1);
		computePenalty();

        if((NumWithComma(d.getElementById("frm2551m:txtTotalAmountPayable_24").value) * 1) < 0 ){
            
            d.getElementById("frm2551m:optToBeRefunded:_1").disabled = false;
            d.getElementById("frm2551m:optToBeIssued:_2").disabled = false;
        } else {
            d.getElementById("frm2551m:optToBeRefunded:_1").disabled = true;
            d.getElementById("frm2551m:optToBeIssued:_2").disabled = true;
			d.getElementById("frm2551m:optToBeRefunded:_1").checked = false;
            d.getElementById("frm2551m:optToBeIssued:_2").checked = false;
        }
        
    }
	
    function checkIfBlank(){

        var len = d.getElementById("tblTaxWithheldClaimedAsTaxCredit");
        for(var x = 0;x<len.rows.length;x++){
            var myrow = len.rows[x].childNodes[1].getAttribute("id").split(":");
            if( d.getElementById('frm2551m:txtPeriodCovered' + myrow[1]).value == "" ||  d.getElementById('frm2551m:txtNameOfWithAgent'  + myrow[1]).value == "" ||
                d.getElementById('frm2551m:txtIncomePayments' + myrow[1]).value == "" ||  d.getElementById('frm2551m:txtTaxWithheld'  + myrow[1]).value == ""){
                alert("Please enter valid values Tax Withheld Claimed or delete the row if not applicable.");
                return x +1;
            }

            strmmddyyy = d.getElementById('frm2551m:txtPeriodCovered' + myrow[1]).value;
            if(strmmddyyy != "")
            {
                var result = strmmddyyy.split("/")
                if(result.length == 3 )
                {
                    if(isNaN(result[0]))
                    {   alert("Invalid date entry on Schedule 1, column 2 Record "+(x+1)+".Format is mm/dd/yyyy.");
						return;
                    }else{
                        // numeric check if greater not than 31 - Month.
                        if(result[0] > 12 || result[0] < 0)
                        {
                            alert("Invalid date entry on Schedule 1, column 2 Record "+(x+1)+".");
							return;
                        }
                    }
                    if(isNaN(result[1]))
                    {
                        alert("Invalid date entry on Schedule 1, column 2 Record "+(x+1)+".Format is mm/dd/yyyy.");
						return;
                    }else{
                        // numeric check if Date.
                        if(result[1] > 31 || result[1] < 1)
                        {
                            alert("Invalid date entry on Schedule 1, column 2 Record "+(x+1)+".");
							return;
                        }
                    }
                    if(isNaN(result[2]))
                    {
                        alert("Invalid date entry on Schedule 1, column 2 Record "+(x+1)+".Format is mm/dd/yyyy.");
						return;
                    }else{
                        
						var dtTest = new Date((d.getElementById("frm2551m:txtYear").value), (d.getElementById("frm2551m:YearEndedMonth").value), 1, 0, 0, 0, 0);
						var comparator = new Date((d.getElementById("frm2551m:txtYear").value), (d.getElementById("frm2551m:YearEndedMonth").value), 1, 0, 0, 0, 0);
						comparator.setMonth(comparator.getMonth()-12)
						// var dtTest2 = new Date((d.getElementById("frm2551m:txtPeriodCovered").value), (d.getElementById("frm2551m:ReturnMonth").value), 1, 0, 0, 0, 0);
						var dtTest2 = new Date(strmmddyyy);
						if(dtTest.valueOf() < dtTest2.valueOf() || comparator.valueOf() > dtTest2.valueOf())
						{
							alert("Please enter a valid date on Schedule 1, Record "+(x+1)+".");
							return;
						}
                    }
                }else
                {
                    alert("Invalid date entry on Schedule 1, column 2 Record "+(x+1)+".Format is mm/dd/yyyy.");
					return;
                }
            }
        }
        return -1;
    }

	var disableElem = true;
	var enableElem = false;
    function disableAll(){
        d.getElementById("frm2551m:txtYear").disabled = true;
        d.getElementById("frm2551m:YearEndedMonth").disabled = true;
        d.getElementById("frm2551m:ReturnMonth").disabled = true;
        d.getElementById("frm2551m:txtNo3Year").disabled = true;
        d.getElementById("btnAddATCPartII").disabled = true;
        d.getElementById("frm2551m:j_id217:_1").disabled = true;
        d.getElementById("frm2551m:j_id217:_2").disabled = true;
		d.getElementById("frm2551m:ctypeCode_1").disabled = true;
		d.getElementById("frm2551m:ctypeCode_2").disabled = true;
		d.getElementById("frm2551m:txtSheets").disabled = true;
		d.getElementById("frm2551m:txtTIN1").disabled = true;
		d.getElementById("frm2551m:txtTIN2").disabled = true;
		d.getElementById("frm2551m:txtTIN3").disabled = true;
		d.getElementById("frm2551m:txtBranchCode").disabled = true;
		d.getElementById("frm2551m:txtRDOCode").disabled = true;
		d.getElementById("frm2551m:txtLineOfBusiness").disabled = true;
		d.getElementById("frm2551m:txtTaxPayerName").disabled = true;
		d.getElementById("frm2551m:txtTelNum").disabled = true;
		d.getElementById("frm2551m:txtAddress").disabled = true;
		d.getElementById("frm2551m:txtZipCode").disabled = true;
        if(d.getElementById('frm2551m:j_id217:_1').checked == true )
        {
            d.getElementById("frm2551m:txtTaxRelief25").disabled = true;
        }
        d.getElementById("frm2551m:btnAdd1").disabled = true;
        var rowSize = d.getElementById('tblListSelectedATC').rows.length;
        for(var i = 1; i <= rowSize; i++)
        {
            d.getElementById('txtTaxableAmount'+i).disabled = true;
        }
        if((d.getElementById("frm2551m:txtTotalAmountPayable_24").value * 1) < 0 )
        {
            d.getElementById("frm2551m:optToBeRefunded:_1").disabled = true;
            d.getElementById("frm2551m:optToBeIssued:_2").disabled = true;
        }
        var len = d.getElementById("tblTaxWithheldClaimedAsTaxCredit");
        for(var x = 0; x < len.rows.length;x++){
            var myrow = len.rows[x].childNodes[1].getAttribute("id").split(":");
            d.getElementById('frm2551m:txtPeriodCovered' + myrow[1]).disabled = true;
            d.getElementById('frm2551m:txtNameOfWithAgent' + myrow[1]).disabled = true;
            d.getElementById('frm2551m:txtIncomePayments' + myrow[1]).disabled = true;
            d.getElementById('frm2551m:txtTaxWithheld' + myrow[1]).disabled = true;
            d.getElementById('frm2551m:txtApplied' + myrow[1]).disabled = true;
            d.getElementById('chk2551M:' + myrow[1]).disabled = true;
        }
        d.getElementById('frm2551m:txt20B').disabled = true;
        
        d.getElementById("frm2551m:cmdValidate").disabled = true;
		d.getElementById("btnPrint").disabled = false;
        d.getElementById("frm2551m:cmdEdit").disabled = false;
		d.getElementById('frm2551m:btnFinalCopy').disabled = false;
        d.getElementById("btnUpload").disabled = false;
        disableElem;
		enableElem;

    }

    function enableAll(){
        d.getElementById("frm2551m:txtYear").disabled = false;
        d.getElementById("frm2551m:YearEndedMonth").disabled = false;
        d.getElementById("frm2551m:ReturnMonth").disabled = false;
        d.getElementById("frm2551m:txtNo3Year").disabled = false;
        d.getElementById("btnAddATCPartII").disabled = false;
		d.getElementById("frm2551m:ctypeCode_1").disabled = false;
		d.getElementById("frm2551m:ctypeCode_2").disabled = false;
		d.getElementById("frm2551m:txtSheets").disabled = false;
		d.getElementById("frm2551m:txtTIN1").disabled = false;
		d.getElementById("frm2551m:txtTIN2").disabled = false;
		d.getElementById("frm2551m:txtTIN3").disabled = false;
		d.getElementById("frm2551m:txtBranchCode").disabled = false;
		d.getElementById("frm2551m:txtRDOCode").disabled = false;
		d.getElementById("frm2551m:txtLineOfBusiness").disabled = false;
		d.getElementById("frm2551m:txtTaxPayerName").disabled = false;
		d.getElementById("frm2551m:txtTelNum").disabled = false;
		d.getElementById("frm2551m:txtAddress").disabled = false;
		d.getElementById("frm2551m:txtZipCode").disabled = false;
        
        if(d.getElementById('frm2551m:j_id217:_1').checked == true )
        {
            d.getElementById("frm2551m:txtTaxRelief25").disabled = false;
        }
        d.getElementById("frm2551m:j_id217:_1").disabled = false;
        d.getElementById("frm2551m:j_id217:_2").disabled = false;

        d.getElementById("frm2551m:btnAdd1").disabled = false;
        var rowSize = d.getElementById('tblListSelectedATC').rows.length;
        for(var i = 1; i <= rowSize; i++)
        {
            d.getElementById('txtTaxableAmount'+i).disabled = false;
        }
        if((d.getElementById("frm2551m:txtTotalAmountPayable_24").value * 1) < 0 )
        {
            d.getElementById("frm2551m:optToBeRefunded:_1").disabled = false;
            d.getElementById("frm2551m:optToBeIssued:_2").disabled = false;
        }
        var len = d.getElementById("tblTaxWithheldClaimedAsTaxCredit");
        for(var x = 0; x < len.rows.length;x++){
            var myrow = len.rows[x].childNodes[1].getAttribute("id").split(":");
            d.getElementById('frm2551m:txtPeriodCovered' + myrow[1]).disabled = false;
            d.getElementById('frm2551m:txtNameOfWithAgent' + myrow[1]).disabled = false;
            d.getElementById('frm2551m:txtIncomePayments' + myrow[1]).disabled = false;
            d.getElementById('frm2551m:txtTaxWithheld' + myrow[1]).disabled = false;
            d.getElementById('frm2551m:txtApplied' + myrow[1]).disabled = false;
            d.getElementById('chk2551M:' + myrow[1]).disabled = false;
        }
        d.getElementById("frm2551m:cmdValidate").disabled = false;
		d.getElementById("btnPrint").disabled = true;
        d.getElementById("frm2551m:cmdEdit").disabled = true;
		d.getElementById('frm2551m:btnFinalCopy').disabled = true;
        d.getElementById("btnUpload").disabled = true;

        updateAmended();
		if (qs('xmlFileName') != null && qs('xmlFileName').indexOf('.xml') > -1) {
			d.getElementById('frm2551M:optYrType:_1').disabled = true;
			d.getElementById('frm2551M:optYrType:_2').disabled = true;
			d.getElementById('frm2551m:YearEndedMonth').disabled = true;
			d.getElementById('frm2551m:txtYear').disabled = true;
			d.getElementById('frm2551m:ReturnMonth').disabled = true;
			d.getElementById('frm2551m:txtNo3Year').disabled = true;
		}
		disableElem;
		enableElem;
		document.getElementById('frm2551m:txtTIN1').disabled = true; document.getElementById('frm2551m:txtTIN2').disabled = true; document.getElementById('frm2551m:txtTIN3').disabled = true; document.getElementById('frm2551m:txtBranchCode').disabled = true;
    }
	

    function clickTreaty(){
        if(d.getElementById("frm2551m:j_id217:_1").checked == true){
            d.getElementById("frm2551m:txtTaxRelief25").disabled = false;
        }else{
            d.getElementById("frm2551m:txtTaxRelief25").disabled = true;
			
        }
    }
    
    function getArrayinSchedI()
    {
        var len = d.getElementById("tblTaxWithheldClaimedAsTaxCredit");
        schedIArray = new Array(len.rows.length);
        for(var x = 0; x < len.rows.length;x++){
            var myrow = len.rows[x].childNodes[1].getAttribute("id").split(":");
            schedIArray[x] = myrow[1];
        }
    }

    function updateAmended() {
        if(d.getElementById('frm2551m:ctypeCode_1').checked) {
            d.getElementById('frm2551m:txt20B').disabled = false;
        } else if(d.getElementById('frm2551m:ctypeCode_2').checked) {
            d.getElementById('frm2551m:txt20B').disabled = true;
			d.getElementById('frm2551m:txt20B').value = "0.00";
			getRowInTable();
        }
    }
	
	function initialValidateBeforeSave() {
		if( (d.getElementById('frm2551m:txtTIN1').value == "" || d.getElementById('frm2551m:txtTIN2').value == "" || d.getElementById('frm2551m:txtTIN3').value == "" || d.getElementById('frm2551m:txtBranchCode').value == "")  )
        {
            alert("Please enter a valid TIN number on Item 6.");
            return false;
		}
		
		if( (d.getElementById('frm2551m:txtTaxPayerName').value == "")  )
        {
            alert("Please enter a valid Taxpayer Name on Item 9.");
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

		$('#bg').hide();
		$('.printSignFooterClass').css({ 'width':'900px','margin':'auto','margin-top':'15px','display':'block','position':'relative','overflow':'visible','page-break-before':'always' });	
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
					document.getElementById(elem[i].id).readOnly = true;
					document.getElementById(elem[i].id).style.backgroundColor = '#FFFFFF';
					document.getElementById(elem[i].id).style.color = '#000000';
				}				
				if (elem[i].type == 'radio' || elem[i].type == 'checkbox') { 
					if (document.getElementById(elem[i].id).disabled) {
						disabledItems[x] = elem[i].id;
						x++;
					}
					document.getElementById(elem[i].id).disabled = true;
				}	
				if(elem[i].type == 'select-one'){
					$( elem[i] ).hide();
					var label = "<div class='labels'>".concat(elem[i].options[elem[i].selectedIndex].innerHTML).concat("&nbsp;</div>");
					$( elem[i] ).after(label);
				}
			}
	    }	
		$('.printButtonClass').hide();
        $("#formPaper").show();
        window.print();

        $('.printButtonClass').show();
        $("#formPaper").show();
        $('#formPaper').css({'border':'#a7a7a7 1px solid' });
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
            
                var data = form.serialize();
                save('2551M',data);
                
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
        saveAndExit('2551M',data);
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

        submitAndSave('2551M', data, company_id);
        
        disabled.attr('disabled','disabled');
        return false;
    }

    function gotoMain(){
        var company_id = $('#frmMain').find('input[name="company"]').val();
        window.location = '/companies/'+ company_id +'/histories/2551M';
    } 
</script>
@endsection
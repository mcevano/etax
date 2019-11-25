@extends('layouts.app')
@section('title', '| BIR Form No. 1601FQ')
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
        <button type="button" class="btn btn-danger btn-exit" id="1601FQ" company='{{$company->id}}'>No</button>
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
        <button type="button" class="btn btn-success btn-exit" id="1601FQ" company='{{$company->id}}'>Okay</button>
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
            <button type="button" class="btn btn-danger btn-filing-success" form='1601FQ' company='{{$company->id}}'>Okay</button>
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
            <div id="wrapper" style="margin: 0 auto; position: relative; width: 880px; ">			
				<table border="0" width="806" cellspacing="0" cellpadding="0" align="center" style=" background-repeat: repeat-x;">
				<tr><td>
                <div id="formPaper">
                    <div id="Page1Content">
                        <table width="806" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td>
									<table width="800" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td width="300" valign="bottom">
												<p><img src="{{ asset('images/bcs_new.png') }}" width="80" /> </p>
											</td>
											<td>
												<img src="{{ asset('images/header_logo.png') }}" width="210" height="50px" />
											</td>
										</tr>
									</table>
								</td>
							</tr>
                            <tr>
                                <td>
                                    <table width="800" border="1" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td width="120" valign="middle" style="text-align: center;">
                                                <font face="Arial" size="1px">BIR Form No.</font>
												<br/><font size="5px" style="font-weight:bold;">1601-FQ</font>
												<br/><font face="Arial" size="1px">January 2018</font>
												<br/><font face="Arial" size="1px" style="font-weight:bold;">Page 1</font>
                                            </td>
                                            <td width="0" valign="center" style="text-align: center;">
                                                <font size="5px" style="font-weight:bold;">Quarterly Remittance Return</font>
												<br/><font size="4px" style="font-weight:bold;">of Final Income Taxes Withheld</font>
												<br><label face="Arial" size="1px">Enter all required information in CAPITAL LETTERS using BLACK ink. Mark all applicable boxes with an "X". Two copies MUST be filed with the BIR and one held by the Taxpayer.</label>
                                            </td>
                                            <td width="200" valign="center">
													<p><img src="{{ asset('images/Bar Codes/1601FQ_p1.png') }}" width="220" height="75px" /> </p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="120" valign="top" class="tblFormTd">
                                                <table width="100" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="23"><font size="2" style="font-weight:bold;">&nbsp;1&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td colspan="3"><font size="1" style="font-size: 11px;">For the Year</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td width="92" align="left"> <input type="text" value="" size="4" name="frm1601FQ:txtYear" maxlength="4" id="frm1601FQ:txtYear" style="width:61px" onblur="blockletterWithout2Decimal(this)" onkeypress="return wholenumber(this, event)" /></td>
                                                    </tr>
                                                </table>
                                            </td>
											<td width="190" valign="top" class="tblFormTd" style="height:20px">
                                                <table width="188" border="0" cellspacing="0" cellpadding="0" style="height=20px">
                                                    <tr>
                                                        <td width="24"><font size="2" style="font-weight: bold;">&nbsp;&nbsp;2&nbsp;&nbsp;</font></td>
                                                        <td width="146"><font size="1" style="font-size: 11px;">Quarter</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <!--<fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm1601FQ:j_id217">-->
                                                            <div align="center" style="padding: 0px 0 0px 0;">
                                                                <table cellspacing="0" cellpadding="0" border="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td align="center">
                                                                                <input type="radio" value="1" name="frm1601FQ:OptQuarter" id="frm1601FQ:OptQuarter1" onclick="" />
                                                                                <label for="frm1601FQ:OptQuarter1" style="font-size: 11px;">1st</label>
																				&nbsp;&nbsp;
																			</td>
                                                                            <td align="center">
                                                                                <input type="radio" value="2" name="frm1601FQ:OptQuarter" id="frm1601FQ:OptQuarter2" onclick="" />
                                                                                <label for="frm1601FQ:OptQuarter2" style="font-size: 11px;">2nd</label>
																				&nbsp;&nbsp;
																			</td>
                                                                            <td align="center">
                                                                                <input type="radio" value="3" name="frm1601FQ:OptQuarter" id="frm1601FQ:OptQuarter3" onclick="" />
                                                                                <label for="frm1601FQ:OptQuarter3" style="font-size: 11px;">3rd</label>
																				&nbsp;&nbsp;
																			</td>
                                                                            <td align="center">
                                                                                <input type="radio" value="4" name="frm1601FQ:OptQuarter" id="frm1601FQ:OptQuarter4" onclick="" />
                                                                                <label for="frm1601FQ:OptQuarter4" style="font-size: 11px;">4th</label>
																				&nbsp;&nbsp;
																			</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <!-- </fieldset>-->
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="160" valign="top" class="tblFormTd">
                                                <table width="146" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;3&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" style="font-size: 11px;">Amended Return?</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm1601FQ:j_id217" class="iceSelOneRb-dis fieldText1-dis">
                                                                <div align="center" style="padding: 1px 0 1px 0;">
                                                                    <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb-dis fieldText1-dis">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td><input type="radio" value="Y" name="frm1601FQ:AmendedRtn" id="frm1601FQ:AmendedRtn_1" onclick="d.getElementById('frm1601FQ:txtTax25').disabled = false;" /><label for="frm1601FQ:AmendedRtn_1" style="font-size:12px;" >Yes</label>&nbsp;&nbsp;&nbsp;</td>
                                                                                <td><input type="radio" value="N"  name="frm1601FQ:AmendedRtn" id="frm1601FQ:AmendedRtn_2" onclick="d.getElementById('frm1601FQ:txtTax25').disabled = true;computeofTotalWithheldTax()" checked="checked" /><label for="frm1601FQ:AmendedRtn_2" style="font-size:12px;" >No</label></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </fieldset>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="170" valign="top" class="tblFormTd">
                                                <table width="152" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;4&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" style="font-size: 11px;">Any Taxes Withheld?</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
														<td>
                                                            <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;" id="frm1601FQ:j_id252" class="iceSelOneRb fieldText1">
                                                                <div align="center" style="padding: 1px 0 1px 0;">
                                                                    <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb fieldText1">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td><input type="radio" value="Y" name="frm1601FQ:TaxWithheld" id="frm1601FQ:TaxWithheld_1"  /><label for="frm1601FQ:j_id252:_1" style="font-size:12px;" >Yes</label>&nbsp;&nbsp;&nbsp;</td>
                                                                                <td><input type="radio" value="N" name="frm1601FQ:TaxWithheld" id="frm1601FQ:TaxWithheld_2"  onclick="cancelAllCompute()" /><label for="frm1601FQ:j_id252:_2" style="font-size:12px;" >No</label></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </fieldset>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="160" valign="top" class="tblFormTd">
                                                <table width="140" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;5&nbsp;&nbsp;&nbsp;</font></td>
														
														<td><font size="1" style="font-size: 11px;">No. of Sheet/s Attached</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td><input type="text" value="0" style="text-align: right;" size="4" name="frm1601FQ:txtSheets" maxlength="2" id="frm1601FQ:txtSheets" class="iceInpTxt-dis" onkeypress="return wholenumber(this, event)" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTdPart">
                                                <table width="799" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="100%">
                                                            <div align="center"><font size="2" style="font-weight:bold;">Part I - Background Information</font></div>
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
                                    <table width = "800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="550" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold">&nbsp;6&nbsp;</font></td>
                                                        <td>
                                                            <font size="1" style="font-size: 11px;">Taxpayer Identification Number (TIN)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
                                                            <font size="2" face="Arial">
                                                                <input type="text" value="{{$company->tin1}}" size="3" name="frm1601FQ:txtTIN1" maxlength="3" id="frm1601FQ:txtTIN1" onkeypress="return wholenumber(this, event)" disabled="true" />
                                                                <input type="text" value="{{$company->tin2}}" size="3" name="frm1601FQ:txtTIN2" maxlength="3" id="frm1601FQ:txtTIN2" onkeypress="return wholenumber(this, event)" disabled="true" />
                                                                <input type="text" value="{{$company->tin3}}" size="3" name="frm1601FQ:txtTIN3" maxlength="3" id="frm1601FQ:txtTIN3" onkeypress="return wholenumber(this, event)" disabled="true" />
                                                                <input type="text" value="{{$company->tin4}}" size="3" name="frm1601FQ:txtBranchCode" maxlength="3" id="frm1601FQ:txtBranchCode" onkeypress="return letternumber(event)" disabled="true" />
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="150" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="80"><font size="2" style="font-weight:bold">&nbsp;7&nbsp;</font><font size="1" style="font-size: 11px;">RDO Code&nbsp;</font></td>
                                                        <td id="rdoSelect">
                                                            <select class='iceSelOneMnu' id='frm1601FQ:txtRDOCode' name='frm1601FQ:txtRDOCode' size='1' disabled ='true' >
                                                            	<option value='{{$company->rdo_code}}'>{{$company->rdo_code}}</option>
                                                            </select>
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
                                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="80%" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;8&nbsp;</font></td>
                                                                    <td><font size="1" style="font-size: 11px;">Withholding Agent's Name <i>(Last Name, First Name, Middle Name for Individuals OR Registered Name for Non-Individual)</i></font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="25">&nbsp;</td>
                                                                    <td><input type="text" value="{{$company->registered_name}}" size="120" name="frm1601FQ:txtTaxpayerName" maxlength="50" id="frm1601FQ:txtTaxpayerName" onblur="return capital(this, event)" disabled="true" /></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
											</td>
											<!--former position of contact number -->
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="80%" valign="top" class="tblFormTd" colspan="2">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;9&nbsp;</font></td>
                                                                    <td><font size="1" style="font-size: 11px;"><b>Registered Address </b><i style="font-size: 11px;">(Indicate complete address. If branch, indicate the branch address. If the registered address is different from the current address, go to the RDO to update registered address by using BIR Form No. 1905)</i></font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="25">&nbsp;</td>
                                                                    <td><input type="text" value="{{$company->address}}" size="120" name="frm1601FQ:txtAddress" maxlength="100" id="frm1601FQ:txtAddress" onblur="return capital(this, event)" disabled="true" /></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
											</td>
										</tr>
										<tr>
											<td width="580" valign="top" class="tblFormTd">
												<table border="0" cellspacing="0" cellpadding="0">
													<tr>
															<td width="25">&nbsp;</td>
														<td>
																<input type="text" value="" size="100" name="frm1601FQ:txtAddress2" maxlength="50" id="frm1601FQ:txtAddress2" onblur="return capital(this, event)" disabled="true" />
														</td>
													</tr>
												</table>
											</td>
                                            <td width="140" class="tblFormTd">
                                                <table border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td>
															<font size="2" style="font-weight:bold;">&nbsp;9A&nbsp;</font><font size="1" style="font-size: 11px;">Zip
																Code</font>
														</td>
                                                        <td>
                                                            <div align="center">
                                                                <input type="text" value="{{$company->zip_code}}" size="2" name="frm1601FQ:txtZipCode" maxlength="12" id="frm1601FQ:txtZipCode" onkeypress="return wholenumber(this, event)" disabled="true" />
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
									<table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
										<td width="40%" class="tblFormTd">
											<table width="320" border="0" cellpadding="0" cellspacing="0">
												<tr>
													<td width="110">
														<font size="2" style="font-weight:bold;">&nbsp;10&nbsp;</font><font size="1" style="font-size: 11px;">Contact
															Number</font></td>
													<td>
														<div align="left">
															<input type="text" value="{{$company->tel_number}}" size="29" name="frm1601FQ:txtTelNum" maxlength="20" id="frm1601FQ:txtTelNum" onkeypress="return wholenumber(this, event)" disabled="true" />
														</div>
													</td>
												</tr>
											</table>
										</td>
										<td width="60%" class="tblFormTd">
											<table width="400" border="0" cellpadding="0" cellspacing="0">
												<tr>
													<td width="200">
														<font size="2" style="font-weight:bold;">&nbsp;11&nbsp;</font><font size="1" style="font-size: 11px;">Category
															of Withholding Agent</font>
													</td>
													<td>
														<div align="left">
															<fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; width:180px;" id="frm1601FQ:j_id392" class="iceSelOneRb fieldText1">
																<div align="center" style="padding: 5px 0 5px 0;">
																	<table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb fieldText1">
																		<tbody>
																			<tr>
																				<td><input type="radio" value="P" name="frm1601FQ:CatAgent" id="frm1601FQ:CatAgent_P" onclick="changedrpATCList(this)" /><label for="frm1601FQ:CatAgent_1" style="font-size:11px;" >Private</label>&nbsp;&nbsp;&nbsp;</td>
																				<td><input type="radio" value="G" name="frm1601FQ:CatAgent" id="frm1601FQ:CatAgent_G" onclick="changedrpATCList(this)" /><label for="frm1601FQ:CatAgent_2" style="font-size:11px;" >Government</label></td>
																			</tr>
																		</tbody>
																	</table>
																</div>
															</fieldset>
														</div>
													</td>
												</tr>
											</table>
										</td>
									</table>
								</td>
							</tr>
							<tr>
								<td>
									<table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
										 <td class="tblFormTd">
											<table border="0" cellspacing="0" cellpadding="0">
												<tr>
													 <td width="11"><font size="2" style="font-weight:bold;">&nbsp;12&nbsp;</font></td>
													 <td><font size="1" style="font-size: 11px;">Email Address</font></td>
													 <td width="17">&nbsp;</td>
													 <td><input type="text" value="{{$company->email_address}}" size="104" name="txtEmail" maxlength="60" id="txtEmail" disabled="true" /></td>
												</tr>
											</table>
										 </td>
									</table>
								</td>
							</tr>
                            <tr>
                                <td>
                                    <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="800">
                                        <tr>
                                            <td class="tblFormTd" valign="top" width="750">
                                                <table width="750" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="300"><font size="2" style="font-weight:bold;">&nbsp;13&nbsp;</font><font size="1" style="font-size: 11px;">Are there payees availing of tax relief under <br> Special Law or International Tax Treaty?</font>
														</td>
                                                        <td width="150">
                                                            <div>
                                                                <fieldset style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; width:150px" id="frm1601FQ:j_id398" class="iceSelOneRb-dis fieldText1-dis">
                                                                    <div align="center" style="padding: 5px 0 5px 0;">
                                                                        <table cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb-dis fieldText1-dis">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td><input type="radio" value="Y" name="frm1601FQ:SpecialTax" id="frm1601FQ:SpecialTax_1"  onclick="enableSelTreaty()" /><label for="frm1601FQ:SpecialTax_1" style="font-size:12px;" >Yes</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                                    <td><input type="radio" value="N" name="frm1601FQ:SpecialTax" id="frm1601FQ:SpecialTax_2"  onclick="confirmDisableTreaty()" checked="checked" /><label for="frm1601FQ:SpecialTax_2" style="font-size:12px;" >No</label></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </fieldset>
															</div>
														</td>
														<td width="25">&nbsp;</td>
														<td width="300">
															<font size="2" style="font-weight:bold;">&nbsp;13A&nbsp;</font>
                                                            <label id="frm1601FQ:j_id401" class="iceOutLbl fieldLabel1" style="font-size: 11px;">If yes, specify</label>
                                                            <select style="font-family: Verdana,Arial,Helvetica; font-size: 8pt; background-color: rgb(220, 220, 220);" size="1" name="frm1601FQ:drpSpecialTax" id="frm1601FQ:drpSpecialTax" disabled="disabled">
                                                                <option value="0" selected="selected"> </option>
                                                                <option value="1">Special Rate</option>
                                                                <option value="2">International Tax Treaty</option>
                                                                <option value="3">Both</option>
                                                            </select>
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
                                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTdPart">
                                                <table width="800" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="">
                                                            <div align="center">
																<font size="2" style="font-weight:bold;">Part II -Computation
																of Tax </font><font size="1" style="font-size: 11px;"> (attach additional sheet/s, if necessary) </font>
															</div>
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <!-- add - by lovell -->
                            <tr>
                                <td>
                                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td valign="top" class="tblFormTd">
                                                <table id="tblPartIIComputeTax" style="margin-left:5px;"  border="0" cellpadding="0" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
															<td width="5%">&nbsp;</td>
															<td width="10%"><div align="center"><a href="#" id="btnAddATCPartII" onclick="showPartIIATC()" style="font-size: 11px;">ATC </a> </div></td>
                                                            <td width="30%"><div align="center"><font size="1" style="font-weight:bold;font-size: 11px;">TAX BASE</font><font size="1"><i style="font-size: 11px;"> (Consolidated for the Quarter)</i></font></div></td>
                                                            <td width="15%"><div align="center"><font size="1" style="font-weight:bold;font-size: 11px;">TAX RATE</font></div></td>
                                                            <td width="30%"><div align="center"><font size="1" style="font-weight:bold;font-size: 11px;">TAX WITHHELD </font><br/><font size="1"><i style="font-size: 11px;"> (Consolidated for the Quarter)</i></font></div></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbodyComputeTax" class="text-center"> 
                                                    </tbody>
                                                    <tfoot id="tfootComputeTax">
                                                        <tr>
                                                            <td colspan="5">
                                                                <div id="lblOtherTax" style="visibility: hidden" >
																	<table width="800" border="0" cellspacing="0" cellpadding="0">
																		<tr>
																			<td width="623"><label><font size="1" style="font-weight:bold;"><a href="#" id="btnOtherTax" onClick="showOtherSelectedTax()" style="font-size: 11px;">Other Selected ATC</a></font></label></td>
																			<td><input type="text" id="frm1601FQ:txtTotalOtherTax" name="frm1601FQ:txtTotalOtherTax" style="text-align:right; width:12em !important" disabled/></td>
																		</tr>
																	</table>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTd">
                                                <table width="740" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="26"><font size="2" style="font-weight:bold;">&nbsp;20&nbsp;&nbsp;</font></td>
                                                        <td width="426"><font size="1">&nbsp;</font><font size="2"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Taxes Withheld for the Quarter </font><font size="1" face="Arial, Helvetica, sans-serif">based on Regular Rates (Sum of items 14 to 19)</font></td>
                                                        <td width="94">
                                                            <div class="spacePadder">                                                    </div>
                                                        </td>
                                                        <td width="193">
															<span class="spacePadder">
																<font size="2" style="font-weight:bold;">20</font>&nbsp;&nbsp;&nbsp;
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220);color: black; text-align: right;" size="20" name="frm1601FQ:txtTax20" maxlength="25" id="frm1601FQ:txtTax20" disabled="true"  />
															</span>
														</td>
													</tr>
													<tr>
														<td><font size="2" style="font-weight:bold;">&nbsp;21&nbsp;</font></td>
														<td><font size="1">&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Taxes Withheld for the Quarter Based on Tax Treaty Rates </font>
															<a href="#" id="btnAddSchedI" onclick="showAddSchedI()"><font size="1" face="Arial, Helvetica, sans-serif">(from Part IV - Schedule 1)<!--<input type="button" class="printButtonClass" id="btnAddSchedI" value="Schedule 1" onclick="showAddSchedI();" />--></font></a>  </td>
														<td>
															<div class="spacePadder">                                                    </div>
														</td>
														<td>
															<span class="spacePadder">
																<font size="2" style="font-weight:bold;">21</font>&nbsp;&nbsp;&nbsp;
																<input type="text" value="0.00" style="background-color: rgb(220, 220, 220);color: black; text-align: right;" size="20" name="frm1601FQ:txtTax21" maxlength="25" id="frm1601FQ:txtTax21" disabled="true"  />
															</span>
														</td>
													</tr>
													<tr>
														<td><font size="2" style="font-weight:bold;">&nbsp;22&nbsp;&nbsp;</font></td>
														<td><font size="2"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total Taxes Withheld for the Quarter (Sum of Items 20 and 21)</font></td>
														<td>
															<div class="spacePadder">                                                    </div>
														</td>
														<td>
															<span class="spacePadder">
																<font size="2" style="font-weight:bold;">22</font>&nbsp;&nbsp;&nbsp;
																<input type="text" value="0.00" style="background-color: rgb(220, 220, 220);color: black; text-align: right;" size="20" name="frm1601FQ:txtTax22" maxlength="25" id="frm1601FQ:txtTax22" disabled="true"  />
															</span>
														</td>
													</tr>
													<tr>
														<td><font size="2" style="font-weight:bold;">&nbsp;23&nbsp;</font></td>
														<td>
															<table width="400">
																<tr>
																	<td width="50"><font size="1" face="Arial" style="font-size: 11px;">Less : </font></td>
																	<td width="100"><font size="1" face="Arial" style="font-size: 11px;">Remittances Made: </font></td>
																	<td><font size="1" face="Arial" style="font-size: 11px;">1st month of the Quarter</font></td>
																</tr>
															</table>
														</td>
														<td>&nbsp;</td>
														<td>
															<span class="spacePadder">
																<font size="2" style="font-weight:bold;">23</font>&nbsp;&nbsp;&nbsp;
																<input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeofTotalWithheldTax()" id="frm1601FQ:txtTax23" name="frm1601FQ:txtTax23" />
															</span>
														</td>
													</tr>
													<tr>
														<td><font size="2" style="font-weight:bold;">&nbsp;24&nbsp;</font></td>
														<td>
															<table width="400">
																<tr>
																	<td width="10">&nbsp;</td>
																	<td width="100"><font size="1" face="Arial">&nbsp; </font></td>
																	<td><font size="1" face="Arial" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2nd month of the Quarter</font></td>
																</tr>
															</table>
														</td>
														<td>&nbsp;</td>
														<td>
																<span class="spacePadder">
																<font size="2" style="font-weight:bold;">24</font>&nbsp;&nbsp;&nbsp;
																<input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeofTotalWithheldTax()" id="frm1601FQ:txtTax24" name="frm1601FQ:txtTax24" />
															</span>
														</td>
													</tr>
													<tr>
														<td><font size="2" style="font-weight:bold;">&nbsp;25&nbsp;</font></td>
														<td><font size="1">&nbsp;</font><font size="1" face="Arial" style="font-size: 11px;">Tax Remitted in Return Previously Filed, if this is an amended return</font></td>
														<td>&nbsp;</td>
														<td>
															<span class="spacePadder">
																<font size="2" style="font-weight:bold;">25</font>&nbsp;&nbsp;&nbsp;
																<input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeofTotalWithheldTax()" id="frm1601FQ:txtTax25" name="frm1601FQ:txtTax25" disabled="true" />
															</span>
														</td>
													</tr>
													<tr>
														<td><font size="2" style="font-weight:bold;">&nbsp;26&nbsp;</font></td>
														<td><font size="1">&nbsp;</font><font size="1" face="Arial" style="font-size: 11px;">Total Remittances made (Sum of items 23 to 25)</font></td>
														<td>&nbsp;</td>
														<td>
															<span class="spacePadder">
																<font size="2" style="font-weight:bold;">26</font>&nbsp;&nbsp;&nbsp;
																<input type="text" value="0.00" style="text-align: right;" size="20" maxlength="25" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computeofTotalWithheldTax()" id="frm1601FQ:txtTax26" name="frm1601FQ:txtTax26" disabled="true" />
															</span>
														</td>
													</tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;27&nbsp;</font></td>
                                                        <td><font size="1">&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Tax Still Due (Over-remittance) (Item 22 less item 26)</font></td>
                                                        <td>&nbsp;</td>
                                                        <td>
															<span class="spacePadder">
																<font size="2" style="font-weight:bold;">27</font>&nbsp;&nbsp;&nbsp;
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20"  maxlength="25" id="frm1601FQ:txtTax27" name="frm1601FQ:txtTax27" disabled="true" />
															</span>
														</td>
													</tr>
													<tr>
														<td>&nbsp;</td>
														<td>
															<table width="400" border="0" cellspacing="0" cellpadding="0">
																<tr>
																	<td width="100">
																		<font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Add: Penalties </font>
																	</td>
																	<td>
																		<font size="2" style="font-weight:bold;">&nbsp;28&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;"> Surcharge</font>
																	</td>
																</tr>
															</table>
														</td>
														<td>&nbsp;</td>
														<td>
															<span class="spacePadder">
																<font size="2" style="font-weight:bold;">28</font>&nbsp;&nbsp;&nbsp;
																<input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm1601FQ:txtTax28" maxlength="25" id="frm1601FQ:txtTax28" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computePenalties()" />
															</span>
														</td>
													</tr>
													<tr>
														<!--<td><font size="2" style="font-weight:bold;">&nbsp;25&nbsp;</font></td>-->
														<td>&nbsp;</td>
														<td>
															<table width="400" border="0" cellspacing="0" cellpadding="0">
																<tr>
																	<td width="100">&nbsp;</td>
																	<td>
																		<font size="2" style="font-weight:bold;">&nbsp;29&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Interest</font>
																	</td>
																</tr>
															</table>
														</td>
														<td>&nbsp;</td>
														<td>
															<span class="spacePadder">
																<font size="2" style="font-weight:bold;">29</font>&nbsp;&nbsp;&nbsp;
																<input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm1601FQ:txtTax29" maxlength="25" id="frm1601FQ:txtTax29" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computePenalties()" />
															</span>
														</td>
													</tr>
													<tr>
														<!--<td><font size="2" style="font-weight:bold;">&nbsp;25&nbsp;</font></td>-->
														<td>&nbsp;</td>
														<td>
															<table width="400" border="0" cellspacing="0" cellpadding="0">
																<tr>
																	<td width="100">&nbsp;</td>
																	<td>
																		<font size="2" style="font-weight:bold;">&nbsp;30&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Compromise</font>
																	</td>
																</tr>
															</table>
														</td>
														<td>&nbsp;</td>
														<td>
															<span class="spacePadder">
																<font size="2" style="font-weight:bold;">30</font>&nbsp;&nbsp;&nbsp;
																<input type="text" value="0.00" style="color: black; text-align: right;" size="20" name="frm1601FQ:txtTax30" maxlength="25" id="frm1601FQ:txtTax30" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computePenalties()" />
															</span>
														</td>
													</tr>
													<tr>
														<!--<td><font size="2" style="font-weight:bold;">&nbsp;25&nbsp;</font></td>-->
														<td>&nbsp;</td>
														<td>
															<table width="400" border="0" cellspacing="0" cellpadding="0">
																<tr>
																	<td width="100">&nbsp;</td>
																	<td>
																		<font size="2" style="font-weight:bold;">&nbsp;31&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total Penalties (Sum of Items 28 to 30)</font>
																	</td>
																</tr>
															</table>
														</td>
														<td>&nbsp;</td>
														<td>
															<span class="spacePadder">
																<font size="2" style="font-weight:bold;">31</font>&nbsp;&nbsp;&nbsp;
																<input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" maxlength="25" id="frm1601FQ:txtTax31" name="frm1601FQ:txtTax31" disabled="true" />
															</span>
														</td>
													</tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;32&nbsp;</font></td>
                                                        <td colspan="2"><font size="1">&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-weight:bold;">TOTAL AMOUNT STILL DUE</font><font size="1" face="Arial">/ (Over-remittance) (Sum of Items 27 and 31)</font></td>
                                                        <td>
                                                            <div class="spacePadder">
                                                                <font size="2" style="font-weight:bold;">32</font>&nbsp;&nbsp;&nbsp;
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" maxlength="25" id="frm1601FQ:txtTax32" name="frm1601FQ:txtTax32" disabled="true" class="iceInpTxt-dis" />
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
									<table width="800" border="1" cellspacing="0" cellpadding="0" style="font-family:arial; font-size:10px; text-align: center; vertical-align: top; table-layout: fixed;">
									  <col width="25%" />
									  <col width="25%" />
									  <col width="25%" />
									  <col width="25%" />
									  <tr>
										<td colspan="4" style="text-align: left; ">&nbsp;&nbsp;&nbsp;&nbsp;I/We declare, under the penalties of perjury that this remittance return, and all its attachments, have been made in good faith, verified by me/us, and to the best of my/our knowledge and belief, is 
											true and correct, pursuant to the provisions of the National Internal Revenue Code, as amended, and the regulations issued under authority thereof. Further, I/we give my/our consent to the processing of my/our information as contemplated under the *Data Privacy Act of 2012 (R.A. No. 10173) for legitimate and lawful purposes. <i>(If Authorized Representative, attach authorization letter)</i><br></td>
									  </tr>
									  <tr>
									    <td colspan="2" style="text-align: left; ">For Individual:
											<br><br><br><br>
										</td>
									    <td colspan="2" style="text-align: left; ">For Non-Individual:
											<br><br><br><br></td>
									  </tr>
									  <tr>
										<td colspan="2">Signature over Printed Name of Taxpayer/Authorized Representative/Tax Agent<br>
											(Indicate Title/Designation and TIN)</td>
										<td colspan="2">Signature over Printed Name of President/Vice President/ <br>
											Authorized Officer or Representative/Tax Agent (Indicate Title/Designation and TIN)</td>
									  </tr>
									  <tr>
									    <td colspan="2">
											<table border="0" cellspacing="0" cellpadding="0">
												<tr>
													<td>
														Tax Agent Accreditation No./ <br>
														Attorney's Roll No. (If applicable)
													</td>
													<td>
														<input type="text" value="" id="txtTaxAgentNo" size="25" maxlength="20" disabled="true" >
													</td>
												</tr>
											</table>
										</td>
									    <td>
											<table border="0" cellspacing="0" cellpadding="0">
												<tr>
													<td>
														Date of Issue <br>
														(MM/DD/YYYY)
													</td>
													<td>
														<input type="text" value="" id="txtDateIssue" style="width: 135px;" maxlength="10" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="validateDate(this);" disabled="true" >
													</td>
												</tr>
											</table>
										</td>
									    <td>
											<table border="0" cellspacing="0" cellpadding="0">
												<tr>
													<td>
														Date of Expiry <br>
														(MM/DD/YYYY)
													</td>
													<td>
														<input type="text" value="" id="txtDateExpiry" style="width: 135px;" maxlength="10" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="validateDate(this);" disabled="true" />
													</td>
												</tr>
											</table>
										</td>
									  </tr>
									</table>
									<!--</div>-->
								</td>
							</tr>
							<tr>
								<td>
									<table width="800" border="1" cellspacing="0" cellpadding="0" class="tblForm">
										<tr>
											<td class="tblFormTdPart">
												<table width="799" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td width="100%">
															<div align="center"><font size="2" style="font-weight:bold;">Part III -Details of Payment</font></div>
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
									<table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
										<tr>
											<td valign="top" class="tblFormTd">
												<table border="1" cellpadding="0" cellspacing="0" width="100%" class="tblForm">
													<tr>
														<td width="20%"><div align="center"><font size="1" style="font-weight:bold;">Particulars </font></div></td>
														<td width="15%"><div align="center"><font size="1" style="font-weight:bold;">Drawee Bank/Agency </font></div></td>
														<td width="20%"><div align="center"><font size="1" style="font-weight:bold;">Number </font></div></td>
														<td width="20%"><div align="center"><font size="1" style="font-weight:bold;">Date (MM/DD/YYYY) </font></div></td>
														<td width="25%"><div align="center"><font size="1" style="font-weight:bold;">Amount </font></div></td>
													</tr>
													<tr>
														<td><font size="2" style="font-weight:bold;">&nbsp;33&nbsp;&nbsp;&nbsp;</font><font size="1">Cash/Bank Debit Memo </font></td>
														<td align="center"><input type="text" value="" size="20" name="frm1601FQ:txtAgency33" maxlength="50" id="frm1601FQ:txtAgency33" disabled="true"  /></td>
														<td align="center"><input type="text" value="" size="20" name="frm1601FQ:txtNumber33" maxlength="50" id="frm1601FQ:txtNumber33" disabled="true"  /></td>
														<td align="center"><input type="text" value="" size="20" name="frm1601FQ:txtDate33" maxlength="10" id="frm1601FQ:txtDate33" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="validateDate(this);" disabled="true" /></td>
														<td align="center"><input type="text" value="" style="text-align: right" size="20" name="frm1601FQ:txtAmount33" maxlength="50" id="frm1601FQ:txtAmount33" onkeypress="return numbersonly(this, event)" onblur="round(this,2);" disabled="true" /></td>
													</tr>
													<tr>
														<td><font size="2" style="font-weight:bold;">&nbsp;34&nbsp;&nbsp;&nbsp;</font><font size="1">Check </font></td>
														<td align="center"><input type="text" value="" size="20" name="frm1601FQ:txtAgency34" maxlength="50" id="frm1601FQ:txtAgency34" disabled="true" /></td>
														<td align="center"><input type="text" value="" size="20" name="frm1601FQ:txtNumber34" maxlength="50" id="frm1601FQ:txtNumber34" disabled="true" /></td>
														<td align="center"><input type="text" value="" size="20" name="frm1601FQ:txtDate34" maxlength="10" id="frm1601FQ:txtDate34" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="validateDate(this);" disabled="true" /></td>
														<td align="center"><input type="text" value="" style="text-align: right" size="20" name="frm1601FQ:txtAmount34" maxlength="50" id="frm1601FQ:txtAmount34" onkeypress="return numbersonly(this, event)" onblur="round(this,2);" disabled="true" /></td>
													</tr>
													<tr>
														<td><font size="2" style="font-weight:bold;">&nbsp;35&nbsp;&nbsp;&nbsp;</font><font size="1">Tax Debit Memo </font></td>
														<td align="center"><input type="text" value="" size="20" name="frm1601FQ:txtAgency35" maxlength="50" id="frm1601FQ:txtAgency35" disabled="true" /></td>
														<td align="center"><input type="text" value="" size="20" name="frm1601FQ:txtNumber35" maxlength="50" id="frm1601FQ:txtNumber35" disabled="true" /></td>
														<td align="center"><input type="text" value="" size="20" name="frm1601FQ:txtDate35" maxlength="10" id="frm1601FQ:txtDate35" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="validateDate(this);" disabled="true" /></td>
														<td align="center"><input type="text" value="" style="text-align: right" size="20" name="frm1601FQ:txtAmount35" maxlength="50" id="frm1601FQ:txtAmount35" onkeypress="return numbersonly(this, event)" onblur="round(this,2);" disabled="true" /></td>
													</tr>
													<tr>
														<td colspan="5"><font size="2" style="font-weight:bold;">&nbsp;36&nbsp;&nbsp;&nbsp;</font><font size="1">Others (specify below) </font></td>
													</tr>
													<tr>
														<td><input type="text" value="" size="20" name="frm1601FQ:txtParticular36" maxlength="50" id="frm1601FQ:txtParticular36" disabled="true" /></td>
														<td align="center"><input type="text" value="" size="20" name="frm1601FQ:txtAgency36" maxlength="50" id="frm1601FQ:txtAgency36" disabled="true" /></td>
														<td align="center"><input type="text" value="" size="20" name="frm1601FQ:txtNumber36" maxlength="50" id="frm1601FQ:txtNumber36" disabled="true" /></td>
														<td align="center"><input type="text" value="" size="20" name="frm1601FQ:txtDate36" maxlength="10" id="frm1601FQ:txtDate36" onkeypress="return dateOnly(event, false);" onkeydown="dateMasking(this);" onblur="validateDate(this);" disabled="true" /></td>
														<td align="center"><input type="text" value="" style="text-align: right" size="20" name="frm1601FQ:txtAmount36" maxlength="50" id="frm1601FQ:txtAmount36" onkeypress="return numbersonly(this, event)" onblur="round(this,2);" disabled="true" /></td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td>
									<table border="1" width="800" cellspacing="0" cellpadding="0" style="font-size:10px; text-align: left; vertical-align: top;">
									  <tr>
										<td width="57%">Machine Validation/Revenue Official Receipt Details (If not filed with an Authorized Agent Bank)<br /><br /><br /><br /><br /><br /><br /></td>
										<td width="43%">Stamp of Receiving Office/AAB and Date of Receipt (RO's Signature/Bank Teller's Initial)<br /><br /><br /><br /><br /><br /><br /></td>
						 			  </tr>
									</table>
								</td>
							</tr>
							<tr>
								<td colspan="4" style="text-align: left; font-family:arial; font-size:10px;">NOTE: *Please read the BIR Data Privacy Policy found in the BIR website (www.bir.gov.ph) <br></td> 
							</tr>
                        </table>
					</div>
					<div id="Page2Content" style="display:none;">
						<table width="806" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td>
									<table width="800" border="1" cellspacing="0" cellpadding="0" style="height:0px;">
										<tr>
											<td width="120" valign="middle" style="text-align: center;">
												<label face="Arial" size="1px">BIR Form No.</label>
												<br/><font size="5px" style="font-weight:bold;">1601-FQ</font>
												<br/><label face="Arial" size="1px">January 2018</label>
												<br/><label face="Arial" size="1px" style="font-weight:bold;">Page 2</label>
											</td>
											<td width="0" valign="center" style="text-align: center;">
												<font size="5px" style="font-weight:bold;">Quarterly Remittance Return</font>
												<br/><font size="4px" style="font-weight:bold;">of Final Income Taxes Withheld</font>
											</td>
											<td width="200" valign="center">
												<p><img src="{{ asset('images/Bar Codes/1601FQ_p2.png') }}" width="220" height="75px" /> </p>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td>
									<table width="800" border="1" cellspacing="0" cellpadding="0" class="tblForm">
										<tr>
											<td width="40%"><font size="1" face="Arial, Helvetica, sans-serif">TIN</font></td>
											<td width="60%"><font size="1" face="Arial, Helvetica, sans-serif">Withholding Agent's Name (Last Name for Individual OR Registered Name for Non-individual)</font></td>
										</tr>
										<tr>
											<td>
												<font size="2" face="Arial">
													<input type="text" value="{{$company->tin1}}" size="3" name="frm1601FQ:txtPg2TIN1" maxlength="3" id="frm1601FQ:txtPg2TIN1" onkeypress="return wholenumber(this, event)" disabled="true" />
													<input type="text" value="{{$company->tin2}}" size="3" name="frm1601FQ:txtPg2TIN2" maxlength="3" id="frm1601FQ:txtPg2TIN2" onkeypress="return wholenumber(this, event)" disabled="true" />
													<input type="text" value="{{$company->tin3}}" size="3" name="frm1601FQ:txtPg2TIN3" maxlength="3" id="frm1601FQ:txtPg2TIN3" onkeypress="return wholenumber(this, event)" disabled="true" />
													<input type="text" value="{{$company->tin4}}" size="3" name="frm1601FQ:txtPg2BranchCode" maxlength="3" id="frm1601FQ:txtPg2BranchCode" onkeypress="return letternumber(event)" disabled="true" />
												</font>
											</td>
											<td><input type="text" value="{{$company->registered_name}}" size="80" name="frm1601FQ:txtPg2TaxpayerName" maxlength="50" id="frm1601FQ:txtPg2TaxpayerName" onblur="return capital(this, event)" disabled="true" /></td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td>
									<table width="800" border="1" cellspacing="0" cellpadding="0" class="tblForm">
										<tr>
											<td class="tblFormTdPart">
												<table width="799" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td width="100%">
															<div align="center"><font size="2" style="font-weight:bold;">Part IV - Schedules</font></div>
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						<!-- Schedule I -->
							<tr>
								<td>
									<table width="800" border="1" cellspacing="0" cellpadding="0" class="tblForm">
										<tr>
											<td><font size="1" style="font-weight:bold;">Schedule 1 - Details of Final Tax Based on Tax Treaty Rates </font></td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td>          
									<table id="tbllistSchedI" class="tblForm"  cellspacing="0" cellpadding="0" width="800" border="1">
										<tr><td width="4%" align="center"><font size="1" face="Arial, Helvetica, sans-serif">Seq. No. <br> (A) </font></td>
											<td width='15%' align="center"><font size="1" face="Arial, Helvetica, sans-serif">Treaty Code/Country <br /> (B) </font></td>
											<td width='8%' align="center"><font size="1" face="Arial, Helvetica, sans-serif"> ATC <br> (C) </font></td>
											<td width='25%' align="center"><font size="1" face="Arial, Helvetica, sans-serif"> Nature of Income Payment <br /> (Refer to Schedule 3) <br> (D) </font></td>
											<td width='20%' align="center"><font size="1" face="Arial, Helvetica, sans-serif"> Amount of Income Payment<br> (E) </font></td>
											<td width='8%' align="center"><font size="1" face="Arial, Helvetica, sans-serif"> Tax Rates <br> (F) </font></td>
											<td width='20%' align="center"><font size="1" face="Arial, Helvetica, sans-serif"> Amount of Tax Withheld <br> (not creditable) <br> (G) = (E x F) </font></td>
										</tr>
										<tbody id="tbodyllistSchedI">
											<tr>
												<td width="4%">1</td>
                								<td width="15%" align="left"> 
													<select  id="drpTreatyCode0" name="drpTreatyCode0" style="width: 150px" onchange="" disabled="true" >
														<option value="-" selected > - </option>
														<option value="NA" >NA - Not Applicable </option>
													</select> 
												</td>
                								<td width="8%" align="left"> 
													<select id="drpATCCode0" name="drpATCCode0" style="width: 80px" onchange="getATCdrpNaturePayment(0);getATCdrpTaxRate(0);getReqWithheldCompute(0);" disabled="true" >
														<option value="-" selected > - </option>
														<option value="NA" >NA </option>
													</select>
												</td>
												<td width="25%"><input type="text" style="width: 220px;" id="txtNatIncPayment0" name="txtNatIncPayment0" value="-" size="20" disabled="true" /> </td>
                								<td width="20%"><input type="text" style="width: 95%; text-align: right;" id="txtAmtIncomePay0" name="txtAmtIncomePay0" value="0.00" size="17" maxlength="25" onkeypress="return numbersonly(this, event)" onblur="round(this,2);getReqWithheldCompute(0)" disabled="true" /> </td>
                								<td width="8%"><input type="text" style="text-align: right;" id="txtRate0" name="txtRate0" value="0.00" size="6" onblur="round(this,2);getReqWithheldCompute(0)" maxlength="10" onkeypress="return numbersonly(this, event)" style="width: 95%" disabled="true" /> </td>
												<td width="20%"><input type="text" style="background-color: rgb(220, 220, 220); width: 95%; text-align: right;" id="txtReqWithheld0" name="txtReqWithheld0" value="0.00" size="17" maxlength="25" disabled="true" /> </td>
											</tr>
											<tr>
												<td width="4%">2</td>
												<td width="15%" align="left"> 
													<select  id="drpTreatyCode1" name="drpTreatyCode1" style="width: 150px" onchange="" disabled="true" >
														<option value="-" selected > - </option>
														<option value="NA" >NA - Not Applicable </option>
													</select> 
												</td>
												<td width="8%" align="left"> 
													<select id="drpATCCode1" name="drpATCCode1" style="width: 80px" onchange="getATCdrpNaturePayment(1);getATCdrpTaxRate(1);getReqWithheldCompute(1);" disabled="true" >
														<option value="-" selected > - </option>
														<option value="NA" >NA </option>
													</select>
												</td>
												<td width="25%"><input type="text" style="width: 220px;" id="txtNatIncPayment1" name="txtNatIncPayment1" value="-" size="20" disabled="true" /> </td>
												<td width="20%"><input type="text" style="width: 95%; text-align: right;" id="txtAmtIncomePay1" name="txtAmtIncomePay1" value="0.00" size="17" maxlength="25" onkeypress="return numbersonly(this, event)" onblur="round(this,2);getReqWithheldCompute(1)" disabled="true" /> </td>
												<td width="8%"><input type="text" style="text-align: right;" id="txtRate1" name="txtRate1" value="0.00" size="6" onblur="round(this,2);getReqWithheldCompute(1)" maxlength="10" onkeypress="return numbersonly(this, event)" style="width: 95%" disabled="true" /> </td>
												<td width="20%"><input type="text" style="background-color: rgb(220, 220, 220); width: 95%; text-align: right;" id="txtReqWithheld1" name="txtReqWithheld1" value="0.00" size="17" maxlength="25" disabled="true" /> </td>
											</tr>
											<tr>
												<td width="4%">3</td>
												<td width="15%" align="left"> 
													<select  id="drpTreatyCode2" name="drpTreatyCode2" style="width: 150px" onchange="" disabled="true" >
														<option value="-" selected > - </option>
														<option value="NA" >NA - Not Applicable </option>
													</select> 
												</td>
												<td width="8%" align="left"> 
													<select id="drpATCCode2" name="drpATCCode2"  style="width: 80px" onchange="getATCdrpNaturePayment(2);getATCdrpTaxRate(2);getReqWithheldCompute(2);" disabled="true" >
														<option value="-" selected > - </option>
														<option value="NA" >NA </option>
													</select>
												</td>
												<td width="25%"><input type="text" style="width: 220px;" id="txtNatIncPayment2"  name="txtNatIncPayment2" value="-" size="20" disabled="true" /> </td>
												<td width="20%"><input type="text" style="width: 95%; text-align: right;" id="txtAmtIncomePay2"  name="txtAmtIncomePay2" value="0.00" size="17" maxlength="25" onkeypress="return numbersonly(this, event)" onblur="round(this,2);getReqWithheldCompute(2)" disabled="true" /> </td>
												<td width="8%"><input type="text" style="text-align: right;" id="txtRate2" name="txtRate2"  value="0.00" size="6" onblur="round(this,2);getReqWithheldCompute(2)" maxlength="10" onkeypress="return numbersonly(this, event)" style="width: 95%" disabled="true" /> </td>
												<td width="20%"><input type="text" style="background-color: rgb(220, 220, 220); width: 95%; text-align: right;" id="txtReqWithheld2" name="txtReqWithheld2"  value="0.00" size="17" maxlength="25" disabled="true" /> </td>
											</tr>
											<tr>
												<td width="4%">4</td>
												<td width="15%" align="left"> 
													<select  id="drpTreatyCode3" name="drpTreatyCode3" style="width: 150px" onchange="" disabled="true" >
														<option value="-" selected > - </option>
														<option value="NA" >NA - Not Applicable </option>
													</select> 
												</td>
												<td width="8%" align="left"> 
													<select id="drpATCCode3" name="drpATCCode3" style="width: 80px" onchange="getATCdrpNaturePayment(3);getATCdrpTaxRate(3);getReqWithheldCompute(3);" disabled="true" >
														<option value="-" selected > - </option>
														<option value="NA" >NA </option>
													</select>
												</td>
												<td width="25%"><input type="text" style="width: 220px;" id="txtNatIncPayment3" name="txtNatIncPayment3" value="-" size="20" disabled="true" /> </td>
												<td width="20%"><input type="text" style="width: 95%; text-align: right;" id="txtAmtIncomePay3" name="txtAmtIncomePay3" value="0.00" size="17" maxlength="25" onkeypress="return numbersonly(this, event)" onblur="round(this,2);getReqWithheldCompute(3)" disabled="true" /> </td>
												<td width="8%"><input type="text" style="text-align: right;" id="txtRate3" name="txtRate3" value="0.00" size="6" onblur="round(this,2);getReqWithheldCompute(3)" maxlength="10" onkeypress="return numbersonly(this, event)" style="width: 95%" disabled="true" /> </td>
												<td width="20%"><input type="text" style="background-color: rgb(220, 220, 220); width: 95%; text-align: right;" id="txtReqWithheld3" name="txtReqWithheld3" value="0.00" size="17" maxlength="25" disabled="true" /> </td>
											</tr>
											<tr>
												<td width="4%">5</td>
												<td width="15%" align="left"> 
													<select  id="drpTreatyCode4" name="drpTreatyCode4" style="width: 150px" onchange="" disabled="true" >
														<option value="-" selected > - </option>
														<option value="NA" >NA - Not Applicable </option>
													</select> 
												</td>
												<td width="8%" align="left"> 
													<select id="drpATCCode4" name="drpATCCode4" style="width: 80px" onchange="getATCdrpNaturePayment(4);getATCdrpTaxRate(4);getReqWithheldCompute(4);" disabled="true" >
														<option value="-" selected > - </option>
														<option value="NA" >NA </option>
													</select>
												</td>
												<td width="25%"><input type="text" style="width: 220px;" id="txtNatIncPayment4" name="txtNatIncPayment4" value="-" size="20" disabled="true" /> </td>
												<td width="20%"><input type="text" style="width: 95%; text-align: right;" id="txtAmtIncomePay4" name="txtAmtIncomePay4" value="0.00" size="17" maxlength="25" onkeypress="return numbersonly(this, event)" onblur="round(this,2);getReqWithheldCompute(4)" disabled="true" /> </td>
												<td width="8%"><input type="text" style="text-align: right;" id="txtRate4" name="txtRate4" value="0.00" size="6" onblur="round(this,2);getReqWithheldCompute(4)" maxlength="10" onkeypress="return numbersonly(this, event)" style="width: 95%" disabled="true" /> </td>
												<td width="20%"><input type="text" style="background-color: rgb(220, 220, 220); width: 95%; text-align: right;" id="txtReqWithheld4" name="txtReqWithheld4" value="0.00" size="17" maxlength="25" disabled="true" /> </td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
							<tr>
								<td>
									<table class="tblForm" cellspacing="0" cellpadding="0" width="800" border="1" >
										<tr>
											<td height="30"><font size="1" face="Arial, Helvetica, sans-serif" style="font-weight:bold;">Total Taxes Withheld </font><font size="1" face="Arial, Helvetica, sans-serif">(Sum of Items 1 to 5)(To Part II Item 21) <font ></td>
											<td align="right" height="30"> 
												<input type="text" style="background-color: rgb(220, 220, 220)" id="txtDvTotalSchedI" name="txtDvTotalSchedI" maxlength="20" size="17" value="0.00" disabled /> 
											</td>
										</tr>
								</table>
								</td>
							</tr>
						<!--Schedule 2-->
							<tr>
								<td>
									<table class="tblForm" border="1" cellspacing="0" cellpadding="0" width="800">
										<tr>
											<td class="tblForm" colspan="2"><font size="1" style="font-weight:bold;">Schedule 2 - Tax Treaty Code</font></td>
										</tr>
									</table> 
									<table border="1" cellspacing="0" cellpadding="0" width="800">
										<tr>
											<td width="5%" align="center"><font size="1" face="Arial, Helvetica, sans-serif" style="font-weight:bold;">Treaty Code</font></td>
											<td width="20%" align="center"><font size="1" face="Arial, Helvetica, sans-serif" style="font-weight:bold;">Country</font></td>
											<td width="5%" align="center"><font size="1" face="Arial, Helvetica, sans-serif" style="font-weight:bold;">Treaty Code</font></td>
											<td width="20%" align="center"><font size="1" face="Arial, Helvetica, sans-serif" style="font-weight:bold;">Country</font></td>
											<td width="5%" align="center"><font size="1" face="Arial, Helvetica, sans-serif" style="font-weight:bold;">Treaty Code</font></td>
											<td width="20%" align="center"><font size="1" face="Arial, Helvetica, sans-serif" style="font-weight:bold;">Country</font></td>
											<td width="5%" align="center"><font size="1" face="Arial, Helvetica, sans-serif" style="font-weight:bold;">Treaty Code</font></td>
											<td width="20%" align="center"><font size="1" face="Arial, Helvetica, sans-serif" style="font-weight:bold;">Country</font></td>
										</tr>
										<!--<tbody id="tbodySched2">-->
										<tr>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">AU</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> Australia</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">FI</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> Finland</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">KW</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> Kuwait</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">SG</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> Singapore</font></td>
										</tr>
										<tr>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">AT</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> Austria</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">FR</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> France</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">MY</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> Malaysia</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">ES</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> Spain</font></td>
										</tr>
										<tr>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">BH</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> Bahrain</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">DE</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> Germany</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">NL</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> Netherlands</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">SE</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> Sweden</font></td>
										</tr>
										<tr>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">BD</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> Bangladesh</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">HU</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> Hungary</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">NZ</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> New Zealand</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">CH</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> Switzerland</font></td>
										</tr>
										<tr>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">BE</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> Belgium</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">IN</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> India</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">NG</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> Nigeria</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">TH</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> Thailand</font></td>
										</tr>
										<tr>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">BR</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> Brazil</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">ID</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> Indonesia</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">NO</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> Norway</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">UAE</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> United Arab Emirates</font></td>
										</tr>
										<tr>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">CA</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> Canada</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">IL</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> Israel</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">PK</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> Pakistan</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">GB</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> United Kingdom</font></td>
										</tr>
										<tr>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">CN</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> China</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">IT</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> Italy</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">PL</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> Poland</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">US</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> United States of America</font></td>
										</tr>
										<tr>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">CZ</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> Czech Republic</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">JP</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> Japan</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">RO</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> Romania</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">VN</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> Vietnam</font></td>
										</tr>
										<tr>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">DK</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> Denmark</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">KR</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> Korea</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">RU</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif"> Russia</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
											<td align="center"><font size="1" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
										</tr>
										<!--</tbody>-->
									</table>
								</td>
							</tr>
						<!--Schedule 3-->
							<tr>
								<td>
									<table class="tblForm" border="1" cellspacing="0" cellpadding="0" width="800">
										<tr>
											<td class="tblForm" colspan="2"><font size="1" style="font-weight:bold;">Schedule 3 - Nature of Income Payment</font></td>
										</tr>
									</table>
									<table border="1" cellspacing="0" cellpadding="0" width="800">
										<tr>
											<td width="690" align="center"><font size="1" style="font-weight:bold;"> Particulars</font></td>
											<td width="8" align="center"><font size="1" style="font-weight:bold;">Tax Rate</font></td>
											<td colspan="2" width="100">
												<table border="1" cellspacing="0" cellpadding="0">
													<tr>
														<td colspan="2" width="100" align="center"><font size="1" style="font-weight:bold;">ATC</font></td>
													</tr>
													<tr>
														<td width="50" align="center"><font size="1" style="font-weight:bold;">Individual</font></td>
														<td width="50" align="center"><font size="1" style="font-weight:bold;">Corporate</font></td>
													</tr>
												</table>
											</td>
										</tr>
										<tbody id="tblSched3">

										</tbody>
									</table>
								</td>
							</tr>
						</table>
					</div>
        	    </div>
			</td>
			<!--<td valign="top"><img id="frm1601FQ:bcsImg" src="../img/BCS.jpg"/></td>-->
		</tr>
		<tr>
			<td>
				<table width="806" border="0" cellspacing="0" cellpadding="0" class="tblForm printButtonClass">
					<tr align="center">
						<td class="tblFormTdPart">
							<table width="800" border="0" cellspacing="0" cellpadding="0">
								<tr align="center">
									<td>
										<table width="880" cellspacing="0" cellpadding="0" border="0">
											<tbody>
												<tr align="center">
													<td width="100%" colspan="2">
														<div align="center">
															<br />
															<input class="printButtonClass" type="button" value="Prev" style="width: 100px;"
																name="frm1601FQ:btnPrevPage" id="frm1601FQ:btnPrevPage" onclick="processPrev();" />
														    <input id="frm1601FQ:txtCurrentPage" name="frm1601FQ:txtCurrentPage" size="1" type="text" style="text-align:center;" onkeyup="goToPage();" />
															<span class=large>/&nbsp;</span><input type="text" id="frm1601FQ:txtMaxPage" readonly="true" size="2"  value="2" style="text-align:center;" disabled />&nbsp;
															<input class="printButtonClass" type="button" value="Next" style="width: 100px;"
																name="frm1601FQ:btnNextPage" id="frm1601FQ:btnNextPage"  onclick="processNext();" />
															<br /><br />
														</div>
													</td>
												</tr>
												<tr valign="middle">
													<td width="46"></td>
													<td width="640">
														<div align="center">
                                                        @if($action != 'view')
															<input class="printButtonClass" type="button" value="Validate" style="width: 100px;" name="frm1601FQ:cmdValidate" id="frm1601FQ:cmdValidate" onclick="validate()" />
															<input class="printButtonClass" type="button" value="Edit" style="width: 100px;" name="frm1601FQ:cmdEdit" id="frm1601FQ:cmdEdit" onclick="enableAllControl()"/>
															<input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />
															<input class="printButtonClass" type="button" value="Save" style="width: 100px;" name="btnSave" id="btnSave" onclick="saveData();" />
															<input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
															<input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;" name="frm1601FQ:btnFinalCopy" id="frm1601FQ:btnFinalCopy" onclick="submitForm();" />
															<div id="msg" class="printButtonClass" style="display:none;"></div>		
															<br /><br />
                                                        @else
                                                            <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                            <input class="printButtonClass" type="button" value="Back" style="width: 100px;" onclick="gotoMain();" />
                                                        @endif  																	
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

		<div id="modalAtc" class="aBox" style="width:90%; display:none; min-height:500px; position:relative; top:3%; left:5%; right:5%; overflow-y:auto; overflow-x:hidden; background:#fff;padding: 10px;" align=""> 
            <br/>
            <div class="modalContent" align="left">
                
            </div>
            <div class="modalHeader" align="center" style="width: 98%">
                <table cellspacing="3" cellpadding="3" style="position: static;width: 100%">
                    <tr>
                        
                    </tr>
                    <tr>
                        <td class="modalHeader" align="left" width="auto">&nbsp;&nbsp;&nbsp;<b>ATC</b></td>
						<td class="modalHeader" left="150px" width="auto"><b>Description</b></td>
						<td class="modalHeader" align="right"><b>Rate %</b></td>
                    </tr>
                    <tr>
                        <td colspan="3"><hr/></td>
                    </tr>
                </table>
            </div>

            <div class="modalColumnHeader" style="height:auto;width: auto; overflow:visible;">
				<table id="tbllistAtcCode" cellspacing="0" cellpadding="0" style="width: 100%;padding:1%;">
                    <tr><td></td></tr>
                </table>
				<div align="center">
					<input type="button" name="btnOkPop" id="btnOkPop" style="width:120px; height:30px;" value="OK" onclick="getATCCode()" />
				</div>
            </div>            
            <br />
		</div>

		<!--Start Modal for other selected ATC-->
		<div id="modalOtherAtc" class="modalShow"  border="0" style="text-align:center; display:none">
			<br />
			<table width="800" border="0" cellspacing="0" cellpadding="0" class="tblForm">
				<tr>
					<td colspan="7"><font size="2" style="font-weight:bold;">OTHER SELECTED ATC</font></td>
				</tr>
				<tr>
					<td valign="top" class="tblFormTd">
						<table id="tblPartIIOtherTax" style="margin-left:5px;"  border="0" cellpadding="0" cellspacing="0" width="93%">
							<thead>
								<tr>
									<td width="20%" align="center"><font size="1" style="font-weight:bold;">ATC</font></td>
									<td width="30%" align="center"><font size="1" style="font-weight:bold;">Tax base <i>(Consolidated for the Quarter)</i></font></td>
									<td width="20%" align="center"><font size="1" style="font-weight:bold;">Tax Rate</font></td>
									<td width="30%" align="center"><font size="1" style="font-weight:bold;">Tax Withheld <i>(Consolidated for the Quarter)</i></font></td>
								</tr>
							</thead>
							<!-- markpbug -->
							<tbody id="tbodyOtherTax"> 
							</tbody>
							<tfoot id="tfootOtherTax">
								<tr>
									<td colspan="7">
										&nbsp;&nbsp;&nbsp;
										<input type="button" value=" Print " onclick="printModal(modalOtherAtc)" />&nbsp;&nbsp;&nbsp;
										<input type="button" value=" Close " onclick="closeOtherSelectedTax()" />&nbsp;&nbsp;&nbsp;
										<input type="button" value=" Clear " id="btnPartIIOtherClear" onclick="clearpart2()" />&nbsp;&nbsp;&nbsp;
									</td>
								</tr>
							</tfoot>
						</table>
					</td>
				</tr>
			</table>     
			<br />
		</div>
		
		<div id="hiddenLob" style="display:none;"  > 
			<input type="text" value="{{$company->line_business}}" id="frm1601FQ:txtLineBus" name="frm1601FQ:txtLineBus" onblur="" onkeypress="" />
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
        <div id="responseTreatyCode" style="display:none;"><!--loaded Treaty Code files render here--></div>    
        <div id="responseTaxTypeCode" style="display:none;"><!--loaded Tax Type Code files render here--></div>   
        <div id="responseRdo" style="display:none;"><!--loaded files render here--></div>   
@endsection

@section('scripts')
<script type="text/javascript">

	var isSubmitFinal = false;
	var isSubmit = false;
	
	var gIsReadOnly = false;
	var atcList = new Array();
	var treatyList = new Array();
	
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
	
	var currentPage;
	var MaxPage = 2;

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
	
	function treatyPropertyJS(treatyCode, treatyDescription) 
	{
		this.treatyCode=treatyCode;
		this.treatyDescription=treatyDescription;
	}


    var TreatynameCode = new Array()
    var TreatynameDesc = new Array()
    var disabledSchedField = "";
	/*----------------------------------*/
	//Added by MPISCOSO
    var d=document,XMLBGFile='',data='',XMLFile='', XMLATCFile='', XMLTreatyFile='',msg = d.getElementById('msg'),flag=true;
	var loader=d.getElementById('loader');
	/*----------------------------------*/
	
    function Schedule1()
    {
        this.SelTreatyCode =-1;
        this.SelATC = -1;
        this.TxtAmtIncomePayment = '0.00';
        this.TxtTaxRate = '0.00';
        this.TxtRequiredWithheld = '0.00';
    }

    var sched1 = new Array();
    var sched1ToCommit = new Array();

    var str;
    str = window.setTimeout("sleeptime()", 1000);
	var globalEmail = "";
    function sleeptime()
    {
        init();		
		
		
		var xmlFileName = document.getElementById('file_name').value;        
        fileName = xmlFileName;
		if (fileName != null && fileName.indexOf('.xml') > -1) {
			var tin = fileName.split("/")[1].split("-");
			
			loadXML(fileName);
			
			//d.getElementById('frm1601FQ:j_id201').disabled = true;
			d.getElementById('frm1601FQ:txtYear').disabled = true;
			
			if (d.getElementById('frm1601FQ:SpecialTax_1').checked == true) {
				for(var i = 0; i < 5; i++) {
					d.getElementById('drpTreatyCode'+ i).disabled = false;
					d.getElementById('drpATCCode'+ i).disabled = false;
					d.getElementById('txtAmtIncomePay'+ i).disabled = false;
					d.getElementById('txtRate'+ i).disabled = false;
				}
			}
			
			existingXMLFileName = fileName;
			if (gIsReadOnly) { 
			window.setTimeout("disableAllElementIDs(); d.getElementById('btnUpload').disabled = false; d.getElementById('frm1601FQ:txtCurrentPage').disabled = false;",1000); 
			}
		} else {
			window.setTimeout("$('#loader').hide('blind');",100);
		}
		
		if ( $('#printMenu').css('display') != 'none' ) {	
			$('#printMenu').hide('blind');
		}
		
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
        var responseATC = d.getElementById('responseATC'); //render file and write to hidden div
        responseATC.innerHTML = xmlHTTP.responseText; //remove XML tag
        loadATC();
        
    }	
	
	function loadXMLTreaty(fileLocation) {
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
        var responseTreaty = d.getElementById('responseTreatyCode'); //render file and write to hidden div
        responseTreaty.innerHTML = xmlHTTP.responseText; //remove XML tag
        loadTreaty();

	}		
	
	var atcCount=0;
	var treatyCount=0;

	function loadTreaty() {
		/*This will load data onto an array*/
		var response = d.getElementById("responseTreatyCode");
		
		var treatyCnt = String(response.innerHTML).split('treatyCount=');
		treatyCount = treatyCnt[1]; 
	
		var k = 0;
		//loads treatyList from xml
		for (var i = 1; i <= treatyCount; i++) { 
			
			var treaty = String(response.innerHTML).split('treaty'+i+':');
			var treatyStr = treaty[1];
		
			//Ensure that before writing to atcPropertyJS the formType 1601F is traceable in treatyStr
			if (treatyStr.indexOf('1601FQ') >= 0) {
			    var treatyValues = treatyStr.split('~');							
				var treatyCode = treatyValues[0];
				var treatyDescription = treatyValues[1];				
				
				//load drop down in schedule 1
				loadDrpTreaty(treatyCode, treatyDescription);

				var objTreaty = new treatyPropertyJS(treatyCode, treatyDescription);
				treatyList[k] = objTreaty; 

				k++;
				//alert('1601F successfully created array #'+i);
				
			} else {		
				//alert('1601F not found in array #'+i);
				continue;
			}
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
			
			//Ensure that before writing to atcPropertyJS the formType 1601F is traceable in atcStr
			if (atcStr.indexOf('1601FQ') >= 0) {
			    var atcValues = atcStr.split('~');				
				
				var formType = "1601FQ";
				var atcCode = atcValues[0];
				var description = atcValues[1];
				var rate = atcValues[2];
				var category = atcValues[3];
				
				var base = '';
				var compType = '';
				var constTaxDue = '';
				var minimum = '';
				var maximum = '';
				
				//load drop down in schedule 1
				loadDrpATC(description, rate, atcCode);
				//load details to sched 3
				loadSched3(description, rate, atcCode);

				var objATC = new atcPropertyJS(formType, atcCode, description, rate, category, base, compType, constTaxDue, minimum, maximum);
				atcList[j] = objATC; 
				j++;
				//alert('1601F successfully created array #'+i);
				
			} else {		
				//alert('1601F not found in array #'+i);
				continue;
			}
		}					
	}	

	function loadDrpTreaty(treatyCode, treatyDescription) {
		for(var i = 0; i < 5; i++) {
			$('#drpTreatyCode'+i).html(  d.getElementById('drpTreatyCode'+i).innerHTML + "<option value='" + treatyCode + "' > " + treatyCode + " - " + treatyDescription + " </option");
		}
	}

	function loadDrpATC(atcDesc, atcRate, atcCode) {
		for(var i =0; i < 5; i++) {
			$('#drpATCCode'+i).html(  d.getElementById('drpATCCode'+i).innerHTML + "<option value='"+ atcCode +"' > " + atcCode +"</option>");
		}
	}

	var dCount = 0;
	var listATC = new Array();
	function loadSched3(atcDesc, atcRate, atcCode) {
		//codes here
		
		var duplicateCnt = 0;
		var isATCNotDuplicate = false;
		if (listATC.length > 0) {
			for (var i = 0; i < listATC.length; i++) {
				if (atcCode == listATC[i]){
					duplicateCnt = 1;
				}
			}
		}
		else {
			isATCNotDuplicate = true;
		}

		if (duplicateCnt == 0) {
			isATCNotDuplicate = true;
		}

		if (isATCNotDuplicate) {
			if (atcCode.indexOf('WI') != -1) {
				if (atcCode == "WI250") {
					$('#tblSched3').html(d.getElementById('tblSched3').innerHTML +
    		        "<tr>" + 
					"<td><font size='1' face='Arial, Helvetica, sans-serif'>" + atcDesc + "</font></td>" + 
					"<td><font size='1' face='Arial, Helvetica, sans-serif'>" + atcRate + "</font></td>" + 
					"<td align='center'><font size='1' face='Arial, Helvetica, sans-serif'>" + atcCode + "</font></td>" + 
					"<td align='center'><font size='1' face='Arial, Helvetica, sans-serif'>WC250</font></td>" + 
					"</tr>");
					listATC[dCount] = atcCode;
				}
				else if (atcCode == "WI310") {
					$('#tblSched3').html(d.getElementById('tblSched3').innerHTML +
    		        "<tr>" + 
					"<td><font size='1' face='Arial, Helvetica, sans-serif'>" + atcDesc + "</font></td>" + 
					"<td><font size='1' face='Arial, Helvetica, sans-serif'>" + atcRate + "</font></td>" + 
					"<td align='center'><font size='1' face='Arial, Helvetica, sans-serif'>" + atcCode + "</font></td>" + 
					"<td align='center'><font size='1' face='Arial, Helvetica, sans-serif'>WC310</font></td>" + 
					"</tr>");
					listATC[dCount] = atcCode;
				}else if (atcCode == "WI340") {
					$('#tblSched3').html(d.getElementById('tblSched3').innerHTML +
    		        "<tr>" + 
					"<td><font size='1' face='Arial, Helvetica, sans-serif'>" + atcDesc + "</font></td>" + 
					"<td><font size='1' face='Arial, Helvetica, sans-serif'>" + atcRate + "</font></td>" + 
					"<td align='center'><font size='1' face='Arial, Helvetica, sans-serif'>" + atcCode + "</font></td>" + 
					"<td align='center'><font size='1' face='Arial, Helvetica, sans-serif'>WC340</font></td>" + 
					"</tr>");
					listATC[dCount] = atcCode;
				}
				else if (atcCode == "WI410") {
					$('#tblSched3').html(d.getElementById('tblSched3').innerHTML +
    		        "<tr>" + 
					"<td><font size='1' face='Arial, Helvetica, sans-serif'>" + atcDesc + "</font></td>" + 
					"<td><font size='1' face='Arial, Helvetica, sans-serif'>" + atcRate + "</font></td>" + 
					"<td align='center'><font size='1' face='Arial, Helvetica, sans-serif'>" + atcCode + "</font></td>" + 
					"<td align='center'><font size='1' face='Arial, Helvetica, sans-serif'>WC410</font></td>" + 
					"</tr>");
					listATC[dCount] = atcCode;
				}
				else if (atcCode == "WI700") {
					$('#tblSched3').html(d.getElementById('tblSched3').innerHTML +
    		        "<tr>" + 
					"<td><font size='1' face='Arial, Helvetica, sans-serif'>" + atcDesc + "</font></td>" + 
					"<td><font size='1' face='Arial, Helvetica, sans-serif'>" + atcRate + "</font></td>" + 
					"<td align='center'><font size='1' face='Arial, Helvetica, sans-serif'>" + atcCode + "</font></td>" + 
					"<td align='center'><font size='1' face='Arial, Helvetica, sans-serif'>WC700</font></td>" + 
					"</tr>");
					listATC[dCount] = atcCode;
				}
				else {
					$('#tblSched3').html(d.getElementById('tblSched3').innerHTML +
    		        "<tr>" + 
					"<td><font size='1' face='Arial, Helvetica, sans-serif'>" + atcDesc + "</font></td>" + 
					"<td><font size='1' face='Arial, Helvetica, sans-serif'>" + atcRate + "</font></td>" + 
					"<td align='center'><font size='1' face='Arial, Helvetica, sans-serif'>" + atcCode + "</font></td>" + 
					"<td align='center'><font size='1' face='Arial, Helvetica, sans-serif'>&nbsp;</font></td>" + 
					"</tr>");
					listATC[dCount] = atcCode;
				}
			}
			else if (atcCode.indexOf('WC') != -1) {
				if (atcCode != "WC250" && atcCode != "WC310" && atcCode != "WC340" && atcCode != "WC410" && atcCode != "WC700") {
					$('#tblSched3').html(d.getElementById('tblSched3').innerHTML +
					"<tr>" + 
					"<td><font size='1' face='Arial, Helvetica, sans-serif'>" + atcDesc + "</font></td>" + 
					"<td><font size='1' face='Arial, Helvetica, sans-serif'>" + atcRate + "</font></td>" + 
					"<td align='center'><font size='1' face='Arial, Helvetica, sans-serif'>&nbsp;</font></td>" + 
					"<td align='center'><font size='1' face='Arial, Helvetica, sans-serif'>" + atcCode + "</font></td>" + 
					"</tr>");
					listATC[dCount] = atcCode;
				}
			}
			else {
				$('#tblSched3').html(d.getElementById('tblSched3').innerHTML +
            	"<tr>" + 
				"<td><font size='1' face='Arial, Helvetica, sans-serif'>" + atcDesc + "</font></td>" + 
				"<td><font size='1' face='Arial, Helvetica, sans-serif'>" + atcRate + "</font></td>" + 
				"<td colspan='2' align='center'><font size='1' face='Arial, Helvetica, sans-serif'>" + atcCode + "</font></td>" + 
				"</tr>");
				listATC[dCount] = atcCode;
			}
			dCount++;
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
                d.getElementById('frm1601FQ:cmdValidate').disabled = true;
                d.getElementById('btnSave').disabled = true;
        }

        /*-----Edited by MPISCOSO-----*/
            getATCCode();
            window.setTimeout("loadDataWithATC();",300);                                    
                                    
            /*-------------Find Instances of Dynamic Rows within the XML and add to modal-----------*/
            //5-27-2012
            flag=false; //added param for loading - false
            var count=0;
            var responses = d.getElementById('response').getElementsByTagName('div');
            var sPar = 'chxSchedI'; //'txtAmtIncomePay'; //modal section A      
            
            do {
                if (responses.item(count).innerHTML.indexOf(sPar) != -1) {
                    var temp = String(responses.item(count).innerHTML);
                    temp = temp.substring(0,sPar.length+1); //substring to length of search param for index - check files
                    temp = temp.substring(sPar.length,sPar.length+1); //get the last character for checking
                    if ( !isNaN(temp) ) window.setTimeout("addlistSchedIReload();",300); //if last char is a number, add modal section
                } count++;
            } while (count<responses.length);
            /*--------------------------------------------------------------------------------------*/
            window.setTimeout("loadData();",410);
            window.setTimeout("loadDataATCRow();onchangeATCrow();flag=true;",450); //read onchangeATCrow();
            window.setTimeout("$('#loader').hide('blind');",2000);

		
	}
	
	function loadData() {
		/*This will load data onto fields*/		
		
		var response = d.getElementById("response");
		
        var elem = document.getElementById('frmMain').elements;
		var fieldVal = "";
        for(var i = 0; i < elem.length; i++)
        {
			if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {	//elem[i].type != 'button' &&  			
				if (elem[i].type == 'text' || elem[i].type == 'select-one') {
					if(elem[i].id != 'frm1601FQ:txtAddress2'){
						fieldVal = String( $("#response").html() ).split(elem[i].id+'=');
					}
					else{
						fieldVal = String( $("#response").html() ).split("frm1601FQ:txtAddress=");
					}

						if (fieldVal != null && fieldVal.length > 1) {
							if(elem[i].id == 'frm1601FQ:txtTaxpayerName' || elem[i].id == 'frm1601FQ:txtPg2TaxpayerName'){
								elem[i].value = unescape(fieldVal[1]);
							}
							else if(elem[i].id == 'frm1601FQ:txtAddress'){
								if(fieldVal[1].length <= 100){
									elem[i].value = unescape(fieldVal[1]);
								}
								else {
									elem[i].value = unescape(fieldVal[1].substring(0, 100));
								}
							}
							else if(elem[i].id == 'frm1601FQ:txtAddress2'){
								if(fieldVal[1].length <= 100){
									elem[i].value = '';
								}
								else {
									elem[i].value = unescape(fieldVal[1].substring(100, fieldVal[1].length));
								}
							}
							else if (elem[i].className.indexOf("FinalFlag") > -1) {
                        elem[i].value = typeof (fieldVal[1]) === "undefined" ? "3" : fieldVal[1];
                    	}
						else{
								elem[i].value = fieldVal[1]; //all select-one and text values		 		
						}
					}		 		
				}
				if (elem[i].type == 'radio') {
					var rdoVal = String( $("#response").html() ).split(elem[i].id+'=');				
					if (rdoVal[1] == 'true') {
						elem[i].checked = rdoVal[1];
						
						if (elem[i].id == 'frm1601FQ:CatAgent_P' || elem[i].id == 'frm1601FQ:CatAgent_G') {						
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
			
			}

        } 			
	}	
	
	function loadDataWithATC() {
		/*This will load data onto fields*/
		//window.setTimeout("getATCCode();",105);				
		
		var response = d.getElementById("response");
		
        var elem = document.getElementById('frmMain').elements;
		var fieldVal = "";
        for(var i = 0; i < elem.length; i++)
        {
			
			if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {	//elem[i].type != 'button' &&  			
				if (elem[i].type == 'text' || elem[i].type == 'select-one') {
					if(elem[i].id != 'frm1601FQ:txtAddress2'){
						fieldVal = String( $("#response").html() ).split(elem[i].id+'='); 
					}
					else{
						fieldVal = String( $("#response").html() ).split("frm1601FQ:txtAddress=");
					}
						if (fieldVal != null && fieldVal.length > 1) {
							if(elem[i].id == 'frm1601FQ:txtTaxpayerName' || elem[i].id == 'frm1601FQ:txtPg2TaxpayerName'){
								elem[i].value = unescape(fieldVal[1]);
							}
							else if(elem[i].id == 'frm1601FQ:txtAddress'){
								if(fieldVal[1].length <= 100){
									elem[i].value = unescape(fieldVal[1]);
								}
								else {
									elem[i].value = unescape(fieldVal[1].substring(0, 100));
								}
							}
							else if(elem[i].id == 'frm1601FQ:txtAddress2'){
								if(fieldVal[1].length <= 100){
									elem[i].value = '';
								}
								else {
									elem[i].value = unescape(fieldVal[1].substring(100, fieldVal[1].length));
								}
							}
							else{
								elem[i].value = fieldVal[1]; //all select-one and text values		 		
							}
						}		 		
				}
				if (elem[i].type == 'radio') {
					var rdoVal = String( $("#response").html() ).split(elem[i].id+'=');				
					if (rdoVal[1] == 'true') {
						elem[i].checked = rdoVal[1];
						
						if (elem[i].id == 'frm1601FQ:CatAgent_P' || elem[i].id == 'frm1601FQ:CatAgent_G') {						
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
			}

        } 			
	}
	
	function loadDataATCRow() {
		/*This will load data onto fields*/
		var response = d.getElementById("response");		
        var elem = document.getElementById('frmMain').elements;
		var fieldVal = "";
        for(var i = 0; i < elem.length; i++) {
			
			if (elem[i].type != 'hidden' && elem[i].type != 'undefined') { 
				if (elem[i].type == 'text' || elem[i].type == 'select-one') {
					if(elem[i].id != 'frm1601FQ:txtAddress2'){
						fieldVal = String( $("#response").html() ).split(elem[i].id+'=');
					}
					else{
						fieldVal = String( $("#response").html() ).split("frm1601FQ:txtAddress=");
					}
					elem[i].value = ''; elem[i].selectedIndex = 0;
					if(elem[i].id == 'frm1601FQ:txtTaxpayerName' || elem[i].id == 'frm1601FQ:txtPg2TaxpayerName'){
						elem[i].value = unescape(fieldVal[1]);
					}
					else if(elem[i].id == 'frm1601FQ:txtAddress'){
						if(fieldVal[1].length <= 100){
							elem[i].value = unescape(fieldVal[1]);
						}
						else {
							elem[i].value = unescape(fieldVal[1].substring(0, 100));
						}
					}
					else if(elem[i].id == 'frm1601FQ:txtAddress2'){
						
						if(fieldVal[1].length <= 100){
							elem[i].value = '';
						}
						else {
							elem[i].value = unescape(fieldVal[1].substring(100, fieldVal[1].length));
						}
					}
					else{
						elem[i].value = fieldVal[1]; //all select-one and text values		 		
					}
				}				
			}
        }
		
	}
	function onchangeATCrow() {
		/*This will programatically fire onchange for Select-one in modal*/
		var response = d.getElementById("response");		
        var elem = document.getElementById('frmMain').elements;
        for(var i = 0; i < elem.length; i++) {			
			if ( String(elem[i].id).indexOf('drpTreatyCode') != -1 || String(elem[i].id).indexOf('drpATCCode') != -1 )
				elem[i].onchange();
        }
	}	
	
	function isItAnAmendedReturn(xmlFile) {	
		if(d.getElementById('frm1601FQ:AmendedRtn_1').checked) {
			return true;
		} else {
			return false;
		}		
	}
	
	function isItAFinalCopy(xmlFile) {	
			var fsoXML = new ActiveXObject("Scripting.FileSystemObject");
			fn = fsoXML.OpenTextFile(xmlFile,1);
			var fnContent = fn.ReadAll();
			fn.Close();	

			if (fnContent.indexOf("All Rights Reserved BIR 2012.0") >= 0) {
				return true;
			} else {
				return false;
			}	
	}	
	
    function init()
    {  

        currentPage = 1;
		document.getElementById('frm1601FQ:txtCurrentPage').value = currentPage;
		
        var month = new Date();
		var year3 = new Date();
		d.getElementById('frm1601FQ:txtYear').value = year3.getFullYear();
		
		d.getElementById('frm1601FQ:AmendedRtn_1').disabled = false;
        d.getElementById('frm1601FQ:AmendedRtn_2').disabled = false;
        d.getElementById('frm1601FQ:txtSheets').disabled = false;
        
        d.getElementById('frm1601FQ:txtTaxpayerName').disabled = true;
        d.getElementById('frm1601FQ:drpSpecialTax').disabled = true;

        @if($action != 'view')
        d.getElementById('frm1601FQ:cmdEdit').disabled = true;
		d.getElementById('btnPrint').disabled = true;
		d.getElementById('frm1601FQ:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;
        @else 
        disableAllControl();
        @endif
        $('#tbllistAtcCode').html("");	
		$('#tbodyComputeTax').html("");	
		
        d.getElementById('txtDvTotalSchedI').disabled = true;
        setInputTextControl_HorizontalAlignment("txtDvTotalSchedI",4 );
        
		loadXMLATC('/xml/atcCodes.xml');
        getPrivateWithholdingAgentATC();
		
		loadXMLTreaty('/xml/treatyCodes.xml');		

        for(var i = 0; i < treatyList.length; i++) {
            var treaty = treatyList[i]; //treatyList.get(i);
            TreatynameCode[i] = treaty.treatyCode;
			TreatynameDesc[i] = treaty.treatyDescription;
        }
		
		populateAtcPart2();
	}
	
	var disableElem = true;
	var enableElem = false;
    function disableAllControl()
    {
        d.getElementById('frm1601FQ:OptQuarter1').disabled = true;
        d.getElementById('frm1601FQ:OptQuarter2').disabled = true;
        d.getElementById('frm1601FQ:OptQuarter3').disabled = true;
        d.getElementById('frm1601FQ:OptQuarter4').disabled = true;        
        d.getElementById('frm1601FQ:txtSheets').disabled = true;
        d.getElementById('frm1601FQ:txtTIN1').disabled = true;
        d.getElementById('frm1601FQ:txtTIN2').disabled = true;
        d.getElementById('frm1601FQ:txtTIN3').disabled = true;
        d.getElementById('frm1601FQ:txtBranchCode').disabled = true;
        d.getElementById('frm1601FQ:txtRDOCode').disabled = true;
        d.getElementById('frm1601FQ:txtTaxpayerName').disabled = true;
        d.getElementById('frm1601FQ:txtTelNum').disabled = true;
        d.getElementById('frm1601FQ:txtAddress').disabled = true;
		d.getElementById('frm1601FQ:txtAddress2').disabled = true;
        d.getElementById('frm1601FQ:txtZipCode').disabled = true;
		d.getElementById('txtEmail').disabled = true;
		
		d.getElementById('frm1601FQ:AmendedRtn_1').disabled = true;
        d.getElementById('frm1601FQ:AmendedRtn_2').disabled = true;
        d.getElementById('frm1601FQ:txtYear').disabled = true;
        d.getElementById('frm1601FQ:TaxWithheld_1').disabled = true;
        d.getElementById('frm1601FQ:TaxWithheld_2').disabled = true;
        d.getElementById('frm1601FQ:CatAgent_P').disabled = true;
        d.getElementById('frm1601FQ:CatAgent_G').disabled = true;
        d.getElementById('frm1601FQ:drpSpecialTax').disabled = true;
        d.getElementById('btnAddATCPartII').disabled = true;
		d.getElementById('btnAddSchedI').disabled = true;
		d.getElementById('btnPartIIOtherClear').disabled = true;

		d.getElementById('frm1601FQ:txtPg2TIN1').disabled = true;
        d.getElementById('frm1601FQ:txtPg2TIN2').disabled = true;
        d.getElementById('frm1601FQ:txtPg2TIN3').disabled = true;
        d.getElementById('frm1601FQ:txtPg2BranchCode').disabled = true;
		d.getElementById('frm1601FQ:txtPg2TaxpayerName').disabled = true;

		for(var i = 0; i < 5; i++) {
			d.getElementById('drpTreatyCode'+ i).disabled = true;
			d.getElementById('drpATCCode'+ i).disabled = true;
			d.getElementById('txtAmtIncomePay'+ i).disabled = true;
			d.getElementById('txtRate'+ i).disabled = true;
		}

		d.getElementById('frm1601FQ:txtTax28').disabled = true;
        d.getElementById('frm1601FQ:txtTax29').disabled = true;
		d.getElementById('frm1601FQ:txtTax30').disabled = true;
		
        for(i = 1 ; i <= ((d.getElementById('tblPartIIComputeTax').rows.length + d.getElementById('tblPartIIOtherTax').rows.length)-4) ; i ++)
        {
            d.getElementById('frm1601FQ:txtTaxBase'+i).disabled = true;
        }

        @if($action != 'view')
        d.getElementById('frm1601FQ:cmdValidate').disabled = true;
        d.getElementById('frm1601FQ:cmdEdit').disabled = false;
		d.getElementById('btnPrint').disabled = false;
		d.getElementById('frm1601FQ:btnFinalCopy').disabled = false;
        d.getElementById('btnUpload').disabled = false;
        @endif

        d.getElementById('frm1601FQ:SpecialTax_1').disabled = true;
        d.getElementById('frm1601FQ:SpecialTax_2').disabled = true;
		d.getElementById('frm1601FQ:txtTax23').disabled = true;
		d.getElementById('frm1601FQ:txtTax24').disabled = true;
		d.getElementById('frm1601FQ:txtTax25').disabled = true;

		d.getElementById('txtTaxAgentNo').disabled = true;
		d.getElementById('txtDateIssue').disabled = true;
		d.getElementById('txtDateExpiry').disabled = true;
		d.getElementById('frm1601FQ:txtAgency33').disabled = true;
		d.getElementById('frm1601FQ:txtNumber33').disabled = true;
		d.getElementById('frm1601FQ:txtDate33').disabled = true;
		d.getElementById('frm1601FQ:txtAmount33').disabled = true;
		d.getElementById('frm1601FQ:txtAgency34').disabled = true;
		d.getElementById('frm1601FQ:txtNumber34').disabled = true;
		d.getElementById('frm1601FQ:txtDate34').disabled = true;
		d.getElementById('frm1601FQ:txtAmount34').disabled = true;
		d.getElementById('frm1601FQ:txtAgency35').disabled = true;
		d.getElementById('frm1601FQ:txtNumber35').disabled = true;
		d.getElementById('frm1601FQ:txtDate35').disabled = true;
		d.getElementById('frm1601FQ:txtAmount35').disabled = true;
		d.getElementById('frm1601FQ:txtParticular36').disabled = true;
		d.getElementById('frm1601FQ:txtAgency36').disabled = true;
		d.getElementById('frm1601FQ:txtNumber36').disabled = true;
		d.getElementById('frm1601FQ:txtDate36').disabled = true;
		d.getElementById('frm1601FQ:txtAmount36').disabled = true;
		d.getElementById('frm1601FQ:txtCurrentPage').disabled = true;
		disableElem;
		enableElem;
    }

    function enableAllControl()
    {
		d.getElementById('frm1601FQ:txtSheets').disabled = false;
		
		d.getElementById('frm1601FQ:txtTax23').disabled = false;
		d.getElementById('frm1601FQ:txtTax24').disabled = false;
		d.getElementById('frm1601FQ:txtTax25').disabled = false;

		d.getElementById('frm1601FQ:txtTax28').disabled = false;
        d.getElementById('frm1601FQ:txtTax29').disabled = false;
        d.getElementById('frm1601FQ:txtTax30').disabled = false;
		
        d.getElementById('frm1601FQ:AmendedRtn_1').disabled = false;
        d.getElementById('frm1601FQ:AmendedRtn_2').disabled = false;
        d.getElementById('frm1601FQ:txtYear').disabled = false;
        d.getElementById('frm1601FQ:TaxWithheld_1').disabled = false;
        d.getElementById('frm1601FQ:TaxWithheld_2').disabled = false;
        d.getElementById('frm1601FQ:CatAgent_P').disabled = false;
        d.getElementById('frm1601FQ:CatAgent_G').disabled = false;
        d.getElementById('frm1601FQ:drpSpecialTax').disabled = false;
        d.getElementById('btnAddATCPartII').disabled = false;
		d.getElementById('btnAddSchedI').disabled = false;
		d.getElementById('btnOtherTax').disabled = false;
		
        if(d.getElementById('frm1601FQ:txtAtcCode1').value != ""){
            for(i = 1 ; i <= ((d.getElementById('tblPartIIComputeTax').rows.length + d.getElementById('tblPartIIOtherTax').rows.length)-4) ; i ++){
                d.getElementById('frm1601FQ:txtTaxBase'+i).disabled = false;
            }   
		}
		
        d.getElementById('frm1601FQ:cmdValidate').disabled = false;
        d.getElementById('frm1601FQ:cmdEdit').disabled = true;
		d.getElementById('btnPrint').disabled = true;
		d.getElementById('frm1601FQ:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;
        d.getElementById('frm1601FQ:SpecialTax_1').disabled = false;
		d.getElementById('frm1601FQ:SpecialTax_2').disabled = false;
		
		if (d.getElementById('frm1601FQ:SpecialTax_1').checked == true) {
			for(var i = 0; i < 5; i++) {
				d.getElementById('drpTreatyCode'+ i).disabled = false;
				d.getElementById('drpATCCode'+ i).disabled = false;
				d.getElementById('txtAmtIncomePay'+ i).disabled = false;
				d.getElementById('txtRate'+ i).disabled = false;
			}
		}

        if(d.getElementById('frm1601FQ:AmendedRtn_1').checked) {
			d.getElementById('frm1601FQ:txtTax25').disabled = false;
        } else {
			d.getElementById('frm1601FQ:txtTax25').disabled = true;
        }
		
		if (qs('xmlFileName') != null && qs('xmlFileName').indexOf('.xml') > -1) {
	
		d.getElementById('frm1601FQ:txtYear').disabled = true;
		}
		
		d.getElementById('frm1601FQ:txtCurrentPage').disabled = false;
		disableElem;
		enableElem;
		
		document.getElementById('frm1601FQ:txtTIN1').disabled = true; document.getElementById('frm1601FQ:txtTIN2').disabled = true; document.getElementById('frm1601FQ:txtTIN3').disabled = true; document.getElementById('frm1601FQ:txtBranchCode').disabled = true;
    }
	
	
	var previoustbllistAtcCode=null;
	var tbllistSchedIIAtcCodeFlag = false;
    function enableSelTreaty()
    {
        d.getElementById('frm1601FQ:drpSpecialTax').disabled = false;
		d.getElementById('frm1601FQ:drpSpecialTax').selectedIndex = 1;
		
		//sched 1
		for(var i = 0; i < 5; i++) {
			d.getElementById('drpTreatyCode'+ i).disabled = false;
			d.getElementById('drpTreatyCode'+ i).selectedIndex = 1;
			d.getElementById('drpATCCode'+ i).disabled = false;
			d.getElementById('drpATCCode'+ i).selectedIndex = 1;
			d.getElementById('txtAmtIncomePay'+ i).disabled = false;
			d.getElementById('txtRate'+ i).disabled = false;
		}
		
		var i = d.getElementById('tbllistAtcCode').rows.length + 1;
		
		if (previoustbllistAtcCode==null)
			previoustbllistAtcCode = d.getElementById('tbllistAtcCode').innerHTML;
		
		$('#tbllistAtcCode').html(  d.getElementById('tbllistAtcCode').innerHTML +
            "<tr class='atc'><td width='350px' class='atc'> <input id='AtcCd"+i+"' name='AtcCd"+i+"' type='checkbox' value='N/A' /> N/A </td> <td width='300px' id='AtcNaturePayment"+i+"'  class='atc atcNames'>SPECIAL LAW</td> <td width='90px' id='txtRate"+i+"' class='atc'> 0.0 </td> </tr>");
		tbllistSchedIIAtcCodeFlag = true; 
		}
	
	
    function disableSelTreaty()
    {
        d.getElementById('frm1601FQ:drpSpecialTax').disabled = true;
		d.getElementById('frm1601FQ:drpSpecialTax').selectedIndex = 0;
		
		//sched 1
		for(var i = 0; i < 5; i++) {
			d.getElementById('drpTreatyCode'+ i).disabled = true;
			d.getElementById('drpTreatyCode'+ i).selectedIndex = 0;
			d.getElementById('drpATCCode'+ i).disabled = true;
			d.getElementById('drpATCCode'+ i).selectedIndex = 0;
			d.getElementById('txtAmtIncomePay'+ i).disabled = true;
			d.getElementById('txtAmtIncomePay'+ i).value = (0).toFixed(2);
			d.getElementById('txtRate'+ i).disabled = true;
			d.getElementById('txtRate'+ i).value = (0).toFixed(2);
			d.getElementById('txtReqWithheld'+ i).value = (0).toFixed(2);
			d.getElementById('txtDvTotalSchedI').value = (0).toFixed(2);
		}
    }

    function confirmDisableTreaty() {
        if(confirm("Warning: pressing OK will clear all values in Schedule 1.\nPress OK to do so.")) {
            disableSelTreaty();
            sched1ToCommit = new Array();
            sched1 = new Array();
           
			if (previoustbllistAtcCode!=null)
				$('#tbllistAtcCode').html(previoustbllistAtcCode);
			
            d.getElementById('frm1601FQ:txtTax21').value = (0).toFixed(2);
            computeofTotalWithheldTax();
        } else {
            d.getElementById("frm1601FQ:SpecialTax_1").checked = true;
        }
    }

    var tempATC = new Array();
    var tempATCTaxbase = new Array();
	var tempATCTaxRate = new Array();
    function showPartIIATC()
    {
		tempATC = new Array();
            tempATCTaxbase = new Array();
            //tempATCTaxRate = new Array();
            
            if(d.getElementById('frm1601FQ:txtAtcCode1').value != ""){
                var totalRows = (d.getElementById('tblPartIIComputeTax').rows.length + d.getElementById('tblPartIIOtherTax').rows.length) - 4;
        
                for(var i = 0; i < totalRows; i++) {
                    tempATC[i] = d.getElementById('frm1601FQ:txtAtcCode'+ (i + 1)).value;
                    tempATCTaxbase[i] = d.getElementById('frm1601FQ:txtTaxBase'+(i +1)).value;
                    
                }
            }

            if( checkiftaxwheldisYes() == true )
            {
                d.getElementById('Page1Content').style.display = "none";
                $('#modalAtc').show('blind'); 
                $('#wrapper').css('display', 'none');          
            }else {
                alert(checkiftaxwheldisYes());
            }
	}

	//Show Other Selected ATC modal
    function showOtherSelectedTax(){
		d.getElementById('wrapper').style.display = "none";
            $('#modalOtherAtc').show('blind');
    }

    //Close Other Selected ATC modal
    function closeOtherSelectedTax(){
        d.getElementById('wrapper').style.display = 'block';
        $('#modalOtherAtc').hide('blind');
	}
	
	//populate table ATC
    function populateAtcPart2(){
        $('#tbodyComputeTax').html("");
        var itemNum = 14;
        for(i=1; i <= 6; i++){
            $('#tbodyComputeTax').html(  d.getElementById('tbodyComputeTax').innerHTML +
                "<tr>" +
                "<td><font size='2' style='font-weight:bold; !important'>"+itemNum+"&nbsp;&nbsp;</font></td>"+
                "<td><input type='text' id='frm1601FQ:txtAtcCode"+i+"' name='frm1601FQ:txtAtcCode[]' style='text-align: center; !important' value='' disabled/></td>" +
                "<td align='center'> <input type='text' id='frm1601FQ:txtTaxBase"+i+"' name='frm1601FQ:txtTaxBase[]' style='width:12em; !important; text-align:right' value='' disabled/> </td>" +
                "<td> <input type='text' id='frm1601FQ:txtTaxRate"+i+"' name='frm1601FQ:txtTaxRate[]'  style='text-align: center; width:7em;' value='' disabled /><font size='2' style='font-weight:bold'>%</font></td>"+
                "<td align='center'> <input type='text' id='frm1601FQ:txtTaxbeWithHeld"+i+"' name='frm1601FQ:txtTaxbeWithHeld[]'  style='text-align:right; width:12em; !important' value='0.00' disabled /> </td>" +
                "</tr>") ;
            itemNum++;
        }
	}
	
    function checkiftaxwheldisYes()
    {
        if(d.getElementById('frm1601FQ:TaxWithheld_1').checked == false && d.getElementById('frm1601FQ:TaxWithheld_2').checked == false )
        {
            return "Select any tax withheld on item 4.";
        }
        else if( d.getElementById('frm1601FQ:CatAgent_P').checked == false && d.getElementById('frm1601FQ:CatAgent_G').checked == false  )
        {
            return "Please select an option for Item 11.";
        }
        else if( d.getElementById('frm1601FQ:TaxWithheld_1').checked == true )
        {
            return true;
        }else
        {
            return "Selecting an ATC is not necessary when item no. 4 is set to ' NO '";
        }
    }
    function showAddSchedI()
    {
		if(d.getElementById('frm1601FQ:SpecialTax_2').checked == true)
            {
                alert("You are not availing of tax relief under Special Law or International Tax Treaty. There is no need to\nfill up schedule 1."); return;
            }else if(d.getElementById('frm1601FQ:SpecialTax_1').checked == true )
            {
                if(d.getElementById('frm1601FQ:drpSpecialTax').value == 0)
                {
                    alert("Invalid entry on Item no.13. Please specify a treaty."); return;
                }else {

                    if(d.getElementById('frm1601FQ:TaxWithheld_1').checked == false && d.getElementById('frm1601FQ:TaxWithheld_2').checked == false )
                    {
                        alert("Please select an option for Item 4."); return;
                    }else if(d.getElementById('frm1601FQ:TaxWithheld_2').checked == true)
                    {
                        alert("You have no taxed withheld. There is no need to fill up Schedule 1."); return;
                    }else {
                        
                        d.getElementById('Page1Content').style.display = "none";
                        $('#Page2Content').show('blind');        
                        document.getElementById('frm1601FQ:txtCurrentPage').value = 2;      
                        currentPage = 2;    
                    }
                }
            }
	}

    function changedrpATCList(e)
    {
        var i;
        if(e.value == "P") {   // change ATClist
            getPrivateWithholdingAgentATC();
        } else if(e.value == "G") {
            // change ATClist
            getGovernmentWithholdingAgentATC();
        }
        $('#tbllistAtcCode').html("");
        for(i = 1 ; i < ATCnameCode.length ; i++  )
        {
            $('#tbllistAtcCode').html(d.getElementById('tbllistAtcCode').innerHTML +
                "<tr class='atc'><td width='10%' class='atc'> <input id='AtcCd"+i+"' name='AtcCd"+i+"' type='checkbox' value='"+ATCnameCode[i]+"' /> "+ATCnameCode[i]+ " </td> <td width='85%' id='AtcNaturePayment"+i+"'  class='atc atcNames'>"+ NaturePayment[i]+ " </td> <td width='5%' class='atc' id='tbllistAtcCode:txtRate"+i+"'> " + taxRate[i] + "</td> </tr>");
        }	
		
    }
    
    var ATCnameCode = new Array() ;
    var NaturePayment = new Array() ;
    var taxRate = new Array();
    function getPrivateWithholdingAgentATC() {
        ATCnameCode = new Array() ;
        NaturePayment = new Array() ;
        taxRate = new Array();

        //var atcSize = atcList.getSize();
		var atcSize = atcList.length;
	
        var i = 0;
        var j = 1;
        for(i = 0; i < atcSize; i++) {
            //var atc = atcList.get(i);
			var atc = atcList[i];
			if(atc.formType == "1601FQ" && atc.category == 'P') {			
                ATCnameCode[j] = atc.atcCode;
                NaturePayment[j] = atc.description;
                taxRate[j++] = atc.rate;				
            }
        } 
    }
    
    function getGovernmentWithholdingAgentATC() {
        ATCnameCode = new Array() ;
        NaturePayment = new Array() ;
        taxRate = new Array();

        //var atcSize = atcList.getSize(); 
		var atcSize = atcList.length;
		
        var i;
        var j=1;
        for(i = 0; i < atcSize; i++) {
            var atc = atcList[i];
            //if(atc.getFormType() == "1601F" && atc.getCategory() == 'G') {
            if(atc.formType == "1601FQ" && atc.category == 'G') {    
                ATCnameCode[j] = atc.atcCode;
                NaturePayment[j] = atc.description;
                taxRate[j++] = atc.rate;		
            }
        }
    }

    function cancelPartIIATC() {
        d.getElementById('Page1Content').style.display = 'block';
		if ( $('#modalAtc').css('display') != 'none' ) {
			$('#modalAtc').hide('blind');
            $('#wrapper').css('display', 'block');
		}		
        $('#DummyTxt').html("Creator");
        $('#DummyTxt').html("");
        for(i =1 ; i < d.getElementById('tbllistAtcCode').rows.length; i++) {
            if(ATCCodeList[i] != null) {
                d.getElementById('AtcCd'+i).checked = ATCCodeList[i];
            } else {
                d.getElementById('AtcCd'+i).checked = false;
            }
        }
			
    }
	
	function setInputTextControl_HorizontalAlignment(id,align) {
		if (d.getElementById(id) != null) {
		//d.getElementById(id).textIndent = parseInt(align);
		d.getElementById(id).style.textAlign = "right";
		}
	}
	function setInputTextControl_NumberFormatter(id,limit,deci) {
		d.getElementById(id).size = parseInt(limit);
		d.getElementById(id).value = parseFloat(d.getElementById(id).value).toFixed( parseInt(deci) );		
	}	
	
    var ATCCodeList = new Array();
    function getATCCode()
    {
    try{    
		var listATCtable = d.getElementById('tbllistAtcCode');
		$('#tbodyComputeTax').html("");
		$('#tbodyOtherTax').html("");
		var countAtcChecked = 0;
        var itemNum = 13;
        var itemNum2 = 0;

		//just need to get the total checked rows 
        for(i = 1 ; i <= listATCtable.rows.length; i++){
            if (d.getElementById('AtcCd'+i).checked == true ){
                countAtcChecked ++;
            }
        }
        if(countAtcChecked < 7){
            d.getElementById('lblOtherTax').style.visibility = "hidden";
			var table = d.getElementById("tblPartIIComputeTax");
            var iCtr = table.rows.length; iCtr--; 
            for(i = 1 ; i <= listATCtable.rows.length; i++ ){
                ATCCodeList[i] = d.getElementById('AtcCd'+i).checked;
                if (d.getElementById('AtcCd'+i).checked == true ){
                    itemNum ++;
                    var taxbasetemp = "";
                    for(var tempCount = 0 ; tempCount < tempATC.length; tempCount++) {
                        if(tempATC[tempCount] == d.getElementById('AtcCd'+i).value){
                            taxbasetemp = tempATCTaxbase[tempCount];
                            break;
                        }
                    }
                    $('#tbodyComputeTax').html(  d.getElementById('tbodyComputeTax').innerHTML +
                        "<tr>" +
                        "<td><font size='2' style='font-weight:bold; !important'>"+itemNum+"&nbsp;&nbsp;</font></td>"+
                        "<td><input type='text' id='frm1601FQ:txtAtcCode"+iCtr+"' name='frm1601FQ:txtAtcCode[]' style='text-align: center; !important' value='"+ d.getElementById('AtcCd'+i).value + "' disabled/></td>" +
                        "<td align='center'> <input type='text' id='frm1601FQ:txtTaxBase"+iCtr+"' name='frm1601FQ:txtTaxBase[]'  style='width:12em; !important; text-align:right' onkeypress='return numbersonly(this, event)' onblur='round(this,2); getRequiredWithheld("+iCtr+"); computeofTotalWithheldTax()' value='"+ taxbasetemp + "'/> </td>" +
                        "<td> <input type='text' id='frm1601FQ:txtTaxRate"+iCtr+"' name='frm1601FQ:txtTaxRate[]'  style='text-align: center; width:7em;' onkeypress='return numbersonly(this, event)' onblur='round(this,2); getRequiredWithheld("+iCtr+"); computeofTotalWithheldTax()' value='"+ d.getElementById('tbllistAtcCode:txtRate'+i).innerHTML +"' disabled /><font size='2' style='font-weight:bold'>%</font></td>"+
                        "<td align='center'> <input type='text' id='frm1601FQ:txtTaxbeWithHeld"+iCtr+"' name='frm1601FQ:txtTaxbeWithHeld[]'  style='text-align:right; width:12em; !important' value='0.00' disabled /> </td>" +
                        "</tr>") ;
                    setTimeout("d.getElementById('frm1601FQ:txtAtcCode"+iCtr+"').disabled = true; setInputTextControl_HorizontalAlignment('frm1601FQ:txtTaxBase"+iCtr+"', 4);" +
                    "d.getElementById('frm1601FQ:txtTaxbeWithHeld"+iCtr+"').disabled = true;setInputTextControl_HorizontalAlignment('frm1601FQ:txtTaxbeWithHeld"+iCtr+"', 4);" +
                    "d.getElementById('frm1601FQ:txtTaxRate"+iCtr+"').disabled = true;setInputTextControl_HorizontalAlignment('frm1601FQ:txtTaxRate"+iCtr+"', 4);" +
                        "getRequiredWithheld("+iCtr+");", 100);

                    if (d.getElementById('AtcCd'+i).value == "N/A") {
                        setTimeout("d.getElementById('frm1601FQ:txtTaxRate"+iCtr+"').disabled = false;", 100);
                    }
                    waitstr = setTimeout("setInputTextControl_NumberFormatter('frm1601FQ:txtTaxBase"+iCtr+"', 15, 2); d.getElementById('frm1601FQ:txtTaxBase"+iCtr+"').value = '" + taxbasetemp + "'" , 100);
                    waitstr = setTimeout("setInputTextControl_NumberFormatter('frm1601FQ:txtTaxbeWithHeld"+iCtr+"', 15, 2); getRequiredWithheld(" + iCtr + ");", 100);
					iCtr++;
                }
            }
            if(itemNum < 20){
                for(i=iCtr; i <= 6; i++){
                    itemNum++;
                    $('#tbodyComputeTax').html(  d.getElementById('tbodyComputeTax').innerHTML +
                    "<tr>" +
                    "<td><font size='2' style='font-weight:bold; !important'>"+itemNum+"&nbsp;&nbsp;</font></td>"+
                    "<td><input type='text' id='frm1601FQ:txtAtcCode"+i+"' name='frm1601FQ:txtAtcCode[]' style='text-align: center; !important' value='' disabled/></td>" +
                    "<td align='center'> <input type='text' id='frm1601FQ:txtTaxBase"+i+"' name='frm1601FQ:txtTaxBase[]'  style='width:12em; !important; text-align:right' value='' disabled/> </td>" +
                    "<td> <input type='text' id='frm1601FQ:txtTaxRate"+i+"' name='frm1601FQ:txtTaxRate[]'  style='text-align: center; width:7em;' value='' disabled /><font size='2' style='font-weight:bold'>&nbsp;%</font></td>"+
                    "<td align='center'> <input type='text' id='frm1601FQ:txtTaxbeWithHeld"+i+"' name='frm1601FQ:txtTaxbeWithHeld[]'  style='text-align:right; width:12em; !important' value='0.00' disabled /> </td>" +
                    "</tr>") ;
                }
            }

        }else{
            countAtcChecked = 0;
            d.getElementById('lblOtherTax').style.visibility = "visible";
            var table1 = d.getElementById("tblPartIIComputeTax");
            var iCtr1 = table1.rows.length; iCtr1--;
            var table2 = d.getElementById("tblPartIIOtherTax");
            var iCtr2 = table2.rows.length; iCtr2 += 5;
            for(i = 1 ; i <= listATCtable.rows.length; i++ ){
                ATCCodeList[i] = d.getElementById('AtcCd'+i).checked;

                // check if checked id'ed ATC
                if (d.getElementById('AtcCd'+i).checked == true ){
                    countAtcChecked ++;
                    itemNum ++;
                    var taxbasetemp = "";
                    for(var tempCount = 0 ; tempCount < tempATC.length; tempCount++) {
                        if(tempATC[tempCount] == d.getElementById('AtcCd'+i).value){
                            taxbasetemp = tempATCTaxbase[tempCount];
                            break;
                        }
                    }

                    if(countAtcChecked <= 6){
                        $('#tbodyComputeTax').html(  d.getElementById('tbodyComputeTax').innerHTML +
                            "<tr>" +
                            "<td><font size='2' style='font-weight:bold; !important'>"+itemNum+"&nbsp;&nbsp;</font></td>"+
                            "<td><input type='text' id='frm1601FQ:txtAtcCode"+iCtr1+"' name='frm1601FQ:txtAtcCode[]' style='text-align: center; !important' value='"+ d.getElementById('AtcCd'+i).value + "' disabled/></td>" +
                            "<td align='center'> <input type='text' id='frm1601FQ:txtTaxBase"+iCtr1+"' name='frm1601FQ:txtTaxBase[]'  style='width:12em; !important; text-align:right' onkeypress='return numbersonly(this, event)' onblur='round(this,2); getRequiredWithheld("+iCtr1+"); computeofTotalWithheldTax()' value='"+ taxbasetemp + "'/> </td>" +
                            "<td> <input type='text' id='frm1601FQ:txtTaxRate"+iCtr1+"'  name='frm1601FQ:txtTaxRate[]' style='text-align: center; width:7em;' onkeypress='return numbersonly(this, event)' onblur='round(this,2); getRequiredWithheld("+iCtr1+"); computeofTotalWithheldTax()' value='"+ d.getElementById('tbllistAtcCode:txtRate'+i).innerHTML +"' disabled /><font size='2' style='font-weight:bold'>&nbsp;%</font></td>"+
                            "<td align='center'> <input type='text' id='frm1601FQ:txtTaxbeWithHeld"+iCtr1+"' name='frm1601FQ:txtTaxbeWithHeld[]'  style='text-align:right; width:12em; !important' value='0.00' disabled /> </td>" +
                            "</tr>") ;
                        setTimeout("d.getElementById('frm1601FQ:txtAtcCode"+iCtr1+"').disabled = true; setInputTextControl_HorizontalAlignment('frm1601FQ:txtTaxBase"+iCtr1+"', 4);" +
                        "d.getElementById('frm1601FQ:txtTaxbeWithHeld"+iCtr1+"').disabled = true;setInputTextControl_HorizontalAlignment('frm1601FQ:txtTaxbeWithHeld"+iCtr1+"', 4);" +
                        "d.getElementById('frm1601FQ:txtTaxRate"+iCtr1+"').disabled = true;setInputTextControl_HorizontalAlignment('frm1601FQ:txtTaxRate"+iCtr1+"', 4);" +
                            "getRequiredWithheld("+iCtr1+");", 100);

                        if (d.getElementById('AtcCd'+i).value == "N/A") {
                            setTimeout("d.getElementById('frm1601FQ:txtTaxRate"+iCtr1+"').disabled = false;", 100);
                        }
                        waitstr = setTimeout("setInputTextControl_NumberFormatter('frm1601FQ:txtTaxBase"+iCtr1+"', 15, 2); d.getElementById('frm1601FQ:txtTaxBase"+iCtr1+"').value = '" + taxbasetemp + "'" , 100);
                        waitstr = setTimeout("setInputTextControl_NumberFormatter('frm1601FQ:txtTaxbeWithHeld"+iCtr1+"', 15, 2); getRequiredWithheld(" + iCtr1 + ");", 100);
						iCtr1++;
                    }else{
                        itemNum2 ++;
                        $('#tbodyOtherTax').html(  d.getElementById('tbodyOtherTax').innerHTML +
                        "<tr>" +
                        "<td><font size='2' style='font-weight:bold; !important'>"+itemNum2+"&nbsp;&nbsp;</font></td>"+
                        "<td><input type='text' id='frm1601FQ:txtAtcCode"+iCtr2+"' name='frm1601FQ:txtAtcCode[]' style='text-align: center; !important' value='"+ d.getElementById('AtcCd'+i).value + "' disabled/>&nbsp;&nbsp;&nbsp;</td>" +
                        "<td align='center'> <input type='text' id='frm1601FQ:txtTaxBase"+iCtr2+"' name='frm1601FQ:txtTaxBase[]'  style='width:12em; !important; text-align:right' onkeypress='return numbersonly(this, event)' onblur='round(this,2); getRequiredWithheld("+iCtr2+"); computeofTotalWithheldTax(); computeTotalOtherWithheldTax()' value='"+ taxbasetemp + "'/> </td>" +
                        "<td> <input type='text' id='frm1601FQ:txtTaxRate"+iCtr2+"' name='frm1601FQ:txtTaxRate[]'  style='text-align: center; width:7em;' onkeypress='return numbersonly(this, event)' onblur='round(this,2); getRequiredWithheld("+iCtr2+"); computeofTotalWithheldTax(); computeTotalOtherWithheldTax()' value='"+ d.getElementById('tbllistAtcCode:txtRate'+i).innerHTML +"' disabled /><font size='2' style='font-weight:bold'>&nbsp;%</font>&nbsp;&nbsp;&nbsp;&nbsp;</td>"+
                        "<td align='center'> <input type='text' id='frm1601FQ:txtTaxbeWithHeld"+iCtr2+"' name='frm1601FQ:txtTaxbeWithHeld[]'  style='text-align:right; width:12em; !important' value='0.00' disabled /> </td>" +
                        "</tr>") ;
                    setTimeout("d.getElementById('frm1601FQ:txtAtcCode"+iCtr2+"').disabled = true; setInputTextControl_HorizontalAlignment('frm1601FQ:txtTaxBase"+iCtr2+"', 4);" +
                    "d.getElementById('frm1601FQ:txtTaxbeWithHeld"+iCtr2+"').disabled = true;setInputTextControl_HorizontalAlignment('frm1601FQ:txtTaxbeWithHeld"+iCtr2+"', 4);" +
                    "d.getElementById('frm1601FQ:txtTaxRate"+iCtr2+"').disabled = true;setInputTextControl_HorizontalAlignment('frm1601FQ:txtTaxRate"+iCtr2+"', 4);" +
                        "getRequiredWithheld("+iCtr2+");", 100);

                    if (d.getElementById('AtcCd'+i).value == "N/A") {
                        setTimeout("d.getElementById('frm1601FQ:txtTaxRate"+iCtr2+"').disabled = false;", 100);
                    }
                    waitstr = setTimeout("setInputTextControl_NumberFormatter('frm1601FQ:txtTaxBase"+iCtr2+"', 15, 2); d.getElementById('frm1601FQ:txtTaxBase"+iCtr2+"').value = '" + taxbasetemp + "'" , 100);
                    waitstr = setTimeout("setInputTextControl_NumberFormatter('frm1601FQ:txtTaxbeWithHeld"+iCtr2+"', 15, 2); getRequiredWithheld(" + iCtr2 + ");", 100);
					iCtr2++;
                    }
                }
            }
        }
		setTimeout("computeofTotalWithheldTax()", 200); 
		setTimeout("computeTotalOtherWithheldTax()", 100);
        cancelPartIIATC();
	} catch (e) {
		alert('exception : '+e.message);
	}
	}
    
    function blockletter(e)
    {
        var number = parseFloat(e.value).toFixed(2);
        if(isNaN(number)) {
            //var zero = 0;
            //e.value = parseFloat(zero).toFixed(2);
            e.value = "";
        } else {
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
            e.value = '' + number.toFixed(0);
        }
    }

    function cancelAllCompute()
    {
        if( (d.getElementById("tblPartIIComputeTax").rows.length - 1) >= 1 )
        {
            var answer = confirm("You are about to change the value to 'No'. Doing this will clear the entries in Part II and Schedule II. ")
            if(answer)
            {
                //d.getElementById('tbodyComputeTax').value = ""; 
				$('#tbodyComputeTax').html("");
				$('#tbodyOtherTax').html("");
				d.getElementById('lblOtherTax').style.visibility = "hidden";
				populateAtcPart2();
                for(i =1 ; i < d.getElementById('tbllistAtcCode').rows.length; i++) {
					d.getElementById('AtcCd'+i).checked = false;}
				computeofTotalWithheldTax();
				computeTotalOtherWithheldTax();
				
            }else{
                d.getElementById('frm1601FQ:TaxWithheld_1').checked = true;
            }
        }
    }

    function getRequiredWithheld(numIndex)
    {   
        d.getElementById('frm1601FQ:txtTaxbeWithHeld'+numIndex).value = formatCurrency(NumWithComma(d.getElementById('frm1601FQ:txtTaxBase'+numIndex).value) * NumWithComma(d.getElementById('frm1601FQ:txtTaxRate'+numIndex).value) / 100 );
		computeofTotalWithheldTax();
    }
	
    function computeofTotalWithheldTax()
    {
        var i;
		var totalsum = 0;
		var totalRows = ((d.getElementById('tblPartIIComputeTax').rows.length + d.getElementById('tblPartIIOtherTax').rows.length)-4);
        for(i = 1 ; i <= totalRows ; i ++)
        { 
            var taxwithheld = NumWithComma(d.getElementById('frm1601FQ:txtTaxbeWithHeld'+i).value)*1 ;
            totalsum = totalsum*1 + NumWithComma(d.getElementById('frm1601FQ:txtTaxbeWithHeld'+i).value)*1;
        } 
        d.getElementById('frm1601FQ:txtTax20').value = formatCurrency(totalsum);
		
        d.getElementById('frm1601FQ:txtTax22').value = formatCurrency(NumWithComma(d.getElementById('frm1601FQ:txtTax20').value)*1 + NumWithComma(d.getElementById('frm1601FQ:txtTax21').value)*1);
		
		d.getElementById('frm1601FQ:txtTax26').value = formatCurrency(NumWithComma(d.getElementById('frm1601FQ:txtTax23').value)*1 + NumWithComma(d.getElementById('frm1601FQ:txtTax24').value)*1 + NumWithComma(d.getElementById('frm1601FQ:txtTax25').value)*1);

		d.getElementById('frm1601FQ:txtTax27').value = formatCurrency(NumWithComma(d.getElementById('frm1601FQ:txtTax22').value)*1 - NumWithComma(d.getElementById('frm1601FQ:txtTax26').value)*1);
      
		d.getElementById("frm1601FQ:txtTax31").value = formatCurrency(NumWithComma(d.getElementById('frm1601FQ:txtTax28').value)*1 + NumWithComma(d.getElementById('frm1601FQ:txtTax29').value)*1 + NumWithComma(d.getElementById('frm1601FQ:txtTax30').value)*1);
		d.getElementById("frm1601FQ:txtTax32").value = formatCurrency(NumWithComma(d.getElementById('frm1601FQ:txtTax27').value)*1 + NumWithComma(d.getElementById('frm1601FQ:txtTax31').value)*1);
		capital();
	}

	function computeTotalOtherWithheldTax()
	{
        var totalOtherTax = 0;
        var totalOtherTaxRows = ((d.getElementById('tblPartIIComputeTax').rows.length + d.getElementById('tblPartIIOtherTax').rows.length)-4);
        for(var i = 7 ; i <= totalOtherTaxRows ; i ++)
        {
            totalOtherTax = totalOtherTax + NumWithComma(d.getElementById('frm1601FQ:txtTaxbeWithHeld'+i).value);
        }
        d.getElementById('frm1601FQ:txtTotalOtherTax').value = formatCurrency(totalOtherTax);
    }

	function computePenalties()
	{
        var tax31 = formatCurrency(NumWithComma(d.getElementById("frm1601FQ:txtTax28").value)*1 + NumWithComma(d.getElementById("frm1601FQ:txtTax29").value)*1 + NumWithComma(d.getElementById("frm1601FQ:txtTax30").value)*1);
        d.getElementById("frm1601FQ:txtTax31").value = formatCurrency(tax31);
	computeofTotalWithheldTax();
        
    }
	
    function addlistSchedIReload()
    {   
        var size = sched1ToCommit.length;
        for(var i = 0 ; i < size ; i++)
        {   
            
            sched1ToCommit[i].TxtAmtIncomePayment = d.getElementById('txtAmtIncomePay'+i).value;
            sched1ToCommit[i].TxtTaxRate = d.getElementById('txtRate'+i).value;
            sched1ToCommit[i].TxtRequiredWithheld = d.getElementById('txtReqWithheld'+i).value;
        }
        i = sched1ToCommit.length;
        sched1ToCommit[i] = new Schedule1();
      
        for(i = 0; i < sched1ToCommit.length; i++) {
		
		
			$('#tbodyllistSchedI').html(  d.getElementById('tbodyllistSchedI').innerHTML + "<tr>" +
            //d.getElementById("tbodyllistSchedI").innerHTML += "<tr>" +
                "<td width='4%'> <input type='checkbox' class='printButtonClass' id='chxSchedI"+i+"' name='chxSchedI[]' /> </td>" +
                "<td width='20%' align='left'> <select  id='drpTreatyCode"+i+"' name='drpTreatyCode[]' style='width: 150px' onchange='setTreatyCodeSched1("+i+")' ></select> </td>" +
                "<td width='40%' align='left'> <select id='drpATCCode"+i+"' name='drpATCCode[]'  style='width: 280px' onchange='setATCCodeSched1("+i+");getATCdrpTaxRateReload("+i+");getReqWithheldCompute("+i+");'  ></select></td> " +
                "<td width='13%' align='right'><input type='text' style='width: 95%' id='txtAmtIncomePay"+i+"' name='txtAmtIncomePay[]'   value='"+ sched1ToCommit[i].TxtAmtIncomePayment +"' size='17' maxlength='25' onkeypress='return numbersonly(this, event)' onblur='round(this,2);getReqWithheldCompute("+i+")'  /> </td> " +
                "<td width='8%' align='right'><input type='text' id='txtRate"+i+"' name='txtRate[]'   value='"+ sched1ToCommit[i].TxtTaxRate +"' size='6' onblur='round(this,2);getReqWithheldCompute("+i+")' maxlength='10' onkeypress='return numbersonly(this, event)' style='width: 95%' /> </td>" +
                "<td width='15%' align='right'><input type='text'  name='txtReqWithheld[]'  style='background-color: rgb(220, 220, 220); width: 95%' id='txtReqWithheld"+i+"' value='"+ sched1ToCommit[i].TxtRequiredWithheld +"' size='17' maxlength='25'   /> </td> ") ;

            addTreatyCodeInDropDown(i, sched1ToCommit[i].SelTreatyCode);
            addATCCodeInDropDown(i, sched1ToCommit[i].SelATC);
            setTimeout("d.getElementById('txtReqWithheld"+i+"').disabled = true;" +
                "setInputTextControl_HorizontalAlignment('txtReqWithheld"+i+"',4 ); setInputTextControl_NumberFormatter('txtReqWithheld"+i+"',17,2); d.getElementById('txtReqWithheld"+i+"').value = '" + sched1ToCommit[i].TxtRequiredWithheld + "';" +
                "setInputTextControl_HorizontalAlignment('txtRate"+i+"',4 ); setInputTextControl_NumberFormatter('txtRate"+i+"',17,2); d.getElementById('txtRate"+i+"').value = '" + sched1ToCommit[i].TxtTaxRate + "';" +
                "setInputTextControl_HorizontalAlignment('txtAmtIncomePay"+i+"',4 ); setInputTextControl_NumberFormatter('txtAmtIncomePay"+i+"',17,2); d.getElementById('txtAmtIncomePay"+i+"').value = '" +  sched1ToCommit[i].TxtAmtIncomePayment + "';",100);

            if(disabledSchedField == "disabled") {
                setTimeout("d.getElementById('chxSchedI"+i+"').disabled = true;", 100);
                setTimeout("d.getElementById('drpTreatyCode"+i+"').disabled = true;", 100);
                setTimeout("d.getElementById('drpATCCode"+i+"').disabled = true;", 100);
                setTimeout("d.getElementById('txtAmtIncomePay"+i+"').disabled = true;", 100);
                setTimeout("d.getElementById('txtRate"+i+"').disabled = true;", 100);
                setTimeout("d.getElementById('txtReqWithheld"+i+"').disabled = true;", 100);
            }
        }       
    }	

    function computeSched1() {

        d.getElementById('frm1601FQ:txtTax21').value = formatCurrency(NumWithComma(d.getElementById("txtDvTotalSchedI").value));
        computeofTotalWithheldTax();
    }

    function ifRequirementMeetSched1()
    {   var rowSize = d.getElementById('tbllistSchedI');
        
        for(var i = 0 ; i < ( rowSize.rows.length - 1); i++)
        {   
            if(d.getElementById('drpTreatyCode'+ i).value == "-") {
                alert("Please choose a Treaty Code from the list."); return;
            }
            if(d.getElementById('drpATCCode'+ i).value == "-") {
                alert("Please choose an ATC Code from the list."); return;
            }
            if(d.getElementById('txtAmtIncomePay'+ i).value == 0) {
                alert("Please enter Amount of Income Payment."); return;
            }
        }
        return true;
    }
    
    function getATCdrpTaxRate(i) {
        for(var j = 0; j < ATCnameCode.length ; j++) {
            if(d.getElementById('drpATCCode'+i).value == ATCnameCode[j]) {
                d.getElementById('txtRate'+i).value = (taxRate[j] *1 ).toFixed(2); return;
            } else {
                d.getElementById('txtRate'+i).value =  "0.00";
            }

        }
    }

	function getATCdrpNaturePayment(i) {
        for(var j = 0; j < ATCnameCode.length ; j++) {
            if(d.getElementById('drpATCCode'+i).value == ATCnameCode[j]) {
                d.getElementById('txtNatIncPayment'+i).value = (NaturePayment[j]); return;
            } else {
                d.getElementById('txtNatIncPayment'+i).value =  "-";
            }

        }
    }
	
    function getATCdrpTaxRateReload(i) {
        for(var j = 0; j < ATCnameCode.length ; j++) { //xxx
			 d.getElementById('txtRate'+i).value = d.getElementById('txtRate'+i).value;
        }
    }	

    function getReqWithheldCompute(numIndex) {
        d.getElementById('txtReqWithheld'+numIndex).value = formatCurrency(NumWithComma(d.getElementById('txtAmtIncomePay'+numIndex).value) * NumWithComma(d.getElementById('txtRate'+numIndex).value) / 100 );
        getTotalTaxWithheld();
    }

    function getTotalTaxWithheld() {
        var tblrow = d.getElementById('tbllistSchedI');
        var totalSum = 0; 
        for(var i = 0; i < tblrow.rows.length - 1 ; i++)
        {   
            totalSum = ( totalSum * 1 +  NumWithComma(d.getElementById('txtReqWithheld'+i).value) *1 );
        } 
		d.getElementById('txtDvTotalSchedI').value = formatCurrency(totalSum * 1); 
		
		computeSched1();
    }

	function clearpart2(){
		if (d.getElementById('btnPartIIOtherClear').disabled == false) {
			for(i = 7 ; i < ( d.getElementById('tblPartIIOtherTax').rows.length+5) ; i ++)
        	{
    	        d.getElementById('frm1601FQ:txtTaxBase'+i).value = "";
				d.getElementById('frm1601FQ:txtTaxbeWithHeld'+i).value = formatCurrency(0.00);
    	    }
        	d.getElementById('frm1601FQ:txtTotalOtherTax').value = formatCurrency(0.00);
    	    computeofTotalWithheldTax();
		}
	}

    function validate()
    {   var dt = new Date(); 
        if(d.getElementById('frm1601FQ:txtYear').value == "")
        {
            alert("Please enter a valid year on Item 1."); return;
        }
		if (document.getElementById("frm1601FQ:txtYear").value > dt.getFullYear()) 
		{
			alert("Invalid entry on Item 1. Entry should not be a future date."); return;
		}

        if( d.getElementById('frm1601FQ:txtYear').value*1 < 2018)
        {
            alert("Invalid date entry on Item no.1. Entry should not be lower than 2018.")
            return;
		}
		//Validate Quarter
        if(d.getElementById('frm1601FQ:OptQuarter1').checked){
            if(d.getElementById('frm1601FQ:txtYear').value < dt.getFullYear()){
                d.getElementById('frm1601FQ:OptQuarter1').checked = true;
        	}else{
            	if(dt.getMonth() >= 2){
           	    	d.getElementById('frm1601FQ:OptQuarter1').checked = true;
            	}else{
             		alert("Unable to select first Quarter due to the current date. Payment should be made after the Quarter");
            		d.getElementById('frm1601FQ:OptQuarter1').checked = false;
                	return;
            	}
        	} 
        }else if(d.getElementById('frm1601FQ:OptQuarter2').checked){
            if(d.getElementById('frm1601FQ:txtYear').value < dt.getFullYear()){
                d.getElementById('frm1601FQ:OptQuarter2').checked = true;
            }else{
                if(dt.getMonth() >= 6){
                    d.getElementById('frm1601FQ:OptQuarter2').checked = true;
            	}else{
            	    alert("Unable to select second Quarter due to the current date. Payment should be made after the Quarter");
            	    d.getElementById('frm1601FQ:OptQuarter2').checked = false;
            	    return;
        	    }
        	} 
        }else if(d.getElementById('frm1601FQ:OptQuarter3').checked){
            if(d.getElementById('frm1601FQ:txtYear').value < dt.getFullYear()){
                d.getElementById('frm1601FQ:OptQuarter3').checked = true;
            }else{
                if(dt.getMonth() >= 9){
                    d.getElementById('frm1601FQ:OptQuarter3').checked = true;
           		}else{
           		    alert("Unable to select third Quarter due to the current date. Payment should be made after the Quarter");
           		    d.getElementById('frm1601FQ:OptQuarter3').checked = false;
                	return;
            	}
        	}
        }else if(d.getElementById('frm1601FQ:OptQuarter4').checked){
            if(d.getElementById('frm1601FQ:txtYear').value < dt.getFullYear()){
				d.getElementById('frm1601FQ:OptQuarter4').checked = true;
        	}else{
            	alert("Unable to select fourth Quarter due to the current date. Payment should be made after the Quarter");
        		d.getElementById('frm1601FQ:OptQuarter4').checked = false;
            	return;
        	} 
        }else{
            alert("Please select Quarter on Item 2");
            return;
		}
		
        if(d.getElementById('frm1601FQ:TaxWithheld_1').checked == false && d.getElementById('frm1601FQ:TaxWithheld_2').checked == false )
        {
            alert( "Please select an option for Item 4.");
            return;
        }	
		
        if( (d.getElementById('frm1601FQ:txtTIN1').value == "" || d.getElementById('frm1601FQ:txtTIN2').value == "" || d.getElementById('frm1601FQ:txtTIN3').value == "" || d.getElementById('frm1601FQ:txtBranchCode').value == "")  )
        {
            alert("Please enter a valid TIN number on Item 6.");
            return;
        }		
       	
       
		if( (d.getElementById('frm1601FQ:txtTaxpayerName').value == "")  )
        {
            alert("Please enter a valid Taxpayer Name on Item 8.");
            return;
        }
		if( (d.getElementById('frm1601FQ:txtTelNum').value == "")  )
        {
            alert("Please enter a valid Telephone Number on Item 10.");
            return;
        }			
		if( (d.getElementById('frm1601FQ:txtAddress').value == "")  )
        {
            alert("Please enter Taxpayer's Registered Address on Item 9.");
            return;
        }		
		if( (d.getElementById('frm1601FQ:txtZipCode').value == "")  )
        {
            alert("Please enter Taxpayer's Zip Code on Item 9A.");
            return;
		}
		if( (d.getElementById('txtEmail').value == "")  )
        {
            alert("Please enter Email Address on Item 12.");
            return;
		}
        if( d.getElementById('frm1601FQ:CatAgent_P').checked == false && d.getElementById('frm1601FQ:CatAgent_G').checked == false  )
        {
            alert("Please select an option for Item 11.");
            return;
        }
       
		if( d.getElementById('frm1601FQ:TaxWithheld_1').checked == true ) 
		{
			var totalsum = 0;
			var totalRows = ((d.getElementById('tblPartIIComputeTax').rows.length + d.getElementById('tblPartIIOtherTax').rows.length)-4);
        	for(var i = 1 ; i <= totalRows ; i ++)
        	{ 
				if( d.getElementById('frm1601FQ:txtAtcCode'+i).value != "") {				    
                    if( d.getElementById('frm1601FQ:txtTaxBase'+ i).value == "" ) {
					    alert("Please enter a valid value for tax base for " + d.getElementById('frm1601FQ:txtAtcCode'+i).value + "." )
                        //alert("Please enter a valid value for tax base for " + d.getElementById('AtcCd'+indexwithheld).value + "." )
                        return;
                    }
                    if( d.getElementById('frm1601FQ:txtTaxBase'+ i).value <= 0 ) {
                        //alert("Please enter Tax Base for ATC " + d.getElementById('AtcCd'+ indexwithheld).value + ".")
						alert("Please enter Tax Base for ATC " + d.getElementById('frm1601FQ:txtAtcCode'+i).value + ".")
                        return;
                    }
                }
        	} 
		}
        if(d.getElementById('frm1601FQ:SpecialTax_1').checked == true )
        {
            if(d.getElementById('frm1601FQ:drpSpecialTax').value == 0)
            {
                alert("Invalid entry on Item no.13A. Please specify a treaty."); 
                return;
            }
            if(d.getElementById('tbllistSchedI').rows.length < 2)
            {
                alert("Please fill up Schedule 1."); 
                return;
            }
        }
        disableAllControl();

        alert("Validation successful. Click on Edit if you wish to modify your entries.");
		return;
    }
	
	function initialValidateBeforeSave() {
			if( (d.getElementById('frm1601FQ:txtTIN1').value == "" || d.getElementById('frm1601FQ:txtTIN2').value == "" || d.getElementById('frm1601FQ:txtTIN3').value == "" || d.getElementById('frm1601FQ:txtBranchCode').value == "")  )
			{
				alert("Please enter a valid TIN number on Item 5.");
				return false;
			}	
			if ((d.getElementById('frm1601FQ:txtRDOCode').value == "000")) {
			    alert("Please enter a valid RDO Code on Item 6.");
			    return false;
			}
			if( (d.getElementById('frm1601FQ:txtTaxpayerName').value == "")  )
			{
				alert("Please enter a valid Withholding Agent's Name on Item 8.");
				return false;
			}		
			return true;
	}	

	var disabledItems = new Array();
	var isFromPrint = false;
	function printme() {

		$('#bg').hide(); //800
		$('.printSignFooterClass').css({ 'width':'94%','margin':'auto','margin-top':'15px','display':'block','position':'relative','overflow':'visible','page-break-before':'always', 'background':'#ffffff' });	
		$('.imgClass').css({ 'margin':'auto','display':'block','position':'relative','overflow':'visible' });
		
		$('#formPaper').css({'max-width':'8.3in !important', 'border':'#fff 1px ' });
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
					document.getElementById(elem[i].id).style.backgroundColor = '#FFFFFF';
					document.getElementById(elem[i].id).style.color = '#000000';
                    document.getElementById(elem[i].id).style.height="15px";
                    document.getElementById(elem[i].id).style.fontSize="12px";
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
		
        var activePage = document.getElementById('frm1601FQ:txtCurrentPage').value;

        $('#Page1Content').show();
        $('#Page2Content').show();

		$('.printButtonClass').hide();

        $("#formPaper").show();
        $("#Page1Content").css({ 'border':'1px solid #000' });
        $("#Page2Content").css({ 'margin-top': '50px' });
        
        window.print();

        $('.printButtonClass').show();
        $("#Page"+activePage+"Content").css({ 'border': 'none' });
        $("#Page2Content").css({'margin-top': '0px', });

        if(activePage == "1"){
            $('#Page1Content').show();
            $('#Page2Content').hide();
        }else {
            $('#Page1Content').hide();
            $('#Page2Content').show();
        }

		$('#printMenu').show('blind');
		if ( $('#formMenu').css('display') != 'none' ) {	
			$('#formMenu').hide('blind');
		}	

	isFromPrint = true;
	document.getElementById('frm1601FQ:txtCurrentPage').disabled = false;
	document.getElementById('frm1601FQ:txtCurrentPage').readOnly = false;
	}

	function printModal(modalID) {
        alert("This form must be printed on an A4 Size Paper. Please update your Printer Settings to ensure the correct printout of the form.\n\n" +
				  "If applicable, open Internet Explorer, go to File -> Page Setup and change Page Size to Legal, all Margins must be 0.166 and all Headers & Footers must be set to empty.");

        $('#bg').hide();
        $('body').css({ 'zoom': '94%' });
        $('#' + modalID).removeClass("modalShow");
        $('#' + modalID).addClass("modalPrint");

        $('input').each(function () {
            if (this.type == 'button') {
                if (this.id != 'test') {
                    $(this).addClass('previewButtonClass');
                }
            }
        });

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
					document.getElementById(elem[i].id).style.height="10px";
					document.getElementById(elem[i].id).style.fontSize="8px";
				}
			}
    	}

        $('a').each(function () {
            if (this.id.length > 1) {
                document.getElementById(this.id).disabled = true;
            }
        });

        $('#printMenu').show('blind');
        if ($('#formMenu').css('display') != 'none') {
            $('#formMenu').hide('blind');
        }
        window.print();
    }		


	function validateDate(element) {
        var strmmddyyyy = element.value;
        var isValid = true;
        var currentDate = new Date();
        var inputDate = new Date();

        if (strmmddyyyy != "") {
            var result = strmmddyyyy.split("/");
            var isLeap = new Date(result[2], 1, 29).getMonth() === 1;
            var month31 = (['01', '03', '05', '07', '08', '10', '12']);
            var month30 = (['04', '06', '09', '11']);
            var month = result[0];
            var day = result[1];
            if (result.length === 3) {
                if (isNaN(result[0] || result[1] || result[2])) {
                    isValid = false;
                }
                else if ((result[0].length != 2 || (result[0] > 12 || result[0] < 1))) {
                    // numeric check if greater not than 31 - Month.
                    isValid = false;
                }
                else if (result[1].length != 2 || (result[1] > 31 || result[1] < 1)) {
                    // numeric check if Date.
                    isValid = false;
                }
                else if (result[2].length != 4) {
                    isValid = false;
                }
                else if (month == 2) {
                    if (!isLeap && day == 29) {
                        isValid = false;
                    }
                    else if (!isLeap && day > 29) {
                        isValid = false;
                    }
                    else if (isLeap && day > 29) {
                        isValid = false;
                    }
                }
                else if (month31.contains(month) && day > 31) {
                    isValid = false;
                }
                else if (month30.contains(month) && day > 30) {
                    isValid = false;
                }

                inputDate = new Date(result[2], month - 1, day);
            }
            else {
                isValid = false;
            }
        }

        if (!isValid) {
            alert('Please provide a valid date. (MM/DD/YYYY format)');
            element.value = '';
            element.focus();
        }
        else if (inputDate > currentDate) {
            alert('This date cannot be a future date.');
            element.value = '';
            element.focus();
        }

        return isValid;
	}

	function goToPage() {

		var newVal = document.getElementById("frm1601FQ:txtCurrentPage").value;
		//var printType = !isFromPrint ? "Page" : "Print";
		var printType = "Page";

		if ((newVal <= MaxPage) && (newVal > 0) && (newVal !== currentPage.toString())) {
			$('#' + printType + currentPage + 'Content').hide('blind');
			$('#' + printType + newVal + 'Content').show('blind');
			currentPage = (document.getElementById("frm1601FQ:txtCurrentPage").value) * 1;
		}
		else if ((newVal > MaxPage) || (newVal <= 0)) {
			alert("Invalid page");

			document.getElementById("frm1601FQ:txtCurrentPage").value = currentPage;
		}

		if (isFromPrint) {
		}

	}

	function processPrev() {
		if (currentPage == 1)
			currentPage = 1;
		else {
			currentPage--;
			$('#Page' + currentPage + 'Content').show('blind');
			$('#Page' + (currentPage + 1) + 'Content').hide('blind');
			document.getElementById('frm1601FQ:txtCurrentPage').value = currentPage;

		}
	}
	function processNext() {
		if (currentPage == MaxPage) {
		}
		else {
			currentPage++;
			$('#Page' + currentPage + 'Content').show('blind');
			$('#Page' + (currentPage - 1) + 'Content').hide('blind');
			document.getElementById('frm1601FQ:txtCurrentPage').value = currentPage;
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
                save('1601FQ',data);
                
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
        saveAndExit('1601FQ',data);
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

        submitAndSave('1601FQ', data, company_id);
        
        disabled.attr('disabled','disabled');
        return false;
    }

    function gotoMain(){
        var company_id = $('#frmMain').find('input[name="company"]').val();
        window.location = '/companies/'+ company_id +'/histories/1601FQ';
    } 
</script>

@endsection
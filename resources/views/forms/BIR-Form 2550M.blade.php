@extends('layouts.app')
@section('title', '| BIR Form No. 2550M')
@section('content')
<div class="loader"></div>
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
                    <button type="button" class="btn btn-danger btn-exit" id="2550M" company='{{$company->id}}'>No</button>
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
                    <button type="button" class="btn btn-success btn-exit" id="2550M" company='{{$company->id}}'>Okay</button>
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
                        <button type="button" class="btn btn-danger btn-filing-success" form='2550M' company='{{$company->id}}'>Okay</button>
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
            <div id="wrapper" style="margin: 0 auto; position: relative; width: 846px; ">
			
				<table border="0" width="747" cellspacing="0" cellpadding="0" align="center" style="background-repeat: repeat-x;">
				<tr><td>
			
                <div id="formPaper">
                    <div id="mainContent">
                        <table width="747" border="0" cellspacing="0" cellpadding="0">
                            <tr style="border-bottom: 1px solid;">
                                <td>
									
									<div align='center' style="display:inline; width:741px !important; height:61px !important">
										<img style="margin:auto;display: block;padding: 2px;" id="frm2550M:header" src="{{ asset('images/header/2550m_header.jpg') }}" width="741" height="55"/>
									</div>									
								</td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="741" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="330" valign="top" class="tblFormTd">
                                                <table width="" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="100%" colspan="3">
														    <font size="1" style="font-size: 11px;">For the Month of &nbsp;&nbsp;&nbsp;&nbsp;(MM/YYYY)</font>
                                                            <select size="1" name="frm2550m:RtnYear" id="frm2550m:RtnYear" >
                                                            	<option value="00"> - </option>
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
                                                            <input type="text" value="{{$action == 'new' ? '' : $data->item1B}}" size="1.5" name="frm2550m:txtYear" maxlength="4" id="frm2550m:txtYear" onblur="blockletterWithout2Decimal(this)" onkeypress="return wholenumber(this, event)"  />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>

                                            <td width="229" valign="top" class="tblFormTd">
                                                <table width="119" border="0" cellspacing="0" cellpadding="0" valign="middle">
                                            
                                                    <tr>
                                                        <td>														    
                                                               <div align="center" style="padding: 1px 0 1px 0;">																    
                                                                    <table valign="middle" cellspacing="0" cellpadding="0" border="0" class="iceSelOneRb-dis fieldText1-dis">
                                                                        <tbody>
                                                                            <tr>

																			    <td valign="middle"><font size="1" style="font-size: 11px;">Amended Return?</font></td>
                                                                                <td valign="middle"><input type="radio" value="Y" name="frm2550m:OptAmendedYN" id="frm2550m:OptAmendedYN1" onclick="optAmendFunc();" />
                                                                                    <label for="OptAmendedYN1"  style="font-size:10px;" >Yes</label>&nbsp;&nbsp;&nbsp;
                                                                                </td>
                                                                                <td valign="middle"><input type="radio" value="N"  name="frm2550m:OptAmendedYN" id="frm2550m:OptAmendedYN2" checked="checked" onclick="optAmendFunc();compute23G()" />
                                                                                    <label for="OptAmendedYN2"  style="font-size:10px;" >No</label>
                                                                                </td>
                                                                            	
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="182" valign="top" class="tblFormTd">
                                                <table width="182" border="0" cellspacing="0" cellpadding="0">
                                                
                                                    <tr>
                                                        <td><font size="1" style="font-size: 11px;">No. of Sheets Attached</font>&nbsp;&nbsp;&nbsp;<input type="text" value="{{$action == 'new' ? '0' : $data->item3}}" style="text-align: right;" size="4" name="frm2550m:txtSheets" maxlength="2" id="frm2550m:txtSheets" onkeypress="return wholenumber(this, event)" /></td>
                                                    </tr>
                                                </table>
                                            </td>

                                        </tr>
                                    </table>
                                </td>
                            </tr>
							<tr>
								<td style="height:11px" width="100%" border="0.1" cellspacing="0" cellpadding="0">
									<table width="830" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTdPart">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="100%" align="center">&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;" >Part I - Background Information</font></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
								</td> 
							</tr>	
                            <tr>
                                <td>
                                    <table style="width:741" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>  <td width="261" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="23"><font size="1.5" style="font-weight:bold">&nbsp;4&nbsp;</font></td>
                                                        <td>
                                                            <font size="1" style="font-size: 11px;">TIN&nbsp;</font>
                                                            <font size="1.5" face="Arial">
                                                                <input type="text" value="{{$company->tin1}}"  size="1.5" name="frm2550m:txtTIN1" maxlength="3" id="frm2550m:txtTIN1" onkeypress="return wholenumber(this, event)" disabled/>
                                                                <input type="text" value="{{$company->tin2}}"  size="1.5" name="frm2550m:txtTIN2" maxlength="3" id="frm2550m:txtTIN2" onkeypress="return wholenumber(this, event)" disabled/>
                                                                <input type="text" value="{{$company->tin3}}"  size="1.5" name="frm2550m:txtTIN3" maxlength="3" id="frm2550m:txtTIN3" onkeypress="return wholenumber(this, event)" />
                                                                <input type="text" value="{{$company->tin4}}"  size="1.5" name="frm2550m:txtBranchCode" maxlength="3" id="frm2550m:txtBranchCode" onkeypress="return letternumber(event)" disabled/>
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="149" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="100"><font size="1.5" style="font-weight:bold">&nbsp;5&nbsp;</font><font size="1" style="font-size: 11px;">RDO Code&nbsp;</font></td>
                                                        <td width="127" id="rdoSelect"> 
                                                           <select class='iceSelOneMnu' id='frm2550m:txtRDOCode' name='frm2550m:txtRDOCode' size='1' disabled >
                                                           	<option value='{{$company->rdo_code}}'>{{$company->rdo_code}}</option>
                                                           </select>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>

                                            <td width="331" valign="top" class="tblFormTd">
                                                <table width="322" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="20"><font size="1.5" style="font-weight:bold">&nbsp;6&nbsp;</font></td>
                                                        <td width="302">
                                                            <font size="1" style="font-size: 11px;">Line of Business&nbsp;&nbsp;</font>
                                                            <font size="1.5" face="Arial">
                                                                <input type="text" value="{{$company->line_business}}"  size="25" name="frm2550m:txtLineBus" maxlength="60" id="frm2550m:txtLineBus" onblur = "return capital(this, event)" disabled/>
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
                                    <table width="741" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>  <td width="65%" valign="top" class="tblFormTd">                                      
										      <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                                    <tr>
                                                        <td  width="100%"><table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                <tr>
                                                                    <td width="3%" nowrap><font size="1.5" style="font-weight:bold;">&nbsp;7</font></td>
                                                                    <td width="97%" nowrap>&nbsp;&nbsp;
																		<font size="1" style="font-size: 11px;">
																			Taxpayer's Name 
																		</font>
																		<input type="text" value="{{$company->registered_name}}"  size="68" maxlength="60" id="frm2550m:txtTaxPayerName" name="frm2550m:txtTaxPayerName" onblur = "return capital(this, event)" disabled/>
																	</td>
                                                                </tr>
                                                            </table></td>
                                                    </tr>										
                                                </table></td>
                                            <td width="35%" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                                    <tr>
                                                        <td  width="100%">
                                                            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                                                <tr>
                                                                    <td width="35%" nowrap><font size="1.5" style="font-weight:bold;">&nbsp;&nbsp;8&nbsp;</font><font size="1" style="font-size: 11px;">Telephone No.</font></td>
                                                                    <td width="65%" nowrap align="right">																		
																		<input type="text" value="{{$company->tel_number}}"  size="15" name="frm2550m:txtTelephoneNum" maxlength="15" id="frm2550m:txtTelephoneNum" onkeypress="return wholenumber(this, event)" disabled/>
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
                                    <table width="741" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr> <td width="60%" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0" width="100%">
													<tr>
                                                        <td width="100%">
														<table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                            <tr>
                                                                <td width="3%" nowrap><font size="1.5" style="font-weight:bold;">&nbsp;9</font></td>
                                                                <td width="97%" nowrap>
																	<font size="1" style="font-size: 11px;">Registered Address</font>
																	<input type="text" value="{{$company->address}}"  size="68" name="frm2550m:txtAddress" maxlength="150" id="frm2550m:txtAddress" onblur = "return capital(this, event)" disabled/>
																</td>
                                                            </tr>
                                                        </table>
														</td>
                                                    </tr>													
                                                </table></td>
                                            <td width="40%" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0" width="100%">
													<tr>
                                                        <td width="100%" nowrap>
                                                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                                <tr>
                                                                    <td width="35%" nowrap><font size="1.5" style="font-weight:bold;">&nbsp;10&nbsp;</font><font size="1" style="font-size: 11px;">Zip Code</font></td>
                                                                    <td width="65%" nowrap align="right">
                                                                        <input type="text" value="{{$company->zip_code}}"  size="15"  maxlength="8" id="frm2550m:txtZipCode" name="frm2550m:txtZipCode"  onkeypress="return wholenumber(this, event)" disabled/>
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
                                    <table width="741" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTdPart">
                                                <table width="" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td colspan="2"><font size="1.5" style="font-weight:bold;">&nbsp;11&nbsp;</font></td>
                                                        <td colspan="2"><font size="1" style="font-size: 11px;">Are you availing of tax relief under Special Law / International Tax Treaty?</font></td>
                                                    
                                                        <td width="56"><input type="radio" value="Y" name="frm2550m:OptSpecialTax" id ="frm2550m:OptSpecialTax1" onclick="enableSelTreaty()" />
                                                            <label for="frm2550m:OptSpecialTax1"  style="font-size:10px;" >Yes</label>&nbsp;&nbsp;&nbsp;
                                                        </td>
                                                        <td width="42"><input type="radio" value="N"  name="frm2550m:OptSpecialTax" id="frm2550m:OptSpecialTax2" onclick="disableSelTreaty()" checked="checked" />
                                                            <label for="frm2550m:OptSpecialTax2"  style="font-size:10px;" >No</label>
                                                        </td>
                                                     
                                                        
                                                        <td width="232"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">If yes, specify&nbsp;
                                                                <select
                                                                    class="iceSelOneMnu-dis input-dis" style="width: 150px;" 
                                                                    id="frm2550m:lstSpecialTax" name="frm2550m:lstSpecialTax"
                                                                    size="1">
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
									<table width="830" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTdPart">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="100%" align="center">&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;" >Part II - Computation of Tax</font></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                	</table>
								</td>
							</tr>								

                            <tr>
                                <td>
                                    <table width="741" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTd">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="26">&nbsp;</td>
                                                        <td width="297">&nbsp;</td>
                                                        <td align="center" nowrap><font size="1" style="font-size: 11px;">Sales/Receipts for the Month (Exclusive of VAT)</font></td>
                                                        <td align="center"><font size="1" style="font-size: 11px;" >Output Tax Due for the Month</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="26"><font size="1.5" style="font-weight:bold;">&nbsp;12&nbsp;&nbsp;</font></td>
                                                        <td width="297"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Vatable Sales/Receipt - Private  ( <a href="#" id="btnSched1" onclick="showSched1()">Sch. 1</a> )</font></td>
                                                        <td width="198"><span ><font size="1.5" style="font-weight:bold;">12A</font>&nbsp;
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="20" name="frm2550m:txtTax12A" maxlength="25" id="frm2550m:txtTax12A"  />
                                                            </span></td>

                                                        <td width="219"><span ><font size="1.5" style="font-weight:bold;">12B</font>&nbsp;
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="20" name="frm2550m:txtTax12B" maxlength="25" id="frm2550m:txtTax12B"  />
                                                            </span></td>
                                                    </tr>


                                                    <tr>
                                                        <td><font size="1.5" style="font-weight:bold;">&nbsp;13&nbsp;</font></td>
                                                        <td><font size="1"></font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Sales to Government</font></td>
                                                        <td width="198"><span ><font size="1.5" style="font-weight:bold;">13A</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20"  maxlength="25" id="frm2550m:txtTax13A" name="frm2550m:txtTax13A" onblur="round(this,2); compute13B();compute16A();changedTxtTax13A();" onkeypress="return numbersonly(this, event)" />
                                                            </span></td>
                                                        <td width="219"><span ><font size="1.5" style="font-weight:bold;">13B</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20"  maxlength="25" id="frm2550m:txtTax13B" name="frm2550m:txtTax13B" onblur=" round(this,2); compute16B()" onkeypress="return numbersonly(this, event)" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="1.5" style="font-weight:bold;">&nbsp;14</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Zero Rated Sales/Receipts</font></td>
                                                        <td width="198"><span ><font size="1.5" style="font-weight:bold;">14</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;margin-left: 7px;" size="20" maxlength="25" id="frm2550m:txtTax14" name="frm2550m:txtTax14" onblur="round(this,2); compute16A()" onkeypress="return numbersonly(this, event)" />
                                                            </span></td>
                                                        <td width="219"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="1.5" style="font-weight:bold;">&nbsp;15</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Exempt Sales/Receipts</font></td>
                                                        <td width="198"><span ><font size="1.5" style="font-weight:bold;">15</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;margin-left: 7px;" size="20" maxlength="25" id="frm2550m:txtTax15" name="frm2550m:txtTax15" onblur="round(this,2); compute16A()" onkeypress="return numbersonly(this, event)" />
                                                            </span></td>
                                                        <td width="219"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="1.5" style="font-weight:bold;">&nbsp;16</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total Sales/Receipts and Output Tax Due</font></td>
                                                        <td width="198"><span ><font size="1.5" style="font-weight:bold;">16</font><font size="1.5" style="font-weight:bold;margin-right: 3px;">A</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="20"  maxlength="25" id="frm2550m:txtTax16A" name="frm2550m:txtTax16A"  />
                                                            </span></td>
                                                        <td width="219"><span ><font size="1.5" style="font-weight:bold;">16B</font>&nbsp;
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="20"  maxlength="25" id="frm2550m:txtTax16B" name="frm2550m:txtTax16B"  />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="1.5" style="font-weight:bold;">&nbsp;17&nbsp;</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Less: Allowable Input Tax</font></td>
                                                        <td width="198"><span ></span></td>
                                                        <td width="219"><span >                                              </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="1.5" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td colspan="2"><font size="1.5" style="font-weight:bold;">17A&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Input Tax Carried Over from Previous Period</font></td>
                                                        <td width="219"><span ><font size="1.5" style="font-weight:bold;">17A</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20"  maxlength="25" id="frm2550m:txtTax17A" name="frm2550m:txtTax17A" onblur="round(this,2); compute17F()"  onkeypress="return numbersonly(this, event)" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="1.5" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td colspan="2"> <font size="1.5" style="font-weight:bold;">17B&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Input Tax Deferred on Capital Goods Exceeding P1Million from Previous Period</font></td>
                                                        <td width="219"><span ><font size="1.5" style="font-weight:bold;">17B</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20"  maxlength="25" id="frm2550m:txtTax17B" name="frm2550m:txtTax17B" onblur="round(this,2); compute17F()" onkeypress="return numbersonly(this, event)" />
                                                            </span></td>
                                                    </tr>


                                                    <tr>
                                                        <td><font size="1.5" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td><font size="1.5" style="font-weight:bold;">17C&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Transitional Input Tax</font></td>
                                                        <td width="198"></td>
                                                        <td width="219"><span ><font size="1.5" style="font-weight:bold;">17C</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20"  maxlength="25" id="frm2550m:txtTax17C" name="frm2550m:txtTax17C" onblur="round(this,2); compute17F()" onkeypress="return numbersonly(this, event)" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="1.5" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td><font size="1.5" style="font-weight:bold;">17D&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Presumptive Input Tax</font></td>
                                                        <td width="198"></td>
                                                        <td width="219"><span ><font size="1.5" style="font-weight:bold;">17D</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20"  maxlength="25" id="frm2550m:txtTax17D" name="frm2550m:txtTax17D" onblur="round(this,2); compute17F()" onkeypress="return numbersonly(this, event)" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="1.5" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td><font size="1.5" style="font-weight:bold;">17E&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Others</font></td>
                                                        <td width="198"></td>
                                                        <td width="219"><span ><font size="1.5" style="font-weight:bold;margin-right: 1px;">17E</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm2550m:txtTax17E" name="frm2550m:txtTax17E" onblur="round(this,2); compute17F()" onkeypress="return numbersonly(this, event)" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="1.5" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td><font size="1.5" style="font-weight:bold;">17F&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total (Sum of Item 17A, 17B, 17C, 17D & 17E)</font></td>
                                                        <td width="198"></td>
                                                        <td width="219"><span ><font size="1.5" style="font-weight:bold;margin-right: 1px;">17F</font>&nbsp;
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="20"  maxlength="25" id="frm2550m:txtTax17F" name="frm2550m:txtTax17F"  />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="26"><font size="1.5" style="font-weight:bold;">&nbsp;18&nbsp;</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Current Transactions</font></td>
                                                        <td align="center" width="198"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Purchases</font></td>
                                                        <td width="219"><span >                                              </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="26"><font size="1.5" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td width="350" nowrap><font size="1.5" style="font-weight:bold;">18A/B&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">	Purchase of Capital Goods not exceeding P1Million  (See <a href="#" id="btnSched2" onclick="showSched2()">Sch. 2</a> )</font></td>
                                                        <td width="198"><span ><font size="1.5" style="font-weight:bold;">18A</font>&nbsp;
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="20" maxlength="25" id="frm2550m:txtTax18A" name="frm2550m:txtTax18A"  />
                                                            </span></td>
                                                        <td width="219"><span ><font size="1.5" style="font-weight:bold;">18B</font>&nbsp;
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="20" maxlength="25" id="frm2550m:txtTax18B" name="frm2550m:txtTax18B"  />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="26"><font size="1.5" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td width="297" nowrap><font size="1.5" style="font-weight:bold;">18C/D&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">	Purchase of Capital Goods exceeding P1Million  (See <a href="#" id="btnSched3A" onclick="showSched3()">Sch. 3</a> )</font></td>
                                                        <td width="198"><span ><font size="1.5" style="font-weight:bold;">18C</font>&nbsp;
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="20"  maxlength="25" id="frm2550m:txtTax18C" name="frm2550m:txtTax18C" />
                                                            </span></td>
                                                        <td width="219"><span ><font size="1.5" style="font-weight:bold;">18D</font>&nbsp;
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="20" maxlength="25" id="frm2550m:txtTax18D" name="frm2550m:txtTax18D"  />
                                                            </span></td>
                                                    </tr>


                                                    <tr>
                                                        <td width="26"><font size="1.5" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td width="297"><font size="1.5" style="font-weight:bold;">18E/F&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Domestic Purchases of Goods Other than Capital Goods</font></td>
                                                        <td width="198"><span ><font size="1.5" style="font-weight:bold;margin-right: 2px">18E </font>&nbsp;<input type="text" value="{{$action == 'new' ? '0.00' : $data->item18E}}" style="color: black; text-align: right;" size="20" maxlength="25" id="frm2550m:txtTax18E" name="frm2550m:txtTax18E" onblur="round(this,2); compute18P();compute18TransactionbyRow('E')" onkeypress="return numbersonly(this, event)" />
                                                            </span></td>
                                                        <td width="219"><span ><font size="1.5" style="font-weight:bold;margin-right: 1px;">18F</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm2550m:txtTax18F" name="frm2550m:txtTax18F" onblur="round(this,2); compute19()" onkeypress="return numbersonly(this, event)" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="26"><font size="1.5" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td width="297"><font size="1.5" style="font-weight:bold;">18G/H&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Importation of Goods Other than Capital Goods</font></td>
                                                        <td width="198"><span ><font size="1.5" style="font-weight:bold;">18G</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;margin-left: 3px;" size="20" maxlength="25" id="frm2550m:txtTax18G" name="frm2550m:txtTax18G" onblur="round(this,2); compute18P();compute18TransactionbyRow('G')" onkeypress="return numbersonly(this, event)" />
                                                            </span></td>
                                                        <td width="219"><span ><font size="1.5" style="font-weight:bold;margin-right: 4px;">18H</font>
                                                        	<input type="text" value="0.00" style="color: black; text-align: right;margin-left: 0px;" size="20"  maxlength="25" id="frm2550m:txtTax18H" name="frm2550m:txtTax18H" onblur="round(this,2); compute19()" onkeypress="return numbersonly(this, event)" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="26"><font size="1.5" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td width="297"><font size="1.5" style="font-weight:bold;">18I/J&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Domestic Purchase of Services</font></td>
                                                        <td width="198"><span ><font size="1.5" style="font-weight:bold;margin-right: 1px;">18I</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;margin-left: 7px;" size="20"  maxlength="25" id="frm2550m:txtTax18I" name="frm2550m:txtTax18I" onblur="round(this,2); compute18P();compute18TransactionbyRow('I')" onkeypress="return numbersonly(this, event)" />
                                                            </span></td>
                                                        <td width="219"><span ><font size="1.5" style="font-weight:bold;margin-right: 2px;">18J</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;margin-left: 4px;" size="20" maxlength="25" id="frm2550m:txtTax18J" name="frm2550m:txtTax18J" onblur="round(this,2); compute19()" onkeypress="return numbersonly(this, event)" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="26"><font size="1.5" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td width="297"><font size="1.5" style="font-weight:bold;">18K/L&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Services rendered by Non-residents</font></td>
                                                        <td width="198"><span ><font size="1.5" style="font-weight:bold;">18K</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;margin-left: 4px;" size="20"  maxlength="25" id="frm2550m:txtTax18K" name="frm2550m:txtTax18K" onblur="round(this,2); compute18P();compute18TransactionbyRow('K')" onkeypress="return numbersonly(this, event)" />
                                                            </span></td>
                                                        <td width="219"><span ><font size="1.5" style="font-weight:bold;margin-right: 1px;">18L</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;margin-left: 4px;" size="20" maxlength="25" id="frm2550m:txtTax18L" name="frm2550m:txtTax18L" onblur="round(this,2); compute19()" onkeypress="return numbersonly(this, event)" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="26"><font size="1.5" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td width="297"><font size="1.5" style="font-weight:bold;">18M&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Purchases Not Qualified for Input Tax</font></td>
                                                        <td width="198"><span ><font size="1.5" style="font-weight:bold;margin-right: 3px;">18M </font>
                                                        	<input type="text" value="0.00" style="color: black; text-align: right;" size="20"  maxlength="25" id="frm2550m:txtTax18M" name="frm2550m:txtTax18M" onblur="round(this,2); compute18P()" onkeypress="return numbersonly(this, event)" />
                                                            </span></td>
                                                        <td width="219"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="26"><font size="1.5" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td width="297"><font size="1.5" style="font-weight:bold;">18N/O&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Others</font></td>
                                                        <td width="198"><span ><font size="1.5" style="font-weight:bold;">18N</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;margin-left: 4px;" size="20"  maxlength="25" id="frm2550m:txtTax18N" name="frm2550m:txtTax18N" onblur="round(this,2); compute18P();compute18TransactionbyRow('N')" onkeypress="return numbersonly(this, event)" />
                                                            </span></td>
                                                        <td width="219"><span ><font size="1.5" style="font-weight:bold;margin-right: 4px;">18O</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20" maxlength="25" id="frm2550m:txtTax18O" name="frm2550m:txtTax18O" onblur="round(this,2); compute19()" onkeypress="return numbersonly(this, event)" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="26"><font size="1.5" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td width="297"><font size="1.5" style="font-weight:bold;">18P&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total Current Purchases (Sum of Item 18A, 18C, 18E, 18G, 18I, 18K, 18M & 18N)</font></td>
                                                        <td width="198"><span ><font size="1.5" style="font-weight:bold;margin-right: 1px;">18P</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;margin-left: 3px;" size="20" maxlength="25" id="frm2550m:txtTax18P" name="frm2550m:txtTax18P" />
                                                            </span></td>
                                                        <td width="219"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="1.5" style="font-weight:bold;">&nbsp;19&nbsp;&nbsp;</font></td>
                                                        <td colspan="2"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total Available Input Tax (Sum of Item 17F, 18B, 18D, 18F, 18H, 18J, 18L & 18O)</font></td>
                                                        <td width="219"><span ><font size="1.5" style="font-weight:bold;margin-right: 7px;">19</font>&nbsp;
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="20"  maxlength="25" id="frm2550m:txtTax19" name="frm2550m:txtTax19" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="1.5" style="font-weight:bold;">&nbsp;20&nbsp;</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">	Less: Deductions from Input Tax</font></td>
                                                        <td width="198"><span ></span></td>
                                                        <td width="219"><span >                                              </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="1.5" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td colspan="2" nowrap> <font size="1.5" style="font-weight:bold;">20A</font><font size="1.5" style="font-weight:bold;">&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Input Tax on Purchases of Capital Goods exceeding P1Million deferred for the succeeding period  (See <a href="#" id="btnSched3B" onclick="showSched3()">Sch. 3</a> )</font></td>
                                                        <td width="219"><span ><font size="1.5" style="font-weight:bold;">20A</font>&nbsp;
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="20"  maxlength="25" id="frm2550m:txtTax20A" name="frm2550m:txtTax20A"  />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="1.5" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td colspan="2"> <font size="1.5" style="font-weight:bold;">20</font><font size="1.5" style="font-weight:bold;">B&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Input Tax on Sale to Gov't. closed to expense  ( <a href="#" id="btnSched4" onclick="showSched4()">Sch. 4</a> )</font></td>
                                                        <td width="219"><span ><font size="1.5" style="font-weight:bold;">20B</font>&nbsp;
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="20" maxlength="25" id="frm2550m:txtTax20B" name="frm2550m:txtTax20B"  />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="1.5" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                       <td colspan="2"> <font size="1.5" style="font-weight:bold;">20C</font><font size="1.5" style="font-weight:bold;">&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Input Tax allocable to Exempt Sales  ( <a href="#" id="btnSched5" onclick="showSched5()">Sch. 5</a> )</font></td>
                                                        <td width="219"><span ><font size="1.5" style="font-weight:bold;">20C</font>&nbsp;
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="20" maxlength="25" id="frm2550m:txtTax20C" name="frm2550m:txtTax20C"  />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="1.5" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td colspan="2"> <font size="1.5" style="font-weight:bold;">20D</font><font size="1.5" style="font-weight:bold;">&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">VAT Refund/TCC claimed</font></td>
                                                        <td width="219"><span ><font size="1.5" style="font-weight:bold;">20D</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;margin-left: 4px;" size="20"  maxlength="25" id="frm2550m:txtTax20D" name="frm2550m:txtTax20D" onblur="round(this,2); compute20F()" onkeypress="return numbersonly(this, event)" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="1.5" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td colspan="2"> <font size="1.5" style="font-weight:bold;">20E</font><font size="1.5" style="font-weight:bold;">&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Others</font></td>
                                                        <td width="219"><span ><font size="1.5" style="font-weight:bold;margin-right: 1px;">20E</font>
                                                                <input type="text" value="0.00" style="color: black; text-align: right;margin-left: 3px;" size="20" maxlength="25" id="frm2550m:txtTax20E" name="frm2550m:txtTax20E" onblur="round(this,2); compute20F()" onkeypress="return numbersonly(this, event)" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="1.5" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td colspan="2"> <font size="1.5" style="font-weight:bold;">20F</font><font size="1.5" style="font-weight:bold;">&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total (Sum of Item 20A, 20B, 20C, 20D & 20E)</font></td>
                                                        <td width="219"><span ><font size="1.5" style="font-weight:bold;margin-right: 1px;">20F</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;margin-left: 3px;" size="20" maxlength="25" id="frm2550m:txtTax20F" name="frm2550m:txtTax20F"  />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="1.5" style="font-weight:bold;">&nbsp;21&nbsp;&nbsp;</font></td>
                                                        <td colspan="2"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total Allowable Input Tax (Item 19 less Item 20F)</font></td>
                                                        <td width="219"><span ><font size="1.5" style="font-weight:bold;margin-right: 3px;">21</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;margin-left: 8px;" size="20" maxlength="25" id="frm2550m:txtTax21" name="frm2550m:txtTax21"  />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="1.5" style="font-weight:bold;">&nbsp;22&nbsp;&nbsp;</font></td>
                                                        <td colspan="2"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Net VAT Payable (Item 16B less Item 21)</font></td>
                                                        <td width="219"><span ><font size="1.5" style="font-weight:bold;margin-right: 3px;">22</font>
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;margin-left: 8px;" size="20" maxlength="25" id="frm2550m:txtTax22" name="frm2550m:txtTax22" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="1.5" style="font-weight:bold;">&nbsp;23&nbsp;</font></td>
                                                        <td><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Less: Tax Credits/Payments</font></td>
                                                        <td width="198"><span ></span></td>
                                                        <td width="219"><span >                                              </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="1.5" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td colspan="2"> <font size="1.5" style="font-weight:bold;">23A&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Creditable Value-Added Tax Withheld (See <a href="#" id="btnSched6" onclick="showSched6()">Sch. 6</a> )</font></td>
                                                        <td width="219"><span ><font size="1.5" style="font-weight:bold;">23A</font>&nbsp;
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="20"  maxlength="25" id="frm2550m:txtTax23A" name="frm2550m:txtTax23A" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="1.5" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td colspan="2"> <font size="1.5" style="font-weight:bold;">23B&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Advance Payment   ( <a href="#" id="btnSched7" onclick="showSched7()">Sch. 7</a> )</font></td>
                                                        <td width="219"><span ><font size="1.5" style="font-weight:bold;">23B</font>&nbsp;
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="20"  maxlength="25" id="frm2550m:txtTax23B" name="frm2550m:txtTax23B"  />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="1.5" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td colspan="2"> <font size="1.5" style="font-weight:bold;">23C&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">VAT withheld on Sales to Government  ( <a href="#" id="btnSched8" onclick="showSched8()">Sch. 8</a> )</font></td>
                                                        <td width="219"><span ><font size="1.5" style="font-weight:bold;">23C</font>&nbsp;
                                                                <input type="text" value="0.00" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="20"  maxlength="25" id="frm2550m:txtTax23C" name="frm2550m:txtTax23C" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="1.5" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td colspan="2"> <font size="1.5" style="font-weight:bold;">23D&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">VAT paid in return previously filed, if this is an amended return</font></td>
                                                        <td width="219"><span ><font size="1.5" style="font-weight:bold;">23D</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20"  maxlength="25" id="frm2550m:txtTax23D" name="frm2550m:txtTax23D" onblur="round(this,2); compute23G()" onkeypress="return numbersonly(this, event)" />
                                                            </span></td>
                                                    </tr>
													<tr>
                                                        <td><font size="1.5" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td colspan="2"> <font size="1.5" style="font-weight:bold;">23E&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Advance Payments made (please attach proof of payments - BIR Form No. 0605)</font></td>
                                                        <td width="219"><span ><font size="1.5" style="font-weight:bold;margin-right: 1px;">23E</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20"  maxlength="25" id="frm2550m:txtTax23E" name="frm2550m:txtTax23E"  onblur="round(this,2); compute23G()" onkeypress="return numbersonly(this, event)" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="1.5" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td colspan="2"> <font size="1.5" style="font-weight:bold;">23F&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Others</font></td>
                                                        <td width="219"><span ><font size="1.5" style="font-weight:bold;margin-right: 1px;">23F</font>&nbsp;
                                                                <input type="text" value="0.00" style="color: black; text-align: right;" size="20"  maxlength="25" id="frm2550m:txtTax23F" name="frm2550m:txtTax23F"  onblur="round(this,2); compute23G()" onkeypress="return numbersonly(this, event)" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="1.5" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                        <td colspan="2"> <font size="1.5" style="font-weight:bold;">23G&nbsp;&nbsp;</font><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total Tax Credits/Payment (Sum of Item 23A, 23B, 23C, 23D & 23E)</font></td>
                                                        <td width="219"><span ><font size="1.5" style="font-weight:bold;">23G</font>&nbsp;
                                                                <input type="text" value="{{$action == 'new' ? '0.00' : $data->item23G}}" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="20"  maxlength="25" id="frm2550m:txtTax23G" name="frm2550m:txtTax23G" />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="1.5" style="font-weight:bold;">&nbsp;24&nbsp;&nbsp;</font></td>
                                                        <td colspan="2"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Tax Still Payable/(Overpayment) (Item 22 less Item 23F)</font></td>
                                                        <td width="219"><span ><font size="1.5" style="font-weight:bold;margin-right: 1px;">24 </font>&nbsp;&nbsp;
                                                        	<input type="text" value="{{$action == 'new' ? '0.00' : $data->item24}}" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="20"  maxlength="25" id="frm2550m:txtTax24" name="frm2550m:txtTax24"  />
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4" width="100%">
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="22"><font size="1.5" style="font-weight:bold;">25</font></td>
                                                                    <td width="75" align="center"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Add Penalties </font></td>
                                                                    <td align="center" width="155"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Surcharge</font></td>
                                                                    <td align="center" width="155"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Interest</font></td>
                                                                    <td align="center" width="155"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Compromise</font></td>
                                                                    <td align="center" width="194">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="22"><font size="1.5" style="font-weight:bold;">&nbsp;&nbsp;</font></td>
                                                                    <td width="75" align="center">&nbsp;</td>
                                                                    <td width="155"><span ><font size="1" style="font-weight:bold;">25A</font>
                                                                            <input type="text" value="{{$action == 'new' ? '0.00' : $data->item25A}}" style="color: black; text-align: right;" size="16"  maxlength="15" id="frm2550m:txtTax25A" name="frm2550m:txtTax25A" onblur="round(this,2); computePenalties()"  onkeypress="return numbersonly(this, event)" />
                                                                        </span></td>
                                                                    <td width="155"><span ><font size="1" style="font-weight:bold;">25B</font>
                                                                            <input type="text" value="{{$action == 'new' ? '0.00' : $data->item25B}}" style="color: black; text-align: right;" size="16"  maxlength="15" id="frm2550m:txtTax25B" name="frm2550m:txtTax25B" onblur="round(this,2); computePenalties()"  onkeypress="return numbersonly(this, event)" />
                                                                        </span></td>
                                                                    <td width="155"><span ><font size="1" style="font-weight:bold;">25C</font>
                                                                            <input type="text" value="{{$action == 'new' ? '0.00' : $data->item25C}}" style="color: black; text-align: right;" size="16"  maxlength="15" id="frm2550m:txtTax25C" name="frm2550m:txtTax25C" onblur="round(this,2); computePenalties()" onkeypress="return numbersonly(this, event)" />
                                                                        </span></td>
                                                                    <td width="194" align="left"><span ><font size="1.5" style="font-weight:bold;">25D</font>
                                                                            <input type="text" value="{{$action == 'new' ? '0.00' : $data->item25D}}" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="20"  maxlength="25" id="frm2550m:txtTax25D" name="frm2550m:txtTax25D"  />
                                                                        </span></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="1.5" style="font-weight:bold;">&nbsp;26&nbsp;&nbsp;</font></td>
                                                        <td colspan="2"><font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Total Amount Payable/ (Overpayment) (Sum of Items 24 & 25D)</font></td>
                                                        <td width="219">
															<span ><font size="1.5" style="font-weight:bold;margin-right: 3px;">26</font>&nbsp;&nbsp;
																<input type="text" value="{{$action == 'new' ? '0.00' : $data->item26}}" style="background-color: rgb(220, 220, 220); color: black; text-align: right;" size="20"  maxlength="25" id="frm2550m:txtTax26" name="frm2550m:txtTax26"  />
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
									<div class="imgClass" align='center' style="display:none; width:741px !important;">
										<table  style="border-top: 3px solid black; border-collapse: collapse; font-family:arial; font-size:10px; text-align: center; table-layout: fixed; background-color: white;">
											<col width="33%" />
									  		<col width="19%" />
											<col width="19%" />
									  		<col width="29%" />
									  		<tr>
									  			<td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;I declare, under the penalties of perjury, that this return has been made in good faith, verified by me, and to the best of my knowledge, and 
								  					<br/>belief, is true and correct, pursuant to the provisions of the National Internal Revenue Code, as amended, and the regulations issued under authority thereof.
								  					</td>
									  		</tr>
									  		<tr>
									  			<td colspan="3"><b>27</b>______________________________________________________________________________
									  				&nbsp;&nbsp;&nbsp;&nbsp;
									  				<br/>President/Vice President/Principal Officer/Accredited Tax Agent/
								    				<br/>Authorized Representative/Taxpayer
								    				<br/>(Signature Over Printed Name)</td>
									  			<td><b>28</b>_____________________________
								    				<br/>Treasurer/Assistant Treasurer
								    				<br/>(Signature Over Printed Name)
								    				<br/>&nbsp;</td>
									  		</tr>
									  		<tr>
									  			<td>_______________________________________
							    					<br/>Title/Position of Signatory</td>
									  			<td colspan="2">______________________________________
								    				<br/>TIN of Signatory</td>
							    				<td>______________________________
									    			<br/>Title/Position of Signatory</td>
									  		</tr>
									  		<tr>
									  			<td>_______________________________________
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
									<div class="imgClass" align='center' style="display:none; width:741px !important;">
										<img id="frm2550M:jurat" src="{{ asset('images/bottom_img/2550M_new.jpg') }}" width="741"/> <!--323px is the optimal height-->
									</div>
									<div class="imgClass" align='center' style="display:none; width:741px !important;">
										<table style="font-size:10px; text-align: left; vertical-align: top;background-color: white;">
										  <tr>
										    <td>&nbsp;Machine Validation/Revenue Official Receipt Details (If not filed with an Authorized Agent Bank)</td>
										  </tr>
										</table>
										<div style="font-size:5px;">&nbsp;</div>
									</div>
                                    <table width="741" border="0" cellspacing="0" cellpadding="0" class="tblForm printButtonClass">
                                        <tr>
                                            <td class="tblFormTdPart">
                                                <table width="" border="0" cellspacing="0" cellpadding="0">
                                                    <tbody>
                                                        <tr valign="middle">
                                                            <td width="55"></td>
                                                            <td width="697">
                                                                <div align="center">
                                                                @if($action != 'view')
                                                                    <input class="printButtonClass" type="button" value="Validate" style="width: 100px;" name="frm2550m:cmdValidate" id="frm2550m:cmdValidate" onclick="validate()" />
                                                                    <input class="printButtonClass" type="button" value="Edit" style="width: 100px;" name="frm2550m:cmdEdit" id="frm2550m:cmdEdit" onclick="enableAllControl()"/>
																	<input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />
																	<input class="printButtonClass" type="button" value="Save" style="width: 100px;" name="btnSave" id="btnSave" onclick="saveData();" />
																	<input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
																	<input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;" name="frm2550m:btnFinalCopy" id="frm2550m:btnFinalCopy" onclick="submitForm();" />
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
                    </div>
                </div>
				
				</td>
				<td valign="top"><img id="frm2550M:spacer" src="{{ asset('images/spacer.gif') }}" style="width:2px"/><img id="frm2550M:bcsImg" src="{{ asset('images/BCS.jpg') }}"/></td>
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

		
        <!-- modal Sched1  -->
		<div id="modalSched1" class="printSignFooterClass aBox2550mSched1" style="width:94%; display:none; min-height:500px; position:relative; top:15%; left:3%; right:auto; overflow-y:auto; background:#fff;" align="center">

            <br/>
            <br/>
			<table border="1" width="94%">
            <tr class="modalHeader"><td>Schedule 1 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Schedule of Sales/Receipts and Output Tax (Attach additional sheet, if necessary)</td></tr></table>

            <table border="1" cellspacing="0" cellpadding="0" style="position: static;width: 94%" id="tblTax">

                <tr class="modalColumnHeader">
                    <td width='50%' align='center'><b> Industry Covered by VAT </b></td>
					<td width='10%' align='center'><a href="#" id="btnSched1ATC" onclick="showModalAtc()">ATC</a></td>
                    <td width='20%' align='center'><b> Amount of Sales/Receipts For the Period </b></td>
                    <td width='20%' align='center'><b> Output Tax for the Period </b></td>

                </tr>
                <tr>
                    <td class="modalContent" colspan="4" width="100%">
						<table id="tblSched1Atc" cellspacing="0" cellpadding="0" width="100%" border="1">
							
						</table>
                    </td>
                </tr>
            </table>
            <table border="1" style="position: static;width: 94%">
                <tr height="35" valign="middle">
                    <td class="modalColumnHeader" width="60%" colspan="3" align="right"> To Item 12A/B&nbsp;&nbsp;&nbsp;</td>
					<td width="20%" align="center"><input type="text" size="10" style="background-color: rgb(220, 220, 220); text-align:right; width:130px" id="frm2550M:txtmodaltxtTotal12A" name="frm2550M:txtmodaltxtTotal12A" value="0.00"></input></td>
					<td width="20%" align="center"><input type="text" size="10" style="background-color: rgb(220, 220, 220); text-align:right; width:130px" id="frm2550M:txtmodaltxtTotal12B" name="frm2550M:txtmodaltxtTotal12B" value="0.00"></input></td>
                </tr>
            </table>
            <br/>
            <br/>
			<div align="center">
            <input type="button" class="printButtonClass" name="btnOkPop" id="btnOkPop1" style="width:120px; height:30px;" value="OK" onclick="getSched1Modal()"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" class="printButtonClass" name="btnClearPop" id="btnClearPop" style="width:120px; height:30px;" value="CLEAR"  onclick="clearSched1Modal()" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" class="printButtonClass" name="btnCancelPop" id="btnCancelPop" style="width:120px; height:30px;" value="CANCEL"  onclick="cancelSched1Modal()" />
			</div>
                <br />
                <br />
        </div>
		<div id="modalAtc" class="aBox2550mAtc" style="width:70%; display:none; height:90%; position:relative; top:3%; left:15%; right:auto; overflow-y:auto; overflow-x:hidden; background:#fff;" align="center">

            <table border="0" cellspacing="3" cellpadding="3" style="position: static;width: 100%">
                <tr>
                    <td colspan="2">&nbsp;</td>
                </tr>
                <tr class="modalColumnHeader">
                    <td width="20%" class="text-center"><b> ATC </b></td>

                    <td width="80%" class="text-center"> <b> INDUSTRIES COVERED BY VAT </b> </td>
                </tr>
                <tr>
                    <td colspan="2"> <hr/></td>
                </tr>

            </table>

            <div style="height:80%;overflow:auto;width: 90%">
                <table class="modalContent" id="tbllistAtcCode"  cellspacing="0" cellpadding="0" width="100%">
            
                </table>
            </div>
			<div align="center">
            <input type="button" name="btnOkPop" id="btnOkPop" style="width:120px; height:30px;" value="OK" onclick="getATCCode()"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</div>
            <br />
            <br />
        </div>

        <!-- modal Sched2  -->
		<div id="modalSched2" class="printSignFooterClass aBox2550mSched2" style="width:94%; display:none; min-height:500px; position:relative; top:3%; left:3%; right:auto; overflow-y:auto; background:#fff;" align="center">

            <br/>
            <br/>
			<div style="width: 100%">
			<table border="1" width="100%" cellspacing="0" cellpadding="0">
				<tr class="modalHeader">
					<td align="left" width="15%">&nbsp;&nbsp;&nbsp;Schedule 2
					</td>
					<td align="center" width="85%">
						Purchases/Importation of Capital Goods (Aggregate Amount Not Exceeding P1Million)
					</td>					
				</tr>
			</table>
            
                <table border="1" cellspacing="0" cellpadding="0" style="position: static;width: 100%" id="tblSched2">
                    <thead>
                        <tr class="modalColumnHeader">
                            <td width='4%'>&nbsp;</td>
                            <td width='20%' align="center" ><b>Date Purchased</b></td>
                            <td width='32%' align="center" ><b>Description</b></td>
                            <td width='22%' align="center" ><b>Amount (Net of VAT)</b></td>
                            <td width='22%' align="center" ><b>Input Tax</b></td>

                        </tr></thead>
                    <tbody id="tbodyllistSched2">
                    	
                    </tbody>
                </table>
                <table border="1" cellspacing="0" cellpadding="0" style="position: static;width: 100%" align="center" valign="top">
                    <tr height="25" valign="middle">
                        <td style="position: static;width: 56%" class="modalColumnHeader" colspan="3" align='right'>To Item 18A/B&nbsp;</td>
                        <td style="position: static;width: 22%" align="center"><input type="text" disabled id="txtmodalTotalAmt" name="txtmodalTotalAmt" value="{{$action == 'new' ? '0.00' : $data->item18A}}" style="background-color: rgb(220, 220, 220); text-align:right; width:130px" size="18" value="0.00" /></td>
						<td style="position: static;width: 22%" align="center"><input type="text" disabled id="txtmodalTotalInputTax" name="txtmodalTotalInputTax" value="{{$action == 'new' ? '0.00' : $data->item18B}}" style="background-color: rgb(220, 220, 220); text-align:right; width:130px" size="18" value="0.00" />  </td>
                    </tr>
                    <tr>
                        <td align='right' colspan="5" width='100%'>
							<input type='button' class="printButtonClass" id="btnAdd1" value='Add' onclick="addlistSched2()" />&nbsp;&nbsp;&nbsp;
							<input type='button' class="printButtonClass" id="btnDelete1" value='Delete' onclick="deletelistSched2()" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
                    </tr>
                </table>
            </div>
            <br/><br/>
			<div align="center">
				<input type="button" class="printButtonClass" name="btnOkPop2" id="btnOkPop2" style="width:120px; height:30px;" value="OK" onclick="getSched2Modal()"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="button" class="printButtonClass" name="btnClearPop2" id="btnClearPop2" style="width:120px; height:30px;" value="CLEAR"  onclick="clearSched2Modal()" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="button" class="printButtonClass" name="btnCancelPop2" id="btnCancelPop2" style="width:120px; height:30px;" value="CANCEL"  onclick="cancelSched2Modal()" />
			</div>
            <br /><br />
        </div>

        <!-- modal Sched3  -->
		<div id="modalSched3" class="printSignFooterClass aBox2550mSched3" style="width:94%; display:none; min-height:500px; position:relative; top:3%; left:3%; right:auto; overflow-y:auto; background:#fff;" align="center">

			<div style="width: 100%">
			<table border="1" cellspacing="0" cellpadding="0" width="100%">
				<tr class="modalHeader">
					<td>Schedule 3 Purchases/Importation of Capital Goods (Aggregate Amount Exceeds P1 Million)</td>
				</tr><br/>
				<tr class="modalColumnHeader"><td>A) Purchases/Importations This Period</td></tr>
			</table>

            <table border="1" cellspacing="0" cellpadding="0" width="100%" id="tblSched3A">
                    <thead>
                        <tr class="modalColumnHeader">
                            <td width=" 4%">&nbsp;  </td>
                            <td width='12%' align="center" ><b> Date Purchased </b></td>
                            <td width='12%' align="center" ><b> Description </b></td>
                            <td width='12%' align="center" ><b> Amount (Net of VAT) </b></td>
                            <td width='12%' align="center" ><b> Input Tax (C*TaxRate)  </b></td>
                            <td width='12%' align="center" ><b> Est. Life (in months) </b></td>
                            <td width='12%' align="center" ><b> Recognized Life (In Months)Useful life or 60 mos. (whichever is shorter) </b></td>
                            <td width='12%' align="center" ><b> Allowable Input Tax for the Period (D) divided by (F)  </b></td>
                            <td width='12%' align="center" ><b> Balance of Input Tax to be carried to Next Period (D) less (G)  </b></td>
                        </tr>
                        <tr class="modalColumnHeader"s>
                            <td width='4%' align="center"> </td>
                            <td width='12%' align="center"> A</td>
                            <td width='12%' align="center"> B</td>
                            <td width='12%' align="center"> C</td>
                            <td width='12%' align="center"> D</td>
                            <td width='12%' align="center"> E</td>
                            <td width='12%' align="center"> F</td>
                            <td width='12%' align="center"> G</td>
                            <td width='12%' align="center"> H</td>
                        </tr>
                    </thead>
                    <tbody id="tbodyllistSched3A">
                        
                    </tbody>
                    <!--<tfoot>-->
                        <tr valign="middle">
                            <td class="modalColumnHeader" colspan="3"> Total (To Item 18C/D)</td>
                            <td> <input type="text" style="background-color: rgb(220, 220, 220); width: 115px; text-align:right" id="txtmodalTotalAmountSched3" name="txtmodalTotalAmountSched3" size="12" value="{{$action == 'new' ? '0.00' : $data->item18C}}"/> </td>
							<td> <input type="text" style="background-color: rgb(220, 220, 220); width: 115px; text-align:right" id="txtmodalTotalInputTaxSched3" name="txtmodalTotalInputTaxSched3"  size="12"  value="{{$action == 'new' ? '0.00' : $data->item18D}}"/>  </td>
                            <td colspan="3"> &nbsp;</td>
                            <td> <input type="text" style="background-color: rgb(220, 220, 220); width: 115px; text-align:right" id="txtmodalTotalBalanceSched3A" name="txtmodalTotalBalanceSched3A" value="{{$action == 'new' ? '0.00' : $data->item_balance_sched3A}}"  size="12" value="0.00"/> </td>
                        </tr>
                    <!--</tfoot>-->
                </table>
                <table  width="100%" align="left" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td align="right"><input type='button' class="printButtonClass" style="margin-top:10px;margin-bottom:10px;margin-right: 10px;" id="btnAdd2" value='Add' onclick="addlistSched3A()" /><input type='button' style="margin-top:10px;margin-bottom:10px;margin-right: 10px;" class="printButtonClass" id="btnDelete2" value='Delete' onclick="deletelistSched3A()" />  </td>
                    </tr>
                </table>
				<br/><br/>
                <table width="100%" align="left" border="1" cellspacing="0" cellpadding="0">
					<tr class="modalColumnHeader"><td>B) Purchases/Importations Previous Period</td></tr>
                </table>         
				<br/><br/>
                <table border="1" cellspacing="0" cellpadding="0" width="100%" id="tblSched3B">
                    <thead>
                        <tr class="modalColumnHeader">
                            <td width=" 4%">&nbsp;  </td>
                            <td width='12%' align="center" ><b> Date Purchased </b></td>
                            <td width='12%' align="center" ><b> Description </b></td>
                            <td width='12%' align="center" ><b> Amount (Net of VAT) </b></td>
                            <td width='12%' align="center" ><b> Balance of Input Tax from previous period  </b></td>
                            <td width='12%' align="center" ><b> Est. Life (in months) </b></td>
                            <td width='12%' align="center" ><b> Recognized Life (In Months)Useful life or 60 mos. (whichever is shorter) </b></td>
                            <td width='12%' align="center" ><b> Allowable Input Tax for the Period (D) divided by (F)  </b></td>
                            <td width='12%' align="center" ><b> Balance of Input Tax to be carried to Next Period (D) less (G)  </b></td>
                        </tr>
                        <tr class="modalColumnHeader">
                            <td width='4%' align='center'> </td>
                            <td width='12%' align='center'> A</td>
                            <td width='12%' align='center'> B</td>
                            <td width='12%' align='center'> C</td>
                            <td width='12%' align='center'> D</td>
                            <td width='12%' align='center'> E</td> 
                            <td width='12%' align='center'> F</td>
                            <td width='12%' align='center'> G</td>
                            <td width='12%' align='center'> H</td>
                        </tr>
                    </thead>
                    <tbody id="tbodyllistSched3B">
                        
                    </tbody>
                    <!--<tfoot>-->
                        <tr>
                            <td class="modalColumnHeader" colspan="8"> Total </td>
                            <td> <input type="text" style="background-color: rgb(220, 220, 220); width: 115px; text-align:right" id="txtmodalTotalBalanceSched3B" name="txtmodalTotalBalanceSched3B"   size="12" value="{{$action == 'new' ? '0.00' : $data->item_balance_sched3B}}"/> </td>
                        </tr>
                    <!--</tfoot>-->
                </table>
                <table border="0" cellspacing="0" cellpadding="0" width='100%' align="left">
                    <tr>
                        <td align="right" colspan="2"> <input type='button' class="printButtonClass" id="btnAdd3" style="margin-top:10px;margin-bottom:10px;margin-right: 10px;" value='Add' onclick="addlistSched3B()" /><input type='button' class="printButtonClass" id="btnDelete3" style="margin-top:10px;margin-bottom:10px;margin-right: 10px;" value='Delete' onclick="deletelistSched3B()" />  </td>
                    </tr>
                </table>
				<br/><br/>
                <table border="1"  width='100%' align="left" cellspacing="0" cellpadding="0">
                    <tr>
                        <td class="modalColumnHeader" align="left"> C) Total Input Tax Deferred for future period from current and previous purchase (To item 20A) </td>
                        <td align="right"> <input type='text' style="background-color: rgb(220, 220, 220); text-align:right; width:115px" id="txtmodalTotalInputTax20ASched3" name="txtmodalTotalInputTax20ASched3" value='0.00'  />  </td>
                    </tr>
                </table>				
            </div>
            <br/><br/><br/>
            <div align="center">
                <input type="button" class="printButtonClass" name="btnOkPop3" id="btnOkPop3" style="width:120px; height:30px;" value="OK" onclick="getSched3Modal()"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="button" class="printButtonClass" name="btnClearPop3" id="btnClearPop3" style="width:120px; height:30px;" value="CLEAR"  onclick="clearSched3Modal()" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="button" class="printButtonClass" name="btnCancelPop3" id="btnCancelPop3" style="width:120px; height:30px;" value="CANCEL"  onclick="cancelSched3Modal()" />
                <br /><br />
            </div>
        </div>

        <!-- modal Sched4  -->
		<div id="modalSched4" class="printSignFooterClass aBox2550mSched4" style="width:94%; display:none; min-height:500px; position:relative; top:3%; left:3%; right:auto; overflow-y:auto; background:#fff;" align="center">
            <br/>
            <br/>
				<table border="1" width="100%">
					<tr class="modalHeader"><td> Schedule 4 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Input Tax Attributable to Sale to Government   </td>
					</tr>
				</table>			
                <table border="1" cellspacing="0" cellpadding="0" style="position: static;width: 100%" id="tblTax">
                    <tr>
                        <td class="modalContent" rowspan="2" colspan="4"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Input Tax directly attributable to sale to government  <br/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Add: Ratable portion of Input Tax not directly attributable to any activity:
                        </td>
                        <td align="center" > <input type="text" style="text-align: right" id="txtinputtaxSched4" name="txtinputtaxSched4" value="0.00" onblur="round(this,2); computeInputTaxSched4()" onkeypress='return numbersonly(this, event)' /> </td>
                    </tr>
                    <tr>
                        <td align="center" >&nbsp; </td>
                    </tr>
                    <tr class="modalContent">
                        <td width="20%"> Taxable sales to government </td>
                        <td width="20%"> <input type="text" style="background-color: rgb(220, 220, 220); text-align: right" id="txtTaxableSaleSched4" name="txtTaxableSaleSched4" value="0.00" />  </td>
                        <td width="20%" rowspan="2"> <b>X</b> Amount of Input Tax not<br/>directly attributable   </td>
                        <td width="20%" rowspan="2"> <input type="text" style="text-align: right" id="txtInputTaxnotDirectSched4" name="txtInputTaxnotDirectSched4"  value="0.00" onblur="round(this,2); computeInputTaxSched4()" onkeypress='return numbersonly(this, event)' />   </td>
                        <td width="20%" rowspan="2"> <input type="text" style="background-color: rgb(220, 220, 220); text-align: right" id="txtTotalInputTaxnotDirectSched4" name="txtTotalInputTaxnotDirectSched4" value="0.00" />   </td>
                    </tr>
                    <tr class="modalContent">
                        <td>---------------------------------------------<br/>
                            Total Sales             </td>
                        <td> <input type="text" style="background-color: rgb(220, 220, 220); text-align: right" id="txtTotalSaleSched4" name="txtTotalSaleSched4" value="0.00"  />  </td>
                    </tr>
                    <tr class="modalContent">
                        <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Total Input Tax attributable to sale to government</td>
                        <td> <input type="text" style="background-color: rgb(220, 220, 220); text-align: right" id="txtTotalInputSaletoGovernmentSched4" name="txtTotalInputSaletoGovernmentSched4" value="0.00" /> </td>
                    </tr>
                    <tr class="modalContent">
                        <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Less: Standard Input Tax to sale to government</td>
                        <td> <input type="text" style="text-align: right" id="txtlessStdTaxSched4" name="txtlessStdTaxSched4" value="5.00" onblur="computeInputTaxSched4(); round(this,2)" onkeypress='return numbersonly(this, event)' /> </td>
                    </tr>
                    <tr class="modalContent">
                        <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Input Tax on Sale to Govt. closed to expense (To Item 20B)</td>
                        <td> <input type="text" style="background-color: rgb(220, 220, 220); text-align: right" id="txtTotal20BSched4" name="txtTotal20BSched4" value="0.00" /> </td>
                    </tr>
                </table>

            <!--</div>-->
            <br/><br/>
			<div align="center">
            <input type="button" class="printButtonClass" name="btnOkPop" id="btnOkPop4" style="width:120px; height:30px;" value="OK" onclick="getSched4Modal()"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" class="printButtonClass" name="btnClearPop4" id="btnClearPop4" style="width:120px; height:30px;" value="CLEAR"  onclick="clearSched4Modal()" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" class="printButtonClass" name="btnCancelPop4" id="btnCancelPop4" style="width:120px; height:30px;" value="CANCEL"  onclick="cancelSched4Modal()" />
			</div>
            <br /><br />
        </div>

        <!-- modal Sched5  -->
		<div id="modalSched5" class="printSignFooterClass aBox2550mSched5" style="width:94%; display:none; min-height:500px; position:relative; top:3%; left:3%; right:auto; overflow-y:auto; background:#fff;" align="center">
            <br/>
            <br/>
			<table border="1" width="100%">
				<tr class="modalHeader"><td> Schedule 5 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				Input Tax Attributable to Exempt Sales   </td>
				</tr>
			</table>                        
			<table border="1" cellspacing="0" cellpadding="0" style="position: static;width: 100%" id="tblTax">
				<tr>
					<td class="modalContent" rowspan="2" colspan="4"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						Input Tax directly attributable to exempt sale  <br/>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						Add: Ratable portion of Input Tax not directly attributable to any activity:
					</td>
					<td align="center" > <input type="text" style="text-align: right" id="txtinputtaxSched5" name="txtinputtaxSched5" value="0.00" onblur="round(this,2); computeInputTaxSched5()" onkeypress='return numbersonly(this, event)' /> </td>
				</tr>
				<tr>
					<td align="center" >&nbsp; </td>
				</tr>
				<tr class="modalContent">
					<td width="20%"> Taxable Exempt Sale  </td>
					<td width="20%"> <input type="text" style="background-color: rgb(220, 220, 220); text-align: right" id="txtTotSaleSched5" name="txtTotSaleSched5" value="0.00" /> </td>
					<td width="20%" rowspan="2"> <b>X</b> Amount of Input Tax not directly attributable   </td>
					<td width="20%" rowspan="2"> <input type="text" style="text-align: right" id="txtAmountInputnotDirectSched5" name="txtAmountInputnotDirectSched5"  value="0.00" onblur="round(this,2); computeInputTaxSched5()" onkeypress='return numbersonly(this, event)' /> </td>
					<td width="20%" rowspan="2"> <input type="text" style="background-color: rgb(220, 220, 220); text-align: right" id="txtProductnotDirectSched5" name="txtProductnotDirectSched5" value="0.00" /> </td>
				</tr>
				<tr class="modalContent">
					<td>---------------------------------------------<br/>
						Total Sales            </td>
					<td> <input type="text" style="background-color: rgb(220, 220, 220); text-align: right" id="txtSumTotalSaleSched5" name="txtSumTotalSaleSched5" value="0.00"  />  </td>
				</tr>
				<tr class="modalContent">
					<td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						Total input tax attributable to exempt sale (To item 20 C)</td>
					<td> <input type="text" style="background-color: rgb(220, 220, 220); text-align: right" id="txtTotal20CSched5" name="txtTotal20CSched5" value="0.00" /> </td>
				</tr>
			</table>        

            <!--</div>-->
            <br/><br/>
			<div align="center">
            <input type="button" class="printButtonClass" name="btnOkPop" id="btnOkPop5" style="width:120px; height:30px;" value="OK" onclick="getSched5Modal()"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" class="printButtonClass" name="btnClearPop4" id="btnClearPop5" style="width:120px; height:30px;" value="CLEAR"  onclick="clearSched5Modal()" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" class="printButtonClass" name="btnCancelPop4" id="btnCancelPop5" style="width:120px; height:30px;" value="CANCEL"  onclick="cancelSched5Modal()" />
			</div>
            <br /><br />
        </div>

        <!-- modal Sched6  -->
		<div id="modalSched6" class="printSignFooterClass aBox2550mSched6" style="margin-top:15px; width:94%; display:none; min-height:500px; position:relative; top:3%; left:3%; right:auto; overflow-y:auto; background:#fff;" align="center">
			<table border="1" cellspacing="0" cellpadding="0" width="100%">
              <tr class="modalHeader">
				<td>Schedule 6 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tax Withheld Claimed as Tax Credit </td>
			  </tr>
			</table>
            <table border="1" cellspacing="0" cellpadding="0" style="width: 100%" id="tblSched6">
                <thead>
                    <tr class="modalColumnHeader">
                        <td width='5%'>&nbsp;</td>
                        <td width='19%' align="center" ><b>Period Covered</b></td>
                        <td width='19%' align="center" ><b>Name of Withholding Agent</b></td>
                        <td width='19%' align="center" ><b>Income Payment</b></td>
                        <td width='19%' align="center" ><b>Total Tax Withheld</b></td>
                        <td width='19%' align="center" ><b>Applied Current mo.</b></td>
                    </tr>
				</thead>
				<tbody id="tbodyllistSched6">
                    
                </tbody>
            </table>
            <table border="1" cellspacing="0" cellpadding="0" style="width: 100%">
                <thead>
				<tr height="35" valign="middle">
					<td width="62%" colspan="4" class="modalColumnHeader" align='center'>Total (To Item 23A)</td>
                    <td width='19%' align="center"><input type="text" style="background-color: rgb(220, 220, 220); text-align:right" id="txtmodalTotal23A" name="txtmodalTotal23A" value="{{$action == 'new' ? '0.00' : $data->item_total23A}}" disabled style="width: 120px"/></td>
                    <td width='19%' align="center"><input type="text" style="background-color: rgb(220, 220, 220); text-align:right" id="txtmodalTotalSched6AppliedCurrent" name="txtmodalTotalSched6AppliedCurrent" value="{{$action == 'new' ? '0.00' : $data->item23A}}" disabled  style="width: 120px"/></td>
                </tr>
				</thead>
            </table>
            <table border="0" cellspacing="0" cellpadding="0" style="width: 100%">
                <tr>
					<td width="81%" colspan="5">&nbsp;</td>
                    <td width='19%' align="center">
						<input type='button' class="printButtonClass" id="btnAdd4" value='Add' onclick="addlistSched6()" />&nbsp;&nbsp;&nbsp;
					    <input type='button' class="printButtonClass" id="btnDelete4" value='Delete' onclick="deletelistSched6()" />
					</td>
                </tr>
            </table>			
            <br/>
            <br/>
			<div align="center">
            <input type="button" class="printButtonClass" name="btnOkPop" id="btnOkPop6" style="width:120px; height:30px;" value="OK" onclick="getSched6Modal()"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" class="printButtonClass" name="btnClearPop6" id="btnClearPop6" style="width:120px; height:30px;" value="CLEAR"  onclick="clearSched6Modal()" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" class="printButtonClass" name="btnCancelPop6" id="btnCancelPop6" style="width:120px; height:30px;" value="CANCEL"  onclick="cancelSched6Modal()" />
			</div>
            <br />
            <br />
        </div>
        <!-- modal Sched7  -->
		<div id="modalSched7" class="printSignFooterClass aBox2550mSched7" style="width:94%; display:none; min-height:500px; position:relative; top:3%; left:3%; right:auto; overflow-y:auto; background:#fff;" align="center">

            <br/>
			<table border="1" cellspacing="0" cellpadding="0" width="100%">
            <tr class="modalHeader"><td>Schedule 7 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Schedule of Advance Payment </td></tr></table>

            <table border="1" cellspacing="0" cellpadding="0" style="position: static;width: 100%" id="tblSched7">
                <thead>
                    <tr class="modalColumnHeader">
                        <td width='4%'>&nbsp;</td>
                        <td width='16%' align="center" ><b>Period Covered</b></td>
                        <td width='16%' align="center" ><b>Name of Miller</b></td>
                        <td width='16%' align="center" ><b>Name of Tax Payer</b></td>
                        <td width='16%' align="center" ><b>Official Receipt Number</b></td>
                        <td width='16%' align="center" ><b>Amount Paid</b></td>
                        <td width='16%' align="center" ><b>Applied Current mo.</b></td>
                    </tr></thead>
                <tbody id="tbodyllistSched7">
                      
                </tbody>
            </table>
            <table border="1" style="position: static;width: 100%">
                <thead>
				<tr height="35" valign="middle">
					<td width='68%' class="modalColumnHeader" colspan='5' align='center'>Total (To Item 23B)</td>
                    <td width='16%'  align='center'><input type="text" style="background-color: rgb(220, 220, 220);width: 120px; text-align: right" id="txtmodalTotal23B" name="txtmodalTotal23B" value="{{$action == 'new' ? '0.00' : $data->item_total23B}}" disabled/></td>
                    <td width='16%'  align='center'><input type="text" style="background-color: rgb(220, 220, 220);width: 120px; text-align: right" id="txtmodalTotalSched7AppliedCurrent" name="txtmodalTotalSched7AppliedCurrent" value="{{$action == 'new' ? '0.00' : $data->item23B}}" disabled /></td>
                </tr>
				</thead>
            </table>
            <table border="0" style="position: static;width: 100%">
                <tr>
					<td width='68%' colspan='5'>&nbsp;</td>
                    <td width='32%' colspan='2' align='center'>
						<input type='button' class="printButtonClass" id="btnAdd5" value='Add' onclick="addlistSched7()" />&nbsp;&nbsp;&nbsp;
						<input type='button' class="printButtonClass" id="btnDelete5" value='Delete' onclick="deletelistSched7()" />
					</td>
                </tr>
            </table>			
            <br/>
            <br/>
			<div align="center">
            <input type="button" class="printButtonClass" name="btnOkPop" id="btnOkPop7" style="width:120px; height:30px;" value="OK" onclick="getSched7Modal()"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" class="printButtonClass" name="btnClearPop7" id="btnClearPop7" style="width:120px; height:30px;" value="CLEAR"  onclick="clearSched7Modal()" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" class="printButtonClass" name="btnCancelPop7" id="btnCancelPop7" style="width:120px; height:30px;" value="CANCEL"  onclick="cancelSched7Modal()" />
			</div>
            <br />
            <br />
        </div>		

			<!-- modal Sched8  -->
		<div id="modalSched8" class="printSignFooterClass aBox2550mSched8" style="margin-top:15px; width:94%; display:none; min-height:500px; position:relative; top:3%; left:3%; right:auto; overflow-y:auto; background:#fff;" align="center">

			<table border="1" cellspacing="0" cellpadding="0" width="100%">
            <tr class="modalHeader"><td>Schedule 8 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                VAT Withheld on Sales to Government </td></tr></table>

            <table border="1" cellspacing="0" cellpadding="0" style="position: static;width: 100%" id="tblSched8">
                <thead>
                    <tr class="modalColumnHeader">
                        <td width='5%'>&nbsp;</td>
                        <td width='19%' align="center" ><b>Period Covered</b></td>
                        <td width='19%' align="center" ><b>Name of Withholding Agent</b></td>
                        <td width='19%' align="center" ><b>Income Payment</b></td>
                        <td width='19%' align="center" ><b>Total Tax Withheld</b></td>
                        <td width='19%' align="center" ><b>Applied Current mo.</b></td>
                    </tr></thead>
                <tbody id="tbodyllistSched8">
                     
                </tbody>
            </table>
            <table border="0" cellspacing="0" cellpadding="0" style="position: static;width: 100%">
                <thead>
				<tr class="modalColumnHeader">
                    <td width='62%' colspan='4' align='center'>Total (To Item 23C)</td>
                    <td width='19%' align='center'><input type="text" style="background-color: rgb(220, 220, 220); text-align:right; width:120px" id="txtmodalTotal23C" name="txtmodalTotal23C" value="{{$action == 'new' ? '0.00' : $data->item_total23C}}" disabled/> </td>
                    <td width='19%' align='center'><input type="text" style="background-color: rgb(220, 220, 220); text-align:right; width:120px" id="txtmodalTotalSched8AppliedCurrent" name="txtmodalTotalSched8AppliedCurrent" value="{{$action == 'new' ? '0.00' : $data->item23C}}" disabled/> </td>
                </tr>
				</thead>
            </table>
            <table border="0" style="position: static;width: 100%">
                <tr>
					<td width='62%' colspan="4" align="center">&nbsp;</td>
                    <td width='38%' colspan="2" align='center'>
						<input type='button' class="printButtonClass" id="btnAdd6" value='Add' onclick="addlistSched8()" />&nbsp;&nbsp;&nbsp;
					    <input type='button' class="printButtonClass" id="btnDelete6" value='Delete' onclick="deletelistSched8()" />
					</td>
                </tr>
            </table>			
            <br/>
            <br/>
			<div align="center">
            <input type="button" class="printButtonClass" name="btnOkPop" id="btnOkPop8" style="width:120px; height:30px;" value="OK" onclick="getSched8Modal()"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" class="printButtonClass" name="btnClearPop8" id="btnClearPop8" style="width:120px; height:30px;" value="CLEAR"  onclick="clearSched8Modal()" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" class="printButtonClass" name="btnCancelPop8" id="btnCancelPop8" style="width:120px; height:30px;" value="CANCEL"  onclick="cancelSched8Modal()" />
			</div>
            <br />
            <br />
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
<script type="text/javascript">
	var isSubmitFinal = false;
	var isSubmit = false;
	
	var fileName = "";
	var existingXMLFileName = "";
	var gIsReadOnly = false; 
	var fileNameToExport = "";
	
	
    setTimeout("sleeptime()", 100);
	var atcList = new Array();
	var atcCount=0;

    var viewUploadFlag = false;
    var isModalTurnOn = false;
    var tempSchd1ATCCode = new Array();
    var tempSchd1ATCAmt = new Array();
    var tempSchd1ATCOutTax = new Array();
    var tempRowSizeSched1 = 0;

    var tempRowSizeSched2 = 0;
    var tempSchd2DatePur = new Array();
    var tempSchd2Desc = new Array();
    var tempSchd2NetVat = new Array();
    var tempSchd2InputTax = new Array();

    var tempRowSizeSched3A = 0;
    var tempSchd3PartADatePur = new Array();
    var tempSchd3PartADesc = new Array();
    var tempSchd3PartAAmtNetVat = new Array();
    var tempSchd3PartAInputTax = new Array();
    var tempSchd3PartAEstLife = new Array();
    var tempSchd3PartARecLife = new Array();
    var tempSchd3PartAAllowableInput = new Array();
    var tempSchd3PartABalanceInput = new Array();

    var tempRowSizeSched3B = 0;
    var tempSchd3PartBDatePur = new Array();
    var tempSchd3PartBDesc = new Array();
    var tempSchd3PartBAmtNetVat = new Array();
    var tempSchd3PartBBalInputPrev = new Array();
    var tempSchd3PartBEstLife = new Array();
    var tempSchd3PartBRecLife = new Array();
    var tempSchd3PartBAllowableInput = new Array();
    var tempSchd3PartBBalanceInput = new Array();

    var tempTxtSched4Input = "0.00";
    var tempTxtSched4InputVal = "0.00";
    var tempTxtSched4Add = "0.00";
    var tempTtxtSched4Total = "0.00";
    var tempTxtSched4Less = "0.00";
    var tempTxt20B = "0.00";

    var tempTxtSched5Input = "0.00";
    var tempTxtSched5Val = "0.00";
    var tempTxtSched5Add = "0.00";
    var tempTxt20 = "0.00";

    var tempRowSizeSched6 = 0;
    var tempSchd6PeriodCovered = new Array();
    var tempSchd6AgentNm = new Array();
    var tempSchd6INcPymnt = new Array();
    var tempSchd6TotalTaxWth = new Array();
    var tempSchd6AppCurr = new Array();

    var tempRowSizeSched7 = 0;
    var tempSchd7PeriodCovered = new Array();
    var tempSchd7MillerNm = new Array();
    var tempSchd7TaxpayerNm = new Array();
    var tempSchd7ORnum = new Array();
    var tempSchd7AmountPaid = new Array();
    var tempSchd7AppCurr = new Array();

    var tempRowSizeSched8 = 0;
    var tempSchd8PeriodCovered = new Array();
    var tempSchd8WthAgentNm = new Array();
    var tempSchd8IncPymnt = new Array();
    var tempSchd8TotalTaxWith = new Array();
    var tempSchd8TotalTaxWith = new Array();
	
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
	
	/*----------------------------------*/
	//Added by MPISCOSO
    var d=document,XMLBGFile='',data='',XMLFile='', XMLATCFile='',msg = d.getElementById('msg'),flag=true,flag2=true,flag3A=true,flag3B=true,flag6=true,flag7=true,flag8=true;
	var loader=d.getElementById('loader');
	/*----------------------------------*/	

    function toggleDisabled(el) {
        try {
            el.disabled = true;
        }
        catch(e){
        }
        if (el.childNodes && el.childNodes.length > 0) {
            for (var x = 0; x < el.childNodes.length; x++) {
                toggleDisabled(el.childNodes[x]);
            }
        }
    }

    function toggleAllDisabled() {
        toggleDisabled(d.getElementById("modalSched1"));
        toggleDisabled(d.getElementById("modalSched2"));
        toggleDisabled(d.getElementById("modalSched3"));
        toggleDisabled(d.getElementById("modalSched4"));
        toggleDisabled(d.getElementById("modalSched5"));
        toggleDisabled(d.getElementById("modalSched6"));
        toggleDisabled(d.getElementById("modalSched7"));
        toggleDisabled(d.getElementById("modalSched8"));
    }

    function optAmendFunc() {
        if(d.getElementById('frm2550m:OptAmendedYN1').checked) {
            d.getElementById('frm2550m:txtTax23D').disabled = false;
        } else {
            d.getElementById('frm2550m:txtTax23D').disabled = true;
			d.getElementById('frm2550m:txtTax23D').value = "0.00";
        }
    }
	var globalEmail = "";
    function sleeptime()
    {
        init();
		
        var xmlFileName = document.getElementById('file_name').value; 
        fileName = xmlFileName;
    
        if (fileName != null && fileName.indexOf('.xml') > -1) {
            var tin = fileName.split("/")[1].split("-");
            loadXML(fileName);  
            
            d.getElementById('frm2550m:RtnYear').disabled = true;
            d.getElementById('frm2550m:txtYear').disabled = true;
            
            existingXMLFileName = fileName;
            if (gIsReadOnly) { 
            window.setTimeout("disableAllElementIDs(); d.getElementById('btnUpload').disabled = false;",1000); 
            }  
        } else {
            window.setTimeout("$('#loader').hide('blind');",100);
        }   

		document.getElementById('frm2550m:txtTIN1').disabled = true; document.getElementById('frm2550m:txtTIN2').disabled = true; document.getElementById('frm2550m:txtTIN3').disabled = true; document.getElementById('frm2550m:txtBranchCode').disabled = true;
	 
   }
	
    function loadXML(loadWhere) {
        var url = document.getElementsByName('base_url')[0].getAttribute('content');
    
        var xmlHTTP = new XMLHttpRequest();
        try
        {
            xmlHTTP.open("GET", url + loadWhere, false);
            xmlHTTP.send(null);
            document.getElementById("response").innerHTML=xmlHTTP.responseText;
            if (loadWhere != null && loadWhere != "") {
                loadData();
                if (response.innerHTML.indexOf("All Rights Reserved BIR 2012.0") >= 0) {
                    gIsReadOnly = true;
                }
            
                if (gIsReadOnly) {
                    d.getElementById('frm2550m:cmdValidate').disabled = true;
                    d.getElementById('btnSave').disabled = true;
                } 

                getATCCode();
                window.setTimeout("loadDataWithATC();",300);                    
                window.setTimeout("loadData();",410);
                window.setTimeout("loadDataATCRow();getSched1Modal();",450); //flag=true;

                flag2=false;
                var count=0;
                var responses = d.getElementById('response').getElementsByTagName('div');
                var sPar = 'chxSched2';         
                
                do {
                    if (responses.item(count).innerHTML.indexOf(sPar) != -1) {
                        var temp = String(responses.item(count).innerHTML);
                        temp = temp.substring(0,sPar.length+1); //substring to length of search param for index - check files
                        temp = temp.substring(sPar.length,sPar.length+1); //get the last character for checking
                        if ( !isNaN(temp) ) addlistSched2Reload(); //if last char is a number, add modal section
                    } count++;
                } while (count!=responses.length);
                window.setTimeout("loadData();getSched2Modal();flag2=true;",510);   

                flag3A=false;
                var count3A=0;
                var responses3A = d.getElementById('response').getElementsByTagName('div');
                var sPar3A = 'txtAmt3A';                    
                do {
                    if (responses3A.item(count3A).innerHTML.indexOf(sPar3A) != -1) {
                        var temp = String(responses3A.item(count3A).innerHTML);
                        temp = temp.substring(0,sPar3A.length+1); //substring to length of search param for index - check files
                        temp = temp.substring(sPar3A.length,sPar3A.length+1); //get the last character for checking
                        if ( !isNaN(temp) ) addlistSched3AReload(); //if last char is a number, add modal section
                    } count3A++;
                } while (count3A!=responses3A.length);
                
                flag3B=false;
                var count3B=0;
                var responses3B = d.getElementById('response').getElementsByTagName('div');
                var sPar3B = 'txtAmt3B';                    
                do {
                    if (responses3B.item(count3B).innerHTML.indexOf(sPar3B) != -1) {
                        var temp = String(responses3B.item(count3B).innerHTML);
                        temp = temp.substring(0,sPar3B.length+1); //substring to length of search param for index - check files
                        temp = temp.substring(sPar3B.length,sPar3B.length+1); //get the last character for checking
                        if ( !isNaN(temp) ) addlistSched3BReload(); //if last char is a number, add modal section
                    } count3B++;
                } while (count3B!=responses3B.length);
                window.setTimeout("loadData();getSched3Modal();flag3A=true;flag3B=true;",510);

                flag6=false;
                var count6=0;
                var responses6 = d.getElementById('response').getElementsByTagName('div');
                var sPar6 = 'txtPeriodCovered';         
                
                do {
                    if (responses6.item(count6).innerHTML.indexOf(sPar6) != -1) {
                        var temp = String(responses6.item(count6).innerHTML);
                        temp = temp.substring(0,sPar6.length+1); //substring to length of search param for index - check files
                        temp = temp.substring(sPar6.length,sPar6.length+1); //get the last character for checking
                        if ( !isNaN(temp) ) addlistSched6Reload(); //if last char is a number, add modal section
                    } count6++;
                } while (count6!=responses6.length);
                window.setTimeout("loadData();getSched6Modal();flag6=true;",710);   

                flag7=false;
                var count7=0;
                var responses7 = d.getElementById('response').getElementsByTagName('div');
                var sPar7 = 'txtPeriodCoveredSch7';         
                
                do {
                    if (responses7.item(count7).innerHTML.indexOf(sPar7) != -1) {
                        var temp = String(responses7.item(count7).innerHTML);
                        temp = temp.substring(0,sPar7.length+1); //substring to length of search param for index - check files
                        temp = temp.substring(sPar7.length,sPar7.length+1); //get the last character for checking
                        if ( !isNaN(temp) ) addlistSched7Reload(); //if last char is a number, add modal section
                    } count7++;
                } while (count7!=responses7.length);
                window.setTimeout("loadData();getSched7Modal();flag7=true;",710);   

                flag8=false;
                var count8=0;
                var responses8 = d.getElementById('response').getElementsByTagName('div');
                var sPar8 = 'txtNameAgentSch8';         
                
                do {
                    if (responses8.item(count8).innerHTML.indexOf(sPar8) != -1) {
                        var temp = String(responses8.item(count8).innerHTML);
                        temp = temp.substring(0,sPar8.length+1); //substring to length of search param for index - check files
                        temp = temp.substring(sPar8.length,sPar8.length+1); //get the last character for checking
                        if ( !isNaN(temp) ) addlistSched8Reload(); //if last char is a number, add modal section
                    } count8++;
                } while (count8!=responses8.length);
                window.setTimeout("loadData();getSched8Modal();flag8=true;",710);     
            }
        }
        catch (e) {
            window.alert("Unable to load the requested file.");
            return;
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
                    if(elem[i].id == 'frm2550m:txtTaxPayerName' || elem[i].id == 'frm2550m:txtLineBus' || elem[i].id == 'frm2550m:txtAddress'){
                        elem[i].value = unescape(fieldVal[1]);
                    }
                    else{
                        elem[i].value = fieldVal[1]; //all select-one and text values               
                    }
                }               
            }
        }
        
    }   
    
    function loadDataWithATC() {
        /*This will load data onto fields*/
        var response = d.getElementById("response");
        
        var elem = document.getElementById('frmMain').elements;
        for(var i = 0; i < elem.length; i++)
        {
            
            if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {  //elem[i].type != 'button' &&           
                if (elem[i].type == 'text' || elem[i].type == 'select-one') {
                    var fieldVal = String( $("#response").html() ).split(elem[i].id+'='); 
                        if (fieldVal != null && fieldVal.length > 1) {
                            if(elem[i].id == 'frm2550m:txtTaxPayerName' || elem[i].id == 'frm2550m:txtLineBus' || elem[i].id == 'frm2550m:txtAddress'){
                                elem[i].value = unescape(fieldVal[1]);
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
                        if(elem[i].id == 'frm2550m:txtTaxPayerName' || elem[i].id == 'frm2550m:txtLineBus' || elem[i].id == 'frm2550m:txtAddress'){
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
                            //elem[i].onclick();
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
        document.getElementById('txtEmail').value = globalEmail;
    }
    function init()
    {	
        d.getElementById('frm2550m:OptAmendedYN1').disabled = false;
        d.getElementById('frm2550m:OptAmendedYN2').disabled = false;
        
		var date = new Date();
		var month = new Date();
		var year = new Date();
		
		@if($action == 'new')
			d.getElementById('frm2550m:RtnYear').selectedIndex = month.getMonth() + 1; 
			d.getElementById('frm2550m:txtYear').value = date.getFullYear();
			d.getElementById('frm2550m:lstSpecialTax').disabled = true;
		@else
			@if($data->item11 == 'Y')
				d.getElementById('frm2550m:lstSpecialTax').disabled = false;
			@endif
		@endif
	
        d.getElementById('frm2550m:txtTax12A').disabled = true;
        d.getElementById('frm2550m:txtTax12B').disabled = true;
        d.getElementById('frm2550m:txtTax16A').disabled = true;
        d.getElementById('frm2550m:txtTax16B').disabled = true;
        d.getElementById('frm2550m:txtTax17F').disabled = true;
        d.getElementById('frm2550m:txtTax18A').disabled = true;
        d.getElementById('frm2550m:txtTax18B').disabled = true;
        d.getElementById('frm2550m:txtTax18C').disabled = true;
        d.getElementById('frm2550m:txtTax18D').disabled = true;
		
        d.getElementById('frm2550m:txtTax18P').disabled = true;
        d.getElementById('frm2550m:txtTax19').disabled = true;
        d.getElementById('frm2550m:txtTax20A').disabled = true;
        d.getElementById('frm2550m:txtTax20B').disabled = true;
        d.getElementById('frm2550m:txtTax20C').disabled = true;
        d.getElementById('frm2550m:txtTax20F').disabled = true;
        d.getElementById('frm2550m:txtTax21').disabled = true;
        d.getElementById('frm2550m:txtTax22').disabled = true;
        d.getElementById('frm2550m:txtTax23A').disabled = true;
        d.getElementById('frm2550m:txtTax23B').disabled = true;
        d.getElementById('frm2550m:txtTax23C').disabled = true;
        d.getElementById('frm2550m:txtTax23D').disabled = true;
        d.getElementById('frm2550m:txtTax23G').disabled = true;
        d.getElementById('frm2550m:txtTax24').disabled = true;
       
        d.getElementById('frm2550m:txtTax25D').disabled = true;
        d.getElementById('frm2550m:txtTax26').disabled = true;

        @if($action != 'view')
        d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm2550m:cmdEdit').disabled = true;
		d.getElementById('frm2550m:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;
       	@endif
       	
        @if($action == 'new')
       		$('#tblSched1Atc').html("");
       		$('#tbodyllistSched2').html("");
            $('#tbodyllistSched3A').html("");
            $('#tbodyllistSched3B').html("");
            $('#tbodyllistSched6').html("");
            $('#tbodyllistSched7').html("");
            $('#tbodyllistSched8').html("");
       	@endif


        loadXMLATC('/xml/atcCodes.xml');     
        ATCList();
        
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

            //Ensure that before writing to atcPropertyJS the formType 2550M is traceable in atcStr
            if (atcStr.indexOf('2550M') >= 0) {
                var atcValues = atcStr.split('~');              
                
                var formType = "2550M";
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
                //alert('2550M successfully created array #'+i);
                
            } else {        
                //alert('2550M not found in array #'+i);
                continue;
            }
        }                   
    }

	function isItAnAmendedReturn(xmlFile) {	
		if(d.getElementById('frm2550m:OptAmendedYN1').checked) {
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
	function setInputTextControl_NumberFormatterNonNegative(id,limit,deci) {
		if (d.getElementById(id) != null) {
			d.getElementById(id).size = parseInt(limit);
			d.getElementById(id).value = parseFloat(d.getElementById(id).value).toFixed( parseInt(deci) );		
		}	
	}	

    function Schedule2()
    {
        this.txtDatePurchase = '';
        this.txtDescription = '';
        this.txtAmt = '0.00';
        this.txtInputTax = '0.00';
    }

    function Schedule3()
    {
        this.txtDatePurchase = '';
        this.txtDescription = '';
        this.txtAmt = '0.00';
        this.txtInputTax = '0.00';
        this.txtEstLife = '0';
        this.txtRecogLife = '1';
        this.txtAllowInputTax = '0.00';
        this.txtBalInputTax = '0.00';
    }

    function Schedule6and8()
    {
        this.txtPeriodCovered = '';
        this.txtNameAgent = '';
        this.txtIncomePayment = '0.00';
        this.txtTotalWithheld = '0.00';
        this.txtAppliedCurrMo = '0.00';
    }

    function Schedule7()
    {
        this.txtPeriodCovered = '';
        this.txtNameMiller = '';
        this.txtNameTaxPayer = '';
        this.txtORNumber = '';
        this.txtAmountPaid = '0.00';
        this.txtAppliedCurrMo = '0.00';
    }

    var sched2 = new Array();
    var sched2ToCommit = new Array();
    var sched3A = new Array();
    var sched3AToCommit = new Array();
    var sched3B = new Array();
    var sched3BToCommit = new Array();
    var sched6 = new Array();
    var sched6ToCommit = new Array();
    var sched7 = new Array();
    var sched7ToCommit = new Array();
    var sched8 = new Array();
    var sched8ToCommit = new Array();
    
    var ATCnameCode = new Array() ;
    var NaturePayment = new Array() ;
    //var TaxRate = new Array();
    function getPopulateATC()
    {


        ATCnameCode = new Array() ;
        NaturePayment = new Array() ;

        var atcSize = atcList.length;
	
        var i = 0;
        var j = 1;
        for(i = 0; i < atcSize; i++) {
            var atc = atcList[i];
            if(atc.formType == "2550M") {
                ATCnameCode[j] = atc.atcCode;
                NaturePayment[j++] = atc.description;
                //TaxRate[j++] = atc.rate;
            }
        }
    }

    function ATCList()
    {

        var i;
        getPopulateATC();
        //d.getElementById('tbllistAtcCode').innerHTML = "";
		$('#tbllistAtcCode').html("");
		
        for(i = 1 ; i < ATCnameCode.length ; i++  )
        {
            //d.getElementById('tbllistAtcCode').innerHTML =  d.getElementById('tbllistAtcCode').innerHTML +
			$('#tbllistAtcCode').html(  d.getElementById('tbllistAtcCode').innerHTML +
                "<tr class='atc'><td width='20%' class='atc'> <input id='AtcCode"+i+"' name='AtcCode"+i+"' type='checkbox' value='"+ATCnameCode[i]+"' /> "+ATCnameCode[i]+ " </td> <td width='80%' align='left' class='atc atcNames' id='AtcNaturePayment"+i+"' >"+ NaturePayment[i]+ " </td> </tr>");
        }
    }

    function enableSelTreaty()
    {
        d.getElementById('frm2550m:lstSpecialTax').disabled = false;
        d.getElementById('frm2550m:lstSpecialTax').selectedIndex = 0;

    }

    function disableSelTreaty()
    {
        d.getElementById('frm2550m:lstSpecialTax').disabled = true;
        d.getElementById('frm2550m:lstSpecialTax').selectedIndex = 0;
    }

    function saveSched1TempData() {
        var x = 0;

        tempSchd1ATCCode = new Array();
        tempSchd1ATCAmt = new Array();
        tempSchd1ATCOutTax = new Array();
        tempRowSizeSched1 = d.getElementById('tblSched1Atc').rows.length;

        for(x = 0; x < tempRowSizeSched1; x++){
            tempSchd1ATCCode[x] = d.getElementById('frm2550m:txtAtcCde'+ (x +1) ).value;
            tempSchd1ATCAmt[x] = d.getElementById('frm2550m:txtAmountSales'+ (x +1) ).value;
            tempSchd1ATCOutTax[x] = d.getElementById('frm2550m:txtOutputTax'+ (x +1) ).value;
        }
    }

    function restorePreviousTempData() {
        try {
            if(tempRowSizeSched1 > 0) {
                var x = 0;

                var i;
                getPopulateATC();
                //d.getElementById('tbllistAtcCode').innerHTML = "";
                $('#tbllistAtcCode').html("");
                

                for(i = 1 ; i < ATCnameCode.length ; i++  )
                {
                    var checkFlag = "";
                    for(x = 0; x < tempRowSizeSched1; x++){
                        var atccode = "" + tempSchd1ATCCode[x];
                        if(ATCnameCode[i] == atccode) {
                            checkFlag = "checked";
                            break;
                        }
                    }
                    //d.getElementById('tbllistAtcCode').innerHTML =  d.getElementById('tbllistAtcCode').innerHTML +
                    $('#tbllistAtcCode').html(  d.getElementById('tbllistAtcCode').innerHTML +
                    "<tr><td width='20%' > <input id='AtcCode"+i+"' name='AtcCode"+i+"' type='checkbox' value='"+ATCnameCode[i]+"' " + checkFlag + " /> "+ATCnameCode[i]+ " </td> <td width='80%' align='left' id='AtcNaturePayment"+i+"' >"+ NaturePayment[i]+ " </td> </tr>");
                }

                getATCCode();

                /*for(x = 0; x < tempRowSizeSched1; x++){
                    d.getElementById('frm2550m:txtAtcCde'+ (x +1) ).value = tempSchd1ATCCode[x];
                    setTimeout("setInputTextControl_NumberFormatterNonNegative('frm2550m:txtAmountSales" + (x + 1) + "', 12,2); d.getElementById('frm2550m:txtAmountSales" + (x + 1) + "').value = tempSchd1ATCAmt[" + x + "];", 100);
                    setTimeout("setInputTextControl_NumberFormatterNonNegative('frm2550m:txtOutputTax" + (x + 1) + "', 12,2); d.getElementById('frm2550m:txtOutputTax" + (x + 1) + "').value = tempSchd1ATCOutTax[" + x + "];", 100);
                }*/
                for(x = 0; x < tempRowSizeSched1; x++){
                d.getElementById("frm2550m:txtAtcCde" + (x + 1)).value = tempSchd1ATCCode[x];
                d.getElementById("frm2550m:txtAmountSales" + (x + 1)).value = tempSchd1ATCAmt[x];
                d.getElementById("frm2550m:txtOutputTax" + (x + 1)).value = tempSchd1ATCOutTax[x];
                }

                setTimeout("totalAmountandOutputTax();", 100);
                setTimeout("getSched1Modal();", 100);
            }
        } catch (e) {
            alert("Error on loading data.\n\nException:\n" + e.toString());
            return;
        }
    }
    
    function showSched1(){
		if(!isModalTurnOn) {
				saveSched1TempData();
					$('#wrapper').css({'display':'none' });
					d.getElementById('mainContent').style.display = "none";
					$('#modalSched1').show('blind');			
				
				setTimeout("d.getElementById('frm2550M:txtmodaltxtTotal12A').disabled = true; setInputTextControl_HorizontalAlignment('frm2550M:txtmodaltxtTotal12A', 4);" +
					"d.getElementById('frm2550M:txtmodaltxtTotal12B').disabled = true; setInputTextControl_HorizontalAlignment('frm2550M:txtmodaltxtTotal12B', 4);", 100);

				isModalTurnOn = true;
			}

			if(viewUploadFlag) {
				setTimeout("d.getElementById('btnSched1ATC').disabled = true;", 100);
				setTimeout("d.getElementById('btnClearPop').disabled = true;", 100);
				setTimeout("d.getElementById('btnCancelPop').disabled = true;", 100);
				setTimeout("toggleAllDisabled();", 100);
				setTimeout("d.getElementById('btnOkPop1').disabled = false;", 100);
			}
    }

    var tempATC = new Array();
    var tempATCAmount = new Array();
    var tempATCOutput = new Array();
    function showModalAtc() {
        tempATC = new Array();
        tempATCAmount = new Array();
        tempATCOutput = new Array();
        for(var i = 0; i < d.getElementById('tblSched1Atc').rows.length; i++) {
            tempATC[i] = d.getElementById('frm2550m:txtAtcCde'+ (i + 1)).value;
            tempATCAmount[i] = d.getElementById('frm2550m:txtAmountSales'+ (i + 1)).value;
            tempATCOutput[i] = d.getElementById('frm2550m:txtOutputTax'+(i +1)).value;

        }

			d.getElementById('modalSched1').style.display = "none";
			$('#modalAtc').show('blind');		

    }

    function getATCCode() {     
			d.getElementById('modalSched1').style.display = 'block';
			if ( $('#modalAtc').css('display') != 'none' ) {
				$('#modalAtc').hide('blind');
			}
			$('#tblSched1Atc').html("");
		//}
        var x = 1;
        var listATCtable = d.getElementById('tbllistAtcCode');
        for(var i = 1 ; i <= listATCtable.rows.length; i++ )
        {
            if(d.getElementById('AtcCode'+i) != null)
            {
                if (d.getElementById('AtcCode'+i).checked == true )
                {
                    var taxAmounttemp = "0.00";
                    var taxOutputtemp = "0.00";
                    for(var tempCount = 0 ; tempCount < tempATC.length; tempCount++) {
                        if(tempATC[tempCount] == d.getElementById('AtcCode'+i).value){
                            taxAmounttemp = tempATCAmount[tempCount];
                            taxOutputtemp = tempATCOutput[tempCount];
                            break;
                        }
                    }
					$('#tblSched1Atc').html(  d.getElementById('tblSched1Atc').innerHTML + 
                        "<tr><td id='txtNaturePayment"+x+"' width='50%' align='left' > "+ d.getElementById('AtcNaturePayment'+i).innerHTML + " <input name='txtNaturePayment[]' type='hidden' value='"+ d.getElementById('AtcNaturePayment'+i).innerHTML + "' /> </td>" +
                        "<td width='10%' align='center'> <input type='text' style='width:70px' size='5' id='frm2550m:txtAtcCde"+x+"' name='frm2550m:txtAtcCde[]' class='styletxtAtcCode' value='"+ d.getElementById('AtcCode'+i).value + "' />  </td>" +
                        "<td width='20%' align='center'> <input type='text' style='text-align:right; width:130px' size='18' id='frm2550m:txtAmountSales"+x+"' name='frm2550m:txtAmountSales[]' class='styletxtAmountSales'  value='"+taxAmounttemp +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); getRequiredWithheld("+x+");totalAmountandOutputTax()' /> </td>" +
                        "<td width='20%' align='center'> <input type='text' style='text-align:right; width:130px' size='18' id='frm2550m:txtOutputTax"+x+"' name='frm2550m:txtOutputTax[]' class='styletxtOutputTax'  value='"+taxOutputtemp +"' disabled onblur='totalAmountandOutputTax();'/> </td>" +
                        "</tr>");

                    setTimeout("d.getElementById('frm2550m:txtAtcCde"+x+"').disabled = true; " +
                       "setInputTextControl_HorizontalAlignment('frm2550m:txtAmountSales"+x+"', 4);d.getElementById('frm2550m:txtAmountSales"+x+"').value=d.getElementById('frm2550m:txtAmountSales"+x+"').value;" +
                        "setInputTextControl_HorizontalAlignment('frm2550m:txtOutputTax"+x+"', 4);d.getElementById('frm2550m:txtOutputTax"+x+"').value=d.getElementById('frm2550m:txtOutputTax"+x+"').value;" +
                        "getRequiredWithheld("+x+");" , 100);
                    x++;
                }
                
            }
        }
        totalAmountandOutputTax();
		
    }

    function getSched1Modal(){
        if (checkifFieldEmptySched1() )
        {
          
			 d.getElementById('mainContent').style.display = 'block';
			 if ( $('#modalSched1').css('display') != 'none' ) {
				$('#modalSched1').hide('blind');
				$('#wrapper').css({'display':'block' });
			 }
			 $('#DummyTxt').html("Creator");
			 $('#DummyTxt').html("");
			
            d.getElementById('frm2550m:txtTax12A').value  = d.getElementById('frm2550M:txtmodaltxtTotal12A').value;
            d.getElementById('frm2550m:txtTax12B').value  = d.getElementById('frm2550M:txtmodaltxtTotal12B').value;
            compute13B();
            compute16A();
            compute16B();

            isModalTurnOn = false;
        }
    }

    function clearSched1Modal() {
        d.getElementById("frm2550M:txtmodaltxtTotal12A").value = "0.00"
        d.getElementById("frm2550M:txtmodaltxtTotal12B").value = "0.00"

        var listATCtable =   d.getElementById('tbllistAtcCode');
        for(var i = 1 ; i < listATCtable.rows.length - 1; i++ ) {
			if (d.getElementById("frm2550m:txtAmountSales"+(i)) != null && d.getElementById("frm2550m:txtOutputTax"+(i)) != null) {
            	d.getElementById("frm2550m:txtAmountSales"+(i)).value = "0.00";
            	d.getElementById("frm2550m:txtOutputTax"+(i)).value = "0.00";
			}
        }
      
    }

    function cancelSched1Modal() {
        restorePreviousTempData();

			d.getElementById('mainContent').style.display = 'block';
			if ( $('#modalSched1').css('display') != 'none' ) {
				$('#modalSched1').hide('blind');
				$('#wrapper').show('blind');
			}
			$('#DummyTxt').html("Creator");
			$('#DummyTxt').html("");	
		
        isModalTurnOn = false;
    }

    function getRequiredWithheld(numIndex)
    {
        d.getElementById('frm2550m:txtOutputTax'+numIndex).value = formatCurrency(NumWithComma(d.getElementById('frm2550m:txtAmountSales'+numIndex).value) * 0.12 );
    }


    function blockletter(e)
    {
        var number = parseFloat(e.value).toFixed(2);
        if(isNaN(number)) {
          
            e.value = "0.00";
        } else {
            e.value = '' + number;
        }
    }

    function blockletterWithout2Decimal(e)
    {
        var number = parseFloat(e.value);
        if(isNaN(number))
        {
          
            e.value = "";
        }else {
            e.value = '' + number.toFixed(0);
        }
    }

    function totalAmountandOutputTax() {
        var tbl =  d.getElementById('tblSched1Atc')
        var txt12A = 0;
        var txt12B = 0;
        for(var i = 1 ; i <= tbl.rows.length ; i ++){
            txt12A = txt12A +  NumWithComma(d.getElementById('frm2550m:txtAmountSales'+i).value);
            txt12B = txt12B +  NumWithComma(d.getElementById('frm2550m:txtOutputTax'+i).value);
        }

        d.getElementById('frm2550M:txtmodaltxtTotal12A').value = formatCurrency("" + txt12A);
        d.getElementById('frm2550M:txtmodaltxtTotal12B').value = formatCurrency("" + txt12B);
    }

    function checkifFieldEmptySched1()
    {
        var tbl =  d.getElementById('tblSched1Atc')
        for(var i = 1 ; i <= tbl.rows.length ; i ++){
            if( d.getElementById('frm2550m:txtAmountSales'+i).value <= 0 || d.getElementById('frm2550m:txtOutputTax'+i).value <= 0 )
            {
			}
        }
        return true;
    }

    function saveTempSched2Data() {
        tempRowSizeSched2 = d.getElementById("tblSched2").rows.length - 1;
        tempSchd2DatePur = new Array();
        tempSchd2Desc = new Array();
        tempSchd2NetVat = new Array();
        tempSchd2InputTax = new Array();

        for(var x = 0; x < tempRowSizeSched2; x++){
            tempSchd2DatePur[x] = d.getElementById('txtDatePurchased'+ (x) ).value;
            tempSchd2Desc[x] = d.getElementById('txtDescription'+ (x)).value;
            tempSchd2NetVat[x] = d.getElementById('txtAmt'+ (x)).value;
            tempSchd2InputTax[x] = d.getElementById('txtInputTax'+ (x)).value;
        }
    }

    function restoreTempSched2Data() {
        try {
            if(tempRowSizeSched2 > 0) {
                sched2ToCommit = new Array();
               
				$('#tbodyllistSched2').html("");

                var x = 0;

                for(x = 0; x < tempRowSizeSched2; x++){
                    addlistSched2();
                    
                    d.getElementById('txtDatePurchased'+ (x) ).value = tempSchd2DatePur[x];
                    d.getElementById('txtDescription'+ (x)).value = tempSchd2Desc[x];
                    d.getElementById('txtAmt'+ (x)).value = tempSchd2NetVat[x];
                    d.getElementById('txtInputTax'+ (x)).value = tempSchd2InputTax[x];

                    getInputTaxCompute(x);
                }

                setTimeout("getSched2Modal();", 100);
            }
        } catch (e) {
            alert("Error on loading data.\n\nException:\n" + e.toString());
			return;
        }
    }

    function showSched2(){
		if(!isModalTurnOn) {
				saveTempSched2Data();

				if(d.getElementById('frm2550m:txtYear').value <= 2000 && d.getElementById('frm2550m:txtYear').value <= 2020 ) {
					alert("Please input a valid Return period year. Please enter 2000 above.");
					return;
				} else {           
					$('#wrapper').css({'display':'none' });
					d.getElementById('mainContent').style.display = "none";
					$('#modalSched2').show('blind');						
					
					setTimeout("d.getElementById('txtmodalTotalAmt').disabled = true; setInputTextControl_HorizontalAlignment('txtmodalTotalAmt', 4);" +
						"d.getElementById('txtmodalTotalInputTax').disabled = true; setInputTextControl_HorizontalAlignment('txtmodalTotalInputTax', 4);", 100);

					isModalTurnOn = true;
				}
				
			}

			if(viewUploadFlag) {
				setTimeout("d.getElementById('btnAdd1').disabled = true;", 100);
				setTimeout("d.getElementById('btnDelete1').disabled = true;", 100);
				setTimeout("d.getElementById('btnClearPop2').disabled = true;", 100);
				setTimeout("d.getElementById('btnCancelPop2').disabled = true;", 100);
				setTimeout("toggleAllDisabled();", 100);
				setTimeout("d.getElementById('btnOkPop2').disabled = false;", 100);
			}
    }

    function getSched2Modal(){
        if (checkifEmptyFieldSched2() )
        {
            
			if (NumWithComma(d.getElementById('txtmodalTotalAmt').value) > 1000000) {
				alert("The total aggregate amount should not exceed 1 Million.\n Please re-enter the values of Schedule 2."); return ;
			}
			
			 d.getElementById('mainContent').style.display = 'block';
			 if ( $('#modalSched2').css('display') != 'none' ) {
				$('#modalSched2').hide('blind');
				$('#wrapper').css({'display':'block' });
			 }
			 $('#DummyTxt').html("Creator");
			 $('#DummyTxt').html("");			

            d.getElementById('frm2550m:txtTax18A').value  = d.getElementById('txtmodalTotalAmt').value;
            d.getElementById('frm2550m:txtTax18B').value  = d.getElementById('txtmodalTotalInputTax').value;
            compute18P();

            isModalTurnOn = false;
        }
    }

    function clearSched2Modal() {
        var rowSizeSched2 = d.getElementById("tblSched2").rows.length - 1;

        for(var x = 0; x < rowSizeSched2; x++){
            d.getElementById('txtDatePurchased'+ (x) ).value = "";
            d.getElementById('txtDescription'+ (x)).value = "";
            d.getElementById('txtAmt'+ (x)).value = "0.00";
            d.getElementById('txtInputTax'+ (x)).value = "0.00";

            getInputTaxCompute(x);
        }
    }

    function cancelSched2Modal() {
        restoreTempSched2Data();

		d.getElementById('mainContent').style.display = 'block';
		if ( $('#modalSched2').css('display') != 'none' ) {
			$('#modalSched2').hide('blind');
			$('#wrapper').show('blind');
		}
		$('#DummyTxt').html("Creator");
		$('#DummyTxt').html("");	
		
        isModalTurnOn = false;
    }

    function checkifEmptyFieldSched2() {

        var size = d.getElementById("tblSched2").rows.length -1;
        for(var i = 0 ; i < size ; i++)
        {
            if(d.getElementById('txtDatePurchased'+ i).value == "" || d.getElementById('txtDescription'+ i).value == "") {
                alert("Please enter valid row " + (i + 1) + " data for Schedule 2.\n" +
                    "Empty fields are not allowed."); return ;
            } 
			
			if (NumWithComma(d.getElementById('txtAmt'+i).value) > 1000000) {
				alert("Please enter valid data.\n Aggregate amount should not exceed P1 Million."); return ;
			}
			
			strmmddyyy = d.getElementById('txtDatePurchased'+i).value;

			if(strmmddyyy != ""){
				var result = strmmddyyy.split("/")
				if(result.length == 3 ){
					//Variables
					var month = result[0];
					var day = result[1];
					var year = result[2];
					
					var isLeap = new Date(year, 1, 29).getMonth() == 1;
						
					if(isNaN(month) || isNaN(day) || isNaN(year)){
						alert("Please enter a valid date for Date of Purchase on row "+(i+1)+".\n" +
						"Please enter a date in the MM/DD/YYYY format.");
					return;
					}else{ // Validate of valid Day for the month
						
						var month31 = (['01', '03', '05', '07', '08', '10', '12']);
						var month30 = (['04', '06', '09', '11']);			
						if (month31.contains(month) && day > 31)
						{
							alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only.");
							return;
						}
						else if (month30.contains(month) && day > 30)
						{
							alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only.");
							return;
						}else if(month == 2){
								//Special Handling for Leap Year
								if (!isLeap && day == 29) {
									alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only.");
									return;
								}
								if (!isLeap && day > 29) {
									alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only.");
									return;
								}
								if (isLeap && day >29) {
									alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only.");
									return;
								}
								
						}else{
							//Validation if year is within the period				
							if(year != d.getElementById('frm2550m:txtYear').value ||  month != d.getElementById('frm2550m:RtnYear').value*1  )
							{
								alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only."); return;
							}
						
						}
					}
				}else{
				alert("Please enter a valid date for Date of Purchase on row "+(i+1)+".\n" +
				"Please enter a date in the MM/DD/YYYY format.");
				return;
				}
			}
         
            if( d.getElementById('txtAmt'+ i).value <= 0 ) {
                alert("Please enter amount for Net of VAT on row " + ( i + 1) + ".\n" +
                    "Value must be greater than 0."); return;
            }
        }

        return true;
    }
	
    function addlistSched2Reload()
    {       
            var size = sched2ToCommit.length;

            for(var i = 0 ; i < size ; i++)
            {
                sched2ToCommit[i].txtDatePurchase = d.getElementById('txtDatePurchased'+i).value;
                sched2ToCommit[i].txtDescription = d.getElementById('txtDescription'+i).value;
                sched2ToCommit[i].txtAmt = d.getElementById('txtAmt'+i).value;
                sched2ToCommit[i].txtInputTax = d.getElementById('txtInputTax'+i).value;
            }
            i = sched2ToCommit.length;
            sched2ToCommit[i] = new Schedule2();
        
         
			$('#tbodyllistSched2').html("");
			
            for(i = 0; i < sched2ToCommit.length; i++) {

				 $('#tbodyllistSched2').html(  d.getElementById('tbodyllistSched2').innerHTML + "<tr>" + 				
                    "<td width='4%' align='center'> <input type='checkbox' class='printButtonClass' id='chxSched2"+i+"' /> </td>" +
                    "<td width='20%' align='center'> <input type='text' size='10'  id='txtDatePurchased"+i+"' value='"+ sched2ToCommit[i].txtDatePurchase +"' maxlength='10'  > </td>" +
                    "<td width='32%' align='center'> <input type='text' style='width:200px' size='25'  id='txtDescription"+i+"' value='"+ sched2ToCommit[i].txtDescription +"'  maxlength='50' > </td> " +
                    "<td width='22%' align='center'><input type='text' style='width:130px' size='18' id='txtAmt"+i+"' value='"+ sched2ToCommit[i].txtAmt +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); getInputTaxCompute("+i+")' maxlength='17' /> </td> " +
                    "<td width='22%' align='center'><input type='text' style='width:130px' size='18' id='txtInputTax"+i+"' value='"+ sched2ToCommit[i].txtInputTax +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax()' maxlength='17' /> </td>");				
			
            /*    setTimeout("setInputTextControl_HorizontalAlignment('txtAmt"+i+"',4 );setInputTextControl_NumberFormatterNonNegative('txtAmt"+i+"',12,2);d.getElementById('txtAmt"+i+"').value=d.getElementById('txtAmt"+i+"').value;" +
                    "setInputTextControl_HorizontalAlignment('txtInputTax"+i+"',4 );setInputTextControl_NumberFormatterNonNegative('txtInputTax"+i+"',12,2);d.getElementById('txtInputTax"+i+"').value=d.getElementById('txtInputTax"+i+"').value;",100);
			*/
			
				setTimeout("setInputTextControl_HorizontalAlignment('txtAmt"+i+"',4 );d.getElementById('txtAmt"+i+"').value=d.getElementById('txtAmt"+i+"').value;" +
                    "setInputTextControl_HorizontalAlignment('txtInputTax"+i+"',4 );d.getElementById('txtInputTax"+i+"').value=d.getElementById('txtInputTax"+i+"').value;",100);
            }
    }	

    function addlistSched2()
    {
        if(checkifEmptyFieldSched2()) {
            var size = d.getElementById("tblSched2").rows.length -1;
          
            for(var i = 0 ; i < size ; i++)
            {
                console.log(d.getElementById('txtDatePurchased'+i).value);
                sched2ToCommit[i].txtDatePurchase = '';
                sched2ToCommit[i].txtDescription = d.getElementById('txtDescription'+i).value;
                sched2ToCommit[i].txtAmt = d.getElementById('txtAmt'+i).value;
                sched2ToCommit[i].txtInputTax = d.getElementById('txtInputTax'+i).value;
            }
            i = sched2ToCommit.length;
            sched2ToCommit[i] = new Schedule2();
			$('#tbodyllistSched2').html("");
            for(i = 0; i < sched2ToCommit.length; i++) {

				 $('#tbodyllistSched2').html(  d.getElementById('tbodyllistSched2').innerHTML + "<tr>" + 				
                    "<td width='4%' align='center'> <input type='checkbox' class='printButtonClass' id='chxSched2"+i+"' name='chxSched2"+i+"' /> </td>" +
                    "<td width='20%' align='center'> <input type='text' size='10'  id='txtDatePurchased"+i+"' name='txtDatePurchased[]'  value='"+ sched2ToCommit[i].txtDatePurchase +"' maxlength='10'  > </td>" +
                    "<td width='32%' align='center'> <input type='text' style='width:200px' size='25'  id='txtDescription"+i+"' name='txtDescription[]'  value='"+ sched2ToCommit[i].txtDescription +"'  maxlength='50' > </td> " +
                    "<td width='22%' align='center'><input type='text' style='width:130px' size='18' id='txtAmt"+i+"' name='txtAmt[]'  value='"+ sched2ToCommit[i].txtAmt +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); getInputTaxCompute("+i+")' maxlength='17' /> </td> " +
                    "<td width='22%' align='center'><input type='text' style='width:130px' size='18' id='txtInputTax"+i+"' name='txtInputTax[]'  value='"+ sched2ToCommit[i].txtInputTax +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax()' maxlength='17' /> </td>");		
				
				setTimeout("setInputTextControl_HorizontalAlignment('txtAmt"+i+"',4 );d.getElementById('txtAmt"+i+"').value=d.getElementById('txtAmt"+i+"').value;" +
                    "setInputTextControl_HorizontalAlignment('txtInputTax"+i+"',4 );d.getElementById('txtInputTax"+i+"').value=d.getElementById('txtInputTax"+i+"').value;",100);
            }
        }
    }

    function deletelistSched2()
    {
        var sched2Temp = new Array();
        var i = 0;
        var size = sched2ToCommit.length;
        for(i = 0 ; i < size ; i++)
        {
            sched2ToCommit[i].txtDatePurchase = d.getElementById('txtDatePurchased'+i).value;
            sched2ToCommit[i].txtDescription = d.getElementById('txtDescription'+i).value;
            sched2ToCommit[i].txtAmt = d.getElementById('txtAmt'+i).value;
            sched2ToCommit[i].txtInputTax = d.getElementById('txtInputTax'+i).value;
        }
        i = 0;
        for(var j = 0; j < size ; j++) {
            if(!d.getElementById("chxSched2" + j).checked) {
                sched2Temp[i++] = sched2ToCommit[j];
            }
        }

        if(sched2Temp.length > 0) {
            sched2ToCommit = new Array();
            sched2ToCommit = sched2Temp;
            //d.getElementById("tbodyllistSched2").innerHTML = "";
			$('#tbodyllistSched2').html("");

            for(i = 0; i < sched2Temp.length; i++) {
                sched2ToCommit[i] = sched2Temp[i];
                //d.getElementById("tbodyllistSched2").innerHTML += "<tr>" +
				$('#tbodyllistSched2').html(  d.getElementById('tbodyllistSched2').innerHTML + "<tr>" + 
                    "<td width='4%' align='center'> <input type='checkbox' class='printButtonClass' id='chxSched2"+i+"' /> </td>" +
                    "<td width='20%' align='center'> <input type='text' size='10'  id='txtDatePurchased"+i+"'  value='"+ sched2ToCommit[i].txtDatePurchase +"' maxlength='10'  > </td>" +
                    "<td width='32%' align='center'> <input type='text' style='width:200px' size='25'  id='txtDescription"+i+"'  value='"+ sched2ToCommit[i].txtDescription +"'  maxlength='50' > </td> " +
                    "<td width='22%' align='center'><input type='text' style='width:130px' size='18' id='txtAmt"+i+"'  value='"+ sched2ToCommit[i].txtAmt +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); getInputTaxCompute("+i+")' maxlength='17' /> </td> " +
                    "<td width='22%' align='center'><input type='text' style='width:130px' size='18' id='txtInputTax"+i+"'   value='"+ sched2ToCommit[i].txtInputTax +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax()' maxlength='17' /> </td>");		
			

                setTimeout("setInputTextControl_HorizontalAlignment('txtAmt"+i+"',4 );" +
                    "setInputTextControl_HorizontalAlignment('txtInputTax"+i+"',4 ) ",100);

            }
        } else {
            sched2ToCommit = new Array();
            //d.getElementById("tbodyllistSched2").innerHTML = "";
			$('#tbodyllistSched2').html("");
        }
        computeSumTax();
    }

    function showSched3(){
		if(!isModalTurnOn) {
				saveTempSched3Data();

				if(d.getElementById('frm2550m:txtYear').value <= 2000 && d.getElementById('frm2550m:txtYear').value <= 2020 ) {
					alert("Please input a valid Return period year. Please enter 2000 above.");
					return;
				} else {
					
					d.getElementById('mainContent').style.display = "none";
					$('#modalSched3').show('blind');		
					$('#wrapper').css({'display':'none' });
				  
					setTimeout("d.getElementById('txtmodalTotalAmountSched3').disabled = true; setInputTextControl_HorizontalAlignment('txtmodalTotalAmountSched3', 4);" +
						"d.getElementById('txtmodalTotalInputTaxSched3').disabled = true; setInputTextControl_HorizontalAlignment('txtmodalTotalInputTaxSched3', 4);" +
						"d.getElementById('txtmodalTotalBalanceSched3A').disabled = true; setInputTextControl_HorizontalAlignment('txtmodalTotalBalanceSched3A', 4);" +
						"d.getElementById('txtmodalTotalBalanceSched3B').disabled = true; setInputTextControl_HorizontalAlignment('txtmodalTotalBalanceSched3B', 4);" +
						"d.getElementById('txtmodalTotalInputTax20ASched3').disabled = true; setInputTextControl_HorizontalAlignment('txtmodalTotalInputTax20ASched3', 4);", 100);

					for(var i = 0; i < d.getElementById("tblSched3A").rows.length - 3; i++) {
						setTimeout("setInputTextControl_HorizontalAlignment('txtAmt3A"+i+"',4 );" +
							"setInputTextControl_HorizontalAlignment('txtInputTax3A"+i+"',4 );" +
							"d.getElementById('txtAllowInputTax3A"+i+"').disabled = true;setInputTextControl_HorizontalAlignment('txtAllowInputTax3A"+i+"',4 );" +
							"d.getElementById('txtBalInputTax3A"+i+"').disabled = true;setInputTextControl_HorizontalAlignment('txtBalInputTax3A"+i+"',4 );" +
							"",100);

						setTimeout("d.getElementById('txtAmt3A"+i+"').value=d.getElementById('txtAmt3A"+i+"').value", 100);
						setTimeout("d.getElementById('txtInputTax3A"+i+"').value=d.getElementById('txtInputTax3A"+i+"').value", 100);
						setTimeout("d.getElementById('txtAllowInputTax3A"+i+"').value=d.getElementById('txtAllowInputTax3A"+i+"').value", 100);
						setTimeout("d.getElementById('txtBalInputTax3A"+i+"').value=d.getElementById('txtBalInputTax3A"+i+"').value", 100);
					}

					for(i = 0; i < d.getElementById("tblSched3B").rows.length - 3; i++) {
						setTimeout("setInputTextControl_HorizontalAlignment('txtAmt3B"+i+"',4);" +
							"setInputTextControl_HorizontalAlignment('txtBalInputTaxPrevious3B"+i+"',4);" +
							"d.getElementById('txtAllowInputTax3B"+i+"').disabled = true; setInputTextControl_HorizontalAlignment('txtAllowInputTax3B"+i+"',4 );" +
							"d.getElementById('txtBalInputTax3B"+i+"').disabled = true; setInputTextControl_HorizontalAlignment('txtBalInputTax3B"+i+"',4 );" +
							"",100);

						setTimeout("d.getElementById('txtAmt3B"+i+"').value=d.getElementById('txtAmt3B"+i+"').value", 100);
						setTimeout("d.getElementById('txtBalInputTaxPrevious3B"+i+"').value=d.getElementById('txtBalInputTaxPrevious3B"+i+"').value", 100);
						setTimeout("d.getElementById('txtAllowInputTax3B"+i+"').value=d.getElementById('txtAllowInputTax3B"+i+"').value", 100);
						setTimeout("d.getElementById('txtBalInputTax3B"+i+"').value=d.getElementById('txtBalInputTax3B"+i+"').value", 100);
					}
					isModalTurnOn = true;
				}
				
			}

			if(viewUploadFlag) {
				setTimeout("d.getElementById('btnAdd2').disabled = true;", 100);
				setTimeout("d.getElementById('btnDelete2').disabled = true;", 100);
				setTimeout("d.getElementById('btnAdd3').disabled = true;", 100);
				setTimeout("d.getElementById('btnDelete3').disabled = true;", 100);
				setTimeout("d.getElementById('btnClearPop3').disabled = true;", 100);
				setTimeout("d.getElementById('btnCancelPop3').disabled = true;", 100);
				setTimeout("toggleAllDisabled();", 100);
				setTimeout("d.getElementById('btnOkPop3').disabled = false;", 100);
			}
    }

    function checkifEmptyFieldSched3(nameTable) {
        if(nameTable == "A" || nameTable == "AandB" ) {
            var size = sched3AToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {   
                if(d.getElementById('txtDatePurchased3A'+ i).value == "" || d.getElementById('txtDescription3A'+ i).value == "" ||
                    d.getElementById('txtAllowInputTax3A'+ i).value == 0  ) {
                    alert("Please enter valid row " + (i + 1) + " data for Schedule 3A.\n" +
                        "Empty fields are not allowed."); return ;
                } 
				
				strmmddyyy = d.getElementById('txtDatePurchased3A'+i).value;

			if(strmmddyyy != ""){
				var result = strmmddyyy.split("/")
				if(result.length == 3 ){
					//Variables
					var month = result[0];
					var day = result[1];
					var year = result[2];
					
					var isLeap = new Date(year, 1, 29).getMonth() == 1;
						
					if(isNaN(month) || isNaN(day) || isNaN(year)){
						alert("Please enter a valid date for Date of Purchase on row "+(i+1)+".\n" +
						"Please enter a date in the MM/DD/YYYY format.");
					return;
					}else{ // Validate of valid Day for the month
						//Check if valid date
						var month31 = (['01', '03', '05', '07', '08', '10', '12']);
						var month30 = (['04', '06', '09', '11']);			
						if (month31.contains(month) && day > 31)
						{
							alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only.");
							return;
						}
						else if (month30.contains(month) && day > 30)
						{
							alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only.");
							return;
						}else if(month == 2){
								//Special Handling for Leap Year
								if (!isLeap && day == 29) {
									alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only.");
									return;
								}
								if (!isLeap && day > 29) {
									alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only.");
									return;
								}
								if (isLeap && day >29) {
									alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only.");
									return;
								}
								
						}else{
							//Validation if year is within the period				
							if(year != d.getElementById('frm2550m:txtYear').value ||  month != d.getElementById('frm2550m:RtnYear').value*1  )
							{
								alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only."); return;
							}
						
						}
					}
				}else{
				alert("Please enter a valid date for Date of Purchase on row "+(i+1)+".\n" +
				"Please enter a date in the MM/DD/YYYY format.");
				return;
				}
			}
			
                if( d.getElementById('txtAmt3A'+ i).value <= 0 ) {
                    alert("Please enter amount for Net of VAT on row " + ( i + 1) + ".\n" +
                        "Value must be greater than 0."); return;
                }
                if( d.getElementById('txtEstLife3A'+ i).value <= 0 || d.getElementById('txtEstLife3A'+ i).value > 999 ) {
                    alert("Please enter a value 1 to 999 for Estimated Life on row " + ( i + 1) + " Schedule 3" +
                        "Part A."); return;
                }
                if( d.getElementById('txtRecogLife3A'+ i).value <= 0 || d.getElementById('txtRecogLife3A'+ i).value > 60 ) {
                    alert("Please enter a value 1 to 60 for Recognized Life on row " + ( i + 1) +
                        "Part A."); return;
                }
            }
			
			
            if(nameTable == "AandB") { 
				if(sched3AToCommit.length > 0) { 
					if(NumWithComma(d.getElementById('txtmodalTotalAmountSched3').value) <= 1000000 ) {
						alert("The total aggregate amount does not exceed 1 Million.\n Please re-enter the values of Schedule 3.");
						return;
					}
				}
            }
        }
        if(nameTable == "B" || nameTable == "AandB") {
            var size = sched3BToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
                if(d.getElementById('txtDatePurchased3B'+ i).value == "" || d.getElementById('txtDescription3B'+ i).value == "" ) {
                    alert("If you don't have any entries for Schedule 3b,\n" +
                        "please delete the row on this schedule if not applicable."); return ;
                } strmmddyyy = d.getElementById('txtDatePurchased3B'+i).value;
                var ifyearless = "false";
						
				if(strmmddyyy != ""){
					var result = strmmddyyy.split("/")
					if(result.length == 3 ){
						//Variables
						var month = result[0];
						var day = result[1];
						var year = result[2];
						
						var isLeap = new Date(year, 1, 29).getMonth() == 1;
							
						if(isNaN(month) || isNaN(day) || isNaN(year)){
							alert("Please enter a valid date for Date of Purchase on row "+(i+1)+".\n" +
							"Please enter a date in the MM/DD/YYYY format.");
						return;
						}else{ // Validate of valid Day for the month
						
						//check if year is < current Year
						if(year < d.getElementById('frm2550m:txtYear').value  ){
						ifyearless = "true";
						}
							
							//Check if valid date
							var month31 = (['01', '03', '05', '07', '08', '10', '12']);
							var month30 = (['04', '06', '09', '11']);			
							if (month31.contains(month) && day > 31)
							{
								alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only.");
								return;
							}
							else if (month30.contains(month) && day > 30)
							{
								alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only.");
								return;
							}else if(month == 2){
									//Special Handling for Leap Year
									if (!isLeap && day == 29) {
										alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only.");
										return;
									}
									if (!isLeap && day > 29) {
										alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only.");
										return;
									}
									if (isLeap && day >29) {
										alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only.");
										return;
									}
									
							}else{
								//Validation if year is within the period
								//Initialize value
								
								if(ifyearless == "false") {					
									if(year > d.getElementById('frm2550m:txtYear').value )
									{   
										alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only."); return;
									}else if( year == d.getElementById('frm2550m:txtYear').value ){ 
										if(month*1 >= d.getElementById('frm2550m:RtnYear').value*1 ) { 
											alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only."); return;
										}
									}
								}
							
							}
						}
					}else{
					alert("Please enter a valid date for Date of Purchase on row "+(i+1)+".\n" +
					"Please enter a date in the MM/DD/YYYY format.");
					return;
					}
				}				
				
				
                if( d.getElementById('txtAmt3B'+ i).value <= 0 ) {
                    alert("Please enter amount for Net of VAT on row " + ( i + 1) + ".\n" +
                        "Value must be greater than 0 in Part B."); return;
                }
                if( d.getElementById('txtEstLife3B'+ i).value <= 0 || d.getElementById('txtEstLife3B'+ i).value > 999 ) {
                    alert("Please enter a value 1 to 999 for Estimated Life on row " + ( i + 1) + " Schedule 3" +
                        "Part B."); return;
                }
                if( d.getElementById('txtRecogLife3B'+ i).value <= 0 || d.getElementById('txtRecogLife3B'+ i).value > 60 ) {
                    alert("Please enter a value 1 to 60 for Recognized Life on row " + ( i + 1) +
                        "Part B."); return;
                }
            }
        }
        return true;
    }

    function saveTempSched3Data() {
        var x = 0;
        tempRowSizeSched3A = d.getElementById("tblSched3A").rows.length - 3;;

        for(x = 0; x < tempRowSizeSched3A; x++){
            tempSchd3PartADatePur[x] = d.getElementById('txtDatePurchased3A'+ (x) ).value;
            tempSchd3PartADesc[x] = d.getElementById('txtDescription3A'+ (x)).value;
            tempSchd3PartAAmtNetVat[x] = d.getElementById('txtAmt3A'+ (x)).value;
            tempSchd3PartAInputTax[x] = d.getElementById('txtInputTax3A'+ (x)).value;
            tempSchd3PartAEstLife[x] = d.getElementById('txtEstLife3A'+ (x)).value;
            tempSchd3PartARecLife[x] = d.getElementById('txtRecogLife3A'+ (x)).value;
            tempSchd3PartAAllowableInput[x] = d.getElementById('txtAllowInputTax3A'+ (x)).value;
            tempSchd3PartABalanceInput[x] = d.getElementById('txtBalInputTax3A'+ (x)).value;
        }

        tempRowSizeSched3B = d.getElementById("tblSched3B").rows.length - 3;
		
        for(x = 0; x < tempRowSizeSched3B; x++) {
            tempSchd3PartBDatePur[x] = d.getElementById('txtDatePurchased3B'+ (x) ).value;
            tempSchd3PartBDesc[x] = d.getElementById('txtDescription3B'+ (x)).value;
            tempSchd3PartBAmtNetVat[x] = d.getElementById('txtAmt3B'+ (x)).value;
            tempSchd3PartBBalInputPrev[x] = d.getElementById('txtBalInputTaxPrevious3B'+ (x)).value;
            tempSchd3PartBEstLife[x] = d.getElementById('txtEstLife3B'+ (x)).value;
            tempSchd3PartBRecLife[x] = d.getElementById('txtRecogLife3B'+ (x)).value;
            tempSchd3PartBAllowableInput[x] = d.getElementById('txtAllowInputTax3B'+ (x)).value;
            tempSchd3PartBBalanceInput[x] = d.getElementById('txtBalInputTax3B'+ (x)).value;
        }
    }

    function restoreTempSched3Data() {
        try {
            if(tempRowSizeSched3A > 0) {
                var x = 0;
               
				$('#tbodyllistSched3A').html("");
				
                sched3AToCommit = new Array();
                for(x = 0; x < tempRowSizeSched3A; x++){
                    addlistSched3A();

                    d.getElementById('txtDatePurchased3A'+ (x) ).value = tempSchd3PartADatePur[x];
                    d.getElementById('txtDescription3A'+ (x)).value = tempSchd3PartADesc[x];
                    d.getElementById('txtAmt3A'+ (x)).value = tempSchd3PartAAmtNetVat[x];
                    d.getElementById('txtInputTax3A'+ (x)).value = tempSchd3PartAInputTax[x];
                    d.getElementById('txtEstLife3A'+ (x)).value = tempSchd3PartAEstLife[x];
                    d.getElementById('txtRecogLife3A'+ (x)).value = tempSchd3PartARecLife[x];
                    d.getElementById('txtAllowInputTax3A'+ (x)).value = tempSchd3PartAAllowableInput[x];
                    d.getElementById('txtBalInputTax3A'+ (x)).value = tempSchd3PartABalanceInput[x];

                    getInputTaxCompute3A(x);
                    computeSumTax3A();
                }
            }

            if(tempRowSizeSched3B > 0) {
                var x = 0;
                //d.getElementById("tbodyllistSched3B").innerHTML = "";
				$('#tbodyllistSched3A').html("");
                sched3BToCommit = new Array();
                for(x = 0; x < tempRowSizeSched3B; x++) {
                    addlistSched3B();

                    d.getElementById('txtDatePurchased3B'+ (x)).value = tempSchd3PartBDatePur[x];
                    d.getElementById('txtDescription3B'+ (x)).value = tempSchd3PartBDesc[x];
                    d.getElementById('txtAmt3B'+ (x)).value = tempSchd3PartBAmtNetVat[x];
                    d.getElementById('txtBalInputTaxPrevious3B'+ (x)).value = tempSchd3PartBBalInputPrev[x];
                    d.getElementById('txtEstLife3B'+ (x)).value = tempSchd3PartBEstLife[x];
                    d.getElementById('txtRecogLife3B'+ (x)).value = tempSchd3PartBRecLife[x];
                    d.getElementById('txtAllowInputTax3B'+ (x)).value = tempSchd3PartBAllowableInput[x];
                    d.getElementById('txtBalInputTax3B'+ (x)).value = tempSchd3PartBBalanceInput[x];

                    computeSumTax3B();
                }
            }
        } catch (e) {
            alert("Error on loading data.\n\nException:\n" + e.toString());
			return;
        }
    }

    function clearSched3Modal() {
        var x = 0;
        var rowSizeSched3A = d.getElementById("tblSched3A").rows.length - 3;
        for(x = 0; x < rowSizeSched3A; x++){
            d.getElementById('txtDatePurchased3A'+ (x) ).value = "";
            d.getElementById('txtDescription3A'+ (x)).value = "";
            d.getElementById('txtAmt3A'+ (x)).value = "0.00";
            d.getElementById('txtInputTax3A'+ (x)).value = "0.00";
            d.getElementById('txtEstLife3A'+ (x)).value = "0";
            d.getElementById('txtRecogLife3A'+ (x)).value = "1";
            d.getElementById('txtAllowInputTax3A'+ (x)).value = "0.00";
            d.getElementById('txtBalInputTax3A'+ (x)).value = "0.00";

            getInputTaxCompute3A(x);
            computeSumTax3A();
        }

        x = 0;
        var rowSizeSched3B = d.getElementById("tblSched3B").rows.length - 3;
        for(x = 0; x < rowSizeSched3B; x++) {
            d.getElementById('txtDatePurchased3B'+ (x)).value = "";
            d.getElementById('txtDescription3B'+ (x)).value = "";
            d.getElementById('txtAmt3B'+ (x)).value = "0.00";
            d.getElementById('txtBalInputTaxPrevious3B'+ (x)).value = "0.00";
            d.getElementById('txtEstLife3B'+ (x)).value = "0";
            d.getElementById('txtRecogLife3B'+ (x)).value = "1";
            d.getElementById('txtAllowInputTax3B'+ (x)).value = "0.00";
            d.getElementById('txtBalInputTax3B'+ (x)).value = "0.00";

            computeSumTax3B();
        }
    }

    function cancelSched3Modal() {
        if (!flag) { 
		restoreTempSched3Data();
		}
       
		d.getElementById('mainContent').style.display = 'block';
		if ( $('#modalSched3').css('display') != 'none' ) {
			$('#modalSched3').hide('blind');
			$('#wrapper').show('blind');
		}
		$('#DummyTxt').html("Creator");
		$('#DummyTxt').html("");	
        isModalTurnOn = false;
    }

    function getSched3Modal(){
        if (checkifEmptyFieldSched3("AandB") )
        {
          
			 d.getElementById('mainContent').style.display = 'block';
			 if ( $('#modalSched3').css('display') != 'none' ) {
				$('#modalSched3').hide('blind');
				$('#wrapper').css({'display':'block' });
			 }
			 $('#DummyTxt').html("Creator");
			 $('#DummyTxt').html("");			
			
            d.getElementById('frm2550m:txtTax18C').value  = d.getElementById('txtmodalTotalAmountSched3').value;
            d.getElementById('frm2550m:txtTax18D').value  = d.getElementById('txtmodalTotalInputTaxSched3').value;
            d.getElementById('frm2550m:txtTax20A').value  = d.getElementById('txtmodalTotalInputTax20ASched3').value;
            compute18P();
            compute20F();

            isModalTurnOn = false;
        }
    }

    function addlistSched3AReload()
    {
            var size = sched3AToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
                sched3AToCommit[i].txtDatePurchase = d.getElementById('txtDatePurchased3A'+i).value;
                sched3AToCommit[i].txtDescription = d.getElementById('txtDescription3A'+i).value;
                sched3AToCommit[i].txtAmt = d.getElementById('txtAmt3A'+i).value;
                sched3AToCommit[i].txtInputTax = d.getElementById('txtInputTax3A'+i).value;
                sched3AToCommit[i].txtEstLife = d.getElementById('txtEstLife3A'+i).value;
                sched3AToCommit[i].txtRecogLife = d.getElementById('txtRecogLife3A'+i).value;
                sched3AToCommit[i].txtAllowInputTax = d.getElementById('txtAllowInputTax3A'+i).value;
                sched3AToCommit[i].txtBalInputTax = d.getElementById('txtBalInputTax3A'+i).value;
            }
            i = sched3AToCommit.length;
            sched3AToCommit[i] = new Schedule3();

          
			$('#tbodyllistSched3A').html("");
			
            for(i = 0; i < sched3AToCommit.length; i++) {

				$('#tbodyllistSched3A').html(  d.getElementById('tbodyllistSched3A').innerHTML + "<tr>" + 
                    "<td width='4%' align='center'> <input type='checkbox' class='printButtonClass' id='chxSched3A"+i+"' /> </td>" +
                    "<td width='12%' align='center'> <input type='text' size='8'  id='txtDatePurchased3A"+i+"' value='"+ sched3AToCommit[i].txtDatePurchase +"' maxlength='10'  > </td>" +
                    "<td width='12%' align='center'> <input type='text' size='8'  id='txtDescription3A"+i+"'  value='"+ sched3AToCommit[i].txtDescription +"' maxlength='50' > </td> " +
                    "<td width='12%' align='center'><input type='text' style='width:115px' size='12' id='txtAmt3A"+i+"' value='"+ sched3AToCommit[i].txtAmt +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); getInputTaxCompute3A("+i+")' maxlength='17' /> </td> " +
                    "<td width='12%' align='center'><input type='text' style='width:115px' size='12' id='txtInputTax3A"+i+"'  value='"+ sched3AToCommit[i].txtInputTax +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax3A()' maxlength='17'  /> </td>" +
                    "<td width='12%' align='center'><input type='text' size='8' style='text-align:right' id='txtEstLife3A"+i+"' value='"+ sched3AToCommit[i].txtEstLife +"' onkeypress='return numbersonly(this, event)' onblur='blockletterWithout2Decimal(this);' maxlength='3'  /> </td>" +
                    "<td width='12%' align='center'><input type='text' size='8' style='text-align:right' id='txtRecogLife3A"+i+"'  value='"+ sched3AToCommit[i].txtRecogLife +"' onkeypress='return numbersonly(this, event)' onblur='blockletterWithout2Decimal(this);computeSumTax3A();' maxlength='2'  /> </td>" +
                    "<td width='12%' align='center'><input type='text' style='width:115px' size='12' id='txtAllowInputTax3A"+i+"' style='background-color: rgb(220, 220, 220);'  value='"+ sched3AToCommit[i].txtAllowInputTax +"'  /> </td>" +
                    "<td width='12%' align='center'><input type='text' style='width:115px' size='12' id='txtBalInputTax3A"+i+"' style='background-color: rgb(220, 220, 220);'  value='"+ sched3AToCommit[i].txtBalInputTax +"'  /> </td>");

                setTimeout("setInputTextControl_HorizontalAlignment('txtAmt3A"+i+"',4 );" +
                    "setInputTextControl_HorizontalAlignment('txtInputTax3A"+i+"',4 );" +
                    "d.getElementById('txtAllowInputTax3A"+i+"').disabled = true;setInputTextControl_HorizontalAlignment('txtAllowInputTax3A"+i+"',4 );" +
                    "d.getElementById('txtBalInputTax3A"+i+"').disabled = true;setInputTextControl_HorizontalAlignment('txtBalInputTax3A"+i+"',4 );" +
                    "",100);

                setTimeout("d.getElementById('txtAmt3A"+i+"').value=d.getElementById('txtAmt3A"+i+"').value", 100);
                setTimeout("d.getElementById('txtInputTax3A"+i+"').value=d.getElementById('txtInputTax3A"+i+"').value", 100);
                setTimeout("d.getElementById('txtAllowInputTax3A"+i+"').value=d.getElementById('txtAllowInputTax3A"+i+"').value", 100);
                setTimeout("d.getElementById('txtBalInputTax3A"+i+"').value=d.getElementById('txtBalInputTax3A"+i+"').value", 100);
            }
    }	
	
    function addlistSched3A()
    {
        if(checkifEmptyFieldSched3("A")) {
            var size = sched3AToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
                sched3AToCommit[i].txtDatePurchase = d.getElementById('txtDatePurchased3A'+i).value;
                sched3AToCommit[i].txtDescription = d.getElementById('txtDescription3A'+i).value;
                sched3AToCommit[i].txtAmt = d.getElementById('txtAmt3A'+i).value;
                sched3AToCommit[i].txtInputTax = d.getElementById('txtInputTax3A'+i).value;
                sched3AToCommit[i].txtEstLife = d.getElementById('txtEstLife3A'+i).value;
                sched3AToCommit[i].txtRecogLife = d.getElementById('txtRecogLife3A'+i).value;
                sched3AToCommit[i].txtAllowInputTax = d.getElementById('txtAllowInputTax3A'+i).value;
                sched3AToCommit[i].txtBalInputTax = d.getElementById('txtBalInputTax3A'+i).value;
            }
            i = sched3AToCommit.length;
            sched3AToCommit[i] = new Schedule3();

			$('#tbodyllistSched3A').html("");
			
            for(i = 0; i < sched3AToCommit.length; i++) {

				$('#tbodyllistSched3A').html(  d.getElementById('tbodyllistSched3A').innerHTML + "<tr>" + 
                    "<td width='4%' align='center'> <input type='checkbox' class='printButtonClass' id='chxSched3A"+i+"' name='chxSched3A'/> </td>" +
                    "<td width='12%' align='center'> <input type='text' size='8'  id='txtDatePurchased3A"+i+"' name='txtDatePurchased3A[]'  value='"+ sched3AToCommit[i].txtDatePurchase +"' maxlength='10'  > </td>" +
                    "<td width='12%' align='center'> <input type='text' size='8'  id='txtDescription3A"+i+"' name='txtDescription3A[]' value='"+ sched3AToCommit[i].txtDescription +"' maxlength='50' > </td> " +
                    "<td width='12%' align='center'><input type='text' style='width:115px' size='12' id='txtAmt3A"+i+"' name='txtAmt3A[]' value='"+ sched3AToCommit[i].txtAmt +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); getInputTaxCompute3A("+i+")' maxlength='17' /> </td> " +
                    "<td width='12%' align='center'><input type='text' style='width:115px' size='12' id='txtInputTax3A"+i+"' name='txtInputTax3A[]'  value='"+ sched3AToCommit[i].txtInputTax +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax3A()' maxlength='17'  /> </td>" +
                    "<td width='12%' align='center'><input type='text' size='8' style='text-align:right' id='txtEstLife3A"+i+"' name='txtEstLife3A[]' value='"+ sched3AToCommit[i].txtEstLife +"' onkeypress='return numbersonly(this, event)' onblur='blockletterWithout2Decimal(this);' maxlength='3'  /> </td>" +
                    "<td width='12%' align='center'><input type='text' size='8' style='text-align:right' id='txtRecogLife3A"+i+"' name='txtRecogLife3A[]'  value='"+ sched3AToCommit[i].txtRecogLife +"' onkeypress='return numbersonly(this, event)' onblur='blockletterWithout2Decimal(this);computeSumTax3A();' maxlength='2'  /> </td>" +
                    "<td width='12%' align='center'><input type='text' style='width:115px' size='12' id='txtAllowInputTax3A"+i+"' name='txtAllowInputTax3A[]' style='background-color: rgb(220, 220, 220);'  value='"+ sched3AToCommit[i].txtAllowInputTax +"'  /> </td>" +
                    "<td width='12%' align='center'><input type='text' style='width:115px' size='12' id='txtBalInputTax3A"+i+"' name='txtBalInputTax3A[]' style='background-color: rgb(220, 220, 220); '  value='"+ sched3AToCommit[i].txtBalInputTax +"'  /> </td>");

				setTimeout("setInputTextControl_HorizontalAlignment('txtAmt3A"+i+"',4 );" +
                    "setInputTextControl_HorizontalAlignment('txtInputTax3A"+i+"',4 );" +
                    "d.getElementById('txtAllowInputTax3A"+i+"').disabled = true;setInputTextControl_HorizontalAlignment('txtAllowInputTax3A"+i+"',4 );" +
                    "d.getElementById('txtBalInputTax3A"+i+"').disabled = true;setInputTextControl_HorizontalAlignment('txtBalInputTax3A"+i+"',4 );" +
                    "",100);

                setTimeout("d.getElementById('txtAmt3A"+i+"').value=d.getElementById('txtAmt3A"+i+"').value", 100);
                setTimeout("d.getElementById('txtInputTax3A"+i+"').value=d.getElementById('txtInputTax3A"+i+"').value", 100);
                setTimeout("d.getElementById('txtAllowInputTax3A"+i+"').value=d.getElementById('txtAllowInputTax3A"+i+"').value", 100);
                setTimeout("d.getElementById('txtBalInputTax3A"+i+"').value=d.getElementById('txtBalInputTax3A"+i+"').value", 100);
            }
        }
    }

    function deletelistSched3A()
    {
        var sched3ATemp = new Array();
        var i = 0;
        var size = sched3AToCommit.length;
        for(i = 0 ; i < size ; i++)
        {
            sched3AToCommit[i].txtDatePurchase = d.getElementById('txtDatePurchased3A'+i).value;
            sched3AToCommit[i].txtDescription = d.getElementById('txtDescription3A'+i).value;
            sched3AToCommit[i].txtAmt = d.getElementById('txtAmt3A'+i).value;
            sched3AToCommit[i].txtInputTax = d.getElementById('txtInputTax3A'+i).value;
            sched3AToCommit[i].txtEstLife = d.getElementById('txtEstLife3A'+i).value;
            sched3AToCommit[i].txtRecogLife = d.getElementById('txtRecogLife3A'+i).value;
            sched3AToCommit[i].txtAllowInputTax = d.getElementById('txtAllowInputTax3A'+i).value;
            sched3AToCommit[i].txtBalInputTax = d.getElementById('txtBalInputTax3A'+i).value;
        }
        i = 0;
        for(var j = 0; j < size ; j++) {
            if(!d.getElementById("chxSched3A" + j).checked) {
                sched3ATemp[i++] = sched3AToCommit[j];
            }
        }

        if(sched3ATemp.length > 0) {
            sched3AToCommit = new Array();
            sched3AToCommit = sched3ATemp;
			$('#tbodyllistSched3A').html("");
			
            for(i = 0; i < sched3ATemp.length; i++) {
                sched3AToCommit[i] = sched3ATemp[i];
               
				$('#tbodyllistSched3A').html(  d.getElementById('tbodyllistSched3A').innerHTML + "<tr>" + 
                    "<td width='4%' align='center'> <input type='checkbox' class='printButtonClass' id='chxSched3A"+i+"' style='width: 20px' /> </td>" +
                    "<td width='12%' align='center'> <input type='text' size='8'  id='txtDatePurchased3A"+i+"' value='"+ sched3AToCommit[i].txtDatePurchase +"' maxlength='10'  > </td>" +
                    "<td width='12%' align='center'> <input type='text' size='8'  id='txtDescription3A"+i+"' value='"+ sched3AToCommit[i].txtDescription +"' maxlength='50' > </td> " +
                    "<td width='12%' align='center'><input type='text' style='width:115px' size='12' id='txtAmt3A"+i+"' value='"+ sched3AToCommit[i].txtAmt +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); getInputTaxCompute3A("+i+")' maxlength='17' /> </td> " +
                    "<td width='12%' align='center'><input type='text' style='width:115px' size='12' id='txtInputTax3A"+i+"'  value='"+ sched3AToCommit[i].txtInputTax +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax3A()' maxlength='17'  /> </td>" +
                    "<td width='12%' align='center'><input type='text' size='8' style='text-align:right' id='txtEstLife3A"+i+"'  value='"+ sched3AToCommit[i].txtEstLife +"' onkeypress='return numbersonly(this, event)' onblur='blockletterWithout2Decimal(this);' maxlength='3'  /> </td>" +
                    "<td width='12%' align='center'><input type='text' size='8' style='text-align:right' id='txtRecogLife3A"+i+"' value='"+ sched3AToCommit[i].txtRecogLife +"' onkeypress='return numbersonly(this, event)' onblur='blockletterWithout2Decimal(this);computeSumTax3A();' maxlength='2'  /> </td>" +
                    "<td width='12%' align='center'><input type='text' style='width:115px' size='12' id='txtAllowInputTax3A"+i+"' style='background-color: rgb(220, 220, 220);'  value='"+ sched3AToCommit[i].txtAllowInputTax +"'  /> </td>" +
                    "<td width='12%' align='center'><input type='text' style='width:115px' size='12' id='txtBalInputTax3A"+i+"' style='background-color: rgb(220, 220, 220);'  value='"+ sched3AToCommit[i].txtBalInputTax +"'  /> </td>");

					
				setTimeout("setInputTextControl_HorizontalAlignment('txtAmt3A"+i+"',4 );" +
                    "setInputTextControl_HorizontalAlignment('txtInputTax3A"+i+"',4 );" +
                    "d.getElementById('txtAllowInputTax3A"+i+"').disabled = true;setInputTextControl_HorizontalAlignment('txtAllowInputTax3A"+i+"',4 );" +
                    "d.getElementById('txtBalInputTax3A"+i+"').disabled = true;setInputTextControl_HorizontalAlignment('txtBalInputTax3A"+i+"',4 );" +
                    "",100);

                setTimeout("d.getElementById('txtAmt3A"+i+"').value=d.getElementById('txtAmt3A"+i+"').value", 100);
                setTimeout("d.getElementById('txtInputTax3A"+i+"').value=d.getElementById('txtInputTax3A"+i+"').value", 100);
                setTimeout("d.getElementById('txtAllowInputTax3A"+i+"').value=d.getElementById('txtAllowInputTax3A"+i+"').value", 100);
                setTimeout("d.getElementById('txtBalInputTax3A"+i+"').value=d.getElementById('txtBalInputTax3A"+i+"').value", 100);
            }
        } else {
            sched3AToCommit = new Array();
           
			$('#tbodyllistSched3A').html("");
        }
        computeSumTax3A();
    }

    function addlistSched3BReload()
    {
            var size = sched3BToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
                sched3BToCommit[i].txtDatePurchase = d.getElementById('txtDatePurchased3B'+i).value;
                sched3BToCommit[i].txtDescription = d.getElementById('txtDescription3B'+i).value;
                sched3BToCommit[i].txtAmt = d.getElementById('txtAmt3B'+i).value;
                sched3BToCommit[i].txtInputTax = d.getElementById('txtBalInputTaxPrevious3B'+i).value;
                sched3BToCommit[i].txtEstLife = d.getElementById('txtEstLife3B'+i).value;
                sched3BToCommit[i].txtRecogLife = d.getElementById('txtRecogLife3B'+i).value;
                sched3BToCommit[i].txtAllowInputTax = d.getElementById('txtAllowInputTax3B'+i).value;
                sched3BToCommit[i].txtBalInputTax = d.getElementById('txtBalInputTax3B'+i).value;
            }
            i = sched3BToCommit.length;
            sched3BToCommit[i] = new Schedule3();

			$('#tbodyllistSched3B').html("");
			
            for(i = 0; i < sched3BToCommit.length; i++) {

				$('#tbodyllistSched3B').html(  d.getElementById('tbodyllistSched3B').innerHTML + "<tr>" + 
                    "<td width='4%' align='center'> <input type='checkbox' class='printButtonClass' id='chxSched3B"+i+"' /> </td>" +
                    "<td width='12%' align='center'> <input type='text'  size='8' id='txtDatePurchased3B"+i+"' value='"+ sched3BToCommit[i].txtDatePurchase +"' maxlength='10'  > </td>" +
                    "<td width='12%' align='center'> <input type='text'  size='8' id='txtDescription3B"+i+"' value='"+ sched3BToCommit[i].txtDescription +"' maxlength='50' > </td> " +
                    "<td width='12%' align='center'><input type='text' size='12' style='width:115px' id='txtAmt3B"+i+"'  value='"+ sched3BToCommit[i].txtAmt +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2)' maxlength='17' /> </td> " +
                    "<td width='12%' align='center'><input type='text' size='12' style='width:115px' id='txtBalInputTaxPrevious3B"+i+"'   value='"+ sched3BToCommit[i].txtInputTax +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax3B()' maxlength='17'  /> </td>" +
                    "<td width='12%' align='center'><input type='text' size='8' style='text-align:right' id='txtEstLife3B"+i+"'  value='"+ sched3BToCommit[i].txtEstLife +"' onkeypress='return numbersonly(this, event)' onblur='blockletterWithout2Decimal(this);' maxlength='3'  /> </td>" +
                    "<td width='12%' align='center'><input type='text' size='8' style='text-align:right' id='txtRecogLife3B"+i+"'   value='"+ sched3BToCommit[i].txtRecogLife +"' onkeypress='return numbersonly(this, event)' onblur='blockletterWithout2Decimal(this);computeSumTax3B();' maxlength='2'  /> </td>" +
                    "<td width='12%' align='center'><input type='text' size='12' style='width:115px' id='txtAllowInputTax3B"+i+"' style='background-color: rgb(220, 220, 220);'  value='"+ sched3BToCommit[i].txtAllowInputTax +"'  /> </td>" +
                    "<td width='12%' align='center'><input type='text' size='12' style='width:115px' id='txtBalInputTax3B"+i+"' style='background-color: rgb(220, 220, 220);'  value='"+ sched3BToCommit[i].txtBalInputTax +"'  /> </td>");

				setTimeout("setInputTextControl_HorizontalAlignment('txtAmt3B"+i+"',4);" +
                    "setInputTextControl_HorizontalAlignment('txtBalInputTaxPrevious3B"+i+"',4);" +
                    "d.getElementById('txtAllowInputTax3B"+i+"').disabled = true; setInputTextControl_HorizontalAlignment('txtAllowInputTax3B"+i+"',4 );" +
                    "d.getElementById('txtBalInputTax3B"+i+"').disabled = true; setInputTextControl_HorizontalAlignment('txtBalInputTax3B"+i+"',4 );" +
                    "",100);

                setTimeout("d.getElementById('txtAmt3B"+i+"').value=d.getElementById('txtAmt3B"+i+"').value", 100);
                setTimeout("d.getElementById('txtBalInputTaxPrevious3B"+i+"').value=d.getElementById('txtBalInputTaxPrevious3B"+i+"').value", 100);
                setTimeout("d.getElementById('txtAllowInputTax3B"+i+"').value=d.getElementById('txtAllowInputTax3B"+i+"').value", 100);
                setTimeout("d.getElementById('txtBalInputTax3B"+i+"').value=d.getElementById('txtBalInputTax3B"+i+"').value", 100);
            }
    }	
	
    function addlistSched3B()
    {
        if(checkifEmptyFieldSched3("B")) {
            var size = sched3BToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
                sched3BToCommit[i].txtDatePurchase = d.getElementById('txtDatePurchased3B'+i).value;
                sched3BToCommit[i].txtDescription = d.getElementById('txtDescription3B'+i).value;
                sched3BToCommit[i].txtAmt = d.getElementById('txtAmt3B'+i).value;
                sched3BToCommit[i].txtInputTax = d.getElementById('txtBalInputTaxPrevious3B'+i).value;
                sched3BToCommit[i].txtEstLife = d.getElementById('txtEstLife3B'+i).value;
                sched3BToCommit[i].txtRecogLife = d.getElementById('txtRecogLife3B'+i).value;
                sched3BToCommit[i].txtAllowInputTax = d.getElementById('txtAllowInputTax3B'+i).value;
                sched3BToCommit[i].txtBalInputTax = d.getElementById('txtBalInputTax3B'+i).value;
            }
            i = sched3BToCommit.length;
            sched3BToCommit[i] = new Schedule3();

			$('#tbodyllistSched3B').html("");
			
            for(i = 0; i < sched3BToCommit.length; i++) {

				$('#tbodyllistSched3B').html(  d.getElementById('tbodyllistSched3B').innerHTML + "<tr>" + 
                    "<td width='4%' align='center'> <input type='checkbox' class='printButtonClass' id='chxSched3B"+i+"' name='chxSched3B"+i+"' /> </td>" +
                    "<td width='12%' align='center'> <input type='text' size='8'  id='txtDatePurchased3B"+i+"' name='txtDatePurchased3B[]' value='"+ sched3BToCommit[i].txtDatePurchase +"' maxlength='10'  > </td>" +
                    "<td width='12%' align='center'> <input type='text' size='8'  id='txtDescription3B"+i+"'  name='txtDescription3B[]' value='"+ sched3BToCommit[i].txtDescription +"' maxlength='50' > </td> " +
                    "<td width='12%' align='center'><input type='text' size='12' style='width:115px' id='txtAmt3B"+i+"' name='txtAmt3B[]' value='"+ sched3BToCommit[i].txtAmt +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2)' maxlength='17' /> </td> " +
                    "<td width='12%' align='center'><input type='text' size='12' style='width:115px' id='txtBalInputTaxPrevious3B"+i+"' name='txtBalInputTaxPrevious3B[]' value='"+ sched3BToCommit[i].txtInputTax +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax3B()' maxlength='17'  /> </td>" +
                    "<td width='12%' align='center'><input type='text' size='8' style='text-align:right' id='txtEstLife3B"+i+"' name='txtEstLife3B[]'  value='"+ sched3BToCommit[i].txtEstLife +"' onkeypress='return numbersonly(this, event)' onblur='blockletterWithout2Decimal(this);' maxlength='3'  /> </td>" +
                    "<td width='12%' align='center'><input type='text' size='8' style='text-align:right' id='txtRecogLife3B"+i+"' name='txtRecogLife3B[]' value='"+ sched3BToCommit[i].txtRecogLife +"' onkeypress='return numbersonly(this, event)' onblur='blockletterWithout2Decimal(this);computeSumTax3B();' maxlength='2'  /> </td>" +
                    "<td width='12%' align='center'><input type='text' size='12' style='width:115px' id='txtAllowInputTax3B"+i+"' name='txtAllowInputTax3B[]' style='background-color: rgb(220, 220, 220);'  value='"+ sched3BToCommit[i].txtAllowInputTax +"'  /> </td>" +
                    "<td width='12%' align='center'><input type='text' size='12' style='width:115px' id='txtBalInputTax3B"+i+"' name='txtBalInputTax3B[]' style='background-color: rgb(220, 220, 220);'  value='"+ sched3BToCommit[i].txtBalInputTax +"'  /> </td>");

				setTimeout("setInputTextControl_HorizontalAlignment('txtAmt3B"+i+"',4);" +
                    "setInputTextControl_HorizontalAlignment('txtBalInputTaxPrevious3B"+i+"',4);" +
                    "d.getElementById('txtAllowInputTax3B"+i+"').disabled = true; setInputTextControl_HorizontalAlignment('txtAllowInputTax3B"+i+"',4 );" +
                    "d.getElementById('txtBalInputTax3B"+i+"').disabled = true; setInputTextControl_HorizontalAlignment('txtBalInputTax3B"+i+"',4 );" +
                    "",100);

                setTimeout("d.getElementById('txtAmt3B"+i+"').value=d.getElementById('txtAmt3B"+i+"').value", 100);
                setTimeout("d.getElementById('txtBalInputTaxPrevious3B"+i+"').value=d.getElementById('txtBalInputTaxPrevious3B"+i+"').value", 100);
                setTimeout("d.getElementById('txtAllowInputTax3B"+i+"').value=d.getElementById('txtAllowInputTax3B"+i+"').value", 100);
                setTimeout("d.getElementById('txtBalInputTax3B"+i+"').value=d.getElementById('txtBalInputTax3B"+i+"').value", 100);
            }
        }
    }

    function deletelistSched3B()
    {
        var sched3BTemp = new Array();
        var i = 0;
        var size = sched3BToCommit.length;
        for(i = 0 ; i < size ; i++)
        {
            sched3BToCommit[i].txtDatePurchase = d.getElementById('txtDatePurchased3B'+i).value;
            sched3BToCommit[i].txtDescription = d.getElementById('txtDescription3B'+i).value;
            sched3BToCommit[i].txtAmt = d.getElementById('txtAmt3B'+i).value;
            sched3BToCommit[i].txtInputTax = d.getElementById('txtBalInputTaxPrevious3B'+i).value;
            sched3BToCommit[i].txtEstLife = d.getElementById('txtEstLife3B'+i).value;
            sched3BToCommit[i].txtRecogLife = d.getElementById('txtRecogLife3B'+i).value;
            sched3BToCommit[i].txtAllowInputTax = d.getElementById('txtAllowInputTax3B'+i).value;
            sched3BToCommit[i].txtBalInputTax = d.getElementById('txtBalInputTax3B'+i).value;
        }
        i = 0;
        for(var j = 0; j < size ; j++) {
            if(!d.getElementById("chxSched3B" + j).checked) {
                sched3BTemp[i++] = sched3BToCommit[j];
            }
        }

        if(sched3BTemp.length > 0) {
            sched3BToCommit = new Array();
            sched3BToCommit = sched3BTemp;
			$('#tbodyllistSched3B').html("");

            for(i = 0; i < sched3BTemp.length; i++) {
                sched3BToCommit[i] = sched3BTemp[i];
				$('#tbodyllistSched3B').html(  d.getElementById('tbodyllistSched3B').innerHTML + "<tr>" + 
                    "<td width='4%' align='center'> <input type='checkbox' class='printButtonClass' id='chxSched3B"+i+"' /> </td>" +
                    "<td width='12%' align='center'> <input type='text' size='8'  id='txtDatePurchased3B"+i+"'  value='"+ sched3BToCommit[i].txtDatePurchase +"' maxlength='10'  > </td>" +
                    "<td width='12%' align='center'> <input type='text' size='8'  id='txtDescription3B"+i+"'  value='"+ sched3BToCommit[i].txtDescription +"' maxlength='50' > </td> " +
                    "<td width='12%' align='center'><input type='text' size='12' style='width:115px' id='txtAmt3B"+i+"'  value='"+ sched3BToCommit[i].txtAmt +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2)' maxlength='17' /> </td> " +
                    "<td width='12%' align='center'><input type='text' size='12' style='width:115px' id='txtBalInputTaxPrevious3B"+i+"'  value='"+ sched3BToCommit[i].txtInputTax +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumTax3B()' maxlength='17'  /> </td>" +
                    "<td width='12%' align='center'><input type='text' size='8' style='text-align:right' id='txtEstLife3B"+i+"'   value='"+ sched3BToCommit[i].txtEstLife +"' onkeypress='return numbersonly(this, event)' onblur='blockletterWithout2Decimal(this);' maxlength='3'  /> </td>" +
                    "<td width='12%' align='center'><input type='text' size='8' style='text-align:right' id='txtRecogLife3B"+i+"'   value='"+ sched3BToCommit[i].txtRecogLife +"' onkeypress='return numbersonly(this, event)' onblur='blockletterWithout2Decimal(this);computeSumTax3B();' maxlength='2'  /> </td>" +
                    "<td width='12%' align='center'><input type='text' size='12' style='width:115px' id='txtAllowInputTax3B"+i+"' style='background-color: rgb(220, 220, 220);'  value='"+ sched3BToCommit[i].txtAllowInputTax +"'  /> </td>" +
                    "<td width='12%' align='center'><input type='text' size='12' style='width:115px' id='txtBalInputTax3B"+i+"' style='background-color: rgb(220, 220, 220);'  value='"+ sched3BToCommit[i].txtBalInputTax +"'  /> </td>");

				setTimeout("setInputTextControl_HorizontalAlignment('txtAmt3B"+i+"',4);" +
                    "setInputTextControl_HorizontalAlignment('txtBalInputTaxPrevious3B"+i+"',4);" +
                    "d.getElementById('txtAllowInputTax3B"+i+"').disabled = true; setInputTextControl_HorizontalAlignment('txtAllowInputTax3B"+i+"',4 );" +
                    "d.getElementById('txtBalInputTax3B"+i+"').disabled = true; setInputTextControl_HorizontalAlignment('txtBalInputTax3B"+i+"',4 );" +
                    "",100);

                setTimeout("d.getElementById('txtAmt3B"+i+"').value=d.getElementById('txtAmt3B"+i+"').value", 100);
                setTimeout("d.getElementById('txtBalInputTaxPrevious3B"+i+"').value=d.getElementById('txtBalInputTaxPrevious3B"+i+"').value", 100);
                setTimeout("d.getElementById('txtAllowInputTax3B"+i+"').value=d.getElementById('txtAllowInputTax3B"+i+"').value", 100);
                setTimeout("d.getElementById('txtBalInputTax3B"+i+"').value=d.getElementById('txtBalInputTax3B"+i+"').value", 100);
            }
        } else {
            sched3BToCommit = new Array();
           
			$('#tbodyllistSched3B').html("");
        }
        computeSumTax3B();
    }

    function saveTempSched4Data() {
        tempTxtSched4Input = d.getElementById('txtinputtaxSched4').value;
        tempTxtSched4InputVal = d.getElementById('txtInputTaxnotDirectSched4').value;
        tempTxtSched4Add = d.getElementById('txtTotalInputTaxnotDirectSched4').value;
        tempTtxtSched4Total = d.getElementById('txtTotalInputSaletoGovernmentSched4').value;
        tempTxtSched4Less = d.getElementById('txtlessStdTaxSched4').value;
        tempTxt20B = d.getElementById('txtTotal20BSched4').value;
    }

    function showSched4(){
		if(!isModalTurnOn) {
				saveTempSched4Data();
				
				if(d.getElementById('frm2550m:txtTax13A').value <= 0 ) {
					alert("Please enter a valid value on Item 13A to be able to load the Schedule 4.");
					return;
				} else {
					
					d.getElementById('mainContent').style.display = "none";
					$('#modalSched4').show('blind');	
					$('#wrapper').css({'display':'none' });	
				

					d.getElementById('txtTaxableSaleSched4').value = d.getElementById('frm2550m:txtTax13A').value;
					d.getElementById('txtTotalSaleSched4').value = d.getElementById('frm2550m:txtTax16A').value;
					
					computeInputTaxSched4();
					setTimeout("setInputTextControl_HorizontalAlignment('txtinputtaxSched4', 4);" +
						"d.getElementById('txtTaxableSaleSched4').disabled = true; setInputTextControl_HorizontalAlignment('txtTaxableSaleSched4', 4);" +
						"setInputTextControl_HorizontalAlignment('txtInputTaxnotDirectSched4', 4);" +
						"d.getElementById('txtTotalInputTaxnotDirectSched4').disabled = true; setInputTextControl_HorizontalAlignment('txtTotalInputTaxnotDirectSched4', 4);" +
						"d.getElementById('txtTotalSaleSched4').disabled = true; setInputTextControl_HorizontalAlignment('txtTotalSaleSched4', 4);" +
						"d.getElementById('txtTotalInputSaletoGovernmentSched4').disabled = true; setInputTextControl_HorizontalAlignment('txtTotalInputSaletoGovernmentSched4', 4);" +
						"setInputTextControl_HorizontalAlignment('txtlessStdTaxSched4', 4);" +
						"d.getElementById('txtTotal20BSched4').disabled = true; setInputTextControl_HorizontalAlignment('txtTotal20BSched4', 4);", 100);

					isModalTurnOn = true;
				}
				
			}

			if(viewUploadFlag) {
				setTimeout("d.getElementById('btnClearPop4').disabled = true;", 100);
				setTimeout("d.getElementById('btnCancelPop4').disabled = true;", 100);
				setTimeout("toggleAllDisabled();", 100);
				setTimeout("d.getElementById('btnOkPop4').disabled = false;", 100);
			}
    }

    function checkifEmptyFieldSched4(){
        return true;
    }

    function restoreTempSched4Data() {
        d.getElementById('txtinputtaxSched4').value = tempTxtSched4Input;
        d.getElementById('txtInputTaxnotDirectSched4').value = tempTxtSched4InputVal;
        d.getElementById('txtTotalInputTaxnotDirectSched4').value = tempTxtSched4Add;
        d.getElementById('txtTotalInputSaletoGovernmentSched4').value = tempTtxtSched4Total;
        d.getElementById('txtlessStdTaxSched4').value = tempTxtSched4Less;
        d.getElementById('txtTotal20BSched4').value = tempTxt20B;
    }

    function clearSched4Modal() {
        d.getElementById('txtinputtaxSched4').value = "0.00";
        d.getElementById('txtInputTaxnotDirectSched4').value = "0.00";
        d.getElementById('txtTotalInputTaxnotDirectSched4').value = "0.00";
        d.getElementById('txtTotalInputSaletoGovernmentSched4').value = "0.00";
        d.getElementById('txtlessStdTaxSched4').value = "0.00";
        d.getElementById('txtTotal20BSched4').value = "0.00";
    }

    function cancelSched4Modal() {
        restoreTempSched4Data();

		d.getElementById('mainContent').style.display = 'block';
		if ( $('#modalSched4').css('display') != 'none' ) {
			$('#modalSched4').hide('blind');
			$('#wrapper').show('blind');
		}
		$('#DummyTxt').html("Creator");
		$('#DummyTxt').html("");	
		
        isModalTurnOn = false;
    }

    function getSched4Modal(){
        if (checkifEmptyFieldSched4() )
        {
           
			 d.getElementById('mainContent').style.display = 'block';
			 if ( $('#modalSched4').css('display') != 'none' ) {
				$('#modalSched4').hide('blind');
				$('#wrapper').css({'display':'block' });
			 }
			 $('#DummyTxt').html("Creator");
			 $('#DummyTxt').html("");	
			
            d.getElementById('frm2550m:txtTax20B').value  = d.getElementById('txtTotal20BSched4').value;
            compute20F();

            isModalTurnOn = false;
        }
    }

    function showSched5(){
		if(!isModalTurnOn) {
				saveTempSched5Data();
				
				if(d.getElementById('frm2550m:txtTax15').value <= 0 ) {
					alert("Please enter a valid value on Item 15 to be able to load the Schedule 5.");
					return;
				} else {
					
					d.getElementById('mainContent').style.display = "none";
					$('#wrapper').hide('blind');
					$('#modalSched5').show('blind');		
				

					d.getElementById('txtTotSaleSched5').value = d.getElementById('frm2550m:txtTax15').value;
					d.getElementById('txtSumTotalSaleSched5').value = d.getElementById('frm2550m:txtTax16A').value;
				
					setTimeout("setInputTextControl_HorizontalAlignment('txtinputtaxSched5', 4);" +
						"d.getElementById('txtTotSaleSched5').disabled = true; setInputTextControl_HorizontalAlignment('txtTotSaleSched5', 4);" +
						"setInputTextControl_HorizontalAlignment('txtAmountInputnotDirectSched5', 4);" +
						"d.getElementById('txtProductnotDirectSched5').disabled = true; setInputTextControl_HorizontalAlignment('txtProductnotDirectSched5', 4);" +
						"d.getElementById('txtSumTotalSaleSched5').disabled = true; setInputTextControl_HorizontalAlignment('txtSumTotalSaleSched5', 4);" +
						"d.getElementById('txtTotal20CSched5').disabled = true; setInputTextControl_HorizontalAlignment('txtTotal20CSched5', 4);", 100);

					isModalTurnOn = true;
				}
				
			}

			if(viewUploadFlag) {
				setTimeout("d.getElementById('btnClearPop5').disabled = true;", 100);
				setTimeout("d.getElementById('btnCancelPop5').disabled = true;", 100);
				setTimeout("toggleAllDisabled();", 100);
				setTimeout("d.getElementById('btnOkPop5').disabled = false;", 100);
			}
    }

    function checkifEmptyFieldSched5(){
        return true;
    }

    function saveTempSched5Data() {
        tempTxtSched5Input = d.getElementById('txtinputtaxSched5').value;
        tempTxtSched5Val = d.getElementById('txtAmountInputnotDirectSched5').value;
        tempTxtSched5Add = d.getElementById('txtProductnotDirectSched5').value;
        tempTxt20 = d.getElementById('txtTotal20CSched5').value;
    }

    function restoreTempSched5Data() {
        d.getElementById('txtinputtaxSched5').value = tempTxtSched5Input;
        d.getElementById('txtAmountInputnotDirectSched5').value = tempTxtSched5Val;
        d.getElementById('txtProductnotDirectSched5').value = tempTxtSched5Add;
        d.getElementById('txtTotal20CSched5').value = tempTxt20;
    }

    function clearSched5Modal() {
        d.getElementById('txtinputtaxSched5').value = "0.00";
        d.getElementById('txtAmountInputnotDirectSched5').value = "0.00";
        d.getElementById('txtProductnotDirectSched5').value = "0.00";
        d.getElementById('txtTotal20CSched5').value = "0.00";
    }

    function cancelSched5Modal() {
        restoreTempSched5Data();

		d.getElementById('mainContent').style.display = 'block';
		if ( $('#modalSched5').css('display') != 'none' ) {
			$('#modalSched5').hide('blind');
			$('#wrapper').show('blind');
		}
		$('#DummyTxt').html("Creator");
		$('#DummyTxt').html("");	
		
        isModalTurnOn = false;
    }

    function getSched5Modal(){
        if (checkifEmptyFieldSched5() )
        {
           
			 d.getElementById('mainContent').style.display = 'block';
			 if ( $('#modalSched5').css('display') != 'none' ) {
				$('#modalSched5').hide('blind');
				$('#wrapper').show('blind');
			 }
			 $('#DummyTxt').html("Creator");
			 $('#DummyTxt').html("");	
			
            d.getElementById('frm2550m:txtTax20C').value  = d.getElementById('txtTotal20CSched5').value;
            compute20F();

            isModalTurnOn = false;
        }
    }

    function checkifEmptyFieldSched6() {

        var size = sched6ToCommit.length;
        for(var i = 0 ; i < size ; i++)
        {
            if(d.getElementById('txtPeriodCovered'+ i).value == "" || d.getElementById('txtNameAgent'+ i).value == "") {
                alert("Please enter valid row " + (i + 1) + " data for Schedule 6.\n" +
                    "Empty fields are not allowed."); return ;
            } strmmddyyy = d.getElementById('txtPeriodCovered'+i).value;
 
 			//--Benjie Manalaysay 11/06/2013
			if(strmmddyyy != ""){
				var result = strmmddyyy.split("/")
				if(result.length == 3 ){
					//Variables
					var month = result[0];
					var day = result[1];
					var year = result[2];
					
					var isLeap = new Date(year, 1, 29).getMonth() == 1;
						
					if(isNaN(month) || isNaN(day) || isNaN(year)){
						alert("Please enter a valid date for Date of Purchase on row "+(i+1)+".\n" +
						"Please enter a date in the MM/DD/YYYY format.");
					return;
					}else{ // Validate of valid Day for the month
						//Check if valid date
						var month31 = (['01', '03', '05', '07', '08', '10', '12']);
						var month30 = (['04', '06', '09', '11']);			
						if (month31.contains(month) && day > 31)
						{
							alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only.");
							return;
						}
						else if (month30.contains(month) && day > 30)
						{
							alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only.");
							return;
						}else if(month == 2){
								//Special Handling for Leap Year
								if (!isLeap && day == 29) {
									alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only.");
									return;
								}
								if (!isLeap && day > 29) {
									alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only.");
									return;
								}
								if (isLeap && day >29) {
									alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only.");
									return;
								}
								
						}else{
							//Validation if year is within the period				
							if(year != d.getElementById('frm2550m:txtYear').value ||  month != d.getElementById('frm2550m:RtnYear').value*1  )
							{
								alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only."); return;
							}
						
						}
					}
				}else{
				alert("Please enter a valid date for Date of Purchase on row "+(i+1)+".\n" +
				"Please enter a date in the MM/DD/YYYY format.");
				return;
				}
			}
			
          
            if( d.getElementById('txtIncomePayment'+ i).value <= 0 ) {
                alert("Please enter a valid amount for Income Payment on row " + ( i + 1) + ".\n" +
                    "Value must be greater than 0."); return;
            }
            if( d.getElementById('txtTotalWithheld'+ i).value <= 0 ) {
                alert("Please enter a valid amount for Total Tax Withheld on row " + ( i + 1) + ".\n" +
                    "Value must be greater than 0."); return;
            }
            if( d.getElementById('txtAppliedCurr'+ i).value <= 0 ) {
                alert("Please enter a valid amount for Applied Current Month on row " + ( i + 1) + ".\n" +
                    "Value must be greater than 0."); return;
            }
            if( parseFloat(d.getElementById('txtAppliedCurr'+ i).value) > parseFloat(d.getElementById('txtTotalWithheld'+ i).value)   ) {
                alert("The Applied Current Month on row " + ( i + 1) + " should not be greater than the Total Tax Withheld." ); return;
            }
        }

        return true;
    }

    function addlistSched6Reload()
    {
            var size = sched6ToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
                sched6ToCommit[i].txtPeriodCovered = d.getElementById('txtPeriodCovered'+i).value;
                sched6ToCommit[i].txtNameAgent = d.getElementById('txtNameAgent'+i).value;
                sched6ToCommit[i].txtIncomePayment = d.getElementById('txtIncomePayment'+i).value;
                sched6ToCommit[i].txtTotalWithheld = d.getElementById('txtTotalWithheld'+i).value;
                sched6ToCommit[i].txtAppliedCurrMo = d.getElementById('txtAppliedCurr'+i).value;
            }
            i = sched6ToCommit.length;
            sched6ToCommit[i] = new Schedule6and8();

            //d.getElementById("tbodyllistSched6").innerHTML = "";
			$('#tbodyllistSched6').html("");
			
            for(i = 0; i < sched6ToCommit.length; i++) {

               
				$('#tbodyllistSched6').html(  d.getElementById('tbodyllistSched6').innerHTML + "<tr>" + 
                    "<td width='5%' align='center'> <input type='checkbox' class='printButtonClass' id='chxSched6"+i+"' /> </td>" +
                    "<td width='19%' align='center'> <input type='text'  id='txtPeriodCovered"+i+"' style='width: 100px' value='"+ sched6ToCommit[i].txtPeriodCovered  +"' maxlength='10'  > </td>" +
                    "<td width='19%' align='center'> <input type='text'  id='txtNameAgent"+i+"' style='width: 130px' value='"+ sched6ToCommit[i].txtNameAgent +"'  maxlength='50' > </td> " +
                    "<td width='19%' align='center'><input type='text' id='txtIncomePayment"+i+"' style='width: 120px; text-align:right' value='"+ sched6ToCommit[i].txtIncomePayment +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2)' maxlength='17' /> </td> " +
                    "<td width='19%' align='center'><input type='text' id='txtTotalWithheld"+i+"' style='width: 120px; text-align:right'  value='"+ sched6ToCommit[i].txtTotalWithheld +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumWithheldApp()' maxlength='17' /> </td>" +
                    "<td width='19%' align='center'><input type='text' id='txtAppliedCurr"+i+"' style='width: 120px; text-align:right'  value='"+ sched6ToCommit[i].txtAppliedCurrMo +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumWithheldApp()' maxlength='17' /> </td>");



                setTimeout("setInputTextControl_HorizontalAlignment('txtIncomePayment"+i+"',4 );" +
                    "setInputTextControl_HorizontalAlignment('txtTotalWithheld"+i+"',4 ); " +
                    "setInputTextControl_HorizontalAlignment('txtAppliedCurr"+i+"',4 );",100);


                setTimeout("d.getElementById('txtIncomePayment"+i+"',12,2).value += '';" +
                    "d.getElementById('txtTotalWithheld"+i+"',12,2).value += ''; " +
                    "d.getElementById('txtAppliedCurr"+i+"',12,2).value += '';",100);
            }
    }	
	
    function addlistSched6()
    {
        if(checkifEmptyFieldSched6()) {
            var size = sched6ToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
                sched6ToCommit[i].txtPeriodCovered = d.getElementById('txtPeriodCovered'+i).value;
                sched6ToCommit[i].txtNameAgent = d.getElementById('txtNameAgent'+i).value;
                sched6ToCommit[i].txtIncomePayment = d.getElementById('txtIncomePayment'+i).value;
                sched6ToCommit[i].txtTotalWithheld = d.getElementById('txtTotalWithheld'+i).value;
                sched6ToCommit[i].txtAppliedCurrMo = d.getElementById('txtAppliedCurr'+i).value;
            }
            i = sched6ToCommit.length;
            sched6ToCommit[i] = new Schedule6and8();

          
			$('#tbodyllistSched6').html("");
			
            for(i = 0; i < sched6ToCommit.length; i++) {

				$('#tbodyllistSched6').html(  d.getElementById('tbodyllistSched6').innerHTML + "<tr>" + 
                    "<td width='5%' align='center'> <input type='checkbox' class='printButtonClass' id='chxSched6"+i+"' name='chxSched6"+i+"' /> </td>" +
                    "<td width='19%' align='center'> <input type='text'  id='txtPeriodCovered"+i+"' name='txtPeriodCovered[]' style='width: 100px' value='"+ sched6ToCommit[i].txtPeriodCovered  +"' maxlength='10'  > </td>" +
                    "<td width='19%' align='center'> <input type='text'  id='txtNameAgent"+i+"' name='txtNameAgent[]' style='width: 130px' value='"+ sched6ToCommit[i].txtNameAgent +"'  maxlength='50' > </td> " +
                    "<td width='19%' align='center'><input type='text' id='txtIncomePayment"+i+"' name='txtIncomePayment[]' style='width: 120px; text-align:right' value='"+ sched6ToCommit[i].txtIncomePayment +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2)' maxlength='17' /> </td> " +
                    "<td width='19%' align='center'><input type='text' id='txtTotalWithheld"+i+"' name='txtTotalWithheld[]' style='width: 120px; text-align:right'  value='"+ sched6ToCommit[i].txtTotalWithheld +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumWithheldApp()' maxlength='17' /> </td>" +
                    "<td width='19%' align='center'><input type='text' id='txtAppliedCurr"+i+"' name='txtAppliedCurr[]' style='width: 120px; text-align:right'  value='"+ sched6ToCommit[i].txtAppliedCurrMo +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumWithheldApp()' maxlength='17' /> </td>");

                setTimeout("setInputTextControl_HorizontalAlignment('txtIncomePayment"+i+"',4 );" +
                    "setInputTextControl_HorizontalAlignment('txtTotalWithheld"+i+"',4 ); " +
                    "setInputTextControl_HorizontalAlignment('txtAppliedCurr"+i+"',4 );",100);

                setTimeout("d.getElementById('txtIncomePayment"+i+"',12,2).value += '';" +
                    "d.getElementById('txtTotalWithheld"+i+"',12,2).value += ''; " +
                    "d.getElementById('txtAppliedCurr"+i+"',12,2).value += '';",100);
            }
        }
    }

    function deletelistSched6()
    {
        var sched6Temp = new Array();
        var i = 0;
        var size = sched6ToCommit.length; 
        for(i = 0 ; i < size ; i++)
        {
            sched6ToCommit[i].txtPeriodCovered = d.getElementById('txtPeriodCovered'+i).value;
            sched6ToCommit[i].txtNameAgent = d.getElementById('txtNameAgent'+i).value;
            sched6ToCommit[i].txtIncomePayment = d.getElementById('txtIncomePayment'+i).value;
            sched6ToCommit[i].txtTotalWithheld = d.getElementById('txtTotalWithheld'+i).value;
            sched6ToCommit[i].txtAppliedCurrMo = d.getElementById('txtAppliedCurr'+i).value;
        }
        i = 0;
        for(var j = 0; j < size ; j++) {
            if(!d.getElementById("chxSched6" + j).checked) {
                sched6Temp[i++] = sched6ToCommit[j];
            }
        }

        if(sched6Temp.length > 0) {
            sched6ToCommit = new Array();
            sched6ToCommit = sched6Temp;
			$('#tbodyllistSched6').html("");

            for(i = 0; i < sched6Temp.length; i++) {
                sched6ToCommit[i] = sched6Temp[i];
              
				$('#tbodyllistSched6').html(  d.getElementById('tbodyllistSched6').innerHTML + "<tr>" + 
                    "<td width='5%' align='center'> <input type='checkbox' class='printButtonClass' id='chxSched6"+i+"' /> </td>" +
                    "<td width='19%' align='center'> <input type='text'  id='txtPeriodCovered"+i+"' style='width: 100px' value='"+ sched6ToCommit[i].txtPeriodCovered  +"' maxlength='10'  > </td>" +
                    "<td width='19%' align='center'> <input type='text'  id='txtNameAgent"+i+"' style='width: 130px' value='"+ sched6ToCommit[i].txtNameAgent +"'  maxlength='50' > </td> " +
                    "<td width='19%' align='center'><input type='text' id='txtIncomePayment"+i+"' style='width: 120px; text-align:right' value='"+ sched6ToCommit[i].txtIncomePayment +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2)' maxlength='17' /> </td> " +
                    "<td width='19%' align='center'><input type='text' id='txtTotalWithheld"+i+"' style='width: 120px; text-align:right'  value='"+ sched6ToCommit[i].txtTotalWithheld +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumWithheldApp()' maxlength='17' /> </td>" +
                    "<td width='19%' align='center'><input type='text' id='txtAppliedCurr"+i+"' style='width: 120px; text-align:right'  value='"+ sched6ToCommit[i].txtAppliedCurrMo +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumWithheldApp()' maxlength='17' /> </td>");

                setTimeout("setInputTextControl_HorizontalAlignment('txtIncomePayment"+i+"',4 );" +
                    "setInputTextControl_HorizontalAlignment('txtTotalWithheld"+i+"',4 ); " +
                    "setInputTextControl_HorizontalAlignment('txtAppliedCurr"+i+"',4 );",100);

                setTimeout("d.getElementById('txtIncomePayment"+i+"',12,2).value += '';" +
                    "d.getElementById('txtTotalWithheld"+i+"',12,2).value += ''; " +
                    "d.getElementById('txtAppliedCurr"+i+"',12,2).value += '';",100);
            }
        } else {
            sched6ToCommit = new Array();
            //d.getElementById("tbodyllistSched6").innerHTML = "";
			$('#tbodyllistSched6').html("");
        }
        computeSumWithheldApp();
    }

    function showSched6(){
		if(!isModalTurnOn) {
				saveTempSched6Data();
				 
				if(d.getElementById('frm2550m:txtYear').value <= 2000 && d.getElementById('frm2550m:txtYear').value <= 2020 ) {
					alert("Please input a valid Return period year. Please enter 2000 above.");
					return;
				} else {
				
					d.getElementById('mainContent').style.display = "none";
					$('#modalSched6').show('blind');
					$('#wrapper').css({'display':'none' });		
				

					setTimeout("d.getElementById('txtmodalTotal23A').disabled = true; setInputTextControl_HorizontalAlignment('txtmodalTotal23A', 4);" +
						"d.getElementById('txtmodalTotalSched6AppliedCurrent').disabled = true; setInputTextControl_HorizontalAlignment('txtmodalTotalSched6AppliedCurrent', 4);" , 100);

					isModalTurnOn = true;
				}

				for(var i = 0; i < d.getElementById("tblSched6").rows.length - 1; i++) {
					setTimeout("setInputTextControl_HorizontalAlignment('txtIncomePayment"+i+"',4 );" +
						"setInputTextControl_HorizontalAlignment('txtTotalWithheld"+i+"',4 ); " +
						"setInputTextControl_HorizontalAlignment('txtAppliedCurr"+i+"',4 );",100);

					setTimeout("d.getElementById('txtIncomePayment"+i+"').value += '';" +
						"d.getElementById('txtTotalWithheld"+i+"').value += ''; " +
						"d.getElementById('txtAppliedCurr"+i+"').value += '';",100);
				}
				
			}

			if(viewUploadFlag) {
				setTimeout("d.getElementById('btnAdd4').disabled = true;", 100);
				setTimeout("d.getElementById('btnDelete4').disabled = true;", 100);
				setTimeout("d.getElementById('btnClearPop6').disabled = true;", 100);
				setTimeout("d.getElementById('btnCancelPop6').disabled = true;", 100);
				setTimeout("toggleAllDisabled();", 100);
				setTimeout("d.getElementById('btnOkPop6').disabled = false;", 100);
			}
    }

    function saveTempSched6Data() {
        var x = 0;
        tempRowSizeSched6 = d.getElementById("tblSched6").rows.length - 1;

        for(x = 0; x < tempRowSizeSched6; x++) {
            tempSchd6PeriodCovered[x] = d.getElementById('txtPeriodCovered'+ (x) ).value;
            tempSchd6AgentNm[x] = d.getElementById('txtNameAgent'+ (x)).value;
            tempSchd6INcPymnt[x] = d.getElementById('txtIncomePayment'+ (x)).value;
            tempSchd6TotalTaxWth[x] = d.getElementById('txtTotalWithheld'+ (x)).value;
            tempSchd6AppCurr[x] = d.getElementById('txtAppliedCurr'+ (x)).value;
        }
    }

    function restoreTempSched6Data() {
        var x = 0;

        if(tempRowSizeSched6 > 0) {
           
			$('#tbodyllistSched6').html("");
            sched6ToCommit = new Array();
            
            var x = 0;
            for(x = 0; x < tempRowSizeSched6; x++) {
                addlistSched6();

                d.getElementById('txtPeriodCovered'+ (x)).value = tempSchd6PeriodCovered[x];
                d.getElementById('txtNameAgent'+ (x)).value = tempSchd6AgentNm[x];
                d.getElementById('txtIncomePayment'+ (x)).value = tempSchd6INcPymnt[x];
                d.getElementById('txtTotalWithheld'+ (x)).value = tempSchd6TotalTaxWth[x];
                d.getElementById('txtAppliedCurr'+ (x)).value = tempSchd6AppCurr[x];

                computeSumWithheldApp();
            }
        }
    }

    function clearSched6Modal() {
        var x = 0;
        for(x = 0; x < tempRowSizeSched6; x++) {
            d.getElementById('txtPeriodCovered'+ (x)).value = "";
            d.getElementById('txtNameAgent'+ (x)).value = "";
            d.getElementById('txtIncomePayment'+ (x)).value = "0.00";
            d.getElementById('txtTotalWithheld'+ (x)).value = "0.00";
            d.getElementById('txtAppliedCurr'+ (x)).value = "0.00";
        }
    }

    function cancelSched6Modal() {
        restoreTempSched6Data();

		d.getElementById('mainContent').style.display = 'block';
		if ( $('#modalSched6').css('display') != 'none' ) {
			$('#modalSched6').hide('blind');
			$('#wrapper').show('blind');
		}
		$('#DummyTxt').html("Creator");
		$('#DummyTxt').html("");	
		
        isModalTurnOn = false;
    }

    function getSched6Modal(){
        if (checkifEmptyFieldSched6() )
        {
           
			d.getElementById('mainContent').style.display = 'block';
			if ( $('#modalSched6').css('display') != 'none' ) {
				$('#modalSched6').hide('blind');
				$('#wrapper').show('blind');
			}
			$('#DummyTxt').html("Creator");
			$('#DummyTxt').html("");	
			
            d.getElementById('frm2550m:txtTax23A').value  = d.getElementById('txtmodalTotalSched6AppliedCurrent').value;
            compute23G();

            isModalTurnOn = false;
        }
    }

    function checkifEmptyFieldSched7() {

        var size = sched7ToCommit.length;
        for(var i = 0 ; i < size ; i++)
        {
            if(d.getElementById('txtPeriodCoveredSch7'+ i).value == "" || d.getElementById('txtNameMillerSch7'+ i).value == "" ||
                d.getElementById('txtNameTaxPayerSch7'+ i).value == "" || d.getElementById('txtORNumSch7'+ i).value == ""  ) {
                alert("Please enter valid row " + (i + 1) + " data for Schedule 7.\n" +
                    "Empty fields are not allowed."); return ;
            } strmmddyyy = d.getElementById('txtPeriodCoveredSch7'+i).value;
 
 
 			//--Benjie Manalaysay 11/06/2013
			if(strmmddyyy != ""){
				var result = strmmddyyy.split("/")
				if(result.length == 3 ){
					//Variables
					var month = result[0];
					var day = result[1];
					var year = result[2];
					
					var isLeap = new Date(year, 1, 29).getMonth() == 1;
						
					if(isNaN(month) || isNaN(day) || isNaN(year)){
						alert("Please enter a valid date for Date of Purchase on row "+(i+1)+".\n" +
						"Please enter a date in the MM/DD/YYYY format.");
					return;
					}else{ // Validate of valid Day for the month
						//Check if valid date
						var month31 = (['01', '03', '05', '07', '08', '10', '12']);
						var month30 = (['04', '06', '09', '11']);			
						if (month31.contains(month) && day > 31)
						{
							alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only.");
							return;
						}
						else if (month30.contains(month) && day > 30)
						{
							alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only.");
							return;
						}else if(month == 2){
								//Special Handling for Leap Year
								if (!isLeap && day == 29) {
									alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only.");
									return;
								}
								if (!isLeap && day > 29) {
									alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only.");
									return;
								}
								if (isLeap && day >29) {
									alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only.");
									return;
								}
								
						}else{
							//Validation if year is within the period				
							if(year != d.getElementById('frm2550m:txtYear').value ||  month != d.getElementById('frm2550m:RtnYear').value*1  )
							{
								alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only."); return;
							}
						
						}
					}
				}else{
				alert("Please enter a valid date for Date of Purchase on row "+(i+1)+".\n" +
				"Please enter a date in the MM/DD/YYYY format.");
				return;
				}
			}
			
          
            if( d.getElementById('txtAmountPaidSch7'+ i).value <= 0 ) {
                alert("Please enter a valid amount for Amount Paid on row " + ( i + 1) + ".\n" +
                    "Value must be greater than 0."); return;
            }
            if( d.getElementById('txtAppliedCurrSch7'+ i).value <= 0 ) {
                alert("Please enter a valid amount for Applied Current Month on row " + ( i + 1) + ".\n" +
                    "Value must be greater than 0."); return;
            }
          
        }

        return true;
    }

    function addlistSched7Reload()
    {
            var size = sched7ToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
                sched7ToCommit[i].txtPeriodCovered = d.getElementById('txtPeriodCoveredSch7'+i).value;
                sched7ToCommit[i].txtNameMiller = d.getElementById('txtNameMillerSch7'+i).value;
                sched7ToCommit[i].txtNameTaxPayer = d.getElementById('txtNameTaxPayerSch7'+i).value;
                sched7ToCommit[i].txtORNumber = d.getElementById('txtORNumSch7'+i).value;
                sched7ToCommit[i].txtAmountPaid = d.getElementById('txtAmountPaidSch7'+i).value;
                sched7ToCommit[i].txtAppliedCurrMo = d.getElementById('txtAppliedCurrSch7'+i).value;
            }
            i = sched7ToCommit.length;
            sched7ToCommit[i] = new Schedule7();

          
			$('#tbodyllistSched7').html("");
            for(i = 0; i < sched7ToCommit.length; i++) {

				$('#tbodyllistSched7').html(  d.getElementById('tbodyllistSched7').innerHTML + "<tr>" + 
                    "<td width='4%' align='center'> <input type='checkbox' class='printButtonClass' id='chxSched7"+i+"' /> </td>" +
                    "<td width='16%' align='center'> <input type='text'  id='txtPeriodCoveredSch7"+i+"' style='width: 100px' value='"+ sched7ToCommit[i].txtPeriodCovered  +"' maxlength='10'  > </td>" +
                    "<td width='16%' align='center'> <input type='text'  id='txtNameMillerSch7"+i+"' style='width: 130px' value='"+ sched7ToCommit[i].txtNameMiller +"'  maxlength='50' > </td> " +
                    "<td width='16%' align='center'><input type='text' id='txtNameTaxPayerSch7"+i+"' style='width: 100px' value='"+ sched7ToCommit[i].txtNameTaxPayer +"'   maxlength='17' /> </td> " +
                    "<td width='16%' align='center'><input type='text' id='txtORNumSch7"+i+"' style='width: 100px'  value='"+ sched7ToCommit[i].txtORNumber +"'  maxlength='20' /> </td>" +
                    "<td width='16%' align='center'><input type='text' id='txtAmountPaidSch7"+i+"' style='width: 120px; text-align:right'  value='"+ sched7ToCommit[i].txtAmountPaid +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumWithheldAppSch7()' maxlength='17' /> </td>" +
                    "<td width='16%' align='center'><input type='text' id='txtAppliedCurrSch7"+i+"' style='width: 120px; text-align:right'  value='"+ sched7ToCommit[i].txtAppliedCurrMo  +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumWithheldAppSch7()' maxlength='17' /> </td>");

                setTimeout("setInputTextControl_HorizontalAlignment('txtAmountPaidSch7"+i+"',4 ); " +
                    "setInputTextControl_HorizontalAlignment('txtAppliedCurrSch7"+i+"',4 );",100);

                setTimeout("d.getElementById('txtAmountPaidSch7"+i+"').value+=''; " +
                    "d.getElementById('txtAppliedCurrSch7"+i+"').value+='';",100);
            }
    }	
	
    function addlistSched7()
    {
        if(checkifEmptyFieldSched7()) {
            var size = sched7ToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
                sched7ToCommit[i].txtPeriodCovered = d.getElementById('txtPeriodCoveredSch7'+i).value;
                sched7ToCommit[i].txtNameMiller = d.getElementById('txtNameMillerSch7'+i).value;
                sched7ToCommit[i].txtNameTaxPayer = d.getElementById('txtNameTaxPayerSch7'+i).value;
                sched7ToCommit[i].txtORNumber = d.getElementById('txtORNumSch7'+i).value;
                sched7ToCommit[i].txtAmountPaid = d.getElementById('txtAmountPaidSch7'+i).value;
                sched7ToCommit[i].txtAppliedCurrMo = d.getElementById('txtAppliedCurrSch7'+i).value;
            }
            i = sched7ToCommit.length;
            sched7ToCommit[i] = new Schedule7();

			$('#tbodyllistSched7').html("");
            for(i = 0; i < sched7ToCommit.length; i++) {

				$('#tbodyllistSched7').html(  d.getElementById('tbodyllistSched7').innerHTML + "<tr>" + 
                    "<td width='4%' align='center'> <input type='checkbox' class='printButtonClass' id='chxSched7"+i+"' name='chxSched7"+i+"'/> </td>" +
                    "<td width='16%' align='center'> <input type='text'  id='txtPeriodCoveredSch7"+i+"' name='txtPeriodCoveredSch7[]' style='width: 100px' value='"+ sched7ToCommit[i].txtPeriodCovered  +"' maxlength='10'  > </td>" +
                    "<td width='16%' align='center'> <input type='text'  id='txtNameMillerSch7"+i+"' name='txtNameMillerSch7[]' style='width: 130px' value='"+ sched7ToCommit[i].txtNameMiller +"'  maxlength='50' > </td> " +
                    "<td width='16%' align='center'><input type='text' id='txtNameTaxPayerSch7"+i+"' name='txtNameTaxPayerSch7[]' style='width: 100px' value='"+ sched7ToCommit[i].txtNameTaxPayer +"'   maxlength='17' /> </td> " +
                    "<td width='16%' align='center'><input type='text' id='txtORNumSch7"+i+"' name='txtORNumSch7[]' style='width: 100px'  value='"+ sched7ToCommit[i].txtORNumber +"'  maxlength='20' /> </td>" +
                    "<td width='16%' align='center'><input type='text' id='txtAmountPaidSch7"+i+"' name='txtAmountPaidSch7[]' style='width: 120px; text-align:right'  value='"+ sched7ToCommit[i].txtAmountPaid +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumWithheldAppSch7()' maxlength='17' /> </td>" +
                    "<td width='16%' align='center'><input type='text' id='txtAppliedCurrSch7"+i+"'  name='txtAppliedCurrSch7[]' style='width: 120px; text-align:right'  value='"+ sched7ToCommit[i].txtAppliedCurrMo  +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumWithheldAppSch7()' maxlength='17' /> </td>");

                setTimeout("setInputTextControl_HorizontalAlignment('txtAmountPaidSch7"+i+"',4 ); " +
                    "setInputTextControl_HorizontalAlignment('txtAppliedCurrSch7"+i+"',4 );",100);

                setTimeout("d.getElementById('txtAmountPaidSch7"+i+"').value+=''; " +
                    "d.getElementById('txtAppliedCurrSch7"+i+"').value+='';",100);
            }
        }
    }

    function deletelistSched7()
    {
        var sched7Temp = new Array();
        var i = 0;
        var size = sched7ToCommit.length;
        for(i = 0 ; i < size ; i++)
        {
            sched7ToCommit[i].txtPeriodCovered = d.getElementById('txtPeriodCoveredSch7'+i).value;
            sched7ToCommit[i].txtNameMiller = d.getElementById('txtNameMillerSch7'+i).value;
            sched7ToCommit[i].txtNameTaxPayer = d.getElementById('txtNameTaxPayerSch7'+i).value;
            sched7ToCommit[i].txtORNumber = d.getElementById('txtORNumSch7'+i).value;
            sched7ToCommit[i].txtAmountPaid = d.getElementById('txtAmountPaidSch7'+i).value;
            sched7ToCommit[i].txtAppliedCurrMo = d.getElementById('txtAppliedCurrSch7'+i).value;
        }
        i = 0;
        for(var j = 0; j < size ; j++) {
            if(!d.getElementById("chxSched7" + j).checked) {
                sched7Temp[i++] = sched7ToCommit[j];
            }
        }

        if(sched7Temp.length > 0) {
            sched7ToCommit = new Array();
            sched7ToCommit = sched7Temp;
			$('#tbodyllistSched7').html("");

            for(i = 0; i < sched7Temp.length; i++) {
                sched7ToCommit[i] = sched7Temp[i];
               
				$('#tbodyllistSched7').html(  d.getElementById('tbodyllistSched7').innerHTML + "<tr>" + 
                    "<td width='4%' align='center'> <input type='checkbox' class='printButtonClass' id='chxSched7"+i+"' /> </td>" +
                    "<td width='16%' align='center'> <input type='text'  id='txtPeriodCoveredSch7"+i+"' style='width: 100px' value='"+ sched7ToCommit[i].txtPeriodCovered  +"' maxlength='10'  > </td>" +
                    "<td width='16%' align='center'> <input type='text'  id='txtNameMillerSch7"+i+"' style='width: 130px' value='"+ sched7ToCommit[i].txtNameMiller +"'  maxlength='50' > </td> " +
                    "<td width='16%' align='center'><input type='text' id='txtNameTaxPayerSch7"+i+"' style='width: 100px' value='"+ sched7ToCommit[i].txtNameTaxPayer +"'   maxlength='17' /> </td> " +
                    "<td width='16%' align='center'><input type='text' id='txtORNumSch7"+i+"' style='width: 100px'  value='"+ sched7ToCommit[i].txtORNumber +"'  maxlength='20' /> </td>" +
                    "<td width='16%' align='center'><input type='text' id='txtAmountPaidSch7"+i+"' style='width: 120px; text-align:right'  value='"+ sched7ToCommit[i].txtAmountPaid +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumWithheldAppSch7()' maxlength='17' /> </td>" +
                    "<td width='16%' align='center'><input type='text' id='txtAppliedCurrSch7"+i+"' style='width: 120px; text-align:right'  value='"+ sched7ToCommit[i].txtAppliedCurrMo  +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumWithheldAppSch7()' maxlength='17' /> </td>");

                setTimeout("setInputTextControl_HorizontalAlignment('txtAmountPaidSch7"+i+"',4 ); " +
                    "setInputTextControl_HorizontalAlignment('txtAppliedCurrSch7"+i+"',4 );",100);

                setTimeout("d.getElementById('txtAmountPaidSch7"+i+"').value+=''; " +
                    "d.getElementById('txtAppliedCurrSch7"+i+"').value+='';",100);
            }
        } else {
            sched7ToCommit = new Array();
          
			$('#tbodyllistSched7').html("");
        }
        computeSumWithheldAppSch7();
    }

    function showSched7(){
		if(!isModalTurnOn) {
				saveTempSched7Data();
				
				if(d.getElementById('frm2550m:txtYear').value <= 2000 && d.getElementById('frm2550m:txtYear').value <= 2020 ) {
					alert("Please input a valid Return period year. Please enter 2000 above.");
					return;
				} else {
					d.getElementById('mainContent').style.display = "none";
					$('#modalSched7').show('blind');
					$('#wrapper').css({'display':'none' });	
				
					setTimeout("d.getElementById('txtmodalTotal23B').disabled = true; setInputTextControl_HorizontalAlignment('txtmodalTotal23B', 4);" +
						"d.getElementById('txtmodalTotalSched7AppliedCurrent').disabled = true; setInputTextControl_HorizontalAlignment('txtmodalTotalSched7AppliedCurrent', 4);" , 100);

					for(var i = 0; i < d.getElementById("tblSched7").rows.length - 1; i++) {
						setTimeout("setInputTextControl_HorizontalAlignment('txtAmountPaidSch7"+i+"',4 ); " +
							"setInputTextControl_HorizontalAlignment('txtAppliedCurrSch7"+i+"',4 );",100);

						setTimeout("d.getElementById('txtAmountPaidSch7"+i+"').value+=''; " +
							"d.getElementById('txtAppliedCurrSch7"+i+"').value+='';",100);
					}
					isModalTurnOn = true;
				}
			   
			}

			if(viewUploadFlag) {
				setTimeout("d.getElementById('btnAdd5').disabled = true;", 100);
				setTimeout("d.getElementById('btnDelete5').disabled = true;", 100);
				setTimeout("d.getElementById('btnClearPop7').disabled = true;", 100);
				setTimeout("d.getElementById('btnCancelPop7').disabled = true;", 100);
				setTimeout("toggleAllDisabled();", 100);
				setTimeout("d.getElementById('btnOkPop7').disabled = false;", 100);
			}
    }

    function saveTempSched7Data() {
        var x = 0;
        tempRowSizeSched7 = d.getElementById("tblSched7").rows.length - 1;

        for(x = 0; x < tempRowSizeSched7; x++){
            tempSchd7PeriodCovered[x] = d.getElementById('txtPeriodCoveredSch7'+ (x) ).value;
            tempSchd7MillerNm[x] = d.getElementById('txtNameMillerSch7'+ (x)).value;
            tempSchd7TaxpayerNm[x] = d.getElementById('txtNameTaxPayerSch7'+ (x)).value;
            tempSchd7ORnum[x] = d.getElementById('txtORNumSch7'+ (x)).value;
            tempSchd7AmountPaid[x] = d.getElementById('txtAmountPaidSch7'+ (x)).value;
            tempSchd7AppCurr[x] = d.getElementById('txtAppliedCurrSch7'+ (x)).value;
        }
    }

    function restoreTempSched7Data() {
        if(tempRowSizeSched7 > 0) {
            sched7ToCommit = new Array();
            
			$('#tbodyllistSched7').html("");
            var x = 0;
            for(x = 0; x < tempRowSizeSched7; x++){
                addlistSched7();

                d.getElementById('txtPeriodCoveredSch7'+ (x) ).value = tempSchd7PeriodCovered[x];
                d.getElementById('txtNameMillerSch7'+ (x)).value = tempSchd7MillerNm[x];
                d.getElementById('txtNameTaxPayerSch7'+ (x)).value = tempSchd7TaxpayerNm[x];
                d.getElementById('txtORNumSch7'+ (x)).value = tempSchd7ORnum[x];
                d.getElementById('txtAmountPaidSch7'+ (x)).value = tempSchd7AmountPaid[x];
                d.getElementById('txtAppliedCurrSch7'+ (x)).value = tempSchd7AppCurr[x];

                computeSumWithheldAppSch7();
            }
        }
    }

    function clearSched7Modal() {
        var x = 0;
        var rowSizeSched7 = d.getElementById("tblSched7").rows.length - 1;

        for(x = 0; x < rowSizeSched7; x++){
            d.getElementById('txtPeriodCoveredSch7'+ (x) ).value = "";
            d.getElementById('txtNameMillerSch7'+ (x)).value = "";
            d.getElementById('txtNameTaxPayerSch7'+ (x)).value = "";
            d.getElementById('txtORNumSch7'+ (x)).value = "";
            d.getElementById('txtAmountPaidSch7'+ (x)).value = "0.00";
            d.getElementById('txtAppliedCurrSch7'+ (x)).value = "0.00";
        }
    }

    function cancelSched7Modal() {
        restoreTempSched7Data();

		d.getElementById('mainContent').style.display = 'block';
		if ( $('#modalSched7').css('display') != 'none' ) {
			$('#modalSched7').hide('blind');
			$('#wrapper').show('blind');
		}
		$('#DummyTxt').html("Creator");
		$('#DummyTxt').html("");	
		
        isModalTurnOn = false;
    }

    function getSched7Modal(){
        if (checkifEmptyFieldSched7() )
        {
          
			d.getElementById('mainContent').style.display = 'block';
			if ( $('#modalSched7').css('display') != 'none' ) {
				$('#modalSched7').hide('blind');
				$('#wrapper').show('blind');
			}
			$('#DummyTxt').html("Creator");
			$('#DummyTxt').html("");	
			
            d.getElementById('frm2550m:txtTax23B').value  = d.getElementById('txtmodalTotalSched7AppliedCurrent').value;
            compute23G();
            isModalTurnOn = false;

        }
    }

    function checkifEmptyFieldSched8() {

        var size = sched8ToCommit.length;
        for(var i = 0 ; i < size ; i++)
        {
            if(d.getElementById('txtPeriodCoveredSch8'+ i).value == "" || d.getElementById('txtNameAgentSch8'+ i).value == "") {
                alert("Please enter valid row " + (i + 1) + " data for Schedule 8.\n" +
                    "Empty fields are not allowed."); return ;
            } strmmddyyy = d.getElementById('txtPeriodCoveredSch8'+i).value;

			if(strmmddyyy != ""){
				var result = strmmddyyy.split("/")
				if(result.length == 3 ){
					//Variables
					var month = result[0];
					var day = result[1];
					var year = result[2];
					
					var isLeap = new Date(year, 1, 29).getMonth() == 1;
						
					if(isNaN(month) || isNaN(day) || isNaN(year)){
						alert("Please enter a valid date for Date of Purchase on row "+(i+1)+".\n" +
						"Please enter a date in the MM/DD/YYYY format.");
					return;
					}else{ // Validate of valid Day for the month
						//Check if valid date
						var month31 = (['01', '03', '05', '07', '08', '10', '12']);
						var month30 = (['04', '06', '09', '11']);			
						if (month31.contains(month) && day > 31)
						{
							alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only.");
							return;
						}
						else if (month30.contains(month) && day > 30)
						{
							alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only.");
							return;
						}else if(month == 2){
								//Special Handling for Leap Year
								if (!isLeap && day == 29) {
									alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only.");
									return;
								}
								if (!isLeap && day > 29) {
									alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only.");
									return;
								}
								if (isLeap && day >29) {
									alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only.");
									return;
								}
								
						}else{
							//Validation if year is within the period				
							if(year != d.getElementById('frm2550m:txtYear').value ||  month != d.getElementById('frm2550m:RtnYear').value*1  )
							{
								alert("Invalid entry on row " + (i +1) + ". Date of Purchase must be within the Return Period only."); return;
							}
						
						}
					}
				}else{
				alert("Please enter a valid date for Date of Purchase on row "+(i+1)+".\n" +
				"Please enter a date in the MM/DD/YYYY format.");
				return;
				}
			}
       
            if( d.getElementById('txtIncomePaymentSch8'+ i).value <= 0 ) {
                alert("Please enter a valid amount for Income Payment on row " + ( i + 1) + ".\n" +
                    "Value must be greater than 0."); return;
            }
            if( d.getElementById('txtTotalWithheldSch8'+ i).value <= 0 ) {
                alert("Please enter a valid amount for Total Tax Withheld on row " + ( i + 1) + ".\n" +
                    "Value must be greater than 0."); return;
            }
            if( d.getElementById('txtAppliedCurrSch8'+ i).value <= 0 ) {
                alert("Please enter a valid amount for Applied Current Month on row " + ( i + 1) + ".\n" +
                    "Value must be greater than 0."); return;
            }
         
        }

        return true;
    }

    function addlistSched8Reload()
    {
            var size = sched8ToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
                sched8ToCommit[i].txtPeriodCovered = d.getElementById('txtPeriodCoveredSch8'+i).value;
                sched8ToCommit[i].txtNameAgent = d.getElementById('txtNameAgentSch8'+i).value;
                sched8ToCommit[i].txtIncomePayment = d.getElementById('txtIncomePaymentSch8'+i).value;
                sched8ToCommit[i].txtTotalWithheld = d.getElementById('txtTotalWithheldSch8'+i).value;
                sched8ToCommit[i].txtAppliedCurrMo = d.getElementById('txtAppliedCurrSch8'+i).value;
            }
            i = sched8ToCommit.length;
            sched8ToCommit[i] = new Schedule6and8();

            //d.getElementById("tbodyllistSched8").innerHTML = "";
			$('#tbodyllistSched8').html("");
			
            for(i = 0; i < sched8ToCommit.length; i++) {

				$('#tbodyllistSched8').html(  d.getElementById('tbodyllistSched8').innerHTML + "<tr>" + 
                    "<td width='5%' align='center'> <input type='checkbox' class='printButtonClass' id='chxSched8"+i+"' /> </td>" +
                    "<td width='19%' align='center'> <input type='text'  id='txtPeriodCoveredSch8"+i+"' style='width: 100px' value='"+ sched8ToCommit[i].txtPeriodCovered  +"' maxlength='10'  > </td>" +
                    "<td width='19%' align='center'> <input type='text'  id='txtNameAgentSch8"+i+"' style='width: 130px' value='"+ sched8ToCommit[i].txtNameAgent +"'  maxlength='50' > </td> " +
                    "<td width='19%' align='center'><input type='text' id='txtIncomePaymentSch8"+i+"' style='width: 120px; text-align:right' value='"+ sched8ToCommit[i].txtIncomePayment +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2)' maxlength='17' /> </td> " +
                    "<td width='19%' align='center'><input type='text' id='txtTotalWithheldSch8"+i+"' style='width: 120px; text-align:right'  value='"+ sched8ToCommit[i].txtTotalWithheld +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumWithheldAppSch8()' maxlength='17' /> </td>" +
                    "<td width='19%' align='center'><input type='text' id='txtAppliedCurrSch8"+i+"' style='width: 120px; text-align:right'  value='"+ sched8ToCommit[i].txtAppliedCurrMo +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumWithheldAppSch8()' maxlength='17' /> </td>");

                setTimeout("setInputTextControl_HorizontalAlignment('txtIncomePaymentSch8"+i+"',4 );" +
                    "setInputTextControl_HorizontalAlignment('txtTotalWithheldSch8"+i+"',4 ); " +
                    "setInputTextControl_HorizontalAlignment('txtAppliedCurrSch8"+i+"',4 );",100);

                setTimeout("d.getElementById('txtIncomePaymentSch8"+i+"').value+='';" +
                    "d.getElementById('txtTotalWithheldSch8"+i+"').value+=''; " +
                    "d.getElementById('txtAppliedCurrSch8"+i+"').value+='';",100);
            }
    }	
	
    function addlistSched8()
    {
        if(checkifEmptyFieldSched8()) {
            var size = sched8ToCommit.length;
            for(var i = 0 ; i < size ; i++)
            {
                sched8ToCommit[i].txtPeriodCovered = d.getElementById('txtPeriodCoveredSch8'+i).value;
                sched8ToCommit[i].txtNameAgent = d.getElementById('txtNameAgentSch8'+i).value;
                sched8ToCommit[i].txtIncomePayment = d.getElementById('txtIncomePaymentSch8'+i).value;
                sched8ToCommit[i].txtTotalWithheld = d.getElementById('txtTotalWithheldSch8'+i).value;
                sched8ToCommit[i].txtAppliedCurrMo = d.getElementById('txtAppliedCurrSch8'+i).value;
            }
            i = sched8ToCommit.length;
            sched8ToCommit[i] = new Schedule6and8();

			$('#tbodyllistSched8').html("");
			
            for(i = 0; i < sched8ToCommit.length; i++) {

				$('#tbodyllistSched8').html(  d.getElementById('tbodyllistSched8').innerHTML + "<tr>" + 
                    "<td width='5%' align='center'> <input type='checkbox' class='printButtonClass' id='chxSched8"+i+"' name='chxSched8"+i+"' /> </td>" +
                    "<td width='19%' align='center'> <input type='text'  id='txtPeriodCoveredSch8"+i+"' name='txtPeriodCoveredSch8[]' style='width: 100px' value='"+ sched8ToCommit[i].txtPeriodCovered  +"' maxlength='10'  > </td>" +
                    "<td width='19%' align='center'> <input type='text'  id='txtNameAgentSch8"+i+"' name='txtNameAgentSch8[]' style='width: 130px' value='"+ sched8ToCommit[i].txtNameAgent +"'  maxlength='50' > </td> " +
                    "<td width='19%' align='center'><input type='text' id='txtIncomePaymentSch8"+i+"' name='txtIncomePaymentSch8[]' style='width: 120px; text-align:right' value='"+ sched8ToCommit[i].txtIncomePayment +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2)' maxlength='17' /> </td> " +
                    "<td width='19%' align='center'><input type='text' id='txtTotalWithheldSch8"+i+"' name='txtTotalWithheldSch8[]' style='width: 120px; text-align:right'  value='"+ sched8ToCommit[i].txtTotalWithheld +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumWithheldAppSch8()' maxlength='17' /> </td>" +
                    "<td width='19%' align='center'><input type='text' id='txtAppliedCurrSch8"+i+"' name='txtAppliedCurrSch8[]' style='width: 120px; text-align:right'  value='"+ sched8ToCommit[i].txtAppliedCurrMo +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumWithheldAppSch8()' maxlength='17' /> </td>");
				
                setTimeout("setInputTextControl_HorizontalAlignment('txtIncomePaymentSch8"+i+"',4 );" +
                    "setInputTextControl_HorizontalAlignment('txtTotalWithheldSch8"+i+"',4 ); " +
                    "setInputTextControl_HorizontalAlignment('txtAppliedCurrSch8"+i+"',4 );",100);

                setTimeout("d.getElementById('txtIncomePaymentSch8"+i+"').value+='';" +
                    "d.getElementById('txtTotalWithheldSch8"+i+"').value+=''; " +
                    "d.getElementById('txtAppliedCurrSch8"+i+"').value+='';",100);
            }
        }
    }

    function deletelistSched8()
    {
        var sched8Temp = new Array();
        var i = 0;
        var size = sched8ToCommit.length;
        for(i = 0 ; i < size ; i++)
        {
            sched8ToCommit[i].txtPeriodCovered = d.getElementById('txtPeriodCoveredSch8'+i).value;
            sched8ToCommit[i].txtNameAgent = d.getElementById('txtNameAgentSch8'+i).value;
            sched8ToCommit[i].txtIncomePayment = d.getElementById('txtIncomePaymentSch8'+i).value;
            sched8ToCommit[i].txtTotalWithheld = d.getElementById('txtTotalWithheldSch8'+i).value;
            sched8ToCommit[i].txtAppliedCurrMo = d.getElementById('txtAppliedCurrSch8'+i).value;
        }
        i = 0;
        for(var j = 0; j < size ; j++) {
            if(!d.getElementById("chxSched8" + j).checked) {
                sched8Temp[i++] = sched8ToCommit[j];
            }
        }

        if(sched8Temp.length > 0) {
            sched8ToCommit = new Array();
            sched8ToCommit = sched8Temp;
			$('#tbodyllistSched8').html("");

            for(i = 0; i < sched8Temp.length; i++) {
                sched8ToCommit[i] = sched8Temp[i];
              
				$('#tbodyllistSched8').html(  d.getElementById('tbodyllistSched8').innerHTML + "<tr>" + 
                    "<td width='5%' align='center'> <input type='checkbox' class='printButtonClass' id='chxSched8"+i+"' /> </td>" +
                    "<td width='19%' align='center'> <input type='text'  id='txtPeriodCoveredSch8"+i+"' style='width: 100px' value='"+ sched8ToCommit[i].txtPeriodCovered  +"' maxlength='10'  > </td>" +
                    "<td width='19%' align='center'> <input type='text'  id='txtNameAgentSch8"+i+"' style='width: 130px' value='"+ sched8ToCommit[i].txtNameAgent +"'  maxlength='50' > </td> " +
                    "<td width='19%' align='center'><input type='text' id='txtIncomePaymentSch8"+i+"' style='width: 120px; text-align:right' value='"+ sched8ToCommit[i].txtIncomePayment +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2)' maxlength='17' /> </td> " +
                    "<td width='19%' align='center'><input type='text' id='txtTotalWithheldSch8"+i+"' style='width: 120px; text-align:right'  value='"+ sched8ToCommit[i].txtTotalWithheld +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumWithheldAppSch8()' maxlength='17' /> </td>" +
                    "<td width='19%' align='center'><input type='text' id='txtAppliedCurrSch8"+i+"' style='width: 120px; text-align:right'  value='"+ sched8ToCommit[i].txtAppliedCurrMo +"' onkeypress='return numbersonly(this, event)' onblur='round(this,2); computeSumWithheldAppSch8()' maxlength='17' /> </td>");

                setTimeout("setInputTextControl_HorizontalAlignment('txtIncomePaymentSch8"+i+"',4 );" +
                    "setInputTextControl_HorizontalAlignment('txtTotalWithheldSch8"+i+"',4 ); " +
                    "setInputTextControl_HorizontalAlignment('txtAppliedCurrSch8"+i+"',4 );",100);

                setTimeout("d.getElementById('txtIncomePaymentSch8"+i+"').value+='';" +
                    "d.getElementById('txtTotalWithheldSch8"+i+"').value+=''; " +
                    "d.getElementById('txtAppliedCurrSch8"+i+"').value+='';",100);
            }
        } else {
            sched8ToCommit = new Array();
           
			$('#tbodyllistSched8').html("");
        }
        computeSumWithheldAppSch8();
    }

    function showSched8(){			
		if(!isModalTurnOn) {
				saveTempSched8Data();
				
				if(d.getElementById('frm2550m:txtYear').value <= 2000 && d.getElementById('frm2550m:txtYear').value <= 2020 ) {
					alert("Please input a valid Return period year. Please enter 2000 above.");
					return;
				} else {
					if(d.getElementById('frm2550m:txtTax13A').value <= 0) {
						alert("Please enter a valid value on Item 13A to be able to load the Schedule 8.");
						return;
					}else {
				
						d.getElementById('mainContent').style.display = "none";		
						$('#modalSched8').show('blind');
						$('#wrapper').css({'display':'none' });
						
						setTimeout("d.getElementById('txtmodalTotal23C').disabled = true; setInputTextControl_HorizontalAlignment('txtmodalTotal23C', 4);" +
							"d.getElementById('txtmodalTotalSched8AppliedCurrent').disabled = true; setInputTextControl_HorizontalAlignment('txtmodalTotalSched8AppliedCurrent', 4);" , 100);
						
						isModalTurnOn = true; 
					}
					
					for(i = 0; i < d.getElementById("tblSched8").rows.length - 1; i++) {
						setTimeout("setInputTextControl_HorizontalAlignment('txtIncomePaymentSch8"+i+"',4 );" +
							"setInputTextControl_HorizontalAlignment('txtTotalWithheldSch8"+i+"',4 ); " +
							"setInputTextControl_HorizontalAlignment('txtAppliedCurrSch8"+i+"',4 );",100);

						setTimeout("d.getElementById('txtIncomePaymentSch8"+i+"').value+='';" +
							"d.getElementById('txtTotalWithheldSch8"+i+"').value+=''; " +
							"d.getElementById('txtAppliedCurrSch8"+i+"').value+='';",100);
					}
					

				}
			  
			}

			if(viewUploadFlag) {
				setTimeout("d.getElementById('btnAdd6').disabled = true;", 100);
				setTimeout("d.getElementById('btnDelete6').disabled = true;", 100);
				setTimeout("d.getElementById('btnClearPop8').disabled = true;", 100);
				setTimeout("d.getElementById('btnCancelPop8').disabled = true;", 100);
				setTimeout("toggleAllDisabled();", 100);
				setTimeout("d.getElementById('btnOkPop8').disabled = false;", 100);
			}
    }

    function saveTempSched8Data() {
        var x = 0;
        tempRowSizeSched8 = d.getElementById("tblSched8").rows.length - 1;

        for(x = 0; x < tempRowSizeSched8; x++){
            tempSchd8PeriodCovered[x] = d.getElementById('txtPeriodCoveredSch8'+ (x) ).value;
            tempSchd8WthAgentNm[x] = d.getElementById('txtNameAgentSch8'+ (x)).value;
            tempSchd8IncPymnt[x] = d.getElementById('txtIncomePaymentSch8'+ (x)).value;
            tempSchd8TotalTaxWith[x] = d.getElementById('txtTotalWithheldSch8'+ (x)).value;
            tempSchd8TotalTaxWith[x] = d.getElementById('txtAppliedCurrSch8'+ (x)).value;
        }
    }

    function restoreTempSched8Data() {
        if(tempRowSizeSched8 > 0) {
            sched8ToCommit = new Array();
            //d.getElementById("tbodyllistSched8").innerHTML = "";
			$('#tbodyllistSched8').html("");

            var x = 0;
            for(x = 0; x < tempRowSizeSched8; x++){
                addlistSched8();

                d.getElementById('txtPeriodCoveredSch8'+ (x) ).value = tempSchd8PeriodCovered[x];
                d.getElementById('txtNameAgentSch8'+ (x)).value = tempSchd8WthAgentNm[x];
                d.getElementById('txtIncomePaymentSch8'+ (x)).value = tempSchd8IncPymnt[x];
                d.getElementById('txtTotalWithheldSch8'+ (x)).value = tempSchd8TotalTaxWith[x];
                d.getElementById('txtAppliedCurrSch8'+ (x)).value = tempSchd8TotalTaxWith[x];

                computeSumWithheldAppSch8();
            }
        }
    }

    function clearSched8Modal() {
        var x = 0;
        var rowSizeSched8 = d.getElementById("tblSched8").rows.length - 1;
        
        for(x = 0; x < rowSizeSched8; x++){
            d.getElementById('txtPeriodCoveredSch8'+ (x) ).value = "";
            d.getElementById('txtNameAgentSch8'+ (x)).value = "";
            d.getElementById('txtIncomePaymentSch8'+ (x)).value = "0.00";
            d.getElementById('txtTotalWithheldSch8'+ (x)).value = "0.00";
            d.getElementById('txtAppliedCurrSch8'+ (x)).value = "0.00";
        }
    }

    function cancelSched8Modal() {
        restoreTempSched8Data();

		d.getElementById('mainContent').style.display = 'block';
		if ( $('#modalSched8').css('display') != 'none' ) {
			$('#modalSched8').hide('blind');
			$('#wrapper').show('blind');
		}
		$('#DummyTxt').html("Creator");
		$('#DummyTxt').html("");	
		
        isModalTurnOn = false;
    }

    function getSched8Modal(){
        if (checkifEmptyFieldSched8() )
        {
           
			d.getElementById('mainContent').style.display = 'block';
			if ( $('#modalSched8').css('display') != 'none' ) {
				$('#modalSched8').hide('blind');
				$('#wrapper').show('blind');
			}
			$('#DummyTxt').html("Creator");
			$('#DummyTxt').html("");	
			
            d.getElementById('frm2550m:txtTax23C').value  = d.getElementById('txtmodalTotalSched8AppliedCurrent').value;
            compute23G();

            isModalTurnOn = false;
        }
    }

    function compute13B() {
        d.getElementById('frm2550m:txtTax13B').value = formatCurrency((NumWithComma(d.getElementById('frm2550m:txtTax13A').value)) * 0.12 );
        compute16B();
    }

    function compute16A() {

        d.getElementById('frm2550m:txtTax16A').value = formatCurrency((NumWithComma(d.getElementById('frm2550m:txtTax12A').value)) + (NumWithComma(d.getElementById('frm2550m:txtTax13A').value)) +
            (NumWithComma(d.getElementById('frm2550m:txtTax14').value)) + (NumWithComma(d.getElementById('frm2550m:txtTax15').value)));
    }

    function compute16B() {

        d.getElementById('frm2550m:txtTax16B').value = formatCurrency((NumWithComma(d.getElementById('frm2550m:txtTax12B').value)) + (NumWithComma(d.getElementById('frm2550m:txtTax13B').value)));
        compute22();
    }

    function compute17F() {
        d.getElementById('frm2550m:txtTax17F').value = formatCurrency((NumWithComma(d.getElementById('frm2550m:txtTax17A').value)) + (NumWithComma(d.getElementById('frm2550m:txtTax17B').value)) +
            (NumWithComma(d.getElementById('frm2550m:txtTax17C').value)) + (NumWithComma(d.getElementById('frm2550m:txtTax17D').value)) + (NumWithComma(d.getElementById('frm2550m:txtTax17E').value)));
        
        compute19();
    }

    function getInputTaxCompute(index) {

        d.getElementById('txtInputTax' + index).value = formatCurrency((NumWithComma(d.getElementById('txtAmt' + index).value)) * 0.12 );
        computeSumTax();
    }

    function computeSumTax(){
        var size = sched2ToCommit.length;
        var totalAmountTax = 0;
        var totalInputTax = 0;
        for(var i = 0 ; i < size ; i++){
            totalAmountTax = totalAmountTax*1 + NumWithComma(d.getElementById('txtAmt' + i).value)*1 ;
            totalInputTax = totalInputTax*1  + NumWithComma(d.getElementById('txtInputTax' + i).value)*1;
        }
        d.getElementById('txtmodalTotalAmt').value = formatCurrency(totalAmountTax);
        d.getElementById('txtmodalTotalInputTax').value = formatCurrency(totalInputTax);
    }

    function getInputTaxCompute3A(index) {

        d.getElementById('txtInputTax3A' + index).value = formatCurrency((NumWithComma(d.getElementById('txtAmt3A' + index).value)) * 0.12 );
        computeSumTax3A();
    }

    function computeSumTax3A(){
        var size = sched3AToCommit.length;
        var totalAmountTax = 0;
        var totalInputTax = 0;
        var totalBalanceSched = 0;

        for(var i = 0 ; i < size ; i++){
            totalAmountTax = totalAmountTax*1 + NumWithComma(d.getElementById('txtAmt3A' + i).value)*1 ;
            totalInputTax = totalInputTax*1  + NumWithComma(d.getElementById('txtInputTax3A' + i).value)*1;

            d.getElementById('txtAllowInputTax3A' + i).value = formatCurrency((NumWithComma(d.getElementById('txtInputTax3A' + i).value)) / (NumWithComma(d.getElementById('txtRecogLife3A' + i).value)));
            d.getElementById('txtBalInputTax3A' + i).value = formatCurrency((NumWithComma(d.getElementById('txtInputTax3A' + i).value)) - (NumWithComma(d.getElementById('txtAllowInputTax3A' + i).value)));
            totalBalanceSched = totalBalanceSched*1 + NumWithComma(d.getElementById('txtBalInputTax3A' + i).value)*1;
        }
        d.getElementById('txtmodalTotalAmountSched3').value = formatCurrency(totalAmountTax);
        d.getElementById('txtmodalTotalInputTaxSched3').value = formatCurrency(totalInputTax);
        d.getElementById('txtmodalTotalBalanceSched3A').value = formatCurrency(totalBalanceSched);
        computeSumModal20A();
    }

    function computeSumTax3B(){
        var size = sched3BToCommit.length;
        var totalBalanceSched = 0;
        for(var i = 0 ; i < size ; i++){

            d.getElementById('txtAllowInputTax3B' + i).value = formatCurrency((NumWithComma(d.getElementById('txtBalInputTaxPrevious3B' + i).value)) / (NumWithComma(d.getElementById('txtRecogLife3B' + i).value)));
            d.getElementById('txtBalInputTax3B' + i).value = formatCurrency((NumWithComma(d.getElementById('txtBalInputTaxPrevious3B' + i).value) - NumWithComma(d.getElementById('txtAllowInputTax3B' + i).value) ).toFixed(2));
            totalBalanceSched = totalBalanceSched*1 + NumWithComma(d.getElementById('txtBalInputTax3B' + i).value)*1;
        }
        d.getElementById('txtmodalTotalBalanceSched3B').value = formatCurrency(totalBalanceSched);
        computeSumModal20A();
    }

    function computeSumWithheldApp() {
        var size = sched6ToCommit.length;
        var totalWithheld = 0;
        var totalApplied = 0;
        for(var i = 0 ; i < size ; i++){
            totalWithheld = totalWithheld*1 + NumWithComma(d.getElementById('txtTotalWithheld'+i).value)*1;
            totalApplied = totalApplied*1 + NumWithComma(d.getElementById('txtAppliedCurr'+i).value)*1;
        }
        d.getElementById('txtmodalTotal23A').value = formatCurrency(totalWithheld);
        d.getElementById('txtmodalTotalSched6AppliedCurrent').value = formatCurrency(totalApplied);
    }

    function computeSumWithheldAppSch7() {
        var size = sched7ToCommit.length;
        var totalAmountPaid = 0;
        var totalApplied = 0;
        for(var i = 0 ; i < size ; i++){
            totalAmountPaid = totalAmountPaid*1 + NumWithComma(d.getElementById('txtAmountPaidSch7'+i).value)*1;
            totalApplied = totalApplied*1 + NumWithComma(d.getElementById('txtAppliedCurrSch7'+i).value)*1;
        }
        d.getElementById('txtmodalTotal23B').value = formatCurrency(totalAmountPaid);
        d.getElementById('txtmodalTotalSched7AppliedCurrent').value = formatCurrency(totalApplied);
    }

    function computeSumWithheldAppSch8() {
        var size = sched8ToCommit.length;
        var totalWithheld = 0;
        var totalApplied = 0;
        for(var i = 0 ; i < size ; i++){
            totalWithheld = totalWithheld*1 + NumWithComma(d.getElementById('txtTotalWithheldSch8'+i).value)*1;
            totalApplied = totalApplied*1 + NumWithComma(d.getElementById('txtAppliedCurrSch8'+i).value)*1;
        }
        d.getElementById('txtmodalTotal23C').value = formatCurrency(totalWithheld);
        d.getElementById('txtmodalTotalSched8AppliedCurrent').value = formatCurrency(totalApplied);
    }

    function computeSumModal20A() {
        d.getElementById('txtmodalTotalInputTax20ASched3').value = formatCurrency((NumWithComma(d.getElementById('txtmodalTotalBalanceSched3A').value)) + (NumWithComma(d.getElementById('txtmodalTotalBalanceSched3B').value)));
    }

    function compute18TransactionbyRow(letter) {
        var indexAlpha = '';
        if(letter =="E"){
            indexAlpha = "F";
        }else if(letter == "G"){
            indexAlpha = "H";
        }else if(letter == "I"){
            indexAlpha = "J";
        }else if(letter == "K"){
            indexAlpha = "L";
        }else if(letter == "N"){
            indexAlpha = "O";
        }
        d.getElementById('frm2550m:txtTax18'+indexAlpha).value = formatCurrency((NumWithComma(d.getElementById('frm2550m:txtTax18'+letter).value)) * 0.12 );
        compute19();
    }

    function compute18P() {
        d.getElementById('frm2550m:txtTax18P').value = formatCurrency((NumWithComma(d.getElementById('frm2550m:txtTax18A').value)) + (NumWithComma(d.getElementById('frm2550m:txtTax18C').value)) +
            (NumWithComma(d.getElementById('frm2550m:txtTax18E').value)) + (NumWithComma(d.getElementById('frm2550m:txtTax18G').value)) + (NumWithComma(d.getElementById('frm2550m:txtTax18I').value)) +
            (NumWithComma(d.getElementById('frm2550m:txtTax18K').value)) + (NumWithComma(d.getElementById('frm2550m:txtTax18M').value)) + (NumWithComma(d.getElementById('frm2550m:txtTax18N').value)));

        compute19();
    }

    function compute19() {
        d.getElementById('frm2550m:txtTax19').value = formatCurrency((NumWithComma(d.getElementById('frm2550m:txtTax17F').value)) + (NumWithComma(d.getElementById('frm2550m:txtTax18B').value)) +
            (NumWithComma(d.getElementById('frm2550m:txtTax18D').value)) + (NumWithComma(d.getElementById('frm2550m:txtTax18F').value)) + (NumWithComma(d.getElementById('frm2550m:txtTax18H').value)) +
            (NumWithComma(d.getElementById('frm2550m:txtTax18J').value)) + (NumWithComma(d.getElementById('frm2550m:txtTax18L').value)) + (NumWithComma(d.getElementById('frm2550m:txtTax18O').value)));
        compute21();
    }

    function computeInputTaxSched4() {
        // d.getElementById('txtlessStdTaxSched4').value = formatCurrency((NumWithComma(d.getElementById('frm2550m:txtTax13A').value)) * 5 / 100);
        d.getElementById('txtTotalInputTaxnotDirectSched4').value = formatCurrency((NumWithComma(d.getElementById('txtTaxableSaleSched4').value)) / (NumWithComma(d.getElementById('txtTotalSaleSched4').value)) * (NumWithComma(d.getElementById('txtInputTaxnotDirectSched4').value)));
        d.getElementById('txtTotalInputSaletoGovernmentSched4').value = formatCurrency((NumWithComma(d.getElementById('txtinputtaxSched4').value)) + (NumWithComma(d.getElementById('txtTotalInputTaxnotDirectSched4').value)));
        d.getElementById('txtTotal20BSched4').value = formatCurrency((NumWithComma(d.getElementById('txtTotalInputSaletoGovernmentSched4').value)) - (NumWithComma(d.getElementById('txtlessStdTaxSched4').value)));
    }
	
	function changedTxtTax13A() {
		d.getElementById('txtlessStdTaxSched4').value = formatCurrency((NumWithComma(d.getElementById('frm2550m:txtTax13A').value)) * 7  / 100);
	}

    function computeInputTaxSched5() {
        d.getElementById('txtProductnotDirectSched5').value = formatCurrency((NumWithComma(d.getElementById('txtTotSaleSched5').value)) / (NumWithComma(d.getElementById('txtSumTotalSaleSched5').value)) * (NumWithComma(d.getElementById('txtAmountInputnotDirectSched5').value)));
        d.getElementById('txtTotal20CSched5').value = formatCurrency((NumWithComma(d.getElementById('txtinputtaxSched5').value)) + (NumWithComma(d.getElementById('txtProductnotDirectSched5').value)));
    }

    function compute20F() {
        d.getElementById('frm2550m:txtTax20F').value = formatCurrency((NumWithComma(d.getElementById('frm2550m:txtTax20A').value)) + (NumWithComma(d.getElementById('frm2550m:txtTax20B').value)) +
            (NumWithComma(d.getElementById('frm2550m:txtTax20C').value)) + (NumWithComma(d.getElementById('frm2550m:txtTax20D').value)) + (NumWithComma(d.getElementById('frm2550m:txtTax20E').value)));
        compute21();
    }

    function compute21(){
        d.getElementById('frm2550m:txtTax21').value = formatCurrency((NumWithComma(d.getElementById('frm2550m:txtTax19').value)) - (NumWithComma(d.getElementById('frm2550m:txtTax20F').value)));
        compute22();
    }
    
    function compute22(){
        d.getElementById('frm2550m:txtTax22').value = formatCurrency((NumWithComma(d.getElementById('frm2550m:txtTax16B').value)) - (NumWithComma(d.getElementById('frm2550m:txtTax21').value)));
        compute24();
    }

    function compute23G() {
        d.getElementById('frm2550m:txtTax23G').value = formatCurrency((NumWithComma(d.getElementById('frm2550m:txtTax23A').value)) + (NumWithComma(d.getElementById('frm2550m:txtTax23B').value)) +
            (NumWithComma(d.getElementById('frm2550m:txtTax23C').value)) + (NumWithComma(d.getElementById('frm2550m:txtTax23D').value)) + (NumWithComma(d.getElementById('frm2550m:txtTax23E').value))
			+ (NumWithComma(d.getElementById('frm2550m:txtTax23F').value)));
        compute24();
    }

	function computePenalties() {
        d.getElementById('frm2550m:txtTax25D').value = formatCurrency(NumWithComma(d.getElementById('frm2550m:txtTax25A').value) + NumWithComma(d.getElementById('frm2550m:txtTax25B').value) + NumWithComma(d.getElementById('frm2550m:txtTax25C').value));
		compute24();
    }
	
    function compute24(){
        d.getElementById('frm2550m:txtTax24').value = formatCurrency((NumWithComma(d.getElementById('frm2550m:txtTax22').value)) - (NumWithComma(d.getElementById('frm2550m:txtTax23G').value)));
        
        d.getElementById('frm2550m:txtTax26').value = formatCurrency(NumWithComma(d.getElementById('frm2550m:txtTax24').value) + NumWithComma(d.getElementById('frm2550m:txtTax25D').value));
		capital();
	}


    function validate(){
        var dt = new Date();
        if(d.getElementById('frm2550m:OptSpecialTax1').checked) {
            if(d.getElementById('frm2550m:lstSpecialTax').value == "0" )
            {
                alert("Please select an option on item no. 11. Entry must not be empty.");
                return;
            }
        }
        if(d.getElementById('frm2550m:txtYear').value == "" )
        {
            alert("Please indicate a valid Year.");
            return;
        }
      
        if( d.getElementById('frm2550m:txtYear').value*1 < 2000   )
        {
            alert("Invalid date entry on Item no.1. Entry should not be lower than 2000.")
            return;
        }
        if( (d.getElementById('frm2550m:txtTIN1').value == "" || d.getElementById('frm2550m:txtTIN2').value == "" || d.getElementById('frm2550m:txtTIN3').value == "" || d.getElementById('frm2550m:txtBranchCode').value == "")  )
        {
            alert("Please enter a valid TIN number on Item 4.");
            return;
        }		
       		
        if( (d.getElementById('frm2550m:txtLineBus').value == "")  )
        {
            alert("Please enter a valid Line of Business on Item 6.");
            return;
        }			
		if( (d.getElementById('frm2550m:txtTaxPayerName').value == "")  )
        {
            alert("Please enter a valid Taxpayer Name on Item 7.");
            return;
        }	
		if( (d.getElementById('frm2550m:txtTelephoneNum').value == "")  )
        {
            alert("Please enter Taxpayer's telephone number on Item 8.");
            return;
        }
		if( (d.getElementById('frm2550m:txtAddress').value == "")  )
        {
            alert("Please enter Taxpayer's Registered Address on Item 9.");
            return;
        }	
		if( (d.getElementById('frm2550m:txtZipCode').value == "")  )
        {
            alert("Please enter Taxpayer's Zip code on Item 10.");
            return;
        }
        disabledAllControl();
        alert("Validation successful. Click on Edit if you wish to modify your entries.");
		return;
    }

	var disableElem = true;
	var enableElem = false;
    function disabledAllControl(){
        d.getElementById('frm2550m:OptAmendedYN1').disabled = true;
        d.getElementById('frm2550m:OptAmendedYN2').disabled = true;
		d.getElementById('frm2550m:txtSheets').disabled = true;
		d.getElementById('frm2550m:txtTIN1').disabled = true;
		d.getElementById('frm2550m:txtTIN2').disabled = true;
		d.getElementById('frm2550m:txtTIN3').disabled = true;
		d.getElementById('frm2550m:txtBranchCode').disabled = true;
		d.getElementById('frm2550m:txtRDOCode').disabled = true;
		d.getElementById('frm2550m:txtLineBus').disabled = true;
		d.getElementById('frm2550m:txtTaxPayerName').disabled = true;
		d.getElementById('frm2550m:txtTelephoneNum').disabled = true;
		d.getElementById('frm2550m:txtAddress').disabled = true;
		d.getElementById('frm2550m:txtZipCode').disabled = true;
        d.getElementById('btnPrint').disabled = false;
        d.getElementById('frm2550m:cmdEdit').disabled = false;
		d.getElementById('frm2550m:btnFinalCopy').disabled = false;
        d.getElementById('btnUpload').disabled = false;
        d.getElementById('frm2550m:cmdValidate').disabled = true;
        d.getElementById('frm2550m:RtnYear').disabled = true;
        d.getElementById('frm2550m:txtYear').disabled = true;
        d.getElementById('frm2550m:OptSpecialTax1').disabled = true;
        d.getElementById('frm2550m:OptSpecialTax2').disabled = true;
        if(d.getElementById('frm2550m:OptSpecialTax1').checked) {
            d.getElementById('frm2550m:lstSpecialTax').disabled = true;
        }
        d.getElementById('frm2550m:txtTax13A').disabled = true;
        d.getElementById('frm2550m:txtTax13B').disabled = true;
        d.getElementById('frm2550m:txtTax14').disabled = true;
        d.getElementById('frm2550m:txtTax15').disabled = true;
        d.getElementById('frm2550m:txtTax17A').disabled = true;
        d.getElementById('frm2550m:txtTax17B').disabled = true;
        d.getElementById('frm2550m:txtTax17C').disabled = true;
        d.getElementById('frm2550m:txtTax17D').disabled = true;
        d.getElementById('frm2550m:txtTax17E').disabled = true;
        d.getElementById('frm2550m:txtTax18E').disabled = true;
        d.getElementById('frm2550m:txtTax18F').disabled = true;
        d.getElementById('frm2550m:txtTax18G').disabled = true;
        d.getElementById('frm2550m:txtTax18H').disabled = true;
        d.getElementById('frm2550m:txtTax18I').disabled = true;
        d.getElementById('frm2550m:txtTax18J').disabled = true;
        d.getElementById('frm2550m:txtTax18K').disabled = true;
        d.getElementById('frm2550m:txtTax18L').disabled = true;
        d.getElementById('frm2550m:txtTax18M').disabled = true;
        d.getElementById('frm2550m:txtTax18N').disabled = true;
        d.getElementById('frm2550m:txtTax18O').disabled = true;
        d.getElementById('frm2550m:txtTax20D').disabled = true;
        d.getElementById('frm2550m:txtTax20E').disabled = true;
        d.getElementById('frm2550m:txtTax23D').disabled = true;
        d.getElementById('frm2550m:txtTax23E').disabled = true;
		d.getElementById('frm2550m:txtTax23F').disabled = true;
        d.getElementById('frm2550m:txtTax25A').disabled = true;
        d.getElementById('frm2550m:txtTax25B').disabled = true;
        d.getElementById('frm2550m:txtTax25C').disabled = true;
        d.getElementById('btnSched1').disabled = true;
        d.getElementById('btnSched2').disabled = true;
        d.getElementById('btnSched3A').disabled = true;
        d.getElementById('btnSched3B').disabled = true;
        d.getElementById('btnSched4').disabled = true;
        d.getElementById('btnSched5').disabled = true;
        d.getElementById('btnSched6').disabled = true;
        d.getElementById('btnSched7').disabled = true;
        d.getElementById('btnSched8').disabled = true;
		disableElem;
		enableElem;

    }

    function enableAllControl() {
        d.getElementById('frm2550m:OptAmendedYN1').disabled = false;
        d.getElementById('frm2550m:OptAmendedYN2').disabled = false;
		d.getElementById('frm2550m:txtSheets').disabled = false;
		d.getElementById('frm2550m:txtTIN1').disabled = false;
		d.getElementById('frm2550m:txtTIN2').disabled = false;
		d.getElementById('frm2550m:txtTIN3').disabled = false;
		d.getElementById('frm2550m:txtBranchCode').disabled = false;
		d.getElementById('frm2550m:txtRDOCode').disabled = false;
		d.getElementById('frm2550m:txtLineBus').disabled = false;
		d.getElementById('frm2550m:txtTaxPayerName').disabled = false;
		d.getElementById('frm2550m:txtTelephoneNum').disabled = false;
		d.getElementById('frm2550m:txtAddress').disabled = false;
		d.getElementById('frm2550m:txtZipCode').disabled = false;
        d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm2550m:cmdEdit').disabled = true;
		d.getElementById('frm2550m:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;
        d.getElementById('frm2550m:cmdValidate').disabled = false;
        d.getElementById('frm2550m:RtnYear').disabled = false;
        d.getElementById('frm2550m:txtYear').disabled = false;
        d.getElementById('frm2550m:OptSpecialTax1').disabled = false;
        d.getElementById('frm2550m:OptSpecialTax2').disabled = false;
        if(d.getElementById('frm2550m:OptSpecialTax1').checked) {
            d.getElementById('frm2550m:lstSpecialTax').disabled = false;
        }
        d.getElementById('frm2550m:txtTax13A').disabled = false;
        d.getElementById('frm2550m:txtTax13B').disabled = false;
        d.getElementById('frm2550m:txtTax14').disabled = false;
        d.getElementById('frm2550m:txtTax15').disabled = false;
        d.getElementById('frm2550m:txtTax17A').disabled = false;
        d.getElementById('frm2550m:txtTax17B').disabled = false;
        d.getElementById('frm2550m:txtTax17C').disabled = false;
        d.getElementById('frm2550m:txtTax17D').disabled = false;
        d.getElementById('frm2550m:txtTax17E').disabled = false;
        d.getElementById('frm2550m:txtTax18E').disabled = false;
        d.getElementById('frm2550m:txtTax18F').disabled = false;
        d.getElementById('frm2550m:txtTax18G').disabled = false;
        d.getElementById('frm2550m:txtTax18H').disabled = false;
        d.getElementById('frm2550m:txtTax18I').disabled = false;
        d.getElementById('frm2550m:txtTax18J').disabled = false;
        d.getElementById('frm2550m:txtTax18K').disabled = false;
        d.getElementById('frm2550m:txtTax18L').disabled = false;
        d.getElementById('frm2550m:txtTax18M').disabled = false;
        d.getElementById('frm2550m:txtTax18N').disabled = false;
        d.getElementById('frm2550m:txtTax18O').disabled = false;
        d.getElementById('frm2550m:txtTax20D').disabled = false;
        d.getElementById('frm2550m:txtTax20E').disabled = false;
        d.getElementById('frm2550m:txtTax23D').disabled = false;
        d.getElementById('frm2550m:txtTax23E').disabled = false;
		d.getElementById('frm2550m:txtTax23F').disabled = false;
        d.getElementById('frm2550m:txtTax25A').disabled = false;
        d.getElementById('frm2550m:txtTax25B').disabled = false;
        d.getElementById('frm2550m:txtTax25C').disabled = false;
        d.getElementById('btnSched1').disabled = false;
        d.getElementById('btnSched2').disabled = false;
        d.getElementById('btnSched3A').disabled = false;
        d.getElementById('btnSched3B').disabled = false;
        d.getElementById('btnSched4').disabled = false;
        d.getElementById('btnSched5').disabled = false;
        d.getElementById('btnSched6').disabled = false;
        d.getElementById('btnSched7').disabled = false;
        d.getElementById('btnSched8').disabled = false;

        optAmendFunc();
		if (qs('xmlFileName') != null && qs('xmlFileName').indexOf('.xml') > -1) {
			d.getElementById('frm2550m:RtnYear').disabled = true;
			d.getElementById('frm2550m:txtYear').disabled = true;	
		}
		disableElem;
		enableElem;
		document.getElementById('frm2550m:txtTIN1').disabled = true; document.getElementById('frm2550m:txtTIN2').disabled = true; document.getElementById('frm2550m:txtTIN3').disabled = true; document.getElementById('frm2550m:txtBranchCode').disabled = true;
    }
	
	function getRdo()
    {
        var data = "<select class='iceSelOneMnu' id='frm2550m:txtRDOCode' name='frm2550m:txtRDOCode' size='1' ><option value='000'> </option>";
		
	  for(var i = 0; i < rdoList.length; i++) {
				var rdo = rdoList[i];
				data = data + "<option value='" + rdo.rdoCode + "'>" + rdo.description + "</option>";
	   
			}
	  data = data + "</select>"
	  
	  $('#rdoSelect').html(data);  
  
    }


    function blockletterWithout2Decimal(e)
    {
        var number = parseFloat(e.value);
        if(isNaN(number))
        {
            e.value = "";
        } else {
            e.value = '' + number.toFixed(0);
        }
    }
	
	function initialValidateBeforeSave() {
				if( (d.getElementById('frm2550m:txtTIN1').value == "" || d.getElementById('frm2550m:txtTIN2').value == "" || d.getElementById('frm2550m:txtTIN3').value == "" || d.getElementById('frm2550m:txtBranchCode').value == "")  )
				{
					alert("Please enter a valid TIN number on Item 4.");
					return false;
				}		
				if ((d.getElementById('frm2550m:txtRDOCode').value == "000")) {
				    alert("Please enter a valid RDO Code on Item 5.");
				    return false;
				}
				if( (d.getElementById('frm2550m:txtTaxPayerName').value == "")  )
				{
					alert("Please enter a valid Taxpayer Name on Item 7.");
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

	$('#bg').hide(); //720px
	$('.printSignFooterClass').css({ 'width':'760px','margin':'auto','margin-top':'15px','display':'block','position':'relative','overflow':'visible','page-break-before':'avoid', 'background':'#ffffff' });	
	$('.imgClass').css({ 'margin':'auto','display':'block','position':'relative','overflow':'visible' });
	
	$('#formPaper').css({'font-size': '75% !important','border':'#000 3px solid', 'margin-top': '-40px'});
    $('#wrapper').css({'font-size': '75% !important'});
    $('#container').css({'font-size': '75% !important'});   	
	
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
                 document.getElementById(elem[i].id).style.height="16px";
				document.getElementById(elem[i].id).disabled = false;
				document.getElementById(elem[i].id).style.color = '#000000';
			}				
			if (elem[i].type == 'radio' || elem[i].type == 'checkbox') { 
				if (document.getElementById(elem[i].id).disabled) {
					disabledItems[x] = elem[i].id;
					x++;
				}
				document.getElementById(elem[i].id).disabled = true;
				document.getElementById(elem[i].id).style.height="10px";
				document.getElementById(elem[i].id).style.fontSize="8px";
			}
			if(elem[i].type == 'select-one'){
				$( elem[i] ).hide();
				if(elem[i].options[elem[i].selectedIndex] != undefined){
                        var label = "<span>"+ elem[i].options[elem[i].selectedIndex].innerHTML +"&nbsp;</span>";
                        $(elem[i]).after(label);
                }
			}
		}
    }
    	
	$('#modalSched1').css({'left': '0%', 'border': '1px solid #fff','min-height': '250px', 'margin-top': '500px' }); 
    $('#modalSched2').css({'left': '0%', 'border': '1px solid #fff', 'width': '850px', 'min-height': '250px'});  
    $('#modalSched3').css({'left': '0%', 'border': '1px solid #fff', 'width': '850px', 'min-height': '250px'}); 
    $('#modalSched4').css({'left': '0%', 'border': '1px solid #fff', 'padding': '0px', 'min-height': '250px', 'margin-top': '500px'}); 
    $('#modalSched5').css({'left': '0%', 'border': '1px solid #fff', 'padding': '0px', 'min-height': '250px'}); 
    $('#modalSched6').css({'left': '0%', 'border': '1px solid #fff', 'padding': '0px', 'min-height': '250px'}); 
    $('#modalSched7').css({'left': '0%', 'border': '1px solid #fff', 'padding': '0px', 'min-height': '250px'});  
    $('#modalSched8').css({'left': '0%', 'border': '1px solid #fff', 'padding': '0px', 'min-height': '250px', 'margin-top': '200px'}); 

    $('.printButtonClass').hide();
    $("#formPaper").show();
    
    window.print();

    $('#formPaper').css({'border':'#000 1px solid', 'margin-top': '0px' });
    $('.printButtonClass').show();
    $('.imgClass').css({'display': 'none' });
    $('#modalSched1').css({'display': 'none', 'margin-top': '0px' }); 

    $('#modalSched2').css({'display': 'none' }); 
    $('#modalSched3').css({'display': 'none' }); 
    $('#modalSched4').css({'display': 'none', 'margin-top': '0px' }); 
    $('#modalSched5').css({'display': 'none' });  
    $('#modalSched6').css({'display': 'none' }); 
    $('#modalSched7').css({'display': 'none' }); 
    $('#modalSched8').css({'display': 'none', 'margin-top': '0px' });

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
                save('2550M',data);
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
        saveAndExit('2550M',data);
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

        submitAndSave('2550M', data, company_id);
        
        disabled.attr('disabled','disabled');
        return false;
    }

    function gotoMain(){
        var company_id = $('#frmMain').find('input[name="company"]').val();
        window.location = '/companies/'+ company_id +'/histories/2550M';
    }
</script>
@endsection
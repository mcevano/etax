@extends('layouts.app')
@section('title', '| BIR Form No. 1702-RT')

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
                    <button type="button" class="btn btn-danger btn-exit" id="1702RT" company='{{$company->id}}'>No</button>
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
                    <button type="button" class="btn btn-success btn-exit" id="1702RT" company='{{$company->id}}'>Okay</button>
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
                        <button type="button" class="btn btn-danger btn-filing-success" form='1702RT' company='{{$company->id}}'>Okay</button>
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
	        <div id="wrapper" style="margin: 0 auto; position: relative; width: 949px;">
	            <table border="0" cellspacing="0" width="826px" cellpadding="0" align="center">
	                <tr>
	                    <td>
	                        <div id="formPaper">
	                            <div id="containerPage">
	                                <!--Page 1-->
	                                <div id="Page1Content" style="display:block;">
	                                    <table style="width:826px;">
	                                        <tr>
	                                            <td>
	                                               <table cellpadding="0" cellspacing="0">											
														<tr style="background-color: white;">
															<td style="width: 7%;">
																<label>For BIR<br />Use Only</label>
															</td>
															<td style="width: 7%;">
																<label>BCS/<br />Item</label>
															</td>
															<td valign="bottom" align="right">
	                                                           <div style="float: right" > 
	                                                           <img alt="" src="{{ asset('images/1702RT_BarCode/1702-RT06_13P1.png') }}" style="height:35px; width:250px" />
	                                                           <br />                                                 
	                                                           <span class="xsmallBold">1702-RT06/13P1</span>
	                                                           </div>
	                                                        </td>
														</tr>
													</table>
	                                                <table class="FormHeader" style="border: 1px solid">
	                                                    <tr>
	                                                        <td class="FormHeaderLogo" style="border-right-color: White;"><img src="{{ asset('images/birflog.gif') }}" alt="birlogo" style="height:50px"/></td> 
	                                                        <td align="left" style="width: 168px;border-right: 1px solid;">
	                                                             <label class="small" style="font-weight:bold;">Republika ng Pilipinas</label></br>
	                                                             <label class="small" style="font-weight:bold;">Kagawaran ng Pananalapi</label></br>
	                                                             <label class="small" style="font-weight:bold;">Kawanihan ng Rentas</label></br>
				                                                 <label class="small" style="font-weight:bold;">Internas</label>
	                                                        </td>
	                                                        <td class="text-center">
	                                                            <span class="FormHeader1" style="font-weight:bold;">
	                                                                Annual Income Tax Return</span><br/>
	                                                            <span class="FormHeader2" style="font-weight:bold;">
	                                                                For Corporation, Partnership and Other Non-Individual<br/>
	                                                                Taxpayer Subject Only to REGULAR Income Tax Rate</span>
	                                                               <label style="font-style:italic;"> Enter all required information in CAPITAL LETTERS. Mark applicable boxes
	                                                                with an "X".<br/>
	                                                                Two copies MUST be filled with the BIR and one held by the
	                                                                taxpayers.</label>
	                                                        </td>
	                                                        <td style="border-right: 1px solid;">
	                                                            <label class="FormHeader2">BIR Form No.<br/></label>
	                                                            <label class="FormHeader1" style="font-weight:bold;">1702-RT</label><br/>
	                                                            <label class="FormHeader2">June 2013</label><br/>
	                                                            <label class="FormHeader2" style="font-weight:bold;">Page 1</label>
	                                                        </td>
	                                                    </tr>
	                                                </table>
	                                            </td>
	                                        </tr>
	                                        <tr>
	                                            <td>
	                                                <table cellpadding=0 cellspacing=0 class="tblForm">
	                                                    <tr>
	                                                        <td class="tblFormTd" style="width:30%;" valign="top">
	                                                            <table border=0 cellpadding=0 cellspacing=0>
	                                                                <tr>
	                                                                    <td>
	                                                                        <label class="smallBold">1</label>
	                                                                        <label class="small">For</label>
																		</td>
																		<td>
	                                                                        <input id="frm1702RT:rdoPg1I1Calendar" name="frm1702RT:rdoPg1I1" type="radio" class="styled"
	                                                                            value="C" onclick="checkFilingYear()" checked="checked"/>
	                                                                        <label for="frm1702RT:rdoPg1I1Calendar">Calendar</label>
																		</td>
	                                                                    <td>
	                                                                        <input id="frm1702RT:rdoPg1I1Fiscal" name="frm1702RT:rdoPg1I1" type="radio" class="styled"
	                                                                            value="F" onclick="checkFilingYear()"/>
	                                                                        <label for="rm1702RT:rdoPg1I1Fiscal">Fiscal</label>
	                                                                    </td>
	                                                                </tr>
	                                                                </table>
	                                                            <table border=0 cellpadding=0 cellspacing=0>
	                                                                <tr>
	                                                                    <td class="smallBold">2</td>
	                                                                    <td class="small">Year Ended (MM/20YY)</td>
	                                                                </tr>
	                                                            </table>
	                                                                <!-- R3:N2 -->
	                                                            <table border=0 cellpadding=0 cellspacing=0>
	                                                                <tr>
	                                                                    <td class="smallBold">&nbsp</td>
	                                                                    <td>
	                                                                        <select id="frm1702RT:ddlPg1I2Month" name="frm1702RT:ddlPg1I2Month" style="width:40px" onchange="validateYearEnd();">
	                                                                            <option value=""></option>
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
	                                                                            <option value="12" selected="selected">12 - December</option>
	                                                                        </select>
	                                                                        <span class="smallBold">20</span>
	                                                                        <input id="frm1702RT:txtPg1I2Year" maxlength="2" name="frm1702RT:txtPg1I2Year" 
	                                                                            size="2" style="text-align:center" type="text" onblur="validateYearEnd()"/>
	                                                                    </td>
	                                                                </tr>
	                                                            </table>
	                                                        </td>
	                                                        <td class="tblFormTd" style="width:20%;" valign="top">
	                                                            <table>
	                                                                <tr>
	                                                                    <td colspan="2" class="Content">
	                                                                        <span class="ContentBold">3</span> <span class="xsmall">Amended Return?</span>
	                                                                    </td>
	                                                                </tr>
	                                                                <tr>
	                                                                    <td>
	                                                                        <input id="frm1702RT:rdoPg1I2AmmendYes" name="frm1702RT:rdoPg1I2Ammend" type="radio" class="styled"
	                                                                            value="Y" onclick="checkFilingYear()"/>
	                                                                        <label for="frm1702RT:rdoPg1I2AmmendYes">Yes</label>
																		</td>
																		<td>
																			<input checked="checked" id="frm1702RT:rdoPg1I2AmmendNo" name="frm1702RT:rdoPg1I2Ammend"
																				type="radio" class="styled" value="N" onclick="checkFilingYear()"/>
																			<label for="frm1702RT:rdoPg1I2AmmendNo">No</label>
	                                                                    </td>
	                                                                </tr>
	                                                            </table>
	                                                        </td>
	                                                        <td class="tblFormTd" valign="top"style="width:20%;">
	                                                            <table>
	                                                                <tr>
	                                                                    <td colspan="2" class="Content">
	                                                                        <span class="ContentBold">4</span> <span class="xsmall">Short Period Return</span>
	                                                                    </td>
	                                                                </tr>
	                                                                <tr>
	                                                                    <td>
	                                                                        <input id="frm1702RT:rdoPg1I4ShortPeriodYes" name="frm1702RT:rdoPg1I4ShortPeriod"
	                                                                            type="radio" class="styled" value="Y" onclick="shortPeriodReturnYes()"/>
	                                                                        <label for="frm1702RT:rdoPg1I4ShortPeriodYes">Yes</label>
																			</td>
																			<td>
	                                                                        <input checked="checked" id="frm1702RT:rdoPg1I4ShortPeriodNo" name="frm1702RT:rdoPg1I4ShortPeriod"
	                                                                            type="radio" class="styled" value="N" onclick="checkFilingYear()"/>
	                                                                        <label for="frm1702RT:rdoPg1I4ShortPeriodNo">No</label>
	                                                                    </td>
	                                                                </tr>
	                                                            </table>
	                                                        </td>
	                                                        <td class="tblFormTd" valign="top"style="width:30%;">
	                                                            <table class="RowSubTable">
	                                                                <tr>
	                                                                    <td class="Content">
	                                                                        <span class="ContentBold">5</span> <span class="xsmall">Alphanumeric Tax Code (ATC)</span>
	                                                                    </td>
	                                                                </tr>
	                                                                <tr>
	                                                                    <td>
	                                                                        <table class="RowSubTable">
	                                                                            <tr>
	                                                                                <td>
	                                                                                    <label for="frm1702RT:rdoPg1I5ATCR1">
	                                                                                        IC 055–Minimum Corporate Income Tax(MCIT)</label>
	                                                                                </td>
	                                                                                <td>
	                                                                                    <input id="frm1702RT:rdoPg1I5Atc" name="frm1702RT:rdoPg1I5Atc" value="IC055" 
	                                                                                        type="radio" class="styled" onclick="atc()" disabled="disabled"/>
	                                                                                </td>
	                                                                            </tr>
	                                                                            <tr>
	                                                                                <td>
	                                                                                    <select id="frm1702RT:drpPg1I5AtcOther" name="frm1702RT:drpPg1I5AtcOther" style="width: 100%; font-size: smaller">
	                                                                                        <option value="IC010" selected="selected">IC010 - CORPORATION IN GENERAL - JAN 1, 2009</option>
																							<option value="IC020">IC020 - TAXABLE PARTNERSHIP - JAN 1, 2009</option>
																							<option value="IC040">IC040 - GOVERNMENT ENTITY - JAN 1, 2009</option>
																							<option value="IC041">IC041 - NATIONAL GOV'T.& LGU's - JAN 1, 2009</option>
																							<option value="IC070">IC070 - RESIDENT FOREIGN CORPORATION IN GENERAL - JAN 1, 2009</option>
	                                                                                    </select>
	                                                                                </td>
	                                                                                <td>
	                                                                                    <input id="frm1702RT:rdoPg1I5AtcOther" name="frm1702RT:rdoPg1I5Atc_Other" type="radio" value="on" class="styled" onclick="atcOthers()"/>
	                                                                                </td>
	                                                                            </tr>
	                                                                        </table>
	                                                                    </td>
	                                                                </tr>
	                                                            </table>
	                                                        </td>
	                                                    </tr>
	                                                    </table>
	                                                    <table border=0 cellpadding=0 cellspacing=0 class="tblForm">
	                                                    <tr>
	                                                        <td class="tblFormTd" colspan="5">
	                                                            <table class="ContentHeader">
	                                                                <tr>
	                                                                    <td style="width: 100%; border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
	                                                                        Part I - Background Information
	                                                                    </td>
	                                                                </tr>
	                                                            </table>
	                                                        </td>
	                                                    </tr>
	                                                    <tr>
	                                                        <td class="tblFormTd" colspan="3">
	                                                            <table class="noCellSpace">
	                                                                <tr>
	                                                                    <td class="small"><span class="smallBold">6</span>
	                                                                        Tax Identification Number (TIN)</td>
	                                                                    <td>
	                                                                        <input disabled="true" id="frm1702RT:txtPg1Pt1I6TIN1" maxlength="3" 
	                                                                            name="frm1702RT:txtTIN1" size="4" type="text" value="{{$company->tin1}}" style="text-align:center"/>
	                                                                        <span class="mediumBold">-</span>
	                                                                        <input disabled="disabled" id="frm1702RT:txtPg1Pt1I6TIN2" maxlength="3" 
	                                                                            name="frm1702RT:txtTIN2" size="4" type="text" value="{{$company->tin2}}" style="text-align:center"/>
	                                                                        <span class="mediumBold">-</span>
	                                                                        <input disabled="disabled" id="frm1702RT:txtPg1Pt1I6TIN3" maxlength="3" 
	                                                                            name="frm1702RT:txtTIN3" size="4" type="text" value="{{$company->tin3}}" style="text-align:center"/>
	                                                                        <span class="mediumBold">-</span>
	                                                                        <input disabled="disabled" id="frm1702RT:txtPg1Pt1I6TIN4" maxlength="3" 
	                                                                            name="frm1702RT:txtTIN4" size="4" type="text" value="{{$company->tin4}}" style="text-align:center; display:none;"/>
	                                                                        <input id="BranchMaskP1" name="BranchMaskP1" value="0000" size="4" disabled="disabled" style="text-align:center" />
	                                                                    </td>
	                                                                </tr>
	                                                            </table>
	                                                        </td>
	                                                        <td class="tblFormTd" colspan="2">
	                                                            <table>
	                                                                <tr>
	                                                                    <td class="small"><span class="smallBold">7</span>
	                                                                        RDO Code &nbsp
	                                                                        <span style="display:none;">
	                                                                        <input type="text" id="frm1702RT:txtPg1Pt1I7RDO" disabled="disabled" style="display: none;"/>
	                                                                        </span>
	                                                                        <div id="rdoContainer">
	                                                                        	<select id='frm1702RT:drpPg1Pt1I7RDOCode' name='frm1702RT:drpPg1Pt1I7RDOCode' size='1'>
	                                                                        		<option value='{{$company->rdo_code}}'>{{$company->rdo_code}}</option>
	                                                                        	</select>
	                                                                        </div>
	                                                                        </select>
	                                                                    </td>
	                                                                </tr>
	                                                            </table>
	                                                        </td>
	                                                    </tr>
	                                                    <tr>
	                                                        <td class="tblFormTd" colspan="5">
	                                                            <table>
	                                                                <tr>
	                                                                    <td class="small"><span class="smallBold">8</span>
	                                                                        Date of Incorporation/Organization
	                                                                        <span class="smallItalic">MM/DD/YYYY</span>
	                                                                    </td>
	                                                                    <td>
	                                                                    <input id="frm1702RT:txtPg1Pt1I8" maxlength="10" 
	                                                                            name="frm1702RT:Month" size="20" style="text-align: center;" 
	                                                                            title="Please supply a date." type="text" value="" 
	                                                                            onblur="checkDateOfIncorporation(false)" onkeypress="dateMasking(this); return wholenumber(event, false);"/>
	                                                                        </td>
	                                                                </tr>
	                                                            </table>
	                                                        </td>
	                                                    </tr>
	                                                    <tr>
	                                                        <td class="tblFormTd" colspan="5">
	                                                            <table>
	                                                                <tr>
	                                                                    <td class="small"><span class="smallBold">9</span>
	                                                                        Registered Name
	                                                                    </td>
	                                                                </tr>
	                                                                <tr>
	                                                                    <td colspan="4">
	                                                                        <input id="frm1702RT:txtPg1Pt1I9Name" 
	                                                                            name="frm1702RT:txtRegisteredName" size="130" type="text" value="{{$company->registered_name}}" maxlength="62" 
	                                                                            disabled="disabled" onkeypress="return Name(this, event);" onblur="populateAllNames(); capitalize(this)"/>
	                                                                    </td>
	                                                                </tr>
	                                                            </table>
	                                                        </td>
	                                                    </tr>
	                                        
	                                                    <tr>
	                                                        <td class="tblFormTd" colspan="5">
	                                                            <table>
	                                                                <tr>
	                                                                    <td class="small"><span class="smallBold">10
	                                                                        </span>Registered Address
	                                                                        <i>(Indicate complete registered address)</i>
	                                                                    </td>
	                                                                </tr>
	                                                                <tr>
	                                                                    <td colspan="4">
	                                                                        <input id="frm1702RT:txtPg1Pt1I10Address" 
	                                                                            name="frm1702RT:txtPg1Pt1I10Address" value="{{$company->address}}" size="130" type="text" maxlength="62" 
	                                                                            onblur="capitalize(this)" onkeypress="return Address(this, event);" disabled="disabled"/>
	                                                                        <input type="text" id="frm1702RT:txtZIP" name="frm1702RT:txtZIP" value="{{$company->zip_code}}" disabled="disabled" style="display: none;" />
	                                                                    </td>
	                                                                </tr>
	                                                            </table>
	                                                        </td>
	                                                    </tr>
	                                                    <tr>
	                                                        <td class="tblFormTd" colspan="2">
	                                                            <table>
	                                                                <tr>
	                                                                    <td class="small"><span class="smallBold">11
	                                                                        </span>Contact Number</td>
	                                                                </tr>
	                                                                <tr>
	                                                                    <td>
	                                                                        <input id="frm1702RT:txtPg1Pt1I11Contact" 
	                                                                            name="frm1702RT:txtPg1Pt1I11Contact" size="40" type="text" maxlength="20" 
	                                                                            onkeypress="return wholenumber(this, event)" value="{{$company->tel_number}}" disabled="disabled"/>
	                                                                    </td>
	                                                                </tr>
	                                                            </table>
	                                                        </td>
	                                                        <td class="tblFormTd" colspan="3">
	                                                            <table>
	                                                                <tr>
	                                                                    <td><span class="smallBold">12</span>
	                                                                        <span class="smallBold">Email Address</span></td>
	                                                                </tr>
	                                                                <tr>
	                                                                    <td>
	                                                                        <input align="left" id="frm1702RT:txtPg1Pt1I12Email" 
	                                                                            name="frm1702RT:txtPg1Pt1I12Email" value="{{$company->email_address}}" onkeypress="return emailAddress(this, event);" style="width:99%" type="text" maxlength="100"  disabled="disabled"
	                                                                            onblur="validateEmail()"/>
	                                                                    </td>
	                                                                </tr>
	                                                            </table>
	                                                        </td>
	                                                    </tr>
	                                                    <tr>
	                                                        <td class="tblFormTd" colspan="3">
	                                                            <table>
	                                                                <tr>
	                                                                    <td><span class="smallBold">13</span>
	                                                                    <span class="smallBold">Main Line of Business</span></td>
	                                                                </tr>
	                                                                <tr>
	                                                                    <td colspan="4">
	                                                                        <input id="frm1702RT:txtPg1Pt1I13Business" 
	                                                                            name="frm1702RT:txtPg1Pt1I13Business" style="width:99%" type="text" 
	                                                                            onblur="capitalize(this)" value="{{$company->line_business}}" maxlength="44" disabled="disabled"/>
	                                                                    </td>
	                                                                </tr>
	                                                            </table>
	                                                        </td>
	                                                        <td class="tblFormTd" colspan="1">
	                                                            <table>
	                                                                <tr>
	                                                                    <td><span class="smallBold">14</span>
	                                                                    <span class="smallBold">PSIC Code</span></td>
	                                                                </tr>
	                                                                <tr>
	                                                                    <td>
	                                                                        <input id="frm1702RT:txtPg1Pt1I14PSIC" 
	                                                                            name="frm1702RT:txtPg1Pt1I14PSIC" onkeypress="return wholenumber(this, event)" style="width:50%;text-align:center" type="text" maxlength="4" 
	                                                                            onblur="capitalize(this); validatePSIC();"/>
	                                                                    </td>
	                                                                </tr>
	                                                            </table>
	                                                        </td>
	                                                    </tr>
	                                                    <tr>
	                                                        <td class="tblFormTd" colspan="4">
	                                                            <table width="100%" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
	                                                                <tr>
	                                                                    <td class="smallBold">15</td>
	                                                                    <td class="small" colspan="2">Method of Deductions</td>
	                                                                    <td colspan="3">
	                                                                        <table width="100%">
	                                                                            <tr>
	                                                                                <td style="width:45%">
	                                                                                    <input id="frm1702RT:rdoPg1Pt1I15ItemizedDeduction" 
	                                                                                        name="frm1702RT:rdoPg1Pt1I15ItemizedDeduction" 
	                                                                                        onclick="methodOfDeductionsItemized()" type="radio" class="styled" 
	                                                                                        checked="checked"/>
	                                                                                    <span class="xsmall">Itemized Deductions [Section 34 (A-J), NIRC]</span>
	                                                                                </td>
	                                                                                <td>
	                                                                                    <table>
	                                                                                        <tr>
	                                                                                            <td>
	                                                                                                <input id="frm1702RT:rdoPg1Pt1I15OptionalStandard" 
	                                                                                                    name="frm1702RT:rdoPg1Pt1I15OptionalStandard" 
	                                                                                                    onclick="methodOfDeductionsOptional()"  type="radio" class="styled"/>
	                                                                                            </td>
	                                                                                            <td>
	                                                                                                <span class="xsmall">&nbsp Optional Standard Deduction (OSD) - 40% of
	                                                                                                    Gross Income [Section<br/>&nbsp
	                                                                                                34(L), NIRC as amended by RA No. 9504]</span>
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
	                                                        <td class="tblFormTd" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;" colspan="5">
	                                                            <table style="width:100%;">
	                                                                <tr class="center">
	                                                                    <td style="width:65%; text-indent:330px"><span class="smallBold">Part II - Total Tax
	                                                                        Payable</span></td>
	                                                                    <td style="width:35%; text-align:center"><span class="smallBold smallerItalic">(Do NOT enter
	                                                                        Centavos)</span></td>
	                                                                </tr>
	                                                            </table>
	                                                        </td>
	                                                    </tr>
	                                                    <tr>
	                                                        <td class="tblFormTd" colspan="5">
	                                                            <table style="width:100%;">
	                                                                <tr>
	                                                                    <td style="width:65%">
	                                                                        <span class="smallBold">16</span>
	                                                                        <span class="small">Total Income Tax Due (Overpayment)</span>
	                                                                        <a href="#" onclick="goTo(2)" class="smallBold xxsmallItalic">(From Part IV Item 44)</a>
	                                                                    </td style="width:35%">
	                                                                    <td class="right"><input disabled="disabled" id="frm1702RT:txtPg1Pt2I16IncomeTax" 
	                                                                            name="frm1702RT:txtPg1Pt2I16IncomeTax" size="40" type="text" 
	                                                                            style="text-align:right" maxlength="12" value="0"/></td>
	                                                                </tr>
	                                                            </table>
	                                                        </td>
	                                                    </tr>
	                                                    <tr>
	                                                        <td class="tblFormTd" colspan="5">
	                                                            <table style="width:100%;">
	                                                                <tr>
	                                                                    <td style="width:65%">
	                                                                        <span class="smallBold">17</span>
	                                                                        <span class="small">Less: Total Tax Credits/Payments</span>
	                                                                        <a href="#" onclick="goTo(2)" class="smallBold xxsmallItalic" name="navButton">(From Part IV Item 45)</a>
	                                                                        
	                                                                    </td>
	                                                                    <td style="width:35%" class="right">
	                                                                        <input disabled="disabled" 
	                                                                            id="frm1702RT:txtPg1Pt2I17TotalTaxCredits" 
	                                                                            name="frm1702RT:txtPg1Pt2I17TotalTaxCredits" size="40" type="text" 
	                                                                            maxlength="12" style="text-align: right" value="0"/></td>
	                                                                </tr>
	                                                            </table>
	                                                        </td>
	                                                    </tr>
	                                                    <tr>
	                                                        <td class="tblFormTd" colspan="5">
	                                                            <table style="width:100%;">
	                                                                <tr>
	                                                                    <td style="width:65%">
	                                                                        <span class="smallBold">18</span>
	                                                                        <span class="small">Net Tax Payable (Overpayment) </span>
	                                                                        <span class="xsmallItalic">(Item 16 Less than Item 17)</span>
	                                                                    	<a href="#" onclick="goTo(2)" class="smallBold xxsmallItalic" name="navButton">(From Part IV Item 46)</a>
	                                                                    </td>
	                                                                    <td style="width:35%" class="right"><input disabled="disabled" id="frm1702RT:txtPg1Pt2I18NetTax" 
	                                                                            name="frm1702RT:txtPg1Pt2I18NetTax" size="40" type="text" maxlength="12" 
	                                                                            style="text-align: right" value="0"/></td>
	                                                                </tr>
	                                                            </table>
	                                                        </td>
	                                                    </tr>
	                                                    <tr>
	                                                        <td class="tblFormTd" colspan="5">
	                                                            <table style="width:100%;">
	                                                                <tr>
	                                                                    <td style="width:65%">
	                                                                        <span class="smallBold">19</span>
	                                                                        <span class="small">Add: Total Penalties</span>
	                                                                        <a href="#" onclick="goTo(2)" class="smallBold xxsmallItalic" name="navButton">(From Part IV Item 50)</a>
	                                                                    </td>
	                                                                    <td style="width:35%" class="right">
	                                                                        <input disabled="disabled" 
	                                                                            id="frm1702RT:txtPg1Pt2I19TotalPenalties" 
	                                                                            name="frm1702RT:txtPg1Pt2I19TotalPenalties" size="40" type="text" 
	                                                                            maxlength="12" style="text-align: right" value="0"/></td>
	                                                                </tr>
	                                                            </table>
	                                                        </td>
	                                                    </tr>
	                                                    <tr>
	                                                        <td class="tblFormTd" colspan="5">
	                                                            <table style="width:100%;">
	                                                                <tr>
	                                                                    <td style="width:65%">
	                                                                        <span class="smallBold">20</span>
	                                                                        <span class="smallBold">TOTAL AMOUNT PAYABLE (Overpayment)</span>
	                                                                        <span class="xsmallItalic">(Sum of Item 18 and 19)</span>
	                                                                    	<a href="#" onclick="goTo(2); window.scrollTo(0, 300);" class="smallBold xxsmallItalic" name="navButton">(From Part IV Item 51)</a>
	                                                                    </td>
	                                                                    <td style="width:35%" class="right"><input disabled="disabled" id="frm1702RT:txtPg1Pt2I20TotalAmount" 
	                                                                            name="frm1702RT:txtPg1Pt2I20TotalAmount" size="40" type="text" 
	                                                                            maxlength="12" style="text-align: right" value="0"/></td>
	                                                                </tr>
	                                                            </table>
	                                                        </td>
	                                                    </tr>
	                                                    <tr>
	                                                        <td class="tblFormTd" colspan="5">
	                                                            <table>
	                                                                <tr>
	                                                                    <td class="tblFormTd" colspan="5">
	                                                                        <table>
	                                                                            <tr>
	                                                                                <td colspan="4">
	                                                                                    <span class="smallBold">21</span>
	                                                                                    <span class="small">If Overpayment, mark "X" one box only
	                                                                                        <i>(Once the choice is made, the same is irrevocable)</i></span>
	                                                                                </td>
	                                                                            </tr>
	                                                                            <tr class="small">
	                                                                                <td style="width:20px;"></td>
	                                                                                <td><input id="frm1702RT:rdoPg1Pt2I21OverpaymentRefunded" 
	                                                                                        name="frm1702RT:rdoPg1Pt2I21OverpaymentRefunded" type="radio" 
	                                                                                        class="styled" onclick="untickRefunded()"/>To
	                                                                                    be refunded</td>
	                                                                                <td><input id="frm1702RT:rdoPg1Pt2I21OverpaymentIssued" 
	                                                                                        name="frm1702RT:rdoPg1Pt2I21OverpaymentIssued" type="radio" 
	                                                                                        class="styled" onclick="untickIssued()"/>To
	                                                                                    be issued a Tax Credit Certificate (TCC)</td>
	                                                                                <td><input id="frm1702RT:rdoPg1Pt2I21OverpaymentCarried" 
	                                                                                        name="frm1702RT:rdoPg1Pt2I21OverpaymentCarried" type="radio" 
	                                                                                        class="styled" onclick="untickCarried()"/>To
	                                                                                    be carried over as a tax credit for next year/quarter</td>
	                                                                            </tr>
	                                                                        </table>
	                                                                    </td>
	                                                                </tr>
	                                                            </table>
	                                                        </td>
	                                                    </tr>
	                                                    <tr>
	                                                        <td class="tblFormTd" colspan="5">
	                                                            <table style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
	                                                                <tr>
	                                                                    <td colspan="4" style="border-bottom:1px solid #000000">
	                                                                        <span class="xxsmall">We declare under the penalties of perjury, that this annual return
	                                                                            has been made in good faith, verified by us, and to the best of our knowledge and belief,
	                                                                            is true and correct pursuant to the provisions of the National Internal Revenue
	                                                                            Code, as amended, and the regulations issued under authority thereof.</span>
	                                                                        <span class="xxsmallItalic">(If Authorized Representative, attach authorization letter and
	                                                                            indicate TIN)</span>
	                                                                    </td>
	                                                                </tr>
	                                                                <tr>
	                                                                    <td align="center" class="tblFormTd" style="width: 50%;">
	                                                                        <br />
	                                                                        <input id="frm1702RT:txtSignaturePresident" name="frm1702RT:txtSignaturePresident" style="width:99%" type="text" maxlength="75" onblur="capitalize(this)" disabled="disabled"/>
	                                                                    </td>
	                                                                    <td align="center" class="tblFormTd" style="width: 50%;">
	                                                                        <br />
	                                                                        <input id="frm1702RT:txtSignatureTreasurer" name="frm1702RT:txtSignatureTreasurer" style="width:99%" type="text" maxlength="75" onblur="capitalize(this)" disabled="disabled"/>
	                                                                    </td>
	                                                                </tr>
	                                                                <tr>
	                                                                    <td style="width: 50%; text-align: center;" class="tblFormTd">
	                                                                        <span class="xxsmall">Signature over printed name of President/Principal Officer/Authorized
	                                                                            Representative</span>
	                                                                    </td>
	                                                                    <td style="width: 50%; text-align: center;" class="tblFormTd">
	                                                                        <span class="xxsmall">Signature over printed name of Treasurer/Assistant Treasurer</span>
	                                                                    </td>
	                                                                </tr>
	                                                                <tr>
	                                                                    <td class="tblFormTd">
	                                                                        <span class="small">
	                                                                            Title of Signatory
	                                                                            <input id="frm1702RT:txtPg1Pt2Signatory" 
	                                                                            name="frm1702RT:txtPg1Pt2Signatory" style="width:99%" type="text" maxlength="26" onkeypress="return Name(this, event);" onblur="capitalize(this)"  disabled="disabled"/>
	                                                                        </span>
	                                                                    </td>
	                                                                    <td class="tblFormTd">
	                                                                        <div style="text-align:center;">
	                                                                            <span class="small">
	                                                                                Number of pages filed&nbsp
	                                                                                <input id="frm1702RT:txtPg1Pt2PagesFilled" 
	                                                                                name="frm1702RT:txtPg1Pt2PagesFilled" size="10" type="text" maxlength="2" 
	                                                                                onkeypress="return wholenumber(this, event)" value="8" 
	                                                                                style="text-align:center" disabled="disabled"/>
	                                                                            </span>
	                                                                        </div>
	                                                                    </td>
	                                                                </tr>
	                                                            </table>
	                                                        </td>
	                                                    </tr>
	                                                    <tr>
	                                                        <td class="tblFormTd" colspan="5">
	                                                            <table width="100%">
	                                                                <tr>
	                                                                    <td colspan="3" style="width:70%;">
	                                                                        <table style="padding: 0px; margin: 0px; border: 0px; cell-spacing: 0px;">
	                                                                            <tr>
	                                                                                <td>
	                                                                                    <span class="smallBold">22</span>
	                                                                                </td>
	                                                                                <td>
	                                                                                    <input type="radio" id="frm1702RT:rdoPg1Pt2I22CTC" value="CTC" name="frm1702RT:rdoPg1Pt2I22" class="styled"
			                                                                            onclick="validatePg1Pt2I22(false);" />
	                                                                                </td>
	                                                                                <td>
	                                                                                    <label for="frm1702RT:rdoPg1Pt2I22CTC" class="xsmall">Community Tax Certificate(CTC) Number</label>
	                                                                                </td>
	                                                                                <td>
	                                                                                    <input type="radio" id="frm1702RT:rdoPg1Pt2I22SEC" value="SEC" name="frm1702RT:rdoPg1Pt2I22" class="styled" onclick="validatePg1Pt2I22(false);" />
	                                                                                </td>
	                                                                                <td>
	                                                                                    <label for="frm1702RT:rdoPg1Pt2I22SEC" class="xsmall">SEC Reg No.</label>
	                                                                                </td>
	                                                                                <td>
	                                                                                    <input id="frm1702RT:txtPg1Pt2I22CTC" maxlength="10" 
	                                                                                    name="frm1702RT:txtPg1Pt2I22CTC" size="35" type="text" 
	                                                                                    onblur="capitalize(this)"/>
	                                                                                </td>
	                                                                            </tr>
	                                                                        </table>
	                                                                    <td colspan="2" style="width:30%;">
	                                                                        <table>
	                                                                            <tr>
	                                                                                <td class="small" rowspan="2"><span class="smallBold">23</span>
	                                                                                    Date of Issue<br/>&nbsp&nbsp&nbsp&nbsp(MM/DD/YYYY)</td>
	                                                                                <td class="right">
	                                                                                    <input id="frm1702RT:txtPg1Pt2I23Date" name="frm1702RT:txtPg1Pt2I23Date" 
	                                                                                        type="text" size="20" style="text-align:center"  
	                                                                                        onkeypress="dateMasking(this); return wholenumber(event, false);" 
	                                                                                        onblur="validateDateOfIssue();" maxlength="10" />
	
	                                                                                </td>
	                                                                            </tr>
	                                                                        </table>
	                                                                    </td>
	                                                                </tr>
	                                                            </table>
	                                                        </td>
	                                                    </tr>
	                                                    <tr>
	                                                        <td colspan="5">
	                                                            <table width="100%">
	                                                                <tr>
	                                                                    <td colspan="2" style="width:67%;">
	                                                                        <table style="padding: 0px; margin: 0px; border: 0px; cell-spacing: 0px;">
	                                                                            <tr>
	                                                                                <td>
	                                                                                    <span class="smallBold">24</span>&nbsp <span class="smallBold">Place of Issue</span>
	                                                                                </td>
	                                                                                <td style="padding: 0px; margin: 0px; border: 0px; cell-spacing: 0px;">
	                                                                                    <input id="frm1702RT:txtPg1Pt2I24PlaceOfIssue" maxlength="33" 
	                                                                                        name="frm1702RT:txtPg1Pt2I24PlaceOfIssue" size="68" type="text" onblur="capitalize(this);redirectToSchedule()"/>
	                                                                                </td>
	                                                                            </tr>
	                                                                        </table>
	                                                                    </td>
	                                                                    <td colspan="2" style="width:35%;">
	                                                                        <table>
	                                                                            <tr>
	                                                                                <td class="small" rowspan="1"><span class="smallBold">25</span>
	                                                                                    Amount, if CTC</td>
	                                                                                <td class="right">
	                                                                                    <input id="frm1702RT:txtPg1Pt2I25AmountCTC" maxlength="12" 
	                                                                                        name="frm1702RT:txtPg1Pt2I25AmountCTC" style="text-align:right"
	                                                                                        onkeypress="return wholenumber(this, event)" 
	                                                                                        onfocus="this.value=WholeNumWithComma(this.value)"
	                                                                                        onblur="checkNumValue(this);this.value=addCommas(this.value);" size="20" type="text" value="0"/>
	                                                                                </td>
	                                                                            </tr>
	                                                                        </table>
	                                                                    </td>
	                                                                </tr>
	                                                            </table>
	                                                        </td>
	                                                    </tr>
	                                                    <tr>
	                                                        <td class="tblFormTd" colspan="5">
	                                                            <table class="ContentHeader" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
	                                                                <tr><td class="smallBold">Part III - Details of Payment</td></tr>
	                                                            </table>
	                                                        </td>
	                                                    </tr>
	                                                    <tr>
	                                                        <td class="tblFormTd" colspan="5">
	                                                            <table style="border-bottom: #000000 2px solid;">
	                                                                <tr class="small">
	                                                                    <td class="smallBold">Details of Payment</td>
	                                                                    <td class="smallerBold" style="text-align:center">Drawee Bank/Agency</td>
	                                                                    <td class="smallBold" style="text-align:center">Number</td>
	                                                                    <td style="width:20%;" style="text-align:center"><span class="smallBold">Date</span><span class="smallItalic">(MM/DD/YYYY)</span></td>
	                                                                    <td class="smallBold" style="text-align:center">Amount</td>
	                                                                </tr>
	                                                                <tr class="tblFormTd">
	                                                                    <td class="small">
	                                                                        <span class="smallBold">26&nbsp</span>Cash/Bank Debit Memo
	                                                                    </td>
	                                                                    <td><input id="frm1702RT:txtPg1Pt3I26DebitMemoC1" 
	                                                                        name="frm1702RT:txtPg1Pt3I26DebitMemoC1" 
	                                                                        size="20" type="text" maxlength="11" onblur="capitalize(this)"/>
	                                                                    </td>
	                                                                    <td><input id="frm1702RT:txtPg1Pt3I26DebitMemoC2" 
	                                                                            name="frm1702RT:txtPg1Pt3I26DebitMemoC2" size="20" type="text" maxlength="20" onkeypress="return wholenumber(this, event)"
	                                                                            onblur="capitalize(this)"/></td>
	                                                                    <td>
	                                                                        <input id="frm1702RT:txtPg1Pt3I26DebitMemoC3Date" 
	                                                                            name="frm1702RT:txtPg1Pt3I26DebitMemoC3Date" type="text" size="20" 
	                                                                            style="text-align:center"  
	                                                                            onkeypress="dateMasking(this); return wholenumber(event, false);" 
	                                                                            onblur="validateDate(this);" maxlength="10" />
	                                                                        </td>
	                                                                    <td><input id="frm1702RT:txtPg1Pt3I26DebitMemoC4Amount" 
	                                                                            name="frm1702RT:txtPg1Pt3I26DebitMemoC4Amount" 
	                                                                            onkeypress="return wholenumber(this, event)" onfocus="this.value=WholeNumWithComma(this.value)" onblur="checkNumValue(this); this.value=addCommas(this.value);" size="20"
	                                                                            style="text-align: right" type="text" value="0" maxlength="12"/></td>
	                                                                </tr>
	                                                                <tr>
	                                                                    <td class="small">
	                                                                        <span class="smallBold">27&nbsp</span>Check
	                                                                    </td>
	                                                                    <td>
	                                                                        <input id="frm1702RT:txtPg1Pt3I27CheckC1" name="frm1702RT:txtPg1Pt3I27CheckC1" 
	                                                                        size="20" type="text" maxlength="11" onblur="capitalize(this)"/>
	                                                                    </td>
	                                                                    <td><input id="frm1702RT:txtPg1Pt3I27CheckC2" name="frm1702RT:txtPg1Pt3I27CheckC2" maxlength="20" onkeypress="return wholenumber(this, event)"
	                                                                            size="20" type="text" onblur="capitalize(this)"/></td>
	                                                                    <td>
	                                                                        <input id="frm1702RT:txtPg1Pt3I27CheckC3Date" 
	                                                                            name="frm1702RT:txtPg1Pt3I27CheckC3Date" type="text" size="20" 
	                                                                            style="text-align:center"  
	                                                                            onkeypress="dateMasking(this); return wholenumber(event, false);" 
	                                                                            onblur="validateDate(this);" maxlength="10" />
	                                                                        </td>
	                                                                    <td><input id="frm1702RT:txtPg1Pt3I27CheckC4Amount" 
	                                                                            name="frm1702RT:txtPg1Pt3I27CheckC4Amount" 
	                                                                            onkeypress="return wholenumber(this, event)" onfocus="this.value=WholeNumWithComma(this.value)" onblur="checkNumValue(this); this.value=addCommas(this.value);" size="20" 
	                                                                            style="text-align: right" type="text" value="0" maxlength="12" /></td>
	                                                                </tr>
	                                                                <tr>
	                                                                    <td class="small" colspan="2">
	                                                                        <span class="smallBold">28&nbsp</span>Tax Debit Memo
	                                                                    </td>
	                                                                    <td><input id="frm1702RT:txtPg1Pt3I28TaxDebitC2" 
	                                                                            name="frm1702RT:txtPg1Pt3I28TaxDebitC2" size="20" type="text" maxlength="20" onkeypress="return wholenumber(this, event)"
	                                                                            onblur="capitalize(this)"/></td>
	                                                                    <td>
	                                                                        <input id="frm1702RT:txtPg1Pt3I28TaxDebitDate" 
	                                                                            name="frm1702RT:txtPg1Pt3I28TaxDebitDate" type="text" size="20" 
	                                                                            style="text-align:center"  
	                                                                            onkeypress="dateMasking(this); return wholenumber(event, false);" 
	                                                                            onblur="validateDate(this);" maxlength="10" />
	                                                                    </td>
	                                                                    <td><input id="frm1702RT:txtPg1Pt3I28TaxDebitC4Amount" 
	                                                                            name="frm1702RT:txtPg1Pt3I28TaxDebitC4Amount" 
	                                                                            onkeypress="return wholenumber(this, event)" onfocus="this.value=WholeNumWithComma(this.value)" onblur="checkNumValue(this); this.value=addCommas(this.value);" size="20" 
	                                                                            style="text-align: right" type="text" value="0" maxlength="12"/></td>
	                                                                </tr>
	                                                                <tr>
	                                                                    <td class="small" colspan="5">
	                                                                        <span class="smallBold">29&nbsp</span>Others<span class="xsmallItalic">(Specify
	                                                                            Below)</span>
	                                                                    </td>
	                                                                </tr>
	                                                                <tr>
	                                                                    <td><input id="frm1702RT:txtPg1Pt3I29Others" name="frm1702RT:txtPg1Pt3I29Others" 
	                                                                            size="24" type="text" maxlength="17" onkeypress="return Name(this, event);" onblur="capitalize(this)"/></td>
	                                                                    <td><input id="frm1702RT:txtPg1Pt3I29OthersC1" 
	                                                                            name="frm1702RT:txtPg1Pt3I29OthersC1" 
	                                                                            size="20" type="text" maxlength="11" onblur="capitalize(this)"/></td>
	                                                                    <td><input id="frm1702RT:txtPg1Pt3I29OthersC2" 
	                                                                            name="frm1702RT:txtPg1Pt3I29OthersC2" size="20" type="text" maxlength="20" onkeypress="return wholenumber(this, event)"
	                                                                            onblur="capitalize(this)"/></td>
	                                                                    <td>
	                                                                        <input id="frm1702RT:txtPg1Pt3I29OthersC3Date" 
	                                                                            name="frm1702RT:txtPg1Pt3I29OthersC3Date" type="text" size="20" 
	                                                                            style="text-align:center"  
	                                                                            onkeypress="dateMasking(this); return wholenumber(event, false);" 
	                                                                            onblur="validateDate(this);" maxlength="10" />
	                                                                      </td>
	                                                                    <td><input id="frm1702RT:txtPg1Pt3I29OthersC4Amount" 
	                                                                            name="frm1702RT:txtPg1Pt3I29OthersC4Amount" 
	                                                                            onkeypress="return wholenumber(this, event)" onfocus="this.value=WholeNumWithComma(this.value)" onblur="checkNumValue(this);this.value=addCommas(this.value);" size="20" 
	                                                                            style="text-align: right" type="text" value="0" maxlength="12"/>
	                                                                    </td>
	                                                                </tr>
	                                                            </table>
	                                                        </td>
	                                                    </tr>
	                                                    <tr style="height:100px;">
	                                                        <td class="tblFormTd" colspan="3" valign="top">
	                                                            <span class="small">Machine Validation/Revenue Official Receipt Details</span>
	                                                            <span class="smallItalic">(if not filed with an Authorized Agent Bank)</span>
	                                                        </td>
	                                                        <td class="tblFormTd" colspan="2" valign="top">
	                                                            <div>
	                                                                <span class="smallItalic">Stamp of receiving Office/AAB and Date of
	                                                                Receipt (RO's Signature/Bank Teller's Initial)
	                                                                </span>
	                                                            </div>
	                                                        </td>
	                                                    </tr>
	                                                </table>
	                                            </td>
	                                        </tr>
	                                    </table>
	                                </div>
	                                <!-- Page 2 -->
	                                <div id="Page2Content" style="display: none;">
										<div id="Page2Header" style="margin: 0 auto; position: relative; width: 826px; ">
											<table border="0" cellpadding="0" cellspacing="0" class="FormHeader" width="100%" style="border: 1px solid">
												<tr>
													<td align="center" style="width:40%;border-right: 1px solid">
														<label class="xlargeBold">Annual Income Tax Return</label>
														<br>
														<label class="smallBold">Page 2</label>
													</td>
													<td align="center" style="width:20%;border-right: 1px solid">
														<label class="xsmall">Bir Form No.</label><br/>
														<label class="xlargeBold">1702-RT</label><br/>
														<label class="xsmall">June 2013</label>
													</td>
													<td align="right" valign="bottom">
														<div style="float: right">
															<img alt="" src="{{ asset('images/1702RT_BarCode/1702-RT06_13P2.png') }}" style="height:35px; width:250px"/>
															<br/>
															<span class="xsmallBold">1702-RT06/13P2</span>
														</div>
													</td>
												</tr>
											</table>
										</div>
										<div id="P2TIN" style="margin: 0 auto; position: relative; width: 826px; ">
											<table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="100%">
												<tr>
													<td align="left" class="tblFormTd">
														<span class="smallBold">Taxpayer Identification Number(TIN)</span>
													</td>
													<td align="left" class="tblFormTd" style="width:65%;">
														<span class="smallBold">Registered Name</span>
													</td>
												</tr>
												<tr>
													<td style="width:40%;">
														<input disabled="disabled" id="frm1702RT:txtPg2TIN1" maxlength="3" name="frm1702RT:txtTIN1" size="6" style="text-align:center" type="text" value="{{$company->tin1}}"/>
														<input disabled="disabled" id="frm1702RT:txtPg2TIN2" maxlength="3" name="frm1702RT:txtTIN2" size="6" style="text-align:center" type="text" value="{{$company->tin2}}"/>
														<input disabled="disabled" id="frm1702RT:txtPg2TIN3" maxlength="3" name="frm1702RT:txtTIN3" size="6" style="text-align:center" type="text" value="{{$company->tin3}}"/>
														<input disabled="disabled" id="frm1702RT:txtPg2TIN4" maxlength="3" name="frm1702RT:txtTIN4" size="6" style="text-align:center; display:none;" type="text" value="{{$company->tin4}}"/>
														<input disabled="disabled" id="txtBranchMaskP2" name="txtBranchMaskP2" size="4" style="text-align:center" value="0000"/>
													</td>
													<td align="left" style="width:60%;">
														<input disabled="disabled" style="width: 100%" id="frm1702RT:txtPg2RegisteredName" maxlength="24" name="frm1702RT:txtRegisteredName" size="77" type="text" value="{{$company->registered_name}}"/>
													</td>
												</tr>
											</table>
										</div>
										<div class="tblForm" id="Part4a" style="margin: 0 auto; position: relative; width: 826px;">
											<table style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
												<tr>
													<td class="tblFormTd">
														<span class="smallBold" style="margin-left:320px;">Part IV - Computation
															of Tax
														</span>
														<span class="smallBold" style=" font-style:italic; margin-left:120px; ">(Do NOT enter
															Centavos)
														</span>
													</td>
												</tr>
											</table>
											<table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="100%">
												<tr>
													<td align="left" class="tblFormTd" style="width:70%;">
														<span class="smallBold">30</span>
														<span class="small">Net Sales/Revenues/Receipts/Fees</span>
														<a href="#" onclick="goTo(3)" class="smallBold">(From Schedule 1 Item 6)</a>
													</td>
													<td align="left" class="tblFormTd" style="width:30%;">
														<input disabled="disabled" id="frm1702RT:txtPg2Pt4I30NetSales" maxlength="12" name="frm1702RT:txtPg2Pt4I30NetSales" size="35" style="text-align: right" type="text" value="0"/>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width:70%;">
														<span class="smallBold">31</span>
														<span class="small">Less: Cost of Sales/Services</span>
														<a href="#" onclick="goTo(3)" class="smallBold">(From Schedule 2 Item 27)</a>
													</td>
													<td align="left" class="tblFormTd" style="width:30%;">
														<input disabled="disabled" id="frm1702RT:txtPg2Pt4I31LessCost" maxlength="12" name="frm1702RT:txtPg2Pt4I31LessCost" size="35" style="text-align: right" type="text" value="0"/>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width:70%;">
														<span class="smallBold">32</span>
														<span class="small">Gross Income from Operation</span>
														<span class="smallBold">(Item 30 less Item 31)</span>
													</td>
													<td align="left" class="tblFormTd" style="width:30%;">
														<input disabled="disabled" id="frm1702RT:txtPg2Pt4I32GrossIncome" maxlength="12" name="frm1702RT:txtPg2Pt4I32GrossIncome" size="35" style="text-align: right" type="text" value="0"/>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width:70%;">
														<span class="smallBold">33</span>
														<span class="small">Add: Other Taxable Income Not Subjected to Final
															tax</span>
														<a href="#" onclick="goTo(4)" class="smallBold">(From Schedule 3 Item 4)</a>
													</td>
													<td align="left" class="tblFormTd" style="width:30%;">
														<input disabled="disabled" id="frm1702RT:txtPg2Pt4I33AddOtherTaxable" maxlength="12" name="frm1702RT:txtPg2Pt4I33AddOtherTaxable" size="35" style="text-align: right" type="text" value="0"/>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width:70%;">
														<span class="smallBold">34</span>
														<span class="small">Total Gross Income</span>
														<span class="smallBold">(Sum of Items 32 &amp; 33)</span>
													</td>
													<td align="left" class="tblFormTd" style="width:30%;">
														<input disabled="disabled" id="frm1702RT:txtPg2Pt4I34TotalGross" maxlength="12" name="frm1702RT:txtPg2Pt4I34TotalGross" size="35" style="text-align: right" type="text" value="0"/>
													</td>
												</tr>
											</table>
										</div>
										<div class="tblForm" id="Part4b" style="margin: 0 auto; position: relative; width: 826px;">
											<table style="border-bottom: #000000 1px solid; border-top: #000000 1px solid;">
												<tr>
													<td>
														<span class="small" style="margin-left:20px">Less: Deductions Allowable
															under Existing Law
														</span>
													</td>
												</tr>
											</table>
											<table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="100%">
												<tr>
													<td align="left" class="tblFormTd" style="width:50%;">
														<span class="smallBold">35</span>
														<span class="small">Ordinary Allowable Itemized Deductions</span>
														<a href="#" onclick="goTo(5); window.scrollTo(0, 70);" class="smallBold">(From Schedule 4 Item 40)</a>
													</td>
													<td align="left" class="tblFormTd" style="width:50%;">
														<input disabled="disabled" id="frm1702RT:txtPg2Pt4I35OrdinaryAllowable" maxlength="12" name="frm1702RT:txtPg2Pt4I35OrdinaryAllowable" size="35" style="text-align: right" type="text" value="0"/>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width:50%;">
														<span class="smallBold">36</span>
														<span class="small">Special Allowable Itemized Deductions</span>
														<a href="#" onclick="goTo(5)" class="smallBold">(From Schedule 5 Item 5)</a>
													</td>
													<td align="left" class="tblFormTd" style="width:50%;">
														<input disabled="disabled" id="frm1702RT:txtPg2Pt4I36SpecialAllowable" maxlength="12" name="frm1702RT:txtPg2Pt4I36SpecialAllowable" size="35" style="text-align: right" type="text" value="0"/>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width:50%;">
														<span class="smallBold">37</span>
														<span class="small">NOLCO</span>
														<span class="smallBold">(only for those taxable under Sec. 27(A to
															C); Sec. 28(A)(1)&amp;(a)(6)(b) of Tax code)</span>
														<a href="#" onclick="goTo(5)" class="smallBold">(From Schedule 6A Item 8D)</a>
													</td>
													<td align="left" class="tblFormTd" style="width:50%;">
														<input disabled="disabled" id="frm1702RT:txtPg2Pt4I37Nolco" maxlength="12" name="frm1702RT:txtPg2Pt4I37Nolco" size="35" style="text-align: right" type="text" value="0"/>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width:50%;">
														<span class="smallBold">38</span>
														<span class="small">Total Itemized Deductions</span>
														<span class="smallerItalic">(Sums of Items 35 to 37)</span>
													</td>
													<td align="left" class="tblFormTd" style="width:50%;">
														<input disabled="disabled" id="frm1702RT:txtPg2Pt4I38TotalItemized" maxlength="12" name="frm1702RT:txtPg2Pt4I38TotalItemized" size="35" style="text-align: right" type="text" value="0"/>
													</td>
												</tr>
											</table>
											<div class="tblForm">
												<span class="smallBold" style="margin-left:150px;">OR</span>
												<span class="smallItalic">[in case taxable under Sec 27(A) &
													28(A)(1)]</span>
											</div>
											<table cellpadding="0" cellspacing="0" class="tblForm" width="100%">
												<tr>
													<td align="left" class="tblFormTd" style="width:50%;">
														<span class="smallBold">39</span>
														<span class="smallBold">Optional Standard Deduction</span>
														<span style="font-style:italic; font-size:smaller;">(40% of Item 34)</span>
													</td>
													<td align="left" class="tblFormTd" style="width:50%;">
														<input disabled="disabled" id="frm1702RT:txtPg2Pt4I39OptionalStandard" maxlength="12" name="frm1702RT:txtPg2Pt4I39OptionalStandard" size="35" style="text-align: right" type="text" value="0"/>
													</td>
												</tr>
											</table>
											<table border="0" cellpadding="0" cellspacing="0" class="tblForm" style="border-bottom: #000000 1px solid; border-top: #000000 1px solid;" width="100%">
												<tr>
													<td align="left" class="tblFormTd" style="width:70%;">
														<span class="smallBold">40</span>
														<span style="font-weight:bold; ">Net Taxable Income</span>
														<span style="font-style:italic; font-size:smaller;">(Item 34 Less Item 38 OR 39)</span>
													</td>
													<td align="left" class="tblFormTd" style="width:30%;">
														<input disabled="disabled" id="frm1702RT:txtPg2Pt4I40NetTaxable" maxlength="12" name="frm1702RT:txtPg2Pt4I40NetTaxable" size="35" style="text-align: right" type="text" value="0"/>
													</td>
												</tr>
											</table>
											<table border="0" cellpadding="0" cellspacing="0" class="tblForm" style="border-bottom: #000000 1px solid; border-top: #000000 1px solid;" width="100%">
												<tr>
													<td align="left" class="tblFormTd" style="width:70%;">
														<span class="smallBold">41</span>
														<span class="small">Income Tax Rate</span>
													</td>
													<td align="center" class="tblFormTd" style="width:30%;">
														<span class="smallBold" style="text-align:center">30%</span>
													</td>
												</tr>
											</table>
											<table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="100%">
												<tr>
													<td align="left" class="tblFormTd" style="width:70%;">
														<span class="smallBold">42</span>
														<span class="small">Income Tax Due other than MCIT</span>
														<span class="smallerItalic">(Item 40 x Item 41)</span>
													</td>
													<td align="left" class="tblFormTd" style="width:30%;">
														<input disabled="disabled" id="frm1702RT:txtPg2Pt4I42IncomeTaxDue" maxlength="12" name="frm1702RT:txtPg2Pt4I42IncomeTaxDue" size="35" style="text-align: right" type="text" value="0"/>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width:70%;">
														<span class="smallBold">43</span>
														<span class="small">Minimum Corporate Income Tax(MCIT)</span>
														<span class="smallerItalic">(2% of Gross Income in Item 34)</span>
													</td>
													<td align="left" class="tblFormTd" style="width:30%;">
														<input disabled="disabled" id="frm1702RT:txtPg2Pt4I43MinimumCorporate" maxlength="12" name="frm1702RT:txtPg2Pt4I43MinimumCorporate" size="35" style="text-align: right" type="text" value="0"/>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width:70%;">
														<span class="smallBold">44</span>
														<span class="smallBold">Total Income Tax Due</span>
														<span class="smallerItalic">(Normal Income Tax in Item 42 or MCIT in
															Item 43, whichever is higher)</span>
														<a href="#" onclick="goTo(1)" class="smallBold">(To Part II Item 16)</a>
													</td>
													<td align="left" class="tblFormTd" style="width:30%;">
														<input disabled="disabled" id="frm1702RT:txtPg2Pt4I44TotalIncomeTax" maxlength="12" name="frm1702RT:txtPg2Pt4I44TotalIncomeTax" size="35" style="text-align: right" type="text" value="0"/>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width:70%;">
														<span class="smallBold">45</span>
														<span class="small">Less:Total Tax Credits/Payments</span>
														<a href="#" onclick="goTo(6); window.scrollTo(0, 0);" class="smallBold">(From Schedule 7 Item 12)</a>
														<a href="#" onclick="goTo(1)" class="smallBold">(To Part II Item 17)</a>
													</td>
													<td align="left" class="tblFormTd" style="width:30%;">
														<input disabled="disabled" id="frm1702RT:txtPg2Pt4I45LessTotalTax" maxlength="12" name="frm1702RT:txtPg2Pt4I45LessTotalTax" size="35" style="text-align: right" type="text" value="0"/>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width:70%; border-bottom: #000000 1px solid; border-top: #000000 1px solid;">
														<span class="smallBold">46</span>
														<span class="smallBold">Net Tax Payable (Overpayment)&nbsp</span>
														<span class="smallerItalic">(Item 44 Less Item 45)</span>
														<a href="#" onclick="goTo(1)" class="smallBold">(To Part II Item 18)</a>
													</td>
													<td align="left" class="tblFormTd" style="width:30%; border-bottom: #000000 1px solid; border-top: #000000 1px solid;">
														<input disabled="disabled" id="frm1702RT:txtPg2Pt4I46NetTax" maxlength="12" name="frm1702RT:txtPg2Pt4I46NetTax" size="35" style="text-align: right" type="text" value="0"/>
													</td>
												</tr>
											</table>
										</div>
										<div class="tblForm" id="Part4AddPenalties" style="margin: 0 auto; position: relative; width: 826px; ">
											<table>
												<tr>
													<td class="tblFormTd">
														<span class="smallBold" style="margin-left:20px ">Add Penalties
														</span>
													</td>
												</tr>
											</table>
											<table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="100%">
												<tr>
													<td align="left" class="tblFormTd" style="width:50%;">
														<span class="smallBold">47</span>
														<span class="small">Surcharge</span>
													</td>
													<td align="left" class="tblFormTd" style="width:50%;">
														<input id="frm1702RT:txtPg2Pt4I47Surcharge" maxlength="12" name="frm1702RT:txtPg2Pt4I47Surcharge" onblur="checkNumValue(this); computeP2Pt4I50(); this.value=addCommas(this.value);" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" size="35" style="text-align: right" type="text" value="0"/>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width:50%;">
														<span class="smallBold">48</span>
														<span class="small">Interest</span>
													</td>
													<td align="left" class="tblFormTd" style="width:50%;">
														<input id="frm1702RT:txtPg2Pt4I48Interest" maxlength="12" name="frm1702RT:txtPg2Pt4I48Interest" onblur="checkNumValue(this); computeP2Pt4I50(); this.value=addCommas(this.value);" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" size="35" style="text-align: right" type="text" value="0"/>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width:50%;">
														<span class="smallBold">49</span>
														<span class="small">Compromise</span>
													</td>
													<td align="left" class="tblFormTd" style="width:50%;">
														<input id="frm1702RT:txtPg2Pt4I49Compromise" maxlength="12" name="frm1702RT:txtPg2Pt4I49Compromise" onblur="checkNumValue(this); computeP2Pt4I50(); this.value=addCommas(this.value);" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" size="35" style="text-align: right" type="text" value="0"/>
													</td>
												</tr>
											</table>
											<table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="100%">
												<tr>
													<td align="left" class="tblFormTd" style="width:70%;">
														<span class="smallBold">50</span>
														<span class="smallBold">Total Penalties</span>
														<span class="smallerItalic">(Sum of Items 47 to 49)</span>
														<a href="#" onclick="goTo(1)" class="smallBold">(To Part II Item 19)</a>
													</td>
													<td align="left" class="tblFormTd" style="width:40%;">
														<input align="middle" disabled="disabled" id="frm1702RT:txtPg2Pt4I50TotalPenalties" maxlength="12" name="frm1702RT:txtPg2Pt4I50TotalPenalties" onkeypress="return wholenumber(this, event)" size="35" style="text-align: right" type="text" value="0"/>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width:70%; border-bottom: #000000 1px solid; border-top: #000000 1px solid;">
														<span class="smallBold">51</span>
														<span class="smallBold">Total Amount Payable (Overpayment)&nbsp</span>
														<span class="smallerItalic">(Sum Item 46 & 50)</span>
														<a href="#" onclick="goTo(1)" class="smallBold">(To Part II Item 20)</a>
													</td>
													<td align="left" class="tblFormTd" style="width:30%; border-bottom: #000000 1px solid;">
														<input align="middle" disabled="disabled" id="frm1702RT:txtPg2Pt4I51TotalAmount" maxlength="12" name="frm1702RT:txtPg2Pt4I51TotalAmount" onkeypress="return wholenumber(this, event)" size="35" style="text-align: right" type="text" value="0"/>
													</td>
												</tr>
											</table>
										</div>
										<div class="tblForm" id="Part5" style="margin: 0 auto; position: relative; width: 826px; ">
											<table style="border-bottom: #000000 2px solid; border-top: #000000 1px solid;">
												<tr>
	                                                <td>
	                                                    <span class="smallBold" style="margin-left:320px;">Part V - Tax Relief Availment</span>
													    <span class="smallBold" style=" font-style:italic; margin-left:120px; ">(Do NOT enter Centavos)</span>
													</td>
												</tr>
											</table>
											<table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="100%">
												<tr>
													<td align="left" class="tblFormTd" style="width:70%;">
														<span class="smallBold">52</span>
														<span class="small">Special Allowable Itemized Deductions</span>
														<span class="smallerItalic">(30% of Item 36)</span>
													</td>
													<td align="left" class="tblFormTd" style="width:30%;">
														<input align="middle" disabled="disabled" id="frm1702RT:txtPg2Pt5I52SpecialAllowable" maxlength="12" name="frm1702RT:txtPg2Pt5I52SpecialAllowable" size="35" style="text-align: right" type="text" value="0"/>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width:70%;">
														<span class="smallBold">53</span>
														<span class="small">Add:Special Tax Credits</span>
														<a href="#" class="smallBold" onclick="goTo(6); window.scrollTo(0, 0);">(From Schedule 7 Item 9)</a>
													</td>
													<td align="left" class="tblFormTd" style="width:30%;">
														<input align="middle" disabled="disabled" id="frm1702RT:txtPg2Pt5I53AddSpecialTax" maxlength="12" name="frm1702RT:txtPg2Pt5I53AddSpecialTax" size="35" style="text-align: right" type="text" value="0"/>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width:70%;">
														<span class="smallBold">54</span>
														<span class="smallBold">Total Tax Relief Availment</span>
														<span class="smallerItalic">(Sum of Items 52 & 53)</span>
													</td>
													<td align="left" class="tblFormTd" style="width:40%;">
														<input align="middle" disabled="disabled" id="frm1702RT:txtPg2Pt5I54TotalTax" maxlength="12" name="frm1702RT:txtPg2Pt5I54TotalTax" size="35" style="text-align: right" type="text" value="0"/>
													</td>
												</tr>
											</table>
										</div>
										<div class="tblForm" id="Part6" style="margin: 1 auto 0 auto; position: relative; width: 826px; ">
											<table border="0" cellpadding="0" cellspacing="0" class="tblForm" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;" width="100%">
												<tr>
													<td align="center" class="tblFormTd" style="width:100%;">
														<span class="smallBold">Part VI - Information - External
															Auditor/Accredited Tax Agent</span>
													</td>
												</tr>
											</table>
											<table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="100%">
												<tr>
													<td align="left" class="tblFormTd" style="width:40%;">
														<span class="smallBold">55</span>
														<span class="small">Name of External Auditor/Accredited Tax Agent</span>
													</td>
													<td align="left" class="tblFormTd" style="width:60%;">
														<input id="frm1702RT:txtPg2Pt6I55Name" maxlength="33" name="frm1702RT:txtPg2Pt6I55Name" onkeypress="return Name(this, event);" onblur="capitalize(this)" style="width:99%" type="text" value=""/>
													</td>
												</tr>
											</table>
											<table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="100%">
												<tr>
													<td align="left" class="tblFormTd" style="width:40%;">
														<span class="smallBold">56</span>
														<span class="small">TIN</span>
													</td>
													<td align="left" class="tblFormTd" style="width:60%;">
														<input id="frm1702RT:txtPg2Pt6I56TIN1" maxlength="3" name="frm1702RT:txtPg2Pt6I56TIN1" onblur="validateTIN(this, false)" onkeypress="return wholenumber(this, event)" onkeyup="moveToNext(this, 3);" size="3" style="text-align: center" type="text" value=""/>
														<input id="frm1702RT:txtPg2Pt6I56TIN2" maxlength="3" name="frm1702RT:txtPg2Pt6I56TIN2" onblur="validateTIN(this, false)" onkeypress="return wholenumber(this, event)" onkeyup="moveToNext(this, 3);" size="3" style="text-align: center" type="text" value=""/>
														<input id="frm1702RT:txtPg2Pt6I56TIN3" maxlength="3" name="frm1702RT:txtPg2Pt6I56TIN3" onblur="validateTIN(this, false)" onkeypress="return wholenumber(this, event)" onkeyup="moveToNext(this, 3);" size="3" style="text-align: center" type="text" value=""/>
														<input id="frm1702RT:txtPg2Pt6I56TIN4" maxlength="3" name="frm1702RT:txtPg2Pt6I56TIN4" onblur="validateTIN(this, false)" onkeypress="return wholenumber(this, event)" size="3" style="text-align: center" type="text" value=""/>
													</td>
												</tr>
											</table>
											<table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="100%">
												<tr>
													<td align="left" class="tblFormTd" rowspan="2" style="width:40%;">
														<span class="smallBold">57</span>
														<span class="small">Name of Signing Partner</span><br/>
														<span class="smallItalic" style="margin-left: 15px;">(If External
															Auditor is a Partnership)</span>
													</td>
													<td align="left" class="tblFormTd" style="width:60%;">
														<input id="frm1702RT:txtPg2Pt6I57Name" maxlength="33" name="frm1702RT:txtPg2Pt6I57Name" onkeypress="return Name(this, event);" onblur="capitalize(this)" style="width:99%" type="text" value=""/>
													</td>
												</tr>
											</table>
											<table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="100%">
												<tr>
													<td align="left" class="tblFormTd" style="width:40%;">
														<span class="smallBold">58</span>
														<span class="small">TIN</span>
													</td>
													<td align="left" class="tblFormTd" style="width:60%;">
														<input id="frm1702RT:txtPg2Pt6I58TIN1" maxlength="3" name="frm1702RT:txtPg2Pt6I58TIN1" onblur="validateTIN(this, false)" onkeypress="return wholenumber(this, event)" onkeyup="moveToNext(this, 3);" size="3" style="text-align: center" type="text" value=""/>
														<input id="frm1702RT:txtPg2Pt6I58TIN2" maxlength="3" name="frm1702RT:txtPg2Pt6I58TIN2" onblur="validateTIN(this, false)" onkeypress="return wholenumber(this, event)" onkeyup="moveToNext(this, 3);" size="3" style="text-align: center" type="text" value=""/>
														<input id="frm1702RT:txtPg2Pt6I58TIN3" maxlength="3" name="frm1702RT:txtPg2Pt6I58TIN3" onblur="validateTIN(this, false)" onkeypress="return wholenumber(this, event)" onkeyup="moveToNext(this, 3);" size="3" style="text-align: center" type="text" value=""/>
														<input id="frm1702RT:txtPg2Pt6I58TIN4" maxlength="3" name="frm1702RT:txtPg2Pt6I58TIN4" onblur="validateTIN(this, false)" onkeypress="return wholenumber(this, event)" size="3" style="text-align: center" type="text" value=""/>
													</td>
												</tr>
											</table>
											<table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="100%">
												<tr>
													<td align="left" class="tblFormTd" style="width:40%;">
														<span class="smallBold">59</span>
														<span class="small">BIR Accreditation No.</span>
													</td>
													<td align="left" class="tblFormTd" style="width:30%;">
														<span class="smallBold">60</span>
														<span class="small">Issue Date</span>
														<span class="smallItalic">(MM/DD/YYYY)</span>
													</td>
													<td align="left" class="tblFormTd" style="width:30%;">
														<span class="smallBold">61</span>
														<span class="small">Expiry Date</span>
														<span class="smallItalic">(MM/DD/YYYY)</span>
													</td>
												</tr>
											</table>
											<table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="100%">
												<tr>
													<td align="left" class="tblFormTd" style="width:40%;">
														<input id="frm1702RT:txtPg2Pt6I59BIR1" maxlength="2" name="frm1702RT:txtPg2Pt6I59BIR1" onkeypress="return wholenumber(this, event)" size="3" style="text-align: center" type="text" value=""/>
														<span class="mediumBold">-</span>
														<input id="frm1702RT:txtPg2Pt6I59BIR2" maxlength="6" name="frm1702RT:txtPg2Pt6I59BIR2" onkeypress="return wholenumber(this, event)" size="7" style="text-align: center" type="text" value=""/>
														<span class="mediumBold">-</span>
														<input id="frm1702RT:txtPg2Pt6I59BIR3" maxlength="3" name="frm1702RT:txtPg2Pt6I59BIR3" onkeypress="return wholenumber(this, event)" size="4" style="text-align: center" type="text" value=""/>
														<span class="mediumBold">-</span>
														<input id="frm1702RT:txtPg2Pt6I59BIR4" maxlength="4" name="frm1702RT:txtPg2Pt6I59BIR4" onkeypress="return wholenumber(this, event)" size="5" style="text-align: center" type="text" value=""/>
													</td>
													<td align="left" class="tblFormTd" style="width:30%;">
														<input id="frm1702RT:txtPg2Pt6I60IssueDate" 
	                                                        name="frm1702RT:txtPg2Pt6I60IssueDate" onblur="checkPg2Pt6I60(this),checkPg2Pt6I6061(this)" 
	                                                        onkeypress="dateMasking(this); return wholenumber(event, false);" size="20" 
	                                                        style="text-align:center" type="text" maxlength="10"/>
													</td>
													<td align="left" class="tblFormTd" style="width:30%;">
														<input id="frm1702RT:txtPg2Pt6I61ExpiryDate" 
	                                                        name="frm1702RT:txtPg2Pt6I61ExpiryDate" onblur="checkPg2Pt6I6061(this)" 
	                                                        onkeypress="dateMasking(this); return wholenumber(event, false);" size="20" 
	                                                        style="text-align:center" type="text" maxlength="10"/>
													</td>
												</tr>
											</table>
										</div>
									</div>
									<!-- Page 3 -->
									<div id="Page3Content" style="display:none">
										<div id="Page3Header" style="margin: 0 auto; position: relative; width: 826px; ">
											<table border="0" cellpadding="0" cellspacing="0" class="FormHeader" width="100%">
												<tr>
													<td align="center" style="width:40%;">
														<label class="xlargeBold">Annual Income Tax Return</label>
														<br/>
														<label class="smallBold">Page 3 - Schedules 1 & 2</label>
													</td>
													<td align="center" style="width:20%;">
														<label class="xsmall">Bir Form No.</label><br/>
														<label class="xlargeBold">1702-RT</label><br/>
														<label class="xsmall">June 2013</label>
													</td>
													<td align="right" valign="bottom">
														<div style="float: right">
															<img alt="" src="{{ asset('images/1702RT_BarCode/1702-RT02_013P3.png') }}" style="height:35px; width:250px"/>
															<br/>
															<span class="xsmallBold">1702-RT06/013P3</span>
														</div>
													</td>
												</tr>
											</table>
										</div>
										<div id="P3TIN" style="margin: 0 auto; position: relative; width: 826px; top: 0px; left: 1px;">
											<table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="100%">
												<tr>
													<td align="left" class="tblFormTd">
														<span class="smallBold">Taxpayer Identification Number(TIN)</span>
													</td>
													<td align="left" class="tblFormTd" style="width:65%;">
														<span class="smallBold">Registered Name</span>
													</td>
												</tr>
												<tr>
													<td style="width:40%;">
														<input disabled="disabled" id="frm1702RT:txtPg3TIN1" maxlength="3" name="frm1702RT:txtTIN1" size="6" style="text-align:center" type="text" value="{{$company->tin1}}"/>
														<input disabled="disabled" id="frm1702RT:txtPg3TIN2" maxlength="3" name="frm1702RT:txtTIN2" size="6" style="text-align:center" type="text" value="{{$company->tin2}}"/>
														<input disabled="disabled" id="frm1702RT:txtPg3TIN3" maxlength="3" name="frm1702RT:txtTIN3" size="6" style="text-align:center" type="text" value="{{$company->tin3}}"/>
														<input disabled="disabled" id="frm1702RT:txtPg3TIN4" maxlength="3" name="frm1702RT:txtTIN4" size="6" style="text-align:center; display:none" type="text" value="{{$company->tin4}}"/>
														<input disabled="disabled" id="txtBranchMaskP3" name="txtBranchMaskP3" size="4" style="text-align:center" value="0000"/>
													</td>
													<td align="left" style="width:60%;">
														<input style="width: 100%" disabled="disabled" id="frm1702RT:txtPg3RegisteredName" maxlength="24" name="frm1702RT:txtRegisteredName" size="77" type="text" value="{{$company->registered_name}}"/>
													</td>
												</tr>
											</table>
										</div>
										<div id="P3Schedule1" style="margin: 0 auto; position: relative;">
											<table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="100%">
												<tr>
													<td align="left" class="tblFormTd" style="width: 100%; border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
														<center>
															<span class="smallBold">Schedule 1 - Sales/Revenues/Receipts/Fees</span>
															<span class="smallerItalic">(Attach additional sheet/s if
																necessary)</span>
														</center>
													</td>
												</tr>
											</table>
											<table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="100%">
												<tr>
													<td align="left" class="tblFormTd" style="width: 70%;">
														<span class="smallBold">1</span>
														<span class="small">Sale of Goods/Properties</span>
													</td>
													<td align="center" class="tblFormTd" style="width: 30%;">
														<input id="frm1702RT:txtPg3Sc1I1GoodsProp" name="frm1702RT:txtPg3Sc1I1GoodsProp" maxlength="12" onblur="checkNumValue(this); P3Sc1(); this.value=addCommas(this.value);" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align: right;" type="text" value="0"/>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width: 70%;">
														<span class="smallBold">2</span>
														<span class="small">
															Sale of Services</span>
													</td>
													<td align="center" class="tblFormTd" style="width: 30%;">
														<input id="frm1702RT:txtPg3Sc1I2SaleServices" name="frm1702RT:txtPg3Sc1I2SaleServices" maxlength="12" onblur="checkNumValue(this); P3Sc1(); this.value=addCommas(this.value);" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align: right;" type="text" value="0"/>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width: 70%;">
														<span class="smallBold">3</span>
														<span class="small">
															Lease of Properties</span>
													</td>
													<td align="center" class="tblFormTd" style="width: 30%;">
														<input id="frm1702RT:txtPg3Sc1I3LeaseProp" name="frm1702RT:txtPg3Sc1I3LeaseProp" maxlength="12" onblur="checkNumValue(this); P3Sc1(); this.value=addCommas(this.value);" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align: right;" type="text" value="0"/>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width: 70%;">
														<span class="smallBold">4</span>
														<span class="small">
															Total</span>
														<span style="font-size: x-small; font-style: italic;">(Sum of Items 1 to
															3)</span>
													</td>
													<td align="center" class="tblFormTd" style="width: 30%;">
														<input disabled="disabled" id="frm1702RT:txtPg3Sc1I4Total" name="frm1702RT:txtPg3Sc1I4Total" maxlength="12" onkeypress="return wholenumber(this, event)" style="width:98%; text-align: right;" type="text" value="0"/>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width: 70%;">
														<span class="smallBold">5</span>
														<span class="small">
															Less:Sales Returns, Allowances and Discounts</span>
													</td>
													<td align="center" class="tblFormTd" style="width: 30%;">
														<input id="frm1702RT:txtPg3Sc1I5LessSales" name="frm1702RT:txtPg3Sc1I5LessSales" maxlength="12" onblur="checkNumValue(this); P3Sc1(); this.value=addCommas(this.value);" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align: right;" type="text" value="0"/>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width: 70%;">
														<span class="smallBold">6</span>
														<span style="font-weight: bold; font-size: small;">Net
															Sales/Revenues/Receipts/Fees</span>
														<span style="font-style: italic; font-size: x-small;">(Item 4 Less Item
															5)</span>
															<a href="#" class="smallBold"  onclick="goTo(2)">(To Part IV Item 30)</a>
													</td>
													<td align="center" class="tblFormTd" style="width: 30%;">
														<input disabled="disabled" id="frm1702RT:txtPg3Sc1I6NetSales" name="frm1702RT:txtPg3Sc1I6NetSales" maxlength="12" onkeypress="return wholenumber(this, event)" style="width:98%; text-align: right;" type="text" value="0"/>
													</td>
												</tr>
											</table>
										</div>
										<div id="P3Schedule2" style="margin: 0 auto; position: relative; top: 0px; left: 1px;">
											<table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="100%">
												<tr>
													<td align="left" class="tblFormTd" style="width: 100%; border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
														<center>
															<span class="smallBold">Schedule 2 - Cost of Sales</span>
															<span class="smallerItalic">(Attach additional sheet/s if
																necessary)</span>
														</center>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width: 100%; border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
														<center>
															<span class="smallBold">Schedule 2A - Cost of Sales (For those Engaged
																in Trading)</span>
														</center>
													</td>
												</tr>
											</table>
											<table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="100%">
												<tr>
													<td align="left" class="tblFormTd" style="width: 70%;">
														<span class="smallBold">1</span>
														<span class="small">
															Merchandise Inventory - Beginning</span>
													</td>
													<td align="center" class="tblFormTd" style="width: 30%;">
														<input id="frm1702RT:txtPg3Sc2I1MerchInventory" name="frm1702RT:txtPg3Sc2I1MerchInventory" maxlength="12" onblur="checkNumValue(this); P3Sc2(); this.value=addCommas(this.value);" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align: right;" type="text" value="0"/>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width: 70%;">
														<span class="smallBold">2</span>
														<span class="small">
															Add: Purchases of Merchandise</span>
													</td>
													<td align="center" class="tblFormTd" style="width: 30%;">
														<input id="frm1702RT:txtPg3Sc2I2AddPurchases" name="frm1702RT:txtPg3Sc2I2AddPurchases" maxlength="12" onblur="checkNumValue(this); P3Sc2(); this.value=addCommas(this.value);" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align: right;" type="text" value="0"/>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width: 70%;">
														<span class="smallBold">3</span>
														<span class="small">
															Total Goods Available for Sale</span>
														<span class="smallerItalic">
															(Sum of Items 1 & 2)</span>
													</td>
													<td align="center" class="tblFormTd" style="width: 30%;">
														<input disabled="disabled" id="frm1702RT:txtPg3Sc2I3TotalGoods" name="frm1702RT:txtPg3Sc2I3TotalGoods" maxlength="12" onkeypress="return wholenumber(this, event)" style="width:98%; text-align: right;" type="text" value="0"/>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width: 70%;">
														<span class="smallBold">4</span>
														<span class="small">
															Less:Merchandise Inventory, Ending</span>
													</td>
													<td align="center" style="width: 30%;">
														<input id="frm1702RT:txtPg3Sc2I4LessMerch" name="frm1702RT:txtPg3Sc2I4LessMerch" maxlength="12" onblur="checkNumValue(this); P3Sc2(); this.value=addCommas(this.value);" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align: right;" type="text" value="0"/>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width: 70%;">
														<span class="smallBold">5</span>
														<span style="font-weight: bold; font-size: small;">Cost of Sales</span>
														<span class="smallerItalic">
															(Items 3 less Item 4) (To Schedule 2 Item 27 )</span>
													</td>
													<td align="center" class="tblFormTd" style="width: 30%;">
														<input disabled="disabled" id="frm1702RT:txtPg3Sc2I5CostofSales" name="frm1702RT:txtPg3Sc2I5CostofSales" maxlength="12" onkeypress="return wholenumber(this, event)" style="width:98%; text-align: right;" type="text" value="0"/>
													</td>
												</tr>
											</table>
										</div>
										<div id="P3Schedule2B" style="margin: 0 auto; position: relative;">
											<table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="100%">
												<tr>
													<td align="center" class="tblFormTd" style="width: 100%; border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
														<span class="smallBold">Schedule 2B - Cost of Sales</span>
														<span style="font-style: italic; font-weight: bold; font-size: x-small;">(For
															those Engaged in Manufacturing)</span>
													</td>
												</tr>
											</table>
											<table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="100%">
												<tr>
													<td align="left" class="tblFormTd" style="width: 70%;">
														<span class="smallBold">6</span>
														<span class="small">
															Direct Materials, Beginning</span>
													</td>
													<td align="center" class="tblFormTd" style="width: 30%;">
														<input id="frm1702RT:txtPg3Sc2I6DirectMaterials" name="frm1702RT:txtPg3Sc2I6DirectMaterials" maxlength="12" onblur="checkNumValue(this); P3Sc2(); this.value=addCommas(this.value);" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align: right;" type="text" value="0"/>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width: 70%;">
														<span class="smallBold">7</span>
														<span class="small">
															Add: Purchases of Direct Materials</span>
													</td>
													<td align="center" class="tblFormTd" style="width: 30%;">
														<input id="frm1702RT:txtPg3Sc2I7AddPurchases" name="frm1702RT:txtPg3Sc2I7AddPurchases" maxlength="12" onblur="checkNumValue(this); P3Sc2(); this.value=addCommas(this.value);" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align: right;" type="text" value="0"/>
													</td> 
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width: 70%;">
														<span class="smallBold">8</span>
														<span class="small">
															Materials Available for Use</span>
														<span class="smallerItalic">
															(Sum of Items 6 & 7)</span>
													</td>
													<td align="center" class="tblFormTd" style="width: 30%;">
														<input disabled="disabled" id="frm1702RT:txtPg3Sc2I8MaterialsAvaliable" name="frm1702RT:txtPg3Sc2I8MaterialsAvaliable" maxlength="12" onkeypress="return wholenumber(this, event)" style="width:98%; text-align: right;" type="text" value="0"/>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width: 70%;">
														<span class="smallBold">9</span>
														<span class="small">
															Less:Direct Materials, Ending</span>
													</td>
													<td align="center" class="tblFormTd" style="width: 30%;">
														<input id="frm1702RT:txtPg3Sc2I9LessDirectMat" name="frm1702RT:txtPg3Sc2I9LessDirectMat" maxlength="12" onblur="checkNumValue(this); P3Sc2(); this.value=addCommas(this.value);" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align: right;" type="text" value="0"/>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width: 70%;">
														<span class="smallBold">10</span>
														<span class="small">
															Raw Materials Used</span>
														<span class="smallerItalic">(Items 8 less Item 9)</span>
													</td>
													<td align="center" class="tblFormTd" style="width: 30%;">
														<input disabled="disabled" id="frm1702RT:txtPg3Sc2I10RawMatUsed" name="frm1702RT:txtPg3Sc2I10RawMatUsed" maxlength="12" onkeypress="return wholenumber(this, event)" style="width:98%; text-align: right;" type="text" value="0"/>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width: 70%;">
														<span class="smallBold">11</span>
														<span class="small">
															Direct Labor</span>
													</td>
													<td align="center" class="tblFormTd" style="width: 30%;">
														<input id="frm1702RT:txtPg3Sc2I11DirectLabor" name="frm1702RT:txtPg3Sc2I11DirectLabor" maxlength="12" onblur="checkNumValue(this); P3Sc2(); this.value=addCommas(this.value);" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align: right;" type="text" value="0"/>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width: 70%;">
														<span class="smallBold">12</span>
														<span class="small">
															Manufacturing Overhead</span>
													</td>
													<td align="center" class="tblFormTd" style="width: 30%;">
														<input id="frm1702RT:txtPg3Sc2I12ManOverhead" name="frm1702RT:txtPg3Sc2I12ManOverhead" maxlength="12" onblur="checkNumValue(this); P3Sc2(); this.value=addCommas(this.value);" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align: right;" type="text" value="0"/>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width: 70%;">
														<span class="smallBold">13</span>
														<span class="small">
															Total Manufacturing Cost</span>
														<span class="smallerItalic">
															(Sum of Items 10,11 & 12)</span>
													</td>
													<td align="center" class="tblFormTd" style="width: 30%;">
														<input disabled="disabled" id="frm1702RT:txtPg3Sc2I13TotalManCost" name="frm1702RT:txtPg3Sc2I13TotalManCost" maxlength="12" onkeypress="return wholenumber(this, event)" style="width:98%; text-align: right;" type="text" value="0"/>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width: 70%;">
														<span class="smallBold">14</span>
														<span class="small">
															Add: Work in Process, Beginning</span>
													</td>
													<td align="center" class="tblFormTd" style="width: 30%;">
														<input id="frm1702RT:txtPg3Sc2I14WorkProcess" name="frm1702RT:txtPg3Sc2I14WorkProcess" maxlength="12" onblur="checkNumValue(this); P3Sc2(); this.value=addCommas(this.value);" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align: right;" type="text" value="0"/>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width: 70%;">
														<span class="smallBold">15</span>
														<span class="small">
															Less : Work in Process Ending</span>
													</td>
													<td align="center" class="tblFormTd" style="width: 30%;">
														<input id="frm1702RT:txtPg3Sc2I15LessWorkProcess" name="frm1702RT:txtPg3Sc2I15LessWorkProcess" maxlength="12" onblur="checkNumValue(this); P3Sc2(); this.value=addCommas(this.value);" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align: right;" type="text" value="0"/>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width: 70%;">
														<span class="smallBold">16</span>
														<span class="small">
															Cost of Goods Manufactured</span>
														<span class="smallerItalic">
															(Sum of Items 13 & 14 Less Item 15)</span>
													</td>
													<td align="center" class="tblFormTd" style="width: 30%;">
														<input disabled="disabled" id="frm1702RT:txtPg3Sc2I16CostOfGoods" name="frm1702RT:txtPg3Sc2I16CostOfGoods" maxlength="12" onkeypress="return wholenumber(this, event)" style="width:98%; text-align: right;" type="text" value="0"/>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width: 70%;">
														<span class="smallBold">17</span>
														<span class="small">
															Finished Goods,Beginning</span>
													</td>
													<td align="center" class="tblFormTd" style="width: 30%;">
														<input id="frm1702RT:txtPg3Sc2I17FinishedGoods" name="frm1702RT:txtPg3Sc2I17FinishedGoods" maxlength="12" onblur="checkNumValue(this); P3Sc2(); this.value=addCommas(this.value);" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align: right;" type="text" value="0"/>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width: 70%;">
														<span class="smallBold">18</span>
														<span class="small">
															Less:Finished Goods, Ending</span>
													</td>
													<td align="center" class="tblFormTd" style="width: 30%;">
														<input id="frm1702RT:txtPg3Sc2I18LessFinishGoods" name="frm1702RT:txtPg3Sc2I18LessFinishGoods" maxlength="12" onblur="checkNumValue(this); P3Sc2(); this.value=addCommas(this.value);" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align: right;" type="text" value="0"/>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width: 70%;">
														<span class="smallBold">19</span>
														<span style="font-size: small; font-weight: bold;">Cost of Goods
															Manufactured and Sold</span>
														<span style="font-style: italic; font-size: x-small;">(Sum of Items 16 &
															17 Less Item 18)(To Schedule 2 Item 27)</span>
													</td>
													<td align="center" class="tblFormTd" style="width: 30%;">
														<input disabled="disabled" id="frm1702RT:txtPg3Sc2I19CostOfGoods" name="frm1702RT:txtPg3Sc2I19CostOfGoods" maxlength="12" onkeypress="return wholenumber(this, event)" style="width:98%; text-align: right;" type="text" value="0"/>
													</td>
												</tr>
											</table>
										</div>
										<div id="P3Schedule2C" style="margin: 0 auto; position: relative; top: 0px; left: 1px;">
											<table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="100%">
												<tr>
													<td align="left" class="tblFormTd" style="width: 100%;border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
														<center>
															<span class="smallBold">Schedule 2C - Cost of Services</span><br/>
															<span class="smallerBold">(For those engaged in Services,Indicate only
																those directly incurred or related to the gross revenue from rendition
																of services)</span>
														</center>
													</td>
												</tr>
											</table>
											<table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="100%">
												<tr>
													<td align="left" class="tblFormTd" style="width: 70%;">
														<span class="smallBold">20</span>
														<span class="small">
															Direct Charges - Salaries, Wages and Benefits</span>
													</td>
													<td align="center" class="tblFormTd" style="width: 30%;">
														<input id="frm1702RT:txtPg3Sc2I20DirectSalaries" name="frm1702RT:txtPg3Sc2I20DirectSalaries" maxlength="12" onblur="checkNumValue(this); P3Sc2(); this.value=addCommas(this.value);" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align:right" type="text" value="0"/>
													</td>
												</tr>
												<tr>
													<td align="left" class="tblFormTd" style="width: 70%;">
														<span class="smallBold">21</span>
														<span class="small">Direct Charges - Materials, Supplies and
															Facilities</span>
													</td>
													<td align="center" class="tblFormTd" style="width: 30%;">
														<input id="frm1702RT:txtPg3Sc2I21DirectMaterials" name="frm1702RT:txtPg3Sc2I21DirectMaterials" maxlength="12" onblur="checkNumValue(this); P3Sc2(); this.value=addCommas(this.value);" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align: right;" type="text" value="0"></td>
													</tr>
													<tr>
														<td align="left" class="tblFormTd" style="width: 70%;">
															<span class="smallBold">22</span>
															<span class="small">Direct Charges - Depreciation</span>
														</td>
														<td align="center" class="tblFormTd" style="width: 30%;">
															<input id="frm1702RT:txtPg3Sc2I22DirectDepreciation" name="frm1702RT:txtPg3Sc2I22DirectDepreciation" maxlength="12" onblur="checkNumValue(this); P3Sc2(); this.value=addCommas(this.value);" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align: right;" type="text" value="0"/>
														</td>
													</tr>
													<tr>
														<td align="left" class="tblFormTd" style="width: 70%;">
															<span class="smallBold">23</span>
															<span class="small">Direct Charges - Rental</span>
														</td>
														<td align="center" class="tblFormTd" style="width: 30%;">
															<input id="frm1702RT:txtPg3Sc2I23DirectRental" name="frm1702RT:txtPg3Sc2I23DirectRental" maxlength="12" onblur="checkNumValue(this); P3Sc2(); this.value=addCommas(this.value);" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align: right;" type="text" value="0"/>
														</td>
													</tr>
													<tr>
														<td align="left" class="tblFormTd" style="width: 70%;">
															<span class="smallBold">24</span>
															<span class="small">Direct Charges - Outside Services</span>
														</td>
														<td align="center" class="tblFormTd" style="width: 30%;">
															<input id="frm1702RT:txtPg3Sc2I24DirectOutside" name="frm1702RT:txtPg3Sc2I24DirectOutside" maxlength="12" onblur="checkNumValue(this); P3Sc2(); this.value=addCommas(this.value);" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align: right;" type="text" value="0"/>
														</td>
													</tr>
													<tr>
														<td align="left" class="tblFormTd" style="width: 70%;">
															<span class="smallBold">25</span>
															<span class="small">
																Direct Charges - Others</span>
														</td>
														<td align="center" class="tblFormTd" style="width: 30%;">
															<input id="frm1702RT:txtPg3Sc2I25DirectOthers" name="frm1702RT:txtPg3Sc2I25DirectOthers" maxlength="12" onblur="checkNumValue(this); P3Sc2(); this.value=addCommas(this.value);" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align: right;" type="text" value="0"/>
														</td>
													</tr>
													<tr>
														<td align="left" class="tblFormTd" style="width: 70%;">
															<span class="smallBold">26</span>
															<span class="smallBold">Total Cost Services
															</span>
															<span class="smallerItalic">
																(Sum of Items 20 to 25)(To Item 27)</span>
														</td>
														<td align="center" class="tblFormTd" style="width: 30%;">
															<input disabled="disabled" id="frm1702RT:txtPg3Sc2I26TotalService" name="frm1702RT:txtPg3Sc2I26TotalService" maxlength="12" onkeypress="return wholenumber(this, event)" style="width:98%; text-align: right;" type="text" value="0"/>
														</td>
													</tr>
													<tr>
														<td align="left" class="tblFormTd" style="width: 70%;">
															<span class="smallBold">27</span>
															<span class="smallBold">Total Cost of Sales/Services</span>
															<span class="smallerItalic">(Sum of Items 5,19 & 26 if
																applicable)</span>
															<a href="#" class="smallBold" onclick="goTo(2); window.scrollTo(0,50);">(To Part IV Item 31)</a>
														</td>
														<td align="center" class="tblFormTd" style="width: 30%;">
															<input disabled="disabled" id="frm1702RT:txtPg3Sc2I27TotalSales" name="frm1702RT:txtPg3Sc2I27TotalSales" maxlength="12" onkeypress="return wholenumber(this, event)" style="width:98%; text-align: right;" type="text" value="0"/>
														</td>
													</tr>
												</table>
											</div>
									</div>
									<!--Page 4-->
	                                <div id="Page4Content" style="display:none">
										<table border="0" cellpadding="0" cellspacing="0" width="826px">
											<tr>
												<td>
													<div id="Page4Header" style="margin: 0 auto; position: relative; width: 826px; ">
														<table border="0" cellpadding="0" cellspacing="0" class="FormHeader" width="100%">
															<tr>
																<td align="center" style="width:40%;">
																	<span class="xlargeBold">Annual Income Tax Return</span>
																	<br/>
																	<span class="smallBold">Page 4 - Schedules 3 & 4</span>
																</td>
																<td align="center" style="width:20%;">
																	<span class="xsmall">Bir Form No.</span><br/>
																	<span class="xlargeBold">1702-RT</span><br/>
																	<span class="xsmall">June 2013</span>
																</td>
																<td align="right" valign="bottom">
																	<div style="float: right">
																		<img alt="" src="{{ asset('images/1702RT_BarCode/1702-RT06_13P4.png') }}" style="height:35px; width:250px"/>
																		<br/>
																		<span class="xsmallBold">1702-RT06/13P4</span>
																	</div>
																</td>
															</tr>
														</table>
													</div>
													<div id="divPage4" style="margin: 0 auto; position: relative; width: 826px;">
														<table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="100%">
															<tr>
																<td align="left" class="tblFormTd">
																	<span class="smallBold">Taxpayer Identification Number(TIN)</span>
																</td>
																<td align="left" class="tblFormTd" style="width:65%;">
																	<span class="smallBold">Registered Name</span>
																</td>
															</tr>
															<tr>
																<td style="width:40%;">
																	<input disabled="disabled" id="frm1702RT:txtPg4TIN1" maxlength="3" name="frm1702RT:txtTIN1" size="6" style="text-align:center" type="text" value="{{$company->tin1}}"/>
																	<input disabled="disabled" id="frm1702RT:txtPg4TIN2" maxlength="3" name="frm1702RT:txtTIN2" size="6" style="text-align:center" type="text" value="{{$company->tin2}}"/>
																	<input disabled="disabled" id="frm1702RT:txtPg4TIN3" maxlength="3" name="frm1702RT:txtTIN3" size="6" style="text-align:center" type="text" value="{{$company->tin3}}"/>
																	<input disabled="disabled" id="frm1702RT:txtPg4TIN4" maxlength="3" name="frm1702RT:txtTIN4" size="6" style="text-align:center; display:none" type="text" value="{{$company->tin4}}"/>
																	<input disabled="disabled" id="txtBranchMaskP4" name="txtBranchMaskP4" size="4" style="text-align:center" value="0000"/>
																</td>
																<td align="left" style="width:60%;">
																	<input disabled="disabled" id="frm1702RT:txtPg4RegisteredName" style="width: 100%" maxlength="24" name="frm1702RT:txtRegisteredName" size="77" type="text" value="{{$company->registered_name}}"/>
																</td>
															</tr>
														</table>
													</div>
												</td>
											</tr>
											<!--End of Header section-->
											<!--Schedule 3-->
											<tr>
												<td>
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
																<table border="0" cellpadding="0" cellspacing="0" class="center">
																	<tr>
																		<td>
																			<span class="smallBold">Schedule 3 - Other Taxable Income Not Subjected
																				to Final Tax</span>
																			<span class="xsmallItalic">(Attach additional sheet/s, if
																				necessary)</span>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">1</td>
																		<td width="64%">
																			<input id="frm1702RT:txtPg4Sc3I1OtherTaxIncome" maxlength="50" name="frm1702RT:txtPg4Sc3I1OtherTaxIncome" onblur="capitalize(this),enableCompleteRows('txtPg4Sc3I1OtherTaxIncome','txtPg4Sc3I1OtherTaxAmount', 'frm1702RT:txtPg4Sc3I2OtherTaxIncome,frm1702RT:txtPg4Sc3I2OtherTaxAmount')" onkeypress="return Name(this, event);" style="width:100%" type="text" value=""/>
																		</td>
																		<td width="3%"/>
																		<td width="30%">
																			<input id="frm1702RT:txtPg4Sc3I1OtherTaxAmount" maxlength="12" name="frm1702RT:txtPg4Sc3I1OtherTaxAmount" onblur="checkNumValue(this),this.value=addCommas(this.value),Sc3(),enableCompleteRows('txtPg4Sc3I1OtherTaxIncome','txtPg4Sc3I1OtherTaxAmount', 'frm1702RT:txtPg4Sc3I2OtherTaxIncome,frm1702RT:txtPg4Sc3I2OtherTaxAmount')" onfocus="this.value=WholeNumWithComma(this.value)"  onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">2</td>
																		<td width="64%">
																			<input id="frm1702RT:txtPg4Sc3I2OtherTaxIncome" maxlength="50" name="frm1702RT:txtPg4Sc3I2OtherTaxIncome" onblur="capitalize(this),enableCompleteRows('txtPg4Sc3I2OtherTaxIncome','txtPg4Sc3I2OtherTaxAmount', 'frm1702RT:txtPg4Sc3I3C1,frm1702RT:txtPg4Sc3I3C2')" onkeypress="return Name(this, event);" style="width:100%" type="text" value="" disabled="disabled"/>
																		</td>
																		<td width="3%"/>
																		<td width="30%">
																			<input id="frm1702RT:txtPg4Sc3I2OtherTaxAmount" maxlength="12" name="frm1702RT:txtPg4Sc3I2OtherTaxAmount" onblur="checkNumValue(this),this.value=addCommas(this.value),Sc3(),enableCompleteRows('txtPg4Sc3I2OtherTaxIncome','txtPg4Sc3I2OtherTaxAmount', 'frm1702RT:txtPg4Sc3I3C1,frm1702RT:txtPg4Sc3I3C2')" onfocus="this.value=WholeNumWithComma(this.value)"  onkeypress="return wholenumber(this, event)" style="width:98%;text-align: right" type="text" value="0" disabled="disabled"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">3</td>
																		<td width="64%">
																			<input id="frm1702RT:txtPg4Sc3I3C1" maxlength="45" name="frm1702RT:txtPg4Sc3I3OtherTaxIncome" onblur="capitalize(this),enableCompleteRows('txtPg4Sc3I3C1','txtPg4Sc3I3C2','btnPg4Sc3I3More')" onkeypress="return Name(this, event);" style="width:85%" type="text" value="" disabled="disabled"/>
																			<input id="btnPg4Sc3I3More" name="moreButton" onclick="loadModalTable(this)" onkeypress="return wholenumber(this, event)" type="button" value="(Add more...)" />
																			
																		</td>
																		<td width="3%"/>
																		<td width="30%">
																			<input id="frm1702RT:txtPg4Sc3I3C2" maxlength="12" name="frm1702RT:txtPg4Sc3I3OtherTaxAmount" onblur="checkNumValue(this),Sc3(),enableCompleteRows('txtPg4Sc3I3C1','txtPg4Sc3I3C2','btnPg4Sc3I3More')" onfocus="this.value=WholeNumWithComma(this.value)"  onkeypress="return wholenumber(this, event)" style="width:98%;text-align: right" type="text" value="0" disabled="disabled"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td width="70%">
																			<span class="xsmallBold" style="margin-left:10px">4 Total Other Taxable
																				Income Not Subjected to Final Tax</span>
																			<span class="xsmallItalic">(Sum of Items 1 to 3)</span>
																			<a href="#" name="navButton" class="xsmallBold" onclick="goTo(2)">(To Part IV Item 33)</a>
																		</td>
																		<td width="30%">
																			<input disabled="disabled" id="frm1702RT:txtPg4Sc3I4OtherTaxTotalAmount" maxlength="12" name="frm1702RT:txtPg4Sc3I4OtherTaxTotalAmount" style="width: 98%; text-align: right" type="text" value="0"/>
																		</td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<!--End of Schedule 3-->
											<!--Schedule 4-->
											<tr>
												<td>
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
																<table border="0" cellpadding="0" cellspacing="0" class="center">
																	<tr>
																		<td>
																			<span class="smallBold">Schedule 4 - Ordinary Allowable Itemized
																				Deductions</span>
																			<span class="xsmallItalic">(Attach additional sheet/s, if
																				necessary)</span>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">1</td>
																		<td class="small" width="67%">Advertising and Promotions</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg4Sc4I1Advertising" maxlength="12" name="frm1702RT:txtPg4Sc4I1Advertising" onblur="checkNumValue(this); this.value=addCommas(this.value); computeP5Sc4I40TotalOrdinaryAllowable()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width: 98%; text-align: right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td width="3%"/>
																		<td width="97%">
																			<span class="small">Amortizations</span>
																			<span class="xsmallItalic">(Specify on Items 2, 3 & 4)</span>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">2</td>
																		<td width="64%">
																			<input id="frm1702RT:txtPg4Sc4I2Amortization" maxlength="50" name="frm1702RT:txtPg4Sc4I2Amortization" onblur="capitalize(this),enableCompleteRows('txtPg4Sc4I2Amortization','txtPg4Sc4I2AmortizationAmount', 'frm1702RT:txtPg4Sc4I3Amortization,frm1702RT:txtPg4Sc4I3AmortizationAmount')" onkeypress="return Name(this, event);" style="width:100%" type="text" value=""/>
																		</td>
																		<td width="3%"/>
																		<td width="30%">
																			<input id="frm1702RT:txtPg4Sc4I2AmortizationAmount" maxlength="12" name="frm1702RT:txtPg4Sc4I2AmortizationAmount" onblur="checkNumValue(this),this.value=addCommas(this.value),computeP5Sc4I40TotalOrdinaryAllowable(),enableCompleteRows('txtPg4Sc4I2Amortization','txtPg4Sc4I2AmortizationAmount', 'frm1702RT:txtPg4Sc4I3Amortization,frm1702RT:txtPg4Sc4I3AmortizationAmount')" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">3</td>
																		<td width="64%">
																			<input id="frm1702RT:txtPg4Sc4I3Amortization" maxlength="50" name="frm1702RT:txtPg4Sc4I3Amortization" onblur="capitalize(this),enableCompleteRows('txtPg4Sc4I3Amortization','txtPg4Sc4I3AmortizationAmount', 'frm1702RT:txtPg4Sc4I4C1,frm1702RT:txtPg4Sc4I4C2')" onkeypress="return Name(this, event);" style="width:100%" type="text" value="" disabled="disabled"/>
																		</td>
																		<td width="3%"/>
																		<td width="30%">
																			<input id="frm1702RT:txtPg4Sc4I3AmortizationAmount" maxlength="12" name="frm1702RT:txtPg4Sc4I3AmortizationAmount" onblur="checkNumValue(this),this.value=addCommas(this.value),computeP5Sc4I40TotalOrdinaryAllowable(),enableCompleteRows('txtPg4Sc4I3Amortization','txtPg4Sc4I3AmortizationAmount', 'frm1702RT:txtPg4Sc4I4C1,frm1702RT:txtPg4Sc4I4C2')" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0" disabled="disabled"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">4</td>
																		<td width="64%">
																			<input id="frm1702RT:txtPg4Sc4I4C1" maxlength="45" name="frm1702RT:txtPg4Sc4I4Amortization" onblur="capitalize(this),enableCompleteRows('txtPg4Sc4I4C1','txtPg4Sc4I4C2', 'btnPg4Sc4I4More')" onkeypress="return Name(this, event);" style="width:85%;" type="text" disabled="disabled"/>
																			<input disabled="disabled" id="btnPg4Sc4I4More" name="moreButton" onclick="loadModalTable(this)" onkeypress="return wholenumber(this, event)" type="button" value="(Add more...)"/>
																	
																		</td>
																		<td width="3%"/>
																		<td width="30%">
																			<input id="frm1702RT:txtPg4Sc4I4C2" maxlength="12" name="frm1702RT:txtPg4Sc4I4AmortizationAmount" onblur="checkNumValue(this),this.value=addCommas(this.value),computeP5Sc4I40TotalOrdinaryAllowable(),enableCompleteRows('txtPg4Sc4I4C1','txtPg4Sc4I4C2', 'btnPg4Sc4I4More')" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width: 98%; text-align: right" type="text" value="0" disabled="disabled"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">5</td>
																		<td class="small" width="67%">Bad Debts</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg4Sc4I5BadDebts" maxlength="12" name="frm1702RT:txtPg4Sc4I5BadDebts" onblur="checkNumValue(this); this.value=addCommas(this.value); computeP5Sc4I40TotalOrdinaryAllowable()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width: 98%; text-align: right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">6</td>
																		<td class="small" width="67%">Charitable Contributions</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg4Sc4I6CharitableContributions" maxlength="12" name="frm1702RT:txtPg4Sc4I6CharitableContributions" onblur="checkNumValue(this); this.value=addCommas(this.value); computeP5Sc4I40TotalOrdinaryAllowable()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width: 98%; text-align: right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">7</td>
																		<td class="small" width="67%">Commissions</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg4Sc4I7Commissions" maxlength="12" name="frm1702RT:txtPg4Sc4I7Commissions" onblur="checkNumValue(this); this.value=addCommas(this.value); computeP5Sc4I40TotalOrdinaryAllowable()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width: 98%; text-align: right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">8</td>
																		<td class="small" width="67%">Communication, Light and Water</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg4Sc4I8Communication" maxlength="12" name="frm1702RT:txtPg4Sc4I8Communication" onblur="checkNumValue(this); this.value=addCommas(this.value); computeP5Sc4I40TotalOrdinaryAllowable()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width: 98%; text-align: right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">9</td>
																		<td class="small" width="67%">Depletion</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg4Sc4I9Depletion" maxlength="12" name="frm1702RT:txtPg4Sc4I9Depletion" onblur="checkNumValue(this); this.value=addCommas(this.value); computeP5Sc4I40TotalOrdinaryAllowable()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width: 98%; text-align: right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">10</td>
																		<td class="small" width="67%">Depreciation</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg4Sc4I10Depreciation" maxlength="12" name="frm1702RT:txtPg4Sc4I10Depreciation" onblur="checkNumValue(this); this.value=addCommas(this.value); computeP5Sc4I40TotalOrdinaryAllowable()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width: 98%; text-align: right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">11</td>
																		<td class="small" width="67%">Director's Fee</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg4Sc4I11DirectorsFee" maxlength="12" name="frm1702RT:txtPg4Sc4I11DirectorsFee" onblur="checkNumValue(this); this.value=addCommas(this.value); computeP5Sc4I40TotalOrdinaryAllowable()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width: 98%; text-align: right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">12</td>
																		<td class="small" width="67%">Fringe Benefits</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg4Sc4I12FringeBenefits" maxlength="12" name="frm1702RT:txtPg4Sc4I12FringeBenefits" onblur="checkNumValue(this); this.value=addCommas(this.value); computeP5Sc4I40TotalOrdinaryAllowable()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width: 98%; text-align: right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">13</td>
																		<td class="small" width="67%">Fuel and Oil</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg4Sc4I13Fuel" maxlength="12" name="frm1702RT:txtPg4Sc4I13Fuel" onblur="checkNumValue(this); this.value=addCommas(this.value); computeP5Sc4I40TotalOrdinaryAllowable()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width: 98%; text-align: right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">14</td>
																		<td class="small" width="67%">Insurance</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg4Sc4I14Insurance" maxlength="12" name="frm1702RT:txtPg4Sc4I14Insurance" onblur="checkNumValue(this); this.value=addCommas(this.value); computeP5Sc4I40TotalOrdinaryAllowable()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width: 98%; text-align: right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">15</td>
																		<td class="small" width="67%">Interest</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg4Sc4I15Interest" maxlength="12" name="frm1702RT:txtPg4Sc4I15Interest" onblur="checkNumValue(this); this.value=addCommas(this.value); computeP5Sc4I40TotalOrdinaryAllowable()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width: 98%; text-align: right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">16</td>
																		<td class="small" width="67%">Janitorial and Messengerial Services</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg4Sc4I16Janitorial" maxlength="12" name="frm1702RT:txtPg4Sc4I16Janitorial" onblur="checkNumValue(this); this.value=addCommas(this.value); computeP5Sc4I40TotalOrdinaryAllowable()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width: 98%; text-align: right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">17</td>
																		<td class="small" width="67%">Losses</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg4Sc4I17Losses" maxlength="12" name="frm1702RT:txtPg4Sc4I17Losses" onblur="checkNumValue(this); this.value=addCommas(this.value); computeP5Sc4I40TotalOrdinaryAllowable()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width: 98%; text-align: right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">18</td>
																		<td class="small" width="67%">Management and Consultancy Fee</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg4Sc4I18Management" maxlength="12" name="frm1702RT:txtPg4Sc4I18Management" onblur="checkNumValue(this); this.value=addCommas(this.value); computeP5Sc4I40TotalOrdinaryAllowable()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width: 98%; text-align: right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">19</td>
																		<td class="small" width="67%">Miscellaneous</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg4Sc4I19Miscellaneous" maxlength="12" name="frm1702RT:txtPg4Sc4I19Miscellaneous" onblur="checkNumValue(this); this.value=addCommas(this.value); computeP5Sc4I40TotalOrdinaryAllowable()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width: 98%; text-align: right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">20</td>
																		<td class="small" width="67%">Office Supplies</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg4Sc4I20OfficeSupplies" maxlength="12" name="frm1702RT:txtPg4Sc4I20OfficeSupplies" onblur="checkNumValue(this); this.value=addCommas(this.value); computeP5Sc4I40TotalOrdinaryAllowable()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width: 98%; text-align: right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">21</td>
																		<td class="small" width="67%">Other Services</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg4Sc4I21OtherServices" maxlength="12" name="frm1702RT:txtPg4Sc4I21OtherServices" onblur="checkNumValue(this); this.value=addCommas(this.value); computeP5Sc4I40TotalOrdinaryAllowable()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width: 98%; text-align: right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">22</td>
																		<td class="small" width="67%">Professional Fees</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg4Sc4I22ProfessionalFees" maxlength="12" name="frm1702RT:txtPg4Sc4I22ProfessionalFees" onblur="checkNumValue(this); this.value=addCommas(this.value); computeP5Sc4I40TotalOrdinaryAllowable()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width: 98%; text-align: right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">23</td>
																		<td class="small" width="67%">Rental</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg4Sc4I23Rental" maxlength="12" name="frm1702RT:txtPg4Sc4I23Rental" onblur="checkNumValue(this); this.value=addCommas(this.value); computeP5Sc4I40TotalOrdinaryAllowable()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width: 98%; text-align: right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">24</td>
																		<td class="small" width="67%">Repairs and Maintenance - (Labor or Labor
																			& Materials)</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg4Sc4I24Repairs" maxlength="12" name="frm1702RT:txtPg4Sc4I24Repairs" onblur="checkNumValue(this); this.value=addCommas(this.value); computeP5Sc4I40TotalOrdinaryAllowable()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width: 98%; text-align: right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">25</td>
																		<td class="small" width="67%">Repairs and Maintenance -
																			(Materials/Supplies)</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg4Sc4I25Repairs" maxlength="12" name="frm1702RT:txtPg4Sc4I25Repairs" onblur="checkNumValue(this); this.value=addCommas(this.value); computeP5Sc4I40TotalOrdinaryAllowable()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width: 98%; text-align: right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">26</td>
																		<td class="small" width="67%">Representation and Entertainment</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg4Sc4I26Representation" maxlength="12" name="frm1702RT:txtPg4Sc4I26Representation" onblur="checkNumValue(this); this.value=addCommas(this.value); computeP5Sc4I40TotalOrdinaryAllowable()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width: 98%; text-align: right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">27</td>
																		<td class="small" width="67%">Research and Development</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg4Sc4I27Research" maxlength="12" name="frm1702RT:txtPg4Sc4I27Research" onblur="checkNumValue(this); this.value=addCommas(this.value); computeP5Sc4I40TotalOrdinaryAllowable()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width: 98%; text-align: right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">28</td>
																		<td class="small" width="67%">Royalties</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg4Sc4I28Royalties" maxlength="12" name="frm1702RT:txtPg4Sc4I28Royalties" onblur="checkNumValue(this); this.value=addCommas(this.value); computeP5Sc4I40TotalOrdinaryAllowable()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width: 98%; text-align: right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">29</td>
																		<td class="small" width="67%">Salaries and Allowances</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg4Sc4I29Salaries" maxlength="12" name="frm1702RT:txtPg4Sc4I29Salaries" onblur="checkNumValue(this); this.value=addCommas(this.value); computeP5Sc4I40TotalOrdinaryAllowable()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width: 98%; text-align: right" type="text" value="0"/>
																		</td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<!--End of Schedule 4-->
										</table>
									</div>
									<!--Page 5-->
									<div id="Page5Content" style="display:none">
										<table border="0" cellpadding="0" cellspacing="0" width="826px">
											<!--Header section-->
											<tr>
												<td>
													<div id="Page5Header" style="margin: 0 auto; position: relative; width: 826px; ">
														<table border="0" cellpadding="0" cellspacing="0" class="FormHeader" width="100%">
															<tr>
																<td align="center" style="width:40%;">
																	<span class="xlargeBold">Annual Income Tax Return</span>
																	<br/>
																	<span class="smallBold">Page 5 - Schedules 4 to 6</span>
																</td>
																<td align="center" style="width:20%;">
																	<span class="xsmall">Bir Form No.</span><br/>
																	<span class="xlargeBold">1702-RT</span><br/>
																	<span class="xsmall">June 2013</span>
																</td>
																<td align="right" valign="bottom">
																	<div style="float: right">
																		<img alt="" src="{{ asset('images/1702RT_BarCode/1702-RT06_13P5.png') }}" style="height:35px; width:250px"/>
																		<br/>
																		<span class="xsmallBold">1702-RT06/13P5</span>
																	</div>
																</td>
															</tr>
														</table>
													</div>
													<div id="Div6" style="margin: 0 auto; position: relative; width: 826px; ">
														<table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="100%">
															<tr>
																<td align="left" class="tblFormTd">
																	<span class="smallBold">Taxpayer Identification Number(TIN)</span>
																</td>
																<td align="left" class="tblFormTd" style="width:65%;">
																	<span class="smallBold">Registered Name</span>
																</td>
															</tr>
															<tr>
																<td style="width:40%;">
																	<input disabled="disabled" id="frm1702RT:txtPg5TIN1" maxlength="3" name="frm1702RT:txtTIN1" size="6" style="text-align:center" type="text" value="{{$company->tin1}}"/>
																	<input disabled="disabled" id="frm1702RT:txtPg5TIN2" maxlength="3" name="frm1702RT:txtTIN2" size="6" style="text-align:center" type="text" value="{{$company->tin2}}"/>
																	<input disabled="disabled" id="frm1702RT:txtPg5TIN3" maxlength="3" name="frm1702RT:txtTIN3" size="6" style="text-align:center" type="text" value="{{$company->tin3}}"/>
																	<input disabled="disabled" id="frm1702RT:txtPg5BranchCode" maxlength="3" name="frm1702RT:txtTIN4" size="6" style="text-align:center; display:none" type="text" value="{{$company->tin4}}"/>
																	<input disabled="disabled" id="txtBranchMaskP5" name="txtBranchMaskP5" size="4" style="text-align:center" value="0000"/>
																</td>
																<td align="left" style="width:60%;">
																	<input disabled="disabled" style="width: 100%" id="frm1702RT:txtPg5RegisteredName" maxlength="24" name="frm1702RT:txtRegisteredName" size="77" type="text" value="{{$company->registered_name}}"/>
																</td>
															</tr>
														</table>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
																<table border="0" cellpadding="0" cellspacing="0" class="center">
																	<tr>
																		<td>
																			<span class="smallBold">Schedule 4 - Ordinary Allowable Itemized
																				Deduction</span>
																			<span class="smallItalic">(Continued from Previous Page)</span>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">30</td>
																		<td class="small" width="67%">Security Services</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg5Sc4I30SecurityServices" maxlength="12" name="frm1702RT:txtPg5Sc4I30SecurityServices" onblur="checkNumValue(this);computeP5Sc4I40TotalOrdinaryAllowable(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">31</td>
																		<td class="small" width="67%">SSS, GSIS, Philhealth, HDMF and Other
																			Contributions</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg5Sc4I31Contributions" maxlength="12" name="frm1702RT:txtPg5Sc4I31Contributions" onblur="checkNumValue(this);computeP5Sc4I40TotalOrdinaryAllowable(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">32</td>
																		<td class="small" width="67%">Taxes and Licenses</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg5Sc4I32TaxesandLicenses" maxlength="12" name="frm1702RT:txtPg5Sc4I32TaxesandLicenses" onblur="checkNumValue(this);computeP5Sc4I40TotalOrdinaryAllowable(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">33</td>
																		<td class="small" width="67%">Tolling Fees</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg5Sc4I33TollingFees" maxlength="12" name="frm1702RT:txtPg5Sc4I33TollingFees" onblur="checkNumValue(this);computeP5Sc4I40TotalOrdinaryAllowable(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">34</td>
																		<td class="small" width="67%">Training and Seminars</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg5Sc4I34TrainingandSeminars" maxlength="12" name="frm1702RT:txtPg5Sc4I34TrainingandSeminars" onblur="checkNumValue(this);computeP5Sc4I40TotalOrdinaryAllowable(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">35</td>
																		<td class="small" width="67%">Transportation and Travel</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg5Sc4I35TransportationandTravel" maxlength="12" name="frm1702RT:txtPg5Sc4I35TransportationandTravel" onblur="checkNumValue(this);computeP5Sc4I40TotalOrdinaryAllowable(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0"/>
																		</td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<!--Others-->
											<tr>
												<td>
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td width="3%"/>
																		<td width="97%">
																			<span class="small">Others</span>
																			<span class="xsmallItalic">[Specify below; Add additional sheet(s), if
																				necessary]</span>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">36</td>
																		<td class="small" width="64%">
																			<input id="frm1702RT:txtPg5Sc4I36C1" maxlength="50" name="frm1702RT:txtPg5Sc4I36C1" onblur="capitalize(this),enableCompleteRows('txtPg5Sc4I36C1','txtPg5Sc4I36C2', 'frm1702RT:txtPg5Sc4I37C1,frm1702RT:txtPg5Sc4I37C2')" onkeypress="return Name(this, event);" style="width:100%" type="text" value=""/>
																		</td>
																		<td class="smallBold" width="3%"></td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg5Sc4I36C2" maxlength="12" name="frm1702RT:txtPg5Sc4I36C2" onblur="checkNumValue(this),computeP5Sc4I40TotalOrdinaryAllowable(),this.value=addCommas(this.value),enableCompleteRows('txtPg5Sc4I36C1','txtPg5Sc4I36C2', 'frm1702RT:txtPg5Sc4I37C1,frm1702RT:txtPg5Sc4I37C2')" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">37</td>
																		<td class="small" width="64%">
																			<input id="frm1702RT:txtPg5Sc4I37C1" maxlength="50" name="frm1702RT:txtPg5Sc4I37C1" onblur="capitalize(this),enableCompleteRows('txtPg5Sc4I37C1','txtPg5Sc4I37C2', 'frm1702RT:txtPg5Sc4I38C1,frm1702RT:txtPg5Sc4I38C2')" onkeypress="return Name(this, event);" style="width:100%" type="text" value="" disabled="disabled"/>
																		</td>
																		<td class="smallBold" width="3%"></td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg5Sc4I37C2" maxlength="12" name="frm1702RT:txtPg5Sc4I37C2" onblur="checkNumValue(this),computeP5Sc4I40TotalOrdinaryAllowable(),this.value=addCommas(this.value),enableCompleteRows('txtPg5Sc4I37C1','txtPg5Sc4I37C2', 'frm1702RT:txtPg5Sc4I38C1,frm1702RT:txtPg5Sc4I38C2')" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0" disabled="disabled"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">38</td>
																		<td>
																			<input id="frm1702RT:txtPg5Sc4I38C1" maxlength="50" name="frm1702RT:txtPg5Sc4I38C1" onblur="capitalize(this),enableCompleteRows('txtPg5Sc4I38C1','txtPg5Sc4I38C2', 'frm1702RT:txtPg5Sc4I39C1,frm1702RT:txtPg5Sc4I39C2')" onkeypress="return Name(this, event);" style="width:100%" type="text" value="" disabled="disabled"/>
																		</td>
																		<td class="smallBold" width="3%"></td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg5Sc4I38C2" maxlength="12" name="frm1702RT:txtPg5Sc4I38C2" onblur="checkNumValue(this),computeP5Sc4I40TotalOrdinaryAllowable(),this.value=addCommas(this.value),enableCompleteRows('txtPg5Sc4I38C1','txtPg5Sc4I38C2', 'frm1702RT:txtPg5Sc4I39C1,frm1702RT:txtPg5Sc4I39C2')" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0" disabled="disabled"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">39</td>
																		<td class="small" width="64%">
																			<input id="frm1702RT:txtPg5Sc4I39C1" maxlength="45" name="frm1702RT:txtPg5Sc4I39C1" onblur="capitalize(this),enableCompleteRows('txtPg5Sc4I39C1','txtPg5Sc4I39C2', 'btnPg5Sc4I39More')" onkeypress="return Name(this, event);" style="width:85%" type="text" disabled="disabled"/>
																			<input disabled="disabled" id="btnPg5Sc4I39More" name="moreButton" onclick="loadModalTable(this)" onkeypress="return wholenumber(this, event)" type="button" value="(Add more...)"/>
																		</td>
																		<td class="smallBold" width="3%"></td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg5Sc4I39C2" maxlength="12" name="frm1702RT:txtPg5Sc4I39C2" onblur="checkNumValue(this),this.value=addCommas(this.value),computeP5Sc4I40TotalOrdinaryAllowable(),this.value=addCommas(this.value),enableCompleteRows('txtPg5Sc4I39C1','txtPg5Sc4I39C2', 'btnPg5Sc4I39More')" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0" disabled="disabled"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">40</td>
																		<td width="67%">
																			<span class="smallBold">Total Ordinary Allowable Itemized
																				Deductions</span>
																			<span class="xsmallItalic">(Sum of Items 1 to 39)</span>
																			<a href="#" name="navButton" onclick="goTo(2)" class="smallBold">(To part IV Item 35)</a>
																		</td>
																		<td width="30%">
																			<input disabled="disabled" id="frm1702RT:txtPg5Sc4I40TotalOrdinaryAllowable" maxlength="12" name="frm1702RT:txtPg5Sc4I40TotalOrdinaryAllowable" style="width:98%;text-align:right" type="text" value="0"/>
																		</td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<!--Schedule 5-->
											<tr>
												<td>
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
																<table border="0" cellpadding="0" cellspacing="0" class="center">
																	<tr>
																		<td>
																			<span class="smallBold">Schedule 5 - Special Allowable Itemized
																				Deductions</span>
																			<span class="xsmallItalic">(Attach additional sheet/s, if
																				necessary)</span>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr class="small" style="text-align:center">
																		<td style="width:50%">
																			<span>Description</span>
																		</td>
																		<td style="width:20%">
																			<span>Legal Basis</span>
																		</td>
																		<td style="width:30%">
																			<span>Amount</span>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">1</td>
																		<td width="47%">
																			<input id="frm1702RT:txtPg5Sc5I1C1" maxlength="37" name="frm1702RT:txtPg5Sc5I1C1" onblur="capitalize(this),enableCompleteRows('txtPg5Sc5I1C1,txtPg5Sc5I1C2','txtPg5Sc5I1C3', 'frm1702RT:txtPg5Sc5I2C1,frm1702RT:txtPg5Sc5I2C2,frm1702RT:txtPg5Sc5I2C3')" onkeypress="return Name(this, event);" style="width:100%" type="text" value=""/>
																		</td>
																		<td width="20%">
																			<input id="frm1702RT:txtPg5Sc5I1C2" maxlength="14" name="frm1702RT:txtPg5Sc5I1C2" onblur="capitalize(this),enableCompleteRows('txtPg5Sc5I1C1,txtPg5Sc5I1C2','txtPg5Sc5I1C3', 'frm1702RT:txtPg5Sc5I2C1,frm1702RT:txtPg5Sc5I2C2,frm1702RT:txtPg5Sc5I2C3')" onkeypress="return Name(this, event);" style="width:100%" type="text" value=""/>
																		</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg5Sc5I1C3" maxlength="12" name="frm1702RT:txtPg5Sc5I1C3" onblur="checkNumValue(this),computeP5Sc5I5TotalSpecialAllowable(),this.value=addCommas(this.value),enableCompleteRows('txtPg5Sc5I1C1,txtPg5Sc5I1C2','txtPg5Sc5I1C3', 'frm1702RT:txtPg5Sc5I2C1,frm1702RT:txtPg5Sc5I2C2,frm1702RT:txtPg5Sc5I2C3')" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">2</td>
																		<td width="47%">
																			<input id="frm1702RT:txtPg5Sc5I2C1" maxlength="37" name="frm1702RT:txtPg5Sc5I2C1" onblur="capitalize(this),enableCompleteRows('txtPg5Sc5I2C1,txtPg5Sc5I2C2','txtPg5Sc5I2C3', 'frm1702RT:txtPg5Sc5I3C1,frm1702RT:txtPg5Sc5I3C2,frm1702RT:txtPg5Sc5I3C3')" onkeypress="return Name(this, event);" style="width:100%" type="text" value="" disabled="disabled"/>
																		</td>
																		<td width="20%">
																			<input id="frm1702RT:txtPg5Sc5I2C2" maxlength="14" name="frm1702RT:txtPg5Sc5I2C2" onblur="capitalize(this),enableCompleteRows('txtPg5Sc5I2C1,txtPg5Sc5I2C2','txtPg5Sc5I2C3', 'frm1702RT:txtPg5Sc5I3C1,frm1702RT:txtPg5Sc5I3C2,frm1702RT:txtPg5Sc5I3C3')" onkeypress="return Name(this, event);" style="width:100%" type="text" value="" disabled="disabled"/>
																		</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg5Sc5I2C3" maxlength="12" name="frm1702RT:txtPg5Sc5I2C3" onblur="checkNumValue(this),computeP5Sc5I5TotalSpecialAllowable(),this.value=addCommas(this.value),enableCompleteRows('txtPg5Sc5I2C1,txtPg5Sc5I2C2','txtPg5Sc5I2C3', 'frm1702RT:txtPg5Sc5I3C1,frm1702RT:txtPg5Sc5I3C2,frm1702RT:txtPg5Sc5I3C3')" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0" disabled="disabled"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="70%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">3</td>
																		<td width="47%">
																			<input id="frm1702RT:txtPg5Sc5I3C1" maxlength="37" name="frm1702RT:txtPg5Sc5I3C1" onblur="capitalize(this),enableCompleteRows('txtPg5Sc5I3C1,txtPg5Sc5I3C2','txtPg5Sc5I3C3', 'frm1702RT:txtPg5Sc5I4C1,frm1702RT:txtPg5Sc5I4C2,frm1702RT:txtPg5Sc5I4C3')" onkeypress="return Name(this, event);" style="width:100%" type="text" value="" disabled="disabled"/>
																		</td>
																		<td width="20%">
																			<input id="frm1702RT:txtPg5Sc5I3C2" maxlength="14" name="frm1702RT:txtPg5Sc5I3C2" onblur="capitalize(this),enableCompleteRows('txtPg5Sc5I3C1,txtPg5Sc5I3C2','txtPg5Sc5I3C3', 'frm1702RT:txtPg5Sc5I4C1,frm1702RT:txtPg5Sc5I4C2,frm1702RT:txtPg5Sc5I4C3')" onkeypress="return Name(this, event);" style="width:100%" type="text" value="" disabled="disabled"/>
																		</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg5Sc5I3C3" maxlength="12" name="frm1702RT:txtPg5Sc5I3C3" onblur="checkNumValue(this),computeP5Sc5I5TotalSpecialAllowable(),this.value=addCommas(this.value),enableCompleteRows('txtPg5Sc5I3C1,txtPg5Sc5I3C2','txtPg5Sc5I3C3', 'frm1702RT:txtPg5Sc5I4C1,frm1702RT:txtPg5Sc5I4C2,frm1702RT:txtPg5Sc5I4C3')" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0" disabled="disabled"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">4</td>
																		<td width="47%">
																			<input id="frm1702RT:txtPg5Sc5I4C1" maxlength="26" name="frm1702RT:txtPg5Sc5I4C1" onblur="capitalize(this),enableCompleteRows('txtPg5Sc5I4C1,txtPg5Sc5I4C2','txtPg5Sc5I4C3', 'btnPg5Sc5I4More')" onkeypress="return Name(this, event);" style="width:80%" type="text" value="" disabled="disabled"/>
																			<input disabled="disabled" id="btnPg5Sc5I4More" name="moreButton" onclick="loadModalTable(this)" type="button" value="(Add more...)"/>
																		</td>
																		<td width="20%">
																			<input id="frm1702RT:txtPg5Sc5I4C2" maxlength="14" name="frm1702RT:txtPg5Sc5I4C2" onblur="capitalize(this),enableCompleteRows('txtPg5Sc5I4C1,txtPg5Sc5I4C2','txtPg5Sc5I4C3', 'btnPg5Sc5I4More')" onkeypress="return Name(this, event);" style="width:100%" type="text" value="" disabled="disabled"/>
																		</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg5Sc5I4C3" maxlength="12" name="frm1702RT:txtPg5Sc5I4C3" onblur="checkNumValue(this),computeP5Sc5I5TotalSpecialAllowable(),this.value=addCommas(this.value),enableCompleteRows('txtPg5Sc5I4C1,txtPg5Sc5I4C2','txtPg5Sc5I4C3', 'btnPg5Sc5I4More')" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0" disabled="disabled"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" width="3%">&nbsp; 5</td>
																		<td width="67%">
																			<span class="smallBold">Total Special Allowable Itemized
																				Deductions</span>
																			<span class="xsmallItalic" >(Sum of Items 1 to 4)</span>
																			<a href="#" class="smallBold" onclick="goTo(2)">(To part IV Item 36)</a>
																		</td>
																		<td width="30%">
																			<input disabled="disabled" id="frm1702RT:txtPg5Sc5I5TotalSpecialAllowable" maxlength="12" name="frm1702RT:txtPg5Sc5I5TotalSpecialAllowable" style="width:98%;text-align:right" type="text" value="0"/>
																		</td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<!--Schedule 6-->
											<tr>
												<td>
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
																<table border="0" cellpadding="0" cellspacing="0" class="center">
																	<tr>
																		<td>
																			<span class="smallBold">Schedule 6 - Computation of Net Operating Loss
																				Carry Over (NOLCO)</span>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">1</td>
																		<td width="67%">
																			<span class="small">Gross Income</span>
																			<a href="#" class="smallBold" name="navButton" onclick="goTo(2)">(From Part IV Item 34)</a>
																		</td>
																		<td width="30%">
																			<input disabled="disabled" id="frm1702RT:txtPg5Sc6I1GrossIncome" maxlength="12" name="frm1702RT:txtPg5Sc6I1GrossIncome" style="width:98%;text-align:right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">2</td>
																		<td class="small" width="67%">Less: Total Deductions Exclusive of NOLCO
																			& Deduction Under Special Law</td>
																		<td width="30%">
																			<input disabled="disabled" id="frm1702RT:txtPg5Sc6I2TotalDeductions" maxlength="12" name="frm1702RT:txtPg5Sc6I2TotalDeductions" onblur="checkNumValue(this),computePg5Sc6I3NetOperatingLoss(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">3</td>
																		<td width="67%">
																			<span class="small">Net Operating Loss</span>
																			<span class="smallItalic">(To Schedule 6A)</span>
																		</td>
																		<td width="30%">
																			<input disabled="disabled" id="frm1702RT:txtPg5Sc6I3NetOperatingLoss" maxlength="12" name="frm1702RT:txtPg5Sc6I3NetOperatingLoss" style="width:98%;text-align:right" type="text" value="0"/>
																		</td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<!--Schedule 6A-->
											<tr>
												<td>
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
																<table border="0" cellpadding="0" cellspacing="0" class="center">
																	<tr>
																		<td>
																			<span class="smallBold">Schedule 6A - Computation of Available Net
																				Operating Loss Carry Over (NOLCO)</span>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td align="center" class="small" colspan="2" width="70%">Net Operating
																			Loss</td>
																		<td align="center" class="small" rowspan="2" width="30%">B) NOLCO
																			Applied Previous Year</td>
																	</tr>
																	<tr>
																		<td align="center" class="small" width="20%">Year Incurred</td>
																		<td align="center" class="small" width="40%">A) Amount</td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<tr>
												<td>
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">4</td>
																		<td width="17%">
																			<input disabled="disabled" id="frm1702RT:txtPg5Sc6AI4C1" maxlength="4" name="frm1702RT:txtPg5Sc6AI4C1" onblur="checkYear(this);checkp5Sc6I3NetOperatingLoss()" onkeypress="return wholenumber(this, event)" style="width:100%;text-align:center;" type="text" value=""/>
																		</td>
																		<td width="6%"/>
																		<td width="38%">
																			<input disabled="disabled" id="frm1702RT:txtPg5Sc6AI4C2" maxlength="12" name="frm1702RT:txtPg5Sc6AI4C2" onblur="checkNumValue(this);computeP5Sc6AI4C6(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:100%;text-align:right" type="text" value="0"/>
																		</td>
																		<td width="6%">
																			<td width="30%">
																				<input disabled="disabled" id="frm1702RT:txtPg5Sc6AI4C3" maxlength="12" name="frm1702RT:txtPg5Sc6AI4C3" onblur="checkNumValue(this);computeP5Sc6AI4C6(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0"/>
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
														<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
															<tr>
																<td class="tblFormTd" width="100%">
																	<table border="0" cellpadding="0" cellspacing="0">
																		<tr>
																			<td class="smallBold" style="text-align:center" width="3%">5</td>
																			<td width="17%">
																				<input id="frm1702RT:txtPg5Sc6AI5C1" maxlength="4" name="frm1702RT:txtPg5Sc6AI5C1" onblur="checkYear(this),enableCompleteRows('txtPg5Sc6AI5C1','txtPg5Sc6AI5C2', 'frm1702RT:txtPg5Sc6AI6C1,frm1702RT:txtPg5Sc6AI6C2,frm1702RT:txtPg5Sc6AI6C3,frm1702RT:txtPg5Sc6AI6C4,frm1702RT:txtPg5Sc6AI6C5')" onkeypress="return wholenumber(this, event)" style="width:100%;text-align:center;" type="text" value=""/>
																			</td>
																			<td width="6%"/>
																			<td width="38%">
																				<input id="frm1702RT:txtPg5Sc6AI5C2" maxlength="12" name="frm1702RT:txtPg5Sc6AI5C2" onblur="checkNumValue(this),computeP5Sc6AI5C6(0),computeP5Sc6AI8TotalNOLCO(),this.value=addCommas(this.value),enableCompleteRows('txtPg5Sc6AI5C1','txtPg5Sc6AI5C2', 'frm1702RT:txtPg5Sc6AI6C1,frm1702RT:txtPg5Sc6AI6C2,frm1702RT:txtPg5Sc6AI6C3,frm1702RT:txtPg5Sc6AI6C4,frm1702RT:txtPg5Sc6AI6C5')" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:100%;text-align:right" type="text" value="0"/>
																			</td>
																			<td width="6%"/>
																			<td width="30%">
																				<input id="frm1702RT:txtPg5Sc6AI5C3" maxlength="12" name="frm1702RT:txtPg5Sc6AI5C3" onblur="checkNumValue(this),computeP5Sc6AI5C6(this),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0"/>
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
														<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
															<tr>
																<td class="tblFormTd" width="100%">
																	<table border="0" cellpadding="0" cellspacing="0">
																		<tr>
																			<td class="smallBold" style="text-align:center" width="3%">6</td>
																			<td width="17%">
																				<input id="frm1702RT:txtPg5Sc6AI6C1" maxlength="4" name="frm1702RT:txtPg5Sc6AI6C1" onblur="checkYear(this),enableCompleteRows('txtPg5Sc6AI6C1','txtPg5Sc6AI6C2', 'frm1702RT:txtPg5Sc6AI7C1,frm1702RT:txtPg5Sc6AI7C2,frm1702RT:txtPg5Sc6AI7C3,frm1702RT:txtPg5Sc6AI7C4,frm1702RT:txtPg5Sc6AI7C5')" onkeypress="return wholenumber(this, event)" style="width:100%;text-align:center;" type="text" value="" disabled="disabled"/>
																			</td>
																			<td width="6%"/>
																			<td width="38%">
																				<input id="frm1702RT:txtPg5Sc6AI6C2" maxlength="12" name="frm1702RT:txtPg5Sc6AI6C2" onblur="checkNumValue(this),computeP5Sc6AI6C6(0),computeP5Sc6AI8TotalNOLCO(),this.value=addCommas(this.value),enableCompleteRows('txtPg5Sc6AI6C1','txtPg5Sc6AI6C2', 'frm1702RT:txtPg5Sc6AI7C1,frm1702RT:txtPg5Sc6AI7C2,frm1702RT:txtPg5Sc6AI7C3,frm1702RT:txtPg5Sc6AI7C4,frm1702RT:txtPg5Sc6AI7C5')" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:100%;text-align:right" type="text" value="0" disabled="disabled"/>
																			</td>
																			<td width="6%"/>
																			<td width="30%">
																				<input id="frm1702RT:txtPg5Sc6AI6C3" maxlength="12" name="frm1702RT:txtPg5Sc6AI6C3" onblur="checkNumValue(this),computeP5Sc6AI6C6(this),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0" disabled="disabled"/>
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
														<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
															<tr>
																<td class="tblFormTd" width="100%">
																	<table border="0" cellpadding="0" cellspacing="0">
																		<tr>
																			<td class="smallBold" style="text-align:center" width="3%">7</td>
																			<td width="17%">
																				<input id="frm1702RT:txtPg5Sc6AI7C1" maxlength="4" name="frm1702RT:txtPg5Sc6AI7C1" onblur="checkYear(this),enableCompleteRows('txtPg5Sc6AI7C1','txtPg5Sc6AI7C2', 'btnPg5Sc6AI7More')" onkeypress="return wholenumber(this, event)" style="width:100%;text-align:center;" type="text" value="" disabled="disabled"/>
																			</td>
																			<td width="6%"/>
																			<td width="44%">
																				<input id="frm1702RT:txtPg5Sc6AI7C2" maxlength="12" name="frm1702RT:txtPg5Sc6AI7C2" onblur="checkNumValue(this),computeP5Sc6AI7C6(0),computeP5Sc6AI8TotalNOLCO(),this.value=addCommas(this.value),enableCompleteRows('txtPg5Sc6AI7C1','txtPg5Sc6AI7C2', 'btnPg5Sc6AI7More')" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:86%;text-align:right" type="text" value="0" disabled="disabled"/>
																				<input class="xsmall" disabled="disabled" id="btnPg5Sc6AI7More" name="moreButton" onclick="loadModalTable(this)" style="width:11%;visibility:hidden" type="button" value="(Add more...)"/>
																			</td>
																			<td width="30%">
																				<input id="frm1702RT:txtPg5Sc6AI7C3" maxlength="12" name="frm1702RT:txtPg5Sc6AI7C3" onblur="checkNumValue(this),computeP5Sc6AI7C6(this),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0" disabled="disabled"/>
																			</td>
																		</tr>
																	</table>
																</td>
															</tr>
														</table>
													</td>
												</tr>
												<!--Continuation of 6A-->
												<tr>
													<td>
														<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
															<tr>
																<td class="tblFormTd" valign="top" width="100%">
																	<table border="0" cellpadding="0" cellspacing="0">
																		<tr>
																			<td width="100%">
																				<span class="small">Continuation of Schedule 6A</span>
																				<span class="xsmallItalic">(Item numbers continue from table
																					above)</span>
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
														<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
															<tr>
																<td class="tblFormTd" width="100%">
																	<table border="0" cellpadding="0" cellspacing="0">
																		<tr class="small" style="text-align:center">
																			<td style="width:3%"></td>
																			<td style="width:37%">
																				<span>C) NOLCO Expired</span>
																			</td>
																			<td style="width:30%">
																				<span>D) NOLCO Applied Current Year</span>
																			</td>
																			<td style="width:30%">
																				<span>E) Net Operating Loss (Unapplied)</span>
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
														<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
															<tr>
																<td class="tblFormTd" width="100%">
																	<table border="0" cellpadding="0" cellspacing="0">
																		<tr>
																			<td class="smallBold" style="text-align:center" width="3%">4</td>
																			<td width="37%">
																				<input disabled="disabled" id="frm1702RT:txtPg5Sc6AI4C4" maxlength="12" name="frm1702RT:txtPg5Sc6AI4C4" onblur="checkNumValue(this),computeP5Sc6AI4C6(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align:right" type="text" value="0"/>
																			</td>
																			<td width="30%">
																				<input disabled="disabled" id="frm1702RT:txtPg5Sc6AI4C5" maxlength="12" name="frm1702RT:txtPg5Sc6AI4C5" onblur="checkNumValue(this),computeP5Sc6AI8TotalNOLCO(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align:right" type="text" value="0"/>
																			</td>
																			<td width="30%">
																				<input disabled="disabled" id="frm1702RT:txtPg5Sc6AI4C6" maxlength="12" name="frm1702RT:txtPg5Sc6AI4C6" style="width:98%;text-align:right" type="text" value="0"/>
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
														<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
															<tr>
																<td class="tblFormTd" width="100%">
																	<table border="0" cellpadding="0" cellspacing="0">
																		<tr>
																			<td class="smallBold" style="text-align:center" width="3%">5</td>
																			<td width="37%">
																				<input id="frm1702RT:txtPg5Sc6AI5C4" maxlength="12" name="frm1702RT:txtPg5Sc6AI5C4" onblur="checkNumValue(this),computeP5Sc6AI5C6(this),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align:right" type="text" value="0"/>
																			</td>
																			<td width="30%">
																				<input id="frm1702RT:txtPg5Sc6AI5C5" maxlength="12" name="frm1702RT:txtPg5Sc6AI5C5" onblur="checkNumValue(this),computeP5Sc6AI8TotalNOLCO(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align:right" type="text" value="0"/>
																			</td>
																			<td width="30%">
																				<input disabled="disabled" id="frm1702RT:txtPg5Sc6AI5C6" maxlength="12" name="frm1702RT:txtPg5Sc6AI5C6" style="width:98%;text-align:right" type="text" value="0"/>
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
														<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
															<tr>
																<td class="tblFormTd" width="100%">
																	<table border="0" cellpadding="0" cellspacing="0">
																		<tr>
																			<td class="smallBold" style="text-align:center" width="3%">6</td>
																			<td width="37%">
																				<input id="frm1702RT:txtPg5Sc6AI6C4" maxlength="12" name="frm1702RT:txtPg5Sc6AI6C4" onblur="checkNumValue(this),computeP5Sc6AI6C6(this),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align:right" type="text" value="0" disabled="disabled"/>
																			</td>
																			<td width="30%">
																				<input id="frm1702RT:txtPg5Sc6AI6C5" maxlength="12" name="frm1702RT:txtPg5Sc6AI6C5" onblur="checkNumValue(this),computeP5Sc6AI8TotalNOLCO(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align:right" type="text" value="0" disabled="disabled"/>
																			</td>
																			<td width="30%">
																				<input disabled="disabled" id="frm1702RT:txtPg5Sc6AI6C6" maxlength="12" name="frm1702RT:txtPg5Sc6AI6C6" style="width:98%;text-align:right" type="text" value="0"/>
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
														<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
															<tr>
																<td class="tblFormTd" width="100%">
																	<table border="0" cellpadding="0" cellspacing="0">
																		<tr>
																			<td class="smallBold" style="text-align:center" width="3%">7</td>
																			<td width="37%">
																				<input id="frm1702RT:txtPg5Sc6AI7C4" maxlength="12" name="frm1702RT:txtPg5Sc6AI7C4" onblur="checkNumValue(this),computeP5Sc6AI7C6(this),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align:right" type="text" value="0" disabled="disabled"/>
																			</td>
																			<td width="30%">
																				<input id="frm1702RT:txtPg5Sc6AI7C5" maxlength="12" name="frm1702RT:txtPg5Sc6AI7C5" onblur="checkNumValue(this),computeP5Sc6AI8TotalNOLCO(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align:right" type="text" value="0" disabled="disabled"/>
																			</td>
																			<td width="30%">
																				<input disabled="disabled" id="frm1702RT:txtPg5Sc6AI7C6" maxlength="12" name="frm1702RT:txtPg5Sc6AI7C6" style="width:98%;text-align:right" type="text" value="0"/>
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
														<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
															<tr>
																<td class="tblFormTd" width="100%">
																	<table border="0" cellpadding="0" cellspacing="0">
																		<tr>
																			<td style="width:3%;text-align:center;"class="smallBold">8</td>
																			<td style="width:37%">
																				<span class="smallBold">Total NOLCO</span>
																				<span class="xsmallItalic">(Sum of Items 4D to 7D)</span>
																				<a href="#" class="smallBold"  onclick="goTo(2)">(To Part IV Item 37)</a>
																			</td>
																			<td style="width:30%">
																				<input disabled="disabled" id="frm1702RT:txtPg5Sc6AI8TotalNOLCO" maxlength="12" name="frm1702RT:txtPg5Sc6AI8TotalNOLCO" style="width:98%; text-align:right" type="text" value="0"/>
																			</td>
																			<td width="30%"/>
																		</tr>
																	</table>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
									</div>
									<!-- Page 6-->
	                                <div id="Page6Content" style="display:none">
										<table border="0" cellpadding="0" cellspacing="0" style="margin:0; width=826px;">
											<!--Header section-->
											<tr>
												<td>
													<div id="Page6Header" style="margin: 0 auto; position: relative; width: 826px; ">
														<table border="0" cellpadding="0" cellspacing="0" width="100%">
															<tr>
																<td align="center" style="width:40%;">
																	<span class="xlargeBold">Annual Income Tax Return</span>
																	<br/>
																	<span class="smallBold">Page 6 - Schedules 7, 8 &amp; 9</span>
																</td>
																<td align="center" style="width:20%;">
																	<span class="xsmall">Bir Form No.</span><br/>
																	<span class="xlargeBold">1702-RT</span><br/>
																	<span class="xsmall">June 2013</span>
																</td>
																<td align="right" valign="bottom">
																	<div style="float: right">
																		<img alt="" src="{{ asset('images/1702RT_BarCode/1702-RT06_13P6.png') }}" style="height:35px; width:250px"/>
																		<br/>
																		<span class="xsmallBold">1702-RT06/13P6</span>
																	</div>
																</td>
															</tr>
														</table>
													</div>
													<div id="divPage6Header" style="margin: 0 auto; position: relative; width: 826px; ">
														<table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="100%">
															<tr>
																<td align="left" class="tblFormTd">
																	<span class="smallBold">Taxpayer Identification Number(TIN)</span>
																</td>
																<td align="left" class="tblFormTd" style="width:65%;">
																	<span class="smallBold">Registered Name</span>
																</td>
															</tr>
															<tr>
																<td style="width:40%;">
																	<input disabled="disabled" id="frm1702RT:txtPg6TIN1" maxlength="3" name="frm1702RT:txtTIN1" size="6" style="text-align:center" type="text" value="{{$company->tin1}}"/>
																	<input disabled="disabled" id="frm1702RT:txtPg6TIN2" maxlength="3" name="frm1702RT:txtTIN2" size="6" style="text-align:center" type="text" value="{{$company->tin2}}"/>
																	<input disabled="disabled" id="frm1702RT:txtPg6TIN3" maxlength="3" name="frm1702RT:txtTIN3" size="6" style="text-align:center" type="text" value="{{$company->tin3}}"/>
																	<input disabled="disabled" id="frm1702RT:txtPg6BranchCode" maxlength="3" name="frm1702RT:txtTIN4" size="6" style="text-align:center; display:none" type="text" value="{{$company->tin4}}"/>
																	<input disabled="disabled" id="txtBranchMaskP6" name="txtBranchMaskP6" size="4" style="text-align:center" value="0000"/>
																</td>
																<td align="left" style="width:60%;">
																	<input disabled="disabled" style="width: 100%" id="frm1702RT:txtPg6RegisteredName" maxlength="24" name="frm1702RT:txtRegisteredName" size="77" type="text" value="{{$company->registered_name}}"/>
																</td>
															</tr>
														</table>
													</div>
												</td>
											</tr>
											<!--End of Header section-->
											<!--Schedule 7-->
											<tr>
												<td>
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
																<table border="0" cellpadding="0" cellspacing="0" class="center">
																	<tr>
																		<td>
																			<span class="smallBold">Schedule 7 - Tax Credits/Payments (attach
																				proof)</span>
																			<span class="xsmallItalic">(Attach additional sheet/s, if
																				necessary)</span>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">1</td>
																		<td class="small" width="67%">Prior Year's Excess Credits Other Than
																			MCIT</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg6Sc7I1ExcessCredits" maxlength="12" name="frm1702RT:txtPg6Sc7I1ExcessCredits" onblur="checkNumValue(this);computeP6Sc7I12TotalTaxCredits(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">2</td>
																		<td class="small" width="67%">Income Tax Payment under MCIT from
																			Previous Quarter/s</td>
																		<td width="30%">
																			<input disabled="disabled" id="frm1702RT:txtPg6Sc7I2IncomeTaxPaymentUnderMCIT" maxlength="12" name="frm1702RT:txtPg6Sc7I2IncomeTaxPaymentUnderMCIT" onblur="checkNumValue(this);computeP6Sc7I12TotalTaxCredits(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">3</td>
																		<td class="small" width="67%">Income Tax Payment under Regular/Normal
																			Rate from Previous Quarter/s</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg6Sc7I3IncomeTaxUnderRegular" maxlength="12" name="frm1702RT:txtPg6Sc7I3IncomeTaxUnderRegular" onblur="checkNumValue(this);computeP6Sc7I12TotalTaxCredits(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">4</td>
																		<td class="small" width="67%">Excess MCIT Applied this Current Taxable
																			Year
																			<a href="#" class="smallBold" name="navButton" onclick="goTo(6);window.scrollTo(0,0);">(From Schedule 8 Item 4F)</a>
																		</td>
																		<td width="30%">
																			<input disabled="disabled" id="frm1702RT:txtPg6Sc7I4ExcessMCIT" maxlength="12" name="frm1702RT:txtPg6Sc7I4ExcessMCIT" style="width:98%;text-align:right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">5</td>
																		<td class="small" width="67%">Creditable Tax Withheld from Previous
																			Quarter/s per BIR Form No. 2307</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg6Sc7I5CreditableTaxWithheldFromPrevious" maxlength="12" name="frm1702RT:txtPg6Sc7I5CreditableTaxWithheldFromPrevious" onblur="checkNumValue(this);computeP6Sc7I12TotalTaxCredits(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">6</td>
																		<td class="small" width="67%">Creditable Tax Withheld per BIR Form No.
																			2307 for the 4th Quarter</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg6Sc7I6CreditableTaxWithheldFor4thQuarter" maxlength="12" name="frm1702RT:txtPg6Sc7I6CreditableTaxWithheldFor4thQuarter" onblur="checkNumValue(this);computeP6Sc7I12TotalTaxCredits(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">7</td>
																		<td class="small" width="67%">Foreign Tax Credits, if applicable</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg6Sc7I7ForeignTaxCredits" maxlength="12" name="frm1702RT:txtPg6Sc7I7ForeignTaxCredits" onblur="checkNumValue(this);computeP6Sc7I12TotalTaxCredits(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">8</td>
																		<td class="small" width="67%">Tax Paid in Return Previously Filed, if
																			this is an Amended Return</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg6Sc7I8TaxPaidInReturn" maxlength="12" name="frm1702RT:txtPg6Sc7I8TaxPaidInReturn" onblur="checkNumValue(this);computeP6Sc7I12TotalTaxCredits(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">9</td>
																		<td class="small" width="67%">Special Tax Credits
																			<a href="#" onclick="goTo(2); window.scrollTo(0, 300);" class="smallBold">(To Part V Item 53)</a>
																		</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg6Sc7I9SpecialTaxCredits" maxlength="12" name="frm1702RT:txtPg6Sc7I9SpecialTaxCredits" onblur="checkNumValue(this);computeP6Sc7I12TotalTaxCredits(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td width="100%"class="tblFormTd">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td width="3%"/>
																		<td width="97%">
																			<span class="small">Other Credits/Payments</span>
																			<span class="xsmallItalic">(Specify)</span>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">10</td>
																		<td class="small" width="64%">
																			<input id="frm1702RT:txtPg6Sc7I10C1" maxlength="50" name="frm1702RT:txtPg6Sc7I10C1" onblur="capitalize(this),enableCompleteRows('txtPg6Sc7I10C1','txtPg5Sc7I10C2', 'frm1702RT:txtPg6Sc7I11C1,frm1702RT:txtPg6Sc7I11C2')" onkeypress="return Name(this, event);" style="width:100%" type="text" value=""/>
																		</td>
																		<td class="smallBold" width="3%"></td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg5Sc7I10C2" maxlength="12" name="frm1702RT:txtPg5Sc7I10C2" onblur="checkNumValue(this),computeP6Sc7I12TotalTaxCredits(),this.value=addCommas(this.value),enableCompleteRows('txtPg6Sc7I10C1','txtPg5Sc7I10C2', 'frm1702RT:txtPg6Sc7I11C1,frm1702RT:txtPg6Sc7I11C2')" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td cellpadding="0" cellspacing="0" class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">11</td>
																		<td class="small" width="64%">
																			<input id="frm1702RT:txtPg6Sc7I11C1" maxlength="45" name="frm1702RT:txtPg6Sc7I11C1" onblur="capitalize(this),enableCompleteRows('txtPg6Sc7I11C1','txtPg6Sc7I11C2', 'btnPg6Sc7I11More')" onkeypress="return Name(this, event);" style="width:85%" type="text" value="" disabled="disabled"/>
																			<input disabled="disabled" id="btnPg6Sc7I11More" name="moreButton" onclick="loadModalTable(this)" onkeypress="return wholenumber(this, event)" type="button" value="(Add more...)"/>
																		</td>
																		<td class="smallBold" width="3%"></td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg6Sc7I11C2" maxlength="12" name="frm1702RT:txtPg6Sc7I11C2" onblur="checkNumValue(this),computeP6Sc7I12TotalTaxCredits(),this.value=addCommas(this.value),enableCompleteRows('txtPg6Sc7I11C1','txtPg6Sc7I11C2', 'btnPg6Sc7I11More')" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0" disabled="disabled"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">12</td>
																		<td width="67%">
																			<span class="smallBold">Total Tax Credits/Payments</span>
																			<span class="xsmallItalic">(Sum of Items 1 to 11)</span>
																			<a href="#" class="smallBold" onclick="goTo(2)">(To Part IV Item 45)</a>
																		</td>
																		<td width="30%">
																			<input disabled="disabled" id="frm1702RT:txtPg6Sc7I12TotalTaxCredits" maxlength="12" name="frm1702RT:txtPg6Sc7I12TotalTaxCredits" style="width:98%;text-align:right" type="text" value="0"/>
																		</td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<!--End of Schedule 7-->
											<!--Schedule 8-->
											<tr>
												<td>
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
																<table border="0" cellpadding="0" cellspacing="0" class="center">
																	<tr>
																		<td>
																			<span class="smallBold">Schedule 8 - Computation of Minimum Corporate
																				Income Tax (MCIT)</span>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr style="text-align:center">
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr class="small">
																		<td width="3%"/>
																		<td width="13%">Year</td>
																		<td width="28%">A) Normal Income Tax as Adjusted</td>
																		<td width="28%">B) MCIT</td>
																		<td style="width:28%">
																			<span style="width:98%">C) Excess MCIT over Normal Income Tax</span>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">1</td>
																		<td width="13%">
																			<input disabled="disabled" id="frm1702RT:txtPg6Sc8I1C1" maxlength="4" name="frm1702RT:txtPg6Sc8I1C1" onblur="validateMCITYear(this);" onkeypress="return wholenumber(this, event)" style="width:98%; text-align: center;" type="text" value=""/>
																		</td>
																		<td width="28%">
																			<input disabled="disabled" id="frm1702RT:txtPg6Sc8I1C2" maxlength="12" name="frm1702RT:txtPg6Sc8I1C2" onblur="checkNumValue(this);computeP6Sc8I1C4(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align:right" type="text" value="0"/>
																		</td>
																		<td width="28%">
																			<input disabled="disabled" id="frm1702RT:txtPg6Sc8I1C3" maxlength="12" name="frm1702RT:txtPg6Sc8I1C3" onblur="checkNumValue(this);computeP6Sc8I1C4(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align:right" type="text" value="0"/>
																		</td>
																		<td width="28%">
																			<input disabled="disabled" id="frm1702RT:txtPg6Sc8I1C4" maxlength="12" name="frm1702RT:txtPg6Sc8I1C4" onblur="checkNumValue(this)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">2</td>
																		<td width="13%">
																			<input disabled="disabled" id="frm1702RT:txtPg6Sc8I2C1" maxlength="4" name="frm1702RT:txtPg6Sc8I2C1" onblur="validateMCITYear(this);" onkeypress="return wholenumber(this, event)" style="width:98%; text-align: center;" type="text" value=""/>
																		</td>
																		<td width="28%">
																			<input disabled="disabled" id="frm1702RT:txtPg6Sc8I2C2" maxlength="12" name="frm1702RT:txtPg6Sc8I2C2" onblur="checkNumValue(this);computeP6Sc8I2C4(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align:right" type="text" value="0"/>
																		</td>
																		<td width="28%">
																			<input disabled="disabled" id="frm1702RT:txtPg6Sc8I2C3" maxlength="12" name="frm1702RT:txtPg6Sc8I2C3" onblur="checkNumValue(this);computeP6Sc8I2C4(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align:right" type="text" value="0"/>
																		</td>
																		<td width="28%">
																			<input disabled="disabled" id="frm1702RT:txtPg6Sc8I2C4" maxlength="12" name="frm1702RT:txtPg6Sc8I2C4" onblur="checkNumValue(this)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">3</td>
																		<td width="13%">
																			<input disabled="disabled" id="frm1702RT:txtPg6Sc8I3C1" maxlength="4" name="frm1702RT:txtPg6Sc8I3C1" onblur="validateMCITYear(this);" onkeypress="return wholenumber(this, event)" style="width:98%; text-align: center;" type="text" value=""/>
																		</td>
																		<td width="28%">
																			<input disabled="disabled" id="frm1702RT:txtPg6Sc8I3C2" maxlength="12" name="frm1702RT:txtPg6Sc8I3C2" onblur="checkNumValue(this);computeP6Sc8I3C4(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align:right" type="text" value="0"/>
																		</td>
																		<td width="28%">
																			<input disabled="disabled" id="frm1702RT:txtPg6Sc8I3C3" maxlength="12" name="frm1702RT:txtPg6Sc8I3C3" onblur="checkNumValue(this);computeP6Sc8I3C4(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align:right" type="text" value="0"/>
																		</td>
																		<td width="28%">
																			<input disabled="disabled" id="frm1702RT:txtPg6Sc8I3C4" maxlength="12" name="frm1702RT:txtPg6Sc8I3C4" onblur="checkNumValue(this)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTdPart" valign="top" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td width="100%">
																			<span class="small">Continuation of Schedule 8</span>
																			<span class="smallItalic">(Line numbers continue from table
																				above)</span>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr style="text-align:center">
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td width="3%"/>
																		<td class="small" width="24%">D) Excess MCIT Applied/Used for Previous
																			Years</td>
																		<td class="small" width="24%">E) Expired Portion of Excess MCIT</td>
																		<td class="smallBold" width="24%">F) Excess MCIT Applied this Current
																			Taxable Year</td>
																		<td style="width:25%">
																			<span class="xsmall" style="width:98%">G) Balance of Excess MCIT
																				Allowable as Tax Credit for Succeeding Year/s</span>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">1</td>
																		<td width="24%">
																			<input disabled="disabled" id="frm1702RT:txtPg6Sc8I1C5" maxlength="12" name="frm1702RT:txtPg6Sc8I1C5" onblur="checkNumValue(this);computeP6Sc8I1C8(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align:right" type="text" value="0"/>
																		</td>
																		<td width="24%">
																			<input disabled="disabled" id="frm1702RT:txtPg6Sc8I1C6" maxlength="12" name="frm1702RT:txtPg6Sc8I1C6" onblur="checkNumValue(this);computeP6Sc8I1C8(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align:right" type="text" value="0"/>
																		</td>
																		<td width="24%">
																			<input disabled="disabled" id="frm1702RT:txtPg6Sc8I1C7" maxlength="12" name="frm1702RT:txtPg6Sc8I1C7" onblur="checkNumValue(this);computeP6Sc8I1C8(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align:right" type="text" value="0"/>
																		</td>
																		<td style="width:25%">
																			<input disabled="disabled" id="frm1702RT:txtPg6Sc8I1C8" maxlength="12" name="frm1702RT:txtPg6Sc8I1C8" style="width:98%;text-align:right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">2</td>
																		<td width="24%">
																			<input disabled="disabled" id="frm1702RT:txtPg6Sc8I2C5" maxlength="12" name="frm1702RT:txtPg6Sc8I2C5" onblur="checkNumValue(this);computeP6Sc8I2C8(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align:right" type="text" value="0"/>
																		</td>
																		<td width="24%">
																			<input disabled="disabled" id="frm1702RT:txtPg6Sc8I2C6" maxlength="12" name="frm1702RT:txtPg6Sc8I2C6" onblur="checkNumValue(this);computeP6Sc8I2C8(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align:right" type="text" value="0"/>
																		</td>
																		<td width="24%">
																			<input disabled="disabled" id="frm1702RT:txtPg6Sc8I2C7" maxlength="12" name="frm1702RT:txtPg6Sc8I2C7" onblur="checkNumValue(this);computeP6Sc8I2C8(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align:right" type="text" value="0"/>
																		</td>
																		<td style="width:25%">
																			<input disabled="disabled" id="frm1702RT:txtPg6Sc8I2C8" maxlength="12" name="frm1702RT:txtPg6Sc8I2C8" style="width:98%;text-align:right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">3</td>
																		<td width="24%">
																			<input disabled="disabled" id="frm1702RT:txtPg6Sc8I3C5" maxlength="12" name="frm1702RT:txtPg6Sc8I3C5" onblur="checkNumValue(this);computeP6Sc8I3C8(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align:right" type="text" value="0"/>
																		</td>
																		<td width="24%">
																			<input disabled="disabled" id="frm1702RT:txtPg6Sc8I3C6" maxlength="12" name="frm1702RT:txtPg6Sc8I3C6" onblur="checkNumValue(this);computeP6Sc8I3C8(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align:right" type="text" value="0"/>
																		</td>
																		<td width="24%">
																			<input disabled="disabled" id="frm1702RT:txtPg6Sc8I3C7" maxlength="12" name="frm1702RT:txtPg6Sc8I3C7" onblur="checkNumValue(this);computeP6Sc8I3C8(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%; text-align:right" type="text" value="0"/>
																		</td>
																		<td style="width:25%">
																			<input disabled="disabled" id="frm1702RT:txtPg6Sc8I3C8" maxlength="12" name="frm1702RT:txtPg6Sc8I3C8" style="width:98%;text-align:right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td style="width:3%;text-align:center;"class="smallBold">4</td>
																		<td class="smallBold" style="width:14%">Total Excess MCIT</td>
																		<td class="xsmallItalic" style="width:33%">(Sum of Column for Items 1F
																			to 3F)<br>
																			<a href="#" onclick="window.scrollTo(0,100);" class="smallBold">(To Schedule 7 Item 4)</a>
																		</td>
																		<td style="width:24%">
																			<input disabled="disabled" id="frm1702RT:txtPg6Sc8I4TotalExcessMCIT" maxlength="12" name="frm1702RT:txtPg6Sc8I4TotalExcessMCIT" style="width:98%; text-align:right" type="text" value="0"/>
																		</td>
																		<td style="width:25%"/>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<!--End of Schedule 8-->
											<!--Schedule 9-->
											<tr>
												<td>
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTdPart" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
																<table border="0" cellpadding="0" cellspacing="0" class="center">
																	<tr>
																		<td>
																			<span class="smallBold">Schedule 9 - Reconciliation of Net Income per
																				Books Against Taxable Income</span>
																			<span class="xsmallItalic">(Attach additional sheet/s, if
																				necessary)</span>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">1</td>
																		<td class="small" width="67%">Net Income/(Loss) per Books</td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg6Sc9I1NetIncome" maxlength="12" name="frm1702RT:txtPg6Sc9I1NetIncome" data-type="negative" onchange="setToZeroIfEmpty(this)" onblur="computeP6Sc9I4Total();this.value=NegativeValue(this.value);this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(NumWithParenthesis(this.value))" onkeypress="negativeInput(this, 12);return number(this, event)" style="width:98%;text-align:right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td width="3%"/>
																		<td class="small" width="97%">Add: Non-deductible Expenses/Taxable Other
																			Income</td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<tr>
												<td>
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">2</td>
																		<td class="small" width="64%">
																			<input id="frm1702RT:txtPg6Sc9I2C1" maxlength="50" name="frm1702RT:txtPg6Sc9I2C1" onblur="capitalize(this),enableCompleteRows('txtPg6Sc9I2C1','txtPg6Sc9I2C2', 'frm1702RT:txtPg6Sc9I3C1,frm1702RT:txtPg6Sc9I3C2')" onkeypress="return Name(this, event);" style="width:100%" type="text" value=""/>
																		</td>
																		<td width="3%"></td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg6Sc9I2C2" maxlength="12" name="frm1702RT:txtPg6Sc9I2C2" onblur="checkNumValue(this),computeP6Sc9I4Total(),this.value=addCommas(this.value),enableCompleteRows('txtPg6Sc9I2C1','txtPg6Sc9I2C2', 'frm1702RT:txtPg6Sc9I3C1,frm1702RT:txtPg6Sc9I3C2')" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">3</td>
																		<td class="small" width="64%">
																			<input id="frm1702RT:txtPg6Sc9I3C1" maxlength="45" name="frm1702RT:txtPg6Sc9I3C1" onblur="capitalize(this),enableCompleteRows('txtPg6Sc9I3C1','txtPg6Sc9I3C2', 'btnPg6Sc9I3More')" onkeypress="return Name(this, event);" style="width:85%" type="text" value="" disabled="disabled"/>
																			<input disabled="disabled" id="btnPg6Sc9I3More" name="moreButton" onclick="loadModalTable(this)" onkeypress="return wholenumber(this, event)" type="button" value="(Add more...)"/>
																		</td>
																		<td width="3%"></td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg6Sc9I3C2" maxlength="12" name="frm1702RT:txtPg6Sc9I3C2" onblur="checkNumValue(this),computeP6Sc9I4Total(),this.value=addCommas(this.value),enableCompleteRows('txtPg6Sc9I3C1','txtPg6Sc9I3C2', 'btnPg6Sc9I3More')" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0" disabled="disabled"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">4</td>
																		<td width="67%">
																			<span class="small">Total</span>
																			<span class="xsmallItalic">(Sum of Items 1 to 3)</span>
																		</td>
																		<td width="30%">
																			<input disabled="disabled" id="frm1702RT:txtPg6Sc9I4Total" maxlength="12" name="frm1702RT:txtPg6Sc9I4Total" style="width:98%;text-align:right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td width="3%"/>
																		<td class="small" width="97%">Less: A) Non-Taxable Income Subjected to
																			Final Tax</td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<tr>
												<td>
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">5</td>
																		<td class="small" width="64%">
																			<input id="frm1702RT:txtPg6Sc9I5C1" maxlength="50" name="frm1702RT:txtPg6Sc9I5C1" onblur="capitalize(this),enableCompleteRows('txtPg6Sc9I5C1','txtPg6Sc9I5C2', 'frm1702RT:txtPg6Sc9I6C1,frm1702RT:txtPg6Sc9I6C2')" onkeypress="return Name(this, event);" style="width:100%" type="text" value=""/>
																		</td>
																		<td class="smallBold" width="3%"></td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg6Sc9I5C2" maxlength="12" name="frm1702RT:txtPg6Sc9I5C2" onblur="checkNumValue(this),computeP6Sc9I9Total(),this.value=addCommas(this.value),enableCompleteRows('txtPg6Sc9I5C1','txtPg6Sc9I5C2', 'frm1702RT:txtPg6Sc9I6C1,frm1702RT:txtPg6Sc9I6C2')" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">6</td>
																		<td class="small" width="64%">
																			<input id="frm1702RT:txtPg6Sc9I6C1" maxlength="45" name="frm1702RT:txtPg6Sc9I6C1" onblur="capitalize(this),enableCompleteRows('txtPg6Sc9I6C1','txtPg6Sc9I6C2', 'btnPg6Sc9I6More')" onkeypress="return Name(this, event);" style="width:85%" type="text" value="" disabled="disabled"/>
																			<input disabled="disabled" id="btnPg6Sc9I6More" name="moreButton" onclick="loadModalTable(this)" onkeypress="return wholenumber(this, event)" type="button" value="(Add more...)"/>
																		</td>
																		<td class="smallBold" width="3%"></td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg6Sc9I6C2" maxlength="12" name="frm1702RT:txtPg6Sc9I6C2" onblur="checkNumValue(this),computeP6Sc9I9Total(),this.value=addCommas(this.value),enableCompleteRows('txtPg6Sc9I6C1','txtPg6Sc9I6C2', 'btnPg6Sc9I6More')" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0" disabled="disabled"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td width="7%"/>
																		<td class="small" width="93%">B) Special Deductions</td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<tr>
												<td>
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">7</td>
																		<td class="small" width="64%">
																			<input id="frm1702RT:txtPg6Sc9I7C1" maxlength="50" name="frm1702RT:txtPg6Sc9I7C1" onblur="capitalize(this),enableCompleteRows('txtPg6Sc9I7C1','txtPg6Sc9I7C2', 'frm1702RT:txtPg6Sc9I8C1,frm1702RT:txtPg6Sc9I8C2')" onkeypress="return Name(this, event);" style="width:100%" type="text" value=""/>
																		</td>
																		<td class="smallBold" width="3%"></td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg6Sc9I7C2" maxlength="12" name="frm1702RT:txtPg6Sc9I7C2" onblur="checkNumValue(this),computeP6Sc9I9Total(),this.value=addCommas(this.value),enableCompleteRows('txtPg6Sc9I7C1','txtPg6Sc9I7C2', 'frm1702RT:txtPg6Sc9I8C1,frm1702RT:txtPg6Sc9I8C2')" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">8</td>
																		<td class="small" width="64%">
																			<input id="frm1702RT:txtPg6Sc9I8C1" maxlength="45" name="frm1702RT:txtPg6Sc9I8C1" onblur="capitalize(this),enableCompleteRows('txtPg6Sc9I8C1','txtPg6Sc9I8C2', 'btnPg6Sc9I8More')" onkeypress="return Name(this, event);" style="width:85%" type="text" value="" disabled="disabled"/>
																			<input disabled="disabled" id="btnPg6Sc9I8More" name="moreButton" onclick="loadModalTable(this)" onkeypress="return wholenumber(this, event)" type="button" value="(Add more...)"/>
																		</td>
																		<td class="smallBold" width="3%"></td>
																		<td width="30%">
																			<input id="frm1702RT:txtPg6Sc9I8C2" maxlength="12" name="frm1702RT:txtPg6Sc9I8C2" onblur="checkNumValue(this),computeP6Sc9I9Total(),this.value=addCommas(this.value),enableCompleteRows('txtPg6Sc9I8C1','txtPg6Sc9I8C2', 'btnPg6Sc9I8More')" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" style="width:98%;text-align:right" type="text" value="0" disabled="disabled"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="100%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" style="text-align:center" width="3%">9</td>
																		<td class="small" style="width:4%">Total</td>
																		<td class="xsmallItalic" style="width:63%">(Sum of Items 5 to 8)</td>
																		<td width="30%">
																			<input disabled="disabled" id="frm1702RT:txtPg6Sc9I9Total" maxlength="12" name="frm1702RT:txtPg6Sc9I9Total" style="width:98%;text-align:right" type="text" value="0"/>
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
													<table border="0" cellpadding="0" cellspacing="0" class="tblForm">
														<tr>
															<td class="tblFormTd" width="70%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="smallBold" width="3%">&nbsp;10</td>
																		<td width="67%">
																			<span class="smallBold">Net taxable Income (Loss)</span>
																			<span class="xsmallItalic">(Items 4 Less Item 9)</span>
																		</td>
																		<td width="30%">
																			<input disabled="disabled" id="frm1702RT:txtPg6Sc9I10NetTaxableIncome" maxlength="12" name="frm1702RT:txtPg6Sc9I10NetTaxableIncome" style="width:98%;text-align:right" type="text" value="0"/>
																		</td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<!--Schedule 9-->
										</table>
									</div>
                                	<!--Page 7-->
									<div id="Page7Content" style="display:none">
		                                <table border="0" cellpadding="0" cellspacing="0" width="826px">
			                                <tr>
				                                <td>
					                                <table class="FormHeader">
						                                <tr>
							                                <td align="center" width="40%">
								                                <font class="xlargeBold">Annual Income Tax Return<br/></font>
								                                <font class="smallBold">Page 7 - Schedule 10 & 11</font>
							                                </td>
							                                <td align="center" valign="top" width="20%">
								                                <font class="xsmall">BIR Form No.<br/></font>
								                                <font class="xlargeBold">1702-RT<br/></font>
								                                <font class="xsmall">June 2013</font>
							                                </td>
							                                <td align="right" valign="bottom">
								                                <div style="float: right">
									                                <img alt="" src="{{ asset('images/1702RT_BarCode/1702-RT06_13P7.png') }}" style="height:35px; width:250px" />
									                                <br/>
									                                <span class="xsmallBold">1702-RT06/13P7</span>
								                                </div>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
			                                <tr>
				                                <td>
					                                <table class="tblForm" width="820px">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="40%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td width="340px"><font class="smallBold">&nbsp Taxpayer Identification
											                                Number (TIN)</font></td>
									                                </tr>
									                                <tr>
										                                <td width="340px">
											                                <font face="Arial" size="2">
												                                &nbsp 
												                                <input disabled="disabled" id="frm1702RT:txtPg7TIN1" maxlength="3" name="frm1702RT:txtTIN1" size="6" style="text-align:center;" value="{{$company->tin1}}"/>
												                                <input disabled="disabled" id="frm1702RT:txtPg7TIN2" maxlength="3" name="frm1702RT:txtTIN2" size="6" style="text-align:center;" value="{{$company->tin2}}"/>
												                                <input disabled="disabled" id="frm1702RT:txtPg7TIN3" maxlength="3" name="frm1702RT:txtTIN3" size="6" style="text-align:center;" value="{{$company->tin3}}"/>
												                                <input disabled="disabled" id="frm1702RT:txtPg7BranchCode" maxlength="3" name="frm1702RT:txtTIN4" size="6" style="text-align:center; display:none" value="{{$company->tin4}}"/>
												                                <input id="txtBranchMaskP7" name="txtBranchMaskP7" value="0000" size="4" disabled="disabled" style="text-align:center" />
											                                </font>
										                                </td>
									                                </tr>
								                                </table>
							                                </td>
							                                <td class="tblFormTd" valign="top" width="60%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td>
											                                <font class="smallBold">&nbsp; &nbsp; Registered Name</font></td>
									                                </tr>
									                                <tr>
										                                <td>
											                                <font face="Arial" size="2"> 
												                                <input disabled="disabled" id="frm1702RT:txtPg7RegisteredName" maxlength="24" name="frm1702RT:txtRegisteredName" size="77" style="width: 100%" value="{{$company->registered_name}}"/>
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
					                                <table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="820px">
						                                <tr>
							                                <td class="tblFormTdPart">
								                                <table cellpadding="0" cellspacing="0" width="820px">
									                                <tr>
										                                <td style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
											                                <div align="center"><font class="mediumBold">Schedule 10 - BALANCE
												                                SHEET</font></div>
										                                </td>
									                                </tr>
									                                <tr>
										                                <td style="border-bottom: #000000 2px solid;">
											                                <div align="center"><font class="smallBold">Assets</font></div>
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
					                                <table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="820px">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="100%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td width="70%">
											                                <span class="smallBold">&nbsp;1&nbsp;</span>
											                                <span>
												                                <font class="small">
													                                Current Assets</font></span>
										                                </td>
										                                <td width="30%"><input id="frm1702RT:txtPg7Sc10I1CurrentAssets" maxlength="15" name="frm1702RT:txtPg7Sc10I1CurrentAssets" onfocus="this.value=WholeNumWithComma(this.value)" onblur="checkNumValue(this),computeP7Sc10I7TotalAssets(),this.value=addCommas(this.value)" onkeypress="return wholenumber(this, event)" style="width: 98%; text-align:right" type="text" value="0"/></td>
									                                </tr>
								                                </table>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
			                                <tr>
				                                <td>
					                                <table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="820px">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="100%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td width="70%">
											                                <span class="smallBold">&nbsp;2&nbsp;</span>
											                                <span><font class="small">Long-Term Investment</font></span>
										                                </td>
										                                <td width="30%"><input id="frm1702RT:txtPg7Sc10I2LongTermInvestment" maxlength="15" 
												                                name="frm1702RT:txtPg7Sc10I2LongTermInvestment" 
												                                onfocus="this.value=WholeNumWithComma(this.value)" 
												                                onblur="checkNumValue(this),computeP7Sc10I7TotalAssets(),this.value=addCommas(this.value)" 
												                                onkeypress="return wholenumber(this, event)" 
												                                style="width: 98%; text-align:right" type="text" value="0"/></td>
									                                </tr>
								                                </table>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
			                                <tr>
				                                <td>
					                                <table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="820px">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="100%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td width="70%">
											                                <span class="smallBold">&nbsp;3&nbsp;</span>
											                                <span><font class="small">Property, Plant and Equipment - Net</font></span>
										                                </td>
										                                <td width="30%"><input id="frm1702RT:txtPg7Sc10I3PropertyPlantEquipment" maxlength="15" name="frm1702RT:txtPg7Sc10I3PropertyPlantEquipment" onfocus="this.value=WholeNumWithComma(this.value)" onblur="checkNumValue(this),computeP7Sc10I7TotalAssets(),this.value=addCommas(this.value)" onkeypress="return wholenumber(this, event)" style="width: 98%; text-align:right" type="text" value="0"/></td>
									                                </tr>
								                                </table>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
			                                <tr>
				                                <td>
					                                <table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="820px">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="100%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td width="70%">
											                                <span class="smallBold">&nbsp;4&nbsp;</span>
											                                <span><font class="small">Long-Term Receivables</font></span>
										                                </td>
										                                <td width="30%"><input id="frm1702RT:txtPg7Sc10I4LongTermReceivables" maxlength="15" name="frm1702RT:txtPg7Sc10I4LongTermReceivables" onfocus="this.value=WholeNumWithComma(this.value)" onblur="checkNumValue(this),computeP7Sc10I7TotalAssets(),this.value=addCommas(this.value)" onkeypress="return wholenumber(this, event)" style="width: 98%; text-align:right" type="text" value="0"/></td>
									                                </tr>
								                                </table>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
			                                <tr>
				                                <td>
					                                <table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="820px">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="100%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td width="70%">
											                                <span class="smallBold">&nbsp;5&nbsp;</span>
											                                <span><font class="small">Intangible Assets</font></span>
										                                </td>
										                                <td width="30%"><input id="frm1702RT:txtPg7Sc10I5IntangibleAssets" maxlength="15" name="frm1702RT:txtPg7Sc10I5IntangibleAssets" onfocus="this.value=WholeNumWithComma(this.value)" onblur="checkNumValue(this),computeP7Sc10I7TotalAssets(),this.value=addCommas(this.value)" onkeypress="return wholenumber(this, event)" style="width: 98%; text-align:right" type="text" value="0"/></td>
									                                </tr>
								                                </table>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
			                                <tr>
				                                <td>
					                                <table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="820px">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="100%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td width="70%">
											                                <span class="smallBold">&nbsp;6&nbsp;</span>
											                                <span><font class="small">Other Assets</font></span>
										                                </td>
										                                <td width="30%"><input id="frm1702RT:txtPg7Sc10I6OtherAssets" maxlength="15" name="frm1702RT:txtPg7Sc10I6OtherAssets" onfocus="this.value=WholeNumWithComma(this.value)" onblur="checkNumValue(this),computeP7Sc10I7TotalAssets(),this.value=addCommas(this.value)" onkeypress="return wholenumber(this, event)" style="width: 98%; text-align:right" type="text" value="0"/></td>
									                                </tr>
								                                </table>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
			                                <tr>
				                                <td>
					                                <table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="820px">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="100%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td width="70%">
											                                <span class="smallBold">&nbsp;7&nbsp;</span>
											                                <span><font class="smallBold">Total Assets
												                                </font>&nbsp;<font class="xsmallItalic">(Sum of Items 1 to 6)</span>
											                                </font>
										                                </td>
										                                <td width="30%"><input disabled="disabled" id="frm1702RT:txtPg7Sc10I7TotalAssets" maxlength="15" name="frm1702RT:txtPg7Sc10I7TotalAssets" style="width: 98%; text-align:right" value="0"/></td>
									                                </tr>
								                                </table>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
			                                <tr>
				                                <td>
					                                <table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="820px">
						                                <tr>
							                                <td class="tblFormTdPart">
								                                <table cellpadding="0" cellspacing="0" width="820px">
									                                <tr>
										                                <td style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
											                                <div align="center"><font class="smallBold">Liabilities and
												                                Equity</font></div>
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
					                                <table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="820px">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="100%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td width="70%">
											                                <span class="smallBold">&nbsp;8&nbsp;</span>
											                                <span class="small">Current Liabilities</span>
										                                </td>
										                                <td width="30%"><input id="frm1702RT:txtPg7Sc10I8CurrentLiabilities" maxlength="15" name="frm1702RT:txtPg7Sc10I8CurrentLiabilities" onfocus="this.value=WholeNumWithComma(this.value)" onblur="checkNumValue(this),computeP7Sc10I12TotalLiabilities(),this.value=addCommas(this.value)" onkeypress="return wholenumber(this, event)" style="width: 98%; text-align:right" type="text" value="0"/></td>
									                                </tr>
								                                </table>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
			                                <tr>
				                                <td>
					                                <table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="820px">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="100%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td width="70%">
											                                <span class="smallBold">&nbsp;9&nbsp;</span>
											                                <span class="small">Long-Term Liabilities</span>
										                                </td>
										                                <td width="30%"><input id="frm1702RT:txtPg7Sc10I9LongTermLiabilities" maxlength="15" name="frm1702RT:txtPg7Sc10I9LongTermLiabilities" onfocus="this.value=WholeNumWithComma(this.value)" onblur="checkNumValue(this),computeP7Sc10I12TotalLiabilities(),this.value=addCommas(this.value)" onkeypress="return wholenumber(this, event)" style="width: 98%; text-align:right" type="text" value="0"/></td>
									                                </tr>
								                                </table>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
			                                <tr>
				                                <td>
					                                <table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="820px">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="100%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td width="70%">
											                                <span class="smallBold">&nbsp;10&nbsp;</span>
											                                <span class="small">Deferred Credits</span>
										                                </td>
										                                <td width="30%"><input id="frm1702RT:txtPg7Sc10I10DeferredCredits" maxlength="15" name="frm1702RT:txtPg7Sc10I10DeferredCredits" onfocus="this.value=WholeNumWithComma(this.value)" onblur="checkNumValue(this),computeP7Sc10I12TotalLiabilities(),this.value=addCommas(this.value)" onkeypress="return wholenumber(this, event)" style="width: 98%; text-align:right" type="text" value="0"/></td>
									                                </tr>
								                                </table>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
			                                <tr>
				                                <td>
					                                <table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="820px">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="100%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td width="70%">
											                                <span class="smallBold">&nbsp;11&nbsp;</span>
											                                <span class="small">Other Liabilities</span>
										                                </td>
										                                <td width="30%"><input id="frm1702RT:txtPg7Sc10I11OtherLiabilities" maxlength="15" name="frm1702RT:txtPg7Sc10I11OtherLiabilities" onfocus="this.value=WholeNumWithComma(this.value)" onblur="checkNumValue(this),computeP7Sc10I12TotalLiabilities(),this.value=addCommas(this.value)" onkeypress="return wholenumber(this, event)" style="width: 98%; text-align:right" type="text" value="0"/></td>
									                                </tr>
								                                </table>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
			                                <tr>
				                                <td>
					                                <table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="820px">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="100%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td width="70%">
											                                <span class="smallBold">&nbsp;12&nbsp;</span>
											                                <span><font class="smallBold">Total Liabilities</font></span>
											                                <span>&nbsp;<font class="xsmallItalic">(Sum of Items 8 to 11)</span>
											                                </font>
										                                </td>
										                                <td width="30%"><input disabled="disabled" id="frm1702RT:txtPg7Sc10I12TotalLiabilities" maxlength="15" name="frm1702RT:txtPg7Sc10I12TotalLiabilities" style="width: 98%; text-align:right" type="text" value="0"/></td>
									                                </tr>
								                                </table>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
			                                <tr>
				                                <td>
					                                <table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="820px">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="100%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td width="70%">
											                                <span class="smallBold">&nbsp;13&nbsp;</span>
											                                <span class="small">Capital Stock</span>
										                                </td>
										                                <td width="30%"><input id="frm1702RT:txtPg7Sc10I13CapitalStock" maxlength="15" name="frm1702RT:txtPg7Sc10I13CapitalStock" onfocus="this.value=WholeNumWithComma(this.value)" onblur="checkNumValue(this),computeP7Sc10I16TotalEquity(),this.value=addCommas(this.value)" onkeypress="return wholenumber(this, event)" style="width: 98%; text-align:right" type="text" value="0"/></td>
									                                </tr>
								                                </table>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
			                                <tr>
				                                <td>
					                                <table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="820px">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="100%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td width="70%">
											                                <span class="smallBold">&nbsp;14&nbsp;</span>
											                                <span class="small">Additional Paid-in Capital</span>
										                                </td>
										                                <td width="30%"><input id="frm1702RT:txtPg7Sc10I14AdditionalCapital" maxlength="15" name="frm1702RT:txtPg7Sc10I14AdditionalCapital" onfocus="this.value=WholeNumWithComma(this.value)" onblur="checkNumValue(this),computeP7Sc10I16TotalEquity(),this.value=addCommas(this.value)" onkeypress="return wholenumber(this, event)" style="width: 98%; text-align:right" type="text" value="0"/></td>
									                                </tr>
								                                </table>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
			                                <tr>
				                                <td>
					                                <table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="820px">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="100%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td width="70%">
											                                <span class="smallBold">&nbsp;15&nbsp;</span>
											                                <span class="small">Retained Earnings</span>
										                                </td>
	                                                                    <td width="30%"><input id="frm1702RT:txtPg7Sc10I15RetainedEarnings" maxlength="15" name="frm1702RT:txtPg7Sc10I15RetainedEarnings" data-type="negative" onchange="setToZeroIfEmpty(this)" onfocus="this.value=WholeNumWithComma(NumWithParenthesis(this.value))" onblur="computeP7Sc10I16TotalEquity();this.value=NegativeValue(this.value);this.value=addCommas(this.value)" onkeypress="negativeInput(this, 15); return number(this, event)" style="width: 98%; text-align:right" type="text" value="0"/></td>
									                                </tr>
								                                </table>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
			                                <tr>
				                                <td>
					                                <table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="820px">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="100%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td width="70%"><span class="smallBold">&nbsp;16&nbsp; Total Equity
											                                </span>&nbsp;<span class="xsmallItalic">(Sum of Items 13 to 15)
										                                </span>
									                                </td>
									                                <td width="30%"><input disabled="disabled" id="frm1702RT:txtPg7Sc10I16TotalEquity" maxlength="15" name="frm1702RT:txtPg7Sc10I16TotalEquity" style="width: 98%; text-align:right" type="text" value="0"/></td>
									                                </tr>
								                                </table>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
			                                <tr>
				                                <td>
					                                <table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="820px">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="100%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td width="70%"><span class="smallBold">&nbsp;17&nbsp; Total Liabilities
											                                and Equity
											                                </span>&nbsp;<span class="xsmallItalic">(Sum of Items 12 and 16)
										                                </span>
									                                </td>
									                                <td width="30%"><input disabled="disabled" id="frm1702RT:txtPg7Sc10I17TotalLiabilitiesEquity" maxlength="15" name="frm1702RT:txtPg7Sc10I17TotalLiabilitiesEquity" style="width: 98%; text-align:right" type="text" value="0"/></td>
									                                </tr>
								                                </table>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
			                                <tr>
				                                <td>
					                                <table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="820px">
						                                <tr>
							                                <td class="tblFormTdPart">
								                                <table cellpadding="0" cellspacing="0" width="820px">
									                                <tr>
										                                <td style="border-bottom: #000000 2px solid; border-top: #000000 2px solid;">
											                                <div>
												                                <table>
													                                <tr>
														                                <td>
															                                <font class="smallBold">Schedule 11 -</font>
														                                </td>
														                                <td>
															                                <font class="smallBold">
															                                <input id="frm1702RT:chkPg7Sc11Stockholders" 
															                                name="frm1702RT:rdoPg7Sc11Option_stock" value="0" type="checkbox" class="styled" onclick="tickStockholdersMembers(); setSchedule11Tick()">
															                                Stockholders</font>
														                                </td>
														                                <td>
															                                <font class="smallBold">
															                                <input id="frm1702RT:chkPg7Sc11Partners" name="frm1702RT:rdoPg7Sc11Option_partners" 
															                                type="checkbox" value="0" class="styled" onclick="tickPartners(); setSchedule11Tick();">
															                                Partners</font>
														                                </td>
														                                <td>
															                                <font class="smallBold">
															                                <input id="frm1702RT:chkPg7Sc11Members" 
															                                name="frm1702RT:rdoPg7Sc11Option_members" type="checkbox" value="0" class="styled" onclick="tickStockholdersMembers(); setSchedule11Tick()">
															                                Members Information</font>
															                                <font class="small"> &nbsp(Top 20 stockholders, partners or members)</font>
														                                </td>
													                                </tr>
												                                </table>
												                                <font class="smallItalic">(On column 3 enter the amount of capital
													                                contribution and on the last column enter the percentage this represents
													                                on the entire ownership.)
												                                </font>
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
					                                <table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="820px">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="30%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td align="center" width="250"><font class="smallBold">REGISTERED NAME
											                                </font>
										                                </td>
									                                </tr>
								                                </table>
							                                </td>
							                                <td class="tblFormTd" valign="top" width="30%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td align="center" width="250"><font class="smallBold">TIN
											                                </font>
										                                </td>
									                                </tr>
								                                </table>
							                                </td>
							                                <td class="tblFormTd" valign="top" width="30%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td align="center" width="250"><font class="smallBold">Capital
											                                Contribution
											                                </font>
										                                </td>
									                                </tr>
								                                </table>
							                                </td>
							                                <td class="tblFormTd" valign="top" width="10%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td align="center" width="70"><font class="xsmallBold">% to
												                                <br/>Total</font></td>
									                                </tr>
								                                </table>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
			                                <!--REG PART-->
			                                <tr>
				                                <td width="820px">
					                                <table class="tblForm">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="30%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I1C1" maxlength="20" 
	                                                                            name="frm1702RT:txtPg7Sc11I1C1" size="30" type="text" value="" 
	                                                                            onblur="capitalize(this);checkNullPg7Sc11I6toI20Enable()" onkeypress="return Name(this, event);" disabled="disabled"/></td>
										                                <td align="center">
										                                <input id="frm1702RT:txtPg7Sc11I1Tin1" maxlength="3" name="frm1702RT:txtSc11Tin1" 
	                                                                            size="3" type="text" value="" style="text-align: center" 
	                                                                            onblur="validateTIN(this, false);checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" 
	                                                                            onkeypress="return wholenumber(this, event)" disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I1Tin2" maxlength="3" name="frm1702RT:txtSc11Tin2" 
	                                                                            size="3" type="text" value="" style="text-align: center" 
	                                                                            onblur="validateTIN(this, false);checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" 
	                                                                            onkeypress="return wholenumber(this, event)" disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I1Tin3" maxlength="3" name="frm1702RT:txtSc11Tin3" 
	                                                                            size="3" type="text" value="" style="text-align: center" 
	                                                                            onblur="validateTIN(this, false)" onkeyup="moveToNext(this, 3);" 
	                                                                            onkeypress="return wholenumber(this, event);checkNullPg7Sc11I6toI20Enable()" disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I1Tin4" maxlength="3" name="frm1702RT:txtSc11Tin4" 
	                                                                            size="3" type="text" value="" style="text-align: center" 
	                                                                            onblur="validateTIN(this, false);checkNullPg7Sc11I6toI20Enable()" onkeypress="return wholenumber(this, event)" 
	                                                                            disabled="disabled"/>
										                                </td>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I1C3" maxlength="12" 
	                                                                            name="frm1702RT:txtPg7Sc11I1C3" size="30" type="text" value="0" 
	                                                                            style="text-align: right" onfocus="this.value=WholeNumWithComma(this.value)" 
	                                                                            onblur="checkNumValue(this),this.value=addCommas(this.value);checkNullPg7Sc11I6toI20Enable()" 
	                                                                            onkeypress="return wholenumber(this, event)" disabled="disabled"/></td>
										                                <td align="center">
											                                <input id="frm1702RT:txtPg7Sc11I1C4" maxlength="5" 
	                                                                            name="frm1702RT:txtPg7Sc11I1C4" size="5" style="text-align: center" type="text" 
	                                                                            value="0" onkeypress="return numbersonly(this, event)" 
	                                                                            disabled="disabled" onblur="checkNumValue(this);checkNullPg7Sc11I6toI20Enable(),setPercentage(this, 0)"/></td>
									                                </tr>
								                                </table>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
			                                <tr>
				                                <td width="820px">
					                                <table class="tblForm">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="30%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I2C1" maxlength="20" 
	                                                                            name="frm1702RT:txtPg7Sc11I2C1" size="30" type="text" value="" 
	                                                                            onblur="capitalize(this); checkNullPg7Sc11I6toI20Enable()" onkeypress="return Name(this, event);" disabled="disabled"/></td>
										                                <td align="center">
										                                <input id="frm1702RT:txtPg7Sc11I2Tin1" maxlength="3" name="frm1702RT:txtPg7Sc11I2Tin1" 
	                                                                            size="3" type="text" value="" style="text-align: center" 
	                                                                            onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" 
	                                                                            onkeypress="return wholenumber(this, event)" disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I2Tin2" maxlength="3" name="frm1702RT:txtPg7Sc11I2Tin2" 
	                                                                            size="3" type="text" value="" style="text-align: center" 
	                                                                            onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" 
	                                                                            onkeypress="return wholenumber(this, event)" disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I2Tin3" maxlength="3" name="frm1702RT:txtPg7Sc11I2Tin3" 
	                                                                            size="3" type="text" value="" style="text-align: center" 
	                                                                            onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" 
	                                                                            onkeypress="return wholenumber(this, event)" disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I2Tin4" maxlength="3" name="frm1702RT:txtPg7Sc11I2Tin4" 
	                                                                            size="3" type="text" value="" style="text-align: center" 
	                                                                            onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeypress="return wholenumber(this, event)" 
	                                                                            disabled="disabled"/>
										                                </td>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I2C3" maxlength="12" 
	                                                                            name="frm1702RT:txtPg7Sc11I2C3" size="30" type="text" value="0" 
	                                                                            style="text-align: right" onfocus="this.value=WholeNumWithComma(this.value)" 
	                                                                            onblur="checkNumValue(this),this.value=addCommas(this.value); checkNullPg7Sc11I6toI20Enable()" 
	                                                                            onkeypress="return wholenumber(this, event)" disabled="disabled"/></td>
										                                <td align="center">
											                                <input id="frm1702RT:txtPg7Sc11I2C4" maxlength="5" 
	                                                                            name="frm1702RT:txtPg7Sc11I2C4" size="5" style="text-align: center" type="text" 
	                                                                            value="0" onkeypress="return numbersonly(this, event)" 
	                                                                            onblur="checkNullPg7Sc11I6toI20Enable();checkNumValue(this),setPercentage(this, 0)" disabled="disabled"/></td>
									                                </tr>
								                                </table>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
			                                <tr>
				                                <td width="820px">
					                                <table class="tblForm">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="30%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I3C1" maxlength="20" 
	                                                                            name="frm1702RT:txtPg7Sc11I3C1" size="30" type="text" value="" 
	                                                                            onblur="capitalize(this); checkNullPg7Sc11I6toI20Enable()" onkeypress="return Name(this, event);" disabled="disabled"/></td>
										                                <td align="center">
										                                <input id="frm1702RT:txtPg7Sc11I3Tin1" maxlength="3" name="frm1702RT:txtPg7Sc11I3Tin1" 
	                                                                            size="3" type="text" value="" style="text-align: center" 
	                                                                            onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" 
	                                                                            onkeypress="return wholenumber(this, event)" disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I3Tin2" maxlength="3" name="frm1702RT:txtPg7Sc11I3Tin2" 
	                                                                            size="3" type="text" value="" style="text-align: center" 
	                                                                            onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" 
	                                                                            onkeypress="return wholenumber(this, event)" disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I3Tin3" maxlength="3" name="frm1702RT:txtPg7Sc11I3Tin3" 
	                                                                            size="3" type="text" value="" style="text-align: center" 
	                                                                            onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" 
	                                                                            onkeypress="return wholenumber(this, event)" disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I3Tin4" maxlength="3" name="frm1702RT:txtPg7Sc11I3Tin4" 
	                                                                            size="3" type="text" value="" style="text-align: center" 
	                                                                            onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeypress="return wholenumber(this, event)" 
	                                                                            disabled="disabled"/>
										                                </td>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I3C3" maxlength="12" 
	                                                                            name="frm1702RT:txtPg7Sc11I3C3" size="30" type="text" value="0" 
	                                                                            style="text-align: right" onfocus="this.value=WholeNumWithComma(this.value)" 
	                                                                            onblur="checkNumValue(this),this.value=addCommas(this.value); checkNullPg7Sc11I6toI20Enable()" 
	                                                                            onkeypress="return wholenumber(this, event)" disabled="disabled"/></td>
										                                <td align="center">
											                                <input id="frm1702RT:txtPg7Sc11I3C4" maxlength="5" 
	                                                                            name="frm1702RT:txtPg7Sc11I3C4" size="5" style="text-align: center" type="text" 
	                                                                            value="0" onkeypress="return numbersonly(this, event)" disabled="disabled" 
	                                                                            onblur="checkNullPg7Sc11I6toI20Enable(); checkNumValue(this),setPercentage(this, 0)"/></td>
									                                </tr>
								                                </table>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
			                                <tr>
				                                <td width="820px">
					                                <table class="tblForm">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="30%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I4C1" maxlength="20" 
	                                                                            name="frm1702RT:txtPg7Sc11I4C1" size="30" type="text" value="" 
	                                                                            onblur="capitalize(this); checkNullPg7Sc11I6toI20Enable()" onkeypress="return Name(this, event);" disabled="disabled"/></td>
										                                <td align="center">
										                                <input id="frm1702RT:txtPg7Sc11I4Tin1" maxlength="3" name="frm1702RT:txtPg7Sc11I4Tin1" 
	                                                                            size="3" type="text" value="" style="text-align: center" 
	                                                                            onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" 
	                                                                            onkeypress="return wholenumber(this, event)" disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I4Tin2" maxlength="3" name="frm1702RT:txtPg7Sc11I4Tin2" 
	                                                                            size="3" type="text" value="" style="text-align: center" 
	                                                                            onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" 
	                                                                            onkeypress="return wholenumber(this, event)" disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I4Tin3" maxlength="3" name="frm1702RT:txtPg7Sc11I4Tin3" 
	                                                                            size="3" type="text" value="" style="text-align: center" 
	                                                                            onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" 
	                                                                            onkeypress="return wholenumber(this, event)" disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I4Tin4" maxlength="3" name="frm1702RT:txtPg7Sc11I4Tin4" 
	                                                                            size="3" type="text" value="" style="text-align: center" 
	                                                                            onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeypress="return wholenumber(this, event)" 
	                                                                            disabled="disabled"/>
										                                </td>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I4C3" maxlength="12" 
	                                                                            name="frm1702RT:txtPg7Sc11I4C3" size="30" type="text" value="0" 
	                                                                            style="text-align: right" onfocus="this.value=WholeNumWithComma(this.value)" 
	                                                                            onblur="checkNumValue(this),this.value=addCommas(this.value); checkNullPg7Sc11I6toI20Enable()" 
	                                                                            onkeypress="return wholenumber(this, event)" disabled="disabled"/></td>
										                                <td align="center">
											                                <input id="frm1702RT:txtPg7Sc11I4C4" maxlength="5" 
	                                                                            name="frm1702RT:txtPg7Sc11I4C4" size="5" style="text-align: center" type="text" 
	                                                                            value="0" onkeypress="return numbersonly(this, event)" disabled="disabled" 
	                                                                            onblur="checkNullPg7Sc11I6toI20Enable(); checkNumValue(this),setPercentage(this, 0)"/></td>
									                                </tr>
								                                </table>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
			                                <tr>
				                                <td width="820px">
					                                <table class="tblForm">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="30%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I5C1" maxlength="20" 
	                                                                            name="frm1702RT:txtPg7Sc11I5C1" size="30" type="text" value="" 
	                                                                            onblur="capitalize(this);checkNullPg7Sc11I6toI20Enable()" onkeypress="return Name(this, event);" disabled="disabled"/></td>
										                                <td align="center">
										                                <input id="frm1702RT:txtPg7Sc11I5Tin1" maxlength="3" name="frm1702RT:txtPg7Sc11I5Tin1" 
	                                                                            size="3" type="text" value="" style="text-align: center" 
	                                                                            onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" 
	                                                                            onkeypress="return wholenumber(this, event)" disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I5Tin2" maxlength="3" name="frm1702RT:txtPg7Sc11I5Tin2" 
	                                                                            size="3" type="text" value="" style="text-align: center" 
	                                                                            onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" 
	                                                                            onkeypress="return wholenumber(this, event)" disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I5Tin3" maxlength="3" name="frm1702RT:txtPg7Sc11I5Tin3" 
	                                                                            size="3" type="text" value="" style="text-align: center" 
	                                                                            onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" 
	                                                                            onkeypress="return wholenumber(this, event)" disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I5Tin4" maxlength="3" name="frm1702RT:txtPg7Sc11I5Tin4" 
	                                                                            size="3" type="text" value="" style="text-align: center" 
	                                                                            onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeypress="return wholenumber(this, event)" 
	                                                                            disabled="disabled"/>
										                                </td>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I5C3" maxlength="12" 
	                                                                            name="frm1702RT:txtPg7Sc11I5C3" size="30" type="text" value="0" 
	                                                                            style="text-align: right" onfocus="this.value=WholeNumWithComma(this.value)" 
	                                                                            onblur="checkNumValue(this),this.value=addCommas(this.value); checkNullPg7Sc11I6toI20Enable()" 
	                                                                            onkeypress="return wholenumber(this, event)" disabled="disabled"/></td>
										                                <td align="center">
											                                <input id="frm1702RT:txtPg7Sc11I5C4" maxlength="5" 
	                                                                            name="frm1702RT:txtPg7Sc11I5C4" size="5" style="text-align: center" type="text" 
	                                                                            value="0" onkeypress="return numbersonly(this, event)" disabled="disabled" 
	                                                                            onblur="checkNullPg7Sc11I6toI20Enable(); checkNumValue(this),setPercentage(this, 0)"/></td>
									                                </tr>
								                                </table>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
			                                <tr>
				                                <td width="820px">
					                                <table class="tblForm">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="30%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I6C1" maxlength="20" 
												                                name="frm1702RT:txtPg7Sc11I6C1" size="30" type="text" value="" 
												                                onblur="capitalize(this);checkNullPg7Sc11I6toI20Enable()" onkeypress="return Name(this, event);" disabled="disabled"/></td>
										                                <td align="center">
										                                <input id="frm1702RT:txtPg7Sc11I6Tin1" maxlength="3" name="frm1702RT:txtPg7Sc11I6Tin1" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled" />
										                                <input id="frm1702RT:txtPg7Sc11I6Tin2" maxlength="3" name="frm1702RT:txtPg7Sc11I6Tin2" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I6Tin3" maxlength="3" name="frm1702RT:txtPg7Sc11I6Tin3" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I6Tin4" maxlength="3" name="frm1702RT:txtPg7Sc11I6Tin4" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeypress="return wholenumber(this, event)" disabled="disabled"/>
										                                </td>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I6C3" maxlength="12" 
												                                name="frm1702RT:txtPg7Sc11I6C3" size="30" type="text" value="0" 
												                                style="text-align: right" onfocus="this.value=WholeNumWithComma(this.value)" 
												                                onblur="checkNumValue(this),this.value=addCommas(this.value); checkNullPg7Sc11I6toI20Enable()" 
												                                onkeypress="return wholenumber(this, event)" disabled="disabled"/></td>
										                                <td align="center">
											                                <input id="frm1702RT:txtPg7Sc11I6C4" maxlength="5" 
												                                name="frm1702RT:txtPg7Sc11I6C4" size="5" style="text-align: center" type="text" 
												                                value="0" onkeypress="return numbersonly(this, event)" disabled="disabled" 
	                                                                            onblur="checkNullPg7Sc11I6toI20Enable(); checkNumValue(this),setPercentage(this, 0)"/></td>
									                                </tr>
								                                </table>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
			                                <tr>
				                                <td width="820px">
					                                <table class="tblForm">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="30%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I7C1" maxlength="20" 
												                                name="frm1702RT:txtPg7Sc11I7C1" size="30" type="text" value="" 
												                                onblur="capitalize(this);checkNullPg7Sc11I6toI20Enable()" onkeypress="return Name(this, event);" disabled="disabled"/></td>
										                                <td align="center">
										                                <input id="frm1702RT:txtPg7Sc11I7Tin1" maxlength="3" name="frm1702RT:txtPg7Sc11I7Tin1" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I7Tin2" maxlength="3" name="frm1702RT:txtPg7Sc11I7Tin2" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I7Tin3" maxlength="3" name="frm1702RT:txtPg7Sc11I7Tin3" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I7Tin4" maxlength="3" name="frm1702RT:txtPg7Sc11I7Tin4" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeypress="return wholenumber(this, event)" disabled="disabled"/>
										                                </td>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I7C3" maxlength="12" 
												                                name="frm1702RT:txtPg7Sc11I7C3" size="30" type="text" value="0" 
												                                style="text-align: right" onfocus="this.value=WholeNumWithComma(this.value)" 
												                                onblur="checkNumValue(this),this.value=addCommas(this.value); checkNullPg7Sc11I6toI20Enable()" 
												                                onkeypress="return wholenumber(this, event)" disabled="disabled"/></td>
										                                <td align="center">
											                                <input id="frm1702RT:txtPg7Sc11I7C4" maxlength="5" 
												                                name="frm1702RT:txtPg7Sc11I7C4" size="5" style="text-align: center" type="text" 
												                                value="0" onkeypress="return numbersonly(this, event)" disabled="disabled" 
	                                                                            onblur="checkNullPg7Sc11I6toI20Enable(); checkNumValue(this),setPercentage(this, 0)"/></td>
									                                </tr>
								                                </table>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
			                                <tr>
				                                <td width="820px">
					                                <table class="tblForm">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="30%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I8C1" maxlength="20" 
												                                name="frm1702RT:txtPg7Sc11I8C1" size="30" type="text" value="" 
												                                onblur="capitalize(this);checkNullPg7Sc11I6toI20Enable()" onkeypress="return Name(this, event);" disabled="disabled"/></td>
										                                <td align="center">
										                                <input id="frm1702RT:txtPg7Sc11I8Tin1" maxlength="3" name="frm1702RT:txtPg7Sc11I8Tin1" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I8Tin2" maxlength="3" name="frm1702RT:txtPg7Sc11I8Tin2" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I8Tin3" maxlength="3" name="frm1702RT:txtPg7Sc11I8Tin3" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I8Tin4" maxlength="3" name="frm1702RT:txtPg7Sc11I8Tin4" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeypress="return wholenumber(this, event)" disabled="disabled"/>
										                                </td>
										                                <td align="center">
											                                <input id="frm1702RT:txtPg7Sc11I8C3" maxlength="12" 
												                                name="frm1702RT:txtPg7Sc11I8C3" size="30" type="text" value="0" 
												                                style="text-align: right" onfocus="this.value=WholeNumWithComma(this.value)" 
												                                onblur="checkNumValue(this),this.value=addCommas(this.value); checkNullPg7Sc11I6toI20Enable()" 
												                                onkeypress="return wholenumber(this, event)" disabled="disabled"/></td>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I8C4" maxlength="5" 
												                                name="frm1702RT:txtPg7Sc11I8C4" size="5" style="text-align: center" type="text" 
												                                value="0" onkeypress="return numbersonly(this, event)" disabled="disabled" 
	                                                                            onblur="checkNullPg7Sc11I6toI20Enable(); checkNumValue(this),setPercentage(this, 0)"/></td>
									                                </tr>
								                                </table>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
			                                <tr>
				                                <td width="820px">
					                                <table class="tblForm">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="30%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I9C1" maxlength="20" 
												                                name="frm1702RT:txtPg7Sc11I9C1" size="30" type="text" value="" 
												                                onblur="capitalize(this);checkNullPg7Sc11I6toI20Enable()" onkeypress="return Name(this, event);" disabled="disabled"/></td>
										                                <td align="center">
										                                <input id="frm1702RT:txtPg7Sc11I9Tin1" maxlength="3" name="frm1702RT:txtPg7Sc11I9Tin1" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I9Tin2" maxlength="3" name="frm1702RT:txtPg7Sc11I9Tin2" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I9Tin3" maxlength="3" name="frm1702RT:txtPg7Sc11I9Tin3" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I9Tin4" maxlength="3" name="frm1702RT:txtPg7Sc11I9Tin4" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeypress="return wholenumber(this, event)" disabled="disabled"/>
										                                </td>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I9C3" maxlength="12" 
												                                name="frm1702RT:txtPg7Sc11I9C3" size="30" type="text" value="0" 
												                                style="text-align: right" onfocus="this.value=WholeNumWithComma(this.value)" 
												                                onblur="checkNumValue(this),this.value=addCommas(this.value); checkNullPg7Sc11I6toI20Enable()" 
												                                onkeypress="return wholenumber(this, event)" disabled="disabled"/></td>
										                                <td align="center">
											                                <input id="frm1702RT:txtPg7Sc11I9C4" maxlength="5" 
												                                name="frm1702RT:txtPg7Sc11I9C4" size="5" style="text-align: center" type="text" 
												                                value="0" onkeypress="return numbersonly(this, event)" disabled="disabled" 
	                                                                            onblur="checkNullPg7Sc11I6toI20Enable(); checkNumValue(this),setPercentage(this, 0)"/></td>
									                                </tr>
								                                </table>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
			                                <tr>
				                                <td width="820px">
					                                <table class="tblForm">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="30%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I10C1" maxlength="20" 
												                                name="frm1702RT:txtPg7Sc11I10C1" size="30" type="text" value="" 
												                                onblur="capitalize(this);checkNullPg7Sc11I6toI20Enable()" onkeypress="return Name(this, event);" disabled="disabled"/></td>
										                                <td align="center">
										                                <input id="frm1702RT:txtPg7Sc11I10Tin1" maxlength="3" name="frm1702RT:txtPg7Sc11I10Tin1" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I10Tin2" maxlength="3" name="frm1702RT:txtPg7Sc11I10Tin2" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I10Tin3" maxlength="3" name="frm1702RT:txtPg7Sc11I10Tin3" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I10Tin4" maxlength="3" name="frm1702RT:txtPg7Sc11I10Tin4" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeypress="return wholenumber(this, event)" disabled="disabled"/>
										                                </td>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I10C3" maxlength="12" 
												                                name="frm1702RT:txtPg7Sc11I10C3" size="30" type="text" value="0" 
												                                style="text-align: right" onfocus="this.value=WholeNumWithComma(this.value)" 
												                                onblur="checkNumValue(this),this.value=addCommas(this.value); checkNullPg7Sc11I6toI20Enable()" 
												                                onkeypress="return wholenumber(this, event)" disabled="disabled"/></td>
										                                <td align="center">
											                                <input id="frm1702RT:txtPg7Sc11I10C4" maxlength="5" 
												                                name="frm1702RT:txtPg7Sc11I10C4" size="5" style="text-align: center" 
												                                type="text" value="0" onkeypress="return numbersonly(this, event)" 
												                                disabled="disabled" onblur="checkNullPg7Sc11I6toI20Enable(); checkNumValue(this),setPercentage(this, 0)"/></td>
									                                </tr>
								                                </table>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
			                                <tr>
				                                <td width="820px">
					                                <table class="tblForm">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="30%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I11C1" maxlength="20" 
												                                name="frm1702RT:txtPg7Sc11I11C1" size="30" type="text" value="" 
												                                onblur="capitalize(this);checkNullPg7Sc11I6toI20Enable()" onkeypress="return Name(this, event);" disabled="disabled"/></td>
										                                <td align="center">
										                                <input id="frm1702RT:txtPg7Sc11I11Tin1" maxlength="3" name="frm1702RT:txtPg7Sc11I11Tin1" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I11Tin2" maxlength="3" name="frm1702RT:txtPg7Sc11I11Tin2" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I11Tin3" maxlength="3" name="frm1702RT:txtPg7Sc11I11Tin3" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I11Tin4" maxlength="3" name="frm1702RT:txtPg7Sc11I11Tin4" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeypress="return wholenumber(this, event)" disabled="disabled"/>
										                                </td>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I11C3" maxlength="12" 
												                                name="frm1702RT:txtPg7Sc11I11C3" size="30" type="text" value="0" 
												                                style="text-align: right" onfocus="this.value=WholeNumWithComma(this.value)" 
												                                onblur="checkNumValue(this),this.value=addCommas(this.value); checkNullPg7Sc11I6toI20Enable()" 
												                                onkeypress="return wholenumber(this, event)" disabled="disabled"/></td>
										                                <td align="center">
											                                <input id="frm1702RT:txtPg7Sc11I11C4" maxlength="5" 
												                                name="frm1702RT:txtPg7Sc11I11C4" size="5" style="text-align: center" 
												                                type="text" value="0" onkeypress="return numbersonly(this, event)" 
												                                disabled="disabled" onblur="checkNullPg7Sc11I6toI20Enable(); checkNumValue(this),setPercentage(this, 0)"/></td>
									                                </tr>
								                                </table>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
			                                <tr>
				                                <td width="820px">
					                                <table class="tblForm">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="30%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I12C1" maxlength="20" 
												                                name="frm1702RT:txtPg7Sc11I12C1" size="30" type="text" value="" 
												                                onblur="capitalize(this);checkNullPg7Sc11I6toI20Enable()" onkeypress="return Name(this, event);" disabled="disabled"/></td>
										                                <td align="center">
										                                <input id="frm1702RT:txtPg7Sc11I12Tin1" maxlength="3" name="frm1702RT:txtPg7Sc11I12Tin1" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I12Tin2" maxlength="3" name="frm1702RT:txtPg7Sc11I12Tin2" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I12Tin3" maxlength="3" name="frm1702RT:txtPg7Sc11I12Tin3" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I12Tin4" maxlength="3" name="frm1702RT:txtPg7Sc11I12Tin4" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeypress="return wholenumber(this, event)" disabled="disabled"/>
										                                </td>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I12C3" maxlength="12" 
												                                name="frm1702RT:txtPg7Sc11I12C3" size="30" type="text" value="0" 
												                                style="text-align: right" onfocus="this.value=WholeNumWithComma(this.value)" 
												                                onblur="checkNumValue(this),this.value=addCommas(this.value); checkNullPg7Sc11I6toI20Enable()" 
												                                onkeypress="return wholenumber(this, event)" disabled="disabled"/></td>
										                                <td align="center">
											                                <input id="frm1702RT:txtPg7Sc11I12C4" maxlength="5" 
												                                name="frm1702RT:txtPg7Sc11I12C4" size="5" style="text-align: center" 
												                                type="text" value="0" onkeypress="return numbersonly(this, event)" 
												                                disabled="disabled" onblur="checkNullPg7Sc11I6toI20Enable(); checkNumValue(this),setPercentage(this, 0)"/></td>
									                                </tr>
								                                </table>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
			                                <tr>
				                                <td width="820px">
					                                <table class="tblForm">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="30%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I13C1" maxlength="20" 
												                                name="frm1702RT:txtPg7Sc11I13C1" size="30" type="text" value="" 
												                                onblur="capitalize(this);checkNullPg7Sc11I6toI20Enable()" onkeypress="return Name(this, event);" disabled="disabled"/></td>
										                                <td align="center">
										                                <input id="frm1702RT:txtPg7Sc11I13Tin1" maxlength="3" name="frm1702RT:txtPg7Sc11I13Tin1" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I13Tin2" maxlength="3" name="frm1702RT:txtPg7Sc11I13Tin2" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I13Tin3" maxlength="3" name="frm1702RT:txtPg7Sc11I13Tin3" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I13Tin4" maxlength="3" name="frm1702RT:txtPg7Sc11I13Tin4" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeypress="return wholenumber(this, event)" disabled="disabled"/>
										                                </td>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I13C3" maxlength="12" 
												                                name="frm1702RT:txtPg7Sc11I13C3" size="30" type="text" value="0" 
												                                style="text-align: right" onfocus="this.value=WholeNumWithComma(this.value)" 
												                                onblur="checkNumValue(this),this.value=addCommas(this.value); checkNullPg7Sc11I6toI20Enable()" 
												                                onkeypress="return wholenumber(this, event)" disabled="disabled"/></td>
										                                <td align="center">
											                                <input id="frm1702RT:txtPg7Sc11I13C4" maxlength="5" 
												                                name="frm1702RT:txtPg7Sc11I13C4" size="5" style="text-align: center" 
												                                type="text" value="0" onkeypress="return numbersonly(this, event)" 
												                                disabled="disabled" onblur="checkNullPg7Sc11I6toI20Enable(); checkNumValue(this),setPercentage(this, 0)"/></td>
									                                </tr>
								                                </table>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
			                                <tr>
				                                <td width="820px">
					                                <table class="tblForm">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="30%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I14C1" maxlength="20" 
												                                name="frm1702RT:txtPg7Sc11I14C1" size="30" type="text" value="" 
												                                onblur="capitalize(this);checkNullPg7Sc11I6toI20Enable()" onkeypress="return Name(this, event);" disabled="disabled"/></td>
										                                <td align="center">
										                                <input id="frm1702RT:txtPg7Sc11I14Tin1" maxlength="3" name="frm1702RT:txtPg7Sc11I14Tin1" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I14Tin2" maxlength="3" name="frm1702RT:txtPg7Sc11I14Tin2" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I14Tin3" maxlength="3" name="frm1702RT:txtPg7Sc11I14Tin3" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I14Tin4" maxlength="3" name="frm1702RT:txtPg7Sc11I14Tin4" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeypress="return wholenumber(this, event)" disabled="disabled"/>
										                                </td>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I14C3" maxlength="12" 
												                                name="frm1702RT:txtPg7Sc11I14C3" size="30" type="text" value="0" 
												                                style="text-align: right" onfocus="this.value=WholeNumWithComma(this.value)" 
												                                onblur="checkNumValue(this),this.value=addCommas(this.value); checkNullPg7Sc11I6toI20Enable()" 
												                                onkeypress="return wholenumber(this, event)" disabled="disabled"/></td>
										                                <td align="center">
											                                <input id="frm1702RT:txtPg7Sc11I14C4" maxlength="5" 
												                                name="frm1702RT:txtPg7Sc11I14C4" size="5" style="text-align: center" 
												                                type="text" value="0" onkeypress="return numbersonly(this, event)" 
												                                disabled="disabled" onblur="checkNullPg7Sc11I6toI20Enable(); checkNumValue(this),setPercentage(this, 0)"/></td>
									                                </tr>
								                                </table>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
			                                <tr>
				                                <td width="820px">
					                                <table class="tblForm">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="30%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I15C1" maxlength="20" 
												                                name="frm1702RT:txtPg7Sc11I15C1" size="30" type="text" value="" 
												                                onblur="capitalize(this);checkNullPg7Sc11I6toI20Enable()" onkeypress="return Name(this, event);" disabled="disabled"/></td>
										                                <td align="center">
										                                <input id="frm1702RT:txtPg7Sc11I15Tin1" maxlength="3" name="frm1702RT:txtPg7Sc11I15Tin1" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I15Tin2" maxlength="3" name="frm1702RT:txtPg7Sc11I15Tin2" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I15Tin3" maxlength="3" name="frm1702RT:txtPg7Sc11I15Tin3" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I15Tin4" maxlength="3" name="frm1702RT:txtPg7Sc11I15Tin4" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeypress="return wholenumber(this, event)" disabled="disabled"/>
										                                </td>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I15C3" maxlength="12" 
												                                name="frm1702RT:txtPg7Sc11I15C3" size="30" type="text" value="0" 
												                                style="text-align: right" onfocus="this.value=WholeNumWithComma(this.value)" 
												                                onblur="checkNumValue(this),this.value=addCommas(this.value); checkNullPg7Sc11I6toI20Enable()" 
												                                onkeypress="return wholenumber(this, event)" disabled="disabled"/></td>
										                                <td align="center">
											                                <input id="frm1702RT:txtPg7Sc11I15C4" maxlength="5" 
												                                name="frm1702RT:txtPg7Sc11I15C4" size="5" style="text-align: center" 
												                                type="text" value="0" onkeypress="return numbersonly(this, event)" 
												                                disabled="disabled" onblur="checkNullPg7Sc11I6toI20Enable(); checkNumValue(this),setPercentage(this, 0)"/></td>
									                                </tr>
								                                </table>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
			                                <tr>
				                                <td width="820px">
					                                <table class="tblForm">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="30%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I16C1" maxlength="20" 
												                                name="frm1702RT:txtPg7Sc11I16C1" size="30" type="text" value="" 
												                                onblur="capitalize(this);checkNullPg7Sc11I6toI20Enable()" onkeypress="return Name(this, event);" disabled="disabled"/></td>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I16Tin1" maxlength="3" 
												                                name="frm1702RT:txtPg7Sc11I16Tin1" size="3" type="text" value="" 
												                                style="text-align: center" onkeyup="moveToNext(this, 3);" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeypress="return wholenumber(this, event)" disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I16Tin2" maxlength="3" name="frm1702RT:txtPg7Sc11I16Tin2" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I16Tin3" maxlength="3" name="frm1702RT:txtPg7Sc11I16Tin3" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I16Tin4" maxlength="3" name="frm1702RT:txtPg7Sc11I16Tin4" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeypress="return wholenumber(this, event)" disabled="disabled"/>
										                                </td>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I16C3" maxlength="12" 
												                                name="frm1702RT:txtPg7Sc11I16C3" size="30" type="text" value="0" 
												                                style="text-align: right" onfocus="this.value=WholeNumWithComma(this.value)" 
												                                onblur="checkNumValue(this),this.value=addCommas(this.value); checkNullPg7Sc11I6toI20Enable()" 
												                                onkeypress="return wholenumber(this, event)" disabled="disabled"/></td>
										                                <td align="center">
											                                <input id="frm1702RT:txtPg7Sc11I16C4" maxlength="5" 
												                                name="frm1702RT:txtPg7Sc11I16C4" size="5" style="text-align: center" 
												                                type="text" value="0" onkeypress="return numbersonly(this, event)" 
												                                disabled="disabled" onblur="checkNullPg7Sc11I6toI20Enable(); checkNumValue(this),setPercentage(this, 0)"/></td>
									                                </tr>
								                                </table>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
			                                <tr>
				                                <td width="820px">
					                                <table class="tblForm">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="30%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I17C1" maxlength="20" 
												                                name="frm1702RT:txtPg7Sc11I17C1" size="30" type="text" value="" 
												                                onblur="capitalize(this);checkNullPg7Sc11I6toI20Enable()" onkeypress="return Name(this, event);" disabled="disabled"/></td>
										                                <td align="center">
										                                <input id="frm1702RT:txtPg7Sc11I17Tin1" maxlength="3" name="frm1702RT:txtPg7Sc11I17Tin1" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I17Tin2" maxlength="3" name="frm1702RT:txtPg7Sc11I17Tin2" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I17Tin3" maxlength="3" name="frm1702RT:txtPg7Sc11I17Tin3" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I17Tin4" maxlength="3" name="frm1702RT:txtPg7Sc11I17Tin4" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeypress="return wholenumber(this, event)" disabled="disabled"/>
										                                </td>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I17C3" maxlength="12" 
												                                name="frm1702RT:txtPg7Sc11I17C3" size="30" type="text" value="0" 
												                                style="text-align: right" onfocus="this.value=WholeNumWithComma(this.value)" 
												                                onblur="checkNumValue(this),this.value=addCommas(this.value); checkNullPg7Sc11I6toI20Enable()" 
												                                onkeypress="return wholenumber(this, event)" disabled="disabled"/></td>
										                                <td align="center">
											                                <input id="frm1702RT:txtPg7Sc11I17C4" maxlength="5" 
												                                name="frm1702RT:txtPg7Sc11I17C4" size="5" style="text-align: center" 
												                                type="text" value="0" onkeypress="return numbersonly(this, event)" 
												                                disabled="disabled" onblur="checkNullPg7Sc11I6toI20Enable(); checkNumValue(this),setPercentage(this, 0)"/></td>
									                                </tr>
								                                </table>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
			                                <tr>
				                                <td width="820px">
					                                <table class="tblForm">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="30%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I18C1" maxlength="20" 
												                                name="frm1702RT:txtPg7Sc11I18C1" size="30" type="text" value="" 
												                                onblur="capitalize(this);checkNullPg7Sc11I6toI20Enable()" onkeypress="return Name(this, event);" disabled="disabled"/></td>
										                                <td align="center">
										                                <input id="frm1702RT:txtPg7Sc11I18Tin1" maxlength="3" name="frm1702RT:txtPg7Sc11I18Tin1" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I18Tin2" maxlength="3" name="frm1702RT:txtPg7Sc11I18Tin2" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I18Tin3" maxlength="3" name="frm1702RT:txtPg7Sc11I18Tin3" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I18Tin4" maxlength="3" name="frm1702RT:txtPg7Sc11I18Tin4" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeypress="return wholenumber(this, event)" disabled="disabled"/>
										                                </td>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I18C3" maxlength="12" 
												                                name="frm1702RT:txtPg7Sc11I18C3" size="30" type="text" value="0" 
												                                style="text-align: right" onfocus="this.value=WholeNumWithComma(this.value)" 
												                                onblur="checkNumValue(this),this.value=addCommas(this.value); checkNullPg7Sc11I6toI20Enable()" 
												                                onkeypress="return wholenumber(this, event)" disabled="disabled"/></td>
										                                <td align="center">
											                                <input id="frm1702RT:txtPg7Sc11I18C4" maxlength="5" 
												                                name="frm1702RT:txtPg7Sc11I18C4" size="5" style="text-align: center" 
												                                type="text" value="0" onkeypress="return numbersonly(this, event)" 
												                                disabled="disabled" onblur="checkNullPg7Sc11I6toI20Enable(); checkNumValue(this),setPercentage(this, 0)"/></td>
									                                </tr>
								                                </table>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
			                                <tr>
				                                <td width="820px">
					                                <table class="tblForm">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="30%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I19C1" maxlength="20" 
												                                name="frm1702RT:txtPg7Sc11I19C1" size="30" type="text" value="" 
												                                onblur="capitalize(this);checkNullPg7Sc11I6toI20Enable()" onkeypress="return Name(this, event);" disabled="disabled"/></td>
										                                <td align="center">
										                                <input id="frm1702RT:txtPg7Sc11I19Tin1" maxlength="3" name="frm1702RT:txtPg7Sc11I19Tin1" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I19Tin2" maxlength="3" name="frm1702RT:txtPg7Sc11I19Tin2" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I19Tin3" maxlength="3" name="frm1702RT:txtPg7Sc11I19Tin3" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I19Tin4" maxlength="3" name="frm1702RT:txtPg7Sc11I19Tin4" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false); checkNullPg7Sc11I6toI20Enable()" onkeypress="return wholenumber(this, event)" disabled="disabled"/>
										                                </td>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I19C3" maxlength="12" 
												                                name="frm1702RT:txtPg7Sc11I19C3" size="30" type="text" value="0" 
												                                style="text-align: right" onfocus="this.value=WholeNumWithComma(this.value)" 
												                                onblur="checkNumValue(this),this.value=addCommas(this.value); checkNullPg7Sc11I6toI20Enable()" 
												                                onkeypress="return wholenumber(this, event)" disabled="disabled"/></td>
										                                <td align="center">
											                                <input id="frm1702RT:txtPg7Sc11I19C4" maxlength="5" 
												                                name="frm1702RT:txtPg7Sc11I19C4" size="5" style="text-align: center" 
												                                type="text" value="0" onkeypress="return numbersonly(this, event)" 
												                                disabled="disabled" onblur="checkNullPg7Sc11I6toI20Enable(); checkNumValue(this),setPercentage(this, 0)"/></td>
									                                </tr>
								                                </table>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
			                                <tr>
				                                <td width="820px">
					                                <table class="tblForm">
						                                <tr>
							                                <td class="tblFormTd" valign="top" width="30%">
								                                <table border="0" cellpadding="0" cellspacing="0">
									                                <tr>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I20C1" maxlength="20" 
												                                name="frm1702RT:txtPg7Sc11I20C1" size="30" type="text" value="" 
												                                onblur="capitalize(this);checkNullPg7Sc11I6toI20Enable()" onkeypress="return Name(this, event);" disabled="disabled"/></td>
										                                <td align="center">
										                                <input id="frm1702RT:txtPg7Sc11I20Tin1" maxlength="3" name="frm1702RT:txtPg7Sc11I20Tin1" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false)" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I20Tin2" maxlength="3" name="frm1702RT:txtPg7Sc11I20Tin2" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false)" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I20Tin3" maxlength="3" name="frm1702RT:txtPg7Sc11I20Tin3" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false)" onkeyup="moveToNext(this, 3);" onkeypress="return wholenumber(this, event)" 
												                                disabled="disabled"/>
										                                <input id="frm1702RT:txtPg7Sc11I20Tin4" maxlength="3" name="frm1702RT:txtPg7Sc11I20Tin4" 
												                                size="3" type="text" value="" style="text-align: center" 
												                                onblur="validateTIN(this, false)" onkeypress="return wholenumber(this, event)" disabled="disabled"/>
										                                </td>
										                                <td align="center"><input id="frm1702RT:txtPg7Sc11I20C3" maxlength="12" 
												                                name="frm1702RT:txtPg7Sc11I20C3" size="30" type="text" value="0" 
												                                style="text-align: right" onfocus="this.value=WholeNumWithComma(this.value)" 
												                                onblur="checkNumValue(this),this.value=addCommas(this.value)" 
												                                onkeypress="return wholenumber(this, event)" disabled="disabled"/></td>
										                                <td align="center">
											                                <input id="frm1702RT:txtPg7Sc11I20C4" maxlength="5" 
												                                name="frm1702RT:txtPg7Sc11I20C4" size="5" style="text-align: center" 
												                                type="text" value="0" onblur="checkNumValue(this),setPercentage(this, 0)" onkeypress="return numbersonly(this, event)" 
												                                disabled="disabled"/></td>
									                                </tr>
								                                </table>
							                                </td>
						                                </tr>
					                                </table>
				                                </td>
			                                </tr>
		                                </table>
	                                </div>
	                                <!--Page 8-->
	                                <div id="Page8Content" style="display:none">
										<table border="0" cellpadding="0" cellspacing="0" width="826px">
											<tr>
												<td>
													<table class="FormHeader">
														<tr>
															<td align="center" width="40%">
																<font class="xlargeBold">Annual Income Tax Return<br/></font>
																<font class="smallBold">Page 8 - Schedule 12 & 13</font>
															</td>
															<td align="center" valign="top" width="20%">
																<font class="xsmall">BIR Form No.<br/></font>
																<font class="xlargeBold">1702-RT<br/></font>
																<font class="xsmall">June 2013</font>
															</td>
															<td align="right" valign="bottom">
																<div style="float: right">
																	<img alt="" src="{{ asset('images/1702RT_BarCode/1702-RT06_13P8.png') }}" style="height:35px; width:250px"/>
																	<br/>
																	<span class="xsmallBold">1702-RT06/13P8</span>
																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<tr>
												<td>
													<table class="tblForm" width="820px">
														<tr>
															<td class="tblFormTd" valign="top" width="40%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td width="340px"><font class="smallBold">&nbsp Taxpayer Identification
																			Number (TIN)</font></td>
																	</tr>
																	<tr>
																		<td width="340px">
																			<font face="Arial" size="2">
																				&nbsp 
																				<input disabled="disabled" id="frm1702RT:txtPg8TIN1" maxlength="3" name="frm1702RT:txtTIN1" size="6" style="text-align:center;" value="{{$company->tin1}}"/>
																				<input disabled="disabled" id="frm1702RT:txtPg8TIN2" maxlength="3" name="frm1702RT:txtTIN2" size="6" style="text-align:center;" value="{{$company->tin2}}"/>
																				<input disabled="disabled" id="frm1702RT:txtPg8TIN3" maxlength="3" name="frm1702RT:txtTIN3" size="6" style="text-align:center;" value="{{$company->tin3}}"/>
																				<input disabled="disabled" id="frm1702RT:txtPg8BranchCode" maxlength="3" name="frm1702RT:txtTIN4" size="6" style="text-align:center; display:none" value="{{$company->tin4}}"/>
																				<input disabled="disabled" id="txtBranchMaskP8" name="txtBranchMaskP8" size="4" style="text-align:center" value="0000"/>
																			</font>
																		</td>
																	</tr>
																</table>
															</td>
															<td class="tblFormTd" valign="top" width="60%">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td>
																			<font class="smallBold">&nbsp; &nbsp; Registered Name</font></td>
																	</tr>
																	<tr>
																		<td>
																			<font face="Arial" size="2">
																				&nbsp; 
																				<input disabled="disabled" id="frm1702RT:txtPg8RegisteredName" name="frm1702RT:txtRegisteredName" maxlength="24" style="width: 480px" value="{{$company->registered_name}}"/>
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
												<td class="tblFormTd">
													<div id="frm1702RT:divSchedule12">
														<table class="tblForm" id="frm1702RT:tblSchedule12Header">
															<tr>
																<td class="tblFormTd" style="width: 100%; border-bottom: #000000 2px solid; border-top: #000000 2px solid; text-align:center">
																	<span class="smallBold">Schedule 12 - Supplemental Information</span>
																	<span class="smallItalic">&nbsp;(Attach additional sheet/s, if necessary)</span>
																</td>
															</tr>
														</table>
														<table class="tblForm" id="frm1702RT:tblSchedule12I">
															<tr>
																<td class="tblFormTd" style="width: 19%; text-align: left;">
																	<label class="smaller">I) Gross Income / Receipts Subjected to Final
																		Withholding</label>
																</td>
																<td class="tblFormTd" style="width: 27%; text-align:center">
																	<span class="small">A) Exempt</span>
																</td>
																<td class="tblFormTd" style="width: 27%; text-align:center">
																	<label class="small">B) Actual Amount / Fair Market Value / Net Capital
																		Gains</label>
																</td>
																<td class="tblFormTd" style="width: 27%; text-align:center">
																	<span class="small">C) Final Tax Withheld / Paid</span>
																</td>
															</tr>
															<tr>
																<td class="tblFormTd" style="width: 19%; text-align: left;">
																	<span class="smallBold">1</span>
																	Interests 
																</td>
																<td align="center" class="tblFormTd" style="width: 27%;">
																	<input id="frm1702RT:txtPg8Sc12I1C1" maxlength="12" name="frm1702RT:txtPg8Sc12I1C1" onblur="checkNumValue(this),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" size="34" style="text-align:right; width: 200px" type="text" value="0" tabindex="1"/>
																</td>
																<td align="center" class="tblFormTd" style="width: 27%;">
																	<input id="frm1702RT:txtPg8Sc12I1C2" maxlength="12" name="frm1702RT:txtPg8Sc12I1C2" onblur="checkNumValue(this),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" size="34" style="text-align:right; width: 200px" type="text" value="0" tabindex="2"/>
																</td>
																<td align="center" class="tblFormTd" style="width: 27%;">
																	<input id="frm1702RT:txtPg8Sc12I1C3" maxlength="12" name="frm1702RT:txtPg8Sc12I1C3" onblur="checkNumValue(this),computePg8Sc12I19(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" size="34" style="text-align:right; width: 200px" type="text" value="0" tabindex="3"/>
																</td>
															</tr>
															<tr>
																<td class="tblFormTd" style="width: 19%; text-align: left;">
																	<span class="smallBold">2</span>
																	Royalties 
																</td>
																<td align="center" class="tblFormTd" style="width: 27%;">
																	<input id="frm1702RT:txtPg8Sc12I2C1" maxlength="12" name="frm1702RT:txtPg8Sc12I2C1" onblur="checkNumValue(this),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" size="34" style="text-align:right; width: 200px" type="text" value="0" tabindex="4"/>
																</td>
																<td align="center" class="tblFormTd" style="width: 27%;">
																	<input id="frm1702RT:txtPg8Sc12I2C2" maxlength="12" name="frm1702RT:txtPg8Sc12I2C2" onblur="checkNumValue(this),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" size="34" style="text-align:right; width: 200px" type="text" value="0" tabindex="5"/>
																</td>
																<td align="center" class="tblFormTd" style="width: 27%;">
																	<input id="frm1702RT:txtPg8Sc12I2C3" maxlength="12" name="frm1702RT:txtPg8Sc12I2C3" onblur="checkNumValue(this),computePg8Sc12I19(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" size="34" style="text-align:right; width: 200px" type="text" value="0" tabindex="6"/>
																</td>
															</tr>
															<tr>
																<td class="tblFormTd" style="width: 19%; text-align: left;">
																	<span class="smallBold">3</span>
																	Dividends 
																</td>
																<td align="center" class="tblFormTd" style="width: 27%;">
																	<input id="frm1702RT:txtPg8Sc12I3C1" maxlength="12" name="frm1702RT:txtPg8Sc12I3C1" onblur="checkNumValue(this),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" size="34" style="text-align:right; width: 200px" type="text" value="0" tabindex="7"/>
																</td>
																<td align="center" class="tblFormTd" style="width: 27%;">
																	<input id="frm1702RT:txtPg8Sc12I3C2" maxlength="12" name="frm1702RT:txtPg8Sc12I3C2" onblur="checkNumValue(this),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" size="34" style="text-align:right; width: 200px" type="text" value="0" tabindex="8"/>
																</td>
																<td align="center" class="tblFormTd" style="width: 27%;">
																	<input id="frm1702RT:txtPg8Sc12I3C3" maxlength="12" name="frm1702RT:txtPg8Sc12I3C3" onblur="checkNumValue(this),computePg8Sc12I19(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" size="34" style="text-align:right; width: 200px" type="text" value="0" tabindex="9"/>
																</td>
															</tr>
															<tr>
																<td class="tblFormTd" style="width: 19%; text-align: left;">
																	<span class="smallBold">4</span>
																	Prizes and Winnings
																</td>
																<td align="center" class="tblFormTd" style="width: 27%;">
																	<input id="frm1702RT:txtPg8Sc12I4C1" maxlength="12" name="frm1702RT:txtPg8Sc12I4C1" onblur="checkNumValue(this),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" size="34" style="text-align:right; width: 200px" type="text" value="0" tabindex="10"/>
																</td>
																<td align="center" class="tblFormTd" style="width: 27%;">
																	<input id="frm1702RT:txtPg8Sc12I4C2" maxlength="12" name="frm1702RT:txtPg8Sc12I4C2" onblur="checkNumValue(this),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" size="34" style="text-align:right; width: 200px" type="text" value="0" tabindex="11"/>
																</td>
																<td align="center" class="tblFormTd" style="width: 27%;">
																	<input id="frm1702RT:txtPg8Sc12I4C3" maxlength="12" name="frm1702RT:txtPg8Sc12I4C3" onblur="checkNumValue(this),computePg8Sc12I19(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" size="34" style="text-align:right; width: 200px" type="text" value="0" tabindex="12"/>
																</td>
															</tr>
															<tr>
																<td class="tblFormTd" style="width: 19%; text-align: left;"></td>
																<td align="center" class="tblFormTd" style="width: 27%;"></td>
																<td align="center" class="tblFormTd" style="width: 27%;"></td>
																<td align="center" class="tblFormTd" style="width: 27%;">
																	<input class="xsmall" id="btnPg8Sc12I4More" name="moreButton" onclick="loadModalTable(this)" type="button" value="(Add more...)" tabindex="13"/>
																</td>
															</tr>
														</table>
														<table class="tblForm" id="frm1702RT:tblSchedule12II">
															<tr>
																<td class="tblFormTd" style="width: 46%; text-align: left; border-top: #000000 1px solid; ">
																	<span class="smallBold">II) Sale / Exchange of Real Properties</span>
																</td>
																<td class="tblFormTd" style="width: 27%; text-align:center; border-top: #000000 1px solid;">
																	<span class="small">A) Sale / Exchange #1</span>
																</td>
																<td class="tblFormTd" style="width: 27%; text-align:center; border-top: #000000 1px solid;">
																	<span class="small">B) Sale / Exchange #2</span>
																</td>
															</tr>
															<tr>
																<td class="tblFormTd" style="width: 46%; text-align: left; height: 26px;">
																	<span class="smallBold">5</span>
																	<span class="smallBold">Description of Property</span>
																	<span class="helpText smallBold">(e.g., land, improvement, etc.)</span>
																</td>
																<td align="center" class="tblFormTd" style="width: 27%; height: 26px;">
																	<input id="frm1702RT:txtPg8Sc12I5C1" maxlength="23"  name="frm1702RT:txtPg8Sc12I5C1" onblur="capitalize(this);checkPg8Sc12Pt2C1();" size="34" onkeypress="return Name(this, event);" type="text" value="" tabindex="14"/>
																</td>
																<td align="center" class="tblFormTd" style="width: 27%; height: 26px;">
																	<input disabled="disabled" id="frm1702RT:txtPg8Sc12I5C2" maxlength="23" name="frm1702RT:txtPg8Sc12I5C2" onblur="capitalize(this); checkPg8Sc12Pt2C2()" size="34" onkeypress="return Name(this, event);" type="text" tabindex="19"/>
																</td>
															</tr>
															<tr>
																<td class="tblFormTd" style="width: 46%; text-align: left;">
																	<span class="smallBold">6</span>
																	<span class="smallBold">OCT/TCT/CCT/Tax Declaration No.</span>	
																</td>
																<td align="center" class="tblFormTd" style="width: 27%;">
																	<input id="frm1702RT:txtPg8Sc12I6C1" maxlength="23"  name="frm1702RT:txtPg8Sc12I6C1" onblur="capitalize(this); checkPg8Sc12Pt2C1()" size="34" onkeypress="return Name(this, event);" style="text-align: left" type="text" tabindex="15"/>
																</td>
																<td align="center" class="tblFormTd" style="width: 27%;">
																	<input disabled="disabled" id="frm1702RT:txtPg8Sc12I6C2" maxlength="23" name="frm1702RT:txtPg8Sc12I6C2" onblur="capitalize(this); checkPg8Sc12Pt2C2()" size="34" onkeypress="return Name(this, event);" style="text-align: left" type="text" tabindex="20"/>
																</td>
															</tr>
															<tr>
																<td class="tblFormTd" style="width: 46%; text-align: left;">
																	<span class="smallBold">7</span>
																	<span class="smallBold">Certificate Authorizing Registration (CAR) No.</span>
																</td>
																<td align="center" class="tblFormTd" style="width: 27%;">
																	<input id="frm1702RT:txtPg8Sc12I7C1" maxlength="23" 
	                                                                    name="frm1702RT:txtPg8Sc12I7C1" onblur="capitalize(this); checkPg8Sc12Pt2C1()" 
	                                                                    size="34" onkeypress="return Name(this, event);" style="text-align: left" type="text" tabindex="16"/>
																</td>
																<td align="center" class="tblFormTd" style="width: 27%;">
																	<input disabled="disabled" id="frm1702RT:txtPg8Sc12I7C2" maxlength="23" 
	                                                                    name="frm1702RT:txtPg8Sc12I7C2" onblur="capitalize(this); checkPg8Sc12Pt2C2()" 
	                                                                    size="34" onkeypress="return Name(this, event);" style="text-align: left" type="text" tabindex="21"/>
																</td>
															</tr>
															<tr>
																<td class="tblFormTd" style="width: 46%; text-align: left;">
																	<span class="smallBold">8</span>
																	<span class="smallBold">Actual Amount/Fair Market Value/Net Capital Gains</span>
																</td>
																<td align="center" class="tblFormTd" style="width: 27%;">
																	<input id="frm1702RT:txtPg8Sc12I8C1" maxlength="12" name="frm1702RT:txtPg8Sc12I8C1" onblur="checkNumValue(this),this.value=addCommas(this.value);checkPg8Sc12Pt2C1()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" size="34" style="text-align:right" type="text" value="0" tabindex="17"/>
																</td>
																<td align="center" class="tblFormTd" style="width: 27%;">
																	<input disabled="disabled" id="frm1702RT:txtPg8Sc12I8C2" maxlength="12" name="frm1702RT:txtPg8Sc12I8C2" onblur="checkNumValue(this),this.value=addCommas(this.value);checkPg8Sc12Pt2C2()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" size="34" style="text-align:right" type="text" value="0" tabindex="22"/>
																</td>
															</tr>
															<tr>
																<td class="tblFormTd" style="width: 46%; text-align: left;">
																	<span class="smallBold">9</span>
																	<span class="smallBold">Final Tax Withheld/Paid</span>
																</td>
																<td align="center" class="tblFormTd" style="width: 27%;">
																	<input id="frm1702RT:txtPg8Sc12I9C1" maxlength="12" name="frm1702RT:txtPg8Sc12I9C1" onblur="checkNumValue(this),computePg8Sc12I19(),this.value=addCommas(this.value);checkPg8Sc12Pt2C1()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" size="34" style="text-align:right" type="text" value="0" tabindex="18"/>
																</td>
																<td align="center" class="tblFormTd" style="width: 27%;">
																	<input disabled="disabled" id="frm1702RT:txtPg8Sc12I9C2" maxlength="12" name="frm1702RT:txtPg8Sc12I9C2" onblur="checkNumValue(this),computePg8Sc12I19(),this.value=addCommas(this.value);checkPg8Sc12Pt2C2()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" size="34" style="text-align:right" type="text" value="0" tabindex="23"/>
																</td>
															</tr>
															<tr>
																<td class="tblFormTd" style="width: 46%; text-align: left;"></td>
																<td align="center" class="tblFormTd" style="width: 27%;"></td>
																<td align="center" class="tblFormTd" style="width: 27%;">
																	<input disabled="disabled" id="frm1702RT:btnModalPg8Sc12II" name="moreButton" onclick="Load_modalDivPg8Sc12II(), openDialog2('popModalDivPg8Sc12II')" style="font-size:smaller" type="button" value="(Add more...)" tabindex="24"/>
																</td>
															</tr>
														</table>
														<table class="tblForm" id="frm1702RT:tblSchedule12III">
															<tr>
																<td class="tblFormTd" style="width: 46%; text-align: left; border-top: #000000 1px solid; border-bottom: #000000 1px solid;">
																	<span class="smallBold">III) Sale / Exchange of Shares of Stock</span>
																</td>
																<td class="tblFormTd" style="width: 27%; text-align:center; border-top: #000000 1px solid; border-bottom: #000000 1px solid;">
																	<span class="small">A) Sale / Exchange #3</span>
																</td>
																<td class="tblFormTd" style="width: 27%; text-align:center; border-top: #000000 1px solid; border-bottom: #000000 1px solid;">
																	<span class="small">B) Sale / Exchange #4</span>
																</td>
															</tr>
															<tr>
																<td class="tblFormTd" style="width: 46%; text-align: left;">
																	<span class="smallBold">10</span>
																	<span class="smallBold">Kind</span>
																	<span style="font-style: italic;">(PS/CS)</span>
																	<span class="smallBold">/ Stock Certificate Series No.</span>
																</td>
																<td align="center" class="tblFormTd" style="width: 27%;">
																	<select id="frm1702RT:ddlPg8Sc12I10C1" name="frm1702RT:ddlPg8Sc12I10C1" onchange="checkPg8Sc12Pt3C1();getSelectedValue(this)" tabindex="25">
																		<option class="PS" value="PS">PS</option>
																		<option class="CS" value="CS">CS</option>
																	</select>
																	<input id="frm1702RT:txtPg8Sc12I10C1" maxlength="18" 
	                                                                    name="frm1702RT:txtPg8Sc12I10C1" onblur="capitalize(this);checkPg8Sc12Pt3C1()" 
	                                                                    size="26" onkeypress="return Name(this, event);" type="text" tabindex="26"/>
																</td>
																<td align="center" class="tblFormTd" style="width: 27%;">
																	<select disabled="disabled" id="frm1702RT:ddlPg8Sc12I10C2" name="frm1702RT:ddlPg8Sc12I10C2" onchange="checkPg8Sc12Pt3C2()" tabindex="32"/>
																	<option value="PS">PS</option>
																	<option value="CS">CS</option>
																</select>
																<input disabled="disabled" id="frm1702RT:txtPg8Sc12I10C2" maxlength="18" 
	                                                                    name="frm1702RT:txtPg8Sc12I10C2" onblur="capitalize(this);checkPg8Sc12Pt3C2()" 
	                                                                    size="26" onkeypress="return Name(this, event);" type="text" tabindex="33"/>
															</td>
														</tr>
														<tr>
															<td class="tblFormTd" style="width: 46%; text-align: left;">
																<span class="smallBold">11</span>
																<span class="smallBold">Certificate Authorizing Registration (CAR) No.</span>
															</td>
															<td align="center" class="tblFormTd" style="width: 27%;">
																<input id="frm1702RT:txtPg8Sc12I11C1" maxlength="23" 
	                                                                name="frm1702RT:txtPg8Sc12I11C1" onblur="capitalize(this);checkPg8Sc12Pt3C1()" 
	                                                                size="34" style="text-align: left" onkeypress="return Name(this, event);" type="text" tabindex="27"/>
															</td>
															<td align="center" class="tblFormTd" style="width: 27%;">
																<input disabled="disabled" id="frm1702RT:txtPg8Sc12I11C2" maxlength="23" 
	                                                                name="frm1702RT:txtPg8Sc12I11C2" onblur="capitalize(this);checkPg8Sc12Pt3C2()" 
	                                                                size="34" style="text-align: left" onkeypress="return Name(this, event);" type="text" tabindex="34"/>
															</td>
														</tr>
														<tr>
															<td class="tblFormTd" style="width: 46%; text-align: left;">
																<span class="smallBold">12</span>
																<span class="smallBold">Number of Shares</span>
															</td>
															<td align="center" class="tblFormTd" style="width: 27%;">
																<input id="frm1702RT:txtPg8Sc12I12C1" maxlength="12" name="frm1702RT:txtPg8Sc12I12C1" onblur="checkNumValue(this),this.value=addCommas(this.value);checkPg8Sc12Pt3C1()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" size="34" style="text-align:right" type="text" value="0" tabindex="28"/>
															</td>
															<td align="center" class="tblFormTd" style="width: 27%;">
																<input disabled="disabled" id="frm1702RT:txtPg8Sc12I12C2" maxlength="12" name="frm1702RT:txtPg8Sc12I12C2" onblur="checkNumValue(this),this.value=addCommas(this.value);checkPg8Sc12Pt3C2()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" size="34" style="text-align:right" type="text" value="0" tabindex="35"/>
															</td>
														</tr>
														<tr>
															<td class="tblFormTd" style="width: 46%; text-align: left;">
																<span class="smallBold">13</span>
																<span class="smallBold">Date of Issue</span>
																<span style="font-style: italic;">(MM/DD/YYYY)
																</span>
															</td>
															<td align="center" class="tblFormTd" style="width: 27%;">
																<input id="frm1702RT:txtPg8Sc12I13C1Date" name="frm1702RT:txtPg8Sc12I13C1Date" 
	                                                                onblur="validateIssueDateSchedule12(this);checkPg8Sc12Pt3C1()" 
	                                                                onkeypress="dateMasking(this); return wholenumber(event, false);" size="34" 
	                                                                style="text-align:center" type="text" maxlength="10" tabindex="29"/>
															</td>
															<td align="center" class="tblFormTd" style="width: 27%;">
																<input id="frm1702RT:txtPg8Sc12I13C2Date" name="frm1702RT:txtPg8Sc12I13C2Date" 
	                                                                onblur="validateIssueDateSchedule12(this);checkPg8Sc12Pt3C2()" 
	                                                                onkeypress="dateMasking(this); return wholenumber(event, false);" size="34" 
	                                                                style="text-align:center" type="text" disabled="disabled" maxlength="10" tabindex="36"/>
															</td>
														</tr>
														<tr>
															<td class="tblFormTd" style="width: 46%; text-align: left;">
																<span class="smallBold">14</span>
																<span class="smallBold">Actual Amount/Fair Market Value/Net Capital Gains</span>
															</td>
															<td align="center" class="tblFormTd" style="width: 27%;">
																<input id="frm1702RT:txtPg8Sc12I14C1" maxlength="12" name="frm1702RT:txtPg8Sc12I14C1" onblur="checkNumValue(this),this.value=addCommas(this.value);checkPg8Sc12Pt3C1()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" size="34" style="text-align:right" type="text" value="0" tabindex="30"/>
															</td>
															<td align="center" class="tblFormTd" style="width: 27%;">
																<input disabled="disabled" id="frm1702RT:txtPg8Sc12I14C2" maxlength="12" name="frm1702RT:txtPg8Sc12I14C2" onblur="checkNumValue(this),this.value=addCommas(this.value);checkPg8Sc12Pt3C2()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" size="34" style="text-align:right" type="text" value="0" tabindex="37"/>
															</td>
														</tr>
														<tr>
															<td class="tblFormTd" style="width: 46%; text-align: left;">
																<span class="smallBold">15</span>
																<span class="smallBold">Final Tax Withheld/Paid</span>
															</td>
															<td align="center" class="tblFormTd" style="width: 27%;">
																<input id="frm1702RT:txtPg8Sc12I15C1" maxlength="12" name="frm1702RT:txtPg8Sc12I15C1" onblur="checkNumValue(this),computePg8Sc12I19(),this.value=addCommas(this.value);checkPg8Sc12Pt3C1()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" size="34" style="text-align:right" type="text" value="0" tabindex="31"/>
															</td>
															<td align="center" class="tblFormTd" style="width: 27%;">
																<input disabled="disabled" id="frm1702RT:txtPg8Sc12I15C2" maxlength="12" name="frm1702RT:txtPg8Sc12I15C2" onblur="checkNumValue(this),computePg8Sc12I19(),this.value=addCommas(this.value);checkPg8Sc12Pt3C2()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" size="34" style="text-align:right" type="text" value="0" tabindex="38"/>
															</td>
														</tr>
														<tr>
															<td class="tblFormTd" style="width: 46%; text-align: left;"></td>
															<td align="center" class="tblFormTd" style="width: 27%;"></td>
															<td align="center" class="tblFormTd" style="width: 27%;">
																<input disabled="disabled" id="frm1702RT:btnModalPg8Sc12III" name="moreButton" onclick="Load_modalDivPg8Sc12III(), openDialog2('popModalDivPg8Sc12III')" style="font-size:smaller" type="button" value="(Add more...)" tabindex="39"/>
															</td>
														</tr>
													</table>
													<table class="tblForm" id="frm1702RT:tblSchedule12IV">
														<tr>
															<td class="tblFormTd" style="width: 46%; text-align: left; border-top: #000000 1px solid; border-bottom: #000000 1px solid;">
																<span class="smallBold">IV) Other Income</span>
																<span class="smallBoldItalic">(Specify)</span>
															</td>
															<td class="tblFormTd" style="width: 27%; text-align:center; border-top: #000000 1px solid; border-bottom: #000000 1px solid;">
																<span class="small">A) Other Income #1</span>
															</td>
															<td class="tblFormTd" style="width: 27%; text-align:center; border-top: #000000 1px solid; border-bottom: #000000 1px solid;">
																<span class="small">B) Other Income #2</span>
															</td>
														</tr>
														<tr>
															<td class="tblFormTd" style="width: 46%; text-align: left;">
																<span class="smallBold">16</span>
																<span class="smallBold">Other Income Subject to Final Tax Under Sections 57(A)/127/others of the Tax
																	Code, as amended</span>
																<span class="helpText">(Specify)</span>
															</td>
															<td align="center" class="tblFormTd" style="width: 27%;">
																<input id="frm1702RT:txtPg8Sc12I16C1" maxlength="23" 
	                                                                name="frm1702RT:txtPg8Sc12I16C1" onblur="capitalize(this);checkPg8Sc12Pt4C1()" 
	                                                                size="34" style="text-align: left" onkeypress="return Name(this, event);" type="text" tabindex="40"/>
															</td>
															<td align="center" class="tblFormTd" style="width: 27%;">
																<input disabled="disabled" id="frm1702RT:txtPg8Sc12I16C2" maxlength="23" 
	                                                                name="frm1702RT:txtPg8Sc12I16C2" onblur="capitalize(this);checkPg8Sc12Pt4C2()" 
	                                                                size="34" style="text-align: left" onkeypress="return Name(this, event);" type="text" tabindex="43"/>
															</td>
														</tr>
														<tr>
															<td class="tblFormTd" style="width: 46%; text-align: left;">
																<span class="smallBold">17</span>
																<span class="smallBold">Actual Amount/Fair Market Value/Net Capital Gains</span>
															</td>
															<td align="center" class="tblFormTd" style="width: 27%;">
																<input id="frm1702RT:txtPg8Sc12I17C1" maxlength="12" name="frm1702RT:txtPg8Sc12I17C1" onblur="checkNumValue(this),this.value=addCommas(this.value);checkPg8Sc12Pt4C1()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" size="34" style="text-align:right" type="text" value="0" tabindex="41"/>
															</td>
															<td align="center" class="tblFormTd" style="width: 27%;">
																<input disabled="disabled" id="frm1702RT:txtPg8Sc12I17C2" maxlength="12" name="frm1702RT:txtPg8Sc12I17C2" onblur="checkNumValue(this),this.value=addCommas(this.value);checkPg8Sc12Pt4C2()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" size="34" style="text-align:right" type="text" value="0" tabindex="44"/>
															</td>
														</tr>
														<tr>
															<td class="tblFormTd" style="width: 46%; text-align: left;">
																<span class="smallBold">18</span>
																<span class="smallBold">Final Tax Withheld/Paid</span>
															</td>
															<td align="center" class="tblFormTd" style="width: 27%;">
																<input id="frm1702RT:txtPg8Sc12I18C1" maxlength="12" name="frm1702RT:txtPg8Sc12I18C1" onblur="checkNumValue(this),computePg8Sc12I19(),this.value=addCommas(this.value);checkPg8Sc12Pt4C1()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" size="34" style="text-align:right" type="text" value="0" tabindex="42"/>
															</td>
															<td align="center" class="tblFormTd" style="width: 27%;">
																<input disabled="disabled" id="frm1702RT:txtPg8Sc12I18C2" maxlength="12" name="frm1702RT:txtPg8Sc12I18C2" onblur="checkNumValue(this),computePg8Sc12I19(),this.value=addCommas(this.value);checkPg8Sc12Pt4C2()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" size="34" style="text-align:right" type="text" value="0" tabindex="45"/>
															</td>
														</tr>
														<tr>
															<td class="tblFormTd" style="width: 46%; text-align: left;"></td>
															<td align="center" class="tblFormTd" style="width: 27%;"></td>
															<td align="center" class="tblFormTd" style="width: 27%;">
																<input disabled="disabled" id="frm1702RT:btnModalPg8Sc12IV" name="moreButton" onclick="Load_modalDivPg8Sc12IV(), openDialog2('popModalDivPg8Sc12IV')" style="font-size:smaller" type="button" value="(Add more...)" tabindex="46"/></td>
														</tr>
													</table>
													<table class="tblForm" id="frm1702RT:tblTotalFinalTax">
														<tr>
															<td class="tblFormTd" style="width: 73%; text-align: left;">
																<span class="smallBold">19</span>
																<span class="smallBold">Total Final Tax Withheld/Paid</span>
																<span class="xsmallItalic">(Sum of Items 1C to 4C, 9A, 9B, 15A, 15B, 18A &
																	18B)</span>
															</td>
															<td align="center" class="tblFormTd" style="width: 27%;">
																<input disabled="disabled" id="frm1702RT:txtSc12I19TotalFinalTaxWitheld" maxlength="12" name="frm1702RT:txtSc12I19TotalFinalTaxWitheld" size="34" style="text-align:right" type="text" value="0"/>
															</td>
														</tr>
													</table>
												</div>
												<!-- Div Holder for Schedule 13 -->
												<div id="frm1702RT:divSchedule13">
													<table class="tblForm" id="frm1702RT:tblSchedule13Header">
														<tr>
															<td class="tblFormTd" style="border-bottom: #000000 2px solid; border-top: #000000 2px solid; text-align:center;">
																<span class="smallBold" style="text-align:center;">Schedule 13 - Gross
																	Income/Receipts Exempt from Income Tax</span>
															</td>
														</tr>
													</table>
													<table class="tblForm" id="frm1702RT:tblSchedule13ReturnOfPremium">
														<tr>
															<td class="tblFormTd" style="width: 73%; text-align: left;">
																<span class="smallBold">1</span>
																<span class="smallBold">Return of Premium</span>
																<span class="helpText smallBold">(Actual Amount/Fair Market Value)</span>
															</td>
															<td align="center" class="tblFormTd" style="width: 27%;">
																<input id="frm1702RT:txtPg8Sc13I1ReturnOfPremium" maxlength="12" name="frm1702RT:txtPg8Sc13I1ReturnOfPremium" onblur="checkNumValue(this),computePg8Sc13I8(),this.value=addCommas(this.value)" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" size="34" style="text-align:right" type="text" value="0" tabindex="47"/>
															</td>
														</tr>
													</table>
													<table class="tblForm" id="frm1702RT:tblSchedule13I">
														<tr>
															<td class="tblFormTd" style="width: 46%; text-align: left; border-top: #000000 1px solid; ">
																<span class="smallBold">I) Personal/Real Properties Received thru Gifts,
																	Bequests, and Devises</span>
															</td>
															<td class="tblFormTd" style="width: 27%; text-align:center; border-top: #000000 1px solid;">
																<span class="small">A) Personal/Real Properties #1</span>
															</td>
															<td class="tblFormTd" style="width: 27%; text-align:center; border-top: #000000 1px solid;">
																<span class="small">B) Personal/Real Properties #2</span>
															</td>
														</tr>
														<tr>
															<td class="tblFormTd" style="width: 46%; text-align: left;">
																<span class="smallBold">2</span>
																<span class="smallBold">Description of Property</span>
																<span class="helpText smallBold">(e.g., land, improvement, etc.)</span>
															</td>
															<td align="center" class="tblFormTd" style="width: 27%;">
																<input id="frm1702RT:txtPg8Sc13I2C1" name="frm1702RT:txtPg8Sc13I2C1" 
	                                                                onblur="capitalize(this);checkPg8Sc13Pt1C1()" size="34" type="text" 
	                                                                maxlength="23" onkeypress="return Name(this, event);" tabindex="48">
																</td>
																<td align="center" class="tblFormTd" style="width: 27%;">
																	<input disabled="disabled" id="frm1702RT:txtPg8Sc13I2C2" name="frm1702RT:txtPg8Sc13I2C2" onblur="capitalize(this);checkPg8Sc13Pt1C2()" size="34" type="text" maxlength="23" onkeypress="return Name(this, event);" tabindex="52">
																</td>
																</tr>
																<tr>
																	<td class="tblFormTd" style="width: 46%; text-align: left;">
																		<span class="smallBold">3</span>
																		Mode of Transfer
																		<span class="helpText smallBold">(e.g. Donation)</span>
																	</td>
																	<td align="center" class="tblFormTd" style="width: 27%;">
																		<input id="frm1702RT:txtPg8Sc13I3C1" name="frm1702RT:txtPg8Sc13I3C1"  onblur="capitalize(this);checkPg8Sc13Pt1C1()" size="34" type="text"  maxlength="23" onkeypress="return Name(this, event);" tabindex="49">
																			
																		</td>
																		<td align="center" class="tblFormTd" style="width: 27%;">
																			<input disabled="disabled" id="frm1702RT:txtPg8Sc13I3C2" name="frm1702RT:txtPg8Sc13I3C2" onblur="capitalize(this);checkPg8Sc13Pt1C2()" size="34" type="text" maxlength="23" onkeypress="return Name(this, event);" tabindex="53">
																			
																			</td>
																		</tr>
																		<tr>
																			<td class="tblFormTd" style="width: 46%; text-align: left;">
																				<span class="smallBold">4</span>
																				<span class="smallBold">Certificate Authorizing Registration (CAR) No.</span>
																			</td>
																			<td align="center" class="tblFormTd" style="width: 27%;">
																				<input id="frm1702RT:txtPg8Sc13I4C1" maxlength="23" 
	                                                                                name="frm1702RT:txtPg8Sc13I4C1" onblur="capitalize(this);checkPg8Sc13Pt1C1()" 
	                                                                                size="34" style="text-align: left" onkeypress="return Name(this, event);" type="text" tabindex="50"/>
																			</td>
																			<td align="center" class="tblFormTd" style="width: 27%;">
																				<input disabled="disabled" id="frm1702RT:txtPg8Sc13I4C2" maxlength="23" 
	                                                                                name="frm1702RT:txtPg8Sc13I4C2" onblur="capitalize(this);checkPg8Sc13Pt1C2()" 
	                                                                                size="34" style="text-align: left" onkeypress="return Name(this, event);" type="text" tabindex="54"/>
																			</td>
																		</tr>
																		<tr>
																			<td class="tblFormTd" style="width: 46%; text-align: left;">
																				<span class="smallBold">5</span>
																				<span class="smallBold">Actual Amount/Fair Market Value</span>
																			</td>
																			<td align="center" class="tblFormTd" style="width: 27%;">
																				<input id="frm1702RT:txtPg8Sc13I5C1" maxlength="12" name="frm1702RT:txtPg8Sc13I5C1" onblur="checkNumValue(this),computePg8Sc13I8(),this.value=addCommas(this.value);checkPg8Sc13Pt1C1()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" size="34" style="text-align:right" type="text" value="0" tabindex="51"/>
																			</td>
																			<td align="center" class="tblFormTd" style="width: 27%;">
																				<input disabled="disabled" id="frm1702RT:txtPg8Sc13I5C2" maxlength="12" name="frm1702RT:txtPg8Sc13I5C2" onblur="checkNumValue(this),computePg8Sc13I8(),this.value=addCommas(this.value);checkPg8Sc13Pt1C2()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" size="34" style="text-align:right" type="text" value="0" tabindex="55"/>
																			</td>
																		</tr>
																		<tr>
																			<td class="tblFormTd" style="width: 46%; text-align: left;"></td>
																			<td align="center" class="tblFormTd" style="width: 27%;"></td>
																			<td align="center" class="tblFormTd" style="width: 27%;">
																				<input disabled="disabled" id="frm1702RT:btnModalPg8Sc13I" name="moreButton" onclick="Load_modalDivPg8Sc13I(), openDialog2('popModalDivPg8Sc13I')" style="font-size:smaller" type="button" value="(Add more...)" tabindex="56"/>
																			</td>
																		</tr>
																	</table>
																	<table class="tblForm" id="frm1702RT:tblSchedule13II">
																		<tr>
																			<td class="tblFormTd" style="width: 46%; text-align: left; border-top: #000000 1px solid; ">
																				<span class="smallBold">II) Other Exempt Income/Receipts</span>
																			</td>
																			<td class="tblFormTd" style="width: 27%; text-align:center; border-top: #000000 1px solid;">
																				<span class="small">A) Other Exempt Income #1</span>
																			</td>
																			<td class="tblFormTd" style="width: 27%; text-align:center; border-top: #000000 1px solid;">
																				<span class="small">B) Other Exempt Income #2</span>
																			</td>
																		</tr>
																		<tr>
																			<td class="tblFormTd" style="width: 46%; text-align: left;">
																				<span class="smallBold">6</span>
																				<span class="smallBold">Other Exempt Income/Receipts Under Sections 32 (B) of the Tax Code, as
																					amended</span>
																				<span class="helpText">(Specify)</span>
																			</td>
																			<td align="center" class="tblFormTd" style="width: 27%;">
																				<input id="frm1702RT:txtPg8Sc13I6C1" maxlength="23" 
	                                                                                name="frm1702RT:txtPg8Sc13I6C1" onblur="capitalize(this);checkPg8Sc13Pt2C1()" 
	                                                                                size="34" style="text-align: left" onkeypress="return Name(this, event);" type="text" tabindex="57"/>
																			</td>
																			<td align="center" class="tblFormTd" style="width: 27%;">
																				<input disabled="disabled" id="frm1702RT:txtPg8Sc13I6C2" maxlength="23" 
	                                                                                name="frm1702RT:txtPg8Sc13I6C2" onblur="capitalize(this);checkPg8Sc13Pt2C2()" 
	                                                                                size="34" style="text-align: left" onkeypress="return Name(this, event);" type="text" tabindex="59"/>
																			</td>
																		</tr>
																		<tr>
																			<td class="tblFormTd" style="width: 46%; text-align: left;">
																				<span class="smallBold">7</span>
																				<span class="smallBold">Actual Amount/Fair Market Value/Net Capital Gains</span>
																			</td>
																			<td align="center" class="tblFormTd" style="width: 27%;">
																				<input id="frm1702RT:txtPg8Sc13I7C1" maxlength="12" name="frm1702RT:txtPg8Sc13I7C1" onblur="checkNumValue(this),computePg8Sc13I8(),this.value=addCommas(this.value);checkPg8Sc13Pt2C1()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" size="34" style="text-align:right" type="text" value="0" tabindex="58"/>
																			</td>
																			<td align="center" class="tblFormTd" style="width: 27%;">
																				<input disabled="disabled" id="frm1702RT:txtPg8Sc13I7C2" maxlength="12" name="frm1702RT:txtPg8Sc13I7C2" onblur="checkNumValue(this),computePg8Sc13I8(),this.value=addCommas(this.value);checkPg8Sc13Pt2C2()" onfocus="this.value=WholeNumWithComma(this.value)" onkeypress="return wholenumber(this, event)" size="34" style="text-align:right" type="text" value="0" tabindex="60"/>
																			</td>
																		</tr>
																		<tr>
																			<td class="tblFormTd" style="width: 46%; text-align: left;"></td>
																			<td align="center" class="tblFormTd" style="width: 27%;"></td>
																			<td align="center" class="tblFormTd" style="width: 27%;">
																				<input disabled="disabled" id="frm1702RT:btnModalPg8Sc13II" name="moreButton" onclick="Load_modalDivPg8Sc13II(), openDialog2('popModalDivPg8Sc13II')" style="font-size:smaller" type="button" value="(Add more...)" tabindex="61"/></td>
																		</tr>
																	</table>
																	<table class="tblForm" id="frm1702RT:tblTotalIncome">
																		<tr>
																			<td class="tblFormTd" style="width: 73%; text-align: left;">
																				<span class="smallBold">8</span>
																				<span>Total Income/Receipts Exempt from Income tax</span>
																				<span class="xsmallItalic">(Sum of Items 1, 5A, 5B, 7A and 7B)</span>
																			</td>
																			<td align="center" class="tblFormTd" style="width: 27%;">
																				<input disabled="disabled" id="frm1702RT:txtPg8Sc13I8TotalIncome" maxlength="12" name="frm1702RT:txtPg8Sc13I8TotalIncome" size="34" style="text-align:right" type="text" value="0"/>
																			</td>
																		</tr>
																	</table>
																</div>
															</td>
														</tr>
													</table>
												</div>
												
										<div id="Print1Content" style="display: none; width: 846px; height: 1280px; font-family: Arial;">
											<img src="{{ asset('images/Print/82314BIR Form 1702-RT1.png') }}" style="position: absolute; background-color: white; width: 846px; height: 1280px;" />
											<div style="float: left; position: relative;">
												<div style="float: left; position: absolute; left: 73px;  top: 157px;"><span id="rdoPg1I1Calendar" class="smallBold"></span></div>	
												<div style="float: left; position: absolute; left: 152px; top: 157px;"><span id="rdoPg1I1Fiscal" class="smallBold"></span></div>
												<div style="float: left; position: absolute; left: 49px;  top: 191px;"><span id="ddlPg1I2Month" class="smallBold" style="letter-spacing: 8pt"></span></div>
												<div style="float: left; position: absolute; left: 120px; top: 191px;"><span id="txtPg1I2Year" class="smallBold" style="letter-spacing: 8pt"></span></div>
												<div style="float: left; position: absolute; left: 217px; top: 183px;"><span id="rdoPg1I2AmmendYes" class="smallBold"></span></div>	
												<div style="float: left; position: absolute; left: 281px; top: 183px;"><span id="rdoPg1I2AmmendNo" class="smallBold"></span></div>
												<div style="float: left; position: absolute; left: 344px; top: 183px;"><span id="rdoPg1I4ShortPeriodYes" class="smallBold"></span></div>	
												<div style="float: left; position: absolute; left: 410px; top: 183px;"><span id="rdoPg1I4ShortPeriodNo" class="smallBold"></span></div>
												<div style="float: left; position: absolute; left: 496px; top: 191px; width: 100px;"><span class="xsmall" style="letter-spacing: 0pt" id="drpPg1I5AtcOther1"></span></div>
												<div style="float: left; position: absolute; left: 568px; top: 191px; width: 180px;white-space:nowrap; overflow:hidden"><span class="xsmall" style="letter-spacing: 0pt" id="drpPg1I5AtcOther2"></span></div>
												<div style="float: left; position: absolute; left: 785px; top: 171px;"><span id="rdoPg1I5Atc" class="smallBold" ></span></div>	
												<div style="float: left; position: absolute; left: 785px; top: 189px;"><span id="rdoPg1I5AtcOther" class="smallBold"></span></div>
												<!---->
												<div style="float: left; position: absolute; left: 243px; top: 234px;"><span id="txtPg1Pt1I6TIN1" class="smallBold" style="letter-spacing: 12.5pt"></span></div>
												<div style="float: left; position: absolute; left: 340px; top: 234px;"><span id="txtPg1Pt1I6TIN2" class="smallBold" style="letter-spacing: 12.5pt"></span></div>
												<div style="float: left; position: absolute; left: 433px; top: 234px;"><span id="txtPg1Pt1I6TIN3" class="smallBold" style="letter-spacing: 12.5pt"></span></div>
												<div style="float: left; position: absolute; left: 718px; top: 234px;"><span id="txtPg1Pt1I7RDO" class="smallBold" style="letter-spacing: 14pt" id="drpPg1Pt1I7RDOCode"></span></div>
												<div style="float: left; position: absolute; left: 590px; top: 258px;"><span class="smallBold" style="letter-spacing: 14pt" id="txtPg1Pt1I8M"></span></div>
												<div style="float: left; position: absolute; left: 658px; top: 258px;"><span class="smallBold" style="letter-spacing: 8pt " id="txtPg1Pt1I8D"></span></div>
												<div style="float: left; position: absolute; left: 718px; top: 258px;"><span class="smallBold" style="letter-spacing: 14pt" id="txtPg1Pt1I8Y"></span></div>
												<!---->
												<div style="float: left; position: absolute; left: 30px;  top: 296px; width: 785px;letter-spacing: 2pt;"><span id="txtPg1Pt1I9Name" class="smallBold" style="line-height: 165%;"></span></div>
												<div style="float: left; position: absolute; left: 30px;  top: 359px; width: 785px;letter-spacing: 2pt"><span id="txtPg1Pt1I10Address1" class="smallBold"></span></div>
												<div style="float: left; position: absolute; left: 30px;  top: 382px; width: 785px;letter-spacing: 2pt; white-space:nowrap; overflow:hidden"><span id="txtPg1Pt1I10Address2" class="smallBold"></span></div>
												<div style="float: left; position: absolute; left: 35px;  top: 425px;"><span class="smallBold" style="letter-spacing: 8pt" id="txtPg1Pt1I11Contact1"></span></div>
												<div style="float: left; position: absolute; left: 145px; top: 425px;"><span class="smallBold" style="letter-spacing: 8pt" id="txtPg1Pt1I11Contact2"></span></div>
												<div style="float: left; position: absolute; left: 320px; top: 425px; width: 493px;letter-spacing: 2pt; white-space:nowrap; overflow:hidden"><span id="txtPg1Pt1I12Email" class="smallBold"></span></div>
												<div style="float: left; position: absolute; left: 30px;  top: 465px; width: 620px;letter-spacing: 2pt; white-space:nowrap; overflow:hidden"><span id="txtPg1Pt1I13Business" class="smallBold"></span></div>
												<div style=" float:left; position: absolute; left: 676px; top: 465px;"><span id="txtPg1Pt1I14PSIC" class='smallBold' style="letter-spacing: 13pt"></span></div>
												<!---->
												<div style=" float:left; position: absolute; left: 210px; top: 492px;"><span id="rdoPg1Pt1I15ItemizedDeduction" class='smallBold'></span></div>
												<div style=" float:left; position: absolute; left: 474px; top: 492px;"><span id="rdoPg1Pt1I15OptionalStandard" class='smallBold'></span></div>
												<div style=" float:left; position: absolute; text-align:right; width:380px; left:433px; top:540px;letter-spacing: 4pt;"><span id="txtPg1Pt2I16IncomeTax" class='smallBold'></span></div>
												<div style=" float:left; position: absolute; text-align:right; width:380px; left:433px; top:564px;letter-spacing: 4pt;"><span id="txtPg1Pt2I17TotalTaxCredits" class='smallBold'></span></div>
												<div style=" float:left; position: absolute; text-align:right; width:380px; left:433px; top:587px;letter-spacing: 4pt;"><span id="txtPg1Pt2I18NetTax" class='smallBold'></span></div>
												<div style=" float:left; position: absolute; text-align:right; width:380px; left:433px; top:610px;letter-spacing: 4pt;"><span id="txtPg1Pt2I19TotalPenalties" class='smallBold'></span></div>
												<div style=" float:left; position: absolute; text-align:right; width:380px; left:433px; top:633px;letter-spacing: 4pt;"><span id="txtPg1Pt2I20TotalAmount" class='smallBold'></span></div>
												<div style=" float:left; position: absolute; left: 30px;  top:670px;"><span id="rdoPg1Pt2I21OverpaymentRefunded" class='smallBold'></span></div>
												<div style=" float:left; position: absolute; left: 174px; top:670px;"><span id="rdoPg1Pt2I21OverpaymentIssued" class='smallBold'></span></div>
												<div style=" float:left; position: absolute; left: 468px; top:670px;"><span id="rdoPg1Pt2I21OverpaymentCarried" class='smallBold'></span></div>
												<!---->
												<div style=" float:left; position:absolute; left: 170px; top:767px; width:430px;letter-spacing: 2pt"><span id="txtPg1Pt2Signatory" class='smallBold'></span></div>
												<div style=" float:left; position:absolute; left: 795px; top:767px;"><span id="txtPg1Pt2PagesFilled" class='smallBold'></span></div>
												<div style=" float:left; position:absolute; left: 168px; top:800px; width:310px;"><span id="txtPg1Pt2I22CTC" class='smallBold' style="letter-spacing: 2pt"></span></div>
												<div style=" float:left; position:absolute; left: 582px; top:800px;"><span class='smallBold' style="letter-spacing: 11.6pt" id="txtPg1Pt2I23DateM"></span></div>
												<div style=" float:left; position:absolute; left: 650px; top:800px;"><span class='smallBold' style="letter-spacing: 11.6pt" id="txtPg1Pt2I23DateD"></span></div>
												<div style=" float:left; position:absolute; left: 720px; top:800px;"><span class='smallBold' style="letter-spacing: 15pt" id="txtPg1Pt2I23DateY"></span></div>
												<div style=" float:left; position:absolute; left: 168px; top:827px; width:375px;letter-spacing: 2pt; white-space:nowrap; overflow:hidden;"><span id="txtPg1Pt2I24PlaceOfIssue" class='smallBold'></span></div>
												<div style=" float:left; position:absolute; text-align:right;  width:230px; left:582px; top:827px;letter-spacing: 4pt;"><span id="txtPg1Pt2I25AmountCTC" class='smallBold'></span></div>
												<!--Others-->
												<div style=" float:left; position:absolute; left:30px; top:973px; width:140px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span id="txtPg1Pt3I29Others" class='smallBold'></span></div>
												<!--Drawee Banks-->
												<div style=" float:left; position:absolute; width:100px; white-space:nowrap; overflow:hidden; left:176px; top:887px;letter-spacing: 0pt"><span id="txtPg1Pt3I26DebitMemoC1" class='smallBold'></span></div>
												<div style=" float:left; position:absolute; width:100px; white-space:nowrap; overflow:hidden; left:176px; top:912px;letter-spacing: 0pt"><span id="txtPg1Pt3I27CheckC1" class='smallBold'></span></div>
												<div style=" float:left; position:absolute; width:100px; white-space:nowrap; overflow:hidden; left:180px; top:973px;letter-spacing: 0pt"><span id="txtPg1Pt3I29OthersC1" class='smallBold'></span></div>
												<!--Number-->
												<div style=" float:left; position:absolute; width:127px; white-space:nowrap; overflow:hidden; left:280px; top:887px;letter-spacing: 2pt"><span id="txtPg1Pt3I26DebitMemoC2" class='smallBold'></span></div>
												<div style=" float:left; position:absolute; width:127px; white-space:nowrap; overflow:hidden; left:280px; top:912px;letter-spacing: 2pt"><span id="txtPg1Pt3I27CheckC2" class='smallBold'></span></div>
												<div style=" float:left; position:absolute; width:127px; white-space:nowrap; overflow:hidden; left:280px; top:936px;letter-spacing: 2pt"><span id="txtPg1Pt3I28TaxDebitC2" class='smallBold'></span></div>
												<div style=" float:left; position:absolute; width:127px; white-space:nowrap; overflow:hidden; left:280px; top:973px;letter-spacing: 2pt"><span id="txtPg1Pt3I29OthersC2" class='smallBold'></span></div>
												<!--Dates-->
												<div style=" float:left; position:absolute; left: 412px; top: 887px;"><span class='smallBold' style="letter-spacing: 9pt" id="txtPg1Pt3I26DebitMemoC3DateM"></span></div>
												<div style=" float:left; position:absolute; left: 474px; top: 887px;"><span class='smallBold' style="letter-spacing: 9pt" id="txtPg1Pt3I26DebitMemoC3DateD"></span></div>
												<div style=" float:left; position:absolute; left: 535px; top: 887px;"><span class='smallBold' style="letter-spacing: 8.3pt" id="txtPg1Pt3I26DebitMemoC3DateY"></span></div>
												<div style=" float:left; position:absolute; left: 412px; top: 912px;"><span class='smallBold' style="letter-spacing: 9pt" id="txtPg1Pt3I27CheckC3DateM"></span></div>
												<div style=" float:left; position:absolute; left: 474px; top: 912px;"><span class='smallBold' style="letter-spacing: 9pt" id="txtPg1Pt3I27CheckC3DateD"></span></div>
												<div style=" float:left; position:absolute; left: 535px; top: 912px;"><span class='smallBold' style="letter-spacing: 8.3pt" id="txtPg1Pt3I27CheckC3DateY"></span></div>
												<div style=" float:left; position:absolute; left: 412px; top: 936px;"><span class='smallBold' style="letter-spacing: 9pt" id="txtPg1Pt3I28TaxDebitDateM"></span></div>
												<div style=" float:left; position:absolute; left: 474px; top: 936px;"><span class='smallBold' style="letter-spacing: 9pt" id="txtPg1Pt3I28TaxDebitDateD"></span></div>
												<div style=" float:left; position:absolute; left: 535px; top: 936px;"><span class='smallBold' style="letter-spacing: 8.3pt" id="txtPg1Pt3I28TaxDebitDateY"></span></div>
												<div style=" float:left; position:absolute; left: 412px; top: 973px;"><span class='smallBold' style="letter-spacing: 9pt" id="txtPg1Pt3I29OthersC3DateM"></span></div>
												<div style=" float:left; position:absolute; left: 474px; top: 973px;"><span class='smallBold' style="letter-spacing: 9pt" id="txtPg1Pt3I29OthersC3DateD"></span></div>
												<div style=" float:left; position:absolute; left: 535px; top: 973px;"><span class='smallBold' style="letter-spacing: 8.3pt" id="txtPg1Pt3I29OthersC3DateY"></span></div>
												<!--Amounts-->
												<div style=" float:left; position:absolute; text-align:right; width:285px; left:528px; top:887px;letter-spacing: 4pt;"><span id="txtPg1Pt3I26DebitMemoC4Amount" class='smallBold'></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:285px; left:528px; top:912px;letter-spacing: 4pt;"><span id="txtPg1Pt3I27CheckC4Amount" class='smallBold'></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:285px; left:528px; top:936px;letter-spacing: 4pt;"><span id="txtPg1Pt3I28TaxDebitC4Amount" class='smallBold'></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:285px; left:528px; top:973px;letter-spacing: 4pt;"><span id="txtPg1Pt3I29OthersC4Amount" class='smallBold'></span></div>
											</div>
										</div>

										<div id="Print2Content" style="display: none; width: 846px; height: 1280px; font-family: Arial;">
											<img src="{{ asset('images/Print/82314BIR Form 1702-RT2.png') }}" style="position:absolute; background-color: white; width: 846px; height: 1280px;" />
											<div style="float:left; position: relative;">
												<!--Header-->
												<div style=" float:left; position:absolute; left:32px;  top:104px;"><span  class='smallBold' style="letter-spacing: 10.3pt" id="txtPg2TIN1"></span></div>
												<div style=" float:left; position:absolute; left:97px;  top:104px;"><span  class='smallBold' style="letter-spacing: 10.3pt" id="txtPg2TIN2"></span></div>
												<div style=" float:left; position:absolute; left:164px; top:104px;"><span  class='smallBold' style="letter-spacing: 10.3pt" id="txtPg2TIN3"></span></div>
												<div style=" float:left; position:absolute; left:344px; top:104px; width: 470px;letter-spacing: 2pt; white-space:nowrap; overflow:hidden"><span class='smallBold' id="txtPg2RegisteredName"></span></div>
												<!--Part IV-->
												<div style=" float:left; position:absolute; text-align:right;  width:380px; left:434px; top:150px;letter-spacing: 4pt;"><span class='smallBold'id="txtPg2Pt4I30NetSales"></span></div>
												<div style=" float:left; position:absolute; text-align:right;  width:380px; left:434px; top:174px;letter-spacing: 4pt;"><span class='smallBold'id="txtPg2Pt4I31LessCost"></span></div>
												<div style=" float:left; position:absolute; text-align:right;  width:380px; left:434px; top:197px;letter-spacing: 4pt;"><span class='smallBold'id="txtPg2Pt4I32GrossIncome"></span></div>
												<div style=" float:left; position:absolute; text-align:right;  width:380px; left:434px; top:221px;letter-spacing: 4pt;"><span class='smallBold'id="txtPg2Pt4I33AddOtherTaxable"></span></div>
												<div style=" float:left; position:absolute; text-align:right;  width:380px; left:434px; top:245px;letter-spacing: 4pt;"><span class='smallBold'id="txtPg2Pt4I34TotalGross"></span></div>
												<!---->
												<div style=" float:left; position:absolute; text-align:right;  width:380px; left:215px; top:294px;letter-spacing: 4pt;"><span class='smallBold'id="txtPg2Pt4I35OrdinaryAllowable"></span></div>
												<div style=" float:left; position:absolute; text-align:right;  width:380px; left:215px; top:320px;letter-spacing: 4pt;"><span class='smallBold'id="txtPg2Pt4I36SpecialAllowable"></span></div>
												<div style=" float:left; position:absolute; text-align:right;  width:380px; left:215px; top:344px;letter-spacing: 4pt;"><span class='smallBold'id="txtPg2Pt4I37Nolco"></span></div>
												<div style=" float:left; position:absolute; text-align:right;  width:380px; left:215px; top:367px;letter-spacing: 4pt;"><span class='smallBold'id="txtPg2Pt4I38TotalItemized"></span></div>
												<div style=" float:left; position:absolute; text-align:right;  width:380px; left:215px; top:407px;letter-spacing: 4pt;"><span class='smallBold'id="txtPg2Pt4I39OptionalStandard"></span></div>
												<!---->
												<div style=" float:left; position:absolute; text-align:right;  width:380px; left:434px; top:438px;letter-spacing: 4pt;"><span class='smallBold'id="txtPg2Pt4I40NetTaxable"></span></div>
												<div style=" float:left; position:absolute; text-align:right;  width:380px; left:434px; top:491px;letter-spacing: 4pt;"><span class='smallBold'id="txtPg2Pt4I42IncomeTaxDue"></span></div>
												<div style=" float:left; position:absolute; text-align:right;  width:380px; left:434px; top:515px;letter-spacing: 4pt;"><span class='smallBold'id="txtPg2Pt4I43MinimumCorporate"></span></div>
												<div style=" float:left; position:absolute; text-align:right;  width:380px; left:434px; top:538px;letter-spacing: 4pt;"><span class='smallBold'id="txtPg2Pt4I44TotalIncomeTax"></span></div>
												<div style=" float:left; position:absolute; text-align:right;  width:380px; left:434px; top:562px;letter-spacing: 4pt;"><span class='smallBold'id="txtPg2Pt4I45LessTotalTax"></span></div>
												<div style=" float:left; position:absolute; text-align:right;  width:380px; left:434px; top:589px;letter-spacing: 4pt;"><span class='smallBold'id="txtPg2Pt4I46NetTax"></span></div>
												<!---->
												<div style=" float:left; position:absolute; text-align:right;  width:380px; left:215px; top:632px;letter-spacing: 4pt;"><span class='smallBold'id="txtPg2Pt4I47Surcharge"></span></div>
												<div style=" float:left; position:absolute; text-align:right;  width:380px; left:215px; top:654px;letter-spacing: 4pt;"><span class='smallBold'id="txtPg2Pt4I48Interest"></span></div>
												<div style=" float:left; position:absolute; text-align:right;  width:380px; left:215px; top:676px;letter-spacing: 4pt;"><span class='smallBold'id="txtPg2Pt4I49Compromise"></span></div>
												<!---->
												<div style=" float:left; position:absolute; text-align:right;  width:380px; left:434px; top:698px;letter-spacing: 4pt;"><span class='smallBold'id="txtPg2Pt4I50TotalPenalties"></span></div>
												<div style=" float:left; position:absolute; text-align:right;  width:380px; left:434px; top:725px;letter-spacing: 4pt;"><span class='smallBold'id="txtPg2Pt4I51TotalAmount"></span></div>
												<div style=" float:left; position:absolute; text-align:right;  width:380px; left:434px; top:772px;letter-spacing: 4pt;"><span class='smallBold'id="txtPg2Pt5I52SpecialAllowable"></span></div>
												<div style=" float:left; position:absolute; text-align:right;  width:380px; left:434px; top:794px;letter-spacing: 4pt;"><span class='smallBold'id="txtPg2Pt5I53AddSpecialTax"></span></div>
												<div style=" float:left; position:absolute; text-align:right;  width:380px; left:434px; top:815px;letter-spacing: 4pt;"><span class='smallBold'id="txtPg2Pt5I54TotalTax"></span></div>
												<!--Part VI-->
												<div style=" float:left; position:absolute; width:778px; white-space:nowrap; overflow:hidden; left:30px; top:877px;letter-spacing: 2pt;"><span class='smallBold' style="line-height: 165%;" id="txtPg2Pt6I55Name"></span></div>
												<div style=" float:left; position:absolute; left:524px; top:902px;"><span class='smallBold' style="letter-spacing: 10.9pt" id="txtPg2Pt6I56TIN1"></span></div>
												<div style=" float:left; position:absolute; left:595px; top:902px;"><span class='smallBold' style="letter-spacing: 10.9pt" id="txtPg2Pt6I56TIN2"></span></div>
												<div style=" float:left; position:absolute; left:665px; top:902px;"><span class='smallBold' style="letter-spacing: 10.9pt" id="txtPg2Pt6I56TIN3"></span></div>
												<div style=" float:left; position:absolute; left:735px; top:902px;"><span class='smallBold' style="letter-spacing: 11.1pt" id="txtPg2Pt6I56TIN4"></span></div>
												<div style=" float:left; position:absolute; width:778px; white-space:nowrap; overflow:hidden; left:30px; top:938px;letter-spacing: 2pt;"><span class='smallBold' style="line-height: 165%;" id="txtPg2Pt6I57Name"></span></div>
												<div style=" float:left; position:absolute; left:524px; top:964px;"><span class='smallBold' style="letter-spacing: 10.9pt" id="txtPg2Pt6I58TIN1"></span></div>
												<div style=" float:left; position:absolute; left:595px; top:964px;"><span class='smallBold' style="letter-spacing: 10.9pt" id="txtPg2Pt6I58TIN2"></span></div>
												<div style=" float:left; position:absolute; left:665px; top:964px;"><span class='smallBold' style="letter-spacing: 10.9pt" id="txtPg2Pt6I58TIN3"></span></div>
												<div style=" float:left; position:absolute; left:735px; top:964px;"><span class='smallBold' style="letter-spacing: 11.1pt" id="txtPg2Pt6I58TIN4"></span></div>
												<div style=" float:left; position:absolute; left:30px;  top:1004px;"><span class='smallBold' style="letter-spacing: 7pt" id="txtPg2Pt6I59BIR1"></span></div>
												<div style=" float:left; position:absolute; left:88px;  top:1004px;"><span class='smallBold' style="letter-spacing: 8pt" id="txtPg2Pt6I59BIR2"></span></div>
												<div style=" float:left; position:absolute; left:225px; top:1004px;"><span class='smallBold' style="letter-spacing: 8.5pt" id="txtPg2Pt6I59BIR3"></span></div>
												<div style=" float:left; position:absolute; left:306px; top:1004px;"><span class='smallBold' style="letter-spacing: 8.5pt" id="txtPg2Pt6I59BIR4"></span></div>
												<div style=" float:left; position:absolute; left:399px; top:1004px;"><span class='smallBold' style="letter-spacing: 8.5pt" id="txtPg2Pt6I60IssueDateM"></span></div>
												<div style=" float:left; position:absolute; left:459px; top:1004px;"><span class='smallBold' style="letter-spacing: 8.5pt" id="txtPg2Pt6I60IssueDateD"></span></div>
												<div style=" float:left; position:absolute; left:518px; top:1004px;"><span class='smallBold' style="letter-spacing: 8.5pt" id="txtPg2Pt6I60IssueDateY"></span></div>
												<div style=" float:left; position:absolute; left:611px; top:1004px;"><span class='smallBold' style="letter-spacing: 8.5pt" id="txtPg2Pt6I61ExpiryDateM"></span></div>
												<div style=" float:left; position:absolute; left:670px; top:1004px;"><span class='smallBold' style="letter-spacing: 8.5pt" id="txtPg2Pt6I61ExpiryDateD"></span></div>
												<div style=" float:left; position:absolute; left:732px; top:1004px;"><span class='smallBold' style="letter-spacing: 12pt" id="txtPg2Pt6I61ExpiryDateY"></span></div>
											</div>
										</div>
										
										<div id="Print3Content" style="display: none; width: 851px; height: 1280px; font-family: Arial;">
											<img src="{{ asset('images/Print/82314BIR Form 1702-RT3.png') }}" style="position: absolute; background-color: white; width: 851px; height: 1280px;" />
											<div style="float: left; position: relative;">
												<div style=" float:left; position:absolute; left:30px;  top:106px;"><span class='smallBold' style="letter-spacing: 10.3pt" id="txtPg3TIN1"></span></div>
												<div style=" float:left; position:absolute; left:96px;  top:106px;"><span class='smallBold' style="letter-spacing: 10.3pt" id="txtPg3TIN2"></span></div>
												<div style=" float:left; position:absolute; left:163px; top:106px;"><span class='smallBold' style="letter-spacing: 10.3pt" id="txtPg3TIN3"></span></div>
												<div style=" float:left; position:absolute; left:344px; top:106px; width: 470px;letter-spacing: 2pt; white-space:nowrap; overflow:hidden"><span class='smallBold' id="txtPg3RegisteredName"></span></div>
												<!--Sc1-->
												<div style=" float:left; position:absolute; text-align:right; width:380px;  left:431px; top:155px;letter-spacing: 4pt"><span class='smallBold' id="txtPg3Sc1I1GoodsProp"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px;  left:431px; top:181px;letter-spacing: 4pt"><span class='smallBold' id="txtPg3Sc1I2SaleServices"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px;  left:431px; top:207px;letter-spacing: 4pt"><span class='smallBold' id="txtPg3Sc1I3LeaseProp"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px;  left:431px; top:235px;letter-spacing: 4pt"><span class='smallBold' id="txtPg3Sc1I4Total"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px;  left:431px; top:260px;letter-spacing: 4pt"><span class='smallBold' id="txtPg3Sc1I5LessSales"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px;  left:431px; top:288px;letter-spacing: 4pt"><span class='smallBold' id="txtPg3Sc1I6NetSales"></span></div>
												<!--Sc2A-->
												<div style=" float:left; position:absolute; text-align:right; width:380px;  left:431px; top:360px;letter-spacing: 4pt"><span class='smallBold' id="txtPg3Sc2I1MerchInventory"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px;  left:431px; top:385px;letter-spacing: 4pt"><span class='smallBold' id="txtPg3Sc2I2AddPurchases"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px;  left:431px; top:415px;letter-spacing: 4pt"><span class='smallBold' id="txtPg3Sc2I3TotalGoods"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px;  left:431px; top:440px;letter-spacing: 4pt"><span class='smallBold' id="txtPg3Sc2I4LessMerch"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px;  left:431px; top:465px;letter-spacing: 4pt"><span class='smallBold' id="txtPg3Sc2I5CostofSales"></span></div>
												<!--Sc2B-->                                                                                       
												<div style=" float:left; position:absolute; text-align:right; width:380px;  left:215px; top:515px;letter-spacing: 4pt"><span class='smallBold' id="txtPg3Sc2I6DirectMaterials"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px;  left:215px; top:538px;letter-spacing: 4pt"><span class='smallBold' id="txtPg3Sc2I7AddPurchases"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px;  left:215px; top:562px;letter-spacing: 4pt"><span class='smallBold' id="txtPg3Sc2I8MaterialsAvaliable"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px;  left:215px; top:585px;letter-spacing: 4pt"><span class='smallBold' id="txtPg3Sc2I9LessDirectMat"></span></div>
												<!--Sc2B-->                                                                                       
												<div style=" float:left; position:absolute; text-align:right; width:380px;  left:431px; top:608px;letter-spacing: 4pt"><span class='smallBold' id="txtPg3Sc2I10RawMatUsed"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px;  left:431px; top:631px;letter-spacing: 4pt"><span class='smallBold' id="txtPg3Sc2I11DirectLabor"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px;  left:431px; top:654px;letter-spacing: 4pt"><span class='smallBold' id="txtPg3Sc2I12ManOverhead"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px;  left:431px; top:677px;letter-spacing: 4pt"><span class='smallBold' id="txtPg3Sc2I13TotalManCost"></span></div>
												<!--Sc2B-->                                                                                       
												<div style=" float:left; position:absolute; text-align:right; width:380px;  left:215px; top:702px;letter-spacing: 4pt"><span class='smallBold' id="txtPg3Sc2I14WorkProcess"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px;  left:215px; top:725px;letter-spacing: 4pt"><span class='smallBold' id="txtPg3Sc2I15LessWorkProcess"></span></div>
												<!--Sc2B-->                                                                                       
												<div style=" float:left; position:absolute; text-align:right; width:380px;  left:431px; top:748px;letter-spacing: 4pt"><span class='smallBold' id="txtPg3Sc2I16CostOfGoods"></span></div>
												<!--Sc2B-->                                                                                       
												<div style=" float:left; position:absolute; text-align:right; width:380px;  left:215px; top:772px;letter-spacing: 4pt"><span class='smallBold' id="txtPg3Sc2I17FinishedGoods"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px;  left:215px; top:795px;letter-spacing: 4pt"><span class='smallBold' id="txtPg3Sc2I18LessFinishGoods"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px;  left:431px; top:818px;letter-spacing: 4pt"><span class='smallBold' id="txtPg3Sc2I19CostOfGoods"></span></div>
												<!--Sc2C-->                                                                                       
												<div style=" float:left; position:absolute; text-align:right; width:380px;  left:431px; top:882px;letter-spacing: 4pt"><span class='smallBold' id="txtPg3Sc2I20DirectSalaries"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px;  left:431px; top:908px;letter-spacing: 4pt"><span class='smallBold' id="txtPg3Sc2I21DirectMaterials"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px;  left:431px; top:936px;letter-spacing: 4pt"><span class='smallBold' id="txtPg3Sc2I22DirectDepreciation"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px;  left:431px; top:961px;letter-spacing: 4pt"><span class='smallBold' id="txtPg3Sc2I23DirectRental"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px;  left:431px; top:989px;letter-spacing: 4pt"><span class='smallBold' id="txtPg3Sc2I24DirectOutside"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px;  left:431px; top:1014px;letter-spacing: 4pt"><span class='smallBold' id="txtPg3Sc2I25DirectOthers"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px;  left:431px; top:1041px;letter-spacing: 4pt"><span class='smallBold' id="txtPg3Sc2I26TotalService"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px;  left:431px; top:1075px;letter-spacing: 4pt"><span class='smallBold' id="txtPg3Sc2I27TotalSales"></span></div>
											</div>
										</div>
										
										<div id="Print4Content" style="display: none; width: 851px; height: 1280px; font-family: Arial;">
											<img src="{{ asset('images/Print/82314BIR Form 1702-RT4.png') }}" style="position: absolute; background-color: white; width: 851px; height: 1280px;" />
											<div style="float: left; position: relative;">
												<!--Header-->
												<div style=" float:left; position:absolute; left:30px;  top:106px;"><span class='smallBold' style="letter-spacing: 10.3pt" id="txtPg4TIN1"></span></div>
												<div style=" float:left; position:absolute; left:96px;  top:106px;"><span class='smallBold' style="letter-spacing: 10.3pt" id="txtPg4TIN2"></span></div>
												<div style=" float:left; position:absolute; left:163px; top:106px;"><span class='smallBold' style="letter-spacing: 10.3pt" id="txtPg4TIN3"></span></div>
												<div style=" float:left; position:absolute; left:344px; top:106px; width: 470px;letter-spacing: 2pt; white-space:nowrap; overflow:hidden"><span class='smallBold' id="txtPg4RegisteredName"></span></div>
												<!--Sc3-->
												<div style=" float:left; position:absolute; left:52px; top:158px; width: 455px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class='smallBold' id="txtPg4Sc3I1OtherTaxIncome"></span></div>
												<div style=" float:left; position:absolute; left:52px; top:185px; width: 455px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class='smallBold' id="txtPg4Sc3I2OtherTaxIncome"></span></div>
												<div style=" float:left; position:absolute; left:52px; top:211px; width: 455px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class='smallBold' id="txtPg4Sc3I3C1"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px; left:431px; top:158px;letter-spacing: 4pt"><span class='smallBold' id="txtPg4Sc3I1OtherTaxAmount"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px; left:431px; top:185px;letter-spacing: 4pt"><span class='smallBold' id="txtPg4Sc3I2OtherTaxAmount"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px; left:431px; top:211px;letter-spacing: 4pt"><span class='smallBold' id="txtPg4Sc3I3C2"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px; left:431px; top:238px;letter-spacing: 4pt"><span class='smallBold' id="txtPg4Sc3I4OtherTaxTotalAmount"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px; left:431px; top:287px;letter-spacing: 4pt"><span class='smallBold' id="txtPg4Sc4I1Advertising"></span></div>
												<!--Sc4-->
												<div style=" float:left; position:absolute; left:52px; top:329px; width: 455px;letter-spacing: 2pt; white-space:nowrap; overflow:hidden;"><span class='smallBold' id="txtPg4Sc4I2Amortization"></span></div>
												<div style=" float:left; position:absolute; left:52px; top:358px; width: 455px;letter-spacing: 2pt; white-space:nowrap; overflow:hidden;"><span class='smallBold' id="txtPg4Sc4I3Amortization"></span></div>
												<div style=" float:left; position:absolute; left:52px; top:385px; width: 455px;letter-spacing: 2pt; white-space:nowrap; overflow:hidden;"><span class='smallBold' id="txtPg4Sc4I4C1"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px; left:431px; top:329px;letter-spacing: 4pt"><span class='smallBold' id="txtPg4Sc4I2AmortizationAmount"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px; left:431px; top:358px;letter-spacing: 4pt"><span class='smallBold' id="txtPg4Sc4I3AmortizationAmount"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px; left:431px; top:385px;letter-spacing: 4pt"><span class='smallBold' id="txtPg4Sc4I4C2"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px; left:431px; top:410px;letter-spacing: 4pt"><span class='smallBold' id="txtPg4Sc4I5BadDebts"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px; left:431px; top:437px;letter-spacing: 4pt"><span class='smallBold' id="txtPg4Sc4I6CharitableContributions"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px; left:431px; top:464px;letter-spacing: 4pt"><span class='smallBold' id="txtPg4Sc4I7Commissions"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px; left:431px; top:491px;letter-spacing: 4pt"><span class='smallBold' id="txtPg4Sc4I8Communication"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px; left:431px; top:516px;letter-spacing: 4pt"><span class='smallBold' id="txtPg4Sc4I9Depletion"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px; left:431px; top:541px;letter-spacing: 4pt"><span class='smallBold' id="txtPg4Sc4I10Depreciation"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px; left:431px; top:568px;letter-spacing: 4pt"><span class='smallBold' id="txtPg4Sc4I11DirectorsFee"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px; left:431px; top:593px;letter-spacing: 4pt"><span class='smallBold' id="txtPg4Sc4I12FringeBenefits"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px; left:431px; top:620px;letter-spacing: 4pt"><span class='smallBold' id="txtPg4Sc4I13Fuel"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px; left:431px; top:647px;letter-spacing: 4pt"><span class='smallBold' id="txtPg4Sc4I14Insurance"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px; left:431px; top:676px;letter-spacing: 4pt"><span class='smallBold' id="txtPg4Sc4I15Interest"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px; left:431px; top:702px;letter-spacing: 4pt"><span class='smallBold' id="txtPg4Sc4I16Janitorial"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px; left:431px; top:728px;letter-spacing: 4pt"><span class='smallBold' id="txtPg4Sc4I17Losses"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px; left:431px; top:757px;letter-spacing: 4pt"><span class='smallBold' id="txtPg4Sc4I18Management"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px; left:431px; top:783px;letter-spacing: 4pt"><span class='smallBold' id="txtPg4Sc4I19Miscellaneous"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px; left:431px; top:810px;letter-spacing: 4pt"><span class='smallBold' id="txtPg4Sc4I20OfficeSupplies"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px; left:431px; top:835px;letter-spacing: 4pt"><span class='smallBold' id="txtPg4Sc4I21OtherServices"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px; left:431px; top:860px;letter-spacing: 4pt"><span class='smallBold' id="txtPg4Sc4I22ProfessionalFees"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px; left:431px; top:886px;letter-spacing: 4pt"><span class='smallBold' id="txtPg4Sc4I23Rental"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px; left:431px; top:912px;letter-spacing: 4pt"><span class='smallBold' id="txtPg4Sc4I24Repairs"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px; left:431px; top:939px;letter-spacing: 4pt"><span class='smallBold' id="txtPg4Sc4I25Repairs"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px; left:431px; top:965px;letter-spacing: 4pt"><span class='smallBold' id="txtPg4Sc4I26Representation"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px; left:431px; top:993px;letter-spacing: 4pt"><span class='smallBold' id="txtPg4Sc4I27Research"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px; left:431px; top:1020px;letter-spacing: 4pt"><span class='smallBold' id="txtPg4Sc4I28Royalties"></span></div>
												<div style=" float:left; position:absolute; text-align:right; width:380px; left:431px; top:1047px;letter-spacing: 4pt"><span class='smallBold' id="txtPg4Sc4I29Salaries"></span></div>
											</div>
										</div>
										
										<div id="Print5Content" style="display: none; width: 851px; height: 1280px; font-family: Arial;">
											<img src="{{ asset('images/Print/82314BIR Form 1702-RT5.png') }}" style="position: absolute; background-color: white; width: 851px; height: 1280px;" />
											<div style="float: left; position: relative;">
	                                            <!--Page 5 Header-->
												<div style="float: left; position: absolute; left: 30px; top: 103px;"><span class="smallBold" style="letter-spacing: 10.3pt" id="txtPg5TIN1"></span></div>	
	                                            <div style="float: left; position: absolute; left: 96px; top: 103px;"><span class="smallBold" style="letter-spacing: 10.3pt" id="txtPg5TIN2"></span></div>	
	                                            <div style="float: left; position: absolute; left: 163px; top: 103px;"><span class="smallBold" style="letter-spacing: 10.3pt" id="txtPg5TIN3"></span></div>	
	                                            <div style="float: left; position: absolute; left: 344px; top: 103px; width:470px; white-space:nowrap; overflow:hidden"><span class="smallBold" id="txtPg5RegisteredName"></span></div>	
	                                            <!--Page 5 Header End-->
	                                            <!--Page 5 Schedule 4-->
	                                            <div style="float: left; position: absolute; left: 540px; top: 153px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold"id="txtPg5Sc4I30SecurityServices"></span></div>
	                                            <div style="float: left; position: absolute; left: 540px; top: 180px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold"id="txtPg5Sc4I31Contributions"></span></div>
	                                            <div style="float: left; position: absolute; left: 540px; top: 207px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold"id="txtPg5Sc4I32TaxesandLicenses"></span></div>
	                                            <div style="float: left; position: absolute; left: 540px; top: 234px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold"id="txtPg5Sc4I33TollingFees"></span></div>
	                                            <div style="float: left; position: absolute; left: 540px; top: 261px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold"id="txtPg5Sc4I34TrainingandSeminars"></span></div>
	                                            <div style="float: left; position: absolute; left: 540px; top: 288px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold"id="txtPg5Sc4I35TransportationandTravel"></span></div>

	                                            <div style="float: left; position: absolute; left: 59px; top: 332px; width:450px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg5Sc4I36C1"></span></div>
	                                            <div style="float: left; position: absolute; left: 59px; top: 359px; width:450px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg5Sc4I37C1"></span></div>	
	                                            <div style="float: left; position: absolute; left: 59px; top: 386px; width:450px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg5Sc4I38C1"></span></div>
	                                            <div style="float: left; position: absolute; left: 59px; top: 413px; width:450px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg5Sc4I39C1"></span></div>	

	                                            <div style="float: left; position: absolute; left: 540px; top: 332px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold"id="txtPg5Sc4I36C2"></span></div>
	                                            <div style="float: left; position: absolute; left: 540px; top: 359px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold"id="txtPg5Sc4I37C2"></span></div>
	                                            <div style="float: left; position: absolute; left: 540px; top: 386px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold"id="txtPg5Sc4I38C2"></span></div>
	                                            <div style="float: left; position: absolute; left: 540px; top: 413px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold"id="txtPg5Sc4I39C2"></span></div>
	                                            <div style="float: left; position: absolute; left: 510px; top: 444px; width:300px;text-align:right;letter-spacing: 4pt"><span class="smallBold"id="txtPg5Sc4I40TotalOrdinaryAllowable"></span></div>
	                                            <!--Page 5 Schedule 4 End-->
	                                            <!--Page 5 Schedule 5-->
	                                            <div style="float: left; position: absolute; left: 58px; top: 513px; width:300px;letter-spacing: 2pt; white-space:nowrap; overflow:hidden;"><span class="smallBold" id="txtPg5Sc5I1C1"></span></div>
	                                            <div style="float: left; position: absolute; left: 58px; top: 540px; width:300px;letter-spacing: 2pt; white-space:nowrap; overflow:hidden;"><span class="smallBold" id="txtPg5Sc5I2C1"></span></div>	
	                                            <div style="float: left; position: absolute; left: 58px; top: 567px; width:300px;letter-spacing: 2pt; white-space:nowrap; overflow:hidden;"><span class="smallBold" id="txtPg5Sc5I3C1"></span></div>
	                                            <div style="float: left; position: absolute; left: 58px; top: 594px; width:300px;letter-spacing: 2pt; white-space:nowrap; overflow:hidden;"><span class="smallBold" id="txtPg5Sc5I4C1"></span></div>	

	                                            <div style="float: left; position: absolute; left: 368px; top: 513px; width:160px;letter-spacing: 2pt; white-space:nowrap; overflow:hidden;"><span class="smallBold" id="txtPg5Sc5I1C2"></span></div>
	                                            <div style="float: left; position: absolute; left: 368px; top: 540px; width:160px;letter-spacing: 2pt; white-space:nowrap; overflow:hidden;"><span class="smallBold" id="txtPg5Sc5I2C2"></span></div>	
	                                            <div style="float: left; position: absolute; left: 368px; top: 567px; width:160px;letter-spacing: 2pt; white-space:nowrap; overflow:hidden;"><span class="smallBold" id="txtPg5Sc5I3C2"></span></div>
	                                            <div style="float: left; position: absolute; left: 368px; top: 594px; width:160px;letter-spacing: 2pt; white-space:nowrap; overflow:hidden;"><span class="smallBold" id="txtPg5Sc5I4C2"></span></div>	

	                                            <div style="float: left; position: absolute; left: 540px; top: 513px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg5Sc5I1C3"></span></div>
	                                            <div style="float: left; position: absolute; left: 540px; top: 540px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg5Sc5I2C3"></span></div>
	                                            <div style="float: left; position: absolute; left: 540px; top: 567px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg5Sc5I3C3"></span></div>
	                                            <div style="float: left; position: absolute; left: 540px; top: 594px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg5Sc5I4C3"></span></div>
	                                            <div style="float: left; position: absolute; left: 540px; top: 621px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg5Sc5I5TotalSpecialAllowable"></span></div>
	                                            <!--Page 5 Schedule 5 End-->

	                                            <!--Page 5 Schedule 6-->
	                                            <div style="float: left; position: absolute; left: 540px; top: 673px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg5Sc6I1GrossIncome"></span></div>
	                                            <div style="float: left; position: absolute; left: 510px; top: 699px; width:300px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg5Sc6I2TotalDeductions"></span></div>
	                                            <div style="float: left; position: absolute; left: 460px; top: 726px; width:350px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg5Sc6I3NetOperatingLoss"></span></div>
	                                            <!--Page 5 Schedule 6 End-->

	                                            <!--Page 5 Schedule 6A-->
	                                            <div style="float: left; position: absolute; left: 103px; top: 815px; width:80px;"><span class="smallBold" style="letter-spacing: 10.4pt" id="txtPg5Sc6AI4C1"></span></div>
	                                            <div style="float: left; position: absolute; left: 103px; top: 842px; width:80px;"><span class="smallBold" style="letter-spacing: 10.4pt" id="txtPg5Sc6AI5C1"></span></div>	
	                                            <div style="float: left; position: absolute; left: 103px; top: 869px; width:80px;"><span class="smallBold" style="letter-spacing: 10.4pt" id="txtPg5Sc6AI6C1"></span></div>
	                                            <div style="float: left; position: absolute; left: 103px; top: 896px; width:80px;"><span class="smallBold" style="letter-spacing: 10.4pt" id="txtPg5Sc6AI7C1"></span></div>	

	                                            <div style="float: left; position: absolute; left: 218px; top: 815px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg5Sc6AI4C2"></span></div>
	                                            <div style="float: left; position: absolute; left: 218px; top: 842px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg5Sc6AI5C2"></span></div>
	                                            <div style="float: left; position: absolute; left: 218px; top: 869px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg5Sc6AI6C2"></span></div>
	                                            <div style="float: left; position: absolute; left: 218px; top: 896px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg5Sc6AI7C2"></span></div>
	                                                                                                                                                                        
	                                            <div style="float: left; position: absolute; left: 540px; top: 815px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg5Sc6AI4C3"></span></div>
	                                            <div style="float: left; position: absolute; left: 540px; top: 842px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg5Sc6AI5C3"></span></div>
	                                            <div style="float: left; position: absolute; left: 540px; top: 869px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg5Sc6AI6C3"></span></div>
	                                            <div style="float: left; position: absolute; left: 540px; top: 896px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg5Sc6AI7C3"></span></div>
	                                                                                                                                                                        
		                                        <div style="float: left; position: absolute; left: 32px; top: 965px; width:250px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg5Sc6AI4C4"></span></div>
	                                            <div style="float: left; position: absolute; left: 32px; top: 992px; width:250px;text-align:right;letter-spacing: 4pt"><span class="smallBold"  id="txtPg5Sc6AI5C4"></span></div>
	                                            <div style="float: left; position: absolute; left: 32px; top: 1019px; width:250px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg5Sc6AI6C4"></span></div>
	                                            <div style="float: left; position: absolute; left: 32px; top: 1046px; width:250px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg5Sc6AI7C4"></span></div>

	                                            <div style="float: left; position: absolute; left: 277px; top: 965px; width:250px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg5Sc6AI4C5"></span></div>
	                                            <div style="float: left; position: absolute; left: 277px; top: 992px; width:250px;text-align:right;letter-spacing: 4pt"><span class="smallBold"  id="txtPg5Sc6AI5C5"></span></div>
	                                            <div style="float: left; position: absolute; left: 277px; top: 1019px; width:250px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg5Sc6AI6C5"></span></div>
	                                            <div style="float: left; position: absolute; left: 277px; top: 1046px; width:250px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg5Sc6AI7C5"></span></div>
	                                                                                                                                                                         
	                                            <div style="float: left; position: absolute; left: 460px; top: 965px; width:350px;text-align:right;letter-spacing: 4pt"><span class="smallBold"  id="txtPg5Sc6AI4C6"></span></div>
	                                            <div style="float: left; position: absolute; left: 540px; top: 992px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold"  id="txtPg5Sc6AI5C6"></span></div>
	                                            <div style="float: left; position: absolute; left: 540px; top: 1019px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg5Sc6AI6C6"></span></div>
	                                            <div style="float: left; position: absolute; left: 540px; top: 1046px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg5Sc6AI7C6"></span></div>

	                                            <div style="float: left; position: absolute; left: 277px; top: 1074px; width:250px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg5Sc6AI8TotalNOLCO"></span></div>
	                                            <!--Page 5 Schedule 6A End-->
											</div>
										</div>
										
										<div id="Print6Content" style="display: none; width: 851px; height: 1280px; font-family: Arial;">
											<img src="{{ asset('images/Print/82314BIR Form 1702-RT6.png') }}" style="position: absolute; background-color: white; width: 851px; height: 1280px;" />
											<div style="float: left; position: relative;">
												<!--Page 6 Header-->
												<div style="float: left; position: absolute; left: 30px; top: 103px;"><span class="smallBold" style="letter-spacing: 10.3pt" id="txtPg6TIN1"></span></div>	
	                                            <div style="float: left; position: absolute; left: 96px; top: 103px;"><span class="smallBold" style="letter-spacing: 10.3pt" id="txtPg6TIN2"></span></div>	
	                                            <div style="float: left; position: absolute; left: 163px; top: 103px;"><span class="smallBold" style="letter-spacing:10.3pt" id="txtPg6TIN3"></span></div>	
	                                            <div style="float: left; position: absolute; left: 344px; top: 103px; width:470px;letter-spacing: 2pt; white-space:nowrap; overflow:hidden"><span class="smallBold" id="txtPg6RegisteredName"></span></div>	
	                                            <!--Page 6 Header End-->

	                                            <!--Page 6 Schedule 7-->
	                                            <div style="float: left; position: absolute; left: 540px; top: 162px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg6Sc7I1ExcessCredits"></span></div>
	                                            <div style="float: left; position: absolute; left: 540px; top: 189px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg6Sc7I2IncomeTaxPaymentUnderMCIT"></span></div>
	                                            <div style="float: left; position: absolute; left: 540px; top: 216px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg6Sc7I3IncomeTaxUnderRegular"></span></div>
	                                            <div style="float: left; position: absolute; left: 540px; top: 243px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg6Sc7I4ExcessMCIT"></span></div>
	                                            <div style="float: left; position: absolute; left: 540px; top: 269px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg6Sc7I5CreditableTaxWithheldFromPrevious"></span></div>
	                                            <div style="float: left; position: absolute; left: 540px; top: 295px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg6Sc7I6CreditableTaxWithheldFor4thQuarter"></span></div>
	                                            <div style="float: left; position: absolute; left: 540px; top: 321px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg6Sc7I7ForeignTaxCredits"></span></div>
	                                            <div style="float: left; position: absolute; left: 540px; top: 347px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg6Sc7I8TaxPaidInReturn"></span></div>
	                                            <div style="float: left; position: absolute; left: 540px; top: 373px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg6Sc7I9SpecialTaxCredits"></span></div>

	                                            <div style="float: left; position: absolute; left: 59px; top: 417px; width:450px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg6Sc7I10C1"></span></div>
	                                            <div style="float: left; position: absolute; left: 59px; top: 444px; width:450px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg6Sc7I11C1"></span></div>	

	                                            <div style="float: left; position: absolute; left: 540px; top: 417px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg5Sc7I10C2"></span></div>
	                                            <div style="float: left; position: absolute; left: 540px; top: 444px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg6Sc7I11C2"></span></div>
	                                            <div style="float: left; position: absolute; left: 540px; top: 471px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg6Sc7I12TotalTaxCredits"></span></div>
	                                            <!--Page 6 Schedule 7 End-->

	                                            <!--Page 6 Schedule 8-->
	                                            <div style="float: left; position: absolute; left: 51px; top: 539px; width:80px;"><span class="smallBold" style="letter-spacing: 10.3pt" id="txtPg6Sc8I1C1"></span></div>
	                                            <div style="float: left; position: absolute; left: 51px; top: 566px; width:80px;"><span class="smallBold" style="letter-spacing: 10.3pt" id="txtPg6Sc8I2C1"></span></div>	
	                                            <div style="float: left; position: absolute; left: 51px; top: 593px; width:80px;"><span class="smallBold" style="letter-spacing: 10.3pt" id="txtPg6Sc8I3C1"></span></div>

	                                            <div style="float: left; position: absolute; left: 126px; top: 539px; width:225px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg6Sc8I1C2"></span></div>
	                                            <div style="float: left; position: absolute; left: 126px; top: 566px; width:225px;text-align:right;letter-spacing: 4pt"><span class="smallBold"  id="txtPg6Sc8I2C2"></span></div>
	                                            <div style="float: left; position: absolute; left: 126px; top: 593px; width:225px;text-align:right;letter-spacing: 4pt"><span class="smallBold"  id="txtPg6Sc8I3C2"></span></div>
	                                                                                                                                                                        
	                                            <div style="float: left; position: absolute; left: 350px; top: 539px; width:225px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg6Sc8I1C3"></span></div>
	                                            <div style="float: left; position: absolute; left: 350px; top: 566px; width:225px;text-align:right;letter-spacing: 4pt"><span class="smallBold"  id="txtPg6Sc8I2C3"></span></div>
	                                            <div style="float: left; position: absolute; left: 350px; top: 593px; width:225px;text-align:right;letter-spacing: 4pt"><span class="smallBold"  id="txtPg6Sc8I3C3"></span></div>
	                                                                                                                                                                        
	                                            <div style="float: left; position: absolute; left: 585px; top: 539px; width:225px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg6Sc8I1C4"></span></div>
	                                            <div style="float: left; position: absolute; left: 585px; top: 566px; width:225px;text-align:right;letter-spacing: 4pt"><span class="smallBold"  id="txtPg6Sc8I2C4"></span></div>
	                                            <div style="float: left; position: absolute; left: 585px; top: 593px; width:225px;text-align:right;letter-spacing: 4pt"><span class="smallBold"  id="txtPg6Sc8I3C4"></span></div>
	                                                                                                                                                                        
	                                            <div style="float: left; position: absolute; left: 49px; top: 673px; width:180px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg6Sc8I1C5"></span></div>
	                                            <div style="float: left; position: absolute; left: 49px; top: 696px; width:180px;text-align:right;letter-spacing: 4pt"><span class="smallBold"  id="txtPg6Sc8I2C5"></span></div>
	                                            <div style="float: left; position: absolute; left: 49px; top: 719px; width:180px;text-align:right;letter-spacing: 4pt"><span class="smallBold"  id="txtPg6Sc8I3C5"></span></div>
	                                                                                                                                                                        
	                                            <div style="float: left; position: absolute; left: 240px; top: 673px; width:180px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg6Sc8I1C6"></span></div>
	                                            <div style="float: left; position: absolute; left: 240px; top: 696px; width:180px;text-align:right;letter-spacing: 4pt"><span class="smallBold"  id="txtPg6Sc8I2C6"></span></div>
	                                            <div style="float: left; position: absolute; left: 240px; top: 719px; width:180px;text-align:right;letter-spacing: 4pt"><span class="smallBold"  id="txtPg6Sc8I3C6"></span></div>
	                                                                                                                                                                        
	                                            <div style="float: left; position: absolute; left: 432px; top: 673px; width:180px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg6Sc8I1C7"></span></div>
	                                            <div style="float: left; position: absolute; left: 432px; top: 696px; width:180px;text-align:right;letter-spacing: 4pt"><span class="smallBold"  id="txtPg6Sc8I2C7"></span></div>
	                                            <div style="float: left; position: absolute; left: 432px; top: 719px; width:180px;text-align:right;letter-spacing: 4pt"><span class="smallBold"  id="txtPg6Sc8I3C7"></span></div>
	                                                                                                                                                                        
	                                            <div style="float: left; position: absolute; left: 625px; top: 673px; width:190px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg6Sc8I1C8"></span></div>
	                                            <div style="float: left; position: absolute; left: 625px; top: 696px; width:190px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg6Sc8I2C8"></span></div>
	                                            <div style="float: left; position: absolute; left: 625px; top: 719px; width:190px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg6Sc8I3C8"></span></div>

	                                            <div style="float: left; position: absolute; left: 432px; top: 744px; width:180px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg6Sc8I4TotalExcessMCIT"></span></div>
	                                            <!--Page 6 Schedule 8 End-->

	                                            <!--Page 6 Schedule 9-->
	                                            <div style="float: left; position: absolute; left: 540px; top: 790px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg6Sc9I1NetIncome"></span></div>
	                                            
	                                            <div style="float: left; position: absolute; left: 58px; top: 830px; width:450px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg6Sc9I2C1"></span></div>
	                                            <div style="float: left; position: absolute; left: 58px; top: 854px; width:450px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg6Sc9I3C1"></span></div>	

	                                            <div style="float: left; position: absolute; left: 540px; top: 830px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg6Sc9I2C2"></span></div>
	                                            <div style="float: left; position: absolute; left: 540px; top: 854px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg6Sc9I3C2"></span></div>
	                                            <div style="float: left; position: absolute; left: 540px; top: 878px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg6Sc9I4Total"></span></div>

	                                            <div style="float: left; position: absolute; left: 58px; top: 917px; width:450px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg6Sc9I5C1"></span></div>
	                                            <div style="float: left; position: absolute; left: 58px; top: 941px; width:450px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg6Sc9I6C1"></span></div>	

	                                            <div style="float: left; position: absolute; left: 540px; top: 917px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg6Sc9I5C2"></span></div>
	                                            <div style="float: left; position: absolute; left: 540px; top: 941px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg6Sc9I6C2"></span></div>

	                                            <div style="float: left; position: absolute; left: 58px; top: 980px;  width:450px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg6Sc9I7C1"></span></div>
	                                            <div style="float: left; position: absolute; left: 58px; top: 1004px; width:450px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg6Sc9I8C1"></span></div>

	                                            <div style="float: left; position: absolute; left: 540px; top: 980px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold"  id="txtPg6Sc9I7C2"></span></div>
	                                            <div style="float: left; position: absolute; left: 540px; top: 1004px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg6Sc9I8C2"></span></div>
	                                            <div style="float: left; position: absolute; left: 540px; top: 1027px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg6Sc9I9Total"></span></div>
	                                            <div style="float: left; position: absolute; left: 540px; top: 1051px; width:270px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg6Sc9I10NetTaxableIncome"></span></div>
	                                            <!--Page 6 Schedule 9 End-->
											</div>
										</div>
										
										<div id="Print7Content" style="display: none; width: 851px; height: 1280px; font-family: Arial;">
											<img src="{{ asset('images/Print/82314BIR Form 1702-RT7.png') }}" style="position: absolute; background-color: white; width: 851px; height: 1280px;" />
											<div style="float: left; position: relative;">
												<!--Page 7 Header-->
												<div style="float: left; position: absolute; left: 30px; top: 103px;"><span class="smallBold" style="letter-spacing: 10.3pt" id="txtPg7TIN1"></span></div>	
	                                            <div style="float: left; position: absolute; left: 96px; top: 103px;"><span class="smallBold" style="letter-spacing: 10.3pt" id="txtPg7TIN2"></span></div>	
	                                            <div style="float: left; position: absolute; left: 163px; top: 103px;"><span class="smallBold" style="letter-spacing: 10.3pt" id="txtPg7TIN3"></span></div>	
	                                            <div style="float: left; position: absolute; left: 344px; top: 103px; width:470px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg7RegisteredName"></span></div>	
	                                            <!--Page 7 Header End-->

	                                            <!--Page 7 Schedule 10-->
	                                            <div style="float: left; position: absolute; left: 431px; top: 172px; width:380px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg7Sc10I1CurrentAssets"></span></div>
	                                            <div style="float: left; position: absolute; left: 431px; top: 196px; width:380px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg7Sc10I2LongTermInvestment"></span></div>
	                                            <div style="float: left; position: absolute; left: 431px; top: 220px; width:380px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg7Sc10I3PropertyPlantEquipment"></span></div>
	                                            <div style="float: left; position: absolute; left: 431px; top: 244px; width:380px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg7Sc10I4LongTermReceivables"></span></div>
	                                            <div style="float: left; position: absolute; left: 431px; top: 266px; width:380px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg7Sc10I5IntangibleAssets"></span></div>
	                                            <div style="float: left; position: absolute; left: 431px; top: 290px; width:380px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg7Sc10I6OtherAssets"></span></div>
	                                            <div style="float: left; position: absolute; left: 431px; top: 313px; width:380px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg7Sc10I7TotalAssets"></span></div>

	                                            <div style="float: left; position: absolute; left: 431px; top: 361px; width:380px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg7Sc10I8CurrentLiabilities"></span></div>
	                                            <div style="float: left; position: absolute; left: 431px; top: 387px; width:380px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg7Sc10I9LongTermLiabilities"></span></div>
	                                            <div style="float: left; position: absolute; left: 431px; top: 413px; width:380px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg7Sc10I10DeferredCredits"></span></div>
	                                            <div style="float: left; position: absolute; left: 431px; top: 440px; width:380px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg7Sc10I11OtherLiabilities"></span></div>
	                                            <div style="float: left; position: absolute; left: 431px; top: 466px; width:380px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg7Sc10I12TotalLiabilities"></span></div>
	                                            <div style="float: left; position: absolute; left: 431px; top: 492px; width:380px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg7Sc10I13CapitalStock"></span></div>
	                                            <div style="float: left; position: absolute; left: 431px; top: 519px; width:380px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg7Sc10I14AdditionalCapital"></span></div>
	                                            <div style="float: left; position: absolute; left: 431px; top: 546px; width:380px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg7Sc10I15RetainedEarnings"></span></div>
	                                            <div style="float: left; position: absolute; left: 431px; top: 572px; width:380px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg7Sc10I16TotalEquity"></span></div>
	                                            <div style="float: left; position: absolute; left: 431px; top: 599px; width:380px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg7Sc10I17TotalLiabilitiesEquity"></span></div>
	                                            <!--Page 7 Schedule 10 End-->

	                                            <!--Page 7 Schedule 11-->
	                                            <div style="float: left; position: absolute; left: 127px; top: 629px;"><span class="smallBold" id="chkPg7Sc11Stockholders"></span></div>
	                                            <div style="float: left; position: absolute; left: 250px; top: 629px;"><span class="smallBold" id="chkPg7Sc11Partners"></span></div>	
	                                            <div style="float: left; position: absolute; left: 346px; top: 629px;"><span class="smallBold" id="chkPg7Sc11Members"></span></div>

	                                            <div style="float: left; position: absolute; left: 29px; top: 686px; width:270px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I1C1"></span></div>	
	                                            <div style="float: left; position: absolute; left: 29px; top: 706px; width:270px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I2C1"></span></div>	
	                                            <div style="float: left; position: absolute; left: 29px; top: 726px; width:270px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I3C1"></span></div>
	                                            <div style="float: left; position: absolute; left: 29px; top: 746px; width:270px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I4C1"></span></div>
	                                            <div style="float: left; position: absolute; left: 29px; top: 766px; width:270px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I5C1"></span></div>	
	                                            <div style="float: left; position: absolute; left: 29px; top: 786px; width:270px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I6C1"></span></div>	
	                                            <div style="float: left; position: absolute; left: 29px; top: 807px; width:270px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I7C1"></span></div>
	                                            <div style="float: left; position: absolute; left: 29px; top: 827px; width:270px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I8C1"></span></div>	
	                                            <div style="float: left; position: absolute; left: 29px; top: 847px; width:270px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I9C1"></span></div>
	                                            <div style="float: left; position: absolute; left: 29px; top: 867px; width:270px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I10C1"></span></div>
	                                            <div style="float: left; position: absolute; left: 29px; top: 888px; width:270px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I11C1"></span></div>	
	                                            <div style="float: left; position: absolute; left: 29px; top: 908px; width:270px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I12C1"></span></div>	
	                                            <div style="float: left; position: absolute; left: 29px; top: 928px; width:270px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I13C1"></span></div>
	                                            <div style="float: left; position: absolute; left: 29px; top: 948px; width:270px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I14C1"></span></div>
	                                            <div style="float: left; position: absolute; left: 29px; top: 968px; width:270px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I15C1"></span></div>	
	                                            <div style="float: left; position: absolute; left: 29px; top: 989px; width:270px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I16C1"></span></div>	
	                                            <div style="float: left; position: absolute; left: 29px; top: 1009px;width:270px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I17C1"></span></div>
	                                            <div style="float: left; position: absolute; left: 29px; top: 1029px;width:270px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I18C1"></span></div>	
	                                            <div style="float: left; position: absolute; left: 29px; top: 1049px;width:270px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I19C1"></span></div>
	                                            <div style="float: left; position: absolute; left: 29px; top: 1069px;width:270px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I20C1"></span></div>
	                                            
	                                            <div style="float: left; position: absolute; left: 312px; top: 686px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I1Tin1"></span></div>
	                                            <div style="float: left; position: absolute; left: 379px; top: 686px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I1Tin2"></span></div>
	                                            <div style="float: left; position: absolute; left: 443px; top: 686px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I1Tin3"></span></div>
	                                            <div style="float: left; position: absolute; left: 509px; top: 686px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I1Tin4"></span></div>

	                                            <div style="float: left; position: absolute; left: 312px; top: 706px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I2Tin1"></span></div>
	                                            <div style="float: left; position: absolute; left: 379px; top: 706px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I2Tin2"></span></div>
	                                            <div style="float: left; position: absolute; left: 443px; top: 706px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I2Tin3"></span></div>
	                                            <div style="float: left; position: absolute; left: 509px; top: 706px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I2Tin4"></span></div>

	                                            <div style="float: left; position: absolute; left: 312px; top: 726px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I3Tin1"></span></div>
	                                            <div style="float: left; position: absolute; left: 379px; top: 726px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I3Tin2"></span></div>
	                                            <div style="float: left; position: absolute; left: 443px; top: 726px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I3Tin3"></span></div>
	                                            <div style="float: left; position: absolute; left: 509px; top: 726px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I3Tin4"></span></div>

	                                            <div style="float: left; position: absolute; left: 312px; top: 746px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I4Tin1"></span></div>
	                                            <div style="float: left; position: absolute; left: 379px; top: 746px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I4Tin2"></span></div>
	                                            <div style="float: left; position: absolute; left: 443px; top: 746px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I4Tin3"></span></div>
	                                            <div style="float: left; position: absolute; left: 509px; top: 746px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I4Tin4"></span></div>
	                                                                                               
	                                            <div style="float: left; position: absolute; left: 312px; top: 766px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I5Tin1"></span></div>
	                                            <div style="float: left; position: absolute; left: 379px; top: 766px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I5Tin2"></span></div>
	                                            <div style="float: left; position: absolute; left: 443px; top: 766px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I5Tin3"></span></div>
	                                            <div style="float: left; position: absolute; left: 509px; top: 766px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I5Tin4"></span></div>

	                                            <div style="float: left; position: absolute; left: 312px; top: 786px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I6Tin1"></span></div>
	                                            <div style="float: left; position: absolute; left: 379px; top: 786px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I6Tin2"></span></div>
	                                            <div style="float: left; position: absolute; left: 443px; top: 786px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I6Tin3"></span></div>
	                                            <div style="float: left; position: absolute; left: 509px; top: 786px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I6Tin4"></span></div>
	                                                                                               
	                                            <div style="float: left; position: absolute; left: 312px; top: 807px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I7Tin1"></span></div>
	                                            <div style="float: left; position: absolute; left: 379px; top: 807px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I7Tin2"></span></div>
	                                            <div style="float: left; position: absolute; left: 443px; top: 807px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I7Tin3"></span></div>
	                                            <div style="float: left; position: absolute; left: 509px; top: 807px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I7Tin4"></span></div>

	                                            <div style="float: left; position: absolute; left: 312px; top: 827px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I8Tin1"></span></div>
	                                            <div style="float: left; position: absolute; left: 379px; top: 827px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I8Tin2"></span></div>
	                                            <div style="float: left; position: absolute; left: 443px; top: 827px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I8Tin3"></span></div>
	                                            <div style="float: left; position: absolute; left: 509px; top: 827px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I8Tin4"></span></div>
	                                                                                               
	                                            <div style="float: left; position: absolute; left: 312px; top: 847px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I9Tin1"></span></div>
	                                            <div style="float: left; position: absolute; left: 379px; top: 847px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I9Tin2"></span></div>
	                                            <div style="float: left; position: absolute; left: 443px; top: 847px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I9Tin3"></span></div>
	                                            <div style="float: left; position: absolute; left: 509px; top: 847px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I9Tin4"></span></div>

	                                            <div style="float: left; position: absolute; left: 312px; top: 867px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I10Tin1"></span></div>
	                                            <div style="float: left; position: absolute; left: 379px; top: 867px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I10Tin2"></span></div>
	                                            <div style="float: left; position: absolute; left: 443px; top: 867px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I10Tin3"></span></div>
	                                            <div style="float: left; position: absolute; left: 509px; top: 867px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I10Tin4"></span></div>
	                                                                                               
	                                            <div style="float: left; position: absolute; left: 312px; top: 888px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I11Tin1"></span></div>
	                                            <div style="float: left; position: absolute; left: 379px; top: 888px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I11Tin2"></span></div>
	                                            <div style="float: left; position: absolute; left: 443px; top: 888px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I11Tin3"></span></div>
	                                            <div style="float: left; position: absolute; left: 509px; top: 888px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I11Tin4"></span></div>

	                                            <div style="float: left; position: absolute; left: 312px; top: 908px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I12Tin1"></span></div>
	                                            <div style="float: left; position: absolute; left: 379px; top: 908px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I12Tin2"></span></div>
	                                            <div style="float: left; position: absolute; left: 443px; top: 908px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I12Tin3"></span></div>
	                                            <div style="float: left; position: absolute; left: 509px; top: 908px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I12Tin4"></span></div>
	                                                                                               
	                                            <div style="float: left; position: absolute; left: 312px; top: 928px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I13Tin1"></span></div>
	                                            <div style="float: left; position: absolute; left: 379px; top: 928px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I13Tin2"></span></div>
	                                            <div style="float: left; position: absolute; left: 443px; top: 928px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I13Tin3"></span></div>
	                                            <div style="float: left; position: absolute; left: 509px; top: 928px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I13Tin4"></span></div>

	                                            <div style="float: left; position: absolute; left: 312px; top: 948px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I14Tin1"></span></div>
	                                            <div style="float: left; position: absolute; left: 379px; top: 948px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I14Tin2"></span></div>
	                                            <div style="float: left; position: absolute; left: 443px; top: 948px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I14Tin3"></span></div>
	                                            <div style="float: left; position: absolute; left: 509px; top: 948px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I14Tin4"></span></div>
	                                                                                               
	                                            <div style="float: left; position: absolute; left: 312px; top: 968px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I15Tin1"></span></div>
	                                            <div style="float: left; position: absolute; left: 379px; top: 968px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I15Tin2"></span></div>
	                                            <div style="float: left; position: absolute; left: 443px; top: 968px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I15Tin3"></span></div>
	                                            <div style="float: left; position: absolute; left: 509px; top: 968px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I15Tin4"></span></div>

	                                            <div style="float: left; position: absolute; left: 312px; top: 989px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I16Tin1"></span></div>
	                                            <div style="float: left; position: absolute; left: 379px; top: 989px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I16Tin2"></span></div>
	                                            <div style="float: left; position: absolute; left: 443px; top: 989px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I16Tin3"></span></div>
	                                            <div style="float: left; position: absolute; left: 509px; top: 989px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I16Tin4"></span></div>
	                                                                                               
	                                            <div style="float: left; position: absolute; left: 312px; top: 1009px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I17Tin1"></span></div>
	                                            <div style="float: left; position: absolute; left: 379px; top: 1009px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I17Tin2"></span></div>
	                                            <div style="float: left; position: absolute; left: 443px; top: 1009px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I17Tin3"></span></div>
	                                            <div style="float: left; position: absolute; left: 509px; top: 1009px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I17Tin4"></span></div>

	                                            <div style="float: left; position: absolute; left: 312px; top: 1029px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I18Tin1"></span></div>
	                                            <div style="float: left; position: absolute; left: 379px; top: 1029px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I18Tin2"></span></div>
	                                            <div style="float: left; position: absolute; left: 443px; top: 1029px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I18Tin3"></span></div>
	                                            <div style="float: left; position: absolute; left: 509px; top: 1029px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I18Tin4"></span></div>
	                                                                                               
	                                            <div style="float: left; position: absolute; left: 312px; top: 1049px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I19Tin1"></span></div>
	                                            <div style="float: left; position: absolute; left: 379px; top: 1049px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I19Tin2"></span></div>
	                                            <div style="float: left; position: absolute; left: 443px; top: 1049px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I19Tin3"></span></div>
	                                            <div style="float: left; position: absolute; left: 509px; top: 1049px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I19Tin4"></span></div>

	                                            <div style="float: left; position: absolute; left: 312px; top: 1069px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I20Tin1"></span></div>
	                                            <div style="float: left; position: absolute; left: 379px; top: 1069px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I20Tin2"></span></div>
	                                            <div style="float: left; position: absolute; left: 443px; top: 1069px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I20Tin3"></span></div>
	                                            <div style="float: left; position: absolute; left: 509px; top: 1069px"><span class="smallBold" style="letter-spacing: 10pt;" id="txtPg7Sc11I20Tin4"></span></div>

	                                            <div style="float: left; position: absolute; left: 583px; top: 686px; width:170px;text-align:right;letter-spacing: 3pt"><span class="smallBold" id="txtPg7Sc11I1C3"></span></div>
	                                            <div style="float: left; position: absolute; left: 583px; top: 706px; width:170px;text-align:right;letter-spacing: 3pt"><span class="smallBold" id="txtPg7Sc11I2C3"></span></div>
	                                            <div style="float: left; position: absolute; left: 583px; top: 726px; width:170px;text-align:right;letter-spacing: 3pt"><span class="smallBold" id="txtPg7Sc11I3C3"></span></div>
	                                            <div style="float: left; position: absolute; left: 583px; top: 746px; width:170px;text-align:right;letter-spacing: 3pt"><span class="smallBold" id="txtPg7Sc11I4C3"></span></div>
	                                            <div style="float: left; position: absolute; left: 583px; top: 766px; width:170px;text-align:right;letter-spacing: 3pt"><span class="smallBold" id="txtPg7Sc11I5C3"></span></div>
	                                            <div style="float: left; position: absolute; left: 583px; top: 786px; width:170px;text-align:right;letter-spacing: 3pt"><span class="smallBold" id="txtPg7Sc11I6C3"></span></div>
	                                            <div style="float: left; position: absolute; left: 583px; top: 807px; width:170px;text-align:right;letter-spacing: 3pt"><span class="smallBold" id="txtPg7Sc11I7C3"></span></div>
	                                            <div style="float: left; position: absolute; left: 583px; top: 827px; width:170px;text-align:right;letter-spacing: 3pt"><span class="smallBold" id="txtPg7Sc11I8C3"></span></div>
	                                            <div style="float: left; position: absolute; left: 583px; top: 847px; width:170px;text-align:right;letter-spacing: 3pt"><span class="smallBold" id="txtPg7Sc11I9C3"></span></div>
	                                            <div style="float: left; position: absolute; left: 583px; top: 867px; width:170px;text-align:right;letter-spacing: 3pt"><span class="smallBold" id="txtPg7Sc11I10C3"></span></div>
	                                            <div style="float: left; position: absolute; left: 583px; top: 888px; width:170px;text-align:right;letter-spacing: 3pt"><span class="smallBold" id="txtPg7Sc11I11C3"></span></div>
	                                            <div style="float: left; position: absolute; left: 583px; top: 908px; width:170px;text-align:right;letter-spacing: 3pt"><span class="smallBold" id="txtPg7Sc11I12C3"></span></div>
	                                            <div style="float: left; position: absolute; left: 583px; top: 928px; width:170px;text-align:right;letter-spacing: 3pt"><span class="smallBold" id="txtPg7Sc11I13C3"></span></div>
	                                            <div style="float: left; position: absolute; left: 583px; top: 948px; width:170px;text-align:right;letter-spacing: 3pt"><span class="smallBold" id="txtPg7Sc11I14C3"></span></div>
	                                            <div style="float: left; position: absolute; left: 583px; top: 968px; width:170px;text-align:right;letter-spacing: 3pt"><span class="smallBold" id="txtPg7Sc11I15C3"></span></div>
	                                            <div style="float: left; position: absolute; left: 583px; top: 989px; width:170px;text-align:right;letter-spacing: 3pt"><span class="smallBold" id="txtPg7Sc11I16C3"></span></div>
	                                            <div style="float: left; position: absolute; left: 583px; top: 1009px; width:170px;text-align:right;letter-spacing: 3pt"><span class="smallBold" id="txtPg7Sc11I17C3"></span></div>
	                                            <div style="float: left; position: absolute; left: 583px; top: 1029px; width:170px;text-align:right;letter-spacing: 3pt"><span class="smallBold" id="txtPg7Sc11I18C3"></span></div>
	                                            <div style="float: left; position: absolute; left: 583px; top: 1049px; width:170px;text-align:right;letter-spacing: 3pt"><span class="smallBold" id="txtPg7Sc11I19C3"></span></div>
	                                            <div style="float: left; position: absolute; left: 583px; top: 1069px; width:170px;text-align:right;letter-spacing: 3pt"><span class="smallBold" id="txtPg7Sc11I20C3"></span></div>
	                                            
	                                            <div style="float: left; position: absolute; left: 761px; top: 686px;  width:50px; text-align:right;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I1C4"></span></div>
	                                            <div style="float: left; position: absolute; left: 761px; top: 706px;  width:50px; text-align:right;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I2C4"></span></div>
	                                            <div style="float: left; position: absolute; left: 761px; top: 726px;  width:50px; text-align:right;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I3C4"></span></div>
	                                            <div style="float: left; position: absolute; left: 761px; top: 746px;  width:50px; text-align:right;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I4C4"></span></div>
	                                            <div style="float: left; position: absolute; left: 761px; top: 766px;  width:50px; text-align:right;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I5C4"></span></div>
	                                            <div style="float: left; position: absolute; left: 761px; top: 786px;  width:50px; text-align:right;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I6C4"></span></div>
	                                            <div style="float: left; position: absolute; left: 761px; top: 807px;  width:50px; text-align:right;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I7C4"></span></div>
	                                            <div style="float: left; position: absolute; left: 761px; top: 827px;  width:50px; text-align:right;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I8C4"></span></div>
	                                            <div style="float: left; position: absolute; left: 761px; top: 847px;  width:50px; text-align:right;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I9C4"></span></div>
	                                            <div style="float: left; position: absolute; left: 761px; top: 867px;  width:50px; text-align:right;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I10C4"></span></div>
	                                            <div style="float: left; position: absolute; left: 761px; top: 888px;  width:50px; text-align:right;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I11C4"></span></div>
	                                            <div style="float: left; position: absolute; left: 761px; top: 908px;  width:50px; text-align:right;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I12C4"></span></div>
	                                            <div style="float: left; position: absolute; left: 761px; top: 928px;  width:50px; text-align:right;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I13C4"></span></div>
	                                            <div style="float: left; position: absolute; left: 761px; top: 948px;  width:50px; text-align:right;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I14C4"></span></div>
	                                            <div style="float: left; position: absolute; left: 761px; top: 968px;  width:50px; text-align:right;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I15C4"></span></div>
	                                            <div style="float: left; position: absolute; left: 761px; top: 989px;  width:50px; text-align:right;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I16C4"></span></div>
	                                            <div style="float: left; position: absolute; left: 761px; top: 1009px; width:50px; text-align:right;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I17C4"></span></div>
	                                            <div style="float: left; position: absolute; left: 761px; top: 1029px; width:50px; text-align:right;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I18C4"></span></div>
	                                            <div style="float: left; position: absolute; left: 761px; top: 1049px; width:50px; text-align:right;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I19C4"></span></div>
	                                            <div style="float: left; position: absolute; left: 761px; top: 1069px; width:50px; text-align:right;letter-spacing: 2pt"><span class="smallBold" id="txtPg7Sc11I20C4"></span></div>
	                                            <!--Page 7 Schedule 11 End-->
											</div>
										</div>
										
										<div id="Print8Content" style="display: none; width: 851px; height: 1280px; font-family: Arial;">
											<img src="{{ asset('images/Print/82314BIR Form 1702-RT8.png') }}" style="position: absolute; background-color: white; width: 851px; height: 1280px;" />
											<div style="float: left; position: relative;">
												<!--Page 8 Header-->
												<div style="float: left; position: absolute; left: 30px; top: 105px;"><span class="smallBold" style="letter-spacing: 10.3pt" id="txtPg8TIN1"></span></div>	
	                                            <div style="float: left; position: absolute; left: 96px; top: 105px;"><span class="smallBold" style="letter-spacing: 10.3pt" id="txtPg8TIN2"></span></div>	
	                                            <div style="float: left; position: absolute; left: 163px; top: 105px;"><span class="smallBold" style="letter-spacing: 10.3pt" id="txtPg8TIN3"></span></div>	
	                                            <div style="float: left; position: absolute; left: 344px; top: 105px; width:470px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg8RegisteredName"></span></div>	
	                                            <!--Page 8 Header End-->

	                                            <!--Page 8 Schedule 12-->
	                                            <div style="float: left; position: absolute; left: 147px; top: 195px; width:225px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg8Sc12I1C1"></span></div>
	                                            <div style="float: left; position: absolute; left: 147px; top: 222px; width:225px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg8Sc12I2C1"></span></div>
	                                            <div style="float: left; position: absolute; left: 147px; top: 249px; width:225px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg8Sc12I3C1"></span></div>
	                                            <div style="float: left; position: absolute; left: 147px; top: 276px; width:225px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg8Sc12I4C1"></span></div>

	                                            <div style="float: left; position: absolute; left: 371px; top: 195px; width:225px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg8Sc12I1C2"></span></div>
	                                            <div style="float: left; position: absolute; left: 371px; top: 222px; width:225px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg8Sc12I2C2"></span></div>
	                                            <div style="float: left; position: absolute; left: 371px; top: 249px; width:225px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg8Sc12I3C2"></span></div>
	                                            <div style="float: left; position: absolute; left: 371px; top: 276px; width:225px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg8Sc12I4C2"></span></div>

	                                            <div style="float: left; position: absolute; left: 621px; top: 195px; width:190px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg8Sc12I1C3"></span></div>
	                                            <div style="float: left; position: absolute; left: 621px; top: 222px; width:190px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg8Sc12I2C3"></span></div>
	                                            <div style="float: left; position: absolute; left: 621px; top: 249px; width:190px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg8Sc12I3C3"></span></div>
	                                            <div style="float: left; position: absolute; left: 621px; top: 276px; width:190px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg8Sc12I4C3"></span></div>

	                                            <div style="float: left; position: absolute; left: 385px; top: 324px; width:210px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg8Sc12I5C1"></span></div>
	                                            <div style="float: left; position: absolute; left: 385px; top: 350px; width:210px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg8Sc12I6C1"></span></div>
	                                            <div style="float: left; position: absolute; left: 385px; top: 377px; width:210px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg8Sc12I7C1"></span></div>
	                                            <div style="float: left; position: absolute; left: 382px; top: 403px; width:215px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg8Sc12I8C1"></span></div>
	                                            <div style="float: left; position: absolute; left: 382px; top: 430px; width:215px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg8Sc12I9C1"></span></div>

	                                            <div style="float: left; position: absolute; left: 611px; top: 324px; width:210px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg8Sc12I5C2"></span></div>
	                                            <div style="float: left; position: absolute; left: 611px; top: 350px; width:210px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg8Sc12I6C2"></span></div>
	                                            <div style="float: left; position: absolute; left: 611px; top: 377px; width:210px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg8Sc12I7C2"></span></div>
	                                            <div style="float: left; position: absolute; left: 611px; top: 403px; width:200px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg8Sc12I8C2"></span></div>
	                                            <div style="float: left; position: absolute; left: 611px; top: 430px; width:200px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg8Sc12I9C2"></span></div>
	                                            
	                                            <div style="float: left; position: absolute; left: 385px; top: 477px;"><span class="smallBold" style="letter-spacing: 11.6pt;" id="ddlPg8Sc12I10C1"></span></div>
	                                            <div style="float: left; position: absolute; left: 453px; top: 477px; width:150px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg8Sc12I10C1"></span></div>
	                                            <div style="float: left; position: absolute; left: 385px; top: 504px; width:210px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg8Sc12I11C1"></span></div>
	                                            <div style="float: left; position: absolute; left: 382px; top: 531px; width:215px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg8Sc12I12C1"></span></div>
	                                            <div style="float: left; position: absolute; left: 395px; top: 555px"><span class="smallBold" style="letter-spacing: 8.5pt;" id="txtPg8Sc12I13C1DateM"></span></div>
	                                            <div style="float: left; position: absolute; left: 446px; top: 555px"><span class="smallBold" style="letter-spacing: 8.5pt;" id="txtPg8Sc12I13C1DateD"></span></div>
	                                            <div style="float: left; position: absolute; left: 498px; top: 555px"><span class="smallBold" style="letter-spacing: 8.2pt;" id="txtPg8Sc12I13C1DateY"></span></div>
	                                            <div style="float: left; position: absolute; left: 382px; top: 580px; width:215px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg8Sc12I14C1"></span></div>
	                                            <div style="float: left; position: absolute; left: 382px; top: 607px; width:215px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg8Sc12I15C1"></span></div>

	                                            <div style="float: left; position: absolute; left: 611px; top: 477px"><span class="smallBold" style="letter-spacing: 11.6pt;" id="ddlPg8Sc12I10C2"></span></div>
	                                            <div style="float: left; position: absolute; left: 678px; top: 477px; width:140px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg8Sc12I10C2"></span></div>
	                                            <div style="float: left; position: absolute; left: 611px; top: 504px; width:210px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg8Sc12I11C2"></span></div>
	                                            <div style="float: left; position: absolute; left: 596px; top: 531px; width:215px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg8Sc12I12C2"></span></div>
	                                            <div style="float: left; position: absolute; left: 615px; top: 555px"><span class="smallBold" style="letter-spacing: 8pt;" id="txtPg8Sc12I13C2DateM"></span></div>
	                                            <div style="float: left; position: absolute; left: 664px; top: 555px"><span class="smallBold" style="letter-spacing: 8.5pt;" id="txtPg8Sc12I13C2DateD"></span></div>
	                                            <div style="float: left; position: absolute; left: 710px; top: 555px"><span class="smallBold" style="letter-spacing: 7.8pt;" id="txtPg8Sc12I13C2DateY"></span></div>
	                                            <div style="float: left; position: absolute; left: 596px; top: 580px; width:215px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg8Sc12I14C2"></span></div>
	                                            <div style="float: left; position: absolute; left: 596px; top: 607px; width:215px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg8Sc12I15C2"></span></div>

	                                            <div style="float: left; position: absolute; left: 385px; top: 649px; width:210px; white-space:nowrap; overflow:hidden;line-height:217%;letter-spacing: 2pt"><span class="smallBold" id="txtPg8Sc12I16C1"></span></div>
	                                            <div style="float: left; position: absolute; left: 382px; top: 707px; width:215px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg8Sc12I17C1"></span></div>
	                                            <div style="float: left; position: absolute; left: 382px; top: 734px; width:215px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg8Sc12I18C1"></span></div>

	                                            <div style="float: left; position: absolute; left: 611px; top: 649px; width:210px; white-space:nowrap; overflow:hidden;line-height:217%;letter-spacing: 2pt"><span class="smallBold" id="txtPg8Sc12I16C2"></span></div>
	                                            <div style="float: left; position: absolute; left: 596px; top: 707px; width:215px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg8Sc12I17C2"></span></div>
	                                            <div style="float: left; position: absolute; left: 596px; top: 734px; width:215px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg8Sc12I18C2"></span></div>

	                                            <div style="float: left; position: absolute; left: 596px; top: 767px; width:215px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtSc12I19TotalFinalTaxWitheld"></span></div>
	                                            <!--Page 8 Schedule 12 End-->

	                                            <!--Page 8 Schedule 13-->
	                                            <div style="float: left; position: absolute; left: 596px; top: 820px; width:215px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg8Sc13I1ReturnOfPremium"></span></div>
												
	                                            <div style="float: left; position: absolute; left: 385px; top: 882px; width:210px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg8Sc13I2C1"></span></div>
												<div style="float: left; position: absolute; left: 611px; top: 882px; width:210px; white-space:nowrap; overflow:hidden;letter-spacing: 4pt"><span class="smallBold" id="txtPg8Sc13I2C2"></span></div>
												<div style="float: left; position: absolute; left: 385px; top: 907px; width:210px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg8Sc13I3C1"></span></div>
	                                            <div style="float: left; position: absolute; left: 611px; top: 907px; width:210px; white-space:nowrap; overflow:hidden;letter-spacing: 4pt"><span class="smallBold" id="txtPg8Sc13I3C2"></span></div>
												<div style="float: left; position: absolute; left: 385px; top: 929px; width:210px; white-space:nowrap; overflow:hidden;letter-spacing: 2pt"><span class="smallBold" id="txtPg8Sc13I4C1"></span></div>
	                                            <div style="float: left; position: absolute; left: 611px; top: 929px; width:210px; white-space:nowrap; overflow:hidden;letter-spacing: 4pt"><span class="smallBold" id="txtPg8Sc13I4C2"></span></div>
												<div style="float: left; position: absolute; left: 382px; top: 954px; width:215px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg8Sc13I5C1"></span></div>
	                                            <div style="float: left; position: absolute; left: 596px; top: 954px; width:215px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg8Sc13I5C2"></span></div>
												
												<div style="float: left; position: absolute; left: 385px; top: 993px; width:210px; white-space:nowrap; overflow:hidden;line-height:210%;letter-spacing: 2pt"><span class="smallBold" id="txtPg8Sc13I6C1"> </span></div>
												<div style="float: left; position: absolute; left: 610px; top: 993px; width:210px; white-space:nowrap; overflow:hidden;line-height:210%;letter-spacing: 2pt"><span class="smallBold" id="txtPg8Sc13I6C2"></span></div>
												<div style="float: left; position: absolute; left: 382px; top: 1044px; width:215px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg8Sc13I7C1"></span></div>
	                                            <div style="float: left; position: absolute; left: 596px; top: 1044px; width:215px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg8Sc13I7C2"></span></div>
												
												<div style="float: left; position: absolute; left: 596px; top: 1076px; width:215px;text-align:right;letter-spacing: 4pt"><span class="smallBold" id="txtPg8Sc13I8TotalIncome"></span></div>
												<!--Page 8 Schedule 13 End-->
											</div>
										</div>

			                                <!--Hidden values-->
			                                <input type="hidden" id="frm1702RT:hdnPg1Pt1I7RDOCode" name="frm1702RT:hdnPg1Pt1I7RDOCode" value="0" />
			                                <input type="hidden" id="frm1702RT:hdnPg1Pt1I5ATCvalue" name="frm1702RT:hdnPg1Pt1I5ATCvalue" value="0.00" />
			                                <input type="hidden" id="hidden-frm1702RT:txtPg8Sc12-I" name="hidden-frm1702RT:txtPg8Sc12-I" value="0" />
			                                <input type="hidden" id="hidden-frm1702RT:txtPg8Sc12-II" name="hidden-frm1702RT:txtPg8Sc12-II" value="0" />
			                                <input type="hidden" id="hidden-frm1702RT:txtPg8Sc12-III" name="hidden-frm1702RT:txtPg8Sc12-III" value="0" />
			                                <input type="hidden" id="hidden-frm1702RT:txtPg8Sc12-IV" name="hidden-frm1702RT:txtPg8Sc12-IV" value="0" />
			                                <input type="hidden" id="hidden-frm1702RT:txtPg8Sc13-I" name="hidden-frm1702RT:txtPg8Sc13-I" value="0" />
			                                <input type="hidden" id="hidden-frm1702RT:txtPg8Sc13-II" name="hidden-frm1702RT:txtPg8Sc13-II"  value="0" />
			                                <input type="hidden" id="frm1702RT:hdnATC"  name="frm1702RT:hdnATC" value="0" />
			                                <input type="hidden" id="frm1702RT:hdnATCOthers"  name="frm1702RT:hdnATCOthers" value="0" />
			                                <input type="hidden" id="frm1702RT:hndTriggerCompute" name="frm1702RT:hndTriggerCompute" value="0" />
			                                <input type="hidden" id="frm1702RT:hdnRefunded" name="rm1702RT:hdnRefunded"  value="0" />
			                                <input type="hidden" id="frm1702RT:hdnIssued" name="frm1702RT:hdnIssued"  value="0" />
			                                <input type="hidden" id="frm1702RT:hdnCarried" name="frm1702RT:hdnCarried"  value="0" />
			                            </div>

			                            <div id="modalCounter" class="modalShow" style="display: none;">
			                                <!--Iterating Rows-->
			                                <input type="text" size="10" id="frm1702RT:txtPg4Sc3I3CtrModal" name="frm1702RT:txtPg4Sc3I3CtrModal" value="0" />
			                                <input type="text" size="10" id="frm1702RT:txtPg4Sc4I4CtrModal"  name="frm1702RT:txtPg4Sc4I4CtrModal" value="0" />
			                                <input type="text" size="10" id="frm1702RT:txtPg5Sc4I39CtrModal" name="frm1702RT:txtPg5Sc4I39CtrModal"  value="0" />
			                                <input type="text" size="10" id="frm1702RT:txtPg5Sc5I4CtrModal"  name="frm1702RT:txtPg5Sc5I4CtrModal" value="0" />
			                                <input type="text" size="10" id="frm1702RT:txtPg5Sc6AI7CtrModal" name="frm1702RT:txtPg5Sc6AI7CtrModal"  value="0" />
			                                <input type="text" size="10" id="frm1702RT:txtPg6Sc7I11CtrModal" name="frm1702RT:txtPg6Sc7I11CtrModal"  value="0" />
			                                <input type="text" size="10" id="frm1702RT:txtPg6Sc9I3CtrModal" name="frm1702RT:txtPg6Sc9I3CtrModal"  value="0" />
			                                <input type="text" size="10" id="frm1702RT:txtPg6Sc9I6CtrModal" name="frm1702RT:txtPg6Sc9I6CtrModal"  value="0" />
			                                <input type="text" size="10" id="frm1702RT:txtPg6Sc9I8CtrModal"  name="frm1702RT:txtPg6Sc9I8CtrModal" value="0" />
			                                <input type="text" size="10" id="frm1702RT:txtPg8Sc12I4CtrModal" name="frm1702RT:txtPg8Sc12I4CtrModal"  value="0" />
			                                <!--Iterating Columns-->
				                            <input type="text" size="10" id="frm1702RT:txtCtrmodalPg8Sc12II"  name="frm1702RT:txtCtrmodalPg8Sc12II" value="0" />
				                            <input type="text" size="10" id="frm1702RT:txtCtrmodalPg8Sc12III"  name="frm1702RT:txtCtrmodalPg8Sc12III" value="0" />
				                            <input type="text" size="10" id="frm1702RT:txtCtrmodalPg8Sc12IV" name="frm1702RT:txtCtrmodalPg8Sc12IV"  value="0" />
				                            <input type="text" size="10" id="frm1702RT:txtCtrmodalPg8Sc13I" name="frm1702RT:txtCtrmodalPg8Sc13I"  value="0" />
				                            <input type="text" size="10" id="frm1702RT:txtCtrmodalPg8Sc13II" name="frm1702RT:txtCtrmodalPg8Sc13II"  value="0" />
			                            </div>
				 						<div id="PageFooter">
			                                <table width="751" border="0" cellspacing="0" cellpadding="0" class="tblForm printButtonClass">
			                                    <tr>
			                                        <td class="tblFormTdPart">
			                                            <table width="735" cellspacing="0" cellpadding="0" border="0">
			                                                <tbody>
			                                                    <tr>
																	<td width="40">
																	</td>
																	<td width="616" class="text-center" style="width: 100%">
																		<input class="printButtonClass" type="button" value="Prev" style="width: 100px;"
																		id="frm1702RT:btnPrev" onclick="processPrev();" disabled="disabled"/>
																		<input type="text" style="text-align:center" id="frm1702RT:txtCurrentPage" name="frm1702RT:txtCurrentPage" size="2" maxlength="1" value="1" onkeyup="goToPage();" onkeypress="return wholenumber(event, true)"/>/
																		<input type="text" style="text-align:center" id="frm1702RT:txtMaxPage" name="frm1702RT:txtMaxPage" disabled="disabled" size="2" value="8"  />
																		<input class="printButtonClass" type="button" value="Next" style="width: 100px;"
																		id="frm1702RT:btnNext" onclick="processNext();" />
																	</td>
															   </tr>
			                                                    <tr valign="middle">
			                                                        <td width="40">
			                                                        </td>
			                                                        <td width="616">
			                                                            	<div align="center">
			                                                                    <input class="printButtonClass" type="button" value="Validate" style="width: 100px;" name="frm1702RT:cmdValidate" id="frm1702RT:cmdValidate" onclick="validate()" />
			                                                                    <input class="printButtonClass" type="button" value="Edit" style="width: 100px;" name="frm1702RT:cmdEdit" id="frm1702RT:cmdEdit" onclick="enableAllControl()" />
			                                                                    <input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />
			                                                                    <input class="printButtonClass" type="button" value="Save" style="width: 100px;" name="btnSave" id="btnSave" onclick="saveData();" />
			                                                                    <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printOCR();" />
			                                                                    <input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;" name="frm1702RT:btnFinalCopy" id="frm1702RT:btnFinalCopy" onclick="submitForm();" /> 
			                                                                </div>
			                                                                <div id="msg" class="printButtonClass" style="display: none;">
			                                                        </td>
			                                                        <div id="DummyTxt" style='display: none;'>
			                                                        </div>
			                                                    </tr>
			                                                </tbody>
			                                            </table>
			                                        </td>
			                                    </tr>
			                                </table>
			                            </div>
	                        </div>
	                    </td>
	                </tr>
	            </table>
	        </div>
	    </div>
	    <!--Modal Pop-ups==========================================================================================================Begin-->
	    <div id="dialog2" class="dialog2" style="display: none">
	    </div>
	    <div id="overlay2" style="display: none">
	    </div>
	    <div id="dialog" class="dialog" style="display: none">
	    </div>
	    <div id="overlay" style="display: none">
	    </div>

	    <!-- START: 2 Column Iterating Row Modals -->
	    <div id="modalOuter" class="modalShow" style="display: none;">

		    <!--START:Pg4Sc3I3ModalInners-->
		    <div id="frm1702RT:txtPg4Sc3I3ModalInner" class="modalInnerRT" style="display: none;">
		        <table class="tblForm" style="width: 100%">
		            <tr>
		                <td class="tblFormTd" align="center" style="width: 100%;">
		                    <span class="smallBold"><strong>Schedule 3 - Other Taxable Income Not Subjected to Final Tax</strong></span>
		                </td>
		            </tr>
		        </table>
		        <table class="tblForm" style="width: 100%">
		            <tr>
		                <td style="width:5%"/>
		                <td style="width:60%;text-align:center">
		                    <span class="small">Description</span>
		                </td>
		                <td style="width:27%;text-align:center">
		                    <span class="small">Amount</span>
		                </td>
		                <td style="width:8%" />
		            </tr>
		        </table>
		        <table id="frm1702RT:txtPg4Sc3I3ModalTable" class="tblForm" style="width: 98%" />
		        <table class="tblForm" style="width: 100%">
		            <tr>
		                <td class="tblFormTd">
		                    <span class="smallBold" style="width:549px; text-align:right;display:block">Subtotal: </span>
		                </td>
		                <td class="tblFormTd">
		                    <input id="frm1702RT:txtPg4Sc3I3SubTotal" name="frm1702RT:txtPg4Sc3I3Subtotal" type="text" style="width:210px" disabled="disabled" value="0" style="text-align:right;" />
		                </td>
		                <td  style="width:100px;"/>
		            </tr>
		        </table>
		    </div>

		    <div id="frm1702RT:txtPg4Sc4I4ModalInner" class="modalInnerRT" style="display: none;">
	        <table class="tblForm" style="width: 100%">
	            <tr>
	                <td class="tblFormTd" align="center" style="width: 100%;">
	                    <span class="smallBold">Schedule 4 - Ordinary Allowable Itemized Deduction</span>
	                </td>
	            </tr>
	        </table>
	        <table class="tblForm" style="width: 100%">
	            <tr>
	                <td style="width:5%"/>
	                <td style="width:60%;text-align:center">
	                    <span class="small">Description</span>
	                </td>
	                <td style="width:27%;text-align:center">
	                    <span class="small">Amount</span>
	                </td>
	                <td style="width:8%" />
	            </tr>
	        </table>
	        <table id="frm1702RT:txtPg4Sc4I4ModalTable" class="tblForm" style="width: 98%" />
	        <table class="tblForm" style="width: 100%">
	            <tr>
	                <td class="tblFormTd">
	                    <span class="smallBold" style="width:549px; text-align:right;display:block">Subtotal: </span>
	                </td>
	                <td class="tblFormTd">
	                    <input id="frm1702RT:txtPg4Sc4I4SubTotal" name="frm1702RT:txtPg4Sc4I4Subtotal" type="text" style="width:210px" disabled="disabled" value="0" style="text-align:right;" />
	                </td>
	                <td  style="width:100px;"/>
	            </tr>
	        </table>
	    </div>
	    <!--END:Pg4Sc4I4ModalInners-->

	    <!--START:Pg5Sc4I39ModalInners-->
	    <div id="frm1702RT:txtPg5Sc4I39ModalInner" class="modalInnerRT" style="display: none;">
	            <table class="tblForm" style="width: 100%">
	                <tr>
	                    <td class="tblFormTd" align="center" style="width: 100%;">
	                            <span class="smallBold"><strong>Schedule 4 - Ordinary Allowable Itemized Deductions</strong></span>
	                            <span class="smallItalic">(Continued from Previous Page)</span>
	                    </td>
	                </tr>
	            </table>
	            <table class="tblForm" style="width: 100%">
	                <tr>
	                    <td style="width:5%"/>
	                    <td style="width:60%;text-align:center">
	                        <span class="small">Description</span>
	                    </td>
	                    <td style="width:27%;text-align:center">
	                        <span class="small">Amount</span>
	                    </td>
	                    <td style="width:8%" />
	                </tr>
	            </table>
	            <table id="frm1702RT:txtPg5Sc4I39ModalTable" class="tblForm" style="width: 98%" />
	            <table class="tblForm" style="width: 100%">
	                <tr>
	                    <td class="tblFormTd">
	                        <span class="smallBold" style="width:549px; text-align:right;display:block">Subtotal: </span>
	                    </td>
	                    <td class="tblFormTd">
	                        <input id="frm1702RT:txtPg5Sc4I39SubTotal" name="frm1702RT:txtPg5Sc4I39Subtotal" type="text" style="width:210px" disabled="disabled" value="0" style="text-align:right;" />
	                    </td>
	                    <td  style="width:100px;"/>
	                </tr>
	            </table>
	    </div>
		<!--END:Pg5Sc4I39ModalInners-->

		   <!--START:Pg5Sc5I4ModalInner-->
    		<div id="frm1702RT:txtPg5Sc5I4ModalInner" class="modalInnerRT" style="display: none;">
	            <table class="tblForm" style="width: 100%">
	                <tr>
	                    <td class="tblFormTd" align="center" style="width: 100%;">
	                            <span class="smallBold"><strong>Schedule 5 - Special Allowable Itemized Deductions</strong></span>
	                            <span class="smallItalic">(Attach additional sheet/s, if necessary)</span>
	                    </td>
	                </tr>
	            </table>
	            <table class="tblForm" style="width: 100%">
	                <tr class="small" style="text-align:center">
	                    <td style="width:45%">
	                        <span>Description</span>
	                    </td>
	                    <td style="width:20%">
	                        <span>Legal Basis</span>
	                    </td>
	                    <td style="width:30%">
	                        <span>Amount</span>
	                    </td>
	                    <td style="width:5%" /></td>
	                </tr>            
	            </table>
	            <table id="frm1702RT:txtPg5Sc5I4ModalTable" class="tblForm" style="width: 98%"></table>
	            <table class="tblForm" style="width: 100%">
	                <tr>
	                    <td class="tblFormTd">
	                        <span class="smallBold" style="width:546px; text-align:right;display:block">Subtotal: </span>
	                    </td>
	                    <td class="tblFormTd">
	                        <input id="frm1702RT:txtPg5Sc5I4SubTotal" name="frm1702RT:txtPg5Sc5I4Subtotal" type="text" style="width:210px" disabled="disabled" value="0" style="text-align:right;" />
	                    </td>
	                    <td  style="width:100px;"/>
	                </tr>
	            </table>
	        </div>

	        <div id="frm1702RT:txtPg5Sc6AI7ModalInner" class="modalInnerRT" style="display: none;">
	            <table class="tblForm" style="width: 100%">
	                <tr>
	                    <td class="tblFormTd" align="center" style="width: 100%;">
	                            <span class="smallBold">Schedule 6A - Computation of Available Net Operating Loss Carry Over (NOLCO)</span>
	                    </td>
	                </tr>
	            </table>

	            <table border="0" cellpadding="0" cellspacing="0" class="tblForm" style="width: 100%">
	                <tr>
	                    <td class="tblFormTd" width="50%">
	                        <table border="0" cellpadding="0" cellspacing="0">
	                            <tr>
	                                <td align="center" class="small" colspan="2" width="60%">Net Operating
	                                    Loss</td>
	                                <td align="center" class="small" rowspan="2" width="25%">B) NOLCO
	                                    Applied Previous Year</td>
	                            </tr>
	                            <tr>
	                                <td align="center" class="small" width="20%">Year Incurred</td>
	                                <td align="center" class="small" width="25%">A) Amount</td>
	                            </tr>
	                        </table>
	                    </td>
	                    <td class="tblFormTd" width="40%">
	                        <table border="0" cellpadding="0" cellspacing="0" style="width:100%">
	                            <tr class="small" style="width:100%">
	                                <td style="width:20%;">
	                                    <span>C) NOLCO Expired</span>
	                                </td>
	                                <td style="width:20%">
	                                    <span>D) NOLCO Applied Current Year</span>
	                                </td>
	                                <td style="width:20%;">
	                                    <span>E) Net Operating Loss (Unapplied)</span>
	                                </td>
	                            </tr>
	                        </table>
	                    </td>
	                </tr>
	            </table>
	            <table id="frm1702RT:txtPg5Sc6AI7ModalTable" class="tblForm" style="width: 100%">
	                <tr>
	                    <td class="tblFormTd">
	                        <span class="smallBold" style="width:173px; text-align:right;display:block">Subtotal: </span>
	                    </td>
	                    <td class="tblFormTd">
	                        <input id="frm1702RT:txtPg5Sc6AI7C2Subtotal" name="frm1702RT:txtPg5Sc6AI7C2Subtotal" type="text" style="width:240px" disabled="disabled" value="0" style="text-align:right;" />
	                        <input id="frm1702RT:txtPg5Sc6AI7C3Subtotal" name="frm1702RT:txtPg5Sc6AI7C3Subtotal" type="text" style="width:171px" disabled="disabled" value="0" style="text-align:right;" />
	                        <input id="frm1702RT:txtPg5Sc6AI7C4Subtotal" name="frm1702RT:txtPg5Sc6AI7C4Subtotal"  type="text" style="width:171px" disabled="disabled" value="0" style="text-align:right;" />
	                        <input id="frm1702RT:txtPg5Sc6AI7C5Subtotal" name="frm1702RT:txtPg5Sc6AI7C5Subtotal"  type="text" style="width:171px" disabled="disabled" value="0" style="text-align:right;" />
	                        <input id="frm1702RT:txtPg5Sc6AI7C6Subtotal" name="frm1702RT:txtPg5Sc6AI7C6Subtotal"  type="text" style="width:171px" disabled="disabled" value="0" style="text-align:right;" />
	                    </td>
	                </tr>
	            </table>
	        </div>
	        <div id="frm1702RT:txtPg6Sc7I11ModalInner" class="modalInnerRT" style="display: none;">
		        <table class="tblForm" style="width: 100%">
		            <tr>
		                <td class="tblFormTd" align="center" style="width: 100%;">
		                        <span class="smallBold"><strong>Schedule 7 - Tax Credits/Payments</strong></span>
		                </td>
		            </tr>
		        </table>
		        <table class="tblForm" style="width: 100%">
		            <tr>
		                <td style="width:5%"/>
		                <td style="width:60%;text-align:center">
		                    <span class="small">Description</span>
		                </td>
		                <td style="width:27%;text-align:center">
		                    <span class="small">Amount</span>
		                </td>
		                <td style="width:8%" />
		            </tr>
		        </table>
		        <table id="frm1702RT:txtPg6Sc7I11ModalTable" class="tblForm" style="width: 98%" />
		        <table class="tblForm" style="width: 100%">
		            <tr>
		                <td class="tblFormTd">
		                    <span class="smallBold" style="width:549px; text-align:right;display:block">Subtotal: </span>
		                </td>
		                <td class="tblFormTd">
		                    <input id="frm1702RT:txtPg6Sc7I11SubTotal" name="frm1702RT:txtPg6Sc7I11SubTotal" type="text" style="width:210px" disabled="disabled" value="0" style="text-align:right;" />
		                </td>
		                <td  style="width:100px;"/>
		            </tr>
		        </table>
		    </div>
		    <div id="frm1702RT:txtPg6Sc9I3ModalInner" class="modalInnerRT" style="display: none;">
		        <table class="tblForm" style="width: 100%">
		            <tr>
		                <td class="tblFormTd" align="center" style="width: 100%;">
		                    <span class="smallBold"><strong>Schedule 9 - Reconciliation of Net Income per Books Against Taxable Income</strong></span>
		                </td>
		            </tr>
		            <tr>
		                <td class="tblFormTd" align="left" style="width: 100%;">
		                    <span class="smallBold">Add: Non-deductible expenses/Taxable Other Income</span>
		                </td>
		            </tr>
		        </table>
		        <table class="tblForm" style="width: 100%">
		            <tr>
		                <td style="width:5%"/>
		                <td style="width:60%;text-align:center">
		                    <span class="small">Description</span>
		                </td>
		                <td style="width:27%;text-align:center">
		                    <span class="small">Amount</span>
		                </td>
		                <td style="width:8%" />
		            </tr>
		        </table>
		        <table id="frm1702RT:txtPg6Sc9I3ModalTable" class="tblForm" style="width: 98%" />
		        <table class="tblForm" style="width: 100%">
		            <tr>
		                <td class="tblFormTd">
		                    <span class="smallBold" style="width:549px; text-align:right;display:block">Subtotal: </span>
		                </td>
		                <td class="tblFormTd">
		                    <input id="frm1702RT:txtPg6Sc9I3SubTotal" name="frm1702RT:txtPg6Sc9I3Subtotal" type="text" style="width:210px" disabled="disabled" value="0" style="text-align:right;" />
		                </td>
		                <td  style="width:100px;"/>
		            </tr>
		        </table>
		    </div>
		    <div id="frm1702RT:txtPg6Sc9I6ModalInner" class="modalInnerRT" style="display: none;">
		        <table class="tblForm" style="width: 100%">
		            <tr>
		                <td class="tblFormTd" align="center" style="width: 100%;">
		                    <span class="smallBold"><strong>Schedule 9 - Reconciliation of Net Income per Books Against Taxable Income</strong></span>
		                </td>
		            </tr>
		            <tr>
		                <td class="tblFormTd" align="left" style="width: 100%;">
		                    <span class="smallBold">Less: A) Non-taxable Income and Income Subjected to Final Tax</span>
		                </td>
		            </tr>
		        </table>
		        <table class="tblForm" style="width: 100%">
		            <tr>
		                <td style="width:5%"/>
		                <td style="width:60%;text-align:center">
		                    <span class="small">Description</span>
		                </td>
		                <td style="width:27%;text-align:center">
		                    <span class="small">Amount</span>
		                </td>
		                <td style="width:8%" />
		            </tr>
		        </table>
		        <table id="frm1702RT:txtPg6Sc9I6ModalTable" class="tblForm" style="width: 98%" />
		        <table class="tblForm" style="width: 100%">
		            <tr>
		                <td class="tblFormTd">
		                    <span class="smallBold" style="width:549px; text-align:right;display:block">Subtotal: </span>
		                </td>
		                <td class="tblFormTd">
		                    <input id="frm1702RT:txtPg6Sc9I6SubTotal" name="frm1702RT:txtPg6Sc9I6Subtotal" type="text" style="width:210px" disabled="disabled" value="0" style="text-align:right;" />
		                </td>
		                <td  style="width:100px;"/>
		            </tr>
		        </table>
		    </div>

		    <div id="frm1702RT:txtPg6Sc9I8ModalInner" class="modalInnerRT" style="display: none;">
		        <table class="tblForm" style="width: 100%">
		            <tr>
		                <td class="tblFormTd" align="center" style="width: 100%;">
		                    <span class="smallBold"><strong>Schedule 9 - Reconciliation of Net Income per Books Against Taxable Income</strong></span>
		                </td>
		            </tr>
		            <tr>
		                <td class="tblFormTd" align="left" style="width: 100%;">
		                    <span class="smallBold">Less: B) Special Deductions</span>
		                </td>
		            </tr>
		        </table>
		        <table class="tblForm" style="width: 100%">
		            <tr>
		                <td style="width:5%"/>
		                <td style="width:60%;text-align:center">
		                    <span class="small">Description</span>
		                </td>
		                <td style="width:27%;text-align:center">
		                    <span class="small">Amount</span>
		                </td>
		                <td style="width:8%" />
		            </tr>
		        </table>
		        <table id="frm1702RT:txtPg6Sc9I8ModalTable" class="tblForm" style="width: 98%" />
		        <table class="tblForm" style="width: 100%">
		            <tr>
		                <td class="tblFormTd">
		                    <span class="smallBold" style="width:549px; text-align:right;display:block">Subtotal: </span>
		                </td>
		                <td class="tblFormTd">
		                    <input id="frm1702RT:txtPg6Sc9I8SubTotal" name="frm1702RT:txtPg6Sc9I8Subtotal" type="text" style="width:210px" disabled="disabled" value="0" style="text-align:right;" />
		                </td>
		                <td  style="width:100px;"/>
		            </tr>
		        </table>
		    </div>

		    <div id="frm1702RT:txtPg8Sc12I4ModalInner" class="modalInnerRT" style="display: none;">
		        <table class="tblForm" style="width: 100%">
		            <tr>
		                <td class="tblFormTd" style="width: 100%; text-align:center">
		                    <span class="smallBold">Schedule 12 - Supplemental Information</span>
		                </td>
		            </tr>
		        </table>
		        <table class="tblForm" style="width: 100%">
		            <tr>
		                <td class="tblFormTd" style="width:24%; text-align: center;">
		                    <span class="smaller">I) Gross Income / Receipts Subjected to Final Withholding</span>
		                </td>
		                <td class="tblFormTd" style="width:24%;; text-align:center">
		                    <span class="small">A) Exempt</span>
		                </td>
		                <td class="tblFormTd" style="width:26%; text-align:center">
		                    <span class="small">B) Actual Amount / Fair Market Value / Net Capital
		                        Gains</span>
		                </td>
		                <td class="tblFormTd" style="width:26%; text-align:center">
		                    <span class="small">C) Final Tax Withheld / Paid</span>
		                </td>
		            </tr>
		        </table>
		        <table id="frm1702RT:txtPg8Sc12I4ModalTable" class="tblForm" style="width: 100%" />
		        <table class="tblForm" style="width: 100%">
		            <tr style="width:100%">
		                <td class="tblFormTd" style="width:91%;text-align:right;">
		                    <span class="smallBold">Subtotal:</span>
		                    <input id="frm1702RT:txtPg8Sc12I4SubTotal" name="frm1702RT:txtPg8Sc12I4SubTotal" type="text" style="width:173px;text-align:right" disabled="disabled" value="0" />
		                </td>
		                <td style="width:9%"/>
		            </tr>
		        </table>
		    </div>

		    <div>
		        <table class="tblForm" style="width: 100%">
		            <tr>
		                <td class="tblFormTd" align="center" style="width: 100%;">
		                    <input type="button" value=" Add Row " onclick="addRowModalTable()" />
		                    &nbsp;&nbsp;&nbsp;
		                    <input type="button" value=" Save " onclick="saveModalTable(1,0)" />
		                    &nbsp;&nbsp;&nbsp;
		                    <input type="button" value=" Cancel " onclick="confirmCancel()" />
		                    &nbsp;&nbsp;&nbsp;
		                    <input type="button" value=" Save and Close " onclick="saveModalTable(1,1)" />
		                    &nbsp;&nbsp;&nbsp;
		                    <input type="button" value=" Close " onclick="confirmClose()" />
		                </td>
		            </tr>
		            <tr>
					    <td class="tblFormTd" align="center" style="width: 100%;">
						    <input type="button" value=" Print " onclick="printModal('modalOuter')" />
					    </td>
				    </tr>
		        </table>
		    </div>

	    </div>

	    <div  id="popModalDivPg8Sc12II" class="modalShow" style="display: none;">
			<div style="position:relative; width: 100%;">
					<table class="tblForm" style="width: 100%;">
						<tr>
							<td align="center" class="tblFormTd">
								<span style="font-weight: bold; font-size: small;">Schedule 12 - Supplemental Information</span>
							</td>
						</tr>
					</table>
					<table class="tblForm" style="width: 100%;">
						<tr>
							<td align="center" class="tblFormTd">
								<span style="font-weight: bold; font-size: small;">II) Sale/Exchange of Real Properties</span>
							</td>
						</tr>
					</table>											
			</div>	
			<div  class="modalInner" style="width: 100%;">
				<div  id="mainModalDivPg8Sc12II" style="position:relative; display:none;">
				</div>
				<div  id="tempModalDivPg8Sc12II" style="position:relative;">
				</div>
				<div style="position:relative; width: 100%;">
					<table class="tblForm" style="width: 100%">
						<tr>
	                        <td class="tblFormTd" align="center" style="width: 100%;">
	                            <input type="button" value=" Add Row " onclick="AddrowChecking_ModalColumnRT('#tempModalDivPg8Sc12II div', AddRow_modalTablePg8Sc12II)" />
	                            &nbsp;&nbsp;&nbsp;
	                            <input type="button" value=" Save " onclick="Save_modalDivPg8Sc12II()" />
	                            &nbsp;&nbsp;&nbsp;
	                            <input type="button" value=" Cancel " onclick="Cancel_modalDivPg8Sc12II()" />
	                            &nbsp;&nbsp;&nbsp;
								<input type="button" value=" Save & Close " onclick="Save_modalDivPg8Sc12II(), closeDialog2('popModalDivPg8Sc12II')" />
	                            &nbsp;&nbsp;&nbsp;
	                            <input type="button" value=" Close " onclick="closeDialog2('popModalDivPg8Sc12II')" />
	                        </td>
						</tr>
					</table>
	                <table class="tblForm" style="width: 100%">
		                <tr>
			                <td class="tblFormTd" align="center" style="width: 100%;">
				                <input type="button" value=" Print " onclick="printModal('popModalDivPg8Sc12II')" />
			                </td>
		                </tr>
	                </table>
				</div>
			</div>
		</div>

		<div  id="popModalDivPg8Sc12III" class="modalShow" style="display: none;">
		    <div style="position:relative; width:100%">
				<table class="tblForm" style="width: 100%;">
					<tr>
						<td align="center" class="tblFormTd" style="width: 100%">
							<span style="font-weight: bold; font-size: small;">Schedule 12 - Supplemental Information</span>
						</td>
					</tr>
				</table>
				<table class="tblForm" style="width: 100%;">
					<tr>
						<td align="center" class="tblFormTd" style="width: 100%">
							<span style="font-weight: bold; font-size: small;">III) Sale/Exchange of Shares of Stock</span>
						</td>
					</tr>
				</table>											
		    </div>	
		    <div class="modalInner" style="width: 100%;">
				<div  id="mainModalDivPg8Sc12III" style="position:relative; display:none;">
				</div>
				<div  id="tempModalDivPg8Sc12III" style="position:relative;">
				</div>
				<div style="position:relative">
					<table class="tblForm" style="width: 100%">
						<tr>
							<td class="tblFormTd" align="center" style="width: 100%;">
								<input type="button" value=" Add Row " onclick="AddrowChecking_ModalColumnRT('#tempModalDivPg8Sc12III div', AddRow_modalTablePg8Sc12III)" />
								&nbsp;&nbsp;&nbsp;
								<input type="button" value=" Save " onclick="Save_modalDivPg8Sc12III()" />
								&nbsp;&nbsp;&nbsp;
								<input type="button" value=" Cancel " onclick="Cancel_modalDivPg8Sc12III()" />
								&nbsp;&nbsp;&nbsp;
								<input type="button" value=" Save & Close " onclick="Save_modalDivPg8Sc12III(), closeDialog2('popModalDivPg8Sc12III')" />
								&nbsp;&nbsp;&nbsp;
								<input type="button" value=" Close " onclick="closeDialog2('popModalDivPg8Sc12III')" />
							</td>
						</tr>
					</table>
					<table class="tblForm" style="width: 100%">
						<tr>
							<td class="tblFormTd" align="center" style="width: 100%;">
								<input type="button" value=" Print " onclick="printModal('popModalDivPg8Sc12III')" />
							</td>
						</tr>
					</table>
				</div>
		    </div>
	    </div>

	    <div  id="popModalDivPg8Sc12IV" class="modalShow" style="display: none;">
			<div style="position:relative; width:100%">
				<table class="tblForm" style="width: 100%;">
					<tr>
						<td align="center" class="tblFormTd" style="width: 100%">
							<span style="font-weight: bold; font-size: small;">Schedule 12 - Supplemental Information</span>
						</td>
					</tr>
				</table>
				<table class="tblForm" style="width: 100%;">
					<tr>
						<td align="center" class="tblFormTd" style="width: 100%">
							<span style="font-weight: bold; font-size: small;">IV) Other Income (Specify)</span>
						</td>
					</tr>
				</table>											
		    </div>	
			<div class="modalInner" style="width: 100%;">
				<div  id="mainModalDivPg8Sc12IV" style="position:relative; display:none;"   >			        
				</div>
				<div  id="tempModalDivPg8Sc12IV" style="position:relative;"   >
										
				</div>
				<div style="position:relative" style="width: 100%;">
					<table class="tblForm" style="width: 100%">
						<tr>
							<td class="tblFormTd" align="center" style="width: 100%;">
								<input type="button" value=" Add Row " onclick="AddrowChecking_ModalColumnRT('#tempModalDivPg8Sc12IV div', AddRow_modalTablePg8Sc12IV)" />
								&nbsp;&nbsp;&nbsp;
								<input type="button" value=" Save " onclick="Save_modalDivPg8Sc12IV()" />
								&nbsp;&nbsp;&nbsp;
								<input type="button" value=" Cancel " onclick="Cancel_modalDivPg8Sc12IV()" />
								&nbsp;&nbsp;&nbsp;
								<input type="button" value=" Save & Close " onclick="Save_modalDivPg8Sc12IV(), closeDialog2('popModalDivPg8Sc12IV')" />
								&nbsp;&nbsp;&nbsp;
								<input type="button" value=" Close " onclick="closeDialog2('popModalDivPg8Sc12IV')" />
							</td>
						</tr>
					</table>
					<table class="tblForm" style="width: 100%">
						<tr>
							<td class="tblFormTd" align="center" style="width: 100%;">
								<input type="button" value=" Print " onclick="printModal('popModalDivPg8Sc12IV')" />
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>

		<div  id="popModalDivPg8Sc13I" class="modalShow" style="display: none;">
			<div style="position:relative; width:100%">
					<table class="tblForm" style="width: 100%;">
	                    <tr>
	                        <td align="center" class="tblFormTd" style="width: 100%">
	                            <span style="font-weight: bold; font-size: small;">Schedule 13 - Gross Income/Receipts Exempt from Income Tax</span>
	                        </td>
	                    </tr>
	                </table>
					<table class="tblForm" style="width: 100%;">
	                    <tr>
	                        <td align="center" class="tblFormTd" style="width: 100%">
	                            <span style="font-weight: bold; font-size: small;">I) Personal/Real Properties Received thru Gifts, Bequests, and Devises</span>
	                        </td>
	                    </tr>
	                </table>											
			</div>	
			<div  class="modalInner" style="width: 100%;">
	                <div  id="mainModalDivPg8Sc13I" style="position:relative; display:none;"   >
									        
					</div>
					<div  id="tempModalDivPg8Sc13I" style="position:relative;"   >
									        
					</div>
	                <div style="position:relative; width:100%" >
							<table class="tblForm" style="width: 100%">
								<tr>
	                                <td class="tblFormTd" align="center" style="width: 100%;">
	                                    <input type="button" value=" Add Row " onclick="AddrowChecking_ModalColumnRT('#tempModalDivPg8Sc13I div', AddRow_modalTablePg8Sc13I)" />
	                                    &nbsp;&nbsp;&nbsp;
	                                    <input type="button" value=" Save " onclick="Save_modalDivPg8Sc13I()" />
	                                    &nbsp;&nbsp;&nbsp;
	                                    <input type="button" value=" Cancel " onclick="Cancel_modalDivPg8Sc13I()" />
	                                    &nbsp;&nbsp;&nbsp;
								        <input type="button" value=" Save & Close " onclick="Save_modalDivPg8Sc13I(), closeDialog2('popModalDivPg8Sc13I')" />
	                                    &nbsp;&nbsp;&nbsp;
	                                    <input type="button" value=" Close " onclick="closeDialog2('popModalDivPg8Sc13I')" />
	                                </td>
								</tr>
							</table>
	                        <table class="tblForm" style="width: 100%">
		                        <tr>
			                        <td class="tblFormTd" align="center" style="width: 100%;">
				                        <input type="button" value=" Print " onclick="printModal('popModalDivPg8Sc13I')" />
			                        </td>
		                        </tr>
	                        </table>
					</div>
			</div>
		</div>
	    <div  id="popModalDivPg8Sc13II" class="modalShow" style="display: none;">
			<div style="position:relative; width: 100%;">
					<table class="tblForm" style="width: 100%;">
	                    <tr>
	                        <td align="center" class="tblFormTd" style="width: 98%">
	                            <span style="font-weight: bold; font-size: small;">Schedule 13 - Gross Income/Receipts Exempt from Income Tax</span>
	                        </td>
	                    </tr>
	                </table>
					<table class="tblForm" style="width: 100%;">
	                    <tr>
	                        <td align="center" class="tblFormTd" style="width: 100%">
	                            <span style="font-weight: bold; font-size: small;">II) Other Income/Receipts</span>
	                        </td>
	                    </tr>
	                </table>											
			</div>	
			<div  class="modalInner" style="width:100%;">
	                <div  id="mainModalDivPg8Sc13II" style="position:relative; display:none;"   >
									        
					</div>
					<div  id="tempModalDivPg8Sc13II" style="position:relative;"   >
									        
					</div>
	                <div style="position:relative; width: 100%;">
							<table class="tblForm" style="width: 100%">
								<tr>
	                                <td class="tblFormTd" align="center" style="width: 100%;">
	                                    <input type="button" value=" Add Row " onclick="AddrowChecking_ModalColumnRT('#tempModalDivPg8Sc13II div', AddRow_modalTablePg8Sc13II)" />
	                                    &nbsp;&nbsp;&nbsp;
	                                    <input type="button" value=" Save " onclick="Save_modalDivPg8Sc13II()" />
	                                    &nbsp;&nbsp;&nbsp;
	                                    <input type="button" value=" Cancel " onclick="Cancel_modalDivPg8Sc13II()" />
	                                    &nbsp;&nbsp;&nbsp;
								        <input type="button" value=" Save & Close " onclick="Save_modalDivPg8Sc13II(), closeDialog2('popModalDivPg8Sc13II')" />
	                                    &nbsp;&nbsp;&nbsp;
	                                    <input type="button" value=" Close " onclick="closeDialog2('popModalDivPg8Sc13II')" />
	                                </td>
								</tr>
							</table>
	                        <table class="tblForm" style="width: 100%">
		                        <tr>
			                        <td class="tblFormTd" align="center" style="width: 100%;">
				                        <input type="button" value=" Print " onclick="printModal('popModalDivPg8Sc13II')" />
			                        </td>
		                        </tr>
	                        </table>
					</div>
			</div>
		</div>
	</form>
	<textarea id='responsetext' style="display: none;"></textarea>
    <!-- XML retrieval -->
    <div style="display: none;">
        <xmp id='xmlFormat'>	
            </xmp>
        <!--format the doc -->
        <span id='xmlClose'>All Rights Reserved BIR 2014.</span>
    </div>
    <div id="responseBG" style="display: none;">
        <!--loaded files render here-->
    </div>
    <div id="response" style="display: none;">
        <!--loaded files render here-->
    </div>
    <div id="responseRdo" style="display: none;">
        <!--loaded files render here-->
    </div>
@endsection

@section('scripts')
<script src="{{ asset('js/forms/1702RT.js') }}" ></script>
<script type="text/javascript">
	$(document).ready(function () { init() })

    function init() {
        $('#overlay').click(function () { closeDialog(); })

    }

    var currentPage = 1;
    var MaxPage = 8;

    function processPrev() {
        if (currentPage != 2) {
            currentPage--;
            $_Id('frm1702RT:btnNext').disabled = false;
            $('#Page' + currentPage + 'Content').show('blind');
            $('#Page' + (currentPage + 1) + 'Content').hide('blind');
            document.getElementById('frm1702RT:txtCurrentPage').value = currentPage;
            document.getElementById('frm1702RT:txtMaxPage').value = MaxPage;
        }
        else {
            currentPage--;
            $_Id('frm1702RT:btnNext').disabled = false;
            $_Id('frm1702RT:btnPrev').disabled = true;
            $('#Page' + currentPage + 'Content').show('blind');
            $('#Page' + (currentPage + 1) + 'Content').hide('blind');
            document.getElementById('frm1702RT:txtCurrentPage').value = currentPage;
            document.getElementById('frm1702RT:txtMaxPage').value = MaxPage;
        }
    }

    function processNext() {
        if (currentPage != 7) {
            currentPage++;
            $_Id('frm1702RT:btnPrev').disabled = false;
            $('#Page' + currentPage + 'Content').show('blind');
            $('#Page' + (currentPage - 1) + 'Content').hide('blind');
            document.getElementById('frm1702RT:txtCurrentPage').value = currentPage;
            document.getElementById('frm1702RT:txtMaxPage').value = MaxPage;
        }
        else {
            currentPage++;
            $_Id('frm1702RT:btnNext').disabled = true;
            $_Id('frm1702RT:btnPrev').disabled = false;
            $('#Page' + currentPage + 'Content').show('blind');
            $('#Page' + (currentPage - 1) + 'Content').hide('blind');
            document.getElementById('frm1702RT:txtCurrentPage').value = currentPage;
            document.getElementById('frm1702RT:txtMaxPage').value = MaxPage;
        }
    }

    function goToPage() {
        var newVal = $_Id("frm1702RT:txtCurrentPage").value;
        var printType = !isFromPrint ? "Page" : "Print";

        if (newVal != currentPage) {
            if (newVal == "0") {
                $_Id("frm1702RT:txtCurrentPage").value = currentPage;
            }
            else if (newVal > 0 && newVal < 9) {
                if (newVal == 1) {
                    $_Id('frm1702RT:btnPrev').disabled = true;
                    $_Id('frm1702RT:btnNext').disabled = false;
                }
                if (newVal == 8) {
                    $_Id('frm1702RT:btnNext').disabled = true;
                    $_Id('frm1702RT:btnPrev').disabled = false;
                }
                if (newVal >= 2 && newVal <= 7) {
                    $_Id('frm1702RT:btnNext').disabled = false;
                    $_Id('frm1702RT:btnPrev').disabled = false;
                }
                $('#' + printType + currentPage + 'Content').hide('blind');
                $('#' + printType + newVal + 'Content').show('blind');
                currentPage = document.getElementById("frm1702RT:txtCurrentPage").value;
            }
        }

        if (isFromPrint) {
            printOCR();
        }
    }
    var form = $('#frmMain');
    var isAmendedReturn = false; //new
    var isNewEntry = false; //new

    var isSubmitFinal = false;
    var isSubmit = false;

    var gIsReadOnly = false;
    var fileName = ""
    var existingXMLFileName = ""
    var fileNameToExport = ""

    var savedReturn = ""
    var p3Compromise = ""
    var p3Surcharge = ""
    var p3Interest = ""
    var p3IsAmended = ""
    var p3FilingDate = ""
    var p3ReturnPeriod = ""
    var p3ReturnPeriodEnd = ""

    var p3BasicTax = ""
    var p3TotalPenalties = ""
    var p3TotalAmountPayable = ""
    var p3GrossSales = "";

    var p3TPTIN1 = ""
    var p3TPTIN2 = ""
    var p3TPTIN3 = ""
    var p3TPTIN = ""
    var p3TPBranchCode = ""
    var p3TPRDOCode = ""
    var p3TPLineBus = ""
    var p3TPName = ""
    var p3TPTelNum = ""
    var p3TPAddress = ""
    var p3TPZip = ""

     /*----------------------------------*/
    var d = document, XMLBGFile = '', data = '', XMLFile = '', XMLATCFile = '', msg = document.getElementById('msg');
    var loader = document.getElementById('loader');
    /*----------------------------------*/

    setTimeout("sleeptime()", 200);

    function redirectToSchedule() {
        if (confirm("Schedules need to be filled up before Part II, IV and V can have values. Do you want to fill up the Schedules first? (Clicking on 'OK' will redirect you to Schedule 1)") === true) {
            $_Id("frm1702RT:txtCurrentPage").value = 3;
            goToPage();
        }
    }
    var globalEmail = "";
    function sleeptime() {
        init();

        var xmlFileName = document.getElementById('file_name').value;        
        fileName = xmlFileName;

        if (fileName != null && fileName.indexOf('.xml') > -1) {
            var tin = fileName.split("/")[1].split("-");
            loadXML(fileName);
            validatePg1Pt2I22(true);
            existingXMLFileName = fileName;

            if (gIsReadOnly) {
                window.setTimeout("disableAllElementIDs(); document.getElementById('btnUpload').disabled = false; document.getElementById('btnPrint').disabled = false;document.getElementById('frm1702RT:btnPrev').disabled = false; document.getElementById('frm1702RT:btnNext').disabled = false; document.getElementById('frm1702RT:txtCurrentPage').disabled = false;", 1000);
            }
        } else {
            window.setTimeout("$('#loader').hide('blind');", 200);

            isNewEntry = true;

        }
        if ($('#printMenu').css('display') != 'none') {
            $('#printMenu').hide('blind');
        }

        //check enable/disable from parent screen for Name,address,contact,line of business...
        if ($_Id('frm1702RT:txtPg1Pt1I9Name').value == '') {
            $_Id('frm1702RT:txtPg1Pt1I9Name').disabled = false;
        }
        if ($_Id('frm1702RT:txtPg1Pt1I10Address').value == '') {
            $_Id('frm1702RT:txtPg1Pt1I10Address').disabled = false;
        }
        if ($_Id('frm1702RT:txtPg1Pt1I11Contact').value == '') {
            $_Id('frm1702RT:txtPg1Pt1I11Contact').disabled = false;
        }
        if ($_Id('frm1702RT:txtPg1Pt1I13Business').value == '') {
            $_Id('frm1702RT:txtPg1Pt1I13Business').disabled = false;
        }
        if ($_Id('frm1702RT:txtPg1Pt1I7RDO').value != 0) {
            $_Id('frm1702RT:drpPg1Pt1I7RDOCode').value = $_Id('frm1702RT:txtPg1Pt1I7RDO').value;
            $_Id('frm1702RT:drpPg1Pt1I7RDOCode').disabled = true;
        }
        if ($_Id('frm1702RT:rdoPg1I5AtcOther').checked == true) {
            $_Id('frm1702RT:drpPg1I5AtcOther').disabled = false;
        }
        else {
            $_Id('frm1702RT:drpPg1I5AtcOther').disabled = true;
        }
        //NOLCO Field
        if ($_Id('frm1702RT:txtPg5Sc6AI4C2').value != 0) {
        }

        //set date for P1I2 when no Year End is loaded
        if ($_Id('frm1702RT:txtPg1I2Year').value == '') {
            var taxableYear = new Date().getFullYear();
            $_Id('frm1702RT:txtPg1I2Year').value = (taxableYear - 2000) - 1;
        }

        //enable MCIT
        if ($_Id('frm1702RT:rdoPg1I5Atc').checked == true) {
            enableMCITFields();
        }

        //Set disable/enable for Pg1I2
        if ($_Id('frm1702RT:rdoPg1I1Calendar').checked == true) {
            $_Id('frm1702RT:ddlPg1I2Month').disabled = true;
        }

        //methodOfDeduction
        if ($_Id('frm1702RT:rdoPg1Pt1I15OptionalStandard').checked == true) {
            $_Id('frm1702RT:rdoPg1Pt1I15ItemizedDeduction').checked = false;
        }
        else {
            $_Id('frm1702RT:rdoPg1Pt1I15ItemizedDeduction').checked = true;
        }

        //check overPayment
        if (NumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg1Pt2I20TotalAmount').value)) < 0) {
            enableField('rdoPg1Pt2I21OverpaymentRefunded,rdoPg1Pt2I21OverpaymentIssued,rdoPg1Pt2I21OverpaymentCarried');
        }
        else if (NumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg1Pt2I20TotalAmount').value)) >= 0) {
            $_Id('frm1702RT:rdoPg1Pt2I21OverpaymentRefunded').checked = false;
            $_Id('frm1702RT:rdoPg1Pt2I21OverpaymentIssued').checked = false;
            $_Id('frm1702RT:rdoPg1Pt2I21OverpaymentCarried').checked = false;
            disableField('rdoPg1Pt2I21OverpaymentRefunded,rdoPg1Pt2I21OverpaymentIssued,rdoPg1Pt2I21OverpaymentCarried');
        }

        //check Page 7 Sc11
        if ($_Id('frm1702RT:chkPg7Sc11Stockholders').checked == true || $_Id('frm1702RT:chkPg7Sc11Members').checked == true) {
            tickStockholdersMembers();
            checkNullPg7Sc11I6toI20Enable();
        }
        if ($_Id('frm1702RT:chkPg7Sc11Partners').checked == true) {
            tickPartners();
            checkNullPg7Sc11I6toI20Enable();
        }

        //save row after loading modal items
        var rowPg4Sc3I3 = document.getElementById('btnPg4Sc3I3More').parentNode.parentNode;
        var rowPg4Sc4I4 = document.getElementById('btnPg4Sc4I4More').parentNode.parentNode;
        var rowPg5Sc4I39 = document.getElementById('btnPg5Sc4I39More').parentNode.parentNode;
        var rowPg5Sc5I4 = document.getElementById('btnPg5Sc5I4More').parentNode.parentNode;
        var rowPg5Sc6AI7 = document.getElementById('btnPg5Sc6AI7More').parentNode.parentNode;
        var rowPg6Sc7I11 = document.getElementById('btnPg6Sc7I11More').parentNode.parentNode;
        var rowPg6Sc9I3 = document.getElementById('btnPg6Sc9I3More').parentNode.parentNode;
        var rowPg6Sc9I6 = document.getElementById('btnPg6Sc9I6More').parentNode.parentNode;
        var rowPg6Sc9I8 = document.getElementById('btnPg6Sc9I8More').parentNode.parentNode;
        var rowPg8Sc12I4 = document.getElementById('btnPg8Sc12I4More').parentNode.parentNode;
        saveXMLRowModalTable("frm1702RT:txtPg4Sc3I3ModalTable", 3, "containertxtPg4Sc3I3", rowPg4Sc3I3);
        saveXMLRowModalTable("frm1702RT:txtPg4Sc4I4ModalTable", 3, "containertxtPg4Sc4I4", rowPg4Sc4I4);
        saveXMLRowModalTable("frm1702RT:txtPg5Sc4I39ModalTable", 3, "containertxtPg5Sc4I39", rowPg5Sc4I39);
        saveXMLRowModalTable("frm1702RT:txtPg5Sc5I4ModalTable", 4, "containertxtPg5Sc5I4", rowPg5Sc5I4);
        saveXMLRowModalTable("frm1702RT:txtPg5Sc6AI7ModalTable", 4, "containertxtPg5Sc6AI7", rowPg5Sc6AI7);
        saveXMLRowModalTable("frm1702RT:txtPg6Sc7I11ModalTable", 3, "containertxtPg6Sc7I11", rowPg6Sc7I11);
        saveXMLRowModalTable("frm1702RT:txtPg6Sc9I3ModalTable", 3, "containertxtPg6Sc9I3", rowPg6Sc9I3);
        saveXMLRowModalTable("frm1702RT:txtPg6Sc9I6ModalTable", 3, "containertxtPg6Sc9I6", rowPg6Sc9I6);
        saveXMLRowModalTable("frm1702RT:txtPg6Sc9I8ModalTable", 3, "containertxtPg6Sc9I8", rowPg6Sc9I8);
        saveXMLRowModalTable("frm1702RT:txtPg8Sc12I4ModalTable", "frm1702RT:txtPg8Sc12I4", "containertxtPg8Sc12I4", rowPg8Sc12I4);
        Save_modalDivPg8Sc12II();
        Save_modalDivPg8Sc12III();
        Save_modalDivPg8Sc12IV();
        Save_modalDivPg8Sc13I();
        Save_modalDivPg8Sc13II();

        //enable more for columns upon loading
        checkPg8Sc12Pt2C1();
        checkPg8Sc12Pt2C2();
        checkPg8Sc12Pt3C1();
        checkPg8Sc12Pt3C2();
        checkPg8Sc12Pt4C1();
        checkPg8Sc12Pt4C2();
        checkPg8Sc13Pt1C1();
        checkPg8Sc13Pt1C2();
        checkPg8Sc13Pt2C1();
        checkPg8Sc13Pt2C2();

        $('input[maxlength="12"]').each(function () {
            this.value = addCommas(NegativeValue(this.value));
        })
        $('input[maxlength="15"]').each(function () {
            this.value = addCommas(NegativeValue(this.value));
        })

        //disbale ctrl+V/v
        $(document).ready(function () {
            $('input').bind('paste', function (event) {
                event.preventDefault();
            });
        });

        enableFieldOnLoad();

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
    }

    function loadData() {
    	var response = d.getElementById("response");
    	var modalCounter = document.getElementById('modalCounter').getElementsByTagName('input');
        var counter = 0;

        for (var i = 0; i < modalCounter.length; i++) {
            if ((response.innerHTML).indexOf(modalCounter[i].id) != -1 && i == 0) {
                counter = (response.innerHTML).split(modalCounter[i].id + "=")[1];
                if (counter > 0) {
                    document.getElementById('btnPg4Sc3I3More').disabled = false;
                    document.getElementById('frm1702RT:txtPg4Sc3I3C1').disabled = true;
                    document.getElementById('frm1702RT:txtPg4Sc3I3C2').disabled = true;
                    var row = document.getElementById('btnPg4Sc3I3More').parentNode.parentNode;
                    for (var k = 0; k < counter; k++) {
                        addXMLRowModalTable("frm1702RT:txtPg4Sc3I3ModalTable", 3, "3", row, "frm1702RT:txtPg4Sc3I3");
                    }
                }
            }
            if ((response.innerHTML).indexOf(modalCounter[i].id) != -1 && i == 1) {
                counter = (response.innerHTML).split(modalCounter[i].id + "=")[1];
                if (counter > 0) {
                    document.getElementById('btnPg4Sc4I4More').disabled = false;
                    document.getElementById('frm1702RT:txtPg4Sc4I4C1').disabled = true;
                    document.getElementById('frm1702RT:txtPg4Sc4I4C2').disabled = true;
                    var row = document.getElementById('btnPg4Sc4I4More').parentNode.parentNode;
                    for (var k = 0; k < counter; k++) {
                        addXMLRowModalTable("frm1702RT:txtPg4Sc4I4ModalTable", 3, "4", row, "frm1702RT:txtPg4Sc4I4");
                    }
                }
            }
            if ((response.innerHTML).indexOf(modalCounter[i].id) != -1 && i == 2) {
                counter = (response.innerHTML).split(modalCounter[i].id + "=")[1];
                if (counter > 0) {
                    document.getElementById('btnPg5Sc4I39More').disabled = false;
                    document.getElementById('frm1702RT:txtPg5Sc4I39C1').disabled = true;
                    document.getElementById('frm1702RT:txtPg5Sc4I39C2').disabled = true;

                    var row = document.getElementById('btnPg5Sc4I39More').parentNode.parentNode;
                    for (var k = 0; k < counter; k++) {
                        addXMLRowModalTable("frm1702RT:txtPg5Sc4I39ModalTable", 3, "39", row, "frm1702RT:txtPg5Sc4I39");
                    }
                }
            }
            if ((response.innerHTML).indexOf(modalCounter[i].id) != -1 && i == 3) {
                counter = (response.innerHTML).split(modalCounter[i].id + "=")[1];
                if (counter > 0) {
                    document.getElementById('btnPg5Sc5I4More').disabled = false;
                    document.getElementById('frm1702RT:txtPg5Sc5I4C1').disabled = true;
                    document.getElementById('frm1702RT:txtPg5Sc5I4C2').disabled = true;
                    document.getElementById('frm1702RT:txtPg5Sc5I4C3').disabled = true;

                    var row = document.getElementById('btnPg5Sc5I4More').parentNode.parentNode;
                    for (var k = 0; k < counter; k++) {
                        addXMLRowModalTable("frm1702RT:txtPg5Sc5I4ModalTable", 4, "4", row, "frm1702RT:txtPg5Sc5I4");
                    }
                }
            }
            if ((response.innerHTML).indexOf(modalCounter[i].id) != -1 && i == 4) {
                counter = (response.innerHTML).split(modalCounter[i].id + "=")[1];
                if (counter > 0) {
                    document.getElementById('btnPg5Sc6AI7More').disabled = false;
                    document.getElementById('frm1702RT:txtPg5Sc6AI7C1').disabled = true;
                    document.getElementById('frm1702RT:txtPg5Sc6AI7C2').disabled = true;
                    document.getElementById('frm1702RT:txtPg5Sc6AI7C3').disabled = true;
                    document.getElementById('frm1702RT:txtPg5Sc6AI7C4').disabled = true;
                    document.getElementById('frm1702RT:txtPg5Sc6AI7C5').disabled = true;

                    var row = document.getElementById('btnPg5Sc6AI7More').parentNode.parentNode;
                    for (var k = 0; k < counter; k++) {
                        addXMLRowModalTable("frm1702RT:txtPg5Sc6AI7ModalTable", 4, "7", row, "frm1702RT:txtPg5Sc6AI7");
                    }
                }
            }
            if ((response.innerHTML).indexOf(modalCounter[i].id) != -1 && i == 5) {
                counter = (response.innerHTML).split(modalCounter[i].id + "=")[1];
                if (counter > 0) {
                    document.getElementById('btnPg6Sc7I11More').disabled = false;
                    document.getElementById('frm1702RT:txtPg6Sc7I11C1').disabled = true;
                    document.getElementById('frm1702RT:txtPg6Sc7I11C2').disabled = true;
                    var row = document.getElementById('btnPg6Sc7I11More').parentNode.parentNode;
                    for (var k = 0; k < counter; k++) {
                        addXMLRowModalTable("frm1702RT:txtPg6Sc7I11ModalTable", 3, "11", row, "frm1702RT:txtPg6Sc7I11");
                    }
                }
            }
            if ((response.innerHTML).indexOf(modalCounter[i].id) != -1 && i == 6) {
                counter = (response.innerHTML).split(modalCounter[i].id + "=")[1];
                if (counter > 0) {
                    document.getElementById('btnPg6Sc9I3More').disabled = false;
                    document.getElementById('frm1702RT:txtPg6Sc9I3C1').disabled = true;
                    document.getElementById('frm1702RT:txtPg6Sc9I3C2').disabled = true;
                    var row = document.getElementById('btnPg6Sc9I3More').parentNode.parentNode;
                    for (var k = 0; k < counter; k++) {
                        addXMLRowModalTable("frm1702RT:txtPg6Sc9I3ModalTable", 3, "3", row, "frm1702RT:txtPg6Sc9I3");
                    }
                }
            }
            if ((response.innerHTML).indexOf(modalCounter[i].id) != -1 && i == 7) {
                counter = (response.innerHTML).split(modalCounter[i].id + "=")[1];
                if (counter > 0) {
                    document.getElementById('btnPg6Sc9I6More').disabled = false;
                    document.getElementById('frm1702RT:txtPg6Sc9I6C1').disabled = true;
                    document.getElementById('frm1702RT:txtPg6Sc9I6C2').disabled = true;
                    var row = document.getElementById('btnPg6Sc9I6More').parentNode.parentNode;
                    for (var k = 0; k < counter; k++) {
                        addXMLRowModalTable("frm1702RT:txtPg6Sc9I6ModalTable", 3, "6", row, "frm1702RT:txtPg6Sc9I6");
                    }
                }
            }
            if ((response.innerHTML).indexOf(modalCounter[i].id) != -1 && i == 8) {
                counter = (response.innerHTML).split(modalCounter[i].id + "=")[1];
                if (counter > 0) {
                    document.getElementById('btnPg6Sc9I8More').disabled = false;
                    document.getElementById('frm1702RT:txtPg6Sc9I8C1').disabled = true;
                    document.getElementById('frm1702RT:txtPg6Sc9I8C2').disabled = true;
                    var row = document.getElementById('btnPg6Sc9I8More').parentNode.parentNode;
                    for (var k = 0; k < counter; k++) {
                        addXMLRowModalTable("frm1702RT:txtPg6Sc9I8ModalTable", 3, "8", row, "frm1702RT:txtPg6Sc9I8");
                    }
                }
            }
            if ((response.innerHTML).indexOf(modalCounter[i].id) != -1 && i == 9) {
                counter = (response.innerHTML).split(modalCounter[i].id + "=")[1];
                if (counter > 0) {
                    var row = document.getElementById('btnPg8Sc12I4More').parentNode.parentNode;
                    for (var k = 0; k < counter; k++) {
                        addXMLRowModalTable("frm1702RT:txtPg8Sc12I4ModalTable", "frm1702RT:txtPg8Sc12I4", "4", row, "frm1702RT:txtPg8Sc12I4");
                    }
                }
            }
            if ((response.innerHTML).indexOf(modalCounter[i].id) != -1 && i == 10) {
                counter = (response.innerHTML).split(modalCounter[i].id + "=")[1];
                for (var k = 0; k < counter; k++) {
                    AddRow_modalTablePg8Sc12II();
                }
            }
            else if ((response.innerHTML).indexOf(modalCounter[i].id) != -1 && i == 11) {
                counter = (response.innerHTML).split(modalCounter[i].id + "=")[1];
                for (var k = 0; k < counter; k++) {
                    AddRow_modalTablePg8Sc12III();
                }
            }
            else if ((response.innerHTML).indexOf(modalCounter[i].id) != -1 && i == 12) {
                counter = (response.innerHTML).split(modalCounter[i].id + "=")[1];
                for (var k = 0; k < counter; k++) {
                    AddRow_modalTablePg8Sc12IV();
                }
            }
            else if ((response.innerHTML).indexOf(modalCounter[i].id) != -1 && i == 13) {
                counter = (response.innerHTML).split(modalCounter[i].id + "=")[1];
                for (var k = 0; k < counter; k++) {
                    AddRow_modalTablePg8Sc13I();
                }
            }
            else if ((response.innerHTML).indexOf(modalCounter[i].id) != -1 && i == 14) {
                counter = (response.innerHTML).split(modalCounter[i].id + "=")[1];
                for (var k = 0; k < counter; k++) {
                    AddRow_modalTablePg8Sc13II();
                }
            }
        }

    	var elem = document.getElementById('frmMain').elements;
    	for(var i = 0; i < elem.length; i++)
    	{
    		if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {	//elem[i].type != 'button' &&  			
                if (elem[i].type == 'text' || elem[i].type == 'select-one') {
                    var fieldVal = String($("#response").html()).split(elem[i].id + '=');
                    if (elem[i].id == 'frm1702RT:txtPg1Pt1I9Name' || elem[i].id == 'frm1702RT:txtPg1Pt1I13Business' || elem[i].id == 'frm1702RT:txtPg1Pt1I10Address') {
                        elem[i].value = unescape(fieldVal[1]);
                    }
                    if (elem[i].id == 'frm1702RT:ddlPg1I2Month' || elem[i].id == 'frm1702RT:ddlPg8Sc12I10C1'
	                    || elem[i].id == 'frm1702RT:ddlPg8Sc12I10C2') {
                        elem[i].selectedIndex = fieldVal[1];
                    }
                    if (elem[i].id == 'frm1702RT:txtPg1Pt2I17TotalTaxCredits') {
                        fieldVal = (fieldVal[1] == undefined) ? String($("#response").html()).split('frm1702RT:txtPg1Pt2I17LessTotalTax=') : fieldVal;
                        elem[i].value = unescape(fieldVal[1]);
                    }

                    else if (elem[i].className.indexOf("FinalFlag") > -1) {
                        elem[i].value = typeof (fieldVal[1]) === "undefined" ? "3" : fieldVal[1];
                    }
                    else {
                        elem[i].value = unescape(fieldVal[1]); //all select-one and text values		 		
                    }
                }
                if (elem[i].type == 'radio') {
                    var rdoVal = String($("#response").html()).split(elem[i].id + '=');
                    if (rdoVal[1] == 'true') {
                        elem[i].checked = rdoVal[1];
                        //elem[i].onclick(); dgarfin: commented since it hinders the rest of the elements to load its values 
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
    	setValuePage3Sched11Item8();
    }

    function setValuePage3Sched11Item8() {
        var fieldVal = String($("#response").html()).split('ffrm1702RT:txtPg7Sc11I8C1=');
        var notValidRow8 = (d.getElementById("frm1702RT:txtPg7Sc11I8Tin1").value == "" || d.getElementById("frm1702RT:txtPg7Sc11I8Tin2").value == "" ||
            d.getElementById("frm1702RT:txtPg7Sc11I8Tin3").value == "" || d.getElementById("frm1702RT:txtPg7Sc11I8Tin4").value == "" ||
            d.getElementById("frm1702RT:txtPg7Sc11I8C3").value == "" || d.getElementById("frm1702RT:txtPg7Sc11I8C4").value == "");

        fieldVal = (typeof (fieldVal[1]) === "undefined") ? String($("#response").html()).split('frm1702RT:txtPg7Sc11I8C1=') : fieldVal;
        //fieldVal = (notValidRow8 && fieldVal[1] == "f") ? String($("#response").html()).split('ffrm1702RT:txtPg7Sc11I8C1=') : fieldVal;
        document.getElementById('frm1702RT:txtPg7Sc11I8C1').value = unescape(fieldVal[1]);
    }

    function init() {

        $_Id('frm1702RT:cmdEdit').disabled = true;
        $_Id('frm1702RT:btnFinalCopy').disabled = true;
        $_Id('btnUpload').disabled = true;
        $_Id('btnPrint').disabled = true;

    }

    function disableField(params) {
        var array = params.split(',');
        for (var i = 0; i < array.length; i++) {
            $_Id('frm1702RT:' + array[i]).disabled = true;
        }
    }

    function enableField(params) {
        var array = params.split(',');
        for (var i = 0; i < array.length; i++) {
            $_Id('frm1702RT:' + array[i]).disabled = false;
        }
    }
    function setValuePage3Sched11Item8() {
        var fieldVal = String($("#response").html()).split('ffrm1702RT:txtPg7Sc11I8C1=');
        var notValidRow8 = (d.getElementById("frm1702RT:txtPg7Sc11I8Tin1").value == "" || d.getElementById("frm1702RT:txtPg7Sc11I8Tin2").value == "" ||
            d.getElementById("frm1702RT:txtPg7Sc11I8Tin3").value == "" || d.getElementById("frm1702RT:txtPg7Sc11I8Tin4").value == "" ||
            d.getElementById("frm1702RT:txtPg7Sc11I8C3").value == "" || d.getElementById("frm1702RT:txtPg7Sc11I8C4").value == "");

        fieldVal = (typeof (fieldVal[1]) === "undefined") ? String($("#response").html()).split('frm1702RT:txtPg7Sc11I8C1=') : fieldVal;
        //fieldVal = (notValidRow8 && fieldVal[1] == "f") ? String($("#response").html()).split('ffrm1702RT:txtPg7Sc11I8C1=') : fieldVal;
        document.getElementById('frm1702RT:txtPg7Sc11I8C1').value = unescape(fieldVal[1]);
    }

    function validate() {
        //Page 1 Item 1
        if ($_Id('frm1702RT:rdoPg1I1Calendar').checked == false && $_Id('frm1702RT:rdoPg1I1Fiscal').checked == false) {
            alert('Please select if you are filing for Calendar or Fiscal year on Page 1 Item 1');
            $_Id("frm1702RT:txtCurrentPage").value = 1;
            goToPage();
            return;
        }
        //Page 1 Item 2
        if ($_Id('frm1702RT:ddlPg1I2Month').value == 0 || $_Id('frm1702RT:txtPg1I2Year').value == 0) {
            alert('Please provide a valid Year Ended on Page 1 Item 2');
            $_Id("frm1702RT:txtCurrentPage").value = 1;
            goToPage();
            return;
        }
        //Page 1 Item 7
        if ($_Id('frm1702RT:drpPg1Pt1I7RDOCode').value == 0) {
            alert('Please select a RDO code on Page 1 Part 1 Item 7');
            $_Id("frm1702RT:txtCurrentPage").value = 1;
            goToPage();
            return;
        }
        //Page 1 Item 8
        if ($_Id('frm1702RT:txtPg1Pt1I8').value == '') {
            alert('Please provide a valid Date of Incorporation/Organization on Page 1 Part I Item 8');
            $_Id("frm1702RT:txtCurrentPage").value = 1;
            goToPage();
            return;
        }
        //Page 1 Item 9
        if ($_Id('frm1702RT:txtPg1Pt1I9Name').value == '') {
            alert('Please provide a Registered Name on Page 1 Part I Item 9');
            $_Id("frm1702RT:txtCurrentPage").value = 1;
            goToPage();
            return;
        }
        //Page 1 Item 10
        if ($_Id('frm1702RT:txtPg1Pt1I10Address').value == '') {
            alert('Please provide a Registered Address on Page 1 Part I Item 10');
            $_Id("frm1702RT:txtCurrentPage").value = 1;
            goToPage();
            return;
        }
        //Page 1 Item 11
        if ($_Id('frm1702RT:txtPg1Pt1I11Contact').value == '') {
            alert('Please provide a valid Contact Number on Page 1 Part I Item 11');
            $_Id("frm1702RT:txtCurrentPage").value = 1;
            goToPage();
            return;
        }
        //Page 1 Item 12
        if ($_Id('frm1702RT:txtPg1Pt1I12Email').value == '') {
            alert('Please provide a valid Email Address on Page 1 Part I Item 12');
            $_Id("frm1702RT:txtCurrentPage").value = 1;
            goToPage();
            return;
        }
        //Page 1 Item 13
        if ($_Id('frm1702RT:txtPg1Pt1I13Business').value == '') {
            alert('Please provide a Main Line of Business on Page 1 Part I Item 13');
            $_Id("frm1702RT:txtCurrentPage").value = 1;
            goToPage();
            return;
        }
        //Page 1 Item 14
        if ($_Id('frm1702RT:txtPg1Pt1I14PSIC').value == '') {
            alert('Please provide a PSIC code on Page 1 Part I Item 14');
            $_Id("frm1702RT:txtCurrentPage").value = 1;
            goToPage();
            return;
        }
        //Page 1 Item 15
        if ($_Id('frm1702RT:rdoPg1Pt1I15ItemizedDeduction').checked == false && $_Id('frm1702RT:rdoPg1Pt1I15OptionalStandard').checked == false) {
            alert('Please select a Method of Deduction on Page 1 Part I Item 15');
            $_Id("frm1702RT:txtCurrentPage").value = 1;
            goToPage();
            return;
        }
        //Page 1 Item 21
        if (NumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg1Pt2I20TotalAmount').value)) < 0) {
            if ($_Id('frm1702RT:rdoPg1Pt2I21OverpaymentRefunded').checked == false && $_Id('frm1702RT:rdoPg1Pt2I21OverpaymentIssued').checked == false && $_Id('frm1702RT:rdoPg1Pt2I21OverpaymentCarried').checked == false) {
                alert('Please select an option for Overpayment on Page 1 Part II Item 21');
                $_Id("frm1702RT:txtCurrentPage").value = 1;
                goToPage();
                return;
            }
        }
        //Page 1 Item 22
        if ($_Id('frm1702RT:rdoPg1Pt2I22CTC').checked == false && $_Id('frm1702RT:rdoPg1Pt2I22SEC').checked == false) {
            alert('Please select an item (CTC or SEC Reg. No.) on Page 1 Part II Item 22');
            $_Id("frm1702RT:txtCurrentPage").value = 1;
            goToPage();
            return;
        }
        if ($_Id('frm1702RT:txtPg1Pt2I22CTC').value == '') {
            alert('Please provide a CTC on Page 1 Part II Item 22');
            $_Id("frm1702RT:txtCurrentPage").value = 1;
            goToPage();
            return;
        }
        //Page 1 Item 23
        if ($_Id('frm1702RT:txtPg1Pt2I23Date').value == '') {
            alert('Please provide a Date of Issue on Page 1 Part II Item 23');
            $_Id("frm1702RT:txtCurrentPage").value = 1;
            goToPage();
            return;
        }
        //Page 1 Item 24
        if ($_Id('frm1702RT:txtPg1Pt2I24PlaceOfIssue').value == '') {
            alert('Please provide a Place of Issue on Page 1 Part II Item 24');
            $_Id("frm1702RT:txtCurrentPage").value = 1;
            goToPage();
            return;
        }
        //Page 1 Item 25
        if ($_Id('frm1702RT:rdoPg1Pt2I22CTC').checked == true) {
            if ($_Id('frm1702RT:txtPg1Pt2I25AmountCTC').value == 0) {
                alert('Amount for Community Tax Certificate(CTC) No. cannot be zero on Page 1 Part II Item 25');
                $_Id("frm1702RT:txtCurrentPage").value = 1;
                goToPage();
                return;
            }
        }
        //Page 1 Part 3 Item 26
        if (validate_nullDescription('txtPg1Pt3I26DebitMemoC4Amount', 'txtPg1Pt3I26DebitMemoC1,txtPg1Pt3I26DebitMemoC2,txtPg1Pt3I26DebitMemoC3Date', 'Page 1 Part III Item 26') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 1;
            goToPage();
            return;
        }
        //Page 1 Part 3 Item 27
        if (validate_nullDescription('txtPg1Pt3I27CheckC4Amount', 'txtPg1Pt3I27CheckC1,txtPg1Pt3I27CheckC2,txtPg1Pt3I27CheckC3Date', 'Page 1 Part III Item 27') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 1;
            goToPage();
            return;
        }
        //Page 1 Part 3 Item 28
        if (validate_nullDescription('txtPg1Pt3I28TaxDebitC4Amount', 'txtPg1Pt3I28TaxDebitC2,txtPg1Pt3I28TaxDebitDate', 'Page 1 Part III Item 28') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 1;
            goToPage();
            return;
        }
        //Page 1 Part 3 Item 29
        if (validate_nullDescription('txtPg1Pt3I29OthersC4Amount', 'txtPg1Pt3I29Others,txtPg1Pt3I29OthersC1,txtPg1Pt3I29OthersC2,txtPg1Pt3I29OthersC3Date', 'Page 1 Part III Item 29') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 1;
            goToPage();
            return;
        }
        //Page 1 Amount Fields sum should be equal to Total Amount Payable if there is an amount
        if ((NumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg1Pt3I26DebitMemoC4Amount').value)) + NumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg1Pt3I27CheckC4Amount').value)) + NumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg1Pt3I28TaxDebitC4Amount').value)) + NumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg1Pt3I29OthersC4Amount').value))) != 0) {
            if ((NumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg1Pt3I26DebitMemoC4Amount').value)) + NumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg1Pt3I27CheckC4Amount').value)) + NumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg1Pt3I28TaxDebitC4Amount').value)) + NumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg1Pt3I29OthersC4Amount').value))) != NumWithComma(NumWithParenthesis($_Id('frm1702RT:txtPg1Pt2I20TotalAmount').value))) {
                alert('Sum of Amount fields in Details of Payment (Page 1 Part III) Segment must be equal to TOTAL AMOUNT PAYABLE');
                $_Id("frm1702RT:txtCurrentPage").value = 1;
                goToPage();
                return;
            }
        }
        //bug #1641

        //Bug #2617
        //Bug #2633
        if ((NumWithComma(NumWithParenthesis($_Id("frm1702RT:txtPg3Sc1I4Total").value)) > 600000) && (($_Id("frm1702RT:rdoPg1I5AtcOther").checked === false) || (($_Id("frm1702RT:rdoPg1I5AtcOther").checked === true) && ($_Id("frm1702RT:drpPg1I5AtcOther").value !== "IC040" && $_Id("frm1702RT:drpPg1I5AtcOther").value !== "IC041")))) {
            if ($_Id('frm1702RT:txtPg2Pt6I55Name').value == '' && $_Id('frm1702RT:txtPg2Pt6I57Name').value == '') {
                alert('Please provide at least one name in Page 2 Part IV Item 55 and/or Item 57');
                $_Id("frm1702RT:txtCurrentPage").value = 2;
                goToPage();
                return;
            }

            //Page 2 Item 59
            if (($_Id('frm1702RT:txtPg2Pt6I59BIR1').value.length + $_Id('frm1702RT:txtPg2Pt6I59BIR2').value.length + $_Id('frm1702RT:txtPg2Pt6I59BIR3').value.length + $_Id('frm1702RT:txtPg2Pt6I59BIR4').value.length) == 0) {
                alert('Please fill up BIR Accreditation No. on Page 2 Part VI Item 59');
                $_Id("frm1702RT:txtCurrentPage").value = 2;
                goToPage();
                return;
            }

            //Page 2 Item 60 & 61
            if ($_Id('frm1702RT:txtPg2Pt6I60IssueDate').value == '') {
                alert('Please provide an Issue Date on Page 2 Part VI Item 60');
                $_Id("frm1702RT:txtCurrentPage").value = 2;
                goToPage();
                return;
            }
            if ($_Id('frm1702RT:txtPg2Pt6I61ExpiryDate').value == '') {
                alert('Please provide an Expiry Date on Page 2 Part VI Item 61');
                $_Id("frm1702RT:txtCurrentPage").value = 2;
                goToPage();
                return;
            }
        }

        if (($_Id('frm1702RT:txtPg2Pt6I56TIN1').value.length + $_Id('frm1702RT:txtPg2Pt6I56TIN2').value.length + $_Id('frm1702RT:txtPg2Pt6I56TIN3').value.length + $_Id('frm1702RT:txtPg2Pt6I56TIN4').value.length) != 0 && ($_Id('frm1702RT:txtPg2Pt6I56TIN1').value.length + $_Id('frm1702RT:txtPg2Pt6I56TIN2').value.length + $_Id('frm1702RT:txtPg2Pt6I56TIN3').value.length + $_Id('frm1702RT:txtPg2Pt6I56TIN4').value.length) != 12) {
            alert('Please provide a valid TIN on Page 2 Part VI Item 56');
            $_Id("frm1702RT:txtCurrentPage").value = 2;
            goToPage();
            return;
        }

        //Page 2 Item 58
        if (($_Id('frm1702RT:txtPg2Pt6I58TIN1').value.length + $_Id('frm1702RT:txtPg2Pt6I58TIN2').value.length + $_Id('frm1702RT:txtPg2Pt6I58TIN3').value.length + $_Id('frm1702RT:txtPg2Pt6I58TIN4').value.length) != 0 && ($_Id('frm1702RT:txtPg2Pt6I58TIN1').value.length + $_Id('frm1702RT:txtPg2Pt6I58TIN2').value.length + $_Id('frm1702RT:txtPg2Pt6I58TIN3').value.length + $_Id('frm1702RT:txtPg2Pt6I58TIN4').value.length) != 12) {
            alert('Please provide a valid TIN on Page 2 Part VI Item 58');
            $_Id("frm1702RT:txtCurrentPage").value = 2;
            goToPage();
            return;
        }

        //Page2 Item 55
        if ($_Id('frm1702RT:txtPg2Pt6I56TIN1').value != '' && $_Id('frm1702RT:txtPg2Pt6I56TIN2').value != '' && $_Id('frm1702RT:txtPg2Pt6I56TIN3').value != '' && $_Id('frm1702RT:txtPg2Pt6I56TIN4').value != '' && $_Id('frm1702RT:txtPg2Pt6I55Name').value == '') {
            alert('Please fill up a name for External Auditor on Page 2 Part VI Item 55');
            $_Id("frm1702RT:txtCurrentPage").value = 2;
            goToPage();
            return;
        }
        else if (($_Id('frm1702RT:txtPg2Pt6I56TIN1').value.length + $_Id('frm1702RT:txtPg2Pt6I56TIN2').value.length + $_Id('frm1702RT:txtPg2Pt6I56TIN3').value.length + $_Id('frm1702RT:txtPg2Pt6I56TIN4').value.length) == 0 && ($_Id('frm1702RT:txtPg2Pt6I56TIN1').value.length + $_Id('frm1702RT:txtPg2Pt6I56TIN2').value.length + $_Id('frm1702RT:txtPg2Pt6I56TIN3').value.length + $_Id('frm1702RT:txtPg2Pt6I56TIN4').value.length) != 12 && $_Id('frm1702RT:txtPg2Pt6I55Name').value != '') {
            alert('Please provide a valid TIN on Page 2 Part VI Item 56');
            $_Id("frm1702RT:txtCurrentPage").value = 2;
            goToPage();
            return;
        }

        //Page2 Item 57
        if ($_Id('frm1702RT:txtPg2Pt6I58TIN1').value != '' && $_Id('frm1702RT:txtPg2Pt6I58TIN2').value != '' && $_Id('frm1702RT:txtPg2Pt6I58TIN3').value != '' && $_Id('frm1702RT:txtPg2Pt6I58TIN4').value != '' && $_Id('frm1702RT:txtPg2Pt6I57Name').value == '') {
            alert('Please fill up a name for Signing Partner on Page 2 Part VI Item 57');
            $_Id("frm1702RT:txtCurrentPage").value = 2;
            goToPage();
            return;
        }
        else if (($_Id('frm1702RT:txtPg2Pt6I58TIN1').value.length + $_Id('frm1702RT:txtPg2Pt6I58TIN2').value.length + $_Id('frm1702RT:txtPg2Pt6I58TIN3').value.length + $_Id('frm1702RT:txtPg2Pt6I58TIN4').value.length) == 0 && ($_Id('frm1702RT:txtPg2Pt6I58TIN1').value.length + $_Id('frm1702RT:txtPg2Pt6I58TIN2').value.length + $_Id('frm1702RT:txtPg2Pt6I58TIN3').value.length + $_Id('frm1702RT:txtPg2Pt6I58TIN4').value.length) != 12 && $_Id('frm1702RT:txtPg2Pt6I57Name').value != '') {
            alert('Please provide a valid TIN on Page 2 Part VI Item 58');
            $_Id("frm1702RT:txtCurrentPage").value = 2;
            goToPage();
            return;
        }

        //Page 2 Item 59
        if (($_Id('frm1702RT:txtPg2Pt6I59BIR1').value.length + $_Id('frm1702RT:txtPg2Pt6I59BIR2').value.length + $_Id('frm1702RT:txtPg2Pt6I59BIR3').value.length + $_Id('frm1702RT:txtPg2Pt6I59BIR4').value.length) != 15 && ($_Id('frm1702RT:txtPg2Pt6I59BIR1').value.length + $_Id('frm1702RT:txtPg2Pt6I59BIR2').value.length + $_Id('frm1702RT:txtPg2Pt6I59BIR3').value.length + $_Id('frm1702RT:txtPg2Pt6I59BIR4').value.length) != 0) {
            alert('Please provide a valid BIR Accreditation No. on Page 2 Part VI Item 59');
            $_Id("frm1702RT:txtCurrentPage").value = 2;
            goToPage();
            return;
        }

        //Page 4 Schedule 3 Item 1
        if (validate_nullDescription('txtPg4Sc3I1OtherTaxAmount', 'txtPg4Sc3I1OtherTaxIncome', 'Page 4 Schedule 3 Item 1') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 4;
            goToPage();
            return;
        }
        //Page 4 Schedule 3 Item 2
        if (validate_nullDescription('txtPg4Sc3I2OtherTaxAmount', 'txtPg4Sc3I2OtherTaxIncome', 'Page 4 Schedule 3 Item 2') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 4;
            goToPage();
            return;
        }
        //Page 4 Schedule 3 Item 3
        if (validate_nullDescription('txtPg4Sc3I3C2', 'txtPg4Sc3I3C1', 'Page 4 Schedule 3 Item 3') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 4;
            goToPage();
            return;
        }
        //Page 4 Schedule 4 Item 2
        if (validate_nullDescription('txtPg4Sc4I2AmortizationAmount', 'txtPg4Sc4I2Amortization', 'Page 4 Schedule 4 Item 2') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 4;
            goToPage();
            return;
        }
        //Page 4 Schedule 4 Item 3
        if (validate_nullDescription('txtPg4Sc4I3AmortizationAmount', 'txtPg4Sc4I3Amortization', 'Page 4 Schedule 4 Item 3') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 4;
            goToPage();
            return;
        }
        //Page 4 Schedule 4 Item 4
        if (validate_nullDescription('txtPg4Sc4I4C2', 'txtPg4Sc4I4C1', 'Page 4 Schedule 4 Item 4') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 4;
            goToPage();
            return;
        }
        //Page 5 Schedule 4 Item 36
        if (validate_nullDescription('txtPg5Sc4I36C2', 'txtPg5Sc4I36C1', 'Page 5 Schedule 4 Item 36') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 5;
            goToPage();
            return;
        }
        //Page 5 Schedule 4 Item 37
        if (validate_nullDescription('txtPg5Sc4I37C2', 'txtPg5Sc4I37C1', 'Page 5 Schedule 4 Item 37') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 5;
            goToPage();
            return;
        }
        //Page 5 Schedule 4 Item 38
        if (validate_nullDescription('txtPg5Sc4I38C2', 'txtPg5Sc4I38C1', 'Page 5 Schedule 4 Item 38') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 5;
            goToPage();
            return;
        }
        //Page 5 Schedule 4 Item 39
        if (validate_nullDescription('txtPg5Sc4I39C2', 'txtPg5Sc4I39C1', 'Page 5 Schedule 4 Item 39') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 5;
            goToPage();
            return;
        }
        //Page 5 Schedule 5 Item 1
        if (validate_nullDescription('txtPg5Sc5I1C3', 'txtPg5Sc5I1C1,txtPg5Sc5I1C2', 'Page 5 Schedule 5 Item 1') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 5;
            goToPage();
            return;
        }
        //Page 5 Schedule 5 Item 2
        if (validate_nullDescription('txtPg5Sc5I2C3', 'txtPg5Sc5I2C1,txtPg5Sc5I2C2', 'Page 5 Schedule 5 Item 2') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 5;
            goToPage();
            return;
        }
        //Page 5 Schedule 5 Item 3
        if (validate_nullDescription('txtPg5Sc5I3C3', 'txtPg5Sc5I3C1,txtPg5Sc5I3C2', 'Page 5 Schedule 5 Item 3') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 5;
            goToPage();
            return;
        }
        //Page 5 Schedule 5 Item 4
        if (validate_nullDescription('txtPg5Sc5I4C3', 'txtPg5Sc5I4C1,txtPg5Sc5I4C2', 'Page 5 Schedule 5 Item 4') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 5;
            goToPage();
            return;
        }
        //Page 5 Schedule 6A Item 4 Year Incurred
        if (validate_nullDescription('txtPg5Sc6AI4C2', 'txtPg5Sc6AI4C1', 'Page 5 Schedule 6A Item 4') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 5;
            goToPage();
            return;
        }
        //Page 5 Schedule 6A Item 5 Year Incurred
        if (validate_nullDescription('txtPg5Sc6AI5C2', 'txtPg5Sc6AI5C1', 'Page 5 Schedule 6A Item 5') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 5;
            goToPage();
            return;
        }
        //Page 5 Schedule 6A Item 6 Year Incurred
        if (validate_nullDescription('txtPg5Sc6AI6C2', 'txtPg5Sc6AI6C1', 'Page 5 Schedule 6A Item 6') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 5;
            goToPage();
            return;
        }
        //Page 5 Schedule 6A Item 7 Year Incurred
        if (validate_nullDescription('txtPg5Sc6AI7C2', 'txtPg5Sc6AI7C1', 'Page 5 Schedule 6A Item 7') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 5;
            goToPage();
            return;
        }
        //Page 6 Schedule 7 Item 10
        if (validate_nullDescription('txtPg5Sc7I10C2', 'txtPg6Sc7I10C1', 'Page 6 Schedule 7 Item 10') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 6;
            goToPage();
            return;
        }
        //Page 6 Schedule 7 Item 11
        if (validate_nullDescription('txtPg6Sc7I11C2', 'txtPg6Sc7I11C1', 'Page 6 Schedule 7 Item 11') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 6;
            goToPage();
            return;
        }
        //Page 6 Schedule 9 Item 2
        if (validate_nullDescription('txtPg6Sc9I2C2', 'txtPg6Sc9I2C1', 'Page 6 Schedule 9 Item 2') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 6;
            goToPage();
            return;
        }
        //Page 6 Schedule 9 Item 3
        if (validate_nullDescription('txtPg6Sc9I3C2', 'txtPg6Sc9I3C1', 'Page 6 Schedule 9 Item 3') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 6;
            goToPage();
            return;
        }
        //Page 6 Schedule 9 Item 5
        if (validate_nullDescription('txtPg6Sc9I5C2', 'txtPg6Sc9I5C1', 'Page 6 Schedule 9 Item 5') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 6;
            goToPage();
            return;
        }
        //Page 6 Schedule 9 Item 6
        if (validate_nullDescription('txtPg6Sc9I6C2', 'txtPg6Sc9I6C1', 'Page 6 Schedule 9 Item 6') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 6;
            goToPage();
            return;
        }
        //Page 6 Schedule 9 Item 7
        if (validate_nullDescription('txtPg6Sc9I7C2', 'txtPg6Sc9I7C1', 'Page 6 Schedule 9 Item 7') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 6;
            goToPage();
            return;
        }
        //Page 6 Schedule 9 Item 8
        if (validate_nullDescription('txtPg6Sc9I8C2', 'txtPg6Sc9I8C1', 'Page 6 Schedule 9 Item 8') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 6;
            goToPage();
            return;
        }
        //Bug #2473
        if (removeCommaParenthesis($_Id('frm1702RT:txtPg2Pt4I40NetTaxable').value) != removeCommaParenthesis($_Id('frm1702RT:txtPg6Sc9I10NetTaxableIncome').value)) {
            alert("Page 6 Schedule 9 Item 10 Net Taxable Income (Loss) should be equal to Page 2 Part IV Item 40 Net Taxable Income");
            $_Id("frm1702RT:txtCurrentPage").value = 6;
            goToPage();
            return;
        }
        //Bug #2472
        if ($_Id('frm1702RT:rdoPg1Pt1I15ItemizedDeduction').checked == true) {
            if (removeCommaParenthesis($_Id('frm1702RT:txtPg7Sc10I7TotalAssets').value) <= 0 || removeCommaParenthesis($_Id('frm1702RT:txtPg7Sc10I17TotalLiabilitiesEquity').value) <= 0) {
                alert("Page 7 Schedule 10 Balance Sheet Item 7 and Item 17 should be greater than zero");
                $_Id("frm1702RT:txtCurrentPage").value = 7;
                goToPage();
                return;
            }
        }
        //Page7 Item 7 and 17
        if ($_Id('frm1702RT:txtPg7Sc10I7TotalAssets').value != $_Id('frm1702RT:txtPg7Sc10I17TotalLiabilitiesEquity').value) {
            alert('Page 7 Schedule 10 Item 7 and 17: Total Assets should be equal to Total Liabilities and Equity.');
            $_Id('frm1702RT:txtCurrentPage').value = 7;
            goToPage();
            window.scrollTo(0, 0);
            $_Id('frm1702RT:txtPg7Sc10I1CurrentAssets').focus();
            return;
        }
        //check if one is marked for Xboxes in Schedule 11
        if ($_Id('frm1702RT:chkPg7Sc11Stockholders').checked == false && $_Id('frm1702RT:chkPg7Sc11Partners').checked == false && $_Id('frm1702RT:chkPg7Sc11Members').checked == false) {
            alert('Kindly select an item among Stockholders, Partners and Members Information for Page 7 Schedule 11');
            $_Id("frm1702RT:txtCurrentPage").value = 7;
            goToPage();
            return;
        }
        //if partners is ticked require at least 2
        if ($_Id('frm1702RT:chkPg7Sc11Partners').checked == true) {
            if (countValidRowsPg7Sc11() == false) {
                alert('Please provide at least 2 Registered Name with TIN where Capital Contribution and Total Percent must be greater than zero on Page 7 Schedule 11');
                $_Id("frm1702RT:txtCurrentPage").value = 7;
                goToPage();
                return;
            }
        }
        //if stockholder or member is ticked require at least 5
        //As of 10/08/2015 HD2014-1246020 : If the TP selects “Member”, system should accept zero (0) in ‘Capital Contribution’
        if ($_Id('frm1702RT:chkPg7Sc11Stockholders').checked == true || $_Id('frm1702RT:chkPg7Sc11Members').checked == true) {
            if (countValidRowsPg7Sc11() == false) {
                var msg = $_Id('frm1702RT:chkPg7Sc11Members').checked == false ? "where Capital Contribution and Total Percent must be greater than zero " : "";
                msg = "Please provide at least one Registered Name with TIN " + msg + "on Page 7 Schedule 11";

                alert(msg);
                $_Id("frm1702RT:txtCurrentPage").value = 7;
                goToPage();
                return;
            }
        }
        //check if there are 5 items in Schedule 11
        if (checkNullP7Sc11I6toI20() === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 7;
            goToPage();
            return;
        }
        //Page 8 Column Checking
        //Page 8 column checking
        if (validate_nullDescriptionColumns('txtPg8Sc12I5C1,txtPg8Sc12I6C1,txtPg8Sc12I7C1', 'txtPg8Sc12I8C1,txtPg8Sc12I9C1', 'Page 8 Schedule 12 Part II Column A') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 8;
            goToPage();
            return;
        }

        if (validate_nullDescriptionColumns('txtPg8Sc12I5C2,txtPg8Sc12I6C2,txtPg8Sc12I7C2', 'txtPg8Sc12I8C2,txtPg8Sc12I9C2', 'Page 8 Schedule 12 Part II Column B') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 8;
            goToPage();
            return;
        }

        if (validate_nullDescriptionColumns('txtPg8Sc12I10C1,txtPg8Sc12I11C1,txtPg8Sc12I13C1Date', 'txtPg8Sc12I12C1,txtPg8Sc12I14C1,txtPg8Sc12I15C1', 'Page 8 Schedule 12 Part III Column A') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 8;
            goToPage();
            return;
        }

        if (validate_nullDescriptionColumns('txtPg8Sc12I10C2,txtPg8Sc12I11C2,txtPg8Sc12I13C2Date', 'txtPg8Sc12I12C2,txtPg8Sc12I14C2,txtPg8Sc12I15C2', 'Page 8 Schedule 12 Part III Column B') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 8;
            goToPage();
            return;
        }

        if (validate_nullDescriptionColumns('txtPg8Sc12I16C1', 'txtPg8Sc12I17C1,txtPg8Sc12I18C1', 'Page 8 Schedule 12 Part IV Column A') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 8;
            goToPage();
            return;
        }

        if (validate_nullDescriptionColumns('txtPg8Sc12I16C2', 'txtPg8Sc12I17C2,txtPg8Sc12I18C2', 'Page 8 Schedule 12 Part IV Column B') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 8;
            goToPage();
            return;
        }

        if (validate_nullDescriptionColumns('txtPg8Sc13I2C1,txtPg8Sc13I3C1,txtPg8Sc13I4C1', 'txtPg8Sc13I5C1', 'Page 8 Schedule 13 Part I Column A') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 8;
            goToPage();
            return;
        }

        if (validate_nullDescriptionColumns('txtPg8Sc13I2C2,txtPg8Sc13I3C2,txtPg8Sc13I4C2', 'txtPg8Sc13I5C2', 'Page 8 Schedule 13 Part I Column B') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 8;
            goToPage();
            return;
        }

        if (validate_nullDescriptionColumns('txtPg8Sc13I6C1', 'txtPg8Sc13I7C1', 'Page 8 Schedule 13 Part II Column A') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 8;
            goToPage();
            return;
        }

        if (validate_nullDescriptionColumns('txtPg8Sc13I6C2', 'txtPg8Sc13I7C2', 'Page 8 Schedule 13 Part II Column B') === false) {
            $_Id("frm1702RT:txtCurrentPage").value = 8;
            goToPage();
            return;
        }
        else {
            alert("Validation successful. Click on Edit if you wish to modify your entries.");
            $_Id('frm1702RT:cmdValidate').disabled = true;
            $_Id('frm1702RT:cmdEdit').disabled = false;
            $_Id('btnUpload').disabled = false;
            $_Id('frm1702RT:btnFinalCopy').disabled = false;

            disableAllControl();
            $('input[value="(Add more...)"]').attr("disabled", false);
            return;
        }
    }

    function initialValidateBeforeSave() {
        var isValid = true;
        var errorList = [];

        // RDO Code
        if ($_Id('frm1702RT:drpPg1Pt1I7RDOCode').value === '000') {
            errorList.push('Please select an RDO Code (Part I Item 7).');
        }
        // Registered Name
        if ($_Id('frm1702RT:txtPg1Pt1I9Name').value === '') {
            errorList.push('Please provide a Registered Name (Part I Item 9).');
        }
        // Registered Address
        if ($_Id('frm1702RT:txtPg1Pt1I10Address').value === '') {
            errorList.push('Please provide a Registered Address (Part I Item 10).');
        }
        // Contact Number
        if ($_Id('frm1702RT:txtPg1Pt1I11Contact').value === '') {
            errorList.push('Please provide a Contact Number (Part I Item 11).');
        }
        // Email Address
        if ($_Id('frm1702RT:txtPg1Pt1I12Email').value === '') {
            errorList.push('Please provide an Email Address (Part I Item 12).');
        }
        // Main Line of Business
        if ($_Id('frm1702RT:txtPg1Pt1I13Business').value === '') {
            errorList.push('Please provide a Main Line of Business (Part I Item 13).');
        }
        // PSIC code
        if ($_Id('frm1702RT:txtPg1Pt1I14PSIC').value === '') {
            errorList.push('Please provide PSIC code (Part I Item 14).');
        }

        if (errorList.length > 0) {
            isValid = false;
            alert(errorList[0]);
        }
        else {
            $_Id('frm1702RT:txtCurrentPage').value = 1;
        }
        //validation here
        //return true to save
        return isValid;
    }

    function getDisabledText() {
        //$("input:disabled").addClass("disabledInputs");
        $("input:disabled,textarea:disabled,select:disabled,button:disabled", $("#containerPage")).addClass("disabledInputs");
        $("input:disabled,textarea:disabled,select:disabled,button:disabled", $("#modalContainer")).addClass("disabledInputs");
        $("input:radio,input:checkbox").prop("class", "styled");
    }

    var disableElem = true;
    var enableElem = false;

    var disabledIDs = [];
    var loopCounter = -1;

    function disableAllControl() {

        getDisabledText();


        $("input,textarea,select,button", $("#containerPage")).attr("disabled", true);
        $("input,textarea,select,button", $("#modalContainer")).attr("disabled", true);
        $("input:radio,input:checkbox", $("#containerPage")).prop("disabled", true);

        $_Id('frm1702RT:cmdValidate').disabled = true;
        $_Id('frm1702RT:cmdEdit').disabled = false;
        $_Id('frm1702RT:btnFinalCopy').disabled = false;
        $_Id('btnUpload').disabled = false;
        $_Id('btnPrint').disabled = false;
        $_Id('mnuPrint').disabled = false;

        if (currentPage == 1) {
            d.getElementById('frm1702RT:btnPrev').disabled = true;
        }
        else if (currentPage == 8) {
            d.getElementById('frm1702RT:btnNext').disabled = true;
        }
        else {
            d.getElementById('frm1702RT:btnPrev').disabled = false;
            d.getElementById('frm1702RT:btnNext').disabled = false;
        }

        disableElem;
        enableElem;
    }

    function enableAllControl() {
       
        $("input,textarea,select,button", $("#containerPage")).attr("disabled", false);
        $("input,textarea,select,button", $("#modalContainer")).attr("disabled", false);
        $(".disabledInputs").attr("disabled", true);
        $("input:radio,input:checkbox", $("#containerPage")).prop("disabled", false);
        $("input:radio,input:checkbox", $("#containerPage")).prop("class", "styled");

        $_Id('frm1702RT:cmdValidate').disabled = false;
        $_Id('frm1702RT:cmdEdit').disabled = true;
        $_Id('frm1702RT:btnFinalCopy').disabled = true;
        $_Id('btnUpload').disabled = true;
        $_Id('btnPrint').disabled = true;
        $_Id('mnuPrint').disabled = true;

        if (currentPage == 1) {
            d.getElementById('frm1702RT:btnPrev').disabled = true;
        }
        else if (currentPage == 8) {
            d.getElementById('frm1702RT:btnNext').disabled = true;
        }
        else {
            d.getElementById('frm1702RT:btnPrev').disabled = false;
            d.getElementById('frm1702RT:btnNext').disabled = false;
        }

        if ($_Id('frm1702RT:rdoPg1I5AtcOther').checked == true) {
            $_Id('frm1702RT:drpPg1I5AtcOther').disabled = false;
        }

        disableElem;
        enableElem;

        checkNullPg7Sc11I6toI20Enable();
        checkPg8Sc12Pt2C1();
        checkPg8Sc12Pt2C2();
        checkPg8Sc12Pt3C1();
        checkPg8Sc12Pt3C2();
        checkPg8Sc12Pt4C1();
        checkPg8Sc12Pt4C2();
        checkPg8Sc13Pt1C1();
        checkPg8Sc13Pt1C2();
        checkPg8Sc13Pt2C1();
        checkPg8Sc13Pt2C2();

        enableFieldOnLoad();
        computeP2Pt4I51();
        checkDateOfIncorporation(true);
        //to refresh Xbox look
       
    }

    function $_Id(id) {
        return document.getElementById(id);
    }

    function $_Name(name) {
        return document.getElementsByName(name);
    }
    function saveData()
    {
        var valid = initialValidateBeforeSave();
        if(valid == true){
                var form = $('#frmMain');
                var disabled = form.find(':input:disabled').removeAttr('disabled');
             	
             	var serializedData = form.serializeArray();
             	var query_str = "";
             	$.each(serializedData, function(i,data){
	                if($.trim(data['value'])){
	                    query_str += (query_str == '') ?  data['name'] + '=' + data['value'].replace('(', '-').replace(')', '') : '&' + data['name'] + '=' + data['value'].replace('(', '-').replace(')', '');
	                }
	            });
                save('1702RT',query_str);
                
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
        
        var serializedData = form.serializeArray();
        var query_str = "";
        $.each(serializedData, function(i,data){
	        if($.trim(data['value'])){
	            query_str += (query_str == '') ?  data['name'] + '=' + data['value'].replace('(', '-').replace(')', '') : '&' + data['name'] + '=' + data['value'].replace('(', '-').replace(')', '');
	        }
	    });

        saveAndExit('1702RT',query_str);
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

        var company_id = $('#frmMain').find('input[name="company"]').val();

        var serializedData = form.serializeArray();
        var query_str = "";
        $.each(serializedData, function(i,data){
	        if($.trim(data['value'])){
	            query_str += (query_str == '') ?  data['name'] + '=' + data['value'].replace('(', '-').replace(')', '') : '&' + data['name'] + '=' + data['value'].replace('(', '-').replace(')', '');
	        }
	    });

        submitAndSave('1702RT', query_str, company_id);
        
        disabled.attr('disabled','disabled');
        return false;
    }

    function gotoMain(){
        var company_id = $('#frmMain').find('input[name="company"]').val();
        window.location = '/companies/'+ company_id +'/histories/1702RT';
    }

</script>
@endsection
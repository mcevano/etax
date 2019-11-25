@extends('layouts.app')
@section('title', '| BIR Form No. 0605')
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
                    <button type="button" class="btn btn-danger btn-exit" id="0605" company='{{$company->id}}'>No</button>
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
                    <button type="button" class="btn btn-success btn-exit" id="0605" company='{{$company->id}}'>Okay</button>
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
                        <button type="button" class="btn btn-danger btn-filing-success" form='0605' company='{{$company->id}}'>Okay</button>
                    </div>
                </div>
              </div>
            </div>

            
    <form id="frmMain" name="frmMain">
        @csrf
        <input type="hidden" name="company" value="{{ $company->id}}">
        <input type="hidden" name="form_no" value="{{ $action == 'new' ? $form_no : $data->form_no }}">
        <input type="hidden" name="form_id" value="{{ $action == 'new' ? '' : $data->id }}">
        <div id="container">
            <div id="wrapper" style="margin: 0 auto; position: relative; width: 836px; ">
                <div id="formPaper">
                    <div id="Content">
                        <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                    <table width="836" border="0" cellspacing="0" cellpadding="0" style="height:0px;">
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
                                                
                                                    <font size="5px" style="font-weight:bold;">Payment Form</font>
                                                
                                            </td>
                                            
                                            <td width="145" valign="center">
                                                
                                                <label face="Arial" size="1px">BIR Form No.<br/></label><br>
                                                <font face="Arial" size="6px">0605<br/></font>
                                                <label face="Arial" size="1px">September 2003(ENCS)</label>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="830" border="0" cellpadding="0" cellspacing="0"  class="tblForm">
                                        <tr>
                                            <td width="217" height="0px" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="15"><font size="2" style="font-weight:bold">&nbsp;1&nbsp;</font></td>
                                                        <td width="176"><font size="1" style="font-size: 11px;">For the&nbsp;
                                                                @if($action == 'new')
                                                                    <input style="vertical-align: middle;" id="frm0605:itemFiscalStartMonth:_1" name="frm0605:itemFiscalStartMonth" type="radio" value="C" onclick="dateyear()" />
                                                                    Calendar&nbsp;
                                                                    <input style="vertical-align: middle;" id="frm0605:itemFiscalStartMonth:_2" name="frm0605:itemFiscalStartMonth" type="radio" value="F" onclick="dateyear()" />
                                                                    Fiscal
                                                                @else
                                                                    <input style="vertical-align: middle;" {{$data->item1 == 'C' ? 'checked' : ''}} id="frm0605:itemFiscalStartMonth:_1" name="frm0605:itemFiscalStartMonth" type="radio" value="C" onclick="dateyear()" />
                                                                    Calendar&nbsp;
                                                                    <input style="vertical-align: middle;" {{$data->item1 == 'F' ? 'checked' : ''}} id="frm0605:itemFiscalStartMonth:_2" name="frm0605:itemFiscalStartMonth" type="radio" value="F" onclick="dateyear()" />
                                                                    Fiscal
                                                                @endif

                                                                
                                                            </font></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="197" rowspan="2" valign="top" class="tblFormTd">
                                                <table style="height:0px">
                                                    <tr>
                                                        <td width="173" height="0px"><table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="15"><font size="2" style="font-weight:bold">&nbsp;3&nbsp;</font></td>
                                                                    <td width="176"><font size="1" style="font-size: 11px;">Quarter</font></td>
                                                                </tr>
                                                            </table></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="0px"><table width="151" border="0" cellpadding="0" cellspacing="0" class="iceSelOneRb">
                                                                <tr>
                                                                @if($action == 'new')
                                                                    <td style="font-size:11px; "><input style="vertical-align: middle;" id="itemQuarter_1" name="itemQuarter" type="radio" value="1"  />
                                                                        1st</td>
                                                                    <td style="font-size:11px; "><input style="vertical-align: middle;" id="itemQuarter_2" name="itemQuarter"  type="radio" value="2"  />
                                                                        2nd</td>
                                                                    <td style="font-size:11px; "><input style="vertical-align: middle;" id="itemQuarter_3" name="itemQuarter" type="radio" value="3"  />
                                                                        3rd</td>
                                                                    <td style="font-size:11px; "> <input style="vertical-align: middle;" id="itemQuarter_4" name="itemQuarter"  type="radio" value="4"  />
                                                                        4th</td></tr>
                                                                @else
                                                                    <td style="font-size:11px; "><input {{$data->item3 == '1' ? 'checked' : ''}} style="vertical-align: middle;" id="itemQuarter_1" name="itemQuarter" type="radio" value="1"  />
                                                                        1st</td>
                                                                    <td style="font-size:11px; "><input {{$data->item3 == '2' ? 'checked' : ''}} style="vertical-align: middle;" id="itemQuarter_2" name="itemQuarter"  type="radio" value="2"  />
                                                                        2nd</td>
                                                                    <td style="font-size:11px; "><input {{$data->item3 == '3' ? 'checked' : ''}} style="vertical-align: middle;" id="itemQuarter_3" name="itemQuarter" type="radio" value="3"  />
                                                                        3rd</td>
                                                                    <td style="font-size:11px; "> <input {{$data->item3 == '4' ? 'checked' : ''}} style="vertical-align: middle;" id="itemQuarter_4" name="itemQuarter"  type="radio" value="4"  />
                                                                        4th</td></tr>
                                                                @endif
                                                                    
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <span class="normal">
                                                    <label class="fieldNumber1 iceOutLbl" id="frm0605:j_id149"></label>
                                                </span>
                                            </td>
                                            <td width="171" rowspan="2" valign="top" class="tblFormTd">
                                                <table style="height:0px">
                                                    <tr>
                                                        <td width="150" height="0px"><table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="15"><font size="2" style="font-weight:bold">&nbsp;4&nbsp;</font></td>
                                                                    <td width="176"><font size="1" style="font-size: 11px;">Due Date (MM/DD/YYYY) </font></td>
                                                                </tr>
                                                            </table></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="0px">

                                                            <input id="frm0605:txtDueDateMonth"  name="frm0605:txtDueDateMonth" maxlength="2"  size="2" style="text-align: right" type="text" value="{{$action != 'new' ? $data->item4A : ''}}" onkeypress="return wholenumber(this, event)" />
                                                            <input id="frm0605:txtDueDateDay"  name="frm0605:txtDueDateDay" maxlength="2"  size="2" style="text-align: right" type="text" value="{{$action != 'new' ? $data->item4B : ''}}" onkeypress="return wholenumber(this, event)" />
                                                            <input id="frm0605:txtDueDateYear" name="frm0605:txtDueDateYear" maxlength="4"  size="3" style="text-align: right" type="text" value="{{$action != 'new' ? $data->item4C : ''}}" onkeypress="return wholenumber(this, event)" />
                                                        </td>
                                                    </tr>
                                                </table></td>
                                            <td width="167" rowspan="2" valign="top" class="tblFormTd">
                                                <table>
                                                    <tr>
                                                        <td height="0px"><table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="15"><font size="2" style="font-weight:bold">&nbsp;5&nbsp;</font></td>
                                                                    <td width="176"><font size="1" style="font-size: 11px;">No. of Sheets Attached </font></td>
                                                                </tr>
                                                            </table></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input  id="frm0605:txtNoOfSheets" maxlength="2" name="frm0605:txtNoOfSheets" size="4" style="text-align:right" onkeypress="return wholenumber(this, event)" type="text" value="{{$action != 'new' ? $data->item5 : '0'}}" /></td>
                                                    </tr>
                                                </table>
                                                <p class="normal">&nbsp;                                                             </p></td>
                                            <td width="78" rowspan="2" valign="top" class="tblFormTd">
                                                <table>
                                                    <tr>
                                                        <td width="64" height="0px"><table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="15"><font size="2" style="font-weight:bold">&nbsp;6&nbsp;</font></td>
                                                                    <td width="176"><font size="1"></font><a href="#" id='btnATC' onclick="showATCDiv()">ATC</a></td>
                                                                </tr>
                                                            </table></td>
                                                    </tr>
                                                    <tr>
                                                        <td><span class="top">

                                                                <input type='text' id='txtATCCode' name="txtATCCode" value="{{$action != 'new' ? $data->item6 : ''}}" size="8" />
                                                            </span></td>
                                                    </tr>
                                                </table>
                                                <label class="iceOutLbl fieldLabel1"></label></td>
                                        </tr>
                                        <tr>
                                            <td height="0px" valign="top" class="tblFormTd"><table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="15"><font size="2" style="font-weight:bold">&nbsp;2&nbsp;</font></td>
                                                        <td width="176"><font size="1" style="font-size: 11px;">Year Ended (MM/YYYY)
                                                            </font></td>
                                                    </tr>
                                                </table>
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold">&nbsp;&nbsp;</font></td>
                                                        <td width="180"><span class="top">
                                                                <select class="iceSelOneMnu" id="frm0605:itemYearEndMonth" name="frm0605:itemYearEndMonth" size="1" onblur="datemonth()" >
                                                                    
                                                                    @if($action == 'new')
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
                                                                    @else
                                                                        <option value="00" {{ $data->item2A == '00' ? 'selected' : ''}}></option>
                                                                        <option value="01" {{ $data->item2A == '01' ? 'selected' : ''}} >01 - January</option>
                                                                        <option value="02" {{ $data->item2A == '02' ? 'selected' : ''}} >02 - February</option>
                                                                        <option value="03" {{ $data->item2A == '03' ? 'selected' : ''}} >03 - March</option>
                                                                        <option value="04" {{ $data->item2A == '04' ? 'selected' : ''}} >04 - April</option>
                                                                        <option value="05" {{ $data->item2A == '05' ? 'selected' : ''}} >05 - May</option>
                                                                        <option value="06" {{ $data->item2A == '06' ? 'selected' : ''}} >06 - June</option>
                                                                        <option value="07" {{ $data->item2A == '07' ? 'selected' : ''}} >07 - July</option>
                                                                        <option value="08" {{ $data->item2A == '08' ? 'selected' : ''}} >08 - August</option>
                                                                        <option value="09" {{ $data->item2A == '09' ? 'selected' : ''}} >09 - September</option>
                                                                        <option value="10" {{ $data->item2A == '10' ? 'selected' : ''}} >10 - October</option>
                                                                        <option value="11" {{ $data->item2A == '11' ? 'selected' : ''}} >11 - November</option>
                                                                        <option value="12" {{ $data->item2A == '12' ? 'selected' : ''}} >12 - December</option>
                                                                    @endif
                                                                </select>
                                                                <input id="frm0605:txtYearEnded" value="{{$action != 'new' ? $data->item2B : ''}}" name="frm0605:txtYearEnded" maxlength="4"size="4" style="text-align: right" type="text" onkeypress="return wholenumber(this, event)" />
                                                            </span></td>
                                                    </tr>
                                                </table>
                                                <span class="top">  </span>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="830" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="370" class="tblFormTd">
                                                <table width="385" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="15"><font size="2" style="font-weight:bold">&nbsp;7&nbsp;</font></td>
                                                        <td width="159"><font size="1" style="font-size: 11px;">Return Period (MM / DD / YYYY) </font></td>
                                                        <td width="212"><span class="normal">
                                                                <input class="iceInpTxt input" id="frm0605:txtReturnPeriodMonth" maxlength="2" name="frm0605:txtReturnPeriodMonth" size="4" style="text-align:right;margin-right: 5px;" type="text" value="{{$action != 'new' ? $data->item7A : ''}}" onkeypress="return wholenumber(this, event)" />
                                                            </span><span class="normal">
                                                                <input class="iceInpTxt input" id="frm0605:txtReturnPeriodDay" maxlength="2" name="frm0605:txtReturnPeriodDay" size="4" style="text-align:right;margin-right: 5px;" type="text" value="{{$action != 'new' ? $data->item7B : ''}}" onkeypress="return wholenumber(this, event)" />
                                                            </span><span class="normal">
                                                                <input class="iceInpTxt input" id="frm0605:txtReturnPeriodYear" maxlength="4" name="frm0605:txtReturnPeriodYear"  size="6" style="text-align:right;margin-right: 5px;" type="text" value="{{$action != 'new' ? $data->item7C : ''}}" onkeypress="return wholenumber(this, event)" />
                                                            </span></td>
                                                    </tr>
                                                </table></td>
                                            <td width="370" class="tblFormTd">
                                                <table width="285" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="15"><font size="2" style="font-weight:bold">&nbsp;8&nbsp;</font></td>
                                                        <td width="50" ><font size="1" ></font><a href="#" id="btnTaxType" onclick="showTaxTypeCodeDiv()" style="font-size: 11px;">Tax Type</a> </td>
                                                        <td width="100"><input id='txtTaxTypeCode' name="txtTaxTypeCode" type="text" size='15' value="{{$action != 'new' ? $data->item8 : ''}}" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="tblFormTdPart">
                                                <table width="825" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="164">&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;">Part I</font></td>
                                                        <td width="659">
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
                                    <table width="830" border="0" cellpadding="0" cellspacing="0" class="tblForm">
                                        <tr>
                                            <td valign="top" class="tblFormTd"><table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="15"><font size="2" style="font-weight:bold">&nbsp;9&nbsp;</font></td>
                                                        <td width="196"><font size="1" style="font-size: 11px;">Taxpayer Identification No. </font></td>
                                                    </tr>
                                                </table></td>
                                            <td valign="top" class="tblFormTd"><table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="22"><font size="2" style="font-weight:bold">&nbsp;10&nbsp;</font></td>
                                                        <td width="75"><font size="1" style="font-size: 11px;">RDO Code </font></td>
                                                    </tr>
                                                </table></td>
                                            <td valign="top" class="tblFormTd">
                                                <table width="140" style="height: 0px" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="15"><font size="2" style="font-weight:bold">&nbsp;11&nbsp;</font></td>
                                                        <td width="176"><font size="1" style="font-size: 11px;">Taxpayer Classification </font></td>
                                                    </tr>
                                                </table></td>
                                            <td valign="top" class="tblFormTd"><table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="15"><font size="2" style="font-weight:bold">&nbsp;12&nbsp;</font></td>
                                                        <td width="140"><font size="1" style="font-size: 11px;">Line of Business/Occupation</font></td>
                                                    </tr>
                                                </table></td>
                                        <tr><td width="218" valign="top" class="tblFormTd"><table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="15"><font size="2" style="font-weight:bold">&nbsp;&nbsp;</font></td>
                                                        <td width="213"><input id="frm0605:txtTIN1" size='2' maxlength="3" name="frm0605:txtTIN1"  type="text" value="{{$company->tin1}}" onkeypress="return wholenumber(this, event)" />
                                                            <input id="frm0605:txtTIN2" name="frm0605:txtTIN2" size="2" maxlength="3"  type="text" value="{{$company->tin2}}" onkeypress="return wholenumber(this, event)" />
                                                            <input id="frm0605:txtTIN3" name="frm0605:txtTIN3" size="2" maxlength="3"  type="text" value="{{$company->tin3}}" onkeypress="return wholenumber(this, event)" />
                                                            <input id="frm0605:txtBranchCode" name="frm0605:txtBranchCode" size="2" maxlength="3"  type="text" value="{{$company->tin4}}" onkeypress="return letternumber(event)" /></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="148" valign="top" class="tblFormTd"><table width="69" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="15"><font size="2" style="font-weight:bold">&nbsp;&nbsp;</font></td>
                                                        <td width="170" id="rdoSelect">
                                                            <select class="iceSelOneMnu" id="frm0605:txtRDOCode" name="frm0605:txtRDOCode" size="1" disabled>
                                                                <option>{{$company->rdo_code}}</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </table></td>
                                            <td width="238" valign="top" class="tblFormTd"><table width="143" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="14"><font size="2" style="font-weight:bold">&nbsp;&nbsp;</font></td>
                                                        <td width="35"><input style="vertical-align: middle;" {{ $action == 'new' ? '' : ($data->item11 == 'I' ? 'checked' : '')}} id="frm0605:txtClassification:_1" name="frm0605:txtClassification" type="radio" value="I" />
                                                            I</td>
                                                        <td width="127"><input style="vertical-align: middle;" {{ $action == 'new' ? '' : ($data->item11 == 'N' ? 'checked' : '')}}  id="frm0605:txtClassification:_2" name="frm0605:txtClassification" type="radio" value="N" />
                                                            N</td>
                                                    </tr>
                                                </table></td>
                                            <td width="226" valign="top" class="tblFormTd"><table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="15"><font size="2" style="font-weight:bold">&nbsp;&nbsp;</font></td>
                                                        <td width="150"><span class="normal">
                                                                <input id="frm0605:txtLineBus" name="frm0605:txtLineBus" size="20"  type="text" value="{{$company->line_business}}"  disabled/>
                                                            </span></td>
                                                    </tr>
                                                </table></td>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="830" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="604" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;13&nbsp;</font></td>
                                                                    <td><font size="1" style="font-size: 11px;">Taxpayer's Name (Last Name, First Name, Middle Name for Individuals) /(Registered Name for Non-Individuals)</font></td>
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
                                                                            <input id="frm0605:txtTaxPayerName" maxlength="75" name="frm0605:txtTaxPayerName" size="65"  type="text" value="{{$company->registered_name != '' ? $company->registered_name : $company->lastname.','. $company->firstname.' '.$company->middlename }}" onblur="return capital(this, event)" disabled/>
                                                                        </span></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="226" valign="top" class="tblFormTd">
                                                <table width="110" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="149" nowrap><font size="2" style="font-weight:bold;">&nbsp;14&nbsp;</font><font size="1" style="font-size: 11px;">Telephone
                                                                Number</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td nowrap>
                                                            <div align="center"><span class="top">
                                                                    <input id="frm0605:txtTelNum" name="frm0605:txtTelNum" size="10"  type="text" value="{{$company->tel_number}}" onkeypress="return wholenumber(this, event)" disabled/>
                                                                </span> </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="830" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="604" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;15&nbsp;</font></td>
                                                                    <td><font size="1" style="font-size: 11px;">Registered Address</font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table width="496" border="0" cellpadding="0" cellspacing="0">
                                                                <tr>
                                                                    <td width="25">&nbsp;</td>
                                                                    <td width="471"><span class="normal">
                                                                            <input id="frm0605:txtAddress" name="frm0605:txtAddress" size="65"  type="text" value="{{$company->address}}" onblur="return capital(this, event)" disabled/>
                                                                        </span></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="226" valign="top" class="tblFormTd">
                                                <table width="226" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="100" nowrap><font size="2" style="font-weight:bold;">&nbsp;16&nbsp;</font><font size="1" style="font-size: 11px;">Zip
                                                                Code</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="126" nowrap>
                                                            <div align="center"><span class="normal">
                                                                    <input id="frm0605:txtZipCode" name="frm0605:txtZipCode" size="7"  type="text" value="{{$company->zip_code}}" onkeypress="return wholenumber(this, event)" disabled />
                                                                </span> </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="830" style="height: 0px">
                                        <tr>
                                            <td width="" colspan="2" valign="top" class="tblFormTd"><table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="22"><font size="2" style="font-weight:bold;">&nbsp;17&nbsp;</font></td>
                                                        <td width="133"><font size="1" style="font-size: 11px;">Manner of Payment </font></td>
                                                    </tr>
                                                </table></td>
                                            <td class="tblFormTd" valign="top"><table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="22"><font size="2" style="font-weight:bold;">&nbsp;18&nbsp;</font></td>
                                                        <td width="121"><font size="1" style="font-size: 11px;">Type of Payment </font></td>
                                                    </tr>
                                                </table></td>
                                        </tr>
                                        <tr>
                                            <td width="330" align="center" valign="middle" class="tblFormTd" style="padding: 3px 0 3px 0;">Voluntary Payment</td>
                                            <td width="272" align="center" valign="middle" class="tblFormTd" style="padding: 3px 0 3px 0;">Per Audit/Delinquent Account</td>
                                            <td width="224" rowspan="2" valign="top" class="tblFormTd"><div align="left">

                                                    <table border="0" cellpadding="0" cellspacing="0" class="iceSelOneRb" style="font-family: Arial, Helvetica, sans-serif;">
                                                        <tr>
                                                            <td><input style="vertical-align: middle;" id="frm0605:itemModeOfPayment:_1" name="frm0605:itemModeOfPayment"   type="radio" value="1" {{ $action == 'new' ? '' : ($data->item18 == '1' ? 'checked' : '')}} onclick="enableNumInstallment()" />
                                                                <label for="frm0605:itemModeOfPayment:_1" class="iceSelOneRb style3" style="font-size: 11px;">Installment</label></td>
                                                        </tr>
                                                    </table>

                                                </div>
                                                <div align="left">
                                                    <input id="frm0605:txtNumOfInstallment" maxlength="2" name="frm0605:txtNumOfInstallment" size="4" type="text" onkeypress="return numbersonly(this, event)" value="{{$action != 'new' ? $data->item18_installment : ''}}" />
                                                    <label id="frm0605:j_id298" style="font-size: 11px;">No. of Installment</label>
                                                </div>
                                                <div align="left">

                                                    <table border="0" cellpadding="0" cellspacing="0" class="iceSelOneRb" style="font-family: Arial, Helvetica, sans-serif; font-size: 7pt">
                                                        <tr>
                                                            <td width="142"><input style="vertical-align: sub;" id="frm0605:itemModeOfPayment:_2" name="frm0605:itemModeOfPayment"  type="radio" value="2" {{ $action == 'new' ? '' : ($data->item18 == '2' ? 'checked' : '')}} onclick="disableNumInstallment()" />
                                                                <label for="frm0605:itemModeOfPayment:_2" class="iceSelOneRb style3">Partial Payment</label></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input style="vertical-align: sub;" id="frm0605:itemModeOfPayment:_3" name="frm0605:itemModeOfPayment" type="radio" value="3" {{ $action == 'new' ? '' : ($data->item18 == '3' ? 'checked' : '')}} onclick="disableNumInstallment()" />
                                                                <label for="frm0605:itemModeOfPayment:_3" class="iceSelOneRb style3">Full Payment</label>
                                                            </td>
                                                        </tr>
                                                    </table>

                                                </div></td>
                                        </tr>
                                        <tr>
                                            <td width="330" height="0px" valign="top" class="tblFormTd">
                                                <table width="326" border="0" cellpadding="0" cellspacing="0" style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;">
                                                    <tr>
                                                        <td width="301"><input style="vertical-align: sub;" id="frm0605:itemMannerOfPayment:_1" name="frm0605:itemMannerOfPayment" type="radio" value="1" {{ $action == 'new' ? '' : ($data->item17 == '1' ? 'checked' : '')}} onclick="disableDefTax();disabletxtOthers()" />
                                                            <label for="frm0605:itemMannerOfPayment:_1" class="iceSelOneRb style2">Self-Assessment</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input style="vertical-align: sub;" id="frm0605:itemMannerOfPayment:_2" name="frm0605:itemMannerOfPayment" type="radio" value="5" {{ $action == 'new' ? '' : ($data->item17 == '5' ? 'checked' : '')}} onclick="disableDefTax();disabletxtOthers()" />
                                                            <label for="frm0605:itemMannerOfPayment:_2" class="iceSelOneRb style2">Penalties</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input style="vertical-align: sub;" id="frm0605:itemMannerOfPayment:_3" name="frm0605:itemMannerOfPayment"  type="radio" value="2" {{ $action == 'new' ? '' : ($data->item17 == '2' ? 'checked' : '')}} onclick="disableDefTax();disabletxtOthers()" />
                                                            <label for="frm0605:itemMannerOfPayment:_3" class="iceSelOneRb style2">Tax Deposit/Advance Payment</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input style="vertical-align: sub;" id="frm0605:itemMannerOfPayment:_4" name="frm0605:itemMannerOfPayment"  type="radio" value="3" {{ $action == 'new' ? '' : ($data->item17 == '3' ? 'checked' : '')}} onclick="disableDefTax();disabletxtOthers()" />
                                                            <label for="frm0605:itemMannerOfPayment:_4" class="iceSelOneRb style2">Income Tax Second Installment(Individual)</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input style="vertical-align: sub;" id="frm0605:itemMannerOfPayment:_5" name="frm0605:itemMannerOfPayment"  type="radio" value="4" {{ $action == 'new' ? '' : ($data->item17 == '4' ? 'checked' : '')}} onclick="disableDefTax();enabletxtOthers()" />
                                                            <label for="frm0605:itemMannerOfPayment:_5" class="iceSelOneRb style2">Others(Specify)</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input disabled="true" id="frm0605:txtOthersName" maxlength="60" name="frm0605:txtOthersName" size="30" type="text" value="{{$action != 'new' ? $data->item17Others : ''}}" />
                                                        </td>
                                                    </tr>
                                                </table>

                                            </td>
                                            <td class="tblFormTd" valign="top">

                                                <table border="0" cellpadding="0" cellspacing="0" class="iceSelOneRb" style="font-family: Verdana,Arial,Helvetica; font-size: 8pt;">
                                                    <tr>
                                                        <td width="264"><input style="vertical-align: sub;" id="frm0605:itemMannerOfPaymentB:_1" name="frm0605:itemMannerOfPayment"  type="radio" value="6" {{ $action == 'new' ? '' : ($data->item17 == '6' ? 'checked' : '')}} onclick="enableDefTax()" />
                                                            <label for="frm0605:itemMannerOfPaymentB:_1" class="iceSelOneRb style2">Preliminary/Final Assess/Deficiency Tax</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input style="vertical-align: sub;" id="frm0605:itemMannerOfPaymentB:_2" name="frm0605:itemMannerOfPayment"  type="radio" value="7" {{ $action == 'new' ? '' : ($data->item17 == '7' ? 'checked' : '')}} onclick="enableDefTax()" />
                                                            <label for="frm0605:itemMannerOfPaymentB:_2" class="iceSelOneRb style2">Accounts Receivable/Delinquent Account</label></td>
                                                    </tr>
                                                </table></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="830" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTdPart">
                                                <table width="820" style="height: 0px" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="124">&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;">Part
                                                                II</font></td>
                                                        <td width="684">
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
                                    <table width="830" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTd">
                                                <table width="828" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="27"><font size="2" style="font-weight:bold;">&nbsp;19&nbsp;&nbsp;</font></td>
                                                        <td width="355"><font size="1" style="font-size: 11px;">&nbsp;Basic Tax/Deposit/Advance Payment </font></td>
                                                        <td width="235">
                                                            <div class="spacePadder">                                                   </div>
                                                        </td>
                                                        <td width="211"><span class="spacePadder"><font size="2" style="font-weight:bold;">19</font>&nbsp;&nbsp;&nbsp;
                                                                <input type="text" value="{{$action != 'new' ? $data->item19 : '0.00'}}" style="color: black; text-align: right;" size="20" name="frm0605:txtTax19" maxlength="17" id="frm0605:txtTax19" onblur="round(this,2);computeOfTax()" onkeypress="return numbersonly(this, event)"/>
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;20&nbsp;</font></td>
                                                        <td colspan="2"><font size="1" style="font-size: 11px;">&nbsp;Add: Penalties</font></td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td colspan="2">
                                                            <table width="511">
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="161" align="center"><font size="1" face="Arial" style="font-size: 11px;">Surcharge</font></td>
                                                                        <td width="160" align="center"><font size="1" face="Arial" style="font-size: 11px;">Interest</font></td>
                                                                        <td width="174" align="center"><font size="1" face="Arial" style="font-size: 11px;">Compromise</font></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td colspan="2">
                                                            <table width="588">
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="192" align="center">
                                                                            <font size="2" face="Arial"><b>20A</b>&nbsp;
                                                                                <input type="text" value="{{$action != 'new' ? $data->item20A : '0.00'}}" style="text-align: right;" size="20" name="frm0605:txtTax20A"  maxlength="17" id="frm0605:txtTax20A" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computePenalties()" />
                                                                            </font>
                                                                        </td>
                                                                        <td width="190" align="center">
                                                                            <font size="2" face="Arial"><b>20B</b>&nbsp;
                                                                                <input type="text" value="{{$action != 'new' ? $data->item20B : '0.00'}}" style="text-align: right;" size="20" name="frm0605:txtTax20B"  maxlength="17" id="frm0605:txtTax20B" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computePenalties()" />
                                                                            </font>
                                                                        </td>
                                                                        <td width="190" align="center">
                                                                            <font size="2" face="Arial"><b>20C</b>&nbsp;
                                                                                <input type="text" value="{{$action != 'new' ? $data->item20C: '0.00'}}" style="text-align: right;" size="20" name="frm0605:txtTax20C"  maxlength="17" id="frm0605:txtTax20C" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computePenalties(); return capital(this)"/>
                                                                            </font>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td>
                                                            <div class="spacePadder" style="padding-top: 27px;">
                                                                <font size="2" style="font-weight:bold;">20D</font>&nbsp;
                                                                <input type="text" value="{{$action != 'new' ? $data->item20D : '0.00'}}" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm0605:txtTax20D" maxlength="25" id="frm0605:txtTax20D" disabled />
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font size="2" style="font-weight:bold;">&nbsp;21&nbsp;</font></td>
                                                        <td colspan="2"><font size="1" style="font-size: 11px;">&nbsp;Total Amount Payable(Sum of Items 19 & 20D)</font></td>
                                                        <td>
                                                            <div class="spacePadder">
                                                                <font size="2" style="font-weight:bold;">21</font>&nbsp;&nbsp;&nbsp;
                                                                <input type="text" value="{{$action != 'new' ? $data->item21 : '0.00'}}" style="background-color: rgb(220, 220, 220); text-align: right;" size="20" name="frm0605:txtTax21" maxlength="25" id="frm0605:txtTax21" disabled="true" />
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
                                    <table width="830" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTd">
                                                <div align="center">
                                                    <table border="0" cellpadding="0" cellspacing="0" class="iceSelOneRb-dis">
                                                        <tr>
                                                            <td><input disabled="disabled" id="frm0605:itemApprovedYN:_1" name="frm0605:itemApprovedYN" type="radio" value="Y" {{ $action == 'new' ? '' : ($data->item_approved == 'Y' ? 'checked' : '')}} />
                                                                <label class="iceSelOneRb-dis-dis" for="frm0605:itemApprovedYN:_1">Pre-approved by Investigating Office</label></td>
                                                            <td><input disabled="disabled" id="frm0605:itemApprovedYN:_2" name="frm0605:itemApprovedYN" type="radio" value="N" {{ $action == 'new' ? '' : ($data->item_approved == 'N' ? 'checked' : '')}} />
                                                                <label class="iceSelOneRb-dis-dis" for="frm0605:itemApprovedYN:_2">Not approved by Investigating Office</label></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <!--- Footer --->
                                    <div class="imgClass" align='center' style="display:none; width:830px !important;">
                                        <table style="border-top: 3px solid black; border-collapse: collapse; font-family:arial; font-size:12px; text-align: center; vertical-align: top; table-layout: fixed;">
                                            <col width="40%" />
                                            <col width="15%" />
                                            <col width="25%" />
                                            <col width="20%" />
                                            <tr>
                                                <td colspan="2"><b>For Voluntary Payment</b>
                                                    <br/>
                                                    <br/>
                                                    <br/>I declare, under the penalties of perjury, that this document has been
                                                    <br/>made in good faith, verified by me, and to the best of my knowledge and
                                                    <br/>belief, is true and correct, pursuant to the provisions of National
                                                    <br/>Internal Revenue Code, as amended, and the regulations issued under
                                                    <br/>authority thereof.</td>
                                                <td style="border-left: 3px solid #000;">For Payment of Deficiency Taxes
                                                    <br/>--
                                                    <br/>From Audit/Investigation/
                                                    <br/>Deliquent Account
                                                    <br/>
                                                    <br/>
                                                    <br/><div style="text-align:left !important;">&nbsp;&nbsp;APPROVED BY:</div>
                                                    <br/>&nbsp;</td>
                                                <td style="border-left: 3px solid #000;">Stamp of Receiving
                                                    <br/>Office
                                                    <br/>and Date of Receipt
                                                    <br/>
                                                    <br/>
                                                    <br/>
                                                    <br/>
                                                    <br/>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td><br/><b>22A</b>__________________________________________
                                                    <br/><span style="font-size:9px;">Signature over Printed Name of Taxpayer/Authorized Representative</span></td>
                                                <td><br/>________________
                                                    <br/><span style="font-size:9px;">Title/Position of Signatory</span></td>
                                                <td style="border-left: 3px solid #000;"><b>22B</b>____________________
                                                    <br/><span style="font-size:9px;">Signature Over Printed Name of
                                                    <br/>Head of Office</span></td>
                                                <td style="border-left: 3px solid #000;">
                                                    <br/>
                                                    <br/>&nbsp;</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="imgClass" align='center' style="display:none; width:830px !important;">
                                        <img id="frm0605_2:jurat" src="{{ asset('images/bottom_img/0605_2_new.jpg') }}" width="830"/>
                                    </div>
                                    <div class="imgClass" align='center' style="display:none; width:830px !important;">
                                        <table style="font-size:12px; text-align: left; vertical-align: top;">
                                          <tr>
                                            <td>Machine Validation/Revenue Official Receipt Details (If not filed with the bank)<br /><br /><br /><br /><br /></td>
                                          </tr>
                                          <tr>
                                            <td style="border-top: 3px solid #000;"><span style="font-size:9px;">Taxpayer Classification:&nbsp;&nbsp;&nbsp;&nbsp;I - Individual&nbsp;&nbsp;&nbsp;&nbsp;N - Non-Individual</span></td>
                                          </tr>
                                        </table>
                                    </div>
                                    <table width="830" border="0" cellspacing="0" cellpadding="0" class="tblForm printButtonClass">
                                        <tr>
                                            <td class="tblFormTdPart">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table width="735" cellspacing="0" cellpadding="0" border="0">
                                                                <tbody>
                                                                    <tr valign="middle">
                                                                        <td width="55"></td>
                                                                        <td width="697" style="width: 100%">
                                                                            <div id="frm1601c:j_id743" class="icePnlGrp" style="border-bottom: #AAAAAA 1px solid;">
                                                                                <div align="center">
                                                                                    @if($action != 'view')
                                                                                    <input class="printButtonClass" type="button" value="Validate" style="width: 100px;" name="frm0605:cmdValidate" id="frm0605:cmdValidate" onclick="validate()" />
                                                                                    <input class="printButtonClass" type="button" value="Edit" style="width: 100px;" name="frm0605:cmdEdit" id="frm0605:cmdEdit" onclick="enableAllControl()"/>
                                                                                    <input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />
                                                                                    <input class="printButtonClass" type="button" value="{{ $action == 'new' ? 'Save' : 'Update' }}" style="width: 100px;" name="btnSave" id="btnSave" onclick="saveData();" />
                                                                                    <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                                                    <input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;" name="frm0605:btnFinalCopy" id="frm0605:btnFinalCopy" onclick="submitForm();" />
                                                                                    @else
                                                                                    <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                                                    <input class="printButtonClass" type="button" value="Back" style="width: 100px;" onclick="gotoMain();" />
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td width="105"><div id="DummyTxt" style='display:none;'> </div> </td>
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
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div id="modalAtc" class="aBox" style="padding: 0px 27px;width:64%; display:none; height:85%; position:fixed; top:14%; left:19%; right:auto; overflow-y:auto; overflow-x:hidden; background:#fff;" align="left"> 

            <br/>
            <br/>
            <table class="modalHeader" border="0" cellspacing="3" cellpadding="3"  style="position: static;width: 100%">
                <tr>
                    <td class="modalContent" colspan="2"></td>
                </tr>
                <tr>
                    <td width="166"><b> ATC </b></td>
                    <td width="660"> <b> Description </b> </td>
                </tr>
                <tr>
                    <td colspan="2"> <hr/></td>
                </tr>
            </table>
            
            <div class="modalColumnHeader" style="height:auto;width: auto; overflow:visible;">
           
                 <table id="tbllistAtcCode" cellspacing="0" cellpadding="0" style="width: 100%;padding:1%;">
                    <?php $no = 0;?>
                    @foreach ($atc as $each)
                        <?php $no++; ?>
                        <tr class='atc'>
                            <td width='20%' class='atc'> 
                                <input style="vertical-align: middle;" id='AtcCode{{$no}}' name='AtcCode' type='radio' value='{{$each->atc}}' {{ $action == "new" ? '' : ($data->item6 == $each->atc ? "checked" : '') }} /> {{$each->atc}}
                            </td> 
                            <td width='80%' id='AtcNaturePayment{{$no}}'  class='atc atcNames'>{{$each->description}} </td> 
                        </tr>
                    @endforeach
                </table>
            </div>
            <br/>
            <div align="center">
            <input type="button" name="btnOkPop" id="btnOkPop" style="width:120px; height:30px;" value="OK" onclick="getATCCode()"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
            <br />
            <br />
        </div>
        <!-- modal Tax Code -->
       
        <div id="modalTaxTypeCode" class="aBox" style="padding: 0px 20px;width:75%; display:none; height:85%; position:fixed; top:14%; left:12%; right:auto; overflow-y:auto; background:#fff;" align="left"> 
            <br/>
            <br/>
            <table class="modalHeader" border="0" cellspacing="3" cellpadding="3" style="position: static;width: 100%">
                <tr>
                    <td class="modalContent" colspan="3"></td>
                </tr>
                <tr>
                    <td width="166"><b> Tax Type </b></td>
                    <td width="640"> <b> Description </b> </td>
                </tr>
                <tr>
                    <td colspan="2"> <hr/></td>
                </tr>
            </table>

            <div class="modalColumnHeader" style="height:auto;overflow:auto;width: 745">
                <table id="tbllistTaxTypeCode"  cellspacing="3" cellpadding="3"  style="width: 100%;padding:1%;" >
                    <?php $no = 0;?>
                    @foreach ($taxes as $each)
                        <?php $no++; ?>
                        <tr>
                            <td width='20%'> 
                                <input id='TaxTypeCode{{$no}}' style="vertical-align: sub" name='TaxCode' type='radio' value='{{$each->tax_type}}' {{ $action == "new" ? '' : ($data->item8 == $each->tax_type ? "checked" : '') }} /> {{$each->tax_type}}
                            </td> 
                            <td width='80%' id='TaxTypeDescription{{$no}}' >{{$each->description}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <br/>
            <div align="center">
            <input type="button" name="btnOkPop" id="btnOkPop" style="width:120px; height:30px;" value="OK" onclick="getTaxTypeCode()"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
            <br />
            <br />
        </div>
    
        <div id="hiddenEmail" style="display:none;"  > 
            <input id="txtEmail" class="emailClass" value="{{$company->email_address}}" name="txtEmail" type="text" onblur="" onkeypress="" maxlength="60"   />
        </div> 
        <input type="hidden" id="sessionIdFromPopUp" name="sessionIdFromPopUp" value="">
    </form>
@endsection

@section('scripts')
<script>

    var isSubmitFinal = false;
    
    var gIsReadOnly = false;
    var fileNameToExport = "";  var fileName = "";
    var fnNew = "";
    
    var savedReturn = "";
    var p3Compromise = "";
    var p3Surcharge = "";
    var p3Interest = "";
    var p3IsAmended = false;
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
    var p3TPClassIndi = false
    var p3TPClassNonIndi = false;
    var p3TPClass = false;
    var p3TPLineBus = "";
    var p3TPName = "";
    var p3TPTelNum = "";
    var p3TPAddress = "";
    var p3TPZip = "";   var globalEmail = "";   
    var str;
    str = setInterval("sleeptime()", 200);
    function sleeptime()
    {
        clearInterval(str);
        init();
        
        d.getElementById('frm0605:txtTIN1').disabled = true;
        d.getElementById('frm0605:txtTIN2').disabled = true;
        d.getElementById('frm0605:txtTIN3').disabled = true;
        d.getElementById('frm0605:txtBranchCode').disabled = true; 
    } 

    function rdoPropertyJS(rdoCode, description) 
    {
        this.rdoCode=rdoCode;
        this.description=description;
    }
    
    var rdoList = new Array();

    var d=document,data='',XMLBGFile='',XMLFile='',XMLATCFile='',XMLTaxTypeCodeFile='',msg = d.getElementById('msg');
    var loader=d.getElementById('loader');
    /*----------------------------------*/  
    
    var atcList = new Array();
    var taxTypeCodeList = new Array();
        
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
    
    function taxTypeCodePropertyJS(ttypeCode, description, formType)
    {
        this.ttypeCode=ttypeCode;
        this.description=description;
        this.formType=formType;
    }   
    
    function init()
    {
        var date = new Date();
        var month = new Date();
        var year = new Date();
        
        @if($action == 'new')
        d.getElementById('frm0605:itemYearEndMonth').selectedIndex = month.getMonth() + 1; 
        d.getElementById('frm0605:txtYearEnded').value = date.getFullYear();
        d.getElementById('frm0605:txtNumOfInstallment').disabled = true;
        d.getElementById('frm0605:itemApprovedYN:_1').disabled = true;
        d.getElementById('frm0605:itemApprovedYN:_2').disabled = true;
        d.getElementById('frm0605:txtOthersName').disabled = true;
        @else
            @if($data->item18 == '1')
                enableNumInstallment();
            @endif

            @if($data->item17 == '7' || $data->item17 == '6')
                enableDefTax();
            @endif

            @if($data->item17 == '4')
                enabletxtOthers();
            @endif
        @endif
        
        @if($action != 'view')
            d.getElementById('btnPrint').disabled = true;
            d.getElementById('frm0605:cmdEdit').disabled = true;
            d.getElementById('btnUpload').disabled = true;
            d.getElementById('frm0605:btnFinalCopy').disabled = true;
        @else
            d.getElementById('frm0605:txtNoOfSheets').disabled = true;
            d.getElementById('frm0605:txtTax20A').disabled = true;
            d.getElementById('frm0605:txtTax20B').disabled = true;
            d.getElementById('frm0605:txtTax20C').disabled = true;
            disableAllControl();
        @endif

        d.getElementById('txtATCCode').disabled = true;
        d.getElementById('txtTaxTypeCode').disabled = true;
        
        
        d.getElementById('frm0605:txtTax20D').disabled = true;
        d.getElementById('frm0605:txtTax21').disabled = true;
      
    }
    var disableElem = true;
    var enableElem = false;
    function disableAllControl()
    {
        d.getElementById('frm0605:txtTIN1').disabled = true;
        d.getElementById('frm0605:txtTIN2').disabled = true;
        d.getElementById('frm0605:txtTIN3').disabled = true;
        d.getElementById('frm0605:txtBranchCode').disabled = true;
        d.getElementById('frm0605:txtRDOCode').disabled = true;
        d.getElementById('frm0605:txtClassification:_1').disabled = true;
        d.getElementById('frm0605:txtClassification:_2').disabled = true;
        d.getElementById('frm0605:txtLineBus').disabled = true;
        d.getElementById('frm0605:txtTaxPayerName').disabled = true;
        d.getElementById('frm0605:txtTelNum').disabled = true;
        d.getElementById('frm0605:txtAddress').disabled = true;
        d.getElementById('frm0605:txtZipCode').disabled = true;
        
        d.getElementById('frm0605:itemYearEndMonth').disabled = true;
        d.getElementById('frm0605:txtYearEnded').disabled = true;
        d.getElementById('itemQuarter_1').disabled = true;
        d.getElementById('itemQuarter_2').disabled = true;
        d.getElementById('itemQuarter_3').disabled = true;
        d.getElementById('itemQuarter_4').disabled = true;
        d.getElementById('frm0605:txtDueDateMonth').disabled = true;
        d.getElementById('frm0605:txtDueDateDay').disabled = true;
        d.getElementById('frm0605:txtDueDateYear').disabled = true;
        d.getElementById('btnATC').disabled = true;
        d.getElementById('frm0605:txtReturnPeriodMonth').disabled = true;
        d.getElementById('frm0605:txtReturnPeriodDay').disabled = true;
        d.getElementById('frm0605:txtReturnPeriodYear').disabled = true;
        d.getElementById('btnTaxType').disabled = true;
        d.getElementById('frm0605:itemMannerOfPayment:_1').disabled = true;
        d.getElementById('frm0605:itemMannerOfPayment:_2').disabled = true;
        d.getElementById('frm0605:itemMannerOfPayment:_3').disabled = true;
        d.getElementById('frm0605:itemMannerOfPayment:_4').disabled = true;
        d.getElementById('frm0605:itemMannerOfPayment:_5').disabled = true;
        d.getElementById('frm0605:txtOthersName').disabled = true;
        d.getElementById('frm0605:itemMannerOfPaymentB:_1').disabled = true;
        d.getElementById('frm0605:itemMannerOfPaymentB:_2').disabled = true;
        d.getElementById('frm0605:itemModeOfPayment:_1').disabled = true;
        d.getElementById('frm0605:txtNumOfInstallment').disabled = true;
        d.getElementById('frm0605:itemModeOfPayment:_2').disabled = true;
        d.getElementById('frm0605:itemModeOfPayment:_3').disabled = true;
        d.getElementById('frm0605:txtTax19').disabled = true;
        d.getElementById('frm0605:txtTax20A').disabled = true;
        d.getElementById('frm0605:txtTax20B').disabled = true;
        d.getElementById('frm0605:txtTax20C').disabled = true;
        d.getElementById('frm0605:itemApprovedYN:_1').disabled = true;
        d.getElementById('frm0605:itemApprovedYN:_2').disabled = true;
       
        @if($action != 'view')
            d.getElementById('btnPrint').disabled = false;
            d.getElementById('frm0605:cmdEdit').disabled = false;
            d.getElementById('frm0605:btnFinalCopy').disabled = false;
        @endif
        
        disableElem;
        enableElem;
    }
    function enableAllControl()
    {
        d.getElementById('frm0605:txtTIN1').disabled = false;
        d.getElementById('frm0605:txtTIN2').disabled = false;
        d.getElementById('frm0605:txtTIN3').disabled = false;
        d.getElementById('frm0605:txtBranchCode').disabled = false;
        d.getElementById('frm0605:txtRDOCode').disabled = false;
        d.getElementById('frm0605:txtClassification:_1').disabled = false;
        d.getElementById('frm0605:txtClassification:_2').disabled = false;
        d.getElementById('frm0605:txtLineBus').disabled = false;
        d.getElementById('frm0605:txtTaxPayerName').disabled = false;
        d.getElementById('frm0605:txtTelNum').disabled = false;
        d.getElementById('frm0605:txtAddress').disabled = false;
        d.getElementById('frm0605:txtZipCode').disabled = false;
        
        d.getElementById('frm0605:itemYearEndMonth').disabled = false;
        d.getElementById('frm0605:txtYearEnded').disabled = false;
        d.getElementById('itemQuarter_1').disabled = false;
        d.getElementById('itemQuarter_2').disabled = false;
        d.getElementById('itemQuarter_3').disabled = false;
        d.getElementById('itemQuarter_4').disabled = false;
        d.getElementById('frm0605:txtDueDateMonth').disabled = false;
        d.getElementById('frm0605:txtDueDateDay').disabled = false;
        d.getElementById('frm0605:txtDueDateYear').disabled = false;
        d.getElementById('btnATC').disabled = false;
        d.getElementById('frm0605:txtReturnPeriodMonth').disabled = false;
        d.getElementById('frm0605:txtReturnPeriodDay').disabled = false;
        d.getElementById('frm0605:txtReturnPeriodYear').disabled = false;
        d.getElementById('btnTaxType').disabled = false;
        d.getElementById('frm0605:itemMannerOfPayment:_1').disabled = false;
        d.getElementById('frm0605:itemMannerOfPayment:_2').disabled = false;
        d.getElementById('frm0605:itemMannerOfPayment:_3').disabled = false;
        d.getElementById('frm0605:itemMannerOfPayment:_4').disabled = false;
        d.getElementById('frm0605:itemMannerOfPayment:_5').disabled = false;
        d.getElementById('frm0605:txtOthersName').disabled = false;
        d.getElementById('frm0605:itemMannerOfPaymentB:_1').disabled = false;
        d.getElementById('frm0605:itemMannerOfPaymentB:_2').disabled = false;
        d.getElementById('frm0605:itemModeOfPayment:_1').disabled = false;
        d.getElementById('frm0605:txtNumOfInstallment').disabled = false;
        d.getElementById('frm0605:itemModeOfPayment:_2').disabled = false;
        d.getElementById('frm0605:itemModeOfPayment:_3').disabled = false;
        d.getElementById('frm0605:txtTax19').disabled = false;
        d.getElementById('frm0605:txtTax20A').disabled = false;
        d.getElementById('frm0605:txtTax20B').disabled = false;
        d.getElementById('frm0605:txtTax20C').disabled = false;
        d.getElementById('frm0605:itemApprovedYN:_1').disabled = false;
        d.getElementById('frm0605:itemApprovedYN:_2').disabled = false;

        d.getElementById('frm0605:cmdValidate').disabled = false;
        d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm0605:cmdEdit').disabled = true;
        d.getElementById('frm0605:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;
        disableElem;
        enableElem;
        
        d.getElementById('frm0605:txtTIN1').disabled = true;
        d.getElementById('frm0605:txtTIN2').disabled = true;
        d.getElementById('frm0605:txtTIN3').disabled = true;
        d.getElementById('frm0605:txtBranchCode').disabled = true;  
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
    function computePenalties()
    {
        d.getElementById('frm0605:txtTax20D').value =   formatCurrency(NumWithComma(d.getElementById('frm0605:txtTax20A').value)*1  + NumWithComma(d.getElementById('frm0605:txtTax20B').value)*1 + NumWithComma(d.getElementById('frm0605:txtTax20C').value)*1);
        computeOfTax();
    }
    function computeOfTax()
    { 
         d.getElementById('frm0605:txtTax21').value = formatCurrency(NumWithComma(d.getElementById('frm0605:txtTax19').value)*1 + NumWithComma(d.getElementById('frm0605:txtTax20D').value)*1);
        capital();
    }
    function enableDefTax()
    {   disabletxtOthers();
        d.getElementById('frm0605:itemApprovedYN:_1').disabled = false;
        d.getElementById('frm0605:itemApprovedYN:_2').disabled = false;
    }
    function disableDefTax()
    {   d.getElementById('frm0605:itemApprovedYN:_1').checked = false;
        d.getElementById('frm0605:itemApprovedYN:_2').checked = false;

        d.getElementById('frm0605:itemApprovedYN:_1').disabled = true;
        d.getElementById('frm0605:itemApprovedYN:_2').disabled = true;
    }
    function disabletxtOthers()
    {   d.getElementById('frm0605:txtOthersName').value = "";
        d.getElementById('frm0605:txtOthersName').disabled = true;
    }
    function enabletxtOthers()
    {
        d.getElementById('frm0605:txtOthersName').disabled = false;
    }
    function enableNumInstallment()
    {   
        d.getElementById('frm0605:txtNumOfInstallment').disabled = false;
    }
    function disableNumInstallment()
    {   d.getElementById('frm0605:txtNumOfInstallment').value = "";
        d.getElementById('frm0605:txtNumOfInstallment').disabled = true;
    }

    function validate()
    {
        if(!d.getElementById('frm0605:itemFiscalStartMonth:_1').checked && !d.getElementById('frm0605:itemFiscalStartMonth:_2').checked)
        {
            alert("Please select an option on Item 1.")
            return;
        }
        if( (d.getElementById('frm0605:txtYearEnded').value == "") ||  ( d.getElementById('frm0605:txtYearEnded').value < 1904 ||  d.getElementById('frm0605:txtYearEnded').value > 3000   ) )
        {
            alert("Please enter a valid year on Item 2.");
            return;
        }   
        if(d.getElementById('frm0605:txtDueDateMonth').value.length == 1 || d.getElementById('frm0605:txtDueDateDay').value.length == 1)
        {
            alert("Please enter a valid day/month on Item 4. Format should be MM/DD/YYYY.")
            return;
        }
        if(document.getElementById('frm0605:txtDueDateDay').value < 1)
        {
            alert("Invalid date entry on Item 4.");
            return;
        }
        var isLeap = new Date(document.getElementById('frm0605:txtDueDateYear').value, 1, 29).getMonth() == 1;
        
        if (!isLeap && document.getElementById('frm0605:txtDueDateMonth').value==2 && document.getElementById('frm0605:txtDueDateDay').value==29) {
            alert("Filing year is not a leap year.");
            return;
        }
        if (!isLeap && document.getElementById('frm0605:txtDueDateMonth').value==2 && document.getElementById('frm0605:txtDueDateDay').value>29) {
            alert("Invalid date entry on Item 4.");
            return;
        }
        if (isLeap && document.getElementById('frm0605:txtDueDateMonth').value==2 && document.getElementById('frm0605:txtDueDateDay').value>29) {
            alert("Invalid date entry on Item 4.");
            return;
        }
        var month31 = (['01', '03', '05', '07', '08', '10', '12']);
        var month30 = (['04', '06', '09', '11']);
        var month = document.getElementById('frm0605:txtDueDateMonth').value
        if (month31.contains(month) && document.getElementById('frm0605:txtDueDateDay').value > 31)
        {
            alert("Invalid date entry on Item 4.");
            return;
        }
        else if (month30.contains(month) && document.getElementById('frm0605:txtDueDateDay').value > 30)
        {
            alert("Invalid date entry on Item 4.");
            return;
        }
        if (d.getElementById('txtATCCode').value == "" )
        {
            alert("Please enter a valid ATC on Item 6.");
            return;
        }
        if( (d.getElementById('frm0605:txtReturnPeriodMonth').value == "" || d.getElementById('frm0605:txtReturnPeriodDay').value == "" || d.getElementById('frm0605:txtReturnPeriodYear').value == "")  )
        {
            alert("Please enter a valid Return Period on Item 7.");
            return;
        }
        if(d.getElementById('frm0605:txtReturnPeriodMonth').value.length == 1 || d.getElementById('frm0605:txtReturnPeriodDay').value.length == 1)
        {
            alert("Please enter a valid day/month on item 7. Format should be MM/DD/YYYY.")
            return;
        }
        if(document.getElementById('frm0605:txtReturnPeriodDay').value < 1)
        {
            alert("Invalid date entry on Item 7.");
            return;
        }
        var isLeap = new Date(document.getElementById('frm0605:txtReturnPeriodYear').value, 1, 29).getMonth() == 1;
        
        if (!isLeap && document.getElementById('frm0605:txtReturnPeriodMonth').value==2 && document.getElementById('frm0605:txtReturnPeriodDay').value==29) {
            alert("Filing year is not a leap year.");
            return;
        }
        if (!isLeap && document.getElementById('frm0605:txtReturnPeriodMonth').value==2 && document.getElementById('frm0605:txtReturnPeriodDay').value>29) {
            alert("Invalid date entry on Item 7.");
            return;
        }
        if (isLeap && document.getElementById('frm0605:txtReturnPeriodMonth').value==2 && document.getElementById('frm0605:txtReturnPeriodDay').value>29) {
            alert("Invalid date entry on Item 7.");
            return;
        }
        var month31b = (['01', '03', '05', '07', '08', '10', '12']);
        var month30b = (['04', '06', '09', '11']);
        var monthb = document.getElementById('frm0605:txtReturnPeriodMonth').value
        if (month31b.contains(monthb) && document.getElementById('frm0605:txtReturnPeriodDay').value > 31)
        {
            alert("Invalid date entry on Item 7.");
            return;
        }
        else if (month30b.contains(monthb) && document.getElementById('frm0605:txtReturnPeriodDay').value > 30)
        {
            alert("Invalid date entry on Item 7.");
            return;
        }
        if( (d.getElementById('frm0605:txtTIN1').value == "" || d.getElementById('frm0605:txtTIN2').value == "" || d.getElementById('frm0605:txtTIN3').value == "" || d.getElementById('frm0605:txtBranchCode').value == "")  )
        {
            alert("Please enter a valid TIN number on Item 9.");
            return;
        }               
        
        if( (d.getElementById('frm0605:txtClassification:_1').checked == false && d.getElementById('frm0605:txtClassification:_2').checked == false)  )
        {
            alert("Please select Taxpayer Classification on Item 11.");
            return;
        }
        if( (d.getElementById('frm0605:txtLineBus').value == "")  )
        {
            alert("Please enter a valid Line of Business/Occupation on Item 12.");
            return;
        }   
        if( (d.getElementById('frm0605:txtTaxPayerName').value == "")  )
        {
            alert("Please enter a valid Taxpayer Name on Item 13.");
            return;
        }
        if( (d.getElementById('frm0605:txtTelNum').value == "")  )
        {
            alert("Please enter a valid Taxpayer Telephone Number on Item 14.");
            return;
        }   
        if( (d.getElementById('frm0605:txtAddress').value == "")  )
        {
            alert("Please enter a valid Taxpayer Registered Address on Item 15.");
            return;
        }
        if( (d.getElementById('frm0605:txtZipCode').value == "")  )
        {
            alert("Please enter a valid Taxpayer Zip Code on Item 16.");
            return;
        }
        if ( (!d.getElementById('frm0605:txtDueDateMonth').value == "" ) || (!d.getElementById('frm0605:txtDueDateDay').value == "" ) || (!d.getElementById('frm0605:txtDueDateYear').value == "") )
        {   // validate due date
            if (d.getElementById('frm0605:txtDueDateMonth').value == "" ) {
                alert("Please enter valid month on Item 4.");
                return;
            } else if ((d.getElementById('frm0605:txtDueDateMonth').value < 1) || (d.getElementById('frm0605:txtDueDateMonth').value > 12)) {
                alert("Please enter valid month on Item 4.");
                return;
            }           
            if (( d.getElementById('frm0605:txtDueDateMonth').value == 1) || (d.getElementById('frm0605:txtDueDateMonth').value == 3) ||
                (d.getElementById('frm0605:txtDueDateMonth').value == 5) || (d.getElementById('frm0605:txtDueDateMonth').value == 7) ||
                (d.getElementById('frm0605:txtDueDateMonth').value == 8) || (d.getElementById('frm0605:txtDueDateMonth').value == 10) ||
                (d.getElementById('frm0605:txtDueDateMonth').value == 12)) {
                //validate DueDateDay                   
                if (d.getElementById('frm0605:txtDueDateDay').value == "") {
                    alert("Please enter a valid day on Item 4.");
                    return;
                } else if ((d.getElementById('frm0605:txtDueDateDay').value < 1) || (d.getElementById('frm0605:txtDueDateDay').value > 31)) {
                    alert("Please enter a valid date on Item 4.");
                    return;
                }                   
            }
            if ((d.getElementById('frm0605:txtDueDateMonth').value == 4) || (d.getElementById('frm0605:txtDueDateMonth').value == 6) ||
                (d.getElementById('frm0605:txtDueDateMonth').value == 9) || (d.getElementById('frm0605:txtDueDateMonth').value == 11)) {                    
                           
            }
            if (d.getElementById('frm0605:txtDueDateMonth').value == 2) {   
                if (d.getElementById('frm0605:txtDueDateDay').value == "") {
                    alert("Please enter a valid day on Item 4.");
                    return;
                } else if ((d.getElementById('frm0605:txtDueDateYear').value % 4 == 0) && ((!(d.getElementById('frm0605:txtDueDateYear').value % 100 == 0)) ||
                    (d.getElementById('frm0605:txtDueDateYear').value % 400 == 0))) {
                    if ((d.getElementById('frm0605:txtDueDateDay').value < 1) || (d.getElementById('frm0605:txtDueDateDay').value > 29)) {

                        alert("Please enter a valid date on Item 4.");
                        return ;
                    }
                } else if ((d.getElementById('frm0605:txtDueDateDay').value < 1) || (d.getElementById('frm0605:txtDueDateDay').value > 28)) {
                    alert("Please enter a valid date on Item 4.");
                    return;
                }               
            }
            if (d.getElementById('frm0605:txtDueDateYear').value =="") {
                alert("Please enter valid year on Item 4.");
                return;
            } else if ((d.getElementById('frm0605:txtDueDateYear').value < 1904) || (d.getElementById('frm0605:txtDueDateYear').value > 3000)) {
                alert("Please enter a valid date on Item 4.");
                return;
            }
        }       
                
        if (d.getElementById('frm0605:txtReturnPeriodMonth').value == "" && d.getElementById('frm0605:txtReturnPeriodDay').value == "" && d.getElementById('frm0605:txtReturnPeriodYear').value == "" )
        {
            alert("Please enter a valid month on Item 7.");
            return;
        }   
        if ((d.getElementById('frm0605:txtReturnPeriodMonth').value == null) || (d.getElementById('frm0605:txtReturnPeriodMonth').value == "")) {
            alert("Please enter a valid month on Item 7.");
            return;
        }       
        if ((d.getElementById('frm0605:txtReturnPeriodMonth').value < 1) || (d.getElementById('frm0605:txtReturnPeriodMonth').value > 12)) {
            alert("Please enter a valid month on Item 7.");
            return;
        }       
        if ((d.getElementById('frm0605:txtReturnPeriodDay').value == null) || (d.getElementById('frm0605:txtReturnPeriodDay').value =="") ) {
            alert("Please enter a valid day on Item 7.");
            return;
        }   
        if ((d.getElementById('frm0605:txtReturnPeriodMonth').value == 1) || (d.getElementById('frm0605:txtReturnPeriodMonth').value == 3) ||
            (d.getElementById('frm0605:txtReturnPeriodMonth').value == 5) || (d.getElementById('frm0605:txtReturnPeriodMonth').value == 7) ||
            (d.getElementById('frm0605:txtReturnPeriodMonth').value == 8) || (d.getElementById('frm0605:txtReturnPeriodMonth').value == 10) ||
            (d.getElementById('frm0605:txtReturnPeriodMonth').value == 12)) {
            if ((d.getElementById('frm0605:txtReturnPeriodDay').value  < 1) || (d.getElementById('frm0605:txtReturnPeriodDay').value  > 31)) {
                alert("Please enter a valid day on Item 7.");
                return;
            }
        }       
        if ((d.getElementById('frm0605:txtReturnPeriodMonth').value == 4) || (d.getElementById('frm0605:txtReturnPeriodMonth').value == 6) ||
            (d.getElementById('frm0605:txtReturnPeriodMonth').value == 9) || (d.getElementById('frm0605:txtReturnPeriodMonth').value == 11)) {
            if ((d.getElementById('frm0605:txtReturnPeriodDay').value < 1) || (d.getElementById('frm0605:txtReturnPeriodDay').value > 30)) {
                alert("Please enter a valid date on Item 7.");
                return;
            }
        }       
        if (d.getElementById('frm0605:txtReturnPeriodMonth').value == 2) {      
            if ((d.getElementById('frm0605:txtReturnPeriodYear').value == null) || (d.getElementById('frm0605:txtReturnPeriodYear').value == "" )) {
                alert("Please enter a valid year on Item 7.");
                return;
            }
            if ((d.getElementById('frm0605:txtReturnPeriodYear').value % 4 == 0) && ((!(d.getElementById('frm0605:txtReturnPeriodYear').value % 100 == 0)) ||
                (d.getElementById('frm0605:txtReturnPeriodYear').value % 400 == 0))) {
                if ((d.getElementById('frm0605:txtReturnPeriodDay').value < 1) || (d.getElementById('frm0605:txtReturnPeriodDay').value > 29)) {
                    alert("Please enter a valid date on Item 7.");
                    return;
                }
            } else if ((d.getElementById('frm0605:txtReturnPeriodDay').value < 1) || (d.getElementById('frm0605:txtReturnPeriodDay').value > 28)) {
                alert("Please enter a valid date on Item 7.");
                return;
            }
        }       
        if ((d.getElementById('frm0605:txtReturnPeriodYear').value == null) || (d.getElementById('frm0605:txtReturnPeriodYear').value == "")) {
            alert("Please enter a valid year on Item 7.");
            return;
        }       
        if ((d.getElementById('frm0605:txtReturnPeriodYear').value < 1904) || (d.getElementById('frm0605:txtReturnPeriodYear').value > 3000)) {
            alert("Please enter a valid date on Item 7.");
            return;
        }
        if (d.getElementById('frm0605:txtReturnPeriodYear').value > d.getElementById('frm0605:txtYearEnded').value ) {
            alert("The return period date should not be later than the year ended date.");
            return;
        }       
        if ((d.getElementById('frm0605:txtReturnPeriodYear').value == d.getElementById('frm0605:txtYearEnded').value ) &&
            (d.getElementById('frm0605:txtReturnPeriodMonth').value  > d.getElementById('frm0605:itemYearEndMonth').value)) {
            alert("The return period date should not be later than the year ended date.");
            return;
        }
        if(d.getElementById('txtTaxTypeCode').value == "" )
        {
            alert("Please select Tax Type Code on Item 8.");
            return;
        }       
        if(d.getElementById('frm0605:itemMannerOfPayment:_1').checked == false && d.getElementById('frm0605:itemMannerOfPayment:_2').checked == false && d.getElementById('frm0605:itemMannerOfPayment:_3').checked == false && d.getElementById('frm0605:itemMannerOfPayment:_4').checked == false && d.getElementById('frm0605:itemMannerOfPayment:_5').checked == false && d.getElementById('frm0605:itemMannerOfPaymentB:_1').checked == false && d.getElementById('frm0605:itemMannerOfPaymentB:_2').checked == false)
        {
            alert("Please select Manner of Payment on Item 17.");
            return;
        }   
        if( (d.getElementById('frm0605:itemMannerOfPaymentB:_1').checked == true || d.getElementById('frm0605:itemMannerOfPaymentB:_2').checked == true) && ( d.getElementById('frm0605:itemApprovedYN:_1').checked == false && d.getElementById('frm0605:itemApprovedYN:_2').checked == false  )  )
        {
            alert("Since you have selected Accounts Receivable/Delinquent Account on\n" +
                "item 17, you must choose either:Pre-approved or Not approved by " +
                "Investigating Office.");
            return;

        }       
        if( d.getElementById('frm0605:itemModeOfPayment:_1').checked == true )
        {
            if(d.getElementById('frm0605:txtNumOfInstallment').value < 1 || d.getElementById('frm0605:txtNumOfInstallment').value > 20 )
            {
                alert("Please re-enter No. of Installment. Allowed values from 1 to 20 only.");
                return;
            }
        }   
        if(d.getElementById('frm0605:itemModeOfPayment:_1').checked == false && d.getElementById('frm0605:itemModeOfPayment:_2').checked == false && d.getElementById('frm0605:itemModeOfPayment:_3').checked == false )
        {
            alert("Please select Type of Payment on Item 18.")
            return;
        }       
        if(d.getElementById('frm0605:txtTax19').value <= 0 )
        {
            alert("Please enter valid value (greater than 0) for Item 19 under Computation of Tax.");
            return;
        }

        // all forms validate with entry
        d.getElementById('frm0605:cmdValidate').disabled = true;
        d.getElementById('frm0605:cmdEdit').disabled = false;
        d.getElementById('btnUpload').disabled = false;
        disableAllControl();

        alert("Validation successful. Click on Edit if you wish to modify your entries.");
        return;
    }
    
    function showATCDiv()
    {   
        d.getElementById('Content').style.display = "none";
        $('#modalAtc').show('blind');
    }

    function cancelATC()
    {
        
        d.getElementById('Content').style.display = 'block';
        $('#modalAtc').hide('blind');
        $('#DummyTxt').html("Creator");
        $('#DummyTxt').html("");        
    }

    function getATCCode()
    {
        var listATCtable =   d.getElementById('tbllistAtcCode');
        for(i = 1 ; i <= listATCtable.rows.length; i++ )
        {

            if(d.getElementById('AtcCode'+i) != null)
            {
                // check if checked id'ed ATC
                if (d.getElementById('AtcCode'+i).checked == true )
                {  
                    d.getElementById('txtATCCode').value = d.getElementById('AtcCode'+i).value;
                    cancelATC();
                    return;
                }
            }
        }
        cancelATC();
    }

    function showTaxTypeCodeDiv()
    {
        d.getElementById('Content').style.display = "none";
        $('#modalTaxTypeCode').show('blind');
    }
    

    function getTaxTypeCode()
    {
        var listTaxTypetable =   d.getElementById('tbllistTaxTypeCode');

        for(i = 1 ; i <= listTaxTypetable.rows.length; i++ )
        {
            
            if(d.getElementById('TaxTypeCode'+i) != null)
            {  
                // check if checked id'ed ATC
                if (d.getElementById('TaxTypeCode'+i).checked == true )
                {
                    d.getElementById('txtTaxTypeCode').value = d.getElementById('TaxTypeCode'+i).value;
                    cancelTaxTypeCode();
                    return;
                }
            }
        }
        cancelTaxTypeCode();
    }

    
    function cancelTaxTypeCode()
    {   
        d.getElementById('Content').style.display = 'block';
        $('#modalTaxTypeCode').hide('blind');
        $('#DummyTxt').html("Creator");
        $('#DummyTxt').html("");            
    }
    
    function dateyear()
    {
        if (d.getElementById('frm0605:itemFiscalStartMonth:_1').checked == true)
        {
            d.getElementById('frm0605:itemYearEndMonth').selectedIndex = 12;
            d.getElementById('frm0605:itemYearEndMonth').disabled = true;
        }
        else if (d.getElementById('frm0605:itemFiscalStartMonth:_2').checked == true && d.getElementById('frm0605:itemYearEndMonth').selectedIndex == 12)
        {
            alert('You have entered invalid month for Fiscal Year');
            d.getElementById('frm0605:itemYearEndMonth').selectedIndex = 0;
            d.getElementById('frm0605:itemYearEndMonth').disabled = false;
        }
    }
    function datemonth()
    {
        if (d.getElementById('frm0605:itemFiscalStartMonth:_1').checked == true && d.getElementById('frm0605:itemYearEndMonth').selectedIndex != 12)
        {
            alert('You have entered a filing year not ending in December. This filing will be considered as a Fiscal Year Filing.');
            d.getElementById('frm0605:itemFiscalStartMonth:_2').checked = true;
        }
        else if (d.getElementById('frm0605:itemFiscalStartMonth:_2').checked == true && d.getElementById('frm0605:itemYearEndMonth').selectedIndex == 12)
        {
            alert('You have entered a filing year ending in December. This filing will be considered as a Calendar Year Filing.');
            d.getElementById('frm0605:itemFiscalStartMonth:_1').checked = true;
        }
    }

    function initialValidateBeforeSave() {
            if( (d.getElementById('frm0605:txtReturnPeriodMonth').value == "" || d.getElementById('frm0605:txtReturnPeriodDay').value == "" || d.getElementById('frm0605:txtReturnPeriodYear').value == "")  )
            {
                alert("Please enter a valid Return Period on Item 7.");
                return;
            }
            if( (d.getElementById('frm0605:txtTIN1').value == "" || d.getElementById('frm0605:txtTIN2').value == "" || d.getElementById('frm0605:txtTIN3').value == "" || d.getElementById('frm0605:txtBranchCode').value == "")  )
            {
                alert("Please enter a valid TIN number on Item 9.");
                return false;
            }   
            if((d.getElementById('frm0605:txtRDOCode').value == "000"))
            {
                alert("Please enter a valid RDO Code on Item 10.");
                return false;
            }   
            if( (d.getElementById('frm0605:txtTaxPayerName').value == "")  )
            {
                alert("Please enter a valid Taxpayer Name on Item 13.");
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

    $('#bg').hide(); //830
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

function ShowContainer(param) {
        $('#' + param ).show();
}

function HideContainer(param) {
            if ($('#' + param).css('display') != 'none') {
                $('#' + param).hide();
            }
}


    function saveData()
    {
        var valid = initialValidateBeforeSave();
        if(valid == true){
                var form = $('#frmMain');
                var disabled = form.find(':input:disabled').removeAttr('disabled');
            
                var data = form.serialize();
                save('0605',data);
                
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
        saveAndExit('0605',data);
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

        submitAndSave('0605', data, company_id);
        
        disabled.attr('disabled','disabled');
        return false;
    }

    function gotoMain(){
        var company_id = $('#frmMain').find('input[name="company"]').val();
        window.location = '/companies/'+ company_id +'/histories/0605';
    }
</script>
@endsection

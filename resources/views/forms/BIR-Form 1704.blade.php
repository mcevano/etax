@extends('layouts.app')
@section('title', '| BIR Form No. 1704')

@section('content')
<!-- <div class="loader"></div>  -->
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
        <button type="button" class="btn btn-danger btn-exit" id="1704" company='{{$company->id}}'>No</button>
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
        <button type="button" class="btn btn-success btn-exit" id="1704" company='{{$company->id}}'>Okay</button>
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
            <button type="button" class="btn btn-danger btn-filing-success" form='1704' company='{{$company->id}}'>Okay</button>
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
            <div id="wrapper" style="margin: 0 auto; position: relative; width: 1001px; ">
      
        <table border="0" width="846" cellspacing="0" cellpadding="0" align="center" style="background-repeat: repeat-x;">
        <tr>
            <td>
                <div id="formPaper">
                    <table width="846" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td align="center">
                                    <table style="height: 0px;" border="0" cellpadding="0" cellspacing="0" width="996">
                                        <tr>
                                            <td width="82"  style='padding:0px;' valign="middle" align="center">                    
                                                <p><img src="{{ asset('images/birflog.gif') }}" width="51" height="49" valign='3' halign='3' alt="birlogo" /></p>
                                            </td>
                                            <td valign="middle" width="158">
                                                <label face="Arial" size="1px">Republika ng Pilipinas
                                            <br/>Kagawaran ng Pananalapi
                                            <br/>Kawanihan ng Rentas Internas</label>
                                            </td>
                                            <td valign="top" width="323" style="text-align: center;">
                                                <font size="5px" style="font-weight:bold;text-align: center;">Improperly Accumulated Earnings Tax Return</font>
                                            </td>
                                            <td valign="center" width="145">
                                                <label face="Arial" size="1px">BIR Form No.</label><br/>
                                                <font face="Arial" size="6px">1704</font><br/>
                                                <label face="Arial" size="1px">June 2003(ENCS)</label>
                                        </tr>
                                        <tr>
                                            <td colspan="4" height="0" style="background-color: rgb(255, 255, 255);">
                                                <label size="1px" face="Arial, Helvetica, sans-serif">For Corporation</label>
                                            </td>
                                        </tr>
                                    </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table width="840" border="0" cellpadding="0" cellspacing="0" class="tblForm">
                                    <tr>
                                        <td width="40%" height="0px" valign="top" class="tblFormTd">
                                            <table border="0" cellspacing="0" cellpadding="0">

                                                <tr>
                                                    <td width="10%"><font size="1.5px" style="font-weight:bold">&nbsp;1&nbsp;</font></td>
                                                    <td width="90%">
                                                        <font size="1" style="font-size: 11px;">For the&nbsp;
                                                            <input checked id="frm1704:itemFiscalStartMonth:_1" name="frm1704:itemFiscalStartMonth" type="radio" value="C" onclick="dateyear()" />
                                                            Calendar
                                                            <input id="frm1704:itemFiscalStartMonth:_2" name="frm1704:itemFiscalStartMonth" type="radio" value="F" onclick="dateyear()" />
                                                            Fiscal
                                                        </font>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="20%" rowspan="2" valign="top" class="tblFormTd">
                                            <table width="100%" border="0" cellpadding="0"
                                                   cellspacing="0" height="0px">
                                                <tbody>
                                                    <tr valign="middle">
                                                        <td  height="0px">
                              <font size="1.5px" style="font-weight:bold">3</font>
                              <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Amended Return?</font>
                                                        </td>
                                                    </tr>
                                                    <tr valign="middle" align="center">
                                                        <td height="0px">
                                                            <table class="iceSelOneRb-dis fieldSelect1-dis" border="0" cellpadding="0" cellspacing="0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td><font size="1">
                                                                            <input id="frm1704:amendedRtn_1" name="frm1704:amendedRtn" value="Y" type="radio" onclick="d.getElementById('frm1704:txt25').disabled = false;" />
                                                                            <label class="iceSelOneRb-dis fieldSelect1-dis-dis" for="frm1704:j_id218:_1">Yes</label>
                                                                        </font></td>
                                                                        <td><font size="1">
                                                                            <input checked id="frm1704:amendedRtn_2" name="frm1704:amendedRtn" value="N" type="radio" onclick="d.getElementById('frm1704:txt25').disabled = true;d.getElementById('frm1704:txt25').value = '0.00';compute26();" />
                                                                            <label class="iceSelOneRb-dis fieldSelect1-dis-dis" for="frm1704:j_id218:_2">No </label>
                                                                        </font></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                          
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td width="20%" rowspan="2" valign="top" class="tblFormTd">
                                            <table border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="10%"><font size="1.5px" style="font-weight:bold">&nbsp;4&nbsp;</font></td>
                                                    <td width="90%"><font size="1" style="font-size: 11px;">No. of Sheets Attached</font><br/>
                            <input class="iceInpTxt-dis disabled-dis" id="frm1704:txtSheets" maxlength="2" name="frm1704:txtSheets" size="4" style="text-align:right" type="text" value="0" onkeypress="return wholenumber(this, event)" />
                          </td>
                                                </tr>
                                            </table>       
                    </td>
                                        <td width="20%" rowspan="2" valign="top" class="tblFormTd">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="10%"><font size="1.5px" style="font-weight:bold">&nbsp;5&nbsp;</font></td>
                                                    <td width="90%"><font size="1" style="font-size: 11px;">ATC</font><br/>
                            <input class="iceInpTxt-dis fieldText1-dis" disabled id="frm1704:txtAtc" maxlength="5" name="frm1704:txtAtc" size="5" style="background-color: rgb(220, 220, 220);" value="1C370" type="text" />
                          </td> 
                        </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="0px" valign="top" class="tblFormTd">
                      <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="10%"><font size="1.5px" style="font-weight:bold">&nbsp;2&nbsp;</font></td>
                                                    <td width="90%" nowrap><font size="1" style="font-size: 11px;">Year Ended (MM/YYYY)</font>
                            <select class="iceSelOneMnu" id="frm1704:monthEnd" name="frm1704:monthEnd" size="1" onblur="datemonth()">
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
                                                            <input class="iceInpTxt input" id="frm1704:txtYearEnded" maxlength="4" name="frm1704:txtYearEnded" size="2" style="text-align: right" type="text" value="" onblur="blockletterWithout2Decimal(this)" onkeypress="return wholenumber(this, event)" />
                          </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table></td>
                        </tr>
            
                        <tr>
              <td>
                            <table width="840" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td width="840" colspan="2" class="tblFormTdPart">
                                            <table width="81%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="20%">&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;">Part I</font></td>
                                                    <td width="80%">
                                                        <div align="center"><font size="2" style="font-weight:bold;letter-spacing: 1.5px;">Background Information</font></div>
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
                                <table border="0" cellpadding="0" cellspacing="0" class="tblForm" width="840">
                                    <tr>
                                        <td width="35%" valign="top" class="tblFormTd">
                      <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="15"><font size="1.5px" style="font-weight:bold">&nbsp;6&nbsp;</font></td>
                                                    <td width="42"><font size="1" style="font-size: 11px;">TIN</font></td>
                                                    <td width="200"><font size="1">
                                                            <input id="frm1704:txtTin1" name="frm1704:txtTin1" size="2" maxlength="3"  type="text" value="{{$company->tin1}}" onkeypress="return wholenumber(this, event)" />
                                                            <input id="frm1704:txtTin2" name="frm1704:txtTin2" size="2" maxlength="3"  type="text" value="{{$company->tin2}}" onkeypress="return wholenumber(this, event)" />
                                                            <input id="frm1704:txtTin3" name="frm1704:txtTin3" size="2" maxlength="3"  type="text" value="{{$company->tin3}}" onkeypress="return wholenumber(this, event)" />
                                                            <input id="frm1704:txtBranch" name="frm1704:txtBranch" size="2" maxlength="3"  type="text" value="{{$company->tin4}}" onkeypress="return letternumber(event)"/>
                                                        </font></td>
                                                </tr>
                                            </table>
                    </td>
                                        <td width="25%" valign="top" class="tblFormTd"><table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="22"><font size="1.5px" style="font-weight:bold">&nbsp;7&nbsp;</font></td>
                                                    <td width="64"><font size="1" style="font-size: 11px;">RDO Code

                                                        </font></td>
                                                    <td width="48" id="rdoSelect">
                                                    <select class='iceSelOneMnu' id='frm1704:txtRDOCode' name='frm1704:txtRDOCode' size='1' disabled="" >
                                                      <option value='{{$company->rdo_code}}'>{{$company->rdo_code}}</option>
                                                    </select>
                          </td>
                                                </tr>
                                            </table></td>
                                        <td width="40%" valign="top" class="tblFormTd">
                      <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="10%"><font size="1.5px" style="font-weight:bold">&nbsp;8&nbsp;</font></td>
                                                    <td width="90%" nowrap><font size="1" style="font-size: 11px;">Line of Business/Occupation</font>
                            <input id="frm1704:txtLineBus" name="frm1704:txtLineBus" size="20" type="text" value="{{$company->line_business}}" disabled="" />
                          </td>
                                                </tr>
                                            </table>
                    </td>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table width="840" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td width="100%" valign="top" class="tblFormTd">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td>
                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td width="2%"><font size="1.5px" style="font-weight:bold;">&nbsp;9&nbsp;</font></td>
                                                                <td width="13%"><font size="1" style="font-size: 11px;">Taxpayer's Name</font></td>
                                <td>
                                                                    <input id="frm1704:txtName" maxlength="75" name="frm1704:txtName" size="63"  type="text" value="{{$company->registered_name}}" disabled="" />
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
                                <table width="840" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td width="551" valign="top" class="tblFormTd">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td>
                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td width="11"><font size="1.5px" style="font-weight:bold;">&nbsp;10&nbsp;</font></td>
                                                                <td><font size="1" style="font-size: 11px;">Registered Address</font></td>
                                <td>
                                  <input id="frm1704:txtAddress" name="frm1704:txtAddress"  maxlength="70" size="65"  type="text" value="{{$company->address}}" disabled />
                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="191" valign="top" class="tblFormTd">
                                            <table width="130" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="149"><font size="1.5px" style="font-weight:bold;">&nbsp;11&nbsp;</font><font size="1" style="font-size: 11px;">Zip Code</font></td>
                          <td>
                                                        <input id="frm1704:txtZipCode" name="frm1704:txtZipCode"  style="text-align:right" maxlength="4" size="7"  type="text" value="{{$company->zip_code}}" disabled="" onkeypress="return wholenumber(this, event)" />
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
                                <table border="0" cellspacing="0" cellpadding="0" class="tblForm" width="840" height="0px">
                                    <tr>
                                        <td width="100%" height="0px" valign="top" class="tblFormTd"><table border="0" cellspacing="0" cellpadding="0" width="100%">
                                                <tbody>
                                                    <tr>
                                                        <td width="25%" nowrap>
                                                            <font face="Arial, Helvetica, sans-serif" size="1.5px"><b>12</b></font> <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Date of Incorporation(mm/dd/yyyy)</font></td>
                                                        <td width="25%" nowrap="nowrap">
                                                            <font face="Arial, Helvetica, sans-serif" size="1.5px">
                                                                <b>12A
                                                                    <input id="frm1704:txt12AMM" maxlength="2" name="frm1704:txt12AMM" size="2"  style="text-align:right" value="" type="text" onkeypress="return wholenumber(this, event)" />
                                                                    <input id="frm1704:txt12ADD" maxlength="2" name="frm1704:txt12ADD" size="2"  style="text-align:right" value="" type="text" onkeypress="return wholenumber(this, event)" />
                                                                    <input id="frm1704:txt12AYYYY" maxlength="4" name="frm1704:txt12AYYYY" size="4"  style="text-align:right" value="" type="text" onkeypress="return wholenumber(this, event)" />
                                                                </b>
                                                            </font> <font face="Arial, Helvetica, sans-serif" size="1">&nbsp;</font> <font face="Arial, Helvetica, sans-serif" size="2"><b></b></font></td>
                                                        <td width="25%" nowrap>
                                                            <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">&nbsp;Date of Incorporation with BIR(mm/dd/yyyy)</font> <font face="Arial, Helvetica, sans-serif" size="2"><b></b></font></td>
                                                        <td width="25%" nowrap="nowrap">
                                                            <font face="Arial, Helvetica, sans-serif" size="1.5px">
                                                                <b>12B
                                                                    <input id="frm1704:txt12BMM" maxlength="2" name="frm1704:txt12BMM" size="2"  style="text-align:right" value="" type="text" onkeypress="return wholenumber(this, event)" />
                                                                    <input id="frm1704:txt12BDD" maxlength="2" name="frm1704:txt12BDD" size="2"  style="text-align:right" value="" type="text" onkeypress="return wholenumber(this, event)" />
                                                                    <input id="frm1704:txt12BYYYY" maxlength="4" name="frm1704:txt12BYYYY" size="4"  style="text-align:right" value="" type="text" onkeypress="return wholenumber(this, event)" />
                                                                </b>
                                                            </font>
                                                        </td>
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
                                <table width="840" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td class="tblFormTdPart">
                                            <table width="613" height="0px" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="124">&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;">Part II</font></td>
                                                    <td width="489">
                                                        <div align="center"><font size="2" style="font-weight:bold;letter-spacing: 3px;">Computation of Tax</font></div>
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
                                <table width="838" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                    <tr>
                                        <td><table border="0" align="left" cellspacing="1" width="100%">
                                                <tbody>
                          <tr>
                                                        <td colspan="3"><font face="Arial, Helvetica, sans-serif" size="1.5px"><b>13</b></font> <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">&nbsp;Taxable Income</font></td>
                                                        <td colspan="3"><div align="right"></div></td>
                                                        <td nowrap="nowrap">
                                                            <div align="right"><font face="Arial, Helvetica, sans-serif" size="1.5px"><b>13</b></font>
                                                                <input class="iceInpTxt" id="frm1704:txt13" maxlength="25" name="frm1704:txt13" size="20" style="text-align: right;" value="0.00" type="text" onblur="round(this,2); compute18()" onkeypress="return numbersonly(this, event)" />
                                                            </div>
                                                        </td>
                                                    </tr>
                          <tr>
                            <td colspan="7">
                                                            <font face="Arial, Helvetica, sans-serif" size="1.5px"><b>&nbsp;&nbsp;&nbsp;&nbsp;14</b></font> <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">&nbsp;Add: Income exempt from Tax(Attach additional sheets, if necessary)</font>
                                                        </td>
                          </tr>
                          <tr class="iceDatTblRow1 dataPaginatorTableRow1" id="frm1704:dtPart2:0">
                                                        <td class="iceDatTblCol1 dataPaginatorTableCol1" ><font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">14A</font></td>
                                                        <td class="iceDatTblCol2 dataPaginatorTableCol2" >
                                                            <input id="frm1704:txt14A" maxlength="50" name="frm1704:txt14A" size="50" type="text" />
                                                        </td>
                            <td>&nbsp;</td>
                                                        <td class="iceDatTblCol1 dataPaginatorTableCol1" >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">14B</font>
                                                        </td>
                                                        <td class="iceDatTblCol2 dataPaginatorTableCol2" >
                                                            <input id="frm1704:txt14B" maxlength="25" name="frm1704:txt14B" size="20" style="text-align: right;" value="0.00" type="text" onblur="round(this,2); compute17B()" onkeypress="return numbersonly(this, event)" />
                                                        </td>
                            <td colspan="2">&nbsp;</td>
                                                    </tr>
                                                    <tr class="iceDatTblRow2 dataPaginatorTableRow2" id="frm1704:dtPart2:1">
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">14C</font>
                                                        </td>
                                                        <td class="iceDatTblCol2 dataPaginatorTableCol2" >
                                                            <input id="frm1704:txt14C" maxlength="50" name="frm1704:txt14C" size="50" type="text" />
                                                        </td>
                            <td>&nbsp;</td>
                                                        <td class="iceDatTblCol1 dataPaginatorTableCol1" >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">14D</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt14D" maxlength="25" name="frm1704:txt14D" size="20" style="text-align: right;" value="0.00" type="text" onblur="round(this,2); compute17B()" onkeypress="return numbersonly(this, event)" />
                                                        </td>
                            <td colspan="2">&nbsp;</td>
                                                    </tr>
                                                    <tr class="iceDatTblRow2 dataPaginatorTableRow2" id="frm1704:dtPart2:1">
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">14E</font>
                                                        </td>
                                                        <td class="iceDatTblCol2 dataPaginatorTableCol2" >
                                                            <input id="frm1704:txt14E" maxlength="50" name="frm1704:txt14E" size="50" type="text" />
                                                        </td>
                            <td>&nbsp;</td>
                                                        <td class="iceDatTblCol1 dataPaginatorTableCol1" >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">14F</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt14F" maxlength="25" name="frm1704:txt14F" size="20" style="text-align: right;" value="0.00" type="text" onblur="round(this,2); compute17B()" onkeypress="return numbersonly(this, event)" />
                                                        </td>
                            <td colspan="2">&nbsp;</td>
                                                    </tr>
                                                    <tr class="iceDatTblRow2 dataPaginatorTableRow2" id="frm1704:dtPart2:1">
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">14G</font>
                                                        </td>
                                                        <td class="iceDatTblCol2 dataPaginatorTableCol2" >
                                                            <input id="frm1704:txt14G" maxlength="50" name="frm1704:txt14G" size="50" type="text" />
                                                        </td>
                            <td>&nbsp;</td>
                                                        <td class="iceDatTblCol1 dataPaginatorTableCol1" >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">14H</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt14H" maxlength="25" name="frm1704:txt14H" size="20" style="text-align: right;" value="0.00" type="text" onblur="round(this,2); compute17B()" onkeypress="return numbersonly(this, event)" />
                                                        </td>
                            <td colspan="2">&nbsp;</td>
                                                    </tr>
                                                    <tr class="iceDatTblRow2 dataPaginatorTableRow2" id="frm1704:dtPart2:1">
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">14I</font>
                                                        </td>
                                                        <td class="iceDatTblCol2 dataPaginatorTableCol2" >
                                                            <input id="frm1704:txt14I" maxlength="50" name="frm1704:txt14I" size="50" type="text" />
                                                        </td>
                            <td>&nbsp;</td>
                                                        <td class="iceDatTblCol1 dataPaginatorTableCol1" >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">14J</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt14J" maxlength="25" name="frm1704:txt14J" size="20" style="text-align: right;" value="0.00" type="text" onblur="round(this,2); compute17B()" onkeypress="return numbersonly(this, event)" />
                                                        </td>
                            <td colspan="2">&nbsp;</td>
                                                    </tr>
                                                    <tr class="iceDatTblRow2 dataPaginatorTableRow2" id="frm1704:dtPart2:1">
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">14K</font>
                                                        </td>
                                                        <td class="iceDatTblCol2 dataPaginatorTableCol2" >
                                                            <input id="frm1704:txt14K" maxlength="50" name="frm1704:txt14K" size="50" type="text" />
                                                        </td>
                            <td>&nbsp;</td>
                                                        <td class="iceDatTblCol1 dataPaginatorTableCol1" >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">14L</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt14L" maxlength="25" name="frm1704:txt14L" size="20" style="text-align: right;" value="0.00" type="text" onblur="round(this,2); compute17B()" onkeypress="return numbersonly(this, event)" />
                                                        </td>
                            <td colspan="2">&nbsp;</td>
                                                    </tr>
                                                    <tr class="iceDatTblRow2 dataPaginatorTableRow2" id="frm1704:dtPart2:1">
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">14M</font>
                                                        </td>
                                                        <td class="iceDatTblCol2 dataPaginatorTableCol2" >
                                                            <input id="frm1704:txt14M" maxlength="50" name="frm1704:txt14M" size="50" type="text" />
                                                        </td>
                            <td>&nbsp;</td>
                                                        <td class="iceDatTblCol1 dataPaginatorTableCol1" >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">14N</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt14N" maxlength="25" name="frm1704:txt14N" size="20" style="text-align: right;" value="0.00" type="text" onblur="round(this,2); compute17B()" onkeypress="return numbersonly(this, event)" />
                                                        </td>
                            <td colspan="2">&nbsp;</td>
                                                    </tr>
                                                    <tr class="iceDatTblRow2 dataPaginatorTableRow2" id="frm1704:dtPart2:1">
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">14O</font>
                                                        </td>
                                                        <td class="iceDatTblCol2 dataPaginatorTableCol2" >
                                                            <input id="frm1704:txt14O" maxlength="50" name="frm1704:txt14O" size="50" type="text" />
                                                        </td>
                            <td>&nbsp;</td>
                                                        <td class="iceDatTblCol1 dataPaginatorTableCol1" >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">14P</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt14P" maxlength="25" name="frm1704:txt14P" size="20" style="text-align: right;" value="0.00" type="text" onblur="round(this,2); compute17B()" onkeypress="return numbersonly(this, event)" />
                                                        </td>
                            <td colspan="2">&nbsp;</td>
                                                    </tr>
                                                    <tr class="iceDatTblRow2 dataPaginatorTableRow2" id="frm1704:dtPart2:1">
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">14Q</font>
                                                        </td>
                                                        <td class="iceDatTblCol2 dataPaginatorTableCol2" >
                                                            <input id="frm1704:txt14Q" maxlength="50" name="frm1704:txt14Q" size="50" type="text" />
                                                        </td>
                            <td>&nbsp;</td>
                                                        <td class="iceDatTblCol1 dataPaginatorTableCol1" >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">14R</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt14R" maxlength="25" name="frm1704:txt14R" size="20" style="text-align: right;" value="0.00" type="text" onblur="round(this,2); compute17B()" onkeypress="return numbersonly(this, event)" />
                                                        </td>
                            <td colspan="2">&nbsp;</td>
                                                    </tr>
                                                    <tr class="iceDatTblRow2 dataPaginatorTableRow2" id="frm1704:dtPart2:1">
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">14S</font>
                                                        </td>
                                                        <td class="iceDatTblCol2 dataPaginatorTableCol2" >
                                                            <input id="frm1704:txt14S" maxlength="50" name="frm1704:txt14S" size="50" type="text" />
                                                        </td>
                            <td>&nbsp;</td>
                                                        <td class="iceDatTblCol1 dataPaginatorTableCol1" >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">14T</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt14T" maxlength="25" name="frm1704:txt14T" size="20" style="text-align: right;" value="0.00" type="text" onblur="round(this,2); compute17B()" onkeypress="return numbersonly(this, event)" />
                                                        </td>
                            <td colspan="2">&nbsp;</td>
                                                    </tr>
                          <tr>
                            <td colspan="7" nowrap="nowrap">
                                                            <font face="Arial, Helvetica, sans-serif" size="1.5px" style="font-size: 11px;"><b>&nbsp;&nbsp; 15</b></font>
                                                            <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Income excluded from Gross Income(Attach additional sheets, if necessary)</font>
                                                        </td>
                          </tr>
                          <tr id="frm1704:dtPart2B:0">
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">15A</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt15A" maxlength="50" name="frm1704:txt15A"  size="50" type="text" />
                                                        </td>
                            <td>&nbsp;</td>
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">15B</font></td>
                                                        <td >
                                                            <input id="frm1704:txt15B" maxlength="25" name="frm1704:txt15B" size="20" style="text-align: right;" value="0.00" type="text" onblur="round(this,2); compute17B()" onkeypress="return numbersonly(this, event)" />
                                                        </td>
                            <td colspan="2">&nbsp;</td>
                                                    </tr>
                                                    <tr id="frm1704:dtPart2B:0">
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">15C</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt15C" maxlength="50" name="frm1704:txt15C"  size="50" type="text" />
                                                        </td>
                            <td>&nbsp;</td>
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">15D</font></td>
                                                        <td >
                                                            <input id="frm1704:txt15D" maxlength="25" name="frm1704:txt15D" size="20" style="text-align: right;" value="0.00" type="text" onblur="round(this,2); compute17B()" onkeypress="return numbersonly(this, event)" />
                                                        </td>
                            <td colspan="2">&nbsp;</td>
                                                    </tr>
                                                    <tr id="frm1704:dtPart2B:0">
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">15E</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt15E" maxlength="50" name="frm1704:txt15E"  size="50" type="text" />
                                                        </td>
                            <td>&nbsp;</td>
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">15F</font></td>
                                                        <td >
                                                            <input id="frm1704:txt15F" maxlength="25" name="frm1704:txt15F" size="20" style="text-align: right;" value="0.00" type="text" onblur="round(this,2); compute17B()" onkeypress="return numbersonly(this, event)" />
                                                        </td>
                            <td colspan="2">&nbsp;</td>
                                                    </tr>
                                                    <tr id="frm1704:dtPart2B:0">
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">15G</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt15G" maxlength="50" name="frm1704:txt15G"  size="50" type="text" />
                                                        </td>
                            <td>&nbsp;</td>
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">15H</font></td>
                                                        <td >
                                                            <input id="frm1704:txt15H" maxlength="25" name="frm1704:txt15H" size="20" style="text-align: right;" value="0.00" type="text" onblur="round(this,2); compute17B()" onkeypress="return numbersonly(this, event)" />
                                                        </td>
                            <td colspan="2">&nbsp;</td>
                                                    </tr>
                                                    <tr id="frm1704:dtPart2B:0">
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">15I</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt15I" maxlength="50" name="frm1704:txt15I"  size="50" type="text" />
                                                        </td>
                            <td>&nbsp;</td>
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">15J</font></td>
                                                        <td >
                                                            <input id="frm1704:txt15J" maxlength="25" name="frm1704:txt15J" size="20" style="text-align: right;" value="0.00" type="text" onblur="round(this,2); compute17B()" onkeypress="return numbersonly(this, event)" />
                                                        </td>
                            <td colspan="2">&nbsp;</td>
                                                    </tr>
                                                    <tr id="frm1704:dtPart2B:0">
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">15K</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt15K" maxlength="50" name="frm1704:txt15K"  size="50" type="text" />
                                                        </td>
                            <td>&nbsp;</td>
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">15L</font></td>
                                                        <td >
                                                            <input id="frm1704:txt15L" maxlength="25" name="frm1704:txt15L" size="20" style="text-align: right;" value="0.00" type="text" onblur="round(this,2); compute17B()" onkeypress="return numbersonly(this, event)" />
                                                        </td>
                            <td colspan="2">&nbsp;</td>
                                                    </tr>
                                                    <tr id="frm1704:dtPart2B:0">
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">15M</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt15M" maxlength="50" name="frm1704:txt15M"  size="50" type="text" />
                                                        </td>
                            <td>&nbsp;</td>
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">15N</font></td>
                                                        <td >
                                                            <input id="frm1704:txt15N" maxlength="25" name="frm1704:txt15N" size="20" style="text-align: right;" value="0.00" type="text" onblur="round(this,2); compute17B()" onkeypress="return numbersonly(this, event)" />
                                                        </td>
                            <td colspan="2">&nbsp;</td>
                                                    </tr>
                                                    <tr id="frm1704:dtPart2B:0">
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">15O</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt15O" maxlength="50" name="frm1704:txt15O"  size="50" type="text" />
                                                        </td>
                            <td>&nbsp;</td>
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">15P</font></td>
                                                        <td >
                                                            <input id="frm1704:txt15P" maxlength="25" name="frm1704:txt15P" size="20" style="text-align: right;" value="0.00" type="text" onblur="round(this,2); compute17B()" onkeypress="return numbersonly(this, event)" />
                                                        </td>
                            <td colspan="2">&nbsp;</td>
                                                    </tr>
                                                    <tr id="frm1704:dtPart2B:0">
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">15Q</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt15Q" maxlength="50" name="frm1704:txt15Q"  size="50" type="text" />
                                                        </td>
                            <td>&nbsp;</td>
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">15R</font></td>
                                                        <td >
                                                            <input id="frm1704:txt15R" maxlength="25" name="frm1704:txt15R" size="20" style="text-align: right;" value="0.00" type="text" onblur="round(this,2); compute17B()" onkeypress="return numbersonly(this, event)" />
                                                        </td>
                            <td colspan="2">&nbsp;</td>
                                                    </tr>
                                                    <tr id="frm1704:dtPart2B:0">
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">15S</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt15S" maxlength="50" name="frm1704:txt15S"  size="50" type="text" />
                                                        </td>
                            <td>&nbsp;</td>
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">15T</font></td>
                                                        <td >
                                                            <input id="frm1704:txt15T" maxlength="25" name="frm1704:txt15T" size="20" style="text-align: right;" value="0.00" type="text" onblur="round(this,2); compute17B()" onkeypress="return numbersonly(this, event)" />
                                                        </td>
                            <td colspan="2">&nbsp;</td>
                                                    </tr>
                          <tr>
                            <td colspan="7" nowrap="nowrap">
                                                            <font face="Arial, Helvetica, sans-serif" size="1.5px" style="font-size: 11px;"><b>&nbsp;&nbsp; 16</b></font>
                                                            <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Income subject to Final Tax(Attach additional sheets, if necessary)</font>
                                                        </td>
                          </tr>
                          <tr id="frm1704:dtPart2C:0">
                                                        <td  >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">16A</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt16A" maxlength="50" name="frm1704:txt16A" size="50" type="text" />
                                                        </td>
                            <td>&nbsp;</td>
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">16B</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt16B" maxlength="25" name="frm1704:txt16B" size="20" style="text-align: right;" value="0.00" type="text" onblur="round(this,2); compute17B()" onkeypress="return numbersonly(this, event)" />
                                                        </td>
                            <td colspan="2">&nbsp;</td>
                                                    </tr>
                                                    <tr id="frm1704:dtPart2C:0">
                                                        <td  >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">16C</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt16C" maxlength="50" name="frm1704:txt16C" size="50" type="text" />
                                                        </td>
                            <td>&nbsp;</td>
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">16D</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt16D" maxlength="25" name="frm1704:txt16D" size="20" style="text-align: right;" value="0.00" type="text" onblur="round(this,2); compute17B()" onkeypress="return numbersonly(this, event)" />
                                                        </td>
                            <td colspan="2">&nbsp;</td>
                                                    </tr>
                                                    <tr id="frm1704:dtPart2C:0">
                                                        <td  >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">16E</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt16E" maxlength="50" name="frm1704:txt16E" size="50" type="text" />
                                                        </td>
                            <td>&nbsp;</td>
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">16F</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt16F" maxlength="25" name="frm1704:txt16F" size="20" style="text-align: right;" value="0.00" type="text" onblur="round(this,2); compute17B()" onkeypress="return numbersonly(this, event)" />
                                                        </td>
                            <td colspan="2">&nbsp;</td>
                                                    </tr>
                                                    <tr id="frm1704:dtPart2C:0">
                                                        <td  >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">16G</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt16G" maxlength="50" name="frm1704:txt16G" size="50" type="text" />
                                                        </td>
                            <td>&nbsp;</td>
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">16H</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt16H" maxlength="25" name="frm1704:txt16H" size="20" style="text-align: right;" value="0.00" type="text" onblur="round(this,2); compute17B()" onkeypress="return numbersonly(this, event)" />
                                                        </td>
                            <td colspan="2">&nbsp;</td>
                                                    </tr>
                                                    <tr id="frm1704:dtPart2C:0">
                                                        <td  >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">16I</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt16I" maxlength="50" name="frm1704:txt16I" size="50" type="text" />
                                                        </td>
                            <td>&nbsp;</td>
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">16J</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt16J" maxlength="25" name="frm1704:txt16J" size="20" style="text-align: right;" value="0.00" type="text" onblur="round(this,2); compute17B()" onkeypress="return numbersonly(this, event)" />
                                                        </td>
                            <td colspan="2">&nbsp;</td>
                                                    </tr>
                                                    <tr id="frm1704:dtPart2C:0">
                                                        <td  >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">16K</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt16K" maxlength="50" name="frm1704:txt16K" size="50" type="text" />
                                                        </td>
                            <td>&nbsp;</td>
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">16L</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt16L" maxlength="25" name="frm1704:txt16L" size="20" style="text-align: right;" value="0.00" type="text" onblur="round(this,2); compute17B()" onkeypress="return numbersonly(this, event)" />
                                                        </td>
                            <td colspan="2">&nbsp;</td>
                                                    </tr>
                                                    <tr id="frm1704:dtPart2C:0">
                                                        <td  >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">16M</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt16M" maxlength="50" name="frm1704:txt16M" size="50" type="text" />
                                                        </td>
                            <td>&nbsp;</td>
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">16N</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt16N" maxlength="25" name="frm1704:txt16N" size="20" style="text-align: right;" value="0.00" type="text" onblur="round(this,2); compute17B()" onkeypress="return numbersonly(this, event)" />
                                                        </td>
                            <td colspan="2">&nbsp;</td>
                                                    </tr>
                                                    <tr id="frm1704:dtPart2C:0">
                                                        <td  >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">16O</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt16O" maxlength="50" name="frm1704:txt16O" size="50" type="text" />
                                                        </td>
                            <td>&nbsp;</td>
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">16P</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt16P" maxlength="25" name="frm1704:txt16P" size="20" style="text-align: right;" value="0.00" type="text" onblur="round(this,2); compute17B()" onkeypress="return numbersonly(this, event)" />
                                                        </td>
                            <td colspan="2">&nbsp;</td>
                                                    </tr>
                                                    <tr id="frm1704:dtPart2C:0">
                                                        <td  >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">16Q</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt16Q" maxlength="50" name="frm1704:txt16Q" size="50" type="text" />
                                                        </td>
                            <td>&nbsp;</td>
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">16R</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt16R" maxlength="25" name="frm1704:txt16R" size="20" style="text-align: right;" value="0.00" type="text" onblur="round(this,2); compute17B()" onkeypress="return numbersonly(this, event)" />
                                                        </td>
                            <td colspan="2">&nbsp;</td>
                                                    </tr>
                                                    <tr id="frm1704:dtPart2C:0">
                                                        <td  >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">16S</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt16S" maxlength="50" name="frm1704:txt16S" size="50" type="text" />
                                                        </td>
                            <td>&nbsp;</td>
                                                        <td >
                                                            <font face="Arial, Helvetica, sans-serif" size="1px" style="font-size: 11px;">16T</font>
                                                        </td>
                                                        <td >
                                                            <input id="frm1704:txt16T" maxlength="25" name="frm1704:txt16T" size="20" style="text-align: right;" value="0.00" type="text" onblur="round(this,2); compute17B()" onkeypress="return numbersonly(this, event)" />
                                                        </td>
                            <td colspan="2">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            colspan="3" nowrap="nowrap"><font face="Arial, Helvetica, sans-serif"
                                                                                          size="1.5px" style="font-size: 11px;"><b>17</b></font> <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Net Operating Loss Carry-Over (NOLCO) deducted</font></td>
                                                        <td
                                                            nowrap="nowrap"><div align="right"><font face="Arial, Helvetica,
                                                                                                 sans-serif" size="1.5px" style="font-size: 11px;"><b>17A</b></font></div></td>
                                                        <td colspan="2" nowrap="nowrap">
                                                            <font face="Arial, Helvetica, sans-serif" size="1.5px">
                                                                <input id="frm1704:txt17A" maxlength="25" name="frm1704:txt17A"  size="20" style="text-align: right;" value="0.00" type="text" onblur="round(this,2); compute17B()" onkeypress="return numbersonly(this, event)" />
                                                            </font>
                                                        </td>
                                                        <td nowrap="nowrap">
                                                            <div align="right">
                                                                <font face="Arial, Helvetica, sans-serif" size="1.5px" style="font-size: 11px;"><b>17B</b></font>
                                                                <font face="Arial, Helvetica, sans-serif" size="1">
                                                                    <input disabled="true" id="frm1704:txt17B" maxlength="25" style="background-color: rgb(220, 220, 220); text-align: right;" name="frm1704:txt17B" size="20" value="0.00" type="text" />
                                                                </font>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="6" nowrap="nowrap">
                                                            <font face="Arial, Helvetica, sans-serif" size="1.5px" style="font-size: 11px;"><b>18</b></font> <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Total (Sum of Item 13 and Item 17B)</font></td>
                                                        <td nowrap="nowrap">
                                                            <div align="right">
                                                                <font face="Arial, Helvetica, sans-serif" size="1.5px" style="font-size: 11px;"><b>18&nbsp;&nbsp;</b></font>
                                                                <font face="Arial, Helvetica, sans-serif" size="1">
                                                                    <input disabled="true" id="frm1704:txt18" maxlength="25" style="background-color: rgb(220, 220, 220); text-align: right;" name="frm1704:txt18" size="20" value="0.00" type="text" />
                                                                </font>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" nowrap="nowrap">
                                                            <font face="Arial, Helvetica, sans-serif" size="1.5px" style="font-size: 11px;"><b>19</b></font>
                                                            <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Less: Income tax paid/payable for the taxpayer year</font></td>
                                                        <td nowrap="nowrap">
                                                            <div align="right">
                                                                <font face="Arial, Helvetica, sans-serif" size="1.5px"><b>19</b></font>
                                                            </div>
                                                        </td>
                                                        <td colspan="3" nowrap="nowrap">
                                                            <font face="Arial, Helvetica, sans-serif" size="1.5px">
                                                                <input id="frm1704:txt19" maxlength="25" name="frm1704:txt19" style="text-align: right;" size="20" value="0.00" type="text" onblur="round(this,2); compute21B()" onkeypress="return numbersonly(this, event)" />
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" nowrap="nowrap">
                                                            <font face="Arial, Helvetica, sans-serif" size="1.5px" style="font-size: 11px;"><b>20</b></font>
                                                            <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dividends actually or constructively paid/issued</font></td>
                                                        <td nowrap="nowrap">
                                                            <div align="right"><font face="Arial, Helvetica, sans-serif" size="1.5px" style="font-size: 11px;"><b>20</b></font>
                                                            </div>
                                                        </td>
                                                        <td colspan="3" nowrap="nowrap">
                                                            <font face="Arial, Helvetica, sans-serif" size="1.5px">
                                                                <input id="frm1704:txt20" maxlength="25" name="frm1704:txt20" style="text-align: right;" size="20" value="0.00" type="text" onblur="round(this,2); compute21B()" onkeypress="return numbersonly(this, event)" />
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" nowrap="nowrap">
                                                            <font face="Arial, Helvetica, sans-serif" size="1.5px" style="font-size: 11px;"><b>21</b></font>
                                                            <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Amount reserved for the reasonable needs of the business
                                                                <!--<input type="button" class="printButtonClass" name="frm1704:sch1" id="frm1704:sch1" value="Sch.1" onclick="showSchedule1()" />-->
                                <a href="#" id="frm1704:sch1" onclick="showSchedule1()" >Sch.1</a>
                                                            </font>
                                                        </td>
                                                        <td nowrap="nowrap">
                                                            <div align="right"><font face="Arial, Helvetica, sans-serif" size="1.5px"><b>21A</b></font></div></td>
                                                        <td colspan="2" nowrap="nowrap">
                                                            <font face="Arial, Helvetica, sans-serif" size="1">
                                                                <input disabled="true" id="frm1704:txt21A" maxlength="25" style="background-color: rgb(220, 220, 220); text-align: right;" name="frm1704:txt21A" size="20" value="0.00" type="text" />
                                                            </font>
                                                        </td>
                                                        <td nowrap="nowrap">
                                                            <div align="right"><font face="Arial, Helvetica, sans-serif" size="1.5px"><b>21B</b></font>
                                                                <font face="Arial, Helvetica, sans-serif" size="1">
                                                                    <input disabled="true" id="frm1704:txt21B" maxlength="25" style="background-color: rgb(220, 220, 220); text-align: right;" name="frm1704:txt21B" size="20" value="0.00" type="text" />
                                                                </font>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" nowrap="nowrap"><font face="Arial,
                                                                                              Helvetica, sans-serif" size="1.5px"><b>22</b></font> <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Improperly Accumulated Taxable Income(item 18 less Item 21B)</font></td>
                                                        <td colspan="4" nowrap="nowrap">
                                                            <div align="right"><font face="Arial, Helvetica, sans-serif" size="1.5px"><b>22</b></font>
                                                                <font face="Arial, Helvetica, sans-serif" size="1">
                                                                    <input disabled="true" id="frm1704:txt22" maxlength="25" style="background-color: rgb(220, 220, 220); text-align: right;" name="frm1704:txt22" size="20" value="0.00" type="text" />
                                                                </font>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="6" nowrap="nowrap"><font face="Arial,
                                                                                              Helvetica, sans-serif" size="1.5px"><b>23</b></font> <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Tax Rate( in percent)</font></td>
                                                        <td nowrap="nowrap">
                                                            <div align="right"><font face="Arial, Helvetica, sans-serif" size="1.5px"><b>23</b></font>
                                                                <font face="Arial, Helvetica, sans-serif" size="1">
                                                                    <input disabled="true" id="frm1704:txt23" maxlength="25" style="background-color: rgb(220, 220, 220); text-align: right;" name="frm1704:txt23" size="20" value="10.00" type="text" />
                                                                </font>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="6" nowrap="nowrap"><font face="Arial,
                                                                                              Helvetica, sans-serif" size="1.5px"><b>24</b></font> <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Improperly Accumulated Earnings Tax(Item 22 mutiply by item 23)</font></td>
                                                        <td nowrap="nowrap">
                                                            <div align="right">
                                                                <font face="Arial, Helvetica, sans-serif" size="1.5px"><b>24</b></font>
                                                                <font face="Arial, Helvetica, sans-serif" size="1">
                                                                    <input disabled="true" id="frm1704:txt24" maxlength="25" style="background-color: rgb(220, 220, 220); text-align: right;" name="frm1704:txt24" size="20"  value="0.00" type="text" />
                                                                </font>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="6" nowrap="nowrap"><font face="Arial,
                                                                                              Helvetica, sans-serif" size="1.5px"><b>25</b></font> <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Tax Paid in Return Previously Filed, if this is an Amended Return</font></td>
                                                        <td nowrap="nowrap">
                                                            <div align="right">
                                                                <font face="Arial, Helvetica, sans-serif" size="1.5px"><b>25</b></font> <font face="Arial, Helvetica, sans-serif" size="1">
                                                                    <input disabled="true" id="frm1704:txt25" maxlength="25" style="text-align: right;" name="frm1704:txt25" size="20"  value="0.00" type="text" onblur="round(this,2); compute26()" onkeypress="return numbersonly(this, event)" />
                                                                </font>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="6" nowrap="nowrap"><font face="Arial,
                                                                                              Helvetica, sans-serif" size="1.5px"><b>26</b></font> <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Tax Payable/(Overpayment)(Item 24 less item 25)</font></td>
                                                        <td nowrap="nowrap">
                                                            <div align="right">
                                                                <font face="Arial, Helvetica, sans-serif" size="1.5px"><b>26</b></font>
                                                                <font face="Arial, Helvetica, sans-serif" size="1">
                                                                    <input disabled="true" id="frm1704:txt26" maxlength="25" style="background-color: rgb(220, 220, 220); text-align: right;" name="frm1704:txt26" size="20" value="0.00" type="text" />
                                                                </font>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><font face="Arial, Helvetica, sans-serif"
                                                                  size="1.5px"><b>27</b></font> <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Add: Penalties</font></td>
                                                        <td><div
                                                                align="center"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Surcharge</font></div></td>
                                                        <td><div
                                                                align="center"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Interest</font></div></td>
                                                        <td
                                                            colspan="3"><div align="center"><font face="Arial, Helvetica,
                                                                                              sans-serif" size="1" style="font-size: 11px;">Compromise</font></div>
                                                            <div align="center"></div></td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td><font face="Arial, Helvetica, sans-serif"
                                                                  size="1.5px"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></font></td>
                                                        <td nowrap="nowrap">
                                                            <div align="center"><font face="Arial, Helvetica, sans-serif" size="1.5px"><b>27A</b>
                                                                    <input id="frm1704:txt27A" maxlength="15" style="text-align: right;" name="frm1704:txt27A" size="15" value="0.00" type="text" onblur="round(this,2); compute27D()" onkeypress="return numbersonly(this, event)"/>
                                                                </font>
                                                            </div>
                                                        </td>
                                                        <td nowrap="nowrap">
                                                            <div align="center">
                                                                <font face="Arial, Helvetica, sans-serif" size="1.5px"><b>27B</b>
                                                                    <input id="frm1704:txt27B" maxlength="15" style="text-align: right;" name="frm1704:txt27B" size="15" value="0.00" type="text" onblur="round(this,2); compute27D()" onkeypress="return numbersonly(this, event)"/>
                                                                </font>
                                                            </div>
                                                        </td>
                                                        <td colspan="3" nowrap="nowrap">
                                                            <div align="center">
                                                                <font face="Arial, Helvetica, sans-serif" size="1.5px"><b>27C</b>
                                                                    <input id="frm1704:txt27C" maxlength="15" style="text-align: right;" name="frm1704:txt27C"  size="15" value="0.00" type="text" onblur="round(this,2); compute27D()" onkeypress="return numbersonly(this, event)"/>
                                                                </font>
                                                            </div>
                                                        </td>
                                                        <td nowrap="nowrap">
                                                            <div align="right">
                                                                <font face="Arial, Helvetica, sans-serif" size="1.5px"><b>27D</b>
                                                                    <input disabled="true" id="frm1704:txt27D" maxlength="25" style="background-color: rgb(220, 220, 220); text-align: right;" name="frm1704:txt27D" size="20" value="0.00" type="text" />
                                                                </font>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="6" nowrap="nowrap"><font face="Arial,
                                                                                              Helvetica, sans-serif" size="1.5px"><b>28</b></font> <font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Total Amount Payable(Sum of Item 26 and item 27D)</font></td>
                                                        <td nowrap="nowrap">
                                                            <div align="right">
                                                                <font face="Arial, Helvetica, sans-serif" size="1.5px"><b>28</b>
                                                                    <input disabled="true" id="frm1704:txt28" maxlength="25" style="background-color: rgb(220, 220, 220); text-align: right;" name="frm1704:txt28" size="20" value="0.00" type="text" />
                                                                </font>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table></td>
                                    </tr>
                  <tr>
                                        <td style="background-color: #FFF;">
                      <div class="imgClass" align='center' width="840">
                        <!-- <img id="frm1704:jurat" src="../img/jurat/1704_top.jpg" width="100%" height="100"> -->
                        <table style="border-top: 3px solid black; font-family:arial; font-size:10px; text-align: center; table-layout: fixed;">
                          <tr>
                            <td colspan="2">We declare, under the penalties of perjury, that this return has made in,good faith, verified by us, and to the best of our knowledge and belief, is true
                              <br/>and correct, pursuant to the provisions of National,Internal Revenue Code, as amended, and the regulations issued under,authority thereof.
                              <br/>&nbsp;</td>
                          </tr>
                          <tr>
                            <td><b>29</b>________________________________________________________
                              <br/>President/Vice-President/Authorized Representative
                              <br/>(Signature over printed Name)</td>
                            <td><b>30</b>________________________________________________________
                              <br/>Treasurer/Asst. Treasurer/Authorized Representative
                              <br/>(Signature over printed Name)</td>
                          </tr>
                          <tr>
                            <td>_____________________________________
                              <br/>Tax Agent
                              <br/></td>
                            <td>_____________________________________
                              <br/>Tax Agent Accreditation No.
                              <br/>&nbsp;</td>
                          </tr>
                        </table>
                      </div>
                      <table cellspacing="1" width="100%">
                                                <tbody>
                                                    <tr>
                                                        <td width="21%"><div align="center"><b><font
                                                                        face="Arial, Helvetica, sans-serif" size="1">Community Tax Certificate Number</font></b></div></td>
                                                        <td
                                                            width="29%"><div align="center"><b><font face="Arial, Helvetica,
                                                                                                 sans-serif" size="1">Place of Issue</font></b></div></td>
                                                        <td
                                                            width="27%"><div align="center"><b><font face="Arial, Helvetica,
                                                                                                 sans-serif" size="1">Date Issued(DD/MM/YYYY)</font></b></div></td>
                                                        <td
                                                            width="23%"><div align="center"><b><font face="Arial, Helvetica,
                                                                                                 sans-serif" size="1">Amount</font></b></div></td>
                                                    </tr>
                                                    <tr>
                                                        <td nowrap="nowrap">
                                                            <div align="center">
                                                                <b>
                                                                    <font face="Arial, Helvetica, sans-serif" size="1.5px">31
                                                                        <input id="frm1704:txt29" maxlength="8" name="frm1704:txt29" size="8" type="text" onblur="blockletterWithout2Decimal(this)" onkeypress="return wholenumber(this, event)" />
                                                                    </font>
                                                                </b>
                                                            </div>
                                                        </td>
                                                        <td nowrap="nowrap">
                                                            <div align="center">
                                                                <b>
                                                                    <font face="Arial, Helvetica, sans-serif" size="1.5px">32
                                                                        <input id="frm1704:txt30" maxlength="20" name="frm1704:txt30" size="20" type="text" />
                                                                    </font>
                                                                </b>
                                                            </div>
                                                        </td>
                                                        <td nowrap="nowrap">
                                                            <div align="left">
                                                                <b>
                                                                    <font face="Arial, Helvetica, sans-serif" size="1.5px">33
                                                                        <input id="frm1704:txt31Day" maxlength="2" name="frm1704:txt31Day" size="2" type="text" style="text-align:right" value="" onblur="blockletterWithout2Decimal(this)" onkeypress="return wholenumber(this, event)" />
                                                                        <font face="Arial,  Helvetica, sans-serif" size="1.5px">
                                                                            <select id="frm1704:txt31Month" name="frm1704:txt31Month" size="1" >
                                                                                <option selected="selected" value="00"> </option>
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
                                                                        </font>
                                                                        <input id="frm1704:txt31Year" maxlength="4" name="frm1704:txt31Year" size="4" type="text" style="text-align:right" value="" onblur="blockletterWithout2Decimal(this)" onkeypress="return wholenumber(this, event)" />
                                                                    </font>
                                                                </b>
                                                            </div>
                                                        </td>
                                                        <td nowrap="nowrap">
                                                            <div align="center">
                                                                <b>
                                                                    <font face="Arial, Helvetica, sans-serif" size="1.5px">34
                                                                        <input id="frm1704:txt32" maxlength="25" name="frm1704:txt32" style="text-align: right;" size="20" value="0.00" type="text" onblur="round(this,2)" onkeypress="return numbersonly(this, event)" />
                                                                    </font>
                                                                </b>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr><br/>
                        <tr>
                            <td>
                <div class="imgClass" align='center' style="display:none; width:840px !important;">
                  <img id="frm1704:jurat" src="{{ asset('images/bottom_img/1704_bottom_new.jpg') }}" width="840" height="100" />
                </div>
                <div class="imgClass" align='center' style="display:none; width:840px !important;">
                  <table style="font-size:10px; text-align: left; vertical-align: top;">
                    <tr>
                      <td>Machine Validation/Revenue Official Receipt Details (If not filed with the bank)<br /><br /><br /><br /></td>
                    </tr>
                  </table>
                </div>
                                <table width="840" border="0" cellspacing="0" cellpadding="0" class="tblForm printButtonClass">
                                    <tr>
                                        <td class="tblFormTdPart">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td>
                                                        <table width="840" cellspacing="0" cellpadding="0" border="0">
                                                            <tbody>
                                                                <tr valign="middle">
                                                                    <td width="95"></td>
                                                                    <td width="650">
                                                                        <div id="frm1704:j_id743" class="icePnlGrp">
                                                                            <div align="center">
                                                                                @if($action != 'view')
                                                                                <input class="printButtonClass" type="button" value="Validate" style="width: 100px;" name="frm1704:cmdValidate" id="frm1704:cmdValidate" onclick="validateForm()" />
                                                                                <input class="printButtonClass" type="button" value="Edit" style="width: 100px;" name="frm1704:cmdEdit" id="frm1704:cmdEdit" onclick="editForm()"/>
                                                                                
                                                                                <input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />
                                                                                <input class="printButtonClass" type="button" value="Save" style="width: 100px;" name="btnSave" id="btnSave" onclick="saveData();" />
                                                                                <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                                                <input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;" name="frm1704:btnFinalCopy" id="frm1704:btnFinalCopy" onclick="submitForm();" />
                                                                                <div id="msg" class="printButtonClass" style="display:none;"></div>                                       
                                                                                @else
                                                                                   <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                                                   <input class="printButtonClass" type="button" value="Back" style="width: 100px;" onclick="gotoMain();" />
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td width="95"></td>
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
                    </table>
                    <div id="DummyTxt" style='display:none;'>  </div>
                </div>
        
        </td>
        <td valign="top">
          <img id="frm1704:bcsImg" src="{{ asset('images/BCS.jpg') }}"/></td>
        </tr>
        </table>
        
            </div>
        </div>

        <!--Start of Modal for Schedule 1-->
        <!--<div id="modalSchedule1" class="sched1-1704" style="width: 838px; display:none;" align="center">-->
    <div id="modalSchedule1" class="printSignFooterClass_1704 sched1-1704" align="center" style="width:70%; display:none; margin:auto; min-height:350px; position:relative; top:3%; left:0%; right:auto; overflow-y:auto; background:#fff;" > 
           
      <table width="95%" border="1" cellspacing="0" cellpadding="0" align="center">
                <tr>
                    <td class="modalHeader" style="text-align: left" width="25%">
                        Schedule 1
                    </td>
        </tr>
        <tr>
                    <td class="modalHeader" style="text-align: center" width="75%">
                        Schedule of amount reserved for the reasonable needs of the business
                        <br/>(emanating from the covered year's taxable income)
                    </td>
                </tr>
        <br/>
            </table>
            <table border="1" width="95%" align="center" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="left" class="modalColumnHeader" colspan="2" >
                        Allowance for the increase in the accumulation of earnings
                    </td>
                </tr>
                <tr>
                    <td align="left" class="modalColumnHeader" colspan="2">
                        &nbsp;&nbsp;&nbsp;&nbsp;up to 100% of the paid-up capital
                    </td>
                </tr>
                <tr>
                    <td align="left" class="modalContent">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Paid-up Capital as of balance sheet date(covered year)
                    </td>
                    <td>
                        <input type="text" id="frm1704:sched1Txt1" name="frm1704:sched1Txt1" size="20" style="text-align: right"maxlength="25" value="0.00" onblur="round(this,2); computeSched1Txt3()" onkeypress="return numbersonly(this, event)" />
                    </td>
                </tr>
                <tr>
                    <td align="left" class="modalContent">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Less: Accumulated Retained Earnings as of previous year
                    </td>
                    <td>
                        <input type="text" id="frm1704:sched1Txt2" name="frm1704:sched1Txt2" size="20" style="text-align: right"maxlength="25" value="0.00" onblur="round(this,2); computeSched1Txt3()" onkeypress="return numbersonly(this, event)" />
                    </td>
                </tr>
                <tr>
                    <td align="left" class="modalContent">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Allowable increase considered as reasonable accumulation
                    </td>
                    <td>
                        <input type="text" id="frm1704:sched1Txt3" name="frm1704:sched1Txt3" style="background-color: rgb(220, 220, 220); text-align: right" size="20" maxlength="25" value="0.00" />
                    </td>
                </tr>
                <tr>
                    <td align="left" class="modalContent">
                        Reserved for definite corporate expansion projects or programs
                    </td>
                    <td>
                        <input type="text" id="frm1704:sched1Txt4" name="frm1704:sched1Txt4" size="20" style="text-align: right" maxlength="25" value="0.00" onblur="round(this,2); computeSched1Txt9()" onkeypress="return numbersonly(this, event)" />
                    </td>
                </tr>
                <tr>
                    <td align="left" class="modalContent">
                        Reserved for building, plants or equipment acquisition
                    </td>
                    <td>
                        <input type="text" id="frm1704:sched1Txt5" name="frm1704:sched1Txt5" size="20" style="text-align: right" maxlength="25" value="0.00" onblur="round(this,2); computeSched1Txt9()" onkeypress="return numbersonly(this, event)" />
                    </td>
                </tr>
                <tr>
                    <td align="left" class="modalContent">
                        Reserved for compliance with any loan covenant or pre-existing
                        obligation established under a legitimate business agreement
                    </td>
                    <td>
                        <input type="text" id="frm1704:sched1Txt6" name="frm1704:sched1Txt6" size="20" style="text-align: right" maxlength="25" value="0.00" onblur="round(this,2); computeSched1Txt9()" onkeypress="return numbersonly(this, event)" />
                    </td>
                </tr>
                <tr>
                    <td align="left" class="modalContent">
                        Earnings with legal prohibition against distribution
                    </td>
                    <td>
                        <input type="text" id="frm1704:sched1Txt7" name="frm1704:sched1Txt7" size="20" style="text-align: right" maxlength="25" value="0.00" onblur="round(this,2); computeSched1Txt9()" onkeypress="return numbersonly(this, event)" />
                    </td>
                </tr>
                <tr>
                    <td align="left" class="modalContent">
                        For subsidiaries of foreign corporations, Earnings intended or reserved for investment within the Philippines
                    </td>
                    <td>
                        <input type="text" id="frm1704:sched1Txt8" name="frm1704:sched1Txt8" size="20" style="text-align: right" maxlength="25" value="0.00" onblur="round(this,2); computeSched1Txt9()" onkeypress="return numbersonly(this, event)" />
                    </td>
                </tr>
                <tr>
                    <td align="left" class="modalContent" height="25">
                        Total amount reserved for the reasonable needs of the business(to item No. 21)
                    </td>
                    <td height="25">
                        <input type="text" id="frm1704:sched1Txt9" name="frm1704:sched1Txt9" style="background-color: rgb(220, 220, 220); text-align: right" size="20" maxlength="25" value="0.00" />
                    </td>
                </tr>
            </table>

            <table width="100%">
                <tr>
                    <td colspan="3">
                        <center>
                            <input type="button" class="printButtonClass" style="width: 120px; height: 30px;" id="frm1603:modalOK" name="frm1704:modalOK" value="O K" onclick="getValueofSched1()"/>&nbsp;&nbsp;
                            <input type="button" class="printButtonClass" style="width: 120px; height: 30px;" id="frm1603:modalCancel" name="frm1704:modalCancel" value="C A N C E L" onclick="hideSchedule1()"/>
                        </center>
                    </td>
                </tr>
            </table>
        </div>
        <!--End of Modal for Schedule 1-->
   
  <!-- Send Email -->
    <div id="hiddenEnroll" style="display:none;"  > <input id="txtFinalFlag" class="FinalFlag" name="txtFinalFlag" type="text" onblur="" onkeypress="" value="0" maxlength="60"   />
          <input id="txtEnroll" name="txtEnroll" type="text" onblur="" onkeypress="" value="N" maxlength="60"   />
    </div>
    
  <div id="hiddenEmail" style="display:none;"  > 
          <input id="txtEmail" value="{{$company->email_address}}" class="emailClass" name="txtEmail" type="text" onblur="" onkeypress="" maxlength="60"   />
    </div>
  <!-- Send Email -->
   
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
    <div id="responseRdo" style="display:none;"><!--loaded files render here--></div>
@endsection

@section('scripts')
<script type="text/javascript" >
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
  
    //Declare global variable
    var str;

  /*----------------------------------*/
    var d=document,XMLBGFile='',data='',XMLFile='',msg = d.getElementById('msg');
  var loader=d.getElementById('loader');
  /*----------------------------------*/  
  
    str = setInterval("sleeptime()", 300);
    function sleeptime()
    {
        clearInterval(str);
        init();
    
    
    var xmlFileName = document.getElementById('file_name').value;        
    fileName = xmlFileName;

    if (fileName != null && fileName.indexOf('.xml') > -1) {
      loadXML(fileName);  

      d.getElementById('frm1704:txtYearEnded').disabled = true;
      d.getElementById('frm1704:itemFiscalStartMonth:_1').disabled = true;
      d.getElementById('frm1704:itemFiscalStartMonth:_2').disabled = true;
      d.getElementById('frm1704:monthEnd').disabled = true;
      
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
    d.getElementById('frm1704:txtTin1').disabled = true;
      d.getElementById('frm1704:txtTin2').disabled = true;
    d.getElementById('frm1704:txtTin3').disabled = true;
    d.getElementById('frm1704:txtBranch').disabled = true;  
    }
  
  function rdoPropertyJS(rdoCode, description) 
  {
    this.rdoCode=rdoCode;
    this.description=description;
  }
    
  var rdoList = new Array();

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
        loadData();

        if (response.innerHTML.indexOf("All Rights Reserved BIR 2012.0") >= 0) {
            gIsReadOnly = true;
        }

        if (gIsReadOnly) {
          d.getElementById('frm1704:cmdValidate').disabled = true;
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
            if(elem[i].id == 'frm1704:txtName' || elem[i].id == 'frm1704:txtLineBus' || elem[i].id == 'frm1704:txtAddress'){
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
  
  var XMLrdoFile='';

  function loadXMLrdo(fileLocation) {
    try {
      //This will load the Region file with filename 'fileLocation' if it exists
      var fsoXML = new ActiveXObject("Scripting.FileSystemObject");
      XMLrdoFile = fsoXML.OpenTextFile(fileLocation,1); 
  
      if (XMLrdoFile.AtEndOfStream)
        data = "";
      else {
        var responseRdo = d.getElementById('responseRdo'); //render file and write to hidden div
        responseRdo.innerHTML = XMLrdoFile.ReadAll(); //remove XML tag
        //responseRdo = replaceHtml(responseRdo, XMLrdoFile.ReadAll()); //Pattern:  el = replaceHtml(el, newHtml)
      }
      XMLrdoFile.Close(); //alert( responseRdo.innerHTML ); //Debug     
      loadRdo();  /*This will load ATC onto an array*/  
    } catch(e) {
      msg.innerHTML = ""; //"Region File not Found.";
    } //this will Alert File not Found if it doesn't exist
  }
  
  var rdoCount=0;

  function loadRdo() {
    /*This will load data onto an array*/
    var response = d.getElementById("responseRdo");
    
    var rdoCnt = String(response.innerHTML).split('rdoCount=');
    rdoCount = rdoCnt[1]; 
  
    var k = 0;
    //loads rdoList from xml
    for (var i = 1; i <= rdoCount; i++) { 
      
      var rdo = String(response.innerHTML).split('rdo'+i+':');
      var rdoStr = rdo[1];
    
      //Ensure that before writing to rdoPropertyJS the formType 1704 is traceable in rdoStr
      if (rdoStr.indexOf('1704') >= 0) {
          var rdoValues = rdoStr.split('~');              
        var rdoCode = rdoValues[0];
        var description = rdoValues[1];       
        
        var objRdo = new rdoPropertyJS(rdoCode, description);
        rdoList[k] = objRdo; 
        k++;
        //alert('1704 successfully created array #'+i);
        
      } else {    
        //alert('1704 not found in array #'+i);
        continue;
      }
    }         
  }
  
  /*--------------------------------------------------------------*/    
  
    function init()
    {
    var year = new Date();
    var month = new Date();
    
    d.getElementById('frm1704:monthEnd').selectedIndex = month.getMonth() + 1; 
    d.getElementById('frm1704:txtYearEnded').value = year.getFullYear();
       
        d.getElementById('frm1704:txtAtc').disabled = true;
    
    
        d.getElementById('frm1704:txt17B').disabled = true;
        d.getElementById('frm1704:txt18').disabled = true;
        d.getElementById('frm1704:txt21A').disabled = true;
        d.getElementById('frm1704:txt21B').disabled = true;
        d.getElementById('frm1704:txt22').disabled = true;
        d.getElementById('frm1704:txt23').disabled = true;
        d.getElementById('frm1704:txt24').disabled = true;
        d.getElementById('frm1704:txt25').disabled = true;
        d.getElementById('frm1704:txt26').disabled = true;
      
        d.getElementById('frm1704:txt27D').disabled = true;
        d.getElementById('frm1704:txt28').disabled = true;
        
        @if($action != 'view')
        d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm1704:cmdEdit').disabled = true;
        d.getElementById('frm1704:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;
        @endif
        
        
    }
  function dateyear()
  {
    if (d.getElementById('frm1704:itemFiscalStartMonth:_1').checked == true)
    {
      d.getElementById('frm1704:monthEnd').selectedIndex = 12;
      d.getElementById('frm1704:monthEnd').disabled = true;
    }
    else if (d.getElementById('frm1704:itemFiscalStartMonth:_2').checked == true && d.getElementById('frm1704:monthEnd').selectedIndex == 12)
    {
      alert('You have entered invalid month for Fiscal Year');
      d.getElementById('frm1704:monthEnd').selectedIndex = 0;
      d.getElementById('frm1704:monthEnd').disabled = false;
    }
  }
  function datemonth()
  {
    if (d.getElementById('frm1704:itemFiscalStartMonth:_1').checked == true && d.getElementById('frm1704:monthEnd').selectedIndex != 12)
    {
      alert('You have entered a filing year not ending in December. This filing will be considered as a Fiscal Year Filing.');
      d.getElementById('frm1704:itemFiscalStartMonth:_2').checked = true;
    }
    else if (d.getElementById('frm1704:itemFiscalStartMonth:_2').checked == true && d.getElementById('frm1704:monthEnd').selectedIndex == 12)
    {
      alert('You have entered a filing year ending in December. This filing will be considered as a Calendar Year Filing.');
      d.getElementById('frm1704:itemFiscalStartMonth:_1').checked = true;
    }
  }

    function showSchedule1()
    {
      d.getElementById('formPaper').style.display = "none";
      $('#modalSchedule1').show('blind');   
      $('#wrapper').css({'display':'none'});  

      waitstr = setTimeout("d.getElementById('frm1704:sched1Txt3').disabled = true;", 100);
      waitstr = setTimeout("d.getElementById('frm1704:sched1Txt9').disabled = true;", 100);

      var x = 1;
      while(x < 10){
        waitstr = setTimeout("setInputTextControl_HorizontalAlignment('frm1704:sched1Txt" + x + "', 4);", 100);

        x++;
      }
    }
  function hideSchedule1()
    {
        $('#wrapper').css({'display':'block'});  
        d.getElementById('formPaper').style.display = 'block';
    if ( $('#modalSchedule1').css('display') != 'none' ) {
      $('#modalSchedule1').hide('blind');
    }
        $('#DummyTxt').html("Creator");
        $('#DummyTxt').html("");      
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

    function computeSched1Txt3()
    {
        var totalTxt3 = (NumWithComma(d.getElementById('frm1704:sched1Txt1').value)*1) - (NumWithComma(d.getElementById('frm1704:sched1Txt2').value)*1);
        d.getElementById('frm1704:sched1Txt3').value = formatCurrency((totalTxt3).toFixed(2));

        computeSched1Txt9();
    }

    function computeSched1Txt9()
    {
        var sched1Txt9 = 0;
        var x = 3;
        while(x < 9){
            sched1Txt9 = (sched1Txt9*1) + (NumWithComma(d.getElementById('frm1704:sched1Txt' + x).value)*1);
            x++;
        }
        d.getElementById('frm1704:sched1Txt9').value = formatCurrency((sched1Txt9).toFixed(2));
    }

    function getValueofSched1()
    {
        d.getElementById('frm1704:txt21A').value = formatCurrency((NumWithComma(d.getElementById('frm1704:sched1Txt9').value)*1).toFixed(2));

        compute21B();

        hideSchedule1();
    }

    function compute17B()
    {
        var x = 14;
        var total = 0;
        while(x < 17){
            total = (total*1) + (NumWithComma(d.getElementById('frm1704:txt' + x + 'B').value)*1);
            total = (total*1) + (NumWithComma(d.getElementById('frm1704:txt' + x + 'D').value)*1);
            total = (total*1) + (NumWithComma(d.getElementById('frm1704:txt' + x + 'F').value)*1);
            total = (total*1) + (NumWithComma(d.getElementById('frm1704:txt' + x + 'H').value)*1);
            total = (total*1) + (NumWithComma(d.getElementById('frm1704:txt' + x + 'J').value)*1);
            total = (total*1) + (NumWithComma(d.getElementById('frm1704:txt' + x + 'L').value)*1);
            total = (total*1) + (NumWithComma(d.getElementById('frm1704:txt' + x + 'N').value)*1);
            total = (total*1) + (NumWithComma(d.getElementById('frm1704:txt' + x + 'P').value)*1);
            total = (total*1) + (NumWithComma(d.getElementById('frm1704:txt' + x + 'R').value)*1);
            total = (total*1) + (NumWithComma(d.getElementById('frm1704:txt' + x + 'T').value)*1);
            x++;
        }
        total = (total*1) + (NumWithComma(d.getElementById('frm1704:txt17A').value)*1);

        d.getElementById('frm1704:txt17B').value = formatCurrency((total).toFixed(2));

        compute18();
    }

    function compute18()
    {
        var total = (NumWithComma(d.getElementById('frm1704:txt13').value)*1) + (NumWithComma(d.getElementById('frm1704:txt17B').value)*1);
        d.getElementById('frm1704:txt18').value = formatCurrency((total).toFixed(2));

        compute22();
    }

    function compute21B()
    {
        var total = 0;
        total = (NumWithComma(d.getElementById('frm1704:txt19').value)*1) + (NumWithComma(d.getElementById('frm1704:txt20').value)*1) + (NumWithComma(d.getElementById('frm1704:txt21A').value)*1);
        d.getElementById('frm1704:txt21B').value = formatCurrency((total).toFixed(2));

        compute22();
    }

    function compute22()
    {
        var total = (NumWithComma(d.getElementById('frm1704:txt18').value)*1) - (NumWithComma(d.getElementById('frm1704:txt21B').value)*1);
        d.getElementById('frm1704:txt22').value = formatCurrency((total).toFixed(2));

        compute24();
    }

    function compute24()
    {
        var total = (NumWithComma(d.getElementById('frm1704:txt22').value)*1) * (NumWithComma(d.getElementById('frm1704:txt23').value) / 100);
        d.getElementById('frm1704:txt24').value = formatCurrency((total).toFixed(2));

        compute26();
    }

    function compute26()
    {
        var total = (NumWithComma(d.getElementById('frm1704:txt24').value)*1) - (NumWithComma(d.getElementById('frm1704:txt25').value)*1);
        d.getElementById('frm1704:txt26').value = formatCurrency((total).toFixed(2));

        compute28();
    }

    function compute27D()
    {
        var total = (NumWithComma(d.getElementById('frm1704:txt27A').value)*1) + (NumWithComma(d.getElementById('frm1704:txt27B').value)*1) + (NumWithComma(d.getElementById('frm1704:txt27C').value)*1);
        d.getElementById('frm1704:txt27D').value = formatCurrency((total).toFixed(2));

        compute28();
    }

    function compute28()
    {
        var total = (NumWithComma(d.getElementById('frm1704:txt26').value)*1) + (NumWithComma(d.getElementById('frm1704:txt27D').value)*1);
    //var total = (NumWithComma(d.getElementById('frm1704:txt26').value)*1);
        d.getElementById('frm1704:txt28').value = formatCurrency((total).toFixed(2));
    capital();
  }

    function validateForm()
    {
        var dt = new Date();

        if((document.getElementById('frm1704:txtYearEnded').value == ""))
        {
            alert("Please enter valid year on item 2.");
            return;
        }
   
    if(document.getElementById('frm1704:monthEnd').selectedIndex == 0)
    {
      alert("Please enter valid year on item 2.");
            return;
    }
       
        if(document.getElementById('frm1704:txtYearEnded').value*1 < 1900)
        {
            alert("Invalid date entry on Item no.2. Entry should not be lower than 1900.")
            return;
        } 
    
    if( (d.getElementById('frm1704:txtTin1').value == "" || d.getElementById('frm1704:txtTin2').value == "" || d.getElementById('frm1704:txtTin3').value == "" || d.getElementById('frm1704:txtBranch').value == "")  )
        {
            alert("Please enter a valid TIN number on Item 6.");
            return;
        }   
            
        if( (d.getElementById('frm1704:txtLineBus').value == "")  )
        {
            alert("Please enter a valid Line of Business on Item 8.");
            return;
        }     
    if( (d.getElementById('frm1704:txtName').value == "")  )
        {
            alert("Please enter a valid Taxpayer's Name on Item 9.");
            return;
        } 
    if( (d.getElementById('frm1704:txtAddress').value == "")  )
        {
            alert("Please enter Taxpayer's Registered Address on Item 10.");
            return;
        }   
    
    if( (d.getElementById('frm1704:txtZipCode').value == "")  )
        {
            alert("Please enter Zip Code on Item 11.");
            return;
        } 
    
        if(d.getElementById('frm1704:txt12AMM').value != "" || d.getElementById('frm1704:txt12ADD').value != "" || d.getElementById('frm1704:txt12AYYYY').value != ""){
                if(validateMonthDayYearDate(d.getElementById('frm1704:txt12AMM').value + "/" + d.getElementById('frm1704:txt12ADD').value + "/" + d.getElementById('frm1704:txt12AYYYY').value)){
                    alert("Invalid date entry on item 12A.");
                    return true;
                }
        }else {
                alert("Please indicate Incorporation Date on item 12A.");
                return true;
        }
    if(d.getElementById('frm1704:txt12AMM').value.length == 1 || d.getElementById('frm1704:txt12ADD').value.length == 1)
    {
      alert("Please enter a valid day/month on item 12A. Format should be MM/DD/YYYY.")
            return;
    }
        if(d.getElementById('frm1704:txt12BMM').value != "" || d.getElementById('frm1704:txt12BDD').value != "" || d.getElementById('frm1704:txt12BYYYY').value != ""){
                if(validateMonthDayYearDate(d.getElementById('frm1704:txt12BMM').value + "/" + d.getElementById('frm1704:txt12BDD').value + "/" + d.getElementById('frm1704:txt12BYYYY').value)){
                    alert("Invalid date entry on item 12B.");
                    return true;
                }
        }else {
                alert("Please indicate Incorporation Date with BIR on item 12B.");
                return true;
        }     
    if(d.getElementById('frm1704:txt12BMM').value.length == 1 || d.getElementById('frm1704:txt12BDD').value.length == 1)
    {
      alert("Please enter a valid day/month on item 12B. Format should be MM/DD/YYYY.")
            return;
    }
        var x = 14;
        while(x < 17){
            if(NumWithComma(d.getElementById('frm1704:txt' + x + 'B').value) > 0){
                if(d.getElementById('frm1704:txt' + x + 'A').value == ""){
                    alert("Please enter a description on item " + x + "A.");
                    return;
                }
            }
            if(NumWithComma(d.getElementById('frm1704:txt' + x + 'D').value) > 0){
                if(d.getElementById('frm1704:txt' + x + 'C').value == ""){
                    alert("Please enter a description on item " + x + "C.");
                    return;
                }
            }
            if(NumWithComma(d.getElementById('frm1704:txt' + x + 'F').value) > 0){
                if(d.getElementById('frm1704:txt' + x + 'E').value == ""){
                    alert("Please enter a description on item " + x + "E.");
                    return;
                }
            }
            if(NumWithComma(d.getElementById('frm1704:txt' + x + 'H').value) > 0){
                if(d.getElementById('frm1704:txt' + x + 'G').value == ""){
                    alert("Please enter a description on item " + x + "G.");
                    return;
                }
            }
            if(NumWithComma(d.getElementById('frm1704:txt' + x + 'J').value) > 0){
                if(d.getElementById('frm1704:txt' + x + 'I').value == ""){
                    alert("Please enter a description on item " + x + "I.");
                    return;
                }
            }
            if(NumWithComma(d.getElementById('frm1704:txt' + x + 'L').value) > 0){
                if(d.getElementById('frm1704:txt' + x + 'K').value == ""){
                    alert("Please enter a description on item " + x + "K.");
                    return;
                }
            }
            if(NumWithComma(d.getElementById('frm1704:txt' + x + 'N').value) > 0){
                if(d.getElementById('frm1704:txt' + x + 'M').value == ""){
                    alert("Please enter a description on item " + x + "M.");
                    return;
                }
            }
            if(NumWithComma(d.getElementById('frm1704:txt' + x + 'P').value) > 0){
                if(d.getElementById('frm1704:txt' + x + 'O').value == ""){
                    alert("Please enter a description on item " + x + "O.");
                    return;
                }
            }
            if(NumWithComma(d.getElementById('frm1704:txt' + x + 'R').value) > 0){
                if(d.getElementById('frm1704:txt' + x + 'Q').value == ""){
                    alert("Please enter a description on item " + x + "Q.");
                    return;
                }
            }
            if(NumWithComma(d.getElementById('frm1704:txt' + x + 'T').value) > 0){
                if(d.getElementById('frm1704:txt' + x + 'S').value == ""){
                    alert("Please enter a description on item " + x + "S.");
                    return;
                }
            }

            x++;
        }

        if(d.getElementById('frm1704:txt29').value == "" || d.getElementById('frm1704:txt29').value.length < 8){
            alert("Please indicate the Community Tax Certificate Number on Item 31.");
            return;
        }
        if(d.getElementById('frm1704:txt30').value == ""){
            alert("Please indicate the place where the Community Tax Certificate was issued on Item 32.");
            return;
        }
        if(d.getElementById('frm1704:txt31Day').value == "" || d.getElementById('frm1704:txt31Month').value == "00" 
            || d.getElementById('frm1704:txt31Year').value == ""){
            //|| d.getElementById('frm1704:txt31Day').value > dt.getDate() || d.getElementById('frm1704:txt31Year').value > dt.getFullYear()
            alert("Please indicate date the Community Tax Certificate was issued on Item 33.");
            return;
        }

        if(!isValidCommunityDate()){
            return;
        }

        if(d.getElementById('frm1704:txt32').value == 0){
            alert("Please indicate the Community Tax Due on Item 34.");
            return;
        }

        d.getElementById('frm1704:cmdValidate').disabled = true;
    d.getElementById('btnPrint').disabled = false;
        d.getElementById('frm1704:cmdEdit').disabled = false;
    d.getElementById('frm1704:btnFinalCopy').disabled = false;
        d.getElementById('btnUpload').disabled = false;

        enabledDisabledControls(true);

        alert("Validation successful. Click on Edit if you wish to modify your entries.");
    return;
    }

    function editForm()
    {
        d.getElementById('frm1704:cmdValidate').disabled = false;
    d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm1704:cmdEdit').disabled = true;
    d.getElementById('frm1704:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;

        enabledDisabledControls(false);
    d.getElementById('frm1704:txtTin1').disabled = true;
      d.getElementById('frm1704:txtTin2').disabled = true;
    d.getElementById('frm1704:txtTin3').disabled = true;
    d.getElementById('frm1704:txtBranch').disabled = true;  
    }

  var disableElem = true;
  var enableElem = false;
    function enabledDisabledControls(param)
    {
        d.getElementById('frm1704:monthEnd').disabled = param;
        d.getElementById('frm1704:txtYearEnded').disabled = param;
        var x = 14;
        while(x < 17){
            d.getElementById('frm1704:txt' + x + 'A').disabled = param;
            d.getElementById('frm1704:txt' + x + 'B').disabled = param;
            d.getElementById('frm1704:txt' + x + 'C').disabled = param;
            d.getElementById('frm1704:txt' + x + 'D').disabled = param;
            d.getElementById('frm1704:txt' + x + 'E').disabled = param;
            d.getElementById('frm1704:txt' + x + 'F').disabled = param;
            d.getElementById('frm1704:txt' + x + 'G').disabled = param;
            d.getElementById('frm1704:txt' + x + 'H').disabled = param;
            d.getElementById('frm1704:txt' + x + 'I').disabled = param;
            d.getElementById('frm1704:txt' + x + 'J').disabled = param;
            d.getElementById('frm1704:txt' + x + 'K').disabled = param;
            d.getElementById('frm1704:txt' + x + 'L').disabled = param;
            d.getElementById('frm1704:txt' + x + 'M').disabled = param;
            d.getElementById('frm1704:txt' + x + 'N').disabled = param;
            d.getElementById('frm1704:txt' + x + 'O').disabled = param;
            d.getElementById('frm1704:txt' + x + 'P').disabled = param;
            d.getElementById('frm1704:txt' + x + 'Q').disabled = param;
            d.getElementById('frm1704:txt' + x + 'R').disabled = param;
            d.getElementById('frm1704:txt' + x + 'S').disabled = param;
            d.getElementById('frm1704:txt' + x + 'T').disabled = param;

            x++;
        }
    d.getElementById('frm1704:txtSheets').disabled = param;
    d.getElementById('frm1704:txtTin1').disabled = param;
    d.getElementById('frm1704:txtTin2').disabled = param;
    d.getElementById('frm1704:txtTin3').disabled = param;
    d.getElementById('frm1704:txtBranch').disabled = param;
    d.getElementById('frm1704:txtRDOCode').disabled = param;
    d.getElementById('frm1704:txtLineBus').disabled = param;
    d.getElementById('frm1704:txtName').disabled = param;
    d.getElementById('frm1704:txtAddress').disabled = param;
    d.getElementById('frm1704:txtZipCode').disabled = param;
    d.getElementById('frm1704:txt12AMM').disabled = param;
    d.getElementById('frm1704:txt12ADD').disabled = param;
    d.getElementById('frm1704:txt12AYYYY').disabled = param;
    d.getElementById('frm1704:txt12BMM').disabled = param;
    d.getElementById('frm1704:txt12BDD').disabled = param;
    d.getElementById('frm1704:txt12BYYYY').disabled = param;
        d.getElementById('frm1704:txt17A').disabled = param;
        d.getElementById('frm1704:txt19').disabled = param;
        d.getElementById('frm1704:txt20').disabled = param;

    d.getElementById('frm1704:txt27A').disabled = param;
    d.getElementById('frm1704:txt27B').disabled = param;
    d.getElementById('frm1704:txt27C').disabled = param;
    
        d.getElementById('frm1704:txt29').disabled = param;
        d.getElementById('frm1704:txt30').disabled = param;
        d.getElementById('frm1704:txt31Day').disabled = param;
        d.getElementById('frm1704:txt31Month').disabled = param;
        d.getElementById('frm1704:txt31Year').disabled = param;
        d.getElementById('frm1704:txt32').disabled = param;
        d.getElementById('frm1704:sch1').disabled = param;
        d.getElementById('frm1704:txt13').disabled = param;
        
    d.getElementById('frm1704:itemFiscalStartMonth:_1').disabled = param;
    d.getElementById('frm1704:itemFiscalStartMonth:_2').disabled = param;
        d.getElementById("frm1704:amendedRtn_1").disabled = param;
        d.getElementById("frm1704:amendedRtn_2").disabled = param;

        if(d.getElementById("frm1704:amendedRtn_1").checked){
            d.getElementById('frm1704:txt25').disabled = param;
        }
    if (qs('xmlFileName') != null && qs('xmlFileName').indexOf('.xml') > -1) {
      d.getElementById('frm1704:txtYearEnded').disabled = true;
      d.getElementById('frm1704:itemFiscalStartMonth:_1').disabled = true;
      d.getElementById('frm1704:itemFiscalStartMonth:_2').disabled = true;
      d.getElementById('frm1704:monthEnd').disabled = true;
    }
    disableElem;
    enableElem;
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

    function isValidCommunityDate(){
        var dt = new Date();
    
    var isLeap = new Date(document.getElementById('frm1704:txt31Year').value, 1, 29).getMonth() == 1;
    
    if (!isLeap && document.getElementById('frm1704:txt31Month').value==2 && document.getElementById('frm1704:txt31Day').value==29) {
      alert("Invalid date entry on item 33.");
      return;
    }
    if (!isLeap && document.getElementById('frm1704:txt31Month').value==2 && document.getElementById('frm1704:txt31Day').value>29) {
      alert("Invalid date entry on item 33.");
      return;
    }
    if (isLeap && document.getElementById('frm1704:txt31Month').value==2 && document.getElementById('frm1704:txt31Day').value>29) {
      alert("Invalid date entry on item 33.");
      return;
    }
    var month31 = (['01', '03', '05', '07', '08', '10', '12']);
    var month30 = (['04', '06', '09', '11']);
    var month = document.getElementById('frm1704:txt31Month').value
    if (month31.contains(month) && document.getElementById('frm1704:txt31Day').value > 31)
    {
      alert("Invalid date entry on item 33.");
      return;
    }
    else if (month30.contains(month) && document.getElementById('frm1704:txt31Day').value > 30)
    {
      alert("Invalid date entry on item 33.");
      return;
    }

        if(d.getElementById('frm1704:txt31Year').value*1 < dt.getFullYear()*1){
            alert("Invalid date of issue. Date should not be prior than current year.");
            return false;
        }if(d.getElementById('frm1704:txt31Year').value*1 >= dt.getFullYear()*1 && d.getElementById('frm1704:txt31Month').value*1 >= (dt.getMonth()*1 +1) && d.getElementById('frm1704:txt31Day').value*1 > dt.getDate()*1){
            alert("Invalid date of issue. Date should not be later than current date.");
            return false;
      
        }
    if(d.getElementById('frm1704:txt31Month').value*1 > (dt.getMonth()*1 +1)){
      alert("Invalid date of issue. Date should not be later than current date.");
      return false;
      
        }
    if(d.getElementById('frm1704:txt31Year').value*1 > dt.getFullYear()*1){
            alert("Invalid date of issue! Date should not be later than current date.");
            return false;
      
        }
    
        return true;
    }
  
  function validateMonthDayYearDate(dateID)
  {
    strmmddyyyy = dateID;

    if(strmmddyyyy != "")
    {
      var result = strmmddyyyy.split("/");
      var isLeap = new Date(result[2], 1, 29).getMonth() == 1;
      var month31 = (['01', '03', '05', '07', '08', '10', '12']);
      var month30 = (['04', '06', '09', '11']);
      var month = result[0];
      var day = result[1];
      if(result.length == 3 )
      {
        if(isNaN(result[0] || result[1] || result[2]))
        {
          return true;
        } 
        else if(( result[0].length != 2 || (result[0] > 12 || result[0] < 0) )){
          // numeric check if greater not than 31 - Month.
          return true;
        }
        else if( result[1].length != 2 || (result[1] > 31 || result[1] < 1) ){
          // numeric check if Date.
          return true;
        }
        else if( result[2].length != 4 ){
          return true;
        }
        else if(month==2){
          if (!isLeap && day==29) {
            return true;
          }
          else if (!isLeap && day>29) {
            return true;
          }
          else if (isLeap && day>29) {
            return true;
          }
        }
        else if (month31.contains(month) && day > 31)
        {
          return true;
        }
        else if (month30.contains(month) && day > 30)
        {
          return true;
        }
      } else {
        return true;
      }
    }
  }
  
  function initialValidateBeforeSave() {
    if( (d.getElementById('frm1704:txtTin1').value == "" || d.getElementById('frm1704:txtTin2').value == "" || d.getElementById('frm1704:txtTin3').value == "" || d.getElementById('frm1704:txtBranch').value == "")  )
        {
            alert("Please enter a valid TIN number on Item 6.");
            return false;
    }
    if ((d.getElementById('frm1704:txtRDOCode').value == "000")) {
        alert("Please enter a valid RDO Code on Item 7.");
        return false;
    }
    if( (d.getElementById('frm1704:txtName').value == "")  )
        {
            alert("Please enter a valid Taxpayer's Name on Item 9.");
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
  $('.printSignFooterClass_1704').css({ 'margin':'auto','margin-top':'15px','display':'block','position':'relative','overflow':'visible','page-break-before':'always', 'background':'#ffffff' }); 
  $('.imgClass').css({ 'margin':'auto','display':'block','position':'relative','overflow':'visible' });
  
  $('#formPaper').css({'border':'#000 3px solid' });
  
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
        document.getElementById(elem[i].id).style.height="15px";
        document.getElementById(elem[i].id).style.fontSize="10px";
      }       
     
      
    }
    } 
  
    $('.printButtonClass').hide();
    $("#formPaper").show();
    $('#formPaper').css({'margin-top':'-140px' });

    window.print();

    $('.printButtonClass').show();
    $("#formPaper").show();
    $("#modalSchedule1").hide();
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
               
                var data = form.serialize();
                save('1704',data);
                
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
        saveAndExit('1704',data);
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

        submitAndSave('1704', data, company_id);
        
        disabled.attr('disabled','disabled');
        return false;
    }

    function gotoMain(){
        var company_id = $('#frmMain').find('input[name="company"]').val();
        window.location = '/companies/'+ company_id +'/histories/1704';
    }
</script>
@endsection

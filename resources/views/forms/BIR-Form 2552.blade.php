@extends('layouts.app')
@section('title', '| BIR Form No. 2552')

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
        <button type="button" class="btn btn-danger btn-exit" id="2552" company='{{$company->id}}'>No</button>
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
        <button type="button" class="btn btn-success btn-exit" id="2552" company='{{$company->id}}'>Okay</button>
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
            <button type="button" class="btn btn-danger btn-filing-success" form='2552' company='{{$company->id}}'>Okay</button>
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
                <div id="formPaper">
                    <div id="Content">
                        <table width="846" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                    <table width="846" border="0" cellspacing="0" cellpadding="0" style="height:0px;">
                                        <tr>
                                            <td width="82"  style='padding:0px;' valign="middle" align="center">                    
                        <p><img src="{{ asset('images/birflog.gif') }}" width="51" height="49" valign='3' halign='3' alt="birlogo" /></p>
                      </td>
                                            <td width="190" valign="middle">
                                                
                                                <label face="Arial" size="1px">Republika ng Pilipinas
                                                <br/>Kagawaran ng Pananalapi
                                                <br/>Kawanihan ng Rentas Internas</label>
                                                
                                            </td>
                                            <td width="0" valign="center">
                                                <font size="5px" style="font-weight:bold;">Percentage Tax Return</font>
                                            </td>
                                            
                                            <td width="144" valign="center">
                                                
                                                <font face="Arial" size="1px" style="font-size: 11px;" >BIR Form No.<br/></font>
                                                <font face="Arial" size="6px">2552<br/></font>
                                                <font face="Arial" size="1px"  style="font-size: 11px;" >July 1999 (ENCS)</font></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" valign="top"><span class=""><label size="1px" style="font-size: 11px;" face="Arial, Helvetica, sans-serif">For Transactions Involving Shares of Stock Listed and Traded Through the Local<br />
                                                        Stock Exchange or Through Initial and/or Secondary Public Offering</label></span></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="840" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="414" height="0px" valign="top" class="tblFormTd"><table border="0" width="379" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="23"><font size="2" style="font-weight:bold;">&nbsp;1&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td colspan="2"><label size="1">Date of Transaction or Date of Listing of<br /> Shares of Stock in the Stock Exchange (MM/DD/YYYY)</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="66">&nbsp;</td>
                                                        <td colspan="2" align="left"><font color="black" face="Arial" size="2">
                                                                <select id="frm2552:txtMonth1" name="frm2552:txtMonth1" size="1">
                                                                    <option value="01">01 - January</option>
                                                                    <option value="02">02 - February</option>
                                                                    <option value="03">03 - March</option>
                                                                    <option value="04">04 - April</option>
                                                                    <option value="05">05 - May</option>
                                                                    <option value="06">06 - June</option>
                                                                    <option selected="selected" value="07">07 - July</option>
                                                                    <option value="08">08 - August</option>
                                                                    <option value="09">09 - September</option>
                                                                    <option value="10">10 - October</option>
                                                                    <option value="11">11 - November</option>
                                                                    <option value="12">12 - December</option>
                                                                </select>
                                                            </font>
                                                            <input id="frm2552:txtDate" maxlength="2" name="frm2552:txtDate" size="2" style="" type="text" value="10" onblur="blockLetterInt(this)" />
                                                            <input id="frm2552:txtForYr" maxlength="4" name="frm2552:txtForYr" size="4" style="" type="text" value="2010" onblur="blockletterWithout2Decimal(this)" /></td>
                          </tr>
                                                </table>
                                            </td>
                                            <td width="171" valign="top" class="tblFormTd">
                                                <table width="146" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;2&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" style="font-size: 11px;" >Amended Return?</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            
                                                                <div align="center" style="padding: 1px 0 1px 0;">
                                                                    <table cellspacing="0" cellpadding="0" border="0" >
                                                                        <tbody>
                                                                            <tr>
                                                                                <td><input type="radio" value="Y" name="frm2552AmendedRtn" id="frm2552AmendedRtn1" onclick="d.getElementById('frm2552:txt16A').disabled = false;" />
                                                                                    <label for="frm2552AmendedRtn1"  style="font-size:12px;" >Yes</label>
                                                                                    &nbsp;&nbsp;&nbsp;
                                                                                </td>
                                                                                <td>
                                                                                    <input type="radio" value="N"  name="frm2552AmendedRtn" id="frm2552AmendedRtn2" checked="checked" onclick="d.getElementById('frm2552:txt16A').disabled = true;d.getElementById('frm2552:txt16A').value = '0.00';computetxt16C();" />
                                                                                    <label for="frm2552AmendedRtn2"  style="font-size:12px;" >No</label>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="156" valign="top" class="tblFormTd">
                      <table width="152" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold;">&nbsp;3&nbsp;&nbsp;&nbsp;</font></td>
                                                        <td><font size="1" style="font-size: 11px;" >No. of Sheets Attached?</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td><input type="text" value="0" style="text-align: right;" size="4" name="frm2552:txtSheets" maxlength="2" id="frm2552:txtSheets" class="iceInpTxt-dis" onkeypress="return wholenumber(this, event)" /></td>
                                                    </tr>
                                                </table></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="840" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td class="tblFormTdPart">
                                                <table width="731" height="0px" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="86">&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;">Part I</font></td>
                                                        <td width="643">
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
                                    <table width="745" border="0" cellpadding="0" cellspacing="0" class="tblForm" style="width:  840px">
                                        <tr>
                                            <td width="279" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold"> &nbsp;4&nbsp;</font></td>
                                                        <td>
                                                            <font size="1" style="font-size: 11px;" >TIN&nbsp;</font>
                                                            <font size="2" face="Arial">
                                                                <input type="text" value="{{$company->tin1}}"  size="2" name="frm2552:txtTIN1" maxlength="3" id="frm2552:txtTIN1" onkeypress="return wholenumber(this, event)" />
                                                                <input type="text" value="{{$company->tin2}}"  size="2" name="frm2552:txtTIN2" maxlength="3" id="frm2552:txtTIN2" onkeypress="return wholenumber(this, event)" />
                                                                <input type="text" value="{{$company->tin3}}"  size="2" name="frm2552:txtTIN3" maxlength="3" id="frm2552:txtTIN3" onkeypress="return wholenumber(this, event)" />
                                                                <input type="text" value="{{$company->tin4}}"  size="2" name="frm2552:txtBranchCode" maxlength="3" id="frm2552:txtBranchCode" onkeypress="return letternumber(event)" />
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="132" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="100"><font size="2" style="font-weight:bold">&nbsp;5&nbsp;</font><font size="1" style="font-size: 11px;" >RDO Code&nbsp;</font></td>
                                                        <td id="rdoSelect"> 
                                                            <select class='iceSelOneMnu' id='frm2552:txtRDOCode' disabled name='frm2552:txtRDOCode' size='1' >
                                                                <option value='{{$company->rdo_code}}'>{{$company->rdo_code}}</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="324" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="11"><font size="2" style="font-weight:bold">&nbsp;6&nbsp;</font></td>
                                                        <td>
                                                            <font size="1" style="font-size: 11px;" >Telephone Number&nbsp;</font>
                                                            <font size="2" face="Arial">
                                                                <input type="text" value="{{$company->tel_number}}" disabled=""  size="15" name="frm2552:txtTelNum" maxlength="20" id="frm2552:txtTelNum" onkeypress="return numbersonly(this, event)" />
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
                                    <table width="840"  border="0" cellpadding="0" cellspacing="0" class="tblForm">
                                        <tr>
                                            <td valign="top" class="tblFormTd">
                                                <table width="840" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;7&nbsp;</font></td>
                                                                    <td><font size="1" style="font-size: 11px;" >Name of Stockbroker/Issuing Corporation (For Individual) (Last Name, First Name, Middle Name s) /(For Non-Individual)(Registered Name for Non-Individuals)</font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="25">&nbsp;</td>
                                                                    <td><input type="text" value="{{$company->registered_name}}" disabled size="70" name="frm2552:txtNameStockBrocker" maxlength="70" id="frm2552:txtNameStockBrocker" onblur="return capital(this, event)"  /></td>
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
                                    <table width="840" height="0px" border="0" cellpadding="0" cellspacing="0" class="tblForm">
                                        <tr>
                                            <td width="575" height="0px" valign="top" class="tblFormTd">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="11"><font size="2" style="font-weight:bold;">&nbsp;8&nbsp;</font></td>
                                                                    <td><font size="1" style="font-size: 11px;" >Registered Address</font></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="25">&nbsp;</td>
                                                                    <td><input type="text" value="{{$company->address}}" disabled=""  size="70" name="frm2552:txtAddress" maxlength="70" id="frm2552:txtAddress" onblur="return capital(this, event)" /></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="165" valign="top" class="tblFormTd">
                                                <table width="154" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="149"><font size="2" style="font-weight:bold;">&nbsp;8A&nbsp;</font><font size="1" style="font-size: 11px;" >Zip
                                                                Code</font></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div align="center">
                                                                <input type="text" value="{{$company->zip_code}}" disabled=""  size="12" name="frm2552:txtZipCode" maxlength="12" id="frm2552:txtZipCode" onkeypress="return wholenumber(this, event)" />
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
                                    <table width="840" height="0px" border="0" cellpadding="0" cellspacing="0" bordercolor="#F0F0F0" class="tblForm">
                                        <tr>
                                            <td height="0px" valign="top" class="tblFormTd">
                                                <table width="735" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="320"><font size="2" style="font-weight:bold;">&nbsp;9&nbsp;</font><font size="1" style="font-size: 11px;" >Are you availing of tax relief under an International Tax Treaty or Special law?</font>
                                                        </td>
                                                        <td width="110"><div align="left">
                                                                
                                                                    <div align="center" style="padding: 1px 0 1px 0;">
                                                                        <div align="center">
                                                                            <table border="0" align="left" cellpadding="0" cellspacing="0" >
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td><font size="1" face="Arial">
                                                                                                    <input type="radio" value="Y" name="frm2552OptSpecialTax" id="frm2552OptSpecialTax1" onclick="enableSelTreaty()" />
                                                                                                    <label for="frm2552OptSpecialTax1"  style="font-size:12px;" >Yes</label>
                                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font> </td>
                                                                                        <td><font size="1" face="Arial">
                                                                                                    <input type="radio" value="N" name="frm2552OptSpecialTax" id="frm2552OptSpecialTax2" checked="checked" onclick="disableSelTreaty()" />
                                                                                                    <label for="frm2552OptSpecialTax2"  style="font-size:12px;" >No</label>
                                                                                                </font> </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                
                                                            </div>
                                                            </td>
                                                        <td width="229"><div align="left"></div>
                                                            <div align="center">
                                                                <label id="" style="font-family: Arial, Helvetica, sans-serif; font-size : 11px;">If yes, specify</label>
                                                                <select disabled="disabled" id="frm2552:lstTaxTreaty" name="frm2552:lstTaxTreaty"  size="1" style="color: black">
                                                                    <option value="0"></option>
                                                                    <option value="1">Special Rate</option>
                                                                    <option value="2">International Tax Treaty</option>
                                                                </select>
                                                            </div></td>
                                                    </tr>
                                                </table></td>
                                        </tr>
                                        <tr>
                                            <td height="0px" valign="top" class="tblFormTd"><table border="0" cellpadding="0" cellspacing="0" width="731">
                                                    <tr>
                                                        <td width="20" height="0px"><font face="Arial, Helvetica, sans-serif" size="1"><strong><font size="2">10</font></strong></font></td>
                                                        <td width="100"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;" >Kind of Transaction</font></td>
                                                        <td width="267"><strong><font size="2">10A&nbsp;</font></strong><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;" >Shares of Stock Listed and Traded through LSE</font>
                              <input id="frm2552:PayPenalties" name="frm2552:PayPenalties" value="LSE"  type="checkbox" onclick="disableTransPrimary();" /></td>
                                                        <td width="158"><strong><font size="2">10B&nbsp;</font></strong><font face="Arial" size="1" style="font-size: 11px;" >Initial Public Offering</font></td>
                                                        <td width="186"><table cellspacing="0" cellpadding="0" border="0" >
                                                                <tbody>
                                                                    <tr>
                                                                        <td id="tdPrimaryRadio"><input type="radio" value="P" name="frm2552:OptTransaction" id="frm2552:OptTransaction1" onclick="clear12B();" />
                                                                            <label for="frm2552:OptTransaction1"  style="font-size:11px;" >Primary</label>
                                                                        </td>
                                                                        <td><input type="radio" value="S" name="frm2552:OptTransaction" id="frm2552:OptTransaction2" />
                                                                            <label for="frm2552:OptTransaction2"  style="font-size:11px;" >Secondary</label></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table></td>
                                                    </tr>
                                                </table></td>
                                        </tr>
                                        <tr>
                                            <td height="0px" valign="top" class="tblFormTd"><table border="0" cellpadding="0" cellspacing="0" width="840"> 
                                                    <tr>
                                                        <td width="20"><font face="Arial, Helvetica, sans-serif" size="1"><strong><font size="2">11</font></strong></font></td>
                                                        <td width="130"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;" >For Initial Public Offering</font></td>
                                                        <td width="323"><strong><font size="2">11A&nbsp;</font></strong><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;" >No. of Shares Sold, Bartered, or Exchanged</font></td>
                                                        <td width="231"><input  id="frm2552:txt11A" maxlength="15" name="frm2552:txt11A" size="15" style="text-align: right;" type="text" onKeyPress="return numbersonly(event, false)" onblur="blockletterWithout2Decimal(this)" /></td> <!--onblur="blockletterWithout2Decimal(this)"-->
                                                    </tr>
                                                    <tr>
                                                        <td width="20">&nbsp;</td>
                                                        <td valign="top" width="130">&nbsp;</td>
                                                        <td valign="bottom" width="323"><strong><font size="2">11B&nbsp;</font></strong><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;" >Total Outstanding Shares of Stocks after Listing in the LSE</font></td>
                                                        <td><input  id="frm2552:txt11B" maxlength="15" name="frm2552:txt11B" size="15" style="text-align: right;" type="text" onKeyPress="return numbersonly(event, false)" onblur="blockletterWithout2Decimal(this)" /></td>
                                                    </tr>
                                                </table></td>
                                        </tr>
                                        <tr>
                                            <td height="0px" valign="top" class="tblFormTd"><table width="840" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="100">&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;">Part II</font></td>
                                                        <td width="621"><div align="center"><font size="2" style="font-weight:bold;letter-spacing: 3px;">Computation of Tax</font></div></td>
                                                    </tr>
                                                </table></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="840" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                                        <tr>
                                            <td width="840" class="tblFormTd">
                                                <table width="840" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="269" rowspan="2"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;" >Taxable Transaction</font></div></td>
                                                        <td width="49" rowspan="2"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;" >ATC</font></div></td>
                                                        <td width="232" height="0px"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;" >Taxable Base (Gross Selling</font></div></td>
                                                        <td width="77"><div align="center"></div>                                                      <div align="center"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;" >Tax Rate</font></div></td>
                                                        <td width="189"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1">Tax Due</font></div>                                                      </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="232"><div align="center"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;" >Price/Gross Value)</font></div></td>
                                                        <td>&nbsp;</td>
                                                        <td><div align="center"><font face="Arial, Helvetica, sans-serif" size="1"> </font></div>                                                      </td>
                                                    </tr>
                                                </table>
                                                <table width="840" >
                                                    <tr>
                                                        <td valign="top" width="5%"><b><font face="Arial, Helvetica, sans-serif" size="2">12</font></b></td>
                                                        <td width="20%" height="0px"><div align="left"><label face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;" ><b><font face="Arial, Helvetica, sans-serif" size="2"></font></b>Sale, Barter or Exchange of Shares of Stock Listed and Traded through LSE</label></div></td>
                                                        <td width="15%">
                                                            <div align="center">
                                                                <font face="Arial, Helvetica, sans-serif" size="1"><b><font face="Arial, Helvetica, sans-serif" size="2">12A&nbsp;</font></b>
                                                                    <input  disabled="true" id="frm2552:txtATC12A" maxlength="5" name="frm2552:txtATC12A" size="5" style="background-color: rgb(220, 220, 220);text-align: center" value="PT200" type="text" /></font>
                                                            </div>
                                                        </td>
                                                        <td width="25%">
                                                            <div align="left"><a href="#" id="btn12B" onclick="showTaxTransModal(12)" >12B</a>
               
                                                                    <input  disabled="true" id="frm2552:txtTaxBase12B" name="frm2552:txtTaxBase12B" size="20" style="background-color: rgb(220, 220, 220); text-align: right;" value="0.00" type="text" />
                                                                </font><font face="Arial, Helvetica, sans-serif" size="2">                                                            </font>
                                                            </div></td>
                                                        <td width="10%">
                                                            <div align="left"><b><font size="2" face="Arial">12C</font> <font size="1" face="Arial">6/10 of 1%</font></b><font face="Arial, Helvetica, sans-serif" size="2">                                                            </font>
                                                            </div></td>
                                                        <td width="25%">
                                                            <div align="left"><b><font size="2" face="Arial">12D</font></b>
                                                                <input  disabled="true" id="frm2552:txtTaxDue12D" name="frm2552:txtTaxDue12D" size="20" style="background-color: rgb(220, 220, 220); text-align: right;" value="0.00" type="text" />
                                                                &nbsp;
                                                            </div></td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top" width="5%"><b><font face="Arial, Helvetica, sans-serif" size="2">13&nbsp;</font></b></td>
                                                        <td valign="top" height="0px" width="20%">
                                                            <label face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;" > Sale/Exchange of Shares of Stock through Primary Public Offering
                            <br/>&nbsp;&nbsp;up to 25%<br/>&nbsp;&nbsp;over 25% but not over 33 1/3%<br/>&nbsp;&nbsp;over 33 1/3%</label>
                                                        </td>
                                                        <td valign="top" width="15%">
                                                            <div align="center"><b><font face="Arial, Helvetica, sans-serif" size="2">13A&nbsp;</font></b>
                                                                <input  disabled="true" id="frm2552:txtATC13A" maxlength="5" name="frm2552:txtATC13A" size="5" style="background-color: rgb(220, 220, 220);text-align: center" value="PT201" type="text" />
                                                            </div></td>
                            
                                                        <td colspan="3" width="60%">
                            <div align="center">
                                                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                                    <tbody>
                                                                        <tr width="27%" align="left">
                                                                            <td valign="top" width="42%">
                                                                                <!--<input type="button" class="printButtonClass" id="btn13B" value="13B" onclick="showTaxTransModal(13)" />-->
                                        <a href="#" id="btn13B" onclick="showTaxTransModal(13)" >13B</a>
                                                                                <input  disabled="true" id="frm2552:txtTaxBase13B" name="frm2552:txtTaxBase13B" size="20" style="background-color: rgb(220, 220, 220); text-align: right;" value="0.00" type="text" />
                                                                            </td>
                                                                            <td valign="top"><div align="left"><b><font size="2" face="Arial">13C&nbsp;</font> <font size="3" face="Arial">&nbsp;</font> <font size="1" face="Arial">4%&nbsp;&nbsp;</font> <font size="4" face="Arial">&nbsp;&nbsp;</font></b></div></td>
                                                                            <td>
                                                                                <b><font size="2" face="Arial" style="margin-right: 3px;">13D</font></b>
                                                                                <input  disabled="true" id="frm2552:txtTaxDue13D" name="frm2552:txtTaxDue13D" size="20" style="background-color: rgb(220, 220, 220); text-align: right;" value="0.00" type="text" />
                                                                                </td>
                                                                        </tr>
                                                                        <tr width="27%" align="left">
                                                                            <td valign="top" width="240">
                                                                                  <a href="#" id="btn13E" onclick="showTaxTransModal(13)" >13E</a>
                                                                                <input  disabled="true" id="frm2552:txtTaxBase13E" name="frm2552:txtTaxBase13E" size="20" style="background-color: rgb(220, 220, 220); text-align: right;" value="0.00" type="text" />
                                                                            </td>
                                                                            <td valign="top" width="74"><b><font size="2" face="Arial">13F&nbsp;</font> <font size="3" face="Arial">&nbsp;</font> <font size="1" face="Arial">2%</font> <font size="4" face="Arial">&nbsp;&nbsp;</font></b></td>
                                                                            <td width="190">
                                                                                <b><font size="2" face="Arial" style="margin-right: 2px;">13G</font></b>
                                                                                <input disabled="true" id="frm2552:txtTaxDue13G" name="frm2552:txtTaxDue13G" size="20" style="background-color: rgb(220, 220, 220); text-align: right;" value="0.00" type="text" />
                                                                               </td>
                                                                        </tr>
                                                                        <tr width="27%" align="left">
                                                                            <td valign="top" width="240">
                                                                                  <a href="#" id="btn13H" onclick="showTaxTransModal(13)" >13H</a>
                                                                                <input  disabled="true" id="frm2552:txtTaxBase13H" name="frm2552:txtTaxBase13H" size="20" style="background-color: rgb(220, 220, 220); text-align: right;" value="0.00" type="text" />
                                                                            </td>
                                                                            <td valign="top" width="74"><div align="left"><b><font size="2" face="Arial">13I&nbsp;&nbsp;</font> <font size="3" face="Arial">&nbsp;</font> <font size="1" face="Arial">1%</font> <font size="4" face="Arial">&nbsp;&nbsp;</font></b></div></td>
                                                                            <td width="190">
                                                                                <b><font size="2" face="Arial" style="margin-right: 5px;">13J</font></b>
                                        <input disabled="true" id="frm2552:txtTaxDue13J" name="frm2552:txtTaxDue13J" size="20" style="background-color: rgb(220, 220, 220); text-align: right;" value="0.00" type="text" />
                                                                                </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <div align="left"><font face="Arial, Helvetica, sans-serif" size="2">                                                            </font>
                                                                </div>
                                                            </div>
                                                            <div align="center">
                                                            </div></td>
                                                    </tr>
                          
                                                    <tr>                          
                                                        <td valign="top"><font face="Arial, Helvetica, sans-serif" size="1"><b><font face="Arial, Helvetica, sans-serif" size="2">14</font></b></font></td>
                                                        <td valign="top">
                                                            <label face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;" >Sale/Exchange of Shares of Stock through Secondary Public Offering<br/>&nbsp;&nbsp;up to 25%<br/>&nbsp;&nbsp;over 25% but not over 33 1/3%<br/>&nbsp;&nbsp;over 33 1/3%</label>
                                                        </td>
                                                        <td valign="top">
                                                            <div align="center"><b><font size="2" face="Arial">14A</font></b>
                                                                <input  disabled="true" id="frm2552:txtATC14A" maxlength="5" name="frm2552:txtATC14A" size="5" style="background-color: rgb(220, 220, 220);text-align: center" value="PT202" type="text" />
                                                            </div>
                            </td>
                                                        <td colspan="3">
                                                            <div align="center">
                                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                    <tbody>
                                                                        <tr width="27%" align="left">
                                                                            <td width="42%" valign="top">
                                                                                <!--<input type="button" class="printButtonClass" id="btn14B" value="14B" onclick="showTaxTransModal(14)" />-->
                                        <a href="#" id="btn14B" onclick="showTaxTransModal(14)" >14B</a>
                                                                                <input  disabled="true" id="frm2552:txtTaxBase14B" name="frm2552:txtTaxBase14B" size="20" style="background-color: rgb(220, 220, 220); text-align: right;" value="0.00" type="text" />
                                                                            </td>
                                                                            <td valign="top"><div align="left"><b><font size="2" face="Arial">14C&nbsp;&nbsp;</font> <font size="1" face="Arial">4%</font> <font size="4" face="Arial">&nbsp;&nbsp;</font></b></div></td>
                                                                            <td>
                                                                                <b><font size="2" face="Arial" style="margin-right: 3px;">14D </font></b>
                                                                                <input disabled="true" id="frm2552:txtTaxDue14D" name="frm2552:txtTaxDue14D" size="20" style="background-color: rgb(220, 220, 220); text-align: right;" value="0.00" type="text" />
                                                                                </td>
                                                                        </tr>
                                                                        <tr width="27%" align="left">
                                                                            <td valign="top" width="240">
                                                                                <a href="#" id="btn14E" onclick="showTaxTransModal(14)" >14E</a>
                                                                                <input disabled="true" id="frm2552:txtTaxBase14E" name="frm2552:txtTaxBase14E" size="20" style="background-color: rgb(220, 220, 220); text-align: right;" value="0.00" type="text" />
                                                                                </td>
                                                                            <td valign="top" width="74"><div align="left"><b><font size="2" face="Arial">14F&nbsp;&nbsp;</font> <font size="1" face="Arial">2%</font> <font size="4" face="Arial">&nbsp;&nbsp;</font></b></div></td>
                                                                            <td width="190">
                                                                                <b><font size="2" face="Arial" style="margin-right: 2px;">14G</font></b>
                                                                                <input disabled="true" id="frm2552:txtTaxDue14G" name="frm2552:txtTaxDue14G" size="20" style="background-color: rgb(220, 220, 220); text-align: right;" value="0.00" type="text" />
                                                                                </td>
                                                                        </tr>
                                                                        <tr width="27%" align="left">
                                                                            <td valign="top" width="240">
                                        <a href="#" id="btn14H" onclick="showTaxTransModal(14)" >14H</a>
                                                                                <input disabled="true" id="frm2552:txtTaxBase14H" name="frm2552:txtTaxBase14H" size="20" style="background-color: rgb(220, 220, 220); text-align: right;" value="0.00" type="text" />
                                                                                </td>
                                                                            <td valign="top" width="74"><div align="left"><b><font size="2" face="Arial">14I&nbsp;&nbsp;&nbsp;</font> <font size="1" face="Arial">1%</font> <font size="4" face="Arial">&nbsp;&nbsp;</font></b></div></td>
                                                                            <td width="190">
                                                                                <b><font size="2" face="Arial" style="margin-right: 5px;">14J</font></b>
                                                                                <input disabled="true" id="frm2552:txtTaxDue14J" name="frm2552:txtTaxDue14J" size="20" style="background-color: rgb(220, 220, 220); text-align: right;" value="0.00" type="text" />
                                                                                &nbsp;&nbsp;
                                                                                <p></p></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <div align="left"><font face="Arial, Helvetica, sans-serif" size="2">                                                            </font>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                          
                                                    <tr>
                                                        <td valign="top"><b><font face="Arial, Helvetica, sans-serif" size="2">15</font></b></td>
                                                        <td valign="top"><font face="Arial, Helvetica, sans-serif" size="1" style="font-size: 11px;">Total Tax Due</font></td>
                                                        <td colspan="4" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="2%"><b></b></td>
                                                                        <td width="65%">&nbsp;</td>
                                                                        <td align="left" width="33%"><b><font size="2" face="Arial">15 &nbsp;</font></b>
                                                                            <input  disabled="true" id="frm2552:txt15" name="frm2552:txt15" size="20" style="background-color: rgb(220, 220, 220); text-align: right;" value="0.00" type="text" />
                                                                            </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table></td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top"><b><font face="Arial, Helvetica, sans-serif" size="2">16</font></b></td>
                                                        <td colspan="5"><b> <font size="-1"></font></b> <font face="Arial, Helvetica, sans-serif" size="1"><b></b></font>
                                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <td align="right" width="8%"><font size="1" face="Arial" style="font-size: 11px;">Less</font> :</td>
                                                                        <td width="56%"><font size="1" face="Arial" style="font-size: 11px;">&nbsp;&nbsp; Tax Credits/Payments</font></td>
                                                                        <td width="23%"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="right" width="8%"><b><font size="2" face="Arial">16A</font></b></td>
                                                                        <td width="56%"><font size="1" face="Arial" style="font-size: 11px;">&nbsp;&nbsp; Tax Paid in Return Previously Filed, if this is an Amended Return</font></td>
                                                                        <td width="23%">
                                                                            <b><font size="2" face="Arial" style="margin-right: 3px;">16A</font></b>
                                                                            <input disabled="true" id="frm2552:txt16A" name="frm2552:txt16A" size="20" style="text-align: right;" value="0.00" type="text" onKeyPress="return numbersonly(event, false)" onblur="round(this,2);computetxt16C();" />
                                                                            </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="right" width="8%"><b><font size="2" face="Arial">16B</font></b></td>
                                                                        <td width="56%"><font size="1" face="Arial" style="font-size: 11px;">&nbsp;&nbsp;Creditable Tax Withheld Per BIR Form 2307</font></td>
                                                                        <td width="23%">
                                                                            <b><font size="2" face="Arial" style="margin-right: 3px;">16B</font></b>
                                                                            <input class="iceInpTxt" id="frm2552:txt16B" maxlength="15" name="frm2552:txt16B" size="20" style="text-align: right;" value="0.00" type="text" onKeyPress="return numbersonly(event, false)" onblur="round(this,2);computetxt16C();" />
                                                                            </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="8%" height="0px" align="right"><b><font size="2" face="Arial">16C </font></b></td>
                                                                        <td width="56%"><font size="1" face="Arial" style="font-size: 11px;">&nbsp;&nbsp;Total Tax Credits/Payments (Sum of Items 16A &amp; 16B)</font></td>
                                                                        <td width="23%"><b><font size="2" face="Arial" style="margin-right: 3px;">16C</font></b>
                                                                            <input  disabled="true" id="frm2552:txt16C" name="frm2552:txt16C" size="20" style="background-color: rgb(220, 220, 220); text-align: right;" value="0.00" type="text" />&nbsp;&nbsp;
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <div align="center"><b></b></div>
                                                            <div align="center">
                                                                <font face="Arial, Helvetica, sans-serif" size="2"></font>
                                                            </div><div align="center"></div><div align="center"></div><div align="center"><font size="2"><font face="Arial, Helvetica, sans-serif"></font></font></div>                                                    </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b><font face="Arial, Helvetica, sans-serif" size="2">17</font></b></td>
                                                        <td colspan="2"><font face="Arial" size="1" style="font-size: 11px;">Total Tax Still Due/(Overpayment) (Item 15 less Item 16C)</font></td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td><b><font size="2" face="Arial">17 &nbsp;</font></b>
                                                            <input disabled="true" id="frm2552:txt17" name="frm2552:txt17" size="20" style="background-color: rgb(220, 220, 220); text-align: right;" value="0.00" type="text" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b><font face="Arial, Helvetica, sans-serif" size="2">18</font></b></td>
                                                        <td><font size="1" face="Arial" style="font-size: 11px;">Add: Penalties</font></td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td colspan="4"><table border="0" cellpadding="0" cellspacing="0" width="62%">
                                                                
                                <tbody>
                                                                    <tr>
                                                                        <td align="center" width="164"><font size="1" face="Arial" style="font-size: 11px;">Surcharge</font></td>
                                                                        <td align="center" width="165"><font size="1" face="Arial" style="font-size: 11px;">Interest</font></td>
                                                                        <td align="center" width="171"><font size="1" face="Arial" style="font-size: 11px;">Compromise</font></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><b><font size="2" face="Arial">18A</font></b>
                                                                            <input class="iceInpTxt" id="frm2552:txt18A" maxlength="15" name="frm2552:txt18A" size="15" style="text-align: right;" value="0.00" type="text" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computePenalties()" /></td>
                                                                        <td><b><font size="2" face="Arial">18B</font></b>
                                                                            <input class="iceInpTxt" id="frm2552:txt18B" maxlength="15" name="frm2552:txt18B" size="15" style="text-align: right;" value="0.00" type="text" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computePenalties()" /></td>
                                                                        <td><b><font size="2" face="Arial">18C</font></b>
                                                                            <input class="iceInpTxt" id="frm2552:txt18C" maxlength="15" name="frm2552:txt18C" size="15" style="text-align: right;" value="0.00" type="text" onkeypress="return numbersonly(this, event)" onblur="round(this,2);computePenalties()" /></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table></td>
                                                        <td valign="bottom"><b><font size="2" face="Arial">18D</font></b>
                                                            <input  disabled="true" id="frm2552:txt18D" name="frm2552:txt18D" size="20" style="background-color: rgb(220, 220, 220); text-align: right;" value="0.00" type="text" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b><font face="Arial, Helvetica, sans-serif" size="2">19</font></b></td>
                                                        <td colspan="5"><table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <td colspan="3"><font size="1" face="Arial" style="font-size: 11px;">Total Amount Payable/(Overpayment) (Sum of 17 &amp; 18D)</font></td>
                                                                        <td width="17%"></td>
                                                                        <td align="left" width="26%"><b><font size="2" face="Arial">19&nbsp;&nbsp;</font></b>
                                                                            <input  disabled="true" id="frm2552:txt19" name="frm2552:txt19" size="20" style="background-color: rgb(220, 220, 220); text-align: right;" value="0.00" type="text" />
                                                                            </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="6"><font size="1" face="Arial" style="font-size: 11px;">If Overpayment, mark one box only:&nbsp;</font> &nbsp;
                                                                <table class="iceSelOneRb-dis" border="0" cellpadding="0" cellspacing="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><input disabled="disabled" id="frm2552:txt19ifoverpay:_1" name="frm2552:txt19ifoverpay" value="R" type="radio" /><label class="iceSelOneRb-dis-dis" style="font-family: Arial,Helvetica,sans-serif; font-size: 11px" for="frm2552:txt19ifoverpay:_1" >To be Refunded</label></td>
                                                                            <td><input disabled="disabled" id="frm2552:txt19ifoverpay:_2" name="frm2552:txt19ifoverpay"  value="I" type="radio" /><label class="iceSelOneRb-dis-dis" style="font-family: Arial,Helvetica,sans-serif; font-size: 11px" for="frm2552:txt19ifoverpay:_2" >To be issued a Tax Certificate</label></td>
                                                                            <td><input disabled="disabled" id="frm2552:txt19ifoverpay:_3" name="frm2552:txt19ifoverpay"  value="C" type="radio" /><label class="iceSelOneRb-dis-dis" style="font-family: Arial,Helvetica,sans-serif; font-size: 11px" for="frm2552:txt19ifoverpay:_3">To be Carried over as a tax credit next year/quarter</label></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTd"><table width="840" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="100">&nbsp;&nbsp;&nbsp;<font size="2" style="font-weight:bold;">Part III</font></td>
                                                        <td width="621"><div align="center"><font size="2" style="font-weight:bold;letter-spacing: 3px;">Summary of Transactions not subject to Tax</font></div></td>
                                                    </tr>
                                                </table></td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTd">
                                                <table width="840" id="tblTransaction" height="0px" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="13" height="0px">&nbsp;&nbsp;&nbsp;</td>
                                                        <td width="353"><span style="font-size: 11px;">Transaction Classification</span></td>
                                                        <td width="353"><div align="center"><span id="frm2552:summaryOfTransactions:j_id802" style="font-size: 11px;">Amount Involved</span></div></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">&nbsp;</td>
                                                    </tr>
                                                </table>
                      </td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTd printButtonClass">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                        <tr>
                                                            <td height="0px" width="67%">&nbsp;</td>
                                                            <td align="center" height="0px">
                                                                <font size="2" face="Arial">
                                                                    <input id="frm2552:buttAdd" name="frm2552:buttAdd" class="printButtonClass"  value="Add" type="button" onclick="AddTransactionNoTax()"/></font>
                                                                <font size="2" face="Arial">
                                                                    <input id="frm2552:buttDel" name="frm2552:buttDel" class="printButtonClass"  value="Delete" type="button" onclick="deleteTableTransactionNoTax()" />
                                                                </font>
                              </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                      </td>
                                        </tr>
                                        <tr>
                                            <td class="tblFormTd" align="center"><input type="button" class="printButtonClass" id="btnDetailTrans" value="Details of Transaction not subject to Percentage Tax" onclick="showTaxTransNoTaxModal();"/></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                  <div class="imgClass" align='center' style="display:none; width:840px !important;">
                    <table  style="border-top: 3px solid black; border-collapse: collapse; font-family:arial; font-size:11px; text-align: center; table-layout: fixed;">
                      <col width="50%" />
                        <col width="50%" />
                        <tr>
                          <td colspan="2">I declare, under the penalties of perjury, that this return has made in good faith, verified by me, and to the best of my knowledge, and belief,
                              <br/>is true and correct, pursuant to the provisions of the National Internal Revenue Code, as amended, and the regulations issued under authority thereof.
                              <br/>&nbsp;</td>
                        </tr>
                        <tr>
                          <td><b>20</b>____________________________________________________
                            <br/>Taxpayer/Authorized Agent Signature over Printed Name</td>
                          <td><b>21</b>_______________________________
                            <br/>Title/Position of Signatory</td>
                        </tr>
                    </table>
                  </div>
                  <div class="imgClass" align='center' style="display:none; width:840px !important;">
                    <img id="frm2552:jurat" src="{{ asset('images/bottom_img/2552_new.jpg') }}" width="840"/>
                  </div>
                  <div class="imgClass" align='center' style="display:none; width:840px !important;">
                    <table style="font-size:11px; text-align: left; vertical-align: top;">
                      <tr>
                        <td>&nbsp;Machine Validation/Revenue Official Receipt Details (If not filed with the bank)<br/><br/><br/><br/><br/></td>
                      </tr>
                    </table>
                    <div style="font-size:3px;">&nbsp;</div>
                  </div>
                                    <table width="840" border="0" cellspacing="0" cellpadding="0" class="tblForm printButtonClass">
                                        <tr>
                                            <td class="tblFormTdPart">
                                                <table width="840" cellspacing="0" cellpadding="0" border="0">
                                                    <tbody>
                                                        <tr valign="middle">
                                                            <td width="43"></td>
                                                            <td width="701">
                                                                <div>
                                                                    <div align="center">
                                                                        @if($action != 'view')
                                                                        <input class="printButtonClass" type="button" value="Validate" style="width: 100px;" name="frm2552:cmdValidate" id="frm2552:cmdValidate" onclick="validate()" />
                                                                        <input class="printButtonClass" type="button" value="Edit" style="width: 100px;" name="frm2552:cmdEdit" id="frm2552:cmdEdit" onclick="enableAllControl()"/>
                                                                        <!--<input class="printButtonClass" type="button" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />-->
                                                                        <input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />
                                                                        <input class="printButtonClass" type="button" value="Save" style="width: 100px;" name="btnSave" id="btnSave" onclick="saveData();" />
                                                                        <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                                        <input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;" name="frm2552:btnFinalCopy" id="frm2552:btnFinalCopy" onclick="submitForm();" />
                                                                        <div id="msg" class="printButtonClass" style="display:none;"></div>
                                                                        @else
                                                                             <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                                                                             <input class="printButtonClass" type="button" value="Back" style="width: 100px;" onclick="gotoMain();" />
                                                                         @endif
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
                                    <div class="footer footer2552" style="padding:6px; text-align: center; font-size: 11px; background-color: white;">
                                        <font>Disclaimer : eTax is not connected with BIR or any government agency.</font>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
   
        <div id="modalTaxTransaction" class="printSignFooterClass_2552 aBox255212B" style="width:94%; display:none; min-height:400px; position:relative; top:3%;margin: auto; right:auto; overflow-y:auto; background:#fff;" align="center"> 
           <br><br>
      <table border="1" cellspacing="0" cellpadding="0" width="90%">
      <tr>
        <td width="100%" align="center">Details of Taxable Transaction
        </td>
      </tr>
      <tr>
        <td>
          <table border="0" cellspacing="0" cellpadding="0" width="90%" align="center">
            <tr>
              <td width="100%" class="modalHeader" colspan="9" align="center">Schedule 1 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Computation of Minimum Corporate Income Tax (MCIT) for the Quarter(s)</td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <table style="text-align: center;" border="1" cellspacing="0" cellpadding="0" width="90%" id="tblTaxTrans">
          <tr class="modalColumnHeader">
            <td>&nbsp;</td>
            <td class="text-center">Date</td>
            <td class="text-center">Seller</td>
            <td class="text-center">Buyer</td>
            <td class="text-center">Issuing Corporation</td>
            <td class="text-center">Number of Shares</td>
            <td class="text-center">Taxable Base</td>
            <td class="text-center">Rate</td>
            <td class="text-center">Tax Due</td>
          </tr>
          <tr>
            <td colspan="9">&nbsp;</td>
          </tr>
        </table>
      </tr>
      <tr>
        <table border="1" cellspacing="0" cellpadding="0" width="90%">
          <tr>
            <td class="modalColumnHeader" colspan="5" style="text-align: left"> Total</td>
            <td colspan="4" align="right"><input type="text" style="background-color: rgb(220, 220, 220)" id="TaxabletxtTotal" name="TaxabletxtTotal" value="0.00" maxlength="25" size="20" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          </tr>
        </table>
      </tr>
      <tr>
        <div align="center">
        <input type="button" class="printButtonClass" id="btnAdd" value="Add"  onclick="AddTaxTransRecord()" />
        <input type="button" class="printButtonClass" id="btnDelete" value="Delete" onclick="deletetableTaxTrans()" />
        <br/><br/>
        <input type="button" class="printButtonClass" name="btnOkPop" id="btnOkPop" style="width:120px; height:30px;" value="OK" onclick="getTaxTrans()"  />
        </div>
      </tr>
      
      </table>
        </div>

        <!-- modal PartIII ATC  -->
    <div id="modalTransactionNoTax" class="printSignFooterClass_2552 aBox2552TransactionNoTax" style="width:94%; display:none; min-height:400px; position:relative; top:3%;margin:auto;  right:auto; overflow-y:auto; background:#fff;" align="center">
      <br/>
            <br/>
      <table border="1" cellspacing="0" cellpadding="0" width="90%">
        <tr>
          <td width="100%" align="center">Details of Transaction not subject to Percentage Tax
          </td>
        </tr>
        <tr>
          <td>
            <table border="1" cellspacing="0" cellpadding="0" width="100%" id="tblTaxTransNoTax">
              <tr class="modalColumnHeader text-center">
                <td>&nbsp;</td>
                <td>Date</td>
                <td>Seller</td>
                <td>Buyer</td>
                <td>Issuing Corporation</td>
                <td>Number of Shares</td>
              </tr>
              <tr>
                <td colspan="6">&nbsp;</td>
              </tr>
            </table>
          <td>
        </tr>
        <tr>
          <td>
            <div align="center">
            <input type="button" class="printButtonClass" id="btnAdd" value="Add"  onclick="AddTransactionNoTaxModal()" />
            <input type="button" class="printButtonClass" id="btnDelete" value="Delete" onclick="deletetableTaxTransModal()" />
            <br/><br/>
            <input type="button" class="printButtonClass" name="btnOkPop" id="btnOkPop" style="width:120px; height:30px;" value="OK" onclick="getTransNoTaxModal()"  />
            </div>
          </td>
        </tr>
      </table>
        </div>
    
    <div id="hiddenEnroll" style="display:none;"  > <input id="txtFinalFlag" class="FinalFlag" name="txtFinalFlag" type="text" onblur="" onkeypress="" value="0" maxlength="60"   />
          <input id="txtEnroll" name="txtEnroll" type="text" onblur="" onkeypress="" value="N" maxlength="60"   />
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
    <div id="responseRdo" style="display:none;"><!--loaded files render here--></div> 
@endsection

@section('scripts')
<script type="text/javascript">
  
  /*----------------------------------*/
  //Added by MPISCOSO
    var d=document,XMLBGFile='',data='',XMLFile='',msg = d.getElementById('msg'),flag=true;
  var loader=d.getElementById('loader');
  /*----------------------------------*/
  var isSubmit = false;
  var isSubmitFinal = false;
  
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
  
    setTimeout("sleeptime()", 300);
  
    function sleeptime()
    {
    
    init();
    
    var xmlFileName = document.getElementById('file_name').value;        
    fileName = xmlFileName;
    if (fileName != null && fileName.indexOf('.xml') > -1) {
      loadXML(fileName);  
      
      d.getElementById('frm2552:txtMonth1').disabled = true;
      d.getElementById('frm2552:txtDate').disabled = true;
      d.getElementById('frm2552:txtForYr').disabled = true;
      
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
            d.getElementById('frm2552:txtTIN1').disabled = true;
                  d.getElementById('frm2552:txtTIN2').disabled = true;
            d.getElementById('frm2552:txtTIN3').disabled = true;
    d.getElementById('frm2552:txtBranchCode').disabled = true;
    }
  
    function init()
    {
        d.getElementById('frm2552AmendedRtn1').disabled = true;
        d.getElementById('frm2552AmendedRtn2').disabled = true;
        d.getElementById('frm2552:txtSheets').disabled = false;
    
        d.getElementById('frm2552:lstTaxTreaty').disabled = true;
        d.getElementById('frm2552:txtATC12A').disabled = true;
        d.getElementById('frm2552:txtTaxBase12B').disabled = true;
        d.getElementById('frm2552:txtTaxDue12D').disabled = true;
        d.getElementById('frm2552:txtATC13A').disabled = true;
        d.getElementById('frm2552:txtATC14A').disabled = true;
        d.getElementById('frm2552:txtTaxBase13B').disabled = true;
        d.getElementById('frm2552:txtTaxDue13D').disabled = true;
        d.getElementById('frm2552:txtTaxBase13E').disabled = true;
        d.getElementById('frm2552:txtTaxBase13H').disabled = true;
        d.getElementById('frm2552:txtTaxBase14B').disabled = true;
        d.getElementById('frm2552:txtTaxBase14E').disabled = true;
        d.getElementById('frm2552:txtTaxBase14H').disabled = true;
        d.getElementById('frm2552:txtTaxDue13G').disabled = true;
        d.getElementById('frm2552:txtTaxDue13J').disabled = true;
        d.getElementById('frm2552:txtTaxDue14D').disabled = true;
        d.getElementById('frm2552:txtTaxDue14G').disabled = true;
        d.getElementById('frm2552:txtTaxDue14J').disabled = true;
        d.getElementById('frm2552:txt15').disabled = true;
        d.getElementById('frm2552:txt16C').disabled = true;
        d.getElementById('frm2552:txt17').disabled = true;
        d.getElementById('frm2552:txt18A').disabled = false;
        d.getElementById('frm2552:txt18B').disabled = false;
        d.getElementById('frm2552:txt18C').disabled = false;
        d.getElementById('frm2552:txt18D').disabled = true;
        d.getElementById('frm2552:txt19').disabled = true;
        d.getElementById('frm2552:txt19ifoverpay:_1').disabled = true;
        d.getElementById('frm2552:txt19ifoverpay:_2').disabled = true;
        d.getElementById('frm2552:txt19ifoverpay:_3').disabled = true;
        @if($action != 'view')
    d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm2552:cmdEdit').disabled = true;
    d.getElementById('frm2552:btnFinalCopy').disabled = true;
        d.getElementById('btnUpload').disabled = true;
        @endif
        var dt = new Date();
       
        d.getElementById('frm2552:txtMonth1').selectedIndex = dt.getMonth();
    if (dt.getDate()<10)
      d.getElementById('frm2552:txtDate').value = "0" + dt.getDate();
    else
      d.getElementById('frm2552:txtDate').value = dt.getDate();
      d.getElementById('frm2552:txtForYr').value = dt.getFullYear();

        d.getElementById('frm2552AmendedRtn1').disabled = false;
        d.getElementById('frm2552AmendedRtn2').disabled = false;
        d.getElementById('frm2552:txt16A').disabled = true;
   
    }

  function setInputTextControl_HorizontalAlignment(id,align) {
    if (d.getElementById(id) != null) {
      d.getElementById(id).style.textAlign = "right";
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
            d.getElementById('frm2552:cmdValidate').disabled = true;
            d.getElementById('btnSave').disabled = true;
          }
        flag=false; //added param for loading - false
      var count=0;
      var responses = d.getElementById('response').getElementsByTagName('div');
      var sPar = 'txtAmountInvolvePartIII'; 
                  
      do {
        if (responses.item(count).innerHTML.indexOf(sPar) != -1) {
          var temp = String(responses.item(count).innerHTML);       
          temp = temp.substring(0,sPar.length+1); //substring to length of search param for index - check files
          temp = temp.substring(sPar.length,sPar.length+1); //get the last character for checking
          if ( !isNaN(temp) ) {           
            AddTransactionNoTaxReload(); //if last char is a number, mimics AddTransactionNoTax() but without further validations
            window.setTimeout("loadData();",410);
            window.setTimeout("loadDataRow();",450);      
          } 
        } count++;
      } while (count!=responses.length);
      /*------------PartIII :--------------------------------------------------------------------------*/   

      /*-------------Details : Find Instances of Dynamic Rows within the XML and add to modal-----------*/
      var countDtls=0;
      var responsesDtls = d.getElementById('response').getElementsByTagName('div');
      var sParDtls = 'chkTaxTransModal'; 
      
      do {
        if (responsesDtls.item(countDtls).innerHTML.indexOf(sParDtls) != -1) {
          var temp = String(responsesDtls.item(countDtls).innerHTML);
          temp = temp.substring(0,sParDtls.length+1); //substring to length of search param for index - check files
          temp = temp.substring(sParDtls.length,sParDtls.length+1); //get the last character for checking
          if ( !isNaN(temp) ) AddTransactionNoTaxModalReload(); //if last char is a number, add modal section
        } countDtls++;
      } while (countDtls!=responsesDtls.length);
      window.setTimeout("loadData();getTransNoTaxModal();",510);  
      /*-------------Details :-------------------------------------------------------------------------*/   
      
      /*-------------12/13/14 Buttons : Find Instances of Dynamic Rows within the XML and add to modal-----------*/
      var countBtns=0;
      var responsesBtns = d.getElementById('response').getElementsByTagName('div');
      var sParBtns = 'txtTaxableBase'; 
      
      do {
        if (responsesBtns.item(countBtns).innerHTML.indexOf(sParBtns) != -1) {
          var temp = String(responsesBtns.item(countBtns).innerHTML);
          temp = temp.substring(0,sParBtns.length+1); //substring to length of search param for index - check files
          temp = temp.substring(sParBtns.length,sParBtns.length+1); //get the last character for checking
          if ( !isNaN(temp) ) AddTaxTransRecordReload(); //if last char is a number, add modal section
        } countBtns++;
      } while (countBtns!=responsesBtns.length);
      window.setTimeout("loadData();getTaxTrans();",510); 
    
  }
  
  function loadDataRow() {
    /*This will load data onto fields*/
    var response = d.getElementById('response');    
        var elem = document.getElementById('frmMain').elements;
        for(var i = 0; i < elem.length; i++) {
      
      if (elem[i].type != 'hidden' && elem[i].type != 'undefined') { 
        if (elem[i].type == 'text' || elem[i].type == 'select-one') {
          var fieldVal = String( $("#response").html() ).split(elem[i].id+'=');
          elem[i].value = ''; 
          //elem[i].selectedIndex = 0;
          if(elem[i].id == 'frm2552:txtNameStockBrocker' || elem[i].id == 'frm2552:txtAddress'){
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
  
  function loadData() {
    /*This will load data onto fields*/
    var response = d.getElementById('response');

        var elem = document.getElementById('frmMain').elements;
        for(var i = 0; i < elem.length; i++)
        {
      try{
        if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {  //elem[i].type != 'button' &&       
          if (elem[i].type == 'text' || elem[i].type == 'select-one') {
            var fieldVal = String( $("#response").html() ).split(elem[i].id+'='); 
            if(elem[i].id == 'frm2552:txtNameStockBrocker' || elem[i].id == 'frm2552:txtAddress'){
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
          //dgarfin: temporarily commented until modalAtc popup show/hide 
          //if (elem[i].type == 'button' && elem[i].id == 'btnOkPop') {
          //  elem[i].onclick();        
          //}         
        }
      } catch(e) {
        //alert('exception thrown : e : '+e.description);
      }

        }     
    if(d.getElementById('frm2552:PayPenalties').checked)
    {
      d.getElementById('frm2552:OptTransaction1').disabled = true;
    }
    document.getElementById('txtEmail').value = globalEmail;
  }
  
    function enableSelTreaty()
    {
        d.getElementById('frm2552:lstTaxTreaty').disabled = false;

    }

    function disableSelTreaty()
    {
        d.getElementById('frm2552:lstTaxTreaty').disabled = true;
        d.getElementById('frm2552:lstTaxTreaty').selectedIndex = 0;
    }

    //Validate Functions
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
            if( e.value < 0 )
            {
                var zero = 0;
                e.value = parseFloat(zero).toFixed(2);
            }

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

    function showTaxTransModal(buttonClick){
    if(!d.getElementById("frm2552:PayPenalties").checked && !d.getElementById("frm2552:OptTransaction1").checked && !d.getElementById("frm2552:OptTransaction2").checked) {
        alert("Please select an option on Item no. 10"); return;
      }
      if( d.getElementById("frm2552:PayPenalties").checked ) {
        if(buttonClick == 13 ) {
          alert("You are filing for Shares of Stock Listed and Traded through LSE. Click on item 12."); return;
        }
        if(buttonClick == 14 ) {
          if(!d.getElementById("frm2552:OptTransaction2").checked) {
            alert("You are filing for Shares of Stock Listed and Traded through LSE. Click on item 12."); return;
          }
        }

      }
      else if(d.getElementById("frm2552:OptTransaction1").checked) {
        if(buttonClick != 13 ) {
          alert("You are filing for Primary Initial Public Offering. Click on the link on item 13."); return;
        }
      }else if(d.getElementById("frm2552:OptTransaction2").checked) {
        if(buttonClick != 14 ) {
          alert("You are filing for Secondary Initial Public Offering. Click on the link on item 14."); return;
        }
      }

      d.getElementById('Content').style.display = "none";
        $('#modalTaxTransaction').show('blind');   
        $('#wrapper').css({ 'display':'none'}); 

        setTimeout("d.getElementById('TaxabletxtTotal').disabled = true;" +
    "setInputTextControl_HorizontalAlignment('TaxabletxtTotal', 4);", 100);


    }



    function loadTaxRateValues(index){

        if(d.getElementById("frm2552:PayPenalties").checked){
            $('#selTaxRate'+index).html(  d.getElementById('selTaxRate'+index).innerHTML + "<option value='0.6'> 6/10 of 1% </option>");
        }
        if(d.getElementById("frm2552:OptTransaction1").checked || d.getElementById("frm2552:OptTransaction2").checked) {
            
      $('#selTaxRate'+index).html(  d.getElementById('selTaxRate'+index).innerHTML +
                "<option value='4'> 4% </option> " +
                "<option value='2'> 2% </option>" +
                "<option value='1'> 1% </option>");
        }
    }
    
    function AddTaxTransRecordReload()
    {   
        var table = d.getElementById("tblTaxTrans");
        var iCtr = table.rows.length - 1;
        // alert("ictr " + iCtr)

            var rowCount = table.rows.length - 1;

            var row = table.insertRow(rowCount);

            //check if what content of dropdown of taxrate1
            var cell9 = row.insertCell(0);
      cell9.nowrap = "true";
            cell9.innerHTML = "<input type='text' style='background-color: rgb(220, 220, 220)' id='txtTaxDue"+iCtr+"' value='0.00' maxlength='25' size='20' /> &nbsp;&nbsp;"
     setTimeout("d.getElementById('txtTaxDue"+iCtr+"').disabled = true;" +
                "setInputTextControl_HorizontalAlignment('txtTaxDue"+iCtr+"', 4)", 100);

            var cell8 = row.insertCell(0);
            cell8.innerHTML = "<select id='selTaxRate"+iCtr+"' onchange='computeTaxDue("+iCtr+")' ></select>";
            loadTaxRateValues(iCtr);

            var cell7 = row.insertCell(0);
            cell7.innerHTML = "<input type='text' id='txtTaxableBase"+iCtr+"' value='0.00' maxlength='25' size='20' onKeyPress='return numbersonly(event, false)' onblur='round(this,2);computeTaxDue("+iCtr+");' />  ";
            //setTimeout("setInputTextControl_HorizontalAlignment('txtTaxableBase"+iCtr+"', 4); setInputTextControl_NumberFormatter('txtTaxableBase"+iCtr+"', 12, 2);" , 100);
      setTimeout("setInputTextControl_HorizontalAlignment('txtTaxableBase"+iCtr+"', 4)" , 100);

            var cell6 = row.insertCell(0);
            cell6.innerHTML = "<input type='text' id='txtNumberShares"+iCtr+"' value='0' size='8' onKeyPress='return numbersonly(event, false)' onblur='blockletterWithout2Decimal(this)' /> ";
            setTimeout("setInputTextControl_HorizontalAlignment('txtNumberShares"+iCtr+"', 4); " , 100);
            
            var cell5 = row.insertCell(0);
            cell5.innerHTML = "<input type='text' id='txtIssuingCorp"+iCtr+"' value='' size='8' />";

            var cell4 = row.insertCell(0);
            cell4.innerHTML = "<input type='text' id='txtBuyer"+iCtr+"' value='' onblur='' size='8' /> ";

            var cell3 = row.insertCell(0);
            cell3.innerHTML = "<input type='text' id='txtSeller"+iCtr+"' value='' onblur='' size='8' />";

            var cell2 = row.insertCell(0);
            cell2.innerHTML = "<input type='text' id='txtDate"+iCtr+"' value='' onblur='' size='6' />";
            setTimeout("d.getElementById('txtDate"+iCtr+"').disabled = true" , 100);

            var cell1 = row.insertCell(0);
            cell1.innerHTML = "<input type='checkbox' class='printButtonClass' name='chkTaxTrans' id='chkTaxTrans"+iCtr+"' />";

            var txtMonth = d.getElementById('frm2552:txtMonth1').value;
            var txtday = d.getElementById('frm2552:txtDate').value;
            var txtYear = d.getElementById('frm2552:txtForYr').value;

            d.getElementById('txtDate'+iCtr).value = txtMonth + "/" + txtday + "/" + txtYear;
    } 

    function AddTaxTransRecord()
    {   
        var table = d.getElementById("tblTaxTrans");
        var iCtr = table.rows.length - 1;
        // alert("ictr " + iCtr)
        if(ifRequirementMeetTaxableTransaction() == true) {
            var rowCount = table.rows.length - 1;

            var row = table.insertRow(rowCount);

            //check if what content of dropdown of taxrate1
            var cell9 = row.insertCell(0);
      cell9.nowrap = "true";
            cell9.innerHTML = "<input type='text' style='background-color: rgb(220, 220, 220)' id='txtTaxDue"+iCtr+"' name='txtTaxDue[]' value='0.00' maxlength='25' size='20' /> &nbsp;&nbsp;"
      setTimeout("d.getElementById('txtTaxDue"+iCtr+"').disabled = true;" +
                "setInputTextControl_HorizontalAlignment('txtTaxDue"+iCtr+"', 4)", 100);

            var cell8 = row.insertCell(0);
            cell8.innerHTML = "<select id='selTaxRate"+iCtr+"' name='selTaxRate[]' onchange='computeTaxDue("+iCtr+")' ></select>";
            loadTaxRateValues(iCtr);

            var cell7 = row.insertCell(0);
            cell7.innerHTML = "<input type='text' id='txtTaxableBase"+iCtr+"' name='txtTaxableBase[]'  value='0.00' maxlength='25' size='20' onKeyPress='return numbersonly(event, false)' onblur='round(this,2);computeTaxDue("+iCtr+");' />  ";
            //setTimeout("setInputTextControl_HorizontalAlignment('txtTaxableBase"+iCtr+"', 4); setInputTextControl_NumberFormatter('txtTaxableBase"+iCtr+"', 12, 2);" , 100);
      setTimeout("setInputTextControl_HorizontalAlignment('txtTaxableBase"+iCtr+"', 4)" , 100);

            var cell6 = row.insertCell(0);
            cell6.innerHTML = "<input type='text' id='txtNumberShares"+iCtr+"' name='txtNumberShares[]'  value='0' size='8' onKeyPress='return numbersonly(event, false)' onblur='blockletterWithout2Decimal(this)' /> ";
            setTimeout("setInputTextControl_HorizontalAlignment('txtNumberShares"+iCtr+"', 4); " , 100);
            
            var cell5 = row.insertCell(0);
            cell5.innerHTML = "<input type='text' id='txtIssuingCorp"+iCtr+"' name='txtIssuingCorp[]'  value='' size='8' />";

            var cell4 = row.insertCell(0);
            cell4.innerHTML = "<input type='text' id='txtBuyer"+iCtr+"' name='txtBuyer[]'  value='' onblur='' size='8' /> ";

            var cell3 = row.insertCell(0);
            cell3.innerHTML = "<input type='text' id='txtSeller"+iCtr+"'  name='txtSeller[]' value='' onblur='' size='8' />";

            var cell2 = row.insertCell(0);
            cell2.innerHTML = "<input type='text' id='txtDate"+iCtr+"' name='txtDate[]'  value='' onblur='' size='6' />";
            setTimeout("d.getElementById('txtDate"+iCtr+"').disabled = true" , 100);

            var cell1 = row.insertCell(0);
            cell1.innerHTML = "<input type='checkbox' class='printButtonClass' name='chkTaxTrans[]' id='chkTaxTrans"+iCtr+"' />";

            var txtMonth = d.getElementById('frm2552:txtMonth1').value;
            var txtday = d.getElementById('frm2552:txtDate').value;
            var txtYear = d.getElementById('frm2552:txtForYr').value;

            d.getElementById('txtDate'+iCtr).value = txtMonth + "/" + txtday + "/" + txtYear;
        }
    }

    function ifRequirementMeetTaxableTransaction()
    {   var table = d.getElementById("tblTaxTrans");
        for(var i=1 ; i<= table.rows.length - 2; i++) {
            if(d.getElementById('txtDate'+i).value == '' ||  d.getElementById('txtSeller'+i).value == '' ||  d.getElementById('txtIssuingCorp'+i).value == '' ||
                d.getElementById('txtNumberShares'+i).value <= 0 || d.getElementById('txtTaxableBase'+i).value <= 0 ) {
                alert("Incomplete values on row " + i +". Please check your entries."); return false;
            }
        }
        return true;
    }

    function deletetableTaxTrans() {
        var table1 = d.getElementById("tblTaxTrans");
        var tblrow =  table1.rows.length - 2;
        
        var tempIndex = 0;
        for(var i = 1 ; i< tblrow + 1 ; i++){
           
            if( tblrow > 0){
                if(d.getElementById('chkTaxTrans'+( i - tempIndex )).checked ) {
                    //alert("delete Row " + (i - tempIndex)) ;
                    table1.deleteRow(i - tempIndex );
                    ReOrderInput(i - tempIndex );
                    tempIndex++

                    // recompute totalTaxDuw
                    computeTotalTaxDue();
                }
            }
        }
      
    }

    function getTaxTrans() {
        if(ifRequirementMeetTaxableTransaction()) {
         
      d.getElementById('Content').style.display = 'block';
      if ( $('#modalTaxTransaction').css('display') != 'none' ) {
        $('#modalTaxTransaction').hide('blind');
        $('#wrapper').css({ 'display':'block'}); 
      }
      $('#DummyTxt').html("Creator");
      $('#DummyTxt').html("");        

            var txt1Half = 0;
      var txt6Half10 = 0;
            var txt4 = 0;
            var txt2 = 0;
            var txt1 = 0;
            var txt1HalfBase = 0;
      var txt6HalfBase = 0;
            var txt4Base = 0;
            var txt2Base = 0;
            var txt1Base = 0;
      
            d.getElementById('frm2552:txtTaxBase13B').value = "0.00";
            d.getElementById('frm2552:txtTaxBase13E').value = "0.00";
            d.getElementById('frm2552:txtTaxBase13H').value = "0.00";
            d.getElementById('frm2552:txtTaxBase14B').value = "0.00";
            d.getElementById('frm2552:txtTaxBase14E').value = "0.00";
            d.getElementById('frm2552:txtTaxBase14H').value = "0.00";
      
            d.getElementById('frm2552:txtTaxBase12B').value = "0.00";
            d.getElementById('frm2552:txtTaxDue13D').value = "0.00";
            d.getElementById('frm2552:txtTaxDue13G').value = "0.00";
            d.getElementById('frm2552:txtTaxDue13J').value = "0.00";
            d.getElementById('frm2552:txtTaxDue14D').value = "0.00";
            d.getElementById('frm2552:txtTaxDue14G').value = "0.00";
            d.getElementById('frm2552:txtTaxDue14J').value = "0.00";
            d.getElementById('frm2552:txtTaxDue12D').value = "0.00";
  

            for(i=1; i<= d.getElementById("tblTaxTrans").rows.length - 2; i++) {
               
        if (d.getElementById('selTaxRate'+i).value == "0.6") {
          txt1Half = (txt1Half*1 + NumWithComma(d.getElementById('txtTaxDue'+i).value)*1).toFixed(2);
                    txt1HalfBase = (txt1HalfBase*1 + NumWithComma(d.getElementById('txtTaxableBase'+i).value)*1).toFixed(2);
                } else if(d.getElementById('selTaxRate'+i).value == "4") {
                    txt4 = (txt4*1 + NumWithComma(d.getElementById('txtTaxDue'+i).value)*1).toFixed(2);
                    txt4Base = (txt4Base*1 + NumWithComma(d.getElementById('txtTaxableBase'+i).value)*1).toFixed(2);
                }else if(d.getElementById('selTaxRate'+i).value == "2") {
                    txt2 = (txt2*1 + NumWithComma(d.getElementById('txtTaxDue'+i).value)*1).toFixed(2);
                    txt2Base = (txt2Base*1 + NumWithComma(d.getElementById('txtTaxableBase'+i).value)*1).toFixed(2);
                }else if(d.getElementById('selTaxRate'+i).value == "1") {
                    txt1 = (txt1*1 + NumWithComma(d.getElementById('txtTaxDue'+i).value)*1).toFixed(2);
                    txt1Base = (txt1Base*1 + NumWithComma(d.getElementById('txtTaxableBase'+i).value)*1).toFixed(2);
                }
            }
            if(d.getElementById("frm2552:OptTransaction1").checked) {
        d.getElementById('frm2552:txtTaxBase13B').value = formatCurrency(NumWithComma((txt4Base*1).toFixed(2)));
        d.getElementById('frm2552:txtTaxBase13E').value = formatCurrency(NumWithComma((txt2Base*1).toFixed(2)));
                d.getElementById('frm2552:txtTaxBase13H').value = formatCurrency(NumWithComma((txt1Base*1).toFixed(2)));
                d.getElementById('frm2552:txtTaxDue13D').value = formatCurrency(NumWithComma((txt4*1).toFixed(2)));
                d.getElementById('frm2552:txtTaxDue13G').value = formatCurrency(NumWithComma((txt2*1).toFixed(2)));
                d.getElementById('frm2552:txtTaxDue13J').value = formatCurrency(NumWithComma((txt1*1).toFixed(2)));
            }else if(d.getElementById("frm2552:OptTransaction2").checked) {
                d.getElementById('frm2552:txtTaxBase14B').value = formatCurrency(NumWithComma((txt4Base*1).toFixed(2)));
                d.getElementById('frm2552:txtTaxBase14E').value = formatCurrency(NumWithComma((txt2Base*1).toFixed(2)));
                d.getElementById('frm2552:txtTaxBase14H').value = formatCurrency(NumWithComma((txt1Base*1).toFixed(2)));
                d.getElementById('frm2552:txtTaxDue14D').value = formatCurrency(NumWithComma((txt4*1).toFixed(2)));
                d.getElementById('frm2552:txtTaxDue14G').value = formatCurrency(NumWithComma((txt2*1).toFixed(2)));
                d.getElementById('frm2552:txtTaxDue14J').value = formatCurrency(NumWithComma((txt1*1).toFixed(2)));   
            }
            d.getElementById('frm2552:txtTaxBase12B').value = formatCurrency(NumWithComma((txt1HalfBase*1).toFixed(2)));    
           d.getElementById('frm2552:txtTaxDue12D').value = formatCurrency(NumWithComma((txt1Half*1).toFixed(2)));

            computetxt15();
        }
    }

    function disableTransPrimary() {

        if(d.getElementById("frm2552:PayPenalties").checked){
            d.getElementById("tdPrimaryRadio").innerHTML = "<input type='radio' value='P' name='frm2552:OptTransaction' id='frm2552:OptTransaction1'  onclick='clear12B();deletetableTaxTransModal();deletetableTaxTrans();' />" +
                "<label for='frm2552:OptTransaction1'  style='font-size:11px;' >Primary</label>";

            setTimeout("d.getElementById('frm2552:OptTransaction1').disabled = true", 100);

        }else {
            d.getElementById("frm2552:OptTransaction1").disabled = false
        }
    }

  function clear12B() {
    var table1 = d.getElementById("tblTaxTrans");
        var tblrow =  table1.rows.length - 2;
    
    try {
    // var tempIndex = 0;
    for(var i = 0; i<=tblrow; i++){
            if(tblrow > 0 && d.getElementById('selTaxRate'+(i))!=null){
        // alert("Row " + i + " = " + d.getElementById('selTaxRate'+(i)).value);
                d.getElementById('chkTaxTrans'+(i)).checked = true;
            }
        }
    } catch(e) { alert(e); }
    
    deletetableTaxTrans();
        
    d.getElementById('frm2552:txtTaxBase12B').value = "0.00";
    d.getElementById('frm2552:txtTaxDue12D').value = "0.00";
    d.getElementById('frm2552:txtTaxBase13B').value = "0.00";
    d.getElementById('frm2552:txtTaxDue13D').value = "0.00";
    d.getElementById('frm2552:txtTaxBase13E').value = "0.00";
    d.getElementById('frm2552:txtTaxDue13G').value = "0.00";
    d.getElementById('frm2552:txtTaxBase13H').value = "0.00";
    d.getElementById('frm2552:txtTaxDue13J').value = "0.00";
    d.getElementById('frm2552:txtTaxBase14B').value = "0.00";
    d.getElementById('frm2552:txtTaxDue14D').value = "0.00";
    d.getElementById('frm2552:txtTaxBase14E').value = "0.00";
    d.getElementById('frm2552:txtTaxDue14G').value = "0.00";
    d.getElementById('frm2552:txtTaxBase14H').value = "0.00";
    d.getElementById('frm2552:txtTaxDue14J').value = "0.00";
    d.getElementById('frm2552:txt15').value = "0.00";
    
    computePenalties()
  }
  
    function ReOrderInput(indexParam) {
        
        var tblTaxTrans = d.getElementById('tblTaxTrans');
        var chkBox;
        var tDate;
        var Seller;
        var Buyer;
        var Issuing;
        var Share;
        var taxBase;
        var taxRate;
        var taxDue;
        
        while(indexParam < tblTaxTrans.rows.length - 1){ //alert("indexParam " + indexParam + " tblsize " + tblTaxTrans.rows.length)
            chkBox = d.getElementById('chkTaxTrans' + ((indexParam*1) + 1));
            tDate = d.getElementById('txtDate' + ((indexParam*1) + 1));
            Seller = d.getElementById('txtSeller' + ((indexParam*1) + 1));
            Buyer = d.getElementById('txtBuyer' + ((indexParam*1) + 1));
            Issuing = d.getElementById('txtIssuingCorp' + ((indexParam*1) + 1));
            Share = d.getElementById('txtNumberShares' + ((indexParam*1) + 1));
            taxBase = d.getElementById('txtTaxableBase' + ((indexParam*1) + 1));
            taxRate = d.getElementById('selTaxRate' + ((indexParam*1) + 1));
            taxDue = d.getElementById('txtTaxDue' + ((indexParam*1) + 1));

            chkBox.id = "chkTaxTrans" + indexParam;
            tDate.id = "txtDate" + indexParam;
            Seller.id = "txtSeller" + indexParam;
            Buyer.id = "txtBuyer" + indexParam;
            Issuing.id = "txtIssuingCorp" + indexParam;
            Share.id = "txtNumberShares" + indexParam;
            taxBase.id = "txtTaxableBase" + indexParam;
            taxRate.id = "selTaxRate" + indexParam;
            taxDue.id = "txtTaxDue" + indexParam;

            indexParam++;
        }
    }

    function computeTaxDue(index) {
    //d.getElementById('txtTaxDue'+index).value = ( d.getElementById('txtTaxableBase'+index).value * d.getElementById('selTaxRate'+index).value / 100 ).toFixed(2);

        d.getElementById('txtTaxDue'+index).value = formatCurrency(( NumWithComma(d.getElementById('txtTaxableBase'+index).value) * d.getElementById('selTaxRate'+index).value / 100 ));
        computeTotalTaxDue();
    }

    function computeTotalTaxDue(){
        var table = d.getElementById('tblTaxTrans');
        var txtTotalTaxDue = 0;
        for(i = 1 ; i <= table.rows.length - 2 ; i++) {
            txtTotalTaxDue = txtTotalTaxDue*1 + NumWithComma(d.getElementById('txtTaxDue'+i).value)*1;
        }
        d.getElementById('TaxabletxtTotal').value = formatCurrency(txtTotalTaxDue.toFixed(2)); 
    }

    function computetxt15(){
        d.getElementById('frm2552:txt15').value = formatCurrency((NumWithComma(d.getElementById('frm2552:txtTaxDue12D').value)*1 +
            NumWithComma(d.getElementById('frm2552:txtTaxDue13D').value)*1 + NumWithComma(d.getElementById('frm2552:txtTaxDue13G').value)*1 + NumWithComma(d.getElementById('frm2552:txtTaxDue13J').value)*1 +
            NumWithComma(d.getElementById('frm2552:txtTaxDue14D').value)*1 + NumWithComma(d.getElementById('frm2552:txtTaxDue14G').value)*1 + NumWithComma(d.getElementById('frm2552:txtTaxDue14J').value)*1 ).toFixed(2));

        computetxt16C();
           
    }

    function computetxt16C() {
        d.getElementById('frm2552:txt16C').value = formatCurrency((NumWithComma(d.getElementById('frm2552:txt16A').value)*1 + NumWithComma(d.getElementById('frm2552:txt16B').value)*1 ).toFixed(2));
        computetxt17and19();
    }
    function computetxt17and19() {
        d.getElementById('frm2552:txt17').value = formatCurrency((NumWithComma(d.getElementById('frm2552:txt15').value)*1 - NumWithComma(d.getElementById('frm2552:txt16C').value)*1 ).toFixed(2));

        d.getElementById('frm2552:txt19').value = formatCurrency((NumWithComma(d.getElementById('frm2552:txt17').value)*1 + NumWithComma(d.getElementById('frm2552:txt18D').value)*1 ).toFixed(2));
        
        if(NumWithComma(d.getElementById('frm2552:txt19').value) < 0) {
 
            d.getElementById('frm2552:txt19ifoverpay:_1').disabled = false;
            d.getElementById('frm2552:txt19ifoverpay:_2').disabled = false;
            d.getElementById('frm2552:txt19ifoverpay:_3').disabled = false;
        }else {

            d.getElementById('frm2552:txt19ifoverpay:_1').disabled = true;
            d.getElementById('frm2552:txt19ifoverpay:_2').disabled = true;
            d.getElementById('frm2552:txt19ifoverpay:_3').disabled = true;
      
            d.getElementById('frm2552:txt19ifoverpay:_1').checked = false;
            d.getElementById('frm2552:txt19ifoverpay:_2').checked = false;
            d.getElementById('frm2552:txt19ifoverpay:_3').checked = false;        
        }
    capital();
    }
    
  function computePenalties()
  {        
        d.getElementById('frm2552:txt18D').value = formatCurrency(NumWithComma(d.getElementById('frm2552:txt18A').value)*1 + NumWithComma(d.getElementById('frm2552:txt18B').value)*1 + NumWithComma(d.getElementById('frm2552:txt18C').value)*1);
    computetxt17and19();
  }
  
    function AddTransactionNoTaxReload() {
        var tabletrans = d.getElementById('tblTransaction');
        var iCtr = tabletrans.rows.length - 1;

            var rowCount = tabletrans.rows.length - 1;

            var row = tabletrans.insertRow(rowCount);

            var cell3 = row.insertCell(0);
            cell3.innerHTML = "<div align='center'><input type='text' id='txtAmountInvolvePartIII"+iCtr+"' value='0.00' size='20' maxlength='25' onKeyPress='return numbersonly(event, false)' onblur='round(this,2)' /></div>";
            setTimeout("setInputTextControl_HorizontalAlignment('txtAmountInvolvePartIII"+iCtr+"', 4);" +
                "setInputTextControl_NumberFormatter('txtAmountInvolvePartIII"+iCtr+"', 15 ,2);" , 100);

            var cell2 = row.insertCell(0);
            cell2.innerHTML = "<input type='text' id='txtTranClassPartIII"+iCtr+"' value='' size='44' maxlength='30' />";

            var cell1 = row.insertCell(0);
            cell1.innerHTML = "<input type='checkbox' name='chkTaxTransPartIII' id='chkTaxTransPartIII"+iCtr+"' />";
    } 
  
    function AddTransactionNoTax() {
        var tabletrans = d.getElementById('tblTransaction');
        var iCtr = tabletrans.rows.length - 1;

        if(ifRequirementMeetTransactionNoTax()){
            var rowCount = tabletrans.rows.length - 1;

            var row = tabletrans.insertRow(rowCount);

            var cell3 = row.insertCell(0);
            cell3.innerHTML = "<div align='center'><input type='text' id='txtAmountInvolvePartIII"+iCtr+"' value='0.00' size='20' maxlength='25' onKeyPress='return numbersonly(event, false)' onblur='round(this,2)' /></div>";
            setTimeout("setInputTextControl_HorizontalAlignment('txtAmountInvolvePartIII"+iCtr+"', 4);" +
                "setInputTextControl_NumberFormatter('txtAmountInvolvePartIII"+iCtr+"', 15 ,2);" , 100);

            var cell2 = row.insertCell(0);
            cell2.innerHTML = "<input type='text' id='txtTranClassPartIII"+iCtr+"' value='' size='44' maxlength='30' />";

            var cell1 = row.insertCell(0);
            cell1.innerHTML = "<input type='checkbox' name='chkTaxTransPartIII' id='chkTaxTransPartIII"+iCtr+"' />";
        }
    }

    function ifRequirementMeetTransactionNoTax()
    {   var table = d.getElementById('tblTransaction');
        for(var i=1 ; i<= table.rows.length - 2; i++) {
            if(d.getElementById('txtTranClassPartIII'+i).value == '' ||  d.getElementById('txtAmountInvolvePartIII'+i).value == '' ) {
                alert("Incomplete entries on Part 3 row " + i +". Please check your entries."); return false;
            }
        }
        return true;
    }

    function showTaxTransNoTaxModal(){
       
    d.getElementById('Content').style.display = "none";
        $('#modalTransactionNoTax').show('blind');    
    }

    function getTransNoTaxModal() {
        if(ifRequirementMeetTransactionNoTaxModal() ) {
        
      d.getElementById('Content').style.display = 'block';
      if ( $('#modalTransactionNoTax').css('display') != 'none' ) {
        $('#modalTransactionNoTax').hide('blind');
      }
      $('#DummyTxt').html("Creator");
      $('#DummyTxt').html("");        
        }
    }

    
    function deleteTableTransactionNoTax() {
        var table1 = d.getElementById('tblTransaction');
        var tblrow =  table1.rows.length - 2;

        var tempIndex = 0;
        for(var i = 1 ; i< tblrow + 1 ; i++){

            if( tblrow > 0){
                if(d.getElementById('chkTaxTransPartIII'+( i - tempIndex )).checked ) {
                    //alert("delete Row " + (i - tempIndex)) ;
                    table1.deleteRow(i - tempIndex );
                    ReOrderInputPartIII(i - tempIndex );
                    tempIndex++

                }
            }
        }
    }
    
    function ReOrderInputPartIII(indexParam) {
        var tblTaxTrans = d.getElementById('tblTransaction');
        var chkBox;
        var tranclassification;
        var amountInvolve;

        while(indexParam < tblTaxTrans.rows.length - 1){ //alert("indexParam " + indexParam + " tblsize " + tblTaxTrans.rows.length)
            chkBox = d.getElementById('chkTaxTransPartIII' + ((indexParam*1) + 1));
            tranclassification = d.getElementById('txtTranClassPartIII' + ((indexParam*1) + 1));
            amountInvolve = d.getElementById('txtAmountInvolvePartIII' + ((indexParam*1) + 1));

            chkBox.id = "chkTaxTransPartIII" + indexParam;
            tranclassification.id = "txtTranClassPartIII" + indexParam;
            amountInvolve.id = "txtAmountInvolvePartIII" + indexParam;

            indexParam++;
        }
    }

    function ifRequirementMeetTransactionNoTaxModal() {
        var table = d.getElementById('tblTaxTransNoTax');
        for(var i=1 ; i<= table.rows.length - 2; i++) {
            if(d.getElementById('txtDateNoTax'+i).value == '' ||  d.getElementById('txtSellerNoTax'+i).value == '' ||
                d.getElementById('txtBuyerNoTax'+i).value == '' || d.getElementById('txtIssuingCorpNoTax'+i).value == '' ||
                d.getElementById('txtNumberSharesNoTax'+i).value <= 0) {
                alert("Incomplete values on row " + i +". Please check your entries."); return false;
            }
        }
        return true;
    }
    
    function AddTransactionNoTaxModalReload() {
        var tabletrans = d.getElementById('tblTaxTransNoTax');
        var iCtr = tabletrans.rows.length - 1;

            var rowCount = tabletrans.rows.length - 1;

            var row = tabletrans.insertRow(rowCount);

            var cell6 = row.insertCell(0);
            cell6.innerHTML = "<input type='text' id='txtNumberSharesNoTax"+iCtr+"' value='0' size'10'  onKeyPress='return numbersonly(event, false)' onblur='blockletterWithout2Decimal(this)'/> ";
            setTimeout("setInputTextControl_HorizontalAlignment('txtNumberSharesNoTax"+iCtr+"', 4);" , 100);

            var cell5 = row.insertCell(0);
            cell5.innerHTML = "<input type='text' id='txtIssuingCorpNoTax"+iCtr+"' value='' size'10' />";

            var cell4 = row.insertCell(0);
            cell4.innerHTML = "<input type='text' id='txtBuyerNoTax"+iCtr+"' value='' onblur='' size'10' /> ";

            var cell3 = row.insertCell(0);
            cell3.innerHTML = "<input type='text' id='txtSellerNoTax"+iCtr+"' value='' size'10' onblur='' />";

            var cell2 = row.insertCell(0);
            cell2.innerHTML = "<input type='text' id='txtDateNoTax"+iCtr+"' value='' size'8' onblur='' />";
            setTimeout("d.getElementById('txtDateNoTax"+iCtr+"').disabled = true" , 100);

            var cell1 = row.insertCell(0);
            cell1.innerHTML = "<input type='checkbox' class='printButtonClass' name='chkTaxTransModal' id='chkTaxTransModal"+iCtr+"' />";

            var txtMonth = d.getElementById('frm2552:txtMonth1').value;
            var txtday = d.getElementById('frm2552:txtDate').value;
            var txtYear = d.getElementById('frm2552:txtForYr').value;

            d.getElementById('txtDateNoTax'+iCtr).value = txtMonth + "/" + txtday + "/" + txtYear;
    }    

    function AddTransactionNoTaxModal() {
        var tabletrans = d.getElementById('tblTaxTransNoTax');
        var iCtr = tabletrans.rows.length - 1;

        if(ifRequirementMeetTransactionNoTaxModal()){
            var rowCount = tabletrans.rows.length - 1;

            var row = tabletrans.insertRow(rowCount);

            var cell6 = row.insertCell(0);
            cell6.innerHTML = "<input type='text' id='txtNumberSharesNoTax"+iCtr+"' name='txtNumberSharesNoTax[]' value='0' size'10' onKeyPress='return numbersonly(event, false)' onblur='blockletterWithout2Decimal(this)' /> ";
            setTimeout("setInputTextControl_HorizontalAlignment('txtNumberSharesNoTax"+iCtr+"', 4);" , 100);

            var cell5 = row.insertCell(0);
            cell5.innerHTML = "<input type='text' id='txtIssuingCorpNoTax"+iCtr+"'  name='txtIssuingCorpNoTax[]' value='' size'10' />";

            var cell4 = row.insertCell(0);
            cell4.innerHTML = "<input type='text' id='txtBuyerNoTax"+iCtr+"' name='txtBuyerNoTax[]'  value='' size'10' onblur='' /> ";

            var cell3 = row.insertCell(0);
            cell3.innerHTML = "<input type='text' id='txtSellerNoTax"+iCtr+"' name='txtSellerNoTax[]' value='' size'10' onblur='' />";

            var cell2 = row.insertCell(0);
            cell2.innerHTML = "<input type='text' id='txtDateNoTax"+iCtr+"'  name='txtDateNoTax[]' value='' size'8' onblur='' />";
            setTimeout("d.getElementById('txtDateNoTax"+iCtr+"').disabled = true" , 100);

            var cell1 = row.insertCell(0);
            cell1.innerHTML = "<input type='checkbox' class='printButtonClass' name='chkTaxTransModal[]' id='chkTaxTransModal"+iCtr+"' />";

            var txtMonth = d.getElementById('frm2552:txtMonth1').value;
            var txtday = d.getElementById('frm2552:txtDate').value;
            var txtYear = d.getElementById('frm2552:txtForYr').value;

            d.getElementById('txtDateNoTax'+iCtr).value = txtMonth + "/" + txtday + "/" + txtYear;
        }
    }

    function deletetableTaxTransModal() {
        var table1 = d.getElementById('tblTaxTransNoTax');
        var tblrow =  table1.rows.length - 2;

        var tempIndex = 0;
        for(var i = 1 ; i< tblrow + 1 ; i++){
            if( tblrow > 0){
                if(d.getElementById('chkTaxTransModal'+( i - tempIndex )).checked ) {
                    //alert("delete Row " + (i - tempIndex)) ;
                    table1.deleteRow(i - tempIndex );
                    ReOrderInputPartIIIModal(i - tempIndex );
                    tempIndex++

                }
            }
        }
    }

    function ReOrderInputPartIIIModal(indexParam) {
        var tblTaxTrans = d.getElementById('tblTaxTransNoTax');
        var chkBox;
        var tDate;
        var Seller;
        var Buyer;
        var Issuing;
        var Share;


        while(indexParam < tblTaxTrans.rows.length - 1){ 
            chkBox = d.getElementById('chkTaxTransModal' + ((indexParam*1) + 1));
            tDate = d.getElementById('txtDateNoTax' + ((indexParam*1) + 1));
            Seller = d.getElementById('txtSellerNoTax' + ((indexParam*1) + 1));
            Buyer = d.getElementById('txtBuyerNoTax' + ((indexParam*1) + 1));
            Issuing = d.getElementById('txtIssuingCorpNoTax' + ((indexParam*1) + 1));
            Share = d.getElementById('txtNumberSharesNoTax' + ((indexParam*1) + 1));

            chkBox.id = "chkTaxTransModal" + indexParam;
            tDate.id = "txtDateNoTax" + indexParam;
            Seller.id = "txtSellerNoTax" + indexParam;
            Buyer.id = "txtBuyerNoTax" + indexParam;
            Issuing.id = "txtIssuingCorpNoTax" + indexParam; 
            Share.id = "txtNumberSharesNoTax" + indexParam;

            indexParam++;
        }
    }




    
    function validate() { 
        var dt = new Date();
    var isLeap = new Date(document.getElementById('frm2552:txtForYr').value, 1, 29).getMonth() == 1;
    
    
    if (!isLeap && document.getElementById('frm2552:txtMonth1').value==2 && document.getElementById('frm2552:txtDate').value==29) {
      alert("Filing year is not a leap year.");
      return;
    }
    if (!isLeap && document.getElementById('frm2552:txtMonth1').value==2 && document.getElementById('frm2552:txtDate').value>29) {
      alert("Invalid date entry on item 1.");
      return;
    }
    if (isLeap && document.getElementById('frm2552:txtMonth1').value==2 && document.getElementById('frm2552:txtDate').value>29) {
      alert("Invalid date entry on item 1.");
      return;
    }
      
    
        if(d.getElementById('frm2552:txtDate').value == "") {
            alert("Please input a proper Date in Item no 1."); return;
        }
       
        if(d.getElementById('frm2552:txtDate').value.length == 1 ) {
            alert("Please input a proper Date format in Item no 1."); return;
        }   
        if(d.getElementById('frm2552:txtForYr').value == "" )
        {
            alert("Please input a proper year in Item no 1."); return;
        }
      
    //Check if valid date - Benjie Manalaysay 11/5/2013
    var month31 = (['01', '03', '05', '07', '08', '10', '12']);
    var month30 = (['04', '06', '09', '11']);
    var month = document.getElementById('frm2552:txtMonth1').value
    if (month31.contains(month) && document.getElementById('frm2552:txtDate').value > 31)
    {
      alert("Invalid date entry on Item no.1.");
      return;
    }
    else if (month30.contains(month) && document.getElementById('frm2552:txtDate').value > 30)
    {
      alert("Invalid date entry on Item no.1.");
      return;
    }
    
    
    if(d.getElementById('frm2552:txtDate').value < 1){
            alert("Please enter a valid day in Item 1.");
            return;
        }
    
    
        if( d.getElementById('frm2552:txtForYr').value*1 < 1900   )
        {
            alert("Invalid date entry on Item no.1. Entry should not be lower than 1900.")
            return;
        }
    
        if( (d.getElementById('frm2552:txtTIN1').value == "" || d.getElementById('frm2552:txtTIN2').value == "" || d.getElementById('frm2552:txtTIN3').value == "" || d.getElementById('frm2552:txtBranchCode').value == "")  )
        {
            alert("Please enter a valid TIN number on Item 4.");
            return;
        }   
        
    if( (d.getElementById('frm2552:txtTelNum').value == "")  )
        {
            alert("Please enter a valid Telephone Number on Item 6.");
            return;
        }
    if( (d.getElementById('frm2552:txtNameStockBrocker').value == "")  )
        {
            alert("Please enter a valid Stockbroker Name on Item 7.");
            return;
        } 
    if( (d.getElementById('frm2552:txtAddress').value == "")  )
        {
            alert("Please enter Stockbroker's Registered Address on Item 8.");
            return;
        }         
    if( (d.getElementById('frm2552:txtZipCode').value == "")  )
        {
            alert("Please enter Stockbroker's Zip Code on Item 8A.");
            return;
        }
        if(!d.getElementById('frm2552:PayPenalties').checked && !d.getElementById('frm2552:OptTransaction1').checked && !d.getElementById('frm2552:OptTransaction2').checked) {
            alert("Please select an option on Item no. 10");
            return;
        }
       
    
    if(NumWithComma(d.getElementById('frm2552:txt19').value) < 0 && d.getElementById('frm2552:txt19ifoverpay:_1').checked == false && d.getElementById('frm2552:txt19ifoverpay:_2').checked == false && d.getElementById('frm2552:txt19ifoverpay:_3').checked == false ){
      alert("Please choose Option on item no.19"); return;
    }
        if(d.getElementById('frm2552OptSpecialTax1').checked && d.getElementById('frm2552:lstTaxTreaty').value == 0) {
            alert("Please select a Tax Treaty from the list.");
            return;
        }
        if(! ifRequirementMeetTransactionNoTax() ){
            return;
        }
        disabledAllControl();
        alert("Validation successful. Click on Edit if you wish to modify your entries.");
    return;
    }

  var disableElem = true;
  var enableElem = false;
    function disabledAllControl(){
    
        d.getElementById('frm2552:txtSheets').disabled = true;
    
    d.getElementById('frm2552:txtTIN1').disabled = true;
        d.getElementById('frm2552:txtTIN2').disabled = true;
        d.getElementById('frm2552:txtTIN3').disabled = true;
        d.getElementById('frm2552:txtBranchCode').disabled = true;
        d.getElementById('frm2552:txtRDOCode').disabled = true;
        d.getElementById('frm2552:txtTelNum').disabled = true;
        d.getElementById('frm2552:txtNameStockBrocker').disabled = true;
        d.getElementById('frm2552:txtAddress').disabled = true;
        d.getElementById('frm2552:txtZipCode').disabled = true; 
  
    d.getElementById('frm2552:txt18A').disabled = true;
        d.getElementById('frm2552:txt18B').disabled = true;
        d.getElementById('frm2552:txt18C').disabled = true; 
  
    d.getElementById('btnPrint').disabled = false;
        d.getElementById('frm2552:cmdEdit').disabled = false;
        d.getElementById('btnUpload').disabled = false;
        d.getElementById('frm2552:cmdValidate').disabled = true;
    d.getElementById('frm2552:btnFinalCopy').disabled = false;

        d.getElementById('frm2552:txtMonth1').disabled = true;
        d.getElementById('frm2552:txtDate').disabled = true;
        d.getElementById('frm2552:txtForYr').disabled = true;
        d.getElementById('frm2552OptSpecialTax1').disabled = true;
        d.getElementById('frm2552OptSpecialTax2').disabled = true;
        if(d.getElementById('frm2552OptSpecialTax1').checked) {
            d.getElementById('frm2552:lstTaxTreaty').disabled = true;
        }

        d.getElementById('frm2552:PayPenalties').disabled = true;
        //if(!d.getElementById('frm2552:PayPenalties').checked) {
            d.getElementById('frm2552:OptTransaction1').disabled = true;
        //}
        d.getElementById('frm2552:OptTransaction2').disabled = true;

        d.getElementById('frm2552:txt11A').disabled = true;
        d.getElementById('frm2552:txt11B').disabled = true;
   
        d.getElementById('btn12B').disabled = true;
        d.getElementById('btn13B').disabled = true;
        d.getElementById('btn13E').disabled = true;
        d.getElementById('btn13H').disabled = true;
        d.getElementById('btn14B').disabled = true;
        d.getElementById('btn14E').disabled = true;
        d.getElementById('btn14H').disabled = true;
        
    d.getElementById('frm2552:txt16A').disabled = true;
        d.getElementById('frm2552:txt16B').disabled = true;
        //if(d.getElementById("frm2552:txt17").value < 0) {

            d.getElementById('frm2552:txt19ifoverpay:_1').disabled = true;
            d.getElementById('frm2552:txt19ifoverpay:_2').disabled = true;
            d.getElementById('frm2552:txt19ifoverpay:_3').disabled = true;
        //}
        for(var i = 1; i <= d.getElementById('tblTransaction').rows.length - 2 ; i++) {
            d.getElementById('chkTaxTransPartIII'+i).disabled = true;
            d.getElementById('txtTranClassPartIII'+i).disabled = true;
            d.getElementById('txtAmountInvolvePartIII'+i).disabled = true;
        }
        d.getElementById('frm2552:buttAdd').disabled = true;
        d.getElementById('frm2552:buttDel').disabled = true;
        d.getElementById('btnDetailTrans').disabled = true;

        d.getElementById('frm2552AmendedRtn1').disabled = true;
        d.getElementById('frm2552AmendedRtn2').disabled = true;

        if(d.getElementById('frm2552AmendedRtn1').checked){
            d.getElementById('frm2552:txt16A').disabled = true;
        }
    disableElem;
    enableElem;
    }

    function enableAllControl(){
    
        d.getElementById('frm2552:txtTIN1').disabled = false;
        d.getElementById('frm2552:txtTIN2').disabled = false;
        d.getElementById('frm2552:txtTIN3').disabled = false;
        d.getElementById('frm2552:txtBranchCode').disabled = false;
        d.getElementById('frm2552:txtRDOCode').disabled = false;
        d.getElementById('frm2552:txtTelNum').disabled = false;
        d.getElementById('frm2552:txtNameStockBrocker').disabled = false;
        d.getElementById('frm2552:txtAddress').disabled = false;
        d.getElementById('frm2552:txtZipCode').disabled = false;  
    
    d.getElementById('frm2552:txt18A').disabled = false;
        d.getElementById('frm2552:txt18B').disabled = false;
        d.getElementById('frm2552:txt18C').disabled = false;
    
    d.getElementById('btnPrint').disabled = true;
        d.getElementById('frm2552:cmdEdit').disabled = true;
        d.getElementById('btnUpload').disabled = true;
        d.getElementById('frm2552:cmdValidate').disabled = false;
    d.getElementById('frm2552:btnFinalCopy').disabled = true;

        d.getElementById('frm2552:txtMonth1').disabled = false;
        d.getElementById('frm2552:txtDate').disabled = false;
        d.getElementById('frm2552:txtForYr').disabled = false;
        d.getElementById('frm2552OptSpecialTax1').disabled = false;
        d.getElementById('frm2552OptSpecialTax2').disabled = false;
        if(d.getElementById('frm2552OptSpecialTax1').checked) {
            d.getElementById('frm2552:lstTaxTreaty').disabled = false;
        }

        d.getElementById('frm2552:PayPenalties').disabled = false;
        if(!d.getElementById('frm2552:PayPenalties').checked) {
            d.getElementById('frm2552:OptTransaction1').disabled = false;
        }
        d.getElementById('frm2552:OptTransaction2').disabled = false;

        d.getElementById('frm2552:txt11A').disabled = false;
        d.getElementById('frm2552:txt11B').disabled = false;
    
        d.getElementById('btn12B').disabled = false;
        d.getElementById('btn13B').disabled = false;
        d.getElementById('btn13E').disabled = false;
        d.getElementById('btn13H').disabled = false;
        d.getElementById('btn14B').disabled = false;
        d.getElementById('btn14E').disabled = false;
        d.getElementById('btn14H').disabled = false;
        
    d.getElementById('frm2552:txt16A').disabled = false;
        d.getElementById('frm2552:txt16B').disabled = false;
        if(NumWithComma(d.getElementById('frm2552:txt19').value) < 0) {

            d.getElementById('frm2552:txt19ifoverpay:_1').disabled = false;
            d.getElementById('frm2552:txt19ifoverpay:_2').disabled = false;
            d.getElementById('frm2552:txt19ifoverpay:_3').disabled = false;
        }
    else{
      d.getElementById('frm2552:txt19ifoverpay:_1').disabled = true;
            d.getElementById('frm2552:txt19ifoverpay:_2').disabled = true;
            d.getElementById('frm2552:txt19ifoverpay:_3').disabled = true;
    }
    for(var i = 1; i <= d.getElementById('tblTransaction').rows.length - 2 ; i++) {
            d.getElementById('chkTaxTransPartIII'+i).disabled = false;
            d.getElementById('txtTranClassPartIII'+i).disabled = false;
            d.getElementById('txtAmountInvolvePartIII'+i).disabled = false;
        }
        d.getElementById('frm2552:buttAdd').disabled = false;
        d.getElementById('frm2552:buttDel').disabled = false;
        d.getElementById('btnDetailTrans').disabled = false;

        d.getElementById('frm2552AmendedRtn1').disabled = false;
        d.getElementById('frm2552AmendedRtn2').disabled = false;

        if(d.getElementById('frm2552AmendedRtn1').checked){
            d.getElementById('frm2552:txt16A').disabled = false;
        }
    
        if(d.getElementById('frm2552AmendedRtn2').checked){
            d.getElementById('frm2552:txt16A').disabled = true;
        } 
    disableElem;
    enableElem;   
    d.getElementById('frm2552:txtTIN1').disabled = true;
                  d.getElementById('frm2552:txtTIN2').disabled = true;
            d.getElementById('frm2552:txtTIN3').disabled = true;
    d.getElementById('frm2552:txtBranchCode').disabled = true;
    }
  
  function initialValidateBeforeSave() {
      if( (d.getElementById('frm2552:txtTIN1').value == "" || d.getElementById('frm2552:txtTIN2').value == "" || d.getElementById('frm2552:txtTIN3').value == "" || d.getElementById('frm2552:txtBranchCode').value == "")  )
      {
        alert("Please enter a valid TIN number on Item 4.");
        return false;
      } 
     
      if( (d.getElementById('frm2552:txtNameStockBrocker').value == "")  )
      {
        alert("Please enter a valid Stockbroker Name on Item 7.");
        return false;
      } 
      if(!d.getElementById('frm2552:PayPenalties').checked && !d.getElementById('frm2552:OptTransaction1').checked && !d.getElementById('frm2552:OptTransaction2').checked) {
        alert("Please select an option on Item no. 10");
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

  $('#bg').hide(); //8.3in
  $('.printSignFooterClass_2552').css({ 'width':'8.3in !important','margin':'auto','margin-top':'15px','display':'block','position':'relative','overflow':'visible','page-break-before':'always', 'background':'#ffffff' });  
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
    $("#modalTaxTransaction").hide();
    $("#modalTransactionNoTax").hide();
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
                save('2552',data);
                
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
        saveAndExit('2552',data);
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

        submitAndSave('2552', data, company_id);
        
        disabled.attr('disabled','disabled');
        return false;
    }

    function gotoMain(){
        var company_id = $('#frmMain').find('input[name="company"]').val();
        window.location = '/companies/'+ company_id +'/histories/2552';
    } 
</script>
@endsection
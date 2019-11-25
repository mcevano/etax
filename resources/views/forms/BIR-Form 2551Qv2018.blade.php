@extends('layouts.app')
@section('title', '| BIR Form No. 2551Qv2018')
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
        <button type="button" class="btn btn-danger btn-exit" id="2551Qv2018" company='{{$company->id}}'>No</button>
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
        <button type="button" class="btn btn-success btn-exit" id="2551Qv2018" company='{{$company->id}}'>Okay</button>
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
            <button type="button" class="btn btn-danger btn-filing-success" form='2551Qv2018' company='{{$company->id}}'>Okay</button>
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
      <div id="wrapper" style="margin: 0 auto; position: relative; width: 931px; ">

        <table border="0" width="800" cellspacing="0" cellpadding="0" align="center" style=" background-repeat: repeat-x;">
          <tr>
            <td>

              <div id="formPaper">
                <!--Page 1-->
                <div id="Page1" style="display: none">
                  <table width="741" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <!--Top Header-->
                      <td>
                        <table width="741" border="0" cellspacing="0" cellpadding="0" style="height: 56px;">
                          <tr>
                            <td width="25%" valign="bottom" style="padding-left: 2px;">
                              <img width="80" height="25" src="{{ asset('images/bcs_new.png') }}">
                            </td>
                            <td width="50%" valign="middle" align="center">
                              <img width="210" height="50" alt="birlogo" src="{{ asset('images/header_logo.png') }}">

                            </td>
                            <td width="25%" valign="middle"></td>

                          </tr>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <table width="741" style="height:90px;" border="1" cellspacing="0" cellpadding="0">
                          <tbody>
                            <tr>
                              <td width="150" valign="center" style="text-align:center !important">
                                <label face="Arial" size="1">BIR Form No.
                                </label>
                                <br>
                                <font face="Arial" size="6" style="font-weight:bold;">2551Q

                                </font>
                                <label face="Arial" size="1">January 2018(ENCS)</label>
                                <br>
                                <label face="Arial" size="1">
                                  <b>Page 1</b>
                                </label>
                              </td>
                              <td width="580" align="center">
                                <font size="5" style="font-weight:bold;">Quarterly Percentage Tax Return</font>

                                <br>
                                <label face="Arial" size="1">
                                  <i>Enter all required information in CAPITAL LETTERS using BLACK ink. Mark applicable boxes with an "X". Two
                                    copies MUST be filled with the BIR and one held by the Taxpayer.</i>
                                </label>
                              </td>
                              <td valign="top">
                                <img width="220" height="75" src="{{ asset('images/Bar Codes/2551Qv2018_P1.png') }}">

                              </td>
                            </tr>
                          </tbody>

                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <table width="741" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                          <tr>
                            <td width="40%" valign="top" class="tblFormTd">
                              <table width="297" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="23">
                                    <font size="2" style="font-weight:bold;">&nbsp;1&nbsp;&nbsp;&nbsp;</font>
                                  </td>
                                  <td colspan="2">
                                    <label size="1">For the</label>
                                  </td>
                                  <td>
                                    <input id="frm2551Qv2018:forThe_1" name="frm2551Qv2018:forThe" value="Y" type="radio" onclick="dateyear()" />
                                    <label class="iceSelOneRb-dis-dis" for="frm2551Qv2018:optAmend:_1">Calendar&nbsp;&nbsp;</label>
                                    <input id="frm2551Qv2018:forThe_2" name="frm2551Qv2018:forThe" value="N" type="radio" onclick="dateyear()" />
                                    <label class="iceSelOneRb-dis-dis" for="frm2551Qv2018:optAmend:_2">Fiscal</label>
                                  </td>
                                </tr>

                                <tr>
                                  <td width="13">
                                    <font size="2" style="font-weight:bold;">&nbsp;2&nbsp;&nbsp;&nbsp;</font>
                                  </td>
                                  <td colspan="2" width="59" nowrap>
                                    <label size="1">Year Ended(MM/YYYY)</label>
                                  </td>
                                  <td width="255">
                                    <select size="1" name="frm2551Qv2018:rtnMonth" id="frm2551Qv2018:rtnMonth" class="iceSelOneMnu fieldSelect1">
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
                                    &nbsp;&nbsp;
                                    <input type="text" value="" size="4" name="frm2551Qv2018:txtYear" maxlength="4" id="frm2551Qv2018:txtYear" onblur="blockletterWithout2Decimal(this);validateYear()"
                                     onkeypress="return wholenumber(this, event)" />
                                  </td>
                                </tr>


                              </table>
                            </td>

                            <td width="30%" valign="top" class="tblFormTd">
                              <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td>
                                    <font size="2" style="font-weight:bold;">&nbsp;&nbsp;3&nbsp;&nbsp;</font>
                                    <font size="1" style="font-size: 11px;">Quarter</font>
                                  </td>
                                  <td>
                                    <font size="1">&nbsp;</font>
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="2">
                                    <table cellspacing="0" cellpadding="0" border="0" >
                                          <tbody>
                                            <tr>
                                              <td style="padding-left: 5px;">
                                                <input type="radio" value="1" name="frm2551Qv2018:qtr" id="frm2551Qv2018:qtr_1" />
                                                <label for="frm2551Qv2018:qtr_1" style="font-size:12px;">1st</label>
                                                &nbsp;&nbsp;&nbsp;
                                              </td>
                                              <td>
                                                <input type="radio" value="2" name="frm2551Qv2018:qtr" id="frm2551Qv2018:qtr_2" />
                                                <label for="frm2551Qv2018:qtr_2" style="font-size:12px;">2nd</label>
                                                &nbsp;&nbsp;&nbsp;
                                              </td>
                                              <td>
                                                <input type="radio" value="3" name="frm2551Qv2018:qtr" id="frm2551Qv2018:qtr_3" />
                                                <label for="frm2551Qv2018:qtr_3" style="font-size:12px;">3rd</label>
                                                &nbsp;&nbsp;&nbsp;
                                              </td>
                                              <td>
                                                <input type="radio" value="4" name="frm2551Qv2018:qtr" id="frm2551Qv2018:qtr_4" />
                                                <label for="frm2551Qv2018:qtr_4" style="font-size:12px;">4th</label>
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                              </td>
                                            </tr>

                                          </tbody>
                                        </table>
                                  </td>
                                </tr>
                              </table>
                            </td>
                            <td width="15%" valign="top" class="tblFormTd">
                              <table width="110" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="23">
                                    <font size="2" style="font-weight:bold;">&nbsp;&nbsp;4&nbsp;&nbsp;</font>
                                  </td>
                                  <td width="87">
                                    <font size="1" style="font-size: 11px;">Amended Return?</font>
                                  </td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td>
                                  <table cellspacing="0" cellpadding="0" border="0">
                                          <tbody>
                                            <tr>
                                              <td>
                                                <input type="radio" value="Y" name="frm2551Qv2018:amendedRtn" id="frm2551Qv2018:amendedRtn_1" onclick="updateAmended();" />
                                                <label for="frm2551Qv2018:amendedRtn_1" style="font-size:12px;">Yes</label>
                                              </td>
                                              <td>
                                                <input type="radio" value="N" name="frm2551Qv2018:amendedRtn" id="frm2551Qv2018:amendedRtn_2" onclick="updateAmended();computeTotalTaxCreditForm2551Qv2018();"
                                                 checked />
                                                <label for="frm2551Qv2018:amendedRtn_2" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:12px;">No</label>&nbsp;&nbsp;&nbsp;
                                              </td>

                                            </tr>

                                          </tbody>
                                        </table>
                                    
                                  </td>
                                </tr>
                              </table>
                            </td>
                            <td width="15%" valign="top" class="tblFormTd">
                              <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td>
                                    <font size="2" style="font-weight:bold;">&nbsp;5&nbsp;&nbsp;</font>
                                    <font size="1" style="font-size: 11px;">No. of Sheet/s </font>
                                  </td>

                                </tr>
                                <tr>

                                  <td>
                                    &nbsp;
                                    <font size="1" style="font-size: 11px;">Attached</font> &nbsp;&nbsp;
                                    <input type="text" value="0" style="text-align: right;" size="4" name="frm2551Qv2018:txtSheets" maxlength="2" id="frm2551Qv2018:txtSheets"
                                     class="iceInpTxt-dis" onkeypress="return wholenumber(this, event)" />
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
                                  <td width="88">&nbsp;&nbsp;&nbsp;
                                    <font size="2" style="font-weight:bold;"></font>
                                  </td>
                                  <td width="565">
                                    <div align="center">
                                      <font size="2" style="font-weight:bold;letter-spacing: 3px;">Part I - Background Information</font>
                                    </div>
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
                        <table border="0" cellspacing="0" cellpadding="0" class="tblForm">
                          <tr>
                            <td width="70%" valign="top" class="tblFormTd">
                              <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td>
                                    <font size="2" style="font-weight:bold">&nbsp;6&nbsp;</font>
                                  </td>
                                  <td>
                                    <font size="1" style="font-size: 11px;">Taxpayer Indentification Number (TIN)&nbsp;</font>
                                    <font size="2" face="Arial">
                                      <input type="text" value="{{$company->tin1}}" size="4" name="frm2551Qv2018:txtTIN1" maxlength="4" id="frm2551Qv2018:txtTIN1" onkeypress="return wholenumber(this, event)"
                                      />
                                      <input type="text" value="{{$company->tin2}}" size="4" name="frm2551Qv2018:txtTIN2" maxlength="4" id="frm2551Qv2018:txtTIN2" onkeypress="return wholenumber(this, event)"
                                      />
                                      <input type="text" value="{{$company->tin3}}" size="4" name="frm2551Qv2018:txtTIN3" maxlength="4" id="frm2551Qv2018:txtTIN3" onkeypress="return wholenumber(this, event)"
                                      />
                                      <input type="text" value="{{$company->tin4}}" size="4" name="frm2551Qv2018:txtBranchCode" maxlength="4" id="frm2551Qv2018:txtBranchCode" onkeypress="return letternumber(event)"
                                      />
                                    </font>
                                  </td>
                                </tr>
                              </table>
                            </td>
                            <td width="20%" valign="top" class="tblFormTd">
                              <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td>
                                    <font size="2" style="font-weight:bold">&nbsp;7&nbsp;</font>
                                    <font size="1" style="font-size: 11px;">RDO Code&nbsp;</font>
                                  </td>
                                  <td width="50%" id="rdoSelect" nowrap>
                                  <select class='iceSelOneMnu' disabled='true' id='frm2551Qv2018:txtRDOCode' name='frm2551Qv2018:txtRDOCode' size='1' >
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
                        <table width="741" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                          <tr>
                            <td width="" valign="top" class="tblFormTd">
                              <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="567">
                                    <table width="561" border="0" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td width="23">
                                          <font size="2" style="font-weight:bold;">&nbsp;8&nbsp;</font>
                                        </td>
                                        <td width="538">
                                          <font size="1" style="font-size: 11px;">
                                            Taxpayer's Name (Last Name, First Name, Middle Name for Individual OR Registered Name for Non-Individual)
                                          </font>
                                        </td>
                                      </tr>
                                    </table>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <table border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td></td>
                                        <td>&nbsp;
                                          <input type="text" value="{{$company->registered_name}}" size="120" disabled="true" name="frm2551Qv2018:registeredName" maxlength="50" id="frm2551Qv2018:registeredName" onblur="return capital(this, event)"
                                          />
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
                            <td width="" valign="top" class="tblFormTd">
                              <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td>
                                    <table border="0" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td width="23">
                                          <font size="2" style="font-weight:bold;">&nbsp;9&nbsp;</font>
                                        </td>
                                        <td>
                                          <font size="1" style="font-size: 11px;">
                                            Registered Address (Indicate complete address. If branch, indicate the branch address. If the registered address is different from the current address, go to the RDO to update registered address using BIR Form No. 1905)
                                          </font>
                                        </td>
                                      </tr>
                                    </table>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <table border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td></td>
                                        <td>&nbsp;
                                          <input type="text" value="{{$company->address}}" disabled="true" size="110" name="frm2551Qv2018:registeredAddress" maxlength="100" id="frm2551Qv2018:registeredAddress" onblur="return capital(this, event)"
                                          />
                                        </td>
                                      </tr>
                                    </table>
                                  </td>
                                </tr>
                              </table>
                            </td>
                            <td width="100" valign="top" class="tblFormTd">
                              <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="135">
                                    <table width="129" border="0" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td width="23">
                                          <font size="2" style="font-weight:bold;">&nbsp;9A</font>
                                        </td>
                                        <td width="106">
                                          <font size="1" style="font-size: 11px;">Zip Code</font>
                                        </td>
                                      </tr>
                                    </table>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <table border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                          <input type="text" value="{{$company->zip_code}}" disabled="true" size="8" name="frm2551Qv2018:zipCode" maxlength="8" id="frm2551Qv2018:zipCode" onkeypress="return wholenumber(this, event)"
                                          />
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
                            <td width="" valign="top" class="tblFormTd">
                              <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td>
                                    <table border="0" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td width="23">
                                          <font size="2" style="font-weight:bold;">&nbsp;10&nbsp;</font>
                                        </td>
                                        <td>
                                          <font size="1" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;Contact Number (Landline/Cellphone No.)</font>
                                        </td>
                                      </tr>
                                    </table>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <table border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td></td>
                                        <td>&nbsp;
                                          <input type="text" value="{{$company->tel_number}}" disabled="true" size="43" name="frm2551Qv2018:telNo" maxlength="20" id="frm2551Qv2018:telNo" onkeypress="return wholenumber(this, event)"
                                          />
                                        </td>
                                      </tr>
                                    </table>
                                  </td>
                                </tr>
                              </table>
                            </td>
                            <td width="100" valign="top" class="tblFormTd">
                              <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td>
                                    <table border="0" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td width="23">
                                          <font size="2" style="font-weight:bold;">&nbsp;11</font>
                                        </td>
                                        <td>
                                          <font size="1" style="font-size: 11px;">Email Address</font>
                                        </td>
                                      </tr>
                                    </table>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <table border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                          <input type="text" value="{{$company->email_address}}" disabled="true" size="70" name="txtEmail" maxlength="50" id="txtEmail" onblur="return capital(this, event)"
                                          />
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
                            <td width="" valign="top" class="tblFormTd">
                              <table border="0" cellspacing="0" cellpadding="0">

                                <tr>
                                  <td width="20">
                                    <font size="2" style="font-weight:bold;">&nbsp;12&nbsp;&nbsp;</font>
                                  </td>
                                  <td width="180">
                                    <label size="1" style="font-size: 11px;">Are you availing of tax relief under Special Law / International Tax Treaty?</label>
                                  </td>


                                  <td style="padding-left: 20px;">
                                    <input type="radio" value="Y" name="frm2551Qv2018:taxTreaty" id="frm2551Qv2018:taxTreaty_1" onclick="chageTreaty()" />
                                    <label for="frm2551Qv2018:taxTreaty_1" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:12px;">Yes</label>&nbsp;&nbsp;&nbsp;
                                  </td>
                                  <td width="100">
                                    <input type="radio" value="N" name="frm2551Qv2018:taxTreaty" id="frm2551Qv2018:taxTreaty_2" checked onclick="chageTreaty()" />
                                    <label for="frm2551Qv2018:taxTreaty_2" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:12px;">No</label>
                                  </td>

                                </tr>

                              </table>
                            </td>
                            <td valign="top" class="tblFormTd">
                              <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td>
                                    <td>
                                      <font size="2" style="font-weight:bold;">&nbsp;&nbsp;12A &nbsp;&nbsp;</font>
                                    </td>
                                    <td>
                                      <font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">If yes, specify&nbsp;
                                        <select class="iceSelOneMnu-dis input-dis" disabled="disabled" id="frm2551Qv2018:txtTaxReliefSpecify" name="frm2551Qv2018:txtTaxReliefSpecify"
                                         size="1">
                                          <option selected="selected" value="0"> </option>
                                          <option value="1">Special Rate</option>
                                          <option value="2">International Tax Treaty</option>
                                        </select>
                                      </font>
                                    </td>
                                  </td>
                                </tr>

                              </table>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>

                    <!--13-->
                    <tr>
                      <td>
                        <table width="741" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                          <tr>

                            <td width="100%" valign="top" class="tblFormTd">
                              <table>
                                <tr>
                                  <td>
                                    <font size="2" style="font-weight:bold;">&nbsp;13&nbsp;</font>
                                  </td>
                                  <td>

                                    <label size="1" style="font-size: 11px;">&nbsp;Only for individual taxpayers whose sales/receipts are subject to Percentage Tax under section 116
                                      of the Tax Code, as amended:</label>
                                  </td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td>
                                    <label size="1" style="font-size: 11px;">What income tax rates are you availing? (choose one)</label>
                                  </td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td>
                                    <table>
                                      <tr>
                                        <td style="width: 180px; padding-right: 30px;">
                                          <label size="1" style="font-size: 11px;">(To be filled out only on the initial quarter of the taxable year)</label>
                                        </td>
                                        <td>
                                          <input type="radio" value="G" name="frm2551Qv2018:taxRate" id="frm2551Qv2018:taxRate1" onclick="taxRateOption()" />

                                        </td>
                                        <td style="width: 200px; padding-left: 10px;">
                                          <label for="frm2551Qv2018:taxRate1" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:12px;">
                                            <label size="1" style="font-size: 11px;">Graduated income tax rate on net taxable income</label>
                                            
                                          </label>
                                        </td>
                                        <td>
                                          <input type="radio" value="I" name="frm2551Qv2018:taxRate" id="frm2551Qv2018:taxRate2" onclick ="taxRateOption()" />
                                          <label for="frm2551Qv2018:taxRate2" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:12px;">
                                            <label size="1" style="font-size: 11px;">8% income tax rate on gross sales/receipts/others</label>
                                            
                                          </label>
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
                    <!--13 end-->


                    <!--Part II-->

                    <tr>
                      <td>
                        <table width="741" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                          <tr>
                            <td class="tblFormTdPart">
                              <table width="" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="88">&nbsp;&nbsp;&nbsp;
                                    <font size="2" style="font-weight:bold;"></font>
                                  </td>
                                  <td width="565">
                                    <div align="center">
                                      <font size="2" face="Arial, Helvetica, sans-serif">
                                        <b>Part II - Total Tax Payable</b>
                                      </font>
                                    </div>
                                  </td>
                                  <td width="88">&nbsp;</td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                    <!--New Total Tax Payable-->
                    <!--Item 14-->
                    <tr>
                      <td>
                        <table width="741" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                          <tr>
                            <td width="" valign="top" class="tblFormTd">
                              <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td>
                                    <table border="0" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td width="23">
                                          <font size="2" style="font-weight:bold;">&nbsp;14&nbsp;</font>
                                        </td>
                                        <td style="font-size: 11px;">Total Tax Due
                                          <a href="#" id="frm2200S:btnSchedule1" onclick="processNext();"><font size="1">(From Schedule 1 Item 7)</font></a>
                                        </td>
                                      </tr>
                                    </table>
                                  </td>
                                </tr>

                              </table>
                            </td>
                            <td width="100" valign="top" class="tblFormTd">
                              <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td>
                                    <table border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                          <input type="text" disabled="true" value="0.00" name="frm2551Qv2018:txt14" maxlength="15" id="frm2551Qv2018:txt14" style="text-align: right;"
                                           onkeypress="return numbersonly(this, event)" onblur="round(this,2)" />

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
                    <!--End of Item 14-->
                    <tr>
                      <td>
                        <table width="741" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                          <tr>
                            <td width="" valign="top" class="tblFormTd">
                              <table>
                                <tr>
                                  <td>&nbsp;&nbsp;</td>
                                  <td style="font-size: 11px;">Less: Tax Credit/Payment
                                    <font size="1" style="font-size: 11px;">(attach proof)</font>
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>

                        </table>

                      </td>
                      <td width="" valign="top" class="tblFormTd">

                      </td>
                    </tr>

                    <!--Item 15-->
                    <tr>
                      <td>
                        <table width="741" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                          <tr>
                            <td valign="top" class="tblFormTd" style="padding-left: 40px;">
                              <table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td width="23">
                                    <font size="2" style="font-weight:bold;">&nbsp;15&nbsp;</font>
                                  </td>
                                  <td style="font-size: 11px;">Creditable Percentage Tax Withheld per BIR Form No. 2307

                                  </td>
                                </tr>
                              </table>
                            </td>

                            <td width="100" valign="top" class="tblFormTd">
                              <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td>
                                    <table border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                          <input type="text" value="0.00" name="frm2551Qv2018:txt15" maxlength="15" id="frm2551Qv2018:txt15" style="text-align: right;" onkeypress="return numbersonly(this, event)"
                                           onblur="round(this,2); computeAll();" />
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
                    <!--End of Item 15-->
                    <!--Item 16-->
                    <tr>
                      <td>
                        <table width="741" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                          <tr>
                            <td valign="top" class="tblFormTd" style="padding-left: 40px;">
                              <table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td width="23">
                                    <font size="2" style="font-weight:bold;">&nbsp;16&nbsp;</font>
                                  </td>
                                  <td style="font-size: 11px;">
                                    Tax Paid in Return Previously Filed, if this is an Amended Return
                                  </td>
                                </tr>
                              </table>
                            </td>
                            <td width="100" valign="top" class="tblFormTd">
                              <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td>
                                    <table border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                          <input type="text" value="0.00" name="frm2551Qv2018:txt16" maxlength="15" id="frm2551Qv2018:txt16" style="text-align: right;" onkeypress="return numbersonly(this, event)"
                                           onblur="round(this,2); computeAll()" disabled="true" />
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
                    <!--End of Item 16-->
                    <!--Item 17-->
                    <tr>
                      <td>
                        <table width="741" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                          <tr>
                            <td valign="top" class="tblFormTd" style="padding-left: 40px;">
                              <table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td width="23">
                                    <font size="2" style="font-weight:bold;">&nbsp;17&nbsp;</font>
                                  </td>
                                  <td style="font-size: 11px;">
                                    Other Tax Credit/Payment
                                    <font size="1" style="font-size: 11px;">(specify)</font>&nbsp;&nbsp;
                                    <input type="text" size="50" value="" name="frm2551Qv2018:txt17Specify" maxlength="50" id="frm2551Qv2018:txt17Specify" />
                                  </td>
                                </tr>
                              </table>
                            </td>
                            <td width="100" valign="top" class="tblFormTd">
                              <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td>
                                    <table border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                          <input type="text" value="0.00" name="frm2551Qv2018:txt17" maxlength="15" id="frm2551Qv2018:txt17" style="text-align: right;" onkeypress="return numbersonly(this, event)"
                                           onblur="round(this,2); computeAll();" />
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
                    <!--End of Item 17-->
                    <!--Item 18-->
                    <tr>
                      <td>
                        <table width="741" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                          <tr>
                            <td valign="top" class="tblFormTd">
                              <table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td width="23">
                                    <font size="2" style="font-weight:bold;">&nbsp;18&nbsp;</font>
                                  </td>
                                  <td style="font-size: 11px;">
                                    Total Tax Credits/Payments
                                    <font size="1" style="font-size: 11px;">(Sum of Items 15 to 17)</font>
                                  </td>
                                </tr>
                              </table>
                            </td>
                            <td width="100" valign="top" class="tblFormTd">
                              <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td>
                                    <table border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                          <input type="text" disabled="true" value="0.00" name="frm2551Qv2018:txt18" maxlength="15" id="frm2551Qv2018:txt18" style="text-align: right;"
                                           onkeypress="return numbersonly(this, event)" onblur="round(this,2)" />
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
                    <!--End of Item 18-->
                    <!--Item 19-->
                    <tr>
                      <td>
                        <table width="741" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                          <tr>
                            <td valign="top" class="tblFormTd">
                              <table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td width="23">
                                    <font size="2" style="font-weight:bold;">&nbsp;19&nbsp;</font>
                                  </td>
                                  <td style="font-size: 11px;">
                                    Tax Still Payable/(Overpayment)
                                    <font size="1" style="font-size: 11px;">(Item 14 less Item 18)</font>
                                  </td>
                                </tr>
                              </table>
                            </td>
                            <td width="100" valign="top" class="tblFormTd">
                              <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td>
                                    <table border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                          <input type="text" disabled="true" value="0.00" name="frm2551Qv2018:txt19" maxlength="15" id="frm2551Qv2018:txt19" style="text-align: right;"
                                           onkeypress="return numbersonly(this, event)" onblur="round(this,2)" />
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
                    <!--End of Item 19-->

                    <tr>
                      <td>
                        <table width="741" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                          <tr>
                            <td width="" valign="top" class="tblFormTd">
                              <table>
                                <tr>
                                  <td>&nbsp;&nbsp;</td>
                                  <td style="font-size: 11px;">
                                    Add: Penalties
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>

                        </table>

                      </td>
                      <td width="" valign="top" class="tblFormTd">

                      </td>
                    </tr>

                    <!--Item 20-->
                    <tr>
                      <td>
                        <table width="741" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                          <tr>
                            <td valign="top" class="tblFormTd" style="padding-left: 80px;">
                              <table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td width="23">
                                    <font size="2" style="font-weight:bold;">&nbsp;20&nbsp;</font>
                                  </td>
                                  <td style="font-size: 11px;">
                                    Surcharge
                                  </td>
                                </tr>
                              </table>
                            </td>
                            <td width="100" valign="top" class="tblFormTd">
                              <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td>
                                    <table border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                          <input type="text" value="0.00" name="frm2551Qv2018:txt20" maxlength="15" id="frm2551Qv2018:txt20" style="text-align: right;" onkeypress="return numbersonly(this, event)"
                                           onblur="round(this,2); computeAll();" />
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
                    <!--End of Item 20-->

                    <!--Item 21-->
                    <tr>
                      <td>
                        <table width="741" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                          <tr>
                            <td valign="top" class="tblFormTd" style="padding-left: 80px;">
                              <table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td width="23">
                                    <font size="2" style="font-weight:bold;">&nbsp;21&nbsp;</font>
                                  </td>
                                  <td style="font-size: 11px;">
                                    Interest
                                  </td>
                                </tr>
                              </table>
                            </td>
                            <td width="100" valign="top" class="tblFormTd">
                              <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td>
                                    <table border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                          <input type="text" value="0.00" name="frm2551Qv2018:txt21" maxlength="15" id="frm2551Qv2018:txt21" style="text-align: right;" onkeypress="return numbersonly(this, event)"
                                           onblur="round(this,2); computeAll();" />
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
                    <!--End of Item 21-->

                    <!--Item 22-->
                    <tr>
                      <td>
                        <table width="741" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                          <tr>
                            <td valign="top" class="tblFormTd" style="padding-left: 80px;">
                              <table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td width="23">
                                    <font size="2" style="font-weight:bold;">&nbsp;22&nbsp;</font>
                                  </td>
                                  <td style="font-size: 11px;">
                                    Compromise
                                  </td>
                                </tr>
                              </table>
                            </td>
                            <td width="100" valign="top" class="tblFormTd">
                              <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td>
                                    <table border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                          <input type="text" value="0.00" name="frm2551Qv2018:txt22" maxlength="15" id="frm2551Qv2018:txt22" style="text-align: right;" onkeypress="return numbersonly(this, event)"
                                           onblur="round(this,2); computeAll();" />
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
                    <!--End of Item 22-->

                    <!--Item 23-->
                    <tr>
                      <td>
                        <table width="741" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                          <tr>
                            <td valign="top" class="tblFormTd">
                              <table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td width="23">
                                    <font size="2" style="font-weight:bold;">&nbsp;23&nbsp;</font>
                                  </td>
                                  <td style="font-size: 11px;">
                                    Total Penalties
                                    <font size="1" style="font-size: 11px;">(Sum of Items 20 to 22)</font>
                                  </td>
                                </tr>
                              </table>
                            </td>
                            <td width="100" valign="top" class="tblFormTd">
                              <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td>
                                    <table border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                          <input type="text" disabled="true" value="0.00" name="frm2551Qv2018:txt23" maxlength="15" id="frm2551Qv2018:txt23" style="text-align: right;"
                                           onkeypress="return numbersonly(this, event)" onblur="round(this,2)" />
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
                    <!--End of Item 23-->

                    <!--Item 24-->
                    <tr>
                      <td>
                        <table width="741" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                          <tr>
                            <td valign="top" class="tblFormTd">
                              <table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td width="23">
                                    <font size="2" style="font-weight:bold;">&nbsp;24&nbsp;</font>
                                  </td>
                                  <td>
                                    <font size="2" style="font-weight:bold;">TOTAL AMOUNT PAYABLE(Overpayment)</font>
                                    <font size="1" style="font-size: 11px;">(Sum of Items 19 and 23)</font>
                                  </td>
                                </tr>
                              </table>
                            </td>
                            <td width="100" valign="top" class="tblFormTd">
                              <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td>
                                    <table border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                          <input type="text" value="0.00" name="frm2551Qv2018:txt24" disabled="true" maxlength="18" id="frm2551Qv2018:txt24" style="text-align: right;" onkeypress="return numbersonly(this, event)"
                                           onblur="round(this,2)" onchange="overPaymentOption()" />
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
                    <!--End of Item 24-->

                    <tr>
                      <td>
                        <table width="741" border="0" cellspacing="0" cellpadding="0" class="tblForm">
                          <tr>
                            <td width="" valign="top" class="tblFormTd">
                              <table>
                                <tr>
                                  <td>&nbsp;&nbsp;</td>
                                  <td style="font-size: 11px;">
                                    If overpayment, mark one box only:
                                  </td>
                                  <td>
                                    <input type="radio" value="R" name="frm2551Qv2018:overPayment" id="frm2551Qv2018:overPayment1" />
                                    <label for="frm2551Qv2018:overPayment1" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:12px;">
                                      <font size="1" style="font-size: 11px;">To be refunded</font>
                                    </label>
                                  </td>
                                  <td>
                                    <input type="radio" value="C" name="frm2551Qv2018:overPayment" id="frm2551Qv2018:overPayment2" />
                                    <label for="frm2551Qv2018:overPayment2" class="iceSelOneRb-dis fieldText1-dis-dis" style="font-size:12px;">
                                      <font size="1" style="font-size: 11px;">To be issued a Tax Credit Certificate</font>
                                    </label>
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>

                        </table>

                      </td>
                      <td width="" valign="top" class="tblFormTd">

                      </td>
                    </tr>




                    <!--End Total Tax Payable-->

                    <!--Jurat-->
                    <tr>
                      <td>
                        <table width="741" style="font-family:arial; font-size:10px; text-align: center; vertical-align: top; table-layout: fixed;"
                         border="1px" cellspacing="0" cellpadding="0">
                          <tbody>
                            <tr>
                              <td style="text-align: justify; " colspan="4">
                                <p style="text-indent: 20px; padding: 0px 3px;">I/We declare under the penalties of perjury that this return, and all its attachments, have been made in good faith, verified by me/us, and to the best of my/our knowledge and belief, is true and correct 
                                  pursuant to the provisions of the National Internal Revenue Code, as amended, and the regulations issued under authority thereof. Further, I give my consent to the processing of my information as 
                                  contemplated under the *Data Privacy Act of 2012(R.A. No. 10173) for legitimate and lawful purposes. (If Authorized Representative, attach authorization letter)
                                </p>
                              </td>
                            </tr>
                            <tr>
                              <td style="text-align: left; " colspan="2">For Individual:
                                <br>
                                <br>
                                <br>
                                <br>
                              </td>
                              <td style="text-align: left; " colspan="2">For Non-Individual:
                                <br>
                                <br>
                                <br>
                                <br>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="2">Signature over Printed Name of Taxpayer/Authorized Representative/Tax Agent
                                <br>
                                <i>(Indicate Title/Designation and TIN)</i>
                              </td>
                              <td colspan="2">Signature over Printed Name of President/Vice President/
                                <br> Authorized Officer or Representative/Tax Agent
                                <i>(Indicate Title/Designation and TIN)</i>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="2">
                                <table border="0" cellspacing="0" cellpadding="0">
                                  <tbody>
                                    <tr>
                                      <td>
                                        Tax Agent Accreditation No./
                                        <br> Attorney's Roll No.
                                        <i>(If applicable)</i>
                                      </td>
                                      <td>
                                        <input disabled="" id="txtTaxAgentNo" type="text" size="25" maxlength="20" value="">
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                              <td>
                                <table border="0" cellspacing="0" cellpadding="0">
                                  <tbody>
                                    <tr>
                                      <td>
                                        Date of Issue
                                        <br>
                                        <i>(MM/DD/YYYY)</i>
                                      </td>
                                      <td>
                                        <input disabled="" id="txtDateIssue" type="text" size="12" maxlength="10" value="">
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                              <td>
                                <table border="0" cellspacing="0" cellpadding="0">
                                  <tbody>
                                    <tr>
                                      <td>
                                        Date of Expiry
                                        <br>
                                        <i>(MM/DD/YYYY)</i>
                                      </td>
                                      <td>
                                        <input disabled="" id="txtDateExpiry" type="text" size="12" maxlength="10" value="">
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
                    <!--End of Jurat-->
                    <!--Part III Details of payment-->
                    <tr>
                      <td>
                        <table width="800" class="tblForm" border="1" cellspacing="0" cellpadding="0">
                          <tbody>
                            <tr>
                              <td class="tblFormTdPart">
                                <table width="799" border="0" cellspacing="0" cellpadding="0">
                                  <tbody>
                                    <tr>
                                      <td width="100%">
                                        <div align="center">
                                          <font size="2" style="font-weight:bold;">Part III - Details of Payment</font>
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
                    <!--end details pf payment-->

                    <!--start of 27, 28, 29, 30-->
                    <tr>
                      <td>
                        <table width="800" class="tblForm" border="0" cellspacing="0" cellpadding="0">
                          <tbody>
                            <tr>
                              <td class="tblFormTd" valign="top">
                                <table width="100%" class="tblForm" border="1" cellspacing="0" cellpadding="0">
                                  <tbody>
                                    <tr>
                                      <td width="20%">
                                        <div align="center">
                                          <font size="1" style="font-weight:bold;">Particulars </font>
                                        </div>
                                      </td>
                                      <td width="15%">
                                        <div align="center">
                                          <font size="1" style="font-weight:bold;">Drawee Bank/Agency </font>
                                        </div>
                                      </td>
                                      <td width="20%">
                                        <div align="center">
                                          <font size="1" style="font-weight:bold;">Number </font>
                                        </div>
                                      </td>
                                      <td width="20%">
                                        <div align="center">
                                          <font size="1" style="font-weight:bold;">Date (MM/DD/YYYY) </font>
                                        </div>
                                      </td>
                                      <td width="25%">
                                        <div align="center">
                                          <font size="1" style="font-weight:bold;">Amount </font>
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <font size="2" style="font-weight:bold;">&nbsp;25&nbsp;&nbsp;&nbsp;</font>
                                        <font size="1">Cash/Bank Debit Memo </font>
                                      </td>
                                      <td>
                                        <input name="frm2551Qv2018:txtAgency25" disabled="" id="frm2551Qv2018:txtAgency25" type="text" size="23" maxlength="50" value="">
                                      </td>
                                      <td>
                                        <input name="frm2551Qv2018:txtNumber25" disabled="" id="frm2551Qv2018:txtNumber25" type="text" size="23" maxlength="50" value="">
                                      </td>
                                      <td>
                                        <input name="frm2551Qv2018:txtDate25" disabled="" id="frm2551Qv2018:txtDate25" type="text" size="23" maxlength="10" value="">
                                      </td>
                                      <td>
                                        <input name="frm2551Qv2018:txtAmount25" disabled="" id="frm2551Qv2018:txtAmount25" style="text-align: right" type="text" size="20"
                                         maxlength="50" value="">
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <font size="2" style="font-weight:bold;">&nbsp;26&nbsp;&nbsp;&nbsp;</font>
                                        <font size="1">Check </font>
                                      </td>
                                      <td>
                                        <input name="frm2551Qv2018:txtAgency26" disabled="" id="frm2551Qv2018:txtAgency26" type="text" size="23" maxlength="50" value="">
                                      </td>
                                      <td>
                                        <input name="frm2551Qv2018:txtNumber26" disabled="" id="frm2551Qv2018:txtNumber26" type="text" size="23" maxlength="50" value="">
                                      </td>
                                      <td>
                                        <input name="frm2551Qv2018:txtDate26" disabled="" id="frm2551Qv2018:txtDate26" type="text" size="23" maxlength="10" value="">
                                      </td>
                                      <td>
                                        <input name="frm2551Qv2018:txtAmount26" disabled="" id="frm2551Qv2018:txtAmount26" style="text-align: right" type="text" size="20"
                                         maxlength="50" value="">
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <font size="2" style="font-weight:bold;">&nbsp;27&nbsp;&nbsp;&nbsp;</font>
                                        <font size="1">Tax Debit Memo </font>
                                      </td>
                                      <td>
                                        <input name="frm2551Qv2018:txtAgency27" disabled="" id="frm2551Qv2018:txtAgency27" type="text" size="23" maxlength="50" value="">
                                      </td>
                                      <td>
                                        <input name="frm2551Qv2018:txtNumber27" disabled="" id="frm2551Qv2018:txtNumber27" type="text" size="23" maxlength="50" value="">
                                      </td>
                                      <td>
                                        <input name="frm2551Qv2018:txtDate27" disabled="" id="frm2551Qv2018:txtDate27" type="text" size="23" maxlength="10" value="">
                                      </td>
                                      <td>
                                        <input name="frm2551Qv2018:txtAmount27" disabled="" id="frm2551Qv2018:txtAmount27" style="text-align: right" type="text" size="20"
                                         maxlength="50" value="">
                                      </td>
                                    </tr>
                                    <tr>
                                      <td colspan="5">
                                        <font size="2" style="font-weight:bold;">&nbsp;28&nbsp;&nbsp;&nbsp;</font>
                                        <font size="1">Others
                                          <i>(specify below)</i>
                                        </font>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <input name="frm2551Qv2018:txtParticular28" disabled="" id="frm2551Qv2018:txtParticular28" type="text" size="20" maxlength="50" value="">
                                      </td>
                                      <td>
                                        <input name="frm2551Qv2018:txtAgency28" disabled="" id="frm2551Qv2018:txtAgency28" type="text" size="23" maxlength="50" value="">
                                      </td>
                                      <td>
                                        <input name="frm2551Qv2018:txtNumber28" disabled="" id="frm2551Qv2018:txtNumber28" type="text" size="23" maxlength="50" value="">
                                      </td>
                                      <td>
                                        <input name="frm2551Qv2018:txtDate28" disabled="" id="frm2551Qv2018:txtDate28" type="text" size="23" maxlength="10" value="">
                                      </td>
                                      <td>
                                        <input name="frm2551Qv2018:txtAmount28" disabled="" id="frm2551Qv2018:txtAmount28" style="text-align: right" type="text" size="20"
                                         maxlength="50" value="">
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
                    <!--end of 25, 26, 27, 28-->

                    <!--start of machine validation-->
                    <tr>
                      <td>
                        <table style="font-size:10px; text-align: left; " border="1">
                          <tbody>
                            <tr>
                              <td width="60%" align="center">Machine Validation/Revenue Official Receipt (ROR) Details
                                <br>
                                <i> (If not filed with an Authorized Agent Bank)</i>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                              </td>
                              <td width="40%" align="center">
                                <i>Stamp of Receiving Office/AAB and Date of Receipt
                                  <br>(RO's Signature/Bank Teller's Initial)</i>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td style="font-size: 11px;">
                        <b>&nbsp;*NOTE: </b> Please read the BIR Data Privacy Policy found in the BIR website (www.bir.gov.ph)
                      </td>
                    </tr>
                  </table>
                </div>
                <!--end of page1-->

                <!--page 2-->
                <div id="Page2" style="display: block;" >
                  <table width="800" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td>
                        <table border="1" cellspacing="0" cellpadding="0" style="height:0px;">
                          <tr>
                            <td width="150" valign="middle" style="text-align: center;">
                              <font face="Arial" size="1px">BIR Form No.</font>
                              <br/>
                              <font size="5px" style="font-weight:bold;">2551Q</font>
                              <br/>
                              <font face="Arial" size="1px">January 2018 (ENCS)</font>
                              <br/>
                              <font face="Arial" size="1px" style="font-weight:bold;">Page 2</font>
                            </td>
                            <td width="580" valign="center" style="text-align: center;">
                              <font size="5px" style="font-weight:bold;">
                                Quarterly Percentage Tax Return
                              </font>
                            </td>
                            <td valign="top">
                                <img width="220" height="75px" src="{{ asset('images/Bar Codes/2551Qv2018_P2.png') }}"  />    
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <table width="800" border="1" cellspacing="0" cellpadding="0" class="tblForm">
                          <tr>
                            <td width="35%">
                              <font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">TIN</font>
                            </td>
                            <td width="65%">
                              <font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">
                                Taxpayer's Last Name (if Individual) / Registered Name (if Non-Individual)
                              </font>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <font size="2" face="Arial">
                                <input type="text" value="{{$company->tin1}}" size="3" name="frm2551Qv2018:txtPg2TIN1" maxlength="3" id="frm2551Qv2018:txtPg2TIN1" onkeypress="return wholenumber(this, event)"
                                 disabled="true" />
                                <input type="text" value="{{$company->tin2}}" size="3" name="frm2551Qv2018:txtPg2TIN2" maxlength="3" id="frm2551Qv2018:txtPg2TIN2" onkeypress="return wholenumber(this, event)"
                                 disabled="true" />
                                <input type="text" value="{{$company->tin3}}" size="3" name="frm2551Qv2018:txtPg2TIN3" maxlength="3" id="frm2551Qv2018:txtPg2TIN3" onkeypress="return wholenumber(this, event)"
                                 disabled="true" />
                                <input type="text" value="{{$company->tin4}}" size="3" name="frm2551Qv2018:txtPg2BranchCode" maxlength="3" id="frm2551Qv2018:txtPg2BranchCode" onkeypress="return letternumber(event)"
                                 disabled="true" />
                              </font>
                            </td>
                            <td>
                              <input type="text" value="{{$company->registered_name}}" size="80" name="frm2551Qv2018:txtPg2TaxpayerName" maxlength="50" id="frm2551Qv2018:txtPg2TaxpayerName"
                               onblur="return capital(this, event)" disabled="true" />
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <table width="800" border="1" cellspacing="0" cellpadding="0" class="tblForm">
                          <tr>
                            <td class="tblFormTdPart">
                              <table width="800" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="100%">
                                    <div align="center">
                                      <font size="2" style="font-weight:bold;"></font>
                                    </div>
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
                            <td>
                              <font size="1" style="font-weight:bold; padding-left: 5px;font-size: 11px;">Schedule 1 - Computation of Tax</font>
                              <font size="1" style="font-size: 11px;">(Attach additional sheet/s, if necessary)</font>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <table id="tbllistSchedI" class="tblForm" cellspacing="0" cellpadding="0" width="800" border="1">
                          <tr>

                            <td width="20%" align="center">
                              <font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;">Alphanumeric Tax Code (ATC)</font>
                            </td>
                            <td width="35%" align="center">
                              <font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;"> Taxable Amount</font>
                            </td>
                            <td width="10%" align="center" >
                              <font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;"> Tax Rate </font>
                            </td>
                            <td width="35%" align="center">
                              <font size="1" face="Arial, Helvetica, sans-serif" style="font-size: 11px;"> Tax Due</font>
                            </td>

                          </tr>
                          <tbody id="tbodyllistSchedI">
                            <tr>
                              <td style="text-align: center">
                                <span style="font-weight:bold; padding: 5px 10px 0px 10px;">
                                  1
                                </span>
                                <select id="drpATC1" name="drpATC1" onchange="drpATCChanged(1); computeAll();" style="width: 100px;">
                                    <option value="0" selected> - </option>
                                  </select>
                              </td>

                              <td style="text-align: center">
                                <input type="text" style="width: 95%; text-align: right;" id="txtATCAmt1" name="txtATCAmt1" value="0.00" size="17" maxlength="12" onkeypress="return numbersonly(this, event)"
                                 onblur="round(this,2); computeATC(1); computeAll();" disabled="true" /> </td>
                              <td style="text-align: center">
                                <input type="text" style="text-align: right;" id="txtATCRate1" name="txtATCRate1" value="0.00" size="2" onblur="round(this,2);getReqWithheldCompute(0)"
                                 maxlength="10" onkeypress="return numbersonly(this, event)" style="width: 70%" disabled="true" />% </td>
                              <td style="text-align: center">
                                <input type="text" style="width: 95%; text-align: right;" id="txtATCDue1" name="txtATCDue1" value="0.00" size="17" maxlength="25" disabled="true"
                                /> </td>
                            </tr>
                            <tr style="text-align: center">
                              <td style="text-align: center">
                                <span style="font-weight:bold;padding: 5px 10px 0px 10px;">
                                  2
                                </span>
                                <select id="drpATC2" name="drpATC2" onchange="drpATCChanged(2); computeAll();" style="width: 100px;">
                                    <option value="0" selected> - </option>
                                  </select>
                              </td>

                              <td>
                                <input type="text" style="width: 95%; text-align: right;" id="txtATCAmt2" name="txtATCAmt2" value="0.00" size="17" maxlength="12" onkeypress="return numbersonly(this, event)"
                                 onblur="round(this,2); computeATC(2); computeAll();" disabled="true" /> </td>
                              <td style="text-align: center">
                                <input type="text" style="text-align: right;" id="txtATCRate2" name="txtATCRate2" value="0.00" size="2" onblur="round(this,2);getReqWithheldCompute(0)"
                                 maxlength="10" onkeypress="return numbersonly(this, event)" style="width: 70%" disabled="true" />% </td>
                              <td>
                                <input type="text" style="width: 95%; text-align: right;" id="txtATCDue2" name="txtATCDue2" value="0.00" size="17" maxlength="25" disabled="true"
                                /> </td>
                            </tr>
                            <tr  style="text-align: center">
                              <td>
                                <span style="font-weight:bold; padding: 5px 10px 0px 10px;">
                                  3
                                </span>
                                <select id="drpATC3" name="drpATC3" onchange="drpATCChanged(3); computeAll(); computeAll();" style="width: 100px;">
                                    <option value="0" selected> - </option>
                                  </select>
                              </td>

                              <td>
                                <input type="text" style="width: 95%; text-align: right;" id="txtATCAmt3" name="txtATCAmt3" value="0.00" size="17" maxlength="12" onkeypress="return numbersonly(this, event)"
                                 onblur="round(this,2); computeATC(3); computeAll();" disabled="true" /> </td>
                              <td style="text-align: center">
                                <input type="text" style="text-align: right;" id="txtATCRate3" name="txtATCRate3" value="0.00" size="2" onblur="round(this,2);getReqWithheldCompute(0)"
                                 maxlength="10" onkeypress="return numbersonly(this, event)" style="width: 70%" disabled="true" />% </td>
                              <td>
                                <input type="text" style="width: 95%; text-align: right;" id="txtATCDue3"  name="txtATCDue3" value="0.00" size="17" maxlength="25" disabled="true"
                                /> </td>
                            </tr>
                            <tr  style="text-align: center">
                              <td>
                                <span style="font-weight:bold; padding: 5px 10px 0px 10px;">
                                  4
                                </span>
                                <select id="drpATC4" name="drpATC4" onchange="drpATCChanged(4); computeAll();" style="width: 100px;">
                                    <option value="0" selected> - </option>
                                  </select>
                              </td>

                              <td>
                                <input type="text" style="width: 95%; text-align: right;" id="txtATCAmt4" name="txtATCAmt4" value="0.00" size="17" maxlength="12" onkeypress="return numbersonly(this, event)"
                                 onblur="round(this,2); computeATC(4); computeAll();" disabled="true" /> </td>
                              <td style="text-align: center">
                                <input type="text" style="text-align: right;" id="txtATCRate4" name="txtATCRate4" value="0.00" size="2" onblur="round(this,2);getReqWithheldCompute(0)"
                                 maxlength="10" onkeypress="return numbersonly(this, event)" style="width: 70%" disabled="true" />% </td>
                              <td>
                                <input type="text" style="width: 95%; text-align: right;" id="txtATCDue4" name="txtATCDue4" value="0.00" size="17" maxlength="25" disabled="true"
                                /> </td>
                            </tr>
                            <tr  style="text-align: center">
                              <td>
                                <span style="font-weight:bold;padding: 5px 10px 0px 10px;">
                                  5
                                </span>
                                <select id="drpATC5" name="drpATC5" onchange="drpATCChanged(5); computeAll();" style="width: 100px;">
                                    <option value="0" selected> - </option>
                                  </select>
                              </td>

                              <td>
                                <input type="text" style="width: 95%; text-align: right;" id="txtATCAmt5" name="txtATCAmt5" value="0.00" size="17" maxlength="12" onkeypress="return numbersonly(this, event)"
                                 onblur="round(this,2); computeATC(5); computeAll();" disabled="true" /> </td>
                              <td style="text-align: center">
                                <input type="text" style="text-align: right;" id="txtATCRate5" name="txtATCRate5" value="0.00" size="2" onblur="round(this,2);getReqWithheldCompute(0)"
                                 maxlength="10" onkeypress="return numbersonly(this, event)" style="width: 70%" disabled="true" />% </td>
                              <td>
                                <input type="text" style="width: 95%; text-align: right;" id="txtATCDue5" name="txtATCDue5" value="0.00" size="17" maxlength="25" disabled="true"
                                /> </td>
                            </tr>
                            <tr  style="text-align: center">
                              <td>
                                <span style="font-weight:bold; padding: 5px 10px 0px 10px;">
                                  6
                                </span>
                                <select id="drpATC6" name="drpATC6" onchange="drpATCChanged(6); computeAll();" style="width: 100px;">
                                    <option value="0" selected> - </option>
                                  </select>
                              </td>

                              <td>
                                <input type="text" style="width: 95%; text-align: right;" id="txtATCAmt6" name="txtATCAmt6" value="0.00" size="17" maxlength="12" onkeypress="return numbersonly(this, event)"
                                 onblur="round(this,2); computeATC(6); computeAll();" disabled="true" /> </td>
                              <td style="text-align: center">
                                <input type="text" style="text-align: right;" id="txtATCRate6"  name="txtATCRate6" value="0.00" size="2" onblur="round(this,2);getReqWithheldCompute(0)"
                                 maxlength="10" onkeypress="return numbersonly(this, event)" style="width: 70%" disabled="true" />% </td>
                              <td>
                                <input type="text" style="width: 95%; text-align: right;" id="txtATCDue6" name="txtATCDue6"  value="0.00" size="17" maxlength="25" disabled="true"
                                /> </td>
                            </tr>

                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <table class="tblForm" width="800" cellspacing="0" cellpadding="0" border="1">
                          <tr>
                            <td height="30">

                              <font size="2" style="font-weight:bold;">&nbsp;7</font>
                              <font size="1" style="font-weight:bold;">Total Tax Due</font>

                              <font size="1">(Sum of Items 1 to 6)<a href="" id="frm2200S:btnSchedule1" onclick="processPrev();">&nbsp;(To Part II Item 14)</a></font>
                              
                            </td>
                            <td width="35%" align="right" height="30" style="padding-right: 10px;">
                              <input type="text" style="text-align: right;" id="txtTotalSched1" name="txtTotalSched1" maxlength="20" size="17" value="0.00" disabled="true" />
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>


                    <!--table 1 alphanumeric tac code (ATC)-->
                    <tr>
                      <td>
                        <table width="800" class="tblForm" border="1" cellspacing="0" cellpadding="0">
                          <tr>
                            <td class="tblForm" colspan="2" style="padding-left: 5px;">
                              <font size="1" style="font-weight:bold;">Table 1 - Alphanumeric Tax Code (ATC)</font>
                            </td>
                          </tr>
                        </table>
                        <table border="1" width="800" cellspacing="0" cellpadding="0" class="tblForm">
                          <tr>
                            <td style="font-size: 1; font-weight:bold; text-align: center;">
                              ATC
                            </td>
                            <td style="font-size: 1; font-weight:bold; text-align: center;">
                              Percentage Tax On
                            </td>
                            <td style="font-size: 1; font-weight:bold; text-align: center;">
                              Tax Rate
                            </td>
                          </tr>
                          <tbody id="tblSched3A">
                            <tr>
                              <td width="50px" align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">PT 010</font>
                              </td>
                              <td style="padding: 0px 2px;">
                                <font size="1" face="Arial, Helvetica, sans-serif">Person exempt from VAT under Sec. 109(BB) (Sec. 116)</font>
                              </td>
                              <td width="40px" align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">3%</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">PT 040</font>
                              </td>
                              <td style="padding: 0px 2px;">
                                <font size="1" face="Arial, Helvetica, sans-serif">Domestic carriers and keepers of garages (Sec. 117)</font>
                              </td>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">3%</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">PT 041</font>
                              </td>
                              <td style="padding: 0px 2px;">
                                <font size="1" face="Arial, Helvetica, sans-serif">International Carriers (Sec. 118)</font>
                              </td>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">3%</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">PT 060</font>
                              </td>
                              <td style="padding: 0px 2px;">
                                <font size="1" face="Arial, Helvetica, sans-serif">Franchises on gas and water utilities (Sec. 119)</font>
                              </td>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">2%</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">PT 070</font>
                              </td>
                              <td style="padding: 0px 2px;">
                                <font size="1" face="Arial, Helvetica, sans-serif">Franchises on radio/TV broadcasting companies whose annual gross receipts do not exceed P10 M (Sec. 119)</font>
                              </td>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">3%</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">PT 090</font>
                              </td>
                              <td style="padding: 0px 2px;">
                                <font size="1" face="Arial, Helvetica, sans-serif">Overseas dispatch, message or conversation originating from the Philippines (Sec. 120)</font>
                              </td>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">10%</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">PT 140</font>
                              </td>
                              <td style="padding: 0px 2px;">
                                <font size="1" face="Arial, Helvetica, sans-serif">Cockpits (Sec. 125)</font>
                              </td>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">18%</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">PT 150</font>
                              </td>
                              <td style="padding: 0px 2px;">
                                <font size="1" face="Arial, Helvetica, sans-serif">Tax on amusement places, such as cabarets, night and day clubs, videoke bars, karaoke bars, karaoke television,
                                  karaoke boxes, music lounges and other similar establishments (Sec. 125)</font>
                              </td>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">18%</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">PT 160</font>
                              </td>
                              <td style="padding: 0px 2px;">
                                <font size="1" face="Arial, Helvetica, sans-serif">Boxing Exhibition (Sec. 125)</font>
                              </td>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">10%</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">PT 170</font>
                              </td>
                              <td style="padding: 0px 2px;">
                                <font size="1" face="Arial, Helvetica, sans-serif">Professional Basketball Games (Sec. 125)</font>
                              </td>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">15%</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">PT 180</font>
                              </td>
                              <td style="padding: 0px 2px;">
                                <font size="1" face="Arial, Helvetica, sans-serif">Jai-alai and Race Tracks (Sec. 125)</font>
                              </td>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">30%</font>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <table width="800" class="tblForm" border="1" cellspacing="0" cellpadding="0">
                          <tr>
                            <td colspan="3" class="tblForm" style="padding-left: 5px;">
                              <font size="1" style="font-weight:bold;">Tax on Banks and Non-Bank Financial Intermediaries Performing Quasi-Banking Functions</font>
                              <font size="1">(Sec. 121)</font>
                            </td>

                          </tr>
                          <tbody id="tblSched3B">
                            <tr>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif"></font>
                              </td>
                              <td colspan="2" style="padding: 0px 2px;">
                                <font size="1" face="Arial, Helvetica, sans-serif">1) On interest, commisions and discounts from lending activities as well as income from financial leasing,
                                  on the basis of remaining maturities of instruments from which such receipts are derived</font>
                              </td>

                            </tr>
                            <tr>
                              <td width="40" align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">PT 105</font>
                              </td>
                              <td style="padding: 0px 2px;">
                                <font size="1" face="Arial, Helvetica, sans-serif">&nbsp;&nbsp;&nbsp;&nbsp; - Maturity period is five (5) years or less</font>
                              </td>
                              <td width="40" align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">&nbsp;&nbsp;5%</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">PT 101</font>
                              </td>
                              <td style="padding: 0px 2px;">
                                <font size="1" face="Arial, Helvetica, sans-serif">&nbsp;&nbsp;&nbsp;&nbsp; - Maturity period is more than five (5) years</font>
                              </td>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">1%</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">PT 102</font>
                              </td>
                              <td style="padding: 0px 2px;">
                                <font size="1" face="Arial, Helvetica, sans-serif"> 2) On dividends and equity shares and net income of subsidiaries</font>
                              </td>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">0%</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">PT 103</font>
                              </td>
                              <td style="padding: 0px 2px;">
                                <font size="1" face="Arial, Helvetica, sans-serif"> 3) On royalties, rentals of property, real or personal, profits from exchange and all other gross income</font>
                              </td>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">7%</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">PT 104</font>
                              </td>
                              <td style="padding: 0px 2px;">
                                <font size="1" face="Arial, Helvetica, sans-serif"> 4) On net trading gains within the taxable year on foreign currency, debt securities, derivatives and other
                                  financial instruments
                                </font>
                              </td>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">7%</font>
                              </td>
                            </tr>
                          </tbody>

                        </table>
                        <table width="800" class="tblForm" border="1" cellspacing="0" cellpadding="0">
                          <tr>
                            <td colspan="3" class="tblForm" style="padding-left: 5px;">
                              <font size="1" style="font-weight:bold;">Tax on Other Non-Bank Financial Intermediaries not Performing Quasi-Banking Functions</font>
                              <font size="1">(Sec. 122)</font>
                            </td>
                          </tr>
                          <tbody id="tblSched3C">
                            <tr>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif"></font>
                              </td>
                              <td colspan="2" style="padding: 0px 2px;">
                                <font size="1" face="Arial, Helvetica, sans-serif"> 1) On interest, commissions and discounts from lending activities as well as income from financial leasing,
                                  on the basis of remaining maturities of instruments from which such receipts are derived</font>
                              </td>
                              
                            </tr>
                            
                            <tr>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">&nbsp;&nbsp;&nbsp;PT 113&nbsp;&nbsp;&nbsp;</font>
                              </td>
                              <td style="padding: 0px 2px;">
                                <font size="1" face="Arial, Helvetica, sans-serif">&nbsp;&nbsp;&nbsp;&nbsp; - Maturity period is five (5) years or less</font>
                              </td>
                              <td align="center" width="40">
                                <font size="1" face="Arial, Helvetica, sans-serif">5%</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">PT 114</font>
                              </td>
                              <td style="padding: 0px 2px;">
                                <font size="1" face="Arial, Helvetica, sans-serif">&nbsp;&nbsp;&nbsp;&nbsp; - Maturity period is more than five (5) years</font>
                              </td>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">1%</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">PT 115</font>
                              </td>
                              <td style="padding: 0px 2px;">
                                <font size="1" face="Arial, Helvetica, sans-serif"> 2) From all other items treated as gross income under the code</font>
                              </td>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">5%</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">PT 120</font>
                              </td>
                              <td style="padding: 0px 2px;">
                                <font size="1" face="Arial, Helvetica, sans-serif">Life Insurance Premiums (Sec. 123)</font>
                              </td>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">2%</font>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <table width="800" class="tblForm" border="1" cellspacing="0" cellpadding="0">
                          <tr>
                            <td colspan="3" class="tblForm" style="padding-left: 5px;">
                              <font size="1" style="font-weight:bold;">Agents of Foreign Insurance Companies</font>
                              <font size="1">(Sec. 124)</font>
                            </td>
                          </tr>
                          <tbody id="tblSched3D">
                            <tr>
                              <td width="50px" align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">PT 130</font>
                              </td>
                              <td style="padding: 0px 2px;">
                                <font size="1" face="Arial, Helvetica, sans-serif"> 1) Insurance Agents</font>
                              </td>
                              <td width="40px" align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">4%</font>
                              </td>
                            </tr>
                            <tr>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">PT 132</font>
                              </td>
                              <td style="padding: 0px 2px;">
                                <font size="1" face="Arial, Helvetica, sans-serif"> 2) Owners of property obtaining insurance directly with foreign insurance companies</font>
                              </td>
                              <td align="center">
                                <font size="1" face="Arial, Helvetica, sans-serif">5%</font>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>
                <!--end of page 2-->

              </div>
          </tr>
          <tr>
            <td>
              <!--footer button-->
              <div>
                  <table width="931" border="0" cellspacing="0" cellpadding="0" class="tblForm printButtonClass" >
                    <tr>
                      <td>
                        <div align="center">
                          <br />
                          <input class="printButtonClass" type="button" value="Prev" style="width: 100px;" name="frm2551Qv2018:btnPrevPage" id="frm2551Qv2018:btnPrevPage"
                           onclick="processPrev();" />
                          <input id="frm2551Qv2018:txtCurrentPage" name="frm2551Qv2018:txtCurrentPage" value="1" size="1" type="text" style="text-align:center;"
                           onkeypress="return numbersonly(this, event);" onkeyup="goToPage(this);" />
                          <span class=large>/&nbsp;</span>
                          <input type="text" id="frm2551Qv2018:txtMaxPage" readonly="true" size="2" value="2" style="text-align:center;" />&nbsp;
                          <input class="printButtonClass" type="button" value="Next" style="width: 100px;" name="frm2551Qv2018:btnNextPage" id="frm2551Qv2018:btnNextPage"
                           onclick="processNext();" />
                          <br />
                          <br />
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div id="frm2551Qv2018:j_id743" class="icePnlGrp">
                          <div align="center">
                            @if($action != 'view')
                            <input class="printButtonClass" type="button" value="Validate" style="width: 100px;" name="frm2551Qv2018:cmdValidate" id="frm2551Qv2018:cmdValidate"
                             onclick="validateForm()" />
                            <input class="printButtonClass" type="button" value="Edit" style="width: 100px;" name="frm2551Qv2018:cmdEdit" id="frm2551Qv2018:cmdEdit"
                             onclick="editForm()" />
                            <input class="printButtonClass" type="hidden" value="Submit" style="width: 100px;" name="btnUpload" id="btnUpload" />
                            <input class="printButtonClass" type="button" value="Save" style="width: 100px;" name="btnSave" id="btnSave" onclick="saveData();"
                            />
                            <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();"
                            />
                            <input class="printButtonClass" type="button" value="Submit / Final Copy" style="width: 200px;" name="frm2551Qv2018:btnFinalCopy"
                             id="frm2551Qv2018:btnFinalCopy" onclick="submitForm();" />
                            <div id="msg" class="printButtonClass" style="display:none;"></div>
                            @else
                              <input class="printButtonClass" type="button" value="Print" style="width: 100px;" name="btnPrint" id="btnPrint" onclick="printme();" />
                              <input class="printButtonClass" type="button" value="Back" style="width: 100px;" onclick="gotoMain();" />
                            @endif  
                            <br />
                            <br />
                          </div>
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>
                <!--end of footer button-->
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


    <div id="hiddenEnroll" style="display:none;">
      <input id="txtFinalFlag" class="FinalFlag" name="txtFinalFlag" type="text" onblur="" onkeypress="" value="0" maxlength="60"
      />
      <input id="txtEnroll" name="txtEnroll" type="text" onblur="" onkeypress="" value="N" maxlength="60" />
    </div>
    
  </form>
  <textarea id='responsetext' style="display:none;"></textarea>
  <!-- XML retrieval -->
  <div style="display:none;">
    <xmp id='xmlFormat'>
    </xmp>
    <!--format the doc -->
    <span id='xmlClose'>All Rights Reserved BIR 2012.</span>
  </div>
  <div id="responseBG" style="display:none;">
    <!--loaded files render here-->
  </div>
  <div id="response" style="display:none;">
    <!--loaded files render here-->
  </div>
  <div id="responseATC" style="display:none;">
    <!--loaded ATC files render here-->
  </div>
  <div id="responseRdo" style="display:none;">
    <!--loaded files render here-->
  </div>
@endsection

@section('scripts')
<script type="text/javascript">
  var isSubmitFinal = false;
  var isSubmit = false;

  var fileName = "";
  var existingXMLFileName = "";
  var gIsReadOnly = false;
  var fileNameToExport = "";

  var atcList = new Array();

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
  var tp_lob = "";
  
  //new fields
  var i1Calendar = "";
  var i1Fiscal = "";
  var i2Year = "";
  var i2Month = "";
  var i3Quarter1 = "";
  var i3Quarter2 = "";
  var i3Quarter3 = "";
  var i3Quarter4 = "";
  var i4AmendedYes = "";
  var i4AmendedNo = "";
  var i5Sheets = "";
  var i6Tin1 = "";
  var i6Tin2 = "";
  var i6Tin3 = "";
  var i6Tin4 = "";
  var i7Rdo = "";
  var i8TaxPayerName = "";
  var i9TaxPayerAddress = "";
  var i9ZipCode = "";
  var i10ContactNum = "";
  var i11Email = "";
  var i12TaxTreatyYes = "";
  var i12TaxTreatyNo = "";
  var i12TaxTreatyDesc = "";
  var i13TaxRateNet = "";
  var i13TaxRateGross = "";
  var i14TaxDue = "";
  var i15CredTax = "";
  var i16TaxReturn = "";
  var i17OtherCredTaxDesc = "";
  var i17OtherCredTax = "";
  var i18TotTaxCred = "";
  var i19TaxOverpayment = "";
  var i20Surcharge = "";
  var i21Interest = "";
  var i22Compromise = "";
  var i23TotPenalties = "";
  var i24TotOverPayment = "";
  var i24ToRefund = "";
  var i24ToTaxCredit = "";
  var sched1Atc1Code = "";
  var sched1Atc2Code = "";
  var sched1atc3Code = "";
  var sched1atc4Code = "";
  var sched1atc5Code = "";
  var sched1atc6Code = "";
  var sched1TaxAmount1 = "";
  var sched1TaxAmount2 = "";
  var sched1TaxAmount3 = "";
  var sched1TaxAmount4 = "";
  var sched1TaxAmount5 = "";
  var sched1TaxAmount6 = "";
  var sched1TaxRate1 = "";
  var sched1TaxRate2 = "";
  var sched1TaxRate3 = "";
  var sched1TaxRate4 = "";
  var sched1TaxRate5 = "";
  var sched1TaxRate6 = "";
  var sched1TaxDue1 = "";
  var sched1TaxDue2 = "";
  var sched1TaxDue3 = "";
  var sched1TaxDue4 = "";
  var sched1TaxDue5 = "";
  var sched1TaxDue6 = "";
  var sched1TotalTaxDue = ""; 

  //custom vars
  var formReturnPeriod = "";
  var formIsAmended = "";


  

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

  /*----------------------------------*/
  var d = document, XMLBGFile = '', data = '', XMLFile = '', XMLATCFile = '', msg = d.getElementById('msg');
  var loader = d.getElementById('loader');
  /*----------------------------------*/

  var str;
  var codeATC;
  var descATC;
  var rateATC;
  var rowFlag;
  var atcFlag = new Array();
  var globalEmail = "";
  str = setInterval("sleeptime()", 300);
  function sleeptime() {
    clearInterval(str);
    loadXMLATC('/xml/atcCodes.xml');
    populateATC();
    loadATCtoDropDown();
    init();
    taxRateOption();

    var xmlFileName = document.getElementById('file_name').value;        
    fileName = xmlFileName;
    if (fileName != null && fileName.indexOf('.xml') > -1) {
     
      loadXML(fileName);   
      
      var tin = fileName.split("/")[1].split("-"); 


      d.getElementById('frm2551Qv2018:forThe_1').disabled = true;
      d.getElementById('frm2551Qv2018:forThe_2').disabled = true;
      d.getElementById('frm2551Qv2018:rtnMonth').disabled = true;
      d.getElementById('frm2551Qv2018:txtYear').disabled = true;
      d.getElementById('frm2551Qv2018:txtCurrentPage').value = "1"; 

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
    document.getElementById('frm2551Qv2018:txtTIN1').disabled = true; document.getElementById('frm2551Qv2018:txtTIN2').disabled = true; document.getElementById('frm2551Qv2018:txtTIN3').disabled = true; document.getElementById('frm2551Qv2018:txtBranchCode').disabled = true;
    window.setTimeout("checkFinalCopyBtn('2551Qv2018')", 2000);
  }

  function rdoPropertyJS(rdoCode, description) {
    this.rdoCode = rdoCode;
    this.description = description;
  }

  var rdoList = new Array();

  //schedule 1 functions
  //by programmerapril

  function loadATCtoDropDown() {

    codeATC.sort();

    for (i = 1; i < codeATC.length; i++) {
      var drpATC01 = document.getElementById("drpATC1");
      var drpATC02 = document.getElementById("drpATC2");
      var drpATC03 = document.getElementById("drpATC3");
      var drpATC04 = document.getElementById("drpATC4");
      var drpATC05 = document.getElementById("drpATC5");
      var drpATC06 = document.getElementById("drpATC6");

      var option1 = document.createElement("option");
      var option2 = document.createElement("option");
      var option3 = document.createElement("option");
      var option4 = document.createElement("option");
      var option5 = document.createElement("option");
      var option6 = document.createElement("option");

      option1.text = insertSpace(codeATC[i], 2); //codeATC[i];
      option1.value = i;
      option2.text = insertSpace(codeATC[i], 2);
      option2.value = i;
      option3.text = insertSpace(codeATC[i], 2);
      option3.value = i;
      option4.text = insertSpace(codeATC[i], 2);
      option4.value = i;
      option5.text = insertSpace(codeATC[i], 2);
      option5.value = i;
      option6.text = insertSpace(codeATC[i], 2);
      option6.value = i;

      drpATC01.add(option1);
      drpATC02.add(option2);
      drpATC03.add(option3);
      drpATC04.add(option4);
      drpATC05.add(option5);
      drpATC06.add(option6);
    }

  }

  function insertSpace(str, indx)
  {
    //index starts at 1
    var strPrefix = str.substring(0, indx);
    //alert(strPrefix + "-" + indx);

    var strCode = str.substring(indx, str.length);
    //alert(strCode + "- " + str.length);
    var retStr = strPrefix + " " + strCode; 

    return retStr;
  }

  function drpATCChanged(rowIndex) {
    var t01 = d.getElementById('drpATC' + rowIndex).value;

    if (d.getElementById('drpATC' + rowIndex).value == 0) {
      //d.getElementById('txtATCAmt' + rowIndex).style.backgroundColor = "#e2e2e2";
      d.getElementById('txtATCAmt' + rowIndex).disabled = true;
      d.getElementById('txtATCAmt' + rowIndex).style.backgroundColor = "";


      d.getElementById('txtATCAmt' + rowIndex).value = "0.00";
      d.getElementById('txtATCRate' + rowIndex).value = "0.00";

    }
    else {
      //d.getElementById('txtATCAmt' + rowIndex).style.backgroundColor = "#ffffff";
      d.getElementById('txtATCAmt' + rowIndex).disabled = false;
      d.getElementById('txtATCRate' + rowIndex).value = rateATC[d.getElementById('drpATC' + rowIndex).value];
    }

    computeATC(rowIndex);
  }

  function computeATC(rowIndex) {
    var taxDue = NumWithComma(d.getElementById('txtATCAmt' + rowIndex).value) * (d.getElementById('txtATCRate' + rowIndex).value / 100);

    d.getElementById('txtATCDue' + rowIndex).value = formatCurrency(taxDue);

    computeTotalSched1();
  }

  function computeTotalSched1() {
    var totalSched1 = formatCurrency(NumWithComma(d.getElementById('txtATCDue1').value) + NumWithComma(d.getElementById('txtATCDue2').value) +
      NumWithComma(d.getElementById('txtATCDue3').value) + NumWithComma(d.getElementById('txtATCDue4').value) +
      NumWithComma(d.getElementById('txtATCDue5').value) + NumWithComma(d.getElementById('txtATCDue6').value));

    d.getElementById('txtTotalSched1').value = totalSched1;
    d.getElementById('frm2551Qv2018:txt14').value = totalSched1;
  }

  function computeItem18() {
    var item18 = NumWithComma(d.getElementById('frm2551Qv2018:txt15').value) + NumWithComma(d.getElementById('frm2551Qv2018:txt16').value) +
      NumWithComma(d.getElementById('frm2551Qv2018:txt17').value);

    d.getElementById('frm2551Qv2018:txt18').value = formatCurrency(item18);
  }

  function computeItem19() {
    var item19 = NumWithComma(d.getElementById('frm2551Qv2018:txt14').value) - NumWithComma(d.getElementById('frm2551Qv2018:txt18').value);

    d.getElementById('frm2551Qv2018:txt19').value = formatCurrency(item19);
  }

  function computeItem23() {
    var item23 = NumWithComma(d.getElementById('frm2551Qv2018:txt20').value) + NumWithComma(d.getElementById('frm2551Qv2018:txt21').value) +
      NumWithComma(d.getElementById('frm2551Qv2018:txt22').value);

    d.getElementById('frm2551Qv2018:txt23').value = formatCurrency(item23);
  }

  function computeItem24() {
    var item24 = NumWithComma(d.getElementById('frm2551Qv2018:txt19').value) + NumWithComma(d.getElementById('frm2551Qv2018:txt23').value);

    d.getElementById('frm2551Qv2018:txt24').value = formatCurrency(item24);
  }

  function computeAll() {
    computeItem18();
    computeItem19();
    computeItem23();
    computeItem24();

    refundOption();
  }

  function refundOption()
  {
    if (NumWithComma(d.getElementById('frm2551Qv2018:txt24').value) >= 0) {
      d.getElementById('frm2551Qv2018:overPayment1').checked = false;
      d.getElementById('frm2551Qv2018:overPayment2').checked = false;

      d.getElementById('frm2551Qv2018:overPayment1').disabled = true;
      d.getElementById('frm2551Qv2018:overPayment2').disabled = true;
    }
    else{
      d.getElementById('frm2551Qv2018:overPayment1').disabled = false;
      d.getElementById('frm2551Qv2018:overPayment2').disabled = false;
    }
  }

  function taxRateOption()
  {
    if(d.getElementById('frm2551Qv2018:taxRate1').checked == true)
    {
      d.getElementById('frm2551Qv2018:txt15').disabled = false;
      if(d.getElementById('frm2551Qv2018:amendedRtn_1').checked == true)
      {
        d.getElementById('frm2551Qv2018:txt16').disabled = false;
      }

      d.getElementById('frm2551Qv2018:txt17').disabled = false;
      d.getElementById('frm2551Qv2018:txt20').disabled = false;
      d.getElementById('frm2551Qv2018:txt21').disabled = false;
      d.getElementById('frm2551Qv2018:txt22').disabled = false;

      d.getElementById('drpATC1').disabled = false;
      d.getElementById('drpATC2').disabled = false;
      d.getElementById('drpATC3').disabled = false;
      d.getElementById('drpATC4').disabled = false;
      d.getElementById('drpATC5').disabled = false;
      d.getElementById('drpATC6').disabled = false;

    }
    else{
      //8% Tax Rate will zero out all figures for compliance only

      d.getElementById('frm2551Qv2018:txt15').value = "0.00";
      d.getElementById('frm2551Qv2018:txt15').disabled = true;
      d.getElementById('frm2551Qv2018:txt16').value = "0.00";
      d.getElementById('frm2551Qv2018:txt16').disabled = true;
      d.getElementById('frm2551Qv2018:txt17').value = "0.00";
      d.getElementById('frm2551Qv2018:txt17').disabled = true;
      d.getElementById('frm2551Qv2018:txt20').value = "0.00";
      d.getElementById('frm2551Qv2018:txt20').disabled = true;
      d.getElementById('frm2551Qv2018:txt21').value = "0.00";
      d.getElementById('frm2551Qv2018:txt21').disabled = true;
      d.getElementById('frm2551Qv2018:txt22').value = "0.00";
      d.getElementById('frm2551Qv2018:txt22').disabled = true;

      d.getElementById('drpATC1').selectedIndex = 0;
      drpATCChanged(1);
      d.getElementById('drpATC1').disabled = true;
      d.getElementById('drpATC2').selectedIndex = 0;
      drpATCChanged(2);
      d.getElementById('drpATC2').disabled = true;
      d.getElementById('drpATC3').selectedIndex = 0;
      drpATCChanged(3);
      d.getElementById('drpATC3').disabled = true;
      d.getElementById('drpATC4').selectedIndex = 0;
      drpATCChanged(4);
      d.getElementById('drpATC4').disabled = true;
      d.getElementById('drpATC5').selectedIndex = 0;
      drpATCChanged(5);
      d.getElementById('drpATC5').disabled = true;
      d.getElementById('drpATC6').selectedIndex = 0;
      drpATCChanged(6);
      d.getElementById('drpATC6').disabled = true;

      computeAll();
    }
  }

  //end of total tax payable functions
  var currentPage = 1;
  var maxPage = 2;

  function processNext() {
    if (currentPage < maxPage) {
      currentPage++;

      $('#Page' + currentPage).show('blind');
      $('#Page' + (currentPage - 1)).hide('blind');
      document.getElementById('frm2551Qv2018:txtCurrentPage').value = currentPage;
    }
  }

  function processPrev() {
    if (currentPage > 1) {
      currentPage--;
      $('#Page' + currentPage).show('blind');
      $('#Page' + (currentPage + 1)).hide('blind');
      document.getElementById('frm2551Qv2018:txtCurrentPage').value = currentPage;
    }
  }

  function goToPage(pageVal) {
    var newPage = pageVal.value;

    if (newPage <= maxPage && newPage >= 1) {
      $('#Page' + newPage).show('blind');
        $('#Page' + currentPage).hide('blind');
        currentPage = newPage;
    }
    else {
      alert("Invalid page.");
      pageVal.value = currentPage;
    }


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
        var responseATC = d.getElementById('responseATC'); //render file and write to hidden div
        responseATC.innerHTML = xmlHTTP.responseText; //remove XML tag
        loadATC();
  }

  var atcCount = 0;

  var dCount = 0;
  var listATC = new Array();
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

      //Ensure that before writing to atcPropertyJS the formType 2551Qv2018 is traceable in atcStr
      if (atcStr.indexOf('2551_') >= 0) {
        var atcValues = atcStr.split('~');

        var formType = "2551Qv2018";
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
        //alert('2551Qv2018 successfully created array #'+i);

      } else {
        //alert('2551Qv2018 not found in array #'+i);
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
             d.getElementById('frm2551Qv2018:cmdValidate').disabled = true;
            d.getElementById('btnSave').disabled = true;
        }
    
  }

  function loadData() {
    /*This will load data onto fields*/
    var response = d.getElementById("response");

    var elem = document.getElementById('frmMain').elements;
    for (var i = 0; i < elem.length; i++) {
      try {
        if (elem[i].type != 'hidden' && elem[i].type != 'undefined') {  //elem[i].type != 'button' &&       
          if (elem[i].type == 'text' || elem[i].type == 'select-one') {
            var fieldVal = String($("#response").html()).split(elem[i].id + '=');
            if (elem[i].id == 'frm2551Qv2018:registeredName' || elem[i].id == 'frm2551Qv2018:txtLineofBus' || elem[i].id == 'frm2551Qv2018:registeredAddress') {
              elem[i].value = unescape(fieldVal[1]);
            }
            else if (elem[i].className.indexOf("FinalFlag") > -1) {
              elem[i].value = typeof (fieldVal[1]) === "undefined" ? "3" : fieldVal[1];
            }
            else {
              elem[i].value = fieldVal[1]; //all select-one and text values       
            }
          }
          if (elem[i].type == 'radio') {
            var rdoVal = String($("#response").html()).split(elem[i].id + '=');
            if (rdoVal[1] == 'true') {
              elem[i].checked = rdoVal[1];
              elem[i].onclick();
            }
          }
          if (elem[i].type == 'checkbox') {
            var chkboxVal = String($("#response").html()).split(elem[i].id + '=');
            if (chkboxVal[1] == 'true') {
              elem[i].checked = chkboxVal[1];
            }
          }

        }
      } catch (e) {
        //alert('exception thrown : e : '+e.description);
      }

    }
  }

  function isItAnAmendedReturn(xmlFile) {
    if (d.getElementById('frm2551Qv2018:amendedRtn_1').checked) {
      return true;
    } else {
      return false;
    }
  }

  var XMLrdoFile = '';

  function init() {
   
    var dt = new Date();
    d.getElementById('frm2551Qv2018:txtYear').value = dt.getFullYear() - 1;

    d.getElementById('frm2551Qv2018:amendedRtn_1').disabled = false;
    d.getElementById('frm2551Qv2018:amendedRtn_2').disabled = false;
    
    @if($action != 'view')
    d.getElementById('frm2551Qv2018:cmdEdit').disabled = true;
    d.getElementById('frm2551Qv2018:btnFinalCopy').disabled = true;
    d.getElementById('btnPrint').disabled = true;
    @endif
    d.getElementById('frm2551Qv2018:txtTaxReliefSpecify').disabled = true;


  }

  function populateATC() {
    codeATC = new Array();
    descATC = new Array();
    rateATC = new Array();

    //var atcSize = atcList.getSize();
    var atcSize = atcList.length;
    var i = 0;
    var j = 1;
    codeATC[0] = "";
    descATC[0] = "";
    rateATC[0] = "0.00";
    for (i = 0; i < atcSize; i++) {
      //var atc = atcList.get(i);
      var atc = atcList[i];
      if (atc.formType == "2551Qv2018") {

        codeATC[j] = atc.atcCode;
        descATC[j] = atc.description;
        rateATC[j++] = atc.rate;
      }
    }
       

  }



  function blockletter(e) {
    var number = parseFloat(e.value).toFixed(2);
    if (isNaN(number)) {
      var zero = 0;
      e.value = parseFloat(zero).toFixed(2);
    } else {
      e.value = '' + number;
    }
  }

  function showModalATC(flag) {
    if (d.getElementById('frm2551Qv2018:btn14B').disabled == false) {
      rowFlag = flag;

      d.getElementById('formPaper').style.display = "none";
      $('#modalAtc').show('blind');

      populateATC();

      var x = 1;
      var innerText = "";
      while (x < codeATC.length) {
        innerText = innerText +
          "<tr class='atc'><td width='5%' class='atc'><center><input type='radio' id='frm2551Qv2018:optATC" + x + "' name='frm2551Qv2018:optATC' /></center></td>" +
          "<td align='left' width='15%' class='atc'>" + codeATC[x] + "%</td>" +
          "<td align='left' width='55%' class='atc atcNames'>" + descATC[x] + "</td>" +
          "<td align='left' width='15%' class='atc'>" + rateATC[x] + "%</td></tr>";

        x++;
      }

      $('#tBodyOfATC').html(innerText);
    }
    else {
      return false;
    }
  }

  function hideModalATC() {
    d.getElementById('formPaper').style.display = 'block';
    if ($('#modalAtc').css('display') != 'none') {
      $('#modalAtc').hide('blind');
    }
    $('#DummyTxt').html("Creator");
    $('#DummyTxt').html("");
  }

  function getATCCode() {
    var x = 1;
    var isOptChecked;
    while (x < codeATC.length) {
      isOptChecked = d.getElementById('frm2551Qv2018:optATC' + x).checked;
      if (isOptChecked) {
        if (compareATC(codeATC[x])) {
          return;
        } else {
          if (rowFlag == "14") {
            d.getElementById('frm2551Qv2018:txtTax14A').value = descATC[x];
            d.getElementById('frm2551Qv2018:txtTax14B').value = codeATC[x];
            d.getElementById('frm2551Qv2018:txtTax14D').value = rateATC[x];
            computeTaxDue('frm2551Qv2018:txtTax14C', 'frm2551Qv2018:txtTax14D', 'frm2551Qv2018:txtTax14E');
          } else if (rowFlag == "15") {
            d.getElementById('frm2551Qv2018:txtTax15A').value = descATC[x];
            d.getElementById('frm2551Qv2018:txtTax15B').value = codeATC[x];
            d.getElementById('frm2551Qv2018:txtTax15D').value = rateATC[x];
            computeTaxDue('frm2551Qv2018:txtTax15C', 'frm2551Qv2018:txtTax15D', 'frm2551Qv2018:txtTax15E');
          } else if (rowFlag == "16") {
            d.getElementById('frm2551Qv2018:txtTax16A').value = descATC[x];
            d.getElementById('frm2551Qv2018:txtTax16B').value = codeATC[x];
            d.getElementById('frm2551Qv2018:txtTax16D').value = rateATC[x];
            computeTaxDue('frm2551Qv2018:txtTax16C', 'frm2551Qv2018:txtTax16D', 'frm2551Qv2018:txtTax16E');
          } else if (rowFlag == "17") {
            d.getElementById('frm2551Qv2018:txtTax17A').value = descATC[x];
            d.getElementById('frm2551Qv2018:txtTax17B').value = codeATC[x];
            d.getElementById('frm2551Qv2018:txtTax17D').value = rateATC[x];
            computeTaxDue('frm2551Qv2018:txtTax17C', 'frm2551Qv2018:txtTax17D', 'frm2551Qv2018:txtTax17E');
          } else if (rowFlag == "18") {
            d.getElementById('frm2551Qv2018:txtTax18A').value = descATC[x];
            d.getElementById('frm2551Qv2018:txtTax18B').value = codeATC[x];
            d.getElementById('frm2551Qv2018:txtTax18D').value = rateATC[x];
            computeTaxDue('frm2551Qv2018:txtTax18C', 'frm2551Qv2018:txtTax18D', 'frm2551Qv2018:txtTax18E');
          }

          clearATCFlag();
        }
      }
      x++;
    }

    hideModalATC();
  }

  function compareATC(atc) {
   
  }

  function clearATCFlag() {
   
  }

  function checkOverpayment() {
   
  }

  function computeTaxDue(taxAmount, taxRate, taxDue) {}

  function computeTotalTaxDue() {}

  function computeTotalTaxCreditForm2551Qv2018() {}

  function computeTaxPayable() {}
  function computePenalties() {}
  function computeTotalAmountPayable() {}

  function validateYear() {

    if (d.getElementById("frm2551Qv2018:txtYear").value < 2018) {
      alert("Please file using the old version of the form.");
      d.getElementById("frm2551Qv2018:txtYear").value = "2018";
    }
  }

  function validateForm() {
    var m = new Date();
    var dt = new Date();

    if (d.getElementById('frm2551Qv2018:forThe_1').checked == false && d.getElementById('frm2551Qv2018:forThe_2').checked == false) {
      alert("Select a calendar type on Item no. 1.")
      return;
    }
    if (d.getElementById('frm2551Qv2018:rtnMonth').selectedIndex * 1 == 0) {
      alert("Please enter valid Year Ended month on item 2.")
      return;
    }

  
    if (d.getElementById('frm2551Qv2018:txtYear').value * 1 < 1900) {
      alert("Invalid date entry on Item no.2. Entry should not be lower than 1900.")
      return;
    }
    if (d.getElementById('frm2551Qv2018:qtr_1').checked == false && d.getElementById('frm2551Qv2018:qtr_2').checked == false && d.getElementById('frm2551Qv2018:qtr_3').checked == false && d.getElementById('frm2551Qv2018:qtr_4').checked == false) {
      alert("Select a Quarter on Item no. 3.")
      return;
    }
    
    if (d.getElementById('frm2551Qv2018:txtYear').value == "") {
      alert("Please enter valid year on item 2.");
      return;
    }

    if ((d.getElementById('frm2551Qv2018:txtTIN1').value == "" || d.getElementById('frm2551Qv2018:txtTIN2').value == "" || d.getElementById('frm2551Qv2018:txtTIN3').value == "" || d.getElementById('frm2551Qv2018:txtBranchCode').value == "")) {
      alert("Please enter a valid TIN number on Item 6.");
      return;
    }

    if ((d.getElementById('frm2551Qv2018:registeredName').value == "")) {
      alert("Please enter a valid Taxpayer Name on Item 8.");
      return;
    }
    if ((d.getElementById('frm2551Qv2018:telNo').value == "")) {
      alert("Please enter Telephone Number on Item 10.");
      return;
    }
    if ((d.getElementById('frm2551Qv2018:registeredAddress').value == "")) {
      alert("Please enter Taxpayer's Registered Address on Item 9.");
      return;
    }
    if ((d.getElementById('frm2551Qv2018:zipCode').value == "")) {
      alert("Please enter Zip Code on Item 9A.");
      return;
    }


    if (d.getElementById('frm2551Qv2018:taxTreaty_1').checked && d.getElementById('frm2551Qv2018:txtTaxReliefSpecify').selectedIndex == 0) {
      alert("Please specify Tax Relief on Item 12.")
      return;
    }

    if(d.getElementById('frm2551Qv2018:taxRate1').checked == false && d.getElementById('frm2551Qv2018:taxRate2').checked == false){
      alert("Please specify Tax Relief on Item 13.")
      return;
    }

    if (d.getElementById('frm2551Qv2018:txt24').value < 0) {
      if (d.getElementById('frm2551Qv2018:overPayment1').checked == false && d.getElementById('frm2551Qv2018:overPayment2').checked == false) {
        alert("Please specify If overpayment below Item 24.")
        return;
      }
    }

    if (NumWithComma(d.getElementById('frm2551Qv2018:txt24').value) < 0) {
      if (d.getElementById('frm2551Qv2018:overPayment1').checked == false && d.getElementById('frm2551Qv2018:overPayment2').checked == false) {
        alert("Please select overpayment option.");
        return;
      }
    }
    
    d.getElementById('frm2551Qv2018:cmdValidate').disabled = true;
    d.getElementById('frm2551Qv2018:cmdEdit').disabled = false;
    d.getElementById('frm2551Qv2018:btnFinalCopy').disabled = false;
    d.getElementById('btnPrint').disabled = false;
    
    enableDisabledFields(true);

    alert("Validation successful. Click on Edit if you wish to modify your entries.");
    return;
  }

  function editForm() {

    enableDisabledFields(false);
    taxRateOption();
    refundOption();

    d.getElementById('frm2551Qv2018:cmdValidate').disabled = false;
    d.getElementById('frm2551Qv2018:cmdEdit').disabled = true;
    d.getElementById('btnSave').disabled = false;
    d.getElementById('btnPrint').disabled = true;
    d.getElementById('frm2551Qv2018:btnFinalCopy').disabled = true;
  }

  var disableElem = true;
  var enableElem = false;
  function enableDisabledFields(param) {
   

    d.getElementById('frm2551Qv2018:forThe_1').disabled = param;
    d.getElementById('frm2551Qv2018:forThe_2').disabled = param;
    d.getElementById('frm2551Qv2018:txtYear').disabled = param;
    d.getElementById('frm2551Qv2018:txtSheets').disabled = param;
    
    d.getElementById('frm2551Qv2018:qtr_1').disabled = param;
    d.getElementById('frm2551Qv2018:qtr_2').disabled = param;
    d.getElementById('frm2551Qv2018:qtr_3').disabled = param;
    d.getElementById('frm2551Qv2018:qtr_4').disabled = param;
    d.getElementById('frm2551Qv2018:amendedRtn_1').disabled = param;
    d.getElementById('frm2551Qv2018:amendedRtn_2').disabled = param;
    d.getElementById('frm2551Qv2018:taxTreaty_1').disabled = param;
    d.getElementById('frm2551Qv2018:taxTreaty_2').disabled = param;
    d.getElementById('frm2551Qv2018:txtTaxReliefSpecify').disabled = param;
    d.getElementById('frm2551Qv2018:taxRate1').disabled = param;
    d.getElementById('frm2551Qv2018:taxRate2').disabled = param;
   
    d.getElementById('frm2551Qv2018:txt15').disabled = param;
    
    //16 is conditional
    if(d.getElementById('frm2551Qv2018:amendedRtn_1').checked == true)
    {
      d.getElementById('frm2551Qv2018:txt16').disabled = param;
     
    }

    d.getElementById('frm2551Qv2018:txt17Specify').disabled = param;
    d.getElementById('frm2551Qv2018:txt17').disabled = param;
   
    d.getElementById('frm2551Qv2018:txt20').disabled = param;
    d.getElementById('frm2551Qv2018:txt21').disabled = param;
    d.getElementById('frm2551Qv2018:txt22').disabled = param;
    d.getElementById('frm2551Qv2018:overPayment1').disabled = param;
    d.getElementById('frm2551Qv2018:overPayment2').disabled = param;
    d.getElementById('drpATC1').disabled = param;
    d.getElementById('txtATCAmt1').disabled = param;
    d.getElementById('drpATC2').disabled = param;
    d.getElementById('txtATCAmt2').disabled = param;
    d.getElementById('drpATC3').disabled = param;
    d.getElementById('txtATCAmt3').disabled = param;
    d.getElementById('drpATC4').disabled = param;
    d.getElementById('txtATCAmt4').disabled = param;
    d.getElementById('drpATC5').disabled = param;
    d.getElementById('txtATCAmt5').disabled = param;
    d.getElementById('drpATC6').disabled = param;
    d.getElementById('txtATCAmt6').disabled = param;
    
    disableElem;
    enableElem;
  }

  
  function blockletterWithout2Decimal(e) {
    var number = parseFloat(e.value);
    if (isNaN(number)) {
      e.value = "";
    } else {
      e.value = '' + number.toFixed(0);
    }
  }

  function chageTreaty() {
    if (d.getElementById('frm2551Qv2018:taxTreaty_1').checked) {
      d.getElementById('frm2551Qv2018:txtTaxReliefSpecify').disabled = false;
    } else {
      d.getElementById('frm2551Qv2018:txtTaxReliefSpecify').disabled = true;
      d.getElementById('frm2551Qv2018:txtTaxReliefSpecify').selectedIndex = 0;
    }
  }

  function updateAmended() {
    if (d.getElementById('frm2551Qv2018:amendedRtn_1').checked) {

      if (d.getElementById('frm2551Qv2018:taxRate2').checked == false) {
        d.getElementById('frm2551Qv2018:txt16').disabled = false;
        d.getElementById('frm2551Qv2018:txt16').backgroundColor = "#ffffff";
        i4AmendedYes = "True";
      }
      
    } else if (d.getElementById('frm2551Qv2018:amendedRtn_2').checked) {
      d.getElementById('frm2551Qv2018:txt16').disabled = true;
      //d.getElementById('frm2551Qv2018:txt16').style.backgroundColor = "#e2e2e2";
      d.getElementById('frm2551Qv2018:txt16').style.backgroundColor = "";

      d.getElementById('frm2551Qv2018:txt16').value = "0.00";
      i4AmendedYes = "False";

      computeAll();
    }
  }

  function initialValidateBeforeSave() {
    if (d.getElementById('frm2551Qv2018:rtnMonth').selectedIndex * 1 == 0) {
      alert("Please enter valid Year Ended month on item 2.")
      return false;
    }
    if (d.getElementById('frm2551Qv2018:qtr_1').checked == false && d.getElementById('frm2551Qv2018:qtr_2').checked == false && d.getElementById('frm2551Qv2018:qtr_3').checked == false && d.getElementById('frm2551Qv2018:qtr_4').checked == false) {
      alert("Select a Quarter on Item no. 3.")
      return false;
    }
    if ((d.getElementById('frm2551Qv2018:txtTIN1').value == "" || d.getElementById('frm2551Qv2018:txtTIN2').value == "" || d.getElementById('frm2551Qv2018:txtTIN3').value == "" || d.getElementById('frm2551Qv2018:txtBranchCode').value == "")) {
      alert("Please enter a valid TIN number on Item 6.");
      return false;
    }
  
    if ((d.getElementById('frm2551Qv2018:registeredName').value == "")) {
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
    $('.printSignFooterClass').css({ 'width':'94%','margin':'auto','margin-top':'15px','display':'block','position':'relative','overflow':'visible','page-break-before':'always', 'background':'#ffffff' });  
    
    $('.imgClass').css({ 'margin': 'auto', 'display': 'block', 'position': 'relative', 'overflow': 'visible' });
    
    $('#formPaper').css({ 'max-width': '8.3in !important', 'border': '#000 3px solid' });
    $('#wrapper').css({ 'max-width': '8.3in !important' });
    $('#container').css({ 'max-width': '8.3in !important' });

    alert("This form must be printed on Legal Size Paper. Please update your Printer Settings (Set Paper Size to Legal under Preferences -> Advanced) to ensure the correct printout of the form.\n\n" +
      "If applicable, open Internet Explorer, go to File -> Page Setup and change Page Size to Legal, all Margins must be 0.166, Enable Shrink-to-Fit must be unchecked, and all Headers & Footers must be set to empty.");


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
          document.getElementById(elem[i].id).style.color = '#000000';
        }
        if (elem[i].type == 'radio' || elem[i].type == 'checkbox' || elem[i].type == 'select-one') {
          if (document.getElementById(elem[i].id).disabled) {
            disabledItems[x] = elem[i].id;
            x++;
          }
          document.getElementById(elem[i].id).disabled = true;
        }

      }
    }

    var activePage = document.getElementById('frm2551Qv2018:txtCurrentPage').value;

    $('#Page1').show();
    $('#Page2').show();

    $('.printButtonClass').hide();
    $("#formPaper").show();

    $("#Page1").css({ 'border':'3px solid #000' });
    $("#Page2").css({ 'border':'3px solid #000','margin-top': '50px' });
    $("#formPaper").css({ 'border': 'none' });

    window.print();

    $('.printButtonClass').show();
    $("#Page"+activePage).css({ 'border': 'none' });
    $("#Page2").css({'margin-top': '0px', 'border': 'none' });

    if(activePage == "1"){
            $('#Page1').show();
            $('#Page2').hide();
    }else {
            $('#Page1').hide();
            $('#Page2').show();
    }

    $('#printMenu').show('blind');
    if ($('#formMenu').css('display') != 'none') {
      $('#formMenu').hide('blind');
    }

   
    document.getElementById('frm2551Qv2018:txtCurrentPage').disabled = false;
    document.getElementById('frm2551Qv2018:txtCurrentPage').readOnly = false;
  }

  
  function validateItem2() {
    var dt = new Date();

    if (d.getElementById('frm2551Qv2018:txtYear').value == "") {
      alert("Please indicate a valid Year.");
      return;
    }
    if (d.getElementById('frm2551Qv2018:rtnMonth').value == 0) {
      alert("Please choose a valid Month.");
      return;
    }
    if (d.getElementById('frm2551Qv2018:txtYear').value * 1 > dt.getFullYear() * 1) {
      alert("Invalid date entry on Item 2. Entry should not be later than Current Date.")
      return;
    }
    if (d.getElementById('frm2551Qv2018:txtYear').value * 1 == dt.getFullYear() * 1 && d.getElementById('frm2551Qv2018:rtnMonth').value - 1 > dt.getMonth()) {
      alert("Invalid date entry on Item 2. Entry should not be later than Current Date.")
      return;
    }
  }

  function dateyear() {
    var year3 = new Date();
    if (d.getElementById('frm2551Qv2018:forThe_1').checked) {
      d.getElementById('frm2551Qv2018:rtnMonth').selectedIndex = 12;
      d.getElementById('frm2551Qv2018:rtnMonth').disabled = true;
      d.getElementById('frm2551Qv2018:txtYear').value = year3.getFullYear();
    }
    else {
      d.getElementById('frm2551Qv2018:rtnMonth').selectedIndex = 0;
      d.getElementById('frm2551Qv2018:rtnMonth').disabled = false;
      d.getElementById('frm2551Qv2018:txtYear').value = year3.getFullYear();
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
                save('2551Qv2018',data);
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
        saveAndExit('2551Qv2018',data);
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

        submitAndSave('2551Qv2018', data, company_id);
        
        disabled.attr('disabled','disabled');
        return false;
    }

    function gotoMain(){
        var company_id = $('#frmMain').find('input[name="company"]').val();
        window.location = '/companies/'+ company_id +'/histories/2551Qv2018';
    }
</script>
@endsection
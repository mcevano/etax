@extends('layouts.app')
@section('title', '| Help')
@section('content')
<main class="container container-main margin-container">
    <h6 class="page-title">DOCUMENTARY STAMP</h6>
    <section class="content-holder bg-white">
      <div class="row">
        <div class="col-3">
          <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active" id="list-2000-list" data-toggle="list" href="#list-2000" role="tab" aria-controls="2000">BIR Form 2000</a>
            <a class="list-group-item list-group-item-action" id="list-2000v2018-list" data-toggle="list" href="#list-2000v2018" role="tab" aria-controls="2000v2018">BIR Form 2000v2018</a>
          </div>
        </div>
        <div class="col-9">
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-2000" role="tabpanel" aria-labelledby="list-2000-list">
                <h4 class="font-weight-bold">BIR Form No. 2000 <br>Guidelines and Instructions</h4>
                <hr>
                <h5 class="text-center font-weight-bold">BIR Form No. 2000 <br> Guidelines and Instructions</h5>
                <div class="row">
                  <div class="col font-sm">
                    <b>Who Shall File</b>
                        <p>This return shall be filed in triplicate by the following:</p>
                        <ol class="indent text-justify">
                          <li>In the case of constructive affixture of documentary stamps, by the person making, signing, issuing, accepting, or transferring  documents, instruments, loan     agreements    and    papers,  acceptances,    assignments,    sales    and conveyances of the obligation, right or property incident thereto wherever the document is made, signed, issued, accepted or transferred when the obligation  or right arises from Philippine sources or the property is situated in the Philippines at the same time such act is done or transaction had;</li>
                          <li>by a metering machine user who imprints the documentary stamp tax due on
                                        the taxable document; and</li>
                          <li>by a revenue collection agent for remittance of sold  loose  documentary stamps.</li>
                        </ol>
                        <p>
                        Whenever one   party   to   the    taxable document enjoys exemption from the tax  herein
                        imposed, the other party thereto who is not exempt shall be the one directly liable for the tax.
                        </p>
                        
                        <b>When and Where to File</b>
                        <p class="text-justify">The return shall be filed within five (5) days after the close of the month when the   taxable document was made, signed, issued, accepted or transferred or when  reloading  a metering machine becomes necessary or upon remittance by revenue collection agents of collection from the sale of loose stamps.</p>
                        <p class="text-justify">
                          The return shall be filed with the Authorized Agent Bank (AAB) within the territorial
                          jurisdiction of the Revenue District Office  which has  jurisdiction over the residence or place  of business of the taxpayer or  where the collection agent is assigned.   In places where there   are no AABs, the return shall be filed directly with the Revenue Collection Officer (RCO) or duly Authorized City or Municipal Treasurer within the Revenue District Office which has jurisdiction over the residence or place of business of the taxpayer or where the collection  agent is assigned.
                        </p>
                                                
                        <b>When and Where to Pay</b>
                        <p class="text-justify">Upon filing the return, the total amount payable shall be paid to the AAB where the return is filed. In places where there are no AABs, the tax shall be paid with the Revenue Collection Officer or duly Authorized City or Municipal Treasurer who will issue a Revenue Official Receipt (BIR Form No. 2524) therefor.</p>
                        <p class="text-justify">Where the return is filed with an AAB, taxpayer must accomplish and submit BIR- prescribed deposit slip which the bank teller shall machine validate as evidence that the BIR   tax payment is deposited to the account of the Bureau of Treasury. The AAB receiving the tax return/payment form shall also machine validate and stamp mark the word “Received” on the return/payment form as proof of filing the return/payment form and payment of the tax by the taxpayer. The machine validation shall reflect the date of payment, amount paid  and transactions code, the name of the bank, branch code, teller’s code and teller’s initial. Bank  debit advice/memo shall still be issued to taxpayers paying under the bank debit  system.</p>
                        
                        <b>For Electronic Filing and Payment System (EFPS)  Taxpayer</b>
                        <p class="text-justify">The deadline for electronically filing and paying the taxes due thereon shall be in accordance with the provisions of existing applicable revenue  issuances.</p>
                        
                        <b>Effect of Failure to Stamp Taxable Document</b>
                        
                        <p class="text-justify">An   instrument,  document  or  paper  which is   required  by   law   to   be    stamped and which has been signed, issued, accepted or transferred without being duly stamped, shall not be recorded, nor shall it or any copy thereof or any record of transfer of the same be admitted or used in evidence in any court until the requisite stamp or stamps shall have been affixed thereto and cancelled.</p>
                        
                  </div>
                  <div class="col font-sm text-justify">
                        <p>No notary public or other officer authorized to administer oaths shall add his jurat or acknowledgment to any document subject to documentary stamp tax unless the proper documentary stamps are affixed thereto and cancelled.</p>
                       
                        <b>Penalties</b>
                       
                        There shall be imposed and collected as part of  the tax:
                        <ol class="indent">
                            <li>A surcharge of twenty five percent (25%) for each of the following violations:</li>
                            <ol class="indent" type="a">
                                <li>Failure to file any return and pay the amount of tax or installment due on or before the due date;</li>
                                <li>Unless otherwise authorized by the Commissioner, filing a return with  a  person or office other than those with whom it is required to be filed;</li>
                                <li>Failure to pay the full or part of the amount of tax shown on the return, or the full amount of tax due for which no return is required to be filed on or before  the due date;</li>
                                <li>Failure to pay the deficiency tax within the time prescribed for its payment in the notice of assessment.</li>
                            </ol>
                            <li>A surcharge of fifty percent (50%) of the tax or of the deficiency tax, in case any payment has been made on the basis of such return before the discovery of the falsity or fraud, for each of the following   violations:</li>
                            <ol class="indent" type="a">
                                <li>Willful neglect to file the return within the period prescribed by the Code or by the rules and regulations; or</li>
                                <li>In case a false or fraudulent return is wilfully  made.</li>
                            </ol>
                            <li>Interest at the rate of twenty percent (20%) per annum, or such higher rate as may    be prescribed by rules and regulations, on any unpaid amount of  tax, from the date prescribed  for the payment until the amount is fully paid.</li>
                            <li>Compromise penalty</li>
                        </ol>
                       
                        <b>Attachments</b>
                        <ol>
                            <li>In case of constructive affixture of documentary stamps, photocopy of the document to which the documentary stamp shall be affixed;</li>
                            <li>For metering machine user, a schedule of the details of usage or consumption of documentary stamps;</li>
                            <li>Duly approved Tax Debit Memo, if applicable;</li>
                            <li>Proof of exemption under special laws, if applicable.</li>
                        </ol>
                       
                        <b>Note: All background information must be properly filled up.</b>
                        <ul>
                            <li>All returns filed by an accredited tax agent on behalf of a taxpayer shall  bear  the following information as required in Revenue Regulation No. 15-99, as amended:</li>
                            <ol class="indent" type="A">
                                <li>For CPAs and others (individual practitioners and members of GPPs);</li>
                                <dl>
                                    <dd>A.1 Taxpayer Identification Number (TIN); and</dd>
                                    <dd>A.2 Certificate of Accreditation Number, Date of Issuance, and Date of Expiry </dd>
                                </dl>
                                <li>For Members of the Philippine Bar (individual practitioners, members of GPPs;</li>
                                <dl>
                                    <dd>B.1 Taxpayer Identification Number (TIN); and</dd>
                                    <dd>B.2 Attorney’s Roll Number or Accreditation Number, if any</dd>
                                </dl>
                            </ol>
                            <li>In case of constructive affixture of documentary stamps, BIR Form 2000(in triplicate copies) should be filed for every taxable document/transaction. Constructive affixture means filing a tax return and paying the tax in accordance with the law.</li>
                            <li>The ATC on the face of the return shall be taken from the ATC Table at the back.</li>
                            <li>The amount of purchased documentary stamps for loading in a metering machine cannot exceed the total consumption of documentary stamp since the last purchased date.</li>
                            <li>TIN  = Taxpayer Identification Number.</li>
                        </ul>
                        <div style="text-align: right">
                                                    <b>ENCS</b>
                                                </div>
                  </div>
                </div>
            </div>
            <div class="tab-pane fade" id="list-2000v2018" role="tabpanel" aria-labelledby="list-2000v2018-list">
                <h4 class="font-weight-bold">BIR Form No. 2000<br>Guidelines and Instructions</h4>
                <hr>
                <h5 class="text-center font-weight-bold">Guidelines and Instructions for BIR Form No. 2000 [January 2018(ENCS)]<br>Monthly Documentary Stamp Tax Declaration/Return</h5>
                <div class="row">
                  <div class="col font-sm text-justify">
                      <b>Who Shall File</b>
                     
                      <p>This return shall be filed in triplicate by the following:</p>
                      <ol class="indent">
                          <li>In the case of constructive affixture of documentary stamps, by the person making, signing, issuing, accepting, or transferring  documents, instruments, loan agreements and papers, acceptances, assignments, sales and conveyances of the obligation, right or property incident thereto wherever the document is made, signed, issued, accepted or transferred when the obligation or right arises from Philippine sources or the property is situated in the Philippines at the same time such act is done or transaction had;</li>
                          <li>In the case of Electronic Documentary Stamp Tax (eDST) System user, by the taxpayers belonging to the industries mandated to use the web-based eDST System in the payment/remittance of DST liabilities and the affixture of the prescribed documentary stamp on taxable documents and taxpayers who, at their option, choose to pay the DST liabilities thru the eDST System pursuant to Revenue Regulations (RR) No. 7-2009; and</li>
                          <li>by a revenue collection agent for remittance of sold  loose  documentary stamps.</li>
                      </ol>
                      <p>
                          Whenever one party to the taxable document enjoys exemption from the tax herein
                                                              imposed, the other party thereto who is not exempt shall be the one directly liable for the tax.
                      </p>
                     
                      <b>When and Where to File</b>
                      <p>The return shall be filed within five (5) days after the close of the month when the taxable document was made, signed, issued, accepted or transferred or upon remittance by revenue collection agents of collection from the sale of loose documentary stamps.</p>
                      <p>
                          The return shall be filed with the Authorized Agent Bank (AAB) within the territorial
                      jurisdiction of the Revenue District Office which has jurisdiction over the residence or place of business of the taxpayer or  where the collection agent is assigned. In places where there are no AABs, the return shall be filed directly with the Revenue Collection Officer (RCO) within the Revenue District Office which has jurisdiction over the residence or place of business of the taxpayer or where the collection ahent is assigned.  </p>
                     
                      <b>When and Where to Pay</b>
                      <p>Upon filing of this return, the total amount payable shall be paid to the AAB where the return is filed. In places where there are no AABs, the tax shall be paid with the Revenue Collection Officer who shall issue an Electronic Revenue Official Receipt (eROR) therefor. </p>
                      <p>When the return is filed with an AAB, taxpayer must accomplish and submit BIR-prescribed deposit slip, which the bank teller shall machine validate as evidence that payment was received by the AAB. The AAB receiving the tax return shall stamp mark the word "Received" on the return and also machine validate the return as proof of filing the return and payment of the tax by the taxpayer, respectively. The machine validation shall reflect the date of payment, amount paid and transactions code, the name of the bank, branch code, teller's code and teller's initial. Bank debit memo number and date should be indicated in the return for taxpayers paying under the bank debit system. </p>
                     
                      <b>For eDST System User</b>
                      <p>Prior to the enrollment in the eDST System, taxpayers availing thereof, whether on the mandatory or optional basis, shall be duly enrolled under the BIR Electronic Filing and Payment System (eFPS). In paying the DST liabilities, BIR Form No. 2000 shall be filed and the amount due thereon shall be paid thru the eFPS for taxpayers and PhilPass Facility of the Bangko Sentral ng Pilipinas for AABs. </p>
                     
                      <b>For eFPS Taxpayer</b>
                      <p>The deadline for electronically filing and paying the taxes due thereon shall be in accordance with the provisions of existing applicable revenue issuances. </p>
                                                                  
                  </div>
                  <div class="col font-sm text-justify">
                    <b>Effect of Failure to Stamp Taxable Document</b>
                    
                    <p>An instrument, document or paper which is required by law to be stamped and which has been signed, issued, accepted or transferred without being duly stamped, shall not be recorded, nor shall it or any copy thereof or any record of transfer of the same be admitted or used in evidence in any court until the requisite stamp or stamps shall have been affixed thereto and cancelled.</p>
                    <p>No Notary Public or other officer authorized to administer oaths shall add his jurat or acknowledgment to any document subject to documentary stamp tax unless the proper documentary stamps are affixed thereto and cancelled.</p>
                    
                    <b>Penalties</b>
                    
                    There shall be imposed and collected as part of  the tax:
                    <ol class="indent">
                        <li>A surcharge of twenty five percent (25%) for the following violations:</li>
                        <ol class="indent" type="a">
                            <li>Failure to file any return and pay the amount of tax or installment due on or before the due date;</li>
                            <li>Filing a return with a person or office other than those with whom it is required to be filed, unless otherwise authorized by the Commissioner;</li>
                            <li>Failure to pay the full or part of the amount of tax shown on the return, or the full amount of tax due for which no return is required to be filed on or before  the due date;</li>
                            <li>Failure to pay the deficiency tax within the time prescribed for its payment in the notice of assessment.</li>
                        </ol>
                        <li>A surcharge of fifty percent (50%) of the tax or of the deficiency tax, in case any payment has been made beofre the discovery of the falsity or fraud, for each of the following violations: </li>
                        <ol class="indent" type="a">
                            <li>Willful neglect to file the return within the period prescribed by the Code or by rules and regulations; or</li>
                            <li>A false or fraudulent return is willfully made. </li>
                        </ol>
                        <li>Interest at the rate of double the legal interest rate for loans or forbearance of any money in the absence of an express stipulation as set by the Bangko Sentral ng Pilipinas from the date prescribed for payment until the amount is fully paid: Provided, that in no case shall the deficiency and the delinquency interest prescribed under Section 249 Subsections (B) and (C) of the National Internal Revenue Code, as amended, be imposed simultaneously. </li>
                        <li>Compromise penalty as provided under applicable rules and regulations. </li>
                    </ol>
                    
                    <b>Requried Attachments: </b>
                    <ol>
                        <li>In case of constructive affixture of documentary stamps, photocopy of the document to which the documentary stamp shall be affixed;</li>
                        <li>Duly approved Tax Debit Memo, if applicable;</li>
                        <li>Proof of exemption under special laws, if applicable.</li>
                    </ol>
                    
                    <b>Note: All background information must be properly filled up.</b>
                    <ul>
                        <li>"Constructive Stamping or Receipt System" is a system whereby constructive affixtuer is done by affixing to the taxable document/facility evidencing transaction, the duplicate copy or certified true copy of the Documentary Stamp Tax (DST) return (BIR Form No. 2000)/proof of payment of DST. </li>
                        <li>The last 5 digits of the 14-digit TIN refers to the branch code </li>
                        <li>All returns filed by an accredited tax agent on behalf of a taxpayer shall  bear  the following information:</li>
                        <ol class="indent" type="A">
                            <li>For Individual (CPAs, members of GPPs, and others)</li>
                            <dl>
                                <dd>a.1 Taxpayer Identification Number (TIN); and</dd>
                                <dd>a.2 BIR Accreditation Number, Date of Issue, and Date of Expiry. </dd>
                            </dl>
                            <li>For members of the Philippine Bar (Lawyers) </li>
                            <dl>
                                <dd>b.1 Taxpayer Identification Number (TIN); </dd>
                                <dd>b.2 Attorney’s Roll Number; </dd>
                                <dd>b.3 Mandatory Continuing Legal Education (MCLE) Compliance Number; and </dd>
                                <dd>b.4 BIR Accreditation Number, Date of Issue, and Date of Expiry. </dd>
                            </dl>
                        </ol>
                    </ul>
                    
                    
                    <div style="text-align: right">
                        <b>ENCS</b>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</main>
@endsection

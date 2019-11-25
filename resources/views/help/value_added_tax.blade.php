@extends('layouts.app')
@section('title', '| Help')
@section('content')
<main class="container container-main margin-container">
    <h6 class="page-title">VALUE ADDED TAX</h6>
    <section class="content-holder bg-white">
      <div class="row">
        <div class="col-3">
        	<div class="list-group" id="list-tab" role="tablist">
		      <a class="list-group-item list-group-item-action active" id="list-2550M-list" data-toggle="list" href="#list-2550M" role="tab" aria-controls="2550M">BIR Form 2550M</a>
		      <a class="list-group-item list-group-item-action" id="list-2550Q-list" data-toggle="list" href="#list-2550Q" role="tab" aria-controls="2550Q">BIR Form 2550Q</a>
		    </div>
        </div>
        <div class="col-9">
        	<div class="tab-content" id="nav-tabContent">
		      <div class="tab-pane fade show active" id="list-2550M" role="tabpanel" aria-labelledby="list-2550M-list">
		      	  <h4 class="font-weight-bold">BIR Form No. 2550M <br> Guidelines and Instructions</h4>
                  <hr>
                  <h5 class="text-center font-weight-bold">BIR Form 2550M – Monthly Value-Added Tax Declaration <br> Guidelines and Instructions</h5>
                  <div class="row font-sm text-justify">
                      <div class="col">
                            <b>Who shall file</b>
							<div class="indent">
							    This return/declaration shall be filed in triplicate by the following taxpayers:
							    <ol class="indent">
							        <li>A VAT -registered person; and</li>
							        <li>A person required to register as a VAT taxpayer but failed to register; and</li>

							        <p>This return/declaration must be filed by the aforementioned taxpayers for as long as the VAT registration has not yet been cancelled, even if there is no taxable transaction during the month or the aggregate sales/receipts for any 12-month period did not exceed the P1,500,000.00 threshold.</p>
							        <p>A person who imports goods shall use the form prescribed by the Bureau of Custom.</p>
							    </ol>
							</div>
							<br />
							<b>When and Where to file</b>
							<p>The returns/declarations must be filed not later than the 20th day following the close of the month.</p>
							<p>The returns/declarations must be filed with any Authorized Agent Bank (AAB) within the jurisdiction of the Revenue District Office where the taxpayer is required to register. In places where there are no Authorized Agent Bank (AAB), the returns/declarations shall be filed with the Revenue Collection Officer or duly Authorized City or Municipal Treasurer located within the revenue district where the taxpayer is required to register.</p>
							<p>Taxpayers with branches shall file only one consolidated return/declaration for his principal place of business or head office and all branches.</p>
							<br />
							<b>When and Where to Pay</b>
							<p>Upon filing this return/declaration, the total amount payable shall be paid to the Authorized Agent Bank (AAB) where the return/declaration is filed. In places where there are no AABs, payment shall be made to the Revenue Collection Officer or duly Authorized City or Municipal Treasurer who shall issue a Revenue Official Receipt (ROR) therefor.</p>

							<p>Where the return is filed with an AAB, taxpayer must accomplish and submit BIR-prescribed deposit slip, which the bank teller shall machine validate as evidence that payment was received by the AAB. The AAB receiving the tax return shall stamp mark the word “Received” on the return and also machine validate the return as proof of filing the return and payment of the tax by the taxpayer, respectively. The machine validation shall reflect the date of payment, amount paid and transactions code, the name of the bank, branch code, teller’s code and teller’s initial. Bank debit memo number and date should be indicated in the return for taxpayers paying under the bank debit system.</p>

							<br />
							<b>For Electronic Filing and Payment System (EFPS) Taxpayer</b>

							<p>The deadline for electronically filing and paying the taxes due thereon shall be in accordance with the provisions of existing applicable revenue issuances.</p>

							<b>Rates and Bases of Tax</b>
							<ol type="A" class="indent">
							    <li>On Sale of Goods and Properties – twelve percent (12%) of the gross selling price or gross value in money of the goods or properties sold, bartered or exchanged.</li>
							    <li>On Sale of Services and Use or Lease of Properties – twelve percent (12%) of gross receipts derived from the sale or exchange of services, including the use or lease of properties.</li>
							    <li>On Importation of Goods – twelve percent (12%) based on the total value used by the Bureau of Customs in determining tariff and customs duties, plus customs duties, excise taxes, if any, and other charges, such tax to be paid by importer prior to the release of such goods from customs custody: Provided, That where the customs duties are determined on the basis of quantity or volume of the goods, the value added tax shall be based on the landed cost plus excise taxes, if any.</li>
							    <li>On Export Sales and Other Zero-rated Sales   - 0%.</li>
							</ol>
                      </div>
                      <div class="col">
                      	<b>Definition of Terms</b>
						<br />
						<p>Input  Tax  means  the  value-added  tax  due  from  or  paid by  a  VAT - registered person in the course of his trade or business on importation of goods, or local purchase of goods or services, including lease or use of property, from a VAT-registered person. It shall also include the transitional input tax determined in accordance with Section 111 of the National Internal Revenue Code, presumptive input tax and deferred input tax from previous period.</p>
						<p>
						    Output  Tax  means  the  value-added  tax  due  on  the  sale   or    lease
						of taxable  goods  or  properties  or  services   by  any   person  registered   or required to register under Section 236 of the National Internal Revenue Code.
						</p>
						</ol>
						<b>Penalties</b>
						<br />
						<p>There shall be imposed and collected as part of the tax:</p>
						<ol class="indent">
						    <li>A surcharge of twenty five percent (25%) for each of the following violations:</li>
						    <ol class="indent" type="a">
						        <li>Failure to file any return and pay the amount of tax or installment due on or before the due date;</li>
						        <li>Unless otherwise authorized by the Commissioner, filing a return with a person or office other than those with whom it is required to be filed;</li>
						        <li>Failure to pay the full or part of the amount of tax shown on the return, or the full amount of tax due for which no return is required to be filed on or before the due date;</li>
						        <li>Failure to pay the deficiency tax within the time prescribed for its payment in the notice of assessment.</li>
						    </ol>
						    <li>A surcharge of fifty percent (50%) of the tax or of the deficiency tax, in case any       payment has been made on the basis of such return before
						the discovery of the falsity or fraud, for each of the following violations:
						    </li>
						    <ol type="a" class="indent">
						        <li>Willful neglect to file the return within the period prescribed by the Code or by rules and regulations; or</li>
						        <li>In case a false or fraudulent return is willfully made.</li>
						    </ol>
						    <li>Interest at the rate of twenty percent (20%) per annum, or such higher rate as may be prescribed by rules and regulations, on any unpaid amount of tax, from the date prescribed for the payment until the amount is fully paid.</li>
						    <li>Compromise penalty.</li>
						</ol>
						<br />
						<b>Attachments</b>
						<br />
						<ol>
						    <li>Duly issued Certificate of Creditable VAT Withheld at Source, if applicable;</li>
						    <li>Summary Alphalist of Withholding Agents of Income Payments Subjected to Withholding Tax at Source (SAWT), if applicable;</li>
						    <li>Duly approved Tax Debit Memo, if applicable;</li>
						    <li>Duly approved Tax Compliance Certificate, if applicable.</li>
						    <li>Authorization letter, if return is filed by authorized representative.</li>
						</ol>
						<br />
						<b>Note: All background information must be properly filled up.</b>
						<br />
						<ul>
						    <li>All returns filed by an accredited tax representative on behalf of a taxpayer shall bear the following information:
						    </li>
						</ul>
						<ol type="A" class="indent">
						    <li>For CPAs and others (individual practitioners and members of GPPs);</li>
						    <dl>
						        <dd>a.1 Taxpayer Identification Number (TIN); and</dd>
						        <dd>a.2 Certificate of Accreditation Number, Date of Issuance, and Date of Expiry.</dd>
						    </dl>
						    <li>For members of the Philippine Bar (individual practitioners, members of GPPs);</li>
						    <dl>
						        <dd>b.1 Taxpayer Identification Number (TIN); and</dd>
						        <dd>b.2 Attorney’s Roll number or Accreditation Number, if any.</dd>
						    </dl>
						</ol>
						<ul>
						    <li>Box No. 1 refers to transaction period and not the date of filing this return.</li>
						    <li>The last 3 digits of the 12-digit TIN refers to the branch code.</li>
						    <li>TIN = Taxpayer Identification Number</li>
						</ul>
						<br />
						<br />

						<div class="small" style="text-align: right;"><b>ENCS</b></div>
                      </div>
                  </div>
		      </div>
		      <div class="tab-pane fade" id="list-2550Q" role="tabpanel" aria-labelledby="list-2550Q-list">
		      	  <h4 class="font-weight-bold">BIR Form No. 2550Q <br> Guidelines and Instructions</h4>
                  <hr>
                  <h5 class="text-center font-weight-bold">BIR FORM NO. 2550Q – Quarterly Value-Added Tax Return <br> Guidelines and Instructions</h5>
                  <div class="row font-sm text-justify">
                      <div class="col">
                            <b>Who shall file</b>
							<ol class="indent">
							    This return shall be filed in triplicate by the following taxpayers:
							<li>A VAT -registered person; and</li>
							    <li>A person required to register as a VAT taxpayer but failed to register; and</li>
							    <p>This return must be filed by the aforementioned taxpayers for as long as the VAT registration has not yet been cancelled, even if there is no taxable transaction during the quarter or the aggregate sales/receipts for any 12-month period did not exceed the P1,500,000.00 threshold.</p>
							    <p>A person who imports goods shall use the form prescribed by the Bureau of Custom.</p>
							</ol>
							<br />
							<b>When and Where to file</b>
							
							<p>The returns must be filed not later than the 25th day following the close of the quarter.</p>
							<p>The returns must be filed with any Authorized Agent Bank (AAB) within the jurisdiction of the Revenue District Office where the taxpayer is required to register. In places where there are no Authorized Agent Bank (AAB), the returns shall be filed with the Revenue Collection Officer or duly Authorized City or Municipal Treasurer located within the revenue district where the taxpayer is required to register.</p>

							<p>Any taxpayer whose registration has been cancelled shall file a return and pay the tax due thereon within 25 days from date of cancellation of registration. For taxpayers with branches, only one consolidated return shall be filed for the principal place of business or head office and all the branches.</p>
							<br />
							<b>When and Where to Pay</b>
							
							<p>Upon filing this return, the total amount payable shall be paid to the Authorized Agent Bank (AAB) where the return is filed. In places where there are no AABs, payment shall be made to the Revenue Collection Officer or duly Authorized City or Municipal Treasurer who shall issue a Revenue Official Receipt (ROR) therefor.</p>

							<p>Where the return is filed with an AAB, taxpayer must accomplish and submit BIR-prescribed deposit slip, which the bank teller shall machine validate as evidence that payment was received by the AAB. The AAB receiving the tax return shall stamp mark the word “Received” on the return and also machine validate the return as proof of filing the return and payment of the tax by the taxpayer, respectively. The machine validation shall reflect the date of payment, amount paid and transactions code, the name of the bank, branch code, teller’s code and teller’s initial. Bank debit memo number and date should be indicated in the return for taxpayers paying under the bank debit system.</p>
							<br />
							<b>For Electronic Filing and Payment System (EFPS) Taxpayer</b>
							
							<p>The deadline for electronically filing and paying the taxes due thereon shall be in accordance with the provisions of existing applicable revenue issuances.</p>
							<br />
							<b>Rates and Bases of Tax</b>
							
							<ol type="A" class="indent">
							    <li>On Sale of Goods and Properties – twelve percent (12%) of the gross selling  price    or	gross    value    in	money	of	the	goods   or properties   sold, bartered or exchanged.</li>
							    <li>On Sale of Services and Use or Lease of Properties – twelve percent (12%) of gross receipts derived from the sale or exchange of services, including the use or lease of properties.</li>
							    <li>On Importation of Goods – twelve percent (12%) based on the total value used by the Bureau of Customs in determining tariff and customs duties, plus customs duties, excise taxes, if any, and other charges, such tax to be paid by the importer prior to the release of such goods from customs custody: Provided, That where the customs duties are determined on the basis of quantity or volume of the goods, the value added tax shall be based on the landed cost plus excise taxes, if any.</li>
							    <li>On Export Sales and Other Zero-rated Sales   - 0%.</li>
							</ol>
							<br />
                      </div>
                      <div class="col">
                      		<b>Definition of Terms</b>

							<p>Input Tax means the value-added tax due from or  paid by  a  VAT - registered person in the course of his trade or business on importation of goods, or local purchase of goods or services, including lease or use of property, from a VAT-registered person. It shall also include the transitional input tax determined in accordance with Section 111 of the National Internal Revenue Code, presumptive input tax and deferred input tax from previous period.</p>
							<p>Output  Tax  means   the  value-added   tax  due   on   the   sale   or   lease of  taxable  goods  or    properties    or    services    by   any	person registered or required to register under Section 236 of the National Internal Revenue Code.</p>
							<br />
							<b>Penalties</b>

							<ol class="indent">
							    There shall be imposed and collected as part of the tax:
							    <li>A surcharge of twenty five percent (25%) for each of the following violations:</li>
							    <ol type="a" class="indent">
							        <li>Failure to file any return and pay the amount of tax or installment due on or before the due date;</li>
							        <li>Unless otherwise authorized by the Commissioner, filing a return with a person or office other than those with whom it is required to be filed;</li>
							        <li>Failure to pay the full or part of the amount of tax shown on the return, or the full amount of tax due for which no return is required to be filed on or before the due date;</li>
							        <li>Failure to pay the deficiency tax within the time prescribed for its payment in the notice of assessment.</li>
							    </ol>
							    <li>A surcharge of fifty percent (50%) of the tax or of the deficiency tax, in
							case any payment has been made on the basis of such return before the discovery of the falsity or fraud, for each of the following violations:
							    </li>
							    <ol type="a" class="indent">
							        <li>Willful neglect to file the return within the period prescribed by the Code or by rules and regulations; or</li>
							        <li>In case a false or fraudulent return is willfully made.</li>
							    </ol>
							    <li>Interest at the rate of twenty percent (20%) per annum, on any unpaid amount of tax, from the date prescribed for the payment until the amount is fully paid.</li>
							    <li>Compromise penalty.</li>
							</ol>
							<br />
							<b>Attachments</b>
							                                               
							<ol>
							    <li>Duly issued Certificate of Creditable VAT Withheld at Source, if applicable;</li>


							    <li>Duly approved Tax Debit Memo, if applicable;</li>
							    <li>Duly approved Tax Credit Certificate, if applicable.</li>
							    <li>Proof of the payment and the return previously filed, for amended return.</li>
							    <li>Authorization letter, if return is filed by authorized representative.</li>
							</ol>
							<br />
							<b>Note: All background information must be properly filled up.</b>

							<ul>
							    <li>All returns filed by an accredited tax representative on behalf of a taxpayer shall bear the following information:</li>
							    <ol type="A" class="indent">
							        <li>A. For CPAs and others (individual practitioners and members of GPPs);</li>
							        <dl class="indent">
							            <dd>a.1 Taxpayer Identification Number (TIN); and</dd>
							            <dd>a.2 Certificate of Accreditation Number, Date of Issuance, and Date of Expiry.</dd>
							        </dl>
							        <li>B. For members of the Philippine Bar (individual practitioners, members of GPPs);</li>
							        <dl class="indent">
							            <dd>b.1 Taxpayer Identification Number (TIN); and</dd>
							            <dd>b.2 Attorney’s Roll number or Accreditation Number, if any.</dd>
							        </dl>
							    </ol>
							    <li>Box No. 1 refers to transaction period and not the date of filing this return.</li>
							    <li>The last 3 digits of the 12-digit TIN refers to the branch code.</li>
							    <li>TIN = Taxpayer Identification Number</li>
							</ul>
							<br />
							<br />
							<div class="small" style="text-align: right"><b>ENCS</b></div>
                      </div>
                  </div>
		      </div>
		    </div>
        </div>
      </div>
    </section>
</main>
@endsection
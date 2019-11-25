@extends('layouts.app')

@section('content')
    <section class="container-main">
        <div class="flex-container">
            <div class="flex-item">
                <div class="content-holder bg-white holder-sm">
                    <figure>
                        <img class="mx-auto d-block" src="{{ asset('images/logo.png') }}" alt="eTax Logo" width="70">
                    </figure>
                    <h4 class="font-orange text-center">Register your Email Address</h4>
                     <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <input type="hidden" name="user_type" value="regular">
                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address:') }}</label>
                            <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" >

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                            <label for="username">{{ __('Username') }}</label>

                                <input id="username" type="test" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                        </div>
                        
                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>

                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contact">{{ __('Contact Number (optional):') }}</label>
                            <input type="text" class="form-control" id="contact" name="contact" aria-describedby="ContactNumber">
                        </div>
                        <!-- <div class="form-group">
                            <label for="username">{{ __('Username:') }}</label>
                            <input id="username" type="text" class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" >

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                            <label for="password">{{ __('Password:') }}</label>
                            <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" >

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div> -->
                        
                        
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="terms">
                                <label class="custom-control-label" for="terms">I have agreed to the <a data-toggle="modal" href="#agreement">Terms and Agreement.</a></label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-sign-up" disabled>Sign Up</button> <br>
                        <p>Do you have an account already? Click <a href="{{ route('login') }}">here</a></p>
                      </form>
                </div>
            </div>
        <div>
    </section>
    <div class="modal fade" id="agreement" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Terms and Agreement</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="agreement-holder" style="">
                                        <h5 class="text-center">User's Agreement and Terms of Use:</h5>
                                        <p class="text-center">Welcome to our Website!</p><br/>
                                        <p>
                                                If you choose to continue to browse and use this software, you are agreeing to comply
                                                with and be bound by the following terms and conditions of use together with our privacy
                                                policy governed by eTax, in relation to this website and software.
                                        </p>
                                        <p>
                                                eTax (“Provider”) will provide you access to the services defined below and related website
                                                and software located at ETAX.PH
                                        </p>
                                        <p>
                                                Please read carefully the following terms and conditions (this “Agreement”) and the
                                                Privacy Policy, which may be found at www.etax.ph/index/policies. This Agreement governs
                                                your access to and use of the Site, Web Services, Data, and constitutes a binding legal
                                                agreement between you (referred to herein as “Client”) and Provider.
                                        </p>
                                        <p style="font-style: italic">
                                            YOU ACKNOWLEDGE AND AGREE THAT, BY CLICKING OR SUBSCRIBING TO THIS SITE, OR USING THIS SITE,
                                            WEB SERVICES, OR DATA, YOU ARE INDICATING THAT YOU HAVE READ, UNDERSTAND AND AGREED TO BE BOUND
                                            BY THIS AGREEMENT. IF YOU DO NOT AGREE TO THIS AGREEMENT, THEN THIS GIVES YOU NO RIGHT TO ACCESS
                                            OR USE THE SITE, WEB SERVICES, OR DATA.
                                        </p>
                                        <br/>
                                        <p style="font-style: bolder;text-decoration: underline">Purpose</p>
                                        <p>
                                            <ul>
                                                <li>
                                                    This website is a tax filing software and does not include or comprise the whole tax rules, regulations, and laws.
                                                </li>
                                                    <li>
                                                        The company does not provide any advice.
                                                    </li>
                                                    <li>
                                                        Findings are just potential tax exposures that user may consider in their analysis.
                                                    </li>
                                                    <li>
                                                        The company does not guarantee that the user will not have any BIR Audit Finding.
                                                    </li>
                                                    <li>
                                                        The users are advised to consult a tax lawyer or expert prior to making any decisions on the results of the use of the website.
                                                    </li>
                                            </ul>
                                        </p>
                                        <br/>
                                        <p style="font-style: bolder;text-decoration: underline">Alterations</p>
                                        <p>
                                            Provider reserves the right to alter, discontinue, or terminate the Site, Web Services or
                                            Data or modify this Agreement at any time without prior notice.
                                        </p>
                                        <p>
                                            From time to time, this website may also include links to other websites. These links are provided for
                                            your convenience to provide further information.
                                        </p>
                                        <br/>
                                        <p style="font-style: bolder;text-decoration: underline">Account Information</p>
                                        <p>
                                            You may update or correct information about yourself by editing your account settings within our service.
                                             If you wish to delete your account, please visit EATX.PH but note that we may retain information as
                                             required by law, for legitimate business purposes, or as part of our retention practices. We may also
                                             retain cached or archived copies of information about you for a certain period of time.
                                        </p>
                                        <br/>
                                        <p style="font-style: bolder;text-decoration: underline">Proprietary Rights</p>
                                        <p>
                                            This website and software contains material which is owned by or licensed to us. This material includes,
                                            but is not limited to, the design, layout, look, appearance, and graphics. Reproduction is prohibited
                                            other than in accordance with the copyright notice, which forms part of these terms and conditions.
                                        </p>
                                        <p>
                                            All trademarks reproduced in this website, which are not the property of, or licensed to the operator, are acknowledged on the website.
                                        </p>
                                        <br/>
                                        <p style="font-style: bolder;text-decoration: underline">Warranty </p>
                                        <p>Neither the Provider nor any third party provides any warranty or guarantee as to the accuracy, timeliness,
                                            performance, completeness, or suitability of the information and materials found or offered on this website
                                            for any particular purpose. You acknowledge that such information and materials may contain inaccuracies or
                                            errors and we expressly exclude liability for any such inaccuracies or errors to the fullest extent permitted
                                            by law.
                                        </p>
                                        <p>
                                            Your use of any information or materials on this website is entirely at your own risk, for which we shall
                                            not be liable. It shall be your own responsibility to ensure that any products, services or information
                                            available through this website meet your specific requirements.
                                        </p>
                                        <br/>
                                        <p style="font-style: bolder;text-decoration: underline">Client Responsibilities </p>
                                        <p>
                                            Client will promptly advise any errors in the operation of the Service to the Provider and will not certainly
                                            take actions that would increase the severity of the error. Client will use the Service solely for the
                                            purpose it is designed to and described herein. In the event that Client violates any of the requirements
                                            required herein, Provider will have no responsibility to provide support.
                                        </p>
                                        <br/>
                                        <p style="font-style: bolder;text-decoration: underline">Indemnity and Limitation of Liability</p>
                                        <p>
                                            Unauthorized use of this website and the eTax software may give to a claim for damages and/or be a criminal
                                            offense.
                                        </p>
                                        <p>
                                            You may not create a link to this website from another website or document without the Provider’s prior written consent.
                                        </p>
                                        <p>
                                            Provider agrees to defend or settle, indemnify and hold Client, its employees, directors and officers from
                                            and against any and all liabilities, losses, damages or expenses including the cost in court proceedings
                                            and attorney’s fees in connection with any misappropriations and misuse of the Site, Web Services or Data,
                                            only to the extent of liabilities, damages or expenses result from use of the Service that is within the
                                            scope of the Agreement, provided that Client does not make any admission of Provider’s guilt without
                                            Provider’s prior written approval and provided that Client gives prompt written notification of the claim
                                            or action.
                                        </p>
                                        <p>
                                            Your use of this website and any dispute arising out of such use is subject to the laws of the Republic of
                                            the Philippines. Further actions and proceedings will be filed in the City where the office of the Provider
                                            is located.
                                        </p>
                                        <br/>
                                        <p style="font-style: bolder;text-decoration: underline">POLICY</p>
                                        <p>
                                            The following are the policies on the use of this Site:
                                        </p>
                                        <p>
                                            <ul style="list-style:numeric">
                                                <li>Account information will be collected from you once you register on our site.</li>
                                                <li> To improve our Site, we continually to strive to improve our Site offerings based on
                                                    the information and feedback we receive from you. </li>
                                                <li>
                                                    To improve our Client relation, your information helps us to improve our Site offerings based on the
                                                    response to the need of the Client and customer service request and support needs.
                                                </li>
                                                <li>
                                                     Provider maintains the confidentiality of the information in the process of the transactions that
                                                     the Client will avail, information whether public or private, will not be sold, exchanged or transferred,
                                                      or given to any other company without the consent of the Client other than the express purpose of
                                                        delivering the desired output of the Client.
                                                </li>
                                                <li>
                                                     Please also visit our Terms and Conditions section establishing the use, disclaimers, limitations and
                                                     liability of the user and/or Client governing the use of our website ETAX.PH
                                                </li>
                                                <li>
                                                     Should we decide to change our policy, we will post those changes on this page
                                                </li>
                                                <li>
                                                      That the Client will receive upon subscription either through email, SMS or any other mode of
                                                        communication for any changes, tax updates and other related BIR Revenue Regulations.
                                                </li>
                                                <li>
                                                       That Provider has free access on the checking of the BIR Tax Returns as encoded in the software
                                                         system. This is only available as promotions of the system software and subject to change at any time.
                                                </li>
                                                <li>
                                                       The Client should purchase upgrades should the former wishes to use the system software further.
                                                </li>
                                                <li>
                                                        By using our site, you consent to our policy.
                                                </li>
                                            </ul>
                                        </p>
                                        <br/>
                                        <p style="font-style: bolder;text-decoration: underline">Disclaimer</p>
                                        <p>We are not connected to BIR and use eBIR  to file. </p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-agreed">I agreed</button>
          </div>
        </div>
      </div>
    </div>

@endsection
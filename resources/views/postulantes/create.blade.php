@extends('layoutspage.main')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css" rel="stylesheet"
    crossorigin="anonymous">
<div class="container-xxl py-5">
  <div class="container">
    <div class="container">
        <h1>Ingrese sus Datos</h1>

        <div class="row">
          <div class="col-md-12 mt-5">
            <div id="stepper1" class="bs-stepper">
                <div class="bs-stepper-header">
                    <div class="step" data-target="#test-l-1">
                        <button type="button" class="btn step-trigger">
                            <span class="bs-stepper-circle">1</span>
                            <span class="bs-stepper-label">Codigo Validación</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#test-l-2">
                        <button type="button" class="btn step-trigger">
                            <span class="bs-stepper-circle">2</span>
                            <span class="bs-stepper-label">Fecha Nacimiento</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#test-l-3">
                        <button type="button" class="btn step-trigger">
                            <span class="bs-stepper-circle">3</span>
                            <span class="bs-stepper-label">Formulario</span>
                        </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#test-l-4">
                        <button type="button" class="btn step-trigger">
                            <span class="bs-stepper-circle">4</span>
                            <span class="bs-stepper-label">Descarga</span>
                        </button>
                    </div>
                </div>
                <div class="bs-stepper-content"><br><br>
                  <div id="test-l-1" class="content">
                    <div class="col-6 col-sm-6">
                      <div class="date" id="date1" data-target-input="nearest">
                        <input type="text" id="codigo_input" placeholder="Codigo Verificacion"
                            style="text-transform: uppercase;"
                            class="form-control border-0 datepicker-input" required>
                      </div><br><br>
                      <button class="btn btn-secondary" onclick="buscarCodigo()"><i
                              class="fa fa-check"></i>&nbsp;
                          Validar Codigo
                      </button>
                    </div><br>
                  </div>

                  <div id="test-l-2" class="content">
                    <div class="h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn"
                        data-wow-delay="0.6s">
                        <form action="{{route('postulante.create')}}" method="POST"
                            enctype="multipart/form-data">
                            <div class="col-6 col-sm-6">
                                Fecha Nacimiento
                                <div class="date" id="date1" data-target-input="nearest">
                                    <input type="date" id="fecha_nacimiento"
                                        class="form-control border-0 datepicker-input"
                                        placeholder="Fecha Nacimiento" data-toggle="datetimepicker"
                                        style="height: 55px;" required>
                                </div>
                            </div><br><br>
                            <div class="col-6 col-sm-6">
                                <div class="date" id="date1" data-target-input="nearest">
                                    <h5 id="fecha_print" style="color: black;    background: #d86464ab;">
                                    </h5>
                                </div>
                            </div>
                        </form><br><br>

                        <button class="btn btn-secondary" onclick="getValueInput()"><i
                                class="fa fa-calendar"></i>&nbsp;
                            Validar Fecha</button>
                        <script>
                            function getValueInput() {
                                let error = "Tienes una edad mayor a la aceptada para la postulación!!!";
                                let a = document.getElementById("fecha_nacimiento").value;
                                // console.log("fecha ingresada",a);

                                var hoy = new Date();
                                var cumpleanos = new Date(a);
                                var edad = hoy.getFullYear() - cumpleanos.getFullYear();
                                var m = hoy.getMonth() - cumpleanos.getMonth();

                                if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
                                    edad--;
                                }

                                if (edad <= 23) {
                                    stepper1.next();
                                } else {
                                    document.getElementById("fecha_print").innerHTML = error;
                                }
                                // console.log("edad",edad);
                                return edad;
                            }
                        </script>
                    </div>
                    {{-- <button class="btn btn-primary" onclick="stepper1.next()">Next</button> --}}
                  </div>

                  <div id="test-l-3" class="content">
                      <h1 class="text-black mb-4">Formulario Postulante</h1>
                      <div>
                          <span style="text-align: left;"> <strong>Los campos con * son
                                  obligatorios</strong></span>
                      </div><br>

                      <form action="{{route('postulante.store')}}" method="POST"
                          enctype="multipart/form-data">
                          {{ csrf_field() }}
                          <div class="row g-3"><br>
                            <div class="col-12 col-sm-6">
                              <input type="text" class="form-control border-0"
                                  placeholder="Primer Nombre *" name="primer_nombre"
                                  style="text-transform: uppercase;" style="height: 55px;" required>
                            </div>
                            <div class="col-12 col-sm-6">
                              <input type="text" class="form-control border-0"
                                  placeholder="Segundo Nombre *" name="segundo_nombre"
                                  style="text-transform: uppercase;" style="height: 55px;" required>
                            </div>
                            <div class="col-12 col-sm-6">
                              <input type="text" class="form-control border-0"
                                  placeholder="Apellido Paterno *" name="primer_apellido"
                                  style="text-transform: uppercase;" style="height: 55px;" required>
                            </div>
                            <div class="col-12 col-sm-6">
                              <input type="text" class="form-control border-0"
                                  placeholder="Apellido Materno *" name="segundo_apellido"
                                  style="text-transform: uppercase;" style="height: 55px;" required>
                            </div>
                            <div class="col-12 col-sm-6">
                              <input type="number" class="form-control border-0" placeholder="Telefono"
                                  name="telefono" style="text-transform: uppercase;" style="height: 55px;"
                                  required>
                            </div>
                            <div class="col-12 col-sm-6">
                              <input type="number" class="form-control border-0" placeholder="Celular *"
                                  name="celular" style="text-transform: uppercase;" style="height: 55px;"
                                  required>
                            </div>
                            <div class="col-12 col-sm-6">
                              <input type="number" class="form-control border-0" placeholder="Whatsapp"
                                  name="whatsapp" style="text-transform: uppercase;" style="height: 55px;"
                                  required>
                            </div>
                            <div class="col-12 col-sm-6">
                              <select class="form-select border-0" style="height: 55px;" name="ciudad">
                                  <option selected>Ciudad</option>
                                  <option value="La Paz">La Paz</option>
                                  <option value="Oruro">Oruro</option>
                                  <option value="Potosi">Potosi</option>
                                  <option value="Cochabamba">Cochabamba</option>
                                  <option value="Chuquisaca">Chuquisaca</option>
                                  <option value="Tarija">Tarija</option>
                                  <option value="Santa Cruz">Santa Cruz</option>
                                  <option value="Beni">Beni</option>
                                  <option value="Pando">Pando</option>
                              </select>
                            </div>

                            <div class="col-12">
                              <input type="email" class="form-control border-0"
                                  placeholder="Correo Electronico *" name="email" style="height: 55px;"
                                  required>
                            </div>
                            {{-- <div class="col-12">
                                <textarea class="form-control border-0" placeholder="Special Request"></textarea>
                            </div> --}}
                            <div class="col-12">
                                <button class="btn btn-secondary w-100 py-3" type="submit"><i
                                        class="fa fa-save"></i> Registrarse</button>
                            </div>
                          </div>
                      </form><br><br>


                      {{-- <button class="btn btn-primary" onclick="stepper1.next()">Next</button>
                        <button class="btn btn-primary" onclick="stepper1.previous()">Previous</button> --}}
                  </div>

                  <div id="test-l-4" class="content">
                    <div class="col-md-8"><br><br>
                      <div class="card">
                        <div class="card-header">DESCARGAR DOCUMENTO</div>

                        <div class="card-body">
                            <a type="button" class="btn btn-warning" href="/downloadsHNWSBKEJS"><i
                                    class="fa fa-book"></i> Descargar Prospecto</a>
                        </div>
                      </div>
                    </div>

                    {{--<button class="btn btn-primary" onclick="stepper1.next()">Next</button>
                        <button class="btn btn-primary" onclick="stepper1.previous()">Previous</button> --}} 
          
                  </div>
                </div>
            </div>
          </div>
        </div>
    </div><br><br>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js" crossorigin="anonymous">
  </script>
  <script>
      var stepper1Node = document.querySelector('#stepper1')
      var stepper1 = new Stepper(document.querySelector('#stepper1'))

      stepper1Node.addEventListener('show.bs-stepper', function (event) {
          console.warn('show.bs-stepper', event)
      })
      stepper1Node.addEventListener('shown.bs-stepper', function (event) {
          console.warn('shown.bs-stepper', event)
      })

      var stepper2 = new Stepper(document.querySelector('#stepper2'), {
          linear: false,
          animation: true
      })
      var stepper3 = new Stepper(document.querySelector('#stepper3'), {
          animation: true
      })
      var stepper4 = new Stepper(document.querySelector('#stepper4'))
  </script>

  <script>
      function buscarCodigo() {
          const array1 = [{
                  code: "TSMSVYPCO"
              }, {
                  code: "NPMOAZWAH"
              }, {
                  code: "NTIVQHLQE"
              }, {
                  code: "DBFXQRLKY"
              }, {
                  code: "WXOYWBIWW"
              }, {
                  code: "EFDNUKBLC"
              }, {
                  code: "SQVGPETVP"
              }, {
                  code: "RMEXMQZNV"
              }, {
                  code: "ECOKCRXAT"
              }, {
                  code: "CSDCGIIRP"
              },
              {
                  code: "TEZGVSPAP"
              }, {
                  code: "UKBZPHRCW"
              }, {
                  code: "GLGWRNXPC"
              }, {
                  code: "ZQOQDLIMW"
              }, {
                  code: "VFDWTKWIQ"
              }, {
                  code: "LOLHNNPVG"
              }, {
                  code: "WCJPEDTBW"
              }, {
                  code: "EMNFRVXQF"
              }, {
                  code: "TQCQDBZNZ"
              }, {
                  code: "SOWHTRDPV"
              },
              {
                  code: "HACIZHTNJ"
              }, {
                  code: "AFYREEAFC"
              }, {
                  code: "WUUCMVPMF"
              }, {
                  code: "HTQTPBHDK"
              }, {
                  code: "OPJFEYUHB"
              }, {
                  code: "EEEGFYNIG"
              }, {
                  code: "UZDBSDMWY"
              }, {
                  code: "YKFNBFBNB"
              }, {
                  code: "BAPRQMZPV"
              }, {
                  code: "KZWLQIBLH"
              },
              {
                  code: "LBVVJNHCN"
              }, {
                  code: "LXHXMGOBV"
              }, {
                  code: "RJZMVOTBG"
              }, {
                  code: "PTYDZGUBK"
              }, {
                  code: "MRMOIGEJK"
              }, {
                  code: "YURDOXPFO"
              }, {
                  code: "AWBSNAPQV"
              }, {
                  code: "SASRMFGFA"
              }, {
                  code: "YLPAODVXZ"
              }, {
                  code: "ZDZEMAMXT"
              },
              {
                  code: "UIXMALQPK"
              }, {
                  code: "WTVINYIRI"
              }, {
                  code: "NVJMAGLJY"
              }, {
                  code: "REKVWLEUN"
              }, {
                  code: "GMQOLWAMS"
              }, {
                  code: "MVZQUWHWC"
              }, {
                  code: "BSBGWKJGK"
              }, {
                  code: "JGHYRJJCK"
              }, {
                  code: "WRMNUKOAO"
              }, {
                  code: "GDKSGAQIF"
              },
              {
                  code: "FXOKFQVNL"
              }, {
                  code: "RXOHYISRK"
              }, {
                  code: "YVKWLKLCM"
              }, {
                  code: "DJIVTOXUW"
              }, {
                  code: "CLVPBNTOI"
              }, {
                  code: "HCPKTWNDR"
              }, {
                  code: "WKXBWEGHK"
              }, {
                  code: "QVKJBQHSS"
              }, {
                  code: "WUTHENVPV"
              }, {
                  code: "VJBXAJAGZ"
              },
              {
                  code: "RQSVITHRU"
              }, {
                  code: "AUIQMRBCC"
              }, {
                  code: "VUMLOQHLJ"
              }, {
                  code: "AYNHICKSW"
              }, {
                  code: "CMNGGMOZK"
              }, {
                  code: "CFEVOIKJW"
              }, {
                  code: "UMWZHEPTQ"
              }, {
                  code: "ZKUZRCTHF"
              }, {
                  code: "AKKBJVBQS"
              }, {
                  code: "UYGFDTACT"
              },
              {
                  code: "ZMQKPGCAY"
              }, {
                  code: "SCZWOXOTL"
              }, {
                  code: "LEPPPFTLL"
              }, {
                  code: "EZFKXNOCH"
              }, {
                  code: "LPMKODEDS"
              }, {
                  code: "YSLGFFJAO"
              }, {
                  code: "TDVMFUHVN"
              }, {
                  code: "DCBKVBEMF"
              }, {
                  code: "NHHDWFWFA"
              }, {
                  code: "XXTMNRTSO"
              },
              {
                  code: "MZJBEPJPU"
              }, {
                  code: "VJLDTEIFR"
              }, {
                  code: "DDILYMEUM"
              }, {
                  code: "GGIHALYGH"
              }, {
                  code: "UUVMXSFFH"
              }, {
                  code: "OVAGFEURG"
              }, {
                  code: "MUBSXGAQW"
              }, {
                  code: "UAACPEVKA"
              }, {
                  code: "HKFAAXAVM"
              }, {
                  code: "VRPRRQGBV"
              },
              {
                  code: "LGRVMGPQW"
              }, {
                  code: "JZZUJYVCC"
              }, {
                  code: "RISHSSQEP"
              }, {
                  code: "UQZOSMGXR"
              }, {
                  code: "KCSSPDYMZ"
              }, {
                  code: "MNRRUPMVY"
              }, {
                  code: "TZENUTNPD"
              }, {
                  code: "DRSKQPBCR"
              }, {
                  code: "YUFKXXLPF"
              }, {
                  code: "DXLUGZVMA"
              },
              {
                  code: "LUHQAIOQU"
              }, {
                  code: "UAMTMTCOX"
              }, {
                  code: "MQDPFXFRN"
              }, {
                  code: "TILJHUJXK"
              }, {
                  code: "URXTPKTKP"
              }, {
                  code: "REHYUXITT"
              }, {
                  code: "GTPDHJFUV"
              }, {
                  code: "BXFECRJGQ"
              }, {
                  code: "SKIAPQNSX"
              }, {
                  code: "QRGRFBTCN"
              },
              {
                  code: "IYDQHBYBQ"
              }, {
                  code: "SLULGGCTJ"
              }, {
                  code: "ECQDJDMPP"
              }, {
                  code: "AROQQFNCW"
              }, {
                  code: "XGSCPKKLI"
              }, {
                  code: "IPMPJFPQK"
              }, {
                  code: "MZVNRJDBH"
              }, {
                  code: "AZDMUUDKJ"
              }, {
                  code: "IMBCTLMMC"
              }, {
                  code: "SKVFBQCBP"
              },
              {
                  code: "IMXYKNYIC"
              }, {
                  code: "DXHBZIQKF"
              }, {
                  code: "MIMMMPXHR"
              }, {
                  code: "SFOXHYQCU"
              }, {
                  code: "IXSGEGAXI"
              }, {
                  code: "ZFBFOMLXS"
              }, {
                  code: "PEHYWGQTC"
              }, {
                  code: "VRVKFZMDW"
              }, {
                  code: "RRKUZMIOS"
              }, {
                  code: "LGAPVHLTD"
              },
              {
                  code: "OEXWPXBXH"
              }, {
                  code: "IUPPIEWDX"
              }, {
                  code: "CTGMQOFHJ"
              }, {
                  code: "HIVOXMUHT"
              }, {
                  code: "MWZRQAVOQ"
              }, {
                  code: "MLRDFAJQE"
              }, {
                  code: "HBATPEZGZ"
              }, {
                  code: "DJQZWHFUX"
              }, {
                  code: "WGGYBRALI"
              }, {
                  code: "EPEQCKKFN"
              },
              {
                  code: "VEEJGGVSG"
              }, {
                  code: "EMFYQFKRP"
              }, {
                  code: "RLKOJZVQW"
              }, {
                  code: "BEJRBJBRP"
              }, {
                  code: "UZBBPZAPZ"
              }, {
                  code: "ULXEBIXJG"
              }, {
                  code: "YVSVTDHMY"
              }, {
                  code: "JADTGDWNH"
              }, {
                  code: "ESMSYFPLS"
              }, {
                  code: "SAZDBTWTS"
              },
              {
                  code: "HNJFBNUTA"
              }, {
                  code: "MKKFYHSHS"
              }, {
                  code: "RMNGHYIRK"
              }, {
                  code: "FMRTCQMLS"
              }, {
                  code: "AXILSSEXT"
              }, {
                  code: "QCVNIVBRM"
              }, {
                  code: "BFEVGZUJE"
              }, {
                  code: "KWFVGPFXD"
              }, {
                  code: "FGZFKAICW"
              }, {
                  code: "JIYBCFYMA"
              },
              {
                  code: "KRABRHTZR"
              }, {
                  code: "FFTICQVCS"
              }, {
                  code: "TIIXWSFYY"
              }, {
                  code: "SSDGFXRMW"
              }, {
                  code: "KHJUCSWYG"
              }, {
                  code: "PZAKKSCFV"
              }, {
                  code: "RFVPNKYSJ"
              }, {
                  code: "GRFBPZBTK"
              }, {
                  code: "SOZXELVQV"
              }, {
                  code: "SYAZYUYQV"
              },
              {
                  code: "KDSKZYDFG"
              }, {
                  code: "FMPEQSMMF"
              }, {
                  code: "YNQZLJKLU"
              }, {
                  code: "UCTUKVURL"
              }, {
                  code: "PKEEJFYOH"
              }, {
                  code: "GTXPDDSRI"
              }, {
                  code: "EWYEDDNMS"
              }, {
                  code: "HNWSBKEJS"
              }, {
                  code: "MWGRXRFDE"
              }, {
                  code: "XBRTXWWUF"
              },
              {
                  code: "PUSTZBWEG"
              }, {
                  code: "TTCBEENOR"
              }, {
                  code: "HLTRTHIUM"
              }, {
                  code: "WZVYQDJFN"
              }, {
                  code: "JQAQBPSST"
              }, {
                  code: "LUTZGXCOA"
              }, {
                  code: "AGSRPKGPP"
              }, {
                  code: "SJZKHUEHZ"
              }, {
                  code: "PUBAZBOFA"
              }, {
                  code: "FVHBEUPIW"
              },
              {
                  code: "QAUBTIQJR"
              }, {
                  code: "EYHABSTDG"
              }, {
                  code: "CMCMDOWWP"
              }, {
                  code: "BRZROINTP"
              }, {
                  code: "FPJYXMVZW"
              }, {
                  code: "DFINXSBVH"
              }, {
                  code: "YMPXGXHZD"
              }, {
                  code: "WAPACAZTW"
              }, {
                  code: "IZBQCMJHE"
              }, {
                  code: "VFQFTEHPB"
              },
              {
                  code: "RNTLSQIYH"
              }, {
                  code: "ZOMGMKAUU"
              }, {
                  code: "NPGDRIEQU"
              }, {
                  code: "LLMAVRAEP"
              }, {
                  code: "SWUEESJFZ"
              }, {
                  code: "VJTODREIC"
              }, {
                  code: "CFUSPTYUX"
              }, {
                  code: "BWHMFSHHQ"
              }, {
                  code: "LFYFIRJER"
              }, {
                  code: "USRKARHVT"
              },
              {
                  code: "AUQEFDGTE"
              }, {
                  code: "RDYNMLHTE"
              }, {
                  code: "LPYKKWVKI"
              }, {
                  code: "YDOZHFSCY"
              }, {
                  code: "JVBIHDWMN"
              }, {
                  code: "RKWUGRPQC"
              }, {
                  code: "ZKSEUFEWH"
              }, {
                  code: "RYNMFGWFJ"
              }, {
                  code: "LSTWUFHNX"
              }, {
                  code: "LHXBIWJFM"
              },
              {
                  code: "RYPZGVWGA"
              }, {
                  code: "HPUVDLIUS"
              }, {
                  code: "VSELHAVYR"
              }, {
                  code: "ONUUJDNZU"
              }, {
                  code: "HIGQNVRAM"
              }, {
                  code: "TWJXOCWMC"
              }, {
                  code: "WPUFKBXFP"
              }, {
                  code: "CFKFBMDQB"
              }, {
                  code: "WDBUKFUYU"
              }, {
                  code: "ENWCICZAB"
              },
              {
                  code: "ADBHAPPAW"
              }, {
                  code: "SCIHRRKSN"
              }, {
                  code: "UTTWUGTEG"
              }, {
                  code: "TCCENKFKA"
              }, {
                  code: "PSZUEUWRQ"
              }, {
                  code: "BLVCWXXPW"
              }, {
                  code: "EYHEHCEPV"
              }, {
                  code: "CTEPJQJMK"
              }, {
                  code: "WGZKJHYJV"
              }, {
                  code: "PWBKAHJTT"
              },
              {
                  code: "QDEAWWSPD"
              }, {
                  code: "AKMGHSDVM"
              }, {
                  code: "HBTOBZRNI"
              }, {
                  code: "CIVHELQYE"
              }, {
                  code: "HPJENYGEF"
              }, {
                  code: "HMLXJMNER"
              }, {
                  code: "KZQACGCVD"
              }, {
                  code: "VNAJUSFYY"
              }, {
                  code: "XXUNZBANF"
              }, {
                  code: "KQNILZLEN"
              },
              {
                  code: "FHPPQGIRT"
              }, {
                  code: "THFSILHNW"
              }, {
                  code: "EKACQRMVA"
              }, {
                  code: "BBCNOQBIW"
              }, {
                  code: "KMEQNZGIZ"
              }, {
                  code: "AWZZTMTJM"
              }, {
                  code: "EGEMHEJGJ"
              }, {
                  code: "ZWKXWFEFU"
              }, {
                  code: "OFXJHZSBR"
              }, {
                  code: "XGDTNBQMR"
              },
              {
                  code: "UTGLWOQCO"
              }, {
                  code: "YXPIWVHOX"
              }, {
                  code: "VNQXPRUMG"
              }, {
                  code: "QXAKIVFBN"
              }, {
                  code: "JVZPXJGNZ"
              }, {
                  code: "LHCDYSSQM"
              }, {
                  code: "UWEYDBKBY"
              }, {
                  code: "DKWYNPTXT"
              }, {
                  code: "JPHHMVEQF"
              }, {
                  code: "XGVBAMNCO"
              },
              {
                  code: "UTYJMMVFU"
              }, {
                  code: "JBEHGRYSL"
              }, {
                  code: "DMDWLRWVT"
              }, {
                  code: "UUYCMINAA"
              }, {
                  code: "HIIWYTSRM"
              }, {
                  code: "QIEOPUXIM"
              }, {
                  code: "FVMMFGDYG"
              }, {
                  code: "NMZBQNYVN"
              }, {
                  code: "AKPQVLTEB"
              }, {
                  code: "STAXOBNBR"
              },
              {
                  code: "XJPRAHMLR"
              }, {
                  code: "UGQHPPGNI"
              }, {
                  code: "NNFKKGUHI"
              }, {
                  code: "LZCWHHYIG"
              }, {
                  code: "MCCGITQOW"
              }, {
                  code: "PHWXYOLRE"
              }, {
                  code: "QKCWEWXGC"
              }, {
                  code: "VAGMZYGZA"
              }, {
                  code: "HPBMBZAEK"
              }, {
                  code: "EYKPCJEJJ"
              },
              {
                  code: "GCPZMDNNX"
              }, {
                  code: "YAORPICFT"
              }, {
                  code: "WALAUGSRF"
              }, {
                  code: "XDSLZNPTB"
              }, {
                  code: "PDHQCCNAS"
              }, {
                  code: "KIOTWMQQM"
              }, {
                  code: "EYFJGFTKJ"
              }, {
                  code: "ZGYDFBGPU"
              }, {
                  code: "QFDCLDNIE"
              }, {
                  code: "XKORMNMYI"
              },
              {
                  code: "IRDCLSEBU"
              }, {
                  code: "XUXQRGGYI"
              }, {
                  code: "IWGAWNCNP"
              }, {
                  code: "ZEFJAZJSN"
              }, {
                  code: "IHGFBFTPB"
              }, {
                  code: "CJMVQNIIE"
              }, {
                  code: "SGAPBVZQS"
              }, {
                  code: "BUTUSYCWQ"
              }, {
                  code: "FXCNVDJTJ"
              }, {
                  code: "XQTSGSUVS"
              },
              {
                  code: "DGNLHGICZ"
              }, {
                  code: "TMBDALLRE"
              }, {
                  code: "GIIIWPYPP"
              }, {
                  code: "ADPKJZJNQ"
              }, {
                  code: "FBNLXYBVS"
              }, {
                  code: "CJNUXGQUI"
              }, {
                  code: "HTWAWKCQS"
              }, {
                  code: "UKHEPJNAH"
              }, {
                  code: "KQDULEAZT"
              }, {
                  code: "ZVJHKYCJT"
              },
              {
                  code: "ZDUNPNEUK"
              }, {
                  code: "OUZVMITHD"
              }, {
                  code: "JJTERNRMT"
              }, {
                  code: "FCEJYBQJG"
              }, {
                  code: "HPGIJEKJG"
              }, {
                  code: "DODKLUPNS"
              }, {
                  code: "AXPPEQKXQ"
              }, {
                  code: "EGBWFFJAB"
              }, {
                  code: "OHMHWCLAQ"
              }, {
                  code: "GQADXLYNR"
              },
              {
                  code: "FHEKOEOID"
              }, {
                  code: "AEEQJVBAK"
              }, {
                  code: "XKESSPWPM"
              }, {
                  code: "PHWFPPPQR"
              }, {
                  code: "ALFKFSPXV"
              }, {
                  code: "YQNMJAZOW"
              }, {
                  code: "PQEHHZACH"
              }, {
                  code: "GMVKNJWQK"
              }, {
                  code: "KPHYIJYVB"
              }, {
                  code: "RZTOARPMU"
              },
              {
                  code: "JHKWKOIYA"
              }, {
                  code: "QRDEEKPOL"
              }, {
                  code: "IDDKLTHTE"
              }, {
                  code: "FCSWHCPAV"
              }, {
                  code: "CWPYEIWFI"
              }, {
                  code: "KHWSHIPEW"
              }, {
                  code: "YWHZHUPKQ"
              }, {
                  code: "VYKXKMSYB"
              }, {
                  code: "NDNHDIVWX"
              }, {
                  code: "INJSHEMRQ"
              },
              {
                  code: "YUPJKKDKJ"
              }, {
                  code: "LPELPSLWF"
              }, {
                  code: "OGFGQNDVE"
              }, {
                  code: "OSQCYXTEX"
              }, {
                  code: "GUTXYSSSR"
              }, {
                  code: "TGQHXJYAH"
              }, {
                  code: "VMFPHQBDD"
              }, {
                  code: "GHHKPQBZJ"
              }, {
                  code: "JKAJXTDLX"
              }, {
                  code: "JPYBQEZWO"
              },
              {
                  code: "LRCHKHCVH"
              }, {
                  code: "DSXOYGDTG"
              }, {
                  code: "GTALHVSIE"
              }, {
                  code: "QIQEFHSEA"
              }, {
                  code: "LFKJYBLPK"
              }, {
                  code: "CZWWQNOTE"
              }, {
                  code: "YWYYXRQST"
              }, {
                  code: "SRSTSRTGU"
              }, {
                  code: "FNHVOHHOW"
              }, {
                  code: "DZLXCFKNQ"
              },
              {
                  code: "RCWZCAWGQ"
              }, {
                  code: "MCLFOZIZV"
              }, {
                  code: "GLYGMJIUH"
              }, {
                  code: "DKDJPGXZQ"
              }, {
                  code: "CVXTMYPSD"
              }, {
                  code: "XYFXGXRRE"
              }, {
                  code: "KVZANEYEG"
              }, {
                  code: "CCQYSWVZZ"
              }, {
                  code: "FXESSOBJL"
              }, {
                  code: "JLKBMAGZG"
              },
              {
                  code: "HWLCJSHAS"
              }, {
                  code: "QXZDBIWOR"
              }, {
                  code: "DFIXFLWNG"
              }, {
                  code: "PPNHEKPFV"
              }, {
                  code: "SUESRNOHH"
              }, {
                  code: "OYVZHOLWB"
              }, {
                  code: "JFEHTMPNZ"
              }, {
                  code: "ETDUBEXDA"
              }, {
                  code: "JOTUOZEWN"
              }, {
                  code: "HQOSQPCQY"
              },
              {
                  code: "NFOASLVGG"
              }, {
                  code: "HHUFAWQYD"
              }, {
                  code: "PPBUYFBLX"
              }, {
                  code: "NRIAHNCCV"
              }, {
                  code: "AMNIFHSVP"
              }, {
                  code: "HISIVEFPX"
              }, {
                  code: "BMYASRMGT"
              }, {
                  code: "STGFCCVKD"
              }, {
                  code: "POGFWLJLV"
              }, {
                  code: "CULWJGMVE"
              },
              {
                  code: "RKLPWQJJZ"
              }, {
                  code: "QXLYPCMYP"
              }, {
                  code: "MRTYVKXVO"
              }, {
                  code: "PXVYJYUBK"
              }, {
                  code: "PGLXLJCRE"
              }, {
                  code: "RIGIQXYSY"
              }, {
                  code: "WKYSHJCVU"
              }, {
                  code: "VSHMTZNMX"
              }, {
                  code: "DPMDVHEHY"
              }, {
                  code: "VFPKDKLGN"
              },
              {
                  code: "BNFEHLDZT"
              }, {
                  code: "MWWENRHCF"
              }, {
                  code: "ZKQKCVYWJ"
              }, {
                  code: "KMKAFQAPE"
              }, {
                  code: "RLDYEINDR"
              }, {
                  code: "SISXRKIHT"
              }, {
                  code: "UQJVZKMNJ"
              }, {
                  code: "WBCUZUJDC"
              }, {
                  code: "IPGZZLTQR"
              }, {
                  code: "QVECOGOQF"
              },
              {
                  code: "AJZRCHCKQ"
              }, {
                  code: "LZUIJCUBG"
              }, {
                  code: "NNULBUQCW"
              }, {
                  code: "SIYFGOZNZ"
              }, {
                  code: "VGDHOCKRT"
              }, {
                  code: "VZECOASDH"
              }, {
                  code: "WVRXMZPEB"
              }, {
                  code: "BKXNGGQEM"
              }, {
                  code: "TZRWRDYHJ"
              }, {
                  code: "AIJGZWXRG"
              },
              {
                  code: "IXRHCVCAL"
              }, {
                  code: "CRMQYTQDH"
              }, {
                  code: "BDIMXTARR"
              }, {
                  code: "AGYDOSPAK"
              }, {
                  code: "PFXTVXZSX"
              }, {
                  code: "RVVGBQZER"
              }, {
                  code: "HQHSKKVNT"
              }, {
                  code: "UCDXMTJMX"
              }, {
                  code: "AYKMXKTRV"
              }, {
                  code: "DLEIGCPRR"
              },
              {
                  code: "NVFULEABU"
              }, {
                  code: "MKMEHTSAX"
              }, {
                  code: "FEPIDZQYT"
              }, {
                  code: "ROMDIPAVC"
              }, {
                  code: "HBANKRQAE"
              }, {
                  code: "LXWRFYOIQ"
              }, {
                  code: "PVDMWXTAE"
              }, {
                  code: "BYRJBHWCW"
              }, {
                  code: "WAYXRDFLR"
              }, {
                  code: "QTNJBGUBF"
              },
              {
                  code: "MESXDLLIE"
              }, {
                  code: "GSOUNVJNJ"
              }, {
                  code: "GRVVFSOGI"
              }, {
                  code: "KHWNGGKNG"
              }, {
                  code: "TRELBCYIH"
              }, {
                  code: "TPRIGKTVA"
              }, {
                  code: "YDDEJKQHX"
              }, {
                  code: "NJNZNSCWG"
              }, {
                  code: "RZSJPAKBD"
              }, {
                  code: "CTAPEJZNQ"
              },
              {
                  code: "EJFXMKVHG"
              }, {
                  code: "IYWBJYDVP"
              }, {
                  code: "VPNWTUQTK"
              }, {
                  code: "WDUSEWEDY"
              }, {
                  code: "NXJPXPFSS"
              }, {
                  code: "QNGOHCRQV"
              }, {
                  code: "ZTNTECXQM"
              }, {
                  code: "AKVVVQXNW"
              }, {
                  code: "QVEIQGLFV"
              }, {
                  code: "FNOQRCYTT"
              },
              {
                  code: "EFFGOMAIO"
              }, {
                  code: "PTGBBSDRZ"
              }, {
                  code: "GQBSRHGOJ"
              }, {
                  code: "IBPHOSSOP"
              }, {
                  code: "CSGRMEKEO"
              }, {
                  code: "YYESYSTMO"
              }, {
                  code: "DGPHYFSPU"
              }, {
                  code: "BKVDSFMBP"
              }, {
                  code: "FMWUCIEBF"
              }, {
                  code: "AKBINXRPB"
              },
              {
                  code: "NPUFNSFED"
              }, {
                  code: "UEDKLRLJM"
              }, {
                  code: "QTSKXPXEV"
              }, {
                  code: "HJIYBASWU"
              }, {
                  code: "XRDPMXVNS"
              }, {
                  code: "KRYVGIWXB"
              }, {
                  code: "PDETGGPAK"
              }, {
                  code: "TRAYVZVUM"
              }, {
                  code: "BOQGTZMIC"
              }, {
                  code: "GOGGLLVVY"
              },
              {
                  code: "YUYELQEVP"
              }, {
                  code: "BTANXOVMG"
              }, {
                  code: "JOAVILILU"
              }, {
                  code: "TCHHAXBEJ"
              }, {
                  code: "KAFHIINTI"
              }, {
                  code: "WSNJRZUIQ"
              }, {
                  code: "TBQZMEYWG"
              }, {
                  code: "UPXFWRFQH"
              }, {
                  code: "JEPJWJZSJ"
              }, {
                  code: "QMWEWVVGC"
              },
              {
                  code: "RCZYSVSMR"
              }, {
                  code: "ZHCZQCSWB"
              }, {
                  code: "IGICAAALI"
              }, {
                  code: "LDMYZHQFY"
              }, {
                  code: "JXDIJAQRR"
              }, {
                  code: "WSBTZKQNP"
              }, {
                  code: "WNCCQBTZM"
              }, {
                  code: "ZWRBBQHWG"
              }, {
                  code: "JNEAQNONU"
              }, {
                  code: "XZYLRXOWE"
              },
              {
                  code: "UDUDWQZES"
              }, {
                  code: "TDMQVRDTI"
              }, {
                  code: "CVYHIPSDZ"
              }, {
                  code: "NBCWHCEQU"
              }, {
                  code: "BMFMFIEZV"
              }, {
                  code: "CAKGNMMYT"
              }, {
                  code: "FNRHXFBPG"
              }, {
                  code: "UAAKXZZNH"
              }, {
                  code: "COHVLSRYZ"
              }, {
                  code: "MVHZCDJLV"
              },
              {
                  code: "NGCXTSITQ"
              }, {
                  code: "QMPHHHYQW"
              }, {
                  code: "KMMNFCIQW"
              }, {
                  code: "OTXDBLGDK"
              }, {
                  code: "INNVVFYQZ"
              }, {
                  code: "HZEKZRRVA"
              }, {
                  code: "KGJDWJYPP"
              }, {
                  code: "DXGZQXVKD"
              }, {
                  code: "CMJMTDWUP"
              }, {
                  code: "BXEMNFXVF"
              },
              {
                  code: "JCUMCQHJD"
              }, {
                  code: "LKVWNVFRY"
              }, {
                  code: "MCVWGYSID"
              }, {
                  code: "WNTSAUQQM"
              }, {
                  code: "SIVQHPQHT"
              }, {
                  code: "KJNNMLUAC"
              }, {
                  code: "NJSDDAZVA"
              }, {
                  code: "GAPFRXKZA"
              }, {
                  code: "JMAODADLZ"
              }, {
                  code: "YODQYIZZV"
              },
              {
                  code: "KHQUWGYPX"
              }, {
                  code: "UXYYMVFZG"
              }, {
                  code: "ZGPUVCPPP"
              }, {
                  code: "GQYDSRUCI"
              }, {
                  code: "TWLNMQGNO"
              }, {
                  code: "YTNBMXGFH"
              }, {
                  code: "XCJYFHSHW"
              }, {
                  code: "MSWDZXDDD"
              }, {
                  code: "QHGLLXDVU"
              }, {
                  code: "EXICYAHJB"
              },
              {
                  code: "MCUNPPAMM"
              }, {
                  code: "CXDPBLCVP"
              }, {
                  code: "UNJCHEOSJ"
              }, {
                  code: "FSSFXTRQH"
              }, {
                  code: "YJZYEJWGO"
              }, {
                  code: "MZMCXRCBQ"
              }, {
                  code: "PEEEDBPTH"
              }, {
                  code: "SCJMCSHQW"
              }, {
                  code: "NLOCGVJZR"
              }, {
                  code: "WLOBSXTFF"
              },
              {
                  code: "RHKMKNVYE"
              }, {
                  code: "HXDSDTDDG"
              }, {
                  code: "GVMRYWVRN"
              }, {
                  code: "RLVJYAAGO"
              }, {
                  code: "JEJQLFMNR"
              }, {
                  code: "CAQDZJPZV"
              }, {
                  code: "SGYVSEJXK"
              }, {
                  code: "HBXPPSPBQ"
              }, {
                  code: "ROZDHFQJT"
              }, {
                  code: "IWGENXYEL"
              },
              {
                  code: "TKLMSXKYL"
              }, {
                  code: "TQDFLELHI"
              }, {
                  code: "VIQALSPRZ"
              }, {
                  code: "BNQBOEWZQ"
              }, {
                  code: "JZHWIRWPN"
              }, {
                  code: "TAFAHJIAA"
              }, {
                  code: "SMYURGSRV"
              }, {
                  code: "ADRATEDWH"
              }, {
                  code: "ENZUPTCSP"
              }, {
                  code: "NMOGLWFTM"
              },
              {
                  code: "PJGJIYPTY"
              }, {
                  code: "ZDGCYCCEP"
              }, {
                  code: "TQTCVCIKC"
              }, {
                  code: "FUOMFRJBZ"
              }, {
                  code: "VTWCYESKB"
              }, {
                  code: "UTXILOOPN"
              }, {
                  code: "RNGFHEDMM"
              }, {
                  code: "XQSDEAAXX"
              }, {
                  code: "GRIQGZVEA"
              }, {
                  code: "HNNCYGWUU"
              },
              {
                  code: "ZQCSCQMFI"
              }, {
                  code: "NFTGXTQEE"
              }, {
                  code: "YVVJWYSPA"
              }, {
                  code: "JVYGILZMY"
              }, {
                  code: "IHPPSABQD"
              }, {
                  code: "CNGILQMKQ"
              }, {
                  code: "GXATJCMVU"
              }, {
                  code: "ZJNRNFVSP"
              }, {
                  code: "UTGAHQFKU"
              }, {
                  code: "PMOFIRWDM"
              },
              {
                  code: "ULVOCXSFL"
              }, {
                  code: "JPTEYKOVH"
              }, {
                  code: "RCVVLZQYQ"
              }, {
                  code: "PIOAJJDWX"
              }, {
                  code: "MDTDZDLDQ"
              }, {
                  code: "UGVQWNNKA"
              }, {
                  code: "YYNAVVCDZ"
              }, {
                  code: "HMOSCTZGC"
              }, {
                  code: "ETDFKLTXQ"
              }, {
                  code: "IOGUFRKTJ"
              },
              {
                  code: "EVDSXAHKQ"
              }, {
                  code: "ABWIQGBZM"
              }, {
                  code: "ZEHBKHNOE"
              }, {
                  code: "NSZTTXBNG"
              }, {
                  code: "AQLFLZYEL"
              }, {
                  code: "LYNKNAIKV"
              }, {
                  code: "XBYBQRDEZ"
              }, {
                  code: "GDCKCIGUD"
              }, {
                  code: "LZNSARPOV"
              }, {
                  code: "IUUTVMHCG"
              },
              {
                  code: "FOQHPNFUH"
              }, {
                  code: "QZSZVETZD"
              }, {
                  code: "LBZLHPAPP"
              }, {
                  code: "HTURLTAWF"
              }, {
                  code: "JMEWXSZKK"
              }, {
                  code: "CXSKOXGNK"
              }, {
                  code: "FDZVHJVPF"
              }, {
                  code: "FLCNGCIPM"
              }, {
                  code: "BMLSOTBOI"
              }, {
                  code: "ANXGMDJSN"
              },
              {
                  code: "EVHTNMKEV"
              }, {
                  code: "OLNQQKIYJ"
              }, {
                  code: "ZIAVZNTHF"
              }, {
                  code: "CEAIRJWDY"
              }, {
                  code: "FWBQGWVBP"
              }, {
                  code: "EBVBRGEXP"
              }, {
                  code: "UZHTCGPTF"
              }, {
                  code: "VCVOXVVXY"
              }, {
                  code: "ITFLLNFBK"
              }, {
                  code: "GUTIWKVNI"
              },
              {
                  code: "HGLXLGTOZ"
              }, {
                  code: "MXOTHADZK"
              }, {
                  code: "ZAVGLDKDQ"
              }, {
                  code: "XPODIPQBT"
              }, {
                  code: "JLDXTRIOI"
              }, {
                  code: "DJCEEPKHL"
              }, {
                  code: "BXNMEFBKB"
              }, {
                  code: "QTNHVYDJV"
              }, {
                  code: "OJTFVCDXM"
              }, {
                  code: "GUPKSTAMC"
              },
              {
                  code: "PCJVQDJZQ"
              }, {
                  code: "OZNOBCSWU"
              }, {
                  code: "FTGPOEPNB"
              }, {
                  code: "TJPWDNYNU"
              }, {
                  code: "RUOMYPXJI"
              }, {
                  code: "KDHZKGEKC"
              }, {
                  code: "ZNDDBXMDC"
              }, {
                  code: "OMNIYMQLH"
              }, {
                  code: "TQBBSLSLD"
              }, {
                  code: "GUUHTGTOJ"
              },
              {
                  code: "MFCCCJJAO"
              }, {
                  code: "BWDKRMZPT"
              }, {
                  code: "GQVDXJFRJ"
              }, {
                  code: "MLBYURTIA"
              }, {
                  code: "TOZHNEGAF"
              }, {
                  code: "MOZYXSXYG"
              }, {
                  code: "UUEZFZTAD"
              }, {
                  code: "VTBWGGPGU"
              }, {
                  code: "MURQKFMLY"
              }, {
                  code: "OIPFCXSUS"
              },
              {
                  code: "BMSZPGQBT"
              }, {
                  code: "EBYATLQFZ"
              }, {
                  code: "FBZVLHYFT"
              }, {
                  code: "LQXPNQHFJ"
              }, {
                  code: "XWTSLFOTJ"
              }, {
                  code: "VKHJCXSIA"
              }, {
                  code: "DSDQJEMHW"
              }, {
                  code: "OBHXJWNIE"
              }, {
                  code: "VABCTSWWP"
              }, {
                  code: "CFXLYJUTB"
              },
              {
                  code: "WRDYPCHNQ"
              }, {
                  code: "FSREKDZYS"
              }, {
                  code: "LJVEGKURA"
              }, {
                  code: "JVJTVBLWE"
              }, {
                  code: "RYEPUUUKV"
              }, {
                  code: "SPOUHFJDW"
              }, {
                  code: "DAGCZXRRS"
              }, {
                  code: "FCXAEDGJF"
              }, {
                  code: "ODBBBLYES"
              }, {
                  code: "ESBVWWLIV"
              },
              {
                  code: "NDQDELLLC"
              }, {
                  code: "BSEPYLJIQ"
              }, {
                  code: "AUWGEAIMD"
              }, {
                  code: "KCMYBFSHP"
              }, {
                  code: "VCITOGGQK"
              }, {
                  code: "RMQCMPZMS"
              }, {
                  code: "VHFFXPZPJ"
              }, {
                  code: "UZKZYIRMN"
              }, {
                  code: "YMIZUXRNR"
              }, {
                  code: "JNDDACWCO"
              },
              {
                  code: "BDJKNKOPP"
              }, {
                  code: "ZGTJEUAYM"
              }, {
                  code: "TCXUHHAKC"
              }, {
                  code: "GBQJJHPPY"
              }, {
                  code: "UORZOPQTN"
              }, {
                  code: "WNISGMMKB"
              }, {
                  code: "HJPMYMDEP"
              }, {
                  code: "MBFWYZOXW"
              }, {
                  code: "MPJFYLHTI"
              }, {
                  code: "OMEMPICOZ"
              },
              {
                  code: "AAUOCIBRP"
              }, {
                  code: "VFJZEFZON"
              }, {
                  code: "IZYVVTYYP"
              }, {
                  code: "SLIZZUAOG"
              }, {
                  code: "TYRADMNZR"
              }, {
                  code: "YVYCIKEAZ"
              }, {
                  code: "UXHZPAZWR"
              }, {
                  code: "YYMTAOQVQ"
              }, {
                  code: "EVVPKUHTI"
              }, {
                  code: "HVAPBVVMN"
              },
              {
                  code: "KHNNJSORU"
              }, {
                  code: "JGNOYICIG"
              }, {
                  code: "JHPTSKGJO"
              }, {
                  code: "QZCVGOIMM"
              }, {
                  code: "QKPDLOVPD"
              }, {
                  code: "FARKWZDVZ"
              }, {
                  code: "CJFRVUJFY"
              }, {
                  code: "CANOJHHQP"
              }, {
                  code: "DPJNEXRMC"
              }, {
                  code: "QDKGVZFKN"
              },
              {
                  code: "FAAUPILPR"
              }, {
                  code: "LTOJACGDD"
              }, {
                  code: "MWXRBARLN"
              }, {
                  code: "OKMEJZWBE"
              }, {
                  code: "YJXRMVIBH"
              }, {
                  code: "LDYGLTHEL"
              }, {
                  code: "ESWYSUYYT"
              }, {
                  code: "PPMSCEKQH"
              }, {
                  code: "AAXPCWJEV"
              }, {
                  code: "QZPSLZCVU"
              },
              {
                  code: "MVOJDOHVH"
              }, {
                  code: "CJQYPHGLU"
              }, {
                  code: "UEQZZDRLT"
              }, {
                  code: "YSHDZTCQS"
              }, {
                  code: "QQISNGPSJ"
              }, {
                  code: "BTMJTDJSS"
              }, {
                  code: "GPWESFUHT"
              }, {
                  code: "NTAUWNRZV"
              }, {
                  code: "YMNUVDLHO"
              }, {
                  code: "VNHMMHJRC"
              },
              {
                  code: "KRMFXICCO"
              }, {
                  code: "EQMVJNMBB"
              }, {
                  code: "MTHTELOCH"
              }, {
                  code: "DNDPGYETK"
              }, {
                  code: "ELWMLQBVG"
              }, {
                  code: "POXJBWEPO"
              }, {
                  code: "WEYAVEWCU"
              }, {
                  code: "SIIXHYXGB"
              }, {
                  code: "IKSOCFUZO"
              }, {
                  code: "ZAGLGQQMM"
              },
              {
                  code: "FPQXDYUMY"
              }, {
                  code: "PWHTCVPAM"
              }, {
                  code: "ATWICGLIB"
              }, {
                  code: "SODDHJMIQ"
              }, {
                  code: "XWYAIECEH"
              }, {
                  code: "GNYPUHQML"
              }, {
                  code: "JFRGCDKFR"
              }, {
                  code: "YJTYVWKWS"
              }, {
                  code: "LHSEPDJIX"
              }, {
                  code: "WXRQZHCQM"
              },
              {
                  code: "DZEROMSGP"
              }, {
                  code: "JMBODIHEK"
              }, {
                  code: "QDZEBBKJO"
              }, {
                  code: "UCKJTSHMM"
              }, {
                  code: "JABMPEFPZ"
              }, {
                  code: "RBPZJBTVZ"
              }, {
                  code: "QVASZFNMU"
              }, {
                  code: "BOZPQOQEA"
              }, {
                  code: "WUNOYBYDM"
              }, {
                  code: "HXXXNHBKM"
              },
              {
                  code: "ARJWCNBSZ"
              }, {
                  code: "GNZJOGXEJ"
              }, {
                  code: "OKRPDGQWY"
              }, {
                  code: "HBYQJGRCR"
              }, {
                  code: "IEWDHUXOT"
              }, {
                  code: "RADPIVUBT"
              }, {
                  code: "RCJJUDHEY"
              }, {
                  code: "JZYEZUPZM"
              }, {
                  code: "MYRCQDNFN"
              }, {
                  code: "YHJZMKVTL"
              },
              {
                  code: "SADSMPUAY"
              }, {
                  code: "AGYMVJJNZ"
              }, {
                  code: "SKCRELSIK"
              }, {
                  code: "SINEXZJAD"
              }, {
                  code: "WYXLGOBMQ"
              }, {
                  code: "GUJNEVSRD"
              }, {
                  code: "QSMPWPTTH"
              }, {
                  code: "KAPLJBNLC"
              }, {
                  code: "WLDMTDJCV"
              }, {
                  code: "OQCIWCIFB"
              },
              {
                  code: "WRYPSXWKJ"
              }, {
                  code: "ZHXZTZDOL"
              }, {
                  code: "BDTBNBNTX"
              }, {
                  code: "YWWDPGGAA"
              }, {
                  code: "QWULTXVIG"
              }, {
                  code: "PTNCZOHRL"
              }, {
                  code: "SSSUGZDEW"
              }, {
                  code: "MWOJBRJGH"
              }, {
                  code: "XTUIBASKH"
              }, {
                  code: "HEVBJHVDQ"
              },
              {
                  code: "QNHADQVRV"
              }, {
                  code: "KLLAQMYWL"
              }, {
                  code: "KBKRRLWWS"
              }, {
                  code: "DWJRBNOMP"
              }, {
                  code: "YELXHRWAS"
              }, {
                  code: "QDBXTJFEM"
              }, {
                  code: "HCFWEQTGA"
              }, {
                  code: "KMNCSLCLX"
              }, {
                  code: "HYPXIWDEO"
              }, {
                  code: "AJDSNQZJI"
              },
              {
                  code: "ZVEKTNPGB"
              }, {
                  code: "UERMMWLGH"
              }, {
                  code: "PRPCVYGSL"
              }, {
                  code: "RUBZTHFNA"
              }, {
                  code: "XTDOGNGGY"
              }, {
                  code: "RYADSVWBP"
              }, {
                  code: "SAPZWXPAM"
              }, {
                  code: "PTXHUMANG"
              }, {
                  code: "DEEZNDVKX"
              }, {
                  code: "YPZAVOSTR"
              },
              {
                  code: "DKIAUYBKV"
              }, {
                  code: "GBVPKUACH"
              }, {
                  code: "IHADZLENR"
              }, {
                  code: "MOILIHDPI"
              }, {
                  code: "SFKOHSYEQ"
              }, {
                  code: "CPRJVSRTL"
              }, {
                  code: "ZSJHMCQBZ"
              }, {
                  code: "TXVZJHWGM"
              }, {
                  code: "OQSVQQMRP"
              }, {
                  code: "PBCHSIMQJ"
              },
              {
                  code: "KRGGUKJFZ"
              }, {
                  code: "SHYBTATOQ"
              }, {
                  code: "ZCLKBVIHS"
              }, {
                  code: "ZYMUBHIXH"
              }, {
                  code: "KCLDNWKZM"
              }, {
                  code: "RCNBWUDJF"
              }, {
                  code: "SRGQUAQDW"
              }, {
                  code: "WOWOOCJYZ"
              }, {
                  code: "PFGNYGAXH"
              }, {
                  code: "JAJQJQZXE"
              },
              {
                  code: "AHNLBJIYY"
              }, {
                  code: "HPXVNXEMX"
              }, {
                  code: "ROXILLDUV"
              }, {
                  code: "HFQNAWIRE"
              }, {
                  code: "KKOFYNPSM"
              }, {
                  code: "GMKNIOBQU"
              }, {
                  code: "ZAEPUEKKY"
              }, {
                  code: "BIIOJEAHB"
              }, {
                  code: "QQHVWKTCB"
              }, {
                  code: "KOWSFSTGC"
              },
              {
                  code: "CKGSISSQU"
              }, {
                  code: "AYHMSBTLW"
              }, {
                  code: "JUWRROQMO"
              }, {
                  code: "WSCLJOELQ"
              }, {
                  code: "MWCCOSEGD"
              }, {
                  code: "XJRBKZKDO"
              }, {
                  code: "BVUWKHNCF"
              }, {
                  code: "ROEVDDZJV"
              }, {
                  code: "NJSURCWVG"
              }, {
                  code: "BOLTYBDYW"
              },
              {
                  code: "VVMAFHAPI"
              }, {
                  code: "WTNXHRZTF"
              }, {
                  code: "KOIMBSNTQ"
              }, {
                  code: "FQQAJIYYY"
              }, {
                  code: "VGGIADDQQ"
              }, {
                  code: "GYEUPIELX"
              }, {
                  code: "HEMJGSYCA"
              }, {
                  code: "CDDOIDZWU"
              }, {
                  code: "KUSQDMBOI"
              }, {
                  code: "NKBNZQXBW"
              },
              {
                  code: "MXLTRAZEO"
              }, {
                  code: "TMKNCLKQE"
              }, {
                  code: "RJAZYFBAS"
              }, {
                  code: "EFPNBOAHU"
              }, {
                  code: "NRMEOJXVG"
              }, {
                  code: "UYFBFOLYU"
              }, {
                  code: "HRCARYHWP"
              }, {
                  code: "FACWKUBFT"
              }, {
                  code: "YLIBCVEHF"
              }, {
                  code: "OBNRGBAPA"
              },
              {
                  code: "UOJCADQQE"
              }, {
                  code: "AMWXWIDDF"
              }, {
                  code: "DZYDVQOAA"
              }, {
                  code: "DRIFGNICK"
              }, {
                  code: "FIRCYFZKA"
              }, {
                  code: "XCMMKVXCG"
              }, {
                  code: "MYRAWDZHP"
              }, {
                  code: "YXDSFBQLM"
              }, {
                  code: "YCHDSWIOO"
              }, {
                  code: "QTCKBLKMY"
              },
              {
                  code: "KCBXAARZR"
              }, {
                  code: "TEFXQUEQY"
              }, {
                  code: "EYDVUTOGZ"
              }, {
                  code: "XLJVMDBJF"
              }, {
                  code: "NTESWVHOV"
              }, {
                  code: "UMHJVGETC"
              }, {
                  code: "CESVMRGZW"
              }, {
                  code: "MUFPICZBL"
              }, {
                  code: "DDXARSGXE"
              }, {
                  code: "YKPWLRYAR"
              },
              {
                  code: "LNFTWQPNF"
              }, {
                  code: "OOQJMODWG"
              }, {
                  code: "MKZTFJMCV"
              }, {
                  code: "MGEYVNVRF"
              }, {
                  code: "RBDUUWSKG"
              }, {
                  code: "BMMLAIVME"
              }, {
                  code: "RMBDXKGDG"
              }, {
                  code: "NOUJWIWTH"
              }, {
                  code: "QWDYNSUEH"
              }, {
                  code: "KEJMNESRC"
              },
              {
                  code: "JRQCXMTZK"
              }, {
                  code: "DSXJDSRGB"
              }, {
                  code: "ZENCPKYVG"
              }, {
                  code: "YTVCKTFCS"
              }, {
                  code: "FDTDBKPOY"
              }, {
                  code: "QUZLDWFAW"
              }, {
                  code: "THXFWCCGV"
              }, {
                  code: "DHAFVKPFT"
              }, {
                  code: "BYYGJWOMX"
              }, {
                  code: "NNEZMRWNP"
              },
              {
                  code: "PKZEDSEBW"
              }, {
                  code: "NATHXQWYW"
              }, {
                  code: "UTWOTTJYM"
              }, {
                  code: "UFVFETRHB"
              }, {
                  code: "VFQCPRZNN"
              }, {
                  code: "PMHJSUSRL"
              }, {
                  code: "EAHFQPCXY"
              }, {
                  code: "WDZHARVPZ"
              }, {
                  code: "QKIVTPUBG"
              }, {
                  code: "JFQIBJTNF"
              },
              {
                  code: "JMZAMXBYX"
              }, {
                  code: "HVLXWDCAF"
              }, {
                  code: "EHMBTLJAC"
              }, {
                  code: "ZXNTMVPEO"
              }, {
                  code: "KUTROFQCO"
              }, {
                  code: "ABVXGXLVI"
              }, {
                  code: "QMPTCRXHE"
              }, {
                  code: "WFNVAVIVJ"
              }, {
                  code: "XFNOOCBGT"
              }, {
                  code: "KPSGZQYVO"
              },
              {
                  code: "YGNAGCJSF"
              }, {
                  code: "BIDQJCIPG"
              }, {
                  code: "AMEPTHXJF"
              }, {
                  code: "HFKEDUGYR"
              }, {
                  code: "ZNEXOLICW"
              }, {
                  code: "BSIKAETSQ"
              }, {
                  code: "KCRKHNDVD"
              }, {
                  code: "HQVQUJMUI"
              }, {
                  code: "QAIQHWOCK"
              }, {
                  code: "ETGFSQDXX"
              },
              {
                  code: "PCDSAHUBU"
              }, {
                  code: "WBOOESHWW"
              }, {
                  code: "MNXZQADCA"
              }, {
                  code: "KDMXPWXNQ"
              }, {
                  code: "YXQAAYEBL"
              }, {
                  code: "CSJLVELBZ"
              }, {
                  code: "ZDMPMBFFH"
              }, {
                  code: "NAHUBPXJC"
              }, {
                  code: "NWHISBPFK"
              }, {
                  code: "EEFMEKZOD"
              },
              {
                  code: "XGTIPCNUH"
              }, {
                  code: "EMWVKQNBJ"
              }, {
                  code: "YOFCVPVNR"
              }, {
                  code: "UWCNKSOVM"
              }, {
                  code: "FINFERTNF"
              }, {
                  code: "JBTDAVTYF"
              }, {
                  code: "DXKXSXDEX"
              }, {
                  code: "TYQWXCBRX"
              }, {
                  code: "DBNCMTADQ"
              }, {
                  code: "EQBGUYLOR"
              },
              {
                  code: "YEFPNJZKT"
              }, {
                  code: "UGULSVDBN"
              }, {
                  code: "IFFFROJAI"
              }, {
                  code: "TNTZEOUBN"
              }, {
                  code: "EHYHKIVOK"
              }, {
                  code: "VAEBKFQKM"
              }, {
                  code: "WKAAERJND"
              }, {
                  code: "DRCCZOFNV"
              }, {
                  code: "JHBLIOECR"
              }, {
                  code: "WKIHVIUEW"
              },
              {
                  code: "XBSFOHHYK"
              }, {
                  code: "XNJRRAGHH"
              }, {
                  code: "WUKJDNECY"
              }, {
                  code: "HZZGFORQE"
              }, {
                  code: "OFTKMWVNL"
              }, {
                  code: "EINXBDGCO"
              }, {
                  code: "SRSHJZNRM"
              }, {
                  code: "EQCJRDWOT"
              }, {
                  code: "RYAPBTGSQ"
              }, {
                  code: "CVXGAHKMP"
              },
          ];
          let codigo_input = document.getElementById("codigo_input").value;
          console.log(codigo_input);

          const resultado = array1.find((element) => element.code === codigo_input);
          if (resultado) {
              stepper1.next();
          } else {
              console.log("codigo no valido!!");
          }
          console.log(resultado);
      }
  </script>
</div>
@endsection
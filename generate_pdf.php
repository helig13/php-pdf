<?php
require_once __DIR__ . '/vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = isset($_POST['content']) ? $_POST['content'] : '';

    // Create mPDF instance
    $mpdf = new \Mpdf\Mpdf([
        'fontDir' => __DIR__ . '/fonts/Cooper/', // Correct directory path
        'fontdata' => [
            'cooperhewitt' => [
                'R' => 'CooperHewitt-Light.ttf', // Light font
                'B' => 'CooperHewitt-Bold.ttf', // Bold font
                'I' => 'CooperHewitt-Semibold.ttf', // Bold font
                // Add other font styles as needed
            ],

        ],
    ]);



    // Header and footer content
    $header = '
                <div style="font-family:cooperhewitt;font-weight:lighter;font-size: 35px;color:#003D62;">Zeitraum XXXX</div>
                <div style="font-family:cooperhewitt;font-weight:bold;font-size: 50px;color:#003D62;">Geschäftsführungsbericht</div>
                <div style="font-family:cooperhewitt;font-weight:normal;font-size: 40px;color:#003D62;letter-spacing:1px;">DACHBLECHE24 GMBH</div>
                ';
    $footer = '
                <style>
                    .footer-container {
                        position:fixed;
                        bottom: -60px;
                        left: -60px;
                        width:130%;
                        background:#003D62;
                        height: 200px;
                    }
                    .first-page-footer-content {
                        margin-left: 60px;
                        color: #ffffff;
                        float: left;
                        margin-right: 60px;
                        width: 25%;
                        border-bottom: 5px solid #ffffff;
                        padding-bottom: 20px;
                        font-family:cooperhewitt;
                        font-weight:400;
                        font-size: 18px;
                        letter-spacing: 1px;
                        line-height: 24px;
                    }
                </style>    
                <div class="footer-container">
                    <div class="first-page-footer-content">
                        <div>dachbleche24 GmbH</div>
                        <div>Mahlerstraße 23a</div>
                        <div>16269 Wriezen</div>
                    </div>
                    <div class="first-page-footer-content" style="margin-top: 50px;">
                        <span>info@dachbleche24.de</span>
                    </div>
                </div>
               ';

    // Generate HTML content with dynamic styling
    $body = '
              <style>   
                .first-page-body {
                    background: #003D62;
                    margin-top: 80px;
                    height: 620px;
                    margin-left: -60px;
                    margin-right: -120px;
                }
              </style>
              <div class="first-page-body">
              </div>
             ';

    $header1 = '
                <style>
                    .header-container {
                        background: #003D62;
                        position: fixed;
                        top: -60px;
                        left: -60px;
                        width: 120%;
                        padding: 25px 0 25px 60px;
                    }
                    .header-title {
                        font-family:cooperhewitt;
                        font-weight: bold;
                        font-size: 58px;
                        color: #ffffff;
                        letter-spacing: 1.5px;
                    }
                </style>
                <div class="header-container">
                    <span class="header-title">Umsatz</span>
                </div> 
               ';
    $headerRentabilitat = '
                <style>
                    .header-container {
                        background: #003D62;
                        position: fixed;
                        top: -60px;
                        left: -60px;
                        width: 120%;
                        padding: 25px 0 25px 60px;
                    }
                    .header-title {
                        font-family:cooperhewitt;
                        font-weight: bold;
                        font-size: 58px;
                        color: #ffffff;
                        letter-spacing: 1.5px;
                    }
                </style>
                <div class="header-container">
                    <span class="header-title">Rentabilität</span>
                </div> 
               ';

    $body1 = '
                <style>
                    .netto-container {
                        padding-top: 200px;
                    }    
                    .netto-title {
                        color: #003D62;
                        font-family:cooperhewitt;
                        font-weight: bold;
                        font-size: 28px;
                        height: 40px;
                        letter-spacing: 1px;
                    }    
                    .netto-text {
                        color: #000000;
                        font-family:cooperhewitt;
                        font-weight: bold;
                        font-size: 16px;
                        padding-top: 10px;
                        max-width: 300px;
                        letter-spacing: 1px;
                    }  
                   
                    .table-container span {
                        color: #000000;
                        font-family:cooperhewitt;
                        font-style: italic;
                        font-size: 22px;
                        letter-spacing: 1px;
                    }
                    .table-container .main-table {
                        margin-top: 10px;
                        border-spacing: 0;
                        border-collapse: collapse;
                        width: 100%;
                    }  
                    .table-container .main-table th {
                        border: 2px solid #000000;
                        border-bottom: none; 
                        padding: 13px 0;
                    }
                    .table-container .main-table td {
                        border: 2px solid #000000;
                        text-align: center; 
                        padding: 13px 0;
                        font-style: italic;
                    }
                </style>
                
                <div class="body-container">
                    <div class="netto-container">
                        <span class="netto-title">1.285.062,89 € netto</span>
                        <div class="netto-text">13,27 %UMSATZWACHSTUM ZUM VORJAHRESMONAT</div>
                    </div> 
                    <div class="table-container">
                        <span>Umsatz nach Produkten</span>
                        <table class="main-table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Wert in €</th>
                                    <th>in %</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>TP18</td>
                                    <td>...</td>
                                    <td>...</td>
                                </tr>
                                <tr>
                                    <td>TP18</td>
                                    <td>...</td>
                                    <td>...</td>
                                </tr>
                                <tr>
                                    <td>TP18</td>
                                    <td>...</td>
                                    <td>...</td>
                                </tr>
                                <tr>
                                    <td>TP18</td>
                                    <td>...</td>
                                    <td>...</td>
                                </tr>
                                <tr>
                                    <td>TP18</td>
                                    <td>...</td>
                                    <td>...</td>
                                </tr> 
                                <tr>
                                    <td>TP18</td>
                                    <td>...</td>
                                    <td>...</td>
                                </tr> 
                                <tr>
                                    <td>TP18</td>
                                    <td>...</td>
                                    <td>...</td>
                                </tr> 
                                <tr>
                                    <td>TP18</td>
                                    <td>...</td>
                                    <td>...</td>
                                </tr> 
                                <tr>
                                    <td>TP18</td>
                                    <td>...</td>
                                    <td>...</td>
                                </tr> 
                                <tr>
                                    <td>TP18</td>
                                    <td>...</td>
                                    <td>...</td>
                                </tr> 
                                <tr>
                                    <td>TP18</td>
                                    <td>...</td>
                                    <td>...</td>
                                </tr> 
                                <tr>
                                    <td>TP18</td>
                                    <td>...</td>
                                    <td>...</td>
                                </tr>    
                            </tbody>
                        </table>
                    </div>          
                </div> 
                
               ';

    $imgcontainer = '   
                        <style>
                            .img-container {
                                position: fixed;
                                right: -100px;
                                top: -30px;
                                width: 280px;
                                height: 330px;
                            }
                        </style>
                        <div class="img-container">
                            <img src="./src/img/pdf_img.png" alt="">
                        </div>
                        
                    ';

    $twoBlocks = '  <style>
                    .diagram-container {
                        width: 100%;
                        text-align: left;
                    }
                    .diagram-container .title {
                        font-family:cooperhewitt;
                        font-size: 24px;
                        letter-spacing: 1px;
                        font-weight: bold;  
                        text-align: center;
                    }
                    .two-blocks {
                        width: 100%;
                        padding-top: 120px;
                    }
                    .first-block {
                        float: left;
                        margin-right: 0;
                        width: 50%;
                    }
                    .total-price-container {
                        background: #003D62;
                        padding: 15px 10px;
                        border-radius: 40px;
                        text-align: center;
                        width: 250px;
                    }
                    .total-price-container .total-price {
                        color: #ffffff;
                        font-family:cooperhewitt;
                        font-style: italic;
                        font-size: 22px;
                        letter-spacing: 1px;
                        padding-bottom: 10px;
                    }
                    .total-price-container .total-price-text {
                        color: #ffffff;
                        font-family:cooperhewitt;
                        font-weight: lighter;
                        font-size: 16px;
                        letter-spacing: 1px;
                    }
                    .privatkunden-total-price-container {
                        width: 100%;
                        padding: 20px 0;
                    }
                    .privatkunden-price,
                    .privatkunden-text {
                        width: 50%;
                        float: left;
                        margin-right: 0;
                    }
                    .privatkunden-price {
                        color: #000000;
                        font-family:cooperhewitt;
                        font-weight: bold;
                        font-size: 18px;
                        letter-spacing: 1px;
                        margin-top: -5px;
                    }
                    .privatkunden-text {
                        line-height: 14px;
                        font-family:cooperhewitt;
                        font-size: 12px;
                        letter-spacing: 1px;
                    }
                </style>     
                <div class="two-blocks">
                    <div class="first-block">
                        <div class="total-price-container">
                            <div class="total-price">742,34 €</div>
                            <div class="total-price-text">durchschnittlicher Warenkorb</div>
                        </div>
                        <div class="privatkunden-total-price-container">
                            <div style="width: 100%; padding-bottom: 10px;">
                                <div class="privatkunden-text">
                                    durchschnittlicher Warenkorb Privatkunden
                                </div>
                                <div class="privatkunden-price">
                                    625,12 €
                                </div>
                            </div>
                            <div style="width: 100%">
                                <div class="privatkunden-text">
                                    durchschnittlicher Warenkorb Privatkunden
                                </div>
                                <div class="privatkunden-price">
                                    1.239,29 €
                                </div>
                            </div>
                        </div>
                        <div class="total-price-container">
                            <div class="total-price">712,72 €</div>
                            <div class="total-price-text">Median Warenkorb</div>
                        </div>
                    </div>
                    <div class="second-block">
                        <div class="diagram-container">
                            <div class="title">Lieferungsquote</div>
                            <div class="diagram">    
                            </div>
                        </div>
                    </div>
                </div>  
             ';

    $footer1 = '
                <style>
                    .footer-container {
                        background: #003D62;
                        position: fixed;
                        bottom: -60px;
                        left: -55px;
                        width: 120%;
                        padding: 20px 0 20px 60px;
                    }
                    .footer-title {
                        font-family:cooperhewitt;
                        font-weight: bold;
                        font-size: 14px;
                        color: #ffffff;
                        letter-spacing: 1.5px;
                    }                
                </style>
                <div class="footer-container">
                    <span class="footer-title">Geschäftsführungsbericht</span>
                </div>
               ';
    $table = '
                <style>
                    .body-container {
                        width: 100%;
                        padding-top: 120px;
                    }
                    .table-container span {
                        color: #000000;
                        font-family:cooperhewitt;
                        font-style: italic;
                        font-size: 22px;
                        letter-spacing: 1px;
                    }
                    .table-container .main-table {
                        margin-top: 10px;
                        border-spacing: 0px;
                        border-collapse: collapse;
                        width: 100%;
                    }  
                    .table-container .main-table th {
                        border: 2px solid #000000;
                        border-bottom: none; 
                        padding: 13px 0;
                        color: #000000;
                        font-family:cooperhewitt;
                        font-size: 14px;
                        letter-spacing: 1px;
                        
                    }
                    .table-container .main-table td {
                        border: 2px solid #000000;
                        text-align: center; 
                        padding: 13px 0;
                        font-family:cooperhewitt;
                        font-style: italic;
                    }
                    .table-sub-title {
                        font-family:cooperhewitt;
                        font-style: italic;
                        padding: 10px 0;
                    }
                </style>
                <div class="body-container">
                    <div class="table-container">
                        <span>Umsatz nach Produkten</span>
                        <div class="table-sub-title">Preiskategorie: Gesamt (Diese Übersicht beinhaltet alle Preiskategorien)</div>
                        <table class="main-table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>0-75</th>
                                    <th>76-150</th>
                                    <th>151-250</th>
                                    <th>251-500</th>
                                    <th>>500</th>
                                    <th>Gesamt</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Anzahl Angebote (Stück) </td>
                                    <td>152056</td>
                                    <td>...</td>
                                    <td>...</td>
                                    <td>...</td>
                                    <td>...</td>
                                    <td>...</td>
                                </tr>
                                <tr>
                                    <td>Annahmequote Angebote </td>
                                    <td>...</td>
                                    <td>...</td>
                                    <td>...</td>
                                    <td>...</td>
                                    <td>...</td>
                                    <td>...</td>
                                </tr>
                                <tr>
                                    <td>Anzahl AB´s Gesamt</td>
                                    <td>...</td>
                                    <td>...</td>
                                    <td>...</td>
                                    <td>...</td>
                                    <td>...</td>
                                    <td>...</td>
                                </tr>
                                <tr>
                                    <td>Anzahl AB´s Gesamt</td>
                                    <td>...</td>
                                    <td>...</td>
                                    <td>...</td>
                                    <td>...</td>
                                    <td>...</td>
                                    <td>...</td>
                                </tr>
                                <tr>
                                    <td>Anzahl AB´s Gesamt</td>
                                    <td>...</td>
                                    <td>...</td>
                                    <td>...</td>
                                    <td>...</td>
                                    <td>...</td>
                                    <td>...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
              ';
    $twoDiagrams = '
                    <style>
                        .two-diagrams {
                            width: 100%;
                            padding-top: 120px;
                        }
                        .diagram-container {
                            width: 100%;
                            text-align: left;
                        }
                        .diagram-container .title {
                            font-family:cooperhewitt;
                            font-size: 24px;
                            letter-spacing: 1px;
                            font-weight: bold;  
                            text-align: center;
                        }
                        .diagram-block {
                            float: left;
                            margin-right: 0;
                            width: 50%;
                        }
                    </style>     
                    <div class="two-diagrams">
                        <div class="diagram-block">
                            <div class="diagram-container">
                                <div class="title">Lieferungsquote</div>
                                <div class="diagram">    
                                </div>
                            </div>
                        </div>
                        <div class="diagram-block">
                            <div class="diagram-container">
                                <div class="title">Lieferungsquote</div>
                                <div class="diagram">    
                                </div>
                            </div>
                        </div>
                    </div>
                   ';
    $heatMap = '
                <style>
                    .heatmat-container {
                        width: 100%;
                        margin-top: 20px;
                    }
                    .heatmap-img,
                    .heatmat-text {
                        width: 50%;
                        float: left;
                        margin-right: 0;
                    }
                    .heat-mat-title {
                        font-family:cooperhewitt;
                        font-size: 46px;
                        letter-spacing: 2px;
                        font-weight: bold;
                        color: #003D62;
                        padding-top: 60px;  
                    }
                    .heat-mat-sub-title {
                        font-family:cooperhewitt;
                        font-size: 22px;
                        letter-spacing: 1px;
                        font-weight: bold;
                        color: #000000;
                    }
                    .heat-mat-text {
                        font-family:cooperhewitt;
                        font-size: 16px;
                        font-weight: lighter;
                        line-height: 22px;
                        color: #000000;
                        padding-top: 10px;
                        letter-spacing: 0.5px;
                    }
                    .heatmap-img {
                        padding-left: 10px;
                        width: 48%;
                        margin-right: 0;
                        float: left;
                    }
                    .heatmap-img img {
                        width: 100%;
                    }
                </style>
                <div class="heatmat-container">
                    <div class="heatmat-text">
                       <div class="heat-mat-title">HEATMAP</div> 
                       <div class="heat-mat-sub-title">GESAMTUMSATZ</div> 
                       <div class="heat-mat-text">
                            Hier sind die Bestellungen in Stück ausgewertet.
                            .Rot bedeutet eine hohe Dichte an Bestellungen
                            und grün eine geringe Dichte.
                       </div> 
                    </div>
                    <div class="heatmap-img">
                        <img src="https://db24-baywa-shop.testdrive.redoo.cloud/wp-content/uploads/2014/02/0993-01.jpg" alt="">
                    </div>
                </div>
               ';
    $table2 = '
                <style>
                    .body-container {
                        width: 100%;
                        padding-top: 120px;
                    }
                    .table-container span {
                        color: #000000;
                        font-family:cooperhewitt;
                        font-style: italic;
                        font-size: 22px;
                        letter-spacing: 1px;
                    }
                    .table-container .main-table {
                        margin-top: 10px;
                        border-spacing: 0px;
                        border-collapse: collapse;
                        width: 100%;
                    }  
                    .table-container .main-table th {
                        border: 2px solid #000000;
                        border-bottom: none; 
                        padding: 13px 0;
                        color: #000000;
                        font-family:cooperhewitt;
                        font-size: 14px;
                        letter-spacing: 1px;
                        
                    }
                    .table-container .main-table td {
                        border: 2px solid #000000;
                        text-align: center; 
                        padding: 13px 0;
                        font-family:cooperhewitt;
                        font-style: italic;
                    }
                    .table-sub-title {
                        font-family:cooperhewitt;
                        font-style: italic;
                        padding: 10px 0;
                    }
                </style>
                <div class="body-container">
                    <div class="table-container">
                        <span>UMSATZ PRO MI TARBEI TER</span>
                        <table class="main-table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Anzahl aktiver MA</th>
                                    <th>Umsatz pro MA</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Vertrieb</td>
                                    <td>...</td>
                                    <td>...</td>
                                </tr>
                                <tr>
                                    <td>Logistik</td>
                                    <td>...</td>
                                    <td>...</td>
                                </tr>
                                <tr>
                                    <td>LKW Fahrer</td>
                                    <td>...</td>
                                    <td>...</td>
                                </tr>
                                <tr>
                                    <td>Produktion</td>
                                    <td>...</td>
                                    <td>...</td>
                                </tr>
                                <tr>
                                    <td>Alle Mitarbeiter Gesamt</td>
                                    <td>...</td>
                                    <td>...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
              ';
    $incomingCalls = '
                    <style>
                        .incoming-calls-container {
                            width: 100%;
                            text-align: center;
                        }
                        .incoming-calls-number {
                            font-family:cooperhewitt;
                            font-weight: bold;
                            color: #003D62;
                            font-size: 48px;
                            padding-top: 90px;
                        }
                        .incoming-calls-text {
                            font-family:cooperhewitt;
                            font-weight: bold;
                            color: #000000;
                            font-size: 20px;
                            letter-spacing: 2px;
                        }
                        .average-duration-container {
                            background: #003D62;
                            padding: 15px 10px;
                            border-radius: 40px;
                            text-align: center;
                            width: 250px;
                            margin: 0 auto;
                            margin-top: 30px;
                        }
                        .average-duration-container .average-duration-total {
                            color: #ffffff;
                            font-family:cooperhewitt;
                            font-style: italic;
                            font-size: 22px;
                            letter-spacing: 1px;
                            padding-bottom: 10px;
                        }
                        .average-duration-container .average-duration-text {
                            color: #ffffff;
                            font-family:cooperhewitt;
                            font-weight: lighter;
                            font-size: 16px;
                            letter-spacing: 1px;
                        }
                        
                    </style>
                    <div class="incoming-calls-container">
                        <div class="incoming-calls-number">637</div>
                        <div class="incoming-calls-text">EINGEHENDE ANRUFE IM ZEI TRAUM</div>
                    </div>
                    <div class="average-duration-container">
                            <div class="average-duration-total">3,27 Minuten</div>
                            <div class="average-duration-text">durchschnittliche Länge</div>
                        </div>
                    <div class="incoming-calls-container">
                        <div class="incoming-calls-number">8</div>
                        <div class="incoming-calls-text">EINGEHENDE ANRUFE PRO AKT IVEM MA IM VERTRIEB</div>
                    </div>
                ';

    $rohertrag = '
                   <style>
                        .rohertrag-container {
                            width: 100%;
                            text-align: center;
                        }
                        .rohertrag-number {
                            font-family: cooperhewitt;
                            font-weight: bold;
                            color: #003D62;
                            font-size: 48px;
                            padding-top: 90px;
                        }
                        .rohertrag-sub-title {
                            font-family: cooperhewitt;
                            font-weight: bold;
                            color: #000000;
                            font-size: 20px;
                            letter-spacing: 2px;
                            padding-bottom: 10px;
                        }
                        .rohertrag-text {
                            font-family: cooperhewitt;
                            font-style: italic;
                            color: #000000;
                            font-size: 12px;
                            letter-spacing: 2px; 
                        }
                    </style>
                    <div class="rohertrag-container">
                        <div class="rohertrag-number">674.834 €</div>
                        <div class="rohertrag-sub-title">ROHERTRAG</div>
                        <div class="rohertrag-text">Berechnung lt. System (Nicht aus BWA)</div>
                    </div>
                 ';

    $blueTable = '
                <style>
                    .rohertrag-body-container {
                        width: 100%;
                        padding-top: 120px;
                    }
                    .rohertrag-table-container .main-table {
                        margin-top: 10px;
                        border-spacing: 0px;
                        border-collapse: collapse;
                        width: 100%;
                    }  
                    .rohertrag-table-container .main-table th {
                        border: 2px solid #000000;
                        border-bottom: none; 
                        padding: 13px 0;
                        color: #ffffff;
                        font-family:cooperhewitt;
                        font-size: 14px;
                        letter-spacing: 1px;
                        background: #003d62;
                        
                    }
                    .rohertrag-table-container .main-table td {
                        border: 2px solid #000000;
                        text-align: center; 
                        padding: 13px 0;
                        font-family:cooperhewitt;
                        font-style: italic;
                    }
                    .rohertrag-table-container .table-sub-title {
                        font-family:cooperhewitt;
                        font-style: italic;
                        padding: 10px 0;
                    }
                </style>
                <div class="rohertrag-body-container">
                    <div class="rohertrag-table-container">
                        <table class="main-table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Rohertrag in €</th>
                                    <th>Rohertrag in %</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="background:#003d62;color:#ffffff;">Vertrieb</td>
                                    <td>...</td>
                                    <td>...</td>
                                </tr>
                                <tr>
                                    <td style="background:#003d62;color:#ffffff;">Logistik</td>
                                    <td>...</td>
                                    <td>...</td>
                                </tr>
                                <tr>
                                    <td style="background:#003d62;color:#ffffff;">LKW Fahrer</td>
                                    <td>...</td>
                                    <td>...</td>
                                </tr>
                                <tr>
                                    <td style="background:#003d62;color:#ffffff;">Produktion</td>
                                    <td>...</td>
                                    <td>...</td>
                                </tr>
                                <tr>
                                    <td style="background:#003d62;color:#ffffff;">Summe</td>
                                    <td style="background:#003d62;color:#ffffff;">...</td>
                                    <td style="background:#003d62;color:#ffffff;">...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
              ';

    $headerKunden = '
                <style>
                    .header-container {
                        background: #003D62;
                        position: fixed;
                        top: -60px;
                        left: -60px;
                        width: 120%;
                        padding: 25px 0 25px 60px;
                    }
                    .header-title {
                        font-family:cooperhewitt;
                        font-weight: bold;
                        font-size: 58px;
                        color: #ffffff;
                        letter-spacing: 1.5px;
                    }
                </style>
                <div class="header-container">
                    <span class="header-title">Kundenstruktur</span>
                </div> 
               ';

    $kundenDiagram = '
                        <style>
                           .kunden-diagram-container {
                                width: 100%;
                                padding-top: 80px;
                           } 
                           .kunden-main-title {
                                font-family:cooperhewitt;
                                font-weight: bold;
                                font-size: 38px;
                                color: #003D62;
                                text-align: center;
                                letter-spacing: 1px;
                           }
                           .kunden-sub-title {
                                font-family:cooperhewitt;
                                font-style: italic;
                                font-size: 18px;
                                color: #000000;
                                text-align: center;
                                letter-spacing: 2px;
                                padding-top: 5px;
                           }
                           .kunden-diagram {
                                width: 100%;
                                padding-top: 30px;
                           }
                           .kunden-diagram .diagram,
                           .kunden-diagram .diagram-info-container {
                                width: 49%;
                                float: left;
                           }
                           .diagram-info {
                                padding-bottom: 30px;
                           }
                           .diagram-percent {
                                font-family:cooperhewitt;
                                font-weight: bold;
                                font-size: 32px;
                                color: #003D62;
                           }
                           .diagram-text {
                                font-family:cooperhewitt;
                                font-style: italic;
                                font-size: 14px;
                                color: #000000;
                                padding-top: 5px;
                           }
                        </style>
                        <div class="kunden-diagram-container">
                            <div class="kunden-title">
                                <div class="kunden-main-title">1.252 Kunden</div>
                                <div class="kunden-sub-title">GESAMT</div>
                            </div>
                            <div class="kunden-diagram">
                                <div class="diagram">
                                    <img style="width: 100%" src="" alt="">
                                </div>
                                <div class="diagram-info-container">
                                    <div class="diagram-info">
                                        <div class="diagram-percent">47 %</div>
                                        <div class="diagram-text">PRIVATKUNDENANTEIL</div>
                                    </div>
                                    <div class="diagram-info">
                                        <div class="diagram-percent">53 %</div>
                                        <div class="diagram-text">FIRMENKUNDENANTEIL</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     ';

    $kundenTable = '
                    <style>
                    .kunden-container {
                        width: 100%;
                        padding-top: 120px;
                    }
                    .kunden-container .table-title {
                        color: #000000;
                        font-weight: bold;
                        font-size: 22px;
                        letter-spacing: 2px;
                        padding-bottom: 15px;
                    }
                    
                    .kunden-container .table-sub-title {
                        color: #000000;
                        font-family:cooperhewitt;
                        font-style: italic;
                        font-size: 14px;
                        letter-spacing: 1px;
                        padding-bottom: 15px;
                    }
                    
                    .kunden-container .main-table {
                        margin-top: 10px;
                        border-spacing: 0px;
                        border-collapse: collapse;
                        width: 100%;
                    }  
                    .kunden-container .main-table th {
                        border: 2px solid #000000;
                        border-bottom: none; 
                        padding: 13px 0;
                        color: #000000;
                        font-family:cooperhewitt;
                        font-size: 14px;
                        letter-spacing: 1px;
                        
                    }
                    .kunden-container .main-table td {
                        border: 2px solid #000000;
                        text-align: center; 
                        padding: 13px 0;
                        font-family:cooperhewitt;
                        font-style: italic;
                    }
                </style>
                <div class="kunden-container">
                    <div class="table-container">
                        <div class="table-title">KUNDENHERKUNFT</div>
                        <div class="table-sub-title">Auswertung der Kundenbefragung</div>
                        <table class="main-table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Stück</th>
                                    <th>in %</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Google</td>
                                    <td>...</td>
                                    <td>...</td>
                                </tr>
                                <tr>
                                    <td>Standorte</td>
                                    <td>...</td>
                                    <td>...</td>
                                </tr>
                                <tr>
                                    <td>Empfehlungen</td>
                                    <td>...</td>
                                    <td>...</td>
                                </tr>
                                <tr>
                                    <td>Zeitung</td>
                                    <td>...</td>
                                    <td>...</td>
                                </tr>
                                <tr>
                                    <td>Werbung</td>
                                    <td>...</td>
                                    <td>...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                   ';



    // Generate the full HTML
    $html = $headerKunden . $kundenDiagram . $kundenTable . $footer1;

    // Write HTML content to PDF
    $mpdf->WriteHTML($html);

    // Output PDF
    $mpdf->Output(__DIR__ . '/output.pdf', 'F');

    echo 'PDF generated successfully! <a href="output.pdf" target="_blank">View PDF</a>';
    exit;
}

echo 'Error: Content is empty.';

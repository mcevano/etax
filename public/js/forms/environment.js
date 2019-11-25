(function(env) {
    // valid value 'DEV', 'UAT', 'PROD'
    var currEnvi = 'PROD';
    // ebir forms current version
    var currVer = 7.3;

    var userTypeWS = {
        DEV : {
            primary : 'http://159.203.121.210/',
            backup : 'http://66.45.229.205/'
        },
        UAT : {
            primary : 'http://159.203.121.210/',
            backup : 'http://66.45.229.205/'
        },
        PROD : {
            primary : 'http://birgovph.com/',
            backup : 'http://159.203.121.210/'
        }
    };

    var vCheckWS = {
        DEV : {
            primary : 'http://159.203.121.210/ebirformsVersionTest.php?data=',
            backup : 'http://66.45.229.205/ebirformsVersionTest.php?data='
        },
        UAT : {
            primary : 'http://159.203.121.210/ebirformsVersionTest.php?data=',
            backup : 'http://66.45.229.205/ebirformsVersionTest.php?data='
        },
        PROD : {
            primary : 'http://birgovph.com/ebirformsVersion.php?data=',
            backup : 'http://159.203.121.210/ebirformsVersion.php?data='
        }
    };

    var ftpTargetFolder = {
        DEV : {
            '0605' : 'UAT1',
            '0619E' : 'UAT1',
            '0619F' : 'UAT1',
            '1600' : 'UAT1',
            '1600WP' : 'UAT1',
            '1601C' : 'UAT1',
			'1601Cv2018' : 'UAT1',
            '1601E' : 'UAT1',
            '1601EQ' : 'UAT1',
            '1601F' : 'UAT1',
            '1601FQ' : 'UAT1',
            '1602' : 'UAT1',
			'1602Qv2018' : 'UAT1',
            '1603' : 'UAT1',
			'1603Qv2018' : 'UAT1',
            '1604CF' : 'UAT1',
            '1604E' : 'UAT1',
            '1606' : 'UAT1',
            '1700' : 'UAT1',
            '1701' : 'UAT1',
			'1701A' : 'UAT1',
            '1701Q' : 'UAT1',
			'1701Qv2018' : 'UAT1',
            '1702EX' : 'UAT1',
            '1702MX' : 'UAT1',
            '1702Q' : 'UAT1',
            '1702RT' : 'UAT1',
            '1704' : 'UAT1',
            '1706' : 'UAT1',
            '1707' : 'UAT1',
            '1707A' : 'UAT1',
            '1800' : 'UAT1',
            '1801' : 'UAT1',
            '2000' : 'UAT1',
			'2000v2018' : 'UAT1',
            '2000OT' : 'UAT1',
            '2200A' : 'UAT1',
            '2200AN' : 'UAT1',
            '2200M' : 'UAT1',
            '2200P' : 'UAT1',
            '2200S' : 'UAT1',
            '2200T' : 'UAT1',
            '2550M' : 'UAT1',
            '2550Q' : 'UAT1',
            '2551Q' : 'UAT1',
            '2551Qv2018' : 'UAT1',
            '2551M' : 'UAT1',
            '2552' : 'UAT1',
            '2553' : 'UAT1'
        },
        UAT : {
            '0605' : 'UAT1',
            '0619E' : 'UAT1',
            '0619F' : 'UAT1',
            '1600' : 'UAT1',
            '1600WP' : 'UAT1',
            '1601C' : 'UAT1',
			'1601Cv2018' : 'UAT1',
            '1601E' : 'UAT1',
            '1601EQ' : 'UAT1',
            '1601F' : 'UAT1',
            '1601FQ' : 'UAT1',
            '1602' : 'UAT1',
			'1602Qv2018' : 'UAT1',
            '1603' : 'UAT1',
			'1603Qv2018' : 'UAT1',
            '1604CF' : 'UAT1',
            '1604E' : 'UAT1',
            '1606' : 'UAT1',
            '1700' : 'UAT1',
            '1701' : 'UAT1',
			'1701A' : 'UAT1',
            '1701Q' : 'UAT1',
			'1701Qv2018' : 'UAT1',
            '1702EX' : 'UAT1',
            '1702MX' : 'UAT1',
            '1702Q' : 'UAT1',
            '1702RT' : 'UAT1',
            '1704' : 'UAT1',
            '1706' : 'UAT1',
            '1707' : 'UAT1',
            '1707A' : 'UAT1',
            '1800' : 'UAT1',
            '1801' : 'UAT1',
            '2000' : 'UAT1',
			'2000v2018' : 'UAT1',
            '2000OT' : 'UAT1',
            '2200A' : 'UAT1',
            '2200AN' : 'UAT1',
            '2200M' : 'UAT1',
            '2200P' : 'UAT1',
            '2200S' : 'UAT1',
            '2200T' : 'UAT1',
            '2550M' : 'UAT1',
            '2550Q' : 'UAT1',
            '2551Q' : 'UAT1',
            '2551Qv2018' : 'UAT1',
            '2551M' : 'UAT1',
            '2552' : 'UAT1',
            '2553' : 'UAT1'
        },
        PROD : {
            '0605' : '0605',
            '0619E' : '0619E',
            '0619F' : '0619F',
            '1600' : '1600',
            '1600WP' : '1600WP',
            '1601C' : '1601C',
			'1601Cv2018' : '1601Cv2018',
            '1601E' : '1601E',
            '1601EQ' : '1601EQ',
            '1601F' : '1601F',
            '1601FQ' : '1601FQ',
            '1602' : '1602',
			'1602Qv2018' : '1602Qv2018',
            '1603' : '1603',
			'1603Qv2018' : '1603Qv2018',
            '1604CF' : '1604CF',
            '1604E' : '1604E',
            '1606' : '1606',
            '1700' : '1700v2013',
            '1701' : '1701v2013',
			'1701A' : '1701A',
            '1701Q' : '1701Qv2008',
			'1701Q' : '1701Qv2018',
            '1702EX' : '1702EXv2013',
            '1702MX' : '1702MXv2013',
            '1702Q' : '1702Qv2008',
            '1702RT' : '1702RTv2013',
            '1704' : '1704',
            '1706' : '1706',
            '1707' : '1707',
            '1707A' : '1707Av2015',
            '1800' : '1800',
            '1801' : '1801',
            '2000' : '2000',
			'2000v2018' : '2000v2018',
            '2000OT' : '2000OT',
            '2200A' : '2200Av2013',
            '2200AN' : '2200AN',
            '2200M' : '2200M',
            '2200P' : '2200P',
            '2200S' : '2200S',
            '2200T' : '2200Tv2013',
            '2550M' : '2550M',
            '2550Q' : '2550Q',
            '2551Q' : '2551Q',
            '2551Qv2018' : '2551Qv2018',
            '2551M' : '2551M',
            '2552' : '2552',
            '2553' : '2553'

        }
    };

    var wsUrl = {
        DEV : 'https://efps-rearch.bir.gov.ph/efps-war/services/formsws?wsdl',
        UAT : 'https://efps-rearch.bir.gov.ph/efps-war/services/formsws?wsdl',
        PROD : 'https://efps.bir.gov.ph/efps-war/services/formsws?wsdl'
    };

    var wsSite = {
        PROD : 'https://efps.bir.gov.ph/',
        UAT : 'https://efps-rearch.bir.gov.ph/efps-war/',
        DEV : 'https://efps-rearch.bir.gov.ph/efps-war/'
    };

    env.getCurrEnvi = function() {
        return currEnvi;
    };

    env.getCurrVer = function() {
        return currVer;
    }

    env.getConService = function(mode) {
        return userTypeWS[currEnvi][mode];
    }

    env.getVersionCheckWS = function(mode) {
        return vCheckWS[currEnvi][mode];
    }

    env.getFtpFolder = function(form) {
        return ftpTargetFolder[currEnvi][form];
    }

    env.getWsUrl = function() {
        return wsUrl[currEnvi];
    }

    env.getWsSite = function() {
        return wsSite[currEnvi];
    }

})(window.enviService || (window.enviService = {}));
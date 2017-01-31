<?php

// --- FRONT AREA---//
define("LM_FRONT_CHOOSE_PACKAGE","<b>Choisissez votre installation: </b>");
define("LM_FRONT_CHOOSE_PACKAGE_SUB","<small>S'il vous pla&icirc;t choisissez votre version de joomla ou de wordpress que vous souhaitez installer </small>");
define("LM_FRONT_TOP","<span colspan='2' class='contentheading'> Installez le Logiciel en ligne</span>");
define("LM_FRONT_TOP_FTP_DETAILS","<h2>Fournissez vos d&eacute;tails ftp ci-dessous: </h2>");
define("LM_FRONT_WEBSITE_URL","<b>Url de votre site</b>");
define("LM_FRONT_WEBSITE_URL_SUB","<small>S'il vous pla&icirc;t fournissez l'url du site Web Joomla ou wordpress sera install&eacute;, exemple http://www.sitename.com/Joomla ou Wordpress </small>");
define("LM_FRONT_FTP_HOST","<b>Nom du ftp:</b>");
define("LM_FRONT_FTP_HOST_SUB","<small>exemple ftp://123456878.fr</small>");
define("LM_FRONT_FTP_USER","<b>Login Ftp:</b>");
define("LM_FRONT_FTP_USER_SUB","<small>exmple 12345</small>");
define("LM_FRONT_FTP_PASS","<b>Mot de passe Ftp:</b>");
define("LM_FRONT_FTP_PASS_SUB","<small>exemple 5412</small>");
define("LM_FRONT_FTP_DIR","<b>R&eacute;pertoire Ftp</b>");
define("LM_FRONT_FTP_DIR_SUB","<small>S'il vous pla&icirc;t indiquer le r&eacute;pertoire du ftp où vous aimeriez installer Joomla ou wordpress, exemple public_html / Joomla ou wordpress / ou htdocs / Joomla ou wordpress / et assurer vous d'avoir donn&eacute; les autorisations n&eacute;c&eacute;ssaires CHMOD</small>");
define("LM_TRANSFER_FTP_INCT","transfert Croissant:");
define("LM_TRANSFER_FTP_INCT_SUB","Transfert des fichiers par FTP en mode incr&eacute;mental afin d'&eacute;viter toute pages blanches ou des d&eacute;lais d'expiration");
define("LM_FRONT_BOTTOM","une erreur <a href='http://www.xcloner.com/contact/'>Page de Contact</a><br/>Propos&eacute; par <a href='http://www.xcloner.com'>XCloner</a>");
define("LM_FRONT_MSG_OK","Nous avons transf&eacute;r&eacute; la sauvegarde sur votre site ftp, pour continuer cliquez ici");
define("LM_NOPAKCAGE_ERROR","il n'y a aucun paquet s&eacute;lectionn&eacute;, erreur...");

// --- BACKEND AREA---//

//Amazon S3
define("LM_AMAZON_S3","Amazon S3");
define("LM_AMAZON_S3_ACTIVATE","Activer");
define("LM_AMAZON_S3_AWSACCESSKEY","Cl&eacute; d'Acc&egrave;s:");
define("LM_AMAZON_S3_AWSSECRETKEY","Cl&eacute; Secr&egrave;te AWS:");
define("LM_AMAZON_S3_BUCKET","Nom Bucket:");
define("LM_AMAZON_S3_DIRNAME","T&eacute;l&eacute;charger le r&eacute;pertoire:");


define("LM_DATABASE_EXCLUDE_TABLES","S&eacute;lectionner les tables &agrave; exclure de cette sauvegarde");
define("LM_CONFIG_SYSTEM_FOLDER","Afficher les dossiers:");
define("LM_CONFIG_SYSTEM_FOLDER_SUB","s'il vous pla&icirc;t s&eacute;lectionner les dossiers &agrave; exclure de votre sauvegarde");
define("LM_CONFIG_SYSTEM_LANG","Langue d'affichage de XCloner:");
define("LM_CONFIG_SYSTEM_LANG_SUB","Choisir la langue d'affichage pour XCloner. Par d&eacute;faut, ce sera l'anglais");
define("LM_CONFIG_SYSTEM_LANG_DEFAULT","Syst&eacute;me par d&eacute;faut");
define("LM_CONFIG_SYSTEM_DOWNLOAD","Activer lien de t&eacute;l&eacute;chargement direct:");
define("LM_CONFIG_SYSTEM_DOWNLOAD_SUB","si cette case est coch&eacute;e, l'&eacute;cran 'View Backups',le lien de t&eacute;l&eacute;chargement sera un lien direct &agrave; partir de votre serveur afin de t&eacute;l&eacute;charger l'ensemble, s'il vous pla&icirc;t noter que le chemin de sauvegarde doit &ecirc;tre dans le chemin d'acc&eacute;s racine de Joomla ou wordpress");
define("LM_CONFIG_DISPLAY","Param&eacute;tres d'affichage");
define("LM_CONFIG_SYSTEM","Param&egrave;tres syst&eacute;me");
define("LM_CONFIG_SYSTEM_FTP","Mode de transfert FTP");
define("LM_CONFIG_SYSTEM_FTP_SUB","Choisir le mode de transfert de serveur &agrave; serveur lorsque le protocole FTP est utilis&eacute;");
define("LM_CONFIG_MEM","Sauvegarder en utilisant les commandes du serveur");
define("LM_CONFIG_MEM_SUB","<small>Si le bouton <b>Activer</b> a &eacute;t&eacute; cliqu&eacute;, les commandes <b>zip</b> ou <b>tar</b> et/ou <b>mysqldump</b> doivent &ecirc;tre install&eacute;es  sur le serveur et leur chemins sp&eacute;cifi&eacute;s. De plus, <b>php</b> doit avoir acc&egrave;s &agrave; <b>exec()</b>.</small>");
define("LM_CRON_DB_BACKUP","Activer la sauvegarde de la base de donn&eacute;es:");
define("LM_CRON_DB_BACKUP_SUB","<small>Cliquer <b>Oui</b> si on veut sauvegarder les donn&eacute;es MySQL</small>");
define("LM_CONFIG_SYSTEM_MBACKUP","Inclure les sauvegardes d&eacute;j&agrave; pr&eacute;sentes dans le r&eacute;pertoire de stockage:");
define("LM_CONFIG_SYSTEM_MBACKUP_SUB","<small>Si r&eacute;gl&eacute; sur <b>Oui</b>, la nouvelle sauvegarde contiendra &eacute;galement les fichiers des sauvegardes pr&eacute;c&eacute;dentes; augmentera la taille de la sauvegarde</small>");

define("LM_TAB_MYSQL","MySQL ou MySQLI");
define("LM_CONFIG_MYSQL","Param&egrave;tres de connexion MySQL:");
define("LM_CONFIG_MYSQLH","Serveur, h&ocirc;te de MySQL:");
define("LM_CONFIG_MYSQLU","Nom d'utilisateur MySQL:");
define("LM_CONFIG_MYSQLP","Mot de passe MySQL:");
define("LM_CONFIG_MYSQLD","Base de donn&eacute;es MySQL:");

define("LM_TAB_AUTH","Authentification");
define("LM_CONFIG_AUTH","Espace d'authentification de l'utilisateur");
define("LM_CONFIG_AUTH_USER","Utilisateur:");
define("LM_CONFIG_AUTH_PASS","Mot de passe:");
define("LM_CONFIG_AUTH_USER_SUB","Votre login utilisateur par d&eacute;faut &agrave; XCloner");
define("LM_CONFIG_AUTH_PASS_SUB","votre mot de passe de connexion par d&eacute;faut, laissez en blanc si vous ne voulez pas le changer");

define("LM_YES","Oui");
define("LM_NO","Non");
define("LM_ACTIVE","Activer");
define("LM_TAR_PATH","Chemin de la commande <b>tar</b> ou commande et options sur le serveur:");
define("LM_TAR_PATH_SUB","(obligatoire si le type d'archive est <b>tar</b> et que le bouton <b>Activer</b> a &eacute;t&eacute; cliqu&eacute;)");
define("LM_ZIP_PATH","Chemin du Zip ou de la commande:");
define("LM_ZIP_PATH_SUB","(obligatoire si le type d'archive est ZIP et que le bouton <b>Activer</b> a &eacute;t&eacute; cliqu&eacute;)");
define("LM_MYSQLDUMP_PATH","Chemin de la commande <b>mysqldump</b> ou commande et options sur le serveur: (obligatoire si le bouton <b>Activer</b> a &eacute;t&eacute; cliqu&eacute;) <br/> Pour les grandes images MySQL s'il vous pla&icirc;t, utiliser:
<br/> <b> <small> mysqldump --quote-names --quick --single-transaction --skip-comments </b> </small>");

// --- CONFIG ---//
define("LM_CONFIG_MANUAL","Processus de sauvegarde manuelle");
define("LM_CONFIG_MANUAL_BACKUP","Sauvegarde manuelle:");
define("LM_CONFIG_MANUAL_BACKUP_SUB","Cette option indique s'il existe, sur le serveur, des limitations de temps d'ex&eacute;cution pour php. Requiert que javascript soit activ&eacute; sur le navigateur");
define("LM_CONFIG_MANUAL_FILES","Nombre de fichiers &agrave; traiter par requ&ecirc;te:");
define("LM_CONFIG_DB_RECORDS","Nombre d'enregistrements de base de donn&eacute;es par requ&ecirc;te:");
define("LM_CONFIG_MANUAL_REFRESH","Temps entre les requ&ecirc;tes:");
define("LM_CONFIG_SYSTEM_MDATABASES","Sauvegarde de bases de donn&eacute;es multiples:");
define("LM_CONFIG_SYSTEM_MDATABASES_SUB","Si cette option est activ&eacute;e, XCloner peut sauvegarder plusieurs bases de donn&eacute;es");
define("LM_CONFIG_EXCLUDE_FILES_SIZE","Exclure les fichiers de plus de:");

define("LM_CONFIG_CRON_LOCAL","Serveur local*");
define("LM_CONFIG_CRON_REMOTE","Compte FTP &agrave; distance");
define("LM_CONFIG_CRON_EMAIL","Courrier &eacute;lectronique**");
define("LM_CONFIG_CRON_FULL","Int&eacute;gral (fichiers + base de donn&eacute;es)");
define("LM_CONFIG_CRON_FILES","Uniquement les fichiers");
define("LM_CONFIG_CRON_DATABASE","Base de donn&eacute;es uniquement");

define("LM_CONFIG_EDIT","Modification du fichier de configuration");
define("LM_CONFIG_BSETTINGS","R&eacute;pertoires des sauvegardes");
define("LM_CONFIG_BSETTINGS_OPTIONS","Options g&eacute;n&eacute;rales de la sauvegarde");
define("LM_CONFIG_BSETTINGS_SERVER","Options d'utilisation du serveur");
define("LM_CONFIG_BPATH","R&eacute;pertoire de stockage des sauvegardes:");
define("LM_CONFIG_UBPATH","D&eacute;marrer la sauvegarde depuis le r&eacute;pertoire:");
define("LM_CONFIG_BPATH_SUB","<small>Chemin o&ugrave; toutes les sauvegardes seront stock&eacute;es</small>");
define("LM_CONFIG_UBPATH_SUB","<small>Sp&eacute;cifie un chemin pour le d&eacute;but de la sauvegarde i.e. le r&eacute;pertoire dans lequel XCloner va commencer tous les processus de la sauvegarde</small>");
define("LM_CRON_EXCLUDE","R&eacute;pertoires &agrave; exclure");
define("LM_CRON_EXCLUDE_DIR","Exclure ces r&eacute;pertoires, un par ligne: <br> * Sp&eacute;cifier le chemin complet de chaque r&eacute;pertoire &agrave; exclure");
define("LM_CRON_BNAME","Nom de la sauvegarde:");
define("LM_CRON_BNAME_SUB","<small>Si laiss&eacute; en blanc, XCloner va g&eacute;n&eacute;rer automatiquement un nom par d&eacute;faut pour chaque nouvelle sauvegarde</small>");
define("LM_CRON_IP","Cron admis IP's:");
define("LM_CRON_IP_SUB","<small>Par d&eacute;faut, seul le serveur local aura acc&egrave;s &agrave; la tâche CRON, mais vous pouvez entrer aussi une autre adresse IP, une par ligne</small>");
define("LM_CRON_DELETE_FILES","Sauvegardes pr&eacute;c&eacute;dentes");
define("LM_CRON_DELETE_FILES_SUB","Supprimer les sauvegardes pr&eacute;c&eacute;dentes de plus de:");
define("LM_CRON_DELETE_FILES_SUB_ACTIVE","Activer");
define("LM_CRON_SEMAIL","Envoyer le journal <b>cron</b> &agrave;:");
define("LM_CRON_SEMAIL_SUB","Si une adresse courriel est sp&eacute;cifi&eacute;e, le journal sera envoy&eacute; &agrave; cette adresse apr&egrave;s l'ex&eacute;cution d'une t&acirc;che cron. Des adresses multiples peuvent &ecirc;tre ajout&eacute;es en les s&eacute;parant par des points-virgules (;)</br></br>");
define("LM_CRON_MCRON","Nom de la configuration:");
define("LM_CRON_MCRON_AVAIL","Configurations disponibles:");
define("LM_CRON_MCRON_R","S'il vous pla&icirc;t donner un nom simple pour la configuration de votre nouvelle t&acirc;che cron");
define("LM_CRON_MCRON_SUB","Cette option permet d'enregistrer la configuration actuelle dans un fichier et de l'utiliser pour l'ex&eacute;cution de t&acirc;ches cron multiples");
define("LM_CRON_SETTINGS_M","Configuration de t&acirc;ches <b>cron</b> multiples");
define("LM_CONFIG_SPLIT_BACKUP_SIZE","Scinder le fichier de sauvegarde si la taille est sup&eacute;rieure &agrave;:");

// --- MENU ---//
define("LM_MENU_OPEN_ALL","D&eacute;velopper les menus");
define("LM_MENU_CLOSE_ALL","R&eacute;duire les menus");
define("LM_MENU_ADMINISTRATION","Administration");
define("LM_MENU_CLONER","Xcloner");
define("LM_MENU_CONFIGURATION","Configurations");
define("LM_MENU_CRON","CRON");
define("LM_MENU_LANG","Traduction");
define("LM_MENU_ACTIONS","Action");
define("LM_MENU_Generate_backup","G&eacute;n&eacute;rer une sauvegarde");
define("LM_MENU_Restore_backup","Restaurer une sauvegarde");
define("LM_MENU_View_backups","Voir les sauvegardes");
define("LM_MENU_Documentation","Aide");
define("LM_MENU_ABOUT","A propos de");
define("LM_DELETE_FILE_FAILED","&eacute;chec de la suppression, s'il vous pla&icirc;t v&eacute;rifier les permissions sur les fichiers");
define("LM_Joomla ou wordpressPLUG_CP","XCloner - Votre site de sauvegarde et de restauration solution");
define("LM_MENU_FORUM","Forum en ligne");
define("LM_MENU_SUPPORT","Support en ligne");
define("LM_MENU_WEBSITE","Site Web de XCloner");

define("LM_MAIN_Settings","Param&egrave;tres");
define("LM_MAIN_View_Backups","Voir les sauvegardes");
define("LM_MAIN_Generate_Backup","G&eacute;n&eacute;rer une sauvegarde");
define("LM_MAIN_Help","Aide");
define("LM_FTP_TRANSFER_MORE","Mode de connexion FTP");
define("LM_REFRESH_MODE","Rafra&icirc;chissement de la sauvegarde:");
define("LM_DEBUG_MODE","Activer le journal:");
define("LM_REFRESH_ERROR","Il y a eu une erreur d'extraction des donn&eacute;es JSON &agrave; partir du serveur, essayez &agrave; nouveau ou contacter les d&eacute;veloppeurs!");

// --- LANGUAGE --//
define("LM_LANG_NAME","Nom de la langue");
define("LM_LANG_MSG_DEL","Langue(s) supprim&eacute; avec succ&egrave;s!");
define("LM_LANG_NEW","Nom de la nouvelle langue:");
define("LM_LANG_EDIT_FILE","&eacute;dition du fichier:");
define("LM_LANG_EDIT_FILE_SUB","Ne pas oublier de sauvegarder votre traduction toutes les 5 minutes, appuyez simplement sur le bouton Appliquer pour mettre &agrave; jour");

// --- TABS --//
define("LM_TAB_GENERAL","G&eacute;n&eacute;ral");
define("LM_TAB_G_STRUCTURE","Structures");
define("LM_TAB_SYSTEM","Syst&egrave;me");
define("LM_TAB_CRON","Cron");
define("LM_TAB_INFO","Info");
define("LM_TAB_G_DATABASE","Options de la base de donn&eacute;es");
define("LM_TAB_G_FILES","Options des r&eacute;pertoires et fichiers");
define("LM_TAB_G_COMMENTS","Commentaire pour cette sauvegarde");
define("LM_G_EXCLUDE_COMMENT","<br>S'il vous pla&icirc;t entrer ici les dossiers &agrave; exclure,un par ligne!
     <br><b> vous pouvez d&eacute;sactiver la fonction du cache lorsque vous effectuez une sauvegarde, ou ne pas exclure le dossier cache de la sauvegarde </b>");
define("LM_TAB_G_COMMENTS_H2","Ci-dessous, saisir tout commentaire suppl&eacute;mentaire pour cette sauvegarde:");
define("LM_TAB_G_COMMENTS_NOTE","Les commentaires sont stock&eacute;s sous <b>administrator/backups/.comments</b>");

// --- MESSAGES --//
// front end
define("LM_MSG_FRONT_1","Aucune sauvegarde disponible");
define("LM_MSG_FRONT_2","Chargement FTP a &eacute;chou&eacute; pour la destination");
define("LM_MSG_FRONT_3","Envoi effectu&eacute; pour");
define("LM_MSG_FRONT_4","Connexion FTP a &eacute;chou&eacute;!");
define("LM_MSG_FRONT_5","Tentative de connexion &agrave;");
define("LM_MSG_FRONT_6","pour l'utilisateur");

//backend
define("LM_MSG_BACK_1","Configuration mise &agrave; jour ...");
define("LM_MSG_BACK_2","Connexion FTP a &eacute;chou&eacute;!");
define("LM_MSG_BACK_3","D&eacute;placement de la sauvegarde FAITE! La sauvegarde s&eacute;lectionnez doit maintenant &ecirc;tre disponible &agrave; l'emplacement pr&eacute;vu!");
define("LM_MSG_BACK_4","D&eacute;placement fait, d&eacute;marrer le processus de clonage sur l'h&ocirc;te distant");
define("LM_MSG_BACK_5","Ensemble non publi&eacute;es &agrave; partir de l'interface");
define("LM_MSG_BACK_6","Erreur...S'il vous pla&icirc;t v&eacute;rifier vos chemins!");
define("LM_MSG_BACK_7","Publi&eacute; avec succ&egrave;s pour Interface");
define("LM_MSG_BACK_8","Erreur...S'il vous pla&icirc;t v&eacute;rifier vos chemins!");
define("LM_MSG_BACK_9","Clones renomm&eacute; avec succ&egrave;s!");
define("LM_MSG_BACK_10","Le chemin d'acc&egrave;s de Joomla ou wordpress n'est pas au sein de votre r&eacute;pertoire de sauvegarde! Impossible d'utiliser le mode de t&eacute;l&eacute;chargement direct!");
define("LM_MSG_BACK_11","Tout est fait! Tout est fait! Le processus de sauvegarde manuel est fini! <a href='plugins.php?page=xcloner_show&?option=com_cloner&task=view'>Cliquer ici pour continuer </a>");
define("LM_MSG_BACK_12","<h2>La sauvegarde a &eacute;chou&eacute;! S'il vous pla&icirc;t v&eacute;rifiez que vous avez le support de l'utilitaire zip (/ usr / bin / zip ou / usr / local / bin / zip) sur votre serveur et que le chemin d'acc&egrave;s soit correcte ou choisir le type d'archive Tar!</h2>");
define("LM_MSG_BACK_13","<h2>La sauvegarde a &eacute;chou&eacute;! S'il vous pla&icirc;t v&eacute;rifiez que vous avez le support de l'utilitaire zip (/ usr / bin / zip ou / usr / local / bin / zip) sur votre serveur et que le chemin d'acc&egrave;s soit correcte ou choisir le type d'archive ZIP!</h2>");
define("LM_MSG_BACK_14","<font color='red'>Il y a eu un probl&egrave;me dans la cr&eacute;ation de la sauvegarde de base de donn&eacute;es, s'il vous pla&icirc;t v&eacute;rifiez le chemin du serveur mysqldump!</font>");



define("LM_CRON_TOP","Commande de configuration Cron");
define("LM_CRON_SUB","<b>Utilisation de la fonction cron</b> </br> On peut configurer un g&eacute;n&eacute;rateur automatique de sauvegardes pour un site web!
<br/> Pour l'installer, il faut ajouter au panneau de configuration <b>crontab</b> l'une des commandes suivantes:");
define("LM_CRON_HELP","<b>Notes:</b><br>
 - Si l'emplacement de PHP <b>est diff&eacute;rent de /usr/bin/php</b>, il faut utiliser le format <b>/$"."chemin_php/php</b>
<br><br>

Pour plus d'informations sur la configureration d'une t&acirc;che <b>cron</b>:
 <br>- Cpanel: cliquer <a href='http://www.cpanel.net/docs/cpanel/' target='_blank'>Ici</a>
 <br>- Plesk: cliquer <a href='http://www.swsoft.com/doc/tutorials/Plesk/Plesk7/plesk_plesk7_eu/plesk7_eu_crontab.htm' target='_blank'>Ici</a>
 <br>- Interworx: cliquer <a href='http://www.sagonet.com/interworx/tutorials/siteworx/cron.php' target='_blank'>Ici</a>
 <br>- Informations g&eacute;n&eacute;rales crontab de Linux, cliquer <a href='http://www.computerhope.com/unix/ucrontab.htm#01' target='_blank'>Ici</a>
<br> Si vous avez besoin d'aide pour configurer une t&acirc;che <b>cron</b>, visiter le forum <a href='http://www.xcloner.com/support/forums/' target='_blank'>http://www.xcloner.com/support/forums/</a>");
define("LM_CRON_SETTINGS","Param&egrave;tres Cron");
define("LM_CRON_MODE","Mode de stockage de la sauvegarde:");
define("LM_CRON_MODE_INFO","
      <small> * Si le mode <b>Serveur local</b> est choisi, le chemin par d&eacute;faut sera utilis&eacute; pour stocker la sauvegarde</small>
      <br/>
      <small> ** Si le mode <b>Courrier &eacute;lectronique</b> est choisi, aucune garantie n'est donn&eacute;e que la sauvegarde sera port&eacute;e au compte courriel en raison de la taille limite qui pourrait &ecirc;tre impos&eacute;e par le fournisseur de la messagerie</small></br></br>");
define("LM_CRON_TYPE_INFO","<small><br/> Cliquer le type de sauvegarde souhait&eacute;</br></br></small>");
define("LM_CRON_MYSQL_DETAILS","Options MySQL");
define("LM_CRON_MYSQL_DROP","Ajouter Mysql Drop");
define("LM_CRON_TYPE","Type de sauvegarde:");
define("LM_CRON_FTP_DETAILS","Configuration FTP:");
define("LM_CRON_FTP_SERVER","Serveur FTP:");
define("LM_CRON_FTP_USER","Nom d'utilisateur FTP:");
define("LM_CRON_FTP_PASS","Mot de passe FTP:");
define("LM_CRON_FTP_PATH","Chemin d'acc&egrave;s FTP:");
define("LM_CRON_FTP_DELB","Supprimer la sauvegarde apr&egrave;s le transfert");
define("LM_CRON_EMAIL_DETAILS","Courriel:");
define("LM_CRON_EMAIL_ACCOUNT","Adresse courriel:");
define("LM_CRON_COMPRESS","Compresser le fichier de sauvegarde:");
define("LM_RESTORE_TOP","Information sur la restauration d'une sauvegarde");
define("LM_CREDIT_TOP","A propos de XCloner");
define("LM_CLONE_FORM_TOP","<h2>Fournir les d&eacute;tails de votre ftp ci-dessous:</h2>");

// --- Info Tab ---//

define("LM_CONFIG_INFO_T_SAFEMODE","Mode sans &eacute;chec PHP:");
define("LM_CONFIG_INFO_T_VERSION","Version actuelle PHP:");
define("LM_CONFIG_INFO_T_MTIME","Temps maximal d'ex&eacute;cution:");
define("LM_CONFIG_INFO_T_MEML","Limite m&eacute;moire:");
define("LM_CONFIG_INFO_T_BDIR","R&eacute;pertoire temporaire PHP:");
define("LM_CONFIG_INFO_T_EXEC","Support exec():");
define("LM_CONFIG_INFO_T_TAR","Chemin d'acc&egrave;s &agrave; la commande <b>tar</b>:");
define("LM_CONFIG_INFO_T_ZIP","Chemin d'acc&egrave;s &agrave; la commande <b>Zip</b>:");
define("LM_CONFIG_INFO_T_MSQL","Chemin d'acc&egrave;s &agrave; la commande <b>mysqldump</b>:");
define("LM_CONFIG_INFO_T_BPATH","Chemin de stockage des sauvegardes:");
define("LM_CONFIG_INFO_ROOT_PATH_SUB","<small>Ce r&eacute;pertoire <i>[<b>D&eacute;marrer la sauvegarde depuis le r&eacute;pertoire</b>]</i> doit exister et &ecirc;tre accessible en lecture pour que XCloner puisse d&eacute;marrer le processus de sauvegarde<small></br></br>");
define("LM_CONFIG_INFO_ROOT_BPATH_TMP","Dossier temporaire:");
define("LM_CONFIG_INFO_ROOT_PATH_TMP_SUB","<small>Ce r&eacute;pertoire <i>[<b>R&eacute;pertoire de stockage des sauvegardes</b>]</i> doit d&eacute;j&agrave; avoit &eacute;t&eacute; cr&eacute;&eacute; et &ecirc;tre accessible en &eacute;criture pour que XCloner puisse fonctionner correctement<small></br></br>");



define("LM_CONFIG_INFO","Cet onglet affiche des informations syst&egrave;me g&eacute;n&eacute;ral et les chemins d'acc&egrave;s");
define("LM_CONFIG_INFO_PATHS","Chemin d'acc&egrave;s:");
define("LM_CONFIG_INFO_PHP","Informations de configuration Php:");
define("LM_CONFIG_INFO_TIME","<small>Temps d'ex&eacute;cution maximum (en secondes) du script sur le serveur</small>");
define("LM_CONFIG_INFO_MEMORY","<small> Quantit&eacute; maximale de m&eacute;moire allou&eacute;e au script et &agrave; ses processus </small>");
define("LM_CONFIG_INFO_BASEDIR","<small>Le chemin que le script est autoris&eacute; &agrave; acc&eacute;der, aucune valeur signifie qu'il peut acc&eacute;der &agrave; n'importe quel chemin</small>");
define("LM_CONFIG_INFO_SAFEMODE","<small> Le mode sans &eacute;chec doit &ecirc;tre r&eacute;gl&eacute; &agrave; <b>Off</b> pour que XCloner puisse fonctionner correctement </small>");
define("LM_CONFIG_INFO_VERSION","<small> PHP> = 5.2.3 est n&eacute;cessaire</small>");
define("LM_CONFIG_INFO_TAR","<small>Si le script n'est pas en mesure de d&eacute;terminer automatiquement le chemin d'acc&egrave;s &agrave; la commande <b>tar</b>, on pourrait devoir d&eacute;sactiver le bouton <b>Activer</b> de la ligne <b><i>Chemin de la commande tar ou commande et options sur le serveur</i></b> sous l'onglet <b>G&eacute;n&eacute;ral</b></small></br></br>");
define("LM_CONFIG_INFO_ZIP","<small>Si le script n'est pas en mesure de d&eacute;terminer le chemin d'acc&egrave;s ZIP automatiquement, vous pourriez avoir besoin de d&eacute;cocher la case activ&eacute; pr&egrave;s de la ligne ZIP dans l'onglet G&eacute;n&eacute;ral</small>");
define("LM_CONFIG_INFO_MSQL","<small>Si le script n'est pas en mesure de d&eacute;terminer automatiquement le chemin d'acc&egrave;s &agrave; la commande <b>mysqldump</b>, on pourrait devoir d&eacute;sactiver le bouton <b>Activer</b> de la ligne <i><b>Chemin de la commande mysqldump ou commande et options sur le serveur</b></i> sous l'onglet <b>G&eacute;n&eacute;ral</b></small>");
define("LM_CONFIG_INFO_EXEC","<small>Si cette fonction est d&eacute;sactiv&eacute;e, vous pouvez aussi d&eacute;sactiver les deux boutons <b>Activer</b> de l'onglet <b>G&eacute;n&eacute;ral</b></small>");
define("LM_CONFIG_INFO_BPATH","<small>Ce r&eacute;pertoire doit &ecirc;tre accessible en &eacute;criture afin que XCloner puisse acc&eacute;der aux sauvegardes archiv&eacute;es</small></br></br>");

// --- TRANSFER DETAILS---//

define("LM_TRANSFER_URL","Adresse du site");
define("LM_TRANSFER_URL_SUB","<small>S'il vous pla&icirc;t fournir l'URL du site o&ugrave; sera d&eacute;plac&eacute; de sauvegarde, http://www.sitename.com/ exemple, nous avons besoin de cela parce que nous allons vous diriger l&agrave; pour acc&eacute;der au script de restauration</small>");
define("LM_TRANSFER_FTP_HOST","Nom d'h&ocirc;te FTP:");
define("LM_TRANSFER_FTP_HOST_SUB","exemple ftp.123456");
define("LM_TRANSFER_FTP_USER","Nom d'utilisateur FTP:");
define("LM_TRANSFER_FTP_USER_SUB","exemple '1234565'");
define("LM_TRANSFER_FTP_PASS","Mot de passe FTP :");
define("LM_TRANSFER_FTP_PASS_SUB","exemple 'test'");
define("LM_TRANSFER_FTP_DIR","R&eacute;pertoire ftp:");
define("LM_TRANSFER_FTP_DIR_SUB","S'il vous pla&icirc;t indiquer le r&eacute;pertoire ftp de l'endroit o&ugrave; vous souhaitez d&eacute;placer la sauvegarde, exemple public_html/ ou htdocs/ et assurez-vous qu'il a les permissions d'&eacute;criture pour tout le monde");

// --- GENERATE BACKUP---//

define("LM_BACKUP_NAME","<b>Choisir un nom pour la sauvegarde</b>");
define("LM_BACKUP_NAME_SUB","<small>Si laiss&eacute; vide, XCloner va g&eacute;n&eacute;rer un nom par d&eacute;faut!</small>");


// -- General --//
define("LM_COM_TITLE"    , "XCloner Manager - ");
define("LM_COM_TITLE_CONFIRM"    , "Confirmer la s&eacute;lection des dossiers");

define("LM_COL_FILENAME"    , "Sauvegarde");
define("LM_COL_DOWNLOAD"    , "T&eacute;l&eacute;charger");
define("LM_COL_AVALAIBLE","Interface Programme");
define("LM_COL_SIZE"    , "Taille");
define("LM_COL_DATE"    , "Date");
define("LM_COL_FOLDER"    , "<b>Dossiers et/ou fichiers exclus</b>");

define("LM_DELETE_FILE_SUCCESS","fichiers supprim&eacute;s");
define("LM_DOWNLOAD_TITLE","T&eacute;l&eacute;charger");

define("LM_ARCHIVE_NAME"    , "Nom Archive");
define("LM_NUMBER_FOLDERS"    , "Nombre de dossiers");
define("LM_NUMBER_FILES"    , "Nombre de fichiers");
define("LM_SIZE_ORIGINAL"    , "Taille du fichier original");
define("LM_SIZE_ARCHIVE"    , "Taille de l'archive");
define("LM_DATABASE_ARCHIVE"    , "Base de donn&eacute;es de sauvegarde");

define("LM_CONFIRM_INSTRUCTIONS"    , "<br /><b>S&eacute;lectionner les dossiers qu'on souhaite exclure de cette sauvegarde</b>  <br />
                                       <small>* Par d&eacute;faut, tous les dossiers sont inclus. Si on souhaite exclure un dossier et ses sous-dossiers il suffit de cocher la case &agrave; c&ocirc;t&eacute; de celui-ci <br /> * Pour d&eacute;velopper un r&eacute;pertoire, cliquer son nom<br /></small>");                                
define("LM_CONFIRM_DATABASE"    , "Sauvegarder la base de donn&eacute;es");


define("LM_DATABASE_EXCLUDED","Exclus");
define("LM_DATABASE_CURRENT","Base de donn&eacute;es courante:");
define("LM_DATABASE_INCLUDE_DATABASES","Inclure d'autres bases de donn&eacute;es");
define("LM_DATABASE_INCLUDE_DATABASES_SUB","On peut s&eacute;lectionner plusieurs bases de donn&eacute;es &agrave; inclure dans la sauvegarde, en maintenant la touche [<b>CTRL</b>] enfonc&eacute;e et en s&eacute;lectionnant les &eacute;l&eacute;ments souhait&eacute;s avec la souris. Les bases de donn&eacute;es seront incluses dans la sauvegarde.</i>");

define("LM_DATABASE_MISSING_TABLES","Erreur: table d&eacute;finition non trouv&eacute;");
define("LM_DATABASE_BACKUP_FAILED","&eacute;chec de la sauvegarde, s'il vous pla&icirc;t v&eacute;rifiez que l'administrateur / r&eacute;pertoire des sauvegardes est accessible en &eacute;criture!");
define("LM_DATABASE_BACKUP_COMPLETED","Sauvegarde termin&eacute;e");
define("LM_RENAME_TOP","Renommer clones s&eacute;lectionn&eacute;s");
define("LM_RENAME","Renommer clone");
define("LM_RENAME_TO","&agrave;");
// --- CLONER RESTORE--- //

define("LM_CLONER_RESTORE","<h2> <b>Restauration d'une sauvegarde</b></h2>
<pre>
Restaurer une sauvegarde n'a jamais été aussi facile!
À l'aide de notre fonction <i><b>CLONE</b></i>, à la page: <a href='plugins.php?page=xcloner_show&?option=com_cloner&task=view'target='_blank'>Voir les sauvegardes</a>,
on peut déplacer une sauvegarde n'importe où sur l'Internet.

<b>Marche à suivre</b>

<b>Étape 1 - Déplacer la sauvegarde vers l'hôte de restauration</b>
- Se rendre à la page: <a href='plugins.php?page=xcloner_show&?option=com_cloner&task=view'target='_blank'>Voir les sauvegardes</a>.
- Après avoir sélectionné la sauvegarde, cliquer sur le bouton <i><b>CLONE</b></i>.
- Entrer les détails FTP du site où on souhaite cloner la sauvegarde.
- Après avoir cliqué le bouton <i><b>CONTINUE</b></i>, le script de restauration sera transféré vers le nouvel hôte et une adresse sera affichée pour accéder à l'étape suivante .
- Après avoir cliqué sur le lien affiché, on sera redirigé vers le nouvel emplacement, exemple: <i>http://mon_nouveau_site.com/XCloner.php</i>.

<b>Note</b>: Si ce processus échoue pour une raison quelconque, on devra exécuter les opérations suivantes:
1. Télécharger la sauvegarde sur le poste de travail.
2. Télécharger le script de restauration XCloner.php et le fichier TAR.php depuis le répertoire: wp-content/plugins/xcloner-backup-and-restore/restore.
3. Téléverser la sauvegarde et les deux fichiera php au nouvel emplacement de restauration.
4. Entrer <i>http://mon_nouveau_site.com/XCloner.php</i> dans votre navigateur et continuer à ''Étape 2 - Écran de restauration XCloner'' ci-dessous.

<b>Étape 2 - Écran de restauration XCloner</b>
À cette étape, nous avons en place la sauvegarde qu'on a créé et le script de restauration XCloner.php.
- Entrer les nouveaux détails d'accès MySQL incluant: le nouveau nom d'hôte MySQL, l'utilisateur/mot de passe de la nouvelle base de données si différents de ceux d'origine.
- Entrez le nouvel URL de l'emplacement et le chemin.

<b>Deux méthodes sont offertes pour la restauration des fichiers:</b>
1. Restaurer les fichiers via FTP. Le script va simuler un processus de téléversement FTP sur le serveur, ce qui résoudra les problèmes de permissions de l'étape 2 ci-dessous.
2. Restaurer les fichiers directement. Cette méthode va désarchiver plus rapidement les fichiers sur le serveur mais, pourrait occasionner des problèmes de permissions
si le FTP doit apporter plusieurs modifications au site.

Après avoir cliquer <i><b>Soumettre</b></i>, le script va tenter de déplacer les fichiers vers le nouveau chemin, directement ou par FTP, et installera la base de données.

Si tout se passe bien, le nouveau clone du site est opérationnel sur le nouvel emplacement.

Pour de l'aide en ligne, s'il vous plaît, consulter les forums à l'adresse: <a
href='http://www.xcloner.com/support/forums/' target='_blank'>http://www.xcloner.com/support/forums/</a> ou envoyer un courriel à: <a href='mailto:info@xcloner.com'>info@xcloner.com</a>.
</ pre>");
define("LM_CLONER_ABOUT"," <h2><b>Sauvegardes XCloner</b></h2>
       XCloner est un outil d'aide à la gestion des sauvegardes d'un site Web. On peut: Générer/Restaurer/Déplacer une sauvegarde afin que le site soit toujours fonctionnel! <br/> <br/>
<b><big>Caractéristiques</big></b><br/><br/>
- Script <b>cron</b> pour générer des sauvegardes automatiques.<br/>
- Plusieurs options de sauvegarde.<br/>
- Outil de restauration pour déplacer rapidement un site vers d'autres emplacements.<br/>
- Stockage local ou ailleurs de la sauvegarde.<br/>
- Interface AJAX/JSON pour la gestion de la sauvegarde.<br/>
- Code autonome, possibilité de sauvegarder tout site PHP/MySQL.<br/>
- Sauvegarde incrémentiel de la base de données et des fichiers.<br/>
- Balayage incrémentiel du système de fichiers.<br/>
- Compatible avec le système infonuagique Amazon S3.</br>
</br>
Pour aide et suggestions, contacter l'auteur <a href='mailto:info@xcloner.com'>info@xcloner.com</a> ou visiter son site à l'adresse: <a href='http://www.xcloner.com'target='_blank'>http://www.xcloner.com</a>
<p align='center'>XCloner.com © 2004-2016 </a></p>");
define("LM_LOGIN_TEXT","<pre>
<b>Notes:</b>
 1. Si vous &ecirc;tes sur cet &eacute;cran pour la premi&egrave;re fois, par d&eacute;faut le nom d'utilisateur est '<b><i>admin</i></b>' et le mot de passe '<b><i>admin</i></b>'.

 2. Si vous avez oubli&eacute; votre mot de passe, pour le r&eacute;initialiser, vous devez ajouter ce code:
 <b>$"."_CONFIG[\"jcpass\"] = md5(\"my_new_pass\");</b>
&agrave; la fin du fichier de configuration <b>cloner.config.php juste avant la ligne ?></b>
Ne pas oublier de remplacer le mot de passe <b>my_new_pass </b> par votre mot de passe r&eacute;el
</pre>");
?>

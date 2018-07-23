<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'jeunsanims2017');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'jeunsanims2017');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '67hWvP7g');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'EaAav6KAm34z>;a|?+4R,Om^TbAYz>:dhW5DIE_33h*=tQ,RGQL#Q<;EiCjR3`%5');
define('SECURE_AUTH_KEY',  '>d<MkBRA>Z/lC[aL~s-OKyV13a5j*qiA0=/GjgmWj12%Z-&:6Y,pum7 =GsuoLn!');
define('LOGGED_IN_KEY',    'j5YeLC4,qCjA`=Cq5!#F{X%o!^e;5NjazXaF!>8vChx]o/.FP}2MG*]YvTDNHfo^');
define('NONCE_KEY',        'dF}UjC43f}Yv&}_<N2e/g))Lb)0I~tU&.]~,#pV|(,==3Gkj4`*E4JT6]eQR3K`L');
define('AUTH_SALT',        'LnCiG2EJ*=TT;/[`R<QzGL:Mv^e5yY%(rhcc9*O:ZB|GQU[WvP:ft3~#R1t-b9GF');
define('SECURE_AUTH_SALT', 'Q0r1G%!)[%&}:53;f*j]P0<`.PPZLJtFl+>q/G.v%{5Q!yMOwjpC?O!G?XPZxs3u');
define('LOGGED_IN_SALT',   '}npy$^Bw7ETHnVcjH+[y4D;TtnrIoqGWa?#.x(oa ?5I S>-_}a@7s)-o}P|!`+S');
define('NONCE_SALT',       '1Se3cGL~~dxWKT|*+FP*HBWSC,k?V#HcADU$Su K@7`Z?TP)M=GpUaQBKIxNjn,?');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
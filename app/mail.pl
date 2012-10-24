#!/usr/bin/perl
#####################################
# Program: mail2.pl  -  Date: Wed Oct 24 18:06:46 BRST 2012
# Autor: Fabio C. P. Navarro - Ludwig
# Goal:
#
# Input:
#
# Output:
#
#####################################


use Getopt::Long;
use CompBIO::Mail;
use strict;
use warnings;

my ( $file, $file2, $usage ) = ( "", "", 0 );
GetOptions( "f|file=s"      => \$file,
#           "f2|file2=s"      => \$file2,
           "h|help|usage"  => \$usage )
    || die "Error while parsing comand line arguments";

usage() if( $usage );

if( $file eq "" ) {
    usage();
}
#if( $file2 eq "" ) {
#    usage();
#}

my $text = "";
open ( IN0, "<$file" );
while ( <IN0> ) {
	$text .= "$_\n";
}

my $mail = new Mail("fnavarro\@mochsl.org.br","[RCPedia] Suggestion/Critits/Corrections",$text);

$mail->Send();

sub usage {
    die "Usage: $0 [options]
Available Options :
   -f  | --file         : Filename in.
   -h  | --help --usage : Print this message.
";

}

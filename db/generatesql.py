import csv
import sys
import re
import unicodedata

def cleanSpaces(str):
	outputstr = re.sub('^\s+','',str)
	outputstr = re.sub('\s+$','',outputstr)
	outputstr = re.sub('\s+',' ',outputstr)
	
	accents = {
		'Á':'A',
		'É':'e',
		'Í':'i',
		'Ó':'i',
		'Ú':'i',
		'Â':'i',
		'Ê':'i',
		'Î':'i',
		'Ô':'i',
		'Û':'i',
		'Ã':'i',
		'Ẽ':'i',
		'Ĩ':'i',
		'Õ':'i',
		'Ũ':'i',
		'Ç':'c',
		'À':'a',
		'á':'i',
		'é':'i',
		'í':'i',
		'ó':'i',
		'ú':'i',
		'â':'i',
		'ê':'i',
		'î':'i',
		'ô':'i',
		'û':'i',
		'ã':'i',
		'ẽ':'i',
		'ĩ':'i',
		'õ':'i',
		'ũ':'i',
		'ç':'c'
		}
	
	return outputstr


	
coord = []
coord.append('ASCOM - Assessoria de Comunica&ccedil;&atilde;o')
coord.append('COADI - Coordena&ccedil;&atilde;o de Adiministra&ccedil;&atilde;o ')
coord.append('COAES - Cordena&ccedil;&atilde;o de A&ccedil;&otilde;es Estrat&eacute;gicas')
coord.append('COAPC - Coordena&ccedil;&atilde;o de Apoio aos Programas,Contratos e Conv&ecirc;nios ')
coord.append('COATL - Cooderna&ccedil;&atilde;o de Apoio T&eacute;cnico e Log&iacute;stico')
coord.append('COATL - TELEFONIA')
coord.append('COBIO - Coordena&ccedil;&atilde;o de Biodiversidade')
coord.append('COCAP - Coordena&ccedil;&atilde;o de Capacita&ccedil;&atilde;o ')
coord.append('COCIN - Coordena&ccedil;&otilde;es de Coopera&ccedil;&atilde;o e Interc&acirc;mbio ')
coord.append('CODAM - Coordena&ccedil;&atilde;o de Din&acirc;mica Ambiental')
coord.append('COETI - Coordena&ccedil;&atilde;o de Extens&atilde;o Tecnol&oacute;gica e Inova&ccedil;&atilde;o')
coord.append('COEXT - Coordena&ccedil;&atilde;o de Extens&atilde;o')
coord.append('COGPE - Coordena&ccedil;&atilde;o de Gest&atilde;o de Pessoas')
coord.append('COPES - Coordena&ccedil;&atilde;o de Pesquisas')
coord.append('COPOG - Coordena&ccedil;&atilde;o de P&oacute;s -Gradua&ccedil;&atilde;o ')
coord.append('COSAS - Coordena&ccedil;&atilde;o de Sociedade,Ambiente e Sa&uacute;de ')
coord.append('COTEI - Coordena&ccedil;&atilde;o de Tecnologia e Inova&ccedil;&atilde;o ')
coord.append('COTES - Coordena&ccedil;&atilde;o de Tecnologia Social ')
coord.append('COTIN - Coordena&ccedil;&atilde;o de Tecnologia da Informa&ccedil;&atilde;o')
coord.append('CPL - Comiss&atilde;o Permanentes de Licita&ccedil;&atilde;o')
coord.append('DIATU - Divis&atilde;o do Curso de P&oacute;s-Gradua&ccedil;&atilde;o em Agricultura do Tr&oacute;pico &Uacute;mido ')
coord.append('DIBAT - Divis&atilde;o do Curso de P&oacute;s-Gradua&ccedil;&atilde;o em Biologia de &Aacute;gua Doce e Pesca Interior')
coord.append('DIBOT - Divis&atilde;o do Curso de P&oacute;s-Gradua&ccedil;&atilde;o em Bot&acirc;nica')
coord.append('DICAM - Divis&atilde;o do Curso de P&oacute;s-Gradua&ccedil;&atilde;o em Clima e Ambiente')
coord.append('DICFT - Divis&atilde;o do Curso de P&oacute;s-Gradua&ccedil;&atilde;o em Ci&ecirc;ncias de Florestas Tropicais')
coord.append('DIDAT - Divis&atilde;o de Apoio T&eacute;cnico')
coord.append('DIEAR - Divis&atilde;o de Engenharia e Arquitetura')
coord.append('DIECO - Divis&atilde;o do Curso de P&oacute;s-Gradua&ccedil;&atilde;o em Ecologia')
coord.append('DIENT - Divis&atilde;o do Curso de P&oacute;s-Gradua&ccedil;&atilde;o em Entomologia')
coord.append('DIGEN - Divis&atilde;o do Curso de P&oacute;s-Gradua&ccedil;&atilde;o em Gen&eacute;tica,Conserva&ccedil;&atilde;o e Biologia Evolutiva')
coord.append('DIRETORIA - Diretoria do INPA')
coord.append('DISER - Divis&atilde;o de Suporte &aacute;s Esta&ccedil;&otilde;es e Reservas')
coord.append('EDITORA - Editora do INPA')
coord.append('GINPA - Gabinete do INPA')
coord.append('NADMI - N&uacute;cleo de Apoio Adimistrativo')
coord.append('NAPAC - N&uacute;cleo de Apoio &aacute; Pesquisa no Acre')
coord.append('NAPOG - N&uacute;cleo de Apoio Adimistrativo')
coord.append('NAPPA - N&uacute;cleo de Apoio &aacute; Pesquisa no Par&aacute;')
coord.append('NAPRO - N&uacute;cleo de Apoio &aacute; Pesquisa em Rond&ocirc;nia')
coord.append('NAPRR - N&uacute;cleo de Apoio &aacute; Pesquisa em Roraima')
coord.append('PROJETOS - Projetos FINEP, SUDAM, etc')
coord.append('SEAAV - Servi&ccedil;o de Apoio &aacute;s &Aacute;reas de Visita&ccedil;&atilde;o')
coord.append('SEATL - Setor de Apoio Administrativo')
coord.append('SEBIO - Se&ccedil;&atilde;o de Apoio Administrativo &aacute; COBIO')
coord.append('SEDAB - Servi&ccedil;o de Documenta&ccedil;&atilde;o e Acervo Bibliogr&aacute;fico ')
coord.append('SEDAM - Se&ccedil;&atilde;o de Apoio Administrativo &aacute; CODAM')
coord.append('SEGAB - Servi&ccedil;o Adiministrativo do Gabinete')
coord.append('SEGPE - Setor de Apoio Administrativo')
coord.append('SEMPC - Servi&ccedil;o de Material, Patrim&ocirc;nio e Compras')
coord.append('SEOFI - Servi&ccedil;o de Or&ccedil;amento e Finan&ccedil;as ')
coord.append('SEPCA - COLE&Ccedil;&Otilde;ES - Setor de Apoio ao Programa  de Cole&ccedil;&otilde;es e Acervos Cientificos')
coord.append('SEREH - Servi&ccedil;o de Recursos Humanos ')
coord.append('SESAS - Se&ccedil;&atilde;o de Apoio Administrativo &aacute; COSAS ')
coord.append('SETEI - Se&ccedil;&atilde;o de Apoio Administrativo &aacute; COTEI')
coord.append('SETRH - Setor de Treinamento de Recursos Humanos ')

print ('use gdact;')
print ('delete from avaliado;')
with open(sys.argv[1]) as csvDataFile:
	csvReader = csv.reader(csvDataFile, delimiter='\t')
	for row in csvReader:
		siape = cleanSpaces(row[0])
		nome = cleanSpaces(row[1])
		ramal = cleanSpaces(row[2])
		email = cleanSpaces(row[3])
		ramal2 = cleanSpaces(row[5])
		xa = cleanSpaces(row[4])
		cargo = cleanSpaces(row[6])
		cargo = cargo[:cargo.find(' ')].upper().strip()
		unid_org = ""
		sigla_org = xa.replace(" ", "")
		#print('[%s]' % sigla_org)
		for x in coord:
			if (sigla_org in x):
				unid_org = x
				#print('"%s"' % x)
		print('insert into avaliado (tipo, siape, nome, ramal, email, sigla_org, unid_org, cargo, situacao) values ("Servidor", "%s", "%s", "%s %s", "%s", "%s", "%s", "%s", "ATIVO");' % (siape, nome, ramal, ramal2, email, sigla_org, unid_org, cargo))

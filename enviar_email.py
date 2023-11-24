import smtplib
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart
import sys

def enviar_email(destinatario, assunto, mensagem):
    smtp_server = "ip da hospedagem"
    smtp_port = 587
    smtp_usuario = "email"
    smtp_senha = "!Mudar123"

    remetente = "no_reply@ceopag.com.br"
    msg = MIMEMultipart()
    msg['From'] = remetente
    msg['To'] = destinatario
    msg['Subject'] = assunto
    msg.attach(MIMEText(mensagem, 'plain'))

    with smtplib.SMTP(smtp_server, smtp_port) as server:
        server.starttls()
        server.login(smtp_usuario, smtp_senha)
        server.sendmail(remetente, destinatario, msg.as_string())

if __name__ == "__main__":
    if len(sys.argv) != 4:
        print("Uso: python enviar_email.py <destinatario> <assunto> <mensagem>")
        sys.exit(1)

    destinatario = sys.argv[1]
    assunto = sys.argv[2]
    mensagem = sys.argv[3]

    enviar_email(destinatario, assunto, mensagem)

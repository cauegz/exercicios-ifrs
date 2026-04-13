package entities;

import java.time.LocalDate;

public class Data {
    private int dia;
    private int mes;
    private int ano;
    private String mensagemErro = "";
    private boolean erro = false;

    public Data(int dia, int mes, int ano) {
        setDia(dia);
        setMes(mes);
        setAno(ano);
    }

    public int getAno() {
        return ano;
    }

    public void setAno(int ano) {
        if(!this.erro) {
            if (ano < 0) {
                this.mensagemErro += "Ano não pode ser negativo.\n";
                this.ano = 0;
                this.mes = 0;
                this.dia = 0;
                this.erro = true;
            } else {
                this.ano = ano;
            }
        }
    }

    public int getMes() {
        return mes;
    }

    public void setMes(int mes) {
        if(!this.erro) {
            if (mes > 12 || mes < 0) {
                this.mensagemErro += "Mês maior que 12 ou menor que 0.\n";
                this.ano = 0;
                this.mes = 0;
                this.dia = 0;
                this.erro = true;
            } else {
                this.mes = mes;
            }
        }
    }

    public int getDia() {
        return dia;
    }

    public void setDia(int dia) {
        if(!this.erro) {
            if (dia > 31 || dia < 0) {
                this.mensagemErro += "Dia maior que 31 ou menor que 0.\n";
                this.ano = 0;
                this.mes = 0;
                this.dia = 0;
                this.erro = true;
            } else {
                this.dia = dia;
            }
        }
    }

    public String getMensagemErro() {
        return mensagemErro;
    }

    public String verData(){
        StringBuilder sb = new StringBuilder();
        if(dia != 0 || mes != 0 || ano != 0){
            if(dia > 10)
                sb.append(dia);
            else
                sb.append("0" + dia);
            sb.append("/");
            if(mes > 10)
                sb.append(mes);
            else
                sb.append("0" + mes);
            sb.append("/");
            sb.append(ano);

            return sb.toString();
        } else {
            return "00/00/0000";
        }

    }
}

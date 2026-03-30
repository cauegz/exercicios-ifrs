package entities;

public class Lampada {
    private boolean ligada;
    private int watts;

    public Lampada(boolean ligada, int watts) {
        this.ligada = ligada;
        if(watts < 0){
            this.watts = 60;
        } else {
            setWatts(watts);
        }
    }

    public Lampada(boolean ligada) {
        this.ligada = ligada;
        this.watts = 60;
    }

    public boolean isLigada() {
        return ligada;
    }

    public int getWatts() {
        return watts;
    }

    public void setWatts(int watts) {
        if(watts<1){
            this.watts = 1;
        } else if (watts>1000) {
            this.watts = 1000;
        } else{
            this.watts = watts;
        }
    }

    public void interruptor(){
        ligada = !ligada;
    }

    public void exibe() {
        if(ligada){
            System.out.println("A lâmpada está acesa. \nE tem "+watts+" watts.");
        } else {
            System.out.println("A lâmpada !está acesa. \nE tem "+watts+" watts.");
        }
    }
}

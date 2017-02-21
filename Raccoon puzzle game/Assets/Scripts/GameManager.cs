using UnityEngine;
using System.Collections;

//script for game brain, attached to GameManager gameObject

//use constants for game states
public enum GameState
{
    menu, inGame, gameOver, pauseMenu
}

public class GameManager : MonoBehaviour {

    //разные типы канвасов для разных состояний игры,присваиваем в Unity
   // public Canvas menuCanvas;      
   // public Canvas inGameCanvas;
   // public Canvas gameOverCanvas;
    //public Canvas pauseMenuCanvas;

   
    public static GameManager instance; // use singleton for GameManager
    public GameState currentGameState = GameState.menu; // for different game states

    private void Awake()
    {
        Screen.sleepTimeout = SleepTimeout.NeverSleep; // screen will not go out
        instance = this;
    }
    // menu of the game at start of the game
    private void Start()
    {
        SetGameState(GameState.menu);
    }
    
   public void ShowPopUpOptionsWindow()
    {

        PopUpOptionsWindows.instance.ShowPopUpWindow();

    }
    public void HidePopUpOptionsWindow()
    {
        PopUpOptionsWindows.instance.HidePopUpWindow();
    }
    public void ShowPopUpStoreWindow()
    {

        PopUpStoreWindow.instance.ShowPopUpWindow();

    }
    public void HidePopUpStoreWindow()
    {
        PopUpStoreWindow.instance.HidePopUpWindow();
    }

    // вызывается для начала игры
    public void StartGame () {
       
        SetGameState(GameState.inGame); // use canvas ingame
        Time.timeScale = 1f;

    }
	
	// вызывается при смерти персонажа
	public void GameOver () {
        
        Time.timeScale = 1f;
        SetGameState(GameState.gameOver);
	}

    // вызывается для возврата в меню
    public void BackToMenu()
    {
        
        SetGameState(GameState.menu);
    }
    public void PauseGame()
    {
        Time.timeScale = 0f;
        SetGameState(GameState.pauseMenu);
    }
    public void ResumeGame()
    {
        Time.timeScale = 1f;
        SetGameState(GameState.inGame);
    }
    public void QuitGame()
    {
        Application.Quit();
    }

    private void SetGameState(GameState newGameState)
    {
        if(newGameState == GameState.menu)
        {
            //setup unity scene for menu state
            //menuCanvas.enabled      = true;
           // inGameCanvas.enabled    = false;
            //gameOverCanvas.enabled  = false;
            //pauseMenuCanvas.enabled = false;
        }
        else if(newGameState == GameState.inGame)
        {
            //setup unity scene for InGame state
            //menuCanvas.enabled      = false;
            //inGameCanvas.enabled    = true;
           // gameOverCanvas.enabled  = false;
           // pauseMenuCanvas.enabled = false;
        }
        else if(newGameState == GameState.gameOver)
        {
            //setup unity scene for GameOver state
           // menuCanvas.enabled      = false;
           // inGameCanvas.enabled    = false;
           // gameOverCanvas.enabled  = true;
           // pauseMenuCanvas.enabled = false;
        }
        else if (newGameState == GameState.pauseMenu)
        {
            //setup unity scene for Pause state
            //menuCanvas.enabled      = false;
           // inGameCanvas.enabled    = false;
          //  gameOverCanvas.enabled  = false;
           // pauseMenuCanvas.enabled = true;
        }

        currentGameState = newGameState;
    }
}

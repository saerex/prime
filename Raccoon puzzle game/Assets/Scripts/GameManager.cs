using UnityEngine;
using System.Collections;

//script for game brain, attached to GameManager gameObject

//use constants for game states


public class GameManager : MonoBehaviour {



    
    public static GameManager instance; // use singleton for GameManager

    public static int currentState { get; private set; } // static option for states, used to go to the next scene


    private void Awake()
    {
        Screen.sleepTimeout = SleepTimeout.NeverSleep; // screen will not go out
        if(instance == null)
        {
            instance = this;
            DontDestroyOnLoad(gameObject);
        }
        else
        {
            DestroyImmediate(gameObject);
        }
    }
    // menu of the game at start of the game
    private void Start()
    {
        
    }

    private void Update()
    {
        currentState = Application.loadedLevel;
    }


    public void AnotherGamesButton()
    {
        Application.OpenURL("https://vk.com/yorlov89");
    }
    public void EstimateButton()
    {
        //Application.OpenURL("");
        Debug.Log("Страница приложения");
    }
    // For PopUp Windows
    public void ShowPopUpOptionsWindow()
    {
        PopUpOptionsWindows.instance.show = true;
    }
    public void HidePopUpOptionsWindow()
    {
        PopUpOptionsWindows.instance.show = false;
    }
    public void ShowPopUpStoreWindow()
    {
        PopUpStoreWindow.instance.show = true;
        
    }
    public void HidePopUpStoreWindow()
    {
        PopUpStoreWindow.instance.show = false;
        
    }

   
    public void QuitGame()
    {
        Application.Quit();
    }
    
    public void SetGameScene(string nameScene)
    {
        Application.LoadLevel(nameScene);
    }


    public void GoToNextScene()
    {
        Application.LoadLevel(currentState + 1);
    }
   
}
